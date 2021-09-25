<?php
/**
 * Template tags
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Adds custom body classes
 *
 * @since 1.0.0
 */
function zeen_body_classes( $classes ) {

	$classes[] = 'headings-f' . (int) get_theme_mod( 'typo_headings', 1 );
	$classes[] = 'body-f' . (int) get_theme_mod( 'typo_body', 2 );
	$classes[] = 'sub-f' . (int) get_theme_mod( 'typo_subtitles', 1 );
	$classes[] = 'quotes-f' . (int) get_theme_mod( 'typo_blockquotes', 1 );
	$classes[] = 'by-f' . (int) get_theme_mod( 'typo_byline', 3 );
	$classes[] = 'wh-f' . (int) get_theme_mod( 'typo_widget_headers', 2 );
	if ( zeen_woo_active() ) {
		$classes[] = 'woo--active';
	}
	if ( get_theme_mod( 'sidebar_widgets_title_centered' ) == 1 ) {
		$classes[] = 'widget-title-c';
	}
	if ( get_theme_mod( 'to_top_fixed' ) == 1 ) {
		$classes[] = 'to-top__fixed';
	}
	if ( get_theme_mod( 'footer_width', 1 ) == 1 && get_theme_mod( 'footer_reveal' ) == 1 ) {
		$classes[] = 'footer--reveal';
	}
	if ( get_theme_mod( 'font_size_block_main_title', 40 ) > 30 ) {
		$classes[] = 'block-titles-big';
	}
	if ( get_theme_mod( 'ipl_separation' ) == 1 ) {
		$classes[] = 'ipl-separated';
	}
	if ( get_theme_mod( 'classic_title_line_onoff', 1 ) == 1 ) {
		$classes[] = 'block-titles-mid-1';
	}
	if ( get_theme_mod( 'mobile_limit_height' ) == 1 && is_single() ) {
		$classes[] = 'body--mobile--limit';
	}
	if ( get_theme_mod( 'mobile_header_on_tablet' ) == 1 ) {
		$classes[] = 'mob-menu-on-tab';
	}
	if ( get_theme_mod( 'masonry_design', 1 ) == 2 ) {
		$classes[] = 'masonry-has-bg';
	}
	if ( get_theme_mod( 'megamenu_color_usage_onoff', 1 ) == 1 ) {
		$classes[] = 'menu-no-color-hover';
	}
	if ( get_theme_mod( 'grid_spacing_tiles', 0 ) == 0 ) {
		$classes[] = 'grids-spacing-0';
	}
	if ( get_theme_mod( 'mobile_fi_full_screen', 1 ) == 1 ) {
		$classes[] = 'mob-fi-tall';
	}
	if ( get_theme_mod( 'modal_skin', 1 ) == 2 ) {
		$classes[] = 'modal-skin-2';
	}
	if ( get_theme_mod( 'mobile_customization_excerpts', 1 ) == 1 ) {
		$classes[] = 'excerpt-mob-off';
	}
	if ( get_theme_mod( 'mobile_customization_avatars' ) == 1 ) {
		$classes[] = 'avatar-mob-off';
	}
	$classic_split = zeen_get_theme_mod( 'classis_split_img_width' );
	if ( $classic_split['desktop'] < 41 ) {
		$classes[] = 'classic-lt-41';
	}
	if ( $classic_split['desktop'] < 33 ) {
		$classes[] = 'classic-lt-33';
	}
	if ( get_theme_mod( 'header_change_in_dark_mode', 1 ) != 1 && get_theme_mod( 'header_skin', 1 ) == 3 ) {
		$classes[] = 'dark-mode--header-off';
	}
	if ( get_theme_mod( 'footer_change_in_dark_mode', 1 ) != 1 && get_theme_mod( 'footer_skin', 2 ) == 3 ) {
		$classes[] = 'dark-mode--footer-off';
	}
	if ( get_theme_mod( 'main_menu_change_in_dark_mode', 1 ) != 1 && get_theme_mod( 'main_menu_skin', 1 ) == 3 ) {
		$classes[] = 'dark-mode--main-menu-off';
	}
	if ( get_theme_mod( 'mobile_header_change_in_dark_mode', 1 ) != 1 && get_theme_mod( 'mobile_header_skin', 1 ) == 3 ) {
		$classes[] = 'dark-mode--mobile-header-off';
	}
	$classes[] = zeen_is_light( get_theme_mod( 'skin', '#ffffff' ) ) == true ? 'skin-light' : 'skin-dark';

	if ( isset( $_GET['dark'] ) && 1 == (int) $_GET['dark'] ) {
		$classes[] = 'body--dark--tr';
	}
	if ( zeen_cookie_check() ) {
		$classes[] = 'mode--alt--b';
	}
	if ( get_theme_mod( 'sticky_sidebar', 1 ) != 1 ) {
		$classes[] = 'zeen-sb-sticky-off';
	}
	if ( get_theme_mod( 'color_excerpt', '#444' ) == get_theme_mod( 'color_body', '#444' ) ) {
		$classes[] = 'read-more-fade';
	}
	if ( get_theme_mod( 'sticky_menu_post_name' ) == 1 ) {
		$classes[] = 'single-sticky-spin';
	}
	if ( get_theme_mod( 'megamenu_animation_onoff', 1 ) == 1 && get_theme_mod( 'megamenu_animation' ) == 3 ) {
		$classes[] = 'mm-ani-3';
	}
	$widget_color = get_theme_mod( 'footer_widgets_color', '#fff' );
	if ( get_theme_mod( 'footer_widgets_skin', 3 ) == 3 && ( '#fff' == $widget_color || '#ffffff' == $widget_color ) ) {
		$classes[] = 'footer-widgets-text-white';
	}

	$classes[] = 'site-mob-menu-a-' . (int) get_theme_mod( 'mobile_menu_animation_style', 4 );
	$classes[] = 'site-mob-menu-' . (int) get_theme_mod( 'mobile_menu_style', 1 );
	$classes[] = 'mm-submenu-' . (int) get_theme_mod( 'megamenu_submenu_color', 1 );
	$classes[] = 'main-menu-logo-' . (int) get_theme_mod( 'logo_main_menu_position', 1 );
	$header = zeen_get_style();
	if ( 58 == $header ) {
		$header = get_theme_mod( 'header_style', 1 );
	}
	$classes[] = 'body-header-style-' . (int) $header;

	if ( $header > 80 ) {
		$classes[] = 'body-with-v';
	} elseif ( $header < 60 && $header > 50 ) {
		$classes[] = 'body-header-style-50s';
	} elseif ( $header > 70 && $header < 80 ) {
		$classes[] = 'body-header-style-70s';
		if ( get_theme_mod( 'secondary_menu_side_enable', 1 ) == 1 ) {
			$classes[] = 'body-header-style-70s-w-sb';
		}
	}
	$dropcap = get_theme_mod( 'dropcap' );
	$sticky4_on = get_theme_mod( 'header_sticky_onoff', 1 ) == 1 && get_theme_mod( 'header_sticky', 1 ) == 4;
	if ( is_singular() ) {
		global $post;

		$dropcap_single = get_post_meta( $post->ID, 'zeen_dropcap', true );
		if ( 1 == $dropcap_single ) {
			$dropcap = 1;
		} elseif ( 2 == $dropcap_single ) {
			$dropcap = '';
		}

		$hero = zeen_get_hero_design( $post->ID );
		$classes[] = 'body-' . esc_attr( $hero['size'] );
		if ( has_post_thumbnail( $post->ID ) && ( 'hero-l' == $hero['size'] || 43 == $hero['hero_design'] ) ) {
			$sticky4_on = '';
		}
		if ( 31 == $hero['hero_design'] ) {
			$classes[] = 'has-bg';
		}
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$term_id = zeen_get_term_id();
		if ( get_term_meta( $term_id, 'tipi_builder_active', true ) == true ) {
			$classes[] = 'tipi-builder-tax';
			$classes[] = 'tipi-builder-on';
			$builder_data = zeen_get_term_meta( 'tipi_builder_data', $term_id );
			$first = TipiBuilder\ZeenHelpers::zeen_get_first_block( $builder_data );
			if ( ! isset( $first['fs'] ) ) {
				$first['fs'] = 'off';
			}
			if ( ! empty( $first['preview'] ) && ( ( ( $first['preview'] > 50 && $first['preview'] < 60 ) || $first['preview'] > 81 || 49 == $first['preview'] || 35 == $first['preview'] || 46 == $first['preview'] ) && 'on' == $first['fs'] ) || ( ! empty( $first['preview'] ) && 39 == $first['preview'] ) ) {
				$sticky4_on = '';
			}
		}
	}
	$builder_pid = zeen_get_active_builder_pid();
	if ( ! empty( $builder_pid ) ) {
		$classes[] = 'tipi-builder-page';
		$classes[] = 'tipi-builder-on';
		if ( get_theme_mod( 'header_sticky_onoff', 1 ) == 1 && get_theme_mod( 'header_sticky', 1 ) == 4 ) {
			$builder_data = get_post_meta( $builder_pid, 'tipi_builder_data', true );
			$first = TipiBuilder\ZeenHelpers::zeen_get_first_block( $builder_data );
			if ( ! isset( $first['fs'] ) ) {
				$first['fs'] = 'off';
			}
			if ( ! empty( $first['preview'] ) && ( ( ( $first['preview'] > 50 && $first['preview'] < 60 ) || $first['preview'] > 80 || 49 == $first['preview'] || 35 == $first['preview'] || 46 == $first['preview'] ) && 'on' == $first['fs'] ) || ( ! empty( $first['preview'] ) && 39 == $first['preview'] ) ) {
				$sticky4_on = '';
			} else {
				$sticky4_on = true;
			}
		}
	}
	if ( ! empty( $sticky4_on ) ) {
		$classes[] = 'sticky-4-unfixed';
	}
	if ( ! empty( $dropcap ) ) {
		$classes[] = 'dropcap--on';
	}

	if ( zeen_is_bp() ) {
		$classes[] = 'bp-avatar-shape-' . get_theme_mod( 'buddypress_avatar', 1 );
		$classes[] = 'bp-layout-' . get_theme_mod( 'buddypress_layout', 1 );
	}

	if ( zeen_woo_active() ) {
		if ( get_theme_mod( 'woo_tipi_blocks_variations_labels', 1 ) != 1 ) {
			$classes[] = 'woo-var-labels--off';
		}
		if ( get_theme_mod( 'woo_tipi_blocks_variations_simple' ) == 1 ) {
			$classes[] = 'woo-var-simple';
		}
	}

	$bg_repeat = zeen_get_bg_repeat();
	$background = zeen_get_bg();

	if ( ! empty( $bg_repeat ) ) {
		$classes[] = 'bg-img-' . $bg_repeat;
	}
	if ( ! empty( $bg_repeat ) || ! empty( $background['image'] ) || ( '#fff' != substr( $background['color'], 0, 4 ) && 'rgb(255, 255, 255)' != $background['color'] ) ) {
		if ( empty( $background['image'] ) && get_theme_mod( 'skin', '#ffffff' ) === $background['color'] ) {
			$classes[] = 'same-bg';
		} else {
			$classes[] = 'has-bg';
		}
	}
	$bg_ad = zeen_get_bg_ad();
	if ( ! empty( $bg_ad['image'] ) ) {
		$classes[] = 'has-bg';
		$classes[] = 'has-bg-da';
		if ( get_theme_mod( 'bg_ad_img_stretch', 1 ) == 1 ) {
			$classes[] = 'has-bg-stretch';
		}
	}

	$classes[] = 'byline-font-' . (int) get_theme_mod( 'typo_byline', 2 );

	if ( get_theme_mod( 'classic_title_top_border_onoff' ) == 1 ) {
		$classes[] = 'block-title-bt';
	}

	if ( get_theme_mod( 'classic_title_bottom_border_onoff' ) == 1 ) {
		$classes[] = 'block-title-bb';
	}

	return $classes;
}
add_filter( 'body_class', 'zeen_body_classes' );

/**
 * Fix tag cloud's size
 *
 * @since 1.0.0
 */
function zeen_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'zeen_tag_cloud_args' );

/**
 * Duration
 *
 * @since 1.0.0
 */
function zeen_media_duration( $pid = '', $only_value = '' ) {

	$duration = get_post_meta( $pid, 'zeen_duration', true );
	if ( ! empty( $duration ) ) {
		if ( empty( $only_value ) ) {
			echo '<span class="duration font-3">' . esc_attr( $duration ) . '</span>';
		} else {
			echo esc_attr( $duration );
		}
	}

}

/**
 * Adds Background Ad
 *
 * @since 1.0.0
 */
function zeen_bg_ad() {
	if ( zeen_bg_ad_is_active() ) {
		$bg_ad = get_theme_mod( 'bg_ad_url' );
		echo '<a href=" ' . esc_url( $bg_ad ) . '" id="tipi-bg-da" class="tipi-bg-da" rel="nofollow" target="_blank"></a>';
	}
}

function zeen_bg_ad_is_active() {
	$bg_ad = get_theme_mod( 'bg_ad' );
	if ( ! empty( $bg_ad ) ) {
		if ( get_theme_mod( 'bg_ad_only_hp' ) != 1 || ( get_theme_mod( 'bg_ad_only_hp' ) == 1 && is_front_page() ) ) {
			$bg_ad = get_theme_mod( 'bg_ad_url' );
			if ( ! empty( $bg_ad ) ) {
				return true;
			}
		}
	}
}
/**
 * Excerpt
 *
 * @since 1.0.0
 */
function zeen_excerpt( $post = '', $limit = 50, $read_more = true ) {
	if ( ZeenMobile::is_mobile() && get_theme_mod( 'mobile_customization_excerpts', 1 ) == 1 ) {
		return;
	}
	add_filter( 'lets_review_append', '__return_false' );
	if ( ! empty( $post->post_excerpt ) ) {
		echo '<div class="excerpt body-color">' . $post->post_excerpt;
		do_action( 'zeen_excerpt_start', $post->ID );
		if ( get_theme_mod( 'classic_read_more', 1 ) == 1 ) {
			echo zeen_get_read_more( $post->ID );
		}
		echo '</div>';
	} else {
		if ( empty( $post ) ) {
			global $post;
			$post = get_post( $post->ID );
			setup_postdata( $post );
			$excerpt = apply_filters( 'zeen_get_the_excerpt', get_the_excerpt( $post->ID ), $post->ID );
			wp_reset_postdata( $post );
		} else {
			$excerpt = apply_filters( 'zeen_get_the_excerpt', get_the_excerpt( $post->ID ), $post->ID );
		}

		echo '<div class="excerpt body-color">';
		do_action( 'zeen_excerpt_start', $post->ID );
		echo wp_trim_words( $excerpt, $limit, '' );

		if ( ! empty( $excerpt ) ) {
			echo apply_filters( 'zeen_excerpt_ellipsis', '...' );
		}
		if ( get_theme_mod( 'classic_read_more', 1 ) == 1 && ! empty( $excerpt ) && ! empty( $read_more ) ) {
			echo zeen_get_read_more( $post->ID );
		}
		echo '</div>';
	}
}

/**
 * Excerpt Length
 *
 * @since 1.0.0
 */
function zeen_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'zeen_excerpt_length' );

/**
 * Read more getter
 *
 * @since 1.0.0
 */
function zeen_get_read_more( $pid = '', $args = array() ) {
	$location = empty( $args['location'] ) ? 'classic' : $args['location'];
	$output = ' <div class="read-more-wrap font-' . (int) get_theme_mod( 'typo_read_more', 3 ) . '"><a class="read-more';
	if ( get_theme_mod( $location . '_read_more_customize' ) == 1 ) {
		$output .= ' tipi-button';
		$output .= ' custom-button__fill-' . get_theme_mod( $location . '_read_more_fill', 1 );
		$output .= ' custom-button__rounded-' . get_theme_mod( $location . '_read_more_rounded', 3 );
	}

	$output .= '" href="' . esc_url( get_permalink( $pid ) ) . '">' . zeen_sanitize_titles( get_theme_mod( $location . '_read_more_text', esc_html__( 'Read More', 'zeen' ) ) ) . '</a></div>';
	return apply_filters( 'zeen_read_more_button_html', $output, $pid );
}

/**
 * By line author
 *
 * @since 1.0.0
 */
function zeen_byline_author( $pid = '', $args = array() ) {

	$args['source'] = empty( $args['source'] ) ? '' : $args['source'];
	$author = '' == $pid ? get_the_author() : get_post_field( 'post_author', $pid );
	if ( empty( $author ) || ( get_theme_mod( $args['source'] . '_byline_author', 1 ) != 1 && get_theme_mod( $args['source'] . '_byline_author_avatar', 1 ) != 1 ) ) {
		return;
	}
	$args['author_avatar'] = empty( $args['author_avatar'] ) ? '' : $args['author_avatar'];
	$args['author'] = empty( $args['author'] ) ? '' : $args['author'];
	$args['icon'] = empty( $args['icon'] ) ? '' : $args['icon'];
	$avatar_size = empty( $args['avatar_size'] ) ? 50 : $args['avatar_size'];
	$author_url = get_author_posts_url( $author );

	if ( ! empty( $args['author_avatar'] ) ) {
		echo '<span class="byline-part author-avatar flipboard-author';
		if ( ! empty( $args['author'] ) ) {
			echo ' with-name';
		} else {
			echo ' no-name';
		}
		echo '">';
		zeen_get_byline_author_avatar( $author, $avatar_size, $author_url );
		echo '</span>';
	}
	if ( ! empty( $args['author'] ) ) {
		echo '<span class="byline-part author">';
		if ( function_exists( 'coauthors_posts_links' ) ) {
			coauthors_posts_links( null, null, '', null, true );
		} else {
			echo '<a class="url fn n" href="' . esc_url( $author_url ) . '">';
			if ( ! empty( $args['icon'] ) ) {
				echo '<i class="tipi-i-user" aria-hidden="true"></i> ';
			}
			if ( ! empty( $args['sentence'] ) ) {
				echo '<span class="byline-by byline-detail">';
				$podcast_mode = get_post_meta( $pid, 'zeen_podcast_mode', true ) == 'on' ? true : '';
				echo empty( $podcast_mode ) ? esc_html__( 'By', 'zeen' ) : esc_html__( 'Hosted By', 'zeen' );
				echo ' </span>';
				echo '<span class="byline-by-name">';
			}
			the_author_meta( 'display_name', $author );
			if ( ! empty( $args['sentence'] ) ) {
				echo '</span>';
			}
			echo '</a>';
		}
		echo '</span>';
	}
}

/**
 * By line author avatar getter
 *
 * @since 1.0.0
 */
function zeen_get_byline_author_avatar( $author_id = '', $author_avatar_size = 50, $author_url = '' ) {
	echo '<a href="' . esc_url( $author_url ) . '" class="author-avatar">' . get_avatar( $author_id, $author_avatar_size, '', '' ) . '</a>';
}

/**
 * Get Categories
 *
 * @since 1.0.0
 */
function zeen_get_cats( $pid = '', $args = array() ) {
	$list = get_the_category( $pid );
	if ( empty( $list ) ) {
		return;
	}
	$args['primary'] = empty( $args['primary'] ) ? '' : $args['primary'];
	$global = get_theme_mod( 'use_primary_cat' );

	if ( ( 1 == $global && 'all' != $args['primary'] ) || ! empty( $args['try_primary'] ) ) {
		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$cat_primary = new WPSEO_Primary_Term( 'category', $pid );
			$cat_primary = $cat_primary->get_primary_term();
			$cat_primary = get_term( $cat_primary );
			$list = is_wp_error( $cat_primary ) ? $list : array( $cat_primary );
		} elseif ( class_exists( 'SPC_Primary_Term_Query' ) ) {
			$cat_primary = get_post_meta( $pid, 'spc_primary_category', true );
			$cat_primary = get_term( $cat_primary );
			$list = is_wp_error( $cat_primary ) ? $list : array( $cat_primary );
		} elseif ( isset( $list[0] ) ) {
			$list = array( $list[0] );
		}
	}

	return $list;
}
/**
 * By line category
 *
 * @since 1.0.0
 */
function zeen_byline_category( $pid = '', $args = array() ) {
	$primary = empty( $args['show_primary'] ) ? '' : $args['show_primary'];
	$categories_list = zeen_get_cats( $pid, array( 'primary' => $primary ) );
	$custom_cats = apply_filters( 'zeen_get_cats', array(), $pid, $categories_list );
	if ( ! empty( $custom_cats ) ) {
		$categories_list = $custom_cats;
	}
	if ( empty( $categories_list ) ) {
		$taxes = zeen_get_taxonomies();
		foreach ( $taxes as $key ) {
			$categories_list = get_the_terms( $pid, $key );
			if ( ! empty( $categories_list ) ) {
				if ( 1 == get_theme_mod( 'use_primary_cat' ) ) {
					$categories_list = array( $categories_list[0] );
				}
				break;
			}
		}
		if ( empty( $categories_list ) ) {
			return;
		}
	}
	$cat_design = empty( $args['cat_design'] ) ? 1 : $args['cat_design'];
	$class = '';
	echo '<div class="byline-part cats">';
	if ( ! empty( $args['sentence'] ) && 2 != $cat_design && 5 != $cat_design ) {
		echo '<span class="byline-in byline-blog-detail">' . esc_html__( 'In', 'zeen' ) . ' </span>';
	}
	if ( ! empty( $args['icon'] ) && 1 == $cat_design ) {
		echo '<i class="tipi-i-folder" aria-hidden="true"></i> ';
	}
	$i = 1;
	foreach ( $categories_list as $cat ) {
		echo '<a href="' . esc_url( get_category_link( $cat ) ) . '"';
		if ( 2 == $cat_design ) {
			$category_color = zeen_term_color( $cat->term_id );
			echo ' style="background-color:' . esc_attr( $category_color ) . '"';
			$class = ' cat-with-bg';
		} elseif ( 3 == $cat_design ) {
			$category_color = zeen_term_color( $cat->term_id );
			$class = ' cat-with-line';
			echo ' style="border-bottom-color:' . esc_attr( $category_color ) . '"';
		} elseif ( 4 == $cat_design ) {
			$category_color = zeen_term_color( $cat->term_id );
			echo ' style="color:' . esc_attr( $category_color ) . '"';
		} elseif ( 5 == $cat_design ) {
			$class = ' cat-with-bg cat-with-bg-dark';
		}

		echo ' class="cat' . esc_attr( $class ) . '">' . esc_attr( $cat->name ) . '</a>';
		if ( 1 == $i && ! empty( $primary_global ) && 'all' != $primary ) {
			break;
		}
		$i++;
	}
	echo '</div>';
}

/**
 * Post Date
 *
 * @since 1.0.0
 */
function zeen_date( $pid = '', $args = array() ) {

	$format = get_theme_mod( 'date_format', 1 );
	$time_mod = '';
	$mod_date = get_the_modified_time( 'U', $pid );
	$time = get_the_time( 'U', $pid );

	$updated = empty( $args['updated'] ) ? '' : $args['updated'];

	if ( $time != $mod_date && 'on' == $updated ) {
		$time_mod = true;
	}
	if ( empty( $args['publish_off'] ) ) {
		echo '<span class="byline-part date">';

		if ( ! empty( $args['icon'] ) ) {
			echo '<i class="tipi-i-calendar" aria-hidden="true"></i> ';
		}

		if ( ! empty( $args['sentence'] ) && 2 != $format ) {
			echo '<span class="byline-on byline-blog-detail">' . esc_html__( 'on', 'zeen' ) . ' </span>';
		}

		echo '<time class="entry-date published dateCreated flipboard-date" datetime="' . esc_attr( get_the_date( 'c', $pid ) ) . '">';
		switch ( $format ) {
			case 2:
				echo sprintf(
					esc_html__( '%1$s ago', 'zeen' ),
					human_time_diff( $time, current_time( 'timestamp' ) )
				);
				break;

			default:
				echo get_the_date( '', $pid );
				break;
		}
		echo '</time>';
		echo '</span>';
	}
	if ( ! empty( $time_mod ) ) {
		$date = get_the_date( '', $pid );
		$mod = get_the_modified_date( '', $pid );
		$modified = get_the_modified_date( 'c' );
		if ( $date != $mod && strtotime( $modified ) > strtotime( '-12 months' ) ) {
			if ( ! empty( $args['byline'] ) ) {
				echo '<span class="byline-part updated">';
			}
			echo '<div class="last__updated">';
			echo '<span class="last__updated__title">';
			esc_html_e( 'Last updated', 'zeen' );
			echo apply_filters( 'zeen_last_updated_separator', ':' );
			echo '</span>';
			echo '<time class="updated" datetime="' . esc_attr( $modified ) . '">';
			switch ( $format ) {
				case 2:
					echo sprintf( '%1$s %2$s',
						human_time_diff( $mod_date, current_time( 'timestamp' ) ),
						esc_html__( 'ago', 'zeen' )
					);
					break;
				default:
					echo get_the_modified_date( '', $pid );
					break;
			}
			echo '</div></time>';
			if ( ! empty( $args['byline'] ) ) {
				echo '</span>';
			}
		}
	}
}

/**
 * Updated
 *
 * @since 1.0.0
 */
function zeen_date_updated( $pid = '' ) {

	$last_updated_single = get_post_meta( $pid, 'zeen_last_updated', true );
	if ( empty( $last_updated_single ) || 99 == $last_updated_single ) {
		$last_updated = get_theme_mod( 'posts_last_updated' );
	} elseif ( 1 == $last_updated_single ) {
		$last_updated = 1;
	} elseif ( 2 == $last_updated_single ) {
		$last_updated = '';
	}

	if ( 1 != $last_updated || is_page() ) {
		return;
	}

	if ( ( is_single() && in_the_loop() && is_main_query() ) || ! empty( $pid ) ) {
		if ( empty( $pid ) ) {
			global $post;
			$pid = $post->ID;
		}

		$list = get_post_meta( $pid, 'zeen_list', true );
		if ( 'on' != $list ) {
			ob_start();
			zeen_date( $pid, array(
				'updated' => true,
				'publish_off' => true,
			) );
			return ob_get_clean();
		}
	}
}

/**
 * Reading Time
 *
 * @since 1.0.0
 */
function zeen_read_time( $pid = '', $args = array() ) {
	$content = get_post_field( 'post_content', $pid );
	if ( empty( $content ) ) {
		return;
	}
	$count = explode( ' ', $content );
	$count = floor( count( $count ) / 220 );
	$count = 0 == $count ? 1 : $count;
	echo '<span class="byline-part read-time">';
	if ( ! empty( $args['icon'] ) ) {
		echo '<i class="tipi-i-clock" aria-hidden="true"></i> ';
	}
	// translators: Number of minutes it takes to read article
	echo esc_attr( sprintf( _n( '%d min read', '%d min read', $count, 'zeen' ), $count ) );
	echo '</span>';
}

/**
 * View Count
 *
 * @since 1.0.0
 */
function zeen_view_count( $pid = '', $args = '' ) {
	$use_jetpack = apply_filters( 'zeen_view_count_use_jetpack_stats', true );
	if ( ! function_exists( 'stats_get_from_restapi' ) && true === $use_jetpack ) {
		return;
	}
	if ( empty( $args['params'] ) ) {
		$args['params'] = 'post/' . $pid;
	}

	$stats = 'zeen-pv-' . $pid;
	if ( true === $use_jetpack ) {
		$views = get_transient( $stats );
		if ( false === $views ) {
			$views = stats_get_from_restapi( array( 'fields' => 'views' ), $args['params'] );
			set_transient( $stats, $views, 180 );
		}
		$views_count = empty( $views->views ) ? '' : $views->views;
	} else {
		$views_count = apply_filters( 'zeen_view_count_custom', '', $pid );
	}

	if ( ! empty( $views_count ) ) {
		if ( ! empty( $args['separator'] ) ) {
			zeen_byline_sep( $args['sep'], $args['sep_output'] );
		}
		if ( ! empty( $args['only_value'] ) ) {
			echo (int) $views_count;
			return;
		}
		echo '<span class="byline-part view-count">';
		if ( ! empty( $args['icon'] ) ) {
			echo '<i class="tipi-i-eye" aria-hidden="true"></i> ';
		}
		$word = empty( $args['icon'] ) ? ' ' . sprintf( _n( 'view', 'views', $views_count, 'zeen' ), $views_count ) : '';
		echo (int) $views_count . esc_attr( $word );
		echo '</span>';
	}

}

/**
 * By line comment count
 *
 * @since 1.0.0
 */
function zeen_byline_comment_count( $pid = '', $args = array() ) {
	$comment_count = isset( $args['comment_count'] ) ? $args['comment_count'] : get_comments_number( $pid );
	if ( empty( $comment_count ) && get_theme_mod( 'show_0_comments' ) != 1 ) {
		return;
	}
	echo '<span class="byline-part comments"><a href="' . esc_url( get_comments_link( $pid ) ) . '">';
	if ( ! empty( $args['icon'] ) ) {
		echo '<i class="tipi-i-message-square" aria-hidden="true"></i> ';
	}
	if ( ! empty( $args['sentence'] ) ) {
		comments_number(
			esc_attr__( '0 Comments', 'zeen' ),
			esc_attr__( '1 Comment', 'zeen' ),
			esc_attr( _n( '% Comment', '% Comments', $comment_count, 'zeen' ) )
		);
	} else {
		echo (int) $comment_count;
	}
	echo '</a></span>';
}

/**
 * By line likes count
 *
 * @since 1.0.0
 */
function zeen_byline_likes_count( $pid = '', $args = array() ) {
	$like_count = get_post_meta( $pid, 'zeen_like_count', true );
	$class = '';
	if ( isset( $_COOKIE['wp_liked_articles'] ) ) {
		$cook = stripslashes( html_entity_decode( $_COOKIE['wp_liked_articles'] ) );
		if ( in_array( $pid , json_decode( $cook, true ) ) ) {
			$class = ' liked';
		}
	}
	$like_count = empty( $like_count ) ? 0 : $like_count;
	echo '<span class="byline-part likes-count"><a href="#" class="tipi-like-count ' . esc_attr( $class ) .'" data-pid="' . (int) ( $pid ) . '">';
	echo '<span class="likes-heart"><i class="tipi-i-heart-o" aria-hidden="true"></i><i class="tipi-i-heart" aria-hidden="true"></i></span>';
	echo '<span class="tipi-value">' . (int) ( $like_count ) . '</span>';
	echo '</a></span>';
}

/**
 * Byline separator
 *
 * @since 1.0.0
 */
function zeen_byline_sep( $output = '', $first = '', $class = '' ) {

	if ( empty( $output ) || empty( $first ) ) {
		return;
	}

	echo '<span class="byline-part separator';
	if ( ! empty( $class ) ) {
		echo ' separator-' . esc_attr( $class );
	}
	echo '">' . esc_attr( apply_filters( 'zeen_byline_separator', '&middot;' ) ) . '</span>';
}

/**
 * Byline
 *
 * @since 1.0.0
 */
function zeen_byline( $pid = '', $args = array() ) {

	$type = empty( $args['type'] ) ? '' : $args['type'];

	if ( ! empty( $type ) && get_theme_mod( $type . '_byline', 1 ) != 1 ) {
		return;
	}

	$location = empty( $args['location'] ) ? '' : $args['location'];
	$elements_location = empty( $args['elements_location'] ) ? 1 : $args['elements_location'];
	$elements_design = empty( $args['elements_design'] ) ? 1 : $args['elements_design'];
	$base_design = empty( $args['base_design'] ) ? 1 : $args['base_design'];
	$cat_design = empty( $args['cat_design'] ) ? '' : $args['cat_design'];
	$icon = '';
	$author_icon = '';
	$sentence = '';
	$sep_output = '';
	$sep = '';
	$a = array();

	$a['extras'] = apply_filters( 'zeen_byline_extras_onoff', '' ) == true ? true : '';

	if ( 1 == $location && 2 == $base_design ) {
		$a['cats'] = true;
		$a['comments'] = true;
	}

	if ( 1 == $elements_location ) {
		// ABOVE TITLE
		if ( 2 == $location ) {
			// ONLY SHOW CATS AND DATE IF NOT THE POLY ONE
			if ( 2 != $base_design ) {
				$a['cats'] = true;
				$a['comments'] = true;
			}
			$a['date'] = true;
			$a['updated_date'] = true;
			$a['author'] = true;
			$a['author_avatar'] = true;
			$a['read_time'] = true;
			$a['like_count'] = true;
			$a['view_count'] = true;
		}
	}

	if ( 2 == $elements_location ) {
		// BELOW TITLE
		if ( 3 == $location ) {
			// ONLY SHOW CATS AND DATE IF NOT THE POLY ONE
			if ( 2 != $base_design ) {
				$a['cats'] = true;
				$a['comments'] = true;
			}
			$a['date'] = true;
			$a['updated_date'] = true;
			$a['author'] = true;
			$a['author_avatar'] = true;
			$a['read_time'] = true;
			$a['like_count'] = true;
			$a['view_count'] = true;
		}
	}

	if ( 3 == $elements_location ) {
		// SOME ABOVE TITLE SOME BELOW TITLE
		if ( 2 == $location ) {
			// ONLY SHOW CATS AND DATE IF NOT THE POLY ONE
			if ( 2 != $base_design ) {
				$a['cats'] = true;
				$a['comments'] = true;
			}
			$a['read_time'] = true;
		}

		if ( 3 == $location ) {
			$a['author'] = true;
			$a['author_avatar'] = true;
			$a['date'] = true;
			$a['updated_date'] = true;
			$a['like_count'] = true;
			$a['view_count'] = true;
		}
	}

	if ( 4 == $elements_location ) {
		// ALL BELOW EXCERPT
		if ( 4 == $location ) {
			// ONLY SHOW CATS AND DATE IF NOT THE POLY ONE
			if ( 2 != $base_design ) {
				$a['cats'] = true;
				$a['comments'] = true;
			}
			$a['date'] = true;
			$a['updated_date'] = true;
			$a['author'] = true;
			$a['author_avatar'] = true;
			$a['read_time'] = true;
			$a['like_count'] = true;
			$a['view_count'] = true;
		}
	}

	if ( 5 == $elements_location ) {
		// SOME BELOW EXCERPT AND SOME BELOW TITLE
		if ( 3 == $location ) {
			// ONLY SHOW CATS AND DATE IF NOT THE POLY ONE
			$a['author'] = true;
			$a['author_avatar'] = true;
			$a['date'] = true;
			$a['updated_date'] = true;
		}

		if ( 4 == $location ) {
			if ( 2 != $base_design ) {
				$a['cats'] = true;
				$a['comments'] = true;
			}
			$a['like_count'] = true;
			$a['view_count'] = true;
			$a['read_time'] = true;
		}
	}

	if ( 2 == $elements_design ) {
		$sentence = true;
	} elseif ( 3 == $elements_design ) {
		$icon = true;
		$author_icon = true;
	} elseif ( 1 != $location ) {
		$sep = true;
	}
	$keys = array( 'cats', 'comments', 'author_avatar', 'author', 'updated_date', 'date', 'read_time', 'view_count', 'like_count' );
	foreach ( $keys as $key ) {
		if ( ! empty( $args[ $key ] ) && 'off' == $args[ $key ] ) {
			$a[ $key ] = '';
		}
	}
	if ( ! empty( $a['author_avatar'] ) ) {
		$author_icon = '';
	}

	if ( ZeenMobile::is_mobile() && 1 == get_theme_mod( 'mobile_customization_avatars' ) ) {
		$a['author_avatar'] = '';
	}
	$a = array_filter( $a );
	if ( empty( $a ) ) {
		return;
	}

	echo '<div class="byline byline-' . (int) $location;
	if ( ! empty( $a['cats'] ) ) {
		echo ' byline-cats-design-' . (int) $cat_design;
	}
	echo '">';

	if ( ! empty( $a['author'] ) || ! empty( $a['author_avatar'] ) ) {
		$author_avatar = empty( $a['author_avatar'] ) ? '' : $a['author_avatar'];
		$author = empty( $a['author'] ) ? '' : $a['author'];
		$avatar_size = 'classic' == $type ? 30 : '';
		zeen_byline_author( $pid, array(
			'author_avatar' => $author_avatar,
			'avatar_size' => $avatar_size,
			'author' => $author,
			'icon' => $author_icon,
			'sentence' => $sentence,
		) );
		if ( ! empty( $a['author'] ) ) {
			$sep_output = true;
		}
	}

	if ( ! empty( $a['cats'] ) ) {
		zeen_byline_sep( $sep, $sep_output, 'cats' );
		$sep_output = true;
		$cats_sentence = '';

		if ( ! empty( $sentence ) && 2 != $base_design ) {
			$cats_sentence = true;
		}
		zeen_byline_category( $pid, array(
			'cat_design' => $cat_design,
			'icon' => $icon,
			'sentence' => $cats_sentence,
		) );
	}
	if ( ! empty( $a['date'] ) ) {
		zeen_byline_sep( $sep, $sep_output, 'date' );
		$sep_output = true;
		zeen_date( $pid, array(
			'icon' => $icon,
			'sentence' => $sentence,
		) );
	}

	if ( ! empty( $a['updated_date'] ) ) {
		zeen_byline_sep( $sep, $sep_output, 'updated' );
		$sep_output = true;
		zeen_date( $pid, array(
			'icon' => $icon,
			'sentence' => $sentence,
			'updated' => true,
			'publish_off' => true,
			'byline' => true,
		) );
	}

	if ( ! empty( $a['comments'] ) ) {
		$comment_count = get_comments_number( $pid );
		if ( ! ( empty( $comment_count ) && get_theme_mod( 'show_0_comments' ) != 1 ) ) {
			zeen_byline_sep( $sep, $sep_output, 'comments' );
			$sep_output = true;
			$comments_sentence = '';
			if ( 3 != $elements_design ) {
				$comments_sentence = true;
			}
			zeen_byline_comment_count( $pid, array(
				'icon' => $icon,
				'sentence' => $comments_sentence,
				'comment_count' => $comment_count,
			) );
		}
	}

	if ( ! empty( $a['read_time'] ) ) {
		if ( ! zeen_is_live_blog( $pid ) ) {
			zeen_byline_sep( $sep, $sep_output, 'readtime' );
			$sep_output = true;
			zeen_read_time( $pid, array(
				'icon' => $icon,
				'sentence' => $sentence,
			) );
		}
	}

	if ( ! empty( $a['like_count'] ) ) {
		zeen_byline_sep( $sep, $sep_output, 'likes' );
		$sep_output = true;
		zeen_byline_likes_count( $pid, array(
			'icon' => $icon,
			'sentence' => $sentence,
		) );
	}
	$use_jetpack = apply_filters( 'zeen_view_count_use_jetpack_stats', true );
	if ( ! empty( $a['view_count'] ) && ( function_exists( 'stats_get_from_restapi' ) || false === $use_jetpack ) ) {
		zeen_view_count( $pid, array(
			'icon' => $icon,
			'sentence' => $sentence,
			'separator' => true,
			'sep' => $sep,
			'sep_output' => $sep_output,
		) );
		$sep_output = true;
	}

	if ( ! empty( $a['extras'] ) ) {
		apply_filters( 'zeen_byline_extras', $pid, $location );
	}

	echo '</div>';

}

