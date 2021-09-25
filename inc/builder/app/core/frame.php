<?php
/**
 * Zeen builder frame
 *
 * @since 1.0.0
 */

function zeen_frame_wrap( $classes ) {
	if ( TipiBuilder\ZeenHelpers::zeen_frame_call() ) {
		$classes[] = 'tipi-builder-frame-inner';
	}
	return $classes;
}
add_filter( 'body_class', 'zeen_frame_wrap' );

function zeen_builder_frame_scripts() {
	if ( TipiBuilder\ZeenHelpers::zeen_frame_call() ) {
		wp_enqueue_style( 'zeen-builder-style', ZEEN_BUILDER_URI . '/assets/css/builder-style.css', array(), ZEEN_BUILDER_VERSION );
		wp_enqueue_style( 'zeen-builder-icons', ZEEN_BUILDER_URI . '/assets/css/fonts/builder-icons.css', array(), ZEEN_BUILDER_VERSION );
		wp_enqueue_script( 'flickity-fade', get_parent_theme_file_uri( 'assets/js/flickity-fade.min.js' ), array( 'flickity' ), '1.0.0', true );
		wp_enqueue_script( 'flickity', get_parent_theme_file_uri( 'assets/js/flickity.pkgd.min.js' ), array(), '2.2.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'zeen_builder_frame_scripts' );
