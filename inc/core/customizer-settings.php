<?php
/**
 * Customizer settings
 *
 * @package Zeen
 * @since 1.0.0
 */

require get_parent_theme_file_path( 'inc/core/resources/customizer-fonts.php' );
require get_parent_theme_file_path( 'inc/core/customizer-settings-ext.php' );

/**
 * Settings & Controls: Above Header Section
 *
 * @since  1.0.0
 */
function zeen_section_above_header( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_base_design_above', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_base_design_above', array(
		'label'       => esc_html__( 'Top Of Site Block', 'zeen' ),
		'description'       => esc_html__( 'Show a block with posts/pages/products/etc or an Instagram feed at the top of your site', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_base_design_above',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'header_block_width', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'header_block_width', array(
		'label'       => esc_html__( 'Block Width', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_width',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Edge To Edge', 'zeen' ),
			2 => esc_html__( 'Boxed', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'header_block_hp_onoff', array(
		'sanitize_callback'     => 'absint',
		'transport' => 'postMessage',
		'default' => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_block_hp_onoff', array(
		'label'       => esc_html__( 'Top Of Site Posts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_hp_onoff',
	) ) );

	$wp_customize->add_setting( 'header_block_design', array(
		'default'              => 83,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'header_block_design', array(
		'section'     => $section,
		'cols'        => 2,
		'settings'    => 'header_block_design',
		'choices'     => zeen_customizer_above_header_blocks(),
	) ) );

	$wp_customize->add_setting( 'header_block_hp', array(
		'sanitize_callback'     => 'absint',
		'default'                => 1,
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_block_hp', array(
		'label'       => esc_html__( 'Only Show On homepage', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_hp',
	) ) );

	$wp_customize->add_setting( 'header_block_mobile', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_block_mobile', array(
		'label'       => esc_html__( 'Show Block On Mobile Devices', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_mobile',
	) ) );

	$wp_customize->add_setting( 'header_block_parallax', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_block_parallax', array(
		'label'       => esc_html__( 'Parallax Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_parallax',
	) ) );

	$wp_customize->add_setting( 'header_block_featured_title_onoff', array(
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_block_featured_title_onoff', array(
		'label'       => esc_html__( 'Add Block Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_featured_title_onoff',
	) ) );

	$wp_customize->add_setting( 'header_block_featured_title', array(
		'default'      => esc_attr__( 'Featured', 'zeen' ),
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( 'header_block_featured_title', array(
		'label'       => esc_html__( 'Block Title', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'header_block_featured_title',
	) );

	$wp_customize->add_setting( 'header_block_sortby', array(
		'default'              => 0,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'header_block_sortby', array(
		'label'       => esc_html__( 'Order by', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_sortby',
		'multi'        => 'off',
		'choices'     => array(
			esc_html__( 'Latest', 'zeen' ),
			esc_html__( 'Trending', 'zeen' ),
			esc_html__( 'Random', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'header_block_source', array(
		'default'              => 'categories',
		'sanitize_callback'      => 'esc_html',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'header_block_source', array(
		'label'       => esc_html__( 'Source', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_source',
		'multi'        => 'off',
		'choices'     => zeen_customizer_post_types( array( 'global' => esc_html__( 'Global', 'zeen' ) ) ),
	) ) );

	$wp_customize->add_setting( 'header_block_categories', array(
		'default'        => '',
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'header_block_categories', array(
		'label'       => esc_html__( 'Categories', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_categories',
		'choices'     => zeen_customizer_categories(),
	) ) );

	$wp_customize->add_setting( 'header_block_tags', array(
		'transport'              => 'postMessage',
		'sanitize_callback'     => 'zeen_sanitize_num_commas',
	) );

	$wp_customize->add_control( 'header_block_tags', array(
		'label'       => esc_html__( 'IDs (e.g. 8,2,11)', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'header_block_tags',
	) );

	$wp_customize->add_setting( 'header_block_pids', array(
		'sanitize_callback'     => 'zeen_sanitize_num_commas',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'header_block_pids', array(
		'label'       => esc_html__( 'IDs (e.g. 8,2,11)', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'header_block_pids',
	) );

	$wp_customize->add_setting( 'header_block_instagram', array(
		'sanitize_callback'     => 'absint',
		'default'                => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_block_instagram', array(
		'label'       => esc_html__( 'Instagram Feed Above Header', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_block_instagram',
	) ) );

	$wp_customize->add_setting( 'header_block_instagram_shortcode', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'header_block_instagram_shortcode', array(
		'label'       => esc_html__( 'Instagram Feed Shortcode', 'zeen' ),
		'section'     => $section,
		'description' => esc_html__( 'Due to big Instagram changes, they have banned all methods of accessing Instagram data, except for certain apps asking users for direct permissions. Click here to see how to get a shortcode', 'zeen' ) . ' - <a href="https://docs.codetipi.com/zeen/#instagram-feed" target="_blank">Zeen Documentation</a>',
		'type'        => 'text',
		'settings'    => 'header_block_instagram_shortcode',
	) );


	$wp_customize->add_setting( 'title_header_base_design_above_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_base_design_above_ad', array(
		'label'       => esc_html__( 'Advertisement Above Site', 'zeen' ),
		'section'           => $section,
		'description'       => esc_html__( 'To make your site extra safe - only shortcodes/HTML code is allowed here. For Javascript ads (i.e. such as AdSense) you need to put them in shortcodes. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
		'settings'          => 'title_header_base_design_above_ad',
	) ) );

	$wp_customize->add_setting( 'header_top_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'header_top_pub', array(
		'label'       => esc_html__( 'Ads Or Custom Code Above Site', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'header_top_pub',
	) );

}

/**
 * Settings & Controls: Header Section
 *
 * @since  1.0.0
 */
function zeen_section_header( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_base_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_base_design', array(
		'label'       => esc_html__( 'Header Base Design', 'zeen' ),
		'description'       => esc_html__( 'Choose the starting point for your header', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_base_design',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'header_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'header_style', array(
		'section'     => $section,
		'settings'    => 'header_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'header-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'header-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'header-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'header-4.png',
			),
			5 => array(
				'url'   => esc_url( $src_uri ) . 'header-5.png',
			),
			6 => array(
				'url'   => esc_url( $src_uri ) . 'header-6.png',
			),
			7 => array(
				'url'   => esc_url( $src_uri ) . 'header-7.png',
			),
			11 => array(
				'url'   => esc_url( $src_uri ) . 'header-11.png',
			),
			12 => array(
				'url'   => esc_url( $src_uri ) . 'header-12.png',
			),
			1 => array(
				'url'   => esc_url( $src_uri ) . 'header-1.png',
			),
			71 => array(
				'url'   => esc_url( $src_uri ) . 'header-71.png',
			),
			72 => array(
				'url'   => esc_url( $src_uri ) . 'header-72.png',
			),
			73 => array(
				'url'   => esc_url( $src_uri ) . 'header-73.png',
			),
			74 => array(
				'url'   => esc_url( $src_uri ) . 'header-74.png',
			),
			81 => array(
				'url'   => esc_url( $src_uri ) . 'header-81.png',
			),
			82 => array(
				'url'   => esc_url( $src_uri ) . 'header-82.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'secondary_menu_flip_contents', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'secondary_menu_flip_contents', array(
		'label'       => esc_html__( 'Reverse Secondary Menu Contents', 'zeen' ),
		'section'     => $section,
		'description'    => esc_html__( 'This will reverse the position of the social icons and text menu items.', 'zeen' ),
		'settings'    => 'secondary_menu_flip_contents',
	) ) );

	$wp_customize->add_setting( 'main_menu_flip_contents', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'main_menu_flip_contents', array(
		'label'       => esc_html__( 'Reverse Main Menu Contents', 'zeen' ),
		'section'     => $section,
		'description'    => esc_html__( 'This will reverse the position of the social icons and text menu items.', 'zeen' ),
		'settings'    => 'main_menu_flip_contents',
	) ) );

	$wp_customize->add_setting( 'secondary_menu_side_enable', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'secondary_menu_side_enable', array(
		'label'       => esc_html__( 'Floating Secondary Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_side_enable',
	) ) );

	$wp_customize->add_setting( 'floating_side_menu', array(
		'sanitize_callback'      => 'absint',
		'default'                => 80,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'floating_side_menu', array(
		'label'       => esc_html__( 'Side Width', 'zeen' ),
		'section'     => $section,
		'settings'    => 'floating_side_menu',
		'choices'     => array(
			'min' => 0,
			'max' => 300,
			'type' => 'px',
			'default' => 80,
		),
	) ) );

	$wp_customize->add_setting( 'header_side_width', array(
		'sanitize_callback'      => 'absint',
		'default'                => 80,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'header_side_width', array(
		'label'       => esc_html__( 'Side Width', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_side_width',
		'choices'     => array(
			'min' => 80,
			'max' => 400,
			'type' => 'px',
			'default' => 80,
		),
	) ) );

	$wp_customize->add_setting( 'title_header_logo', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_logo', array(
		'section'     => $section,
		'settings'    => 'title_header_logo',
		'description'    => esc_html__( 'Main demo logo size:', 'zeen' ) . ' 180px x 45px',
		'label'      => esc_html__( 'Header Logo', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'logo_main', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_main',
		array(
			'section'    => $section,
			'settings'   => 'logo_main',
		)
	) );

	$wp_customize->add_setting( 'logo_main_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_main_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_main_retina',
		)
	) );

	$wp_customize->add_setting( 'logo_text_onoff', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'logo_text_onoff', array(
		'label'       => esc_html__( 'Use Text Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'logo_text_onoff',
	) ) );

	$wp_customize->add_setting( 'logo_text', array(
		'transport'            => 'postMessage',
		'default'              => get_bloginfo( 'name' ),
		'sanitize_callback'    => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'logo_text', array(
		'label'       => esc_html__( 'Text Logo', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'logo_text',
	) );
	$wp_customize->add_setting( 'color_logo_text', array(
		'default'              => '#000',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_logo_text',
		array(
			'label'     => esc_html__( 'Logo Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_logo_text',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#000',
			],
		)
	) );

	$wp_customize->add_setting( 'logo_subtitle_main', array(
		'transport'              => 'postMessage',
		'sanitize_callback'     => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'logo_subtitle_main', array(
		'label'       => esc_html__( 'Logo Subtitle', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'logo_subtitle_main',
	) );

	$wp_customize->add_setting( 'logo_subtitle_main_color', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'logo_subtitle_main_color',
		array(
			'label'     => esc_html__( 'Subtitle Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'logo_subtitle_main_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'logo_main_h1', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'logo_main_h1', array(
		'label'       => esc_html__( 'Make Logo an H1', 'zeen' ),
		'section'     => $section,
		'settings'    => 'logo_main_h1',
	) ) );

	$wp_customize->add_setting( 'alt_logo_main', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_main',
		array(
			'label'       => esc_html__( 'Inverse Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_main',
		)
	) );

	$wp_customize->add_setting( 'alt_logo_main_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_main_retina',
		array(
			'label'      => esc_html__( 'Inverse Retina Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_main_retina',
		)
	) );

	$wp_customize->add_setting( 'title_header_details', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_details', array(
		'label'       => esc_html__( 'Header Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_details',
	) ) );

	$wp_customize->add_setting( 'header_width', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'header_width', array(
		'label'       => esc_html__( 'Base Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_width',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Edge To Edge But Contents Boxed', 'zeen' ),
			2 => esc_html__( 'Edge To Edge', 'zeen' ),
			3 => esc_html__( 'Boxed', 'zeen' ),
		),
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'header' ) );

	$wp_customize->add_setting( 'header_padding_top', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'header_padding_top', array(
		'label'       => esc_html__( 'Spacing Above', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'header_padding_bottom', array(
		'sanitize_callback'      => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'header_padding_bottom', array(
		'label'       => esc_html__( 'Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => 30,
		),
	) ) );


	$wp_customize->add_setting( 'title_global_header_cta', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_header_cta', array(
		'label'       => esc_html__( 'Header Call To Action Button', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_global_header_cta',
	) ) );


	zeen_customizer_cta_buttons( $wp_customize, $section, array(
		'setting' => 'header',
		'font_size_default' => zeen_customize_default('header_cta_font_size'),
	));

	$wp_customize->add_setting( 'title_stickies_header', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_stickies_header', array(
		'label'       => esc_html__( 'Sticky Functionality', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_stickies_header',
	) ) );

	$wp_customize->add_setting( 'header_sticky_onoff', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_sticky_onoff', array(
		'label'       => esc_html__( 'Sticky Functionality', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_sticky_onoff',
	) ) );

	$wp_customize->add_setting( 'header_sticky', array(
		'default' => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'header_sticky', array(
		'section'     => $section,
		'settings'    => 'header_sticky',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-1.gif',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-2.gif',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-3.gif',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-4.gif',
			),
		),
	) ) );

	$wp_customize->add_setting( 'sticky_menu_post_name', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sticky_menu_post_name', array(
		'description'       => esc_html__( 'Only applies when inside a post', 'zeen' ),
		'label'       => esc_html__( 'Show Current Post In Sticky Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sticky_menu_post_name',
	) ) );

	$wp_customize->add_setting( 'sticky_menu_share', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sticky_menu_share', array(
		'label'       => esc_html__( 'Share Buttons In Sticky Menu', 'zeen' ),
		'description'       => esc_html__( 'Adds share buttons next to current post name.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sticky_menu_share',
	) ) );

	$wp_customize->add_setting( 'reading_mode', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'reading_mode', array(
		'label'       => esc_html__( 'Dark Mode Button', 'zeen' ),
		'description'       => esc_html__( 'Adds button next to current post to allow visitors to change the article background to be light/dark.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'reading_mode',
	) ) );

	$wp_customize->add_setting( 'sticky_header_customize', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sticky_header_customize', array(
		'label'       => esc_html__( 'Customize Sticky Header Design', 'zeen' ),
		'section'     => $section,
		'description' => esc_html__( 'Only applies to specific sticky header set-ups', 'zeen' ),
		'settings'    => 'sticky_header_customize',
	) ) );

	$wp_customize->add_setting( 'sticky_header_bg', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => 'rgba(255,255,255,0.9)',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'sticky_header_bg',
		array(
			'label'     => esc_html__( 'Sticky Background', 'zeen' ),

			'section'   => $section,
			'show_opacity' => 'on',
			'settings'  => 'sticky_header_bg',
			'choices' => [
				'default' => 'rgba(255,255,255,0.9)',
			],
		)
	) );

	$wp_customize->add_setting( 'sticky_header_logo_height', array(
		'sanitize_callback'     => 'absint',
		'default'                => 40,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sticky_header_logo_height', array(
		'label'       => esc_html__( 'Sticky Logo Height', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sticky_header_logo_height',
		'choices'     => array(
			'min' => 10,
			'type' => 'px',
			'max' => 200,
			'default' => 40,
		),
	) ) );

	$wp_customize->add_setting( 'sticky_header_padding_top', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sticky_header_padding_top', array(
		'label'       => esc_html__( 'Spacing Above', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sticky_header_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'sticky_header_padding_bottom', array(
		'sanitize_callback'      => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sticky_header_padding_bottom', array(
		'label'       => esc_html__( 'Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sticky_header_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'title_header_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_ad', array(
		'label'       => esc_html__( 'Header Advertisement', 'zeen' ),
		'description' => esc_html__( 'To make the site extra safe - only shortcodes or HTML code is allowed here. For Javascript ads (i.e. AdSense) you need to put it in a shortcode. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_ad',
	) ) );

	$wp_customize->add_setting( 'header_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'header_pub', array(
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'header_pub',
	) );

}

/**
 * Settings & Controls: Secondary Menu
 *
 * @since  1.0.0
 */
function zeen_section_secondary_menu( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_header_secondary_menu', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_secondary_menu', array(
		'label'      => esc_html__( 'Secondary Menu Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_secondary_menu',
	) ) );

	$wp_customize->add_setting( 'secondary_menu_width', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'secondary_menu_width', array(
		'label'     => esc_html__( 'Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_width',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Edge To Edge But Contents Boxed', 'zeen' ),
			2 => esc_html__( 'Edge To Edge', 'zeen' ),
			3 => esc_html__( 'Boxed', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'secondary_menu_skin', array(
		'default'                => 2,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'secondary_menu_skin', array(
		'label'       => esc_html__( 'Theme', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_skin',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'White', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
			3 => esc_html__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'secondary_menu_skin_color', array(
		'default'               => '#ffffff',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'secondary_menu_skin_color_b', array(
		'default'               => '',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Color_Multi( $wp_customize, 'secondary_menu_skin_color', array(
		'label'       => esc_html__( 'Background Color', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'secondary_menu_skin_color', 'secondary_menu_skin_color_b' ),
		'choices' => [
			'disableAlpha' => true,
			'default' => '',
		],
	) ) );

	$wp_customize->add_setting( 'secondary_menu_color', array(
		'default'                => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',

	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'secondary_menu_color',
		array(
			'label'      => esc_html__( 'Base Font Color', 'zeen' ),
			'section'    => $section,
			'settings'   => 'secondary_menu_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'secondary_menu_borders', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'secondary_menu_borders', array(
		'label'       => esc_html__( 'Borders', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_borders',
	) ) );

	$wp_customize->add_setting( 'secondary_menu_top_border_width', array(
		'default'               => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'secondary_menu_top_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'secondary_menu_top_border_color', array(
		'default'               => '#eee',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'secondary_menu_top_border_width', array(
		'label'       => esc_html__( 'Border Above', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'secondary_menu_top_border_width', 'secondary_menu_top_border_style', 'secondary_menu_top_border_color' ),
	) ) );

	$wp_customize->add_setting( 'secondary_menu_bottom_border_width', array(
		'default' => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'secondary_menu_bottom_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'secondary_menu_bottom_border_color', array(
		'default' => '#eee',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'secondary_menu_bottom_border_width', array(
		'label'       => esc_html__( 'Border Below', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'secondary_menu_bottom_border_width', 'secondary_menu_bottom_border_style', 'secondary_menu_bottom_border_color' ),
	) ) );

	$wp_customize->add_setting( 'secondary_menu_padding_top', array(
		'sanitize_callback'     => 'absint',
		'default'                => 10,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'secondary_menu_padding_top', array(
		'label'       => esc_html__( 'Spacing Top', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 50,
			'default' => 10,
		),
	) ) );

	$wp_customize->add_setting( 'secondary_menu_padding_bottom', array(
		'sanitize_callback'      => 'absint',
		'default'                => 10,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'secondary_menu_padding_bottom', array(
		'label'       => esc_html__( 'Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 50,
			'default' => 10,
		),
	) ) );

	$wp_customize->add_setting( 'title_header_secondary_menu_icons', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_secondary_menu_icons', array(
		'label'      => esc_html__( 'Secondary Menu Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_secondary_menu_icons',
	) ) );

	zeen_customizer_social_icons(
		$wp_customize,
		$section,
		array(
			'location' => 'secondary_menu',
		)
	);

	$wp_customize->add_setting( 'secondary_date', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'secondary_date', array(
		'label'       => esc_html__( 'Current Date', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_date',
	) ) );

	$wp_customize->add_setting( 'current_date_color', array(
		'default'              => '#f8d92f',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'current_date_color',
		array(
			'label'     => esc_html__( 'Date Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'current_date_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f8d92f',
			],
		)
	) );

	$wp_customize->add_setting( 'secondary_menu_padding_sides', array(
		'sanitize_callback'     => 'absint',
		'default'                => 7,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'secondary_menu_padding_sides', array(
		'label'       => esc_html__( 'Spacing Between Menu Items', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_padding_sides',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 50,
			'default' => 7,
		),
	) ) );
}

/**
 * Settings & Controls: Special Headers
 *
 * @since  1.0.0
 */
function zeen_section_special_post_page_header( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_posts_header_design_area', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_header_design_area', array(
		'label'       => esc_html__( 'Default Post Header Design', 'zeen' ),
		'description'       => esc_html__( 'If you want your posts to use a different header design, you can set the default option here. Individual posts can override this via their own options.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_posts_header_design_area',
	) ) );

	$wp_customize->add_setting( 'singular_header', array(
		'default'              => 0,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'singular_header', array(
		'section'     => $section,
		'cols'        => 2,
		'settings'    => 'singular_header',
		'choices'     => zeen_customizer_singular_headers(),
	) ) );

	$wp_customize->add_setting( 'title_posts_header_design', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_header_design', array(
		'label'       => esc_html__( 'Post Header Logo', 'zeen' ),
		'description'      => esc_html__( 'If a post selects a special header, this logo option can be set in case your default header logo is too big or does not look right in the post header designs.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_posts_header_design',
	) ) );

	$wp_customize->add_setting( 'logo_p_menu', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_p_menu',
		array(
			'label'      => esc_html__( 'Post Header Logo (Optional)', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_p_menu',
		)
	) );

	$wp_customize->add_setting( 'logo_p_menu_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_p_menu_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_p_menu_retina',
		)
	) );
}

/**
 * Settings & Controls: Main Menu
 *
 * @since  1.0.0
 */
function zeen_section_main_menu( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_header_main_menu', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_main_menu', array(
		'label'       => esc_html__( 'Main Menu Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_main_menu',
	) ) );

	$wp_customize->add_setting( 'main_menu_width', array(
		'default'        => 3,
		'sanitize_callback'      => 'esc_html',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'main_menu_width', array(
		'label'     => esc_html__( 'Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_width',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Edge To Edge But Contents Boxed', 'zeen' ),
			2 => esc_html__( 'Edge To Edge', 'zeen' ),
			3 => esc_html__( 'Boxed', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'main_menu_skin', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'main_menu_skin', array(
		'label'     => esc_html__( 'Theme', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_skin',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'White', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
			3 => esc_html__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'main_menu_skin_color', array(
		'default'               => '#ffffff',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'main_menu_skin_color_b', array(
		'default'               => '',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Color_Multi( $wp_customize, 'main_menu_skin_color', array(
		'label'       => esc_html__( 'Background Color', 'zeen' ),
		'description'     => esc_html__( 'Select one color for single color. Select two for gradient effect', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'main_menu_skin_color', 'main_menu_skin_color_b' ),
	) ) );

	$wp_customize->add_setting( 'main_menu_change_in_dark_mode', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'            => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'main_menu_change_in_dark_mode', array(
		'label'       => esc_html__( 'Change in Dark Mode', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_change_in_dark_mode',
	) ) );
	$wp_customize->add_setting( 'main_menu_color', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'main_menu_color',
		array(
			'label'      => esc_html__( 'Base Font Color', 'zeen' ),
			'section'    => $section,
			'settings'   => 'main_menu_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'main_menu_top_border_width', array(
		'default'               => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'main_menu_top_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'main_menu_top_border_color', array(
		'default'               => '#eee',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'main_menu_top_border_width', array(
		'label'       => esc_html__( 'Border Above', 'zeen' ),
		'description'       => esc_html__( 'Leave width value at 0 to not show a border', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'main_menu_top_border_width', 'main_menu_top_border_style', 'main_menu_top_border_color' ),
	) ) );

	$wp_customize->add_setting( 'main_menu_bottom_border_width', array(
		'default' => 3,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'main_menu_bottom_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'main_menu_bottom_border_color', array(
		'default' => '#0a0a0a',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'main_menu_bottom_border_width', array(
		'label'       => esc_html__( 'Border Below', 'zeen' ),
		'description'       => esc_html__( 'Leave width value at 0 to not show a border', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'main_menu_bottom_border_width', 'main_menu_bottom_border_style', 'main_menu_bottom_border_color' ),
	) ) );

	$wp_customize->add_setting( 'main_menu_padding_top', array(
		'sanitize_callback'     => 'absint',
		'default'                => 15,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'main_menu_padding_top', array(
		'label'       => esc_html__( 'Spacing Top', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 50,
			'default' => 15,
		),
	) ) );

	$wp_customize->add_setting( 'main_menu_padding_bottom', array(
		'sanitize_callback'      => 'absint',
		'default'                => 15,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'main_menu_padding_bottom', array(
		'label'       => esc_html__( 'Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 50,
			'default' => 15,
		),
	) ) );

	$wp_customize->add_setting( 'title_main_menu_logo', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_main_menu_logo', array(
		'section'     => $section,
		'settings'    => 'title_main_menu_logo',
		'description'    => esc_html__( 'Main demo logo size:', 'zeen' ) . ' 110px x 28px',
		'label'      => esc_html__( 'Main Menu Logo', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'logo_main_menu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_main_menu',
		array(
			'section'    => $section,
			'settings'   => 'logo_main_menu',
		)
	) );

	$wp_customize->add_setting( 'logo_main_menu_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_main_menu_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_main_menu_retina',
		)
	) );

	$wp_customize->add_setting( 'alt_logo_main_menu', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_main_menu',
		array(
			'label'       => esc_html__( 'Inverse Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_main_menu',
		)
	) );

	$wp_customize->add_setting( 'alt_logo_main_menu_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_main_menu_retina',
		array(
			'label'      => esc_html__( 'Inverse Retina Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_main_menu_retina',
		)
	) );

	$wp_customize->add_setting( 'logo_main_menu_position', array(
		'default'              => 1,
		'transport'              => 'postMessage',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'logo_main_menu_position', array(
		'section'     => $section,
		'label'       => esc_html__( 'Logo Style', 'zeen' ),
		'description'       => esc_html__( 'Logo option (#2) requires a logo image file that is taller than your main menu.', 'zeen' ),
		'settings'    => 'logo_main_menu_position',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'main-menu-logo-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'main-menu-logo-2.png',
			),
		)
	) ) );

	$wp_customize->add_setting( 'logo_main_menu_visible', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'logo_main_menu_visible', array(
		'label'     => esc_html__( 'Logo Visibility', 'zeen' ),
		'section'     => $section,
		'settings'    => 'logo_main_menu_visible',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'When Header Is Sticky', 'zeen' ),
			2 => esc_html__( 'Always', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_main_menu_icons', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_main_menu_icons', array(
		'section'     => $section,
		'settings'    => 'title_main_menu_icons',
		'label'      => esc_html__( 'Main Menu Icons', 'zeen' ),
	) ) );

	zeen_customizer_social_icons( $wp_customize, $section, array( 'location' => 'main_menu' ) );

	$wp_customize->add_setting( 'main_menu_date', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'main_menu_date', array(
		'label'       => esc_html__( 'Current Date', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_date',
	) ) );

	$wp_customize->add_setting( 'main_menu_date_color', array(
		'default'              => '#f8d92f',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'main_menu_date_color',
		array(
			'label'     => esc_html__( 'Date Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'main_menu_date_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f8d92f',
			],
		)
	) );

	$wp_customize->add_setting( 'main_menu_padding_sides', array(
		'sanitize_callback'     => 'absint',
		'default'                => 12,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'main_menu_padding_sides', array(
		'label'       => esc_html__( 'Items Spacing Between', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_padding_sides',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 50,
			'default' => 12,
		),
	) ) );
}

/**
 * Settings & Controls: Typography > Fonts
 *
 * @since  3.6.3
 */
function zeen_section_typography_fonts( $wp_customize, $section, $src_uri ) {

	$all_font_names = array(
		1 => esc_html__( 'Font 1', 'zeen' ),
		2 => esc_html__( 'Font 2', 'zeen' ),
		3 => esc_html__( 'Font 3', 'zeen' ),
	);
	$wp_customize->add_setting( 'title_header_typography_headings', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_headings', array(
		'label'       => esc_html__( 'Font Combination 1', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_headings',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'font_1_source', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_1_source', array(
		'label'       => esc_html__( 'Font Source', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_1_source',
		'multi'        => 'off',
		'choices'     => array(
			1 => 'Google Fonts',
			2 => 'Typekit',
			3 => esc_attr__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_1_google', array(
		'default' => 'Playfair Display',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_setting( 'font_1_google_weight', array(
		'default' => '400',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_setting( 'font_1_google_subset', array(
		'default' => array( 'latin' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
	) );

	$wp_customize->add_setting( 'font_1_google_cat',  array(
		'default' => 'sans-serif',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Typo( $wp_customize, 'font_1_google', array(
		'label'       => esc_html__( 'Font', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'font_1_google', 'font_1_google_weight', 'font_1_google_subset', 'font_1_google_cat' ),
		'choices'           => zeen_google(),
	) ) );

	$wp_customize->add_setting( 'font_1_typekit', array(
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_1_typekit', array(
		'label'       => esc_html__( 'Typekit Project ID', 'zeen' ),
		'description' => esc_html__( 'Log in to your Typekit account, add fonts to your kit and publish. Now copy and paste the Typekit project ID in the input below.', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_1_typekit',
	) );

	$wp_customize->add_setting( 'font_1_typekit_custom', array(
		'default'        => '',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_1_typekit_custom', array(
		'label'       => esc_html__( 'Typekit Font Name', 'zeen' ),
		'description' => esc_html__( 'Enter the font-family name value here. Click "Using fonts in CSS" option in Typekit editor to get correct name. Example: banshee-std', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_1_typekit_custom',
	) );

	$wp_customize->add_setting( 'font_1_custom', array(
		'default'        => '',
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_1_custom', array(
		'label'       => esc_html__( 'Custom Font Name', 'zeen' ),
		'description' => esc_html__( 'You need to add your font via "@fontface" in the custom css option first (Tutorial: https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp). Then just enter the font-family name value here. Example: Droid Serif', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_1_custom',
	) );

	$wp_customize->add_setting( 'font_1_typekit_fallback', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_1_typekit_fallback', array(
		'label'       => esc_html__( 'Fallback', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_1_typekit_fallback',
		'multi'        => 'off',
		'choices'     => array(
			1 => 'Sans-serif',
			2 => 'Serif',
		),
	) ) );

	$wp_customize->add_setting( 'font_1_weight_custom', array(
		'default'        => 'regular',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_1_weight_custom', array(
		'label'       => esc_html__( 'Font Weight', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_1_weight_custom',
		'multi'        => 'off',
		'choices'     => zeen_customizer_font_weights(),
	) ) );

	$wp_customize->add_setting( 'title_header_typography_secondary', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_secondary', array(
		'label'       => esc_html__( 'Font Combination 2', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_secondary',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'font_2_source', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_2_source', array(
		'label'       => esc_html__( 'Font Source', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_2_source',
		'multi'        => 'off',
		'choices'     => array(
			1 => 'Google Fonts',
			2 => 'Typekit',
			3 => esc_attr__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_2_google', array(
		'default' => 'Lato',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_setting( 'font_2_google_weight', array(
		'default' => '400',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_setting( 'font_2_google_subset', array(
		'default' => array( 'latin' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
	) );

	$wp_customize->add_setting( 'font_2_google_cat',  array(
		'default' => 'sans-serif',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Typo( $wp_customize, 'font_2_google', array(
		'label'       => esc_html__( 'Font', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'font_2_google', 'font_2_google_weight', 'font_2_google_subset', 'font_2_google_cat' ),
		'choices'           => zeen_google(),
	) ) );

	$wp_customize->add_setting( 'font_2_typekit', array(
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_2_typekit', array(
		'label'       => esc_html__( 'Typekit Kit ID', 'zeen' ),
		'description' => esc_html__( 'Log in to your Typekit account, add fonts to your kit and publish. Now copy and paste the Typekit Kit ID in the input below.', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_2_typekit',
	) );

	$wp_customize->add_setting( 'font_2_typekit_custom', array(
		'default'        => '',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_2_typekit_custom', array(
		'label'       => esc_html__( 'Typekit Font Name', 'zeen' ),
		'description' => esc_html__( 'Enter the font-family name value here. Click "Using fonts in CSS" option in Typekit editor to get correct name. Example: banshee-std', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_2_typekit_custom',
	) );

	$wp_customize->add_setting( 'font_2_custom', array(
		'default'        => '',
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_2_custom', array(
		'label'       => esc_html__( 'Custom Font Name', 'zeen' ),
		'description' => esc_html__( 'You need to add your font via "@fontface" in the custom css option first (Tutorial: https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp). Then just enter the font-family name value here. Example: Droid Serif', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_2_custom',
	) );

	$wp_customize->add_setting( 'font_2_typekit_fallback', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_2_typekit_fallback', array(
		'label'       => esc_html__( 'Fallback', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_2_typekit_fallback',
		'multi'        => 'off',
		'choices'     => array(
			1 => 'Sans-serif',
			2 => 'Serif',
		),
	) ) );

	$wp_customize->add_setting( 'font_2_weight_custom', array(
		'default'        => 'regular',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_2_weight_custom', array(
		'label'       => esc_html__( 'Font Weight', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_2_weight_custom',
		'multi'        => 'off',
		'choices'     => zeen_customizer_font_weights(),
	) ) );

	$wp_customize->add_setting( 'title_header_typo_font_3', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typo_font_3', array(
		'label'       => esc_html__( 'Font Combination 3', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typo_font_3',
	) ) );

	$wp_customize->add_setting( 'font_3_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'font_3_onoff', array(
		'label'       => esc_html__( 'Enable Font Combo 3', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_3_onoff',
	) ) );

	$wp_customize->add_setting( 'font_3_source', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_3_source', array(
		'label'       => esc_html__( 'Font Source', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_3_source',
		'multi'        => 'off',
		'choices'     => array(
			1 => 'Google Fonts',
			2 => 'Typekit',
			3 => esc_attr__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_3_google', array(
		'default' => 'Montserrat',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_setting( 'font_3_google_weight', array(
		'sanitize_callback'      => 'esc_attr',
		'default' => '400',
	) );

	$wp_customize->add_setting( 'font_3_google_subset', array(
		'default' => array( 'latin' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
	) );

	$wp_customize->add_setting( 'font_3_google_cat', array(
		'default' => 'sans-serif',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Typo( $wp_customize, 'font_3_google', array(
		'label'       => esc_html__( 'Font', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'font_3_google', 'font_3_google_weight', 'font_3_google_subset', 'font_3_google_cat' ),
		'choices'           => zeen_google(),
	) ) );

	$wp_customize->add_setting( 'font_3_typekit', array(
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_3_typekit', array(
		'label'       => esc_html__( 'Typekit Kit ID', 'zeen' ),
		'description' => esc_html__( 'Log in to your Typekit account, add fonts to your kit and publish. Now copy and paste the Typekit Kit ID in the input below.', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_3_typekit',
	) );

	$wp_customize->add_setting( 'font_3_typekit_custom', array(
		'default'        => '',
		'sanitize_callback' => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_3_typekit_custom', array(
		'label'       => esc_html__( 'Typekit Font Name', 'zeen' ),
		'description' => esc_html__( 'Enter the font-family name value here. Click "Using fonts in CSS" option in Typekit editor to get correct name. Example: banshee-std', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_3_typekit_custom',
	) );

	$wp_customize->add_setting( 'font_3_custom', array(
		'default'        => '',
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'font_3_custom', array(
		'label'       => esc_html__( 'Custom Font Name', 'zeen' ),
		'description' => esc_html__( 'You need to add your font via "@fontface" in the custom css option first (Tutorial: https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp). Then just enter the font-family name value here. Example: Droid Serif', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'font_3_custom',
	) );

	$wp_customize->add_setting( 'font_3_typekit_fallback', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_3_typekit_fallback', array(
		'label'       => esc_html__( 'Fallback', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_3_typekit_fallback',
		'multi'        => 'off',
		'choices'     => array(
			1 => 'Sans-serif',
			2 => 'Serif',
		),
	) ) );

	$wp_customize->add_setting( 'font_3_weight_custom', array(
		'default'        => 'regular',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'font_3_weight_custom', array(
		'label'       => esc_html__( 'Font Weight', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_3_weight_custom',
		'multi'        => 'off',
		'choices'     => zeen_customizer_font_weights(),
	) ) );

	$wp_customize->add_setting( 'title_header_typography_specific', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_specific', array(
		'label'             => esc_html__( 'Assign Fonts', 'zeen' ),
		'description'       => esc_html__( 'Select which font each element uses', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_specific',
	) ) );

	$wp_customize->add_setting( 'typo_headings', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_headings', array(
		'label'       => esc_html__( 'Headings', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_headings',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_body', array(
		'default'                => 2,
		'transport'              => 'postMessage',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_body', array(
		'label'       => esc_html__( 'Body', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_body',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_buttons', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_buttons', array(
		'label'       => esc_html__( 'Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_buttons',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_subtitles', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_subtitles', array(
		'label'       => esc_html__( 'Subtitles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_subtitles',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_byline', array(
		'default'                => 3,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_byline', array(
		'label'       => esc_html__( 'Byline', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_byline',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_main_menu', array(
		'default'                => 3,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_main_menu', array(
		'label'       => esc_html__( 'Main Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_main_menu',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_secondary_menu', array(
		'default'                => 3,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_secondary_menu', array(
		'label'       => esc_html__( 'Secondary Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_secondary_menu',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_footer_menu', array(
		'default'                => 3,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_footer_menu', array(
		'label'       => esc_html__( 'Footer Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_footer_menu',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_mobile_menu', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_mobile_menu', array(
		'label'       => esc_html__( 'Mobile Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_mobile_menu',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_widget_headers', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_widget_headers', array(
		'label'       => esc_html__( 'Widget Headings', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_widget_headers',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_copyright', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_copyright', array(
		'label'       => esc_html__( 'Copyright Line', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_copyright',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_blockquotes', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_blockquotes', array(
		'label'       => esc_html__( 'Blockquotes', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_blockquotes',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_share_buttons', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_share_buttons', array(
		'label'       => esc_html__( 'Share Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_share_buttons',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_review_numbers', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_review_numbers', array(
		'label'       => esc_html__( 'Review Numbers', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_review_numbers',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_logo_text', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
			'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_logo_text', array(
		'label'       => esc_html__( 'Text Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_logo_text',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_read_more', array(
		'default'                => 3,
		'sanitize_callback'      => 'absint',
			'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_read_more', array(
		'label'       => esc_html__( 'Read More', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_read_more',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_input', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_input', array(
		'label'       => esc_html__( 'Text Inputs', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_input',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );

	$wp_customize->add_setting( 'typo_input_number', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_input_number', array(
		'label'       => esc_html__( 'Number Inputs', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_input_number',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );
	$wp_customize->add_setting( 'typo_tooltip', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_tooltip', array(
		'label'       => esc_html__( 'Tooltips', 'zeen' ),
		'section'     => $section,
		'settings'    => 'typo_tooltip',
		'multi'        => 'off',
		'choices'     => $all_font_names,
	) ) );
	if ( zeen_woo_active() ) {

		$wp_customize->add_setting( 'typo_price', array(
			'default'                => 1,
			'sanitize_callback'      => 'absint',
		) );

		$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'typo_price', array(
			'label'       => 'WooCommerce: ' . esc_html__( 'Price', 'zeen' ),
			'section'     => $section,
			'settings'    => 'typo_price',
			'multi'        => 'off',
			'choices'     => $all_font_names,
		) ) );
	}
}

/**
 * Settings & Controls: Typography > Font Sizes
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_sizes( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_typography_font_sizes', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_font_sizes', array(
		'label'       => esc_html__( 'Font Sizes', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_font_sizes',
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_general', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_general', array(
		'label'       => esc_html__( 'General', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_general',
	) ) );

	$wp_customize->add_setting( 'font_size_body', array(
		'default'       => zeen_customize_default( 'font_size_body' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_body', array(
		'label'       => esc_html__( 'Body', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_body',
		'choices'     => array(
			'min' => 12,
			'max' => 30,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_body' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_line_height', array(
		'transport'              => 'postMessage',
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default' => zeen_customize_default( 'font_line_height' ),
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_line_height', array(
		'label'       => esc_html__( 'Line Height', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_line_height',
		'choices'     => array(
			'min' => 1,
			'max' => 2.5,
			'step' => 0.01,
			'default' => zeen_customize_default( 'font_line_height' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_byline', array(
		'default'                => zeen_customize_default( 'font_size_byline' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_byline', array(
		'label'       => esc_html__( 'Byline', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_byline',
		'choices'     => array(
			'min' => 8,
			'max' => 30,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_byline' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_buttons', array(
		'default'                => zeen_customize_default( 'font_size_buttons' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_buttons', array(
		'label'       => esc_html__( 'Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_buttons',
		'choices'     => array(
			'min' => 8,
			'max' => 30,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_buttons' ),
		),
	) ) );

	$wp_customize->add_setting( 'excerpt_font_size', array(
		'default'                => zeen_customize_default( 'excerpt_font_size' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'excerpt_font_size', array(
		'label'       => esc_html__( 'Excerpts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'excerpt_font_size',
		'choices'     => array(
			'min' => 12,
			'max' => 30,
			'type' => 'px',
			'default' => zeen_customize_default( 'excerpt_font_size' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_logo_text', array(
		'default'                => zeen_customize_default( 'font_size_logo_text' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_logo_text', array(
		'label'       => esc_html__( 'Text Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_logo_text',
		'choices'     => array(
			'min' => 8,
			'max' => 150,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_logo_text' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_breadcrumbs', array(
		'default'                => zeen_customize_default( 'font_size_breadcrumbs' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_breadcrumbs', array(
		'label'       => esc_html__( 'Breadcrumbs', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_breadcrumbs',
		'choices'     => array(
			'min' => 8,
			'max' => 150,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_breadcrumbs' ),
		),
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_inner_post', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_inner_post', array(
		'label'       => esc_html__( 'Inside Posts', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_inner_post',
	) ) );

	$wp_customize->add_setting( 'font_size_post_inner', array(
		'default'                => zeen_customize_default( 'font_size_post_inner' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_post_inner', array(
		'label'       => esc_html__( 'Small Hero: Main Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_post_inner',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_post_inner' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_hero_subtitle_s', array(
		'default'                => zeen_customize_default( 'font_size_hero_subtitle_s' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_hero_subtitle_s', array(
		'label'       => esc_html__( 'Small Hero: Main Subtitle', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_hero_subtitle_s',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default'                => zeen_customize_default( 'font_size_hero_subtitle_s' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_hero_title_m', array(
		'default'                => zeen_customize_default( 'font_size_hero_title_m' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_hero_title_m', array(
		'label'       => esc_html__( 'Medium Hero: Main Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_hero_title_m',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_hero_title_m' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_hero_subtitle_m', array(
		'default'                => zeen_customize_default( 'font_size_hero_subtitle_m' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_hero_subtitle_m', array(
		'label'       => esc_html__( 'Medium Hero: Main Subtitle', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_hero_subtitle_m',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_hero_subtitle_m' ),
		),
	) ) );
	$wp_customize->add_setting( 'font_size_hero_title_l', array(
		'default'       => zeen_customize_default( 'font_size_hero_title_l' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_hero_title_l', array(
		'label'       => esc_html__( 'Large Hero: Main Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_hero_title_l',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_hero_title_l' ),
		),
	) ) );
	$wp_customize->add_setting( 'font_size_hero_subtitle_l', array(
		'default'       => zeen_customize_default( 'font_size_hero_subtitle_l' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_hero_subtitle_l', array(
		'label'       => esc_html__( 'Large Hero: Main Subtitle', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_hero_subtitle_l',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_hero_subtitle_l' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_h1', array(
		'default'       => zeen_customize_default( 'font_size_h1' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_h1', array(
		'label'       => 'H1',
		'section'     => $section,
		'settings'    => 'font_size_h1',
		'choices'     => array(
			'min' => 12,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_h1' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_h2', array(
		'default'       => zeen_customize_default( 'font_size_h2' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_h2', array(
		'label'       => 'H2',
		'section'     => $section,
		'settings'    => 'font_size_h2',
		'choices'     => array(
			'min' => 12,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_h2' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_h3', array(
		'default'       => zeen_customize_default( 'font_size_h3' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_h3', array(
		'label'       => 'H3',
		'section'     => $section,
		'settings'    => 'font_size_h3',
		'choices'     => array(
			'min' => 12,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_h3' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_h4', array(
		'default'       => zeen_customize_default( 'font_size_h4' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_h4', array(
		'label'       => 'H4',
		'section'     => $section,
		'settings'    => 'font_size_h4',
		'choices'     => array(
			'min' => 12,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_h4' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_h5', array(
		'default'       => zeen_customize_default( 'font_size_h5' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_h5', array(
		'label'       => 'H5',
		'section'     => $section,
		'settings'    => 'font_size_h5',
		'choices'     => array(
			'min' => 12,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_h5' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_tags', array(
		'default'                => zeen_customize_default( 'font_size_tags' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_tags', array(
		'label'       => esc_html__( 'Tags', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_tags',
		'choices'     => array(
			'min' => 8,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_tags' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_inline_post', array(
		'default'       => 20,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_inline_post', array(
		'label'       => esc_html__( 'Inline Post Block: Post Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_inline_post',
		'choices'     => array(
			'min' => 20,
			'max' => 40,
			'type' => 'px',
			'default' => 20,
		),
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_menu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_menu', array(
		'label'       => esc_html__( 'Main Menu', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_menu',
	) ) );

	$wp_customize->add_setting( 'main_menu_font_size', array(
		'default'       => zeen_customize_default( 'main_menu_font_size' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'main_menu_font_size', array(
		'label'       => esc_html__( 'Menu Items', 'zeen' ),
		'section'     => $section,
		'settings'    => 'main_menu_font_size',
		'choices'     => array(
			'min' => 10,
			'type' => 'px',
			'max' => 30,
			'responsive_off' => 'm',
			'default' => zeen_customize_default( 'main_menu_font_size' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_mm_sub_menu', array(
		'default'       => zeen_customize_default( 'font_size_mm_sub_menu' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_mm_sub_menu', array(
		'label'       => esc_html__( 'Menu Item Dropdowns', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_mm_sub_menu',
		'choices'     => array(
			'min' => 8,
			'max' => 24,
			'type' => 'px',
			'responsive_off' => 'm',
			'default' => zeen_customize_default( 'font_size_mm_sub_menu' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_main_menu_social_icons', array(
		'default'       => zeen_customize_default( 'font_size_main_menu_social_icons' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_main_menu_social_icons', array(
		'label'       => esc_html__( 'Social Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_main_menu_social_icons',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'responsive_off' => 'm',
			'default' => zeen_customize_default( 'font_size_main_menu_social_icons' ),
		),
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_secondary', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_secondary', array(
		'label'       => esc_html__( 'Secondary Menu', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_secondary',
	) ) );

	$wp_customize->add_setting( 'secondary_menu_font_size', array(
		'default'       => zeen_customize_default( 'secondary_menu_font_size' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'secondary_menu_font_size', array(
		'label'       => esc_html__( 'Menu Items', 'zeen' ),
		'section'     => $section,
		'settings'    => 'secondary_menu_font_size',
		'choices'     => array(
			'min' => 10,
			'max' => 30,
			'type' => 'px',
			'responsive_off' => 'm',
			'default' => zeen_customize_default( 'secondary_menu_font_size' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_secondary_menu_social_icons', array(
		'default'       => zeen_customize_default( 'font_size_secondary_menu_social_icons' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_secondary_menu_social_icons', array(
		'label'       => esc_html__( 'Social Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_secondary_menu_social_icons',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'responsive_off' => 'm',
			'default' => zeen_customize_default( 'font_size_secondary_menu_social_icons' ),
		),
	) ) );
	$wp_customize->add_setting( 'subtitle_typo_font_sizes_mob_header', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_mob_header', array(
		'label'       => esc_html__( 'Mobile Header', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_mob_header',
	) ) );

	$wp_customize->add_setting( 'mobile_header_menu_font_size', array(
		'default'       => 13,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'mobile_header_menu_font_size', array(
		'label'       => esc_html__( 'Mobile Header Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_menu_font_size',
		'choices'     => array(
			'min' => 10,
			'max' => 30,
			'type' => 'px',
			'default' => 13,
		),
	) ) );

	$wp_customize->add_setting( 'typo_font_size_footer', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'typo_font_size_footer', array(
		'label'       => esc_html__( 'Footer', 'zeen' ),
		'section'           => $section,
		'settings'          => 'typo_font_size_footer',
	) ) );

	$wp_customize->add_setting( 'footer_menu_font_size', array(
		'default'       => zeen_customize_default( 'footer_menu_font_size' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_menu_font_size', array(
		'label'       => esc_html__( 'Footer Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_menu_font_size',
		'choices'     => array(
			'min' => 10,
			'max' => 30,
			'type' => 'px',
			'default' => zeen_customize_default( 'footer_menu_font_size' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_copyright', array(
		'default'                => zeen_customize_default( 'font_size_copyright' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_copyright', array(
		'label'       => esc_html__( 'Copyright Line', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_copyright',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_copyright' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_footer_social_icons', array(
		'default'       => zeen_customize_default( 'font_size_footer_social_icons' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_footer_social_icons', array(
		'label'       => esc_html__( 'Social Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_footer_social_icons',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_footer_social_icons' ),
		),
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_block', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_block', array(
		'label'       => esc_html__( 'Classic Blocks Font Sizes', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_block',
	) ) );

	$wp_customize->add_setting( 'font_size_block_main_title', array(
		'default'       => zeen_customize_default( 'font_size_block_main_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_block_main_title', array(
		'label'       => esc_html__( 'Block Header Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_block_main_title',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_block_main_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_block_main_subtitle', array(
		'default'       => zeen_customize_default( 'font_size_block_main_subtitle' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_block_main_subtitle', array(
		'label'       => esc_html__( 'Block Header Subtitle', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_block_main_subtitle',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_block_main_subtitle' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_classic_blocks_title_xl', array(
		'default'       => zeen_customize_default( 'font_size_classic_blocks_title_xl' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_classic_blocks_title_xl', array(
		'label'       => esc_html__( 'Extra Large Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_classic_blocks_title_xl',
		'choices'     => array(
			'min' => 8,
			'max' => 80,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_classic_blocks_title_xl' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_classic_blocks_title_l', array(
		'default'       => zeen_customize_default( 'font_size_classic_blocks_title_l' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_classic_blocks_title_l', array(
		'label'       => esc_html__( 'Large Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_classic_blocks_title_l',
		'choices'     => array(
			'min' => 8,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_classic_blocks_title_l' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_classic_blocks_title', array(
		'default'       => zeen_customize_default( 'font_size_classic_blocks_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_classic_blocks_title', array(
		'label'       => esc_html__( 'Medium Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_classic_blocks_title',
		'choices'     => array(
			'min' => 8,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_classic_blocks_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_thumbnail_blocks_title', array(
		'default'       => zeen_customize_default( 'font_size_thumbnail_blocks_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_thumbnail_blocks_title', array(
		'label'       => esc_html__( 'Thumbnail Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_thumbnail_blocks_title',
		'choices'     => array(
			'min' => 8,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_thumbnail_blocks_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_classic_blocks_read_more', array(
		'default'       => zeen_customize_default( 'font_size_classic_blocks_read_more' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_classic_blocks_read_more', array(
		'label'       => esc_html__( 'Read More Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_classic_blocks_read_more',
		'choices'     => array(
			'min' => 8,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_classic_blocks_read_more' ),
		),
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_grids', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_grids', array(
		'label'       => esc_html__( 'Grid Blocks', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_grids',
	) ) );

	$wp_customize->add_setting( 'grid_font_size_override', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'grid_font_size_override', array(
		'label'       => esc_html__( 'Edit Grid Font Sizes', 'zeen' ),
		'section'     => $section,
		'settings'    => 'grid_font_size_override',
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_grids_titles', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_grids_titles', array(
		'label'       => esc_html__( 'Grid Main Post Title', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_grids_titles',
	) ) );

	$wp_customize->add_setting( 'font_size_grid_xl_title', array(
		'default'       => zeen_customize_default( 'font_size_grid_xl_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_xl_title', array(
		'label'       => esc_html__( 'Extra Large Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_xl_title',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_xl_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_grid_l_title', array(
		'default'       => zeen_customize_default( 'font_size_grid_l_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_l_title', array(
		'label'       => esc_html__( 'Large Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_l_title',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_l_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_grid_m_title', array(
		'default'       => zeen_customize_default( 'font_size_grid_m_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_m_title', array(
		'label'       => esc_html__( 'Medium Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_m_title',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_m_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_grid_s_title', array(
		'default'       => zeen_customize_default( 'font_size_grid_s_title'),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_s_title', array(
		'label'       => esc_html__( 'Small Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_s_title',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_s_title'),
		),
	) ) );
	$wp_customize->add_setting( 'letter_spacing_grid', array(
		'default'              => zeen_customize_default( 'letter_spacing_grid' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_grid', array(
		'label'       => esc_html__( 'Title Letter Spacing', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_grid',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_grid' ),
		),
	) ) );
	$wp_customize->add_setting( 'subtitle_typo_font_sizes_grids_extras', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_grids_extras', array(
		'label'       => esc_html__( 'Grid Other Titles', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_grids_extras',
	) ) );

	$wp_customize->add_setting( 'font_size_grid_s_subtitle', array(
		'default'       => zeen_customize_default( 'font_size_grid_s_subtitle' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_s_subtitle', array(
		'label'       => esc_html__( 'Subtitles: Small + Medium', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_s_subtitle',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_s_subtitle' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_grid_l_subtitle', array(
		'default'       => zeen_customize_default( 'font_size_grid_l_subtitle' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_l_subtitle', array(
		'label'       => esc_html__( 'Subtitles: Large + Extra Large', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_l_subtitle',
		'choices'     => array(
			'min' => 8,
			'max' => 60,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_l_subtitle' ),
		),
	) ) );

	$wp_customize->add_setting( 'font_size_grid_read_more', array(
		'default'       => zeen_customize_default( 'font_size_grid_read_more' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_grid_read_more', array(
		'label'       => esc_html__( 'Read More Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_grid_read_more',
		'choices'     => array(
			'min' => 8,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_grid_read_more' ),
		),
	) ) );

	$wp_customize->add_setting( 'subtitle_typo_font_sizes_widget', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_widget', array(
		'label'       => esc_html__( 'Widgets', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_typo_font_sizes_widget',
	) ) );

	$wp_customize->add_setting( 'font_size_widget_title', array(
		'default'       => zeen_customize_default( 'font_size_widget_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_widget_title', array(
		'label'       => esc_html__( 'Widget Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'font_size_widget_title',
		'choices'     => array(
			'min' => 9,
			'max' => 40,
			'type' => 'px',
			'default' => zeen_customize_default( 'font_size_widget_title' ),
		),
	) ) );

	if ( zeen_woo_active() ) {

		$wp_customize->add_setting( 'subtitle_typo_font_sizes_woo_hero_s', array(
			'sanitize_callback'      => 'absint',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_woo_hero_s', array(
			'label'       => 'WooCommerce ' . esc_html__( 'Product Page: Small Hero', 'zeen' ),
			'section'           => $section,
			'settings'          => 'subtitle_typo_font_sizes_woo_hero_s',
		) ) );

		$wp_customize->add_setting( 'font_size_woo_title_s', array(
			'default'       => zeen_customize_default(''),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_title_s', array(
			'label'       => esc_html__( 'Main Title', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_title_s',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default('font_size_woo_title_s'),
			),
		) ) );

		$wp_customize->add_setting( 'font_size_woo_price_s', array(
			'default'       => zeen_customize_default(''),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_price_s', array(
			'label'       => esc_html__( 'Main Price', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_price_s',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default('font_size_woo_price_s'),
			),
		) ) );

		$wp_customize->add_setting( 'subtitle_typo_font_sizes_woo_hero_m', array(
			'sanitize_callback'      => 'absint',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_woo_hero_m', array(
			'label'       => 'WooCommerce ' . esc_html__( 'Product Page: Medium Hero', 'zeen' ),
			'section'           => $section,
			'settings'          => 'subtitle_typo_font_sizes_woo_hero_m',
		) ) );

		$wp_customize->add_setting( 'font_size_woo_title_m', array(
			'default'       => zeen_customize_default( 'font_size_woo_title_m'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_title_m', array(
			'label'       => esc_html__( 'Main Title', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_title_m',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_title_m'),
			),
		) ) );

		$wp_customize->add_setting( 'font_size_woo_price_m', array(
			'default'       => zeen_customize_default( 'font_size_woo_price_m'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_price_m', array(
			'label'       => esc_html__( 'Main Price', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_price_m',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_price_m'),
			),
		) ) );

		$wp_customize->add_setting( 'font_size_woo_excerpt_m', array(
			'default'       => zeen_customize_default( 'font_size_woo_excerpt_m'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_excerpt_m', array(
			'label'       => esc_html__( 'Short Description', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_excerpt_m',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_excerpt_m'),
			),
		) ) );

		$wp_customize->add_setting( 'subtitle_typo_font_sizes_woo_hero_l', array(
			'sanitize_callback'      => 'absint',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_woo_hero_l', array(
			'label'       => 'WooCommerce ' . esc_html__( 'Product Page: Large Hero', 'zeen' ),
			'section'           => $section,
			'settings'          => 'subtitle_typo_font_sizes_woo_hero_l',
		) ) );

		$wp_customize->add_setting( 'font_size_woo_title_l', array(
			'default'       => zeen_customize_default( 'font_size_woo_title_l'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_title_l', array(
			'label'       => esc_html__( 'Main Title', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_title_l',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_title_l'),
			),
		) ) );

		$wp_customize->add_setting( 'font_size_woo_price_l', array(
			'default'       => zeen_customize_default( 'font_size_woo_price_l'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_price_l', array(
			'label'       => esc_html__( 'Main Price', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_price_l',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_price_l'),
			),
		) ) );

		$wp_customize->add_setting( 'font_size_woo_excerpt_l', array(
			'default'       => zeen_customize_default( 'font_size_woo_excerpt_l'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_excerpt_l', array(
			'label'       => esc_html__( 'Short Description', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_excerpt_l',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_excerpt_l'),
			),
		) ) );

		$wp_customize->add_setting( 'subtitle_typo_font_sizes_woo_classic', array(
			'sanitize_callback'      => 'absint',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_typo_font_sizes_woo_classic', array(
			'label'       => 'WooCommerce ' . esc_html__( 'Classic Blocks', 'zeen' ),
			'section'           => $section,
			'settings'          => 'subtitle_typo_font_sizes_woo_classic',
		) ) );

		$wp_customize->add_setting( 'font_size_woo_classic_price_l', array(
			'default'       => zeen_customize_default( 'font_size_woo_classic_price_l'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_classic_price_l', array(
			'label'       => esc_html__( 'Large Block Post Prices', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_classic_price_l',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_classic_price_l'),
			),
		) ) );
		$wp_customize->add_setting( 'font_size_woo_classic_price_m', array(
			'default'       => zeen_customize_default( 'font_size_woo_classic_price_m'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_classic_price_m', array(
			'label'       => esc_html__( 'Medium Block Post Prices', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_classic_price_m',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_classic_price_m'),
			),
		) ) );
		$wp_customize->add_setting( 'font_size_woo_classic_price_s', array(
			'default'       => zeen_customize_default( 'font_size_woo_classic_price_s'),
			'sanitize_callback'      => 'zeen_sanitize_array',
			'transport'              => 'postMessage',
		) );

		$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'font_size_woo_classic_price_s', array(
			'label'       => esc_html__( 'Thumbnail Block Post Prices', 'zeen' ),
			'section'     => $section,
			'settings'    => 'font_size_woo_classic_price_s',
			'choices'     => array(
				'min' => 12,
				'max' => 80,
				'type' => 'px',
				'default' => zeen_customize_default( 'font_size_woo_classic_price_s'),
			),
		) ) );

	}
}
/**
 * Settings & Controls: Typography > Letter Spacing
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_letter_spacing( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_typo_letter_spacing', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_typo_letter_spacing', array(
		'label'       => esc_html__( 'Letter Spacing', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_typo_letter_spacing',
	) ) );

	$wp_customize->add_setting( 'title_letter_spacing_general', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_letter_spacing_general', array(
		'label'       => esc_html__( 'General', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_letter_spacing_general',
	) ) );

	$wp_customize->add_setting( 'letter_spacing_body', array(
		'default'              => zeen_customize_default( 'letter_spacing_body' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_body', array(
		'label'       => esc_html__( 'Body', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_body',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_body' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_logo_text', array(
		'default'              => zeen_customize_default( 'letter_spacing_logo_text' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_logo_text', array(
		'label'       => esc_html__( 'Logos (Text ones)', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_logo_text',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_logo_text' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_subtitle', array(
		'default'              => zeen_customize_default( 'letter_spacing_subtitle' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_subtitle', array(
		'label'       => esc_html__( 'Subtitles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_subtitle',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_subtitle' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_buttons', array(
		'default'              => zeen_customize_default( 'letter_spacing_buttons' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_buttons', array(
		'label'       => esc_html__( 'Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_buttons',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_buttons' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_byline', array(
		'default'              => zeen_customize_default( 'letter_spacing_byline' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_byline', array(
		'label'       => esc_html__( 'Bylines', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_byline',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_byline' ),
		),
	) ) );


	$wp_customize->add_setting( 'letter_spacing_widget_title', array(
		'default'              => zeen_customize_default( 'letter_spacing_widget_title' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_widget_title', array(
		'label'       => esc_html__( 'Widget Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_widget_title',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_widget_title' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_read_more', array(
		'default'              => zeen_customize_default( 'letter_spacing_read_more' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_read_more', array(
		'label'       => esc_html__( 'Read More Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_read_more',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_read_more' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_letter_spacing_inner_posts', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_letter_spacing_inner_posts', array(
		'label'       => esc_html__( 'Inside Post Pages', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_letter_spacing_inner_posts',
	) ) );


	$wp_customize->add_setting( 'letter_spacing_h1', array(
		'default'              => zeen_customize_default( 'letter_spacing_h1' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_h1', array(
		'label'       => 'H1',
		'section'     => $section,
		'settings'    => 'letter_spacing_h1',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_h1' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_h2', array(
		'default'              => zeen_customize_default( 'letter_spacing_h2' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_h2', array(
		'label'       => 'H2',
		'section'     => $section,
		'settings'    => 'letter_spacing_h2',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_h2' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_h3', array(
		'default'              => zeen_customize_default( 'letter_spacing_h3' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_h3', array(
		'label'       => 'H3',
		'section'     => $section,
		'settings'    => 'letter_spacing_h3',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_h3' ),
		),
	) ) );


	$wp_customize->add_setting( 'letter_spacing_blockquote', array(
		'default'              => zeen_customize_default( 'letter_spacing_blockquote' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_blockquote', array(
		'label'       => esc_html__( 'Blockquotes', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_blockquote',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_blockquote' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_letter_spacing_header', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_letter_spacing_header', array(
		'label'       => esc_html__( 'Header Area', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_letter_spacing_header',
	) ) );

	$wp_customize->add_setting( 'letter_spacing_main_menu', array(
		'default'              => zeen_customize_default( 'letter_spacing_main_menu' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_main_menu', array(
		'label'       => esc_html__( 'Main Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_main_menu',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_main_menu' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_submenu', array(
		'default'              => zeen_customize_default( 'letter_spacing_submenu' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_submenu', array(
		'label'       => esc_html__( 'Dropdown Menu Items', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_submenu',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_submenu' ),
		),
	) ) );


	$wp_customize->add_setting( 'letter_spacing_secondary_menu', array(
		'default'              => zeen_customize_default( 'letter_spacing_secondary_menu' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_secondary_menu', array(
		'label'       => esc_html__( 'Secondary Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_secondary_menu',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_secondary_menu' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_letter_spacing_footer', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_letter_spacing_footer', array(
		'label'       => esc_html__( 'Footer Area', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_letter_spacing_footer',
	) ) );

	$wp_customize->add_setting( 'letter_spacing_copyright', array(
		'default'              => zeen_customize_default( 'letter_spacing_copyright' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_copyright', array(
		'label'       => esc_html__( 'Copyright Line', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_copyright',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_copyright' ),
		),
	) ) );

	$wp_customize->add_setting( 'letter_spacing_footer_menu', array(
		'default'              => zeen_customize_default( 'letter_spacing_footer_menu' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'letter_spacing_footer_menu', array(
		'label'       => esc_html__( 'Footer Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'letter_spacing_footer_menu',
		'choices'     => array(
			'min' => -0.1,
			'max' => 1,
			'type' => 'em',
			'step' => 0.01,
			'default' => zeen_customize_default( 'letter_spacing_footer_menu' ),
		),
	) ) );

}

/**
 * Settings & Controls: Typography > Underline
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_underline( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_typography_underline', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_underline', array(
		'label'       => esc_html__( 'Underlines', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_underline',
	) ) );
	$wp_customize->add_setting( 'un_link', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'un_link', array(
		'section'     => $section,
		'label'       => esc_html__( 'Article Text Links', 'zeen' ),
		'settings'    => 'un_link',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Off', 'zeen' ),
			2 => esc_html__( 'Underline', 'zeen' ),
			3 => esc_html__( 'Underline On Hover', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'un_link_style', array(
		'default'              => 'solid',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'un_link_style', array(
		'section'     => $section,
		'label'       => esc_html__( 'Article Text Links Style', 'zeen' ),
		'settings'    => 'un_link_style',
		'multi'        => 'off',
		'choices'     => array(
			'solid' => esc_html__( 'Solid', 'zeen' ),
			'double' => esc_html__( 'Double', 'zeen' ),
			'dotted' => esc_html__( 'Dotted', 'zeen' ),
			'dashed' => esc_html__( 'Dashed', 'zeen' ),
			'wavy' => esc_html__( 'Wavy', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'un_link_color', array(
		'default'              => '#f2ce2f',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'un_link_color',
		array(
			'label'     => esc_html__( 'Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'un_link_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f2ce2f',
			],
		)
	) );

	$wp_customize->add_setting( 'un_link_height', array(
		'sanitize_callback'      => 'zeen_sanitizer_float',
		'default' => 2,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'un_link_height', array(
		'label'       => esc_html__( 'Height', 'zeen' ),
		'section'     => $section,
		'settings'    => 'un_link_height',
		'choices'     => array(
			'min' => 1,
			'max' => 10,
			'default' => 2,
		),
	) ) );
}
/**
 * Settings & Controls: Typography > Uppercase
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_uppercase( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_typography_upper', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_upper', array(
		'label'       => esc_html__( 'Uppercase Text', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_upper',
	) ) );

	$wp_customize->add_setting( 'tt_main_menu', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_main_menu', array(
		'label'       => esc_html__( 'Main Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_main_menu',
	) ) );

	$wp_customize->add_setting( 'tt_secondary_menu', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_secondary_menu', array(
		'label'       => esc_html__( 'Secondary Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_secondary_menu',
	) ) );

	$wp_customize->add_setting( 'tt_footer_menu', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'tt_submenu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_submenu', array(
		'label'       => esc_html__( 'Dropdown Menu Items', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_submenu',
	) ) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_footer_menu', array(
		'label'       => esc_html__( 'Footer Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_footer_menu',
	) ) );

	$wp_customize->add_setting( 'tt_mob_header', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_mob_header', array(
		'label'       => esc_html__( 'Mobile Header', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_mob_header',
	) ) );

	$wp_customize->add_setting( 'tt_block_main_title', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_block_main_title', array(
		'label'       => esc_html__( 'Block Main Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_block_main_title',
	) ) );

	$wp_customize->add_setting( 'tt_block_main_subtitle', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_block_main_subtitle', array(
		'label'       => esc_html__( 'Block Main Subtitle', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_block_main_subtitle',
	) ) );

	$wp_customize->add_setting( 'tt_widget_title', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_widget_title', array(
		'label'       => esc_html__( 'Widget Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_widget_title',
	) ) );

	$wp_customize->add_setting( 'tt_classic_post_title', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_classic_post_title', array(
		'label'       => esc_html__( 'Classic Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_classic_post_title',
	) ) );

	$wp_customize->add_setting( 'tt_grid_post_title', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_grid_post_title', array(
		'label'       => esc_html__( 'Grid Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_grid_post_title',
	) ) );

	$wp_customize->add_setting( 'tt_slider_post_title', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_slider_post_title', array(
		'label'       => esc_html__( 'Slider Block Post Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_slider_post_title',
	) ) );

	$wp_customize->add_setting( 'tt_inner_post_title', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_inner_post_title', array(
		'label'       => esc_html__( 'Main Title Inside Posts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_inner_post_title',
	) ) );

	$wp_customize->add_setting( 'tt_byline', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_byline', array(
		'label'       => esc_html__( 'Bylines', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_byline',
	) ) );

	$wp_customize->add_setting( 'tt_read_more', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_read_more', array(
		'label'       => esc_html__( 'Read More Links (Classic Blocks)', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_read_more',
	) ) );

	$wp_customize->add_setting( 'tt_grid_read_more', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_grid_read_more', array(
		'label'       => esc_html__( 'Read More Links (Grid Blocks)', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_grid_read_more',
	) ) );

	$wp_customize->add_setting( 'tt_heading', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_heading', array(
		'label'       => esc_html__( 'Headings Inside Articles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_heading',
	) ) );

	$wp_customize->add_setting( 'tt_buttons', array(
		'default'        => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_buttons', array(
		'label'       => esc_html__( 'Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_buttons',
	) ) );

	$wp_customize->add_setting( 'tt_logo_text', array(
		'default'        => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'tt_logo_text', array(
		'label'       => esc_html__( 'Text Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'tt_logo_text',
	) ) );
}
/**
 * Settings & Controls: Typography > Font Weights
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_weights( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'bold_title_header_typography', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'bold_title_header_typography', array(
		'label'       => esc_html__( 'Bold Text', 'zeen' ),
		'section'           => $section,
		'settings'          => 'bold_title_header_typography',
	) ) );

	$wp_customize->add_setting( 'bold_main_menu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_main_menu', array(
		'label'       => esc_html__( 'Main Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_main_menu',
	) ) );

	$wp_customize->add_setting( 'bold_secondary_menu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_secondary_menu', array(
		'label'       => esc_html__( 'Secondary Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_secondary_menu',
	) ) );

	$wp_customize->add_setting( 'bold_footer_menu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_footer_menu', array(
		'label'       => esc_html__( 'Footer Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_footer_menu',
	) ) );

	$wp_customize->add_setting( 'bold_widget_title', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_widget_title', array(
		'label'       => esc_html__( 'Widget Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_widget_title',
	) ) );

	$wp_customize->add_setting( 'bold_xs_typo', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_xs_typo', array(
		'label'       => esc_html__( 'Small Thumbnail Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_xs_typo',
	) ) );
	$wp_customize->add_setting( 'bold_buttons', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_buttons', array(
		'label'       => esc_html__( 'Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_buttons',
	) ) );

	$wp_customize->add_setting( 'bold_read_more', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bold_read_more', array(
		'label'       => esc_html__( 'Read More Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bold_read_more',
	) ) );

}
/**
 * Settings & Controls: Typography > Font Colors
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_colors( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_header_typography_colors', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_colors', array(
		'label'       => esc_html__( 'Text Colors', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_colors',
	) ) );

	$wp_customize->add_setting( 'color_body', array(
		'default'              => '#444',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_body',
		array(
			'label'     => esc_html__( 'Body', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_body',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#444',
			],
		)
	) );

	$wp_customize->add_setting( 'color_excerpt', array(
		'default'              => '#444',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_excerpt',
		array(
			'label'     => esc_html__( 'Excerpts', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_excerpt',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#444',
			],
		)
	) );

	$wp_customize->add_setting( 'color_heading', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_heading',
		array(
			'label'     => esc_html__( 'Headings', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_heading',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'color_block_post_title', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_block_post_title',
		array(
			'label'     => esc_html__( 'Block Post Headings', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_block_post_title',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'color_byline', array(
		'default'              => '#888888',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_byline',
		array(
			'label'     => esc_html__( 'Bylines', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_byline',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#888888',
			],
		)
	) );

	$wp_customize->add_setting( 'color_blockquote', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_blockquote',
		array(
			'label'     => esc_html__( 'Blockquotes', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_blockquote',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'color_widget_title', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_widget_title',
		array(
			'label'     => esc_html__( 'Widget Titles', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_widget_title',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'color_link', array(
		'default'              => '#333',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_link',
		array(
			'label'     => esc_html__( 'Links', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_link',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#333333',
			],
		)
	) );

	$wp_customize->add_setting( 'color_link_hover', array(
		'default'              => '#000',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_link_hover',
		array(
			'label'     => esc_html__( 'Links (Hover)', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_link_hover',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#000000',
			],
		)
	) );

	$wp_customize->add_setting( 'color_copyright', array(
		'default'              => '#8e8e8e',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_copyright',
		array(
			'label'     => esc_html__( 'Copyright Line', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_copyright',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#8e8e8e',
			],
		)
	) );

	$wp_customize->add_setting( 'color_read_more', array(
		'default'              => '#767676',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_read_more',
		array(
			'label'     => esc_html__( 'Read More Links', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_read_more',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#767676',
			],
		)
	) );

	$wp_customize->add_setting( 'title_header_typography_colors_dark', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_colors_dark', array(
		'label'       => esc_html__( 'Text Colors (Dark Mode)', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_colors_dark',
	) ) );

	$wp_customize->add_setting( 'color_link_dark_mode', array(
		'default'              => '#888888',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_link_dark_mode',
		array(
			'label'     => esc_html__( 'Links', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_link_dark_mode',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#888888',
			],
		)
	) );

	$wp_customize->add_setting( 'color_link_dark_mode_hover', array(
		'default'              => '#555555',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_link_dark_mode_hover',
		array(
			'label'     => esc_html__( 'Links (Hover)', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_link_dark_mode_hover',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#555555',
			],
		)
	) );

	$wp_customize->add_setting( 'color_excerpt_dark_mode', array(
		'default'              => '#888888',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_excerpt_dark_mode',
		array(
			'label'     => esc_html__( 'Excerpts', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_excerpt_dark_mode',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#888888',
			],
		)
	) );

	$wp_customize->add_setting( 'color_byline_dark_mode', array(
		'default'              => '#888888',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_byline_dark_mode',
		array(
			'label'     => esc_html__( 'Bylines', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_byline_dark_mode',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#888888',
			],
		)
	) );

	$wp_customize->add_setting( 'color_blockquote_dark_mode', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_blockquote_dark_mode',
		array(
			'label'     => esc_html__( 'Blockquotes', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_blockquote_dark_mode',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

}
/**
 * Settings & Controls: Typography > Font Italics
 *
 * @since  3.6.3
 */
function zeen_section_typography_font_italic( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_typography_italic', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_typography_italic', array(
		'label'       => esc_html__( 'Italic Text', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_typography_italic',
	) ) );

	$wp_customize->add_setting( 'italic_subtitle', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => '',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'italic_subtitle', array(
		'label'       => esc_html__( 'Post Subtitles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'italic_subtitle',
	) ) );

	$wp_customize->add_setting( 'italic_blockquotes', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => '',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'italic_blockquotes', array(
		'label'       => esc_html__( 'Blockquotes', 'zeen' ),
		'section'     => $section,
		'settings'    => 'italic_blockquotes',
	) ) );
}

/**
 * Settings & Controls: Footer
 *
 * @since  1.0.0
 */
function zeen_section_footer( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_footer_boxed', array(
		'default'                => 1,
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_boxed', array(
		'label'                => esc_html__( 'Footer Width', 'zeen' ),
		'section'              => $section,
		'description'          => esc_html__( 'Full-screen or boxed width', 'zeen' ),
		'settings'             => 'title_footer_boxed',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'footer_width', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'footer_width', array(
		'section'     => $section,
		'settings'    => 'footer_width',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'footer-width-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'footer-width-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'footer_reveal', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'footer_reveal', array(
		'label'       => esc_html__( 'Footer Reveal Effect', 'zeen' ),
		'description'       => esc_html__( 'Your header area should also be set to "screen edge to edge width" to avoid footer overlapping the background', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_reveal',
	) ) );

	$wp_customize->add_setting( 'title_footer_base_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_base_design', array(
		'label'       => esc_html__( 'Base Footer Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_footer_base_design',
	) ) );

	$wp_customize->add_setting( 'footer_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'footer_style', array(
		'section'     => $section,
		'settings'    => 'footer_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'footer-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'footer-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'footer-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'footer-4.png',
			),
			5 => array(
				'url'   => esc_url( $src_uri ) . 'footer-5.png',
			),
			6 => array(
				'url'   => esc_url( $src_uri ) . 'footer-6.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'footer_splitter_top_onoff', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'footer_splitter_top_onoff', array(
		'label'       => esc_html__( 'Top Divider Shape', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_splitter_top_onoff',
	) ) );

	$wp_customize->add_setting( 'footer_splitter_top', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'footer_splitter_top', array(
		'section'     => $section,
		'settings'    => 'footer_splitter_top',
		'cols'        => 2,
		'choices'     => zeen_shape_list( $src_uri, 'footer' ),
	) ) );

	$wp_customize->add_setting( 'footer_top_border_onoff', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'footer_top_border_onoff', array(
		'label'       => esc_html__( 'Border Above Footer', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_top_border_onoff',
	) ) );

	$wp_customize->add_setting( 'footer_top_border_width', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'footer_top_border_style', array(
		'default'                => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'footer_top_border_color', array(
		'default'                => '#333333',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'footer_top_border_width', array(
		'label'       => esc_html__( 'Border', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'footer_top_border_width', 'footer_top_border_style', 'footer_top_border_color' ),
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'footer' ) );

	$wp_customize->add_setting( 'footer_upper_padding_top', array(
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default'                => zeen_customize_default( 'footer_upper_padding_top' ),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_upper_padding_top', array(
		'label'       => esc_html__( 'Logo Area Spacing Above', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_upper_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => zeen_customize_default( 'footer_upper_padding_top' ),
		),
	) ) );

	$wp_customize->add_setting( 'footer_upper_padding_bottom', array(
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default'                => zeen_customize_default( 'footer_upper_padding_bottom' ),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_upper_padding_bottom', array(
		'label'       => esc_html__( 'Logo Area Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_upper_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => zeen_customize_default( 'footer_upper_padding_bottom' ),
		),
	) ) );

	$wp_customize->add_setting( 'footer_widgets_padding_top', array(
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default'                => zeen_customize_default( 'footer_widgets_padding_top' ),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_widgets_padding_top', array(
		'label'       => esc_html__( 'Widget Area Spacing Above', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_widgets_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => zeen_customize_default( 'footer_widgets_padding_top' ),
		),
	) ) );

	$wp_customize->add_setting( 'footer_widgets_padding_bottom', array(
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default'                => zeen_customize_default( 'footer_widgets_padding_bottom' ),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_widgets_padding_bottom', array(
		'label'       => esc_html__( 'Widget Area Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_widgets_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => zeen_customize_default( 'footer_widgets_padding_bottom' ),
		),
	) ) );

	$wp_customize->add_setting( 'footer_lower_padding_top', array(
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default'                => zeen_customize_default( 'footer_lower_padding_top' ),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_lower_padding_top', array(
		'label'       => esc_html__( 'Lower Footer Area Spacing Above', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_lower_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => zeen_customize_default( 'footer_lower_padding_top' ),
		),
	) ) );

	$wp_customize->add_setting( 'footer_lower_padding_bottom', array(
		'sanitize_callback'      => 'zeen_sanitize_array',
		'default'                => zeen_customize_default( 'footer_lower_padding_bottom' ),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_lower_padding_bottom', array(
		'label'       => esc_html__( 'Lower Footer Area Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_lower_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => zeen_customize_default( 'footer_lower_padding_bottom' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_footer_columns', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_columns', array(
		'label'       => esc_html__( 'Widget Area Layout', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_footer_columns',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_style', array(
		'default'              => 3,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'footer_widgets_style', array(
		'section'     => $section,
		'settings'    => 'footer_widgets_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'footer-widgets-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'footer-widgets-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'footer-widgets-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'footer-widgets-4.png',
			),
			5 => array(
				'url'   => esc_url( $src_uri ) . 'footer-widgets-5.png',
			),
			6 => array(
				'url'   => esc_url( $src_uri ) . 'footer-widgets-6.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'footer_widgets_columns_mobile', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'footer_widgets_columns_mobile', array(
		'label'       => esc_html__( 'Mobile Widget Columns Quantity', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_widgets_columns_mobile',
		'choices'     => array(
			'min' => 1,
			'max' => 2,
			'default' => 1,
		),
	) ) );
	$wp_customize->add_setting( 'footer_widgets_border_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'footer_widgets_border_onoff', array(
		'label'       => esc_html__( 'Show Footer Column Dividers', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_widgets_border_onoff',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_border_width', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'footer_widgets_border_style', array(
		'default'                => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'footer_widgets_border_color', array(
		'default'                => '#333333',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'footer_widgets_border_width', array(
		'label'       => esc_html__( 'Divider Design', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'footer_widgets_border_width', 'footer_widgets_border_style', 'footer_widgets_border_color' ),
	) ) );
	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'footer_widgets' ) );

	$wp_customize->add_setting( 'title_footer_widget', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_widget', array(
		'label'       => esc_html__( 'Footer Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_widget',
		'description'    => esc_html__( 'Main demo logo size:', 'zeen' ) . ' 175px x 45px',
	) ) );

	$wp_customize->add_setting( 'logo_footer', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_footer',
		array(
			'label'      => esc_html__( 'Footer Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_footer',
		)
	) );

	$wp_customize->add_setting( 'logo_footer_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_footer_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_footer_retina',
		)
	) );

	$wp_customize->add_setting( 'logo_subtitle_footer', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'logo_subtitle_footer', array(
		'label'       => esc_html__( 'Logo Subtitle', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'logo_subtitle_footer',
	) );

	$wp_customize->add_setting( 'logo_subtitle_footer_color', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'logo_subtitle_footer_color',
		array(
			'label'     => esc_html__( 'Subtitle Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'logo_subtitle_footer_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'alt_logo_footer', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_footer',
		array(
			'label'       => esc_html__( 'Inverse Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_footer',
		)
	) );

	$wp_customize->add_setting( 'alt_logo_footer_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_footer_retina',
		array(
			'label'      => esc_html__( 'Inverse Retina Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_footer_retina',
		)
	) );

	$wp_customize->add_setting( 'title_footer_icons', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_icons', array(
		'label'       => esc_html__( 'Footer Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_icons',
	) ) );

	zeen_customizer_social_icons(
		$wp_customize,
		$section,
		array(
			'location' => 'footer',
		)
	);

	$wp_customize->add_setting( 'title_footer_widgets', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_widgets', array(
		'label'       => esc_html__( 'Footer Widgets', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_widgets',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_centered', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'footer_widgets_centered', array(
		'label'       => esc_html__( 'Centered Widget Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_widgets_centered',
	) ) );

	$wp_customize->add_setting( 'title_footer_totop', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_totop', array(
		'label'       => esc_html__( 'To Top Button', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_totop',
	) ) );

	$wp_customize->add_setting( 'to_top', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'to_top', array(
		'label'       => esc_html__( 'Show To Top Button', 'zeen' ),
		'section'     => $section,
		'settings'    => 'to_top',
	) ) );

	$wp_customize->add_setting( 'to_top_fixed', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'to_top_fixed', array(
		'label'       => esc_html__( 'Fix To Bottom Corner', 'zeen' ),
		'section'     => $section,
		'settings'    => 'to_top_fixed',
	) ) );

	$wp_customize->add_setting( 'to_top_fixed_background', array(
		'default'              => '#000000',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'to_top_fixed_background',
		array(
			'label'     => zeen_customizer_suboption() . ' ' . esc_html__( 'Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'to_top_fixed_background',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#000000',
			],
		)
	) );
	$wp_customize->add_setting( 'to_top_fixed_color', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'to_top_fixed_color',
		array(
			'label'     => zeen_customizer_suboption() . ' ' . esc_html__( 'Arrow Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'to_top_fixed_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );
	$wp_customize->add_setting( 'to_top_icon_show', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'to_top_icon_show', array(
		'label'       => esc_html__( 'Show Icon', 'zeen' ),
		'section'     => $section,
		'settings'    => 'to_top_icon_show',
	) ) );

	$wp_customize->add_setting( 'to_top_icon', array(
		'default'                => 2,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'to_top_icon', array(
		'section'     => $section,
		'settings'    => 'to_top_icon',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'to-top-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'to-top-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'to_top_text', array(
		'default'        => '',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'to_top_text', array(
		'label'       => esc_html__( 'To Top Text', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'to_top_text',
	) );

	$wp_customize->add_setting( 'title_footer_menu_insta', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_menu_insta', array(
		'label'       => esc_html__( 'Instagram Block', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_menu_insta',
	) ) );

	$wp_customize->add_setting( 'footer_instagram', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'footer_instagram', array(
		'label'       => esc_html__( 'Show Instagram Block', 'zeen' ),
		'section'     => $section,
		'settings'    => 'footer_instagram',
	) ) );

	$wp_customize->add_setting( 'footer_instagram_location', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'footer_instagram_location', array(
		'section'     => $section,
		'label'       => esc_html__( 'Location', 'zeen' ),
		'settings'    => 'footer_instagram_location',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Above Footer', 'zeen' ),
			2 => esc_html__( 'Below Footer', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'footer_instagram_shortcode', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'footer_instagram_shortcode', array(
		'label'       => esc_html__( 'Instagram Feed Shortcode', 'zeen' ),
		'section'     => $section,
		'description' => esc_html__( 'Due to big Instagram changes, they have banned all methods of accessing Instagram data, except for certain apps asking users for direct permissions. Click here to see how to get a shortcode', 'zeen' ) . ' - <a href="https://docs.codetipi.com/zeen/#instagram-feed">Zeen Documentation</a>',
		'type'        => 'text',
		'settings'    => 'footer_instagram_shortcode',
	) );

	$wp_customize->add_setting( 'title_footer_menu_copyright', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_menu_copyright', array(
		'label'       => esc_html__( 'Footer Menu Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_menu_copyright',
	) ) );

	$wp_customize->add_setting( 'copyright', array(
		'transport'  => 'postMessage',
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'copyright', array(
		'label'       => esc_html__( 'Copyright Line', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'copyright',
	) );

	$wp_customize->add_setting( 'title_footer_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_footer_ad', array(
		'label'       => esc_html__( 'Footer Advertisement', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_footer_ad',
	) ) );

	$wp_customize->add_setting( 'footer_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'footer_pub', array(
		'label'       => esc_html__( 'Footer Advertisement', 'zeen' ),
		'description' => esc_html__( 'To make the site extra safe - only shortcodes or HTML code is allowed here. For Javascript ads (i.e. AdSense) you need to put it in a shortcode. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'footer_pub',
	) );

}


/**
 * Settings & Controls: Social Networks
 *
 * @since  1.0.0
 */
function zeen_section_social_networks( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_social_network_title', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_social_network_title', array(
		'label'       => esc_html__( 'Social Network Accounts', 'zeen' ),
		'description'    => esc_html__( 'Set your account info once here and then to show the icons somewhere, go to the place you want (example: Header) and enable the icon to show there.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_social_network_title',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'icons_twitter', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_twitter', array(
		'label'       => 'Twitter',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_twitter',
	) );
	$wp_customize->add_setting( 'icons_facebook', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_facebook', array(
		'label'       => 'Facebook',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_facebook',
	) );

	$wp_customize->add_setting( 'icons_twitch', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_twitch', array(
		'label'       => 'Twitch',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_twitch',
	) );

	$wp_customize->add_setting( 'icons_patreon', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_patreon', array(
		'label'       => 'Patreon',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_patreon',
	) );
	$wp_customize->add_setting( 'icons_imdb', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_imdb', array(
		'label'       => 'IMDB',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_imdb',
	) );
	$wp_customize->add_setting( 'icons_pinterest', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_pinterest', array(
		'label'       => 'Pinterest',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_pinterest',
	) );
	$wp_customize->add_setting( 'icons_instagram', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_instagram', array(
		'label'       => 'Instagram',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_instagram',
	) );

	$wp_customize->add_setting( 'icons_youtube', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_youtube', array(
		'label'       => 'YouTube',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_youtube',
	) );

	$wp_customize->add_setting( 'icons_vk', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_vk', array(
		'label'       => 'VK',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_vk',
	) );

	$wp_customize->add_setting( 'icons_goodreads', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_goodreads', array(
		'label'       => 'Goodreads',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_goodreads',
	) );

	$wp_customize->add_setting( 'icons_itch', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_itch', array(
		'label'       => 'Itch.io',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_itch',
	) );

	$wp_customize->add_setting( 'icons_producthunt', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_producthunt', array(
		'label'       => 'Product Hunt',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_producthunt',
	) );

	$wp_customize->add_setting( 'icons_letterboxd', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_letterboxd', array(
		'label'       => 'Letterboxd',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_letterboxd',
	) );

	$wp_customize->add_setting( 'icons_steam', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_steam', array(
		'label'       => 'Steam',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_steam',
	) );

	$wp_customize->add_setting( 'icons_telegram', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_telegram', array(
		'label'       => 'Telegram',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_telegram',
	) );

	$wp_customize->add_setting( 'icons_soundcloud', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_soundcloud', array(
		'label'       => 'Soundcloud',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_soundcloud',
	) );

	$wp_customize->add_setting( 'icons_tiktok', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_tiktok', array(
		'label'       => 'TikTok',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_tiktok',
	) );

	$wp_customize->add_setting( 'icons_linkedin', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_linkedin', array(
		'label'       => 'LinkedIn',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_linkedin',
	) );

	$wp_customize->add_setting( 'icons_reddit', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_reddit', array(
		'label'       => 'Reddit',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_reddit',
	) );

	$wp_customize->add_setting( 'icons_dribbble', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_dribbble', array(
		'label'       => 'Dribbble',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_dribbble',
	) );

	$wp_customize->add_setting( 'icons_medium', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_medium', array(
		'label'       => 'Medium',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_medium',
	) );

	$wp_customize->add_setting( 'icons_unsplash', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_unsplash', array(
		'label'       => 'Unsplash',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_unsplash',
	) );
	$wp_customize->add_setting( 'icons_apple_music', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_apple_music', array(
		'label'       => 'Apple Music',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_apple_music',
	) );

	$wp_customize->add_setting( 'icons_tumblr', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_tumblr', array(
		'label'       => 'Tumblr',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_tumblr',
	) );

	$wp_customize->add_setting( 'icons_vimeo', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_vimeo', array(
		'label'       => 'Vimeo',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_vimeo',
	) );
	$wp_customize->add_setting( 'icons_mixcloud', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_mixcloud', array(
		'label'       => 'Mixcloud',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_mixcloud',
	) );
	$wp_customize->add_setting( 'icons_bandcamp', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_bandcamp', array(
		'label'       => 'Bandcamp (Full URL)',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_bandcamp',
	) );
	$wp_customize->add_setting( 'icons_discord', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_discord', array(
		'label'       => 'Discord (Full URL)',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_discord',
	) );

	$wp_customize->add_setting( 'icons_spotify', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_spotify', array(
		'label'       => 'Spotify (Full URL)',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_spotify',
	) );

	$wp_customize->add_setting( 'icons_whatsapp', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_whatsapp', array(
		'label'       => 'WhatsApp Business Number',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_whatsapp',
	) );

	$wp_customize->add_setting( 'icons_weibo', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_weibo', array(
		'label'       => 'Weibo (Full URL)',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_weibo',
	) );

	$wp_customize->add_setting( 'icons_qq', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'icons_qq', array(
		'label'       => 'QQ (Full URL)',
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'icons_qq',
	) );

	$wp_customize->add_setting( 'facebook_app_id', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'facebook_app_id', array(
		'label'       => 'Facebook APP ID',
		'description' => esc_html__( 'Needed if you want to use Facebook Messenger Sharing button, Facebook Comments or Like Box. Read theme documentation for more info.', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'facebook_app_id',
	) );
	$wp_customize->add_setting( 'facebook_app_secret', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'facebook_app_secret', array(
		'label'       => 'Facebook APP Secret',
		'description' => esc_html__( 'Needed if wanting to display Facebook like counts.', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'facebook_app_secret',
	) );

	$wp_customize->add_setting( 'google_api_key', array(
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( 'google_api_key', array(
		'label'       => 'Google API Key',
		'description' => esc_html__( 'Needed if you want to use the YouTube Playlist Tipi Builder block. See Zeen documentation to learn how to get one.', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'google_api_key',
	) );
}

/**
 * Settings & Controls: Sidebar
 *
 * @since  1.0.0
 */
function zeen_section_sidebars( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_sidebar', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sidebar', array(
		'label'       => esc_html__( 'Sidebar Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sidebar',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'sidebar_border_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sidebar_border_onoff', array(
		'label'       => esc_html__( 'Sidebar Border', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_border_onoff',
	) ) );

	$wp_customize->add_setting( 'sidebar_border_width', array(
		'default' => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'sidebar_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'sidebar_border_color', array(
		'default' => '#eee',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'sidebar_border_width', array(
		'label'       => esc_html__( 'Sidebar Border', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'sidebar_border_width', 'sidebar_border_style', 'sidebar_border_color' ),
	) ) );

	zeen_customizer_background( $wp_customize, $section,
		array(
			'location' => 'sidebar',
		)
	);

	$wp_customize->add_setting( 'sidebar_padding_top', array(
		'sanitize_callback'     => 'absint',
		'default'                => 0,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_padding_top', array(
		'label'       => esc_html__( 'Padding Top', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'sidebar_padding_bottom', array(
		'sanitize_callback'     => 'absint',
		'default'                => 0,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_padding_bottom', array(
		'label'       => esc_html__( 'Padding Bottom', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 30,
		),
	) ) );


	$wp_customize->add_setting( 'sidebar_padding_left', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_padding_left', array(
		'label'       => esc_html__( 'Padding Left', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_padding_left',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'sidebar_padding_right', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_padding_right', array(
		'label'       => esc_html__( 'Padding Right', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_padding_right',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'title_stickies_sidebar', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_stickies_sidebar', array(
		'label'       => esc_html__( 'Sticky Sidebars', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_stickies_sidebar',
	) ) );

	$wp_customize->add_setting( 'sticky_sidebar', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sticky_sidebar', array(
		'label'       => esc_html__( 'Sticky Sidebars', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sticky_sidebar',
		'description'       => esc_html__( 'Note: Some ad services do not allow their ads to be on sticky sidebars. If you plan on having ads in your sidebars, check your ad service\'s terms of use. For example AdSense does not allow this. Check theme documentation for relevant links to read about this. It is important to always comply with ad service terms to avoid getting your ad account in trouble.', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'title_sidebar_tab', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sidebar_tab', array(
		'label'       => esc_html__( 'Tablet Devices', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sidebar_tab',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'sidebar_tab', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sidebar_tab', array(
		'label'       => esc_html__( 'Sidebars On Portrait Tablet', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_tab',
		'description'       => esc_html__( 'Enable if you wish to show sidebars on tablet devices when in portrait mode. Due to screen size they usually appear under the content.', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'title_sidebar_mob', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sidebar_mob', array(
		'label'       => esc_html__( 'Mobile Devices', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sidebar_mob',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'sidebar_mob', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sidebar_mob', array(
		'label'       => esc_html__( 'Sidebars On Mobile', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_mob',
		'description'       => esc_html__( 'Enable if you wish to show sidebars on mobile devices. Due to screen size they usually appear under the content.', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'title_sidebar_widgets', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sidebar_widgets', array(
		'label'       => esc_html__( 'Widgets Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sidebar_widgets',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_border_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sidebar_widgets_border_onoff', array(
		'label'       => esc_html__( 'Widget Borders', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_border_onoff',
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_border_bottom', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sidebar_widgets_border_bottom', array(
		'label'       => esc_html__( 'Only Bottom Border', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_border_bottom',
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_border_width', array(
		'default' => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'sidebar_widgets_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'sidebar_widgets_border_color', array(
		'default' => '#eee',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'sidebar_widgets_border_width', array(
		'label'       => esc_html__( 'Widgets Border', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'sidebar_widgets_border_width', 'sidebar_widgets_border_style', 'sidebar_widgets_border_color' ),
	) ) );
	$wp_customize->add_setting( 'sidebar_widgets_skin', array(
		'default'                => 4,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'sidebar_widgets_skin', array(
		'section'     => $section,
		'label'       => esc_html__( 'Widgets Background', 'zeen' ),
		'settings'    => 'sidebar_widgets_skin',
		'multi'        => 'off',
		'choices'     => array(
			4 => esc_html__( 'Transparent', 'zeen' ),
			1 => esc_html__( 'Light', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
			11 => esc_html__( 'Light Gray', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_spacing', array(
		'sanitize_callback'     => 'absint',
		'default'                => 0,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_widgets_spacing', array(
		'label'       => esc_html__( 'Space Between', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_spacing',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 180,
			'default' => 0,
		),
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_padding_top', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_widgets_padding_top', array(
		'label'       => esc_html__( 'Padding Top', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_padding_top',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 0,
		),
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_padding_bottom', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_widgets_padding_bottom', array(
		'label'       => esc_html__( 'Padding Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 0,
		),
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_padding_lr', array(
		'sanitize_callback'     => 'absint',
		'default'                => 0,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'sidebar_widgets_padding_lr', array(
		'label'       => esc_html__( 'Padding Left and Right', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_padding_lr',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 0,
		),
	) ) );

	$wp_customize->add_setting( 'title_sidebar_widgets_titles', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sidebar_widgets_titles', array(
		'label'       => esc_html__( 'Widgets Titles', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sidebar_widgets_titles',
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_title_centered', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sidebar_widgets_title_centered', array(
		'label'       => esc_html__( 'Centered Widget Titles', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sidebar_widgets_title_centered',
	) ) );

	$wp_customize->add_setting( 'sidebar_widgets_title_skin', array(
		'default'                => 4,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'sidebar_widgets_title_skin', array(
		'section'     => $section,
		'label'       => esc_html__( 'Widget Titles Background', 'zeen' ),
		'settings'    => 'sidebar_widgets_title_skin',
		'multi'        => 'off',
		'choices'     => array(
			4 => esc_html__( 'Transparent', 'zeen' ),
			1 => esc_html__( 'Light', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
			11 => esc_html__( 'Light Gray', 'zeen' ),
		),
	) ) );

}

/**
 * Settings & Controls: Header Mobile Section
 *
 * @since  1.0.0
 */
function zeen_section_mobile( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_mobile_header_base_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_header_base_design', array(
		'label'       => esc_html__( 'Mobile Header Base Design', 'zeen' ),
		'description'       => esc_html__( 'Choose the starting point for your header', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_mobile_header_base_design',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'mobile_header_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'mobile_header_style', array(
		'section'     => $section,
		'settings'    => 'mobile_header_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'header-mob-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'header-mob-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'header-mob-3.png',
			),
			11 => array(
				'url'   => esc_url( $src_uri ) . 'header-mob-11.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'mobile_header_on_tablet', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_on_tablet', array(
		'label'       => esc_html__( 'Also Use On Tablet (Portait)', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_on_tablet',
	) ) );

	$wp_customize->add_setting( 'subtitle_mobile_header_icons', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_mobile_header_icons', array(
		'label'       => esc_html__( 'Header Icons', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_mobile_header_icons',
	) ) );

	$wp_customize->add_setting( 'mobile_header_icon_search', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_icon_search', array(
		'label'       => esc_html__( 'Search', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_icon_search',
	) ) );

	$wp_customize->add_setting( 'mobile_header_icon_mobile_slide', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_icon_mobile_slide', array(
		'label'       => esc_html__( 'Hamburger', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_icon_mobile_slide',
	) ) );

	$wp_customize->add_setting( 'mobile_header_icon_login', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_icon_login', array(
		'label'       => esc_html__( 'Login', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_icon_login',
	) ) );

	$wp_customize->add_setting( 'mobile_header_icon_cart', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_icon_cart', array(
		'label'       => esc_html__( 'Cart', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_icon_cart',
	) ) );

	$wp_customize->add_setting( 'mobile_header_icon_dark_mode', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_icon_dark_mode', array(
		'label'       => esc_html__( 'Dark/Light Mode', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_icon_dark_mode',
	) ) );

	$wp_customize->add_setting( 'title_mobile_details', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_details', array(
		'label'       => esc_html__( 'Mobile Header Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_mobile_details',
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'mobile_header' ) );

	$wp_customize->add_setting( 'mobile_header_padding_top', array(
		'default'       => 20,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'mobile_header_padding_top', array(
		'label'       => esc_html__( 'Spacing Above', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_padding_top',
		'choices'     => array(
			'min' => 0,
			'max' => 300,
			'default' => 20,
			'type' => 'px',
		),
	) ) );

	$wp_customize->add_setting( 'mobile_header_padding_bottom', array(
		'sanitize_callback'      => 'absint',
		'default'                => 20,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'mobile_header_padding_bottom', array(
		'label'       => esc_html__( 'Spacing Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_padding_bottom',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 300,
			'default' => 20,
		),
	) ) );

	$wp_customize->add_setting( 'title_mobile_logo', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_logo', array(
		'label'       => esc_html__( 'Mobile Header Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_mobile_logo',
		'description'    => esc_html__( 'Main demo logo size:', 'zeen' ) . ' 95px x 25px',
	) ) );

	$wp_customize->add_setting( 'logo_mobile', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_mobile',
		array(
			'label'      => esc_html__( 'Mobile Header Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_mobile',
		)
	) );

	$wp_customize->add_setting( 'logo_mobile_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_mobile_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_mobile_retina',
		)
	) );

	$wp_customize->add_setting( 'logo_text_mobile_onoff', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'logo_text_mobile_onoff', array(
		'label'       => esc_html__( 'Use Text Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'logo_text_mobile_onoff',
	) ) );

	$wp_customize->add_setting( 'logo_text_mobile', array(
		'transport'            => 'postMessage',
		'default'              => get_bloginfo( 'name' ),
		'sanitize_callback'    => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'logo_text_mobile', array(
		'label'       => esc_html__( 'Text Logo', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'logo_text_mobile',
	) );

	$wp_customize->add_setting( 'color_logo_mobile_text', array(
		'default'              => '#000',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'color_logo_mobile_text',
		array(
			'label'     => esc_html__( 'Logo Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'color_logo_mobile_text',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#000000',
			],
		)
	) );

	$wp_customize->add_setting( 'alt_logo_mobile', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_mobile',
		array(
			'label'       => esc_html__( 'Inverse Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_mobile',
		)
	) );

	$wp_customize->add_setting( 'alt_logo_mobile_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'alt_logo_mobile_retina',
		array(
			'label'      => esc_html__( 'Inverse Retina Logo', 'zeen' ),
			'description'       => esc_html__( 'This will appear when a visitor clicks the Dark Mode button to make the site dark/light.', 'zeen' ),
			'section'    => $section,
			'settings'   => 'alt_logo_mobile_retina',
		)
	) );

	$wp_customize->add_setting( 'title_mobile_sticky', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_sticky', array(
		'label'       => esc_html__( 'Sticky Functionality', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_mobile_sticky',
	) ) );

	$wp_customize->add_setting( 'mobile_header_sticky_onoff', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_header_sticky_onoff', array(
		'label'       => esc_html__( 'Sticky Functionality', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_sticky_onoff',
	) ) );

	$wp_customize->add_setting( 'mobile_header_sticky', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'mobile_header_sticky', array(
		'label'       => esc_html__( 'Mobile Header Sticky', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_header_sticky',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-1.gif',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-2.gif',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'header-sticky-3.gif',
			),
		),
	) ) );

	$wp_customize->add_setting( 'mobile_bottom_sticky_onoff', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_bottom_sticky_onoff', array(
		'label'       => esc_html__( 'Bottom Sticky Functionality', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_bottom_sticky_onoff',
	) ) );

	$wp_customize->add_setting( 'mobile_bottom_sticky', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'mobile_bottom_sticky', array(
		'label'       => esc_html__( 'Social Share Sticky Bottom', 'zeen' ),
		'description' => esc_html__( 'Only visible in posts and pages', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_bottom_sticky',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'mob-sticky-bot-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'mob-sticky-bot-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_tw', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_tw', array(
		'label'       => 'Twitter',
		'section'     => $section,
		'settings'    => 'mob_bot_share_tw',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_fb', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_fb', array(
		'label'       => 'Facebook',
		'section'     => $section,
		'settings'    => 'mob_bot_share_fb',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_wa', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_wa', array(
		'label'       => 'Whatsapp',
		'section'     => $section,
		'settings'    => 'mob_bot_share_wa',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_msg', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_msg', array(
		'label'       => 'Messenger',
		'section'     => $section,
		'settings'    => 'mob_bot_share_msg',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_hatena', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_hatena', array(
		'label'       => 'Hatena',
		'section'     => $section,
		'settings'    => 'mob_bot_share_hatena',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_viber', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_viber', array(
		'label'       => 'Viber',
		'section'     => $section,
		'settings'    => 'mob_bot_share_viber',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_line', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_line', array(
		'label'       => 'Line.me',
		'section'     => $section,
		'settings'    => 'mob_bot_share_line',
	) ) );
	$wp_customize->add_setting( 'mob_bot_share_telegram', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_telegram', array(
		'label'       => 'Telegram',
		'section'     => $section,
		'settings'    => 'mob_bot_share_telegram',
	) ) );

	$wp_customize->add_setting( 'mob_bot_share_pinterest', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mob_bot_share_pinterest', array(
		'label'       => 'Pinterest',
		'section'     => $section,
		'settings'    => 'mob_bot_share_pinterest',
	) ) );

	$wp_customize->add_setting( 'title_mobile_general', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_general', array(
		'label'       => esc_html__( 'Mobile General Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_mobile_general',
	) ) );

	$wp_customize->add_setting( 'mobile_customization_excerpts', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_customization_excerpts', array(
		'label'       => esc_html__( 'Disable Excerpts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_customization_excerpts',
	) ) );

	$wp_customize->add_setting( 'mobile_customization_avatars', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_customization_avatars', array(
		'label'       => esc_html__( 'Disable Avatars in Byline', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_customization_avatars',
	) ) );

	$wp_customize->add_setting( 'title_mobile_post', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_post', array(
		'label'       => esc_html__( 'Mobile Post Options', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_mobile_post',
	) ) );

	$wp_customize->add_setting( 'mobile_fi_full_screen', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_fi_full_screen', array(
		'label'       => esc_html__( 'Full Screen Featured Image', 'zeen' ),
		'description'       => esc_html__( 'Forces certain featured image styles (the ones with title over the image) to be full-screen height on mobile devices.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_fi_full_screen',
	) ) );

	$wp_customize->add_setting( 'mobile_limit_height', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'mobile_limit_height', array(
		'label'       => esc_html__( 'Add Show More Button', 'zeen' ),
		'description'       => esc_html__( 'Hide article content and add a Show More button that if tapped, reveals the full post content.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_limit_height',
	) ) );

	$wp_customize->add_setting( 'title_mobile_menu', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mobile_menu', array(
		'label'       => esc_html__( 'Mobile Slide Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_mobile_menu',
	) ) );

	$wp_customize->add_setting( 'mobile_menu_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'mobile_menu_style', array(
		'label'       => esc_html__( 'Base Mobile Menu Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_menu_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-slide-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-slide-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-slide-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-slide-4.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'mobile_menu_animation_style', array(
		'default'              => 4,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'mobile_menu_animation_style', array(
		'label'       => esc_html__( 'Mobile Menu Animation Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'mobile_menu_animation_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-menu-ani-1.gif',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-menu-ani-2.gif',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'mobile-menu-ani-4.gif',
			),
		),
	) ) );

	$wp_customize->add_setting( 'logo_mobile_menu', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_mobile_menu',
		array(
			'label'      => esc_html__( 'Mobile Slide Menu Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_mobile_menu',
		)
	) );

	$wp_customize->add_setting( 'logo_mobile_menu_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_mobile_menu_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_mobile_menu_retina',
		)
	) );
	$wp_customize->add_setting( 'title_mobile_slide_menu_bg', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_mobile_slide_menu_bg', array(
		'label'       => esc_html__( 'Mobile Slide Menu Background', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_mobile_slide_menu_bg',
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'mobile_menu' ) );
	$wp_customize->add_setting( 'title_global_mobile_menu_cta', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_global_mobile_menu_cta', array(
		'label'       => esc_html__( 'Mobile Slide Menu Call To Action', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_global_mobile_menu_cta',
	) ) );

	zeen_customizer_cta_buttons( $wp_customize, $section, array(
		'setting' => 'mobile_menu',
		'responsive_off' => true,
		'font_size_default' => 12,
		'button_size_off' => true,
		'button_color_hover_off' => true,
	));

	zeen_customizer_cta_buttons( $wp_customize, $section, array(
		'setting' => 'mobile_menu_secondary',
		'responsive_off' => true,
		'font_size_default' => 12,
		'button_size_off' => true,
		'button_color_hover_off' => true,
		'add_title' => esc_html__( 'Add Secondary Button', 'zeen' ),
	));
	$wp_customize->add_setting( 'title_mobile_slide_menu_social', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_mobile_slide_menu_social', array(
		'label'       => esc_html__( 'Mobile Slide Menu Social Icons', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_mobile_slide_menu_social',
	) ) );
	zeen_customizer_social_icons( $wp_customize, $section, array(
		'location' => 'mobile',
	) );

}

/**
 * Settings & Controls: Login
 *
 * @since  1.0.0
 */
function zeen_section_login( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_login_design', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_login_design', array(
		'label'       => esc_html__( 'Login Screen Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_login_design',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'login_skin', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'login_skin', array(
		'section'     => $section,
		'label'       => esc_html__( 'Login Screen Base Design', 'zeen' ),
		'settings'    => 'login_skin',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Default', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'logo_login', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_login',
		array(
			'label'      => esc_html__( 'Login Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_login',
		)
	) );

	$wp_customize->add_setting( 'logo_login_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_login_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_login_retina',
		)
	) );

}
/**
 * Settings & Controls: Login
 *
 * @since  1.0.0
 */
function zeen_section_white_label( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_white_label', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_white_label', array(
		'label'       => esc_html__( 'White Label', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_white_label',
		'description'       => esc_html__( "To hide this Theme options section from being visible add this code to the child's functions.php file:", 'zeen' ) . " add_filter( 'zeen_hide_white_label_tab', '__return_true' );",
		'choices'           => 'top',
	) ) );
	$wp_customize->add_setting( 'white_label_onoff', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'white_label_onoff', array(
		'label'       => esc_html__( 'Enable White Label', 'zeen' ),
		'section'     => $section,
		'settings'    => 'white_label_onoff',
	) ) );

	$wp_customize->add_setting( 'white_label_name', array(
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
		'default'       => 'Zeen',
	) );

	$wp_customize->add_setting( 'title_theme_name', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_theme_name', array(
		'label'       => esc_html__( 'Theme Name', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_theme_name',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_control( 'white_label_name', array(
		'label'       => esc_html__( 'Theme Name', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'white_label_name',
	) );

	$wp_customize->add_setting( 'white_label_folder_name', array(
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
		'default'       => 'zeen',
	) );

	$wp_customize->add_control( 'white_label_folder_name', array(
		'label'       => esc_html__( 'Theme Folder Name', 'zeen' ),
		'description'       => esc_html__( 'Enter exact name of theme folder if you renamed the zeen folder to something else', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'white_label_folder_name',
	) );

	$wp_customize->add_setting( 'white_label_folder_name_child', array(
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
		'default'       => 'zeen-child',
	) );

	$wp_customize->add_control( 'white_label_folder_name_child', array(
		'label'       => esc_html__( 'Child Theme Folder Name', 'zeen' ),
		'description'       => esc_html__( 'Enter exact name of theme folder if you renamed the zeen folder to something else', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'white_label_folder_name_child',
	) );

	$wp_customize->add_setting( 'title_theme_branding', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_theme_branding', array(
		'label'       => esc_html__( 'Theme Images', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_theme_branding',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'white_label_mark', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'white_label_mark',
		array(
			'label'      => esc_html__( 'Zeen Admin Tab Icon', 'zeen' ),
			'description'      => esc_html__( 'Recommended Size: 20x20 pixels', 'zeen' ),
			'section'    => $section,
			'settings'   => 'white_label_mark',
		)
	) );

	$wp_customize->add_setting( 'white_label_welcome_image', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'white_label_welcome_image',
		array(
			'label'      => esc_html__( 'Zeen > Welcome: Main Image', 'zeen' ),
			'description'      => esc_html__( 'Recommended Size: 1000x1000 pixels', 'zeen' ),
			'section'    => $section,
			'settings'   => 'white_label_welcome_image',
		)
	) );

	$wp_customize->add_setting( 'white_label_theme_screenshot', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'white_label_theme_screenshot',
		array(
			'label'      => esc_html__( 'Appearance > Themes: Screenshot', 'zeen' ),
			'description'      => esc_html__( 'Recommended Size: 1200x900 pixels', 'zeen' ),
			'section'    => $section,
			'settings'   => 'white_label_theme_screenshot',
		)
	) );

	$wp_customize->add_setting( 'white_label_theme_screenshot_child', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'white_label_theme_screenshot_child',
		array(
			'label'      => esc_html__( 'Appearance > Themes: Child Theme Screenshot', 'zeen' ),
			'description'      => esc_html__( 'Recommended Size: 1200x900 pixels', 'zeen' ),
			'section'    => $section,
			'settings'   => 'white_label_theme_screenshot_child',
		)
	) );
}

/**
 * Settings & Controls: Performance
 *
 * @since  1.0.0
 */
function zeen_section_performance( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_performance', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_performance', array(
		'label'       => esc_html__( 'General Performance', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_performance',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'lazy', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'lazy', array(
		'label'       => esc_html__( 'Lazy Load Images', 'zeen' ),
		'section'     => $section,
		'settings'    => 'lazy',
	) ) );
	$wp_customize->add_setting( 'lazy_iframes', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'lazy_iframes', array(
		'label'       => esc_html__( 'Lazy Load Embedded Iframes + Videos', 'zeen' ),
		'section'     => $section,
		'settings'    => 'lazy_iframes',
	) ) );
	$wp_customize->add_setting( 'minify_css', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'minify_css', array(
		'label'       => esc_html__( 'Use Minified CSS', 'zeen' ),
		'section'     => $section,
		'settings'    => 'minify_css',
	) ) );

	$wp_customize->add_setting( 'minify_js', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'minify_js', array(
		'label'       => esc_html__( 'Use Minified Javascript', 'zeen' ),
		'section'     => $section,
		'settings'    => 'minify_js',
	) ) );

	$wp_customize->add_setting( 'lightbox', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'lightbox', array(
		'label'       => esc_html__( 'Load Lightbox', 'zeen' ),
		'section'     => $section,
		'settings'    => 'lightbox',
	) ) );

	$wp_customize->add_setting( 'lightbox_choice', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'lightbox_choice', array(
		'section'     => $section,
		'label'       => esc_html__( 'Lightbox Choice', 'zeen' ),
		'settings'    => 'lightbox_choice',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Classic Lightbox', 'zeen' ),
			2 => esc_html__( 'Smooth Zoom Lightbox', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_performance_mobile', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_performance_mobile', array(
		'label'       => esc_html__( 'Mobile', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_performance_mobile',
	) ) );

	$wp_customize->add_setting( 'ads_responsive', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ads_responsive', array(
		'label'       => esc_html__( 'Are You Using Responsive Ads?', 'zeen' ),
		'description'  => esc_html__( "For Adsense users:, did you create all your ads using the 'responsive ad unit' option? If so, enable this feature. If you are unsure, leave this disabled.", 'zeen' ),
		'section'     => $section,
		'settings'    => 'ads_responsive',
	) ) );

	$wp_customize->add_setting( 'separate_mobile_bucket', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'separate_mobile_bucket', array(
		'label'       => esc_html__( 'Generate Separate Mobile Site', 'zeen' ),
		'description'  => esc_html__( "Important: Only enable if your cache plugin (or hosting caching) creates separate cache buckets for desktop and mobile users.", 'zeen' ),
		'section'     => $section,
		'settings'    => 'separate_mobile_bucket',
	) ) );


	$wp_customize->add_setting( 'title_analytics', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_analytics', array(
		'label'         => 'Google Analytics',
		'section'       => $section,
		'settings'      => 'title_analytics',
	) ) );

	$wp_customize->add_setting( 'google_analytics', array(
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'google_analytics', array(
		'label'       => esc_html__( 'Tracking ID', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'google_analytics',
	) );

	$wp_customize->add_setting( 'google_analytics_anon', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'google_analytics_anon', array(
		'label'       => esc_html__( 'IP Anonymization', 'zeen' ),
		'description'       => esc_html__( 'Enable Google Analytics IP Anonymization feature.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'google_analytics_anon',
	) ) );

	$wp_customize->add_setting( 'title_thumbnails', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_thumbnails', array(
		'label'         => esc_html__( 'Thumbnail Sizes', 'zeen' ),
		'description'   => esc_html__( 'These options are for users who know exactly what thumbnail sizes they want to use. If you are unsure, it is recommended to leave them all enabled.', 'zeen' ),
		'section'       => $section,
		'settings'      => 'title_thumbnails',
	) ) );

	$sizes = zeen_thumbnail_sizes();

	foreach ( $sizes as $key ) {
		$wp_customize->add_setting( 'thumb_' . $key['label_width'] . 'x' . $key['label_height'], array(
			'default'              => 1,
			'sanitize_callback'      => 'absint',
		) );

		$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'thumb_' . $key['label_width'] . 'x' . $key['label_height'], array(
			'label'       => $key['label_width'] . 'x' . $key['label_height'] . ' px',
			'section'     => $section,
			'settings'    => 'thumb_' . $key['label_width'] . 'x' . $key['label_height'],
		) ) );
	}
}


/**
 * Settings & Controls: Performance
 *
 * @since  1.0.0
 */
function zeen_section_reset( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_reset', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_reset', array(
		'label'       => esc_html__( 'Reset', 'zeen' ),
		'section'           => $section,
		'description'       => esc_html__( 'This will delete all your current theme options set inside this panel. Proceed with caution.', 'zeen' ),
		'settings'          => 'title_reset',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'reset', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_Reset( $wp_customize, 'reset', array(
		'label'       => esc_html__( 'Reset Theme Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'reset',
	) ) );
}

/**
 * Settings & Controls: Global Options
 *
 * @since  1.0.0
 */
function zeen_section_global( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_global_gen', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_gen', array(
		'label'       => esc_html__( 'General Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_global_gen',
	) ) );

	$wp_customize->add_setting( 'site_width', array(
		'default'       => 1230,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'site_width', array(
		'label'       => esc_html__( 'Max Site Width', 'zeen' ),
		'section'     => $section,
		'settings'    => 'site_width',
		'choices'     => array(
			'min' => 950,
			'max' => 1920,
			'default' => 1230,
			'type' => 'px',
		),
	) ) );

	$wp_customize->add_setting( 'site_width_posts', array(
		'default'       => 1230,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'site_width_posts', array(
		'label'       => esc_html__( 'Max Site Width of Post Pages', 'zeen' ),
		'section'     => $section,
		'settings'    => 'site_width_posts',
		'choices'     => array(
			'min' => 950,
			'max' => 1920,
			'default' => 1230,
			'type' => 'px',
		),
	) ) );

	$wp_customize->add_setting( 'responsive', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'responsive', array(
		'label'       => esc_html__( 'Responsive Theme', 'zeen' ),
		'section'     => $section,
		'settings'    => 'responsive',
	) ) );

	$wp_customize->add_setting( 'breadcrumbs', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'breadcrumbs', array(
		'label'       => esc_html__( 'Show Breadcrumbs', 'zeen' ),
		'section'     => $section,
		'settings'    => 'breadcrumbs',
	) ) );

	$wp_customize->add_setting( 'breadcrumbs_show_post_title', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'breadcrumbs_show_post_title', array(
		'label'       => esc_html__( 'Show Current page/post name in breadcrumbs', 'zeen' ),
		'section'     => $section,
		'settings'    => 'breadcrumbs_show_post_title',
	) ) );


	$wp_customize->add_setting( 'use_primary_cat', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'use_primary_cat', array(
		'label'       => esc_html__( 'Only Show One Category', 'zeen' ),
		'description' => esc_html__( 'Only show the first category of a post. If you have Yoast plugin installed you can specify a primary category to a post and that will be shown.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'use_primary_cat',
	) ) );


	$wp_customize->add_setting( 'date_format', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'date_format', array(
		'section'     => $section,
		'label'       => esc_html__( 'Date Format', 'zeen' ),
		'settings'    => 'date_format',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Default WordPress Date', 'zeen' ),
			2 => esc_html__( 'X Days Ago', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'show_archive_filter', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'show_archive_filter', array(
		'label'       => esc_html__( 'Archive Sorting Dropdown', 'zeen' ),
		'description' => esc_html__( 'Add a dropdown to rearrange posts by latest/oldest/etc on Categories/Tags/etc.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'show_archive_filter',
	) ) );

	$wp_customize->add_setting( 'infinite_scroll_url', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'infinite_scroll_url', array(
		'label'       => esc_html__( 'Update Browser URL During Auto Next Post Infinite Loading', 'zeen' ),
		'section'     => $section,
		'settings'    => 'infinite_scroll_url',
	) ) );
	$wp_customize->add_setting( 'archive_url_change', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'archive_url_change', array(
		'label'       => esc_html__(  'Update Browser URL During Archive Pages Infinite Scroll/Load More Buttons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'archive_url_change',
	) ) );

	$wp_customize->add_setting( 'title_global_colors', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_colors', array(
		'label'       => esc_html__( 'General Colors', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_global_colors',
	) ) );

	$wp_customize->add_setting( 'global_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#f7d40e',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'global_color',
		array(
			'label'     => esc_html__( 'Base Accent Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'global_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f7d40e',
			],
		)
	) );


	$wp_customize->add_setting( 'modal_skin', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'modal_skin', array(
		'label'       => esc_html__( 'Modal Theme', 'zeen' ),
		'section'     => $section,
		'settings'    => 'modal_skin',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Light', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
		),
	) ) );


	$wp_customize->add_setting( 'detect_browser_mode', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'detect_browser_mode', array(
		'label'       => esc_html__( 'Detect Visitor Browser Dark Mode', 'zeen' ),
		'description' => esc_html__( "If enabled: Visitors with browsers set to use dark mode will also activate the theme's dark mode feature when they visit the site", 'zeen' ),
		'section'     => $section,
		'settings'    => 'detect_browser_mode',
	) ) );

	$wp_customize->add_setting( 'title_global_load_more', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_load_more', array(
		'label'       => esc_html__( 'Load More Button Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_global_load_more',
	) ) );

	$wp_customize->add_setting( 'load_more_bg', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#18181e',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'load_more_bg',
		array(
			'label'     => esc_html__( 'Button Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'load_more_bg',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#18181e',
			],
		)
	) );

	$wp_customize->add_setting( 'load_more_color_hover', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#18181e',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'load_more_color_hover',
		array(
			'label'     => esc_html__( 'Button Color Hover', 'zeen' ),
			'section'   => $section,
			'settings'  => 'load_more_color_hover',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#18181e',
			],
		)
	) );

	$wp_customize->add_setting( 'load_more_color_text', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#ffffff',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'load_more_color_text',
		array(
			'label'     => esc_html__( 'Button Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'load_more_color_text',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'load_more_rounded', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'load_more_rounded', array(
		'label'       => esc_html__( 'Button Shape', 'zeen' ),
		'section'     => $section,
		'settings'    => 'load_more_rounded',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Rounded', 'zeen' ),
			2 => esc_html__( 'Slightly Rounded', 'zeen' ),
			3 => esc_html__( 'Square', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'load_more_size', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'load_more_size', array(
		'label'       => esc_html__( 'Button Size', 'zeen' ),
		'section'     => $section,
		'settings'    => 'load_more_size',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Default', 'zeen' ),
			2 => esc_html__( 'Large', 'zeen' ),
			3 => esc_html__( 'Small', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'load_more_fill', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'load_more_fill', array(
		'label'       => esc_html__( 'Button Fill', 'zeen' ),
		'section'     => $section,
		'settings'    => 'load_more_fill',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Solid', 'zeen' ),
			2 => esc_html__( 'Outline', 'zeen' ),
		),
	) ) );


	$wp_customize->add_setting( 'title_global_comments', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_comments', array(
		'label'       => esc_html__( 'Comments', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_global_comments',
	) ) );

	$wp_customize->add_setting( 'show_0_comments', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'show_0_comments', array(
		'label'       => esc_html__( 'Show Comments Count If 0', 'zeen' ),
		'description' => esc_html__( 'If your blocks show comments count, it will show 0 (zero) if there are no comments. Disable this to only show comments count if there is at least 1 comment.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'show_0_comments',
	) ) );

	$wp_customize->add_setting( 'fb_comments', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'fb_comments', array(
		'label'       => esc_html__( 'Use Facebook Comment System', 'zeen' ),
		'section'     => $section,
		'settings'    => 'fb_comments',
	) ) );

	$wp_customize->add_setting( 'comment_location', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'comment_location', array(
		'label'     => esc_html__( 'Comment Reply Form Location', 'zeen' ),
		'section'     => $section,
		'settings'    => 'comment_location',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Under Comments', 'zeen' ),
			2 => esc_html__( 'Above Comments', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_global_trending', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_trending', array(
		'label'       => esc_html__( 'Trending', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_global_trending',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'trending_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#f7d40e',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'trending_color',
		array(
			'label'     => esc_html__( 'Accent Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'trending_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f7d40e',
			],
		)
	) );

	$wp_customize->add_setting( 'trending_icon', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'trending_icon', array(
		'label' => esc_html__( 'Trending Icon', 'zeen' ),
		'section'     => $section,
		'settings'    => 'trending_icon',
		'cols'        => 3,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'trending-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'trending-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'trending-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'trending-4.png',
			),
			5 => array(
				'url'   => esc_url( $src_uri ) . 'trending-5.png',
			),
			6 => array(
				'url'   => esc_url( $src_uri ) . 'trending-6.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'trending_text', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'trending_text', array(
		'label'       => esc_html__( 'Trending Text', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'trending_text',
	) );

	$wp_customize->add_setting( 'title_global_bg', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_bg', array(
		'label'       => esc_html__( 'Global Background', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_global_bg',
	) ) );

	$wp_customize->add_setting( 'global_background_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#ffffff',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'global_background_color',
		array(
			'label'     => esc_html__( 'Site Background Color', 'zeen' ),
			'description' => esc_html__( 'If you set a different background to an individual category/tag/etc then that background will override this setting.', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
			'settings'  => 'global_background_color',
		)
	) );

	$wp_customize->add_setting( 'skin', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#ffffff',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'skin',
		array(
			'label'     => esc_html__( 'Content Area Background', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
			'settings'  => 'skin',
		)
	) );

	$wp_customize->add_setting( 'global_background_img', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'global_background_img',
		array(
			'label'      => esc_html__( 'Background Image', 'zeen' ),
			'section'    => $section,
			'settings'   => 'global_background_img',
		)
	) );

	$wp_customize->add_setting( 'global_background_img_repeat', array(
		'default'              => 1,
		'transport'              => 'postMessage',
		'sanitize_callback'      => 'absint',

	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'global_background_img_repeat', array(
		'section'     => $section,
		'label'       => esc_html__( 'Background Image Style', 'zeen' ),
		'settings'    => 'global_background_img_repeat',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Cover', 'zeen' ),
			2 => esc_html__( 'Repeat', 'zeen' ),
			3 => esc_html__( 'No Repeat', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'global_border_width', array(
		'default'               => 0,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'global_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'global_border_color', array(
		'default'               => '#FBE610',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'global_border_width', array(
		'section'           => $section,
		'label'       => esc_html__( 'Site Border', 'zeen' ),
		'settings'          => array( 'global_border_width', 'global_border_style', 'global_border_color' ),
	) ) );

	$wp_customize->add_setting( 'title_global_bg_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_bg_ad', array(
		'label'       => esc_html__( 'Background Advertisement Takeover', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_global_bg_ad',
	) ) );

	$wp_customize->add_setting( 'bg_ad', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bg_ad', array(
		'label'       => esc_html__( 'Enable Ad', 'zeen' ),
		'description' => esc_html__( 'This advertisement will overide any other background images set', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bg_ad',
	) ) );

	$wp_customize->add_setting( 'bg_ad_only_hp', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bg_ad_only_hp', array(
		'label'       => esc_html__( 'Only On Homepage', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bg_ad_only_hp',
	) ) );

	$wp_customize->add_setting( 'bg_ad_img', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'bg_ad_img',
		array(
			'label'      => esc_html__( 'Ad Image', 'zeen' ),
			'section'    => $section,
			'settings'   => 'bg_ad_img',
		)
	) );

	$wp_customize->add_setting( 'bg_ad_img_stretch', array(
		'sanitize_callback'      => 'absint',
		'default'                => 1,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bg_ad_img_stretch', array(
		'label'       => esc_html__( 'Stretch Image', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bg_ad_img_stretch',
	) ) );

	$wp_customize->add_setting( 'bg_ad_url', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'bg_ad_url', array(
		'label'       => esc_html__( 'Image URL (Ad)', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'bg_ad_url',
	) );

	$wp_customize->add_setting( 'bg_ad_spacing', array(
		'sanitize_callback'     => 'absint',
		'default'                => 0,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'bg_ad_spacing', array(
		'label'       => esc_html__( 'Site Top Spacing', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bg_ad_spacing',
		'choices'     => array(
			'min' => 0,
			'max' => 250,
			'default' => 0,
		),
	) ) );

}

/**
 * Settings & Controls: SEO Options
 *
 * @since  1.0.0
 */
function zeen_section_seo( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_global_seo', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_seo', array(
		'label'       => esc_html__( 'General', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_global_seo',
	) ) );

	$wp_customize->add_setting( 'schema', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'schema', array(
		'label'       => esc_html__( 'Enable JSON-LD Schema', 'zeen' ),
		'section'     => $section,
		'settings'    => 'schema',
	) ) );

	$wp_customize->add_setting( 'attachment_title_attr', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'attachment_title_attr', array(
		'label'       => esc_html__( 'Show Title Attribute For Images', 'zeen' ),
		'section'     => $section,
		'settings'    => 'attachment_title_attr',
	) ) );

	$wp_customize->add_setting( 'voice_search', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'voice_search', array(
		'label'       => esc_html__( 'Appear Voice Search', 'zeen' ),
		'section'     => $section,
		'description' => esc_html__( 'Read documentation for guidelines and more info.', 'zeen' ),
		'settings'    => 'voice_search',
	) ) );

	$wp_customize->add_setting( 'title_global_open_graph', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_global_open_graph', array(
		'label'       => esc_html__( 'Open Graph Meta', 'zeen' ),
		'section'     => $section,
		'description' => esc_html__( 'If you use an SEO plugin, you can disable this and let the plugin take care of it.', 'zeen' ),
		'settings'    => 'title_global_open_graph',
	) ) );

	$wp_customize->add_setting( 'og_meta', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'og_meta', array(
		'label'       => esc_html__( 'Open Graph Meta', 'zeen' ),
		'section'     => $section,
		'settings'    => 'og_meta',
	) ) );

	$wp_customize->add_setting( 'og_meta_img', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'og_meta_img',
		array(
			'label'      => esc_html__( 'Fallback Open Graph Image', 'zeen' ),
			'section'    => $section,
			'settings'   => 'og_meta_img',
		)
	) );

}

/**
 * Settings & Controls: Posts
 *
 * @since  1.0.0
 */
function zeen_section_posts( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_posts_hero_design', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_hero_design', array(
		'label'       => esc_html__( 'Default Hero Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_posts_hero_design',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'hero_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'hero_design', array(
		'section'     => $section,
		'cols'        => 2,
		'settings'    => 'hero_design',
		'choices'     => zeen_customizer_hero_designs(),
	) ) );

	$wp_customize->add_setting( 'hero_color', array(
		'default'              => 'rgba(0,0,0,0.3)',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'hero_color',
		array(
			'label'     => esc_html__( 'Default Overlay Color', 'zeen' ),
			'description'  => esc_html__( 'This only applies to hero images that have text on top.', 'zeen' ),
			'section'   => $section,
			'settings'  => 'hero_color',
			'choices' => [
				'default' => 'rgba(0,0,0,0.3)',
			],
		)
	) );

	$wp_customize->add_setting( 'hero_color_text', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'hero_color_text',
		array(
			'label'     => esc_html__( 'Default Overlay Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'hero_color_text',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'medium_height', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'medium_height', array(
		'section'     => $section,
		'label'       => esc_html__( 'Default Medium Hero Height', 'zeen' ),
		'settings'    => 'medium_height',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Cropped', 'zeen' ),
			2 => esc_html__( 'Native Image Height (No Crop)', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'cover_height', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'cover_height', array(
		'section'     => $section,
		'label'       => esc_html__( 'Default Big Hero Height', 'zeen' ),
		'settings'    => 'cover_height',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( '100% Screen Height', 'zeen' ),
			2 => esc_html__( '66% Screen Height', 'zeen' ),
			3 => esc_html__( '50% Screen Height', 'zeen' ),
			11 => esc_html__( 'Native Image Height (No Crop)', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'parallax', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'parallax', array(
		'label'       => esc_html__( 'Parallax Effect', 'zeen' ),
		'section'     => $section,
		'settings'    => 'parallax',
	) ) );

	$wp_customize->add_setting( 'splitter_bottom_onoff', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'splitter_bottom_onoff', array(
		'label'       => esc_html__( 'Bottom Divider Shape', 'zeen' ),
		'section'     => $section,
		'settings'    => 'splitter_bottom_onoff',
	) ) );

	$wp_customize->add_setting( 'splitter_bottom', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'splitter_bottom', array(
		'section'     => $section,
		'settings'    => 'splitter_bottom',
		'cols'        => 2,
		'choices'     => zeen_shape_list( $src_uri ),
	) ) );

	$wp_customize->add_setting( 'hero_small_open_lightbox', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'hero_small_open_lightbox', array(
		'label'       => esc_html__( 'Hero Image Click Opens Lightbox', 'zeen' ),
		'description'  => esc_html__( 'Applies to hero designs without title overlaid on top.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'hero_small_open_lightbox',
	) ) );

	$wp_customize->add_setting( 'title_posts_layout', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_layout', array(
		'label'       => esc_html__( 'Default Article Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_posts_layout',
	) ) );

	$wp_customize->add_setting( 'article_layout', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'article_layout', array(
		'section'     => $section,
		'settings'    => 'article_layout',
		'cols'        => 2,
		'choices'     => zeen_customizer_article_layout_designs(),
	) ) );

	$wp_customize->add_setting( 'article_layout_sticky_share', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'article_layout_sticky_share', array(
		'label'       => esc_html__( 'Floating Social Sharing', 'zeen' ),
		'description'       => esc_html__( 'Only possible in Article Layouts that have a sticky side block', 'zeen' ),
		'section'     => $section,
		'settings'    => 'article_layout_sticky_share',
	) ) );

	$wp_customize->add_setting( 'article_layout_author', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'article_layout_author', array(
		'label'       => esc_html__( 'Show Author', 'zeen' ),
		'description'       => esc_html__( 'Only possible in Article Layouts that have a sticky side block', 'zeen' ),
		'section'     => $section,
		'settings'    => 'article_layout_author',
	) ) );

	zeen_customizer_meta_elements( $wp_customize, $section, 'posts' );

	$wp_customize->add_setting( 'title_posts_general_options', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_general_options', array(
		'label'       => esc_html__( 'Other Elements', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_posts_general_options',
	) ) );

	$wp_customize->add_setting( 'header_progress', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'header_progress', array(
		'label'       => esc_html__( 'Progress Bar', 'zeen' ),
		'section'     => $section,
		'settings'    => 'header_progress',
	) ) );

	$wp_customize->add_setting( 'post_mid_inline', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'post_mid_inline', array(
		'label'       => esc_html__( 'Inline Post', 'zeen' ),
		'description'       => esc_html__( 'Add a related post to appear in the middle of post contents', 'zeen' ),
		'section'     => $section,
		'settings'    => 'post_mid_inline',
	) ) );

	$wp_customize->add_setting( 'post_mid_inline_date', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'post_mid_inline_date', array(
		'section'     => $section,
		'settings'    => 'post_mid_inline_date',
		'label'       => esc_html__( 'Post Date Limit', 'zeen' ),
		'description'       => esc_html__( 'Only posts modified in the last X months will appear.', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'All Time', 'zeen' ),
			7 => esc_html__( 'Last 7 Days Only', 'zeen' ),
			3 => esc_html__( 'Last 3 Months Only', 'zeen' ),
			6 => esc_html__( 'Last 6 Months Only', 'zeen' ),
			12 => esc_html__( 'Last 12 Months Only', 'zeen' ),
			24 => esc_html__( 'Last 24 Months Only', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'dropcap', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'dropcap', array(
		'label'       => esc_html__( 'Auto Dropcap', 'zeen' ),
		'section'     => $section,
		'settings'    => 'dropcap',
	) ) );

	$wp_customize->add_setting( 'single_tags', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_tags', array(
		'label'       => esc_html__( 'Show Tags', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_tags',
	) ) );

	$wp_customize->add_setting( 'single_comments', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_comments', array(
		'label'       => esc_html__( 'Comments', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_comments',
	) ) );

	$wp_customize->add_setting( 'single_comments_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_comments_design', array(
		'section'     => $section,
		'settings'    => 'single_comments_design',
		'label'       => zeen_customizer_suboption() . esc_html__( 'Style', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Standard', 'zeen' ),
			2 => esc_html__( 'Hidden and Show Button', 'zeen' ),
		),
	) ) );
	$wp_customize->add_setting( 'single_next_previous', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_next_previous', array(
		'label'       => esc_html__( 'Next + Previous Posts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_next_previous',
	) ) );

	$wp_customize->add_setting( 'single_next_previous_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_next_previous_design', array(
		'section'     => $section,
		'settings'    => 'single_next_previous_design',
		'label'       => zeen_customizer_suboption() . esc_html__( 'Style', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Standard', 'zeen' ),
			2 => esc_html__( 'Fixed To Each Screen Side', 'zeen' ),
		),
	) ) );


	$wp_customize->add_setting( 'single_author_box', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_author_box', array(
		'label'       => esc_html__( 'About The Author Box', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_author_box',
	) ) );

	$wp_customize->add_setting( 'subtitle_related', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'subtitle_related', array(
		'label'       => esc_html__( 'Related Post Block', 'zeen' ),
		'section'           => $section,
		'settings'          => 'subtitle_related',
	) ) );

	$wp_customize->add_setting( 'single_related_posts', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_related_posts', array(
		'label'       => esc_html__( 'Show Related Posts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_related_posts',
	) ) );

	$wp_customize->add_setting( 'single_related_posts_location', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_related_posts_location', array(
		'section'     => $section,
		'settings'    => 'single_related_posts_location',
		'label'       => esc_html__( 'Block Location', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Below Article', 'zeen' ),
			2 => esc_html__( 'Below Article And Sidebar Area', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'single_related_posts_design', array(
		'default'              => 29,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'single_related_posts_design', array(
		'label' => esc_html__( 'Related Posts Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_related_posts_design',
		'cols'        => 2,
		'choices'     => array(
			29 => array(
				'url'   => esc_url( $src_uri ) . 'related-29.png',
			),
			27 => array(
				'url'   => esc_url( $src_uri ) . 'related-27.png',
			),
			22 => array(
				'url'   => esc_url( $src_uri ) . 'related-22.png',
			),
			21 => array(
				'url'   => esc_url( $src_uri ) . 'related-21.png',
			),
			82 => array(
				'url'   => esc_url( $src_uri ) . 'block-82.png',
			),
			81 => array(
				'url'   => esc_url( $src_uri ) . 'block-81.png',
			),
			83 => array(
				'url'   => esc_url( $src_uri ) . 'block-83.png',
			),
			84 => array(
				'url'   => esc_url( $src_uri ) . 'block-84.png',
			),
			52 => array(
				'url'   => esc_url( $src_uri ) . 'block-52.png',
			),
			53 => array(
				'url'   => esc_url( $src_uri ) . 'block-53.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'single_related_posts_only_title', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_related_posts_only_title', array(
		'label'       => esc_html__( 'Only Show Image + Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_related_posts_only_title',
	) ) );

	$wp_customize->add_setting( 'single_related_posts_ajax_arrow', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_related_posts_ajax_arrow', array(
		'label'       => esc_html__( 'Show Ajax Arrows', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_related_posts_ajax_arrow',
	) ) );

	$wp_customize->add_setting( 'single_related_posts_ppp', array(
		'sanitize_callback'     => 'absint',
		'default'                => 4,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'single_related_posts_ppp', array(
		'label'       => esc_html__( 'Related Posts Count', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_related_posts_ppp',
		'choices'     => array(
			'min' => 1,
			'max' => 50,
			'default' => 4,
		),
	) ) );

	$wp_customize->add_setting( 'single_related_posts_source', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_related_posts_source', array(
		'section'     => $section,
		'settings'    => 'single_related_posts_source',
		'label'       => esc_html__( 'Related Posts Source', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Category', 'zeen' ),
			2 => esc_html__( 'Tags', 'zeen' ),
			3 => esc_html__( 'Tags (w/ Category fallback)', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'single_related_posts_order', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_related_posts_order', array(
		'section'     => $section,
		'settings'    => 'single_related_posts_order',
		'label'       => esc_html__( 'Order', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Latest', 'zeen' ),
			2 => esc_html__( 'Oldest', 'zeen' ),
			3 => esc_html__( 'Random', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'single_related_posts_date', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_related_posts_date', array(
		'section'     => $section,
		'settings'    => 'single_related_posts_date',
		'label'       => esc_html__( 'Post Date Limit', 'zeen' ),
		'description'       => esc_html__( 'Only posts published in the last X time will appear.', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'All Time', 'zeen' ),
			7 => esc_html__( 'Last 7 Days Only', 'zeen' ),
			3 => esc_html__( 'Last 3 Months Only', 'zeen' ),
			6 => esc_html__( 'Last 6 Months Only', 'zeen' ),
			12 => esc_html__( 'Last 12 Months Only', 'zeen' ),
			24 => esc_html__( 'Last 24 Months Only', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'single_related_posts_above_hero', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_related_posts_above_hero', array(
		'label'       => esc_html__( 'Small Related Posts Above Hero', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_related_posts_above_hero',
	) ) );

	$wp_customize->add_setting( 'title_thumbs', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_thumbs', array(
		'label'       => esc_html__( 'Thumbs Up/Down Counter', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_thumbs',
	) ) );

	$wp_customize->add_setting( 'single_thumbs', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_thumbs', array(
		'label'       => esc_html__( 'Show Thumbs Up/Down Block', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_thumbs',
	) ) );

	$wp_customize->add_setting( 'single_thumbs_title', array(
		'sanitize_callback'     => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'single_thumbs_title', array(
		'section'     => $section,
		'label'       => esc_html__( 'Block Title', 'zeen' ),
		'type'        => 'text',
		'settings'    => 'single_thumbs_title',
	) );
	$wp_customize->add_setting( 'single_thumbs_button_color', array(
		'default'              => '#222',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'single_thumbs_button_color',
		array(
			'label'     => esc_html__( 'Buttons Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'single_thumbs_button_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#222',
			],
		)
	) );

	$wp_customize->add_setting( 'title_emoji_post', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_emoji_post', array(
		'label'       => esc_html__( 'Reaction Emojis', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_emoji_post',
	) ) );

	$wp_customize->add_setting( 'single_reactions', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_reactions', array(
		'label'       => esc_html__( 'Show Reaction Emojis Block', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_reactions',
	) ) );

	$wp_customize->add_setting( 'single_reactions_score', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_reactions_score', array(
		'section'     => $section,
		'settings'    => 'single_reactions_score',
		'label'       => esc_html__( 'Visual Scores', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Individual Counts', 'zeen' ),
			2 => esc_html__( 'Percentages', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'single_reactions_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'single_reactions_style', array(
		'label' => esc_html__( 'Emoji Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_reactions_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'emoji-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'emoji-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'single_emotions', array(
		'default'        => '',
		'sanitize_callback'      => 'zeen_sanitize_array',
	) );
	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'single_emotions', array(
		'label'       => esc_html__( 'Emotions', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_emotions',
		'choices'     => Zeen\ZeenHelpers::zeen_get_emotions(),
		'order'     => true,
		'selectableHeader' => esc_html__( 'Inactive', 'zeen' ),
		'selectionHeader' => esc_html__( 'Active', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'title_mailing_end_post', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_mailing_end_post', array(
		'label'       => esc_html__( 'Newsletter Box After Content', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_mailing_end_post',
	) ) );

	$wp_customize->add_setting( 'single_subscribe_end', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_subscribe_end', array(
		'label'       => esc_html__( 'Show Newsletter Box', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_subscribe_end',
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'single_subscribe_end' ) );

	$wp_customize->add_setting( 'ipl_title', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'ipl_title', array(
		'label'       => esc_html__( 'Next Post Auto Load', 'zeen' ),
		'section'           => $section,
		'settings'          => 'ipl_title',
	) ) );

	$wp_customize->add_setting( 'ipl', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl', array(
		'label'       => esc_html__( 'Infinite Post Load', 'zeen' ),
		'description' => esc_html__( 'When a visitor reaches the bottom of a post, load the next one below.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl',
	) ) );

	$wp_customize->add_setting( 'ipl_source', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'ipl_source', array(
		'section'     => $section,
		'settings'    => 'ipl_source',
		'label'       => esc_html__( 'Infinite Post Load Source', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'All posts', 'zeen' ),
			2 => esc_html__( 'Only posts with same category', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'ipl_mobile', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_mobile', array(
		'label'       => esc_html__( 'Enable On Mobile Devices', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_mobile',
	) ) );

	$wp_customize->add_setting( 'ipl_separation', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_separation', array(
		'label'       => esc_html__( 'Add Visual Separation', 'zeen' ),
		'description' => esc_html__( 'Display a visual separation block with polka dots between posts that are auto loaded.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_separation',
	) ) );

	$wp_customize->add_setting( 'ipl_coms', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_coms', array(
		'label'       => esc_html__( 'Load Comments', 'zeen' ),
		'description' => esc_html__( 'When the next post loads, also load existing comments and comment form.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_coms',
	) ) );

	$wp_customize->add_setting( 'ipl_newsletter', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_newsletter', array(
		'label'       => esc_html__( 'Load Newsletter', 'zeen' ),
		'description' => esc_html__( 'When the next post loads, load newsletter again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_newsletter',
	) ) );

	$wp_customize->add_setting( 'ipl_before_post_ad', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_before_post_ad', array(
		'label'       => esc_html__( 'Load "Start Of Content" Ad', 'zeen' ),
		'description' => esc_html__( 'When the next post loads, load this post ad in the content. Remember that many ad provides do not allow this, so only enable if you are 100% certain they allow you to do this.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_before_post_ad',
	) ) );
	$wp_customize->add_setting( 'ipl_end_post_ad', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_end_post_ad', array(
		'label'       => esc_html__( 'Load "End Of Content" Ad', 'zeen' ),
		'description' => esc_html__( 'When the next post loads, load this post ad in the content. Remember that many ad provides do not allow this, so only enable if you are 100% certain they allow you to do this.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_end_post_ad',
	) ) );

	$wp_customize->add_setting( 'ipl_author', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'ipl_author', array(
		'label'       => esc_html__( 'Load Author Box', 'zeen' ),
		'description' => esc_html__( 'When the next post loads, load author box.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'ipl_author',
	) ) );

	$wp_customize->add_setting( 'title_sharing_block_post', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sharing_block_post', array(
		'label'       => esc_html__( 'Social Sharing', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sharing_block_post',
	) ) );

	$wp_customize->add_setting( 'single_below_title_share', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_below_title_share', array(
		'label'       => esc_html__( 'Below Title', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_below_title_share',
	) ) );

	$wp_customize->add_setting( 'single_share_design_below_title', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'single_share_design_below_title', array(
		'section'     => $section,
		'settings'    => 'single_share_design_below_title',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'share-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'share-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'share-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'share-4.png',
			),
			11 => array(
				'url'   => esc_url( $src_uri ) . 'share-11.png',
			),
			21 => array(
				'url'   => esc_url( $src_uri ) . 'share-21.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'single_before_share', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_before_share', array(
		'label'       => esc_html__( 'Start Of Article', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_before_share',
	) ) );

	$wp_customize->add_setting( 'single_share_design_start_article', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'single_share_design_start_article', array(
		'section'     => $section,
		'settings'    => 'single_share_design_start_article',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'share-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'share-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'share-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'share-4.png',
			),
			11 => array(
				'url'   => esc_url( $src_uri ) . 'share-11.png',
			),
			21 => array(
				'url'   => esc_url( $src_uri ) . 'share-21.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'single_end_share', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_end_share', array(
		'label'       => esc_html__( 'End Of Article', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_end_share',
	) ) );

	$wp_customize->add_setting( 'single_share_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'single_share_design', array(
		'section'     => $section,
		'settings'    => 'single_share_design',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'share-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'share-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'share-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'share-4.png',
			),
			11 => array(
				'url'   => esc_url( $src_uri ) . 'share-11.png',
			),
			21 => array(
				'url'   => esc_url( $src_uri ) . 'share-21.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'single_share_counts', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_counts', array(
		'label'       => esc_html__( 'Show Share Counts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'single_share_counts',
	) ) );

	$wp_customize->add_setting( 'single_share_fb', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_fb', array(
		'label'       => 'Facebook',
		'section'     => $section,
		'settings'    => 'single_share_fb',
	) ) );

	$wp_customize->add_setting( 'single_share_tw', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_tw', array(
		'label'       => 'Twitter',
		'section'     => $section,
		'settings'    => 'single_share_tw',
	) ) );

	$wp_customize->add_setting( 'single_share_pin', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_pin', array(
		'label'       => 'Pinterest',
		'section'     => $section,
		'settings'    => 'single_share_pin',
	) ) );

	$wp_customize->add_setting( 'single_share_li', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_li', array(
		'label'       => 'LinkedIn',
		'section'     => $section,
		'settings'    => 'single_share_li',
	) ) );

	$wp_customize->add_setting( 'single_share_re', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_re', array(
		'label'       => 'Reddit',
		'section'     => $section,
		'settings'    => 'single_share_re',
	) ) );
	$wp_customize->add_setting( 'single_share_pocket', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_pocket', array(
		'label'       => 'Pocket',
		'section'     => $section,
		'settings'    => 'single_share_pocket',
	) ) );

	$wp_customize->add_setting( 'single_share_instapaper', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_instapaper', array(
		'label'       => 'Instapaper',
		'section'     => $section,
		'settings'    => 'single_share_instapaper',
	) ) );

	$wp_customize->add_setting( 'single_share_tu', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_tu', array(
		'label'       => 'Tumblr',
		'section'     => $section,
		'settings'    => 'single_share_tu',
	) ) );

	$wp_customize->add_setting( 'single_share_vk', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_vk', array(
		'label'       => 'VK',
		'section'     => $section,
		'settings'    => 'single_share_vk',
	) ) );

	$wp_customize->add_setting( 'single_share_em', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_em', array(
		'label'       => 'Email',
		'section'     => $section,
		'settings'    => 'single_share_em',
	) ) );

	$wp_customize->add_setting( 'single_share_wa', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_wa', array(
		'label'       => 'Whatsapp',
		'section'     => $section,
		'settings'    => 'single_share_wa',
	) ) );

	$wp_customize->add_setting( 'single_share_msg', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_msg', array(
		'label'       => 'Messenger',
		'section'     => $section,
		'settings'    => 'single_share_msg',
	) ) );

	$wp_customize->add_setting( 'single_share_hatena', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_hatena', array(
		'label'       => 'Hatena',
		'section'     => $section,
		'settings'    => 'single_share_hatena',
	) ) );

	$wp_customize->add_setting( 'single_share_viber', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_viber', array(
		'label'       => 'Viber',
		'section'     => $section,
		'settings'    => 'single_share_viber',
	) ) );

	$wp_customize->add_setting( 'single_share_flip', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_flip', array(
		'label'       => 'Flipboard',
		'section'     => $section,
		'settings'    => 'single_share_flip',
	) ) );

	$wp_customize->add_setting( 'single_share_line', array(
		'sanitize_callback'      => 'absint',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'single_share_line', array(
		'label'       => 'Line.me',
		'section'     => $section,
		'settings'    => 'single_share_line',
	) ) );

	$wp_customize->add_setting( 'title_post_footer_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_post_footer_ad', array(
		'label'       => esc_html__( 'Advertisement / Custom Code', 'zeen' ),
		'section'           => $section,
		'description'       => esc_html__( 'To make your site extra safe - only shortcodes/HTML code is allowed here. For Javascript ads (i.e. such as AdSense) you need to put them in shortcodes. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
		'settings'          => 'title_post_footer_ad',
	) ) );

	$wp_customize->add_setting( 'post_before_content_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'post_before_content_pub', array(
		'label'       => esc_html__( 'Start Of Content', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'post_before_content_pub',
	) );

	$wp_customize->add_setting( 'post_middle_content_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'post_middle_content_pub', array(
		'label'       => esc_html__( 'Middle Of Content', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'post_middle_content_pub',
	) );

	$wp_customize->add_setting( 'post_end_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'post_end_pub', array(
		'label'       => esc_html__( 'End Of Content', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'post_end_pub',
	) );

	$wp_customize->add_setting( 'post_above_fi_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'post_above_fi_pub', array(
		'label'       => esc_html__( 'Above Hero (Applies to small hero designs only)', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'post_above_fi_pub',
	) );

	$wp_customize->add_setting( 'title_posts_layout_pf', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_layout_pf', array(
		'label'       => esc_html__( 'Default Video/Audio Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_posts_layout_pf',
	) ) );

	$wp_customize->add_setting( 'media_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'media_design', array(
		'description' => esc_html__( 'Video and audio post format default design', 'zeen' ),
		'section'     => $section,
		'cols'        => 2,
		'settings'    => 'media_design',
		'choices'     => zeen_customizer_md_v(),
	) ) );

	$wp_customize->add_setting( 'media_autoplay', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'media_autoplay', array(
		'label'       => esc_html__( 'Enable Autoplay', 'zeen' ),
		'section'     => $section,
		'settings'    => 'media_autoplay',
	) ) );

	$wp_customize->add_setting( 'video_background_global', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'video_background_global', array(
		'label'       => esc_html__( 'Always load video background outside post', 'zeen' ),
		'section'     => $section,
		'settings'    => 'video_background_global',
	) ) );

	$wp_customize->add_setting( 'title_posts_layout_gallery', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_layout_gallery', array(
		'label'       => esc_html__( 'Default Gallery Format Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_posts_layout_gallery',
	) ) );

	$wp_customize->add_setting( 'gallery_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'gallery_design', array(
		'description' => esc_html__( 'Gallery post default design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'gallery_design',
		'cols'        => 2,
		'choices'     => zeen_customizer_md_g(),
	) ) );

	$wp_customize->add_setting( 'title_posts_icon_design', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_icon_design', array(
		'label'       => esc_html__( 'Base Icon Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_posts_icon_design',
	) ) );

	$wp_customize->add_setting( 'icon_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'icon_design', array(
		'description' => esc_html__( 'Icon design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'icon_design',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-3.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'title_posts_format_icon', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_posts_format_icon', array(
		'label'       => esc_html__( 'Post Format Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_posts_format_icon',
	) ) );

	$wp_customize->add_setting( 'media_lightbox', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'media_lightbox', array(
		'label'       => esc_html__( 'Icon Click Opens Lightbox', 'zeen' ),
		'description'  => esc_html__( 'Clicking icons outside a post (i.e. On homepage) opens a lightbox for quick viewing.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'media_lightbox',
	) ) );

	$wp_customize->add_setting( 'video_icon', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'video_icon', array(
		'label'       => esc_html__( 'Video Icon', 'zeen' ),
		'section'     => $section,
		'settings'    => 'video_icon',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-v-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-v-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-v-3.png',
			),
			4 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-v-4.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'audio_icon', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'audio_icon', array(
		'label'       => esc_html__( 'Audio Icon', 'zeen' ),
		'section'     => $section,
		'settings'    => 'audio_icon',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-a-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-a-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'gallery_icon', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'gallery_icon', array(
		'label'       => esc_html__( 'Gallery Icon', 'zeen' ),
		'section'     => $section,
		'settings'    => 'gallery_icon',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-g-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'md-icon-g-2.png',
			),
		),
	) ) );

}