/**
 * Tags
 *
 * @since 1.0.0
 */
function zeen_tags() {
	if ( get_theme_mod( 'single_tags', 1 ) == 1 && has_tag() ) {
		echo '<div class="post-tags footer-block-links clearfix">';
		echo '<div class="title">';
		esc_html_e( 'Tags', 'zeen' );
		echo '</div>';
		echo '<div class="block-elements">';
		the_tags( '', '', '' );
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Tags
 *
 * @since 3.3.0
 */
function zeen_source_via() {
	global $post;
	$els = array();
	$els['via'] = get_post_meta( $post->ID, 'zeen_via_block', true );
	$els['source'] = get_post_meta( $post->ID, 'zeen_source_block', true );
	$els = zeen_helper_md_array_clean( $els );
	if ( ! empty( $els ) ) {
		echo '<div class="source-via-wrap">';
		foreach ( $els as $el => $el_val ) {
			echo '<div class="source-via footer-block-links ';
			echo 'via' == $el ? 'via' : 'source';
			echo '">';
			echo '<div class="title">';
			if ( 'via' == $el ) {
				echo esc_html__( 'Via', 'zeen' ) . ' <i class="tipi-i-external-link"></i>';
			} else {
				echo esc_html__( 'Source', 'zeen' ) . ' <i class="tipi-i-link"></i>';
			}
			echo '</div>';
			echo '<div class="block-elements">';
			foreach ( $el_val as $key => $value ) {
				echo ! empty( $value['url'] ) ? '<a href="' . esc_url( $value['url'] ) . '" target="_blank" rel="noopener nofollow">' : '<span>';
				echo esc_attr( $value['title'] );
				echo ! empty( $value['url'] ) ? '</a>' : '</span>';
			}
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
	}

}

/**
 * Background Element
 *
 * @since 1.0.0
 */
function zeen_elem_bg_area( $location = '' ) {

	$fb = get_theme_mod( $location . '_skin_img' );

	if ( 'header' == $location ) {
		$skin = zeen_skin_style( 'header' );
		if ( 5 == $skin ) {
			$self = get_theme_mod( 'header_video_self' );
		} elseif ( 6 == $skin ) {
			$url = get_theme_mod( 'header_video_url' );
		}
		if ( 5 == $skin || 6 == $skin ) {
			$fb = get_theme_mod( 'header_video_fb' );
		}
	}
	if ( 'footer' == $location ) {
		$skin = zeen_skin_style( 'footer' );
		if ( 5 == $skin ) {
			$self = get_theme_mod( 'footer_video_self' );
		} elseif ( 6 == $skin ) {
			$url = get_theme_mod( 'footer_video_url' );
		}
		if ( 5 == $skin || 6 == $skin ) {
			$fb = get_theme_mod( 'footer_video_fb' );
		}
	}
	echo '<div class="background mask">';
	if ( ! empty( $self ) ) {
		$src = wp_get_attachment_url( $self );
		$format = substr( $src, -3 );
		echo '<video autoplay muted loop class="media-bg"><source data-src="' . esc_url( $src ) . '" type="video/' . esc_attr( $format ) . '"></video>';
	}
	if ( ! empty( $url ) ) {

		if ( strpos( $url, 'yout' ) !== false ) {
			$type = 'yt';
		} else {

			if ( substr( $url, 0, 2 ) == '<i' ) {
				preg_match( '/src="([^"]+)"/', $url, $matches );
				if ( ! empty( $matches[1] ) ) {
					return $matches[1];
				} else {
					return '';
				}
			} elseif ( substr( $url, 0, 1 ) == '[' ) {
				$url = do_shortcode( $url );
			}

			if ( strpos( $url, 'vim' ) !== false ) {
				$type = 'vim';
			} elseif ( strpos( $url, 'soundc' ) !== false ) {
				$type = 'sc';
			} else {
				$type = '';
			}
		}
		if ( 'vim' == $type ) {
			$url = substr( wp_parse_url( $url, PHP_URL_PATH ), 1 );
			$vid_url = add_query_arg(
				array(
					'autoplay' => 1,
					'muted' => 1,
					'loop' => 1,
					'portrait' => 0,
					'dnt' => 1,
					'byline' => 0,
					'background' => 1,
					'title' => 0,
				),
				'https://player.vimeo.com/video/' . $url
			);
		} elseif ( 'yt' == $type ) {
			preg_match( '([-\w]{11})', $url, $matches );
			if ( ! empty( $matches ) ) {
				$vid_url = add_query_arg( array(
					'autoplay' => 1,
					'mute' => 1,
					'rel' => 0,
					'controls' => 0,
					'loop' => 1,
					'showinfo' => 0,
					'playlist' => $matches[0],
					'modestbranding' => 1,
				), 'https://www.youtube-nocookie.com/embed/' . $matches[0] );
			}
		} else {
			$vid_url = $url;
		}
		echo '<iframe class="media-bg zeen-lazy-load skip-video" src="about:blank" data-lazy-src="' . esc_url( $vid_url ) . '" frameborder="0" seamless="seamless" allowfullscreen></iframe>';
	}

	if ( ! empty( $fb ) ) {
		add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
		echo wp_get_attachment_image( $fb, 'full' );
		remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
	}
	echo '</div>';
}

/**
 * Output extra styles
 *
 * @since 1.0.0
 */
function zeen_get_extra_style_admin() {
	$output = '';
	$headings = get_theme_mod( 'typo_headings', 1 );
	$body = get_theme_mod( 'typo_body', 2 );
	$font = array(
		1 => zeen_get_font( 1 ),
		2 => zeen_get_font( 2 ),
	);
	$font_1 = '';
	$font_2 = '';
	$blockquotes = (int) get_theme_mod( 'typo_blockquotes', 1 );
	$font_1 .= ( 2 !== $blockquotes ) ? ',.block-editor blockquote' : '';
	$font_2 .= ( 2 === $blockquotes ) ? ',.block-editor blockquote' : '';
	$font[3] = get_theme_mod( 'font_3_onoff', 1 ) == 1 ? zeen_get_font( 3 ) : $font[2];
	$output .= ".fontfam-1 { font-family: '" . esc_attr( $font[ $headings ]['font-family'] ) . "'" . esc_attr( $font[ $headings ]['category'] ) . "!important; }";

	$output .= '.editor-post-title__block .editor-post-title__input, .wp-block[data-type="core/heading"] h1, .wp-block[data-type="core/heading"] h2, .wp-block[data-type="core/heading"] h3, .wp-block[data-type="core/heading"] h4, .wp-block[data-type="core/heading"] h5, .editor-styles-wrapper .wp-block[data-type="zeen/block-inline-post"] .title' . esc_attr( $font_1 ) . ' {';
	$output .= zeen_font_css_props( $font[ $headings ] );
	$output .= '}';

	$output .= '.editor-styles-wrapper, .editor-styles-wrapper p' . esc_attr( $font_2 ) . ' { ' . zeen_font_css_props( $font[ $body ] ) . '; color:' . esc_attr( get_theme_mod( 'color_body', '#444' ) ) . '; }';
	$body_font_size   = get_theme_mod( 'font_size_body', zeen_customize_default( 'font_size_body' ) );
	$output .= '.block-editor-writing-flow {font-size: ' . (int) $body_font_size[ 'desktop' ] . 'px; }';
	$output .= '.block-editor blockquote * {color:' . sanitize_hex_color( get_theme_mod( 'color_blockquote', '#111' ) ) . '!important; }';
	return $output;
}

function zeen_font_css_props( $font, $important = '' ) {
	$output = '';
	$output .= "font-family: '" . esc_attr( $font['font-family'] ) . "'," . esc_attr( $font['category'], $font['font-fallback'] );
	if ( ! empty( $important ) ) {
		$output .= '!important';
	}
	$output .= ';';
	if ( ! empty( $font['font-weight'][0] ) ) {
		$output .= 'font-weight: ' . (int) $font['font-weight'][0] . ';';
	}
	$output .= 'italic' == $font['font-style'] ? 'font-style: italic;' : 'font-style: normal;';
	return $output;
}

/**
 * Output extra styles
 *
 * @since 1.0.0
 */
function zeen_get_extra_style() {

	$font_1 = zeen_get_font( 1 );
	$font_2 = zeen_get_font( 2 );
	$font_3 = get_theme_mod( 'font_3_onoff', 1 ) == 1 ? zeen_get_font( 3 ) : $font_2;
	$output = '';
	$header_style = zeen_get_style();
	$skins = array(
		array( 'customizer' => 'footer', 'selector' => '.site-footer', 'bg-area' => '.site-footer .bg-area-inner' ),
		array( 'customizer' => 'footer_widgets', 'selector' => '.footer-widget-bg-area', 'bg-area' => '.site-footer .footer-widget-bg-area' ),
		array( 'customizer' => 'lwa', 'selector' => '.content-lwa' ),
		array( 'customizer' => 'header', 'selector' => '.site-header' ),
		array( 'customizer' => 'sidebar', 'selector' => '.sidebar-wrap' ),
		array( 'customizer' => 'subscribe', 'selector' => '.content-subscribe' ),
		array( 'customizer' => 'slide', 'selector' => '.slide-in-menu' ),
		array( 'customizer' => 'mobile_header', 'selector' => '.site-mob-header' ),
		array( 'customizer' => 'mobile_menu', 'selector' => '.mob-menu-wrap' ),
		array( 'customizer' => 'single_subscribe_end', 'selector' => '.content-subscribe-block' ),
	);
	$breathing_bottom = get_theme_mod( 'classic_breathing_bot', 30 );
	$skin_base = get_theme_mod( 'skin', '#ffffff' );
	$output .= '.content-bg, .block-skin-5:not(.skin-inner), .block-skin-5.skin-inner > .tipi-row-inner-style, .article-layout-skin-1.title-cut-bl .hero-wrap .meta:before, .article-layout-skin-1.title-cut-bc .hero-wrap .meta:before, .article-layout-skin-1.title-cut-bl .hero-wrap .share-it:before, .article-layout-skin-1.title-cut-bc .hero-wrap .share-it:before, .standard-archive .page-header, .skin-dark .flickity-viewport, .zeen__var__options label { background: ' . sanitize_hex_color( $skin_base ) . ';}';
	$output .= zeen_critical_css();
	if ( class_exists( 'Lets_Review_API' ) ) {
		$review_color = zeen_lr_get_color();
		if ( ! empty( $review_color ) ) {
			$output .= '.lets-review__widget__design-1 .score-bar .score-overlay, .lets-review__widget__design-4 .cb-overlay { background: ' . esc_attr( $review_color ) . '!important}';
		}
	}
	$output .= '.to-top__fixed .to-top a{background-color:' . esc_attr( get_theme_mod( 'to_top_fixed_background', '#000000' ) ) . '; color: ' . esc_attr( get_theme_mod( 'to_top_fixed_color', '#fff' ) ) . '}';

	if ( '#fff' != $skin_base && '#ffffff' != $skin_base ) {
		$rgba_1 = zeen_hex_rgba( $skin_base );
		$rgba_2 = zeen_hex_rgba( $skin_base, 0 );
		$output .= '.article-layout-skin-1 .splitter--fade:before { background: linear-gradient(0, ' . esc_attr( $rgba_1 ) . ' 0%, ' . esc_attr( $rgba_2 ) . ' 100%); }';
		$output .= '.block-wrap-native .splitter--fade:before, .block-wrap-native .splitter--fade:after { background: linear-gradient(0, ' . esc_attr( $rgba_1 ) . ' 0%, rgba(0,0,0,0) 80%); }';
		$output .= '.splitter .shape--fill { fill: ' . sanitize_hex_color( $skin_base ) . ' }';
		if ( zeen_is_light( $skin_base ) == true ) {
			$skin_17 = zeen_color_manipulation( $skin_base, -17 );
			$output .= '.wpcf7-form-control.wpcf7-text, .wpcf7-form-control.wpcf7-text[type="text"], .wpcf7-form-control.wpcf7-text[type="email"], .wpcf7-form-control.wpcf7-textarea, .hero, .mask, .preview-grid .mask, .preview-slider .mask, .user-page-box { background: ' . sanitize_hex_color( $skin_17 ) . '; }';
		}
	}

	if ( is_singular() ) {
		global $post;
		$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
		$builder_data = get_post_meta( $post->ID, 'tipi_builder_data', true );
		if ( get_theme_mod( 'single_thumbs' ) == 1 ) {
			$thumbs_bg_color = '.zeen__up-down { background-color:' . esc_attr( get_theme_mod( 'single_thumbs_button_color', '#222' ) ) . '}';
			$output .= esc_attr( $thumbs_bg_color );
		}
	} elseif ( is_page() ) {
		$page_obj = get_queried_object();
		if ( ! empty( $page_obj->ID ) ) {
			$builder = get_post_meta( $page_obj->ID, 'tipi_builder_active', true );
			$builder_data = get_post_meta( $page_obj->ID, 'tipi_builder_data', true );
		}
	} elseif ( zeen_is_shop() ) {
		$pid = get_option( 'woocommerce_shop_page_id' );
		$builder = get_post_meta( $pid, 'tipi_builder_active', true );
		$builder_data = get_post_meta( $pid, 'tipi_builder_data', true );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$term_id = zeen_get_term_id();
		$builder = zeen_get_term_meta( 'tipi_builder_active', $term_id );
		$builder_data = zeen_get_term_meta( 'tipi_builder_data', $term_id );
		$color = zeen_term_color( $term_id );
		switch ( get_theme_mod( 'class_block_title_cat_color', 1 ) ) {
			case 2:
				$title_color = $color;
				break;
			case 3:
				$mid_line = $color;
				break;
			case 4:
				$bt = $color;
				break;
			case 5:
				$bb = $color;
				break;
			case 11:
				$title_color = $color;
				$mid_line = $color;
				$bt = $color;
				$bb = $color;
				break;
			default:
				break;
		}

		$output .= '#block-wrap-' . (int) $term_id . ' .tipi-row-inner-style{ ;';
		if ( ! empty( $bb ) || ! empty( $bt ) ) {
			if ( ! empty( $bb ) ) {
				$output .= 'border-bottom-color:' . esc_attr( $bb ) . ';';
			}
			if ( ! empty( $bt ) ) {
				$output .= 'border-top-color:' . esc_attr( $bt ) . ';';
			}
		}
		$output .= '}';

		if ( ! empty( $title_color ) ) {
			$output .= '#block-wrap-' . (int) $term_id . ' .block-title-area{ color: ' . esc_attr( $title_color ) . '}';
		}

		if ( ! empty( $mid_line ) ) {
			$output .= '#block-wrap-' . (int) $term_id . ' .block-title:after{ border-bottom-color: ' . esc_attr( $mid_line ) . '}';
		}
	}

	$background = zeen_get_bg();
	$bg_el = 'site-inner';
	if ( 2 == get_theme_mod( 'header_block_width', 1 ) && get_theme_mod( 'footer_reveal' ) != 1 ) {
		$bg_el = 'site';
	}

	if ( ! empty( $background['color'] ) ) {
		$output .= '.' . esc_attr( $bg_el ) . ' { background-color: ' . esc_attr( $background['color'] ) . '; }';
		$output .= '.splitter svg g { fill: ' . esc_attr( $background['color'] ) . '; }';
	}
	if ( ! empty( $background['image'] ) ) {
		$output .= '.' . esc_attr( $bg_el ) . ' { background-image: url( ' . esc_url( $background['image'] ) . ' ); }';
	}


	$button_classnames = 'input[type=submit], button, .tipi-button,.button,.wpcf7-submit,.button__back__home';
	$output .= '.inline-post .block article .title { font-size: ' . get_theme_mod( 'font_size_inline_post', 20 ) . 'px;}';
	$load_more_rounded = get_theme_mod( 'load_more_rounded', 1 );
	if ( 2 == $load_more_rounded ) {
		$output .= $button_classnames . '{ border-radius: 3px; }';
	} elseif ( 3 == $load_more_rounded ) {
		$output .= $button_classnames . '{ border-radius: 0; }';
	}

	$typo_input = get_theme_mod( 'typo_input', 1 );
	$typo_input_number = get_theme_mod( 'typo_input_number', 1 );
	$typo_buttons = get_theme_mod( 'typo_buttons', 2 );

	// FONT 1
	$output .= '.fontfam-1 { font-family: ' . zeen_sanitize_titles( zeen_font_family_output( $font_1 ) ) . '!important;}';
	if ( 1 == $typo_buttons ) {
		$output .= $button_classnames . ',';
	}
	if ( 1 == $typo_input ) {
		$output .= 'input,';
	}
	if ( 1 == $typo_input_number ) {
		$output .= 'input[type="number"],';
	}

	$output .= '.body-f1, .quotes-f1 blockquote, .quotes-f1 q, .by-f1 .byline, .sub-f1 .subtitle, .wh-f1 .widget-title, .headings-f1 h1, .headings-f1 h2, .headings-f1 h3, .headings-f1 h4, .headings-f1 h5, .headings-f1 h6, .font-1, div.jvectormap-tip {';
	$output .= 'font-family:' . zeen_sanitize_titles( zeen_font_family_output( $font_1 ) ) . ';';
	if ( ! empty( $font_1['font-weight'][0] ) ) {
		$output .= 'font-weight: ' . (int) $font_1['font-weight'][0] . ';';
	}
	$output .= 'italic' == $font_1['font-style'] ? 'font-style: italic;' : 'font-style: normal;';
	$output .= '}';

	// FONT 2
	$output .= '.fontfam-2 { font-family:' . zeen_sanitize_titles( zeen_font_family_output( $font_2 ) ) . '!important; }';

	if ( 2 == $typo_buttons ) {
		$output .= $button_classnames . ',';
	}
	if ( 2 == $typo_input ) {
		$output .= 'input,';
	}
	if ( 2 == $typo_input_number ) {
		$output .= 'input[type="number"],';
	}
	$output .= '.body-f2, .quotes-f2 blockquote, .quotes-f2 q, .by-f2 .byline, .sub-f2 .subtitle, .wh-f2 .widget-title, .headings-f2 h1, .headings-f2 h2, .headings-f2 h3, .headings-f2 h4, .headings-f2 h5, .headings-f2 h6, .font-2 {';
	$output .= 'font-family:' . zeen_sanitize_titles( zeen_font_family_output( $font_2 ) ) . ';';
	if ( ! empty( $font_2['font-weight'][0] ) ) {
		$output .= 'font-weight: ' . (int) $font_2['font-weight'][0] . ';';
	}
	$output .= 'italic' == $font_2['font-style'] ? 'font-style: italic;' : 'font-style: normal;';
	$output .= '}';

	// FONT 3
	$output .= '.fontfam-3 { font-family:' . zeen_sanitize_titles( zeen_font_family_output( $font_3 ) ) . '!important;}';
	if ( 3 == $typo_buttons ) {
		$output .= $button_classnames . ',';
	}
	if ( 3 == $typo_input ) {
		$output .= 'input,';
	}
	if ( 3 == $typo_input_number ) {
		$output .= 'input[type="number"],';
	}
	$output .= '.body-f3, .quotes-f3 blockquote, .quotes-f3 q, .by-f3 .byline, .sub-f3 .subtitle, .wh-f3 .widget-title, .headings-f3 h1, .headings-f3 h2, .headings-f3 h3, .headings-f3 h4, .headings-f3 h5, .headings-f3 h6, .font-3 {';
	$output .= 'font-family:' . zeen_sanitize_titles( zeen_font_family_output( $font_3 ) ) . ';';
	$output .= 'italic' == $font_3['font-style'] ? 'font-style: italic;' : 'font-style: normal;';

	if ( ! empty( $font_3['font-weight'][0] ) ) {
		$output .= 'font-weight: ' . (int) $font_3['font-weight'][0] . ';';
	}
	$output .= '}';
	$site_width = get_theme_mod( 'site_width', 1230 );
	$site_width_posts = get_theme_mod( 'site_width_posts', 1230 );
	$output .= '.tipi-row, .tipi-builder-on .contents-wrap > p { max-width: ' . (int) $site_width . 'px ; }';
	$output .= '.slider-columns--3 article { width: ' . ( ( ( (int) $site_width - 60 ) / 3 ) - 30 ) . 'px }';
	$output .= '.slider-columns--2 article { width: ' . ( ( ( (int) $site_width - 60 ) / 2 ) - 30 ) . 'px }';
	$output .= '.slider-columns--4 article { width: ' . ( ( ( (int) $site_width - 60 ) / 4 ) - 30 ) . 'px }';
	$output .= '.single .site-content .tipi-row { max-width: ' . (int) $site_width_posts . 'px ; }';
	$output .= '.single-product .site-content .tipi-row { max-width: ' . (int) $site_width . 'px ; }';
	$output .= '.date--secondary { color: ' . sanitize_hex_color( get_theme_mod( 'current_date_color', '#f8d92f' ) ) . '; }';
	$output .= '.date--main { color: ' . sanitize_hex_color( get_theme_mod( 'main_menu_date_color', '#f8d92f' ) ) . '; }';

	$ctas = array( 'header', 'mobile_menu', 'mobile_menu_secondary' );
	foreach ( $ctas as $cta_k ) {
		if ( get_theme_mod( $cta_k . '_cta' ) != 1 ) {
			continue;
		}
		$hover_off = 'header' != $cta_k;
		$output .= '.tipi-button-cta-' . $cta_k . '{ font-size:' . (int) get_theme_mod( $cta_k . '_cta_font_size', 12 ) . 'px;}';
		$output .= '.tipi-button-cta-wrap-' . $cta_k . '{ color: ' . sanitize_hex_color( get_theme_mod( $cta_k . '_cta_color_text', '#fff' ) ) . ';}';
		if ( get_theme_mod( $cta_k . '_cta_fill', 1 ) == 2 ) {
			$output .= '.custom-button__fill-2.tipi-button-cta-' . $cta_k . ' { border-color: ' . sanitize_hex_color( get_theme_mod( $cta_k . '_cta_bg', '#18181e' ) ) . '; color: ' . sanitize_hex_color( get_theme_mod( $cta_k . '_cta_bg', '#18181e' ) ) . '; }';
			if ( empty( $hover_off ) ) {
				$output .= '.custom-button__fill-2.tipi-button-cta-' . $cta_k . ':hover { border-color: ' . sanitize_hex_color( get_theme_mod( $cta_k . '_cta_color_hover', '#111' ) ) . '; }';
			}
		} else {
			$output .= '.tipi-button-cta-' . $cta_k . ' { background: ' . sanitize_hex_color( get_theme_mod( $cta_k . '_cta_bg', '#18181e' ) ) . '; }';
			if ( empty( $hover_off ) ) {
				$output .= '.tipi-button-cta-' . $cta_k . ':hover { background: ' . sanitize_hex_color( get_theme_mod( $cta_k . '_cta_color_hover', '#111' ) ) . '; }';
			}
		}
	}

	$output .= '.global-accent-border { border-color: ' . sanitize_hex_color( get_theme_mod( 'global_color', '#f7d40e' ) ) . '; }';
	$output .= '.trending-accent-border { border-color: ' . sanitize_hex_color( get_theme_mod( 'trending_color', '#f7d40e' ) ) . '; }';
	$output .= '.trending-accent-bg { border-color: ' . sanitize_hex_color( get_theme_mod( 'trending_color', '#f7d40e' ) ) . '; }';
	if ( get_theme_mod( 'load_more_fill', 1 ) == 2 ) {
		$output .= '.custom-button__fill-2.tipi-button.block-loader { border-color: ' . sanitize_hex_color( get_theme_mod( 'load_more_bg', '#18181e' ) ) . '; color: ' . sanitize_hex_color( get_theme_mod( 'load_more_bg', '#18181e' ) ) . '; }';
		$output .= '.custom-button__fill-2.tipi-button.block-loader:hover { border-color: ' . sanitize_hex_color( get_theme_mod( 'load_more_color_hover', '#111' ) ) . '; }';
	} else {
		$output .= '.wpcf7-submit, .tipi-button.block-loader { background: ' . sanitize_hex_color( get_theme_mod( 'load_more_bg', '#18181e' ) ) . '; }';
		$output .= '.wpcf7-submit:hover, .tipi-button.block-loader:hover { background: ' . sanitize_hex_color( get_theme_mod( 'load_more_color_hover', '#111' ) ) . '; }';
	}
	$types = array( 'grid', 'slider', 'classic' );
	for ( $x = 0; $x < 3; $x++ ) {
		if ( get_theme_mod( $types[ $x ] . '_read_more_customize' ) ) {
			$output .= '.preview-' . $types[ $x ] . ' .read-more.tipi-button { color: ' . sanitize_hex_color( get_theme_mod( $types[ $x ] . '_read_more_color_text', '#fff' ) ) . '!important; }';
			if ( get_theme_mod( $types[ $x ] . '_read_more_fill', 1 ) == 2 ) {
				$output .= '.preview-' . $types[ $x ] . ' .custom-button__fill-2 { border-color: ' . sanitize_hex_color( get_theme_mod( $types[ $x ] . '_read_more_bg', '#18181e' ) ) . '; color: ' . sanitize_hex_color( get_theme_mod( $types[ $x ] . '_read_more_bg', '#18181e' ) ) . '; }';
				$output .= '.preview-' . $types[ $x ] . ':hover .custom-button__fill-2 { border-color: ' . sanitize_hex_color( get_theme_mod( $types[ $x ] . '_read_more_color_hover', '#111' ) ) . '; }';
			} else {
				$output .= '.preview-' . $types[ $x ] . ' .read-more { background: ' . sanitize_hex_color( get_theme_mod( $types[ $x ] . '_read_more_bg', '#18181e' ) ) . '; }';
				$output .= '.preview-' . $types[ $x ] . ':hover .read-more { background: ' . sanitize_hex_color( get_theme_mod( $types[ $x ] . '_read_more_color_hover', '#111' ) ) . '; }';
			}
		}
	}
	$output .= '.tipi-button.block-loader { color: ' . sanitize_hex_color( get_theme_mod( 'load_more_color_text', '#fff' ) ) . '!important; }';
	$output .= '.wpcf7-submit { background: ' . sanitize_hex_color( get_theme_mod( 'contact_button_color', '#18181e' ) ) . '; }';
	$output .= '.wpcf7-submit:hover { background: ' . sanitize_hex_color( get_theme_mod( 'contact_button_color_hover', '#111' ) ) . '; }';
	$output .= '.global-accent-bg, .icon-base-2:hover .icon-bg, #progress { background-color: ' . sanitize_hex_color( get_theme_mod( 'global_color', '#f7d40e' ) ) . '; }';
	$output .= '.global-accent-text, .mm-submenu-2 .mm-51 .menu-wrap > .sub-menu > li > a { color: ' . sanitize_hex_color( get_theme_mod( 'global_color', '#f7d40e' ) ) . '; }';
	$output .= 'body { color:' . sanitize_hex_color( get_theme_mod( 'color_body', '#444' ) ) . ';}';
	$output .= '.excerpt { color:' . sanitize_hex_color( get_theme_mod( 'color_excerpt', '#444' ) ) . ';}';
	$output .= '.mode--alt--b .excerpt, .block-skin-2 .excerpt, .block-skin-2 .preview-classic .custom-button__fill-2 { color:' . sanitize_hex_color( get_theme_mod( 'color_excerpt_dark_mode', '#888' ) ) . '!important;}';
	$output .= '.read-more-wrap { color:' . sanitize_hex_color( get_theme_mod( 'color_read_more', '#767676' ) ) . ';}';
	$output .= '.logo-fallback a { color:' . sanitize_hex_color( get_theme_mod( 'color_logo_text', '#000' ) ) . '!important;}';
	$output .= '.site-mob-header .logo-fallback a { color:' . sanitize_hex_color( get_theme_mod( 'color_logo_mobile_text', '#000' ) ) . '!important;}';

	$output .= 'blockquote:not(.comment-excerpt) { color:' . sanitize_hex_color( get_theme_mod( 'color_blockquote', '#111' ) ) . ';}';
	$output .= '.mode--alt--b blockquote:not(.comment-excerpt), .mode--alt--b .block-skin-0.block-wrap-quote .block-wrap-quote blockquote:not(.comment-excerpt), .mode--alt--b .block-skin-0.block-wrap-quote .block-wrap-quote blockquote:not(.comment-excerpt) span { color:' . sanitize_hex_color( get_theme_mod( 'color_blockquote_dark_mode', '#fff' ) ) . '!important;}';

	$output .= '.byline, .byline a { color:' . sanitize_hex_color( get_theme_mod( 'color_byline', '#888' ) ) . ';}';
	$output .= '.mode--alt--b .block-wrap-classic .byline, .mode--alt--b .block-wrap-classic .byline a, .mode--alt--b .block-wrap-thumbnail .byline, .mode--alt--b .block-wrap-thumbnail .byline a, .block-skin-2 .byline a, .block-skin-2 .byline { color:' . sanitize_hex_color( get_theme_mod( 'color_byline_dark_mode', '#888' ) ) . ';}';
	$output .= '.preview-classic .meta .title, .preview-thumbnail .meta .title,.preview-56 .meta .title{ color:' . sanitize_hex_color( get_theme_mod( 'color_block_post_title', '#111' ) ) . ';}';
	$output .= 'h1, h2, h3, h4, h5, h6, .block-title { color:' . sanitize_hex_color( get_theme_mod( 'color_heading', '#111' ) ) . ';}';
	$output .= '.sidebar-widget  .widget-title { color:' . sanitize_hex_color( get_theme_mod( 'color_widget_title', '#111' ) ) . '!important;}';
	$underline_link = get_theme_mod( 'un_link' );
	if ( $underline_link > 1 ) {
		$underline_link_color = 3 == $underline_link ? 'transparent' : get_theme_mod( 'un_link_color', '#f2ce2f' );
		$output .= '.link-color-wrap p > a, .link-color-wrap p > em a, .link-color-wrap p > strong a {
			text-decoration: underline; text-decoration-color: ' . esc_attr( $underline_link_color ) . '; text-decoration-thickness: ' . (int) get_theme_mod( 'un_link_height', 2 ) . 'px; text-decoration-style:' . esc_attr( get_theme_mod( 'un_link_style', 'solid' ) ) . '}';
		if ( 3 == $underline_link ) {
			$output .= '.link-color-wrap p > a:hover, .link-color-wrap p > em a:hover, .link-color-wrap p > strong a:hover { text-decoration-color: ' . esc_attr( get_theme_mod( 'un_link_color', '#f2ce2f' ) ) . '}';
		}
	}
	$output .= '.link-color-wrap a, .woocommerce-Tabs-panel--description a { color: ' . sanitize_hex_color( get_theme_mod( 'color_link', '#333' ) ) . '; }';
	$output .= '.mode--alt--b .link-color-wrap a, .mode--alt--b .woocommerce-Tabs-panel--description a { color: ' . sanitize_hex_color( get_theme_mod( 'color_link_dark_mode', '#888' ) ) . '; }';
	$output .= '.copyright, .site-footer .bg-area-inner .copyright a { color: ' . sanitize_hex_color( get_theme_mod( 'color_copyright', '#8e8e8e' ) ) . '; }';
	$output .= '.link-color-wrap a:hover { color: ' . sanitize_hex_color( get_theme_mod( 'color_link_hover', '#000' ) ) . '; }';
	$output .= '.mode--alt--b .link-color-wrap a:hover { color: ' . sanitize_hex_color( get_theme_mod( 'color_link_dark_mode_hover', '#555' ) ) . '; }';

	$output .= zeen_font_sizes( 'mobile' );

	if ( get_theme_mod( 'bold_read_more' ) == 1 ) {
		$output .= '.meta .read-more-wrap { font-weight: 700;}';
	}

	if ( get_theme_mod( 'bold_buttons', 1 ) == 1 ) {
		$output .= '.tipi-button.block-loader, .wpcf7-submit, .mc4wp-form-fields button { font-weight: 700;}';
	}
	if ( get_theme_mod( 'italic_subtitle' ) == 1 ) {
		$output .= '.subtitle {font-style:italic!important;}';
	}
	if ( get_theme_mod( 'italic_blockquotes' ) == 1 ) {
		$output .= 'blockquote {font-style:italic;}';
	}
	if ( get_theme_mod( 'bold_main_menu', 1 ) == 1 ) {
		$output .= '.main-navigation .horizontal-menu, .main-navigation .menu-item, .main-navigation .menu-icon .menu-icon--text,  .main-navigation .tipi-i-search span { font-weight: 700;}';
	}
	if ( get_theme_mod( 'bold_secondary_menu', 1 ) == 1 ) {
		$output .= '.secondary-wrap .menu-secondary li, .secondary-wrap .menu-item, .secondary-wrap .menu-icon .menu-icon--text {font-weight: 700;}';
	}
	if ( get_theme_mod( 'bold_footer_menu', 1 ) == 1 ) {
		$output .= '.footer-lower-area, .footer-lower-area .menu-item, .footer-lower-area .menu-icon span {font-weight: 700;}';
	}
	if ( get_theme_mod( 'bold_widget_title', 1 ) == 1 ) {
		$output .= '.widget-title {font-weight: 700!important;}';
	}
	if ( get_theme_mod( 'bold_xs_typo' ) == 1 ) {
		$output .= '.tipi-xs-typo .title {font-weight: 700;}';
	}

	$tt = array(
		array( 'entry' => 'tt_buttons', 'class' => $button_classnames . '', 'default' => 1 ),
		array( 'entry' => 'tt_inner_post_title', 'class' => '.entry-title', 'default' => '' ),
		array( 'entry' => 'tt_logo_text', 'class' => '.logo-fallback', 'default' => '' ),
		array( 'entry' => 'tt_slider_post_title', 'class' => '.block-wrap-slider .title-wrap .title', 'default' => '' ),
		array( 'entry' => 'tt_grid_post_title', 'class' => '.block-wrap-grid .title-wrap .title, .tile-design-4 .meta .title-wrap .title', 'default' => '' ),
		array( 'entry' => 'tt_classic_post_title', 'class' => '.block-wrap-classic .title-wrap .title', 'default' => '' ),
		array( 'entry' => 'tt_block_main_title', 'class' => '.block-title', 'default' => '' ),
		array( 'entry' => 'tt_read_more', 'class' => '.meta .excerpt .read-more', 'default' => 1 ),
		array( 'entry' => 'tt_grid_read_more', 'class' => '.preview-grid .read-more', 'default' => 1 ),
		array( 'entry' => 'tt_block_main_subtitle', 'class' => '.block-subtitle', 'default' => '' ),
		array( 'entry' => 'tt_byline', 'class' => '.byline', 'default' => '' ),
		array( 'entry' => 'tt_widget_title', 'class' => '.widget-title', 'default' => '' ),
		array( 'entry' => 'tt_main_menu', 'class' => '.main-navigation .menu-item, .main-navigation .menu-icon .menu-icon--text', 'default' => 1 ),
		array( 'entry' => 'tt_secondary_menu', 'class' => '.secondary-navigation, .secondary-wrap .menu-icon .menu-icon--text', 'default' => 1 ),
		array( 'entry' => 'tt_footer_menu', 'class' => '.footer-lower-area .menu-item, .footer-lower-area .menu-icon span', 'default' => 1 ),
		array( 'entry' => 'tt_submenu', 'class' => '.sub-menu a:not(.tipi-button)', 'default' => '' ),
		array( 'entry' => 'tt_mob_header', 'class' => '.site-mob-header .menu-item, .site-mob-header .menu-icon span', 'default' => 1 ),
		array( 'entry' => 'tt_heading', 'class' => '.single-content .entry-content h1, .single-content .entry-content h2, .single-content .entry-content h3, .single-content .entry-content h4, .single-content .entry-content h5, .single-content .entry-content h6, .meta__full h1, .meta__full h2, .meta__full h3, .meta__full h4, .meta__full h5, .bbp__thread__title', 'default' => '' ),
	);

	foreach ( $tt as $key ) {
		if ( get_theme_mod( $key['entry'], $key['default'] ) == 1 ) {
			$output .= esc_attr( $key['class'] ) . '{ text-transform: uppercase; }';
		} else {
			$output .= esc_attr( $key['class'] ) . '{ text-transform: none; }';
		}
	}

	$output .= '.mm-submenu-2 .mm-11 .menu-wrap > *, .mm-submenu-2 .mm-31 .menu-wrap > *, .mm-submenu-2 .mm-21 .menu-wrap > *, .mm-submenu-2 .mm-51 .menu-wrap > *  { border-top: ' . (int) ( get_theme_mod( 'dropdown_top_bar_height', 3 ) ) . 'px solid transparent; }';

	$output .= '.separation-border { margin-bottom: ' . (int) $breathing_bottom . 'px; }';
	$output .= '.load-more-wrap-1 { padding-top: ' . (int) $breathing_bottom . 'px; }';
	$output .= '.block-wrap-classic .inf-spacer + .block:not(.block-62) { margin-top: ' . (int) $breathing_bottom . 'px; }';
	if ( get_theme_mod( 'masonry_design', 1 ) == 2 ) {
		$masonry_bg = get_theme_mod( 'masonry_background_color', '#eee' );
		$masonry_17 = zeen_color_manipulation( $masonry_bg, -17 );
		$output .= '.block-masonry-style article .preview-mini-wrap { background: ' . sanitize_hex_color( $masonry_bg ) . ';}';
		$output .= '.block-masonry-style article .preview-mini-wrap .mask { background: ' . sanitize_hex_color( $masonry_17 ) . ';}';

		$output .= '.block-masonry-style article .meta { padding: ' . (int) get_theme_mod( 'masonry_whitespace', 15 ) . 'px;padding-top:0;}';
		$output .= '.block-masonry-style article .meta, .block-masonry-style article .meta a, .block-masonry-style article .meta .excerpt { color: ' . get_theme_mod( 'masonry_text_color', '#222' ) . ';}';
	}
	$classic_bottom_border_onoff = get_theme_mod( 'classic_bottom_border_onoff' );
	if ( ! empty( $classic_bottom_border_onoff ) ) {
		$output .= '.separation-border-style { border-bottom: ' . (int) get_theme_mod( 'classic_bottom_border_width' ) . 'px ' . sanitize_hex_color( get_theme_mod( 'classic_bottom_border_color' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'classic_bottom_border_style', 'solid' ) ) . ';padding-bottom:' . (int) ( get_theme_mod( 'classic_bottom_border_padding', 30 ) ) . 'px;}';
	}

	$footer_top_border_onoff = get_theme_mod( 'footer_top_border_onoff' );
	if ( ! empty( $footer_top_border_onoff ) ) {
		$output .= '#colophon .bg-area-inner { border-top: ' . (int) get_theme_mod( 'footer_top_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'footer_top_border_color' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'footer_top_border_style', 'solid' ) ) . ';}';
	}

	$classic_title_bottom_border_onoff = get_theme_mod( 'classic_title_bottom_border_onoff' );
	if ( ! empty( $classic_title_bottom_border_onoff ) ) {
		$output .= '.block-title-wrap-style .block-title-area { border-bottom: ' . (int) get_theme_mod( 'classic_title_bottom_border_width' ) . 'px ' . sanitize_hex_color( get_theme_mod( 'classic_title_bottom_border_color', '#eee' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'classic_title_bottom_border_style', 'solid' ) ) . ';}';
	}

	$classic_title_top_border_onoff = get_theme_mod( 'classic_title_top_border_onoff' );
	if ( ! empty( $classic_title_top_border_onoff ) ) {
		$output .= '.block-title-wrap-style .block-title-area { border-top: ' . (int) get_theme_mod( 'classic_title_top_border_width' ) . 'px ' . sanitize_hex_color( get_theme_mod( 'classic_title_top_border_color', '#eee' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'classic_title_top_border_style', 'solid' ) ) . ';}';
	}

	$classic_title_line_onoff = get_theme_mod( 'classic_title_line_onoff', 1 );
	if ( ! empty( $classic_title_line_onoff ) ) {
		$line_height = get_theme_mod( 'classic_title_line_width', 1 );
		$output .= '.block-title-wrap-style .block-title:after, .block-title-wrap-style .block-title:before { border-top: ' . (int) $line_height . 'px ' . get_theme_mod( 'classic_title_line_color', '#eee' ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'classic_title_line_style', 'solid' ) ) . ';}';
		if ( $line_height > 1 ) {
			$block_title_mt = $line_height / 2;
			$output .= '.block-title-wrap-style .block-title:after, .block-title-wrap-style .block-title:before { margin-top: -' . (int) ( $block_title_mt + 1 ) . 'px;}';
		}
	}

	$masonry_border = get_theme_mod( 'masonry_borders', 1 );
	if ( 1 == $masonry_border ) {
		$masonry_border_color = get_theme_mod( 'masonry_border_color', '#eee' );
		$output .= '.separation-border-v { background: ' . sanitize_hex_color( $masonry_border_color ) . ';}';
		$output .= '.separation-border-v { height: calc( 100% -  ' . (int) $breathing_bottom . 'px - 1px); }';
	}

	// 480 DOWN START
	$output .= '@media only screen and (max-width: 480px) {';
	if ( $breathing_bottom > 45 ) {
		$output .= '.separation-border:not(.split-1){margin-bottom:' . (int) ( $breathing_bottom * 0.75 ) . 'px;}';
	}
	if ( ! empty( $classic_bottom_border_onoff ) ) {
		$output .= '.separation-border-style { padding-bottom: 15px; }.separation-border { margin-bottom: 15px;}';
	} else {
		$output .= '.separation-border { margin-bottom: 30px;}';
	}
	$output .= '}';

	$grid_spacing_tiles = get_theme_mod( 'grid_spacing_tiles', 0 );
	if ( $grid_spacing_tiles > 0 ) {
		$output .= '.grid-spacing { border-top-width: ' . (int) $grid_spacing_tiles . 'px; }';
	}

	$output .= '.sidebar-wrap .sidebar { padding-right: ' . (int) get_theme_mod( 'sidebar_padding_right', 30 ) . 'px; padding-left: ' . (int) get_theme_mod( 'sidebar_padding_left', 30 ) . 'px; padding-top:' . (int) get_theme_mod( 'sidebar_padding_top', 0 ) . 'px; padding-bottom:' . (int) get_theme_mod( 'sidebar_padding_bottom', 0 ) . 'px; }';

	$output .= '.sidebar-left .sidebar-wrap .sidebar { padding-right: ' . (int) get_theme_mod( 'sidebar_padding_left', 30 ) . 'px; padding-left: ' . (int) get_theme_mod( 'sidebar_padding_right', 30 ) . 'px; }';
	// 481 START
	$output .= '@media only screen and (min-width: 481px) {';
	if ( $grid_spacing_tiles > 0 ) {
		$output .= '.block-wrap-grid .block-title-area, .block-wrap-98 .block-piece-2 article:last-child { margin-bottom: -' . (int) ( $grid_spacing_tiles ) . 'px; }';
		$output .= '.block-wrap-92 .tipi-row-inner-box { margin-top: -' . (int) $grid_spacing_tiles . 'px; }';
		$output .= '.block-wrap-grid .only-filters { top: ' . (int) $grid_spacing_tiles . 'px; }';
	}
	if ( $grid_spacing_tiles > 0 ) {
		$border_rtl = is_rtl() ? 'left' : 'right';
		$output .= '.grid-spacing { border-' . $border_rtl . '-width: ' . (int) $grid_spacing_tiles . 'px; }';
		if ( $grid_spacing_tiles > 5 ) {
			$output .= '.block-fs {padding:' . (int) $grid_spacing_tiles . 'px;}';
		}
		$output .= '.block-wrap-grid:not(.block-wrap-81) .block { width: calc( 100% + ' . (int) $grid_spacing_tiles . 'px ); }';
	}

	$slider_spacing_tiles = get_theme_mod( 'slider_spacing_tiles', 0 );
	if ( $slider_spacing_tiles > 0 ) {
		$output .= '.slider-spacing { margin-right: ' . (int) $slider_spacing_tiles . 'px;}';
	}
	$output .= '}';
	// 481 END

	$main_menu_pad_top = get_theme_mod( 'main_menu_padding_top', 15 );
	$main_menu_pad_bot = get_theme_mod( 'main_menu_padding_bottom', 15 );
	$header_pad_top = get_theme_mod( 'header_padding_top', 30 );
	$header_pad_bot = get_theme_mod( 'header_padding_bottom', 30 );

	// 767D START
	$output .= '@media only screen and (max-width: 767px) {';
	$classic_split = zeen_get_theme_mod( 'classis_split_img_width' );
	$output .= '.mobile__design--side .mask {
		width: calc( ' . (int) $classic_split['tablet'] . '% - 15px);
	}';
	$output .= '}';

	// 768 START
	$output .= '@media only screen and (min-width: 768px) {';
	$output .= zeen_font_sizes( 'tablet' );
	$output .= zeen_critical_css( 'tablet' );
	$customize_sticky = get_theme_mod( 'sticky_header_customize' );
	if ( ! empty( $customize_sticky ) ) {
		$output .= '.sticky-header--active.site-header.size-set .logo img, .site-header.size-set.slidedown .logo img, .site-header.size-set.sticky-menu-2.stuck .logo img { height: ' . (int) get_theme_mod( 'sticky_header_logo_height', 40 ) . 'px!important; }';
		$output .= '.sticky-header--active.site-header .bg-area, .site-header.sticky-menu-2.stuck .bg-area, .site-header.slidedown .bg-area, .main-navigation.stuck .menu-bg-area, .sticky-4-unfixed .header-skin-4.site-header .bg-area { background: ' . esc_attr( get_theme_mod( 'sticky_header_bg', 'rgba(255,255,255,0.9)' ) ) . '; }';
	} else {
		if ( abs( $main_menu_pad_top - $main_menu_pad_bot ) >= 5 && 72 != $header_style && 73 != $header_style && 74 != $header_style ) {
			$stuck_pad = $main_menu_pad_bot < $main_menu_pad_top ? $main_menu_pad_bot : $main_menu_pad_top;
			$output .= '.main-navigation.stuck .horizontal-menu > li > a {
				padding-top: ' . (int) $stuck_pad . 'px;
				padding-bottom: ' . (int) $stuck_pad . 'px;
			}';
		}
	}

	$mm = get_theme_mod( 'megamenu_skin', 2 );
	if ( 4 == $mm ) {
		$mm_color = get_theme_mod( 'megamenu_skin_color', '#fff' );
		$mm_bg = get_theme_mod( 'megamenu_skin_background', '#111' );
		$output .= '.mm-skin-4 .mm-art .menu-wrap, .mm-skin-4 .sub-menu, .trending-inline-drop .block-wrap, .trending-inline-drop, .trending-inline.dropper:hover { background: ' . esc_attr( $mm_bg ) . '; }';
		$output .= '.mm-skin-4 .mm-art .menu-wrap .block-wrap:not(.tile-design-4):not(.classic-title-overlay) a, .mm-skin-4 .sub-menu a, .mm-skin-4 .dropper .block-title-area .block-title, .mm-skin-4 .dropper .block-title-area .block-title a, .mm-skin-4 .mm-art .tipi-arrow, .mm-skin-4 .drop-it article .price, .trending-inline-drop .trending-inline-wrap .block article a, .trending-inline-drop, .trending-inline.dropper:hover a { color: ' . esc_attr( $mm_color ) . '; }';
		$output .= '.mm-skin-4 .mm-art .tipi-arrow, .trending-inline-drop .trending-selected { border-color: ' . esc_attr( $mm_color ) . '; }';
		$output .= '.mm-skin-4 .mm-art .tipi-arrow i:after { background: ' . esc_attr( $mm_color ) . '; }';
	}
	$contrast = 0;

	if ( get_theme_mod( 'logo_main' ) != '' ) {
		$contrast = $header_pad_bot + $header_pad_top + 50;
	}
	if ( has_nav_menu( 'main' ) && $header_style < 72 ) {
		$contrast = $main_menu_pad_top + $main_menu_pad_bot + 20 + $contrast;
	}
	$output .= '.title-contrast .hero-wrap { height: calc( 100vh - ' . (int) $contrast . 'px ); }';
	$thumbnail_title_size = zeen_get_theme_mod( 'font_size_thumbnail_blocks_title' );
	$byline_size = zeen_get_theme_mod( 'font_size_byline' );
	if ( $byline_size['desktop'] > $thumbnail_title_size['desktop'] ) {
		$output .= '.tipi-xs-typo .byline  { font-size: ' . (int) ( $thumbnail_title_size['desktop'] * 0.8 ) . 'px; }';
	}
	$base_block_title = zeen_get_theme_mod( 'font_size_classic_blocks_title' );
	if ( $base_block_title['desktop'] < 22 ) {
		$output .= '.tipi-s-typo .title, .ppl-s-3 .tipi-s-typo .title, .zeen-col--wide .ppl-s-3 .tipi-s-typo .title, .preview-1 .title, .preview-21:not(.tipi-xs-typo) .title  { line-height: 1.3333;}';
	}
	if ( $base_block_title['desktop'] > 20 ) {
		$output .= '.block-col-self .block-71 .tipi-s-typo .title { font-size: 18px; }';
	}
	if ( $base_block_title['desktop'] < 20 && get_theme_mod( 'grid_font_size_override' ) != 1 ) {
		$output .= '.preview-grid.tipi-s-typo .title { font-size: ' . (int) round( $base_block_title['desktop'] * 1.2 ) . 'px; }';
	}

	$large_block_post_title = zeen_get_theme_mod( 'font_size_classic_blocks_title_l' );
	if ( $large_block_post_title['desktop'] > 18 ) {
		$output .= '.zeen-col--narrow .block-wrap-classic .tipi-m-typo .title-wrap .title { font-size: 18px; }';
	}

	if ( get_theme_mod( 'footer_widgets_border_onoff', 1 ) == 1 ) {
		$output .= '.mode--alt--b .footer-widget-area:not(.footer-widget-area-1) + .footer-lower-area { border-top:' . get_theme_mod( 'footer_widgets_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'footer_widgets_border_color', '#333333' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'footer_widgets_border_style', 'solid' ) ) . ' ; }';
		$output .= '.footer-widget-wrap { border-right:' . get_theme_mod( 'footer_widgets_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'footer_widgets_border_color', '#333333' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'footer_widgets_border_style', 'solid' ) ) . ' ; }';
		$output .= '.footer-widget-wrap .widget_search form, .footer-widget-wrap select { border-color:' . sanitize_hex_color( get_theme_mod( 'footer_widgets_border_color', '#333333' ) ) . '; }';
		$output .= '.footer-widget-wrap .zeen-widget { border-bottom:' . get_theme_mod( 'footer_widgets_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'footer_widgets_border_color', '#333333' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'footer_widgets_border_style', 'solid' ) ) . ' ; }';
		$output .= '.footer-widget-wrap .zeen-widget .preview-thumbnail { border-bottom-color: ' . sanitize_hex_color( get_theme_mod( 'footer_widgets_border_color', '#333333' ) ) . ';}';
	}

	if ( $header_style > 80 ) {
		$header_side_width = get_theme_mod( 'header_side_width', 80 );
		$header_80_pad = 'padding-left';
		if ( 82 == $header_style ) {
			$header_80_pad = 'padding-right';
		}
		$header_side_width_768 = $header_side_width > 200 ? 200 : $header_side_width;
		$output .= '.next-prev__prev {left: ' . (int) $header_side_width_768 . 'px; }';
		$output .= '.secondary-wrap-v { width: ' . (int) $header_side_width_768 . 'px; }';
		$output .= '.body-with-v .site { ' . esc_attr( $header_80_pad ) . ': ' . (int) $header_side_width_768 . 'px; }';
		if ( 82 == $header_style ) {
			$output .= '.body-with-v .zeen-top-block .block-wrap { ' . esc_attr( $header_80_pad ) . ': ' . (int) $header_side_width_768 . 'px; }';
		}
	} elseif ( $header_style > 70 ) {
		$floating_side_menu_width = get_theme_mod( 'floating_side_menu', 80 );
		if ( $floating_side_menu_width > 0 ) {
			$output .= '.secondary-wrap-v { width: ' . (int) $floating_side_menu_width . 'px; }';
			if ( get_theme_mod( 'secondary_menu_side_enable', 1 ) == 1 ) {
				$output .= '.header-width-2 .header-side-padding, .tipi-builder-on .tipi-fs, .standard-archive, .header-width-2 .drop-it .block-wrap, .header-width-2 .trending-inline-drop .trending-inline-title { padding-left: ' . (int) $floating_side_menu_width . 'px; padding-right:' . (int) $floating_side_menu_width . 'px; }';
			}
		}
	} else {
		$output .= '.secondary-wrap .menu-padding, .secondary-wrap .ul-padding > li > a {
			padding-top: ' . (int) ( get_theme_mod( 'secondary_menu_padding_top', 10 ) ) . 'px;
			padding-bottom: ' . (int) ( get_theme_mod( 'secondary_menu_padding_bottom', 10 ) ) . 'px;
		}';
	}

	$output .= '}';
	// 768 END

	if ( ! empty( $builder ) ) {
		$output .= TipiBuilder\ZeenHelpers::zeen_style( $builder_data, 'm' );
	}
	if ( ! empty( $builder ) ) {
		$dt_cutoff = is_customize_preview() || \TipiBuilder\ZeenHelpers::zeen_frame_call() ? 1019 : 1239;
		$output .= '@media only screen and (max-width: ' . (int) $dt_cutoff . 'px) {';
		$output .= TipiBuilder\ZeenHelpers::zeen_style( $builder_data, '1239d' );
		$output .= '}';
	}
	if ( ! empty( $builder ) ) {
		$output .= '@media only screen and (max-width: 767px) {';
		$output .= TipiBuilder\ZeenHelpers::zeen_style( $builder_data, '767d' );
		$output .= '}';
	}
	if ( ! empty( $builder ) ) {
		$output .= '@media only screen and (min-width: 768px) {';
		$output .= TipiBuilder\ZeenHelpers::zeen_style( $builder_data, 't' );
		$output .= '}';
	}
	$desktop_width = is_customize_preview() || \TipiBuilder\ZeenHelpers::zeen_frame_call() ? 1020 : 1240;
	// 1240 START
	$output .= '@media only screen and (min-width: ' . (int) $desktop_width . 'px) {';
	$output .= zeen_critical_css( 'desktop' );
	$global_border = get_theme_mod( 'global_border_width' );
	if ( ! empty( $global_border ) ) {
		$output .= 'body{ border:' . (int) $global_border . 'px ' . sanitize_hex_color( get_theme_mod( 'global_border_color', '#FBE610' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'global_border_style', 'solid' ) ) . ';}';
	}
	if ( ! empty( $builder ) ) {
		$output .= TipiBuilder\ZeenHelpers::zeen_style( $builder_data, 'dt' );
	}
	$bg_ad = zeen_get_bg_ad();
	if ( ! empty( $bg_ad ) ) {
		if ( ! empty( $bg_ad['image'] ) ) {
			$output .= '.' . esc_attr( $bg_el ) . ' { background-image: url( ' . esc_url( $bg_ad['image'] ) . ' ); }';
		}
		if ( ! empty( $bg_ad['top_spacing'] ) ) {
			$output .= '.' . esc_attr( $bg_el ) . ' { padding-top: ' . (int) $bg_ad['top_spacing'] . 'px; }';
		}
	}

	if ( $header_style > 80 && $header_side_width > 200 ) {
		$output .= '.next-prev__prev {left: ' . (int) $header_side_width . 'px; }';
		$output .= '.secondary-wrap-v { width: ' . (int) $header_side_width . 'px; }';
		$output .= '.body-with-v .site { ' . esc_attr( $header_80_pad ) . ': ' . (int) $header_side_width . 'px; }';
		if ( 82 == $header_style ) {
			$output .= '.body-with-v .zeen-top-block .block-wrap { ' . esc_attr( $header_80_pad ) . ': ' . (int) $header_side_width . 'px; }';
		}
	}
	if ( $site_width_posts <= 1230 ) {
		$output .= '.align-fs .contents-wrap .video-wrap, .align-fs-center .aligncenter.size-full, .align-fs-center .wp-caption.aligncenter .size-full, .align-fs-center .tiled-gallery, .align-fs .alignwide { width: ' . (int) ( $site_width_posts - 60 ) . 'px; }';
		$output .= '.align-fs .contents-wrap .video-wrap { height: ' . (int) ( ( $site_width_posts - 60 ) * 0.5625 ) . 'px; }';

		$output .= '.has-bg .align-fs .contents-wrap .video-wrap, .has-bg .align-fs .alignwide, .has-bg .align-fs-center .aligncenter.size-full, .has-bg .align-fs-center .wp-caption.aligncenter .size-full, .has-bg .align-fs-center .tiled-gallery { width: ' . (int) $site_width_posts . 'px; }';
		$output .= '.has-bg .align-fs .contents-wrap .video-wrap { height: ' . (int) ( $site_width_posts * 0.5625 ) . 'px; }';
	}

	$output .= zeen_font_sizes( 'desktop' );
	$output .= '}';
	// 1240 END

	$output .= '.main-menu-bar-color-1 .current-menu-item > a, .main-menu-bar-color-1 .menu-main-menu > .dropper.active:not(.current-menu-item) > a { background-color: ' . esc_attr( get_theme_mod( 'menu_accent', '#111' ) ) . ';}';
	if ( $byline_size['desktop'] > 12 ) {
		$output .= '.cats .cat-with-bg, .byline-1 .comments { font-size:0.8em; }';
	}

	$output .= '.site-header a { color: ' . sanitize_hex_color( get_theme_mod( 'main_menu_color', '#111' ) ) . '; }';

	$output .= '.site-skin-3.content-subscribe, .site-skin-3.content-subscribe .subtitle, .site-skin-3.content-subscribe input, .site-skin-3.content-subscribe h2 { color: ' . sanitize_hex_color( get_theme_mod( 'subscribe_color', '#fff' ) ) . '; } .site-skin-3.content-subscribe input[type="email"] { border-color: ' . sanitize_hex_color( get_theme_mod( 'subscribe_color', '#fff' ) ) . '; }';

	if ( get_theme_mod( 'mobile_menu_skin', 1 ) > 2 ) {
		$output .= '.mob-menu-wrap a { color: ' . sanitize_hex_color( get_theme_mod( 'mobile_menu_color', '#fff' ) ) . '; }';
		$output .= '.mob-menu-wrap .mobile-navigation .mobile-search-wrap .search { border-color: ' . sanitize_hex_color( get_theme_mod( 'mobile_menu_color', '#fff' ) ) . '; }';
	}

	if ( get_theme_mod( 'footer_widgets_border_onoff', 1 ) == 1 ) {
		$output .= '.footer-widget-wrap .widget_search form { border-color:' . sanitize_hex_color( get_theme_mod( 'footer_widgets_border_color', '#333' ) ) . '; }';
	}

	if ( get_theme_mod( 'sidebar_border_onoff', 1 ) == 1 ) {
		$output .= '.sidebar-wrap .sidebar { border:' . (int) get_theme_mod( 'sidebar_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'sidebar_border_color', '#ddd' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'sidebar_border_style', 'solid' ) ) . ' ; }';
	}

	if ( get_theme_mod( 'sidebar_widgets_border_onoff', 1 ) == 1 ) {
		$border_width = get_theme_mod( 'sidebar_widgets_border_width', 1 ) . 'px';
		$border_width = 1 == get_theme_mod( 'sidebar_widgets_border_bottom', 1 ) ? '0 0 ' . $border_width . ' 0' : $border_width;
		$output .= '.content-area .zeen-widget { border: 0 ' . sanitize_hex_color( get_theme_mod( 'sidebar_widgets_border_color', '#ddd' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'sidebar_widgets_border_style', 'solid' ) ) . ' ; border-width: ' . esc_attr( $border_width ) . '; }';
	}

	$output .= '.content-area .zeen-widget { padding:' . (int) get_theme_mod( 'sidebar_widgets_padding_top', 30 ) . 'px ' . get_theme_mod( 'sidebar_widgets_padding_lr', 0 ) . 'px ' . (int) get_theme_mod( 'sidebar_widgets_padding_bottom', 30 ) . 'px; }';
	if ( get_theme_mod( 'sidebar_widgets_skin', 4 ) != 4 ) {
		$output .= '.content-area .zeen-widget{ margin-bottom:' . (int) get_theme_mod( 'sidebar_widgets_spacing' ) . 'px; }';
	}

	$output .= zeen_overlay();

	if ( get_theme_mod( 'logo_subtitle_main' ) != '' ) {
		$output .= '.logo-main .logo-subtitle { color: ' . sanitize_hex_color( get_theme_mod( 'logo_subtitle_main_color', '#111' ) ) . '; }';
	}
	if ( get_theme_mod( 'logo_subtitle_footer' ) != '' ) {
		$output .= '.logo-footer .logo-subtitle { color: ' . sanitize_hex_color( get_theme_mod( 'logo_subtitle_footer_color', '#111' ) ) . '; }';
	}
	foreach ( $skins as $key ) {
		$sanitize_options[] = $key['selector'];
	}

	foreach ( $skins as $key ) {
		$default = 1;
		$default_color = '#fff';
		$sanitize_options = array();
		if ( 'footer' == $key['customizer'] ) {
			$default = 2;
		} elseif ( 'footer_widgets' == $key['customizer'] ) {
			$default = 3;
			$default_color = '#dddede';
		} elseif ( 'post_end_subscribe' == $key['customizer'] ) {
			$default = 3;
			$default_color = '#dddede';
		}
		if ( zeen_skin_style( $key['customizer'], 'skin', $default ) == 3 ) {

			$skin_img = get_theme_mod( $key['customizer'] . '_skin_img' );
			$skin_color = get_theme_mod( $key['customizer'] . '_skin_color', '#272727' );

			if ( ! empty( $skin_color ) ) {
				$skin_color_b = get_theme_mod( $key['customizer'] . '_skin_color_b' );
				$key['selector'] = empty( $key['bg-area'] ) ? $key['selector'] . ' .bg-area' : $key['bg-area'];
				if ( 'header' == $key['customizer'] && $header_style > 80 ) {
					$key['selector'] = '.site-header-side';
				}

				if ( empty( $skin_color_b ) || $skin_color == $skin_color_b ) {
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ', ' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .woo-product-rating span, ' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .stack-design-3 .meta { background-color: ' . esc_attr( $skin_color ) . '; }';
				} else {
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' { background-image: linear-gradient(130deg, ' . esc_attr( $skin_color ) . ' 0%, ' . esc_attr( $skin_color_b ) . ' 80%);  }';
				}
				if ( 'sidebar' == $key['customizer'] || 'footer_widgets' == $key['customizer'] ) {
					if ( zeen_is_light( $skin_color ) == true ) {
						$sidebar_17 = zeen_color_manipulation( $skin_color, -17 );
						$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .widget_search form, ' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .widget_product_search form, ' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .lwa-input-wrap input { border-color: ' . sanitize_hex_color( $sidebar_17 ) . '; }';
						$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .zeen-checkbox label .zeen-i { background: ' . sanitize_hex_color( $sidebar_17 ) . '; }';
						if ( 'sidebar' == $key['customizer'] ) {
							$output .= '.article-layout-skin-1 .user-page-box, .skin-light .user-page-box { background: ' . sanitize_hex_color( $skin_color ) . '; }';
						}
					}
				}
			}
			if ( ! empty( $skin_img ) ) {
				if ( ! is_numeric( $skin_img ) ) {
					$skin_img = attachment_url_to_postid( $skin_img );
					set_theme_mod( $key['customizer'] . '_skin_img', $skin_img );
				}

				$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .background { opacity: ' . floatval( get_theme_mod( $key['customizer'] . '_skin_img_transparency', 1 ) ) . '; }';
			} else {
				$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .background { background-image: none; opacity: 1; }';
			}

			if ( 'footer' == $key['customizer'] ) {
				$output .= '.footer-lower-area { color: ' . sanitize_hex_color( get_theme_mod( 'footer_color', '#fff' ) ) . '; }';
				$output .= '.to-top-2 a { border-color: ' . sanitize_hex_color( get_theme_mod( 'footer_color', '#fff' ) ) . '; }';
				$output .= '.to-top-2 i:after { background: ' . sanitize_hex_color( get_theme_mod( 'footer_color', '#fff' ) ) . '; }';
			} elseif ( 'sidebar' == $key['customizer'] ) {
				$output .= '.site-skin-3 .sidebar:not(.sidebar-own-bg) { color: ' . sanitize_hex_color( get_theme_mod( 'sidebar_color', '#fff' ) ) . '; }';
			}
		}

		if ( zeen_skin_style( $key['customizer'], 'skin', $default ) == 3 || zeen_skin_style( $key['customizer'] ) == 4 ) {
			$font_color = get_theme_mod( $key['customizer'] . '_color', $default_color );
			if ( 'slide' == $key['customizer'] ) {
				$output .= '.slide-in-menu,' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' a,' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .widget-title, .slide-in-menu .cb-widget-design-1 .cb-score { color:' . esc_attr( $font_color ) . '; }';
				$output .= '.slide-in-menu form { border-color:' . esc_attr( $font_color ) . '; }';
				$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .mc4wp-form-fields input[type="email"], #subscribe-submit input[type="email"], .subscribe-wrap input[type="email"],' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .mc4wp-form-fields input[type="text"], #subscribe-submit input[type="text"], .subscribe-wrap input[type="text"] { border-bottom-color:' . esc_attr( $font_color ) . '; }';
			} elseif ( 'header' != $key['customizer'] ) {
				if ( 'sidebar' == $key['customizer'] ) {
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .load-more-wrap .tipi-arrow { border-color:' . esc_attr( $font_color ) . '; color:' . esc_attr( $font_color ) . '; }';
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .load-more-wrap .tipi-arrow i:after { background:' . esc_attr( $font_color ) . '; }';
				} elseif ( 'mobile_header' == $key['customizer'] ) {
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .tipi-i-menu-mob, .site-mob-menu-a-4.mob-open .tipi-i-menu-mob:before, .site-mob-menu-a-4.mob-open .tipi-i-menu-mob:after { background:' . esc_attr( $font_color ) . '; }';
				} elseif ( 'footer_widgets' == $key['customizer'] ) {
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .block-skin-0 .tipi-arrow { color:' . esc_attr( $font_color ) . '; border-color:' . esc_attr( $font_color ) . '; }';
					$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .block-skin-0 .tipi-arrow i:after{ background:' . esc_attr( $font_color ) . '; }';
				}
				$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ',' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .byline,' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' a,' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .widget_search form *,' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' h3,' . zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .widget-title { color:' . esc_attr( $font_color ) . '; }';
				$output .= zeen_sanitizer_options( $key['selector'], $sanitize_options ) . ' .tipi-spin.tipi-row-inner-style:before { border-color:' . esc_attr( $font_color ) . '; }';
			}
		}
	}
	// Main Menu
	$output .= '.main-navigation, .main-navigation .menu-icon--text { color: ' . get_theme_mod( 'main_menu_color', '#1e1e1e' ) . '; }';
	$output .= '.main-navigation .horizontal-menu>li>a { padding-left: ' . (int) ( get_theme_mod( 'main_menu_padding_sides', '12' ) ) . 'px; padding-right: ' . (int) ( get_theme_mod( 'main_menu_padding_sides', '12' ) ) . 'px; }';
	if ( get_theme_mod( 'main_menu_padding_sides', '12' ) > 15 ) {
		$output .= '.main-navigation .menu-icons>li>a{ padding-left: 12px;	padding-right: 12px;}';
	}

	if ( get_theme_mod( 'main_menu_skin', 1 ) == 3 ) {
		$skin_color_b = get_theme_mod( 'main_menu_skin_color_b' );
		if ( empty( $skin_color_b ) ) {
			$output .= '.main-navigation .menu-bg-area { background-color: ' . sanitize_hex_color( get_theme_mod( 'main_menu_skin_color' ) ) . '; }';
		} else {
			$output .= '.main-navigation .menu-bg-area { background-image: linear-gradient(130deg, ' . esc_attr( get_theme_mod( 'main_menu_skin_color' ) ) . ' 0%, ' . esc_attr( $skin_color_b ) . ' 80%);  }';
		}
	}

	$main_menu_border_bot = get_theme_mod( 'main_menu_bottom_border_width', 3 );
	$main_menu_border_top = get_theme_mod( 'main_menu_top_border_width', 1 );
	if ( $main_menu_border_bot > 0 ) {
		$output .= '.main-navigation-border { border-bottom:' . (int) $main_menu_border_bot . 'px ' . sanitize_hex_color( get_theme_mod( 'main_menu_bottom_border_color', '#0a0a0a' ) ) . ' ' . zeen_sanitizer_border_type( zeen_sanitizer_border_type( get_theme_mod( 'main_menu_bottom_border_style', 'solid' ) ) ) . ' ; }';
		$output .= '.main-navigation-border .drop-search { border-top:' . (int) $main_menu_border_bot . 'px ' . sanitize_hex_color( get_theme_mod( 'main_menu_bottom_border_color', '#0a0a0a' ) ) . ' ' . zeen_sanitizer_border_type( zeen_sanitizer_border_type( get_theme_mod( 'main_menu_bottom_border_style', 'solid' ) ) ) . ' ; }';
		$output .= '#progress {bottom: 0;height: ' . (int) $main_menu_border_bot . 'px; }.sticky-menu-2:not(.active) #progress  { bottom: -' . (int) $main_menu_border_bot . 'px;  }';
	}
	if ( get_theme_mod( 'secondary_menu_borders' ) == 1 ) {
		$output .= '.secondary-wrap .menu-bg-area { border-bottom:' . (int) get_theme_mod( 'secondary_menu_bottom_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'secondary_menu_bottom_border_color', '#eee' ) ) . ' ' . zeen_sanitizer_border_type( zeen_sanitizer_border_type( get_theme_mod( 'secondary_menu_bottom_border_style', 'solid' ) ) ) . ' ; border-top: ' . (int) get_theme_mod( 'secondary_menu_top_border_width', 1 ) . 'px ' . sanitize_hex_color( get_theme_mod( 'secondary_menu_top_border_color', '#eee' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'secondary_menu_top_border_style', 'solid' ) ) . ' ; }';
	}
	if ( is_single() ) {
		$cat = zeen_get_cats( $post->ID, array( 'try_primary' => true ) );
		$cid = isset( $cat[0]->term_id ) ? $cat[0]->term_id : '';
		$category_color = zeen_term_color( $cid );
		$output .= '#progress { background-color: ' . sanitize_hex_color( $category_color ) . '; }';
	}

	if ( ! empty( $main_menu_border_top ) ) {
		$output .= '.main-navigation-border { border-top: ' . (int) $main_menu_border_top . 'px ' . sanitize_hex_color( get_theme_mod( 'main_menu_top_border_color', '#eee' ) ) . ' ' . zeen_sanitizer_border_type( get_theme_mod( 'main_menu_top_border_style', 'solid' ) ) . ' ; }';
	}
	if ( 72 != $header_style && 73 != $header_style && 74 != $header_style ) {
		$output .= '.main-navigation .horizontal-menu .drop, .main-navigation .horizontal-menu > li > a, .date--main {
			padding-top: ' . (int) $main_menu_pad_top . 'px;
			padding-bottom: ' . (int) $main_menu_pad_bot . 'px;
		}';
	}

	// Mobile Menu
	$mobile_header_fs = get_theme_mod( 'mobile_header_menu_font_size', '13' );
	$output .= '.site-mob-header .menu-icon { font-size: ' . (int) $mobile_header_fs . 'px; }';
	if ( $mobile_header_fs > 14 ) {
		$output .= '.site-mob-header .tipi-i-menu-mob { width: ' . (int) $mobile_header_fs . 'px; }';
		$distance = 5 + ( ( $mobile_header_fs - 13 ) / 2 );
		$output .= '.site-mob-header .tipi-i-menu-mob:before {top: -' . floor( $distance ) . 'px;}';
		$output .= '.site-mob-header .tipi-i-menu-mob:after {top: ' . floor( $distance ) . 'px;}';
	}

	// Secondary Menu
	if ( get_theme_mod( 'secondary_menu_skin', 1 ) == 3 ) {
		$skin_color_b = get_theme_mod( 'secondary_menu_skin_color_b' );
		if ( empty( $skin_color_b ) ) {
			$output .= '.secondary-wrap .menu-bg-area { background-color: ' . sanitize_hex_color( get_theme_mod( 'secondary_menu_skin_color' ) ) . '; }';
		} else {
			$output .= '.secondary-wrap .menu-bg-area { background-image: linear-gradient(130deg, ' . esc_attr( get_theme_mod( 'secondary_menu_skin_color' ) ) . ' 0%, ' . esc_attr( $skin_color_b ) . ' 80%);  }';
		}
	}
	$output .= '.secondary-wrap-v .standard-drop>a,.secondary-wrap, .secondary-wrap a, .secondary-wrap .menu-icon--text { color: ' . sanitize_hex_color( get_theme_mod( 'secondary_menu_color', '#fff' ) ) . '; }';
	$output .= '.secondary-wrap .menu-secondary > li > a, .secondary-icons li > a { padding-left: ' . (int) ( get_theme_mod( 'secondary_menu_padding_sides', '7' ) ) . 'px; padding-right: ' . (int) ( get_theme_mod( 'secondary_menu_padding_sides', '7' ) ) . 'px; }';

	$output .= '.mc4wp-form-fields input[type=submit], .mc4wp-form-fields button, #subscribe-submit input[type=submit], .subscribe-wrap input[type=submit] {';
	$subscribe_button_b = get_theme_mod( 'subscribe_button_color_b' );

		$output .= 'color: ' . esc_attr( get_theme_mod( 'subscribe_button_font_color', '#fff' ) ) . ';';
	if ( empty( $subscribe_button_b ) ) {
		$output .= 'background-color: ' . esc_attr( get_theme_mod( 'subscribe_button_color', '#121212' ) ) . ';';
	} else {
		$output .= 'background-image: linear-gradient(130deg, ' . esc_attr( get_theme_mod( 'subscribe_button_color', '#121212' ) ) . ' 0%, ' . esc_attr( $subscribe_button_b ) . ' 80%);';
	}
	$output .= '}';

	$output .= '.site-mob-header:not(.site-mob-header-11) .header-padding .logo-main-wrap, .site-mob-header:not(.site-mob-header-11) .header-padding .icons-wrap a, .site-mob-header-11 .header-padding {
		padding-top: ' . (int) get_theme_mod( 'mobile_header_padding_top', 20 ) . 'px;
		padding-bottom: ' . (int) get_theme_mod( 'mobile_header_padding_bottom', 20 ) . 'px;
	}';

	$output .= '.site-header .header-padding {
		padding-top:' . (int) $header_pad_top . 'px;
		padding-bottom:' . (int) $header_pad_bot . 'px;
	}';

	if ( get_theme_mod( 'header_sticky_onoff', 1 ) == 1 && ! empty( $customize_sticky ) ) {
		$sticky_pad_top = get_theme_mod( 'sticky_header_padding_top', 30 );
		$sticky_pad_bot = get_theme_mod( 'sticky_header_padding_bottom', 30 );
		$output .= '.site-header.sticky-menu-2.stuck .header-padding, .site-header.slidedown .header-padding, .sticky-header--active.site-header .header-padding, .main-navigation.stuck .horizontal-menu > li > a { padding-top: ' . (int) $sticky_pad_top . 'px; padding-bottom: ' . (int) $sticky_pad_bot . 'px; }';
	}

	if ( 58 == $header_style ) {
		$header_style = get_theme_mod( 'header_style', 1 );
	}
	if ( 11 == $header_style ) {
		$output .= '.site-header-11 .menu { border-top-width: ' . (int) ( get_theme_mod( 'header_padding_bottom', 30 ) + 3 ) . 'px;}';
	}

	if ( get_theme_mod( 'sliding_global' ) == 1 ) {
		$bg = get_theme_mod( 'sliding_global_bg' );
		$output .= '.subscribe-wrap, .subscribe-wrap .content div { color: ' . sanitize_hex_color( get_theme_mod( 'sliding_global_font_color', '#fff' ) ) . '; }';
		if ( ! empty( $bg ) ) {
			$output .= '.slide-in-box:not(.slide-in-2) { background-image: url(' . esc_url( $bg ) . '); }';
		}
	}

	// Woo
	$output .= zeen_woo_style();

	// bbPress
	if ( zeen_bbp_active() ) {
		if ( get_theme_mod( 'bbpress_show_tags' ) != 1 ) {
			$output .= '.bbp-topic-tags { display: none; }';
		}
	}
	$logo_set_dimensions = apply_filters( 'zeen_logo_set_dimensions', '' );
	if ( ! empty( $logo_set_dimensions ) ) {
		if ( ! empty( $logo_set_dimensions['header']['width'] ) && ! empty( $logo_set_dimensions['header']['height'] ) ) {
			$output .= '.site-header .logo img { width:' . $logo_set_dimensions['header']['width'] . '; height:' . $logo_set_dimensions['header']['height'] . ';}';
		}
	}

	return $output;
}

