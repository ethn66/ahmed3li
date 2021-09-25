<?php
/**
 * Theme support
 *
 * @package Zeen
 * @since 1.0.0
 */

function zeen_theme_support() {

	// Title Tag
	add_theme_support( 'title-tag' );

	// Wp thumbnails
	add_theme_support( 'post-thumbnails' );

	// Default thumb size
	set_post_thumbnail_size( 1155, 770, true );

	// RSS
	add_theme_support( 'automatic-feed-links' );
	$site_width_adjustment = get_theme_mod( 'site_width', 1230 );
	$site_width_adjustment = (int) ( ( $site_width_adjustment - 1230 ) * 0.6666 );
	// WooCommerce
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 390 + $site_width_adjustment,
		'single_image_width' => 770 + $site_width_adjustment,
		'gallery_thumbnail_image_width' => 200,
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Sensei
	add_theme_support( 'sensei' );

	// Adding post format support
	add_theme_support( 'post-formats',
		array(
			'video',
			'audio',
			'gallery',
		)
	);

	// registering menus
	$menus = array();
	$style = zeen_get_style();
	$menus['main'] = esc_html__( 'Main Navigation Menu', 'zeen' );
	if ( 12 == $style ) {
		$menus['main'] = esc_html__( 'Main Navigation Menu (Left Side)', 'zeen' );
		$menus['main_b'] = esc_html__( 'Main Navigation Menu (Right Side)', 'zeen' );
	}
	$menus['secondary'] = esc_html__( 'Secondary Navigation Menu', 'zeen' );
	$menus['footer'] = esc_html__( 'Footer Navigation Menu', 'zeen' );
	$menus['mobile'] = esc_html__( 'Mobile Menu', 'zeen' );
	register_nav_menus( $menus );

	// Output HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Selective widget refresh
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Extra alignments
	add_theme_support( 'align-wide' );

	// Textdomain
	load_theme_textdomain( 'zeen', get_parent_theme_file_path( 'languages' ) );

	remove_theme_support( 'widgets-block-editor' );

}
add_action( 'after_setup_theme', 'zeen_theme_support' );
