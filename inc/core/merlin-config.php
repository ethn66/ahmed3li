<?php
/**
 * Merlin WP configuration file.
 *
 * @package Zeen
 * @version 1.0.8
 * @author  Codetipi
 * @license @@pkg.license
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}
/**
 * Set directory locations, text strings, and settings.
 */
$wizard      = new Merlin(
	$config  = array(
		'directory'            => '/inc/core/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'zeen-start',  // The wp-admin page slug where Merlin WP loads.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'zeen' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'zeen' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'zeen' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'zeen' ),
		'btn-skip'                 => esc_html__( 'Skip', 'zeen' ),
		'btn-next'                 => esc_html__( 'Next', 'zeen' ),
		'btn-start'                => esc_html__( 'Start', 'zeen' ),
		'btn-no'                   => esc_html__( 'Cancel', 'zeen' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'zeen' ),
		'btn-child-install'        => esc_html__( 'Install', 'zeen' ),
		'btn-content-install'      => esc_html__( 'Install', 'zeen' ),
		'btn-import'               => esc_html__( 'Import', 'zeen' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'zeen' ),
		'btn-license-skip'         => esc_html__( 'Later', 'zeen' ),
		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'zeen' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'zeen' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'zeen' ),
		'license-label'            => esc_html__( 'License key', 'zeen' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'zeen' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'zeen' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'zeen' ),
		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'zeen' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'zeen' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'zeen' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'zeen' ),
		'child-header'             => esc_html__( 'Install Child Theme', 'zeen' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'zeen' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'zeen' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'zeen' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'zeen' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'zeen' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'zeen' ),
		'plugins-header'           => esc_html__( 'Install Plugins', 'zeen' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'zeen' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'zeen' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'zeen' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'zeen' ),
		'import-header'            => esc_html__( 'Zeen Demo Import', 'zeen' ),
		'import'                   => esc_html__( 'Make a backup first if you want to do this!', 'zeen' ),
		'import-action-link'       => esc_html__( 'Advanced', 'zeen' ),
		'ready-header'             => esc_html__( 'All done. Have fun!', 'zeen' ),
		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Zeen is now ready to rock.', 'zeen' ),
		'ready-action-link'        => esc_html__( 'Extras', 'zeen' ),
		'ready-big-button'         => esc_html__( 'View your website', 'zeen' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Go To Theme Options', 'zeen' ) ),
	)
);

function zeen_generate_child_functions_php( $output, $slug ) {
	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );
	$output          = "
		<?php
		/**
		 * Zeen Child Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {
			wp_enqueue_style( '{$slug}-child-style' , get_stylesheet_directory_uri() . '/style.css', array( 'zeen-style' ), ZEEN_VERSION );
		}
		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";
	return trim( preg_replace( '/\t+/', '', $output ) );
}
add_filter( 'merlin_generate_child_functions_php', 'zeen_generate_child_functions_php', 10, 2 );

function zeen_merlin_child_screenshot() {
	return get_parent_theme_file_path( '/assets/admin/img/child-screenshot.png' );
}
add_filter( 'merlin_generate_child_screenshot', 'zeen_merlin_child_screenshot' );

function zeen_generate_child_style( $output, $slug, $parent, $version ) {
	$output = "
			/**
			* Theme Name: {$parent} Child
			* Description: {$parent} child theme.
			* Author: Codetipi
			* Template: {$slug}
			* Version: 1.0.0
			*/\n
		";

	return trim( preg_replace( '/\t+/', '', $output ) );
}
add_filter( 'merlin_generate_child_style_css', 'zeen_generate_child_style', 10, 4 );

function zeen_merlin_content_home_page_title( $output ) {
	return 'Homepage';
}
add_filter( 'merlin_content_home_page_title', 'zeen_merlin_content_home_page_title' );

function zeen_merlin_content_blog_page_title( $output ) {
	return 'Blog';
}
add_filter( 'merlin_content_blog_page_title', 'zeen_merlin_content_blog_page_title' );

function zeen_merlin_unset_default_widgets_args( $widget_areas ) {

	$widget_areas = array(
		'sidebar-default' => array(),
	);

	return $widget_areas;
}
add_filter( 'merlin_unset_default_widgets_args', 'zeen_merlin_unset_default_widgets_args' );