/**
 * Settings & Controls: Plugins LWA
 *
 * @since  1.0.0
 */
function zeen_section_plugins_lwa( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_logo_lwa', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_logo_lwa', array(
		'label'       => esc_html__( 'Login With Ajax Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_logo_lwa',
	) ) );

	$wp_customize->add_setting( 'logo_lwa', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_lwa',
		array(
			'label'      => esc_html__( 'Popup Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_lwa',
		)
	) );

	$wp_customize->add_setting( 'logo_lwa_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_lwa_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_lwa_retina',
		)
	) );

	$wp_customize->add_setting( 'title_lwa_bg', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_lwa_bg', array(
		'label'       => esc_html__( 'Popup Background', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_lwa_bg',
	) ) );

	zeen_customizer_background( $wp_customize, $section,
		array(
			'location' => 'lwa',
		)
	);

	$wp_customize->add_setting( 'title_lwa_terms', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_lwa_terms', array(
		'label'       => esc_html__( 'Registration Checkbox', 'zeen' ),
		'description'       => esc_html__( 'Add an extra checkbox that users are required to tick before being allowed to register via the Login With Ajax modal.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_lwa_terms',
	) ) );

	$wp_customize->add_setting( 'lwa_terms_text', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'lwa_terms_text', array(
		'label'       => esc_html__( 'Checkbox Text', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'lwa_terms_text',
	) );

	$wp_customize->add_setting( 'lwa_terms_text_url', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'lwa_terms_text_url', array(
		'label'       => esc_html__( 'Text Link', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'lwa_terms_text_url',
	) );

	$wp_customize->add_setting( 'title_lwa_register', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_lwa_register', array(
		'label'       => esc_html__( 'Registration', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_lwa_register',
	) ) );

	$wp_customize->add_setting( 'lwa_register_url', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'lwa_register_url', array(
		'label'       => esc_html__( 'Register Redirection', 'zeen' ),
		'description'       => esc_html__( 'Send the user to your registration page when a visitor clicks on the Register option in the popup', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'lwa_register_url',
	) );

}

/**
 * Settings & Controls: Plugins WooCommerce
 *
 * @since  1.0.0
 */
function zeen_section_plugins_woo( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_header_woo_cart_icon', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_woo_cart_icon', array(
		'label'       => esc_html__( 'Cart Icon', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_woo_cart_icon',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'woo_cart_icon_onoff', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_cart_icon_onoff', array(
		'label'       => esc_html__( 'Show Cart Icon', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_cart_icon_onoff',
	) ) );


	$wp_customize->add_setting( 'woo_cart', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'woo_cart', array(
		'section'     => $section,
		'settings'    => 'woo_cart',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'woo-cart-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'woo-cart-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'title_header_woo_cart_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_woo_cart_style', array(
		'label'       => esc_html__( 'Ajax Cart Style', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_woo_cart_style',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'woo_ajax_cart_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'woo_ajax_cart_style', array(
		'label'       => esc_html__( 'Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_ajax_cart_style',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Dropdown', 'zeen' ),
			2 => esc_html__( 'Slide-In Overlay', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_header_product', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_product', array(
		'label'       => esc_html__( 'Default Product Hero Area', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_product',
	) ) );

	$wp_customize->add_setting( 'woo_product_layout', array(
		'default'              => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'woo_product_layout', array(
		'section'     => $section,
		'settings'    => 'woo_product_layout',
		'cols'        => 2,
		'choices'     => zeen_customizer_product_designs(),
	) ) );


	$wp_customize->add_setting( 'woo_product_sidebar', array(
		'default'              => 2,
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'woo_product_sidebar', array(
		'section'     => $section,
		'settings'    => 'woo_product_sidebar',
		'label'       => esc_html__( 'Product Pages Sidebar', 'zeen' ),
		'multi'        => 'off',
		'choices'     => zeen_all_sidebars(),
	) ) );

	$wp_customize->add_setting( 'woo_product_hero_bg_onoff', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_product_hero_bg_onoff', array(
		'label'       => esc_html__( 'Unique Hero Area Background Color', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_product_hero_bg_onoff',
	) ) );

	$wp_customize->add_setting( 'woo_product_hero_text_color', array(
		'default'              => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'woo_product_hero_text_color', array(
		'label'       => zeen_customizer_suboption() . esc_html__( 'Hero Area Text Color', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_product_hero_text_color',
		'multi'        => 'off',
		'choices'     => array(
			2 => esc_html__( 'Dark', 'zeen' ),
			1 => esc_html__( 'Light', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'woo_product_hero_bg', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
	) );


	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'woo_product_hero_bg',
		array(
			'label'     => zeen_customizer_suboption() . esc_html__( 'Hero Area Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'woo_product_hero_bg',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'woo_product_hero_input_bg', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
	) );


	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'woo_product_hero_input_bg',
		array(
			'label'     => zeen_customizer_suboption() . esc_html__( 'Hero Area Inputs Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'woo_product_hero_input_bg',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'woo_product_hero_input_border', array(
		'default'              => '#f2f2f2',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'woo_product_hero_input_border',
		array(
			'label'     => zeen_customizer_suboption() . esc_html__( 'Hero Area Inputs Border Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'woo_product_hero_input_border',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f2f2f2',
			],
		)
	) );

	$wp_customize->add_setting( 'woo_product_hero_input_color', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'woo_product_hero_input_color',
		array(
			'label'     => zeen_customizer_suboption() . esc_html__( 'Hero Area Inputs Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'woo_product_hero_input_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'woo_ajax_single_button', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_ajax_single_button', array(
		'label'       => esc_html__( 'Ajaxify Main Add To Cart button', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_ajax_single_button',
	) ) );

	$wp_customize->add_setting( 'woo_summary_sticky', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_sticky', array(
		'label'       => esc_html__( 'Make Summary Area Sticky', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_summary_sticky',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share', array(
		'label'       => esc_html__( 'Show Social Share Icons', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_summary_share',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_fb', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_fb', array(
		'label'       => 'Facebook',
		'section'     => $section,
		'settings'    => 'woo_summary_share_fb',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_tw', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_tw', array(
		'label'       => 'Twitter',
		'section'     => $section,
		'settings'    => 'woo_summary_share_tw',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_pin', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_pin', array(
		'label'       => 'Pinterest',
		'section'     => $section,
		'settings'    => 'woo_summary_share_pin',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_li', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_li', array(
		'label'       => 'LinkedIn',
		'section'     => $section,
		'settings'    => 'woo_summary_share_li',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_re', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_re', array(
		'label'       => 'Reddit',
		'section'     => $section,
		'settings'    => 'woo_summary_share_re',
	) ) );
	$wp_customize->add_setting( 'woo_summary_share_pocket', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_pocket', array(
		'label'       => 'Pocket',
		'section'     => $section,
		'settings'    => 'woo_summary_share_pocket',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_instapaper', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_instapaper', array(
		'label'       => 'Instapaper',
		'section'     => $section,
		'settings'    => 'woo_summary_share_instapaper',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_tu', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_tu', array(
		'label'       => 'Tumblr',
		'section'     => $section,
		'settings'    => 'woo_summary_share_tu',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_vk', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_vk', array(
		'label'       => 'VK',
		'section'     => $section,
		'settings'    => 'woo_summary_share_vk',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_em', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_em', array(
		'label'       => 'Email',
		'section'     => $section,
		'settings'    => 'woo_summary_share_em',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_wa', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_wa', array(
		'label'       => 'Whatsapp',
		'section'     => $section,
		'settings'    => 'woo_summary_share_wa',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_msg', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_msg', array(
		'label'       => 'Messenger',
		'section'     => $section,
		'settings'    => 'woo_summary_share_msg',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_hatena', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_hatena', array(
		'label'       => 'Hatena',
		'section'     => $section,
		'settings'    => 'woo_summary_share_hatena',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_viber', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_viber', array(
		'label'       => 'Viber',
		'section'     => $section,
		'settings'    => 'woo_summary_share_viber',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_flip', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_flip', array(
		'label'       => 'Flipboard',
		'section'     => $section,
		'settings'    => 'woo_summary_share_flip',
	) ) );

	$wp_customize->add_setting( 'woo_summary_share_line', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_summary_share_line', array(
		'label'       => 'Line.me',
		'section'     => $section,
		'settings'    => 'woo_summary_share_line',
	) ) );

	$wp_customize->add_setting( 'title_product_article_layout', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_product_article_layout', array(
		'label'       => esc_html__( 'Default Product Description Area', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_product_article_layout',
	) ) );

	$wp_customize->add_setting( 'title_product_article_layout_tabs', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_product_article_layout_tabs', array(
		'label'       => esc_html__( 'Tabs Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_product_article_layout_tabs',
	) ) );

	$wp_customize->add_setting( 'woo_products_tabs', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'woo_products_tabs', array(
		'section'     => $section,
		'settings'    => 'woo_products_tabs',
		'cols'        => 2,
		'choices'     => zeen_customizer_product_tabs_designs(),
	) ) );

	$wp_customize->add_setting( 'title_product_article_layout_width', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Subtitle( $wp_customize, 'title_product_article_layout_width', array(
		'label'       => esc_html__( 'Width', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_product_article_layout_width',
	) ) );

	$wp_customize->add_setting( 'woo_products_description_width', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'woo_products_description_width', array(
		'section'     => $section,
		'settings'    => 'woo_products_description_width',
		'cols'        => 2,
		'choices'     => zeen_customizer_product_layout_width(),
	) ) );

	$wp_customize->add_setting( 'woo_related_products', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_related_products', array(
		'label'       => esc_html__( 'Show Related Products', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_related_products',
	) ) );

	$wp_customize->add_setting( 'title_header_woo', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_woo', array(
		'label'       => esc_html__( 'Shop Page Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_woo',

	) ) );

	$wp_customize->add_setting( 'woo_layout', array(
		'default'              => 3,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'woo_layout', array(
		'section'     => $section,
		'settings'    => 'woo_layout',
		'cols'        => 2,
		'choices'     => zeen_customizer_woo_layouts(),
	) ) );


	$wp_customize->add_setting(
		'woo_archive_image_shape',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Zeen_Control_Multi_Select(
			$wp_customize,
			'woo_archive_image_shape',
			array(
				'section'  => $section,
				'label'    => esc_html__( 'Image Shape', 'zeen' ),
				'settings' => 'woo_archive_image_shape',
				'multi'    => 'off',
				'choices'  => array(
					1 => esc_html__( 'Default', 'zeen' ),
					2 => esc_html__( 'Square', 'zeen' ),
					3 => esc_html__( 'Portrait', 'zeen' ),
				),
			)
		)
	);

	$wp_customize->add_setting( 'woo_ppp', array(
		'default'              => 9,
		'sanitize_callback'    => 'absint',
		'transport'            => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'woo_ppp', array(
		'label'       => esc_html__( 'Products Per Shop Page', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_ppp',
		'choices'     => array(
			'min' => 0,
			'max' => 100,
			'default' => 9,
		),
	) ) );

	$wp_customize->add_setting( 'woo_shop_sidebar', array(
		'default'              => 2,
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'woo_shop_sidebar', array(
		'section'     => $section,
		'settings'    => 'woo_shop_sidebar',
		'label'       => esc_html__( 'Shop Pages Sidebar', 'zeen' ),
		'multi'        => 'off',
		'choices'     => zeen_all_sidebars(),
	) ) );

	$wp_customize->add_setting( 'title_header_woo_qv', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_woo_qv', array(
		'label'       => esc_html__( 'Tipi Quickview', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_woo_qv',

	) ) );

	$wp_customize->add_setting( 'woo_qv', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_qv', array(
		'label'       => esc_html__( 'Enable Tipi Quickview', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_qv',
	) ) );

	$wp_customize->add_setting( 'woo_qv_price', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_qv_price', array(
		'label'       => esc_html__( 'Show Price', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_qv_price',
	) ) );

	$wp_customize->add_setting( 'title_header_woo_colors', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_woo_colors', array(
		'label'       => esc_html__( 'Shop Colors', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_header_woo_colors',
		'choices'           => 'top',
	) ) );
	$wp_customize->add_setting( 'add_to_cart_background', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'add_to_cart_background',
		array(
			'label'     => esc_html__( 'Add To Cart Background', 'zeen' ),
			'section'   => $section,
			'settings'  => 'add_to_cart_background',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'sale_background', array(
		'default'              => '#d61919',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'sale_background',
		array(
			'label'     => esc_html__( 'Sale Box Background', 'zeen' ),
			'section'   => $section,
			'settings'  => 'sale_background',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#d61919',
			],
		)
	) );

	$wp_customize->add_setting( 'title_header_product_blocks', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_header_product_blocks', array(
		'label'       => esc_html__( 'Tipi Builder Blocks', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_header_product_blocks',
	) ) );

	$wp_customize->add_setting( 'woo_tipi_blocks_variations', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_tipi_blocks_variations', array(
		'label'       => esc_html__( 'Show Varations', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_tipi_blocks_variations',
	) ) );
	$wp_customize->add_setting( 'woo_tipi_blocks_variations_simple', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_tipi_blocks_variations_simple', array(
		'label'       => zeen_customizer_suboption() . ' ' . esc_html__( 'Only Show Image/Color Varations', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_tipi_blocks_variations_simple',
	) ) );

	$wp_customize->add_setting( 'woo_tipi_blocks_variations_labels', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_tipi_blocks_variations_labels', array(
		'label'       => zeen_customizer_suboption() . ' ' . esc_html__( 'Show Variations Labels', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_tipi_blocks_variations_labels',
	) ) );

	$wp_customize->add_setting( 'woo_tipi_blocks_reviews', array(
		'sanitize_callback'      => 'absint',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_tipi_blocks_reviews', array(
		'label'       => esc_html__( 'Show Review Stars', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_tipi_blocks_reviews',
	) ) );
	$wp_customize->add_setting( 'title_woo_ext', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_woo_ext', array(
		'label'       => esc_html__( 'External Products', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_woo_ext',
	) ) );

	$wp_customize->add_setting( 'woo_external_redirect', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_external_redirect', array(
		'label'       => esc_html__( 'Redirect To External Link (No Single Listing)', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_external_redirect',
	) ) );

	$wp_customize->add_setting( 'woo_external_new_tab', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
		'default'              => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_external_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_external_new_tab',
	) ) );

	$wp_customize->add_setting( 'title_woo_general', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_woo_general', array(
		'label'       => esc_html__( 'General', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_woo_general',
	) ) );

	$wp_customize->add_setting( 'woo_gutenberg', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_gutenberg', array(
		'label'       => esc_html__( 'Activate Gutenberg Builder For Products', 'zeen' ),
		'description'       => esc_html__( 'WooCommerce is not officially compatible with Gutenberg yet so expect the odd bug. It is recommended to only activate this after you have published your products with all the basic data and to create more exciting description content areas only.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_gutenberg',
	) ) );
	$wp_customize->add_setting( 'woo_new_onoff', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_new_onoff', array(
		'label'       => esc_html__( 'Show "New" Badge', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_new_onoff',
	) ) );


	$wp_customize->add_setting( 'woo_new_date', array(
		'default'              => 7,
		'sanitize_callback'    => 'absint',
		'transport'            => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'woo_new_date', array(
		'label'       => esc_html__( 'How many days is considered new?', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_new_date',
		'choices'     => array(
			'min' => 1,
			'max' => 200,
			'default' => 7,
			'suboption' => true,
		),
	) ) );

	$wp_customize->add_setting( 'woocommerce_product_in_trending', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woocommerce_product_in_trending', array(
		'label'       => esc_html__( 'Show Products In Trending Menu', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woocommerce_product_in_trending',
	) ) );

	$wp_customize->add_setting( 'woo_add_to_cart', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_add_to_cart', array(
		'label'       => esc_html__( 'Show Add To Cart On Archives', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_add_to_cart',
	) ) );

	$wp_customize->add_setting( 'woo_archive_stars', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'woo_archive_stars', array(
		'label'       => esc_html__( 'Show Star Ratings In Archive', 'zeen' ),
		'section'     => $section,
		'settings'    => 'woo_archive_stars',
	) ) );
}

/**
 * Settings & Controls: Plugins bbPress
 *
 * @since  1.0.0
 */
function zeen_section_plugins_bbpress( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_bbp_layout', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_bbp_layout', array(
		'label'       => esc_html__( 'bbPress Layout', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_bbp_layout',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'bbpress_layout', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'bbpress_layout', array(
		'section'     => $section,
		'settings'    => 'bbpress_layout',
		'cols'        => 2,
		'choices'     => zeen_customizer_bbpress_layouts()
	) ) );

	$wp_customize->add_setting( 'bbpress_sidebar', array(
		'default'              => 'sidebar-default',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'bbpress_sidebar', array(
		'section'     => $section,
		'settings'    => 'bbpress_sidebar',
		'label'       => esc_html__( 'bbPress Sidebar', 'zeen' ),
		'multi'        => 'off',
		'choices'     => zeen_all_sidebars(),
	) ) );

	$wp_customize->add_setting( 'bbpress_show_tags', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'bbpress_show_tags', array(
		'label'       => esc_html__( 'Show bbPress Tags', 'zeen' ),
		'section'     => $section,
		'settings'    => 'bbpress_show_tags',
	) ) );

	$wp_customize->add_setting( 'title_bbp_base_design_above_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_bbp_base_design_above_ad', array(
		'label'       => esc_html__( 'Advertisement Above Forums', 'zeen' ),
		'section'           => $section,
		'description'       => esc_html__( 'To make your site extra safe - only shortcodes/HTML code is allowed here. For Javascript ads (i.e. such as AdSense) you need to put them in shortcodes. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
		'settings'          => 'title_bbp_base_design_above_ad',
	) ) );

	$wp_customize->add_setting( 'bbpress_top_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'bbpress_top_pub', array(
		'label'       => esc_html__( 'Ad Or Custom Code', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'bbpress_top_pub',
	) );

}