function zeen_woo_style() {
	if ( ! zeen_woo_active() ) {
		return;
	}
	$output = '';
	$output .= '.cart .button, .woocommerce .button { background: ' . sanitize_hex_color( get_theme_mod( 'add_to_cart_background', '#111' ) ) . '}';
	$output .= '.onsale { background: ' . sanitize_hex_color( get_theme_mod( 'sale_background', '#d61919' ) ) . '}';
	if ( is_product() ) {
		global $post;
		$pid = $post->ID;
		$hero_color = zeen_woo_hero_color( $pid );
		if ( ! empty( $hero_color ) ) {
			$output .= '.post-' . (int) $pid . ' .single_product_summary { background-color:' . esc_attr( $hero_color['hero_color'] ) . ';}';
			$output .= '.post-' . (int) $pid . ' .single_product_summary .summary .cart .quantity, .post-' . (int) $pid . ' .single_product_summary .summary .cart .zeen_color_type input[type="radio"]:not(.radio--disabled):checked + label, .post-' . (int) $pid . ' .single_product_summary .summary .cart .zeen_image_type input[type="radio"]:not(.radio--disabled):checked + label { border-color:' . esc_attr( $hero_color['input_border'] ) . ';}';
			if ( ! empty( $hero_color['input_bg'] ) ) {
				$output .= '.post-' . (int) $pid . ' .single_product_summary .summary .cart .quantity, .post-' . (int) $pid . '.product .share-it-11 a { background-color:' . esc_attr( $hero_color['input_bg'] ) . ';}';
			}
			if ( ! empty( $hero_color['input_color'] ) ) {
				$output .= '.post-' . (int) $pid . ' .single_product_summary .summary .cart .quantity *, .post-' . (int) $pid . '.product .share-it-11 a { color:' . esc_attr( $hero_color['input_color'] ) . ';}';
			} else {
				$output .= '.post-' . (int) $pid . '.product .share-it-11 a { color:inherit;}';
			}
		}
	}
	return $output;
}