function zeen_merlin_stylesheet( $widget_areas ) {

	return get_parent_theme_file_uri( 'assets/admin/css/merlin.css' );
}
add_filter( 'merlin_custom_stylesheet', 'zeen_merlin_stylesheet' );

function zeen_merlin_get_assets( $index = '' ) {
	$output                   = array();
	$logo_main_id             = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogomain',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_main_id_2x          = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogomain2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_main_id         = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogomain',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_main_id_2x      = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogomain2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_main_menu_id        = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogomainmenu',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_main_menu_id_2x     = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogomainmenu2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_main_menu_id    = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogomainmenu',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_main_menu_id_2x = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogomainmenu2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_footer_id           = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogofooter',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_footer_id_2x        = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogofooter2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_footer_id       = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogofooter',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_footer_id_2x    = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogofooter2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_mobile_id           = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogomobile',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$logo_mobile_id_2x        = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenlogomobile2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_mobile_id       = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogomob',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$alt_logo_mobile_id_2x    = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'altzeenlogomob2x',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	$placeholder              = get_posts(
		array(
			'post_type'      => 'attachment',
			'name'           => 'zeenplaceholder',
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		)
	);
	if ( ! empty( $placeholder ) ) {
		$output['placeholder'] = $placeholder[0]->ID;
	}
	if ( ! empty( $logo_main_id ) ) {
		$output['main'] = $logo_main_id[0]->ID;
	}
	if ( ! empty( $alt_logo_main_id ) ) {
		$output['alt_main'] = $alt_logo_main_id[0]->ID;
	}
	if ( ! empty( $logo_main_id_2x ) ) {
		$output['main2x'] = $logo_main_id_2x[0]->ID;
	}
	if ( ! empty( $alt_logo_main_id_2x ) ) {
		$output['alt_main2x'] = $alt_logo_main_id_2x[0]->ID;
	}
	if ( ! empty( $logo_main_menu_id ) ) {
		$output['main_menu'] = $logo_main_menu_id[0]->ID;
	}
	if ( ! empty( $alt_logo_main_menu_id ) ) {
		$output['alt_main_menu'] = $alt_logo_main_menu_id[0]->ID;
	}
	if ( ! empty( $logo_main_menu_id_2x ) ) {
		$output['main_menu2x'] = $logo_main_menu_id_2x[0]->ID;
	}
	if ( ! empty( $alt_logo_main_menu_id_2x ) ) {
		$output['alt_main_menu2x'] = $alt_logo_main_menu_id_2x[0]->ID;
	}
	if ( ! empty( $logo_footer_id ) ) {
		$output['footer'] = $logo_footer_id[0]->ID;
	}
	if ( ! empty( $logo_footer_id_2x ) ) {
		$output['footer2x'] = $logo_footer_id_2x[0]->ID;
	}
	if ( ! empty( $logo_mobile_id ) ) {
		$output['mobile'] = $logo_mobile_id[0]->ID;
	}
	if ( ! empty( $logo_mobile_id_2x ) ) {
		$output['mobile2x'] = $logo_mobile_id_2x[0]->ID;
	}
	if ( ! empty( $alt_logo_footer_id ) ) {
		$output['alt_footer'] = $alt_logo_footer_id[0]->ID;
	}
	if ( ! empty( $alt_logo_footer_id_2x ) ) {
		$output['alt_footer2x'] = $alt_logo_footer_id_2x[0]->ID;
	}
	if ( ! empty( $alt_logo_mobile_id ) ) {
		$output['alt_mobile'] = $alt_logo_mobile_id[0]->ID;
	}
	if ( ! empty( $alt_logo_mobile_id_2x ) ) {
		$output['alt_mobile2x'] = $alt_logo_mobile_id_2x[0]->ID;
	}

	return $output;
}