/**
 * Settings & Controls: Plugins BuddyPress
 *
 * @since  1.0.0
 */
function zeen_section_plugins_buddypress( $wp_customize, $section, $src_uri ) {


	$wp_customize->add_setting( 'title_bp_layout', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_bp_layout', array(
		'label'       => esc_html__( 'BuddyPress Layout', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_bp_layout',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'buddypress_layout', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'buddypress_layout', array(
		'section'     => $section,
		'settings'    => 'buddypress_layout',
		'cols'        => 2,
		'choices'     => zeen_customizer_buddypress_layouts()
	) ) );

	$wp_customize->add_setting( 'buddypress_sidebar', array(
		'default'              => 'sidebar-default',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'buddypress_sidebar', array(
		'section'     => $section,
		'label'       => esc_html__( 'BuddyPress Sidebar', 'zeen' ),
		'settings'    => 'buddypress_sidebar',
		'multi'        => 'off',
		'choices'     => zeen_all_sidebars(),
	) ) );


	$wp_customize->add_setting( 'title_bp_avatar', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_bp_avatar', array(
		'label'       => esc_html__( 'BuddyPress Avatar Shapes', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_bp_avatar',
	) ) );

	$wp_customize->add_setting( 'buddypress_avatar', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'buddypress_avatar', array(
		'section'     => $section,
		'settings'    => 'buddypress_avatar',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'bp-avatar-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'bp-avatar-2.png',
			),
		)
	) ) );

	$wp_customize->add_setting( 'title_buddy_base_design_above_ad', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_buddy_base_design_above_ad', array(
		'label'       => esc_html__( 'Advertisement Above Forums', 'zeen' ),
		'section'           => $section,
		'description'       => esc_html__( 'To make your site extra safe - only shortcodes/HTML code is allowed here. For Javascript ads (i.e. such as AdSense) you need to put them in shortcodes. If you do not know how, check the theme documentation for help and more info.', 'zeen' ),
		'settings'          => 'title_buddy_base_design_above_ad',
	) ) );

	$wp_customize->add_setting( 'buddypress_top_pub', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'buddypress_top_pub', array(
		'label'       => esc_html__( 'Ad Or Custom Code', 'zeen' ),
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'buddypress_top_pub',
	) );
}


