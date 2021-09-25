<?php
/**
 * Theme hooks
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Above Start Site Hooks
 *
 * @see zeen_top_bar_message()
 * @see zeen_above_header()
 * @see zeen_mobile_header()
 * @see zeen_header_80s()
 * @since 1.0.0
 */
add_action( 'zeen_start_site', 'zeen_top_bar_message', 10 );
add_action( 'zeen_start_site', 'zeen_above_header', 11 );
add_action( 'zeen_start_site', 'zeen_mobile_header', 12 );
add_action( 'zeen_start_site', 'zeen_header_80s', 13 );

/**
 * After Footer Hooks
 *
 * @see zeen_extra_menus()
 * @since 1.0.0
 */
add_action( 'zeen_after_footer', 'zeen_header_70s', 10 );
if ( get_theme_mod( 'single_next_previous_design', 1 ) == 2 ) {
	add_action( 'zeen_after_footer', 'zeen_previous_next_block_slide', 21 );
}

/**
 * Header hooks
 *
 * @see zeen_meta_props()
 * @since 1.0.0
 */
add_action( 'wp_head', 'zeen_meta_props', 10 );

/**
 * Start Site Inner Hooks
 *
 * @see zeen_header()
 * @since 1.0.0
 */
add_action( 'zeen_start_site_inner', 'zeen_header_before', 9 );
add_action( 'zeen_start_site_inner', 'zeen_header', 10 );
add_action( 'zeen_start_site_inner', 'zeen_header_after', 11 );

/**
 * End Contens Wrap Element Hooks
 *
 * @see zeen_bg_ad()
 * @since 1.0.0
 */
add_filter( 'zeen_end_contents_wrap', 'zeen_bg_ad', 10 );

/**
 * Main Nav Hooks
 *
 * @see zeen_before_main_menu_output()
 * @since 1.0.0
 */
add_action( 'zeen_before_main_nav', 'zeen_before_main_menu_output', 10 );

/**
 * Singular Extra Menu Parts
 *
 * @see zeen_sticky_p2()
 * @see zeen_progress()
 * @since 1.0.0
 */
add_action( 'zeen_after_sticky_p1', 'zeen_sticky_p2', 11 );
add_action( 'zeen_after_nav_grid', 'zeen_progress', 12 );

/**
 * End Site Hooks
 *
 * @see zeen_modals()
 * @see zeen_mobile_share_menu()
 * @see zeen_slide_in()
 * @see zeen_popup()
 * @since 1.0.0
 */
add_action( 'zeen_after_site', 'zeen_modals', 10 );
add_action( 'zeen_after_site', 'zeen_slide_in', 12 );
add_action( 'zeen_after_site', 'zeen_popup', 13 );
add_action( 'zeen_after_site', 'zeen_mobile_share_menu', 19 );
add_action( 'zeen_after_site', 'zeen_to_top', 20 );

/**
 * Meta Wrap End
 * @see zeen_share()
 * @since 3.1.0
 */
add_action( 'zeen_meta_wrap_end', 'zeen_share_below_title', 10 );

/**
 * Post Before Content Area Hooks
 * @see zeen_share()
 * @see zeen_post_start_content_ad()
 * @since 1.0.0
 */
add_action( 'zeen_post_before_blocks', 'zeen_share', 10 );
add_action( 'zeen_post_before_blocks', 'zeen_post_start_content_ad', 10 );

/**
 * Post Above Featured Image Hooks
 * @see zeen_post_start_content_ad()
 * @since 1.0.0
 */
add_action( 'zeen_above_featured_image', 'zeen_post_above_featured_image_ad', 10 );

/**
 * Post Footer Hooks
 * @see zeen_share()
 * @see zeen_tags()
 * @see zeen_post_end_ad()
 * @see zeen_user_box()
 * @see zeen_related_posts()
 * @see zeen_previous_next_block()
 * @see zeen_comment_template()
 * @since 1.0.0
 */
add_action( 'zeen_post_footer_blocks', 'zeen_mob_height_limit', 8 );
add_action( 'zeen_post_footer_blocks', 'zeen_link_pages', 9 );
add_action( 'zeen_post_footer_blocks', 'zeen_source_via', 10 );
add_action( 'zeen_post_footer_blocks', 'zeen_tags', 10 );
add_action( 'zeen_post_footer_blocks', 'zeen_react', 11 );
add_action( 'zeen_post_footer_blocks', 'zeen_post_end_ad', 11 );
add_action( 'zeen_post_footer_blocks', 'zeen_thumbs_up_down', 12 );
add_action( 'zeen_post_footer_blocks', 'zeen_post_end_subscribe', 12 );
add_action( 'zeen_post_footer_blocks', 'zeen_share', 13 );
add_action( 'zeen_post_footer_blocks', 'zeen_user_box', 14 );
if ( get_theme_mod( 'single_related_posts_location', 1 ) == 1 ) {
	add_action( 'zeen_post_footer_blocks', 'zeen_related_posts', 15 );
	if ( get_theme_mod( 'single_comments', 1 ) == 1 ) {
		add_action( 'zeen_post_footer_blocks', 'zeen_comment_template', 17 );
	}
}
if ( get_theme_mod( 'single_next_previous_design', 1 ) == 1 ) {
	add_action( 'zeen_post_footer_blocks', 'zeen_previous_next_block', 16 );
}
if ( get_theme_mod( 'ipl_before_post_ad' ) == 1 ) {
	add_action( 'zeen_post_before_content_auto_next_post', 'zeen_post_before_ad', 17 );
}