function zeen_woo_hero_color( $pid = '' ) {
	if ( empty( $pid ) ) {
		global $post;
		$pid = $post->ID;
	}
	$hero = zeen_get_product_design();
	$output = array();
	$hero_color_inherit = get_post_meta( $pid, 'zeen_hero_design', true );
	if ( ! empty( $hero_color_inherit ) && 99 != $hero_color_inherit && 1 != $hero['hero'] ) {
		$hero_color_onoff = get_post_meta( $pid, 'zeen_hero_color', true );
		if ( 99 == $hero_color_onoff || empty( $hero_color_onoff ) ) {
			if ( get_theme_mod( 'woo_product_hero_bg_onoff' ) == 1 ) {
				$hero_color = get_theme_mod( 'woo_product_hero_bg', '#fff' );
				$text_color = get_theme_mod( 'woo_product_hero_text_color', 2 );
				$input_bg = get_theme_mod( 'woo_product_hero_input_bg', '#fff' );
				$input_border = get_theme_mod( 'woo_product_hero_input_border', '#f2f2f2' );
				$input_color = get_theme_mod( 'woo_product_hero_input_color', '#111' );
			}
		} elseif ( 1 == $hero_color_onoff ) {
			$hero_color = get_post_meta( $pid, 'zeen_overlay', true );
			$text_color = get_post_meta( $pid, 'zeen_hero_text_color', true );
			$input_bg = get_post_meta( $pid, 'zeen_inputs_bg', true );
			$input_border = get_post_meta( $pid, 'zeen_inputs_border', true );
			$input_color = get_post_meta( $pid, 'zeen_inputs_color', true );
		}
		if ( 2 != $hero_color_onoff ) {
			if ( ! empty( $hero_color ) ) {
				$output['hero_color'] = $hero_color;
				$output['input_bg'] = $input_bg;
				$output['input_border'] = $input_border;
				$output['input_color'] = $input_color;
				$output['text_color'] = empty( $text_color ) ? 2 : $text_color;
			}
		}
	}
	return $output;
}

function zeen_overlay() {
	$output = '';

	$options = array( 'grid', 'slider' );

	foreach ( $options as $key ) {
		$title_onoff = get_theme_mod( $key . '_title_bg_onoff' );
		$image_onoff = get_theme_mod( $key . '_img_overlay_onoff', 1 );
		if ( 1 == $title_onoff ) {
			if ( get_theme_mod( $key . '_title_bg', 2 ) == 2 ) {
				$a = get_theme_mod( $key . '_title_gradient_a' ) != '' ? get_theme_mod( $key . '_title_gradient_a' ) : 'rgba(0,0,0,0)';
				$b = get_theme_mod( $key . '_title_gradient_b' ) != '' ? get_theme_mod( $key . '_title_gradient_b' ) : 'rgba(0,0,0,0)';
				$output .= '.' . zeen_sanitizer_options( $key, $options ) . '-meta-bg .mask:before { content: ""; background-image: linear-gradient(to top, ' . esc_attr( $a ) . ' 0%, ' . esc_attr( $b ) . ' 100%); }';
			} else {
				$output .= '.' . zeen_sanitizer_options( $key, $options ) . '-meta-bg .meta { background-color: ' . esc_attr( get_theme_mod( $key . '_title_solid' ) ) . ' ; }';
			}
		}

		if ( 1 == $image_onoff ) {
			if ( get_theme_mod( $key . '_img_overlay' ) == 2 ) {
				if ( 'slider' == $key ) {
					$output .= '.slider-image-2 .mask-overlay { background-image: linear-gradient(130deg, ' . esc_attr( get_theme_mod( $key . '_gradient_1_a', 'rgba(238,9,121,0.6)' ) ) . ' 0%, ' . esc_attr( get_theme_mod( $key . '_gradient_1_b', 'rgba(255,106,0,0.3)' ) ) . ' 80%); }';
				} else {
					for ( $i = 1; $i < 7; $i++ ) {
						if ( 1 == $i ) {
							$a = get_theme_mod( $key . '_gradient_' . $i . '_a', 'rgba(238,9,121,0.6)' );
							$backup_a = $a;
							$b = get_theme_mod( $key . '_gradient_' . $i . '_b', 'rgba(255,106,0,0.3)' );
							$backup_b = $b;
						} else {
							$a = get_theme_mod( $key . '_gradient_' . $i . '_a' );
							$b = get_theme_mod( $key . '_gradient_' . $i . '_b' );
							$a = empty( $a ) ? $backup_a : $a;
							$b = empty( $b ) ? $backup_b : $b;
						}
						$output .= '.' . zeen_sanitizer_options( $key, $options ) . '-image-2.loop-' . ( $i - 1 ) . ' .mask-overlay { background-image: linear-gradient(130deg, ' . esc_attr( $a ) . ' 0%, ' . esc_attr( $b ) . ' 80%); }';
					}
				}
			} else {
				$output .= '.' . zeen_sanitizer_options( $key, $options ) . '-image-1 .mask-overlay { background-color: ' . esc_attr( get_theme_mod( $key . '_img_overlay_solid', '#1a1d1e' ) ) . ' ; }';
			}
		}
		$title_color = get_theme_mod( $key . '_title_color', '#fff' );
		$title_color_hover = get_theme_mod( $key . '_title_color_hover', '#fff' );
		$img_overlay = get_theme_mod( $key . '_img_overlay_opacity', 0.2 );
		$img_overlay_hover = get_theme_mod( $key . '_img_overlay_opacity_hover', 0.6 );
		$preview_name = 'slider' == $key ? 'slider-overlay' : $key;
		$output .= '.with-fi.preview-' . esc_attr( $preview_name ) . ',.with-fi.preview-' . esc_attr( $preview_name ) . ' .byline,.with-fi.preview-' . esc_attr( $preview_name ) . ' .subtitle, .with-fi.preview-' . esc_attr( $preview_name ) . ' a { color: ' . $title_color . '; }';
		$output .= '.preview-' . esc_attr( $preview_name ) . ' .mask-overlay { opacity: ' . floatval( $img_overlay ) . ' ; }';
		$output .= '@media (pointer: fine) {';
		if ( $title_color_hover != $title_color ) {
			$output .= '.with-fi.preview-' . esc_attr( $preview_name ) . ':hover, .with-fi.preview-' . esc_attr( $preview_name ) . ':hover .byline,.with-fi.preview-' . esc_attr( $preview_name ) . ':hover .subtitle, .with-fi.preview-' . esc_attr( $preview_name ) . ':hover a { color: ' . $title_color_hover . '; }';
		}
		if ( $img_overlay != $img_overlay_hover ) {
			$output .= '.preview-' . esc_attr( $preview_name ) . ':hover .mask-overlay { opacity: ' . floatval( $img_overlay_hover ) . ' ; }';
		}
		$output .= '}';
	}
	if ( get_theme_mod( 'top_bar_message' ) == 1 ) {
		$output .= '.top-bar-message { background: ' . sanitize_hex_color( get_theme_mod( 'top_bar_message_bg', '#F96854' ) ) . '; color: ' . sanitize_hex_color( get_theme_mod( 'top_bar_message_font_color', '#fff' ) ) . '; padding:' . (int) get_theme_mod( 'top_bar_message_content_spacing', 15 ) . 'px;}';
	}

	return $output;
}

function zeen_critical_css( $type = 'mobile' ) {
	$output = '';
	if ( 'tablet' == $type ) {
		$output = '.layout-side-info .details{width:130px;float:left}';
	} elseif ( 'desktop' == $type ) {
		$output = '.hero-l .single-content {padding-top: 45px}';
	} else {
		$output .= 'a.zeen-pin-it{position: absolute}';
		$output .= '.background.mask {background-color: transparent}';
		$output .= '.side-author__wrap .mask a {display:inline-block;height:70px}';
		$output .= '.timed-pup,.modal-wrap {position:fixed;visibility:hidden}';
	}
	return $output;
}

function zeen_font_family_output( $font = '' ) {
	if ( strpos( $font['font-family'], ',' ) !== false ) {
		$output = html_entity_decode( $font['font-family'], ENT_QUOTES );
	} else {
		$output = "'" . $font['font-family'] . "'";
	}
	if ( strpos( $font['font-family'], ', sans-serif' ) === false && strpos( $font['font-family'], ', serif' ) === false && ! empty( $font['font-fallback'] ) ) {
		$output .= 1 == $font['font-fallback'] ? ',sans-serif' : ',serif';
	}
	if ( ! empty( $font['category'] ) ) {
		$output .= ',' . $font['category'];
	}
	return $output;
}

/**
 * Background
 *
 * @since 1.0.0
 */
function zeen_get_bg( $global = '' ) {
	$output = array();
	$output['color'] = get_theme_mod( 'global_background_color', '#fff' );
	$output['image'] = get_theme_mod( 'global_background_img' );
	if ( ! empty( $global ) ) {
		return $output;
	}

	if ( zeen_is_archive() ) {
		$term_id = zeen_get_term_id();
	} elseif ( is_single() ) {
		global $post;
		$hero = zeen_get_hero_design( $post->ID );
		if ( 31 == $hero['hero_design'] ) {
			$background = array(
				'color' => get_post_meta( $post->ID, 'zeen_background_color', true ),
			);
		} else {
			$cats = get_the_category( $post->ID );
			$term_id = empty( $cats[0]->term_id ) ? '' : $cats[0]->term_id;
		}
	} elseif ( is_page() ) {
		global $post;
		$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$background = get_post_meta( $post->ID, 'zeen_background', true );
		}
	} elseif ( zeen_is_shop() ) {
		$pid = get_option( 'woocommerce_shop_page_id' );
		$builder = get_post_meta( $pid, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$background = get_post_meta( $pid, 'zeen_background', true );
		}
	}

	if ( ! empty( $term_id ) ) {
		$background = get_term_meta( $term_id, 'zeen_background', true );
	}

	if ( ! empty( $background ) ) {
		if ( ! empty( $background['color'] ) ) {
			$output['color'] = $background['color'];
			$output['image'] = '';
		}
		if ( ! empty( $background['src'] ) ) {
			$output['image'] = $background['src'];
		}
	}

	return $output;
}

function zeen_get_bg_ad() {
	$output = array();
	$bg_ad = get_theme_mod( 'bg_ad' );
	if ( ! empty( $bg_ad ) ) {
		if ( get_theme_mod( 'bg_ad_only_hp' ) != 1 || ( get_theme_mod( 'bg_ad_only_hp' ) == 1 && is_front_page() ) ) {
			$bg_ad_img = get_theme_mod( 'bg_ad_img' );
			$bg_ad_url = get_theme_mod( 'bg_ad_url' );
			$bg_ad_top_spacing = get_theme_mod( 'bg_ad_spacing' );
			if ( ! empty( $bg_ad_img ) ) {
				$output['image'] = $bg_ad_img;
				if ( ! empty( $bg_ad_url ) ) {
					$output['url'] = $bg_ad_url;
				}
				$output['top_spacing'] = $bg_ad_top_spacing;
			}
		}
	}
	return $output;
}
/**
 * Background repeat getter
 *
 * @since 1.0.0
 */
function zeen_get_bg_repeat() {

	$output = '';

	if ( get_theme_mod( 'global_background_img' ) != '' ) {
		$output = get_theme_mod( 'global_background_img_repeat', 1 );
	}

	if ( zeen_is_archive() ) {
		$term_id = zeen_get_term_id();
	} elseif ( is_single() ) {
		global $post;
		$cats = get_the_category( $post->ID );
		$term_id = empty( $cats[0]->term_id ) ? '' : $cats[0]->term_id;
	} elseif ( is_page() ) {
		global $post;
		$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$background = get_post_meta( $post->ID, 'zeen_background', true );
		}
	} elseif ( zeen_is_shop() ) {
		$pid = get_option( 'woocommerce_shop_page_id' );
		$builder = get_post_meta( $pid, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$background = get_post_meta( $pid, 'zeen_background', true );
		}
	}
	if ( ! empty( $term_id ) ) {
		$background = get_term_meta( $term_id, 'zeen_background', true );
	}
	if ( ! empty( $background['src'] ) ) {
		$output = $background['repeat'];
	}

	return $output;
}

/**
 * Title
 *
 * @since 1.0.0
 */
function zeen_hero_title_tag( $pid = '', $args = array() ) {

	$args['heading'] = empty( $args['heading'] ) ? 2 : $args['heading'];
	$args['link'] = empty( $args['link'] ) ? 'on' : $args['link'];
	$args['subtitle'] = empty( $args['subtitle'] ) ? get_theme_mod( 'posts_subtitle', 1 ) : $args['subtitle'];

	echo '<div class="title-wrap';
	if ( zeen_get_subtitle_value( $pid ) != '' ) {
		echo ' title-with-sub';
	}
	echo '">';
	do_action( 'zeen_hero_title_before_outside', $pid );
	echo '<h' . (int) ( $args['heading'] ) . ' class="entry-title title flipboard-title">';
	if ( 'off' != $args['link'] ) {
		echo '<a href="' . esc_url( get_the_permalink() ) . '">';
	}
	do_action( 'zeen_hero_title_before', $pid );
	echo get_the_title( $pid );
	if ( 'off' != $args['link'] ) {
		echo '</a>';
	}
	echo '</h' . (int) ( $args['heading'] ) . '>';

	if ( ! empty( $args['subtitle'] ) ) {
		zeen_subtitle( $pid );
	}

	do_action( 'zeen_end_hero', $pid );

	echo '</div>';

}

/**
 * Share buttons
 *
 * @since 1.0.0
 */
function zeen_share( $args = array() ) {
	if ( class_exists( 'Zeen_Engine' ) ) {
		Zeen_Engine::zeen_engine_share( $args );
	}
}

/**
 * Icons
 *
 * @since 1.0.0
 */
function zeen_icons( $args = array() ) {

	$args['location'] = empty( $args['location'] ) ? 'main_menu' : $args['location'];

	if ( ! empty( $args['test'] ) ) {

		$options = zeen_selective_icons( '_icon_' );

		foreach ( $options as $key ) {
			if ( get_theme_mod( $args['location'] . $key ) == 1 ) {
				return true;
			}
		}
		return false;
	}

	$def_font = 'typo_main_menu';
	if ( 'footer' == $args['location'] ) {
		$def_font = 'typo_footer_menu';
	} elseif ( 'secondary_menu' == $args['location'] ) {
		$def_font = 'typo_secondary_menu';
	}

	$rtl = is_rtl();
	$args['type'] = empty( $args['type'] ) ? 'all' : $args['type'];
	$args['vertical'] = empty( $args['vertical'] ) ? false : $args['vertical'];
	$style = get_theme_mod( $args['location'] . '_icon_style', 1 );

	if ( empty( $args['vertical'] ) && get_theme_mod( $args['location'] . '_icon_subscribe' ) == 1 && ( 'all' == $args['type'] || 'util' == $args['type'] || 'subscribe' == $args['type'] ) ) {
		$sub_text = get_theme_mod( 'subscribe_button_text', esc_attr__( 'Subscribe', 'zeen' ) );
	?>
		<li class="menu-icon menu-icon-subscribe"><a href="#" class="modal-tr" data-type="subscribe"><i class="tipi-i-mail"></i><?php if ( ! empty( $sub_text ) ) { ?><span class="menu-icon--text font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?>"><?php echo esc_attr( $sub_text ); ?></span><?php } ?></a></li>
	<?php
	}

	if ( 'all' == $args['type'] || 'social' == $args['type'] ) {
		$networks = array(
			'facebook' => array(
				'icon' => 'facebook',
				'class' => 'fb',
				'name' => 'Facebook',
				'url' => 'https://facebook.com/',
			),
			'twitter' => array(
				'icon' => 'twitter',
				'class' => 'tw',
				'name' => 'Twitter',
				'url' => 'https://twitter.com/',
			),
			'instagram' => array(
				'icon' => 'instagram',
				'class' => 'insta',
				'name' => 'Instagram',
				'url' => 'https://instagram.com/',
			),
			'patreon' => array(
				'icon' => 'patreon',
				'class' => 'pa',
				'name' => 'Patreon',
				'url' => 'https://patreon.com/',
			),
			'imdb' => array(
				'icon' => 'imdb',
				'class' => 'pa',
				'name' => 'IMDB',
				'url' => 'https://imdb.com/',
			),
			'pinterest' => array(
				'icon' => 'pinterest',
				'class' => 'pin',
				'name' => 'Pinterest',
				'url' => 'https://pinterest.com/',
			),
			'soundcloud' => array(
				'icon' => 'soundcloud',
				'class' => 'sc',
				'name' => 'Soundcloud',
				'url' => 'https://soundcloud.com/',
			),
			'reddit' => array(
				'icon' => 'reddit-alien',
				'class' => 're',
				'name' => 'Reddit',
				'url' => 'https://reddit.com/',
			),
			'youtube' => array(
				'icon' => 'youtube-play',
				'class' => 'yt',
				'name' => 'YouTube',
				'url' => 'https://youtube.com/',
			),
			'tiktok' => array(
				'icon' => 'tiktok',
				'class' => 'tt',
				'name' => 'TikTok',
				'url' => 'https://tiktok.com/@',
			),
			'twitch' => array(
				'icon' => 'twitch',
				'class' => 'twitch',
				'name' => 'Twitch',
				'url' => 'https://twitch.com/',
			),
			'linkedin' => array(
				'icon' => 'linkedin',
				'class' => 'linkedin',
				'name' => 'Linkedin',
				'url' => 'https://linkedin.com/',
			),
			'dribbble' => array(
				'icon' => 'dribbble',
				'class' => 'dribbble',
				'name' => 'Dribbble',
				'url' => 'https://dribbble.com/',
			),
			'medium' => array(
				'icon' => 'medium',
				'class' => 'medium',
				'name' => 'Medium',
				'url' => 'https://medium.com/',
			),
			'unsplash' => array(
				'icon' => 'unsplash',
				'class' => 'unsplash',
				'name' => 'Unsplash',
				'url' => 'https://unsplash.com/',
			),
			'bandcamp' => array(
				'icon' => 'bandcamp',
				'class' => 'bandcamp',
				'name' => 'Bandcamp',
				'url' => '',
			),
			'mixcloud' => array(
				'icon' => 'mixcloud',
				'class' => 'mixcloud',
				'name' => 'Mixcloud',
				'url' => 'https://mixcloud.com/',
			),
			'tumblr' => array(
				'icon' => 'tumblr',
				'class' => 'tumblr',
				'name' => 'Tumblr',
				'url' => 'https://tumblr.com/',
			),
			'vimeo' => array(
				'icon' => 'vimeo',
				'class' => 'vimeo',
				'name' => 'Vimeo',
				'url' => 'https://vimeo.com/',
			),
			'goodreads' => array(
				'icon' => 'goodreads',
				'class' => 'goodreads',
				'name' => 'Goodreads',
				'url' => 'https://goodreads.com/',
			),
			'itch' => array(
				'icon' => 'itch',
				'class' => 'itch',
				'name' => 'Itch.io',
				'url' => '',
			),
			'producthunt' => array(
				'icon' => 'producthunt',
				'class' => 'producthunt',
				'name' => 'Product Hunt',
				'url' => 'https://producthunt.com/',
			),
			'letterboxd' => array(
				'icon' => 'letterboxd',
				'class' => 'letterboxd',
				'name' => 'Letterboxd',
				'url' => 'https://letterboxd.com/',
			),
			'vk' => array(
				'icon' => 'vk',
				'class' => 'vk',
				'name' => 'VK',
				'url' => 'https://vk.com/',
			),
			'telegram' => array(
				'icon' => 'telegram',
				'class' => 'telegram',
				'name' => 'Telegram',
				'url' => 'https://t.me/',
			),
			'steam' => array(
				'icon' => 'steam',
				'class' => 'steam',
				'name' => 'Steam',
				'url' => apply_filters( 'zeen_steam_base_url', 'https://steamcommunity.com/id/' ),
			),
			'spotify' => array(
				'icon' => 'spotify',
				'class' => 'spotify',
				'name' => 'Spotify',
				'url' => '',
			),
			'apple_music' => array(
				'icon' => 'apple_music',
				'class' => 'apple_music',
				'name' => 'Apple Music',
				'url' => '',
			),
			'discord' => array(
				'icon' => 'discord',
				'class' => 'discord',
				'name' => 'Discord',
				'url' => '',
			),
			'qq' => array(
				'icon' => 'qq',
				'class' => 'qq',
				'name' => 'QQ',
				'url' => '',
			),
			'weibo' => array(
				'icon' => 'weibo',
				'class' => 'weibo',
				'name' => 'Weibo',
				'url' => '',
			),
			'rss' => array(
				'icon' => 'rss',
				'class' => 'rss',
				'name' => 'RSS',
				'url' => get_bloginfo( 'rss2_url' ),
			),
		);

		foreach ( $networks as $key => $value ) {
			$override = 'rss' == $key ? true : get_theme_mod( 'icons_' . $key );
			if ( 1 == get_theme_mod( $args['location'] . '_icon_' . $key ) && ! empty( $override ) ) {
				echo '<li  class="menu-icon menu-icon-style-' . (int) ( $style ) . ' menu-icon-' . esc_attr( $value['class'] ) . '">';
				$complete_url = 'tumblr' == $key ? 'https://' . get_theme_mod( 'icons_' . $key ) . '.tumblr.com/' : $value['url'] . get_theme_mod( 'icons_' . $key );
				echo '<a';
				echo ' href="' . esc_url( $complete_url ) . '"';
				echo ' data-title="' . esc_attr( $value['name'] ) . '"';
				echo ' class="';
				if ( 4 != $style ) {
					echo 'tipi-i-' . esc_attr( $value['icon'] );
				}
				if ( 1 == $style ) {
					echo ' tipi-tip ';
					if ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) == 82 ) {
						echo ( true == $rtl ) ? 'tipi-tip-r' : 'tipi-tip-l';
					} elseif ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) > 70 ) {
						echo ( true == $rtl ) ? 'tipi-tip-l' : 'tipi-tip-r';
					} else {
						echo 'tipi-tip-move';
					}
				}
				echo '" rel="noopener nofollow" aria-label="' . esc_attr( $value['name'] ) . '" target="_blank">';
				if ( $style > 2 ) {
					echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . esc_attr( $value['name'] ) . '</span>';
				};
				echo '</a></li>';
			}
		}

		if ( 1 == get_theme_mod( $args['location'] . '_icon_whatsapp' ) ) {
			$wa_business = get_theme_mod( 'icons_whatsapp' );
			echo '<li class="';
			if ( 1 == $style ) {
				echo 'tipi-tip tipi-tip-move ';
			}
			if ( empty( $wa_business ) ) {
				echo 'tipi-xl-0 ';
			}
			echo 'menu-icon menu-icon-style-' . (int) ( $style ) . ' menu-icon-whatsapp" data-title="WhatsApp"><a href="';
			if ( empty( $wa_business ) ) {
				echo 'whatsapp://send?text=';
			} else {
				echo 'https://api.whatsapp.com/send?phone=' . esc_attr( $wa_business ) . '&text=';
			}
			the_title_attribute();
			echo ' - ';
			rawurlencode( the_permalink() );
			echo '" target="_blank">';
			if ( 4 != $style ) {
				echo '<i class="tipi-i-whatsapp" aria-hidden="true"></i>';
			}
			if ( $style > 2 ) {
				echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">WhatsApp</span>';
			}
			echo '</a></li>';
		}

	}
	$dark_active = get_theme_mod( $args['location'] . '_icon_dark_mode' );
	if (  ! empty( $dark_active ) && ( 'all' == $args['type'] || 'util' == $args['type'] || 'dark_mode' == $args['type'] ) ) {
		zeen_skin_mode( $args );
	}
	$login_active = get_theme_mod( $args['location'] . '_icon_login' );
	if ( ( ! empty( $args['p-menu'] ) && 'login' == $args['type'] ) || ! empty( $login_active ) && ( 'all' == $args['type'] || 'util' == $args['type'] || 'login' == $args['type'] ) ) { ?>
		<?php $user_logged_in = is_user_logged_in(); ?>
		<?php $user = wp_get_current_user(); ?>
		<li class="menu-icon menu-icon-style-<?php echo (int) ( $style ); ?> menu-icon-login<?php if ( $style == 1 ) {?> tipi-tip tipi-tip-move<?php } ?>" data-title="<?php if ( $user_logged_in ) { the_author_meta( 'display_name', $user->ID ); } else {
			if ( ! function_exists( 'login_with_ajax' ) ) {
				esc_html_e( 'Login With Ajax plugin not installed. Install it or remove this icon in the Theme Options.', 'zeen' );
			} else {
				esc_html_e( 'Login / Signup', 'zeen' );
			}
			} ?>">
			<?php if ( $user_logged_in ) { ?>
			<a href="#" class="modal-tr icon-logged-in" data-type="lwa"><?php if ( $style != 4 ) { echo get_avatar( $user->ID, 50 ); } ?><?php if ( $style > 2 ) { echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">'; the_author_meta( 'display_name', $user->ID ); echo '</span>'; } ?></a>
			<?php } else { ?>
				<a href="#" class="<?php if ( $style != 4 ) { ?>tipi-i-user <?php } ?>modal-tr icon-logged-out" data-type="lwa"><?php if ( $style > 2 ) {
					echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . esc_attr__( 'Login / Signup', 'zeen' ) . '</span>';
				} ?></a>
			<?php } ?>
		</li>
	<?php
	}

	if ( 'mobile' != $args['location'] && ( ( ! empty( $args['p-menu'] ) && 'search' == $args['type'] ) || ! empty( $args['search_on'] ) || 1 == get_theme_mod( $args['location'] . '_icon_search' ) && ( 'all' == $args['type'] || 'util' == $args['type'] || 'search' == $args['type'] ) ) ) {

		if ( 1 == get_theme_mod( $args['location'] . '_icon_search_type', 1 ) || ( 1 != get_theme_mod( $args['location'] . '_icon_search_type', 1 ) && 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) > 70 ) ) {
			echo '<li class="menu-icon menu-icon-style-' . (int) ( $style ) . ' menu-icon-search">';

			echo '<a href="#" class="';
			if ( 4 != $style ) {
				echo 'tipi-i-search ';
			}
			echo 'modal-tr';
			if ( 1 == $style ) {
				echo ' tipi-tip ';
				if ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) == 82 ) {

						echo ( true == $rtl ) ? 'tipi-tip-r' : 'tipi-tip-l';
				} elseif ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) > 70 ) {
					echo ( true == $rtl ) ? 'tipi-tip-l' : 'tipi-tip-r';
				} else {
					echo 'tipi-tip-move';
				}
			}
			echo '"';
			echo ' data-title="' . esc_attr__( 'Search', 'zeen' ) . '" data-type="search">';
			if ( $style > 2 ) {
				echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . esc_attr__( 'Search', 'zeen' ) . '</span>';
			}
			echo '</a></li>';
		} else {
			echo '<li class="menu-icon drop-search-wrap menu-icon-search">';
			echo '<a href="#" class="';
			if ( 4 != $style ) {
				echo 'tipi-i-search ';
			}
			echo 'modal-tr" data-type="search-drop">';
			if ( $style > 2 ) {
				echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . esc_attr__( 'Search', 'zeen' ) . '</span>';
			}
			echo '</a>
				<div class="drop-search search-form-wrap widget_search clearfix">';
			zeen_search_dropdown();
			echo '</div></li>';
		}
	}

	if ( 1 == get_theme_mod( $args['location'] . '_icon_cart' ) && ( 'all' == $args['type'] || 'cart' == $args['type'] ) ) {
		$woo_active = zeen_woo_active();
		echo '<li class="menu-icon dropper drop-it menu-icon-style-' . (int) ( $style ) . ' menu-icon-basket';
		if ( $woo_active ) {
			echo ' tipi-tip-basket';
		}
		echo '">';

		$cart_icon_onoff = get_theme_mod( 'woo_cart_icon_onoff', 1 );
		$cart_icon = get_theme_mod( 'woo_cart', 1 );
		if ( $woo_active ) {
			echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="cart-icon-' . (int) ( $cart_icon );
			if ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) > 70 ) {
				echo ' tipi-tip ';
				if ( get_theme_mod( 'header_style' ) == 82 ) {
					echo ( true == $rtl ) ? 'tipi-tip-r' : 'tipi-tip-l';
				} else {
					echo ( true == $rtl ) ? 'tipi-tip-l' : 'tipi-tip-r';
				}
			}
			if ( get_theme_mod( 'woo_ajax_cart_style', 1 ) == 2 ) {
				echo ' slide-cart-tr-open" data-target="cart';
			}
			echo '" data-title="' . esc_attr__( 'Bag', 'zeen' ) . '">';
			if ( 4 != $style && ! empty( $cart_icon_onoff ) ) {
				$custom_cart_icon = apply_filters( 'zeen_custom_cart_icon', '' );
				if ( ! empty( $custom_cart_icon ) ) {
					echo '<div class="tipi-vertical-c custom-cart-wrap">';
					echo apply_filters( 'zeen_custom_cart_icon', '' );
				} else {
					echo '<i class="tipi-i-cart ';
					if ( 1 == $cart_icon ) {
						echo 'tipi-i-cart-1';
					} else {
						echo 'tipi-i-cart-2';
					}
					echo '" aria-hidden="true">';
				}
				if ( $style < 3 ) {
					echo '<span class="tipi-cart-count font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . (int) WC()->cart->get_cart_contents_count() . '</span>';
				}
				if ( ! empty( $custom_cart_icon ) ) {
					echo '</div>';
				} else {
					echo '</i>';
				}

			}
			if ( $style > 2 || empty( $cart_icon_onoff ) ) {
				echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . esc_attr__( 'Bag', 'zeen' ) . '</span>';
				echo ' <span class="menu-icon--text tipi-cart-count-text font-' . (int) get_theme_mod( $def_font, 3 ) . '">(<span class="tipi-cart-count">' . (int) WC()->cart->get_cart_contents_count() . '</span>)</span>';
			}
			echo '</a>';
			if ( ! ( ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) > 70 ) || 'mobile' == $args['location'] ) ) {
				zeen_woo_contents( array( 'location' => 'menu' ) );
			}
		} else {
			echo '<a href="#" class="';
			echo ' tipi-tip ';
			if ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) == 82 ) {
						echo ( true == $rtl ) ? 'tipi-tip-r' : 'tipi-tip-l';
			} elseif ( 'secondary_menu' == $args['location'] && get_theme_mod( 'header_style', 1 ) > 70 ) {
				echo ( true == $rtl ) ? 'tipi-tip-l' : 'tipi-tip-r';
			} else {
				echo 'tipi-tip-move';
			}
			echo '" data-title="' . esc_attr__( 'Install WooCommerce To Use', 'zeen' ) . '">';
			if ( 4 != $style ) {
				echo '<i class="tipi-i-cart ';
				if ( 1 == $cart_icon ) {
					echo 'tipi-i-cart-1';
				} else {
					echo 'tipi-i-cart-2';
				}
				echo '" aria-hidden="true">';
				echo '<span class="tipi-cart-count font-' . (int) get_theme_mod( $def_font, 3 ) . '">0</span></i>';
			}
			if ( $style > 2 ) {
				echo '<span class="menu-icon--text font-' . (int) get_theme_mod( $def_font, 3 ) . '">' . esc_attr_e( 'Bag', 'zeen' ) . '</span>';
			}
			echo '</a>';
		}
		echo '</li>';
	}

	?>

	<?php $sub_text = get_theme_mod( 'subscribe_button_text', esc_attr__( 'Subscribe', 'zeen' ) ); ?>
	<?php if ( ! empty( $args['vertical'] ) && get_theme_mod( $args['location'] . '_icon_subscribe' ) == 1 && ( $args['type'] == 'all' || $args['type'] == 'util' || $args['type'] == 'subscribe' ) ) { ?>
		<li class="menu-icon menu-icon-subscribe"><a href="#" class="modal-tr" data-type="subscribe"><i class="tipi-i-mail"></i><?php if ( ! empty( $sub_text ) ) { ?> <span class="menu-icon--text font-<?php echo (int) get_theme_mod( $def_font, 3 ); ?>"><?php echo esc_attr( $sub_text ); ?></span><?php } ?></a></li>
	<?php } ?>
	<?php $slide_active = get_theme_mod( $args['location'] . '_icon_slide' ); ?>
	<?php if ( ( ! empty( $args['p-menu'] ) && $args['type'] == 'slide' ) || ! empty( $slide_active ) && ( $args['type'] == 'all' || $args['type'] == 'util' || $args['type'] == 'slide' ) ) { ?>
		<li class="menu-icon menu-icon-slide"><a href="#" class="tipi-i-menu slide-menu-tr-open" data-target="slide"></a></li>
	<?php } ?>

	<?php if ( 'mobile_slide' == $args['type'] && get_theme_mod( 'mobile_header_icon_mobile_slide', 1 ) ) { ?>
		<li class="menu-icon menu-icon-mobile-slide"><a href="#" class="mob-tr-open" data-target="slide-menu"><i class="tipi-i-menu-mob" aria-hidden="true"></i></a></li>
	<?php } ?>

	<?php
}

/**
 * Tipi archive titles
 *
 * @since 1.0.0
 */
function zeen_archive_titles( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( TipiBuilder\ZeenHelpers::zeen_builder_call() ) {
		$term_id = $_GET['id'];
		$term = get_term( $term_id );
		$title = $term->name;
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}

	return apply_filters( 'zeen_archive_titles', $title );

}
add_filter( 'get_the_archive_title', 'zeen_archive_titles' );

/**
 * Tipi archive titles
 *
 * @since 1.0.0
 */
function zeen_archive_description( $description ) {

	if ( TipiBuilder\ZeenHelpers::zeen_builder_call() ) {
		$term_id = $_GET['id'];
		$term = get_term( $term_id );
		$description = $term->description;
	}

	return $description;

}
add_filter( 'get_the_archive_description', 'zeen_archive_description' );

/**
 * Featured Image Style
 *
 * @since 1.0.0
 */
