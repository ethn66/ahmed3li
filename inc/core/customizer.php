<?php
/**
 * Customizer
 *
 * @package Zeen
 * @since 1.0.0
 */
require get_parent_theme_file_path( 'inc/core/customizer-controls.php' );
require get_parent_theme_file_path( 'inc/core/customizer-settings.php' );

/**
 * Styles
 *
 * @since  1.0.0
 */
function zeen_customizer_styles() {

	wp_enqueue_style( 'zeen-admin', get_parent_theme_file_uri( 'assets/admin/css/style.css' ), array( 'wp-components' ), ZEEN_VERSION, 'all' );

}
add_action( 'customize_controls_print_styles', 'zeen_customizer_styles' );

/**
 * Customizer Script
 *
 * @since  1.0.0
 */
function zeen_customizer_preview() {

	wp_enqueue_script( 'zeen-admin-custom', get_parent_theme_file_uri( 'assets/admin/js/zeen-custom.js' ), array( 'jquery', 'customize-preview', 'customize-selective-refresh' ), ZEEN_VERSION, true );

}
add_action( 'customize_preview_init', 'zeen_customizer_preview' );

/**
 * Styles
 *
 * @since  1.0.0
 */
function zeen_customizer_controls() {

	wp_enqueue_script( 'zeen-admin-custom', get_parent_theme_file_uri( 'assets/admin/js/zeen-custom-cb.js' ), array( 'jquery', 'customize-preview' ), ZEEN_VERSION, true );
	$url = '';
	if ( function_exists( 'amp_admin_get_preview_permalink' ) ) {
		$url = amp_admin_get_preview_permalink();
		$url = add_query_arg(
			array(
				'preview' => true,
				'amp'     => 1,
			),
			$url
		);
	}
	wp_localize_script(
		'zeen-admin-custom',
		'zeenCB',
		array(
			'url'   => $url,
			'check' => esc_html__( 'This action cannot be undone. Are you sure you want to reset all your Theme Options settings?', 'zeen' ),
			'root'  => esc_url_raw( rest_url() ) . 'codetipi-zeen/v2/',
			'nonce' => wp_create_nonce( 'wp_rest' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'zeen_customizer_controls' );

/**
 * Sections
 *
 * @since  1.0.0
 */
function zeen_customizer_sections( $wp_customize ) {

	$src_uri = get_parent_theme_file_uri( 'assets/admin/img/' );

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'design',
			array(
				'title'    => esc_html__( 'Core Options', 'zeen' ),
				'priority' => 3,
			)
		)
	);

	// Panel: Header
	$wp_customize->add_panel(
		'panel_header',
		array(
			'priority'   => 4,
			'title'      => esc_html__( 'Header', 'zeen' ),
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'header_options',
			array(
				'title'    => esc_html__( 'Header Options', 'zeen' ),
				'priority' => 4,
				'panel'    => 'panel_header',
			)
		)
	);

	// Section: Header
	$wp_customize->add_section(
		'section_header',
		array(
			'panel'    => 'panel_header',
			'priority' => 4,
			'title'    => esc_html__( 'Header Base & Logo', 'zeen' ),
		)
	);
	zeen_section_header( $wp_customize, 'section_header', $src_uri );
	// Section: Above Header
	$wp_customize->add_section(
		'section_above_header',
		array(
			'priority' => 4,
			'panel'    => 'panel_header',
			'title'    => esc_html__( 'Above Header', 'zeen' ),
		)
	);
	zeen_section_above_header( $wp_customize, 'section_above_header', $src_uri );
	// Section: Main Menu
	$wp_customize->add_section(
		'section_main_menu',
		array(
			'priority' => 4,
			'panel'    => 'panel_header',
			'title'    => esc_html__( 'Main Menu', 'zeen' ),
		)
	);
	zeen_section_main_menu( $wp_customize, 'section_main_menu', $src_uri );
	// Section: Secondary Menu
	$wp_customize->add_section(
		'section_secondary_menu',
		array(
			'priority' => 4,
			'panel'    => 'panel_header',
			'title'    => esc_html__( 'Secondary Menu', 'zeen' ),
		)
	);
	zeen_section_secondary_menu( $wp_customize, 'section_secondary_menu', $src_uri );
	// Section: Special Post Page Header
	$wp_customize->add_section(
		'section_special_post_page_header',
		array(
			'priority' => 4,
			'panel'    => 'panel_header',
			'title'    => esc_html__( 'Special Post Header', 'zeen' ),
		)
	);
	zeen_section_special_post_page_header( $wp_customize, 'section_special_post_page_header', $src_uri );

	// Section: Footer
	$wp_customize->add_section(
		'section_footer',
		array(
			'priority' => 4,
			'title'    => esc_html__( 'Footer', 'zeen' ),
		)
	);
	zeen_section_footer( $wp_customize, 'section_footer', $src_uri );

	// Section: Sidebars
	$wp_customize->add_section(
		'section_sidebars',
		array(
			'priority' => 4,
			'title'    => esc_html__( 'Sidebars', 'zeen' ),
		)
	);
	zeen_section_sidebars( $wp_customize, 'section_sidebars', $src_uri );

	// Section: Mobile
	$wp_customize->add_section(
		'section_mobile',
		array(
			'priority' => 4,
			'title'    => esc_html__( 'Mobile Devices', 'zeen' ),
		)
	);
	zeen_section_mobile( $wp_customize, 'section_mobile', $src_uri );

	// Panel: Typography
	$wp_customize->add_panel(
		'panel_typography',
		array(
			'priority'   => 5,
			'title'      => esc_html__( 'Typography', 'zeen' ),
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'section_typography_title',
			array(
				'title'    => esc_html__( 'Typography', 'zeen' ),
				'priority' => 5,
				'panel'    => 'panel_typography',
			)
		)
	);

	// Section: Typography Fonts
	$wp_customize->add_section(
		'section_typography_fonts',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Fonts', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_fonts( $wp_customize, 'section_typography_fonts', $src_uri );

	// Section: Typography Font Sizes
	$wp_customize->add_section(
		'section_typography_font_sizes',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Font Sizes', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_sizes( $wp_customize, 'section_typography_font_sizes', $src_uri );

	// Section: Typography Font Colors
	$wp_customize->add_section(
		'section_typography_font_colors',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Font Colors', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_colors( $wp_customize, 'section_typography_font_colors', $src_uri );

	// Section: Typography Font Bold
	$wp_customize->add_section(
		'section_typography_font_weights',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Bold Options', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_weights( $wp_customize, 'section_typography_font_weights', $src_uri );

	// Section: Typography Font Italic
	$wp_customize->add_section(
		'section_typography_font_italic',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Italic Options', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_italic( $wp_customize, 'section_typography_font_italic', $src_uri );

	// Section: Typography Font Uppercase
	$wp_customize->add_section(
		'section_typography_font_uppercase',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Uppercase Options', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_uppercase( $wp_customize, 'section_typography_font_uppercase', $src_uri );

	// Section: Typography Font Letter Spacing
	$wp_customize->add_section(
		'section_typography_font_letter_spacing',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Letter Spacing Options', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_letter_spacing( $wp_customize, 'section_typography_font_letter_spacing', $src_uri );
	// Section: Underline
	$wp_customize->add_section(
		'section_typography_font_underline',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Underline Options', 'zeen' ),
			'panel'    => 'panel_typography',
		)
	);
	zeen_section_typography_font_underline( $wp_customize, 'section_typography_font_underline', $src_uri );

	// Section: Global
	$wp_customize->add_section(
		'section_seo',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'SEO', 'zeen' ),
		)
	);
	zeen_section_seo( $wp_customize, 'section_seo', $src_uri );

	// Section: Global
	$wp_customize->add_section(
		'section_general',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Global Options', 'zeen' ),
		)
	);
	zeen_section_global( $wp_customize, 'section_general', $src_uri );
	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'blockdesigns',
			array(
				'title'    => esc_html__( 'Block Designs', 'zeen' ),
				'priority' => 5,
			)
		)
	);

	// Section: Modules Grids
	$wp_customize->add_section(
		'section_grids',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Grids', 'zeen' ),
		)
	);
	zeen_section_grids( $wp_customize, 'section_grids', $src_uri );

	// Section: Modules Sliders
	$wp_customize->add_section(
		'section_sliders',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Sliders', 'zeen' ),
		)
	);
	zeen_section_sliders( $wp_customize, 'section_sliders', $src_uri );

	// Section: Modules General
	$wp_customize->add_section(
		'section_others',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Classic Blocks', 'zeen' ),
		)
	);
	zeen_section_others( $wp_customize, 'section_others', $src_uri );

	// Section: Modules Megamenu
	$wp_customize->add_section(
		'section_megamenus',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Megamenus', 'zeen' ),
		)
	);
	zeen_section_megamenus( $wp_customize, 'section_megamenus', $src_uri );

	// Section: Modules Titles
	$wp_customize->add_section(
		'section_block_titles',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Block Titles', 'zeen' ),
		)
	);
	zeen_section_block_titles( $wp_customize, 'section_block_titles', $src_uri );

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'layouts',
			array(
				'title'    => esc_html__( 'Layouts', 'zeen' ),
				'priority' => 5,
			)
		)
	);

	// Section: Posts
	$wp_customize->add_section(
		'section_posts',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Posts', 'zeen' ),
		)
	);
	zeen_section_posts( $wp_customize, 'section_posts', $src_uri );

	// Section: Pages
	$wp_customize->add_section(
		'section_pages',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Pages', 'zeen' ),
		)
	);
	zeen_section_pages( $wp_customize, 'section_pages', $src_uri );

	// Section: Category
	$wp_customize->add_section(
		'section_category',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Categories', 'zeen' ),
		)
	);
	zeen_section_category( $wp_customize, 'section_category', $src_uri );

	// Section: Tags
	$wp_customize->add_section(
		'section_tags',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Tags', 'zeen' ),
		)
	);
	zeen_section_tags( $wp_customize, 'section_tags', $src_uri );

	// Section: Custom Taxonomies
	$wp_customize->add_section(
		'section_tax',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Custom Taxonomies', 'zeen' ),
		)
	);
	zeen_section_tax( $wp_customize, 'section_tax', $src_uri );

	// Section: Author
	$wp_customize->add_section(
		'section_author',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Author Page', 'zeen' ),
		)
	);
	zeen_section_author( $wp_customize, 'section_author', $src_uri );

	// Section: Search
	$wp_customize->add_section(
		'section_search',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Search', 'zeen' ),
		)
	);
	zeen_section_search( $wp_customize, 'section_search', $src_uri );

	// Section: Latest Posts
	$wp_customize->add_section(
		'section_blog_page',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Blog Page', 'zeen' ),
		)
	);
	zeen_section_blog_page( $wp_customize, 'section_blog_page', $src_uri );

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'engagament',
			array(
				'title'    => esc_html__( 'Visitor Engagement', 'zeen' ),
				'priority' => 5,
			)
		)
	);

	// Section: Social Networks
	$wp_customize->add_section(
		'section_social_networks',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Social Network Accounts', 'zeen' ),
		)
	);
	zeen_section_social_networks( $wp_customize, 'section_social_networks', $src_uri );

	// Section: Subscribe
	$wp_customize->add_section(
		'section_subscribe',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Mail Subscriptions', 'zeen' ),
		)
	);
	zeen_section_subscribe( $wp_customize, 'section_subscribe', $src_uri );

	// Section: Slide
	$wp_customize->add_section(
		'section_slide_box',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Sliding Promo Box', 'zeen' ),
		)
	);
	zeen_section_slide_box( $wp_customize, 'section_slide_box', $src_uri );

	// Section: Popup
	$wp_customize->add_section(
		'section_popup',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Timed Popup', 'zeen' ),
		)
	);
	zeen_section_popup( $wp_customize, 'section_popup', $src_uri );

	// Section: Top Bar
	$wp_customize->add_section(
		'section_top_bar_message',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Top Bar Message', 'zeen' ),
		)
	);
	zeen_section_top_bar_message( $wp_customize, 'section_top_bar_message', $src_uri );

	// Section: Slide
	$wp_customize->add_section(
		'section_slide',
		array(
			'priority' => 5,
			'title'    => esc_html__( 'Slide-In Menu', 'zeen' ),
		)
	);
	zeen_section_slide( $wp_customize, 'section_slide', $src_uri );

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'plugins',
			array(
				'title'    => esc_html__( 'Plugin Integrations', 'zeen' ),
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_section(
		'section_amp',
		array(
			'priority' => 5,
			'title'    => 'AMP',
		)
	);
	zeen_section_amp( $wp_customize, 'section_amp', $src_uri );

	$wp_customize->add_section(
		'section_lets_review',
		array(
			'priority' => 5,
			'title'    => "Let's Review",
		)
	);
	zeen_section_lets_review( $wp_customize, 'section_lets_review', $src_uri );

	// Section: LWA
	$wp_customize->add_section(
		'section_plugins_lwa',
		array(
			'priority' => 5,
			'title'    => 'Login With Ajax',
		)
	);
	zeen_section_plugins_lwa( $wp_customize, 'section_plugins_lwa', $src_uri );

	// Section: WooCommerce
	if ( zeen_woo_active() ) {
		$wp_customize->add_section(
			'section_plugins_woo',
			array(
				'priority' => 5,
				'title'    => 'Zeen WooCommerce',
				'panel'    => 'woocommerce',
			)
		);
		$wp_customize->get_panel( 'woocommerce' )->priority = 6;
	} else {
		$wp_customize->add_section(
			'section_plugins_woo',
			array(
				'priority' => 5,
				'title'    => 'WooCommerce',
			)
		);
	}
	zeen_section_plugins_woo( $wp_customize, 'section_plugins_woo', $src_uri );

	// Section: bbPress
	$wp_customize->add_section(
		'section_plugins_bbpress',
		array(
			'priority' => 7,
			'title'    => 'bbPress',
		)
	);
	zeen_section_plugins_bbpress( $wp_customize, 'section_plugins_bbpress', $src_uri );

	// Section: BuddyPress
	$wp_customize->add_section(
		'section_plugins_buddypress',
		array(
			'priority' => 7,
			'title'    => 'BuddyPress',
		)
	);
	zeen_section_plugins_buddypress( $wp_customize, 'section_plugins_buddypress', $src_uri );

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'customcode',
			array(
				'title'    => esc_html__( 'Customizations', 'zeen' ),
				'priority' => 8,
			)
		)
	);

	$wp_customize->get_section( 'custom_css' )->priority = 9;

	// Section: White Label
	if ( apply_filters( 'zeen_hide_white_label_tab', '' ) != true ) {
		$wp_customize->add_section(
			'section_white_label',
			array(
				'priority' => 9,
				'title'    => esc_html__( 'White Label', 'zeen' ),
			)
		);
		zeen_section_white_label( $wp_customize, 'section_white_label', $src_uri );
	}
	// Section: Login
	$wp_customize->add_section(
		'section_login',
		array(
			'priority' => 9,
			'title'    => esc_html__( 'Login Screen', 'zeen' ),
		)
	);
	zeen_section_login( $wp_customize, 'section_login', $src_uri );

	$wp_customize->add_section(
		new Zeen_Section_Title(
			$wp_customize,
			'misc',
			array(
				'title'    => esc_html__( 'Miscellaneous', 'zeen' ),
				'priority' => 10,
			)
		)
	);

	// Section: Performance
	$wp_customize->add_section(
		'section_performance',
		array(
			'priority' => 10,
			'title'    => esc_html__( 'Performance', 'zeen' ),
		)
	);
	zeen_section_performance( $wp_customize, 'section_performance', $src_uri );

	$wp_customize->add_section(
		'section_reset',
		array(
			'priority' => 150,
			'title'    => esc_html__( 'Reset Theme Options', 'zeen' ),
		)
	);
	zeen_section_reset( $wp_customize, 'section_reset', $src_uri );

	zeen_selective_refresh( $wp_customize );
}

require get_parent_theme_file_path( 'inc/core/customizer-required.php' );
add_action( 'customize_register', 'zeen_customizer_sections' );