if ( get_theme_mod( 'single_related_posts_location', 1 ) == 2 ) {
	add_action( 'zeen_end_post_sticky_wrap', 'zeen_related_posts', 15 );
	if ( get_theme_mod( 'single_comments', 1 ) == 1 ) {
		add_action( 'zeen_end_post_sticky_wrap', 'zeen_comment_template', 17 );
	}
}

/**
 * Post Footer Hooks During Auto-Load Next Post
 * @see zeen_source_via()
 * @see zeen_tags()
 * @see zeen_post_end_ad()
 * @see zeen_user_box()
 * @see zeen_share()
 * @see zeen_previous_next_block()
 * @see zeen_comment_template()
 * @since 1.0.0
 */
add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_source_via', 10 );
add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_tags', 10 );
add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_react', 11 );
if ( get_theme_mod( 'ipl_end_post_ad' ) == 1 ) {
	add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_post_end_ad', 11 );
}
add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_thumbs_up_down', 12 );

if ( get_theme_mod( 'ipl_newsletter' ) == 1 ) {
	add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_post_end_subscribe', 12 );
}
add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_share', 13 );
if ( get_theme_mod( 'ipl_author' ) == 1 ) {
	add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_user_box', 14 );
}
if ( get_theme_mod( 'ipl_coms' ) == 1 ) {
	if ( get_theme_mod( 'single_related_posts_location', 1 ) == 2 ) {
		add_action( 'zeen_end_post_sticky_wrap_auto_next_post', 'zeen_comment_template', 17 );
	} else {
		add_action( 'zeen_post_footer_blocks_auto_next_post', 'zeen_comment_template', 17 );
	}
}


/**
 * AMP Hooks
 * @see zeen_amp_extra_css()
 * @see zeen_amp_footer_logo()
 * @see zeen_amp_after_content()
 * @see zeen_amp_meta()
 * @see zeen_amp_template_parts()
 * @see zeen_amp_args()
 * @since 1.0.0
 */
if ( function_exists( 'amp_init' ) ) :
	add_filter( 'amp_customizer_is_enabled', '__return_false' );
	add_action( 'amp_post_template_css', 'zeen_amp_extra_css' );
	add_action( 'zeen_amp_footer', 'zeen_amp_footer_logo', 10 );
	add_action( 'zeen_amp_after_content', 'zeen_amp_after_content', 11 );
	add_filter( 'amp_post_article_header_meta', 'zeen_amp_meta' );
	add_filter( 'amp_post_template_file', 'zeen_amp_template_parts', 10, 3 );
	add_filter( 'amp_post_article_footer_meta', 'zeen_amp_args' );
endif;

/**
 * Sensei Hooks
 * @see zeen_sensei_before_main()
 * @see zeen_sensei_after_main()
 * @since 1.0.0
 */
if ( zeen_sensei_active() == true ) :
	global $woothemes_sensei;
	remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
	remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );
	add_action( 'sensei_before_main_content', 'zeen_sensei_before_main', 10 );
	add_action( 'sensei_after_main_content', 'zeen_sensei_after_main', 10 );
endif;

/**
 * Contact Form 7 Stylesheet Unloader
 * @since 1.0.0
 */
add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Footer Hooks
 * @see zeen_schema()
 * @since 1.0.0
 */
add_action( 'wp_footer', 'zeen_schema', 10 );
add_action( 'wp_footer', 'zeen_photoswipe', 10 );

/**
 * Let's Review Hooks
 * @since 1.0.0
 */
add_filter( 'lets_review_stars', 'zeen_lr_stars' );
add_filter( 'lets_review_aff_icon_1_class', 'zeen_lr_icon_1' );
add_filter( 'lets_review_aff_icon_2_class', 'zeen_lr_icon_2' );

/**
 * Jetpack Hooks
 * @since 2.0.6
 */
add_filter( 'jetpack_just_in_time_msgs', '__return_false', 99 );

/**
 * Core Hooks
 * @since 3.5.0
 */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
