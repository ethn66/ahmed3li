<?php
/**
 * Builder
 *
 * @package    Zeen
 * @copyright  Copyright Codetipi
 * @since      1.0.0
*/
namespace TipiBuilder;

class ZeenBuilder {

	/**
	 * Var for setup.
	 *
	 * @since    1.0.0
	 */
	private $zeen_setup;

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct() {

		add_action( 'wp_restore_post_revision', array( $this, 'zeen_wp_restore_post_revision' ), 10, 2 );
		add_filter( '_wp_post_revision_fields', array( $this, 'zeen_wp_post_revision_fields' ) );
		add_filter( '_wp_post_revision_field_my_meta', array( $this, 'zeen_builder_revision_field' ), 10, 2 );
		add_action( 'save_post', array( $this, 'zeen_builder_save_post' ), 10, 3 );

		if ( ZeenHelpers::zeen_builder_call() != true ) {
			return;
		}
		add_filter( 'autoptimize_filter_noptimize', '__return_true', 10, 0 );
		add_filter( 'wpel_apply_settings', '__return_false' );
		add_action( 'wp_enqueue_scripts', array( $this, 'zeen_scripts' ) );
		add_filter( 'ajax_query_attachments_args', array( $this, 'zeen_ajax_query' ) );
		add_action( 'send_headers', array( $this, 'zeen_cache' ) );
		add_filter( 'body_class', array( $this, 'zeen_b_body_classes' ) );
		add_filter( 'pre_get_document_title', array( $this, 'zeen_doc_title' ) );
		add_action( 'template_redirect', array( $this, 'zeen_init' ) );
		add_filter( 'run_ngg_resource_manager', '__return_false' );
		add_filter( 'FHEE__EE_System__canLoadBlocks', '__return_false' );
		add_filter( 'gform_disable_print_form_scripts', '__return_true' );
		add_filter( 'wp_anti_clickjack', '__return_false' );
		define( 'NGG_DISABLE_RESOURCE_MANAGER', true );
	}

	public function zeen_doc_title( $title ) {
		if ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_home() || is_singular() ) {
			$title = single_post_title( '', false );
		} elseif ( is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		}
		return 'Tipi Builder | ' . $title;
	}


	public function zeen_b_body_classes( $classes ) {
		$classes[] = 'is-tipi-builder';
		return $classes;
	}

	/**
	 * Init
	 *
	 * @since 1.0.0
	 */
	public function zeen_init() {
		require ZEEN_BUILDER_DIR . '/app/frontend/frontend.php';
		die();
	}

	/**
	 * cache
	 *
	 * @since 1.0.0
	 */
	public function zeen_cache() {
		if ( ZeenHelpers::zeen_builder_call() == true ) {
			header( 'Cache-Control: no-cache, no-store, must-revalidate' );
			header( 'Pragma: no-cache' );
			header( 'Expires: 0' );
			define( 'DONOTCACHEDB', true );
			define( 'DONOTCACHEPAGE', true );
			define( 'DONOTCACHCEOBJECT', true );
			define( 'LSCACHE_NO_CACHE', true );
		}
	}

	/**
	 * Scripts
	 *
	 * @since 1.0.0
	 */
	public function zeen_scripts() {
		wp_enqueue_media();

		wp_enqueue_style( 'zeen-builder-style', ZEEN_BUILDER_URI . '/assets/css/builder-style.css', array(), ZEEN_BUILDER_VERSION );
		wp_enqueue_style( 'zeen-builder-icons', ZEEN_BUILDER_URI . '/assets/css/fonts/builder-icons.css', array(), ZEEN_BUILDER_VERSION );
		wp_enqueue_style( 'zeen-builder-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700', array(), ZEEN_BUILDER_VERSION );
		wp_enqueue_script( 'zeen-dep', ZEEN_BUILDER_URI . '/app/core/assets/vendor.js', array(), ZEEN_BUILDER_VERSION, true );
		wp_enqueue_script( 'zeen-main', ZEEN_BUILDER_URI . '/app/core/assets/main.js', array( 'zeen-dep', 'zeen-functions' ), ZEEN_BUILDER_VERSION, true );

		$term = ZeenHelpers::zeen_active_id();
		if ( 'page' == $term['type'] ) {
			$type      = 'page';
			$taxonomy  = 'page';
			$id        = $term['id'];
			$editor    = get_edit_post_link( $id );
			$permalink = get_permalink( $id );
			$fonts     = get_post_meta( $id, 'tipi_builder_fonts', true );
			$is_page   = true;
		} else {
			$type      = 'term';
			$id        = $term['id'];
			$taxonomy  = $term['tax'];
			$editor    = get_edit_term_link( $id, $taxonomy );
			$permalink = get_term_link( $id, $taxonomy );
			$fonts     = get_term_meta( $id, 'tipi_builder_fonts', true );
			$is_page   = '';
		}

		$i18n      = ZeenI18n::zeen_i18n();
		$data      = ZeenHelpers::zeen_js_data( $taxonomy, $id );
		$templates = ZeenHelpers::zeen_templates();

		$frame_permalink = add_query_arg(
			array(
				'tipi_builder_frame' => 1,
			),
			$permalink
		);

		wp_localize_script(
			'zeen-main',
			'zeenB',
			array(
				'type'            => $type,
				'id'              => $id,
				'taxonomy'        => $taxonomy,
				'permalink'       => esc_url( $permalink ),
				'editor'          => esc_url( $editor ),
				'frame_permalink' => esc_url( $frame_permalink ),
				'root'            => esc_url_raw( rest_url() ) . 'codetipi-tipi-builder/v1/',
				'nonce'           => wp_create_nonce( 'wp_rest' ),
				'blockImgs'       => zeen_customizer_blocks( true, array(), array( 'type' => $is_page ) ),
				'i18n'            => $i18n,
				'templates'       => $templates,
				'data'            => $data,
			)
		);

	}

	/**
	 * Attachment Query Safe check
	 *
	 * @since 1.0.0
	 */
	public function zeen_ajax_query( $query ) {
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}
		return $query;
	}

	public function zeen_builder_save_post( $post_id, $post, $update ) {

		$parent_id = wp_is_post_revision( $post_id );

		if ( $parent_id ) {

			$parent            = get_post( $parent_id );
			$tipi_builder_data = get_post_meta( $parent->ID, 'tipi_builder_data', true );

			if ( false !== $tipi_builder_data ) {
				add_metadata( 'post', $post_id, 'tipi_builder_data', $tipi_builder_data );
			}
		}

	}
	public function zeen_wp_restore_post_revision( $post_id, $revision_id ) {
		$revision          = get_post( $revision_id );
		$tipi_builder_data = get_metadata( 'post', $revision->ID, 'tipi_builder_data', true );

		if ( false !== $tipi_builder_data ) {
			update_post_meta( $post_id, 'tipi_builder_data', $tipi_builder_data );
		} else {
			delete_post_meta( $post_id, 'tipi_builder_data' );
		}

	}
	public function zeen_wp_post_revision_fields( $fields ) {

		$fields['tipi_builder_data'] = 'Tipi Builder';
		return $fields;

	}

	public function zeen_builder_revision_field( $value, $field ) {

		global $revision;
		return get_metadata( 'post', $revision->ID, $field, true );

	}

}

new ZeenBuilder();