function zeen_merlin_after_import_setup( $selected_import_index ) {

	$posts = get_posts(
		array(
			'fields'         => 'ids',
			'posts_per_page' => -1,
		)
	);

	$logo_main               = array( 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 26, 27, 28, 29, 30, 32 );
	$alt_logo_main           = array( 0, 28, 29, 32 );
	$logo_main_menu          = array( 0, 1, 2, 4, 6, 8, 10, 13, 19, 22, 26 );
	$alt_logo_main_menu      = array( 0 );
	$logo_footer_menu        = array( 0, 2, 3, 4, 6, 7, 8, 9, 10, 12, 13, 18, 20, 21, 22, 26, 27, 32 );
	$alt_logo_footer_menu    = array();
	$logo_mob_menu           = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19, 20, 21, 22, 23, 24, 26, 27, 28, 29, 30, 32 );
	$alt_logo_mob_menu       = array( 28, 29 );
	$logo_main_name          = 'main';
	$alt_logo_main_name      = 'alt_main';
	$logo_main_menu_name     = 'main_menu';
	$alt_logo_main_menu_name = 'alt_main_menu';
	$logo_mobile_name        = 'mobile';
	$alt_logo_mobile_name    = 'alt_mobile';
	$logo_footer_name        = 'footer';
	$alt_logo_footer_name    = 'alt_footer';

	update_option( 'posts_per_page', 12 );
	if ( 0 == $selected_import_index ) {
		$alt_logo_main_menu_name = $logo_mobile_name;
	} elseif ( 1 == $selected_import_index ) {
		$logo_mobile_name = $logo_mobile_name;
	} elseif ( 2 == $selected_import_index ) {
		$logo_mobile_name    = $logo_main_name;
		$logo_main_menu_name = $logo_main_name;
	} elseif ( 3 == $selected_import_index ) {
		$logo_footer_name = $logo_main_name;
	} elseif ( 4 == $selected_import_index ) {
		$logo_footer_name = $logo_main_name;
	} elseif ( 5 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
	} elseif ( 6 == $selected_import_index ) {
		$logo_footer_name    = $logo_main_name;
		$logo_main_menu_name = $logo_mobile_name;
	} elseif ( 7 == $selected_import_index ) {
		$logo_footer_name = $logo_main_name;
	} elseif ( 8 == $selected_import_index ) {
		$logo_footer_name    = $logo_main_name;
		$logo_mobile_name    = $logo_main_menu_name;
		$logo_main_menu_name = $logo_mobile_name;
	} elseif ( 10 == $selected_import_index ) {
		$logo_mobile_name    = $logo_footer_name;
		$logo_main_menu_name = $logo_footer_name;
	} elseif ( 12 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
		$logo_footer_name = $logo_main_name;
	} elseif ( 13 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
	} elseif ( 17 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
	} elseif ( 18 == $selected_import_index ) {
		$logo_footer_name = $logo_main_name;
	} elseif ( 19 == $selected_import_index ) {
		$logo_main_menu_name = $logo_mobile_name;
	} elseif ( 20 == $selected_import_index ) {
		$logo_footer_name = $logo_main_name;
		$logo_mobile_name = $logo_main_name;
	} elseif ( 21 == $selected_import_index ) {
		$logo_footer_name = $logo_main_name;
	} elseif ( 22 == $selected_import_index ) {
		$logo_footer_name    = $logo_main_name;
		$logo_main_menu_name = $logo_mobile_name;
	} elseif ( 23 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
	} elseif ( 24 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
	} elseif ( 25 == $selected_import_index ) {
	} elseif ( 26 == $selected_import_index ) {
		$logo_main_menu_name = $logo_mobile_name;
		$logo_footer_name    = $logo_main_name;
	} elseif ( 27 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
		$logo_footer_name = $logo_main_name;
	} elseif ( 28 == $selected_import_index ) {
		$logo_mobile_name     = $logo_main_name;
		$alt_logo_mobile_name = $alt_logo_main_name;
	} elseif ( 29 == $selected_import_index ) {
	} elseif ( 30 == $selected_import_index ) {
		$logo_mobile_name = $logo_main_name;
		$full             = true;
	} elseif ( 31 == $selected_import_index ) {
	} elseif ( 32 == $selected_import_index ) {
		$logo_footer_name = $alt_logo_main_name;
	}

	if ( 4 == $selected_import_index || 24 == $selected_import_index ) {
		update_option( 'posts_per_page', 6 );
	}

	$logos = zeen_merlin_get_assets( $selected_import_index );
	if ( empty( $full ) ) {
		if ( in_array( $selected_import_index, $logo_main ) ) {
			set_theme_mod( 'logo_main', $logos[ $logo_main_name ] );
			set_theme_mod( 'logo_main_retina', $logos[ $logo_main_name . '2x' ] );
		}

		if ( in_array( $selected_import_index, $alt_logo_main ) ) {
			if ( ! empty( $logos[ $alt_logo_main_name ] ) ) {
				set_theme_mod( 'alt_logo_main', $logos[ $alt_logo_main_name ] );
			}
			if ( ! empty( $logos[ $alt_logo_main_name . '2x' ] ) ) {
				set_theme_mod( 'alt_logo_main_retina', $logos[ $alt_logo_main_name . '2x' ] );
			}
		}

		if ( in_array( $selected_import_index, $logo_footer_menu ) ) {
			set_theme_mod( 'logo_footer', $logos[ $logo_footer_name ] );
			set_theme_mod( 'logo_footer_retina', $logos[ $logo_footer_name . '2x' ] );
		}

		if ( in_array( $selected_import_index, $alt_logo_footer_menu ) ) {
			set_theme_mod( 'alt_logo_footer', $logos[ $alt_logo_footer_name ] );
			set_theme_mod( 'alt_logo_footer_retina', $logos[ $alt_logo_footer_name . '2x' ] );
		}

		if ( in_array( $selected_import_index, $logo_main_menu ) ) {
			set_theme_mod( 'logo_main_menu', $logos[ $logo_main_menu_name ] );
			set_theme_mod( 'logo_main_menu_retina', $logos[ $logo_main_menu_name . '2x' ] );
		}

		if ( in_array( $selected_import_index, $alt_logo_main_menu ) ) {
			set_theme_mod( 'alt_logo_main_menu', $logos[ $alt_logo_main_menu_name ] );
			set_theme_mod( 'alt_logo_main_menu_retina', $logos[ $alt_logo_main_menu_name . '2x' ] );
		}

		if ( in_array( $selected_import_index, $logo_mob_menu ) ) {
			set_theme_mod( 'logo_mobile', $logos[ $logo_mobile_name ] );
			set_theme_mod( 'logo_mobile_retina', $logos[ $logo_mobile_name . '2x' ] );
		}

		if ( in_array( $selected_import_index, $alt_logo_mob_menu ) ) {
			set_theme_mod( 'alt_logo_mobile', $logos[ $alt_logo_mobile_name ] );
			set_theme_mod( 'alt_logo_mobile_retina', $logos[ $alt_logo_mobile_name . '2x' ] );
		}

		foreach ( $posts as $key ) {
			$thumb_check = get_the_post_thumbnail( $key );
			$zeen_check  = get_post_meta( $key, 'zeen_hero_design', true );
			if ( empty( $thumb_check ) && ! empty( $zeen_check ) ) {
				set_post_thumbnail( $key, $logos['placeholder'] );
			}
		}
	}

	$menu_check  = array(
		'main',
		'footer',
		'secondary',
		'mobile',
	);
	$menu_setter = array();

	foreach ( $menu_check as $key ) {
		$menu_check[ $key ] = get_term_by( 'slug', $key . '-menu', 'nav_menu' );
	}

	foreach ( $menu_check as $menu_key => $menu_value ) {
		if ( empty( $menu_value->term_id ) ) {
			continue;
		}
		$menu_setter[ $menu_key ] = $menu_value->term_id;
	}

	if ( empty( $menu_setter ) ) {
		return;
	}

	set_theme_mod( 'nav_menu_locations', $menu_setter );

}
add_action( 'merlin_after_all_import', 'zeen_merlin_after_import_setup' );