function zeen_hero_design( $args = array(), $echo = true, $in_content = '' ) {
	global $post;
	if ( 8 == $args['hero_design'] ) {
		zeen_related_posts_small( $post, $args, 's' );
		return;
	}
	$img_or_css = 'img';
	$link = false;
	$classes = array( 'hero-' . $args['hero_design'] );
	$hero_classes = 'hero';
	$args['is_page'] = empty( $args['is_page'] ) ? '' : $args['is_page'];
	$pf = empty( $args['post_format'] ) ? '' : $args['post_format'];
	if ( 'gallery' == $pf ) {
		$gallery = apply_filters( 'zeen_post_custom_field_gallery', get_post_meta( $post->ID, 'zeen_gallery', true ), $post->ID );
	}
	if ( ! empty( $gallery ) ) {
		$hero_classes = 'hero-gallery';
	}
	$title_loc = empty( $args['title_location'] ) ? '' : $args['title_location'];
	$hero_size = 'l';
	$cover_height = empty( $args['cover_height'] ) ? '' : $args['cover_height'];
	$splitter_bottom = ! isset( $args['splitter_bottom'] ) ? 99 : $args['splitter_bottom'];
	$parallax = zeen_get_parallax_onoff( $post->ID, array(
		'hero_design' => $args['hero_design'],
		'post_format' => $pf,
		'media_design' => $args['media_design'],
		'is_page' => $args['is_page'],
	) );

	if ( 51 == $args['hero_design'] ) {
		zeen_hero_with_content( $args );
		return;
	} elseif ( $args['hero_design'] < 9 ) {
		$width = ZeenMobile::is_mobile() ? 390 : 770;
		$height = 'full';
		$hero_size = 's';
	} elseif ( $args['hero_design'] < 20 ) {
		$width = ZeenMobile::is_mobile() ? 370 : 1155;
		$height = ZeenMobile::is_mobile() ? 247 : 770;
		if ( 18 == $args['hero_design'] ) {
			$width = ZeenMobile::is_mobile() ? 370 : 585;
			$height = ZeenMobile::is_mobile() ? 490 : 775;
		} elseif ( 19 == $args['hero_design'] ) {
			$width = ZeenMobile::is_mobile() ? 390 : 585;
			$height = ZeenMobile::is_mobile() ? 390 : 585;
			$args['hero_background'] = true;
		}
		$hero_size = 'm';
		$classes[] = 'tipi-row';
		$classes[] = 'content-bg';
		if ( isset( $args['medium_height'] ) && 2 == $args['medium_height'] ) {
			$classes[] = 'medium-uncrop';
			$height = 'full';
			$width = ZeenMobile::is_mobile() ? 390 : 1400;
		}
	} elseif ( $args['hero_design'] < 29 ) {
		$width = ZeenMobile::is_mobile() ? 390 : 'full';
		$height = 'full';
		$classes[] = 'cover-' . $cover_height;
	} elseif ( $args['hero_design'] < 32 ) {
		$width = ZeenMobile::is_mobile() ? 390 : 'full';
		$height = 'full';
		$classes[] = 'cover-1';
		$img_or_css = 'css';
	} elseif ( $args['hero_design'] < 49 ) {
		$width = ZeenMobile::is_mobile() ? 370 : 770;
		$height = ZeenMobile::is_mobile() ? 490 : 1020;
		$hero_classes .= ' tipi-xs-12 tipi-m-6';
		if ( 42 == $args['hero_design'] ) {
			$classes[] = 'contrast';
		} elseif ( 43 == $args['hero_design'] ) {
			$width = ZeenMobile::is_mobile() ? 390 : 585;
			$height = ZeenMobile::is_mobile() ? 390 : 585;
			$args['hero_background'] = true;
		}
	}
	$args['hero_size'] = $hero_size;

	$args['hero_color'] = ( 'fixed' != $title_loc && 'middle' != $title_loc && 'middle-bl' != $title_loc && 'middle-cut' != $title_loc ) ? '' : zeen_post_color( $post->ID, $args['is_page'] );

	if ( 9 == $args['hero_design'] ) {
		return;
	}

	if ( 10 == $args['hero_design'] || ( 4 == $args['hero_design'] && empty( $in_content ) ) ) {
		if ( 4 != $args['hero_design'] ) {
			zeen_breadcrumbs( '', 'm' );
		}
		zeen_related_posts_small( $post, $args, 'm' );
		zeen_hero_title( $post, $args );
		return;
	} elseif ( 4 != $args['hero_design'] && 31 != $args['hero_design'] ) {
		zeen_related_posts_small( $post, $args );
	}
	if ( $splitter_bottom < 99 ) {
		$hero_classes .= ' hero-has-splitter';
	}
	if ( 3 == $splitter_bottom && 11 != $args['media_design'] ) {
		$hero_classes .= ' splitter--fade--bottom splitter--fade';
	}
	if ( 'gallery' != $pf ) {
		$classes[] = ! empty( $parallax ) ? 'parallax' : 'no-par';
	}

	if ( 'above' == $title_loc && $args['hero_design'] < 11 ) {
		zeen_breadcrumbs( '', 'm' );
	}

	if ( 'above' == $title_loc || ( 'above-c' == $title_loc && 4 != $args['hero_design'] ) ) {
		zeen_hero_title( $post, $args );
	}
	$thumb_meta = get_post( get_post_meta( $post->ID, '_thumbnail_id', true ) );
	$caption_ss = get_post_meta( $post->ID, 'cb_image_credit', true );
	if ( empty( $caption_ss ) && ! empty( $thumb_meta->post_excerpt ) ) {
		$caption = $thumb_meta->post_excerpt;
	} else {
		$caption = $caption_ss;
	}
	$size = '';
	if ( empty( $gallery ) && ! empty( $thumb_meta ) ) {
		$size = 'full' == $width ? 'full' : 'zeen-' . $width . '-' . $height;
		$size = 'full' == $height && 770 == $width ? 'medium_large' : $size;
		$size = 100 == $height && 100 == $width ? 'thumbnail' : $size;
		$dimensions = wp_get_attachment_image_src( $thumb_meta->ID, $size );
		if ( $dimensions[1] < $dimensions[2] ) {
			$classes[] = 'is-portrait';
		}
	}
	echo '<div class="hero-wrap clearfix ' . esc_attr( implode( ' ', $classes ) ) . '">';
	if ( ! empty( $args['hero_background'] ) ) {
		echo '<div class="hero-background abs-fs">';
		zeen_featured_img( $post->ID, array(
			'width' => ZeenMobile::is_mobile() ? 390 : 1155,
			'height' => ZeenMobile::is_mobile() ? 247 : 770,
			'hero' => true,
			'secondary' => 'off',
			'lazy_off' => true,
		) );
		echo '</div>';
	}
	echo '<div class="' . esc_attr( $hero_classes ) . '">';

	if ( ( $args['media_design'] < 10 || 12 == $args['media_design'] || ( 11 == $args['media_design'] && 'audio' == $pf && ! empty( $args['hero_background'] ) ) ) && empty( $gallery ) ) {
		zeen_featured_img( $post->ID, array(
			'width' => $width,
			'height' => $height,
			'size' => $size,
			'link' => $link,
			'lightbox' => get_theme_mod( 'hero_small_open_lightbox' ) && ( 'beneath' == $title_loc || 'beneath-c' == $title_loc || 'above' == $title_loc || 'above-c' == $title_loc ),
			'hero' => true,
			'caption' => true,
			'img_or_css' => $img_or_css,
			'secondary' => 'off',
			'lazy_off' => true,
		) );
	}

	if ( ! empty( $gallery ) ) {
		zeen_post_format_data( $post->ID, array(
			'post_format' => $pf,
			'media_design' => $args['media_design'],
			'splitter_bottom' => $splitter_bottom,
			'hero_size' => $hero_size,
			'hero_design' => $args['hero_design'],
			'cover_height' => $cover_height,
			'hero' => true,
		) );
	}

	if ( $args['media_design'] > 10 && 'gallery' != $pf && ! ( 11 == $args['media_design'] && 'audio' == $pf && ! empty( $args['hero_background'] ) ) ) {
		zeen_post_format_data( $post->ID, array(
			'post_format' => $pf,
			'hero_design' => $args['hero_design'],
			'media_design' => $args['media_design'],
			'hero' => true,
		) );
	}

	if ( 'fixed' != $title_loc && 'middle' != $title_loc && 'middle-bl' != $title_loc && 'middle-cut' != $title_loc && $args['media_design'] < 10 && 'gallery' != $pf ) {
		$pf_classes = 'icon-l';
		if ( get_theme_mod( 'icon_design', 1 ) == 1 ) {
			$pf_classes .= ' center-abs';
		} else {
			if ( 'cut-bc' == $title_loc || 'cut-bl' == $title_loc ) {
				$pf_classes .= ' center-abs';
			}
		}
		zeen_post_format_data( $post->ID, array(
			'post_format' => $pf,
			'hero_design' => $args['hero_design'],
			'media_design' => $args['media_design'],
			'classes' => $pf_classes,
			'hero' => true,
		) );
	}

	if ( ! empty( $caption ) && empty( $gallery ) && 18 == $args['hero_design'] ) {
		echo '<div class="caption">' . zeen_sanitize_titles( $caption ) . '</div>';// WPCS: XSS OK
	}
	echo '</div>';
	if ( ( 'fixed' == $title_loc || 'middle' == $title_loc || 'middle-bl' == $title_loc || 'middle-cut' == $title_loc ) && empty( $gallery ) && 3 != $splitter_bottom ) {

		echo '<span class="mask-overlay"';
		if ( ! empty( $args['hero_color']['overlay'] ) ) {
			echo ' style="background-color:' . esc_attr( $args['hero_color']['overlay'] ) . '"';
		}
		echo '></span>';
	}

	if ( ! empty( $caption ) && empty( $gallery ) && 18 != $args['hero_design'] ) {
		echo '<div class="caption">' . zeen_sanitize_titles( $caption ) . '</div>';// WPCS: XSS OK
	}

	if ( 31 == $args['hero_design'] ) {
		echo '<div class="spacer"></div>';
	}

	if ( 'beneath' != $title_loc && 'beneath-c' != $title_loc && 'above' != $title_loc && 'above-c' != $title_loc ) {
		zeen_hero_title( $post, $args );
	}
	if ( $splitter_bottom < 99 ) {
		zeen_shape( array( 'shape' => $splitter_bottom ) );
	}

	echo '</div>';

	if ( 'beneath-c' == $title_loc ) {
		zeen_hero_title( $post, $args );
	}
}

/**
 * Hero title
 *
 * @since 1.0.0
 */
function zeen_hero_title( $post = '', $args = array() ) {
	$pid = $post->ID;
	$classes = '';
	$meta_classes = '';
	$title_loc = empty( $args['title_location'] ) ? '' : $args['title_location'];
	$pf = empty( $args['post_format'] ) ? '' : $args['post_format'];
	$md = empty( $args['media_design'] ) ? '' : $args['media_design'];
	$hero_color = empty( $args['hero_color'] ) ? '' : $args['hero_color'];
	$hero_design = empty( $args['hero_design'] ) ? '' : $args['hero_design'];
	$hero_background = empty( $args['hero_background'] ) ? '' : $args['hero_background'];
	$size = empty( $args['size'] ) ? '' : $args['size'];
	$is_page = empty( $args['is_page'] ) ? '' : true;
	$typo = 's';

	if ( 8 == $hero_design ) {
		return;
	}
	if ( 'hero-l' == $size ) {
		$typo = 'xl';
		if ( 'cut-bc' == $title_loc ) {
			$meta_classes .= ' tipi-xs-12 tipi-m-8';
			$classes .= ' tipi-row';
		} elseif ( 'cut-bl' == $title_loc ) {
			$meta_classes .= ' tipi-xs-12 tipi-m-8 tipi-l-6';
			$classes .= ' tipi-row';
		} elseif ( 'middle-bl' == $title_loc ) {
			$meta_classes .= ' tipi-xs-12 tipi-m-10';
			$classes .= ' tipi-row';
		}
	} else {
		if ( 'cut-bc' == $title_loc ) {
			$meta_classes .= ' tipi-xs-12 tipi-m-8';
			$classes .= ' tipi-row';
		} elseif ( 'cut-bl' == $title_loc ) {
			$classes .= ' tipi-xs-12 tipi-m-8 tipi-l-6 tipi-col';
		}
		if ( 'hero-m' == $size ) {
			$typo = 'm';
		}
		if ( 'hero-m' == $size && 'middle-bl' == $title_loc ) {
			$meta_classes .= ' tipi-xs-12 tipi-m-10';
		}
	}

	if ( 2 != $args['hero_design'] && ( 'above' == $title_loc || 'above-c' == $title_loc || 'beneath-c' == $title_loc ) ) {
		$classes .= ' tipi-row content-bg';
	}

	if ( 'contrast' == $title_loc ) {
		$classes .= ' tipi-xs-12 tipi-m-6 content-bg';
	}
	echo '<div class="meta-wrap hero-meta tipi-' . esc_attr( $typo ) . '-typo elements-design-' . (int) ( get_theme_mod( 'posts_meta_design', 1 ) ) . ' clearfix' . esc_attr( $classes ) . '">';
	echo '<div';
	if ( ! empty( $hero_color ) ) {
		$meta_classes .= ' meta-with-color';
		echo ' style="color:' . esc_attr( $hero_color['text'] ) . '" ';
	}
	if ( zeen_get_subtitle_value( $pid ) == '' ) {
		$meta_classes .= ' meta-no-sub';
	}
	echo ' class="meta' . esc_attr( $meta_classes ) . '">';

	if ( 'cut-bl' == $title_loc || 'cut-bc' == $title_loc ) {
		zeen_breadcrumbs( '', 'm' );
	}

	$args = array(
		'type' => 'posts',
		'location' => 2,
		'base_design' => get_theme_mod( 'posts_base_design', 1 ),
		'elements_location' => get_theme_mod( 'posts_meta_location', 1 ),
		'cat_design' => get_theme_mod( 'posts_cat_design', 1 ),
		'elements_design' => get_theme_mod( 'posts_meta_design', 1 ),
	);

	$args = zeen_byline_args_check( $args );

	if ( empty( $is_page ) ) {
		zeen_byline( $pid, $args );
	}
	zeen_hero_title_tag( $pid, array(
		'heading' => 1,
		'hero_design' => $hero_design,
		'link' => 'off',
	) );
	$args['location'] = 3;
	if ( empty( $is_page ) ) {
		zeen_byline( $pid, $args );
	}
	if ( 11 == $md && ! empty( $hero_background ) && 'audio' == $pf ) {
		zeen_post_format_data( $pid, array(
			'post_format' => $pf,
			'media_design' => $md,
			'hero_design' => $hero_design,
			'hero' => true,
		) );
	}
	echo '</div>';
	if ( ( 'fixed' == $title_loc || 'middle' == $title_loc || 'middle-bl' == $title_loc || 'middle-cut' == $title_loc ) && $md < 10 && 'gallery' != $pf ) {
		zeen_post_format_data( $pid, array(
			'post_format' => $pf,
			'media_design' => $md,
			'hero_design' => $hero_design,
			'hero' => true,
		) );
	}
	do_action( 'zeen_meta_wrap_end', array(
		'pid' => $pid,
		'action_type' => 'single',
		'hook' => 'below_title',
		'title_loc' => $title_loc,
	) );
	echo '</div><!-- .meta-wrap -->';
}

function zeen_share_below_title( $args = array() ) {
	if ( ! is_page() ) {
		$args['design'] = get_theme_mod( 'single_share_design_below_title', 1 );
		zeen_share( $args );
	}
}

function zeen_byline_args_check( $args ) {
	$keys = array( 'cats', 'comments', 'author_avatar', 'author', 'updated_date', 'date', 'read_time', 'view_count', 'like_count' );
	$off = true;
	if ( empty( $args['override'] ) ) {
		foreach ( $keys as $key ) {
			$args[ $key ] = 'off';
			$default = 'cats' == $key ? 1 : '';
			if ( get_theme_mod( $args['type'] . '_' . $key, $default ) != 1 ) {
				$args[ $key ] = 'off';
			} else {
				$args[ $key ] = 'on';
				$off = '';
			}
		}

		if ( 1 == $args['location'] ) {
			$args['separator'] = 'off';
		}
	} else {

		foreach ( $keys as $key ) {
			$args[ $key ] = 'off';
		}
		$args['separator'] = 'off';
		$args[ $args['override'] ] = 'on';
	}

	if ( empty( $off ) ) {
		return $args;
	}
}

/**
 * Get hero title location
 *
 * @since 1.0.0
 */
function zeen_get_hero_title_location( $style = 1 ) {

	if ( 1 == $style || 11 == $style || 9 == $style || 31 == $style ) {
		return 'beneath';
	} elseif ( 2 == $style || 12 == $style ) {
		return 'above';
	} elseif ( 3 == $style || 16 == $style || 21 == $style ) {
		return 'middle';
	} elseif ( 5 == $style || 17 == $style || 27 == $style ) {
		return 'middle-bl';
	} elseif ( 18 == $style || 19 == $style || 43 == $style ) {
		return 'side';
	} elseif ( 13 == $style || 26 == $style || 4 == $style ) {
		return 'above-c';
	} elseif ( 14 == $style || 22 == $style ) {
		return 'cut-bl';
	} elseif ( 15 == $style || 23 == $style ) {
		return 'cut-bc';
	} elseif ( 24 == $style || 10 == $style ) {
		return 'beneath-c';
	} elseif ( 25 == $style ) {
		return 'middle-cut';
	} elseif ( 999 == $style ) {
		return 'fixed';
	} elseif ( 41 == $style || 42 == $style ) {
		return 'contrast';
	} elseif ( 45 == $style ) {
		return 'split';
	}

}

/**
 * Post End Ad
 *
 * @since 1.0.0
 */
function zeen_post_end_ad() {
	zeen_ad( 'post_end' );
}

/**
 * Post Above Featured Image Ad
 *
 * @since 1.0.0
 */
function zeen_post_above_featured_image_ad() {
	zeen_ad( 'post_above_fi' );
}

/**
 * Post End Ad
 *
 * @since 1.0.0
 */
function zeen_post_end_subscribe() {
	if ( get_theme_mod( 'single_subscribe_end' ) != 1 ) {
		return;
	}
	echo '<div class="post-end-subscribe content-subscribe-block content-subscribe-style site-skin-' . (int) zeen_skin_style( 'single_subscribe_end', 'skin', 3 ) . ' site-img-' . (int) zeen_skin_style( 'single_subscribe_end', 'repeat' ) . ' subscribe-button-' . (int) get_theme_mod( 'subscribe_signup_style', 1 ) . '"><div class="bg-area">';
	zeen_subscribe( true );
	zeen_elem_bg_area( 'single_subscribe_end' );
	echo '</div></div>';
}



/**
 * Post Before Content Ad
 *
 * @since 1.0.0
 */
function zeen_post_start_content_ad() {
	zeen_ad( 'post_before_content' );
}

/**
 * Post Middle Content Ad
 *
 * @since 1.0.0
 */
function zeen_post_middle_ad( $content ) {
	if ( ! is_single() ) {
		return $content;
	}
	global $post;
	$list = get_post_meta( $post->ID, 'zeen_list', true );
	$live_blog = zeen_is_live_blog( $post->ID );
	if ( 'on' == $list || ! empty( $live_blog ) ) {
		return $content;
	}
	$da = zeen_ad( 'post_middle_content', false, '' );
	$inline_post_single = get_post_meta( $post->ID, 'zeen_inline_post', true );
	if ( empty( $inline_post_single ) || 99 == $inline_post_single ) {
		$inline_post = get_theme_mod( 'post_mid_inline' );
	} elseif ( 1 == $inline_post_single ) {
		$inline_post = 1;
	} elseif ( 2 == $inline_post_single ) {
		$inline_post = '';
	}
	if ( ! is_single() || ( empty( $da ) && empty( $inline_post ) ) ) {
		return $content;
	}
	$data = explode( '</p>', $content );
	$count = count( $data );
	if ( $count < 5 ) {
		return $content;
	}
	$mid = floor( $count / 2 );
	if ( ! empty( $da ) && ! ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) ) {
		if ( substr( trim( $data[ $mid ] ), 0, 3 ) != '<p>' ) {
			for ( $i = 1; $i < 12; $i++ ) {
				if ( ! empty( $data[ $mid + $i ] ) && substr( trim( $data[ $mid + $i ] ), 0, 3 ) == '<p>' ) {
					$mid = $mid + $i;
					break;
				}
			}
		}
		array_splice( $data, $mid, 0, '<p>' . $da );
	}
	$thirds = floor( $count / 1.5 );
	if ( ! empty( $inline_post ) && $count > 1 ) {
		if ( substr( trim( $data[ $thirds ] ), 0, 3 ) != '<p>' ) {
			for ( $i = 1; $i < 6; $i++ ) {
				if ( ! empty( $data[ $thirds + $i ] ) && substr( trim( $data[ $thirds + $i ] ), 0, 3 ) == '<p>' ) {
					$thirds = $thirds + $i;
					break;
				}
			}
		}
		array_splice( $data, $thirds, 0, '<p>' . zeen_post_inline() );
	}
	$content = implode( '</p>', $data );
	return $content;
}

add_filter( 'the_content', 'zeen_post_middle_ad' );

/**
 * List
 *
 * @since 1.0.0
 */
function zeen_post_list( $content ) {
	if ( ( ! is_single() && empty( $_GET['ipl'] ) ) || ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() )  ) {
		return $content;
	}
	global $post;
	$output = '';
	$list = get_post_meta( $post->ID, 'zeen_list', true );
	if ( 'on' == $list ) {
		$list_design = get_post_meta( $post->ID, 'zeen_list_design', true );
		$list_design = empty( $list_design ) || 99 == $list_design ? get_theme_mod( 'list_design', 1 ) : $list_design;
		$countdown = get_post_meta( $post->ID, 'zeen_countdown', true );
		$countdown_order = get_post_meta( $post->ID, 'zeen_countdown_order', true );
		$countdown_order = empty( $countdown_order ) || 99 == $countdown_order ? get_theme_mod( 'countdown_order', 1 ) : $countdown_order;
		$separator = get_post_meta( $post->ID, 'zeen_list_separator', true );
		$separator = empty( $separator ) ? 'h3' : $separator;
		$pages = explode( '<' . $separator, $content );
		$pages = array_filter( $pages );
		$separator_is_h = strpos( $separator, 'h' ) !== false;
		if ( $separator_is_h && isset( $pages[0] ) && substr( trim( $pages[0] ), -4 ) != '/' . $separator . '>' ) {
			$output .= $pages[0];
			unset( $pages[0] );
		}
		$output .= '<div class="zeen__list--' . (int) $list_design . ' zeen__list clearfix zeen__list-order-' . (int) $countdown_order;
		if ( 1 == $list_design ) {
			$output .= ' slider tipi-spin" data-s="21';
		}
		if ( 1 == $countdown_order ) {
			$output .= '" style="counter-reset: list ' . (int) ( count( $pages ) + 1 );
		}
		$output .= '">';
		if ( 1 == $list_design ) {
			$output .= '<div class="arrows sticky-el clearfix">';
			$output .= '<div class="arrow button-arrow-l button-arrow slider-arrow-prev disabled"><i class="tipi-i-arrow-left"></i><div class="button-text button-title">' . esc_html__( 'Previous', 'zeen' ) . '</div></div>';
			$output .= '<div class="arrow button-arrow-r button-arrow slider-arrow-next"><div class="button-text button-title">' . esc_html__( 'Next', 'zeen' ) . '</div><i class="tipi-i-arrow-right"></i></div>';
			$output .= '</div>';
		}
		foreach ( $pages as $key ) {
			$output .= '<div class="zeen__list__entry';
			if ( 1 == $list_design ) {
				$output .= ' slide';
			} else {
				$output .= ' clearfix';
			}
			$output .= '">';
			$output .= '<' . $separator;
			if ( 'on' == $countdown ) {
				$output .= ' class="tipi-vertical-c list__counter"';
			}
			$output .= $key;
			$output .= '</div>';
		}
		$output .= '</div>';
		$content = $output;
	}
	return $content;
}

add_filter( 'the_content', 'zeen_post_list' );

/**
 * Post Sponsor
 *
 * @since 1.0.0
 */
function zeen_post_sponsor( $content = '', $ipl = '', $pid = '' ) {
	if ( ! is_single() && empty( $ipl ) ) {
		return $content;
	}

	$output = '';
	global $post;
	$pid = empty( $pid ) ? $post->ID : $pid;
	$sponsor = get_post_meta( $pid, 'zeen_spon', true );
	if ( 'on' == $sponsor ) {
		$output = '<div class="spon-block tipi-vertical-c">';
		$output .= '<span class="title">' . apply_filters( 'zeen_sponsored_title', esc_html__( 'Sponsored', 'zeen' ) ) . '</span>';
		$sponsor_link = get_post_meta( $pid, 'zeen_spon_link', true );
		$output .= '<span class="tipi-vertical-c spon-wrap">';
		if ( ! empty( $sponsor_link ) ) {
			$output .= '<a href="' . esc_url( $sponsor_link ) . '" class="tipi-vertical-c"';
			if ( apply_filters( 'zeen_sponsored_nofollow_blank', true ) == true ) {
				$output .= ' target="_blank" rel="nofollow noopener"';
			}
			$output .= '>';
		}
		$sponsor_img = get_post_meta( $pid, 'zeen_spon_img', true );
		if ( ! empty( $sponsor_img ) ) {
		$sponsor_img_2x = get_post_meta( $pid, 'zeen_spon_img_retina', true );
			$output .= '<span class="spon-img"><img src="' . esc_url( $sponsor_img ) . '"';
			if ( ! empty( $sponsor_img_2x ) ) {
				$output .= ' srcset="' . esc_url( $sponsor_img_2x ) . ' 2x"';
			}
			$output .= '></span>';
		}

		$sponsor_name = get_post_meta( $pid, 'zeen_spon_name', true );
		if ( ! empty( $sponsor_name ) ) {
			$output .= '<span class="spon-name">' . esc_html( $sponsor_name ) . '</span>';
		}
		if ( ! empty( $sponsor_link ) ) {
			$output .= '</a>';
		}
		$output .= '</span>';
		$output .= '</div>';
	}

	return $output . $content;
}
add_filter( 'the_content', 'zeen_post_sponsor' );

/**
 * Post Footer Blocks
 *
 * @since 1.0.0
 */
function zeen_post_footer_blocks( $post = '', $ipl = '' ) {
	if ( ! empty( $ipl ) ) {
		zeen_mob_height_limit();
	}
	if ( empty( $ipl ) && ( ! is_single() || 'attachment' == $post->post_type || 'page' == $post->post_type ) ) {
		return;
	}

	$pid = $post->ID;
	if ( function_exists( 'get_coauthors' ) ) {
		$authors = get_coauthors();
		$a_id = array();
		foreach ( $authors as $key ) {
			$a_id[] = $key->ID;
		}
	} else {
		$a_id = $post->post_author;
	}
	$args = array(
		'pid' => $pid,
		'aid' => $a_id,
		'action_type' => 'single',
		'hook' => 'after',
		'ipl' => $ipl,
	);
	if ( empty( $ipl ) ) {
		do_action( 'zeen_post_footer_blocks', $args );
	} else {
		do_action( 'zeen_post_footer_blocks_auto_next_post', $args );
	}

}

/**
 * Post Footer Blocks
 *
 * @since 3.9.0
 */
function zeen_end_post_sticky_wrap( $post = '', $ipl = '' ) {
	if ( ! empty( $ipl ) ) {
		zeen_mob_height_limit();
	}
	if ( empty( $ipl ) && ( ! is_single() || 'attachment' == $post->post_type || 'page' == $post->post_type ) ) {
		return;
	}
	$pid = $post->ID;
	$args = array(
		'pid' => $pid,
		'action_type' => 'single',
		'hook' => 'after',
		'ipl' => $ipl,
	);
	$run = has_action( 'zeen_end_post_sticky_wrap' );
	if ( ! empty( $run ) ) {
		echo '<div class="post__after__block entry-footer">';
	}
	if ( empty( $ipl ) ) {
		do_action( 'zeen_end_post_sticky_wrap', $args );
	} else {
		do_action( 'zeen_end_post_sticky_wrap_auto_next_post', $args );
	}
	if ( ! empty( $run ) ) {
		echo '</div>';
	}
}

/**
 * Post Schema
 *
 * @since 1.0.0
 */
function zeen_schema( $post ) {
	if ( get_theme_mod( 'schema', 1 ) != 1 ) {
		return;
	}
	$facebook = get_theme_mod( 'icons_facebook' );
	$twitter = get_theme_mod( 'icons_twitter' );
	$network_site = network_site_url( '/' );
	$crumbs = zeen_breadcrumbs( true );
	echo '<script type="application/ld+json">{';
	echo '"@context": "http://schema.org",
	"@type": "WebPage",
	"name": "' . esc_attr( get_bloginfo( 'name' ) ) . '",
	"description": "' . esc_attr( get_bloginfo( 'description' ) ) . '",';
	if ( is_single() ) {
		global $post;
		if ( get_theme_mod( 'voice_search' ) == 1 && get_post_meta( $post->ID, 'zeen_voice_search', true ) == 1 ) {
			echo '"speakable": {
				"@type": "SpeakableSpecification",
				"xpath": [
					"/html/head/title",
					"/html/head/meta[@name=\'description\']/@content"
				]
			},';
		}
	}
	echo '"url": "' . esc_url( $network_site ) . '",';
	if ( is_single() ) {
		$date = get_the_date( 'c', $post->ID );
		$mod_date = get_the_modified_time( 'c', $post->ID );
		echo '"datePublished": "' . esc_attr( $date ) . '",';
		echo '"dateCreated": "' . esc_attr( $date ) . '",';
		echo '"dateModified": "' . esc_attr( $mod_date ) . '",';
	}
	if ( ( ! empty( $facebook ) && 'codetipi' != $facebook ) || ( ! empty( $twitter ) && 'codetipi' != $twitter ) ) {
		echo '"sameAs": [';
		$first = true;
		if ( ! empty( $facebook ) ) {
			$first = '';
			echo '"https://facebook.com/' . esc_attr( $facebook ) . '"';
		}
		if ( ! empty( $twitter ) ) {
			if ( empty( $first ) ) {
				echo ',';
			}
			echo '"https://twitter.com/' . esc_attr( $twitter ) . '"';
		}
		echo '],';
	}
	echo '"potentialAction": {
	"@type": "SearchAction",
	"target": "' . esc_url( $network_site ) . '?s=&#123;search_term&#125;",
	"query-input": "required name=search_term"}';

	if ( ! empty( $crumbs ) ) {
		echo ',"breadcrumb":{ "@type": "BreadcrumbList","itemListElement": [';
		$i = 1;
		$first = true;
		foreach ( $crumbs as $key => $value ) {
			if ( empty( $first ) ) {
				echo ',';
			}
			$first = '';
			echo '{"@type": "ListItem",	"position": ' . (int) $i . ', "item": {
				"@id": "' . esc_url( $value ) . '",
				"name": "' . esc_attr( $key ) . '"
				}
				}';
			$i++;
		}
		echo ']}';
	}
	echo '}</script>';
}

/**
 * Post Before Blocks
 *
 * @since 1.0.0
 */
function zeen_post_before_blocks( $post = '' ) {
	if ( ! is_single() || 'attachment' == $post->post_type || 'revision' == $post->post_type || 'nav_menu_item' == $post->post_type || zeen_is_bbp() || zeen_is_bp() || zeen_is_woocommerce() ) {
		return;
	}
	$pid = $post->ID;
	$a_id = empty( $post->post_author ) ? '' : $post->post_author;
	$args = array( 'pid' => $pid, 'aid' => $a_id, 'action_type' => 'single', 'hook' => 'before' );
	$args['design'] = get_theme_mod( 'single_share_design_start_article', 1 );
	do_action( 'zeen_post_before_blocks', $args );

}

/**
 * Post Before Blocks
 *
 * @since 1.0.0
 */
function zeen_post_before_content( $post = '', $ipl = '' ) {

	if ( empty( $ipl ) && ( ! is_single() || 'attachment' == $post->post_type || 'page' == $post->post_type ) ) {
		return;
	}

	$pid = $post->ID;
	$a_id = $post->post_author;
	$args = array( 'pid' => $pid, 'aid' => $a_id, 'action_type' => 'single', 'hook' => 'before_content' );
	if ( empty( $ipl ) ) {
		do_action( 'zeen_post_before_content', $args );
	} else {
		do_action( 'zeen_post_before_content_auto_next_post', $args );
	}
}

/**
 * Post End Ad
 *
 * @since 1.0.0
 */
function zeen_post_before_ad() {
	zeen_ad( 'post_before_content' );
}


/**
 * Page Footer Blocks
 *
 * @since 1.0.0
 */
function zeen_page_footer_blocks( $post = '' ) {

	$pid = $post->ID;
	zeen_link_pages();
	if ( get_theme_mod( 'pages_share' ) == 1 ) {
		zeen_share( array( 'pid' => $pid ) );
	}
	if ( get_theme_mod( 'pages_comment', 1 ) == 1 ) {
		zeen_comment_template();
	}

}

/**
 * Post Comments Block
 *
 * @since 1.0.0
 */
function zeen_comment_template( $args = '', $standalone = '' ) {
	$design = get_theme_mod( 'single_comments_design', 1 );
	if ( ! comments_open() && ! get_comments_number() ) {
		$design = 0;
	}
	$fb_coms = get_theme_mod( 'fb_comments' );
	global $post;
	if ( empty( $args['ipl'] ) ) {
		$class = 'comments__type-' . (int) $design;
		$class .= 2 == $design ? ' collapsible__wrap' : '';
		$class .= ! empty( $standalone ) ? ' tipi-col tipi-xs-12 standalone-comments clearfix' : '';
		echo '<div class="' . esc_attr( $class ) . '">';
		if ( 2 == $design ) {
			echo '<a href="#" class="comments--reveal zeen-effect collapsible__title tipi-button tipi-xs-12">';
			esc_html_e( 'Show Comments', 'zeen' );
			if ( empty( $fb_coms ) ) {
				echo ' (';
				echo get_comments_number( $post->ID );
				echo ')';
			}
			echo '<i class="tipi-i-chevron-down"></i>';
			echo '</a>';
			echo '<div class="collapsible__content">';
		}
		if ( ! empty( $fb_coms ) ) {
			zeen_fb_coms( $post->ID );
		} else {
			comments_template();
		}
		if ( 2 == $design ) {
			echo '</div>';
		}
		echo '</div>';
	} else {
		zeen_ipl_coms( array( 'pid' => $args['pid'] ) );
	}

}


/**
 * FB SDK
 *
 * @since 1.0.0
 */
function zeen_fb() {
	$fb_app_id = get_theme_mod( 'facebook_app_id' );
	if ( empty( $fb_app_id ) || ! is_single() || get_theme_mod( 'fb_comments' ) != 1 ) {
		return;
	}
	?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/<?php echo esc_attr( get_locale() ); ?>/sdk.js#xfbml=1&version=v3.2&appId=<?php echo esc_attr( $fb_app_id ); ?>';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<?php
}
add_action( 'wp_footer', 'zeen_fb' );

function zeen_comment_form_defaults( $defaults ) {
	$defaults['title_reply_before'] = '<h3 id="reply-title" class="footer-block-title comment-reply-title">';
	$defaults['title_reply_after'] = '</h3>';
	$defaults['label_submit'] = esc_attr__( 'Submit', 'zeen' );
	$defaults['format'] = 'html5';
	$defaults['submit_button'] = '<input name="%1$s" type="submit" id="%2$s" class="%3$s tipi-button" value="%4$s" />';

	return $defaults;
}
add_filter( 'comment_form_defaults', 'zeen_comment_form_defaults' );

/**
 * Post Previous Next Block
 *
 * @since 1.0.0
 */
