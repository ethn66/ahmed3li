<?php
/**
 * Routes
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Data
 *
 * @since 1.0.0
 */
function zeen_call_b_data( $request ) {

	$parameters = $request->get_query_params();
	$id = $parameters['id'];
	$type = $parameters['type'];
	$taxonomy = $parameters['taxonomy'];
	$jsoned = '';
	if ( 'term' == $type ) {
		$data = get_term_meta( $id, 'tipi_builder_data', true );
		$ndp = get_term_meta( $id, 'tipi_builder_ndp', true );
		$header_overlap = get_term_meta( $id, 'zeen_header_overlap', true );
		$fonts = get_term_meta( $id, 'tipi_builder_fonts', true );
		$bg = get_term_meta( $id, 'zeen_background', true );
		$term_data = get_term_by( 'id', $id, $taxonomy );
		$tax_desc = $term_data->description;
		$title = $term_data->name;
		if ( empty( $data ) || ( ! empty( $data ) && '[]' == $data ) ) {
			$data = array(
				array(
					'preview' => 301,
					'label' => $title . ' ' . esc_html__( 'Title', 'zeen' ),
					'uid' => zeen_uid(),
				),
				array(
					'preview' => 300,
					'uid' => zeen_uid(),
					'label' => $title . ' ' . esc_html__( 'Posts', 'zeen' ),
				),
			);
			$jsoned = true;
		}
	} else {
		$ndp = get_post_meta( $id, 'tipi_builder_ndp', true );
		$header_overlap = get_post_meta( $id, 'zeen_header_overlap', true );
		$fonts = get_post_meta( $id, 'tipi_builder_fonts', true );
		$data = get_post_meta( $id, 'tipi_builder_data', true );
		$bg = get_post_meta( $id, 'zeen_background', true );
		$title = get_the_title( $id );
	}
	$data_op = TipiBuilder\ZeenHelpers::zeen_data_op();

	if ( empty( $bg ) ) {
		$bg = array(
			'color' => '',
			'src' => '',
			'repeat' => $data_op['bg_repeat'][0],
		);
	} else {
		$bg['repeat'] = $data_op['bg_repeat'][ $bg['repeat'] - 1 ];
		$bg['color'] = empty( $bg['color'] ) ? '' : $bg['color'];
	}
	$fonts_output = array();
	if ( ! empty( $fonts ) ) {
		foreach ( $fonts as $key => $value ) {
			$fonts_output[] = array(
				'key' => $value,
				'name' => $value,
			);
		}
	}
	if ( empty( $header_overlap ) ) {
		$header_overlap = [
			'enabled' => 'off',
			'inverse' => 'off',
			'skin' => '1',
		];
	}
	$_GET['ndp'] = $ndp;
	$settings = array(
		'ndp' => $ndp,
		'headerOverlap' => $header_overlap,
		'bg' => $bg,
		'fonts' => $fonts_output,
	);

	if ( 'term' == $type ) {
		$settings['tax_desc'] = $tax_desc;
	}
	$settings['title'] = $title;

	return array(
		'data' => TipiBuilder\ZeenHelpers::zeen_data( $data, $jsoned ),
		'settings' => $settings,
	);

}

/**
 * Import
 *
 * @since 1.0.0
 */
function zeen_call_b_import( $request ) {

	$body = $request->get_body();
	$body = json_decode( $body );
	$data = TipiBuilder\ZeenHelpers::zeen_save_sanitize( $body->blocks );
	return TipiBuilder\ZeenHelpers::zeen_data( wp_json_encode( $data ) );

}

/**
 * Import Template
 *
 * @since 1.0.0
 */
function zeen_call_b_import_template( $request ) {

	$parameters = $request->get_query_params();
	$id = $parameters['id'];
	$template = wp_remote_get( get_parent_theme_file_uri( 'inc/builder/assets/templates/' . esc_attr( $id ) . '.json' ) );
	$template = json_decode( wp_remote_retrieve_body( $template ) );
	$template = TipiBuilder\ZeenHelpers::zeen_save_sanitize( $template );
	return TipiBuilder\ZeenHelpers::zeen_data( wp_json_encode( $template ) );

}

