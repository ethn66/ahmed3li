<?php
/**
 * Scripts
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Backend Scripts
 */
function zeen_enqueue_scripts_admin( $pagenow = '' ) {

	if ( is_customize_preview() ) {
		wp_deregister_style( 'wsl-admin' );
		return;
	}

	if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow || 'widgets.php' == $pagenow || 'term.php' == $pagenow || 'edit-tags.php' == $pagenow || 'nav-menus.php' == $pagenow ) {
		$ext = is_rtl() ? 'style-rtl.min.css' : 'style.min.css';
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'zeen-control-color-a', get_parent_theme_file_uri( '/assets/admin/js/zeen-control-color-a.js' ), array( 'jquery', 'wp-color-picker' ), false, true );
		wp_enqueue_style( 'zeen-admin', get_parent_theme_file_uri( 'assets/admin/css/' . $ext ), array(), ZEEN_VERSION );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'suggest' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_media();
		wp_enqueue_script( 'alpha-color-picker', get_parent_theme_file_uri( 'assets/admin/js/alpha-color-picker.js' ), array( 'jquery' ), ZEEN_VERSION, true );
		wp_enqueue_script( 'searchable-option-list', get_parent_theme_file_uri( 'assets/admin/js/searchable-option-list.js' ), array( 'jquery' ), ZEEN_VERSION, true );
		wp_enqueue_script( 'zeen-admin-js', get_parent_theme_file_uri( 'assets/admin/js/zeen-admin.js' ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-slider', 'wp-color-picker', 'alpha-color-picker', 'searchable-option-list', 'jquery-ui-datepicker', 'suggest' ), ZEEN_VERSION, true );
		$tipi_builder_active = '';
		if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) {
			global $post;
			$tipi_builder_active = get_post_meta( $post->ID, 'tipi_builder_active', true ) == true ? true : false;
		}

		wp_localize_script(
			'zeen-admin-js',
			'zeenJS',
			array(
				'i18n'              => Zeen\ZeenI18n::zeen_admin_i18n(),
				'slug'              => esc_url( basename( get_parent_theme_file_path() ) ),
				'tipiBuilderActive' => $tipi_builder_active,
				'slug'              => esc_url( basename( get_parent_theme_file_path() ) ),
				'args'              => Zeen\ZeenHelpers::zeen_admin_args(),
				'adminNonce'        => wp_create_nonce( 'zeen_nonce' ),
				'ajaxURL'           => admin_url( 'admin-ajax.php' ),
			)
		);
	}
}
add_action( 'admin_enqueue_scripts', 'zeen_enqueue_scripts_admin' );

function zeen_enqueue_block_editor_assets() {
	wp_enqueue_style( 'zeen-block-editor', get_parent_theme_file_uri( 'assets/admin/css/editor.css' ), array(), ZEEN_VERSION );
	wp_add_inline_style( 'zeen-block-editor', zeen_get_extra_style_admin() );
	zeen_font_loader();
}
add_action( 'enqueue_block_editor_assets', 'zeen_enqueue_block_editor_assets' );

/**
 * Frontend scripts
 *
 * @since    1.0.0
 */
