<?php
/**
 * Customizer settings extended
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Get categories
 *
 * @since  1.0.0
 */
function zeen_customizer_categories() {
	$cats       = array();
	$categories = get_categories(
		array(
			'orderby' => 'name',
			'order'   => 'ASC',
		)
	);
	foreach ( $categories as $key ) {
		$cats[ $key->term_id ] = $key->name;
	}
	return $cats;
}

/**
 * Get Singular Header
 *
 * @since  1.0.0
 */
function zeen_customizer_singular_headers( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[0]  = array( 'url' => esc_url( $src_uri ) . 'off.png' );
	$output[51] = array( 'url' => esc_url( $src_uri ) . 'header-51.png' );
	$output[52] = array( 'url' => esc_url( $src_uri ) . 'header-52.png' );
	$output[53] = array( 'url' => esc_url( $src_uri ) . 'header-53.png' );
	$output[54] = array( 'url' => esc_url( $src_uri ) . 'header-54.png' );
	$output[55] = array( 'url' => esc_url( $src_uri ) . 'header-55.png' );
	$output[58] = array( 'url' => esc_url( $src_uri ) . 'header-58.png' );
	return $output;
}

/**
 * Get Media
 *
 * @since  1.0.0
 */
function zeen_customizer_md_v( $src_uri = true, $output = array() ) {

	$src_uri    = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;
	$output[1]  = array(
		'url' => esc_url( $src_uri ) . 'md-v-1.gif',
		'alt' => 'md-a-1.gif',
	);
	$output[2]  = array(
		'url' => esc_url( $src_uri ) . 'md-v-2.gif',
		'alt' => 'md-a-2.gif',
	);
	$output[11] = array(
		'url' => esc_url( $src_uri ) . 'md-v-11.png',
		'alt' => 'md-a-11.png',
	);
	$output[21] = array(
		'url' => esc_url( $src_uri ) . 'md-21.png',
		'alt' => 'md-21.png',
	);
	$output[12] = array(
		'url' => esc_url( $src_uri ) . 'md-v-12.png',
		'alt' => 'md-a-12.png',
	);

	return $output;
}

/**
 * Get Gallery
 *
 * @since  1.0.0
 */
function zeen_customizer_md_g( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[1] = array( 'url' => esc_url( $src_uri ) . 'md-g-1.png' );
	$output[2] = array( 'url' => esc_url( $src_uri ) . 'md-g-2.png' );

	return $output;
}


/**
 * Get Hero Designs
 *
 * @since  1.0.0
 */
function zeen_customizer_hero_designs( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[1]  = array( 'url' => esc_url( $src_uri ) . 'hero-1.png' );
	$output[2]  = array( 'url' => esc_url( $src_uri ) . 'hero-2.png' );
	$output[3]  = array( 'url' => esc_url( $src_uri ) . 'hero-3.png' );
	$output[4]  = array( 'url' => esc_url( $src_uri ) . 'hero-4.png' );
	$output[5]  = array( 'url' => esc_url( $src_uri ) . 'hero-5.png' );
	$output[11] = array( 'url' => esc_url( $src_uri ) . 'hero-11.png' );
	$output[12] = array( 'url' => esc_url( $src_uri ) . 'hero-12.png' );
	$output[13] = array( 'url' => esc_url( $src_uri ) . 'hero-13.png' );
	$output[14] = array( 'url' => esc_url( $src_uri ) . 'hero-14.png' );
	$output[15] = array( 'url' => esc_url( $src_uri ) . 'hero-15.png' );
	$output[16] = array( 'url' => esc_url( $src_uri ) . 'hero-16.png' );
	$output[17] = array( 'url' => esc_url( $src_uri ) . 'hero-17.png' );
	$output[18] = array( 'url' => esc_url( $src_uri ) . 'hero-18.png' );
	$output[19] = array( 'url' => esc_url( $src_uri ) . 'hero-19.png' );
	$output[21] = array( 'url' => esc_url( $src_uri ) . 'hero-21.png' );
	$output[22] = array( 'url' => esc_url( $src_uri ) . 'hero-22.png' );
	$output[23] = array( 'url' => esc_url( $src_uri ) . 'hero-23.png' );
	$output[24] = array( 'url' => esc_url( $src_uri ) . 'hero-24.png' );
	$output[25] = array( 'url' => esc_url( $src_uri ) . 'hero-25.png' );
	$output[26] = array( 'url' => esc_url( $src_uri ) . 'hero-26.png' );
	$output[27] = array( 'url' => esc_url( $src_uri ) . 'hero-27.png' );
	$output[31] = array( 'url' => esc_url( $src_uri ) . 'hero-31.gif' );
	$output[41] = array( 'url' => esc_url( $src_uri ) . 'hero-41.png' );
	$output[42] = array( 'url' => esc_url( $src_uri ) . 'hero-42.png' );
	$output[43] = array( 'url' => esc_url( $src_uri ) . 'hero-43.png' );
	$output[9]  = array( 'url' => esc_url( $src_uri ) . 'hero-9.png' );
	$output[10] = array( 'url' => esc_url( $src_uri ) . 'hero-10.png' );
	$output[8]  = array( 'url' => esc_url( $src_uri ) . 'hero-8.png' );

	return $output;

}
function zeen_customizer_product_designs( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[1] = array( 'url' => esc_url( $src_uri ) . 'woo-product-1.png' );
	$output[2] = array( 'url' => esc_url( $src_uri ) . 'woo-product-2.png' );
	$output[3] = array( 'url' => esc_url( $src_uri ) . 'woo-product-3.png' );
	$output[4] = array( 'url' => esc_url( $src_uri ) . 'woo-product-4.png' );
	$output[5] = array( 'url' => esc_url( $src_uri ) . 'woo-product-5.png' );
	$output[6] = array( 'url' => esc_url( $src_uri ) . 'woo-product-6.png' );
	$output[7] = array( 'url' => esc_url( $src_uri ) . 'woo-product-7.png' );

	return $output;

}

function zeen_customizer_product_tabs_designs( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[1] = array( 'url' => esc_url( $src_uri ) . 'woo-tabs-1.png' );
	$output[2] = array( 'url' => esc_url( $src_uri ) . 'woo-tabs-2.png' );
	$output[3] = array( 'url' => esc_url( $src_uri ) . 'woo-tabs-3.png' );

	return $output;

}
function zeen_customizer_product_layout_width( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[1] = array( 'url' => esc_url( $src_uri ) . 'woo-description-width-1.png' );
	$output[2] = array( 'url' => esc_url( $src_uri ) . 'woo-description-width-2.png' );

	return $output;

}



/**
 * Get Hero Designs
 *
 * @since  1.0.0
 */
function zeen_customizer_article_layout_designs( $src_uri = true, $output = array(), $pages = false ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : $src_uri;

	$output[1] = array( 'url' => esc_url( $src_uri ) . 'article-layout-1.png' );
	if ( empty( $pages ) ) {
		$output[2] = array( 'url' => esc_url( $src_uri ) . 'article-layout-2.gif' );
	}
	$output[11] = array( 'url' => esc_url( $src_uri ) . 'article-layout-11.png' );
	if ( empty( $pages ) ) {
		$output[12] = array( 'url' => esc_url( $src_uri ) . 'article-layout-12.gif' );
	}
	$output[31] = array( 'url' => esc_url( $src_uri ) . 'article-layout-31.png' );
	if ( empty( $pages ) ) {
		$output[32] = array( 'url' => esc_url( $src_uri ) . 'article-layout-32.gif' );
	}
	$output[36] = array( 'url' => esc_url( $src_uri ) . 'article-layout-36.png' );
	$output[51] = array( 'url' => esc_url( $src_uri ) . 'article-layout-51.png' );
	$output[55] = array( 'url' => esc_url( $src_uri ) . 'article-layout-55.png' );
	if ( empty( $pages ) && empty( $src_uri ) ) {
		$output[58] = array( 'url' => esc_url( $src_uri ) . 'article-layout-58.gif' );
		$output[59] = array( 'url' => esc_url( $src_uri ) . 'article-layout-59.gif' );
	}

	return $output;

}

/**
 * Get Font Weights
 *
 * @since  1.0.0
 */
function zeen_customizer_font_weights( $args = array() ) {
	$weights = array(
		'100'       => 'Thin (100)',
		'100italic' => 'Thin Italic (100)',
		'200'       => 'Extra-light (200)',
		'200italic' => 'Extra-light Italic (200)',
		'300'       => 'Light (300)',
		'300italic' => 'Light Italic (300)',
		'400'       => 'Regular (400)',
		'400italic' => 'Regular Italic (400)',
		'500'       => 'Medium (500)',
		'500italic' => 'Medium Italic (500)',
		'600'       => 'Semi-bold (600)',
		'600italic' => 'Semi-bold Italic (600)',
		'700'       => 'Bold (700)',
		'700italic' => 'Bold Italic (700)',
		'800'       => 'Extra-bold (800)',
		'800italic' => 'Extra-bold Italic (800)',
		'900'       => 'Black (900)',
		'900italic' => 'Black Italic (900)',
	);

	if ( ! empty( $args ) ) {
		$weights = array_merge( $args, $weights );
	}

	return $weights;
}


/**
 * Get layouts list
 *
 * @since  1.0.0
 */
function zeen_customizer_layouts( $src_uri = true, $output = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : '';

	$output[1]  = array( 'url' => esc_url( $src_uri ) . 'layout-1.png' );
	$output[2]  = array( 'url' => esc_url( $src_uri ) . 'layout-2.png' );
	$output[5]  = array( 'url' => esc_url( $src_uri ) . 'layout-5.png' );
	$output[21] = array( 'url' => esc_url( $src_uri ) . 'layout-21.png' );
	$output[22] = array( 'url' => esc_url( $src_uri ) . 'layout-22.png' );
	$output[24] = array( 'url' => esc_url( $src_uri ) . 'layout-24.png' );
	$output[26] = array( 'url' => esc_url( $src_uri ) . 'layout-26.png' );
	$output[27] = array( 'url' => esc_url( $src_uri ) . 'layout-27.png' );
	$output[28] = array( 'url' => esc_url( $src_uri ) . 'layout-28.png' );
	$output[29] = array( 'url' => esc_url( $src_uri ) . 'layout-29.png' );
	$output[41] = array( 'url' => esc_url( $src_uri ) . 'layout-41.png' );
	$output[42] = array( 'url' => esc_url( $src_uri ) . 'layout-42.png' );
	$output[44] = array( 'url' => esc_url( $src_uri ) . 'layout-44.png' );
	$output[61] = array( 'url' => esc_url( $src_uri ) . 'layout-61.png' );
	$output[64] = array( 'url' => esc_url( $src_uri ) . 'layout-64.png' );
	$output[65] = array( 'url' => esc_url( $src_uri ) . 'layout-65.png' );
	$output[68] = array( 'url' => esc_url( $src_uri ) . 'layout-68.png' );
	$output[71] = array( 'url' => esc_url( $src_uri ) . 'layout-71.png' );
	$output[72] = array( 'url' => esc_url( $src_uri ) . 'layout-72.png' );
	$output[79] = array( 'url' => esc_url( $src_uri ) . 'layout-79.png' );
	$output[62] = array( 'url' => esc_url( $src_uri ) . 'layout-62.png' );
	$output[63] = array( 'url' => esc_url( $src_uri ) . 'layout-63.png' );
	$output[81] = array( 'url' => esc_url( $src_uri ) . 'layout-81.png' );
	$output[82] = array( 'url' => esc_url( $src_uri ) . 'layout-82.png' );
	$output[83] = array( 'url' => esc_url( $src_uri ) . 'layout-83.png' );
	$output[84] = array( 'url' => esc_url( $src_uri ) . 'layout-84.png' );
	$output[91] = array( 'url' => esc_url( $src_uri ) . 'layout-91.png' );
	$output[92] = array( 'url' => esc_url( $src_uri ) . 'layout-92.png' );
	$output[93] = array( 'url' => esc_url( $src_uri ) . 'layout-93.png' );
	$output[94] = array( 'url' => esc_url( $src_uri ) . 'layout-94.png' );
	$output[97] = array( 'url' => esc_url( $src_uri ) . 'layout-97.png' );

	foreach ( $output as $key => $value ) {
		$value['url']             = rtrim( $value['url'], '/' );
		$ext                      = substr( $value['url'], -3 );
		$retina                   = 'png' == $ext ? substr_replace( $value['url'], '@2x', -4, 0 ) : '';
		$output[ $key ]['srcset'] = $retina;
	}

	return $output;
}