/**
 * Data
 *
 * @since 1.0.0
*/
function zeen_call_b_data_s( $request ) {

	$body = $request->get_body();
	$parameters = $request->get_query_params();
	$id = $parameters['id'];
	$type = $parameters['type'];
	$taxonomy = $parameters['taxonomy'];
	$sanitized_content = '';
	$body = json_decode( $body );
	$sanitized_blocks = TipiBuilder\ZeenHelpers::zeen_save_sanitize( $body->blocks, $id );
	$active = empty( $sanitized_blocks ) ? '' : '1';
	if ( 'term' == $type ) {
		update_term_meta( $id, 'tipi_builder_data', wp_slash( wp_json_encode( $sanitized_blocks ) ) );
		update_term_meta( $id, 'tipi_builder_active', esc_attr( $active ) );
		update_term_meta( $id, 'tipi_builder_ndp', esc_attr( $body->settings->ndp ) );
		update_term_meta( $id, 'zeen_header_overlap',
			array(
				'enabled' => esc_attr( $body->settings->headerOverlap->enabled ),
				'inverse' => esc_attr( $body->settings->headerOverlap->inverse ),
				'skin' => esc_attr( $body->settings->headerOverlap->skin ),
			)
		);
		update_term_meta( $id, 'tipi_builder_fonts', zeen_sanitizer_fonts( $body->settings->fonts ) );
		update_term_meta( $id, 'zeen_background', array( 'src' => esc_url( $body->settings->bg->src ), 'color' => esc_attr( $body->settings->bg->color ), 'repeat' => intval( $body->settings->bg->repeat->value ) + 1 ) );
		wp_update_term( $id, $taxonomy, array(
			'description' => zeen_sanitize_wp_kses( $body->settings->description ),
		));
	} else {
		update_post_meta( $id, 'tipi_builder_data', wp_slash( wp_json_encode( $sanitized_blocks ) ) );
		update_post_meta( $id, 'tipi_builder_active', esc_attr( $active ) );
		update_post_meta( $id, 'tipi_builder_ndp', esc_attr( $body->settings->ndp ) );
		update_post_meta( $id, 'zeen_header_overlap',
			array(
				'enabled' => esc_attr( $body->settings->headerOverlap->enabled ),
				'inverse' => esc_attr( $body->settings->headerOverlap->inverse ),
				'skin' => esc_attr( $body->settings->headerOverlap->skin ),
			)
		);
		update_post_meta( $id, 'tipi_builder_fonts', zeen_sanitizer_fonts( $body->settings->fonts ) );
		update_post_meta( $id, 'zeen_background',
			array(
				'src' => esc_url( $body->settings->bg->src ),
				'color' => esc_attr( $body->settings->bg->color ),
				'repeat' => ( intval( $body->settings->bg->repeat->value ) + 1 ),
			)
		);

		$post_filtered = TipiBuilder\ZeenHelpers::zeen_save_filtered( $body->blocks );
		wp_update_post( array(
			'ID' => (int) $id,
			'post_title' => zeen_sanitize_wp_kses( $body->settings->title ),
			'post_content' => $post_filtered,
		) );

		return $post_filtered;
	}
}

/**
 * New
 *
 * @since 1.0.0
 */
function zeen_call_b_new( $request ) {

	$parameters = $request->get_query_params();
	$body = $request->get_body();
	$taxonomy = $parameters['taxonomy'];
	$id = $parameters['id'];
	$new_block = json_decode( $body );
	return TipiBuilder\ZeenHelpers::zeen_new( $new_block, $taxonomy, $id );
}

/**
 * Updater
 *
 * @since 1.0.0
 */
function zeen_call_b_update( $request ) {
	$parameters = $request->get_query_params();
	$body = $request->get_body();
	$body = json_decode( $body );
	$output = array();
	foreach ( $body as $key => $value ) {
		$output[ $key ] = TipiBuilder\ZeenHelpers::zeen_update( $value );
		if ( ! empty( $value->nested ) ) {
			foreach ( $value->nested as $nests => $nest ) {
				foreach ( $nest as $sub_nest => $nest_val ) {
					$output[ $key ]['nested'][ $nests ][ $sub_nest ] = TipiBuilder\ZeenHelpers::zeen_update( $nest_val );
				}
			}
		}
	}
	return $output;
}

/**
 * Routes
 *
 * @since 1.0.0
 */
function zeen_b_routes() {

	register_rest_route( 'codetipi-tipi-builder/v1', '/b_update', array(
		'methods' => array( 'GET', 'POST' ),
		'callback' => 'zeen_call_b_update',
		'permission_callback' => function () {
			return current_user_can( 'edit_others_posts' );
		},
	) );

	register_rest_route( 'codetipi-tipi-builder/v1', '/b_new', array(
		'methods' => array( 'GET', 'POST' ),
		'callback' => 'zeen_call_b_new',
		'permission_callback' => function () {
			return current_user_can( 'edit_others_posts' );
		},
	) );

	register_rest_route( 'codetipi-tipi-builder/v1', '/b_data', array(
		'methods' => array( 'GET', 'POST' ),
		'callback' => 'zeen_call_b_data',
		'permission_callback' => function () {
			return current_user_can( 'edit_others_posts' );
		},
	) );

	register_rest_route( 'codetipi-tipi-builder/v1', '/b_import', array(
		'methods' => array( 'GET', 'POST' ),
		'callback' => 'zeen_call_b_import',
		'permission_callback' => function () {
			return current_user_can( 'edit_others_posts' );
		},
	) );

	register_rest_route( 'codetipi-tipi-builder/v1', '/b_import_template', array(
		'methods' => array( 'GET' ),
		'callback' => 'zeen_call_b_import_template',
		'permission_callback' => function () {
			return current_user_can( 'edit_others_posts' );
		},
	) );

	register_rest_route( 'codetipi-tipi-builder/v1', '/b_data_s', array(
		'methods' => array( 'GET', 'POST' ),
		'callback' => 'zeen_call_b_data_s',
		'permission_callback' => function () {
			return current_user_can( 'edit_others_posts' );
		},
	) );

}
add_action( 'rest_api_init', 'zeen_b_routes' );
