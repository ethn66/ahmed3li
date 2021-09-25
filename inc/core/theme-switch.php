<?php
/**
 * Theme switch
 *
 * @package Zeen
 * @since 1.0.0
 */

function zeen_theme_switch() {

	if ( get_option( 'medium_large_size_w' ) !== 770 ) {
		update_option( 'medium_large_size_w', 770 );
	}

	update_option( 'thumbnail_size_w', 100 );
	update_option( 'thumbnail_size_h', 100 );

	update_option( 'wsl_settings_social_icon_set', 'none' );
	update_option( 'wsl_settings_widget_display', 4 );

	zeen_lr_cat_check();
}

add_action( 'after_switch_theme', 'zeen_theme_switch' );