/**
 * Settings & Controls: Popup
 *
 * @since  1.0.0
 */
function zeen_section_popup( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_popup', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_popup', array(
		'label'       => esc_html__( 'Timed Popup', 'zeen' ),
		'description'       => esc_html__( 'To show content in this popup, add the desired widget in Appearance > Widgets > Timed Popup Content', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_popup',
	) ) );

	$wp_customize->add_setting( 'timed_popup', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'timed_popup', array(
		'label'       => esc_html__( 'Enable Timed Popup', 'zeen' ),
		'section'     => $section,
		'settings'    => 'timed_popup',
	) ) );

	$wp_customize->add_setting( 'timed_popup_timer', array(
		'sanitize_callback'     => 'absint',
		'default'                => 15,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'timed_popup_timer', array(
		'label'       => esc_html__( 'Seconds To Appear', 'zeen' ),
		'section'     => $section,
		'settings'    => 'timed_popup_timer',
		'choices'     => array(
			'min' => 0,
			'max' => 300,
			'default' => 15,
		),
	) ) );

	$wp_customize->add_setting( 'timed_popup_cookie', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'timed_popup_cookie', array(
		'label'       => esc_html__( 'Disable After User Closure', 'zeen' ),
		'description'       => esc_html__( 'If a visitor closes the element, this will add a cookie to stop this element from appearing to the visitor again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'timed_popup_cookie',
	) ) );
}