function zeen_enqueue_scripts() {

	$css_suffix = 1 == get_theme_mod( 'minify_css', 1 ) ? '.min' : '';
	$css_suffix = ZEEN_DEBUG ? '' : $css_suffix;
	$css_suffix = is_rtl() ? '-rtl' . $css_suffix : $css_suffix;
	$style_uri  = ZeenMobile::is_mobile_or_amp() ? 'style-mobile' . $css_suffix . '.css' : 'style' . $css_suffix . '.css';
	$style_uri  = 1 == get_theme_mod( 'responsive', 1 ) ? $style_uri : 'style-unresponsive' . $css_suffix . '.css';
	$js_suffix  = 1 == get_theme_mod( 'minify_js', 1 ) ? '.min' : '';
	$js_suffix  = ZEEN_DEBUG ? '' : $js_suffix;

	// Theme stylesheet.
	wp_enqueue_style( 'zeen-style', get_parent_theme_file_uri( 'assets/css/' . $style_uri ), array(), ZEEN_VERSION );
	wp_add_inline_style( 'zeen-style', zeen_get_extra_style() );
	if ( zeen_bbp_active() || zeen_bp_active() ) {
		$bbp_style = ZEEN_DEBUG ? 'bbp-buddypress.css' : 'bbp-buddypress.min.css';
		wp_enqueue_style( 'zeen-bbp-buddypress-style', get_parent_theme_file_uri( 'assets/css/' . $bbp_style ), array(), ZEEN_VERSION );
	}
	if ( zeen_dark_mode_active() ) {
		$dark_style = ZEEN_DEBUG ? 'dark.css' : 'dark.min.css';
		wp_enqueue_style( 'zeen-dark-mode', get_parent_theme_file_uri( 'assets/css/' . $dark_style ), array( 'zeen-style' ), ZEEN_VERSION );
	}
	zeen_font_loader();

	$dep = array( 'jquery', 'gsap', 'scroll-trigger', 'js-cookie', 'menu-aim' );
	wp_enqueue_script( 'gsap', get_parent_theme_file_uri( 'assets/js/gsap/gsap.min.js' ), array(), '3.6', true );
	wp_enqueue_script( 'scroll-trigger', get_parent_theme_file_uri( 'assets/js/gsap/ScrollTrigger.min.js' ), array( 'gsap' ), '3.6', true );
	wp_enqueue_script( 'js-cookie', get_parent_theme_file_uri( 'assets/js/js.cookie.min.js' ), array(), '2.2.1', true );
	if ( is_single() ) {
		$pid  = get_the_ID();
		$list = get_post_meta( $pid, 'zeen_list', true );
		if ( 'on' == $list ) {
			$list_design = get_post_meta( $pid, 'zeen_list_design', true );
			$list_design = empty( $list_design ) || 99 == $list_design ? get_theme_mod( 'list_design', 1 ) : $list_design;
			if ( 1 == $list_design ) {
				$flickity = true;
			}
		}
		$related = get_theme_mod( 'single_related_posts', 1 ) == 1 ? get_theme_mod( 'single_related_posts_design', 29 ) : '';
		if ( $related > 50 && $related < 60 ) {
			$flickity = true;
		}
		$ipl = 2 === (int) get_post_meta( $pid, 'zeen_next_post_auto_load', true ) ? '' : get_theme_mod( 'ipl' );
		if ( ! empty( $ipl ) ) {
			$flickity = true;
		}
		if ( get_post_format() == 'gallery' ) {
			$flickity = true;
			$dep[]    = 'flickity-full-screen';
			wp_enqueue_script( 'flickity-full-screen', get_parent_theme_file_uri( 'assets/js/flickity-full-screen.min.js' ), array( 'flickity' ), '1.1.1', true );
		}
	}

	if ( is_page() || zeen_is_shop() ) {
		$pid                 = zeen_is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
		$tipi_builder_active = get_post_meta( $pid, 'tipi_builder_active', true ) == true ? true : false;
		if ( ! empty( $tipi_builder_active ) ) {
			wp_dequeue_style( 'wp-block-library' );
			wp_dequeue_style( 'wp-block-library-theme' );
			$check = TipiBuilder\ZeenHelpers::zeen_block_finder( $pid, 'slider' );
			if ( ! empty( $check ) ) {
				$flickity   = true;
				$fade_check = TipiBuilder\ZeenHelpers::zeen_block_finder(
					$pid,
					'slider',
					array(
						'field' => 'effect',
						'value' => 2,
					)
				);
				if ( ! empty( $fade_check ) ) {
					$dep[] = 'flickity-fade';
					wp_enqueue_script( 'flickity-fade', get_parent_theme_file_uri( 'assets/js/flickity-fade.min.js' ), array( 'flickity' ), '1.0.0', true );
				}
			}
		}
	}
	if ( zeen_is_product() ) {
		$product_design = zeen_get_product_design();
		if ( 3 == $product_design['hero'] || 4 == $product_design['hero'] || 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
			$flickity = true;
		}
	}
	if ( is_archive() ) {
		$tid     = zeen_get_term_id();
		$builder = empty( $tid ) ? '' : zeen_get_term_meta( 'tipi_builder_active', $tid );
		if ( ! empty( $builder ) ) {
			$archive_data = zeen_get_term_meta( 'tipi_builder_data' );
			$check        = TipiBuilder\ZeenHelpers::zeen_block_finder( '', 'slider', '', $archive_data );
			if ( ! empty( $check ) ) {
				$flickity   = true;
				$fade_check = TipiBuilder\ZeenHelpers::zeen_block_finder(
					'',
					'slider',
					array(
						'field' => 'effect',
						'value' => 2,
					),
					$archive_data
				);
				if ( ! empty( $fade_check ) ) {
					$dep[] = 'flickity-fade';
					wp_enqueue_script( 'flickity-fade', get_parent_theme_file_uri( 'assets/js/flickity-fade.min.js' ), array( 'flickity' ), '1.0.0', true );
				}
			}
		}
	}
	if ( ! empty( $flickity ) || apply_filters( 'zeen_slider_script_always_load', false ) == true ) {
		$dep[] = 'flickity';
		wp_enqueue_script( 'flickity', get_parent_theme_file_uri( 'assets/js/flickity.pkgd.min.js' ), array(), '2.2.0', true );
	} else {
		$dep[] = 'images-loaded';
		wp_enqueue_script( 'images-loaded', get_parent_theme_file_uri( 'assets/js/imagesloaded.pkgd.min.js' ), array(), '4.1.4', true );
	}
	wp_enqueue_script( 'menu-aim', get_parent_theme_file_uri( 'assets/js/menu-aim.min.js' ), array(), '1.9.0', true );
	if ( get_theme_mod( 'lightbox', 1 ) == 1 && zeen_load_check( array( 'script' => 'lightbox' ) ) ) {
		if ( get_theme_mod( 'lightbox_choice', 1 ) == 2 ) {
			wp_enqueue_script( 'jquery-fluidbox', get_parent_theme_file_uri( 'assets/js/jquery.fluidbox.min.js' ), array(), '2.0.5', true );
			$dep[] = 'jquery-fluidbox';
		} else {
			wp_dequeue_script( 'photoswipe' );
			wp_dequeue_script( 'photoswipe-ui' );
			wp_deregister_script( 'photoswipe' );
			wp_deregister_script( 'photoswipe-ui' );
			wp_dequeue_style( 'photoswipe' );
			wp_deregister_style( 'photoswipe' );
			wp_dequeue_style( 'photoswipe-default-skin' );
			wp_deregister_style( 'photoswipe-default-skin' );
			wp_enqueue_style( 'photoswipe', get_parent_theme_file_uri( 'assets/css/photoswipe.min.css' ), array(), '4.1.3' );
			wp_enqueue_script( 'photoswipe-ui', get_parent_theme_file_uri( 'assets/js/photoswipe-ui-default.min.js' ), array(), '4.1.3', true );
			$dep[] = 'photoswipe-ui';
			wp_enqueue_script( 'photoswipe', get_parent_theme_file_uri( 'assets/js/photoswipe.min.js' ), array(), '4.1.3', true );
			$dep[] = 'photoswipe';
		}
	}
	wp_enqueue_script( 'zeen-functions', get_parent_theme_file_uri( 'assets/js/functions' . $js_suffix . '.js' ), $dep, ZEEN_VERSION, true );
	wp_localize_script(
		'zeen-functions',
		'zeenJS',
		array(
			'root'  => esc_url_raw( rest_url() ) . 'codetipi-zeen/v1/',
			'nonce' => wp_create_nonce( 'wp_rest' ),
			'qry'   => zeen_get_qry(),
			'args'  => Zeen\ZeenHelpers::zeen_args(),
			'i18n'  => Zeen\ZeenI18n::zeen_i18n(),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( zeen_woo_active() ) {
		$woo_style = ZEEN_DEBUG ? 'woocommerce.css' : 'woocommerce.min.css';
		wp_enqueue_style( 'zeen-woocommerce-style', get_parent_theme_file_uri( 'assets/css/' . $woo_style ), array(), ZEEN_VERSION );
		wp_enqueue_script( 'wc-add-to-cart-variation' );
		wp_enqueue_script( 'zeen-woocommerce', get_parent_theme_file_uri( 'assets/js/woocommerce' . $js_suffix . '.js' ), array( 'zeen-functions' ), ZEEN_VERSION, true );
		wp_localize_script(
			'zeen-woocommerce',
			'zeenWooJS',
			array(
				'args' => Zeen\ZeenHelpers::zeen_args(),
				'i18n' => Zeen\ZeenI18n::zeen_i18n(),
			)
		);

		wp_dequeue_style( 'select2' );
	}

	$analytics = get_theme_mod( 'google_analytics' );
	if ( ! empty( $analytics ) ) {
		wp_enqueue_script( 'google-analytics', 'https://www.google-analytics.com/analytics.js', array(), '', true );
	}
	if ( apply_filters( 'zeen_web_vitals', false ) == true ) {
		wp_register_style( 'zeen-logo', false );
		wp_enqueue_style( 'zeen-logo' );
		wp_add_inline_style(
			'zeen-logo',
			zeen_logo_vitals()
		);
	}
	// Theme controls plugin styles
	wp_dequeue_style( 'login-with-ajax' );
	wp_dequeue_style( 'wsl-widget' );
	wp_deregister_style( 'bbp-default' );
}
add_action( 'wp_enqueue_scripts', 'zeen_enqueue_scripts' );
