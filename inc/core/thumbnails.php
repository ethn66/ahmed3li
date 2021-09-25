<?php
/**
 * Thumbnails
 *
 * @package Zeen
 * @since 1.0.0
 */

if ( ! function_exists( 'zeen_thumbnails' ) ) {
	function zeen_thumbnails() {

		$sizes = zeen_thumbnail_sizes();

		foreach ( $sizes as $key ) {
			$key[2] = empty( $key[2] ) ? true : $key[2];
			$key['height'] = 'full' == $key['height'] ? '' : $key['height'];
			if ( get_theme_mod( 'thumb_' . $key['label_width'] . 'x' . $key['label_height'], 1 ) == 1 ) {
				add_image_size( 'zeen-' . $key['label_width'] . '-' . $key['label_height'], $key['width'], $key['height'], $key[2] );
			}
		}
	}
}
add_action( 'after_setup_theme', 'zeen_thumbnails' );