function zeen_previous_next_block( $args = array() ) {
	if ( empty( $args['pid'] ) ) {
		global $post;
		$pid = $post->ID;
	} else {
		$pid = $args['pid'];
	}

	if ( 'single' == $args['action_type'] && ( get_theme_mod( 'single_next_previous', 1 ) != 1 || get_post_meta( $pid, 'zeen_next_previous', true ) == '2' ) ) {
		return;
	}

	global $post;

	$zeen_next = get_next_post( apply_filters( 'zeen_previous_next_post_same_category', '' ) );
	$zeen_prev = get_previous_post( apply_filters( 'zeen_previous_next_post_same_category', '' ) );
	$classes = 'next-prev-posts clearfix next-prev__design-1';
	if ( empty( $zeen_next ) || empty( $zeen_prev ) ) {
		$classes .= ' just-one';
	}
	if ( ( ! empty( $zeen_prev ) || ! empty( $zeen_next ) ) && 'attachment' != $post->post_type ) {
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<?php if ( ! empty( $zeen_prev ) ) {
			$pid = $zeen_prev->ID;
			$tid = get_post_meta( $pid, '_thumbnail_id', true );
			echo '<div class="prev-block prev-next-block clearfix">';
			if ( ! empty( $tid ) ) {
			?>
				<div class="mask">
					<a href="<?php echo esc_url( get_permalink( $pid ) ); ?>">
						<i class="tipi-i-long-left"></i>
						<?php zeen_featured_img( $pid, array( 'secondary' => 'off', 'width' => 100, 'height' => 100 ) ); ?>
					</a>
				</div>
			<?php } ?>
				<div class="meta">
					<a href="<?php echo esc_url( get_permalink( $pid ) ); ?>" class="previous-title title">
						<span><?php esc_html_e( 'Previous', 'zeen' ); ?></span>
						<?php echo get_the_title( $pid ); ?>
					</a>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! empty( $zeen_next ) ) {
			$pid = $zeen_next->ID;
			$tid = get_post_meta( $pid, '_thumbnail_id', true );
			echo '<div class="next-block prev-next-block clearfix">';
			if ( ! empty( $tid ) ) {
			?>
				<div class="mask">
					<i class="tipi-i-long-right"></i>
					<a href="<?php echo esc_url( get_permalink( $pid ) ); ?>">
						<?php zeen_featured_img( $pid, array( 'secondary' => 'off', 'width' => 100, 'height' => 100 ) ); ?>
					</a>
				</div>
			<?php } ?>
				<div class="meta">
					<a href="<?php echo esc_url( get_permalink( $pid ) ); ?>" class="next-title title">
						<span><?php esc_html_e( 'Next', 'zeen' ); ?></span>
						<?php echo get_the_title( $pid ); ?>
					</a>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }
}
/**
 * Post Previous Next Block Slide
 *
 * @since 2.5.0
 */
function zeen_previous_next_block_slide( $args = array() ) {
	if ( ! is_single() ) {
		return;
	}
	global $post;
	if ( get_theme_mod( 'single_next_previous', 1 ) != 1 || get_post_meta( $post->ID, 'zeen_next_previous', true ) == '2' ) {
		return;
	}

	$posts = array();
	if ( 'attachment' == $post->post_type ) {
		return;
	}
	$posts['prev'] = get_next_post( apply_filters( 'zeen_previous_next_post_same_category', '' ) );
	$posts['next'] = get_previous_post( apply_filters( 'zeen_previous_next_post_same_category', '' ) );
	foreach ( $posts as $key => $value ) {
		if ( empty( $value ) ) {
			continue;
		}
		$tid = get_post_meta( $value->ID, '_thumbnail_id', true );
		echo '<div id="' . esc_attr( $key ) . '-block__wrap" class="next-prev__design-2 tipi-vertical-c next-prev__' . esc_attr( $key ) . '">';
		echo '<div class="next-prev__trigger tipi-all-c">';
		if ( 'next' == $key ) {
			echo '<i class="tipi-i-arrow-right"></i>';
		} else {
			echo '<i class="tipi-i-arrow-left"></i>';
		}
		echo '</div>';
		echo '<div class="next-prev__contents">';
		if ( has_post_thumbnail( $value->ID ) ) {
			echo '<div class="mask">';
			zeen_featured_img( $value->ID, array( 'link' => true, 'secondary' => 'off', 'width' => 100, 'height' => 100 ) );
			echo '</div>';
		}
		echo '<div class="meta">';
		echo '<div class="pre-title">';
		if ( 'next' == $key ) {
			esc_html_e( 'Next', 'zeen' );
		} else {
			esc_html_e( 'Previous', 'zeen' );
		}
		echo '</div>';
		echo '<a href="' . esc_url( get_permalink( $value->ID ) ) . '" class="title">';
		echo get_the_title( $value->ID );
		echo '</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}

function zeen_block_js( $args ) {
	$mnp = isset( $args['mnp'] ) ? $args['mnp'] : '';
	$echo = ! isset( $args['echo'] ) ? '' : $args['echo'];
	if ( empty( $echo ) ) {
		ob_start();
	} else {
		echo '<script>';
	}
	?>
	var zeen_<?php echo (int) $args['uid']; ?> = {
		id: <?php echo (int) $args['uid']; ?>,
		next: 2,
		prev: 0,
		target: 0,
		mnp: <?php echo (int) $mnp; ?>,
		preview: <?php echo (int) $args['preview']; ?>,
		is110: <?php echo (int) $args['is110']; ?>,
		counter: <?php echo (int) $args['counter']; ?>,
		counter_class: <?php echo wp_json_encode( esc_attr( $args['counter_class'] ) ); ?>,
		post_subtitle: <?php echo wp_json_encode( esc_attr( $args['post_subtitle'] ) ); ?>,
		excerpt_off: <?php echo (int) $args['excerpt_off']; ?>,
		excerpt_length: <?php echo (int) $args['excerpt_length']; ?>,
		excerpt_full: <?php echo (int) $args['excerpt_full']; ?>,
		img_shape: <?php echo (int) $args['img_shape']; ?>,
		byline_off: <?php echo (int) $args['byline_off']; ?>,
		fi_off: <?php echo (int) $args['fi_off']; ?>,
		ppp: <?php echo (int) $args['ppp']; ?>,
		args: <?php echo wp_json_encode( $args['qry_args'] ); ?>
	};
	<?php
	if ( ! empty( $args['quick'] ) ) {
		$args['qry_args']['offset'] = empty( $args['qry_args']['offset'] ) ? $args['qry_args']['posts_per_page'] : (int) $args['qry_args']['offset'] + (int) $args['qry_args']['posts_per_page'];
		$options = array(
			'qry'           => $args['qry_args'],
			'uid'           => $args['uid'],
			'preview'       => $args['preview'],
			'mobile'        => 'off',
			'is110'         => (int) $args['is110'],
			'counter'       => (int) $args['counter'],
			'counter_class' => wp_json_encode( esc_attr( $args['counter_class'] ) ),
			'post_subtitle' => wp_json_encode( esc_attr( $args['post_subtitle'] ) ),
			'excerpt_off'   => (int) $args['excerpt_off'],
			'excerpt_length' => (int) $args['excerpt_length'],
			'excerpt_full'  => (int) $args['excerpt_full'],
			'img_shape'     => (int) $args['img_shape'],
			'byline_off'    => (int) $args['byline_off'],
			'fi_off'        => (int) $args['fi_off'],
			'ppp'           => (int) $args['ppp'],
			'only_inner'    => true,
			'ndp_skip'      => true,
			'mnp'           => true,
			'specific'      => 'js',
		);
		$block = zeen_block_pick( $options );
		$response = $block->output( false );
		$mnp = $block->mnp();

		if ( ! empty( $response ) ) {
			?>
			var zeen_<?php echo (int) $args['uid']; ?>_2 = {
			0: <?php echo (int) ( $mnp ) + 1; ?>,
			1: <?php echo wp_json_encode( trim( $response ) ); ?>
			}; <?php
		}
	}

	if ( empty( $echo ) ) {
		return ob_get_clean();
	} else {
		echo '</script>';
	}
}

/**
 * Post Small Related Posts Above Hero
 *
 * @since 3.2.2
 */
function zeen_related_posts_small( $post = '', $args = array(), $hero_size = '' ) {
	if ( empty( $post ) ) {
		global $post;
	}
	$pid = $post->ID;
	$override = get_post_meta( $pid, 'zeen_related_posts_hero', true );
	$override = empty( $override ) ? 99 : $override;
	if ( $override == '2' || ( get_theme_mod( 'single_related_posts_above_hero' ) != 1 && $override == '99' ) || ! is_single() ) {
		return;
	}
	$hero_size = empty( $hero_size ) ? $args['hero_size'] : $hero_size;
	$ppp = $hero_size == 's' ? 2 : 3;
	$max_col_2 = false;
	$ppp = 3;
	if ( $hero_size == 's' ) {
		$max_col_2 = true;
		$ppp = 2;
	}

	$qry = zeen_related_posts_qry( array(
		'ppp' => $ppp,
		'pid' => $pid,
		'p' => 22,
	) );

	if ( empty( $qry['cat'] ) && empty( $qry['tag'] ) && empty( $qry['tax_query'] ) ) {
		return;
	}
	$options = array(
		'qry' => $qry,
		'preview' => 22,
		'max_col_2' => $max_col_2,
		'nosubcats'  => true,
		'shape_override' => 's',
		'title_block_off' => true,
		'contained' => $max_col_2,
		'uid' => zeen_uid(),
		'specific' => 'related',
		'excerpt_off' => true,
		'custom_class' => 'content-bg',
		'separator_off' => true,
		'load_more'  => 2,
		'post_subtitle'  => 'off',
		'mobile' => 'false',
	);

	echo '<div class="related-posts-wrap-hero clearfix">';
	$block = zeen_block_pick( $options );
	$block->output();
	if ( empty( $block->found_posts ) && ! empty( $options['qry']['meta_key'] ) ) {
		unset( $options['qry']['meta_key'] );
		$block = zeen_block_pick( $options );
		$block->output();
	}
	echo '</div>';
}

/**
 * Post Related Posts QRY
 *
 * @since 3.2.2
 */
function zeen_related_posts_qry( $args = array() ) {
	$post_type = get_post_type( $args['pid'] );
	$order = empty( $args['order'] ) ? get_theme_mod( 'single_related_posts_order', 1 ) : $args['order'];
	if ( empty( $args['ppp'] ) ) {
		$args['ppp'] = get_theme_mod( 'single_related_posts_ppp', 4 );
		if ( 52 == $args['p'] ) {
			$args['ppp'] = max( $args['ppp'], 3 );
		} elseif ( 53 == $args['p'] ) {
			$args['ppp'] = max( $args['ppp'], 4 );
		}
	}

	$qry = array(
		'post__not_in' => array( $args['pid'] ),
		'posts_per_page' => $args['ppp'],
		'post_type' => $post_type,
	);
	if ( 3 == $order ) {
		$qry['orderby'] = 'rand';
	} elseif ( 2 == $order ) {
		$qry['order'] = 'ASC';
	}

	if ( 'post' == $post_type ) {
		$source = get_theme_mod( 'single_related_posts_source', 1 );

		if ( $source > 1 ) {
			$tags = wp_get_post_tags( $args['pid'] );
			if ( ! empty( $tags ) ) {
				$tag_qry = '';
				foreach ( $tags as $tag ) {
					$tag_qry .= $tag->slug . ',';
				}
				$qry['tag'] = rtrim( $tag_qry, ',' );
			}
		}
		if ( 3 == $source ) {
			if ( empty( $qry['tag'] ) ) {
				$fb = true;
			} else {
				foreach ( $tags as $tag ) {
					$total = get_term_by( 'id', $tag->term_id, 'post_tag' );
					if ( $total->count > 1 ) {
						$fb = '';
						break;
					} else {
						$fb = true;
					}
				}
			}
		}
		if ( 1 == $source || ! empty( $fb ) ) {
			$qry['tag'] = '';
			$cats = get_the_category();
			if ( ! empty( $cats ) ) {
				$all_cats = '';
				foreach ( $cats as $cat ) {
					$all_cats .= $cat->term_id . ',';
				}
				$qry['cat'] = rtrim( $all_cats, ',' );
			}
		}
	} else {
		$taxonomies = get_object_taxonomies( $post_type );
		if ( ! empty( $taxonomies[0] ) ) {
			$tids = get_the_terms( $args['pid'], $taxonomies[0] );
		}
		if ( ! empty( $tids ) ) {
			$all_tids = '';
			foreach ( $tids as $cat ) {
				$all_tids .= $cat->slug . ',';
			}
			$qry['tax_query'] = array(
				array(
					'taxonomy' => $taxonomies[0],
					'field' => 'slug',
					'terms' => $all_tids,
				),
			);
		}
	}
	return $qry;
}

/**
 * Post Related Posts
 *
 * @since 1.0.0
 */
function zeen_related_posts( $args = array() ) {
	if ( empty( $args['pid'] ) ) {
		global $post;
		$pid = $post->ID;
		$args['pid'] = $pid;
	} else {
		$pid = $args['pid'];
	}
	if ( 'single' == $args['action_type'] && ( get_theme_mod( 'single_related_posts', 1 ) != 1 || get_post_meta( $pid, 'zeen_related_posts', true ) == '2' ) && empty( $args['override'] ) ) {
		return;
	}

	$args['p'] = empty( $args['p'] ) ? get_theme_mod( 'single_related_posts_design', 29 ) : $args['p'];

	$classes = empty( $args['classes'] ) ? '' : $args['classes'];
	$separator_off = empty( $args['separator_off'] ) ? '' : true;
	$title_block_off = empty( $args['title_block_off'] ) ? '' : true;
	$fs = empty( $args['fs'] ) ? '' : $args['fs'];
	$byline_off = empty( $args['byline_off'] ) ? '' : $args['byline_off'];
	$contained = isset( $args['contained'] ) ? $args['contained'] : true;
	$qry = zeen_related_posts_qry( $args );

	if ( empty( $qry['cat'] ) && empty( $qry['tag'] ) && empty( $qry['tax_query'] ) ) {
		return;
	}
	$title = esc_html__( 'Related', 'zeen' );

	if ( get_post_meta( $pid, '_lets_review_onoff', true ) == 1 ) {
		$type = get_post_meta( $pid, '_lets_review_type', true );
		if ( 1 == $type ) {
			$qry['meta_key'] = '_lets_review_final_score_100';
		} else {
			$qry['meta_key'] = '_lets_review_user_rating';
		}
	}
	$post_subtitle = '';
	if ( get_theme_mod( 'single_related_posts_only_title' ) == 1 ) {
		$byline_off = true;
		$post_subtitle = 'off';
	}
	$date = get_theme_mod( 'single_related_posts_date', 1 );
	if ( $date > 1 ) {
		$length_time = 7 != $date ? 'months' : 'days';
		$qry['date_query'] = array(
			array(
				'inclusive' => true,
				'after'  => $date . ' ' . $length_time . ' ago',
			),
		);
	}
	$img_shape = '';
	if ( 83 == $args['p'] || 52 == $args['p'] || 53 == $args['p'] ) {
		$img_shape = 2;
	}
	$per_row = '';
	if ( 22 == $args['p'] ) {
		$per_row = $qry['posts_per_page'] % 3 == 0 ? 3 : 2;
	}
	$load_more = get_theme_mod( 'single_related_posts_ajax_arrow', 1 ) == 1 ? 2 : '';
	$qry = apply_filters( 'zeen_related_posts_query_args', $qry, $pid );
	if ( $args['p'] > 50 && $args['p'] < 60 ) {
		$check = new WP_Query( $qry );
		if ( $check->found_posts == 1 ) {
			$args['p'] = 81;
		} elseif ( $check->found_posts == 2 ) {
			$args['p'] = 82;
		} elseif ( $check->found_posts == 3 ) {
			$args['p'] = 83;
		}
		wp_reset_postdata();
	}
	$options = array(
		'qry'        => $qry,
		'preview'    => $args['p'],
		'max_col_2' => true,
		'nosubcats'  => true,
		'posts_per_row' => $per_row,
		'img_shape' => apply_filters( 'zeen_related_posts_image_shape', $img_shape ),
		'title_block_off' => $title_block_off,
		'fs' => $fs,
		'uid' => zeen_uid(),
		'contained' => $contained,
		'specific' => 'related',
		'excerpt_off' => apply_filters( 'zeen_related_excerpt_disabled', true ),
		'byline_off' => $byline_off,
		'separator_off' => $separator_off,
		'load_more'  => $load_more,
		'post_subtitle'  => $post_subtitle,
		'title'      => apply_filters( 'zeen_related_title', $title ),
		'subtitle'   => apply_filters( 'zeen_related_subtitle', '' ),
		'mobile'     => 'true',
	);

	echo '<div class="related-posts-wrap clearfix' . esc_attr( $classes ) . '">';
	$block = zeen_block_pick( $options );
	$block->output();
	if ( empty( $block->found_posts ) && ! empty( $options['qry']['meta_key'] ) ) {
		unset( $options['qry']['meta_key'] );
		if ( $options['preview'] > 50 && $options['preview'] < 60 ) {
			$check = new WP_Query( $options['qry'] );
			if ( $check->found_posts == 1 ) {
				$options['preview'] = 81;
			} elseif ( $check->found_posts == 2 ) {
				$options['preview'] = 82;
			} elseif ( $check->found_posts == 3 ) {
				$options['preview'] = 83;
			}
			wp_reset_postdata();
		}
		$block = zeen_block_pick( $options );
		$block->output();
	}
	echo '</div>';
}

/**
 * Tipi Block - Loader
 *
 * @since 1.0.0
 */
function zeen_block_loader( $args = '' ) {
	$loader = empty( $args['loader'] ) ? 1 : $args['loader'];
	$mnp = empty( $args['mnp'] ) ? '' : $args['mnp'];
	$size = empty( $args['size'] ) ? 1 : $args['size'];
	$echo = ! isset( $args['echo'] ) ? true : $args['echo'];
	$inner_only = empty( $args['inner_only'] ) ? '' : $args['inner_only'];
	if ( empty( $echo ) ) {
		ob_start();
	}
	if ( empty( $inner_only ) ) {
		echo '<div class="load-more-wrap load-more-size-' . (int) ( $size ) . ' load-more-wrap-' . (int) ( $loader ) . '">';
	}
	if ( 2 == $loader ) {
		?>
		<a href="#" data-id="<?php echo (int) ( $args['id'] ); ?>" class="tipi-arrow tipi-arrow-s tipi-arrow-l block-loader block-more block-more-1 no-more" data-dir="1"><i class="tipi-i-angle-left" aria-hidden="true"></i></a>
		<a href="#" data-id="<?php echo (int) ( $args['id'] ); ?>" class="tipi-arrow tipi-arrow-s tipi-arrow-r block-loader block-more block-more-2<?php if ( $mnp < 2 ) { ?> no-more<?php } ?>" data-dir="2"><i class="tipi-i-angle-right" aria-hidden="true"></i></a>
		<?php
	} else {
		echo '<a href="#" data-id="' . (int) ( $args['id'] ) . '" class="block-loader block-more block-more-1 tipi-button';
		echo ' custom-button__fill-' . get_theme_mod( 'load_more_fill', 1 );
		echo ' custom-button__size-' . get_theme_mod( 'load_more_size', 1 );
		echo ' custom-button__rounded-' . get_theme_mod( 'load_more_rounded', 1 );
		echo '">' . esc_html__( 'Load more', 'zeen' ) . '</a>';
	}
	if ( empty( $inner_only ) ) {
		echo '</div>';
	}
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}

/**
 * Ad
 *
 * @since 1.0.0
 */
function zeen_cta( $location = 'header', $check = '', $echo = true ) {
	if ( get_theme_mod( $location . '_cta' ) != 1 ) {
		return;
	}
	$mobile = strpos( $location, 'mobile' ) !== false ? true : '';
	if ( empty( $echo ) ) {
		ob_start();
	}
	if ( ! empty( $check ) ) {
		echo '<div class="tipi-button-cta-fill-l"></div>';
		return;
	}
	echo '<div class="tipi-button-cta-wrap tipi-vertical-c tipi-button-cta-wrap-' . $location;
	if ( 'header' == $location ) {
		echo ' tipi-xs-0';
	}
	echo '">';
	$url = get_theme_mod( $location . '_cta_url' );
	if ( '#subscribe' == $url || '#login' == $url ) {
		$modal = true;
		$type = '#subscribe' == $url ? 'subscribe' : 'lwa';
		$url = '#';
	}
	echo '<a href="' . esc_url( $url ) . '" class="tipi-button-cta tipi-button-cta-' . esc_attr( $location ) . ' tipi-button tipi-all-c';
	echo ' custom-button__fill-' . (int) get_theme_mod( $location . '_cta_fill', 1 );
	echo ' custom-button__size-' . (int) get_theme_mod( $location . '_cta_size', 1 );
	echo ' custom-button__rounded-' . (int) get_theme_mod( $location . '_cta_rounded', 1 );
	if ( empty( $mobile ) ) {
		echo ' button-arrow-r button-arrow';
	}
	if ( ! empty( $modal ) ) {
		echo ' modal-tr" data-type="' . esc_attr( $type );
	}
	echo '"';
	if ( empty( $modal ) && get_theme_mod( $location . '_cta_new_tab' ) == 1 ) {
		echo ' target="_blank" rel="noopener"';
	}
	echo '><span class="button-text button-title">' . zeen_sanitize_titles( get_theme_mod( $location . '_cta_content' ) ) . '</span>';
	if ( empty( $mobile ) ) {
		echo ' <i class="tipi-i-arrow-right"></i>';
	}
	echo '</a>';
	echo '</div>';
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}
/**
 * Ad
 *
 * @since 1.0.0
 */
function zeen_ad( $location = 'header', $wrap = false, $echo = true ) {
	$class = '';
	if ( 'archive_below' == $location ) {
		$location = 'archive';
		$below = true;
		$wrap = true;
	}
	if ( 'archive' == $location ) {
		$class = ' archive-da';
		if ( is_category() ) {
			$location = 'category';
		} elseif ( is_tag() ) {
			$location = 'tags';
		} elseif ( is_author() ) {
			$location = 'author';
		} elseif ( is_tax() ) {
			$location = 'tax';
		}
		if ( ! empty( $below ) ) {
			$location = $location . '_below';
		}
	}
	if ( get_theme_mod( $location . '_pub' ) == '' ) {
		return;
	}
	if ( empty( $echo ) ) {
		ob_start();
	}
	$class .= ( 'header' == $location ) ? ' tipi-flex-right' : '';
	if ( ! empty( $wrap ) ) {
		echo '<div class="';
		if ( ! empty( $below ) ) {
			echo 'tipi-row content-bg clearfix below-da';
		} else {
			echo 'tipi-xs-12';
		}
		echo '">';
	}
	echo '<div class="block-da-1 block-da block-da-' . esc_attr( $location . $class ) . ' clearfix">' . do_shortcode( zeen_sanitize_wp_kses( get_theme_mod( $location . '_pub' ) ) ) . '</div>';
	if ( ! empty( $wrap ) ) {
		echo '</div>';
	}
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}

/**
 * Mobile Menu Close
 *
 * @since 1.0.0
 */
function zeen_mobile_menu_close() {
	echo '<a href="#" class="mob-tr-close tipi-x-wrap"><i class="tipi-x tipi-x-l"></i></a>';
}

/**
 * Get pagi URL
 *
 * @since 1.0.0
 */
function zeen_get_pagi_url( $pagenum = 1, $escape = true, $root = '' ) {

	global $wp_rewrite;
	$pagenum = (int) $pagenum;
	$request = $root ? remove_query_arg( 'paged', $root ) : remove_query_arg( 'paged' );
	$home_root = wp_parse_url( home_url() );
	$home_root = ( isset( $home_root['path'] ) ) ? $home_root['path'] : '';
	$home_root = preg_quote( $home_root, '|' );
	$request = preg_replace( '|^' . $home_root . '|i', '', $request );
	$request = preg_replace( '|^/+|', '', $request );
	if ( ! $wp_rewrite->using_permalinks() || is_admin() ) {
		$base = trailingslashit( home_url() );
		if ( $pagenum > 1 ) {
			$result = add_query_arg( 'paged', $pagenum, $base . $request );
		} else {
			$result = $base . $request;
		}
	} else {
		$qs_regex = '|\?.*?$|';
		preg_match( $qs_regex, $request, $qs_match );
		if ( ! empty( $qs_match[0] ) ) {
			$query_string = $qs_match[0];
			$request = preg_replace( $qs_regex, '', $request );
		} else {
			$query_string = '';
		}
		$request = preg_replace( "|$wp_rewrite->pagination_base/\d+/?$|", '', $request );
		$request = preg_replace( '|^' . preg_quote( $wp_rewrite->index, '|' ) . '|i', '', $request );
		$request = ltrim( $request, '/' );
		$base = trailingslashit( home_url() );
		$using_index = $wp_rewrite->using_index_permalinks();
		if ( $using_index && ( $pagenum > 1 || '' != $request ) ) {
			$base .= $wp_rewrite->index . '/';
		}
		if ( $pagenum > 1 ) {
			$request = ( ( ! empty( $request ) ) ? trailingslashit( $request ) : $request ) . user_trailingslashit( $wp_rewrite->pagination_base . '/' . $pagenum, 'paged' );
		}
		$result = $base . $request . $query_string;
	}

	$result = apply_filters( 'get_pagenum_link', $result );
	if ( $escape ) {
		return esc_url( $result );
	} else {
		return esc_url_raw( $result );
	}
}

/**
 * Single bones
 *
 * @since 1.0.0
 */
function zeen_single_bones( $args = array() ) {
	$style = empty( $args['style'] ) ? array() : $args['style'];
	$layout = empty( $args['layout'] ) ? 1 : $args['layout'];
	$ipl = empty( $args['ipl'] ) ? '' : true;
	$style['hero_design'] = empty( $style['hero_design'] ) ? 1 : $style['hero_design'];
	$style['media_design'] = empty( $style['media_design'] ) ? '' : $style['media_design'];
	global $post;
	$single_post = $post;
	if ( ! empty( $args['builder'] ) ) {
		$content = get_post_meta( $single_post->ID, 'tipi_builder_data', true );
		zeen_builder_data( $content );
		return;
	}

	if ( ! empty( $args['style']['post_format'] ) && 21 == $args['style']['media_design'] ) {
		if ( empty( $args['style']['ipl'] ) ) {
			zeen_comment_template( array(), true );
		}
		return;
	}
	$footer_classes = $layout > 57 ? ' tipi-row tipi-l-8' : '';
	$footer_off = zeen_woo_active() && ( is_cart() || is_checkout() ) ? true : '';
	$main_class = 'site-main tipi-xs-12 main-block-wrap block-wrap tipi-col clearfix';
	$main_class .= empty( $footer_off ) ? ' tipi-l-8' : '';
	?>
	<main class="<?php echo esc_attr( $main_class ); ?>">
		<article>
			<?php
			do_action( 'zeen_single_article_start' );
			if ( $style['hero_design'] < 9 ) {
				do_action( 'zeen_above_featured_image' );
				zeen_hero_design( $style, true, true );
			}

			if ( ( $style['hero_design'] > 10 || 4 == $style['hero_design'] ) && 31 != $style['hero_design'] && 'cut-bc' != $style['title_location'] && 'cut-bl' != $style['title_location'] && 'beneath' != $style['title_location'] ) {
				zeen_breadcrumbs();
			}

			if ( 'beneath' == $style['title_location'] ) {
				zeen_breadcrumbs( '', 'm' );
				zeen_hero_title( $single_post, $style );
			}
			$entry_content_class = 'entry-content body-color clearfix';
			if ( ! zeen_is_woocommerce() ) {
				$entry_content_class .= ' link-color-wrap';
			}
			if ( $layout > 57 ) {
				$entry_content_class .= ' sticky-el';
			}
			?>
			<div class="entry-content-wrap clearfix">
				<?php if ( ! is_page() ) { ?>
					<?php zeen_post_before_blocks( $single_post ); ?>
				<?php } ?>
				<?php zeen_article_side( $single_post->ID, $layout ); ?>
				<div class="<?php echo esc_attr( $entry_content_class ); ?>">
					<?php if ( ! is_page() ) { ?>
						<?php zeen_post_before_content( $single_post, $ipl ); ?>
					<?php } ?>
					<?php if ( ! empty( $ipl ) ) { ?>
						<?php echo zeen_post_sponsor( '', true, $single_post->ID ); ?>
					<?php } ?>
					<?php
					echo zeen_date_updated( $single_post->ID );
					if ( ! empty( $ipl ) ) {
						if ( class_exists( 'WPBMap' ) ) {
							$vc_style = get_post_meta( $single_post->ID, '_wpb_shortcodes_custom_css', true );
							if ( ! empty( $vc_style ) ) {
								echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
								echo strip_tags( get_post_meta( $single_post->ID, '_wpb_shortcodes_custom_css', true ) );
								echo '</style>';
							}
							WPBMap::addAllMappedShortcodes();
						}
						$content = str_replace( '<!--more-->', '', $single_post->post_content );
						$the_content = apply_filters( 'the_content', $content );
						echo apply_filters( 'zeen_the_content_ipl', $the_content );
					} else {
						if ( apply_filters( 'zeen_the_content_override', '' ) == true ) {
							echo apply_filters( 'zeen_the_content', '' );
						} else {
							the_content();
						}
					}
					?>
					<?php if ( ! empty( $args['page_template'] ) ) { ?>
						<?php zeen_team( $args['page_template'] ); ?>
					<?php } ?>
				</div><!-- .entry-content -->
				<?php zeen_article_side_gallery( $single_post->ID, $layout ); ?>
			</div><!-- .entry-content -->
			<?php if ( empty( $footer_off ) ) { ?>
			<footer class="entry-footer<?php echo esc_attr( apply_filters( 'zeen_footer_classes', $footer_classes ) ); ?>">
				<?php
				if ( is_page() ) {
					zeen_page_footer_blocks( $single_post );
				} else {
					zeen_post_footer_blocks( $single_post, $ipl );
				}
				?>
			</footer><!-- .entry-footer -->
			<?php } ?>
		</article><!-- #post-x -->
	</main><!-- .site-main -->
	<?php
}

/**
 * Attachment bones
 *
 * @since 1.0.0
 */
function zeen_attachment_bones( $style = '' ) {
	global $post;
?>
	<main class="site-main tipi-xs-12 block-wrap tipi-m-8 tipi-col clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php zeen_hero_design( $style, true, true ); ?>
			<div class="entry-content-wrap clearfix">
				<div class="entry-content body-color link-color-wrap">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div><!-- .entry-content -->
		</article><!-- #post-x -->
	</main><!-- .site-main -->
<?php
}

/**
 * Article sides
 *
 * @since 1.0.0
 */
function zeen_article_side( $pid = '', $layout = 1 ) {

	if ( 2 != $layout && 12 != $layout && 32 != $layout ) {
		return;
	}

	$extras = get_post_meta( $pid, 'zeen_share_details', true );
	$extras_on = ! empty( $extras ) && ( ! empty( $extras[0]['title'] ) || ! empty( $extras[1]['title'] ) );
	$share = get_post_meta( $pid, 'zeen_article_layout_sticky_share', true );
	if ( empty( $share ) || 99 == $share ) {
		$share = get_theme_mod( 'article_layout_sticky_share' );
	}
	$share = 2 == $share ? '' : $share;
	$show_author = get_post_meta( $pid, 'zeen_article_layout_author', true );
	if ( empty( $show_author ) || 99 == $show_author ) {
		$show_author = get_theme_mod( 'article_layout_author' );
	}
	$show_author = 2 == $show_author ? '' : $show_author;
	$class = 'details';
	$class .= empty( $share ) ? '' : ' with-share';
	$class .= empty( $show_author ) ? '' : ' with-author';
	$class .= empty( $extras_on ) ? '' : ' with-info';
?>
	<div class="<?php echo esc_attr( $class ); ?>">
		<?php
		if ( ! empty( $show_author ) ) {
			$aid = get_the_author_meta( 'ID' );
			echo '<div class="side-author__wrap detail">';
			echo '<div class="mask">';
			echo '<a href="' . esc_url( get_author_posts_url( $aid ) ) . '">' . get_avatar( $aid, '70' ) . '</a>';
			echo '</div>';
			echo '<div class="side-meta">';
			echo '<a class="title" href="' . esc_url( get_author_posts_url( $aid ) ) . '">';
			the_author_meta( 'display_name', $aid );
			echo '</a>';
			echo ' <span class="job-title title-light">';
			the_author_meta( 'position', $aid );
			echo '</span>';
			echo '</div>';
			echo '</div>';
		}
		?>
			<?php if ( ! empty( $show_cats ) ) { ?>
			<div class="detail">
				<div class="pre-title title-light"><?php esc_html_e( 'Category', 'zeen' ); ?></div>
				<div class="title">
					<?php
					zeen_byline_category( $pid, array(
						'cat_design' => 9,
						'show_primary' => 'all',
					) );
					?>
				</div>
			</div>
			<?php } ?>
			<?php
			if ( ! empty( $extras_on ) ) {
				foreach ( $extras as $key ) {
				?>
				<div class="detail">
					<div class="pre-title title-light"><?php echo zeen_sanitize_wp_kses( $key['title'] ); ?></div>
					<div class="title"><?php echo zeen_sanitize_wp_kses( $key['content'] ); ?></div>
				</div>
				<?php
				}
			}
			if ( ! empty( $share ) ) {
			?>
			<div class="detail sharer sticky-el sharer-9">
				<div class="title">
					<?php zeen_share( array( 'pid' => $pid, 'design' => 11, 'block_title_off' => true, 'show_total' => true, 'counts' => true ) ); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	<?php
}

function zeen_react( $args = '' ) {
	$emotions = get_theme_mod( 'single_emotions' );
	if ( get_theme_mod( 'single_reactions' ) != 1 || empty( $emotions ) || post_password_required() ) {
		return;
	}
	$style = get_theme_mod( 'single_reactions_style', 1 );
	$count_style = get_theme_mod( 'single_reactions_score', 1 );
	$emotions_raw = apply_filters( 'zeen_emojis_titles', Zeen\ZeenHelpers::zeen_get_emotions() );
	$emotions_output = array();
	foreach ( $emotions as $key ) {
		$emotions_output[ $key ] = $emotions_raw[ $key ];
	}
	$counts = get_post_meta( $args['pid'], 'zeen_reaction', true );
	$total_reactions = 0;
	foreach ( $emotions_output as $key => $value ) {
		$count = empty( $counts[ $key ] ) ? 0 : $counts[ $key ];
		$total_reactions = $total_reactions + $count;
	}
	echo '<div class="reaction-wrap tipi-flex type-' . esc_attr( $style );
	if ( $total_reactions > 7 ) {
		echo ' reactions-mt-8 tipi-flex-wrap';
	}
	echo '"';

	echo ' data-pid="' . (int) $args['pid'] . '">';
	$cook = isset( $_COOKIE['reaction'] ) ? json_decode( stripslashes( html_entity_decode( $_COOKIE['reaction'] ) ), true ) : array();
	$cook = is_array( $cook ) ? $cook : array();
	foreach ( $emotions_output as $key => $value ) {
		$count = empty( $counts[ $key ] ) ? 0 : $counts[ $key ];
		echo '<a href="#" class="reaction reaction-' . esc_attr( $key ) . ' tipi-tip zeen-effect tipi-vertical-c';
		if ( ! empty( $counts ) && ! empty( $cook[ $args['pid'] ] ) && strpos( $cook[ $args['pid'] ], $key ) !== false && $count > 0 ) {
			echo ' reacted';
		}
		echo '" data-title="' . esc_attr( $value ) . '" data-reaction="' . esc_attr( $key ) . '">';

		if ( apply_filters( 'zeen_emojis_custom_on', false ) == true ) {
			do_action( 'zeen_emojis_custom', $key );
		} else {
			Zeen\ZeenHelpers::zeen_emojis( $key, $style );
		}
		echo '<span class="count font-1">';
		if ( 2 == $count_style ) {
			echo empty( $count ) ? 0 : (int) ( $count / $total_reactions * 100 );
			echo '<span>%</span>';
		} else {
			echo (int) $count;
		}
		echo '</span>';
		echo '</a>';
	}
	echo '</div>';

}

function zeen_thumbs_up_down() {

	if ( get_theme_mod( 'single_thumbs' ) != 1 || post_password_required() ) {
		return;
	}
	$pid = get_the_ID();
	$up_downs = get_post_meta( $pid, 'zeen_ur_up_down', true );
	$count_up = empty( $up_downs['up'] ) ? 0 : $up_downs['up'];
	$count_down = empty( $up_downs['down'] ) ? 0 : $up_downs['down'];
	echo '<div class="zeen-up-down zeen-effect tipi-vertical-c" data-pid="' . (int) $pid . '">';
	$title = get_theme_mod( 'single_thumbs_title' );
	if ( ! empty( $title ) ) {
		echo '<h3 class="title">';
		echo zeen_sanitize_wp_kses( $title );
		echo '</h3>';
	}
	echo '<div class="thumbs tipi-all-c">';
	echo '<a class="zeen__up-down zeen__up tipi-vertical-c tipi-button" href="#" data-type="up">';
	echo '<i class="tipi-i-thumbs-up"></i>';
	echo '<span class="updown-count">' . (int) $count_up . '</span>';
	echo '</a>';
	echo '<a class="zeen__up-down zeen__down tipi-vertical-c tipi-button" href="#" data-type="down">';
	echo '<i class="tipi-i-thumbs-down"></i>';
	echo '<span class="updown-count">' . (int) $count_down . '</span>';
	echo '</a>';
	echo '</div>';
	echo '</div>';
}

/**
 * Modals
 *
 * @since 1.0.0
 */
function zeen_article_side_gallery( $pid = '', $layout = 1 ) {
	if ( $layout < 58 ) {
		return;
	}
	$gallery = get_post_meta( $pid, 'zeen_article_layout_gallery', true );
	if ( empty( $gallery ) ) {
		return;
	}
?>
<div class="entry-side-gallery tipi-xs-12 tipi-m-6 sticky-el">
	<?php foreach ( $gallery as $key => $value ) { ?>
		<div class="img-wrap"><a href="<?php echo esc_url( wp_get_attachment_url( $value, 'zeen-770-full' ) ); ?>" class="tipi-lightbox" rel="gallery"><?php echo wp_get_attachment_image( $value, 'zeen-770-full' ); ?></a></div>
	<?php } ?>
</div>
<?php
}

/**
 * Trending Inline
 *
 * @since 1.0.0
 */
function zeen_trending_inline( $location = '', $args = array() ) {
	if ( ( 'secondary_menu' == $location && get_theme_mod( 'secondary_menu_trending_inline' ) != 1 ) || ( 'main_menu' == $location && get_theme_mod( 'main_menu_trending_inline' ) != 1 ) ) {
		return;
	}

	$uid = zeen_uid();
	$preview = 61;
	$ppp = get_theme_mod( 'trending_ppp', 3 );
	if ( 4 == $ppp ) {
		$preview = 71;
	} elseif ( 5 == $ppp ) {
		$preview = 79;
	}
	echo '<li class="trending-inline dropper drop-it mm-art mm-wrap';
	if ( 'main' == $location ) {
		echo ' menu-padding';
	}
	echo '">';
	echo '<a href="#" ';
	if ( 'main' == $location ) {
		echo 'id="trending-main"';
	} else {
		echo 'id="trending-secondary"';
	}
	echo ' class="main-title-wrap';
	if ( ! empty( $args['title_off'] ) ) {
		echo ' trending-icon-solo';
	}
	echo '">';

	echo '<i class="tipi-i-';
	$icon = get_theme_mod( 'trending_icon', 1 );
	if ( 2 == $icon ) {
		echo 'bolt';
	} elseif ( 3 == $icon ) {
		echo 'hash';
	} elseif ( 4 == $icon ) {
		echo 'flame';
	} elseif ( 5 == $icon ) {
		echo 'trend';
	} elseif ( 6 == $icon ) {
		echo 'trend-2';
	} else {
		echo 'zap';
	}

	echo ' tipi-trending-icon"></i>';
	$trending_text = get_theme_mod( 'trending_text' );
	if ( empty( $args['title_off'] ) ) {
		echo '<span class="trending-text">' . esc_html( $trending_text ) . '</span>';
	}
	echo '</a>';
	echo '<div class="trending-inline-drop menu tipi-row">';
	echo '<div class="trending-inline-title clearfix">';
	$trending_text = get_theme_mod( 'trending_mm_title', 'Trending' );
	echo '<div class="trending-op-title">' . esc_html( $trending_text ) . '</div>';
	if ( function_exists( 'stats_get_from_restapi' ) ) {
		echo '<div class="trending-ops" data-uid="' . (int) ( $uid ) . '">';
		echo '<span data-r="1" class="trending-op trending-op-1 trending-selected">' . esc_html__( 'Now', 'zeen' ) . '</span>';
		echo '<span data-r="2" class="trending-op trending-op-2">' . esc_html__( 'Week', 'zeen' ) . '</span>';
		echo '<span data-r="3" class="trending-op trending-op-3">' . esc_html__( 'Month', 'zeen' ) . '</span>';
		echo '</div>';
	}
	echo '</div>';
	echo '<div class="trending-inline-wrap">';
	$options = array(
		'qry' => apply_filters( 'zeen_trending_query_args', array(
			'posts_per_page' => $ppp,
			'trending' => array(
				'name' => 'zeen-trending-now',
				'num' => 2,
			),
		) ),
		'uid'             => $uid,
		'preview'         => $preview,
		'typo'            => 'tipi-m-typo',
		'ndp_skip'        => true,
		'specific'        => 'mm',
		'byline_off'      => true,
		'excerpt_off'     => true,
		'js_off'          => true,
		'wrap'            => 'off',
		'counter'         => true,
		'counter_class'   => 'border',
		'padding'         => '',
		'margin'          => '',
	);

	if ( function_exists( 'stats_get_from_restapi' ) ) {
		$options['qry']['post_type'] = zeen_get_post_types(
			array(
				'essentials' => true,
			)
		);
		if ( get_theme_mod( 'woocommerce_product_in_trending' ) == 1 ) {
			$options['qry']['post_type'][] = 'product';
		}
		$block = zeen_block_pick( $options );
		$output = $block->output();
	} else {
		echo '<div class="block-wrap tipi-doc-info clearfix">' . esc_html__( 'To display trending posts, please ensure the Jetpack plugin is installed and that the Stats module of Jetpack is active. Refer to the theme documentation for help.', 'zeen' ) . '</div>';
	}
	echo '</div>';
	echo '</div>';
	echo '</li>';

}

function zeen_current_date( $location = '' ) {
	if ( 'secondary_menu' == $location && get_theme_mod( 'secondary_date' ) != 1 || 'main_menu' == $location && get_theme_mod( 'main_menu_date' ) != 1 ) {
		return;
	}
	$class = 'secondary_menu' == $location ? 'secondary' : 'main';
	echo '<li class="current-date menu-padding date--' . esc_attr( $class ) . '">' . date_i18n( get_option( 'date_format' ) ) . '</li>';
}

function zeen_search_suggestions() {
	if ( 1 != get_theme_mod( 'search_show_suggestions', 1 ) ) {
		return;
	}
	echo '<div class="suggestions-wrap font-2">';
	do_action( 'zeen_search_suggestions' );

	if ( ! has_action( 'zeen_search_suggestions' ) ) {
		wp_tag_cloud( array(
			'orderby' => 'count',
			'order' => 'DESC',
			'smallest' => 12,
			'largest' => 12,
			'number' => 5,
			'unit' => 'px',
		) );
	}
	echo '</div>';
}

function zeen_search_ajax() {
	if ( get_theme_mod( 'search_ajax', 1 ) != 1 ) {
		return;
	}
	echo '<div class="content-found-wrap">';
	echo '<div class="content-found"></div>';
	echo '<div class="button-wrap"><a class="search-all-results button-arrow-r button-arrow tipi-button" href="#"><span class="button-title">' . esc_attr__( 'See all results', 'zeen' ) . '</span><i class="tipi-i-arrow-right"></i></a>';
	echo '</div>';
	echo '</div>';
}

/**
 * Modals
 *
 * @since 1.0.0
 */
function zeen_modals() {
	$modal_class = 'modal-wrap inactive';
	$subscribe_code = get_theme_mod( 'subscribe_code' );
	$fid = ! empty( $_POST['_mc4wp_form_element_id'] ) && ! empty( $subscribe_code ) ? $_POST['_mc4wp_form_element_id'] : '';
	if ( get_theme_mod( 'modal_skin', 1 ) == 2 ) {
		$modal_class .= ' dark-overlay';
	}
?>
<div id="modal" class="<?php echo esc_attr( $modal_class ); ?>" data-fid="<?php echo esc_attr( $fid ); ?>">
	<span class="tipi-overlay tipi-overlay-modal"></span>
	<div class="content tipi-vertical-c tipi-row">
		<div class="content-search search-form-wrap content-block">
			<?php get_search_form(); ?>
			<div class="search-hints">
				<span class="search-hint">
					<?php
					if ( get_theme_mod( 'search_ajax', 1 ) == 1 ) {
						echo esc_attr__( 'Start typing to see results or hit ESC to close', 'zeen' );
					} else {
						echo esc_attr__( 'Press ESC to close', 'zeen' );
					}
					?>
				</span>
				<?php zeen_search_suggestions(); ?>
			</div>
			<?php zeen_search_ajax(); ?>
		</div>

		<?php zeen_subscribe( '', ! isset( $_COOKIE['wp_timed_sub'] ) ); ?>
		<div class="content-lwa content-block site-img-<?php echo (int) ( zeen_skin_style( 'lwa', 'repeat' ) ); ?> site-skin-<?php echo (int) ( zeen_skin_style( 'lwa', 'skin', 2 ) ); ?>">
		<?php if ( function_exists( 'login_with_ajax' ) ) { ?>
			<div class="tipi-modal-bg bg-area">
				<?php if ( get_theme_mod( 'footer_icon_login' ) == 1 || get_theme_mod( 'mobile_icon_login' ) == 1 || get_theme_mod( 'secondary_menu_icon_login' ) == 1 || get_theme_mod( 'main_menu_icon_login' ) == 1 || apply_filters( 'zeen_modal_lwa_output', false ) == true ) { ?>
					<?php login_with_ajax(); ?>
					<?php zeen_elem_bg_area( 'lwa' ); ?>
				<?php } ?>
			</div>
		<?php } ?>
		</div>

		<div class="content-custom content-block">
		</div>
	</div>
	<a href="#" class="close tipi-x-wrap tipi-x-outer"><i class="tipi-i-close"></i></a>

</div>
<span id="tipi-overlay" class="tipi-overlay tipi-overlay-base tipi-overlay-dark"><a href="#" class="close tipi-x-wrap"><i class="tipi-i-close"></i></a></span>
<span id="light-overlay" class="tipi-overlay tipi-overlay-base tipi-overlay-light"></span>
<?php
}

/**
 * Search Dropdown
 *
 * @since 1.0.0
 */
function zeen_search_dropdown() {
	get_search_form();
	zeen_search_ajax();
}

/**
 * Top Bar Message
 *
 * @since 1.0.0
 */
function zeen_top_bar_message() {

	if ( get_theme_mod( 'top_bar_message' ) != 1 || ( get_theme_mod( 'top_bar_cookie', 1 ) == 1 && isset( $_COOKIE['wp_top_bar'] ) ) && ! is_customize_preview() ) {
		return;
	}

	echo '<div id="top-bar-message" class="top-bar-message font-2">';
	zeen_top_bar_message_content();
	echo '<div id="top-bar-message-close"><i class="tipi-i-close"></i></div>';
	echo '</div>';
}

/**
 * Top Bar Message Content - Needed separately for TO
 *
 * @since 1.0.0
 */
function zeen_top_bar_message_content() {
	echo '<span class="top-bar-message-content">';
	$url = get_theme_mod( 'top_bar_message_link' );
	if ( ! empty( $url ) ) {
		echo '<a href="' . esc_url( $url ) . '" rel="nofollow"';
		if ( get_theme_mod( 'top_bar_newtab' ) == 1 ) {
			echo ' target="_blank';
		}
		echo ' title="' . esc_attr( apply_filters( 'zeen_top_bar_title_attr', get_theme_mod( 'top_bar_message_content' ) ) ) . '">';
	}
	echo do_shortcode( zeen_sanitize_wp_kses( get_theme_mod( 'top_bar_message_content' ) ) );
	if ( ! empty( $url ) ) {
		echo '</a>';
	}
	echo '</span>';
}

/**
 * Popup
 *
 * @since 1.0.0
 */
function zeen_popup() {

	if ( get_theme_mod( 'timed_popup' ) != 1 || ! is_active_sidebar( 'timed-popup' ) ) {
		return;
	}
	if ( ( get_theme_mod( 'timed_popup_cookie', 1 ) == 1 && isset( $_COOKIE['wp_timed_pp'] ) ) ) {
		if ( ! is_customize_preview() ) {
			return;
		}
	}
	echo '<div id="timed-pup" class="timed-pup tipi-flex" data-t="' . (int) get_theme_mod( 'timed_popup_timer', 15 ) . '" data-type="pup" data-d="' . (int) get_theme_mod( 'timed_popup_cookie', 1 ) . '">';
	echo '<div class="timed-pup-inner">';
	dynamic_sidebar( 'timed-popup' );
	echo '</div>';
	echo '</div>';
}

/**
 * Subscribe
 *
 * @since 1.0.0
 */
function zeen_subscribe( $inner = '', $timer = '' ) {
	$title = get_theme_mod( 'subscribe_title', '' );
	$subtitle = get_theme_mod( 'subscribe_subtitle', '' );
	$code = get_theme_mod( 'subscribe_code' );
	if ( empty( $title ) && empty( $subtitle ) && empty( $code ) ) {
		return;
	}
	if ( empty( $inner ) ) {
	?>
	<div class="content-subscribe content-subscribe-style content-subscribe-<?php echo (int) ( get_theme_mod( 'subscribe_style', 1 ) ); ?> site-skin-<?php echo (int) ( zeen_skin_style( 'subscribe' ) ); ?> site-img-<?php echo (int) ( zeen_skin_style( 'subscribe', 'repeat' ) ); ?>  content-block subscribe-wrap subscribe-button-<?php echo (int) get_theme_mod( 'subscribe_signup_style', 1 ); ?><?php if ( ! empty( $timer ) && get_theme_mod( 'subscribe_on_timer' ) == 1 ) { echo ' timed-sub'; } ?>" data-t="<?php echo (int) get_theme_mod( 'subscribe_timer', 15 ); ?>" data-type="sub" data-d="<?php echo (int) get_theme_mod( 'subscribe_timer_cookie', 1 ); ?>">
		<div class="tipi-modal-bg bg-area clearfix">
	<?php } ?>
		<div class="content-subscribe-inner">
			<?php if ( ! empty( $subtitle ) || ! empty( $title ) ) { ?>
			<div class="subscribe-titles">
			<?php } ?>
			<?php if ( ! empty( $title ) ) { ?>
				<h2 class="title"><?php echo esc_attr( $title ); ?></h2>
			<?php } ?>
			<?php if ( ! empty( $subtitle ) ) { ?>
				<div class="subtitle"><?php echo esc_attr( $subtitle ); ?></div>
			<?php } ?>
			<?php if ( ! empty( $subtitle ) || ! empty( $title ) ) { ?>
			</div>
			<?php } ?>
			<div class="subscribe-form">
				<?php if ( ! empty( $code ) ) { ?>
					<?php echo do_shortcode( get_theme_mod( 'subscribe_code' ) ); ?>
				<?php } else { ?>
					<?php esc_attr_e( 'Go to Appearance > Customize > Subscribe Pop-up to set this up.', 'zeen' ); ?>
				<?php } ?>

			</div>
		</div>
		<?php
		if ( empty( $inner ) ) {
			zeen_elem_bg_area( 'subscribe' );
			echo '</div></div>';
		}
}

/**
 * Search Pages
 *
 * @since 1.0.0
 */
function zeen_search_pages( $args, $post_type ) {

	if ( ! is_admin() && get_theme_mod( 'search_show_pages' ) != 1 && 'page' == $post_type ) {
		$args['exclude_from_search'] = true;
	}

	return $args;
}
add_filter( 'register_post_type_args', 'zeen_search_pages', 10, 2 );

function zeen_builder_300_offset() {
	if ( is_category() || is_tag() || is_tax() ) {
		$tid = zeen_get_term_id();
		$builder = empty( $tid ) ? '' : zeen_get_term_meta( 'tipi_builder_active', $tid );
		if ( ! empty( $builder ) ) {
			$data = zeen_get_term_meta( 'tipi_builder_data' );
		}
	} elseif ( is_page() ) {
		global $post;
		if ( empty( $post->ID ) ) {
			$page = get_queried_object();
			if ( ! empty( $page ) ) {
				$pid = $page->ID;
			} else {
				$pid = get_option( 'page_on_front' );
			}
		} else {
			$pid = $post->ID;
		}
		$builder = empty( $pid ) ? '' : get_post_meta( $pid, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$data = get_post_meta( $pid, 'tipi_builder_data', true );
		}
	} elseif ( zeen_is_shop() ) {
		$pid = get_option( 'woocommerce_shop_page_id' );
		$builder = empty( $pid ) ? '' : get_post_meta( $pid, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$data = get_post_meta( $pid, 'tipi_builder_data', true );
		}
	}
	$data = ! empty( $data ) ? json_decode( $data, true ) : '';
	if ( ! empty( $data ) ) {
		foreach ( $data as $data_key ) {
			if ( 300 == $data_key['preview'] && ! empty( $data_key['offset'] ) ) {
				return $data_key['offset'];
			}
		}
	}
}

/**
 * Pre get posts
 *
 * @since 1.0.0
 */
function zeen_pre_posts( $query ) {

	if ( isset( $query->query_vars['block_qry'] ) && ! empty( $query->query_vars['offset'] ) ) {
		$page_offset = $query->query_vars['offset'] + ( ( $query->query_vars['paged'] - 1 ) * $query->query_vars['posts_per_page'] );
		$query->set( 'offset', $page_offset );
	}

	if ( $query->is_main_query() && ! is_admin() ) {
		$default_offset = zeen_builder_300_offset();
		if ( ! empty( $default_offset ) ) {
			$ppp = get_option( 'posts_per_page' );
			if ( $query->is_paged ) {
				$offset = $default_offset + ( ( $query->query_vars['paged'] - 1 ) * $ppp );
			} else {
				$offset = $default_offset;
			}
			$query->set( 'offset' , $offset );
		}

		if ( get_theme_mod( 'blog_page_cat_exclude' ) == 1 ) {
			$cats_excluded = get_theme_mod( 'blog_page_cat_excluded' );
			if ( $query->is_home && ! empty( $cats_excluded ) ) {
				$query->set( 'category__not_in', $cats_excluded );
			}
		}
		if ( is_category() || is_tag() || is_author() ) {
			$query->set( 'post_type', zeen_get_post_types( array(
				'essentials' => true,
			) ) );
		}

		$filter = get_query_var( 'filtered' );
		if ( empty( $filter ) ) {
			if ( is_category() ) {
				$filter_location = 'category';
			} elseif ( is_tag() ) {
				$filter_location = 'tags';
			} elseif ( is_author() ) {
				$filter_location = 'author';
			} elseif ( is_tax() ) {
				$filter_location = 'tax';
			}
			if ( ! empty ( $filter_location ) ) {
				$filter = get_theme_mod( $filter_location . '_sorter_default', 'latest' );
				if ( 'rated' == $filter ) {
					if ( class_exists( 'Lets_Review_API' ) ) {
						$term = get_queried_object();
						if ( ! empty( $term->term_id ) ) {
							$active = get_term_meta( $term->term_id, '_lets_review_active', true );
							if ( empty( $active ) ) {
								$filter = '';
							}
						}
					}
				}
			}
		}
		if ( ! empty( $filter ) ) {
			switch ( $filter ) {
				case 'rated':
					$query->set( 'meta_query', array(
						'related' => 'AND',
						array(
							'key' => '_lets_review_final_score_100',
							'compare' => 'EXISTS',
						),
						array(
							'key' => '_lets_review_onoff',
							'value' => 1,
							'compare' => '=',
						),
					) );
					$query->set( 'orderby', 'meta_value_num' );
					break;
				case 'oldest':
					$query->set( 'order', 'ASC' );
					break;
				case 'atoz':
					$query->set( 'orderby', 'title' );
					$query->set( 'order', 'ASC' );
					break;
				case 'random':
					$query->set( 'orderby', 'RAND(' . rand( 10, 100 ) . ')' );
					break;
				case 'liked':
					$query->set( 'meta_key', 'zeen_like_count' );
					$query->set( 'orderby', 'meta_value_num' );
					break;
			}
		}
	}

	return $query;

}
add_filter( 'pre_get_posts', 'zeen_pre_posts' );

/**
 * Found Posts
 *
 * @since 1.0.0
 */
function zeen_found_posts( $found_posts, $query ) {

	if ( isset( $query->query_vars['block_qry'] ) && ! empty( $query->query_vars['offset'] ) ) {
		$found_posts = $found_posts - $query->query['offset'];
	}
	if ( $query->is_main_query() && ! is_admin() ) {
		$default_offset = zeen_builder_300_offset();
		if ( ! empty( $default_offset ) ) {
			$found_posts = $found_posts - $default_offset;
		}
	}
	return $found_posts;

}
add_filter( 'found_posts', 'zeen_found_posts', 1, 2 );

/**
 * Team
 *
 * @since 1.0.0
 */
function zeen_team( $page_template = 3 ) {

	$team_authors = get_theme_mod( 'team_authors' );
	if ( empty( $team_authors ) ) {
		echo '<h2>';
		esc_html_e( 'No Authors Are Currently Enabled To Appear', 'zeen' );
		echo '</h2><p>';
			esc_html_e( 'The site admin needs to go to Zeen > Theme Options > Pages and edit the authors that should appear here.', 'zeen' );
		echo '</p>';
		return;
	}

	echo '<div class="team-wrap team-wrap-' . (int) ( $page_template ) . ' clearfix">';
	global $post;
	$pid = empty( $post->ID ) ? '' : $post->ID;
	foreach ( $team_authors as $user_id ) {
		zeen_user_box( array(
			'action_type' => 'team',
			'pid' => $pid,
			'aid' => $user_id,
			'design' => $page_template,
		) );
	}
	echo '</div>';

}

/**
 * Author Archive Block
 *
 * @since 1.0.0
 */
function zeen_user_box( $args = array() ) {
	$authors = empty( $args['aid'] ) ? array() : $args['aid'];
	$type = empty( $args['action_type'] ) ? '' : $args['action_type'];
	$design = empty( $args['design'] ) ? 1 : $args['design'];
	$skin = empty( $args['skin'] ) ? 1 : $args['skin'];
	$pid = empty( $args['pid'] ) ? get_the_ID() : $args['pid'];
	$type_val = 1;

	$avatar_size = apply_filters( 'zeen_post_author_box_avatar_size', 60 );
	if ( 2 == $design ) {
		$avatar_size = 385;
	} elseif ( $design > 2 ) {
		$avatar_size = 280;
	}

	if ( 'archive' == $type ) {
		$type_val = 2;
		if ( 2 == $design ) {
			$avatar_size = 280;
		}
	}
	if ( 'single' == $type ) {
		$single_box = get_post_meta( $pid, 'zeen_user_box', true );

		if ( '2' == $single_box || ( ( empty( $single_box ) || '99' == $single_box ) && get_theme_mod( 'single_author_box', 1 ) != 1 ) ) {
			return;
		}
	}
	if ( ! is_array( $authors ) ) {
		$authors = array( $authors );
	}
	foreach ( $authors as $aid ) {
		$comment_count = get_comments( array(
			'user_id' => $aid,
			'count' => true,
		) );
		if ( function_exists( 'coauthors_links' ) ) {
			$user_check = get_userdata( $aid );
			if ( empty( $user_check ) ) {
				continue;
			}
		}
		$post_count = count_user_posts( $aid, apply_filters( 'zeen_author_count_post_types', array( 'post' ) ) );
		echo '<div class="user-page-box-' . (int) ( $design ) . ' user-box-skin-' . (int) $skin . ' user-box-type-' . (int) ( $type_val ) . ' tipi-xs-12 user-page-box clearfix">';
		?>
		<div class="mask">
			<a href="<?php echo esc_url( get_author_posts_url( $aid ) ); ?>">
				<?php echo get_avatar( $aid, $avatar_size ); ?>
				<span class="overlay-arrow-r overlay-arrow"><i class="tipi-i-long-right"></i></span>
			</a>
		</div>
		<div class="meta">
			<div class="author-info-wrap">
				<div class="author-name font-1"><a href="<?php echo esc_url( get_author_posts_url( $aid ) ); ?>"><?php the_author_meta( 'display_name', $aid ); ?></a><?php if ( get_the_author_meta( 'url', $aid ) != '' ) { ?>
					<a href="<?php echo esc_url( get_the_author_meta( 'url', $aid ) ); ?>" target="_blank" rel="noopener nofollow" rel="noopener nofollow" class="author-icon author-ext-url tipi-tip tipi-tip-move" data-title="<?php esc_html_e( 'Website', 'zeen' ); ?>"><i class="tipi-i-external-link"></i></a>
				<?php } ?></div>
				<?php if ( 2 == $type_val ) { ?>
					<div class="team-member-details clearfix">
						<?php if ( get_the_author_meta( 'position', $aid ) != '' ) { ?>
						<div class="team-member-detail author-position"><span class="pre-title title-light"><?php echo esc_html__( 'Position', 'zeen' );?></span><span class="title"><?php echo the_author_meta( 'position', $aid ); ?></span></div>
						<?php } ?>
						<div class="team-member-detail author-joined"><span class="pre-title title-light"><?php echo esc_html__( 'Joined', 'zeen' );?></span><span class="title"><?php echo date_i18n( get_option( 'date_format' ), strtotime( get_the_author_meta( 'user_registered', $aid ) ) ); ?></span></div>
						<?php if ( $post_count > 0 ) { ?>
							<div class="team-member-detail author-article-count"><span class="pre-title title-light"><?php echo esc_html__( 'Articles', 'zeen' );?></span><span class="title"><?php echo (int) $post_count; ?></span></div>
						<?php } ?>
						<?php if ( $comment_count > 0 ) { ?>
							<div class="team-member-detail author-comments"><span class="pre-title title-light"><?php echo esc_html__( 'Comments', 'zeen' );?></span><span class="title"><?php echo (int) $comment_count; ?></span></div>
						<?php } ?>
					</div>
				<?php } elseif ( get_the_author_meta( 'position', $aid ) != '' ) { ?>
					<div class="author-position title-light"><?php the_author_meta( 'position', $aid ); ?></div>
				<?php } ?>
			</div>
			<div class="author-right-meta">
				<?php $description = get_the_author_meta( 'description', $aid ); ?>
				<?php if ( ! empty( $description ) ) { ?>
					<div class="author-bio body-color link-color-wrap"><?php the_author_meta( 'description', $aid ); ?></div>
				<?php } ?>
				<div class="icons">
					<?php if ( get_the_author_meta( 'publicemail', $aid ) != '' ) { ?>
						<a href="mailto:<?php echo sanitize_email( get_the_author_meta( 'publicemail', $aid ) ); ?>" class="author-icon tipi-tip tipi-tip-move" data-title="Email"><i class="tipi-i-mail"></i></a>
					<?php } ?>
					<?php
					$user_networks = array(
						'facebook' => array(
							'title' => 'Facebook',
							'icon' => 'facebook',
						),
						'patreon' => array(
							'title' => 'Patreon',
							'icon' => 'patreon',
						),
						'imdb' => array(
							'title' => 'IMDB',
							'icon' => 'imdb',
						),
						'twitter' => array(
							'title' => 'Twitter',
							'icon' => 'twitter',
						),
						'twitch' => array(
							'title' => 'Twitch',
							'icon' => 'twitch',
						),
						'instagram' => array(
							'title' => 'Instagram',
							'icon' => 'instagram',
						),
						'pinterest' => array(
							'title' => 'Pinterest',
							'icon' => 'pinterest',
						),
						'soundcloud' => array(
							'title' => 'Soundcloud',
							'icon' => 'soundcloud',
						),
						'spotify' => array(
							'title' => 'Spotify',
							'icon' => 'spotify',
						),
						'linkedin' => array(
							'title' => 'LinkedIn',
							'icon' => 'linkedin',
						),
						'apple_music' => array(
							'icon' => 'apple_music',
							'title' => 'Apple Music',
						),
						'medium' => array(
							'title' => 'Medium',
							'icon' => 'medium',
						),
						'youtube' => array(
							'title' => 'YouTube',
							'icon' => 'youtube-play',
						),
						'dribbble' => array(
							'title' => 'Dribbble',
							'icon' => 'dribbble',
						),
						'tiktok' => array(
							'title' => 'TikTok',
							'icon' => 'tiktok',
						),
						'vimeo' => array(
							'title' => 'Vimeo',
							'icon' => 'vimeo',
						),
						'vk' => array(
							'title' => 'VK',
							'icon' => 'vk',
						),
					);
					foreach ( $user_networks as $key => $value ) {
						$profile_meta = get_the_author_meta( $key, $aid );
						if ( empty( $profile_meta ) ) {
							continue;
						}
						if ( 'twitter' == $key ) {
							$profile_meta = ltrim( $profile_meta, '@' );
							if ( strpos( $profile_meta, 'twitter.co' ) === false ) {
								$profile_meta = 'https://twitter.com/' . $profile_meta;
							}
						}
						echo '<a href="' . esc_url( $profile_meta ) . '" target="_blank" rel="noopener nofollow" class="author-icon tipi-tip tipi-tip-move" data-title="' . esc_attr( $value['title'] ) . '"><i class="tipi-i-' . esc_attr( $value['icon'] ) . '"></i></a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
}

function zeen_is_live_blog( $pid = '' ) {
	if ( empty( $pid ) ) {
		$pid = get_the_ID();
	}
	$live_blog = get_post_meta( $pid, 'lets_live_blog_enabled', true );
	if ( ( ! empty( $live_blog ) && 'on' != $live_blog ) || empty( $live_blog ) ) {
		return false;
	}
	return true;
}

/**
 * Post Inline
 *
 * @since 1.0.0
 */
function zeen_post_inline( $args = array() ) {
	global $post;
	if ( function_exists( 'is_product' ) && is_product() ) {
		return;
	}
	$not_pid = empty( $args['not_pid'] ) ? $post->ID : $args['not_pid'];
	$pid = empty( $args['pid'] ) ? '' : $args['pid'];
	$title = ! isset( $args['title'] ) ? esc_html__( 'See also', 'zeen' ) : $args['title'];
	if ( ! empty( $pid ) ) {
		$qry = array(
			'posts_per_page'   => 1,
			'p' => $pid,
			'post_type' => 'any',
		);
	} else {
		$all_cats = '';
		$live_blog = zeen_is_live_blog( $not_pid );
		if ( ! empty( $live_blog ) ) {
			return;
		}
		$cats = get_the_category();
		foreach ( $cats as $cat ) {
			$all_cats .= $cat->term_id . ',';
		}
		$qry = apply_filters( 'zeen_post_inline_args', array(
			'cat'              => $all_cats,
			'post__not_in'     => array( $not_pid ),
			'posts_per_page'   => 1,
			'orderby'        => 'rand',
		) );
	}

	$args = array(
		'qry'        => $qry,
		'preview'    => 23,
		'title_block_off' => 'on',
		'contained' => true,
		'specific' => 'inline-post',
		'uid' => zeen_uid(),
		'excerpt_off' => true,
		'shape_override' => 's',
		'separator_off' => true,
		'posts_per_row' => 1,
		'mobile'     => 'true',
	);
	if ( empty( $pid ) ) {
		$date = get_theme_mod( 'post_mid_inline_date', 1 );
		if ( $date > 1 ) {
			$length_time = 7 != $date ? 'months' : 'days';
			$args['qry']['date_query'] = array(
				array(
					'inclusive' => true,
					'after'  => $date . ' ' . $length_time . ' ago',
				),
			);
		}
	}

	$block = zeen_block_pick( $args );
	$block_content = $block->output( false );
	if ( ! empty( $block_content ) ) {
		$output = '<div class="inline-post clearfix">';
		if ( ! empty( $title ) ) {
			$output .= '<div class="see-also byline">';
			$output .=  esc_html( $title );
			$output .= '</div>';
		}
		$output .= $block_content;
		$output .= '</div>';
		return $output;
	}
}

/**
 * Meta props
 *
 * @since 1.0.0
 */
function zeen_meta_props() {
	if ( get_theme_mod( 'og_meta', 1 ) != 1 || function_exists( 'wpseo_init' ) || function_exists( 'rank_math' ) ) {
		return;
	}
	if ( is_singular() ) {
		global $post;
		$image = get_the_post_thumbnail_url( $post, 'large' );
		$desc = apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $post->ID ) );
		if ( ! is_page() ) {
			$title = the_title_attribute( array( 'echo' => false ) );
		}
	}
	$site_name = get_bloginfo( 'name' );
	if ( empty( $image ) ) {
		$image = get_theme_mod( 'og_meta_img' );
		if ( empty( $image ) ) {
			$image = get_site_icon_url();
		}
	}
	if ( empty( $desc ) ) {
		$desc = get_bloginfo( 'description' );
	}
	if ( empty( $title ) ) {
		$title = $site_name;
	}
	?>
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo strip_tags( $desc ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
	<meta property="og:type" content="website">
	<?php
	$fb_app_id = get_theme_mod( 'facebook_app_id' );
	if ( ! empty( $fb_app_id ) ) {
		echo '<meta property="fb:app_id" content="' . esc_attr( $fb_app_id ) . '">';
	}
}

/**
 * Registered Sidebar
 *
 * @since 1.0.0
 */
function zeen_registered_sidebar( $sidebar = '' ) {
	global $wp_registered_sidebars;
	echo ' ';
	if ( isset( $wp_registered_sidebars[ $sidebar ] ) ) {
		echo esc_attr( $wp_registered_sidebars[ $sidebar ]['name'] );
	} else {
		esc_html_e( 'Default Sidebar', 'zeen' );
	}
}

/**
 * Archive Sorter
 *
 * @since 1.0.0
 */
function zeen_sorter( $args = array() ) {

	if ( is_date() || get_theme_mod( 'show_archive_filter', 1 ) != 1 ) {
		return;
	}
	if ( empty( $args['term_id'] ) ) {
		$term = get_queried_object();
	}
	if ( empty( $term ) && empty( $args['term_id'] ) ) {
		return;
	}

	$args['echo'] = isset( $args['echo'] ) ? $args['echo'] : true;

	if ( empty( $args['echo'] ) ) {
		ob_start();
	}

	$filter = get_query_var( 'filtered' );
	if ( empty( $filter ) ) {
		if ( is_category() ) {
			$filter_location = 'category';
		} elseif ( is_tag() ) {
			$filter_location = 'tags';
		} elseif ( is_author() ) {
			$filter_location = 'author';
		} elseif ( is_tax() ) {
			$filter_location = 'tax';
		}
		if ( ! empty ( $filter_location ) ) {
			$filter = get_theme_mod( $filter_location . '_sorter_default', 'latest' );
			if ( 'rated' == $filter ) {
				if ( class_exists( 'Lets_Review_API' ) ) {
					$term = get_queried_object();
					if ( ! empty( $term->term_id ) ) {
						$active = get_term_meta( $term->term_id, '_lets_review_active', true );
						if ( empty( $active ) ) {
							$filter = '';
						}
					}
				}
			}
		}
	}
	$term_id = empty( $args['term_id'] ) ? $term->term_id : $args['term_id'];

	if ( is_post_type_archive() ) {
		$term_a = get_post_type_archive_link( get_query_var( 'post_type' ) );
	} else {
		$term_a = get_term_link( $term_id );
	}

	if ( is_wp_error( $term_a ) ) {
		return;
	}

	echo '<div class="archive-sorter sorter" data-tid="' . (int) $term_id . '" tabindex="-1">';
	echo '<span class="current-sorter current">';
	echo '<span class="current-sorter-txt current-txt">';
	switch ( $filter ) {
		case 'rated':
			esc_html_e( 'Top Rated', 'zeen' );
			break;
		case 'oldest':
			esc_html_e( 'Oldest', 'zeen' );
			break;
		case 'random':
			esc_html_e( 'Random', 'zeen' );
			break;
		case 'liked':
			esc_html_e( 'Most Liked', 'zeen' );
			break;
		case 'atoz':
			esc_html_e( 'A to Z', 'zeen' );
			break;
		default:
			esc_html_e( 'Latest', 'zeen' );
		break;
	}

	echo '<i class="tipi-i-chevron-down"></i>';
	echo '</span>';
	echo '</span>';
	echo '<ul class="options">';
	if ( is_search() ) {
		echo '<li>';
		echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'revelance' ), $term_a ) ) . '" data-type="revelance">' . esc_html__( 'Relevance', 'zeen' ) . '</a>';
		echo '</li>';
	}
	echo '<li>';
	echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'latest' ), $term_a ) ) . '" data-type="latest">' . esc_html__( 'Latest', 'zeen' ) . '</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'oldest' ), $term_a ) ) . '" data-type="oldest">' . esc_html__( 'Oldest', 'zeen' ) . '</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'random' ), $term_a ) ) . '" data-type="random">' . esc_html__( 'Random', 'zeen' ) . '</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'atoz' ), $term_a ) ) . '" data-type="atoz">' . esc_html__( 'A to Z', 'zeen' ) . '</a>';
	echo '</li>';
	if ( get_theme_mod( 'classic_like_count' ) == 1 ) {
		echo '<li>';
		echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'liked' ), $term_a ) ) . '" data-type="liked">' . esc_html__( 'Most Liked', 'zeen' ) . '</a>';
		echo '</li>';
	}
	if ( class_exists( 'Lets_Review_API' ) ) {
		$active = get_term_meta( $term_id, '_lets_review_active', true );
		if ( ! empty( $active ) ) {
			echo '<li>';
			echo '<a href="' . esc_url( add_query_arg( array( 'filtered' => 'rated' ), $term_a ) ) . '" data-type="rated">' . esc_html__( 'Top Rated', 'zeen' ) . '</a>';
			echo '</li>';
		}
	}

	echo '</ul>';
	echo '</div>';

	if ( empty( $args['echo'] ) ) {
		return ob_get_clean();
	}
}