/**
 * Grid values
 *
 * @since  1.0.0
 */
function zeen_customizer_grid_values() {
	return array( 81, 82, 83, 84, 91, 92, 93, 94, 95, 96, 97, 98, 99 );
}

/**
 * Get block list
 *
 * @since  1.0.0
 */
function zeen_customizer_blocks( $src_uri = true, $output = array(), $args = array() ) {

	$src_uri = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : '';

	$tag_sb            = esc_html__( 'Sidebar', 'zeen' ) . ',' . esc_html__( 'Widgets Area', 'zeen' );
	$tag_slider        = esc_html__( 'Slider', 'zeen' );
	$tag_classic       = esc_html__( 'Classic', 'zeen' );
	$tag_thumb         = esc_html__( 'Thumbnail', 'zeen' );
	$tag_thumb_round   = esc_html__( 'Round', 'zeen' );
	$tag_posts         = esc_html__( 'Posts', 'zeen' );
	$tag_masonry       = 'Masonry';
	$tag_sticky_mid    = esc_html__( 'Sticky Big Post', 'zeen' );
	$tag_videos        = esc_html__( 'Videos', 'zeen' );
	$tag_insta         = 'Instagram';
	$tag_parallax      = 'Parallax';
	$tag_mail          = esc_html__( 'Mailing List', 'zeen' ) . ',Mailchimp,subscri';
	$tag_authors       = esc_html__( 'Authors', 'zeen' );
	$tag_text          = esc_html__( 'Text Editor', 'zeen' );
	$tag_quote         = esc_html__( 'Quote', 'zeen' );
	$tag_custom_code   = esc_html__( 'Custom Code', 'zeen' ) . ',html,shortcode';
	$tag_img           = esc_html__( 'Image', 'zeen' );
	$tag_cta           = esc_html__( 'Call To Action', 'zeen' ) . ',cta';
	$tag_button        = esc_html__( 'Button', 'zeen' );
	$tag_heading       = esc_html__( 'Heading', 'zeen' );
	$tag_advertisement = esc_html__( 'Advertisement', 'zeen' );
	$tag_spacer        = esc_html__( 'Spacer', 'zeen' ) . ',' . esc_html__( 'Separator', 'zeen' );
	$tag_grid          = esc_html__( 'Grid', 'zeen' );
	$tag_col           = esc_html__( 'Columns', 'zeen' );
	$tag_default       = esc_html__( 'Archive', 'zeen' ) . ',' . esc_html__( 'Default', 'zeen' );

	$output[] = array(
		'p'       => 300,
		'icon'    => esc_url( $src_uri ) . 'block-icon-de.png',
		'default' => 4,
		'tags'    => $tag_default,
		'title'   => esc_html__( 'Default Posts', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-300.png',
	);
	if ( empty( $args['type'] ) ) {
		$output[] = array(
			'p'       => 301,
			'icon'    => esc_url( $src_uri ) . 'block-icon-de.png',
			'default' => 4,
			'tags'    => $tag_default,
			'title'   => esc_html__( 'Default Title Box', 'zeen' ),
			'url'     => esc_url( $src_uri ) . 'block-300.png',
		);
	}
	$output[] = array(
		'p'       => 66,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 5,
		'tags'    => $tag_posts . ',5,' . $tag_masonry . ',' . $tag_sticky_mid,
		'title'   => esc_html__( 'Sticky Big Post', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-66.png',
	);
	$output[] = array(
		'p'       => 62,
		'icon'    => esc_url( $src_uri ) . 'block-icon-portrait.png',
		'default' => 3,
		'tags'    => $tag_posts . ',3',
		'title'   => esc_html__( 'Portrait A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-62.png',
	);
	$output[] = array(
		'p'       => 64,
		'icon'    => esc_url( $src_uri ) . 'block-icon-masonry.png',
		'default' => 4,
		'tags'    => $tag_posts . ',3,' . $tag_masonry,
		'title'   => esc_html__( 'Masonry B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-64.png',
	);
	$output[] = array(
		'p'       => 65,
		'icon'    => esc_url( $src_uri ) . 'block-icon-65.png',
		'default' => 5,
		'tags'    => $tag_posts . ',5,' . $tag_masonry . ',' . $tag_parallax,
		'title'   => esc_html__( 'Parallax Articles', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-65.png',
	);

	$output[] = array(
		'p'       => 81,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 1,
		'tags'    => $tag_posts . ',1,' . $tag_grid,
		'title'   => esc_html__( 'Grid A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-81.png',
	);
	$output[] = array(
		'p'       => 82,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 2,
		'tags'    => $tag_posts . ',2,' . $tag_grid,
		'title'   => esc_html__( 'Grid B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-82.png',
	);
	$output[] = array(
		'p'       => 83,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 3,
		'tags'    => $tag_posts . ',3,' . $tag_grid,
		'title'   => esc_html__( 'Grid C', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-83.png',
	);
	$output[] = array(
		'p'       => 84,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 4,
		'tags'    => $tag_posts . ',4,' . $tag_grid,
		'title'   => esc_html__( 'Grid D', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-84.png',
	);
	$output[] = array(
		'p'       => 86,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 3,
		'tags'    => $tag_posts . ',3,' . $tag_grid,
		'title'   => esc_html__( 'Grid F', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-86.png',
	);

	$output[] = array(
		'p'       => 74,
		'icon'    => esc_url( $src_uri ) . 'block-icon-hoverer.png',
		'default' => 3,
		'tags'    => $tag_posts . ',' . $tag_grid,
		'title'   => esc_html__( 'Grid Special Hover', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-74.png',
	);
	$output[] = array(
		'p'       => 91,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 3,
		'tags'    => $tag_posts . ',1,2,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-91.png',
	);
	$output[] = array(
		'p'       => 92,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 5,
		'tags'    => $tag_posts . ',5,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-92.png',
	);
	$output[] = array(
		'p'       => 93,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 3,
		'tags'    => $tag_posts . ',3,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix C', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-93.png',
	);
	$output[] = array(
		'p'       => 98,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 3,
		'tags'    => $tag_posts . ',3,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix C Alt', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-98.png',
	);
	$output[] = array(
		'p'       => 94,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 4,
		'tags'    => $tag_posts . ',4,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix D', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-94.png',
	);
	$output[] = array(
		'p'       => 95,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 5,
		'tags'    => $tag_posts . ',5,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix E', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-95.png',
	);
	$output[] = array(
		'p'       => 96,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 4,
		'tags'    => $tag_posts . ',4,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix F', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-96.png',
	);
	$output[] = array(
		'p'       => 97,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 4,
		'tags'    => $tag_posts . ',4,' . $tag_grid,
		'title'   => esc_html__( 'Grid Mix G', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-97.png',
	);

	$output[] = array(
		'p'       => 69,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 4,
		'tags'    => $tag_posts . ',4,' . $tag_classic,
		'title'   => esc_html__( 'Grid Classic Mix', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-69.png',
	);

	$output[] = array(
		'p'       => 51,
		'icon'    => esc_url( $src_uri ) . 'block-icon-slider.png',
		'default' => 3,
		'tags'    => $tag_slider . ',' . $tag_posts . ',1',
		'title'   => esc_html__( 'Slider A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-51.png',
	);
	$output[] = array(
		'p'       => 52,
		'icon'    => esc_url( $src_uri ) . 'block-icon-slider.png',
		'default' => 4,
		'tags'    => $tag_slider . ',' . $tag_posts . ',2',
		'title'   => esc_html__( 'Slider B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-52.png',
	);
	$output[] = array(
		'p'       => 53,
		'icon'    => esc_url( $src_uri ) . 'block-icon-slider.png',
		'default' => 6,
		'tags'    => $tag_slider . ',' . $tag_posts . ',3',
		'title'   => esc_html__( 'Slider C', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-53.png',
	);
	$output[] = array(
		'p'       => 54,
		'icon'    => esc_url( $src_uri ) . 'block-icon-slider.png',
		'default' => 8,
		'tags'    => $tag_slider . ',' . $tag_posts . ',4',
		'title'   => esc_html__( 'Slider D', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-54.png',
	);
	$output[] = array(
		'p'       => 56,
		'icon'    => esc_url( $src_uri ) . 'block-icon-slider.png',
		'default' => 3,
		'tags'    => $tag_slider . ',' . $tag_posts . ',2',
		'title'   => esc_html__( 'Slider E', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-56.png',
	);
	$output[] = array(
		'p'       => 61,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 3,
		'tags'    => $tag_posts . ',3,' . $tag_classic,
		'title'   => esc_html__( 'Classic C', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-61.png',
	);

	$output[] = array(
		'p'       => 1,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 4,
		'tags'    => $tag_posts . ',1,' . $tag_classic,
		'title'   => esc_html__( 'Classic', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-1.png',
	);
	$output[] = array(
		'p'       => 2,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 4,
		'tags'    => $tag_posts . ',1,' . $tag_classic,
		'title'   => esc_html__( 'Classic Big A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-2.png',
	);

	$output[] = array(
		'p'       => 3,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 1,
		'tags'    => $tag_posts . ',1,' . $tag_classic,
		'title'   => esc_html__( 'Classic Big B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-3.png',
	);

	$output[] = array(
		'p'       => 21,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-2.png',
		'default' => 4,
		'tags'    => $tag_posts . ',2,' . $tag_classic,
		'title'   => esc_html__( 'Classic B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-21.png',
	);
	$output[] = array(
		'p'       => 22,
		'icon'    => esc_url( $src_uri ) . 'block-icon-thumbnail.png',
		'default' => 4,
		'tags'    => $tag_thumb . ',' . $tag_posts . ',2',
		'title'   => esc_html__( 'Thumbnails', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-22.png',
	);
	$output[] = array(
		'p'       => 24,
		'icon'    => esc_url( $src_uri ) . 'block-icon-masonry.png',
		'default' => 4,
		'tags'    => '2,' . $tag_masonry . ',' . $tag_classic,
		'title'   => esc_html__( 'Masonry A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-24.png',
	);
	$output[] = array(
		'p'       => 25,
		'icon'    => esc_url( $src_uri ) . 'block-icon-thumbnail-round.png',
		'default' => 4,
		'tags'    => $tag_thumb . ',' . $tag_posts . ',2,' . $tag_thumb_round,
		'title'   => esc_html__( 'Thumbnails', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-25.png',
	);

	$output[] = array(
		'p'       => 71,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 4,
		'tags'    => $tag_posts . ',4,' . $tag_classic,
		'title'   => esc_html__( 'Classic D', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-71.png',
	);
	$output[] = array(
		'p'       => 79,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-1.png',
		'default' => 5,
		'tags'    => $tag_posts . ',5,' . $tag_classic,
		'title'   => esc_html__( 'Classic E', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-79.png',
	);

	$output[] = array(
		'p'       => 41,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-2.png',
		'default' => 4,
		'tags'    => 'mix,' . $tag_posts . ',1',
		'title'   => esc_html__( 'Mix A', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-41.png',
	);
	$output[] = array(
		'p'       => 42,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-2.png',
		'default' => 4,
		'tags'    => 'mix,' . $tag_posts . ',1,2',
		'title'   => esc_html__( 'Mix B', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-42.png',
	);
	$output[] = array(
		'p'       => 78,
		'icon'    => esc_url( $src_uri ) . 'block-icon-grid.png',
		'default' => 5,
		'tags'    => 'mix,' . $tag_posts . ',5',
		'title'   => esc_html__( 'Mix C', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-78.png',
	);
	$output[] = array(
		'p'       => 43,
		'icon'    => esc_url( $src_uri ) . 'block-icon-standard-2.png',
		'default' => 4,
		'tags'    => 'mix,' . $tag_posts . ',1,2',
		'title'   => esc_html__( 'First One Big', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-43.png',
	);

	$output[] = array(
		'p'       => 101,
		'icon'    => esc_url( $src_uri ) . 'block-icon-sb.png',
		'default' => 1,
		'tags'    => $tag_sb,
		'title'   => esc_html__( 'Sidebar', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-101.png',
	);
	$output[] = array(
		'p'       => 46,
		'icon'    => esc_url( $src_uri ) . 'block-icon-video.png',
		'default' => 6,
		'tags'    => $tag_videos,
		'title'   => esc_html__( 'Video Player', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-46.png',
	);
	$output[] = array(
		'p'       => 36,
		'icon'    => esc_url( $src_uri ) . 'block-icon-button.png',
		'default' => 4,
		'tags'    => $tag_cta . ',' . $tag_advertisement . ',' . $tag_button,
		'title'   => esc_html__( 'Button', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-36.png',
	);
	$output[] = array(
		'p'       => 49,
		'icon'    => esc_url( $src_uri ) . 'block-icon-cta.png',
		'default' => 4,
		'tags'    => $tag_cta . ',' . $tag_advertisement . ',' . $tag_parallax,
		'title'   => esc_html__( 'Call To Action', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-49.png',
	);
	$output[] = array(
		'p'       => 45,
		'icon'    => esc_url( $src_uri ) . 'block-icon-cta.png',
		'default' => 4,
		'tags'    => $tag_cta . ',' . $tag_advertisement . ',' . $tag_parallax,
		'title'   => esc_html__( 'Mini Call To Action', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-45.png',
	);

	$output[] = array(
		'p'       => 30,
		'icon'    => esc_url( $src_uri ) . 'block-icon-video.png',
		'default' => 6,
		'tags'    => $tag_videos,
		'title'   => esc_html__( 'Video', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-30.png',
	);

	$output[] = array(
		'p'       => 110,
		'icon'    => esc_url( $src_uri ) . 'block-icon-cols-1.png',
		'columns' => 1,
		'tags'    => $tag_col . ', ' . esc_html__( 'Background wrapper', 'zeen' ),
		'title'   => esc_html__( 'Background Wrapper', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-110-1.png',
	);
	$output[] = array(
		'p'       => 110,
		'icon'    => esc_url( $src_uri ) . 'block-icon-cols-2.png',
		'columns' => 2,
		'tags'    => $tag_col,
		'title'   => esc_html__( 'Columns (2)', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-110-2-base.png',
	);
	$output[] = array(
		'p'       => 110,
		'icon'    => esc_url( $src_uri ) . 'block-icon-cols-3.png',
		'columns' => 3,
		'tags'    => $tag_col,
		'title'   => esc_html__( 'Columns (3)', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-110-3-base.png',
	);
	$output[] = array(
		'p'       => 110,
		'icon'    => esc_url( $src_uri ) . 'block-icon-cols-4.png',
		'columns' => 4,
		'tags'    => $tag_col,
		'title'   => esc_html__( 'Columns (4)', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-110-4-base.png',
	);
	$output[] = array(
		'p'       => 39,
		'icon'    => esc_url( $src_uri ) . 'block-icon-spacer.png',
		'default' => 4,
		'tags'    => $tag_spacer,
		'title'   => esc_html__( 'Spacer', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-39.png',
	);
	$output[] = array(
		'p'       => 31,
		'icon'    => esc_url( $src_uri ) . 'block-icon-insta.png',
		'default' => 4,
		'tags'    => $tag_insta,
		'title'   => 'Instagram',
		'url'     => esc_url( $src_uri ) . 'block-31.png',
	);
	$output[] = array(
		'p'       => 32,
		'icon'    => esc_url( $src_uri ) . 'block-icon-mailing.png',
		'default' => 4,
		'tags'    => $tag_mail,
		'title'   => esc_html__( 'Mailing List', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-32.png',
	);
	$output[] = array(
		'p'       => 33,
		'icon'    => esc_url( $src_uri ) . 'block-icon-blockquote.png',
		'default' => 4,
		'tags'    => $tag_quote,
		'title'   => esc_html__( 'Quote', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-33.png',
	);
	$output[] = array(
		'p'       => 35,
		'icon'    => esc_url( $src_uri ) . 'block-icon-img.png',
		'default' => 4,
		'tags'    => $tag_img . ',' . $tag_parallax,
		'title'   => esc_html__( 'Image', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-35.png',
	);
	$output[] = array(
		'p'       => 37,
		'icon'    => esc_url( $src_uri ) . 'block-icon-twitch.png',
		'default' => 4,
		'tags'    => 'twitch',
		'title'   => 'Twitch',
		'url'     => esc_url( $src_uri ) . 'block-37.png',
	);
	$output[] = array(
		'p'       => 38,
		'icon'    => esc_url( $src_uri ) . 'block-icon-social.png',
		'default' => 4,
		'tags'    => 'social,media',
		'title'   => 'Social Icons',
		'url'     => esc_url( $src_uri ) . 'block-38.png',
	);
	$output[] = array(
		'p'       => 40,
		'icon'    => esc_url( $src_uri ) . 'block-icon-event.png',
		'default' => 4,
		'tags'    => 'events,upcoming',
		'title'   => 'Upcoming Events',
		'url'     => esc_url( $src_uri ) . 'block-40.png',
	);

	$output[] = array(
		'p'       => 47,
		'icon'    => esc_url( $src_uri ) . 'block-icon-author.png',
		'default' => 4,
		'tags'    => $tag_authors,
		'title'   => esc_html__( 'Author List', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-47.png',
	);
	$output[] = array(
		'p'       => 57,
		'icon'    => esc_url( $src_uri ) . 'block-icon-search.png',
		'default' => 4,
		'tags'    => esc_html__( 'Search', 'zeen' ),
		'title'   => esc_html__( 'Search', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-57.png',
	);
	$output[] = array(
		'p'       => 59,
		'icon'    => esc_url( $src_uri ) . 'block-icon-text.png',
		'default' => 4,
		'tags'    => $tag_text . ',' . $tag_heading,
		'title'   => esc_html__( 'Text Editor', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-48.png',
	);
	$output[] = array(
		'p'       => 201,
		'icon'    => esc_url( $src_uri ) . 'block-icon-collapsible.png',
		'default' => 4,
		'tags'    => esc_html__( 'Collapsible', 'zeen' ) . ',' . $tag_text,
		'title'   => esc_html__( 'Collapsible Content', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-201.png',
	);
	$output[] = array(
		'p'       => 202,
		'icon'    => esc_url( $src_uri ) . 'block-icon-scroller.png',
		'default' => 4,
		'tags'    => esc_html__( 'Scroller', 'zeen' ) . ',' . $tag_text,
		'title'   => esc_html__( 'Scroller Content', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-202.png',
	);
	$output[] = array(
		'p'       => 203,
		'icon'    => esc_url( $src_uri ) . 'block-icon-video.png',
		'default' => 4,
		'tags'    => esc_html__( 'YouTube Playlist', 'zeen' ) . ',' . $tag_videos,
		'title'   => esc_html__( 'YouTube Playlist', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-46.png',
	);
	$output[] = array(
		'p'       => 60,
		'icon'    => esc_url( $src_uri ) . 'block-icon-masonry.png',
		'default' => 4,
		'tags'    => $tag_cta . ',' . esc_html__( 'Link', 'zeen' ) . ',' . esc_html__( 'Custom Grid', 'zeen' ) . ',' . $tag_grid,
		'title'   => esc_html__( 'Custom Grid', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-60.png',
	);
	$output[] = array(
		'p'       => 58,
		'icon'    => esc_url( $src_uri ) . 'block-icon-img.png',
		'default' => 4,
		'tags'    => $tag_img . ',' . esc_html__( 'Gallery', 'zeen' ),
		'title'   => esc_html__( 'Gallery', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-35.png',
	);
	$output[] = array(
		'p'       => 48,
		'icon'    => esc_url( $src_uri ) . 'block-icon-text.png',
		'default' => 4,
		'tags'    => $tag_text . ',' . $tag_heading,
		'title'   => esc_html__( 'Block Title + Subtitle', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-48.png',
	);
	$output[] = array(
		'p'       => 50,
		'icon'    => esc_url( $src_uri ) . 'block-icon-da.png',
		'default' => 4,
		'tags'    => $tag_advertisement,
		'title'   => esc_html__( 'Advertisement', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-50.png',
	);
	$output[] = array(
		'p'       => 34,
		'icon'    => esc_url( $src_uri ) . 'block-icon-custom-code.png',
		'default' => 4,
		'tags'    => $tag_custom_code,
		'title'   => esc_html__( 'Custom Code', 'zeen' ),
		'url'     => esc_url( $src_uri ) . 'block-34.png',
	);

	foreach ( $output as $key => $value ) {
		$value['url']             = rtrim( $value['url'], '/' );
		$ext                      = substr( $value['url'], -3 );
		$retina                   = 'png' == $ext ? substr_replace( $value['url'], '@2x', -4, 0 ) : '';
		$output[ $key ]['srcset'] = $retina;

		$value['icon']                = rtrim( $value['icon'], '/' );
		$ext                          = substr( $value['icon'], -3 );
		$retina                       = 'png' == $ext ? substr_replace( $value['icon'], '@2x', -4, 0 ) : '';
		$output[ $key ]['iconsrcset'] = $retina;

	}

	return $output;
}

function zeen_customizer_blocks_icons( $src_uri = true ) {
	$src_uri      = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : '';
	$output       = array();
	$output[300]  = array( 'icon' => esc_url( $src_uri ) . 'block-icon-de.png' );
	$output[301]  = array( 'icon' => esc_url( $src_uri ) . 'block-icon-de.png' );
	$output[78]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[81]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[82]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[83]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[84]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[86]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[91]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[92]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[93]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[94]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[95]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[96]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[97]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[98]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[99]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-grid.png' );
	$output[51]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-slider.png' );
	$output[52]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-slider.png' );
	$output[53]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-slider.png' );
	$output[54]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-slider.png' );
	$output[56]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-slider.png' );
	$output[61]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[62]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-portrait.png' );
	$output[64]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-masonry.png' );
	$output[65]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-65.png' );
	$output[66]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[68]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-no-fi.png' );
	$output[69]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[1]    = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[2]    = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[3]    = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[21]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-2.png' );
	$output[22]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-thumbnail.png' );
	$output[24]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-masonry.png' );
	$output[25]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-thumbnail-round.png' );
	$output[71]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[79]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-1.png' );
	$output[41]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-2.png' );
	$output[42]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-2.png' );
	$output[43]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-standard-2.png' );
	$output[101]  = array( 'icon' => esc_url( $src_uri ) . 'block-icon-sb.png' );
	$output[46]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-video.png' );
	$output[30]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-video.png' );
	$output[45]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-cta.png' );
	$output[49]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-cta.png' );
	$output[36]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-button.png' );
	$output[37]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-twitch.png' );
	$output[38]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-social.png' );
	$output[40]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-event.png' );
	$output[74]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-hoverer.png' );
	$output[1101] = array( 'icon' => esc_url( $src_uri ) . 'block-icon-cols-1.png' );
	$output[1102] = array( 'icon' => esc_url( $src_uri ) . 'block-icon-cols-2.png' );
	$output[1103] = array( 'icon' => esc_url( $src_uri ) . 'block-icon-cols-3.png' );
	$output[1104] = array( 'icon' => esc_url( $src_uri ) . 'block-icon-cols-4.png' );
	$output[31]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-insta.png' );
	$output[32]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-mailing.png' );
	$output[33]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-blockquote.png' );
	$output[34]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-custom-code.png' );
	$output[35]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-img.png' );
	$output[47]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-author.png' );
	$output[48]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-text.png' );
	$output[59]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-text.png' );
	$output[60]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-masonry.png' );
	$output[58]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-img.png' );
	$output[39]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-spacer.png' );
	$output[50]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-da.png' );
	$output[57]   = array( 'icon' => esc_url( $src_uri ) . 'block-icon-search.png' );
	$output[201]  = array( 'icon' => esc_url( $src_uri ) . 'block-icon-collapsible.png' );
	$output[202]  = array( 'icon' => esc_url( $src_uri ) . 'block-icon-scroller.png' );
	$output[203]  = array( 'icon' => esc_url( $src_uri ) . 'block-icon-video.png' );

	foreach ( $output as $key => $value ) {
		$value['icon']                = rtrim( $value['icon'], '/' );
		$ext                          = substr( $value['icon'], -3 );
		$retina                       = 'png' == $ext ? substr_replace( $value['icon'], '@2x', -4, 0 ) : '';
		$output[ $key ]['iconsrcset'] = $retina;
	}

	return $output;
}

/**
 * Get block list
 *
 * @since  1.0.0
 */
function zeen_customizer_above_header_blocks( $src_uri = true, $output = array() ) {

	$src_uri    = true == $src_uri ? get_parent_theme_file_uri( 'assets/admin/img/' ) : '';
	$output[81] = array( 'url' => esc_url( $src_uri ) . 'above-header-81.png' );
	$output[82] = array( 'url' => esc_url( $src_uri ) . 'above-header-82.png' );
	$output[83] = array( 'url' => esc_url( $src_uri ) . 'above-header-83.png' );
	$output[84] = array( 'url' => esc_url( $src_uri ) . 'above-header-84.png' );
	$output[86] = array( 'url' => esc_url( $src_uri ) . 'above-header-86.png' );
	$output[92] = array( 'url' => esc_url( $src_uri ) . 'above-header-92.png' );
	$output[94] = array( 'url' => esc_url( $src_uri ) . 'above-header-94.png' );
	return $output;
}

/**
 * Get layouts
 *
 * @since  1.0.0
 */
function zeen_customizer_woo_layouts() {
	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );
	return array(
		3  => array(
			'url' => esc_url( $src_uri ) . 'woo-3.png',
		),
		4  => array(
			'url' => esc_url( $src_uri ) . 'woo-4.png',
		),
		12 => array(
			'url' => esc_url( $src_uri ) . 'woo-sb-2.png',
		),
		13 => array(
			'url' => esc_url( $src_uri ) . 'woo-sb-3.png',
		),
	);
}

/**
 * Get layouts
 *
 * @since  1.0.0
 */
function zeen_customizer_bbpress_layouts() {
	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );
	return array(
		1  => array(
			'url' => esc_url( $src_uri ) . 'bbp-1.png',
		),
		51 => array(
			'url' => esc_url( $src_uri ) . 'bbp-51.png',
		),
	);
}

/**
 * Get layouts
 *
 * @since  1.0.0
 */
function zeen_customizer_buddypress_layouts() {
	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );
	return array(
		1  => array(
			'url' => esc_url( $src_uri ) . 'bp-1.png',
		),
		51 => array(
			'url' => esc_url( $src_uri ) . 'bp-51.png',
		),
	);
}

/**
 * Customizer Social Icons
 *
 * @since  1.0.0
 */
function zeen_customizer_social_icons( $wp_customize, $section, $args = array() ) {

	$src_uri   = get_parent_theme_file_uri( 'assets/admin/img/' );
	$transport = 'main_menu' != $args['location'] ? 'postMessage' : 'refresh';

	$wp_customize->add_setting(
		$args['location'] . '_icon_style',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Radio_Image(
			$wp_customize,
			$args['location'] . '_icon_style',
			array(
				'section'  => $section,
				'settings' => $args['location'] . '_icon_style',
				'cols'     => 2,
				'choices'  => array(
					1 => array(
						'url' => esc_url( $src_uri ) . 'icon-style-1.png',
					),
					2 => array(
						'url' => esc_url( $src_uri ) . 'icon-style-2.png',
					),
					3 => array(
						'url' => esc_url( $src_uri ) . 'icon-style-3.png',
					),
					4 => array(
						'url' => esc_url( $src_uri ) . 'icon-style-4.png',
					),
				),
			)
		)
	);

	if ( 'secondary_menu' == $args['location'] || 'main_menu' == $args['location'] ) {
		$wp_customize->add_setting(
			$args['location'] . '_trending_inline',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$args['location'] . '_trending_inline',
				array(
					'label'    => esc_html__( 'Trending', 'zeen' ),
					'section'  => $section,
					'settings' => $args['location'] . '_trending_inline',
				)
			)
		);

		$wp_customize->add_setting(
			$args['location'] . '_icon_slide',
			array(
				'sanitize_callback' => 'absint',
				'transport'         => $transport,
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$args['location'] . '_icon_slide',
				array(
					'label'    => esc_html__( 'Slide Menu', 'zeen' ),
					'section'  => $section,
					'settings' => $args['location'] . '_icon_slide',
				)
			)
		);
	}

	$wp_customize->add_setting(
		$args['location'] . '_icon_dark_mode',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_dark_mode',
			array(
				'label'    => esc_html__( 'Reading Mode', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_icon_dark_mode',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_login',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_login',
			array(
				'label'    => esc_html__( 'Login Icon', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_icon_login',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_facebook',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_facebook',
			array(
				'label'    => 'Facebook',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_facebook',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_instagram',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_instagram',
			array(
				'label'    => 'Instagram',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_instagram',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_twitter',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_twitter',
			array(
				'label'    => 'Twitter',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_twitter',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_twitch',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_twitch',
			array(
				'label'    => 'Twitch',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_twitch',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_patreon',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_patreon',
			array(
				'label'    => 'Patreon',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_patreon',
			)
		)
	);
	$wp_customize->add_setting(
		$args['location'] . '_icon_imdb',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_imdb',
			array(
				'label'    => 'IMDB',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_imdb',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_pinterest',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_pinterest',
			array(
				'label'    => 'Pinterest',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_pinterest',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_soundcloud',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_soundcloud',
			array(
				'label'    => 'Soundcloud',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_soundcloud',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_youtube',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_youtube',
			array(
				'label'    => 'YouTube',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_youtube',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_reddit',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_reddit',
			array(
				'label'    => 'Reddit',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_reddit',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_linkedin',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_linkedin',
			array(
				'label'    => 'LinkedIn',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_linkedin',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_dribbble',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_dribbble',
			array(
				'label'    => 'Dribbble',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_dribbble',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_medium',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_medium',
			array(
				'label'    => 'Medium',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_medium',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_unsplash',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_unsplash',
			array(
				'label'    => 'Unsplash',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_unsplash',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_bandcamp',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_bandcamp',
			array(
				'label'    => 'Bandcamp',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_bandcamp',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_mixcloud',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_mixcloud',
			array(
				'label'    => 'Mixcloud',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_mixcloud',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_vimeo',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_vimeo',
			array(
				'label'    => 'Vimeo',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_vimeo',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_tumblr',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_tumblr',
			array(
				'label'    => 'Tumblr',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_tumblr',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_tiktok',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_tiktok',
			array(
				'label'    => 'TikTok',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_tiktok',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_goodreads',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_goodreads',
			array(
				'label'    => 'Goodreads',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_goodreads',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_itch',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_itch',
			array(
				'label'    => 'Itch.io',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_itch',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_producthunt',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_producthunt',
			array(
				'label'    => 'Product Hunt',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_producthunt',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_letterboxd',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_letterboxd',
			array(
				'label'    => 'Letterboxd',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_letterboxd',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_vk',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_vk',
			array(
				'label'    => 'VK',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_vk',
			)
		)
	);
	$wp_customize->add_setting(
		$args['location'] . '_icon_telegram',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_telegram',
			array(
				'label'    => 'Telegram',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_telegram',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_steam',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_steam',
			array(
				'label'    => 'Steam',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_steam',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_discord',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_discord',
			array(
				'label'    => 'Discord',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_discord',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_spotify',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_spotify',
			array(
				'label'    => 'Spotify',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_spotify',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_apple_music',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_apple_music',
			array(
				'label'    => 'Apple Music',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_apple_music',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_weibo',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_weibo',
			array(
				'label'    => 'Weibo',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_weibo',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_qq',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_qq',
			array(
				'label'    => 'QQ',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_qq',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_rss',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_rss',
			array(
				'label'    => 'RSS',
				'section'  => $section,
				'settings' => $args['location'] . '_icon_rss',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_whatsapp',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_whatsapp',
			array(
				'label'       => 'Whatsapp',
				'description' => esc_html__( 'If you do not have a WhatsApp Business Number set, then this icon is only visible on Mobile and Tablets', 'zeen' ),
				'section'     => $section,
				'settings'    => $args['location'] . '_icon_whatsapp',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_subscribe',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_subscribe',
			array(
				'label'    => esc_html__( 'Subscribe', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_icon_subscribe',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_cart',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_cart',
			array(
				'label'    => esc_html__( 'Cart', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_icon_cart',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_icon_search',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => $transport,
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['location'] . '_icon_search',
			array(
				'label'    => esc_html__( 'Search', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_icon_search',
			)
		)
	);

	if ( 'main_menu' == $args['location'] || 'secondary_menu' == $args['location'] ) {
		$wp_customize->add_setting(
			$args['location'] . '_icon_search_type',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => $transport,
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Multi_Select(
				$wp_customize,
				$args['location'] . '_icon_search_type',
				array(
					'label'    => esc_html__( 'Search Type', 'zeen' ),
					'section'  => $section,
					'settings' => $args['location'] . '_icon_search_type',
					'multi'    => 'off',
					'choices'  => array(
						1 => esc_html__( 'Modal', 'zeen' ),
						2 => esc_html__( 'Dropdown', 'zeen' ),
					),
				)
			)
		);
	}

}

/**
 * Customizer Background
 *
 * @since  1.0.0
 */
function zeen_customizer_background( $wp_customize, $section, $args = array() ) {

	$default_skin = 1;

	if ( 'lwa' == $args['location'] || 'footer' == $args['location'] || 'mobile_header' == $args['location'] || 'mobile_menu' == $args['location'] ) {
		$default_skin = 2;
	} elseif ( 'footer_widgets' == $args['location'] ) {
		$default_skin = 3;
	}

	$wp_customize->add_setting(
		$args['location'] . '_skin',
		array(
			'default'           => $default_skin,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$bg_choices = array(
		1 => esc_html__( 'Light', 'zeen' ),
		2 => esc_html__( 'Dark', 'zeen' ),
		3 => esc_html__( 'Custom', 'zeen' ),
		4 => esc_html__( 'Transparent', 'zeen' ),
	);

	if ( 'header' == $args['location'] || 'footer' == $args['location'] ) {
		$bg_choices[5] = esc_html__( 'Video (Self-hosted)', 'zeen' );
		$bg_choices[6] = esc_html__( 'Video (External)', 'zeen' );
		$video         = true;
	}

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$args['location'] . '_skin',
			array(
				'label'    => esc_html__( 'Background', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_skin',
				'multi'    => 'off',
				'choices'  => $bg_choices,
			)
		)
	);

	if ( ! empty( $video ) ) {
		$wp_customize->add_setting(
			$args['location'] . '_video_url',
			array(
				'sanitize_callback' => 'esc_url',
			)
		);
		$wp_customize->add_control(
			$args['location'] . '_video_url',
			array(
				'label'    => esc_html__( 'Video URL', 'zeen' ),
				'section'  => $section,
				'type'     => 'text',
				'settings' => $args['location'] . '_video_url',
			)
		);
		$wp_customize->add_setting(
			$args['location'] . '_video_self',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				$args['location'] . '_video_self',
				array(
					'label'    => esc_html__( 'Video (Self-hosted)', 'zeen' ),
					'section'  => $section,
					'settings' => $args['location'] . '_video_self',
				)
			)
		);

		$wp_customize->add_setting(
			$args['location'] . '_video_fb',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				$args['location'] . '_video_fb',
				array(
					'label'    => esc_html__( 'Image Fallback', 'zeen' ),
					'section'  => $section,
					'settings' => $args['location'] . '_video_fb',
				)
			)
		);
	}

	$wp_customize->add_setting(
		$args['location'] . '_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$args['location'] . '_color',
			array(
				'label'    => esc_html__( 'Font Color', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_color',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#ffffff',
				),
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_skin_color',
		array(
			'default'           => '#272727',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_skin_color_b',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color_Multi(
			$wp_customize,
			$args['location'] . '_skin_color',
			array(
				'label'       => esc_html__( 'Background Color', 'zeen' ),
				'description' => esc_html__( 'Select one color for single color. Select two for gradient effect', 'zeen' ),
				'section'     => $section,
				'settings'    => array( $args['location'] . '_skin_color', $args['location'] . '_skin_color_b' ),
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_skin_img',
		array(
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			$args['location'] . '_skin_img',
			array(
				'label'    => esc_html__( 'Background Image', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_skin_img',
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_skin_img_transparency',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'zeen_sanitizer_float',

		)
	);
	$wp_customize->add_control(
		new Zeen_Control_Range(
			$wp_customize,
			$args['location'] . '_skin_img_transparency',
			array(
				'label'    => esc_html__( 'Image Transparency', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_skin_img_transparency',
				'choices'  => array(
					'min'     => 0,
					'max'     => 1,
					'step'    => 0.01,
					'default' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		$args['location'] . '_skin_img_repeat',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
	$parallax = 'lwa' != $args['location'] ? array( 4 => esc_html__( 'Parallax', 'zeen' ) ) : '';

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$args['location'] . '_skin_img_repeat',
			array(
				'label'    => esc_html__( 'Background Image Style', 'zeen' ),
				'section'  => $section,
				'settings' => $args['location'] . '_skin_img_repeat',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Cover', 'zeen' ),
					$parallax,
					2 => esc_html__( 'Repeat', 'zeen' ),
					3 => esc_html__( 'No Repeat', 'zeen' ),
				),
			)
		)
	);
	if ( 'header' == $args['location'] || 'mobile_header' == $args['location'] || 'footer' == $args['location'] ) {
		$wp_customize->add_setting(
			$args['location'] . '_change_in_dark_mode',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$args['location'] . '_change_in_dark_mode',
				array(
					'label'    => esc_html__( 'Change in Dark Mode', 'zeen' ),
					'section'  => $section,
					'settings' => $args['location'] . '_change_in_dark_mode',
				)
			)
		);
	}
}

function zeen_customizer_meta_elements( $wp_customize, $section, $type ) {

	$choices = array(
		1 => esc_html__( 'All Above Title', 'zeen' ),
		2 => esc_html__( 'All Below Title', 'zeen' ),
		3 => esc_html__( 'Above And Below Title', 'zeen' ),
	);

	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );

	$wp_customize->add_setting(
		'title_' . $type . '_design_content',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Title(
			$wp_customize,
			'title_' . $type . '_design_content',
			array(
				'label'    => esc_html__( 'Meta Elements Visibility', 'zeen' ),
				'section'  => $section,
				'settings' => 'title_' . $type . '_design_content',
			)
		)
	);

	if ( 'classic' == $type ) {

		$wp_customize->add_setting(
			$type . '_base_design',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Radio_Image(
				$wp_customize,
				$type . '_base_design',
				array(
					'label'    => esc_html__( 'Category/Comment Meta Location', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_base_design',
					'cols'     => 2,
					'choices'  => array(
						1 => array(
							'url' => esc_url( $src_uri ) . 'classic-base-design-1.png',
						),
						2 => array(
							'url' => esc_url( $src_uri ) . 'classic-base-design-2.png',
						),
					),
				)
			)
		);

		$choices[4] = esc_html__( 'All Below Excerpt', 'zeen' );
		$choices[5] = esc_html__( 'Below Title And Below Excerpt', 'zeen' );
	}

	$wp_customize->add_setting(
		$type . '_meta_location',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_meta_location',
			array(
				'label'    => esc_html__( 'Meta Elements Location', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_meta_location',
				'multi'    => 'off',
				'choices'  => $choices,
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_meta_design',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_meta_design',
			array(
				'label'    => esc_html__( 'Meta Elements Output Style', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_meta_design',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Author', 'zeen' ) . ' &middot; ' . esc_html__( 'Date', 'zeen' ) . ' &middot; ' . esc_html__( 'Category', 'zeen' ),
					2 => esc_html__( 'By Author On Date In Category', 'zeen' ),
					3 => esc_html__( 'Elements With Icons', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_author',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_author',
			array(
				'label'    => esc_html__( 'Author Name', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_author',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_author_avatar',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_author_avatar',
			array(
				'label'    => esc_html__( 'Author Avatar', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_author_avatar',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_cats',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_cats',
			array(
				'label'       => esc_html__( 'Categories', 'zeen' ),
				'section'     => $section,
				'description' => esc_html__( 'If a color is needed this will come from the category color. If no color is set there, then the color used is the global accent color', 'zeen' ),
				'settings'    => $type . '_cats',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_cat_design',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_cat_design',
			array(
				'label'    => esc_html__( 'Category Design', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_cat_design',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Standard Text', 'zeen' ),
					2 => esc_html__( 'Color Background', 'zeen' ),
					3 => esc_html__( 'Color Underline', 'zeen' ),
					4 => esc_html__( 'Colored Text', 'zeen' ),
					5 => esc_html__( 'Dark Background', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_comments',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_comments',
			array(
				'label'    => esc_html__( 'Comment Count', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_comments',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_date',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_date',
			array(
				'label'    => esc_html__( 'Date', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_date',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_updated_date',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_updated_date',
			array(
				'label'    => esc_html__( 'Updated Date', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_updated_date',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_read_time',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_read_time',
			array(
				'label'    => esc_html__( 'Read Time', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_read_time',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_like_count',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_like_count',
			array(
				'label'    => esc_html__( 'Like Count', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_like_count',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_view_count',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_view_count',
			array(
				'label'    => esc_html__( 'Views Count', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_view_count',
			)
		)
	);
	$subtitle = 'classic' == $type ? '' : 1;
	$wp_customize->add_setting(
		$type . '_subtitle',
		array(
			'default'           => $subtitle,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_subtitle',
			array(
				'label'    => esc_html__( 'Subtitles', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_subtitle',
			)
		)
	);
	if ( 'posts' == $type ) {
		$wp_customize->add_setting(
			$type . '_last_updated',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$type . '_last_updated',
				array(
					'label'    => esc_html__( 'Show Last Updated Date', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_last_updated',
				)
			)
		);
	}
	$read_more_default = '';
	if ( 'classic' == $type ) {
		$read_more_default = 1;
		$wp_customize->add_setting(
			$type . '_excerpt',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$type . '_excerpt',
				array(
					'label'    => esc_html__( 'Excerpts', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_excerpt',
				)
			)
		);

		$wp_customize->add_setting(
			$type . '_pin_save',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$type . '_pin_save',
				array(
					'label'    => esc_html__( 'Pinterest Save Button', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_pin_save',
				)
			)
		);
	}
	if ( 'posts' != $type ) {
		$wp_customize->add_setting(
			$type . '_read_more',
			array(
				'default'           => $read_more_default,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$type . '_read_more',
				array(
					'label'    => esc_html__( 'Read More Button', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more',
				)
			)
		);

		$wp_customize->add_setting(
			$type . '_read_more_text',
			array(
				'sanitize_callback' => 'zeen_sanitize_wp_kses',
				'default'           => esc_html__( 'Read More', 'zeen' ),
			)
		);
		$wp_customize->add_control(
			$type . '_read_more_text',
			array(
				'label'    => esc_html__( 'Button Text', 'zeen' ),
				'section'  => $section,
				'type'     => 'text',
				'settings' => $type . '_read_more_text',
			)
		);

		$wp_customize->add_setting(
			$type . '_read_more_customize',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				$type . '_read_more_customize',
				array(
					'label'    => esc_html__( 'Customize Button', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more_customize',
				)
			)
		);

		$wp_customize->add_setting(
			$type . '_read_more_bg',
			array(
				'sanitize_callback' => 'esc_attr',
				'default'           => '#18181e',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Color(
				$wp_customize,
				$type . '_read_more_bg',
				array(
					'label'    => esc_html__( 'Button Color', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more_bg',
					'choices'  => array(
						'disableAlpha' => true,
						'default'      => '#18181e',
					),
				)
			)
		);

		$wp_customize->add_setting(
			$type . '_read_more_color_hover',
			array(
				'sanitize_callback' => 'esc_attr',
				'default'           => '#18181e',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Color(
				$wp_customize,
				$type . '_read_more_color_hover',
				array(
					'label'    => esc_html__( 'Button Color Hover', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more_color_hover',
					'choices'  => array(
						'disableAlpha' => true,
						'default'      => '#18181e',
					),
				)
			)
		);

		$wp_customize->add_setting(
			$type . '_read_more_color_text',
			array(
				'sanitize_callback' => 'esc_attr',
				'default'           => '#fff',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Color(
				$wp_customize,
				$type . '_read_more_color_text',
				array(
					'label'    => esc_html__( 'Button Text Color', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more_color_text',
					'choices'  => array(
						'disableAlpha' => true,
						'default'      => '#ffffff',
					),
				)
			)
		);
		$wp_customize->add_setting(
			$type . '_read_more_rounded',
			array(
				'default'           => 3,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Multi_Select(
				$wp_customize,
				$type . '_read_more_rounded',
				array(
					'label'    => esc_html__( 'Button Shape', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more_rounded',
					'multi'    => 'off',
					'choices'  => array(
						1 => esc_html__( 'Rounded', 'zeen' ),
						2 => esc_html__( 'Slightly Rounded', 'zeen' ),
						3 => esc_html__( 'Square', 'zeen' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			$type . '_read_more_fill',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Multi_Select(
				$wp_customize,
				$type . '_read_more_fill',
				array(
					'label'    => esc_html__( 'Button Fill', 'zeen' ),
					'section'  => $section,
					'settings' => $type . '_read_more_fill',
					'multi'    => 'off',
					'choices'  => array(
						1 => esc_html__( 'Solid', 'zeen' ),
						2 => esc_html__( 'Outline', 'zeen' ),
					),
				)
			)
		);
	}
}

function zeen_customizer_tile_options( $wp_customize, $section, $type ) {
	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );

	$wp_customize->add_setting(
		$type . '_tile_design',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Radio_Image(
			$wp_customize,
			$type . '_tile_design',
			array(
				'section'  => $section,
				'settings' => $type . '_tile_design',
				'cols'     => 2,
				'choices'  => array(
					1 => array(
						'url' => esc_url( $src_uri ) . 'tile-design-1.png',
					),
					2 => array(
						'url' => esc_url( $src_uri ) . 'tile-design-2.png',
					),
					3 => array(
						'url' => esc_url( $src_uri ) . 'tile-design-3.png',
					),
					4 => array(
						'url' => esc_url( $src_uri ) . 'tile-design-4.png',
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_bg_onoff',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_title_bg_onoff',
			array(
				'label'    => esc_html__( 'Title Background Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_bg_onoff',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_bg',
		array(
			'default'           => 2,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_title_bg',
			array(
				'label'    => esc_html__( 'Background Style', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_bg',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Solid Color', 'zeen' ),
					2 => esc_html__( 'Gradient', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_solid',
		array(
			'default'           => 'rgba(0,0,0,0.4)',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$type . '_title_solid',
			array(
				'label'    => esc_html__( 'Overlay Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_solid',
				'choices'  => array(
					'default' => 'rgba(0,0,0,0.4)',
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_gradient_a',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_setting(
		$type . '_title_gradient_b',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color_Multi(
			$wp_customize,
			$type . '_title_gradient_a',
			array(
				'label'    => esc_html__( 'Overlay Color', 'zeen' ),
				'section'  => $section,
				'settings' => array( $type . '_title_gradient_a', $type . '_title_gradient_b' ),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_solid',
		array(
			'default'           => '#1a1d1e',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$type . '_title_solid',
			array(
				'label'    => esc_html__( 'Overlay Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_solid',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#1a1d1e',
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_setting(
		$type . '_title_bg_edge',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_title_bg_edge',
			array(
				'label'    => esc_html__( 'Touch Edges', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_bg_edge',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_title_color_hover',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$type . '_title_color',
			array(
				'label'    => esc_html__( 'Text Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_color',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#ffffff',
				),
			)
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$type . '_title_color_hover',
			array(
				'label'    => esc_html__( 'Text Hover Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_title_color_hover',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#ffffff',
				),
			)
		)
	);

	$wp_customize->add_setting(
		'title_' . $type . '_design_overlay',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Title(
			$wp_customize,
			'title_' . $type . '_design_overlay',
			array(
				'label'    => esc_html__( 'General Options', 'zeen' ),
				'section'  => $section,
				'settings' => 'title_' . $type . '_design_overlay',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_img_overlay_onoff',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_img_overlay_onoff',
			array(
				'label'    => esc_html__( 'Image Overlay Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_overlay_onoff',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_img_overlay',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_img_overlay',
			array(
				'section'  => $section,
				'settings' => $type . '_img_overlay',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Solid Color', 'zeen' ),
					2 => esc_html__( 'Gradient', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_img_overlay_solid',
		array(
			'default'           => '#1a1d1e',
			'sanitize_callback' => 'esc_attr',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$type . '_img_overlay_solid',
			array(
				'label'    => esc_html__( 'Overlay Color', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_overlay_solid',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#1a1d1e',
				),
			)
		)
	);

	for ( $i = 1; $i < 7; $i++ ) {
		$default_a = 1 == $i ? 'rgba(238,9,121,0.6)' : '';
		$default_b = 1 == $i ? 'rgba(255,106,0,0.3)' : '';
		$wp_customize->add_setting(
			$type . '_gradient_' . $i . '_a',
			array(
				'default'           => $default_a,
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			$type . '_gradient_' . $i . '_b',
			array(
				'default'           => $default_b,
				'sanitize_callback' => 'esc_attr',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Color_Multi(
				$wp_customize,
				$type . '_gradient_' . $i . '_a',
				array(
					'label'       => esc_html__( 'Tile Gradient', 'zeen' ) . ' #' . $i,
					'section'     => $section,
					'settings'    => array( $type . '_gradient_' . $i . '_a', $type . '_gradient_' . $i . '_b' ),
					'description' => esc_html__( 'Any blank tile gradients will automatically use the gradient set for Tile Gradient #1', 'zeen' ),
				)
			)
		);

		if ( 'slider' == $type ) {
			break;
		}
	}

	$wp_customize->add_setting(
		$type . '_img_overlay_opacity',
		array(
			'default'           => 0.2,
			'sanitize_callback' => 'zeen_sanitizer_float',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new Zeen_Control_Range(
			$wp_customize,
			$type . '_img_overlay_opacity',
			array(
				'label'    => esc_html__( 'Overlay Opacity', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_overlay_opacity',
				'choices'  => array(
					'min'     => 0,
					'max'     => 1,
					'step'    => 0.1,
					'default' => 0.2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_img_overlay_opacity_hover',
		array(
			'default'           => 0.6,
			'sanitize_callback' => 'zeen_sanitizer_float',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new Zeen_Control_Range(
			$wp_customize,
			$type . '_img_overlay_opacity_hover',
			array(
				'label'    => esc_html__( 'Overlay Opacity Hover', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_overlay_opacity_hover',
				'choices'  => array(
					'min'     => 0,
					'max'     => 1,
					'step'    => 0.1,
					'default' => 0.6,
				),
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_rounded_corners',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$type . '_rounded_corners',
			array(
				'label'    => esc_html__( 'Rounded Image Corners', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_rounded_corners',
			)
		)
	);

	$max = 'grid' == $type ? 60 : 6;
	$wp_customize->add_setting(
		$type . '_spacing_tiles',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new Zeen_Control_Range(
			$wp_customize,
			$type . '_spacing_tiles',
			array(
				'label'    => esc_html__( 'Tile Separation', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_spacing_tiles',
				'choices'  => array(
					'type'    => 'px',
					'min'     => 0,
					'max'     => $max,
					'step'    => 1,
					'default' => 0,
				),
			)
		)
	);

}

function zeen_customizer_animation_options( $wp_customize, $section, $type ) {
	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );

	$wp_customize->add_setting(
		$type . '_animations',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Title(
			$wp_customize,
			$type . '_animations',
			array(
				'label'    => esc_html__( 'Animations', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_animations',
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_img_ani_onoff',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_img_ani_onoff',
			array(
				'label'    => esc_html__( 'Image Animation (Hover)', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_ani_onoff',
				'multi'    => 'off',
				'choices'  => array(
					0 => esc_html__( 'Off', 'zeen' ),
					1 => esc_html__( 'Zoom', 'zeen' ),
					2 => esc_html__( 'Slide Right', 'zeen' ),
					3 => esc_html__( 'Rotate Right', 'zeen' ),
					4 => esc_html__( 'Rotate Left', 'zeen' ),
				),
			)
		)
	);

	$choices = array(
		1  => esc_html__( 'Normal', 'zeen' ),
		2  => esc_html__( 'Black and White', 'zeen' ),
		3  => esc_html__( 'Blur', 'zeen' ),
		4  => esc_html__( 'Sepia', 'zeen' ),
		11 => esc_html__( 'Blue', 'zeen' ),
		12 => esc_html__( 'Red', 'zeen' ),
		13 => esc_html__( 'Yellow', 'zeen' ),
	);
	$wp_customize->add_setting(
		$type . '_img_effect',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_img_effect',
			array(
				'label'    => esc_html__( 'Image Color Effect', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_effect',
				'multi'    => 'off',
				'choices'  => $choices,
			)
		)
	);

	$wp_customize->add_setting(
		$type . '_img_effect_hover',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$type . '_img_effect_hover',
			array(
				'label'    => esc_html__( 'Image Color Effect (Hover)', 'zeen' ),
				'section'  => $section,
				'settings' => $type . '_img_effect_hover',
				'multi'    => 'off',
				'choices'  => $choices,
			)
		)
	);

}

function zeen_customizer_archive_options( $wp_customize, $section = '', $src_uri = '', $name = '', $top = '' ) {
	$top = empty( $top ) ? 'top' : '';

	if ( 'search' != $name ) {
		$wp_customize->add_setting(
			'title_' . $section . '_layout',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Title(
				$wp_customize,
				'title_' . $section . '_layout',
				array(
					'label'       => esc_html__( 'Default Layout', 'zeen' ),
					'description' => esc_html__( 'Select the default layout for this taxonomy. It is possible to override this when editing individual taxonomies.', 'zeen' ),
					'section'     => $section,
					'settings'    => 'title_' . $section . '_layout',
					'choices'     => $top,
				)
			)
		);
	}

	$wp_customize->add_setting(
		$name . '_layout',
		array(
			'default'           => 24,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Radio_Image(
			$wp_customize,
			$name . '_layout',
			array(
				'section'  => $section,
				'settings' => $name . '_layout',
				'cols'     => 2,
				'choices'  => zeen_customizer_layouts(),
			)
		)
	);

	$wp_customize->add_setting(
		$name . '_image_shape',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$name . '_image_shape',
			array(
				'section'  => $section,
				'label'    => esc_html__( 'Image Shape', 'zeen' ),
				'settings' => $name . '_image_shape',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Default', 'zeen' ),
					2 => esc_html__( 'Square', 'zeen' ),
					3 => esc_html__( 'Portrait', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$name . '_fs',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$name . '_fs',
			array(
				'label'    => esc_html__( 'Screen Edge To Edge layout', 'zeen' ),
				'section'  => $section,
				'settings' => $name . '_fs',
			)
		)
	);

	$wp_customize->add_setting(
		$name . '_flipstack',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$name . '_flipstack',
			array(
				'label'    => esc_html__( 'Move Title Above Image', 'zeen' ),
				'section'  => $section,
				'settings' => $name . '_flipstack',
			)
		)
	);

	if ( 'blog_page' == $name ) {
		$wp_customize->add_setting(
			'title_latest_cat',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Title(
				$wp_customize,
				'title_latest_cat',
				array(
					'label'    => esc_html__( 'Exclude Certain Categories', 'zeen' ),
					'section'  => $section,
					'settings' => 'title_latest_cat',
				)
			)
		);

		$wp_customize->add_setting(
			'blog_page_cat_exclude',
			array(
				'default'           => '',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_On_Off(
				$wp_customize,
				'blog_page_cat_exclude',
				array(
					'label'    => esc_html__( 'Exclude Categories', 'zeen' ),
					'section'  => $section,
					'settings' => 'blog_page_cat_exclude',
				)
			)
		);

		$wp_customize->add_setting(
			'blog_page_cat_excluded',
			array(
				'default'           => '',
				'sanitize_callback' => 'zeen_sanitize_array',
			)
		);
		$wp_customize->add_control(
			new Zeen_Control_Multi_Select(
				$wp_customize,
				'blog_page_cat_excluded',
				array(
					'label'    => esc_html__( 'Categories To Exclude', 'zeen' ),
					'section'  => $section,
					'settings' => 'blog_page_cat_excluded',
					'choices'  => zeen_customizer_categories(),
				)
			)
		);
	}
	$wp_customize->add_setting(
		'title_' . $section . '_sorter',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Title(
			$wp_customize,
			'title_' . $section . '_sorter',
			array(
				'label'    => esc_html__( 'Default Post Order', 'zeen' ),
				'section'  => $section,
				'settings' => 'title_' . $section . '_sorter',
			)
		)
	);

	$wp_customize->add_setting(
		$name . '_sorter_default',
		array(
			'default'           => 'latest',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$name . '_sorter_default',
			array(
				'description' => esc_html__( 'Select the default pagination style for this taxonomy. It is possible to override this when editing individual taxonomies.', 'zeen' ),
				'section'     => $section,
				'settings'    => $name . '_sorter_default',
				'multi'       => 'off',
				'choices'     => array(
					'latest' => esc_html__( 'Latest', 'zeen' ),
					'oldest' => esc_html__( 'Oldest', 'zeen' ),
					'atoz'   => esc_html__( 'A To Z', 'zeen' ),
					'random' => esc_html__( 'Random', 'zeen' ),
					'liked'  => esc_html__( 'Most Liked', 'zeen' ),
					'rated'  => esc_html__( 'Top Review Scores', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'title_' . $section . '_pagi',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Title(
			$wp_customize,
			'title_' . $section . '_pagi',
			array(
				'label'    => esc_html__( 'Pagination Type', 'zeen' ),
				'section'  => $section,
				'settings' => 'title_' . $section . '_pagi',
			)
		)
	);

	$wp_customize->add_setting(
		$name . '_pagination',
		array(
			'default'           => 2,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$name . '_pagination',
			array(
				'description' => esc_html__( 'Select the default pagination style for this taxonomy. It is possible to override this when editing individual taxonomies.', 'zeen' ),
				'section'     => $section,
				'settings'    => $name . '_pagination',
				'multi'       => 'off',
				'choices'     => array(
					1 => esc_html__( 'Numbered pages', 'zeen' ),
					2 => esc_html__( 'Load More button', 'zeen' ),
					3 => esc_html__( 'Infinite Scroll', 'zeen' ),
					4 => esc_html__( 'Load Button Once Then Infinite', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'title_' . $section . '_sidebar_layout',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Title(
			$wp_customize,
			'title_' . $section . '_sidebar_layout',
			array(
				'label'       => esc_html__( 'Default Sidebar Location', 'zeen' ),
				'description' => esc_html__( 'Select the default sidebar location. This only applies to layouts with sidebars. It is possible to override this when editing individual taxonomies.', 'zeen' ),
				'section'     => $section,
				'settings'    => 'title_' . $section . '_sidebar_layout',
			)
		)
	);

	$wp_customize->add_setting(
		$name . '_sidebar',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Radio_Image(
			$wp_customize,
			$name . '_sidebar',
			array(
				'section'  => $section,
				'settings' => $name . '_sidebar',
				'cols'     => 2,
				'choices'  => array(
					1 => array(
						'url' => esc_url( $src_uri ) . 'sidebar-1.png',
					),
					2 => array(
						'url' => esc_url( $src_uri ) . 'sidebar-2.png',
					),
				),
			)
		)
	);

	if ( 'search' != $name ) {

		$wp_customize->add_setting(
			'title_' . $section . '_ad',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Title(
				$wp_customize,
				'title_' . $section . '_ad',
				array(
					'label'    => esc_html__( 'Advertisement', 'zeen' ),
					'section'  => $section,
					'settings' => 'title_' . $section . '_ad',
				)
			)
		);

		$wp_customize->add_setting(
			$name . '_pub',
			array(
				'sanitize_callback' => 'zeen_sanitize_wp_kses',
			)
		);

		$wp_customize->add_control(
			$name . '_pub',
			array(
				'label'       => esc_html__( 'Ad Above Posts', 'zeen' ),
				'description' => esc_html__( 'To make the site extra safe - only shortcodes or HTML code is allowed here. For Javascript ads (i.e. AdSense) you need to put it in a shortcode. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
				'section'     => $section,
				'type'        => 'textarea',
				'settings'    => $name . '_pub',
			)
		);

		$wp_customize->add_setting(
			$name . '_below_pub',
			array(
				'sanitize_callback' => 'zeen_sanitize_wp_kses',
			)
		);

		$wp_customize->add_control(
			$name . '_below_pub',
			array(
				'label'       => esc_html__( 'Ad Below Posts', 'zeen' ),
				'description' => esc_html__( 'To make the site extra safe - only shortcodes or HTML code is allowed here. For Javascript ads (i.e. AdSense) you need to put it in a shortcode. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
				'section'     => $section,
				'type'        => 'textarea',
				'settings'    => $name . '_below_pub',
			)
		);
	}
}

function zeen_customizer_cta_buttons( $wp_customize = '', $section = '', $args = array() ) {
	$wp_customize->add_setting(
		$args['setting'] . '_cta',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['setting'] . '_cta',
			array(
				'label'    => empty( $args['add_title'] ) ? esc_html__( 'Add Button', 'zeen' ) : $args['add_title'],
				'section'  => $section,
				'settings' => $args['setting'] . '_cta',
			)
		)
	);

	$wp_customize->add_setting(
		$args['setting'] . '_cta_url',
		array(
			'sanitize_callback' => 'zeen_sanitize_wp_kses',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		$args['setting'] . '_cta_url',
		array(
			'label'       => esc_html__( 'Button URL', 'zeen' ),
			'description' => esc_html__( 'If you set the url to #subscribe or #login the button will open the subscribe or login modal', 'zeen' ),
			'section'     => $section,
			'type'        => 'text',
			'settings'    => $args['setting'] . '_cta_url',
		)
	);

	$wp_customize->add_setting(
		$args['setting'] . '_cta_bg',
		array(
			'sanitize_callback' => 'esc_attr',
			'default'           => '#18181e',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$args['setting'] . '_cta_bg',
			array(
				'label'    => esc_html__( 'Button Color', 'zeen' ),
				'section'  => $section,
				'settings' => $args['setting'] . '_cta_bg',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#18181e',
				),
			)
		)
	);
	if ( empty( $args['button_color_hover_off'] ) ) {
		$wp_customize->add_setting(
			$args['setting'] . '_cta_color_hover',
			array(
				'sanitize_callback' => 'esc_attr',
				'default'           => '#18181e',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Color(
				$wp_customize,
				$args['setting'] . '_cta_color_hover',
				array(
					'label'    => esc_html__( 'Button Color Hover', 'zeen' ),
					'section'  => $section,
					'settings' => $args['setting'] . '_cta_color_hover',
					'choices'  => array(
						'disableAlpha' => true,
						'default'      => '#18181e',
					),
				)
			)
		);
	}

	$wp_customize->add_setting(
		$args['setting'] . '_cta_content',
		array(
			'sanitize_callback' => 'zeen_sanitize_wp_kses',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		$args['setting'] . '_cta_content',
		array(
			'label'    => esc_html__( 'Button Text', 'zeen' ),
			'section'  => $section,
			'type'     => 'text',
			'settings' => $args['setting'] . '_cta_content',
		)
	);

	$wp_customize->add_setting(
		$args['setting'] . '_cta_color_text',
		array(
			'sanitize_callback' => 'esc_attr',
			'default'           => '#ffffff',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Color(
			$wp_customize,
			$args['setting'] . '_cta_color_text',
			array(
				'label'    => esc_html__( 'Button Text Color', 'zeen' ),
				'section'  => $section,
				'settings' => $args['setting'] . '_cta_color_text',
				'choices'  => array(
					'disableAlpha' => true,
					'default'      => '#ffffff',
				),
			)
		)
	);

	$wp_customize->add_setting(
		$args['setting'] . '_cta_rounded',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$args['setting'] . '_cta_rounded',
			array(
				'label'    => esc_html__( 'Button Shape', 'zeen' ),
				'section'  => $section,
				'settings' => $args['setting'] . '_cta_rounded',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Rounded', 'zeen' ),
					2 => esc_html__( 'Slightly Rounded', 'zeen' ),
					3 => esc_html__( 'Square', 'zeen' ),
				),
			)
		)
	);
	if ( empty( $args['button_size_off'] ) ) {
		$wp_customize->add_setting(
			$args['setting'] . '_cta_size',
			array(
				'default'           => 1,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Zeen_Control_Multi_Select(
				$wp_customize,
				$args['setting'] . '_cta_size',
				array(
					'label'    => esc_html__( 'Button Size', 'zeen' ),
					'section'  => $section,
					'settings' => $args['setting'] . '_cta_size',
					'multi'    => 'off',
					'choices'  => array(
						3 => esc_html__( 'Small', 'zeen' ),
						1 => esc_html__( 'Medium', 'zeen' ),
						2 => esc_html__( 'Large', 'zeen' ),
					),
				)
			)
		);
	}
	$wp_customize->add_setting(
		$args['setting'] . '_cta_fill',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			$args['setting'] . '_cta_fill',
			array(
				'label'    => esc_html__( 'Button Fill', 'zeen' ),
				'section'  => $section,
				'settings' => $args['setting'] . '_cta_fill',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Solid', 'zeen' ),
					2 => esc_html__( 'Outline', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		$args['setting'] . '_cta_new_tab',
		array(
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_On_Off(
			$wp_customize,
			$args['setting'] . '_cta_new_tab',
			array(
				'label'    => esc_html__( 'Open In New Window', 'zeen' ),
				'section'  => $section,
				'settings' => $args['setting'] . '_cta_new_tab',
			)
		)
	);

	$font_size_choices = array(
		'min'     => 12,
		'max'     => 30,
		'default' => $args['font_size_default'],
		'type'    => 'px',
	);
	$sanitize_cb       = 'zeen_sanitize_array';
	if ( ! empty( $args['responsive_off'] ) ) {
		$font_size_choices['responsive_off'] = $args['responsive_off'];
		if ( true === $args['responsive_off'] ) {
			$sanitize_cb = 'absint';
		}
	}
	$wp_customize->add_setting(
		$args['setting'] . '_cta_font_size',
		array(
			'default'           => $args['font_size_default'],
			'sanitize_callback' => $sanitize_cb,
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Range(
			$wp_customize,
			$args['setting'] . '_cta_font_size',
			array(
				'label'    => esc_html__( 'Text Font Size', 'zeen' ),
				'section'  => $section,
				'settings' => $args['setting'] . '_cta_font_size',
				'choices'  => $font_size_choices,
			)
		)
	);
}

function zeen_customizer_post_types( $args = array() ) {
	$post_types = get_post_types(
		array(
			'public'   => true,
			'_builtin' => false,
		)
	);
	unset( $post_types['forum'] );
	unset( $post_types['reply'] );
	unset( $post_types['topic'] );

	foreach ( $post_types as $key => $value ) {
		$post_types[ $key ] = ucfirst( $value );
	}
	$post_types = array_merge(
		array(
			'pids'       => esc_html__( 'Specific Posts/Pages', 'zeen' ),
			'categories' => esc_html__( 'Categories', 'zeen' ),
			'tags'       => esc_html__(
				'Tags',
				'zeen'
			),
		),
		$post_types
	);
	$post_types = array_merge( $args, $post_types );

	return $post_types;
}

function zeen_customize_default( $id = '' ) {
	$args = '';
	if ( 'font_size_body' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_line_height' == $id ) {
		$args = array(
			'desktop' => 1.66,
			'tablet'  => 1.66,
			'mobile'  => 1.66,
		);
	} elseif ( 'font_size_byline' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'font_size_buttons' == $id ) {
		$args = array(
			'desktop' => 11,
			'tablet'  => 11,
			'mobile'  => 11,
		);
	} elseif ( 'excerpt_font_size' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_logo_text' == $id ) {
		$args = array(
			'desktop' => 30,
			'tablet'  => 22,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_breadcrumbs' == $id ) {
		$args = array(
			'desktop' => 10,
			'tablet'  => 10,
			'mobile'  => 10,
		);
	} elseif ( 'font_size_post_inner' == $id ) {
		$args = array(
			'desktop' => 36,
			'tablet'  => 30,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_hero_subtitle_s' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_hero_title_m' == $id ) {
		$args = array(
			'desktop' => 44,
			'tablet'  => 30,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_hero_subtitle_m' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_hero_title_l' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 30,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_hero_subtitle_l' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_h1' == $id ) {
		$args = array(
			'desktop' => 44,
			'tablet'  => 30,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_h2' == $id ) {
		$args = array(
			'desktop' => 40,
			'tablet'  => 30,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_h3' == $id ) {
		$args = array(
			'desktop' => 30,
			'tablet'  => 24,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_h4' == $id ) {
		$args = array(
			'desktop' => 20,
			'tablet'  => 24,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_h5' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 18,
		);
	} elseif ( 'font_size_tags' == $id ) {
		$args = array(
			'desktop' => 8,
			'tablet'  => 8,
			'mobile'  => 8,
		);
	} elseif ( 'font_size_copyright' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'footer_menu_font_size' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'font_size_footer_social_icons' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'main_menu_font_size' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
		);
	} elseif ( 'font_size_mm_sub_menu' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
		);
	} elseif ( 'font_size_main_menu_social_icons' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
		);
	} elseif ( 'secondary_menu_font_size' == $id ) {
		$args = array(
			'desktop' => 11,
			'tablet'  => 11,
		);
	} elseif ( 'font_size_secondary_menu_social_icons' == $id ) {
		$args = array(
			'desktop' => 13,
			'tablet'  => 13,
		);
	} elseif ( 'font_size_block_main_title' == $id ) {
		$args = array(
			'desktop' => 40,
			'tablet'  => 24,
			'mobile'  => 24,
		);
	} elseif ( 'font_size_block_main_subtitle' == $id ) {
		$args = array(
			'desktop' => 20,
			'tablet'  => 18,
			'mobile'  => 18,
		);
	} elseif ( 'font_size_classic_blocks_title_xl' == $id ) {
		$args = array(
			'desktop' => 36,
			'tablet'  => 22,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_woo_classic_price_s' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'font_size_woo_classic_price_m' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_woo_classic_price_l' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_classic_blocks_title_l' == $id ) {
		$args = array(
			'desktop' => 30,
			'tablet'  => 22,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_classic_blocks_title' == $id ) {
		$args = array(
			'desktop' => 24,
			'tablet'  => 22,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_thumbnail_blocks_title' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_classic_blocks_read_more' == $id ) {
		$args = array(
			'desktop' => 11,
			'tablet'  => 11,
			'mobile'  => 11,
		);
	} elseif ( 'font_size_grid_xl_title' == $id ) {
		$args = array(
			'desktop' => 45,
			'tablet'  => 30,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_grid_l_title' == $id ) {
		$args = array(
			'desktop' => 36,
			'tablet'  => 30,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_grid_m_title' == $id ) {
		$args = array(
			'desktop' => 24,
			'tablet'  => 22,
			'mobile'  => 22,
		);
	} elseif ( 'font_size_grid_s_title' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 18,
		);
	} elseif ( 'letter_spacing_grid' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'font_size_grid_s_subtitle' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 18,
		);
	} elseif ( 'font_size_grid_l_subtitle' == $id ) {
		$args = array(
			'desktop' => 20,
			'tablet'  => 20,
			'mobile'  => 20,
		);
	} elseif ( 'font_size_grid_read_more' == $id ) {
		$args = array(
			'desktop' => 11,
			'tablet'  => 11,
			'mobile'  => 11,
		);
	} elseif ( 'font_size_widget_title' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'top_bar_message_content_font_size' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'classis_split_img_width' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 34,
			'mobile'  => 34,
		);
	} elseif ( 'thumbnail_img_width' == $id ) {
		$args = array(
			'desktop' => 65,
			'tablet'  => 65,
			'mobile'  => 65,
		);
	} elseif ( 'footer_lower_padding_bottom' == $id ) {
		$args = array(
			'desktop' => 90,
			'tablet'  => 40,
			'mobile'  => 40,
		);
	} elseif ( 'footer_lower_padding_top' == $id ) {
		$args = array(
			'desktop' => 90,
			'tablet'  => 40,
			'mobile'  => 40,
		);
	} elseif ( 'footer_upper_padding_top' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 40,
			'mobile'  => 40,
		);
	} elseif ( 'footer_upper_padding_bottom' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 40,
			'mobile'  => 40,
		);
	} elseif ( 'footer_widgets_padding_bottom' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 40,
			'mobile'  => 40,
		);
	} elseif ( 'footer_widgets_padding_top' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 40,
			'mobile'  => 40,
		);
	} elseif ( 'header_cta_font_size' == $id ) {
		$args = array(
			'desktop' => 12,
			'tablet'  => 12,
			'mobile'  => 12,
		);
	} elseif ( 'font_size_woo_title_s' == $id ) {
		$args = array(
			'desktop' => 30,
			'tablet'  => 24,
			'mobile'  => 24,
		);
	} elseif ( 'font_size_woo_title_m' == $id ) {
		$args = array(
			'desktop' => 40,
			'tablet'  => 24,
			'mobile'  => 24,
		);
	} elseif ( 'font_size_woo_title_l' == $id ) {
		$args = array(
			'desktop' => 50,
			'tablet'  => 36,
			'mobile'  => 24,
		);
	} elseif ( 'font_size_woo_price_s' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_woo_price_m' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 18,
		);
	} elseif ( 'font_size_woo_excerpt_m' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'font_size_woo_price_l' == $id ) {
		$args = array(
			'desktop' => 18,
			'tablet'  => 18,
			'mobile'  => 18,
		);
	} elseif ( 'font_size_woo_excerpt_l' == $id ) {
		$args = array(
			'desktop' => 15,
			'tablet'  => 15,
			'mobile'  => 15,
		);
	} elseif ( 'letter_spacing_h1' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_h2' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_h3' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_body' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_logo_text' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_subtitle' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_footer_menu' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_secondary_menu' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_main_menu' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_submenu' == $id ) {
		$args = array(
			'desktop' => 0.1,
			'tablet'  => 0.1,
			'mobile'  => 0.1,
		);
	} elseif ( 'letter_spacing_byline' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_copyright' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_blockquote' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_read_more' == $id ) {
		$args = array(
			'desktop' => 0,
			'tablet'  => 0,
			'mobile'  => 0,
		);
	} elseif ( 'letter_spacing_buttons' == $id ) {
		$args = array(
			'desktop' => 0.09,
			'tablet'  => 0.09,
			'mobile'  => 0.03,
		);
	} elseif ( 'letter_spacing_widget_title' == $id ) {
		$args = array(
			'desktop' => 0.15,
			'tablet'  => 0.15,
			'mobile'  => 0.15,
		);
	}
	return $args;
}