/**
 * Settings & Controls: Top Bar Message
 *
 * @since  1.0.0
 */
function zeen_section_top_bar_message( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_top_bar', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_top_bar', array(
		'label'       => esc_html__( 'Top Bar Message', 'zeen' ),
		'description'       => esc_html__( 'Display a message at the top of your site to share news, encourage a click to action or promote something.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_top_bar',
	) ) );

	$wp_customize->add_setting( 'top_bar_message', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'top_bar_message', array(
		'label'       => esc_html__( 'Enable Top Bar Message', 'zeen' ),
		'section'     => $section,
		'settings'    => 'top_bar_message',
	) ) );

	$wp_customize->add_setting( 'top_bar_cookie', array(
		'default'              => 1,
		'transport'              => 'postMessage',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'top_bar_cookie', array(
		'label'       => esc_html__( 'Disable After User Closure', 'zeen' ),
		'description'       => esc_html__( 'If a visitor closes the element, this will add a cookie to stop this element from appearing to the visitor again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'top_bar_cookie',
	) ) );

	$wp_customize->add_setting( 'top_bar_message_content', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'top_bar_message_content', array(
		'label'       => esc_html__( 'Message', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'top_bar_message_content',
	) );

	$wp_customize->add_setting( 'top_bar_message_content_font_size', array(
		'default'       => zeen_customize_default( 'top_bar_message_content_font_size' ),
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'top_bar_message_content_font_size', array(
		'label'       => esc_html__( 'Font Size', 'zeen' ),
		'section'     => $section,
		'settings'    => 'top_bar_message_content_font_size',
		'choices'     => array(
			'min' => 10,
			'max' => 50,
			'default' => zeen_customize_default( 'top_bar_message_content_font_size' ),
			'type' => 'px',
		),
	) ) );

	$wp_customize->add_setting( 'top_bar_message_content_spacing', array(
		'default'       => 15,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'top_bar_message_content_spacing', array(
		'label'       => esc_html__( 'Spacing', 'zeen' ),
		'section'     => $section,
		'settings'    => 'top_bar_message_content_spacing',
		'choices'     => array(
			'min' => 10,
			'max' => 100,
			'default' => 15,
			'type' => 'px',
		),
	) ) );

	$wp_customize->add_setting( 'top_bar_message_link', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'top_bar_message_link', array(
		'label'       => esc_html__( 'URL Link', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'top_bar_message_link',
	) );

	$wp_customize->add_setting( 'top_bar_newtab', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'top_bar_newtab', array(
		'label'       => esc_html__( 'Open Link In New Tab', 'zeen' ),
		'section'     => $section,
		'settings'    => 'top_bar_newtab',
	) ) );

	$wp_customize->add_setting( 'top_bar_message_bg', array(
		'default'              => '#F96854',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'top_bar_message_bg',
		array(
			'label'     => esc_html__( 'Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'top_bar_message_bg',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f96854',
			],
		)
	) );


	$wp_customize->add_setting( 'top_bar_message_font_color', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'top_bar_message_font_color',
		array(
			'label'     => esc_html__( 'Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'top_bar_message_font_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

}
/**
 * Settings & Controls: Subscribe
 *
 * @since  1.0.0
 */
function zeen_section_subscribe( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_sub_form', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sub_form', array(
		'label'       => esc_html__( 'Newsletter Form', 'zeen' ),
		'description'       => esc_html__( 'Enter the shortcode or html of your chosen subscription form. Read documentation for tips.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sub_form',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'subscribe_code', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'subscribe_code', array(
		'section'     => $section,
		'type'        => 'textarea',
		'settings'    => 'subscribe_code',
	) );
	$wp_customize->add_setting( 'title_sub_details', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sub_details', array(
		'label'       => esc_html__( 'Newsletter Styling', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_sub_details',
	) ) );

	$wp_customize->add_setting( 'subscribe_button_color', array(
		'default'              => '#121212',
		'sanitize_callback'    => 'esc_attr',
		'transport'            => 'postMessage',
	) );

	$wp_customize->add_setting( 'subscribe_button_color_b', array(
		'default'              => '',
		'sanitize_callback'    => 'esc_attr',
		'transport'            => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color_Multi( $wp_customize, 'subscribe_button_color', array(
		'label'             => esc_html__( 'Submit Button Color', 'zeen' ),
		'description'     => esc_html__( 'Select one color for single color. Select two for gradient effect', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'subscribe_button_color', 'subscribe_button_color_b' ),
	) ) );

	$wp_customize->add_setting( 'subscribe_button_font_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#ffffff',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'subscribe_button_font_color',
		array(
			'label'     => esc_html__( 'Submit Button Font Color', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
			'settings'  => 'subscribe_button_font_color',
		)
	) );
	$wp_customize->add_setting( 'title_sub', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sub', array(
		'label'       => esc_html__( 'Newsletter Popup Triggers', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sub',
	) ) );

	$wp_customize->add_setting( 'subscribe_button_text', array(
		'sanitize_callback'     => 'zeen_sanitize_wp_kses',
		'default'                => esc_html__( 'Subscribe', 'zeen' ),
	) );

	$wp_customize->add_control( 'subscribe_button_text', array(
		'section'     => $section,
		'label'       => esc_html__( 'Trigger Text', 'zeen' ),
		'type'        => 'text',
		'settings'    => 'subscribe_button_text',
	) );

	$wp_customize->add_setting( 'subscribe_on_timer', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'subscribe_on_timer', array(
		'label'       => esc_html__( 'Trigger With Timer', 'zeen' ),
		'section'     => $section,
		'settings'    => 'subscribe_on_timer',
	) ) );

	$wp_customize->add_setting( 'subscribe_timer', array(
		'sanitize_callback'     => 'absint',
		'default'                => 15,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'subscribe_timer', array(
		'label'       => esc_html__( 'Seconds To Appear', 'zeen' ),
		'section'     => $section,
		'settings'    => 'subscribe_timer',
		'choices'     => array(
			'min' => 0,
			'max' => 300,
			'default' => 15,
		),
	) ) );

	$wp_customize->add_setting( 'subscribe_timer_cookie', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'subscribe_timer_cookie', array(
		'label'       => zeen_customizer_suboption() . esc_html__( 'Disable After User Closure', 'zeen' ),
		'description'       => esc_html__( 'If a visitor closes the element, this will add a cookie to stop this element from appearing to the visitor again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'subscribe_timer_cookie',
	) ) );

	$wp_customize->add_setting( 'subscribe_on_leave', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'subscribe_on_leave', array(
		'label'       => esc_html__( 'Trigger When Leaving Site', 'zeen' ),
		'description' => esc_html__( 'This option makes the popup appear when the user goes to close the site.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'subscribe_on_leave',
	) ) );

	$wp_customize->add_setting( 'subscribe_leave_cookie', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'subscribe_leave_cookie', array(
		'label'       => zeen_customizer_suboption() . esc_html__( 'Disable After User Closure', 'zeen' ),
		'description'       => esc_html__( 'If a visitor closes the element, this will add a cookie to stop this element from appearing to the visitor again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'subscribe_leave_cookie',
	) ) );

	$wp_customize->add_setting( 'title_sub_text', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sub_text', array(
		'label'       => esc_html__( 'Newsletter Popup Text', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sub_text',
	) ) );

	$wp_customize->add_setting( 'subscribe_title', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'subscribe_title', array(
		'label'       => esc_html__( 'Title', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'subscribe_title',
	) );

	$wp_customize->add_setting( 'subscribe_subtitle', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'subscribe_subtitle', array(
		'label'       => esc_html__( 'Subtitle', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'subscribe_subtitle',
	) );

	$wp_customize->add_setting( 'title_sub_details_base_layout', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sub_details_base_layout', array(
		'label'       => esc_html__( 'Newsletter Popup Base Layout', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sub_details_base_layout',
	) ) );

	$wp_customize->add_setting( 'subscribe_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'subscribe_style', array(
		'section'     => $section,
		'settings'    => 'subscribe_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'subscribe-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'subscribe-2.png',
			),
		),
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'subscribe' ) );

	$wp_customize->add_setting( 'title_sub_details_base', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_sub_details_base', array(
		'label'       => esc_html__( 'Newsletter Signup Button Design', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_sub_details_base',
	) ) );

	$wp_customize->add_setting( 'subscribe_signup_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'subscribe_signup_style', array(
		'section'     => $section,
		'settings'    => 'subscribe_signup_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'subscribe-signup-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'subscribe-signup-2.png',
			),
		),
	) ) );

}