function zeen_merlin_import_files() {
	return array(
		array(
			'import_file_name'           => 'Zeen - Main',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-main.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-main.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-main.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen',
		),
		array(
			'import_file_name'           => 'Zeen - Minimal',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-minimal.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-minimal.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-minimal.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-minimal',
		),
		array(
			'import_file_name'           => 'Zeen - Style',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190418zeen-style-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-style.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-style.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-style',
		),
		array(
			'import_file_name'           => 'Zeen - Alice',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-08-03-zeen-blog.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-blog.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-alice.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-blog',
		),
		array(
			'import_file_name'           => 'Zeen - Play',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-play.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-play.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-play.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-play',
		),
		array(
			'import_file_name'           => 'Zeen - Games Minimal',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190418zeen-games-minimal-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-games-minimal.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-games-minimal.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-games-minimal',
		),
		array(
			'import_file_name'           => 'Zeen - Comics',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190418zeen-comics-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-comics.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-comics.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-comics',
		),
		array(
			'import_file_name'           => 'Zeen - Writer',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190418zeen-writer-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-writer.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-writer.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-writer',
		),
		array(
			'import_file_name'           => 'Zeen - Science',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190418zeen-science-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-science.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-science.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-science',
		),
		array(
			'import_file_name'           => 'Zeen - Food',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-food.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-food.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-food.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-food',
		),
		array(
			'import_file_name'           => 'Zeen - Tech',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-17-zeen-tech.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/20181017-zeen-tech.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-tech.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-tech',
		),
		array(
			'import_file_name'           => 'Zeen - Shop',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-17-zeen-shop.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-shop.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-shop.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-shop',
		),
		array(
			'import_file_name'           => 'Zeen - eSports',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190807zeen-esports-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-esports.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-esports.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-esports',
		),
		array(
			'import_file_name'           => 'Zeen - Spooked',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-horror.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-horror.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-horror.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-horror',
		),
		array(
			'import_file_name'           => 'Zeen - Elle',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190807zeen-elle-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-elle.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-elle.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-elle',
		),
		array(
			'import_file_name'           => 'Zeen - Wander',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190807zeen-adventure-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-adventure.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-adventure.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-adventure',
		),
		array(
			'import_file_name'           => 'Zeen - Berlin',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190807zeen-berlin-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-berlin.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-berlin.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-berlin',
		),
		array(
			'import_file_name'           => 'Zeen - Juliet',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/190807zeen-juliet-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-juliet.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-juliet.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-juliet',
		),
		array(
			'import_file_name'           => 'Zeen - Review',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/191024zeen-lets-review-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-lets-review.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-lets-review.dat',
			'preview_url'                => 'https://demos.codetipi.com/letsreview',
		),
		array(
			'import_file_name'           => 'Zeen - Baby',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/191125zeen-baby-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-baby.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-baby.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-baby',
		),
		array(
			'import_file_name'           => 'Zeen - Husk',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-music.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-music.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-music.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-music',
		),
		array(
			'import_file_name'           => 'Zeen - SEO',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-seo.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-seo.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-seo.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-seo',
		),
		array(
			'import_file_name'           => 'Zeen - Volar',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-volar.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-volar.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-volar.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-volar',
		),
		array(
			'import_file_name'           => 'Zeen - Jacky',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/191125zeen-jacky-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-jacky.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-jacky.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-jacky',
		),
		array(
			'import_file_name'           => 'Zeen - Journal',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-journal-replaced.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/202101zeen-journal.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-journal.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-journal',
		),
		array(
			'import_file_name'           => 'Zeen - Art',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-13-zeen-art.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/zeen-art.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-art.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-art',
		),
		array(
			'import_file_name'           => 'Zeen - Robots',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-05-03-zeen-robots.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/200206zeen-robots.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-robots.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-robots',
		),
		array(
			'import_file_name'           => 'Zeen - Freebies',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-08-05-zeen-freebies.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-08-03-zeen-freebies.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-freebies.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-freebies',
		),
		array(
			'import_file_name'           => 'Zeen - Symmetry',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-08-04-zeen-symmetry.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-08-03-zeen-symmetry.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-symmetry.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-symmetry',
		),
		array(
			'import_file_name'           => 'Zeen - Newspaper',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-news.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-08-03-zeen-news.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-news.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-news',
		),
		array(
			'import_file_name'           => 'Zeen - Wild',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-11-24-zeen-animals.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2020-11-22-zeen-animals.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-wild.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-animals',
		),
		array(
			'import_file_name'           => 'Zeen - Lyfe',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-17-zeen-lyfe.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-11-zeen-lyfe.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-lyfe.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-lyfe',
		),
		array(
			'import_file_name'           => 'Zeen - Undo',
			'import_file_url'            => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-11-zeen-undo.xml',
			'import_widget_file_url'     => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-04-11-zeen-undo.wie',
			'import_customizer_file_url' => 'https://demos.codetipi.com/wp-content/uploads/demo-data/content/2021-06-07-zeen-undo.dat',
			'preview_url'                => 'https://demos.codetipi.com/zeen-undo',
		),
	);
}
add_filter( 'merlin_import_files', 'zeen_merlin_import_files' );

function zeen_merlin_reset() {
	remove_theme_mods();
	return false;
}
add_filter( 'merlin_enable_wp_customize_save_hooks', 'zeen_merlin_reset' );
