<?php
/**
 * Zeen Actions
 *
 * @copyright   Copyright Codetipi
 * @since 		1.0.0
*/
namespace TipiBuilder;

class ZeenAdminActions {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	*/
	public function __construct() {
		add_filter( 'page_row_actions', array( $this, 'zeen_p_row_actions' ), 10, 2 );
		add_filter( 'display_post_states', array( $this, 'zeen_p_post_states' ), 10, 2 );
	}

	function zeen_p_post_states( $states = array(), $post = '' ) {

		if ( 'page' == get_post_type( $post->ID ) ) {
			$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
			if ( ! empty( $builder ) ) {
				$states[] = 'Tipi Builder';
			}
		}

		return $states;
	}

	/**
	 * Rows
	 *
	 * @since 1.0.0
	*/
	function zeen_p_row_actions( $actions, $post ) {

		if ( current_user_can( 'edit_post', $post->ID ) && is_user_logged_in() ) {
			$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
			if ( ! empty( $builder ) ) {
				$actions['tipi_builder'] = self::zeen_get_url( array( 'item_id' => $post->ID ), esc_attr__( 'Edit With Tipi Builder', 'zeen' ) );
			}
		}

		return $actions;
	}

	/**
	 * Get URL
	 *
	 * @since 1.0.0
	*/
	static function zeen_get_url( $args, $label ) {

		$url = add_query_arg( array( 'tipi_builder' => '1', 'pid' => $args['item_id'] ), get_permalink( $args['item_id'] ) );

		return sprintf(
			'<a href="%s" class="builder-launcher">%s</a>',
			esc_url( $url ),
			esc_attr( $label )
		);
	}

}
new ZeenAdminActions();