/**
 * Settings & Controls: Slide-In Box
 *
 * @since  1.0.0
 */
function zeen_section_slide_box( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_post_sliding_global', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_post_sliding_global', array(
		'label'       => esc_html__( 'Sliding Promo Box', 'zeen' ),
		'description'       => esc_html__( 'Promote a mailing subscription, Facebook like box or anything you want. This will not appear on posts if the post promo box below is also enabled.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_post_sliding_global',
		'choices'  => 'top',
	) ) );

	$wp_customize->add_setting( 'sliding_global', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sliding_global', array(
		'label'       => esc_html__( 'Show Sliding Promo Box', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sliding_global',
	) ) );

	$wp_customize->add_setting( 'sliding_global_font_color', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'sliding_global_font_color',
		array(
			'label'     => esc_html__( 'Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'sliding_global_font_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'sliding_global_bg', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'sliding_global_bg',
		array(
			'label'      => esc_html__( 'Background Image', 'zeen' ),
			'section'    => $section,
			'settings'   => 'sliding_global_bg',
			'description'    => esc_html__( 'Background Image Size:', 'zeen' ) . ' 360px x 370px',
		)
	) );

	$wp_customize->add_setting( 'sliding_box_location', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'sliding_box_location', array(
		'section'     => $section,
		'label'       => esc_html__( 'Show Box', 'zeen' ),
		'settings'    => 'sliding_box_location',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Globally', 'zeen' ),
			2 => esc_html__( 'Only On Homepage', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'sliding_global_title', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'sliding_global_title', array(
		'label'       => esc_html__( 'Box Title', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'sliding_global_title',
	) );
	$wp_customize->add_setting( 'sliding_global_subtitle', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'sliding_global_subtitle', array(
		'label'       => esc_html__( 'Box Subtitle', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'sliding_global_subtitle',
	) );

	$wp_customize->add_setting( 'sliding_global_smallprint', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'sliding_global_smallprint', array(
		'label'       => esc_html__( 'Box Smallprint', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'sliding_global_smallprint',
	) );

	$wp_customize->add_setting( 'sliding_global_code', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'sliding_global_code', array(
		'section'     => $section,
		'type'        => 'textarea',
		'title' => esc_html__( 'Code to show in box', 'zeen' ),
		'description' => esc_html__( 'Enter the shortcode or html of the content of the sliding box. Read documentation for tips.', 'zeen' ),
		'settings'    => 'sliding_global_code',
	) );

	$wp_customize->add_setting( 'sliding_global_url', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'sliding_global_url', array(
		'label'       => esc_html__( 'Background Link (Optional)', 'zeen' ),
		'description' => esc_html__( 'For when you want to have a clickable image slide in (No subscription form).', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'sliding_global_url',
	) );

	$wp_customize->add_setting( 'sliding_global_cookie', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sliding_global_cookie', array(
		'label'       => esc_html__( 'Disable After User Closure', 'zeen' ),
		'description'       => esc_html__( 'If a visitor closes the element, this will add a cookie to stop this element from appearing to the visitor again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sliding_global_cookie',
	) ) );

	$wp_customize->add_setting( 'title_post_sliding_post', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_post_sliding_post', array(
		'label'       => esc_html__( 'Promo Box Inside Posts', 'zeen' ),
		'description'       => esc_html__( 'This promo box promotes other posts when a user reaches the end of an article.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_post_sliding_post',
	) ) );

	$wp_customize->add_setting( 'sliding_post', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sliding_post', array(
		'label'       => esc_html__( 'Show Sliding Post Promo Box', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sliding_post',
	) ) );

	$wp_customize->add_setting( 'sliding_post_title', array(
		'default'              => esc_html__( 'More Stories', 'zeen' ),
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
	) );

	$wp_customize->add_control( 'sliding_post_title', array(
		'label'       => esc_html__( 'Box Title', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'sliding_post_title',
	) );

	$wp_customize->add_setting( 'sliding_post_source', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'sliding_post_source', array(
		'section'     => $section,
		'settings'    => 'sliding_post_source',
		'label'       => esc_html__( 'Post Source', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Random Post', 'zeen' ),
			2 => esc_html__( 'Random Post In Same Category', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'sliding_post_date', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'sliding_post_date', array(
		'section'     => $section,
		'settings'    => 'sliding_post_date',
		'description'       => esc_html__( 'Only posts modified in the last X months will appear.', 'zeen' ),
		'label'       => esc_html__( 'Post Date Limit', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'All Time', 'zeen' ),
			7 => esc_html__( 'Last 7 Days Only', 'zeen' ),
			3 => esc_html__( 'Last 3 Months Only', 'zeen' ),
			6 => esc_html__( 'Last 6 Months Only', 'zeen' ),
			12 => esc_html__( 'Last 12 Months Only', 'zeen' ),
			24 => esc_html__( 'Last 24 Months Only', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'sliding_post_cookie', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'sliding_post_cookie', array(
		'label'       => esc_html__( 'Disable After User Closure', 'zeen' ),
		'description'       => esc_html__( 'If a visitor closes the element, this will add a cookie to stop this element from appearing to the visitor again.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'sliding_post_cookie',
	) ) );
}

/**
 * Settings & Controls: Slide-In Menu
 *
 * @since  1.0.0
 */
function zeen_section_slide( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_slide', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_slide', array(
		'label'       => esc_html__( 'Slide-In Menu Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_slide',
		'choices'     => 'top',
	) ) );

	zeen_customizer_background( $wp_customize, $section, array( 'location' => 'slide' ) );

	$wp_customize->add_setting( 'title_slide_logo', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_slide_logo', array(
		'label'       => esc_html__( 'Slide-In Menu Logo', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_slide_logo',
	) ) );

	$wp_customize->add_setting( 'logo_slide', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_slide',
		array(
			'label'      => esc_html__( 'Slide-In Menu Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_slide',
		)
	) );

	$wp_customize->add_setting( 'logo_slide_retina', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_slide_retina',
		array(
			'label'      => esc_html__( 'Retina Version', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_slide_retina',
		)
	) );

	$wp_customize->add_setting( 'logo_subtitle_slide', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'logo_subtitle_slide', array(
		'label'       => esc_html__( 'Logo Subtitle', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'logo_subtitle_slide',
	) );

	$wp_customize->add_setting( 'logo_subtitle_slide_color', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'logo_subtitle_slide_color',
		array(
			'label'     => esc_html__( 'Subtitle Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'logo_subtitle_slide_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );
}

/**
 * Settings & Controls: Pages
 *
 * @since  1.0.0
 */
function zeen_section_pages( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_pages_hero_design', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_pages_hero_design', array(
		'label'       => esc_html__( 'Default Hero Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_pages_hero_design',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'pages_hero_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'pages_hero_design', array(
		'section'     => $section,
		'cols'        => 2,
		'settings'    => 'pages_hero_design',
		'choices'     => zeen_customizer_hero_designs()
	) ) );

	$wp_customize->add_setting( 'pages_hero_color', array(
		'default'              => 'rgba(0,0,0,0.3)',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'pages_hero_color',
		array(
			'label'     => esc_html__( 'Default Hero Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'pages_hero_color',
			'choices' => [
				'default' => 'rgba(0,0,0,0.3)',
			],
		)
	) );

	$wp_customize->add_setting( 'pages_hero_color_text', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'pages_hero_color_text',
		array(
			'label'     => esc_html__( 'Default Hero Overlay Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'pages_hero_color_text',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'pages_cover_height', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'pages_cover_height', array(
		'section'     => $section,
		'settings'    => 'pages_cover_height',
		'label'       => esc_html__( 'Default Hero Height', 'zeen' ),
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( '100% Screen Height', 'zeen' ),
			2 => esc_html__( '66% Screen Height', 'zeen' ),
			3 => esc_html__( '50% Screen Height', 'zeen' ),
			11 => esc_html__( 'Natural Image Height (No Crop)', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'pages_parallax', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'pages_parallax', array(
		'label'       => esc_html__( 'Parallax Effect', 'zeen' ),
		'description' => esc_html__( 'Enable parallax effect on hero image', 'zeen' ),
		'section'     => $section,
		'settings'    => 'pages_parallax',
	) ) );

	$wp_customize->add_setting( 'pages_splitter_bottom_onoff', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'pages_splitter_bottom_onoff', array(
		'label'       => esc_html__( 'Bottom Divider Shape', 'zeen' ),
		'section'     => $section,
		'settings'    => 'pages_splitter_bottom_onoff',
	) ) );

	$wp_customize->add_setting( 'pages_splitter_bottom', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'pages_splitter_bottom', array(
		'section'     => $section,
		'settings'    => 'pages_splitter_bottom',
		'cols'        => 2,
		'choices'     => zeen_shape_list( $src_uri ),
	) ) );


	$wp_customize->add_setting( 'title_pages_layout', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_pages_layout', array(
		'label'       => esc_html__( 'Default Page Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_pages_layout',
	) ) );

	$wp_customize->add_setting( 'pages_article_layout', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'pages_article_layout', array(
		'section'     => $section,
		'settings'    => 'pages_article_layout',
		'cols'        => 2,
		'choices'     => zeen_customizer_article_layout_designs( true, array(), true ),
	) ) );

	$wp_customize->add_setting( 'title_pages_author_page', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_pages_author_page', array(
		'label'       => esc_html__( 'Team Pages', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_pages_author_page',
	) ) );

	$all_users = array_merge( get_users( 'role=editor' ), get_users( 'role=administrator' ), get_users( 'role=author' ), get_users( 'role=contributor' ) );
	$users = array();
	foreach ( $all_users as $user ) {
		$users[ $user->ID ] = $user->data->user_nicename;
	}
	$team_authors = get_theme_mod( 'team_authors' );
	if ( ! empty( $team_authors ) ) {
		$new_team = array();
		foreach ( $team_authors as $key ) {
			$keyInt = (int) $key;

			if ( empty( $keyInt ) ) {
				$remove = array_search( $key, $users ) ;
				unset( $users[ $remove ] );
				continue;
			}
			$new_team[ $key ] = get_the_author_meta( 'display_name', $key );
		}
		$users = array_diff_key( $users, $new_team );
		foreach ( $new_team as $key => $value ) {
			$users[ $key ] = $value;
		}
	}

	$wp_customize->add_setting( 'team_authors', array(
		'default'        => '',
		'sanitize_callback'      => 'zeen_sanitize_array',
		'transport'              => 'postMessage',
	) );
	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'team_authors', array(
		'label'       => esc_html__( 'Authors To Appear On Team Pages', 'zeen' ),
		'description'       => esc_html__( 'Select the authors that should appear on Team Template pages. Will output in the order set.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'team_authors',
		'choices'     => $users,
		'order'     => true,
		'selectableHeader' => esc_html__( 'Inactive', 'zeen' ),
		'selectionHeader' => esc_html__( 'Active', 'zeen' ),
	) ) );

	$wp_customize->add_setting( 'title_pages_contact', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_pages_contact', array(
		'label'       => esc_html__( 'Contact Page', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_pages_contact',
	) ) );

	$wp_customize->add_setting( 'contact_button_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#18181e',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'contact_button_color',
		array(
			'label'     => esc_html__( 'Button Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'contact_button_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#18181e',
			],
		)
	) );

	$wp_customize->add_setting( 'contact_button_color_hover', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#111111',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'contact_button_color_hover',
		array(
			'label'     => esc_html__( 'Button Color (Hover)', 'zeen' ),
			'section'   => $section,
			'settings'  => 'contact_button_color_hover',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'title_pages_404', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_pages_404', array(
		'label'       => esc_html__( '404 Page', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_pages_404',
	) ) );

	$wp_customize->add_setting( 'page_404_image', array(
		'sanitize_callback'      => 'esc_url_raw',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'page_404_image',
		array(
			'label'      => esc_html__( '404 Image', 'zeen' ),
			'section'    => $section,
			'settings'   => 'page_404_image',
		)
	) );

	$wp_customize->add_setting( 'page_404_title', array(
		'sanitize_callback'      => 'sanitize_text_field',
		'default'      => esc_html__( "Sorry, this page doesn't exist", 'zeen' ),
	) );

	$wp_customize->add_control( 'page_404_title', array(
		'section'     => $section,
		'label'      => esc_html__( 'Main Title', 'zeen' ),
		'type'        => 'text',
		'settings'    => 'page_404_title',
	) );

	$wp_customize->add_setting( 'page_404_button', array(
		'sanitize_callback'      => 'sanitize_text_field',
		'default'      => esc_html__( 'Back to homepage', 'zeen' ),
	) );

	$wp_customize->add_control( 'page_404_button', array(
		'section'     => $section,
		'label'      => esc_html__( 'Back Button Text', 'zeen' ),
		'type'        => 'text',
		'settings'    => 'page_404_button',
	) );

	$wp_customize->add_setting( 'title_pages_general_options', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_pages_general_options', array(
		'label'       => esc_html__( 'General', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_pages_general_options',
	) ) );

	$wp_customize->add_setting( 'pages_comment', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'pages_comment', array(
		'label'       => esc_html__( 'Allow Pages Comments', 'zeen' ),
		'description'       => esc_html__( 'WordPress still has final say on this via the Discussion metabox. See docs for more info.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'pages_comment',
	) ) );

	$wp_customize->add_setting( 'pages_header_progress', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'pages_header_progress', array(
		'label'       => esc_html__( 'Show Progress Bar', 'zeen' ),
		'section'     => $section,
		'settings'    => 'pages_header_progress',
	) ) );

	$wp_customize->add_setting( 'pages_share', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'pages_share', array(
		'label'       => esc_html__( 'Show Share Block End Page', 'zeen' ),
		'section'     => $section,
		'settings'    => 'pages_share',
	) ) );

}

/**
 * Settings & Controls: Let's Review
 *
 * @since  3.8.0
 */
function zeen_section_lets_review( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_lets_review', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_lets_review', array(
		'label'       => "Let's Review",
		'section'     => $section,
		'settings'    => 'title_lets_review',
		'amp_title'     => true,
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'lr_show_scores_outside_post', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'lr_show_scores_outside_post', array(
		'label'       => esc_html__( 'Show Review Scores Outside Post', 'zeen' ),
		'section'     => $section,
		'settings'    => 'lr_show_scores_outside_post',
	) ) );

	$wp_customize->add_setting( 'lr_override_accent_color_onoff', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'lr_override_accent_color_onoff', array(
		'label'       => esc_html__( 'Globally Override Review Scores Accent Color', 'zeen' ),
		'section'     => $section,
		'settings'    => 'lr_override_accent_color_onoff',
	) ) );

	$wp_customize->add_setting( 'reviews_color_source', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'reviews_color_source', array(
		'label'       => esc_html__( 'Color Source', 'zeen' ),
		'section'     => $section,
		'settings'    => 'reviews_color_source',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Use Zeen Category Accent Color', 'zeen' ),
			2 => esc_html__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'lr_override_accent_color', array(
		'default'              => '#f8d92f',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'lr_override_accent_color',
		array(
			'label'     => esc_html__( 'Global Accent Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'lr_override_accent_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f8d92f',
			],
		)
	) );

}
/**
 * Settings & Controls: AMP
 *
 * @since  1.0.0
 */