/**
 * Query vars
 *
 * @since 1.0.0
 */
function zeen_query_vars( $vars ) {

	$vars[] = 'block_qry';
	$vars[] = 'filtered';
	return $vars;

}
add_filter( 'query_vars', 'zeen_query_vars' );

/**
 * Header
 *
 * @since 4.0.0
 */
function zeen_header_before() {
	$overlap = zeen_get_header_overlap();
	if ( TipiBuilder\ZeenHelpers::zeen_frame_call() || 'on' == $overlap['enabled'] ) {
		echo '<div id="header--overlap" class="';
		if ( 'on' == $overlap['enabled'] ) {
			echo 'header--overlap';
			echo ' header--overlap-' . (int) $overlap['skin'];
		}
		echo '">';
	}
}

/**
 * Header
 *
 * @since 4.0.0
 */
function zeen_header_after() {
	$overlap = zeen_get_header_overlap();
	if ( TipiBuilder\ZeenHelpers::zeen_frame_call() || 'on' == $overlap['enabled'] ) {
		echo '</div>';
	}
}

/**
 * Header
 *
 * @since 1.0.0
 */
function zeen_header( $header_style ) {

	if ( 58 == $header_style ) {
		$related = true;
		$header_style = get_theme_mod( 'header_style', 1 );
	}

	if ( $header_style > 80 || ZeenMobile::is_mobile() ) {
		return;
	}

	$sticky = get_theme_mod( 'header_sticky_onoff', 1 );
	$sticky_style = ! empty( $sticky ) ? get_theme_mod( 'header_sticky', 1 ) : '';
	$overlap = zeen_get_header_overlap();
	if ( TipiBuilder\ZeenHelpers::zeen_frame_call() || 'on' == $overlap['enabled'] ) {
		$sticky = '';
		$sticky_style = '';
	}
	$secondary = '';
	$row = '';
	$main = 2;
	$header_area = true;
	if ( $header_style < 70 ) {
		if ( 1 == $header_style || 2 == $header_style || 4 == $header_style || 12 == $header_style ) {
			$secondary = 1;
		} elseif ( 11 != $header_style && 13 != $header_style && 5 != $header_style ) {
			$secondary = 2;
		}
		if ( 4 == $header_style || 13 == $header_style ) {
			$main = 1;
		}
	}
	if ( 12 == $header_style ) {
		$main = '';
	}
	if ( $header_style > 50 && $header_style < 60 ) {
		$secondary = '';
		$main = '';
		if ( 51 == $header_style ) {
			$main = 2;
			$header_style_bk = get_theme_mod( 'header_style', 1 );
			if ( 11 != $header_style_bk && 13 != $header_style_bk && 5 != $header_style_bk ) {
				$secondary = 1;
			}
			$row = true;
			$header_area = '';
		}
	}
	$header_exceptions = 52 == $header_style || 12 == $header_style ? true : false;
	if ( ! has_nav_menu( 'main' ) && ( 5 == $header_style || 11 == $header_style || 13 == $header_style ) ) {
		$header_exceptions = true;
	}
	if ( 1 == $secondary ) {
		zeen_secondary_menu( $row );
	}
	if ( 1 == $main ) {
		echo '<div id="header-line"></div>';
		get_template_part( 'template-parts/menu/menu-main', 1 );
	}
	$mm_ani = get_theme_mod( 'megamenu_animation_onoff', 1 ) == 1 ? get_theme_mod( 'megamenu_animation', 1 ) : 0;
	$header_width = zeen_check_width( get_theme_mod( 'header_width', 1 ) );
	$ad = get_theme_mod( 'header_pub' );
	if ( ! empty( $header_area ) ) {
		echo '<header id="masthead" class="site-header-block site-header clearfix';
		echo ' site-header-' . (int) $header_style;
		echo ' header-width-' . (int) $header_width;
		echo ' header-skin-' . (int) zeen_skin_style( 'header' );
		echo ' site-img-' . (int) zeen_skin_style( 'header', 'repeat' );
		echo ' mm-ani-' . (int) $mm_ani;
		echo ' mm-skin-' . (int) get_theme_mod( 'megamenu_skin', 2 );
		echo ' main-menu-skin-' . (int) get_theme_mod( 'main_menu_skin', 1 );
		echo ' main-menu-width-' . (int) get_theme_mod( 'main_menu_width', 3 );
		if ( get_theme_mod( 'megamenu_color_usage_onoff', 1 ) == 1 ) {
			echo ' main-menu-bar-color-' . (int) get_theme_mod( 'megamenu_color_usage', 2 );
		}
		if ( $header_style < 70 && $header_style > 11 && get_theme_mod( 'main_menu_flip_contents' ) == 1 ) {
			echo ' menu-main--flipped';
		}
		if ( ( 11 == $header_style || 13 == $header_style || 5 == $header_style ) && get_theme_mod( 'secondary_menu_flip_contents' ) == 1 ) {
			echo ' menu-secondary--flipped';
		}
		if ( ! empty( $sticky_style ) && ( $header_style > 70 || ! empty( $header_exceptions ) ) ) {
			echo ' sticky-menu-dt sticky-menu-' . (int) $sticky_style;
			if ( 1 == $sticky_style || 4 == $sticky_style ) {
				echo ' sticky-top';
			} else {
				echo ' sticky-menu';
			}
		}
		if ( ! empty( $ad ) ) {
			echo ' dt-header-da';
		}
		if ( 1 == get_theme_mod( 'logo_main_menu_visible', 1 ) && ! ( is_singular() && ( 51 == $header_style || 58 == $header_style ) ) ) {
			echo ' logo-only-when-stuck';
		}
		if ( 3 == $header_width ) {
			echo ' tipi-row';
		}
		zeen_extra_header_classes( $header_style );
		echo '"';
		$pt_diff = 0;
		$pb_diff = 0;
		if ( ! empty( $sticky_style ) ) {
			if ( get_theme_mod( 'header_sticky_onoff', 1 ) == 1 && get_theme_mod( 'sticky_header_customize' ) == 1 ) {
				$pt_diff = get_theme_mod( 'header_padding_top', 30 ) - get_theme_mod( 'sticky_header_padding_top', 30 );
				$pb_diff = get_theme_mod( 'header_padding_bottom', 30 ) - get_theme_mod( 'sticky_header_padding_bottom', 30 );
			}
		}
		echo ' data-pt-diff="' . (int) $pt_diff . '" data-pb-diff="' . (int) $pb_diff . '"';
		echo '>';
		get_template_part( 'template-parts/header/header', $header_style );
		echo '</header><!-- .site-header -->';
	}
	if ( $header_style < 70 && empty( $header_exceptions ) && 2 == $main ) {
		echo '<div id="header-line"></div>';
		get_template_part( 'template-parts/menu/menu-main', 1 );
	}

	if ( ! empty( $sticky_style ) && ( $header_style > 70 || ! empty( $header_exceptions ) ) ) {
		echo '<div id="header-line"></div>';
	}
	if ( 2 == $secondary ) {
		zeen_secondary_menu();
	}

	if ( ! empty( $related ) ) {
		global $post;
		$args = array(
			'pid' => $post->ID,
			'action_type' => 'single',
			'hook' => 'before',
			'p' => 79,
			'ppp' => 5,
			'uid' => zeen_uid(),
			'title_block_off' => 'off',
			'separator_off' => true,
			'byline_off' => true,
			'fs' => 'off',
			'override' => true,
			'contained' => '',
			'classes' => ' header-related-posts tipi-xs-0',
		);
		zeen_related_posts( $args );
	}

	do_action( 'zeen_header_after' );
}

/**
 * Header Classes
 *
 * @since 1.0.0
 */
function zeen_extra_header_classes( $header_style ) {
	if ( 58 == $header_style ) {
		$header_style = get_theme_mod( 'header_style', 1 );
	}
	if ( 2 == $header_style || 3 == $header_style || 5 == $header_style || 6 == $header_style || 11 == $header_style || 13 == $header_style ) {
		echo ' main-menu-c';
	} elseif ( 1 == $header_style || 4 == $header_style || 7 == $header_style ) {
		echo ' main-menu-l';
	} elseif ( 12 == $header_style || 72 == $header_style || 73 == $header_style || 74 == $header_style ) {
		echo ' main-menu-inline';
	}
}

/**
 * Mobile Header
 *
 * @since 1.0.0
 */
function zeen_mobile_header() {
	$mobile_header = zeen_get_style( 'mobile_header' );
	echo '<div id="mob-line" class="tipi-m-0"></div>';
	echo '<header id="mobhead" class="site-header-block site-mob-header tipi-m-0';
	echo ' site-mob-header-' . (int) $mobile_header;
	echo ' site-mob-menu-' . (int) zeen_get_style( 'mobile_menu' );
	if ( get_theme_mod( 'mobile_header_sticky_onoff', 1 ) == 1 ) {
		$mobile_st = get_theme_mod( 'mobile_header_sticky', 1 );

		if ( 11 != $mobile_st ) {
			echo ' sticky-menu-mob sticky-menu-' . (int) $mobile_st;
			if ( 1 == $mobile_st ) {
				echo ' sticky-top';
			} else {
				echo ' sticky-menu';
			}
		}
	}
	echo ' site-skin-' . (int) zeen_skin_style( 'mobile_header', 'skin', 2 );
	echo ' site-img-' . (int) zeen_skin_style( 'mobile_header', 'repeat' );
	echo '">';
	do_action( 'zeen_mobile_header_start' );
	get_template_part( 'template-parts/header/mob-header', $mobile_header );
	do_action( 'zeen_mobile_header_end' );
	echo '</header><!-- .site-mob-header -->';
	if ( 3 == $mobile_header ) {
		echo '<div class="logo-main-wrap logo-mob-wrap site-mob-header-3-logo tipi-m-0">';
		zeen_logo( 'mobile' );
		echo '</div>';
	}
	do_action( 'zeen_mobile_header_after' );
}

/**
 * Above Header block
 *
 * @since 1.0.0
 */
function zeen_above_header( $header_style = '' ) {

	if ( get_theme_mod( 'header_block_hp_onoff', 1 ) == 1 ) {
		zeen_header_block();
	} else {
		zeen_ad( 'header_top' );
		if ( get_theme_mod( 'header_block_instagram' ) == 1 ) {
			zeen_instagram_block( array(
				'location' => 'header',
				'user' => get_theme_mod( 'header_block_instagram_user' ),
				'per_row' => get_theme_mod( 'header_block_instagram_ppp', 6 ),
				'limit' => get_theme_mod( 'header_block_instagram_ppp', 6 ),
			) );
		}
	}
}

/**
 * Header block
 *
 * @since 1.0.0
 */