function zeen_section_amp( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_amp_logo', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_amp_logo', array(
		'label'       => esc_html__( 'AMP Header', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_amp_logo',
		'amp_title'     => true,
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'logo_amp', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_amp',
		array(
			'label'     => esc_html__( 'Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_amp',
		)
	) );

	$wp_customize->add_setting( 'logo_amp_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_amp_retina',
		array(
			'label'     => esc_html__( 'Logo Retina', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_amp_retina',
		)
	) );

	$wp_customize->add_setting( 'amp_header_background', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#111111',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_header_background',
		array(
			'label'     => esc_html__( 'Background color', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
			'settings'  => 'amp_header_background',
		)
	) );

	$wp_customize->add_setting( 'amp_header_color', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_header_color',
		array(
			'label'     => esc_html__( 'Icons Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'amp_header_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'title_amp_meta', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_amp_meta', array(
		'label'       => esc_html__( 'AMP Content Area', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_amp_meta',
	) ) );

	$wp_customize->add_setting( 'amp_body_background', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#ffffff',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_body_background',
		array(
			'label'     => esc_html__( 'Background color', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
			'settings'  => 'amp_body_background',
		)
	) );

	$wp_customize->add_setting( 'amp_body_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#000',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_body_color',
		array(
			'label'     => esc_html__( 'Text color', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#000',
			],
			'settings'  => 'amp_body_color',
		)
	) );

	$wp_customize->add_setting( 'amp_body_a_color', array(
		'sanitize_callback'      => 'esc_attr',
		'default'                => '#000',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_body_a_color',
		array(
			'label'     => esc_html__( 'Links color', 'zeen' ),
			'section'   => $section,
			'choices' => [
				'disableAlpha' => true,
				'default' => '#000',
			],
			'settings'  => 'amp_body_a_color',
		)
	) );

	$wp_customize->add_setting( 'amp_related_posts', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'amp_related_posts', array(
		'label'       => esc_html__( 'Show Related Posts', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_related_posts',
	) ) );

	$wp_customize->add_setting( 'amp_author', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'amp_author', array(
		'label'       => esc_html__( 'Show Author', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_author',
	) ) );

	$wp_customize->add_setting( 'amp_date', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'amp_date', array(
		'label'       => esc_html__( 'Show Date', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_date',
	) ) );

	$wp_customize->add_setting( 'title_amp_logo_footer', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_amp_logo_footer', array(
		'label'       => esc_html__( 'AMP Footer', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_amp_logo_footer',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'logo_amp_footer', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_amp_footer',
		array(
			'label'     => esc_html__( 'Logo', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_amp_footer',
		)
	) );

	$wp_customize->add_setting( 'logo_amp_footer_retina', array(
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control(
		$wp_customize,
		'logo_amp_footer_retina',
		array(
			'label'     => esc_html__( 'Logo Retina', 'zeen' ),
			'section'    => $section,
			'settings'   => 'logo_amp_footer_retina',
		)
	) );

	$wp_customize->add_setting( 'amp_footer_background', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_footer_background',
		array(
			'label'     => esc_html__( 'Background color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'amp_footer_background',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'amp_footer_color', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'amp_footer_color',
		array(
			'label'     => esc_html__( 'Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'amp_footer_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'copyright_footer', array(
		'sanitize_callback'      => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'copyright_footer', array(
		'label'       => esc_html__( 'Copyright Line', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'copyright_footer',
	) );

	$wp_customize->add_setting( 'title_amp_meta_ad', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_amp_meta_ad', array(
		'label'       => 'AMP Ads',
		'section'     => $section,
		'settings'    => 'title_amp_meta_ad',
	) ) );

	$wp_customize->add_setting( 'amp_ad', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'amp_ad', array(
		'label'       => esc_html__( 'Enable AMP Ads', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_ad',
	) ) );

	$wp_customize->add_setting( 'amp_ad_header', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'amp_ad_header', array(
		'label'       => esc_html__( 'Above Content Ad', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_ad_header',
	) ) );

	$wp_customize->add_setting( 'amp_ad_footer', array(
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'amp_ad_footer', array(
		'label'       => esc_html__( 'After Content Ad', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_ad_footer',
	) ) );

	$wp_customize->add_setting( 'amp_ad_type', array(
		'default'              => 0,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'amp_ad_type', array(
		'label'       => esc_html__( 'Type', 'zeen' ),
		'section'     => $section,
		'settings'    => 'amp_ad_type',
		'multi'        => 'off',
		'choices'     => array(
			'AdSense',
			'DoubleClick',
		),
	) ) );

	$wp_customize->add_setting( 'amp_ad_client', array(
		'transport'              => 'postMessage',
		'sanitize_callback'      => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'amp_ad_client', array(
		'label'       => esc_html__( 'AdSense Client', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'amp_ad_client',
	) );

	$wp_customize->add_setting( 'amp_ad_slot', array(
		'sanitize_callback'      => 'sanitize_text_field',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( 'amp_ad_slot', array(
		'label'       => esc_html__( 'Ad Slot', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'amp_ad_slot',
	) );

}

/**
 * Settings & Controls: Modules Grids
 *
 * @since  1.0.0
 */
function zeen_section_grids( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_grid_design', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_grid_design', array(
		'label'       => esc_html__( 'Title Area Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_grid_design',
		'choices'     => 'top',
	) ) );

	zeen_customizer_tile_options( $wp_customize, $section, 'grid' );
	zeen_customizer_animation_options( $wp_customize, $section, 'grid' );

	$wp_customize->add_setting( 'grid_ani_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'grid_ani_onoff', array(
		'label'       => esc_html__( 'Scrolling Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'grid_ani_onoff',
	) ) );

	$wp_customize->add_setting( 'grid_ani', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'grid_ani', array(
		'label'       => esc_html__( 'Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'grid_ani',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Fade In', 'zeen' ),
			2 => esc_html__( 'Slide Up', 'zeen' ),
			3 => esc_html__( 'Slide Right', 'zeen' ),
			4 => esc_html__( 'Slide Down', 'zeen' ),
			5 => esc_html__( 'Slide Left', 'zeen' ),
		),
	) ) );

	zeen_customizer_meta_elements( $wp_customize, $section, 'grid' );

}

/**
 * Settings & Controls: Modules Sliders
 *
 * @since  1.0.0
 */
function zeen_section_sliders( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_slider_animation', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_slider_animation', array(
		'label'       => esc_html__( 'Slider Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_slider_animation',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'slider_args_autoplay', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'slider_args_autoplay', array(
		'label'       => esc_html__( 'Autoplay', 'zeen' ),
		'section'     => $section,
		'settings'    => 'slider_args_autoplay',
	) ) );

	$wp_customize->add_setting( 'slider_args_delay', array(
		'default'              => 5,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'slider_args_delay', array(
		'label'       => esc_html__( 'Autoplay Delay', 'zeen' ),
		'section'     => $section,
		'settings'    => 'slider_args_delay',
		'choices'     => array(
			'min' => 1,
			'max' => 15,
			'default' => 5,
			'detection'  => 'stop',
		),
	) ) );

	$wp_customize->add_setting( 'title_slider_design', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_slider_design', array(
		'label'       => esc_html__( 'Title Area', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_slider_design',
	) ) );
	zeen_customizer_tile_options( $wp_customize, $section, 'slider' );
	zeen_customizer_animation_options( $wp_customize, $section, 'slider' );
	zeen_customizer_meta_elements( $wp_customize, $section, 'slider' );
}


/**
 * Settings & Controls: Modules Megamenus
 *
 * @since  1.0.0
 */
function zeen_section_megamenus( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_megamenu_color', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_megamenu_color', array(
		'label'       => esc_html__( 'Color Usage', 'zeen' ),
		'description'       => esc_html__( 'Accent colors for each taxonomy can be set in their individual settings and will be applied to the menus. If no color is set for them, the accent color for the menu is the one set below.', 'zeen' ),
		'section'           => $section,
		'settings'          => 'title_megamenu_color',
		'choices'           => 'top',
	) ) );

	$wp_customize->add_setting( 'menu_accent', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'menu_accent',
		array(
			'label'     => esc_html__( 'Menu Accent Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'menu_accent',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'megamenu_color_usage_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'megamenu_color_usage_onoff', array(
		'label'      => esc_html__( 'Menu Item Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'megamenu_color_usage_onoff',
	) ) );

	$wp_customize->add_setting( 'megamenu_color_usage', array(
		'default'              => 2,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'megamenu_color_usage', array(
		'section'     => $section,
		'settings'    => 'megamenu_color_usage',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'megamenus-color-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'megamenus-color-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'megamenus-color-3.png',
			),
		)
	) ) );

	$wp_customize->add_setting( 'megamenu_submenu_color', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'megamenu_submenu_color', array(
		'section'           => $section,
		'settings'          => 'megamenu_submenu_color',
		'label'       => esc_html__( 'Dropdown Color Style', 'zeen' ),
		'cols' 		  		=> 2,
		'choices'	  		=> array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'megamenus-sub-color-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'megamenus-sub-color-2.png',
			),
		)
	) ) );

	$wp_customize->add_setting( 'dropdown_top_bar_height', array(
		'sanitize_callback'     => 'absint',
		'default'                => 3,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'dropdown_top_bar_height', array(
		'label'       => esc_html__( 'Color Bar Height', 'zeen' ),
		'section'     => $section,
		'settings'    => 'dropdown_top_bar_height',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 30,
			'default' => 3,
		),
	) ) );

	$wp_customize->add_setting( 'megamenu_skin', array(
		'default'              => 2,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'megamenu_skin', array(
		'label'       => esc_html__( 'Dropdown Theme', 'zeen' ),
		'section'     => $section,
		'settings'    => 'megamenu_skin',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Light Gray', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
			3 => esc_html__( 'Pure White', 'zeen' ),
			4 => esc_html__( 'Custom', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'megamenu_skin_background', array(
		'default'              => '#111111',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'megamenu_skin_background',
		array(
			'label'     => esc_html__( 'Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'megamenu_skin_background',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#111111',
			],
		)
	) );

	$wp_customize->add_setting( 'megamenu_skin_color', array(
		'default'              => '#ffffff',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'megamenu_skin_color',
		array(
			'label'     => esc_html__( 'Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'megamenu_skin_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#ffffff',
			],
		)
	) );

	$wp_customize->add_setting( 'title_megamenu_ani', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_megamenu_ani', array(
		'label'       => esc_html__( 'Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_megamenu_ani',
	) ) );
	$wp_customize->add_setting( 'megamenu_animation_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'megamenu_animation_onoff', array(
		'label'       => esc_html__( 'Dropdown Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'megamenu_animation_onoff',
	) ) );

	$wp_customize->add_setting( 'megamenu_animation', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'megamenu_animation', array(
		'section'     => $section,
		'settings'    => 'megamenu_animation',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'mm-ani-1.gif',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'mm-ani-2.gif',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'mm-ani-3.gif',
			),
		),
	) ) );

	$wp_customize->add_setting( 'title_megamenu_trending', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_megamenu_trending', array(
		'label'       => esc_html__( 'Trending Megamenus', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_megamenu_trending',
	) ) );
	$wp_customize->add_setting( 'trending_ppp', array(
		'sanitize_callback'     => 'absint',
		'default'                => 3,
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'trending_ppp', array(
		'label'       => esc_html__( 'Amount of trending articles to show', 'zeen' ),
		'section'     => $section,
		'settings'    => 'trending_ppp',
		'choices'     => array(
			'min' => 3,
			'max' => 5,
			'default' => 3,
		),
	) ) );

	$wp_customize->add_setting( 'trending_mm_title', array(
		'sanitize_callback'      => 'zeen_sanitize_wp_kses',
		'transport'              => 'postMessage',
		'default'        => esc_html__( 'Trending', 'zeen' ),
	) );

	$wp_customize->add_control( 'trending_mm_title', array(
		'label'       => esc_html__( 'Trending Title', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'trending_mm_title',
	) );

}

/**
 * Settings & Controls: Modules Others
 *
 * @since  1.0.0
 */
function zeen_section_others( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_other_modules', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_other_modules', array(
		'label'       => esc_html__( 'Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_other_modules',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'classic_split_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'classic_split_design', array(
		'label'       => esc_html__( 'Split Content Text Location', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_split_design',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'split-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'split-2.png',
			),
		),
	) ) );
	$wp_customize->add_setting( 'classis_split_img_width', array(
		'sanitize_callback'     => 'zeen_sanitize_array',
		'default'                => zeen_customize_default('classis_split_img_width'),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'classis_split_img_width', array(
		'label'       => esc_html__( 'Standard Image Width', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classis_split_img_width',
		'choices'     => array(
			'min' => 25,
			'type' => '%',
			'max' => 50,
			'default' => zeen_customize_default('classis_split_img_width'),
		),
	) ) );

	$wp_customize->add_setting( 'thumbnail_img_width', array(
		'sanitize_callback'     => 'zeen_sanitize_array',
		'default'                => zeen_customize_default('thumbnail_img_width'),
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'thumbnail_img_width', array(
		'label'       => esc_html__( 'Small Thumbnail Image Width', 'zeen' ),
		'section'     => $section,
		'settings'    => 'thumbnail_img_width',
		'choices'     => array(
			'min' => 50,
			'type' => 'px',
			'max' => 120,
			'default' => zeen_customize_default('thumbnail_img_width'),
		),
	) ) );

	$wp_customize->add_setting( 'classic_rounded_corners', array(
		'default'                => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_rounded_corners', array(
		'label'       => esc_html__( 'Rounded Image Corners', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_rounded_corners',
	) ) );

	$wp_customize->add_setting( 'classic_stack_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'classic_stack_design', array(
		'label'       => esc_html__( 'Stack Content Text Alignment', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_stack_design',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'stack-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'stack-2.png',
			),
			3 => array(
				'url'   => esc_url( $src_uri ) . 'stack-3.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'classic_breathing_bot', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'classic_breathing_bot', array(
		'label'       => esc_html__( 'Spacing Below', 'zeen' ),
		'description' => esc_html__( 'This sets the amount of whitespace below block articles.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_breathing_bot',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 180,
			'default' => 30,
		),
	) ) );

	$wp_customize->add_setting( 'classic_bottom_border_onoff', array(
		'default'                => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_bottom_border_onoff', array(
		'label'       => esc_html__( 'Article Border Below', 'zeen' ),
		'description' => esc_html__( 'Only applies to certain blocks.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_bottom_border_onoff',
	) ) );

	$wp_customize->add_setting( 'classic_bottom_border_width', array(
		'default'               => 0,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_bottom_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_bottom_border_color', array(
		'default'               => '#111111',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'classic_bottom_border_width', array(
		'section'           => $section,
		'settings'          => array( 'classic_bottom_border_width', 'classic_bottom_border_style', 'classic_bottom_border_color' ),
	) ) );

	$wp_customize->add_setting( 'classic_bottom_border_padding', array(
		'sanitize_callback'     => 'absint',
		'default'                => 30,
		'transport'              => 'postMessage',

	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'classic_bottom_border_padding', array(
		'label'       => esc_html__( 'Spacing Above Border', 'zeen' ),
		'description'       => esc_html__( 'This sets the amount of whitespace between the border and titles.', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_bottom_border_padding',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 30,
		),
	) ) );

	zeen_customizer_animation_options( $wp_customize, $section, 'classic' );

	$wp_customize->add_setting( 'classic_post_ani_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_post_ani_onoff', array(
		'label'       => esc_html__( 'Scrolling Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_post_ani_onoff',
	) ) );

	$wp_customize->add_setting( 'classic_post_ani', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'classic_post_ani', array(
		'label'       => esc_html__( 'Animation', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_post_ani',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Fade In', 'zeen' ),
			2 => esc_html__( 'Slide Up', 'zeen' ),
			3 => esc_html__( 'Slide Right', 'zeen' ),
		),
	) ) );

	$wp_customize->add_setting( 'title_classic_masonry', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_classic_masonry', array(
		'label'       => esc_html__( 'Masonry Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_classic_masonry',
	) ) );

	$wp_customize->add_setting( 'masonry_design', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'masonry_design', array(
		'section'     => $section,
		'settings'    => 'masonry_design',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'masonry-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'masonry-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'masonry_background_color', array(
		'default'              => '#f2f2f2',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'masonry_background_color',
		array(
			'label'     => esc_html__( 'Masonry Background Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'masonry_background_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#f2f2f2',
			],
		)
	) );

	$wp_customize->add_setting( 'masonry_text_color', array(
		'default'              => '#222222',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'masonry_text_color',
		array(
			'label'     => esc_html__( 'Masonry Text Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'masonry_text_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#222222',
			],
		)
	) );

	$wp_customize->add_setting( 'masonry_whitespace', array(
		'sanitize_callback'     => 'absint',
		'default'                => 15,
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Range( $wp_customize, 'masonry_whitespace', array(
		'label'       => esc_html__( 'Inner Whitespace', 'zeen' ),
		'description' => esc_html__( 'This sets the amount of whitespace inside the articles meta area', 'zeen' ),
		'section'     => $section,
		'settings'    => 'masonry_whitespace',
		'choices'     => array(
			'min' => 0,
			'type' => 'px',
			'max' => 60,
			'default' => 15,
		),
	) ) );

	$wp_customize->add_setting( 'masonry_borders', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'masonry_borders', array(
		'label'       => esc_html__( 'Vertical Dividers', 'zeen' ),
		'section'     => $section,
		'settings'    => 'masonry_borders',
	) ) );

	$wp_customize->add_setting( 'masonry_border_color', array(
		'default'              => '#eee',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Color(
		$wp_customize,
		'masonry_border_color',
		array(
			'label'     => esc_html__( 'Dividers Color', 'zeen' ),
			'section'   => $section,
			'settings'  => 'masonry_border_color',
			'choices' => [
				'disableAlpha' => true,
				'default' => '#eeeeee',
			],
		)
	) );

	$wp_customize->add_setting( 'title_classic_thumbnails', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	zeen_customizer_meta_elements( $wp_customize, $section, 'classic' );
}


/**
 * Settings & Controls: Block Titles
 *
 * @since  1.0.0
 */
function zeen_section_block_titles( $wp_customize, $section, $src_uri ) {
	$wp_customize->add_setting( 'title_classic_titles', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_classic_titles', array(
		'label'       => esc_html__( 'Block Titles Box Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_classic_titles',
	) ) );

	$wp_customize->add_setting( 'classic_block_title_design', array(
		'default'              => 1,
		'sanitize_callback'    => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'classic_block_title_design', array(
		'label'                => esc_html__( 'Base Title Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_block_title_design',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'block-title-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'block-title-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'classic_title_line_onoff', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_title_line_onoff', array(
		'label'       => esc_html__( 'Show Title Mid Line', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_title_line_onoff',
	) ) );

	$wp_customize->add_setting( 'classic_title_line_width', array(
		'default'               => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_title_line_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_title_line_color', array(
		'default'               => '#eee',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'classic_title_line_width', array(
		'label'       => esc_html__( 'Title Mid Line', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'classic_title_line_width', 'classic_title_line_style', 'classic_title_line_color' ),
	) ) );

	$wp_customize->add_setting( 'classic_title_top_border_onoff', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_title_top_border_onoff', array(
		'label'       => esc_html__( 'Show Border Top', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_title_top_border_onoff',
	) ) );

	$wp_customize->add_setting( 'classic_title_top_border_width', array(
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_title_top_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_title_top_border_color', array(
		'default'               => '#eee',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'classic_title_top_border_width', array(
		'label'       => esc_html__( 'Border Top', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'classic_title_top_border_width', 'classic_title_top_border_style', 'classic_title_top_border_color' ),
	) ) );

	$wp_customize->add_setting( 'classic_title_bottom_border_onoff', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_title_bottom_border_onoff', array(
		'label'       => esc_html__( 'Show Border Below', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_title_bottom_border_onoff',
	) ) );

	$wp_customize->add_setting( 'classic_title_bottom_border_width', array(
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_title_bottom_border_style', array(
		'default' => 'solid',
		'sanitize_callback'      => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_setting( 'classic_title_bottom_border_color', array(
		'default'               => '#eee',
		'sanitize_callback'     => 'esc_attr',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Border( $wp_customize, 'classic_title_bottom_border_width', array(
		'label'       => esc_html__( 'Border Below', 'zeen' ),
		'section'           => $section,
		'settings'          => array( 'classic_title_bottom_border_width', 'classic_title_bottom_border_style', 'classic_title_bottom_border_color' ),
	) ) );

	$wp_customize->add_setting( 'classic_block_title_subcats', array(
		'sanitize_callback'     => 'absint',
		'default'                => 1,
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'classic_block_title_subcats', array(
		'label'       => esc_html__( 'Show Subcategories', 'zeen' ),
		'description'       => esc_html__( 'Only applies to categories with subcategories', 'zeen' ),
		'section'     => $section,
		'settings'    => 'classic_block_title_subcats',
	) ) );

	$wp_customize->add_setting( 'class_block_title_cat_color', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'class_block_title_cat_color', array(
		'label'       => esc_html__( 'Use Category Color', 'zeen' ),
		'section'     => $section,
		'settings'    => 'class_block_title_cat_color',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Off', 'zeen' ),
			2 => esc_html__( 'On Title', 'zeen' ),
			4 => esc_html__( 'On Border Top', 'zeen' ),
			5 => esc_html__( 'On Border Below', 'zeen' ),
			11 => esc_html__( 'All Block Elements', 'zeen' ),
		),
	) ) );
}

/**
 * Settings & Controls: Category Section
 *
 * @since  1.0.0
 */
function zeen_section_author( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_author_page_style', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_author_page_style', array(
		'label'       => esc_html__( 'Author Page Design', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_author_page_style',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'author_page_style', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_Radio_Image( $wp_customize, 'author_page_style', array(
		'section'     => $section,
		'settings'    => 'author_page_style',
		'cols'        => 2,
		'choices'     => array(
			1 => array(
				'url'   => esc_url( $src_uri ) . 'author-layout-1.png',
			),
			2 => array(
				'url'   => esc_url( $src_uri ) . 'author-layout-2.png',
			),
		),
	) ) );

	$wp_customize->add_setting( 'author_page_box_skin', array(
		'default'                => 1,
		'sanitize_callback'     => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Multi_Select( $wp_customize, 'author_page_box_skin', array(
		'label'       => esc_html__( 'Author Box Style', 'zeen' ),
		'section'     => $section,
		'settings'    => 'author_page_box_skin',
		'multi'        => 'off',
		'choices'     => array(
			1 => esc_html__( 'Light', 'zeen' ),
			2 => esc_html__( 'Dark', 'zeen' ),
		),
	) ) );

	zeen_customizer_archive_options( $wp_customize, $section, $src_uri, 'author', 'off' );
}

/**
 * Settings & Controls: Category Section
 *
 * @since  1.0.0
 */
function zeen_section_category( $wp_customize, $section, $src_uri ) {
	zeen_customizer_archive_options( $wp_customize, $section, $src_uri, 'category' );
}

/**
 * Settings & Controls: Tags Section
 *
 * @since  1.0.0
 */
function zeen_section_tags( $wp_customize, $section, $src_uri ) {
	zeen_customizer_archive_options( $wp_customize, $section, $src_uri, 'tags' );
}

/**
 * Settings & Controls: Tags Section
 *
 * @since  1.0.0
 */
function zeen_section_tax( $wp_customize, $section, $src_uri ) {
	zeen_customizer_archive_options( $wp_customize, $section, $src_uri, 'tax' );
}

/**
 * Settings & Controls: Search pages
 *
 * @since  1.0.0
 */
function zeen_section_search( $wp_customize, $section, $src_uri ) {

	$wp_customize->add_setting( 'title_search_options', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_search_options', array(
		'label'       => esc_html__( 'Search Popup', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_search_options',
		'choices'     => 'top',
	) ) );

	$wp_customize->add_setting( 'search_placeholder', array(
		'default'      => esc_attr__( 'Search', 'zeen' ),
		'sanitize_callback'      => 'esc_attr',
	) );
	$wp_customize->add_control( 'search_placeholder', array(
		'label'       => esc_html__( 'Search Placeholder', 'zeen' ),
		'section'     => $section,
		'type'        => 'text',
		'settings'    => 'search_placeholder',
	) );

	$wp_customize->add_setting( 'search_show_suggestions', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'search_show_suggestions', array(
		'label'       => esc_html__( 'Show Suggestions', 'zeen' ),
		'description'       => esc_html__( 'Show the most popular site tags as potential search keywords to visitors', 'zeen' ),
		'section'     => $section,
		'settings'    => 'search_show_suggestions',
	) ) );

	$wp_customize->add_setting( 'search_ajax', array(
		'default'              => 1,
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'search_ajax', array(
		'label'       => esc_html__( 'Enable Live Ajax', 'zeen' ),
		'description'       => esc_html__( 'As the user types, this option will fetch the results and show them without a page reload', 'zeen' ),
		'section'     => $section,
		'settings'    => 'search_ajax',
	) ) );

	$wp_customize->add_setting( 'title_search_extras', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_search_extras', array(
		'label'       => esc_html__( 'Search Options', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_search_extras',
	) ) );

	$wp_customize->add_setting( 'search_show_pages', array(
		'default'              => '',
		'sanitize_callback'      => 'absint',
	) );

	$wp_customize->add_control( new Zeen_Control_On_Off( $wp_customize, 'search_show_pages', array(
		'label'       => esc_html__( 'Include Pages In Searches', 'zeen' ),
		'section'     => $section,
		'settings'    => 'search_show_pages',
	) ) );

	$wp_customize->add_setting( 'title_search', array(
		'default'                => 1,
		'sanitize_callback'      => 'absint',
		'transport'              => 'postMessage',
	) );

	$wp_customize->add_control( new Zeen_Control_Title( $wp_customize, 'title_search', array(
		'label'       => esc_html__( 'Search Results Layout', 'zeen' ),
		'section'     => $section,
		'settings'    => 'title_search',
	) ) );

	zeen_customizer_archive_options( $wp_customize, $section, $src_uri, 'search' );

}


/**
 * Settings & Controls: Latest Posts Page
 *
 * @since  1.0.0
 */
function zeen_section_blog_page( $wp_customize, $section, $src_uri ) {

	zeen_customizer_archive_options( $wp_customize, $section, $src_uri, 'blog_page' );

}

/**
 * Selective Icons
 *
 * @since  1.0.0
 */
function zeen_selective_icons( $key ) {
	$args = array(
		$key . 'facebook',
		$key . 'patreon',
		$key . 'imdb',
		$key . 'dark_mode',
		$key . 'style',
		$key . 'unsplash',
		$key . 'mixcloud',
		$key . 'bandcamp',
		$key . 'instagram',
		$key . 'twitter',
		$key . 'twitch',
		$key . 'tiktok',
		$key . 'pinterest',
		$key . 'spotify',
		$key . 'apple_music',
		$key . 'youtube',
		$key . 'steam',
		$key . 'linkedin',
		$key . 'dribbble',
		$key . 'medium',
		$key . 'reddit',
		$key . 'discord',
		$key . 'vimeo',
		$key . 'rss',
		$key . 'tumblr',
		$key . 'telegram',
		$key . 'goodreads',
		$key . 'letterboxd',
		$key . 'vk',
		$key . 'qq',
		$key . 'weibo',
		$key . 'whatsapp',
		$key . 'search',
		$key . 'login',
		$key . 'subscribe',
		$key . 'cart',
	);

	if ( 'mobile_icon_' != $key && 'footer_icon_' != $key ) {
		$args[] = $key . 'slide';
		$args[] = $key . 'search_type';
	}

	return $args;
}

/**
 * Selective Refresh
 *
 * @since  1.0.0
 */
function zeen_selective_refresh( $wp_customize ) {

	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$wp_customize->selective_refresh->add_partial( 'copyright', array(
		'selector' => '.copyright',
		'settings' => 'copyright',
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'copyright' ) );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'main_menu_icon_facebook', array(
		'selector' => '.main-navigation .menu-icons',
		'settings' => zeen_selective_icons( 'main_menu_icon_' ),
		'render_callback' => function() {
			ob_start();
			zeen_icons();
			return ob_get_clean();
		},
	));

	$wp_customize->selective_refresh->add_partial( 'mobile_icon_facebook', array(
		'selector' => '.mob-menu-wrap .menu-icons',
		'settings' => zeen_selective_icons( 'mobile_icon_' ),
		'render_callback' => function() {
			ob_start();
			zeen_icons( array( 'location' => 'mobile' ) );
			return ob_get_clean();
		},
	));

	$wp_customize->selective_refresh->add_partial( 'secondary_menu_icon_facebook', array(
		'selector' => '.secondary-wrap .menu-icons',
		'settings' => zeen_selective_icons( 'secondary_menu_icon_' ),
		'render_callback' => function() {
			ob_start();
			zeen_icons( array( 'location' => 'secondary_menu' ) );
			return ob_get_clean();
		},
	));

	$wp_customize->selective_refresh->add_partial( 'footer_icon_facebook', array(
		'selector' => '.footer-area .menu-icons',
		'settings' => zeen_selective_icons( 'footer_icon_' ),
		'render_callback' => function() {
			ob_start();
			zeen_icons( array( 'location' => 'footer' ) );
			return ob_get_clean();
		},
	));

	$wp_customize->selective_refresh->add_partial( 'logo_lwa', array(
		'selector' => '.logo-lwa',
		'settings' => array( 'logo_lwa', 'logo_lwa_retina' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo( 'lwa' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'top_bar_message', array(
		'selector' => '#top-bar-message',
		'container_inclusive' => true,
		'settings' => array( 'top_bar_message' ),
		'render_callback' => function() {
			return zeen_top_bar_message( true );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'top_bar_message_content', array(
		'selector' => '.top-bar-message-content',
		'container_inclusive' => true,
		'settings' => array( 'top_bar_message_content', 'top_bar_message_link', 'top_bar_newtab' ),
		'render_callback' => function() {
			return zeen_top_bar_message_content();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'logo_slide', array(
		'selector' => '.logo-slide',
		'settings' => array( 'logo_slide', 'logo_slide_retina', 'logo_subtitle_slide' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo( 'slide' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'footer_instagram', array(
		'selector' => '.zeen-instagram-1',
		'settings' => array( 'footer_instagram', 'footer_instagram_shortcode' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_instagram_block( array( 'override' => true, 'location' => 'footer' ) );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'logo_main', array(
		'selector' => '.logo-main',
		'settings' => array( 'logo_main', 'logo_main_retina', 'logo_subtitle_main' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo();
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'logo_footer', array(
		'selector' => '.logo-footer',
		'settings' => array( 'logo_footer', 'logo_footer_retina', 'logo_subtitle_footer' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo( 'footer' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'to_top', array(
		'selector' => '.to-top',
		'settings' => array( 'to_top', 'to_top_text', 'to_top_icon', 'to_top_icon_show' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_to_top();
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'header_top_pub', array(
		'selector' => '.block-da-header_top',
		'settings' => array( 'header_top_pub' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_ad( 'header_top' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'header_pub', array(
		'selector' => '.block-da-header',
		'settings' => array( 'header_pub' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_ad( 'header' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'logo_main_menu', array(
		'selector' => '.logo-main-menu',
		'settings' => array( 'logo_main_menu', 'logo_main_menu_retina' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo( 'main_menu' );
			return ob_get_clean();
		},
	) );
	$wp_customize->selective_refresh->add_partial( 'logo_mobile', array(
		'selector' => '.logo-mobile',
		'settings' => array( 'logo_mobile', 'logo_mobile_retina' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo( 'mobile' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'logo_mobile_menu', array(
		'selector' => '.logo-mobile-menu',
		'settings' => array( 'logo_mobile_menu', 'logo_mobile_menu_retina' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_logo( 'mobile_menu' );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'sliding_global_title', array(
		'selector' => '.slide-in-box .subscribe-wrap .title',
		'container_inclusive' => false,
		'settings' => array( 'sliding_global_title' ),
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'sliding_global_title' ) );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'sliding_global_subtitle', array(
		'selector' => '.slide-in-box .subscribe-wrap .subtitle',
		'container_inclusive' => false,
		'settings' => array( 'sliding_global_subtitle' ),
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'sliding_global_subtitle' ) );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'sliding_global_smallprint', array(
		'selector' => '.slide-in-box .subscribe-wrap .small-print',
		'container_inclusive' => false,
		'settings' => array( 'sliding_global_smallprint' ),
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'sliding_global_smallprint' ) );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'subscribe_title', array(
		'selector' => '#modal .content-subscribe .title',
		'container_inclusive' => false,
		'settings' => array( 'subscribe_title' ),
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'subscribe_title' ) );
		},
	) );


	$wp_customize->selective_refresh->add_partial( 'subscribe_subtitle', array(
		'selector' => '#modal .content-subscribe .subtitle',
		'container_inclusive' => false,
		'settings' => array( 'subscribe_subtitle' ),
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'subscribe_subtitle' ) );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'logo_text', array(
		'selector' => '.logo-fallback',
		'container_inclusive' => false,
		'settings' => array( 'logo_text' ),
		'render_callback' => function() {
			return zeen_sanitize_wp_kses( get_theme_mod( 'logo_text', get_bloginfo( 'name' ) ) );
		},
	) );




	$wp_customize->selective_refresh->add_partial( 'header_block_hp_onoff', array(
		'selector' => '#zeen-top-block',
		'container_inclusive' => true,
		'settings' => array( 'header_block_design', 'header_block_hp_onoff', 'header_block_mobile', 'header_block_hp', 'header_block_featured_title_onoff', 'header_block_featured_title', 'header_block_sortby', 'header_block_source', 'header_block_categories', 'header_block_tags', 'header_block_pids' ),
		'render_callback' => 'zeen_header_block',
	) );

	$wp_customize->selective_refresh->add_partial( 'header_block_instagram', array(
		'selector' => '.zeen-instagram-2',
		'settings' => array( 'header_block_instagram', 'header_block_instagram_shortcode' ),
		'container_inclusive' => true,
		'render_callback' => function() {
			ob_start();
			zeen_above_header();
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'single_related_posts', array(
		'selector' => '.related-posts-wrap',
		'container_inclusive' => true,
		'settings' => array( 'single_related_posts' ),
		'render_callback' => function() {
			ob_start();
			zeen_related_posts( array(
				'action_type' => 'single',
			) );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'single_next_previous', array(
		'selector' => '.next-prev-posts',
		'container_inclusive' => true,
		'settings' => array( 'single_next_previous' ),
		'render_callback' => function() {
			ob_start();
			zeen_previous_next_block( array(
				'action_type' => 'single',
			) );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'single_author_box', array(
		'selector' => '.user-wrap',
		'container_inclusive' => true,
		'settings' => array( 'single_author_box' ),
		'render_callback' => function() {
			ob_start();
			global $post;
			$a_id = $post->post_author;
			zeen_user_box( array(
				'action_type' => 'single',
				'aid' => $a_id,
			) );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'single_end_share', array(
		'selector' => '.site-content .share-it-after',
		'container_inclusive' => true,
		'settings' => array( 'single_end_share', 'single_share_design', 'single_share_counts', 'single_share_tw', 'single_share_fb', 'single_share_flip', 'single_share_line', 'single_share_wa', 'single_share_em', 'single_share_msg', 'single_share_tu', 'single_share_pin', 'single_share_li', 'single_share_re', 'single_share_hatena', 'single_share_pocket', 'single_share_instapaper' ),
		'render_callback' => function() {
			ob_start();
			zeen_share( array(
				'action_type' => 'single',
				'hook' => 'after',
			) );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'single_before_share', array(
		'selector' => '.site-content .share-it-before',
		'container_inclusive' => true,
		'settings' => array( 'single_before_share', 'single_share_design_start_article', 'single_share_counts', 'single_share_tw', 'single_share_fb', 'single_share_flip', 'single_share_line', 'single_share_wa', 'single_share_em', 'single_share_msg', 'single_share_tu', 'single_share_pin', 'single_share_li', 'single_share_re', 'single_share_hatena', 'single_share_pocket', 'single_share_instapaper' ),
		'render_callback' => function() {
			ob_start();
			zeen_share( array(
				'action_type' => 'single',
				'hook' => 'before',
				'design' => get_theme_mod( 'single_share_design_start_article', 1 ),
			) );
			return ob_get_clean();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'single_below_title_share', array(
		'selector' => '.site-content .share-it-below_title',
		'container_inclusive' => true,
		'settings' => array( 'single_below_title_share', 'single_share_design_below_title', 'single_share_counts', 'single_share_tw', 'single_share_fb', 'single_share_flip', 'single_share_line', 'single_share_wa', 'single_share_em', 'single_share_msg', 'single_share_tu', 'single_share_pin', 'single_share_li', 'single_share_re', 'single_share_hatena', 'single_share_pocket', 'single_share_instapaper' ),
		'render_callback' => function() {
			ob_start();
			zeen_share( array(
				'action_type' => 'single',
				'hook' => 'below_title',
				'design' => get_theme_mod( 'single_share_design_below_title', 1 ),
			) );
			return ob_get_clean();
		},
	) );


}

/**
 * Get fonts list
 *
 * @since  1.0.0
 */
function zeen_get_fonts() {
	return array(
		'external'  => esc_html__( 'External Font', 'zeen' ),
		'google'  => esc_html__( 'Other Google Font', 'zeen' ),
		'Arvo, serif' => 'Arvo',
		'Arimo, sans-serif'  => 'Arimo',
		'Bitter, serif'  => 'Bitter',
		'Cabin, sans-serif'  => 'Cabin',
		'Crimson Text, sans-serif'  => 'Crimson Text',
		'Droid Sans, sans-serif'  => 'Droid Sans',
		'Droid Serif, serif'  => 'Droid Serif',
		'Hind, sans-serif'  => 'Hind',
		'Indie Flower, cursive'  => 'Indie Flower',
		'Inconsolata, monospace'  => 'Inconsolata',
		'Lato, sans-serif'  => 'Lato',
		'Lobster, cursive'  => 'Lobster',
		'Lora, serif'  => 'Lora',
		'Montserrat, sans-serif'  => 'Montserrat',
		'Merriweather, serif'  => 'Merriweather',
		'Noto Sans, sans-serif'  => 'Noto',
		'Open Sans, sans-serif'  => 'Open Sans',
		'Open Sans Condensed, sans-serif'  => 'Open Sans Condensed',
		'Oswald, sans-serif'  => 'Oswald',
		'Oxygen, sans-serif'  => 'Oxygen',
		'Playfair Display, serif'  => 'Playfair Display',
		'PT Sans, sans-serif'  => 'PT Sans',
		'Raleway, sans-serif'  => 'Raleway',
		'Roboto, sans-serif'  => 'Roboto',
		'Roboto Condensed, sans-serif'  => 'Roboto Condensed',
		'Roboto Slab, serif'  => 'Roboto Slab',
		'Source Sans Pro, sans-serif'  => 'Source Sans Pro',
		'Slabo 27px, serif'  => 'Slabo 27px',
		'Ubuntu, sans-serif'  => 'Ubuntu',
	);
}

function zeen_customizer_suboption( $bg = '' ) {
	$color = empty( $bg ) ? '#FFF' : '#111111';
	$output = '<svg class="zeen__svg--arrow-r" width="10" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M9.847 7.056L7.065 9.833a.505.505 0 01-.39.167.505.505 0 01-.388-.167.537.537 0 010-.777l1.835-1.834h-5.34A2.753 2.753 0 010 4.444V.556C0 .222.223 0 .556 0c.334 0 .557.222.557.556v3.888c0 .945.723 1.667 1.669 1.667h5.34L6.287 4.278a.537.537 0 010-.778.538.538 0 01.778 0l2.782 2.778c.056.055.111.11.111.166.056.112.056.278 0 .445 0 .055-.055.111-.111.167z" fill="' . esc_attr( $color ) . '" fill-rule="nonzero"/></svg>';
	if ( ! empty ( $bg ) ) {
		$output = '<span class="suboption--wrap">' . $output . '</span>';
	}
	return $output;
}