function zeen_header_block( $args = array() ) {
	if ( get_theme_mod( 'header_block_hp_onoff', 1 ) != 1 ) {
		return;
	}
	if ( ( get_theme_mod( 'header_block_hp', 1 ) == 1 && ! is_front_page() ) || ( ZeenMobile::is_mobile() && get_theme_mod( 'header_block_mobile' ) != 1 ) || TipiBuilder\ZeenHelpers::zeen_mob_active() ) {
		return;
	}

	$filter = get_theme_mod( 'header_block_source', 'categories' );
	$sortby = get_theme_mod( 'header_block_sortby', 0 );
	$cats = '';
	$pids = '';
	$tags = '';
	$post_type = '';
	$orderby = 'date';
	if ( 2 == $sortby ) {
		$orderby = 'rand';
	}
	switch ( $filter ) {
		case 'categories':
			$categories = get_theme_mod( 'header_block_categories' );
			if ( empty( $categories ) ) {
				break;
			}
			foreach ( $categories as $key => $value ) {
				$cats .= $value . ',';
			}
			$cats = rtrim( $cats, ',' );
			break;
		case 'tags':
			$tags = get_theme_mod( 'header_block_tags' );
			if ( empty( $tags ) ) {
				break;
			}
			$tags = explode( ',', $tags );
			break;
		case 'pids':
			$pids = get_theme_mod( 'header_block_pids' );
			$post_type = zeen_get_post_types(
				array(
					'output' => 'names',
					'public'   => true,
				)
			);
			$post_type['page'] = 'page';
			$orderby = 'post__in';
			break;
		default:
			$post_type = $filter;
			break;
	}

	$p = get_theme_mod( 'header_block_design', 83 );

	if ( 81 == $p ) {
		$ppp = 1;
	} elseif ( 82 == $p ) {
		$ppp = 2;
	} elseif ( 83 == $p || 86 == $p ) {
		$ppp = 3;
	} elseif ( 84 == $p || 94 == $p ) {
		$ppp = 4;
	} elseif ( 92 == $p ) {
		$ppp = 5;
	}

	if ( ZeenMobile::is_mobile() ) {
		$ppp = 1;
		$p = 82;
	}

	if ( ! empty( $pids ) ) {
		$pids = explode( ',', str_replace( ' ', '', $pids ) );
		$pids = array_slice( $pids, 0, $ppp );
	}

	$qry = apply_filters( 'zeen_block_above_header_query_args', array(
		'post_type'             => $post_type,
		'cat'                   => $cats,
		'posts_per_page'        => $ppp,
		'orderby'               => $orderby,
		'post__in'              => $pids,
		'tag__in'               => $tags,
	) );

	if ( 1 == $sortby ) {
		$qry['trending'] = array(
			'name' => 'header_block',
			'max' => 3,
			'num' => 2,
		);
	}
	$fs = 2 == get_theme_mod( 'header_block_width', 1 ) ? '' : 'on';
	$options = array(
		'qry'             => $qry,
		'preview'         => $p,
		'filter'          => $filter,
		'fs'              => $fs,
		'specific'        => 'top_block',
	);

	if ( ! empty( $args['return_qry'] ) ) {
		return $options;
	}

	echo '<div id="zeen-top-block" class="zeen-top-block zeen-top-block-' . (int) ( $p );

	if ( get_theme_mod( 'header_block_parallax', 1 ) != 1 ) {
		echo ' standard-ani';
	}
	echo ' active clearfix';
	if ( get_theme_mod( 'header_block_mobile' ) != 1 ) {
		echo ' tipi-xs-0';
	}

	if ( get_theme_mod( 'grid_tile_design', 1 ) == 2 ) {
		echo ' byline-1-exists';
	}
	echo '">';
	if ( get_theme_mod( 'header_block_featured_title_onoff' ) == 1 ) {
		echo '<span class="special-title font-1">';
		echo esc_attr( get_theme_mod( 'header_block_featured_title', 'Featured' ) );
		echo '</span>';
	}
	$block = new ZeenBlockGrid( $options );
	$block->output();
	echo '</div>';
}

function zeen_fb_coms( $pid = '' ) {
	$color = zeen_get_article_layout_skin( $pid ) == 2 ? 'dark' : 'light';
	$color = zeen_is_light( get_theme_mod( 'skin', '#ffffff' ) ) == true ? $color : 'dark';
	echo '<div class="fb-comments" data-width="100%" data-colorscheme="' . esc_attr( $color ) . '" data-href="' . esc_url( get_the_permalink() ) . '" data-numposts="10"></div>';
}
/**
 * IPL Coms
 *
 * @since 1.0.0
 */
function zeen_ipl_coms( $args = array() ) {
	if ( post_password_required( $args['pid'] ) ) {
		return;
	}
	$design = get_theme_mod( 'single_comments_design', 1 );
	$fb_coms = get_theme_mod( 'fb_comments' );
	$class = 'comments__type-' . (int) $design;
	$class .= 2 == $design ? ' collapsible__wrap' : '';
	$class .= ! empty( $standalone ) ? ' tipi-col tipi-xs-12 standalone-comments clearfix' : '';
	echo '<div class="' . esc_attr( $class ) . '">';
	if ( 2 == $design ) {
		echo '<a href="#" class="comments--reveal zeen-effect collapsible__title tipi-button tipi-xs-12">';
		esc_html_e( 'Show Comments', 'zeen' );
		if ( empty( $fb_coms ) ) {
			echo ' (';
			echo get_comments_number( $args['pid'] );
			echo ')';
		}
		echo '<i class="tipi-i-chevron-down"></i>';
		echo '</a>';
		echo '<div class="collapsible__content">';
	}
	if ( ! empty ( $fb_coms ) ) {
		zeen_fb_coms( $args['pid'] );
	} else {
		if ( class_exists( 'Disqus' ) ) {
			echo '<div class="disqus-replace"></div>';
			return;
		}
		$comments = get_comments( array(
			'post_id' => $args['pid'],
			'status' => 'approve',
		) );

		$count = count( $comments );
		?>
		<div id="comments" class="comments-area">
			<h2 class="comments-title footer-block-title">
				<?php
					// Translators: Number of Comments
					echo esc_attr( sprintf( _n( '%d Comment', '%d Comments', $count, 'zeen' ), $count ) );
				?>
			</h2>
			<?php if ( ! empty( $comments ) ) { ?>
				<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 130,
						'style'       => 'ol',
						'short_ping'  => true,
					), $comments );
				?>
				</ol>
			<?php } ?>
			<?php
			comment_form( '', $args['pid'] );
		?>
		</div><!-- #comments -->
		<?php
	}
	if ( 2 == $design ) {
		echo '</div>';
	}
	echo '</div>';
}

/**
 * Slide In
 *
 * @since 1.0.0
 */
function zeen_slide_in() {
	$is_single = is_single();
	$sliding_post = get_theme_mod( 'sliding_post', 1 ) && apply_filters( 'zeen_slide_in_single_only', $is_single );
	if ( ! empty( $is_single ) && zeen_is_live_blog() ) {
		return;
	}
	$sliding_global = get_theme_mod( 'sliding_global' );
	$sliding_global_location = get_theme_mod( 'sliding_box_location', 1 );
	if ( empty( $sliding_post ) && ( empty( $sliding_global ) || ( 2 == $sliding_global_location && ! is_front_page() ) ) || zeen_is_bbp() || zeen_is_bp() ) {
		return;
	}
	$customizer = is_customize_preview();
	if ( ! empty( $sliding_post ) && empty( $customizer ) ) {
		if ( empty( $sliding_global ) ) {
			return;
		}
		$sliding_post = '';
	}

	$sliding_post_title = get_theme_mod( 'sliding_post_title', esc_html__( 'More Stories', 'zeen' ) );
	if ( ! empty( $sliding_post ) ) {
		global $post;
		if ( 'product' == $post->post_type ) {
			$sliding_post_title = esc_html__( 'Recommended For You', 'zeen' );
		}
		$source = get_theme_mod( 'sliding_post_source', 1 );
		$date = get_theme_mod( 'sliding_post_date', 1 );
		$args = array( 'fields' => 'ids', 'posts_per_page' => 1, 'post_type' => $post->post_type, 'post__not_in' => array( $post->ID ), 'orderby' => 'rand' );
		if ( $date > 1 ) {
			$length_time = 7 != $date ? 'months' : 'days';
			$args['date_query'] = array(
				array(
					'inclusive' => true,
					'after'  => $date . ' ' . $length_time . ' ago',
				),
			);
		}

		if ( 2 == $source ) {
			$categories = get_the_category( $post->ID );
			$cat_arg = '';
			$i = 1;
			foreach ( $categories as $key ) {
				$cat_arg .= 1 == $i ? $key->term_id : ',' . $key->term_id;
				$i++;
			}
			$args['cat'] = $cat_arg;
		}
		$args = apply_filters( 'zeen_slide_in_args', $args );
		$qry = zeen_qry( $args );

		if ( ! $qry->have_posts() ) {
			wp_reset_postdata();
			return;
		}
	}

	if ( empty( $sliding_post ) && ! empty( $sliding_global ) &&
	( get_theme_mod( 'sliding_global_smallprint' ) == '' && get_theme_mod( 'sliding_global_title' ) == '' && get_theme_mod( 'sliding_global_bg' ) == '' && get_theme_mod( 'sliding_global_code' ) == '' && get_theme_mod( 'sliding_global_subtitle' ) == '' ) && empty( $customizer ) ) {
		return;
	}

	echo '<div id="slide-in-box" class="slide-in-box tipi-tile tipi-xs-0 slide-in-';
	if ( empty( $sliding_post ) ) {
		echo '1 subscribe-wrap subscribe-button-1';
	} else {
		echo '2';
	}
	echo '">';
	echo '<i class="tipi-i-close tipi-closer"></i>';
	echo '<div class="content">';
	do_action( 'zeen_promo_box_top' );
	if ( ! empty( $sliding_post ) ) {
		if ( ! empty( $sliding_post_title ) ) {
			echo '<div class="title">' . zeen_sanitize_titles( $sliding_post_title ) . '</div>';// WPCS: XSS OK
		}
		foreach ( $qry->posts as $pid ) {
			$tid = get_post_meta( $pid, '_thumbnail_id', true );
			?>
			<div class="mask"><?php zeen_featured_img( $pid, array( 'width' => 293, 'height' => 293, 'link' => true, 'secondary' => 'off', 'lazy_off' => true, ) ); ?><div class="go-next"><a href="<?php the_permalink( $pid ); ?>"><i class="tipi-i-long-right"></i></a></div></div>
			<div class="entry font-<?php echo (int) get_theme_mod( 'typo_headings', 1 ); ?><?php if ( empty( $tid ) ) { echo ' no-mask'; } ?>"><a href="<?php the_permalink( $pid ); ?>"><?php echo get_the_title( $pid );
			if ( 'product' == get_post_type( $pid ) ) {
				$product = wc_get_product( $pid );
				echo '<div class="price font-' . (int) get_theme_mod( 'typo_price', 1 ) . '">' . $product->get_price_html() . '</div>';
			}
			echo '</a></div>';
		}
		wp_reset_postdata();
	} else {
		zeen_slide_in_custom();
	}
	do_action( 'zeen_promo_box_bottom' );
	echo '</div>';
	echo '</div>';
}

function zeen_lazy_load_on_off( $attr = array(), $attachment = '', $size = '' ) {
	return zeen_lazy_load_do( $attr, $attachment, $size );
}
function zeen_lazy_load_on_off_slider( $attr = array(), $attachment = '', $size = '' ) {
	return zeen_lazy_load_do( $attr, $attachment, $size, '', true );
}

function zeen_lazy_load_on_off_with_images_loaded( $attr = array(), $attachment = '', $size = '' ) {
	$attr['class'] = empty( $attr['class'] ) ? '' : $attr['class'];
	$attr['class'] .= ' zeen-images-loaded';
	return zeen_lazy_load_do( $attr, $attachment, $size );
}

function zeen_lazy_load_on_off_mm( $attr = array(), $attachment = '', $size = '' ) {
	return zeen_lazy_load_do( $attr, $attachment, $size, true );
}

function zeen_lazy_load_do( $attr = array(), $attachment = '', $size = '', $mm = '', $slider = '' ) {
	if ( get_theme_mod( 'lazy', 1 ) != 1 || is_admin() || is_feed() || is_preview() || TipiBuilder\ZeenHelpers::zeen_builder_call() || ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) ) {
		return $attr;
	}
	$attr['class'] = empty( $attr['class'] ) ? '' : $attr['class'];
	if ( strpos( $attr['class'], 'zeen-lazy-load' ) !== false || strpos( $attr['class'], 'zeen-lazy-load-skip' ) !== false ) {
		return $attr;
	}
	$attr['class'] .= ' zeen-lazy-load-base' ;
	$attr['class'] .= empty( $mm ) ? ' zeen-lazy-load ' : ' zeen-lazy-load-mm';
	if ( empty( $slider ) ) {
		$attr['data-lazy-src'] = $attr['src'];
	} else {
		$attr['data-flickity-lazyload-src'] = $attr['src'];
	}
	$width = 370;
	$height = 247;
	if ( 'thumbnail' == $size ) {
		$width = get_option( 'thumbnail_size_w' );
		$height = get_option( 'thumbnail_size_h' );
	} elseif ( strpos( $size, 'zeen-' ) !== false ) {
		$sizes = explode( '-', $size );
		$width = $sizes[1];
		$height = $sizes[2];
	}
	if ( ( 'full' == $width || 'full' == $height ) && isset( $attachment->ID ) ) {
		$sizes = wp_get_attachment_image_src( $attachment->ID, $size );
		if ( ! empty( $sizes[1] ) && ! empty( $sizes[2] ) ) {
			$width = $sizes[1];
			$height = $sizes[2];
		}
	}
	if ( get_theme_mod( 'lazy_native' ) == 1 ) {
		$attr['loading'] = 'lazy';
	}

	$attr['src'] = "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20$width%20$height'%3E%3C/svg%3E";
	if ( ! empty( $attr['srcset'] ) ) {
		if ( empty( $slider ) ) {
			$attr['data-lazy-srcset'] = $attr['srcset'];
		} else {
			$attr['data-flickity-lazyload-srcset'] = $attr['srcset'];
		}
		unset( $attr['srcset'] );
	}
	if ( ! empty( $attr['sizes'] ) && empty( $slider ) ) {
		$attr['data-lazy-sizes'] = $attr['sizes'];
		unset( $attr['sizes'] );
	}
	return $attr;
}
/**
 * Slide in data
 *
 * @since 1.0.0
 */
function zeen_slide_in_custom() {

	if ( get_theme_mod( 'sliding_global_title' ) != '' ) {
		?>
		<div class="title font-1"><?php echo zeen_sanitize_titles( get_theme_mod( 'sliding_global_title' ) ); ?></div>
		<?php
	}

	if ( get_theme_mod( 'sliding_global_subtitle' ) != '' ) {
		?>
		<div class="subtitle"><?php echo zeen_sanitize_titles( get_theme_mod( 'sliding_global_subtitle' ) ); ?></div>
		<?php
	}

	if ( get_theme_mod( 'sliding_global_code' ) != '' ) {
		?>
		<div class="content"><?php echo do_shortcode( get_theme_mod( 'sliding_global_code' ) ); ?></div>
		<?php
	}

	if ( get_theme_mod( 'sliding_global_smallprint' ) != '' ) {
		?>
		<div class="small-print"><?php echo zeen_sanitize_titles( get_theme_mod( 'sliding_global_smallprint' ) ); ?></div>
		<?php
	}

	if ( get_theme_mod( 'sliding_global_url' ) != '' ) {
		?>
		<a class="sliding-url" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'sliding_global_url' ) ); ?>"></a>
		<?php
	}

}

/**
 * Contents
 *
 * @since 1.0.0
 */
function zeen_woo_contents( $args = array() ) {
	if ( ! zeen_woo_active() ) {
		return;
	}
	$style = get_theme_mod( 'woo_ajax_cart_style', 1 );
	if ( ( 1 == $style && 'slide' == $args['location'] ) || ( 2 == $style && 'menu' == $args['location'] ) ) {
		return;
	}
	$cart = WC()->cart->get_cart();
	$class = 'basket-contents woocommerce-mini-cart cart_list product_list_widget';
	$class .= 1 == $style ? ' menu' : '';
	$price_class = 'product-subtotal price font-' . (int) get_theme_mod( 'typo_price', 1 );
	$product_class = 'basket-item tipi-flex clearfix';
	if ( 'slide' == $args['location'] ) {
		$product_class .= ' tipi-vertical-c';
	}
	echo '<div class="tipi-basket-wrap tipi-basket-wrap-' . (int) $style . '">';
	if ( ! empty( $cart ) ) {
		if ( 1 == $style ) {
			echo '<div class="cart--title font-' . (int) get_theme_mod( 'typo_headings', 1 );
			echo '">';
			esc_html_e( 'My Cart', 'zeen' );
			echo '</div>';
		}
		echo '<div class="' . esc_attr( $class ) . '">';
		foreach ( $cart as $cart_item_key => $cart_item ) {

			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<div class="<?php echo esc_attr( $product_class ); ?>">
					<div class="img">
					<?php printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'thumbnail' ), $cart_item, $cart_item_key ) ); ?>
					</div>
					<div class="meta">
						<h3 class="title"><?php echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ); ?></h3>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
						<div class="<?php echo esc_attr( $price_class ); ?>">
						<?php
							echo WC()->cart->get_product_price( $_product ); // PHPCS: XSS ok.
							if ( $cart_item['quantity'] > 1 ) {
								echo '<span class="price--each">(×' . (int) $cart_item['quantity'] . ')</span>';// PHPCS: XSS ok.
							}
						?></div>
					</div>
					<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove zeen-effect remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="tipi-i-close"></i></a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_attr__( 'Remove this item', 'zeen' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
				</div>
				<?php
			}
		}
		?>
		</div>
		<div class="basket-summary">
			<h4 class="subtotal"><span class="subtotal-title"><?php esc_attr_e( 'Subtotal', 'zeen' ); ?></span><?php echo WC()->cart->get_cart_total(); ?></h4>
			<div class="tipi-buttons">
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="view-cart tipi-button"><?php esc_attr_e( 'View Cart', 'zeen' ); ?></a>
				<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout tipi-button"><?php esc_attr_e( 'Checkout', 'zeen' ); ?></a>
			</div>
		</div>
	<?php } else { ?>
		<?php $cart_icon = get_theme_mod( 'woo_cart', 1 ); ?>
		<div class="basket-summary empty-basket">
			<?php
			$custom_cart_icon = apply_filters( 'zeen_custom_cart_icon', '' );
			echo '<div class="empty-basket-i-wrap">';
			if ( ! empty( $custom_cart_icon ) ) {
				echo '<div class="tipi-all-c custom-cart-wrap">';
				echo apply_filters( 'zeen_custom_cart_icon', '' );
			} else {
				echo '<i class="tipi-i-cart ';
				if ( $cart_icon == 1 ) {
					echo 'tipi-i-cart-1';
				} else {
					echo 'tipi-i-cart-2';
					}
				echo '" aria-hidden="true">';
			}
			echo '<span class="tipi-cart-count font-3">0</span>';
			if ( ! empty( $custom_cart_icon ) ) {
				echo '</div>';
			} else {
				echo '</i>';
			}
			echo '</div>';
			?>
			<div class="empty-notice font-2"><?php echo apply_filters( 'zeen_your_cart_empty_message', esc_html__( 'Your cart is empty', 'zeen' ) ); ?></div>
			<a href="<?php echo esc_url( apply_filters( 'zeen_cart_return_to_shop_url', get_permalink( get_option( 'woocommerce_shop_page_id' ) ) ) ); ?>" class="shop-home tipi-button button-arrow-r button-arrow"><span class="button-title"><?php esc_attr_e( 'Browse Shop', 'zeen' ); ?></span><i class="tipi-i-arrow-right"></i></a>
		</div>

	<?php } ?>
	</div>
	<?php
}

/**
 * Before Main Menu Output
 *
 * @since  1.0.0
 */
function zeen_before_main_menu_output( $header_style = '' ) {

	$logo = 'main_menu';
	$args = array();
	if ( $header_style > 50 && $header_style < 58 ) {
		$args['header_style'] = $header_style;
		$logo_p = get_theme_mod( 'logo_p_menu' );
		if ( 53 == $header_style || 54 == $header_style || 55 == $header_style ) {
			if ( ! empty( $logo_p ) ) {
				$logo = 'p_menu';
			}
		} else {
			$logo_menu = get_theme_mod( 'logo_main_menu' );
			if ( ! empty( $logo_p ) && empty( $logo_menu ) ) {
				$logo = 'p_menu';
			}
		}
	}
	zeen_logo( $logo, $args );
}

function zeen_skin_mode( $args = array() ) {
	$location = empty( $args['location'] ) ? '' : $args['location'];
	$pid = empty( $args['pid'] ) ? '' : $args['pid'];
	if ( 'sticky_p2' == $location && get_theme_mod( 'reading_mode' ) != 1 ) {
		return;
	}
	$skin = empty( $pid ) ? '' : get_post_meta( $pid, 'zeen_article_layout_skin', true );
	if ( 'sticky_p2' != $location ) {
		echo '<li class="menu-icon menu-icon-style-1 menu-icon-mode">';
	}
	$class = '';
	if ( zeen_reading_mode_check() || ( ! empty( $skin ) && 'on' == $skin ) ) {
		$class .= ' mode--dark';
	}
	$header_style = zeen_get_style();
	$tip_dir = 'secondary_menu' == $location && $header_style > 70 ? 'tipi-tip-r' : 'tipi-tip-move';
	$tip_dir = 'secondary_menu' == $location && 82 == $header_style ? 'tipi-tip-l' : $tip_dir;
	?>
	<a href="#" class="mode__wrap<?php echo esc_attr( $class ); ?>">
		<span class="mode__inner__wrap tipi-vertical-c tipi-tip <?php echo esc_attr( $tip_dir ); ?>" data-title="<?php echo esc_attr( apply_filters( 'zeen_reading_mode_title', esc_attr__( 'Reading Mode', 'zeen' ) ) ); ?>">
			<i class="tipi-i-sun tipi-all-c"></i>
			<i class="tipi-i-moon tipi-all-c"></i>
		</span>
	</a>
	<?php
	if ( 'sticky_p2' != $location ) {
		echo '</li>';
	}
}

function zeen_reading_mode_check() {
	if ( ! empty( $_COOKIE['wp_alt_mode'] ) ) {
		return true;
	}
}

/**
 * Sticky P2
 *
 * @since  1.0.0
 */
function zeen_sticky_p2() {
	if ( ! is_single() || get_theme_mod( 'header_sticky_onoff', 1 ) != 1 ) {
		return;
	}
	global $post;
	echo '<div id="sticky-p2" class="sticky-part sticky-p2">';
	echo '<div class="sticky-p2-inner tipi-vertical-c">';
	echo '<div class="title-wrap">';
	echo '<span class="pre-title reading">';
	esc_html_e( 'Reading', 'zeen' );
	echo '</span>';
	echo '<div class="title" id="sticky-title">';
	the_title();
	echo '</div>';
	echo '</div>';
	echo '<div id="sticky-p2-share" class="share-it tipi-vertical-c';
	if ( apply_filters( 'zeen_menu_share_bold', '' ) == true ) {
		echo ' share-it-2 share-it-bold share-it-count-0 share-it-after tipi-flex';
	}
	echo '">';
	if ( class_exists( 'Lets_Review_API' ) && get_post_meta( $post->ID, '_lets_review_onoff', true ) == 1 ) {
		$options = get_post_meta( $post->ID, '_lets_review_aff_buttons', true );
		if ( ! empty( $options ) ) {
			$font_share = get_theme_mod( 'typo_share_buttons', 1 );
			foreach ( $options as $key ) {
				echo '<a href="' . esc_url( $key['url'] ) . '" class="share-button get-now" rel="nofollow" target="_blank"><span class="share-button-content tipi-vertical-c"><i class="tipi-i-cart-1"></i><span class="social-tip font-' . (int) $font_share . '">' . zeen_sanitize_titles( $key['title'] ) . '</span></span></a>';// WPCS: XSS OK
				break;
			}
		}
	}
	if ( get_theme_mod( 'sticky_menu_share', 1 ) == 1 ) {
		zeen_share( array(
			'pid' => $post->ID,
			'design' => 12,
			'type' => 'facebook',
			'ipl' => true,
		));
		zeen_share( array(
			'pid' => $post->ID,
			'design' => 12,
			'type' => 'twitter',
			'ipl' => true,
		));
	}
	zeen_skin_mode( array( 'location' => 'sticky_p2', 'pid' => $post->ID ) );
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

/**
 * AMP Extra CSS
 *
 * @since  1.0.0
 */
function zeen_amp_extra_css( $amp_template ) {
	?>
	.media-icon {display:none}
	.inline-post {margin: 30px 0; clear: both; border-top: 1px solid #eee; border-bottom: 1px solid #eee; position: relative; padding: 15px 0; width: 100%; }
	.inline-post .block .split-1 {padding: 0; }
	.inline-post .block article {width: 100%; border-bottom: 0; margin-bottom: 0; padding-bottom: 0; }
	.inline-post .block article .title {margin: 0; font-size: 1rem; }
	.inline-post .block article .mask {-webkit-box-flex: 0; -webkit-flex: 0 0 25%; -ms-flex: 0 0 25%; flex: 0 0 25%; max-width: 150px; margin-right: 15px; }
	.inline-post .block article .meta:first-child {padding-left: 0; padding-top: 30px; }
	.inline-post .see-also {font-size: 10px; z-index: 2; position: absolute; background: black; display: inline-block; padding: 0px 10px; color: white; height: 20px; line-height: 20px; top: 15px; }
	.inline-post a {text-decoration: none; }
	.inline-post .preview-mini-wrap {display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-align: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; }
	.secondary-img, .inline-post .byline  {display: none; }
	.cb-clearfix, .clearfix {zoom: 1; }
	.cb-clearfix, .clearfix:before, .cb-clearfix, .clearfix:after {content: ""; display: table; } .cb-clearfix, .clearfix:after {clear: both; }
	amp-iframe { width: 100%; }
	.amp-wp-comments-link {padding: 0 20px; }
	.cb-aff-button .cb-icon-wrap { display: none; }
	.amp-wp-comments-link a { background: #111; border: 0; color: #fff; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;  width: 100%;
	max-width: none; -webkit-box-sizing: border-box;
	box-sizing: border-box;}
	.amp-wp-comments-link a:hover, .amp-wp-comments-link a:visited, .amp-wp-comments-link a:focus { color: #fff; }
	.amp-wp-article-content amp-img.alignleft { width: 50%; }
	.amp-wp-tax-category a, .amp-wp-tax-tag a { text-decoration: none; background: #eee; padding: 5px 10px; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; font-size: 9px; margin-left: 5px;}
	body {
		background: <?php echo sanitize_hex_color( get_theme_mod( 'amp_body_background', '#fff' ) );// WPCS: XSS OK ?>;
		color: <?php echo sanitize_hex_color( get_theme_mod( 'amp_body_color', '#000' ) );// WPCS: XSS OK ?>;
	}
	.amp-wp-article, .amp-wp-title {
		color: <?php echo sanitize_hex_color( get_theme_mod( 'amp_body_color', '#000' ) );// WPCS: XSS OK ?>;
	}
	a, a:visited{
		color: <?php echo sanitize_hex_color( get_theme_mod( 'amp_body_a_color', '#000' ) );// WPCS: XSS OK ?>;
	}
	.amp-wp-footer {
		text-align: center;
		background: <?php echo sanitize_hex_color( get_theme_mod( 'amp_footer_background', '#111' ) );// WPCS: XSS OK ?>;
	}
	.amp-wp-article-content > p:first-child {margin-top:30px;}
	.spon-block {margin-bottom: 15px; margin-top: 30px; }
	.spon-block .title {background: #fee700; text-transform: uppercase; padding: 3px 7px; font-size: 8px; letter-spacing: 2px; color: #333; border-radius: 2px; display: inline-block; margin-right: 15px; }
	.spon-block .spon-img { margin-right: 10px; line-height: 0; }
	.tipi-vertical-c, .tipi-all-c {align-items: center; }
	.tipi-all-c {justify-content: center; }
	.tipi-flex-lcr {flex-direction: row; flex-wrap: wrap; justify-content: flex-start; align-items: center; }
	.tipi-flex-eq-height {align-items: stretch; }
	.tipi-flex-lcr, .tipi-vertical-c, .tipi-all-c, .tipi-flex, .tipi-flex-eq-height {display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex; }
	.amp-wp-article-content .alignnone:not(figure), .amp-wp-article-content .aligncenter:not(figure) {  margin-right: -16px;   margin-left: -16px;   max-width: none; }

	.amp-wp-footer, .amp-wp-footer a {
		color: <?php echo sanitize_hex_color( get_theme_mod( 'amp_footer_color', '#fff' ) );// WPCS: XSS OK ?>;
	}
	header.amp-wp-header, header.amp-wp-header a, amp-sidebar#amp-sb a {
		color: <?php echo sanitize_hex_color( get_theme_mod( 'amp_header_color', '#fff' ) );// WPCS: XSS OK ?>;
	}
	.back-top {margin: 20px 0; right: 0; bottom: 0; position: relative; }
	.copyright {font-size: .8em; }
	.related-posts {margin: 40px 0; padding: 0 20px; }
	.related-post a {text-decoration: none; }
	.related-post .mask {float: left; margin-right: 30px; line-height: 0; width: 75px; height: 75px; }
	.related-post {margin-bottom: 30px; }
	header.amp-wp-header {padding: 20px 0; position: sticky; top: 0; z-index: 2;}
	header.amp-wp-header, amp-sidebar {
		background: <?php echo sanitize_hex_color( get_theme_mod( 'amp_header_background', '#111' ) );// WPCS: XSS OK ?>;
	}
	.lets-info-up-skin-1 {     border: 1px solid #ededed; background: #fff;    color: #111; }
	.lets-info-up-skin-2 {background: #111; color: #fff; }
	.lets-info-up-skin-2 a{ color: #fff; }
	.lets-info-up-wrap { width: 55%; margin-bottom: 20px; text-align: center; float: left; margin-right: 20px; }
	.lets-info-up-block-wrap {padding: 30px 15px; }
	.lets-info-up-pretitle {color: #ead125; text-transform: uppercase; font-size: 10px; }
	.lets-info-up-title {font-size: 15px; }
	header.amp-wp-header div {padding: 0; }
	header.amp-wp-header .logo {display: block; margin: 0 auto; padding: 0 20px; line-height: 0; }
	amp-sidebar {width: 80vw; padding: 30px 45px; -webkit-box-sizing: border-box; box-sizing: border-box; }
	amp-sidebar a {text-decoration: none; }
	amp-sidebar li {margin-bottom: 7px; list-style: none; }
	.amp-wp-header .header-right, .amp-wp-header .header-left {margin: 0; width: 25px; padding: 0 15px; }
	.amp-sb-open {width: 12px; height: 2px; position: relative; margin: 0 auto; border-radius: 1px; display: block; }
	.amp-sb-open {
		background: <?php echo sanitize_hex_color( get_theme_mod( 'amp_header_color', '#fff' ) );// WPCS: XSS OK ?>;
	}
	.amp-sb-open:before, .amp-sb-open:after {width: inherit; display: block; height: inherit; border-radius: inherit; background: inherit; content: ''; position: absolute; width: 125%; }
	.amp-sb-logo .logo {margin-bottom: 30px; }
	.amp-sb-open:before {top: -5px; }
	.amp-sb-open:after {top: 5px; }
	.amp-sb-close {width: 20px; height: 20px; position: absolute; top: 30px; right: 15px; }
	.amp-header-logo {
		width: 100%;
	}
	.amp-sb-close:before, .amp-sb-close:after {position: absolute; left: 10px; content: ''; height: 20px; width: 2px; background: #fff; }
	.amp-sb-close:before {transform: rotate(45deg); }
	.amp-sb-close:after {transform: rotate(-45deg); }
	 .share-button-fb {background: #3b5998; margin-right: 20px; }
	amp-social-share.button__share {height: 44px; text-align: center; color: #fff; -webkit-transition: .2s ease-out; transition: .2s ease-out; min-width: calc( 50% - 10px ); margin-bottom: 20px; border-radius: 3px;	}
	.share-button-pin {
		margin-right: 20px;
		background: #bd081c;
	}
	.share-button-tw {
		background: #1da1f2;
	}
	.share-button-wa {
		background: #00ec67;
	}
	.zeen-share-buttons {
		flex-wrap: wrap;
		padding: 20px;
	}
	.header-right {
		margin-left: auto;
	}
	.amp-ad-wrap { text-align: center; margin: 30px 0; }
	<?php
}

/**
 * AMP Meta
 *
 * @since  1.0.0
 */
function zeen_amp_meta( $meta_parts ) {

	if ( get_theme_mod( 'amp_author', 1 ) != 1 ) {
		foreach ( array_keys( $meta_parts, 'meta-author', true ) as $key ) {
			unset( $meta_parts[ $key ] );
		}
	}

	if ( get_theme_mod( 'amp_date', 1 ) != 1 ) {
		foreach ( array_keys( $meta_parts, 'meta-time', true ) as $key ) {
			unset( $meta_parts[ $key ] );
		}
	}

	return $meta_parts;
}

function zeen_amp_post_format_check( $content = '', $pid = '' ) {
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && 'video' === get_post_format( $pid ) ) {
		return '';
	}
	return $content;
}
add_filter( 'post_thumbnail_html', 'zeen_amp_post_format_check', 10, 2 );

function zeen_amp_post_format( $content = '' ) {
	if ( function_exists( 'is_amp_endpoint' ) && function_exists( 'zeen_media_url' ) && is_amp_endpoint() && ( 'video' === get_post_format() ) ) {
		$pid = get_the_ID();
		$type = zeen_media_url( $pid, array(
			'media_type' => true,
		) );
		$id = zeen_media_url( $pid, array(
			'id_only' => true,
		) );
		$output = '';
		if ( 'yt' == $type ) {
			$output = '<amp-youtube data-videoid="' . $id . '" layout="responsive" width="480" height="270"></amp-youtube>';
		} elseif ( 'vim' == $type ) {
			$output = '<amp-vimeo data-videoid="' . $id . '" layout="responsive" width="480" height="270"></amp-vimeo>';
		}
		return $output . $content;
	}
	return $content;
}
add_filter( 'the_content', 'zeen_amp_post_format' );

/**
 * AMP AD
 *
 * @since  1.0.0
 */
function zeen_amp_ad( $location = 1 ) {
	$amp_ad = get_theme_mod( 'amp_ad' );
	$amp_ad_onoff = 2 == $location ? get_theme_mod( 'amp_ad_footer' ) : get_theme_mod( 'amp_ad_header' );
	if ( ! empty( $amp_ad ) && ! empty( $amp_ad_onoff ) ) {
		$ad_type = get_theme_mod( 'amp_type' );
		$ad_client = get_theme_mod( 'amp_ad_client' );
		$ad_slot = get_theme_mod( 'amp_ad_slot' );
		?>
		<div class="amp-ad-wrap">
			<amp-ad width=300
			<?php if ( 1 == $ad_type ) { ?>
				type="doubleclick" height=50 data-slot="<?php echo esc_attr( $ad_slot ); ?>">
			<?php } else { ?>
				type="adsense" height=250 data-ad-client="<?php echo esc_attr( $ad_client ); ?>" data-ad-slot="<?php echo esc_attr( $ad_slot ); ?>">
			<?php } ?>
			</amp-ad>
		</div>
		<?php
	}
}
/**
 * AMP Template Parts
 *
 * @since  1.0.0
 */
function zeen_amp_template_parts( $file, $type, $post ) {
	if ( 'footer' === $type ) {
		$file = get_theme_file_path( 'template-parts/AMP/footer.php' );
	} elseif ( 'article-footer' === $type ) {
		$file = get_theme_file_path( 'template-parts/AMP/article-footer.php' );
	} elseif ( 'header-bar' === $type ) {
		$file = get_theme_file_path( 'template-parts/AMP/header-bar.php' );
	}
	return $file;
}

/**
 * AMP Footer Logo
 *
 * @since  1.0.0
 */
function zeen_amp_footer_logo() {
	zeen_logo( 'amp_footer', array( 'amp' => true ) );
}

/**
 * AMP After Content
 *
 * @since  1.0.0
 */
function zeen_amp_after_content() {
	$fb_app_id = get_theme_mod( 'facebook_app_id' );
	?>
<div class="zeen-share-buttons tipi-vertical-c">
	<amp-social-share type="facebook" class="button__share tipi-all-c share-button-fb"
					  data-url="<?php echo esc_url( get_permalink() ); ?>"
					  data-param-app_id="<?php echo esc_attr( $fb_app_id ); ?>"
					  data-media="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>"
					  data-description="<?php the_title_attribute(); ?>">
		<i class="fa fa-facebook"></i>
	</amp-social-share>
	<amp-social-share type="twitter" class="button__share tipi-all-c share-button-tw"
					  data-url="<?php echo esc_url( get_permalink() ); ?>"
					  data-media="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>"
					  data-description="<?php the_title_attribute(); ?>">
		<i class="fa fa-twitter"></i>
	</amp-social-share>
	<amp-social-share type="pinterest" class="button__share tipi-all-c share-button-pin"
					  data-url="<?php echo esc_url( get_permalink() ); ?>"
					  data-media="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>"
					  data-description="<?php the_title_attribute(); ?>">
		<i class="fa fa-pinterest"></i>
	</amp-social-share>
	<amp-social-share type="whatsapp" class="button__share tipi-all-c share-button-wa">
		<i class="fa fa-whatsapp"></i>
	</amp-social-share>
</div>
	<?php

	if ( get_theme_mod( 'amp_related_posts', 1 ) != 1 ) {
		return;
	}
	global $post;

	$terms = get_the_terms( $post->ID, 'category' );
	$term_ids = array();
	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return;
	}

	foreach ( $terms as $key ) {
		$term_ids[] = $key->term_id;
	}

	$args = array( 'category__in' => $term_ids, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 4, 'ignore_sticky_posts' => 1 );
	$qry = new wp_query( $args );
	if ( $qry->have_posts() ) {
		?>
		<div class="related-posts">
			<h3><?php esc_attr_e( 'You might also like', 'zeen' ); ?></h3>
			<?php while ( $qry->have_posts() ) { ?>
				<?php $qry->the_post(); ?>
				<?php global $post; ?>
				<div class="related-post clearfix">
					<?php $tid = get_post_meta( $post->ID, '_thumbnail_id', true ); ?>
					<?php if ( ! empty( $tid ) ) { ?>
						<div class="mask">
							<a href="<?php the_permalink(); ?>amp/" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<amp-img src="<?php echo esc_url( wp_get_attachment_thumb_url( $tid ) ); ?>" width="75" height="75" alt="<?php the_title_attribute(); ?>" ></amp-img>
							</a>
						</div>
					<?php } ?>
					<div class="title">
						<a href="<?php the_permalink(); ?>amp/" rel="bookmark" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php
		wp_reset_postdata();
	}
}

/**
 * AMP Args
 *
 * @since  1.0.0
 */
function zeen_amp_args( $args ) {
	$args[] = 'article-footer';
	return $args;
}

/**
 * Adds prev/next paginated post
 *
 * @since 2.1.0
 */
function zeen_wp_link_pages_args( $args = '' ) {
	global $page, $numpages, $more;

	if ( ! $more ) {
		return $args;
	}
	if ( $page - 1 ) {
		$args['before'] .= _wp_link_page( $page - 1 ) . $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
	}

	if ( $page < $numpages ) {
		$args['after'] = _wp_link_page( $page + 1 ) . $args['link_before'] . ' ' . $args['nextpagelink'] . $args['link_after'] . '</a>' . $args['after'];
	}

	return $args;
}
add_filter( 'wp_link_pages_args', 'zeen_wp_link_pages_args' );

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

