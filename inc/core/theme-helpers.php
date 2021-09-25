<?php
/**
 * Theme helpers
 *
 * @package Zeen
 */

/**
 * Width Check
 *
 * @since 1.0.0
 */
function zeen_check_width( $current ) {
	if ( is_singular() ) {
		global $post;
		$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
		$hero    = zeen_get_hero_design( $post->ID );
		if ( empty( $builder ) && ( 'hero-l' == $hero['size'] || 43 == $hero['hero_design'] || zeen_get_article_layout_skin( $post->ID ) == 2 ) && 3 == $current ) {
			$current = 1;
		}
	}
	return $current;
}

function zeen_active() {
	return true;
}

function zeen_mob_height_limit() {
	if ( get_theme_mod( 'mobile_limit_height' ) != 1 ) {
		return;
	}
	echo '<div class="mobile--limiter--wrap tipi-m-0">';
	echo '<a href="#" class="mobile--limiter tipi-button">';
	echo '<span class="mobile--limiter--on">' . esc_html__( 'Show More', 'zeen' ) . ' <i class="tipi-i-angle-down"></i></span>';
	echo '</a>';
	echo '</div>';
}

function zeen_lr_stars() {
	return 'tipi-i-star2';
}

/**
 * Analytics
 *
 * @since 1.0.0
 */
function zeen_google_analytics() {
	$analytics = get_theme_mod( 'google_analytics' );
	if ( empty( $analytics ) || current_user_can( 'administrator' ) ) {
		return;
	}
	if ( substr( strtolower( $analytics ), 0, 3 ) != 'ua-' ) {
		$analytics = 'UA-' . $analytics;
	}

	?>
	<!-- Google Analytics -->
	<script>
	window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
	ga('create', '<?php echo esc_attr( $analytics ); ?>', 'auto');
	ga('send', 'pageview');
	<?php if ( get_theme_mod( 'google_analytics_anon', 1 ) == 1 ) { ?>
		ga('set', 'anonymizeIp', true);
	<?php } ?>
	</script>
	<!-- End Google Analytics -->
	<?php
}
add_action( 'wp_head', 'zeen_google_analytics' );

/**
 * Is PNG
 *
 * @since 2.0.0
 */
function zeen_is_png( $url = '' ) {
	$ext = isset( $url[0] ) ? substr( $url[0], -3 ) : '';
	return 'png' == $ext ? true : '';
}

/**
 * Link Pages
 *
 * @since 1.0.0
 */
function zeen_link_pages() {

	$defaults = array(
		'before'           => '<p class="pagination post-pagination">',
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => '<span class="page-numbers">' . esc_attr__( 'Next', 'zeen' ) . ' <i class="tipi-i-chevron-right"></i></span>',
		'previouspagelink' => '<span class="page-numbers"><i class="tipi-i-chevron-left"></i> ' . esc_attr__( 'Previous', 'zeen' ) . '</span>',
		'pagelink'         => '<span class="page-numbers">%</span>',
		'echo'             => 1,
	);

	wp_link_pages( $defaults );
}

/**
 * Footer Icons
 */
function zeen_footer_icons( $class = '' ) {
	$icons = zeen_icons(
		array(
			'location' => 'footer',
			'test'     => true,
		)
	);
	if ( ! empty( $icons ) ) {
		$class  = empty( $class ) ? '' : ' ' . $class;
		$class .= get_theme_mod( 'footer_icon_style', 1 ) == 3 ? ' tipi-flex-wrap' : '';
		?>
	<ul class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_footer_menu', 3 ); ?> menu-icons<?php echo esc_attr( $class ); ?>">
		<?php zeen_icons( array( 'location' => 'footer' ) ); ?>
	</ul>
		<?php
	}
}

/**
 * Content Width
 */
function zeen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zeen_content_width', ( get_theme_mod( 'site_width', 1230 ) - 30 ) );
}
add_action( 'after_setup_theme', 'zeen_content_width', 0 );

/**
 * IPL arguments
 *
 * @since 1.0.0
 */
function zeen_ipl_args( $pid = '' ) {
	$ipl_args   = array();
	$ipl_source = get_theme_mod( 'ipl_source', 1 ) == 1 ? false : true;

	if ( ! empty( $ipl_source ) && false ) {
		$primary_global = get_theme_mod( 'use_primary_cat' );
		if ( 1 == $primary_global && class_exists( 'WPSEO_Primary_Term' ) ) {
			$cat_primary = new WPSEO_Primary_Term( 'category', $pid );
			$cat_primary = $cat_primary->get_primary_term();
			$cat_primary = get_term( $cat_primary );
			$cat_primary = is_wp_error( $cat_primary ) ? '' : $cat_primary;
			if ( ! is_wp_error( $cat_primary ) ) {
				$qry = new WP_Query(
					array(
						'meta_query' => array(
							array(
								'key'   => '_yoast_wpseo_primary_category',
								'value' => $cat_primary,
							),
						),
					)
				);
			}
		}
	}
	$next_post = get_previous_post( $ipl_source, apply_filters( 'zeen_ipl_excluded_category', '' ) );
	if ( ! empty( $next_post ) ) {
		$ipl_args['pid']       = $pid;
		$ipl_args['next_post'] = true;
		$ipl_args['pid_next']  = $next_post->ID;
		$ipl_args['prev_url']  = get_permalink( $pid );
		$ipl_args['next_url']  = get_permalink( $next_post->ID );
		$next_cat              = zeen_get_cats( $next_post->ID );
		$ntid                  = empty( $next_cat ) ? '' : $next_cat[0]->term_id;
		$ipl_args['next_hex']  = zeen_term_color( $ntid );
		$prev_cat              = zeen_get_cats( $pid );
		$ptid                  = empty( $prev_cat ) ? '' : $prev_cat[0]->term_id;
		$ipl_args['prev_hex']  = zeen_term_color( $ptid );
	}
	return $ipl_args;
}

/**
 * Get Taxonomy Meta
 *
 * @since 1.0.0
 */
function zeen_get_term_meta( $option = '', $term_id = '' ) {
	$term_id = empty( $term_id ) ? get_queried_object()->term_id : $term_id;
	return get_term_meta( $term_id, $option, true );
}

/**
 * Gets Sidebar To Load
 *
 * @since 1.0.0
 */
function zeen_get_sidebar_slug() {

	$output = '';
	if ( zeen_is_woocommerce() ) {
		if ( is_product() ) {
			global $post;
			$pid  = $post->ID;
			$hero = (int) get_post_meta( $pid, 'zeen_hero_design', true );
			if ( empty( $hero ) || 99 === $hero ) {
				$sidebar_select = get_theme_mod( 'woo_product_sidebar', 2 );
				$output         = 2 == $sidebar_select ? 'woocommerce-product-area' : $sidebar_select;
			} else {
				$sidebar_select = get_post_meta( $pid, 'zeen_sidebar_pids', true );

				if ( ! empty( $sidebar_select ) && 1 != $sidebar_select && 2 != $sidebar_select ) {
					$output = $sidebar_select;
				}

				if ( 2 == $sidebar_select ) {
					$output = 'singular-' . (int) $pid;
				} elseif ( 1 == $sidebar_select ) {
					$output = get_theme_mod( 'woo_product_sidebar', 2 ) == 2 ? 'woocommerce-product-area' : '';
				}
			}
		} else {
			if ( get_theme_mod( 'woo_shop_sidebar' . 2 ) == 2 ) {
				$output = 'woocommerce-shop-area';
			} else {
				$output = get_theme_mod( 'woo_shop_sidebar' );
			}
		}
	} elseif ( zeen_is_bp() ) {
		if ( get_theme_mod( 'buddypress_sidebar' ) == 2 ) {
			$output = 'buddypress';
		} else {
			$output = get_theme_mod( 'buddypress_sidebar' );
		}
	} elseif ( zeen_is_bbp() ) {
		if ( get_theme_mod( 'bbpress_sidebar' ) == 2 ) {
			$output = 'bbpress';
		} else {
			$output = get_theme_mod( 'bbpress_sidebar' );
		}
	} elseif ( is_singular() || isset( $_GET['pid'] ) ) {
		if ( isset( $_GET['pid'] ) ) {
			$pid = (int) $_GET['pid'];
		} else {
			global $post;
			$pid = $post->ID;
		}

		$sidebar_select = get_post_meta( $pid, 'zeen_sidebar_pids', true );

		if ( ! empty( $sidebar_select ) && 1 != $sidebar_select && 2 != $sidebar_select ) {
			$output = $sidebar_select;
		}

		if ( 2 == $sidebar_select ) {
			$output = 'singular-' . (int) $pid;
		} elseif ( 1 == $sidebar_select ) {
			$term_id = zeen_get_cats(
				$pid,
				array(
					'try_primary' => true,
				)
			);
			$term_id = isset( $term_id[0]->term_id ) ? $term_id[0]->term_id : $term_id;
		}
	}

	if ( zeen_is_archive() || ! empty( $term_id ) ) {

		$term_id = empty( $term_id ) ? zeen_get_term_id() : $term_id;
		if ( ! empty( $term_id ) ) {

			$sidebar_select = get_term_meta( $term_id, 'zeen_sidebar_tids', true );
			if ( ! empty( $sidebar_select ) && 'sidebar-default' != $sidebar_select && 1 != $sidebar_select && 2 != $sidebar_select ) {
				$output = $sidebar_select;
			}

			if ( 2 == $sidebar_select ) {
				$output = 'archive-' . $term_id;
			}
		}
	}

	if ( empty( $output ) ) {
		$output = 'sidebar-default';
	}

	return apply_filters( 'zeen_sidebar_slug', $output );

}

/**
 * Get Term ID
 *
 * @since 1.0.0
 */
function zeen_get_term_id() {

	$queried_object = get_queried_object();
	return empty( $queried_object->term_id ) ? '' : $queried_object->term_id;

}

/**
 * Is Archive
 *
 * @since 1.0.0
 */
function zeen_is_archive() {

	if ( is_archive() && ! is_date() ) {
		return true;
	}

	return false;
}


/**
 * Get hero design
 *
 * @since 1.0.0
 */
function zeen_get_hero_design( $pid = '', $page = '', $ipl = '' ) {

	$output      = get_post_meta( $pid, 'zeen_hero_design', true );
	$post_format = empty( $page ) ? get_post_format( $pid ) : '';

	if ( 99 == $output || empty( $output ) ) {
		$args = array(
			'hero_design'   => get_theme_mod( $page . 'hero_design', 1 ),
			'cover_height'  => get_theme_mod( $page . 'cover_height', 1 ),
			'medium_height' => get_theme_mod( $page . 'medium_height', 1 ),
			'overlay'       => get_theme_mod( $page . 'hero_overlay', 'rgba(0,0,0,0.4)' ),
			'post_format'   => $post_format,
		);
	} else {
		$cover_height  = get_post_meta( $pid, 'zeen_cover_height', true ) ? get_post_meta( $pid, 'zeen_cover_height', true ) : 1;
		$medium_height = get_post_meta( $pid, 'zeen_medium_height', true ) ? get_post_meta( $pid, 'zeen_medium_height', true ) : 1;
		$overlay       = get_post_meta( $pid, 'zeen_overlay', true ) ? get_post_meta( $pid, 'zeen_overlay', true ) : 'rgba(0,0,0,0.4)';
		$args          = array(
			'hero_design'   => $output,
			'cover_height'  => $cover_height,
			'medium_height' => $medium_height,
			'overlay'       => $overlay,
			'post_format'   => $post_format,
		);
	}
	$args['cover_height']    = 99 == $args['cover_height'] ? get_theme_mod( $page . 'cover_height', 1 ) : $args['cover_height'];
	$args['medium_height']   = 99 == $args['medium_height'] ? get_theme_mod( $page . 'medium_height', 1 ) : $args['medium_height'];
	$splitter_bot            = get_post_meta( $pid, 'zeen_splitter_bottom', true );
	$args['splitter_bottom'] = '' !== $splitter_bot ? $splitter_bot : 99;
	if ( 99 == $args['splitter_bottom'] && get_theme_mod( $page . 'splitter_bottom_onoff' ) == 1 ) {
		$args['splitter_bottom'] = get_theme_mod( $page . 'splitter_bottom', 1 );
	}

	$args['fi'] = get_post_meta( $pid, '_thumbnail_id', true );
	if ( empty( $args['fi'] ) && 10 != $args['hero_design'] && 8 != $args['hero_design'] ) {
		$args['hero_design'] = ( 21 == $args['hero_design'] || 23 == $args['hero_design'] || 24 == $args['hero_design'] || 25 == $args['hero_design'] || 26 == $args['hero_design'] ) ? 10 : 9;
	}

	if ( ! empty( $ipl ) && 31 == $args['hero_design'] ) {
		$args['hero_design'] = 24;
	}

	$args['media_design'] = zeen_get_media_design( $pid, $post_format );
	if ( 11 == $args['media_design'] ) {
		if ( 1 != $args['hero_design'] && 2 != $args['hero_design'] && 11 != $args['hero_design'] && 12 != $args['hero_design'] && 13 != $args['hero_design'] ) {
			if ( $args['hero_design'] < 21 ) {
				if ( 9 == $args['hero_design'] ) {
					$args['hero_design'] = 1;
				} elseif ( ( 18 != $args['hero_design'] && 19 != $args['hero_design'] ) || 'gallery' == $post_format ) {
					$args['hero_design'] = 13;
				}
			} elseif ( 43 != $args['hero_design'] ) {
				$args['hero_design'] = 24;
			}
		}
	} elseif ( 21 == $args['media_design'] ) {
		$args['hero_design'] = 51;
	} elseif ( 2 == $args['media_design'] && 'gallery' == $post_format ) {
		if ( 3 == $args['hero_design'] || 9 == $args['hero_design'] ) {
			$args['hero_design'] = 1;
		}
		if ( 25 == $args['hero_design'] || 16 == $args['hero_design'] || 14 == $args['hero_design'] || 15 == $args['hero_design'] ) {
			$args['hero_design'] = 11;
		}
		if ( 10 == $args['hero_design'] ) {
			$args['hero_design'] = 13;
		}
		if ( 21 == $args['hero_design'] || 22 == $args['hero_design'] || 23 == $args['hero_design'] || 31 == $args['hero_design'] || 27 == $args['hero_design'] || 41 == $args['hero_design'] || 42 == $args['hero_design'] ) {
			$args['hero_design'] = 24;
		}
	} elseif ( 12 == $args['media_design'] ) {
		if ( 31 == $args['hero_design'] ) {
			$args['hero_design'] = 24;
		}
		if ( 'audio' == $post_format ) {
			$args['media_design'] = 11;
		}
	}
	if ( 'gallery' == $post_format ) {
		if ( 19 == $args['hero_design'] ) {
			$args['hero_design'] = 11;
		} elseif ( 43 == $args['hero_design'] ) {
			$args['hero_design'] = 24;
		} elseif ( 9 == $args['hero_design'] || 10 == $args['hero_design'] ) {
			$args['hero_design'] = 16;
		}
	}
	$args['title_location'] = zeen_get_hero_title_location( $args['hero_design'] );

	if ( $args['hero_design'] < 9 ) {
		$args['size'] = 'hero-s';
	} elseif ( $args['hero_design'] < 20 ) {
		$args['size'] = 'hero-m';
	} elseif ( 41 == $args['hero_design'] || 42 == $args['hero_design'] || 43 == $args['hero_design'] ) {
		$args['size'] = 'hero-contrast';
	} else {
		$args['size'] = 'hero-l';
	}

	$args['pid'] = $pid;

	return apply_filters( 'zeen_hero_design', $args );

}

function zeen_hero_with_content( $args = '' ) {
	if ( empty( $args['ipl'] ) ) {
		while ( have_posts() ) :
			the_post();
			zeen_hero_with_content_data( $args );
		endwhile;
	} else {
		zeen_hero_with_content_data( $args );
	}
}

function zeen_hero_with_content_data( $args = '' ) {
	echo '<div class="hero-with-content-wrap clearfix">';
	echo '<div class="tipi-row hero-with-content">';
	echo '<div class="tipi-cols clearfix">';
	echo '<div class="tipi-xs-12 tipi-l-8 tipi-col clearfix sticky-el">';
	$source = get_post_meta( $args['pid'], 'zeen_source', true ) ? get_post_meta( $args['pid'], 'zeen_source', true ) : 1;
	zeen_post_format_data(
		$args['pid'],
		array(
			'post_format'  => $args['post_format'],
			'media_design' => $args['media_design'],
			'hero'         => true,
		)
	);
	echo '</div>';
	echo '<article class="entry-content clearfix tipi-xs-12 tipi-l-4 tipi-col">';
	echo '<div class="meta">';
	if ( get_theme_mod( 'posts_cats', 1 ) == 1 ) {
		zeen_byline_category( $args['pid'] );
	}
	echo '<h1>' . zeen_sanitize_titles( get_the_title( $args['pid'] ) ) . '</h1>';
	echo '</div>';
	echo zeen_date_updated( $args['pid'] );
	the_content();
	if ( get_theme_mod( 'single_end_share', 1 ) == 1 ) {
		zeen_share(
			array(
				'counts' => true,
				'pid'    => $args['pid'],
				'design' => 1,
				'ipl'    => true,
			)
		);
	}
	echo '</article>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	$qry = zeen_qry(
		array(
			'category__in'   => wp_get_post_categories( $args['pid'] ),
			'post__not_in'   => array( $args['pid'] ),
			'tax_query'      => 'post-format-video',
			'posts_per_page' => 6,
		)
	);
	$i   = 1;
	if ( $qry->have_posts() ) :
		echo '<div class="hero-with-content-related">';
		echo '<div class="tipi-row clearfix">';
		echo '<div class="videos-mini-wrap">';
		while ( $qry->have_posts() ) :
			global $post;
			$qry->the_post();
			$qry_args = array(
				'split'       => true,
				'preview'     => 46,
				'i'           => $i,
				'specific'    => 'related-media',
				'byline_off'  => true,
				'subtitle'    => 'off',
				'excerpt_off' => true,
				'review_off'  => true,
				'tile'        => array(
					'width'     => 10,
					'shape'     => 's',
					'icon_size' => 's',
					'ani_off'   => true,
				),

			);
			$current_post = new ZeenPreviewVideo( $post, $i, $qry_args );
			$current_post->output();
			$i++;
		endwhile;
		echo '</div>';
		echo '</div>';
		echo '</div>';
	endif;
	wp_reset_postdata();
}
/**
 * Get parallax option
 *
 * @since 1.0.0
 */
function zeen_get_parallax_onoff( $pid = '', $args = array() ) {

	$args['post_format'] = empty( $args['post_format'] ) ? 'video' : $args['post_format'];

	if ( $args['post_format'] == 'gallery' || $args['hero_design'] == 31 || $args['hero_design'] == 32 ) {
		return;
	}

	if ( $args['post_format'] != '' ) {
		$args['media_design'] = empty( $args['media_design'] ) ? 1 : $args['media_design'];
		if ( 11 == $args['media_design'] ) {
			return;
		}
	}

	$output = get_post_meta( $pid, 'zeen_parallax', true );

	if ( empty( $output ) || 99 == $output ) {
		return get_theme_mod( $args['is_page'] . 'parallax', false );
	} else {
		$output = 2 == $output ? false : true;
		return $output;
	}

}

/**
 * Get article layout skin
 *
 * @since 1.0.0
 */
function zeen_get_article_layout_skin( $pid = '' ) {

	$output = get_post_meta( $pid, 'zeen_article_layout_skin', true ) == 'on' ? 2 : 1;
	return $output;
}

/**
 * Get article wrap class
 *
 * @since 1.0.0
 */
function zeen_post_wrap_class( $pid = '', $args = array() ) {

	$output = array( 'post-wrap', 'clearfix', 'article-layout-skin-' . (int) zeen_get_article_layout_skin( $pid ) );

	if ( empty( $args['is_builder'] ) ) {
		$output[] = 'title-' . esc_attr( $args['title_location'] );
		$output[] = zeen_sanitizer_options( $args['size'], array( 'hero-s', 'hero-m', 'hero-l', 'hero-contrast' ) );
		$output[] = zeen_get_article_layout_class( $pid, $args );
		if ( 'middle-cut' == $args['title_location'] ) {
			$output[] = 'title-middle';
		}
		if ( 10 == $args['hero_design'] || 9 == $args['hero_design'] ) {
			$output[] = 'hero-fi-off';
		}
		if ( ! empty( $args['media_design'] ) ) {
			$output[] = 'md-' . $args['media_design'];
			if ( $args['media_design'] < 10 ) {
				$output[] = 'md-button';
			}
		}
	}

	return $output;
}

/**
 * Get article layout
 *
 * @since 1.0.0
 */
function zeen_get_article_layout( $pid = '', $args = '' ) {

	$output = 1;
	if ( ! empty( $pid ) ) {
		$output = ( ( is_page() && get_post_meta( $pid, 'tipi_builder_active', true ) == 1 ) || ( ! empty( $args['post_format'] ) && 21 == $args['media_design'] ) ) ? 51 : get_post_meta( $pid, 'zeen_article_layout', true );
		if ( 99 == $output || empty( $output ) ) {
			if ( is_page() ) {
				$output = get_theme_mod( 'pages_article_layout', 1 );
			} else {
				$output = get_theme_mod( 'article_layout', 1 );
			}
		}
		$sidebar = zeen_get_sidebar_slug();
		if ( 'sidebar-default' == $sidebar ) {
			if ( ! is_active_sidebar( $sidebar ) ) {
				if ( 1 == $output ) {
					$output = 51;
				}
				if ( 2 == $output ) {
					$output = 51;
				}
			}
		}
	} else {

		if ( is_category() || is_tag() || is_tax() ) {

			$sidebar = zeen_get_term_meta( 'zeen_article_layout' );

			if ( 99 == $sidebar || empty( $sidebar ) ) {
				if ( is_category() ) {
					$output = get_theme_mod( 'category_article_layout', 1 );
				} elseif ( is_tag() ) {
					$output = get_theme_mod( 'tags_article_layout', 1 );
				} elseif ( is_tax() ) {
					$output = get_theme_mod( 'tax_article_layout', 1 );
				}
			} else {
				$output = $sidebar;
			}
		} elseif ( is_author() ) {
			$output = get_theme_mod( 'author_article_layout', 1 );
		}

		if ( zeen_is_bbp() ) {
			$output = get_theme_mod( 'bbpress_layout', 1 );
		}

		if ( zeen_is_bp() ) {
			$output = get_theme_mod( 'buddypress_layout', 1 );
		}
	}

	return apply_filters( 'zeen_article_layout', $output );

}

/**
 * Get Query
 *
 * @since 1.0.0
 */
function zeen_get_qry() {
	global $wp_the_query;
	$qry = $wp_the_query->query_vars;
	if ( is_page() ) {
		$qry_p = array(
			'posts_per_page' => get_option( 'posts_per_page' ),
		);
		if ( ! empty( $qry['p'] ) ) {
			$qry_p['page'] = $qry['p'];
		}
		$qry   = $qry_p;
		$paged = get_query_var( 'paged' );
		if ( is_page() && is_front_page() ) {
			$paged        = get_query_var( 'page' );
			$qry['paged'] = empty( $paged ) ? 1 : (int) $paged;
		} else {
			$qry['paged'] = empty( $paged ) ? 1 : (int) $paged;
		}
	}
	return $qry;
}

/**
 * Get Article layout class
 *
 * @since 1.0.0
 */
function zeen_get_article_layout_class( $pid = '', $args = '' ) {

	$builder = get_post_meta( $pid, 'tipi_builder_active', true );

	if ( ! empty( $builder ) ) {
		return '';
	}
	$output = '';
	$layout = zeen_get_article_layout( $pid, $args );

	$list = get_post_meta( $pid, 'zeen_list', true );
	if ( $layout < 30 ) {
		$output = 'sidebar-on';
		if ( $layout < 10 ) {
			$output .= ' sidebar-right';

		} else {
			$output .= ' sidebar-left';
		}
	} elseif ( $layout < 50 ) {
		$output = 'sidebar-off';
		if ( 36 == $layout && 'on' != $list ) {
			$output .= ' align-pull align-fade-up align-fs align-fs-center';
		}
	} else {
		$output = 'sidebar-off-wide';
		if ( 55 == $layout && 'on' != $list ) {
			$output .= ' align-fs';
		}
		if ( $layout > 57 ) {
			$output .= ' compact-content-imgs';
		}
	}

	if ( 2 == $layout || 12 == $layout || 32 == $layout ) {
		$output .= ' layout-side-info';
	}

	return $output;

}

function zeen_get_archive_layout_class( $args = array() ) {
	echo 'class="contents-wrap';
	if ( empty( $args['builder'] ) ) {
		echo ' standard-archive';
	} elseif ( zeen_bg_ad_is_active() ) {
		echo ' tipi-row';
	}
	if ( zeen_sidebar_checker( $args ) && empty( $args['builder'] ) ) {
		$sb_type = 1;
		if ( is_category() || is_tag() || is_tax() ) {
			$sb = zeen_get_term_meta( 'zeen_sidebar' );
			if ( 99 == $sb || empty( $sb ) ) {
				if ( is_category() ) {
					$sb_type = get_theme_mod( 'category_sidebar', 1 );
				} elseif ( is_tag() ) {
					$sb_type = get_theme_mod( 'tags_sidebar', 1 );
				} elseif ( is_tax() ) {
					$sb_type = get_theme_mod( 'tax_sidebar', 1 );
				}
			} else {
				$sb_type = $sb;
			}
		} elseif ( is_author() && get_theme_mod( 'author_page_style', 1 ) == 2 ) {
			$sb_type = 2;
		} elseif ( is_search() ) {
			$sb_type = get_theme_mod( 'search_sidebar', 1 );
		}

		if ( 2 == $sb_type ) {
			echo ' sidebar-left';
		} else {
			echo ' sidebar-right';
		}
	}
	echo ' clearfix"';
}

/**
 * Font heading getter
 *
 * @since 1.0.0
 */
function zeen_get_font( $type = 1 ) {

	$output                  = array(
		'font-style' => '',
	);
	$source                  = get_theme_mod( 'font_' . $type . '_source', 1 );
	$output['font-fallback'] = '';
	switch ( $source ) {
		case 2:
			$output['font-family']   = get_theme_mod( 'font_' . $type . '_typekit_custom' );
			$output['font-weight']   = array( get_theme_mod( 'font_' . $type . '_weight_custom', 400 ) );
			$output['font-fallback'] = get_theme_mod( 'font_' . $type . '_typekit_fallback', 1 );
			$output['category']      = '';
			$output['subsets']       = '';
			break;
		case 3:
			$output['font-family'] = get_theme_mod( 'font_' . $type . '_custom' );
			$output['font-weight'] = array( get_theme_mod( 'font_' . $type . '_weight_custom', 400 ) );
			$output['category']    = '';
			$output['subsets']     = '';
			break;
		default:
			$type_family    = 'Playfair Display';
			$default_weight = 'regular';
			if ( 2 == $type ) {
				$default_weight = 'regular';
				$type_family    = 'Lato';
			}
			if ( 3 == $type ) {
				$default_weight = 'regular';
				$type_family    = 'Montserrat';
			}
			$output['font-family'] = get_theme_mod( 'font_' . $type . '_google', $type_family );
			$output['font-weight'] = array( get_theme_mod( 'font_' . $type . '_google_weight', $default_weight ) );
			$output['subsets']     = get_theme_mod( 'font_' . $type . '_google_subset', array( 'latin' ) );
			$fonts                 = zeen_google();
			$fonts                 = json_decode( wp_json_encode( $fonts ), true );
			$output['category']    = '';
			if ( ! empty( $fonts[ $output['font-family'] ]['category'] ) ) {
				$output['category'] = $fonts[ $output['font-family'] ]['category'];
			}

			break;
	}
	$char = substr( $output['font-weight'][0], -1 );
	if ( ! is_numeric( $char ) ) {
		if ( 'regular' == $output['font-weight'][0] ) {
			$output['font-weight'][0] = 400;
		}
		if ( 'c' == $char ) {
			$output['font-style'] = 'italic';
		}
	}

	if ( 2 == $type && 700 != $output['font-weight'][0] ) {
		$output['font-weight'][1] = 700;
	}

	if ( 3 == $type && 700 != $output['font-weight'][0] ) {
		$output['font-weight'][1] = 700;
	}
	if ( 1 == $type && 'italic' != $output['font-style'] ) {
		$output['font-weight'][1] = 'italic';
	}

	return $output;

}

function zeen_b_extra_fonts() {
	$fonts = '';
	if ( zeen_is_archive() ) {
		$term_id = zeen_get_term_id();
		if ( ! empty( $term_id ) ) {
			$fonts = get_term_meta( $term_id, 'tipi_builder_fonts', true );
		}
	} elseif ( is_page() ) {
		global $post;
		$fonts = get_post_meta( $post->ID, 'tipi_builder_fonts', true );
	}
	if ( ! empty( $fonts ) ) {
		$google = zeen_google();
		foreach ( $fonts as $key => $value ) {
			$font_slug = str_replace( ' ', '-', strtolower( $value ) );
			$weights   = empty( $google->$value->variants ) ? array() : $google->$value->variants;
			foreach ( $weights as $key ) {
				if ( 'regular' == $key ) {
					$key = 400;
				}
			}
			$weights = implode( ',', $weights );
			wp_enqueue_style( $font_slug, 'https://fonts.googleapis.com/css?family=' . rawurlencode( $value . ':' . $weights ), array(), ZEEN_BUILDER_VERSION );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'zeen_b_extra_fonts' );

/**
 * Font heading getter
 *
 * @since 1.0.0
 */
function zeen_get_google_font() {

	$output      = '';
	$font_family = array(
		'font_1' => '',
		'font_2' => '',
		'font_3' => '',
	);

	$font_1_subset = array();
	$font_2_subset = array();
	$font_3_subset = array();

	if ( get_theme_mod( 'font_3_onoff', 1 ) == 1 && get_theme_mod( 'font_3_source', 1 ) == 1 ) {
		$font_3                = zeen_get_font( 3 );
		$font_weight_body      = ':' . implode( ',', $font_3['font-weight'] );
		$font_family['font_3'] = $font_3['font-family'] . $font_weight_body;
		$font_3_subset         = $font_3['subsets'];
	}
	if ( get_theme_mod( 'font_2_source', 1 ) == 1 ) {
		$font_2 = zeen_get_font( 2 );
		if ( ! in_array( '400', $font_2['font-weight'] ) ) {
			$font_2['font-weight'][] = '400';
		}
		$font_weight_body      = ':' . implode( ',', $font_2['font-weight'] );
		$font_family['font_2'] = $font_2['font-family'] . $font_weight_body;
		$font_2_subset         = $font_2['subsets'];
	}
	if ( get_theme_mod( 'font_1_source', 1 ) == 1 ) {
		$font_1 = zeen_get_font( 1 );
		if ( ! in_array( '400', $font_1['font-weight'] ) ) {
			$font_1['font-weight'][] = '400';
		}
		$font_weight_header    = ':' . implode( ',', $font_1['font-weight'] );
		$font_family['font_1'] = $font_1['font-family'] . $font_weight_header;
		$font_1_subset         = $font_1['subsets'];
	}

	$subsets = array_merge( $font_1_subset, $font_2_subset );
	$subsets = array_merge( $subsets, $font_3_subset );
	$subsets = array_unique( $subsets, SORT_REGULAR );

	if ( $font_family['font_1'] == $font_family['font_2'] ) {
		unset( $font_family['font_2'] );
	}

	if ( $font_family['font_1'] == $font_family['font_3'] || ( ! empty( $font_family['font_2'] ) && $font_family['font_2'] == $font_family['font_3'] ) ) {
		unset( $font_family['font_3'] );
	}

	$font_family = array_filter( $font_family );
	if ( ! empty( $font_family ) ) {
		$output = add_query_arg(
			array(
				'family' => rawurlencode( implode( '|', $font_family ) ),
			),
			'https://fonts.googleapis.com/css'
		);

		if ( ! empty( $subsets ) ) {
			$output = add_query_arg(
				array(
					'subset' => rawurlencode( implode( ',', $subsets ) ),
				),
				$output
			);
		}
		$output = add_query_arg(
			array(
				'display' => 'swap',
			),
			$output
		);
	}
	return $output;

}

/**
 * Post color
 *
 * @since 1.0.0
 */
function zeen_post_color( $pid = '', $is_page = '' ) {
	if ( get_post_meta( $pid, 'zeen_hero_color', 1 ) == 1 ) {
		$output = array(
			'overlay' => get_post_meta( $pid, 'zeen_overlay', 1 ),
			'text'    => get_post_meta( $pid, 'zeen_overlay_text', 1 ),
		);
	} else {
		$output = array(
			'overlay' => get_theme_mod( $is_page . 'hero_color', 'rgba(10,0,0,0.5)' ),
			'text'    => get_theme_mod( $is_page . 'hero_color_text', '#fff' ),
		);
	}
	return $output;
}

/**
 * Thumbnail
 *
 * @since 1.0.0
 */
function zeen_featured_img( $pid = '', $args = array() ) {

	if ( empty( $pid ) ) {
		global $post;
		$pid = $post->ID;
	}
	$args['pid'] = $pid;
	$thumb_id    = get_post_meta( $pid, '_thumbnail_id', true );
	if ( ! empty( $args['hero'] ) ) {
		$thumb_id_override = get_post_meta( $pid, 'zeen_hero_image_override', true );
		$thumb_id          = empty( $thumb_id_override ) ? $thumb_id : $thumb_id_override;
	}
	if ( empty( $thumb_id ) ) {
		return;
	}
	if ( ! empty( $args['specific'] ) && 'mm' == $args['specific'] ) {
		add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_mm', 10, 3 );
	}
	if ( empty( $args['lazy_off'] ) ) {
		add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off', 10, 3 );
	}
	$type  = empty( $args['img_or_css'] ) ? 'img' : $args['img_or_css'];
	$class = empty( $args['hero'] ) ? '' : array( 'class' => 'flipboard-image' );

	if ( empty( $args['color'] ) || get_theme_mod( 'grids_design_hover', 1 ) == '' ) {
		$args['color'] = '';
	}

	$args = apply_filters( 'zeen_thumbnail', $args );
	if ( empty( $args['size'] ) ) {
		$size         = 'full' == $args['width'] ? 'full' : 'zeen-' . $args['width'] . '-' . $args['height'];
		$size         = 'full' == $args['height'] && 770 == $args['width'] ? 'medium_large' : $size;
		$size         = 100 == $args['height'] && 100 == $args['width'] ? 'thumbnail' : $size;
		$args['size'] = $size;
	} else {
		$size = $args['size'];
	}
	if ( ( ! empty( $args['link'] ) || ! empty( $args['lightbox'] ) ) && 'css' != $type ) {
		if ( ! empty( $args['pinable'] ) && 'thumbnail' != $size ) {
			zeen_pin_it( $pid, $args );
		}
		echo '<a href="';
		if ( empty( $args['lightbox'] ) ) {
			echo esc_url( get_permalink( $pid ) );
		} else {
			echo esc_url( wp_get_attachment_url( $thumb_id ) );
		}
		echo '" class="mask-img';
		if ( ! empty( $args['lightbox'] ) ) {
			echo ' tipi-lightbox';
		}
		if ( get_theme_mod( 'attachment_title_attr' ) == 1 ) {
			$thumb_post = get_post( $thumb_id );
			if ( ! empty( $thumb_post->post_title ) ) {
				echo '" title="' . esc_attr( $thumb_post->post_title );
			}
		}
		echo '">';
	}

	if ( 'css' == $type ) {
		$featured_img = wp_get_attachment_image_src( $thumb_id, $size );

		if ( 'gif' == substr( $featured_img[0], -3 ) ) {
			$featured_img = wp_get_attachment_image_src( $thumb_id, 'full' );
		}

		echo '<div class="fi-bg fi-bg-' . (int) ( $pid ) . '" style="background-image: url( ' . esc_url( $featured_img[0] ) . ');">';
		echo '</div>';
		if ( ! empty( $args['link'] ) ) {
			echo '<a href="' . esc_url( get_permalink( $pid ) ) . '" class="mask-overlay" aria-label="' . esc_attr( the_title_attribute( array( 'echo' => '' ) ) ) . '"';
			if ( $args['color'] ) {
				echo ' style="background-color:' . esc_attr( $args['color'] ) . '"';
			}
			echo '></a>';
		}
	} else {
		$thumbnail = empty( $thumb_id_override ) ? get_the_post_thumbnail( $pid, $size, $class ) : wp_get_attachment_image( $thumb_id_override, $size );

		echo apply_filters( 'zeen_featured_image_output', $thumbnail, $args );
		if ( empty( $args['secondary'] ) || ( ! empty( $args['secondary'] ) && 'off' != $args['secondary'] ) ) {
			zeen_secondary_img( $pid, $size );
		}
	}

	if ( ( ! empty( $args['link'] ) || ! empty( $args['lightbox'] ) ) && 'css' != $type ) {
		echo '</a>';
	}
	if ( empty( $args['lazy_off'] ) ) {
		remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
	}
	if ( ! empty( $args['specific'] ) && 'mm' == $args['specific'] ) {
		remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_mm' );
	}
}

function zeen_pin_it( $pid = '', $args = array() ) {
	if ( get_theme_mod( 'classic_pin_save' ) != 1 || ! empty( $args['specific'] ) ) {
		return;
	}

	echo '<a href="http://pinterest.com/pin/create/button/?url=' . esc_attr( rawurlencode( get_the_permalink( $pid ) ) ) . '&media=' . esc_attr( rawurlencode( get_the_post_thumbnail_url( $pid, 'zeen-770-full' ) ) ) . '&description=' . esc_attr( rawurlencode( get_the_title( $pid ) ) ) . '" target="_blank" aria-label="Pinterest" class="tipi-i-thumb-tack zeen-pin-it zeen-effect tipi-vertical-c" rel="nofollow noreferrer noopener"><span class="font-3">Pin</span></a>';
}

/**
 * Logo getter
 *
 * @since 1.0.0
 */
function zeen_logo( $location = 'main', $args = array() ) {
	if ( 'main' == $location ) {
		$logo = get_theme_mod( 'logo_main' );
		$h1   = get_theme_mod( 'logo_main_h1' ) && is_front_page();
		if ( empty( $logo ) ) {
			$menu_logo = get_theme_mod( 'logo_main_menu' );
			if ( empty( $menu_logo ) && apply_filters( 'zeen_disable_text_logo', '' ) != true ) {
				$args['fallback'] = true;
			}
			$text_logo_onoff = get_theme_mod( 'logo_text_onoff' );
			if ( ! empty( $text_logo_onoff ) ) {
				$args['fallback'] = true;
			}
		}
	}
	if ( 'mobile' == $location ) {
		$logo            = get_theme_mod( 'logo_' . $location );
		$text_logo_onoff = get_theme_mod( 'logo_text_mobile_onoff' );
		if ( empty( $logo ) && ! empty( $text_logo_onoff ) ) {
			$args['fallback'] = true;
		}
	}
	if ( ! empty( $args['check'] ) ) {
		$logo_id = get_theme_mod( 'logo_' . $location );
		if ( ! empty( $logo_id ) || ! empty( $args['fallback'] ) ) {
			return true;
		} else {
			return false;
		}
	}
	if ( ! empty( $args['fallback'] ) ) {
		if ( ! empty( $args['wrap_class'] ) ) {
			echo '<div class="' . esc_attr( $args['wrap_class'] ) . '">';
		}
		$text_logo_ext = 'mobile' == $location ? '_mobile' : '';
		if ( 'main' == $location ) {
			echo '<div class="logo-main-wrap tipi-vertical-c logo-main-wrap-l">';
		}
		echo '<div class="logo logo-main logo-fallback font-' . (int) get_theme_mod( 'typo_logo_text', 1 ) . '"><a href="' . esc_url( get_home_url() ) . '">' . zeen_sanitize_wp_kses( apply_filters( 'zeen_logo_text_name', get_theme_mod( 'logo_text' . $text_logo_ext, get_bloginfo( 'name' ) ) ) ) . '</a></div>';
		if ( 'main' == $location ) {
			echo '</div>';
		}
		if ( ! empty( $args['wrap_class'] ) ) {
			echo '</div>';
		}
		return;
	}
	$logo_id      = apply_filters( 'zeen_logo_override', get_theme_mod( 'logo_' . $location ), $location );
	$alt_logo_id  = apply_filters( 'zeen_alt_logo_override', get_theme_mod( 'alt_logo_' . $location ), $location );
	$header_style = empty( $args['header_style'] ) ? '' : $args['header_style'];
	if ( 'p_menu' == $location && empty( $logo_id ) ) {
		$location = 51 == $header_style ? 'main_menu' : 'main';
		$logo_id  = get_theme_mod( 'logo_' . $location );
		if ( empty( $logo_id ) ) {
			$location = 'main';
			$logo_id  = get_theme_mod( 'logo_' . $location );
		}
	} elseif ( 'main' == $location && ( is_category() || is_tag() || is_tax() || is_single() ) ) {
		$tid = '';
		if ( is_single() ) {
			global $post;
			$tid = zeen_get_cats( $post->ID, array( 'try_primary' => true ) );
			$tid = empty( $tid ) ? '' : $tid[0]->term_id;
		}
		$logo_ov = zeen_get_term_meta( 'zeen_logo_main', $tid );
		if ( ! empty( $logo_ov ) ) {
			$logo_ov_retina = zeen_get_term_meta( 'zeen_logo_main_retina', $tid );
			$logo_id        = $logo_ov;
			if ( ! empty( $logo_ov_retina ) ) {
				$retina_logo_id = $logo_ov_retina;
			}
		}
	}

	if ( empty( $logo_id ) ) {
		if ( 'main_menu' == $location && empty( $args['sticky'] ) ) {
			echo '<div class="logo-menu-wrap logo-menu-wrap-placeholder"></div>';
		}
		return;
	}
	$url            = wp_get_attachment_url( $logo_id );
	$alt_url        = empty( $alt_logo_id ) ? '' : wp_get_attachment_url( $alt_logo_id );
	$retina_logo_id = empty( $retina_logo_id ) ? get_theme_mod( 'logo_' . $location . '_retina' ) : $retina_logo_id;
	$retina_logo_id = apply_filters( 'zeen_logo_retina_override', $retina_logo_id, $location );
	$retina_url     = empty( $retina_logo_id ) ? '' : wp_get_attachment_url( $retina_logo_id );

	$super_retina_logo_id = empty( $super_retina_logo_id ) ? get_theme_mod( 'logo_' . $location . '_super_retina' ) : $super_retina_logo_id;
	$super_retina_logo_id = apply_filters( 'zeen_logo_super_retina_override', $super_retina_logo_id, $location );
	$super_retina_url     = empty( $super_retina_logo_id ) ? '' : wp_get_attachment_url( $super_retina_logo_id );

	$alt_retina_logo_id = empty( $alt_retina_logo_id ) ? get_theme_mod( 'alt_logo_' . $location . '_retina' ) : $alt_retina_logo_id;
	$alt_retina_logo_id = apply_filters( 'zeen_alt_logo_retina_override', $alt_retina_logo_id, $location );
	$alt_retina_url     = empty( $alt_retina_logo_id ) ? '' : wp_get_attachment_url( $alt_retina_logo_id );

	if ( ! empty( $args['wrap_class'] ) ) {
		echo '<div class="' . esc_attr( $args['wrap_class'] ) . '">';
	}
	if ( 'main_menu' == $location ) {
		$class = 'logo-main-menu';
	} elseif ( 'mobile_menu' == $location ) {
		$class = 'logo-mobile-menu';
	} else {
		$class = 'logo-' . $location;
	}

	$alt = get_post_meta( $logo_id, '_wp_attachment_image_alt', true );

	if ( 'main_menu' == $location && empty( $args['sticky'] ) ) {
		echo '<div class="logo-menu-wrap tipi-vertical-c">';
	}

	echo '<div class="logo ' . esc_attr( $class ) . '">';
	$logo_link = apply_filters( 'zeen_logo_link', true, $location );
	if ( ! empty( $logo_link ) ) {
		echo '<a href="' . esc_url( apply_filters( 'zeen_logo_url', get_home_url(), $location ) ) . '" data-pin-nopin="true">';
	}

	if ( ! empty( $url ) ) {
		if ( ! empty( $h1 ) ) {
			echo '<h1 class="logo-h1">';
		}
		$overlap  = zeen_get_header_overlap();
		$alt_mode = zeen_cookie_check() || ( 'on' == $overlap['enabled'] && 'on' == $overlap['inverse'] ) ? true : '';
		echo '<span class="logo-img">';
		echo '<';
		if ( empty( $args['amp'] ) ) {
			echo 'img';
		} else {
			echo 'amp-img';
		}
		echo ' src="';
		echo empty( $alt_mode ) || empty( $alt_url ) ? esc_url( $url ) : esc_url( $alt_url );
		echo '" loading="lazy" alt="' . esc_attr( $alt ) . '"';
		if ( ! empty( $retina_url ) ) {
			echo ' srcset="';
			echo empty( $alt_mode ) || empty( $alt_retina_url ) ? esc_url( $retina_url ) : esc_url( $alt_retina_url );
			echo ' 2x';
			if ( ! empty( $super_retina_url ) ) {
				echo ' ' . esc_url( $super_retina_url ) . ' 3x';
			}
			echo '"';
		}
		if ( ! empty( $alt_url ) ) {
			if ( ! empty( $retina_url ) ) {
				echo ' data-base-src="' . esc_url( $url ) . '"';
			}
			echo ' data-alt-src="' . esc_url( $alt_url ) . '"';
		}
		if ( ! empty( $alt_retina_url ) ) {
			if ( ! empty( $retina_url ) ) {
				echo ' data-base-srcset="' . esc_url( $retina_url ) . ' 2x"';
			}
			echo ' data-alt-srcset="' . esc_url( $alt_retina_url ) . ' 2x"';
		}

		$meta = wp_get_attachment_metadata( $logo_id );
		if ( ! empty( $meta['width'] ) ) {
			echo ' width="' . (int) $meta['width'] . '"';
		}
		if ( ! empty( $meta['height'] ) ) {
			echo ' height="' . (int) $meta['height'] . '"';
		}
		echo '>';
		echo '</span>';

		if ( ! empty( $h1 ) ) {
			echo '</h1>';
		}
	}
	$logo_subtitle = get_theme_mod( 'logo_subtitle_' . $location );
	if ( ! empty( $logo_subtitle ) ) {
		echo '<span class="logo-subtitle font-3">' . esc_attr( $logo_subtitle ) . '</span>';
	}
	if ( ! empty( $logo_link ) ) {
		echo '</a>';
	}
	echo '</div>';

	if ( 'main_menu' == $location && empty( $args['sticky'] ) ) {
		echo '</div>';
	}

	if ( ! empty( $args['wrap_class'] ) ) {
		echo '</div>';
	}

}

function zeen_cookie_check( $cookie = 'wp_alt_mode' ) {
	if ( apply_filters( 'zeen_nocache_for_cookies', false ) == true && isset( $_COOKIE[ $cookie ] ) && 1 == (int) $_COOKIE[ $cookie ] ) {
		return true;
	}
}

function zeen_logo_vitals() {
	$output_1020 = '';
	$output_mob  = '';
	$output      = '';
	$logos       = array( 'main', 'footer', 'mobile' );
	foreach ( $logos as $key ) {
		$id = get_theme_mod( 'logo_' . $key );
		if ( empty( $id ) ) {
			continue;
		}
		$meta = wp_get_attachment_metadata( $id );
		if ( ! empty( $meta['height'] ) && ! empty( $meta['width'] ) ) {
			if ( 'mobile' == $key ) {
				$output_mob .= '.logo-' . esc_attr( $key ) . ' .logo-img{width: ' . (int) $meta['width'] . 'px; height:' . (int) $meta['height'] . 'px;}';
			} else {
				$output_1020 .= '.logo-' . esc_attr( $key ) . ' .logo-img{width: ' . (int) $meta['width'] . 'px; height:' . (int) $meta['height'] . 'px;}';
			}
		}
	}
	if ( ! empty( $output_1020 ) ) {
		$output = '@media only screen and (min-width: 1020px) {' . $output_1020 . '}';
	}
	if ( ! empty( $output_mob ) ) {
		$output .= '@media only screen and (max-width: 1199px) {' . $output_mob . '}';
	}
	return $output;
}

/**
 * Copyright line
 *
 * @since 1.0.0
 */
function zeen_copyright_line( $text_align = 'l', $location = '' ) {
	$copyright = get_theme_mod( 'copyright' . $location );
	if ( empty( $copyright ) ) {
		return;
	}
	?>
	<div class="copyright font-<?php echo (int) get_theme_mod( 'typo_copyright', 2 ); ?> copyright-<?php echo esc_attr( $text_align ); ?>"><?php echo do_shortcode( zeen_sanitize_wp_kses( $copyright ) ); ?></div>
	<?php
}

if ( ! function_exists( 'zeen_to_top' ) ) :
	/**
	 * To top
	 *
	 * @since 1.0.0
	 */
	function zeen_to_top( $tag = '', $location = '' ) {
		if ( empty( $tag ) ) {
			$tag = 'div';
		}
		if ( ( empty( $location ) && get_theme_mod( 'to_top_fixed' ) != 1 ) || ( ! empty( $location ) && get_theme_mod( 'to_top_fixed' ) == 1 ) || get_theme_mod( 'to_top', 1 ) != 1 ) {
			return;
		}

		$to_top_icon_show = get_theme_mod( 'to_top_icon_show', 1 );
		$to_top_icon      = ( 1 == $to_top_icon_show ) ? get_theme_mod( 'to_top_icon', 2 ) : 3;
		echo '<';
		echo esc_attr( $tag );
		echo ' id="to-top-wrap" class="to-top zeen-effect to-top-' . (int) ( $to_top_icon ) . ' font-' . (int) get_theme_mod( 'typo_copyright', 2 ) . '"><a href="#" id="to-top-a" class="';
		if ( get_theme_mod( 'to_top_icon', 2 ) == 2 ) {
			echo 'tipi-arrow tipi-arrow-m tipi-arrow-t';
		} else {
			echo 'tipi-vertical-c';
		}
		echo '">';
		if ( 1 == $to_top_icon_show ) {
			echo '<i class="tipi-i-angle-up zeen-effect"></i>';
		}
		if ( get_theme_mod( 'to_top_text' ) != '' ) {
			echo '<span>' . get_theme_mod( 'to_top_text' ) . '</span>'; }
		echo '</a></' . esc_attr( $tag ) . '>';
	}
endif;

if ( ! function_exists( 'zeen_no_more_posts' ) ) :
	/**
	 * Reached End
	 *
	 * @since 1.0.0
	 */
	function zeen_no_more_posts( $frontpage = '' ) {
		?>
	<div class="no-more-articles-wrap pagination clearfix tipi-xs-12">
		<div class="no-more-articles no-more tipi-button block-loader"><?php esc_html_e( 'No More Content', 'zeen' ); ?></div>
		<?php if ( empty( $frontpage ) ) { ?>
			<div class="back-to-home"><a href="<?php echo esc_url( get_home_url() ); ?>" class="button__back__home button-arrow-l button-arrow"><i class="tipi-i-arrow-left"></i><span class="button-title"><?php esc_html_e( 'Go Back To Homepage', 'zeen' ); ?></span></a></div>
		<?php } ?>
	</div>
		<?php
	}
endif;

function zeen_ipl_base( $args ) {
	if ( get_theme_mod( 'ipl' ) != 1 ) {
		return;
	}
	if ( empty( $args ) ) {
		zeen_no_more_posts();
	} else {
		echo '<span class="ipl" data-title-prev="';
		the_title_attribute( array( 'post' => $args['pid'] ) );
		echo '" data-next-hex="' . sanitize_hex_color( $args['next_hex'] );
		echo '" data-prev-hex="' . sanitize_hex_color( $args['prev_hex'] );
		echo '" data-title-next="';
		the_title_attribute( array( 'post' => $args['pid_next'] ) );
		echo '" data-pid="' . (int) $args['pid_next'] . '" data-pidori="' . (int) $args['pid'] . '" data-prev="' . esc_url( $args['prev_url'] ) . '" data-next="' . esc_url( $args['next_url'] ) . '"></span>';
	}
}

/**
 * Pagination
 *
 * @since 1.0.0
 */
function zeen_pagination( $type = 1, $args = array(), $echo = true ) {
	$args['posts_per_page'] = get_option( 'posts_per_page' );

	if ( empty( $args['paged'] ) ) {
		$paged          = get_query_var( 'paged' );
		$args['paged']  = empty( $paged ) ? 1 : $paged;
		$args['offset'] = ( $args['paged'] - 1 ) * $args['posts_per_page'];
	}

	if ( ! empty( $args['mnp'] ) ) {
		$mnp = $args['mnp'];
	} else {
		global $wp_query;
		$mnp = $wp_query->max_num_pages;
	}

	$args['root']        = isset( $args['root'] ) ? $args['root'] : '';
	$img_shape           = empty( $args['img_shape'] ) ? '' : $args['img_shape'];
	$args['excerpt_off'] = empty( $args['excerpt_off'] ) ? '' : $args['excerpt_off'];
	$args['byline_off']  = empty( $args['byline_off'] ) ? '' : $args['byline_off'];
	$args['preview']     = empty( $args['preview'] ) ? 1 : $args['preview'];
	$args['next']        = zeen_get_pagi_url( ( (int) ( $args['paged'] ) + 1 ), false, $args['root'] );
	$args['prev']        = zeen_get_pagi_url( $args['paged'], false, $args['root'] );
	$args['frontpage']   = isset( $args['frontpage'] ) ? $args['frontpage'] : '';
	if ( empty( $echo ) ) {
		ob_start();
	}
	if ( $mnp == $args['paged'] && 1 != $type && 0 != $type ) {
		if ( $mnp > 1 ) {
			zeen_no_more_posts( $args['frontpage'] );
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		} else {
			return;
		}
	}
	$load_more_class  = 'block-loader tipi-button inf-load-more';
	$load_more_class .= ' custom-button__fill-' . get_theme_mod( 'load_more_fill', 1 );
	$load_more_class .= ' custom-button__size-' . get_theme_mod( 'load_more_size', 1 );
	$load_more_class .= ' custom-button__rounded-' . get_theme_mod( 'load_more_rounded', 1 );

	switch ( $type ) {
		case 2:
			?>
			<div class="inf-load-more-wrap pagination clearfix inf-spacer">
				<a href="<?php echo esc_url( $args['next'] ); ?>" class="<?php echo esc_attr( $load_more_class ); ?>" data-type="2" data-shape="<?php echo (int) $img_shape; ?>" data-mnp="<?php echo (int) $mnp; ?>" data-title-next="" data-title-prev="" data-preview="<?php echo (int) ( $args['preview'] ); ?>" data-excerpt="<?php echo (int) $args['excerpt_off']; ?>" data-byline="<?php echo (int) $args['byline_off']; ?>" data-next="<?php echo esc_url( $args['next'] ); ?>" data-prev="<?php echo esc_url( $args['prev'] ); ?>"><?php esc_attr_e( 'Load More', 'zeen' ); ?></a>
			</div>
			<?php
			break;
		case 3:
			?>
			<a href="<?php echo esc_url( $args['next'] ); ?>" class="inf-scr inf-spacer clearfix tipi-xs-12" data-type="3" data-title-next="" data-title-prev="" data-preview="<?php echo (int) ( $args['preview'] ); ?>" data-shape="<?php echo (int) $img_shape; ?>" data-mnp="<?php echo (int) ( $mnp ); ?>" data-excerpt="<?php echo (int) $args['excerpt_off']; ?>" data-byline="<?php echo (int) $args['byline_off']; ?>" data-next="<?php echo esc_url( $args['next'] ); ?>" data-prev="<?php echo esc_url( $args['prev'] ); ?>"></a>
			<?php
			break;
		case 4:
			?>
			<div class="inf-load-more-wrap pagination clearfix inf-spacer">
				<a href="<?php echo esc_url( $args['next'] ); ?>" class="inf-scr <?php echo esc_attr( $load_more_class ); ?>" data-type="4" data-shape="<?php echo (int) $img_shape; ?>" data-mnp="<?php echo (int) ( $mnp ); ?>" data-title-next="" data-title-prev="" data-preview="<?php echo (int) ( $args['preview'] ); ?>" data-excerpt="<?php echo (int) $args['excerpt_off']; ?>" data-byline="<?php echo (int) $args['byline_off']; ?>" data-next="<?php echo esc_url( $args['next'] ); ?>" data-prev="<?php echo esc_url( $args['prev'] ); ?>"><?php esc_attr_e( 'Load More', 'zeen' ); ?></a>
			</div>
			<?php
			break;
		default:
			?>
			<div class="pagination tipi-col tipi-xs-12 font-2">
			<?php
				echo paginate_links(
					array(
						'base'      => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
						'format'    => '?paged=%#%',
						'current'   => max( 1, $args['paged'] ),
						'total'     => $mnp,
						'prev_text' => '<i class="tipi-i-chevron-left"></i>',
						'next_text' => '<i class="tipi-i-chevron-right"></i>',
					)
				);
			?>
			</div>
			<?php
			break;
	}
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}

}

/**
 * Pagination type
 *
 * @since 1.0.0
 */
function zeen_pagination_type( $type = 2 ) {

	if ( is_category() || is_tag() || is_tax() ) {
		$pagination = zeen_get_term_meta( 'zeen_pagination' );
		if ( empty( $pagination ) || 99 == $pagination ) {
			if ( is_category() ) {
				return get_theme_mod( 'category_pagination', 2 );
			} elseif ( is_tag() ) {
				return get_theme_mod( 'tags_pagination', 2 );
			} elseif ( is_tax() ) {
				return get_theme_mod( 'tax_pagination', 2 );
			}
		} else {
			return $pagination;
		}
	} elseif ( is_author() ) {
		return get_theme_mod( 'author_pagination', 2 );
	} elseif ( is_home() ) {
		return get_theme_mod( 'blog_page_pagination', 2 );
	} elseif ( is_search() ) {
		return get_theme_mod( 'search_pagination', 2 );
	}

	return $type;
}

/**
 * Tipi Query
 *
 * @since 1.0.0
 */
function zeen_qry( $args = array() ) {

	if ( ! empty( $args['post_type'] ) && 'global' == $args['post_type'] ) {
		$args['post_type'] = 'any';
	}

	if ( ! empty( $args['trending'] ) && function_exists( 'stats_get_from_restapi' ) ) {
		$args['post__in'] = get_transient( $args['trending']['name'] );

		if ( empty( $args['post__in'] ) ) {
			$args['post__in'] = array();
			$max_val          = empty( $args['tag__in'] ) ? 30 : 100;
			$max_val          = apply_filters( 'zeen_trending_max', $max_val );
			$num              = empty( $args['trending']['num'] ) ? 2 : $args['trending']['num'];
			$max              = empty( $args['trending']['max'] ) ? $max_val : (int) ( $args['trending']['max'] ) + $max_val;
			$stats            = stats_get_from_restapi( array(), 'top-posts?max=' . $max . '&summarize=1&num=' . intval( $num ) );
			if ( ! empty( $stats->summary ) & ! empty( $stats->summary->postviews ) ) {
				$i              = 1;
				$args['offset'] = empty( $args['offset'] ) ? '' : $args['offset'];
				foreach ( $stats->summary->postviews as $key ) {
					if ( 'page' != $key->type && 'homepage' != $key->type ) {
						if ( ! empty( $args['offset'] ) && $args['offset'] < $i ) {
							$i++;
							continue;
						}
						if ( ! empty( $args['cat'] ) ) {
							if ( has_category( $args['cat'], $key->id ) ) {
								$args['post__in'][] = $key->id;
							}
						} else {
							$args['post__in'][] = $key->id;
						}
						if ( count( $args['post__in'] ) == $args['posts_per_page'] ) {
							break;
						}
					}
					$i++;
				}
				set_transient( $args['trending']['name'], $args['post__in'], 600 );
			}
		}

		$args['orderby'] = 'post__in';
		unset( $args['trending'] );
	}

	if ( ! empty( $args['tipi'] ) ) {
		if ( ! is_array( $args['tipi'] ) ) {
			switch ( $args['tipi'] ) {
				case 'editor_rating':
					$args['meta_query'] = array(
						array(
							'key'     => '_lets_review_final_score_100',
							'value'   => '',
							'compare' => '!=',
						),
						array(
							'key'     => '_lets_review_onoff',
							'value'   => '1',
							'compare' => '==',
						),
					);
					$args['orderby']    = 'meta_value_num';
					break;
				case 'latest_rating':
					$args['meta_query'] = array(
						array(
							'key'     => '_lets_review_final_score_100',
							'value'   => '',
							'compare' => '!=',
						),
						array(
							'key'     => '_lets_review_onoff',
							'value'   => '1',
							'compare' => '==',
						),
					);
					$args['order']      = 'DESC';
					break;
				case 'visitor_rating':
					$args['meta_query'] = array(
						array(
							'key'     => '_lets_review_user_rating',
							'value'   => '',
							'compare' => '!=',
						),
						array(
							'key'     => '_lets_review_onoff',
							'value'   => '1',
							'compare' => '==',
						),
					);
					$args['orderby']    = 'meta_value_num';
					break;
				case 'oldest':
					$args['order'] = 'ASC';
					break;
				case 'random':
					$args['orderby'] = 'RAND(' . rand( 10, 100 ) . ')';
					break;
				case 'liked':
					$args['meta_key'] = 'zeen_like_count';
					$args['orderby']  = 'meta_value_num';
					break;
				case 'a_z':
					$args['orderby'] = 'title';
					$args['order']   = 'ASC';
					break;
				case 'z_a':
					$args['orderby'] = 'title';
					break;
				case 'post__in':
					$args['orderby'] = 'post__in';
					break;
				case 'top_sellers':
					$args['meta_key'] = 'total_sales';
					$args['orderby']  = 'meta_value_num';
					break;
				default:
					$args['order'] = 'DESC';
					break;
			}
		} else {
			if ( isset( $args['tipi']['random'] ) ) {
				$args['orderby'] = 'RAND(' . $args['tipi']['random'] . ')';
			}
		}

		unset( $args['tipi'] );
	}

	if ( ! empty( $args['post__in'] ) ) {
		if ( ! is_array( $args['post__in'] ) ) {
			$args['post__in'] = explode( ',', str_replace( ' ', '', $args['post__in'] ) );
		}
		unset( $args['offset'] );
		unset( $args['paged'] );
		$args['posts_per_page'] = count( $args['post__in'] );
	}

	if ( empty( $args['ignore_sticky_posts'] ) ) {
		$args['ignore_sticky_posts'] = true;
	}

	if ( ! empty( $args['tax_query'] ) ) {

		if ( is_string( $args['tax_query'] ) && substr( $args['tax_query'], 0, 6 ) == 'post-f' ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array(
						$args['tax_query'],
					),
				),
			);
		}
	}

	if ( ! empty( $args['post_type'] ) && ( ( is_array( $args['post_type'] ) && in_array( 'product', $args['post_type'] ) ) || ( is_string( $args['post_type'] ) && 'product' == $args['post_type'] ) ) ) {
		$product_vis = array(
			array(
				'taxonomy' => 'product_visibility',
				'terms'    => array( 'exclude-from-catalog' ),
				'field'    => 'name',
				'operator' => 'NOT IN',
			),
		);
		if ( empty( $args['tax_query'] ) ) {
			$args['tax_query'] = $product_vis;
		} else {
			$args['tax_query'][]           = $product_vis;
			$args['tax_query']['relation'] = 'AND';
		}
	}

	if ( isset( $args['offset'] ) ) {
		if ( 0 == $args['offset'] ) {
			unset( $args['offset'] );
		} elseif ( ! empty( $args['paged'] ) && ! empty( $args['archive_qry'] ) ) {
			$args['offset'] = $args['offset'] + ( ( $args['paged'] - 1 ) * $args['posts_per_page'] );
		}
	}
	if ( isset( $args['trending'] ) && empty( $args['trending'] ) ) {
		unset( $args['trending'] );
	}
	if ( isset( $args['tipi'] ) && empty( $args['tipi'] ) ) {
		unset( $args['tipi'] );
	}
	if ( isset( $args['archive_qry'] ) ) {
		unset( $args['archive_qry'] );
	}
	$args = apply_filters( 'zeen_qry_args', $args );
	if ( function_exists( 'relevanssi_do_query' ) && isset( $args['s'] ) ) {
		$query = new WP_Query();
		$query->parse_query( $args );
		relevanssi_do_query( $query );
		return $query;
	} else {
		return new WP_Query( $args );
	}
}

/**
 * Get post class
 *
 * @since 1.0.0
 */
function zeen_get_post_class( $classes = array(), $pid = '' ) {
	return join( ' ', get_post_class( $classes, $pid ) );
}

/**
 * Subtitle
 *
 * @since 1.0.0
 */
function zeen_subtitle( $pid = '', $echo = true ) {
	$subtitle = zeen_get_subtitle_value( $pid );
	if ( empty( $subtitle ) ) {
		return;
	}
	?>
	<<?php echo esc_attr( apply_filters( 'zeen_subtitle_tag', 'p' ) ); ?> class="subtitle flipboard-subtitle font-<?php echo (int) get_theme_mod( 'typo_subtitles', 1 ); ?>"><?php echo zeen_get_subtitle_value( $pid ); ?></<?php echo esc_attr( apply_filters( 'zeen_subtitle_tag', 'p' ) ); ?>>
	<?php

}

function zeen_get_subtitle_value( $pid = '' ) {
	if ( empty( $pid ) ) {
		global $post;
		$pid = $post->ID;
	}

	$value = get_post_meta( $pid, 'zeen_subtitle', true );
	$value = ! isset( $value ) ? get_post_meta( $pid, 'wps_subtitle', true ) : $value;
	$value = ! isset( $value ) ? get_post_meta( $pid, '_subtitle', true ) : $value;
	return apply_filters( 'zeen_subtitle', $value, $pid );
}

/**
 * Sidebar Checker
 *
 * @since 1.0.0
 */
function zeen_sidebar_checker( $args = array() ) {

	$pid = '';
	if ( empty( $args['pid'] ) ) {
		if ( is_singular() ) {
			global $post;
			$pid = $post->ID;
		}
	} else {
		$pid = $args['pid'];
	}
	$archive = empty( $args['archive'] ) ? '' : $args['archive'];
	if ( zeen_unsidebar_mob() || ( is_page() && get_post_meta( $pid, 'tipi_builder_active', true ) == 1 && ! empty( $archive ) ) ) {
		return false;
	}

	if ( ! empty( $args['archive'] ) ) {
		if ( is_numeric( $args['archive'] ) && $args['archive'] > 50 ) {
			return false;
		} elseif ( 'woo' == $args['archive'] ) {
			if ( is_product() ) {
				$product_layout = zeen_get_product_design();
				if ( 1 != $product_layout['hero'] ) {
					return false;
				}
			} elseif ( get_theme_mod( 'woo_layout', 3 ) < 10 ) {
				return false;
			}
		} elseif ( 'bbpress' == $args['archive'] ) {
			if ( get_theme_mod( 'bbpress_layout', 1 ) > 10 ) {
				return false;
			}
		} elseif ( 'buddypress' == $args['archive'] ) {
			if ( get_theme_mod( 'buddypress_layout', 1 ) > 10 ) {
				return false;
			}
		}
	} elseif ( ! empty( $args['pid'] ) ) {

		$output = get_post_meta( $args['pid'], 'zeen_article_layout', true );
		if ( empty( $output ) || 99 == $output ) {
			$output = is_page() ? get_theme_mod( 'pages_article_layout', 1 ) : get_theme_mod( 'article_layout', 1 );
		}

		if ( $output > 30 ) {
			return false;
		}
	}

	if ( zeen_woo_active() && ( is_cart() || is_checkout() ) ) {
		return false;
	}

	return true;
}

function zeen_get_product_design() {
	$output = array(
		'hero'              => (int) get_theme_mod( 'woo_product_layout', 2 ),
		'tabs'              => (int) get_theme_mod( 'woo_products_tabs', 1 ),
		'description_width' => (int) get_theme_mod( 'woo_products_description_width', 1 ),
	);
	if ( is_product() ) {
		global $post;
		$pid  = $post->ID;
		$hero = get_post_meta( $pid, 'zeen_hero_design', true );
		if ( ! ( empty( $hero ) || 99 == $hero ) ) {
			$output['hero'] = (int) $hero;
		}
		$tabs = get_post_meta( $pid, 'zeen_tabs', true );
		if ( ! ( empty( $tabs ) || 99 == $tabs ) ) {
			$output['tabs'] = (int) $tabs;
		}
		$description_width = get_post_meta( $pid, 'zeen_description_width', true );
		if ( ! ( empty( $description_width ) || 99 == $description_width ) ) {
			$output['description_width'] = (int) $description_width;
		}
	}
	return $output;
}


/**
 * Full Width Checker
 *
 * @since 1.0.0
 */
function zeen_fw_checker( $preview = '', $type = '' ) {
	if ( ! empty( $type ) ) {
		if ( 'archive' == $type && $preview > 80 ) {
			$layout = '';
			if ( is_category() ) {
				$cat         = get_query_var( 'cat' );
				$base_layout = get_term_meta( $cat, 'zeen_layout', true );
				if ( empty( $base_layout ) || 99 == $base_layout ) {
					$layout = get_theme_mod( 'category_fs' ) == 1 ? 'on' : 'off';
				} else {
					$layout = get_term_meta( $cat, 'zeen_fs', true );
				}
			} elseif ( is_tag() ) {
				$tag         = get_query_var( 'tag_id' );
				$base_layout = get_term_meta( $tag, 'zeen_layout', true );
				if ( empty( $base_layout ) || 99 == $base_layout ) {
					$layout = get_theme_mod( 'tags_fs' ) == 1 ? 'on' : 'off';
				} else {
					$layout = get_term_meta( $tag, 'zeen_fs', true );
				}
			} elseif ( is_search() ) {
				$layout = get_theme_mod( 'search_fs' ) == 1 ? 'on' : 'off';
			} elseif ( is_author() ) {
				$layout = get_theme_mod( 'author_fs' ) == 1 ? 'on' : 'off';
			} elseif ( is_home() ) {
				$layout = get_theme_mod( 'blog_page_fs' ) == 1 ? 'on' : 'off';
			} elseif ( is_tax() ) {
				$queried_object = get_queried_object();
				$term_id        = $queried_object->term_id;
				$base_layout    = get_term_meta( $term_id, 'zeen_layout', true );
				if ( empty( $base_layout ) || 99 == $base_layout ) {
					$layout = get_theme_mod( 'category_fs' ) == 1 ? 'on' : 'off';
				} else {
					$layout = get_term_meta( $term_id, 'zeen_fs', true );
				}
			}

			if ( 'off' == $layout ) {
				return false;
			} else {
				return true;
			}
		}
	}

	if ( $preview > 80 ) {
		return true;
	}

	return false;
}

/**
 * Image Shape Checker
 *
 * @since 3.6.0
 */
function zeen_image_shape_checker( $preview = '' ) {
	$output  = '';
	$allowed = array( '1', '21', '26', '27', '28', '61', '71', '72', '79' );
	if ( ! empty( $preview ) && ! in_array( $preview, $allowed ) ) {
		return '';
	}
	if ( is_category() ) {
		$default = get_theme_mod( 'category_image_shape', 1 );
		$tid     = get_query_var( 'cat' );
	} elseif ( is_tag() ) {
		$tid = get_query_var( 'tag_id' );
	} elseif ( is_search() ) {
		$output = get_theme_mod( 'search_image_shape', 1 );
	} elseif ( is_home() ) {
		$output = get_theme_mod( 'blog_page_image_shape', 1 );
	} elseif ( is_author() ) {
		$output = get_theme_mod( 'author_image_shape', 1 );
	} elseif ( is_tax() ) {
		$queried_object = get_queried_object();
		$tid            = $queried_object->term_id;
		$default        = get_theme_mod( 'tax_image_shape', 1 );
	}
	if ( empty( $output ) && ! empty( $tid ) ) {
		$base_layout = get_term_meta( $tid, 'zeen_layout', true );
		if ( ! empty( $default ) && ( empty( $base_layout ) || 99 == $base_layout ) ) {
			$output = $default;
		} else {
			$output = get_term_meta( $tid, 'zeen_image_shape', true );
		}
	}

	return $output;
}
/**
 * Flipstack Checker
 *
 * @since 4.0.0
 */
function zeen_flipstack_checker( $preview = '' ) {
	$output  = '';
	$allowed = array( 61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79 );
	if ( ! empty( $preview ) && ! in_array( $preview, $allowed ) ) {
		return '';
	}
	if ( is_category() ) {
		$output = get_theme_mod( 'category_flipstack' );
	} elseif ( is_tag() ) {
		$output = get_theme_mod( 'tags_flipstack' );
	} elseif ( is_search() ) {
		$output = get_theme_mod( 'search_flipstack' );
	} elseif ( is_home() ) {
		$output = get_theme_mod( 'blog_page_flipstack' );
	} elseif ( is_author() ) {
		$output = get_theme_mod( 'author_flipstack' );
	} elseif ( is_tax() ) {
		$output = get_theme_mod( 'tax_flipstack' );
	}

	return $output;
}

/**
 * Preview check
 *
 * @since 1.0.0
 */
function zeen_preview_check() {

	$output = apply_filters( 'zeen_archive_default_layout', 21 );

	if ( is_home() ) {
		$output = get_theme_mod( 'blog_page_layout', 24 );
	} elseif ( is_category() ) {
		$layout = zeen_get_term_meta( 'zeen_layout' );
		if ( empty( $layout ) || 99 == $layout ) {
			$layout = get_theme_mod( 'category_layout', 24 );
		}
		$output = $layout;
	} elseif ( is_tax() ) {
		$layout = zeen_get_term_meta( 'zeen_layout' );
		if ( empty( $layout ) || 99 == $layout ) {
			$layout = get_theme_mod( 'tax_layout', 24 );
		}
		$output = $layout;
	} elseif ( is_tag() ) {
		$layout = zeen_get_term_meta( 'zeen_layout' );
		if ( empty( $layout ) || 99 == $layout ) {
			$layout = get_theme_mod( 'tags_layout', 24 );
		}
		$output = $layout;
	} elseif ( is_author() ) {
		$output = get_theme_mod( 'author_layout', 24 );
	} elseif ( is_search() ) {
		$output = get_theme_mod( 'search_layout', 24 );
	}

	$sidebar = zeen_get_sidebar_slug();
	if ( 'sidebar-default' == $sidebar ) {
		if ( ! is_active_sidebar( $sidebar ) ) {
			if ( 24 == $output ) {
				$output = 64;
			}
			if ( 21 == $output ) {
				$output = 61;
			}
		}
	}
	return $output;
}

/**
 * Block
 *
 * @since 1.0.0
 */
function zeen_block( $post = '', $args = array() ) {
	$i            = $args['i'];
	$echo         = isset( $args['echo'] ) ? $args['echo'] : true;
	$args['tile'] = isset( $args['tile'] ) ? $args['tile'] : '';
	$p            = $args['preview'];

	if ( $p > 80 ) {
		$current_post = new ZeenPreviewGrid( $post, $i, $args );
	} elseif ( 75 == $p || 76 == $p || 69 == $p ) {
		if ( 0 == $i ) {
			$current_post = new ZeenPreviewClassic( $post, $i, $args );
		} else {
			if ( 69 != $p ) {
				$args['split']      = true;
				$args['byline_off'] = '';
			}
			$current_post = new ZeenPreviewThumbnail( $post, $i, $args );
		}
	} elseif ( $p > 50 && $p < 57 ) {
		$current_post = new ZeenPreviewSlider( $post, $i, $args );
	} elseif ( $p < 50 && $p > 44 ) {
		$current_post = new ZeenPreviewVideo( $post, $i, $args );
	} elseif ( 43 == $p ) {
		if ( 0 == $i ) {
			$args['preview'] = 2;
			$current_post    = new ZeenPreviewClassic( $post, $i, $args );
		} else {
			$args['preview'] = 22;
			$current_post    = new ZeenPreviewThumbnail( $post, $i, $args );
		}
	} elseif ( $p > 40 && $p < 45 ) {
		$reversed = apply_filters( 'zeen_blocks_mix_reversed', false ) == false ? 2 : 0;
		if ( $reversed == $i % 3 ) {
			$args['preview']        = 2;
			$args['excerpt_length'] = ! empty( $args['excerpt_length'] ) ? (int) ( $args['excerpt_length'] * 2.5 ) : '';
			if ( 44 == $p ) {
				$args['classes'][]   = 'classic-to-grid tile-design tile-design-4';
				$args['excerpt_off'] = true;
				$args['overlay']     = true;
			}
		} else {
			$args['preview'] = 42 == $p ? 21 : 1;
		}
		$current_post = new ZeenPreviewClassic( $post, $i, $args );
	} elseif ( 22 == $p || 23 == $p || 25 == $p ) {
		$current_post = new ZeenPreviewThumbnail( $post, $i, $args );
	} elseif ( 5 == $p || 68 == $p ) {
		$current_post = new ZeenPreviewText( $post, $i, $args );
	} elseif ( 74 == $p ) {
		$current_post = new ZeenPreviewHoverer( $post, $i, $args );
	} else {
		$current_post = new ZeenPreviewClassic( $post, $i, $args );
	}
	if ( ! empty( $echo ) ) {
		$current_post->output();
	} else {
		return $current_post->output( false );
	}
}

/**
 * Get post format
 *
 * @since 1.0.0
 */
function zeen_post_format_data( $pid = '', $args = array() ) {
	if ( empty( $args['post_format'] ) ) {
		return;
	}
	$echo = ! isset( $args['echo'] ) ? true : $args['echo'];

	if ( empty( $echo ) ) {
		ob_start();
	}
	$preview_type = isset( $args['preview_type'] ) ? $args['preview_type'] : '';
	$wrap_type    = 'div';
	if ( 'classic' == $preview_type ) {
		$wrap_type = 'a';
	}
	$source            = get_post_meta( $pid, 'zeen_source', true ) ? get_post_meta( $pid, 'zeen_source', true ) : 1;
	$lightbox          = empty( $args['hero'] ) ? get_theme_mod( 'media_lightbox', 1 ) : true;
	$args['classes']   = empty( $args['classes'] ) ? '' : $args['classes'];
	$args['icon_size'] = empty( $args['icon_size'] ) ? 'm' : $args['icon_size'];
	if ( ! empty( $lightbox ) || ! empty( $args['trigger_on'] ) ) {
		$args['classes'] .= ' media-tr';
	}
	$args['classes']     .= ' icon-1';
	$args['width']        = empty( $args['width'] ) ? 'full' : $args['width'];
	$args['trigger_tag']  = empty( $args['trigger_tag'] ) ? 'a' : $args['trigger_tag'];
	$args['hero_design']  = empty( $args['hero_design'] ) ? '' : $args['hero_design'];
	$args['size']         = empty( $args['size'] ) ? 'hero-l' : $args['size'];
	$args['media_design'] = empty( $args['media_design'] ) ? zeen_get_media_design( $pid, $args['post_format'] ) : $args['media_design'];

	if ( 'video' == $args['post_format'] || 'audio' == $args['post_format'] ) {
		$options = array( 'tipi-i-headphones', 'tipi-i-music', 'tipi-i-play', 'tipi-i-play_arrow', 'tipi-i-film', 'tipi-i-video' );
		if ( 'audio' == $args['post_format'] ) {
			$icon_type = get_theme_mod( 'audio_icon', 1 ) == 1 ? 'tipi-i-headphones' : 'tipi-i-music';
		} else {
			$v_icon = get_theme_mod( 'video_icon', 1 );
			if ( 1 == $v_icon ) {
				$icon_type = 'tipi-i-play_arrow';
			} elseif ( 2 == $v_icon ) {
				$icon_type = 'tipi-i-play';
			} elseif ( 3 == $v_icon ) {
				$icon_type = 'tipi-i-film';
			} elseif ( 4 == $v_icon ) {
				$icon_type = 'tipi-i-video';
			}
		}
		if ( 12 == $args['media_design'] ) {
			if ( 'a' == $wrap_type ) {
				echo '<a href="' . esc_url( get_permalink( $pid ) ) . '" class="video-wrap';
			} else {
				echo '<div class="video-wrap';
			}
			echo '">';
		}
		if ( 2 == $source ) {
			$data_src_a = empty( $lightbox ) ? get_permalink( $pid ) : zeen_media_url(
				$pid,
				array(
					'post_format'  => $args['post_format'],
					'media_design' => $args['media_design'],
					'file_type'    => 1,
					'source'       => $source,
				)
			);
			$data_src_b = zeen_media_url(
				$pid,
				array(
					'post_format'  => $args['post_format'],
					'media_design' => $args['media_design'],
					'file_type'    => 2,
					'source'       => $source,
				)
			);
		}

		if ( 1 == $args['media_design'] || 2 == $args['media_design'] || 46 == $args['media_design'] ) {
			$title = '';
			if ( 1 == $args['media_design'] ) {
				$type = 'frame';
			} elseif ( 2 == $args['media_design'] ) {
				$type = 'embed';
			} elseif ( 46 == $args['media_design'] ) {
				$type   = '46';
				$target = $args['js_id'];
				$title  = true;
			}
			if ( empty( $target ) ) {
				$target = empty( $args['target'] ) ? 'hero-wrap' : $args['target'];
				$target = ! empty( $args['hero_design'] ) && 'audio' == $args['post_format'] && ( 19 == $args['hero_design'] || 43 == $args['hero_design'] ) ? '.meta' : $target;
			}

			if ( 2 == $source ) {
				echo '<' . esc_attr( $args['trigger_tag'] ) . ' ';
				if ( 'a' != $args['trigger_tag'] ) {
					echo 'data-';
				}
				echo 'href="';
				echo esc_url( $data_src_a );
				echo '" class="tipi-all-c media-icon ' . esc_attr( $args['classes'] ) . ' icon-base-' . (int) ( get_theme_mod( 'icon_design', 1 ) ) . ' icon-size-' . esc_attr( $args['icon_size'] ) . '" data-type="' . esc_attr( $type ) . '" data-format="' . esc_attr( $args['post_format'] ) . '" data-pid="' . (int) $pid . '" data-target="';
				echo esc_attr( $target );
				echo '"';
				echo ' data-title="';
				if ( ! empty( $title ) ) {
					the_title_attribute( array( 'post' => $pid ) );
				}
				echo '" data-duration="';
				echo esc_attr( zeen_media_duration( $pid, true ) );
				echo '"';
				echo 'data-source="self" data-src-a="' . esc_url( $data_src_a ) . '" data-src-b="' . esc_url( $data_src_b ) . '">';
				?>
				<i class="<?php echo zeen_sanitizer_options( $icon_type, $options ); ?>" aria-hidden="true"></i><span class="icon-bg"></span></<?php echo esc_attr( $args['trigger_tag'] ); ?>>
			<?php } else { ?>
				<?php
				$media_url = empty( $lightbox ) && 'video' != $preview_type ? get_permalink( $pid ) : zeen_media_url(
					$pid,
					array(
						'post_format'  => $args['post_format'],
						'media_design' => $args['media_design'],
					)
				);
				echo '<' . esc_attr( $args['trigger_tag'] ) . ' ';
				if ( 'a' != $args['trigger_tag'] ) {
					echo 'data-';
				}
				echo 'href="';
				echo esc_url( $media_url );
				echo '" class="tipi-all-c media-icon ' . esc_attr( $args['classes'] ) . ' icon-base-' . (int) ( get_theme_mod( 'icon_design', 1 ) ) . ' icon-size-' . esc_attr( $args['icon_size'] ) . '" data-type="' . esc_attr( $type ) . '" data-format="' . esc_attr( $args['post_format'] ) . '"';
				echo ' data-title="';
				if ( ! empty( $title ) ) {
					the_title_attribute( array( 'post' => $pid ) );
				}
				echo '" data-duration="';
				echo esc_attr( zeen_media_duration( $pid, true ) );
				echo '"';
				echo 'data-pid="' . (int) $pid . '" data-target="' . esc_attr( $target ) . '" data-source="ext" data-src="' . esc_url( $media_url ) . '">';
				?>
				<i class="<?php echo zeen_sanitizer_options( $icon_type, $options ); ?>" aria-hidden="true"></i><span class="icon-bg"></span></<?php echo esc_attr( $args['trigger_tag'] ); ?>>
			<?php } ?>

			<?php if ( 46 == $args['media_design'] ) { ?>
				<span class="playing-msg"><?php esc_attr_e( 'Playing', 'zeen' ); ?></span>
			<?php } ?>
			<?php
		} elseif ( 11 == $args['media_design'] || 12 == $args['media_design'] || 21 == $args['media_design'] ) {
			if ( 12 != $args['media_design'] ) {
				echo '<div class="video-wrap';
				echo ' media-wrap-' . esc_attr( $args['post_format'] );
				echo '">';
			}
			if ( 2 == $source ) {
				echo '<' . esc_attr( $args['post_format'] );
				if ( 12 == $args['media_design'] ) {
					echo ' autoplay loop muted playsinline';
				} else {
					echo ' controls="controls"';
				}
				echo ' data-pid="' . (int) $pid . '"';
				echo ' controlsList="nodownload">';

				if ( ! empty( $data_src_a ) ) {
					echo '<source src="' . esc_url( $data_src_a ) . '" type="' . esc_attr( $args['post_format'] ) . '/';
					if ( $args['post_format'] == 'video' ) {
						echo 'mp4';
					} else {
						echo 'mpeg';
					}
					echo '" />';
				}

				if ( ! empty( $data_src_b ) ) {
					echo '<source src="' . esc_url( $data_src_b ) . '" type="' . esc_attr( $args['post_format'] ) . '/ogg" />';
				}
				echo '</' . esc_attr( $args['post_format'] ) . '>';
			} else {
				$media_url_iframe = zeen_media_url(
					$pid,
					array(
						'post_format'  => $args['post_format'],
						'media_design' => $args['media_design'],
					)
				);
				if ( 12 == $args['media_design'] ) {
					echo '<iframe class="frame';
					if ( 1 == $source ) {
						echo empty( $args['hoverer'] ) ? ' zeen-iframe-lazy-load' : ' zeen-hoverer-lazy-load';
					}
					echo '" title="media" src="about:blank" data-lazy-src="' . esc_url( $media_url_iframe ) . '" frameborder="0" seamless="seamless" allowfullscreen></iframe>';
				} else {
					echo '<iframe class="frame" title="media" src="' . esc_url( $media_url_iframe ) . '" frameborder="0" seamless="seamless" allowfullscreen></iframe>';
				}
			}
			if ( 12 != $args['media_design'] ) {
				echo '</div>';
			}
			?>
		<?php } ?>
		<?php
		if ( 12 == $args['media_design'] ) {
			if ( 'a' == $wrap_type ) {
				echo '</a>';
			} else {
				echo '</div>';
			}
		}
		?>
		<?php
	} elseif ( 'gallery' == $args['post_format'] ) {

		$gallery = apply_filters( 'zeen_post_custom_field_gallery', get_post_meta( $pid, 'zeen_gallery', true ), $pid );

		if ( ! is_array( $gallery ) ) {
			return;
		}
		$size = 'zeen-1400-full';
		if ( 's' == $args['hero_size'] ) {
			$size = 'zeen-770-full';
		}
		$slide_16 = '';
		if ( 'l' == $args['hero_size'] ) {
			$slide_16 = ' tipi-row';
		}

		if ( 1 == $args['media_design'] ) {
			?>
			<div class="slider gallery__slider slider-imgs tipi-spin slider-10 slider-height-<?php echo esc_attr( $args['hero_size'] ); ?>" data-fs="<?php echo esc_attr( $args['hero_size'] ); ?>" data-s="10">
			<?php
			foreach ( $gallery as $key => $value ) {
				$caption = wp_get_attachment_caption( $value );
				$image   = wp_get_attachment_image_src( $value, '' );
				if ( $image[1] < $image[2] ) {
					$size = 'zeen-770-full';
				}
				echo '<div class="slide">';
				add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_slider' );
				echo wp_get_attachment_image( $value, $size );
				remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_slider' );
				if ( ! empty( $caption ) ) {
					echo '<div class="caption">' . zeen_sanitize_titles( $caption ) . '</div>';
				}
				echo '</div>';
			}
			zeen_slider_arrows( 1 );
			?>
			</div>
			<?php
		} elseif ( 2 == $args['media_design'] ) {
			?>
			<div class="slider-sync-wrap clearfix">
				<div class="slider gallery__slider slider-imgs slider-for slider-15 tipi-spin slider-height-<?php echo esc_attr( $args['hero_size'] ); ?>" data-s="15" data-fs="<?php echo esc_attr( $args['hero_size'] ); ?>">
				<?php
				foreach ( $gallery as $key => $value ) {
					$image = wp_get_attachment_image_src( $value, '' );
					if ( ! empty( $image ) && $image[1] < $image[2] ) {
						$size = 'zeen-770-full';
					}
					$caption = wp_get_attachment_caption( $value );
					echo '<div class="slide">';
					add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_slider' );
					echo wp_get_attachment_image( $value, $size );
					remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_slider' );
					if ( ! empty( $caption ) ) {
						echo '<div class="caption">' . zeen_sanitize_titles( $caption ) . '</div>';
					}
					echo '</div>';
				}
				?>
				</div>
				<div class="slider gallery__slider slider-nav slider-16<?php echo esc_attr( $slide_16 ); ?>" data-s="16">
				<?php
				foreach ( $gallery as $key => $value ) {
					echo '<div class="slide">' . wp_get_attachment_image( $value, array( 150, 150 ) ) . '</div>';
				}
				zeen_slider_arrows( 2 );
				?>
				</div>
			</div>
			<?php
		} elseif ( 11 == $args['media_design'] ) {
			?>
			<div class="slider-sync-wrap clearfix">
				<div class="slider gallery__slider slider-for" data-slick='{ "slidesToShow": 1, "slidesToScroll": 1, "arrows": false, "fade": true, "asNavFor": ".slider-nav"}'>
				<?php
				foreach ( $gallery as $key => $value ) {
					echo '<div class="tipi-spin">' . wp_get_attachment_image( $value, $size ) . '</div>';
				}
				?>
				</div>
				<div class="slider gallery__slider slider-nav tipi-row" data-slick='{  "slidesToShow": 6, "slidesToScroll": 6, "asNavFor": ".slider-for", "centerMode": true, "focusOnSelect": true }'>
				<?php
				foreach ( $gallery as $key => $value ) {
					echo '<div class="tipi-spin">' . wp_get_attachment_image( $value, $size ) . '</div>';
				}
				?>
				</div>
			</div>
			<?php
		}
	}
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}

function zeen_gallery_img_count( $pid = '' ) {
	$gallery = apply_filters( 'zeen_post_custom_field_gallery', get_post_meta( $pid, 'zeen_gallery', true ), $pid );

	if ( ! is_array( $gallery ) ) {
		return;
	}
	return count( $gallery );

}

function zeen_slider_arrows( $style = 1 ) {
	echo '<span class="slider-arrow slider-arrow-prev slider-arrow-' . (int) $style;
	if ( 1 == $style ) {
		echo ' tipi-arrow-l tipi-arrow tipi-arrow-m';
	} elseif ( 3 == $style ) {
		echo ' tipi-arrow-l tipi-arrow tipi-arrow-s';
	}
	if ( 4 == $style ) {
		echo ' tipi-arrow-l tipi-arrow tipi-arrow-s2 slider-arrow--light';
	}
	echo '">';
	echo '<i class="tipi-i-angle-left"></i>';
	echo '</span>';

	echo '<span class="slider-arrow slider-arrow-next slider-arrow-' . (int) $style;
	if ( 1 == $style ) {
		echo ' tipi-arrow-r tipi-arrow tipi-arrow-m';
	} elseif ( 3 == $style ) {
		echo ' tipi-arrow-r tipi-arrow tipi-arrow-s';
	}
	if ( 4 == $style ) {
		echo ' tipi-arrow-r tipi-arrow tipi-arrow-s2 slider-arrow--light';
	}
	echo '">';
	echo '<i class="tipi-i-angle-right"></i>';
	echo '</span>';
}

/**
 * Get media design
 *
 * @since 1.0.0
 */
function zeen_get_media_design( $pid = '', $post_format = '' ) {

	if ( empty( $post_format ) ) {
		return;
	}

	if ( $post_format == 'video' || $post_format == 'audio' ) {
		$post_format = 'media';
	}

	$media_design = get_post_meta( $pid, 'zeen_' . $post_format . '_design', true );

	if ( empty( $media_design ) || 99 == $media_design ) {
		$output = get_theme_mod( $post_format . '_design', 1 );
	} else {
		$output = $media_design;
	}
	return $output;

}
function zeen_integer_format_short( $n, $precision = 1 ) {
	$suffix = '';
	if ( $n < 1000 ) {
		$n_format = $n;
	} elseif ( $n < 10000 ) {
		$n_format = number_format( $n / 1000, 1 );
		$suffix   = 'K';
	} elseif ( $n < 1000000 ) {
		$n_format = number_format( $n / 1000, 0 );
		$suffix   = 'K';
	} elseif ( $n < 900000000 ) {
		$n_format = number_format( $n / 1000000, $precision );
		$suffix   = 'M';
	} elseif ( $n < 900000000000 ) {
		$n_format = number_format( $n / 1000000000, $precision );
		$suffix   = 'B';
	} else {
		$n_format = number_format( $n / 1000000000000, $precision );
		$suffix   = 'T';
	}
	if ( $precision > 0 ) {
		$dotzero  = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}
	return $n_format . $suffix;
}
/**
 * Get Media URL
 *
 * @since 1.0.0
 */
function zeen_media_url( $pid = '', $args = array() ) {

	$args['post_format']  = empty( $args['post_format'] ) ? 'video' : $args['post_format'];
	$args['media_design'] = empty( $args['media_design'] ) ? 1 : $args['media_design'];
	$args['file_type']    = empty( $args['file_type'] ) ? '' : $args['file_type'];
	$args['source']       = empty( $args['source'] ) ? 1 : $args['source'];

	if ( 1 == $args['source'] ) {
		$url = empty( $args['url'] ) ? get_post_meta( $pid, 'zeen_' . $args['post_format'] . '_code', true ) : $args['url'];

		if ( empty( $url ) ) {
			if ( 'video' == $args['post_format'] ) {
				$url = apply_filters( 'zeen_post_custom_field_video', get_post_meta( $pid, 'cb_video_embed_code_post', true ), $pid );
			} elseif ( 'audio' == $args['post_format'] ) {
				$url = apply_filters( 'zeen_post_custom_field_audio', get_post_meta( $pid, 'cb_soundcloud_embed_code_post', true ), $pid );
			}
		}
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

		if ( ! empty( $args['media_type'] ) ) {
			return $type;
		}

		$autoplay = ! empty( $args['media_design'] );
		$muted    = false;
		if ( $args['media_design'] > 10 && 46 != $args['media_design'] ) {
			$muted    = true;
			$autoplay = get_theme_mod( 'media_autoplay', 1 );
		}
		switch ( $type ) {
			case 'vim':
				$url = substr( wp_parse_url( $url, PHP_URL_PATH ), 1 );
				if ( ! empty( $args['id_only'] ) ) {
					return $url;
				}
				$vid_args = array(
					'autoplay' => $autoplay,
				);
				if ( 12 == $args['media_design'] ) {
					$vid_args['autoplay']   = 1;
					$vid_args['muted']      = 1;
					$vid_args['loop']       = 1;
					$vid_args['portrait']   = 0;
					$vid_args['byline']     = 0;
					$vid_args['dnt']        = 0;
					$vid_args['background'] = 1;
					$vid_args['title']      = 1;
				}
				return add_query_arg(
					$vid_args,
					'https://player.vimeo.com/video/' . $url
				);
			case 'yt':
				preg_match( '([-\w]{11})', $url, $matches );
				if ( ! empty( $matches ) ) {
					if ( ! empty( $args['id_only'] ) ) {
						return $matches[0];
					}
					$vid_args = array(
						'autoplay'       => $autoplay,
						'mute'           => $muted,
						'rel'            => 0,
						'showinfo'       => 0,
						'modestbranding' => 1,
					);
					if ( 12 == $args['media_design'] ) {
						$vid_args['controls']       = 0;
						$vid_args['loop']           = 1;
						$vid_args['playsinline']    = 1;
						$vid_args['showinfo']       = 0;
						$vid_args['fs']             = 0;
						$vid_args['iv_load_policy'] = 3;
						$vid_args['playlist']       = $matches[0];
					}
					return add_query_arg( $vid_args, 'https://www.youtube-nocookie.com/embed/' . $matches[0] );
				}
				break;
			default:
				if ( strpos( $url, 'src="' ) === false && apply_filters( 'zeen_media_use_wp_oembed', true ) == true ) {
					global $wp_embed;
					$url = $wp_embed->run_shortcode( '[embed autoplay="1"]' . $url . '[/embed]' );
				}
				preg_match( '/src="([^"]+)"/', $url, $matches );
				return isset( $matches[1] ) ? $matches[1] : $url;
		}
	} else {
		return get_post_meta( $pid, 'zeen_' . $args['post_format'] . '_file_' . $args['file_type'], true );
	}
}

/**
 * Select header style
 *
 * @since 1.0.0
 */
function zeen_get_style( $location = 'header' ) {
	if ( 'header' == $location && ( is_singular() && ! zeen_is_bbp() && ! zeen_is_bp() && ! zeen_is_woocommerce() ) ) {
		global $post;
		$singular_header = zeen_get_singular_header( $post->ID, is_page() );

		if ( ! empty( $singular_header['style'] ) ) {
			return $singular_header['style'];
		}
	}
	return get_theme_mod( $location . '_style', 1 );

}

/**
 * Get singular header
 *
 * @since 1.0.0
 */
function zeen_get_singular_header( $pid = '', $page = false ) {

	$header = get_post_meta( $pid, 'zeen_singular_header', true );
	$page   = empty( $page ) ? '' : 'pages_';

	if ( empty( $header ) || 99 == $header ) {
		$options = array(
			'style' => get_theme_mod( $page . 'singular_header' ),
		);
	} else {
		$header  = empty( $header ) ? 1 : $header;
		$options = array(
			'style' => $header,
		);
	}

	return $options;

}

/**
 * Style helper
 *
 * @since 1.0.0
 */
function zeen_skin_style( $location = 'header', $option = 'skin', $default = 1 ) {

	if ( 'repeat' == $option ) {
		return get_theme_mod( $location . '_skin_img_repeat', $default );
	}

	return get_theme_mod( $location . '_skin', $default );

}

/**
 * Select menu content area style
 *
 * @since 1.0.0
 */
function zeen_mobile_content_style() {
	return get_theme_mod( 'menu_content_style', 1 );
}

/**
 * Select menu content area style
 *
 * @since 1.0.0
 */
function zeen_get_theme_option( $option = '', $default = '' ) {

	return get_theme_mod( $option, $default );

}

/**
 * Allowed html for wp_kses
 *
 * @since 1.0.0
 */
function zeen_wp_kses_wl( $args ) {

	$args['iframe'] = array(
		'src'             => array(),
		'allowfullscreen' => array(),
		'height'          => array(),
		'scrolling'       => array(),
		'width'           => array(),
		'frameborder'     => array(),
	);

	return $args;
}
add_filter( 'wp_kses_allowed_html', 'zeen_wp_kses_wl' );

/**
 * Post types
 *
 * @since 1.0.0
 */
function zeen_get_post_types( $args = array() ) {

	$page           = empty( $args['page'] ) ? false : $args['page'];
	$attachment     = empty( $args['attachment'] ) ? false : $args['attachment'];
	$args['output'] = empty( $args['output'] ) ? 'names' : $args['output'];
	$cpt_args       = array(
		'public' => true,
	);
	if ( isset( $args['builtin'] ) ) {
		$cpt_args['_builtin'] = $args['builtin'];
	}
	$output = get_post_types( $cpt_args, $args['output'] );

	if ( empty( $page ) ) {
		unset( $output['page'] );
	}
	if ( isset( $args['builtin'] ) || ! empty( $args['essentials'] ) ) {
		unset( $output['topic'] );
		unset( $output['reply'] );
		unset( $output['forum'] );
		unset( $output['elementor_library'] );
		unset( $output['guest-author'] );
		if ( empty( $args['shop'] ) ) {
			unset( $output['product'] );
		}
	}

	if ( empty( $attachment ) ) {
		unset( $output['attachment'] );
	}

	return $output;
}

/**
 * Taxonomy getter
 *
 * @since 1.0.0
 */
function zeen_get_taxonomies( $output = 'names' ) {

	$taxonomies = get_taxonomies(
		array(
			'public' => true,
		),
		$output
	);

	unset( $taxonomies['product_shipping_class'] );
	unset( $taxonomies['topic-tag'] );

	return $taxonomies;

}

/**
 * Header 70s
 *
 * @since 3.4.1
 */
function zeen_header_70s() {
	$header_style = zeen_get_style();
	if ( $header_style < 70 || $header_style > 80 || ZeenMobile::is_mobile() ) {
		return;
	}
	$icons = zeen_icons(
		array(
			'location' => 'secondary_menu',
			'test'     => true,
		)
	);
	if ( ! empty( $icons ) ) {
		echo '<div id="site-header-side-70s" class="site-header-side-70s secondary-wrap header-padding secondary-wrap-v bg-area';
		echo ' secondary-wrap-v-70';
		echo ' v-wrap-l tipi-xs-0 clearfix">';
		echo '<ul id="secondary-navigation" class="secondary-navigation tipi-xs-0 vertical-menu font-' . (int) get_theme_mod( 'typo_secondary_menu', 3 ) . '">';
			zeen_icons(
				array(
					'location' => 'secondary_menu',
					'vertical' => true,
				)
			);
		echo '</ul>';
		zeen_elem_bg_area( 'header' );
		echo '</div>';
	}
}

/**
 * Header 80s
 *
 * @since 3.4.1
 */
function zeen_header_80s() {
	$header_style = zeen_get_style();
	if ( $header_style < 80 || ZeenMobile::is_mobile() ) {
		return;
	}
	$has_menu          = has_nav_menu( 'secondary' );
	$header_side_width = get_theme_mod( 'header_side_width', 80 );
	echo '<div id="site-header-side" class="site-header-side secondary-wrap header-padding secondary-wrap-v bg-area';
	echo ' site-skin-' . (int) zeen_skin_style();
	echo ' site-img-' . (int) zeen_skin_style( 'header', 'repeat' );
	if ( $header_side_width < 131 ) {
		echo ' site-header-side-narrow';
	}
	if ( ! $has_menu ) {
		echo ' site-header-no-menu';
	}
	echo ' v-wrap-l tipi-xs-0 clearfix">';
	echo '<div class="logo-main-wrap">';
	zeen_logo();
	echo '</div>';
	if ( $has_menu ) {
		echo '<ul id="secondary-navigation" class="secondary-navigation tipi-xs-0 vertical-menu font-' . (int) get_theme_mod( 'typo_secondary_menu', 3 ) . '">';
		wp_nav_menu(
			array(
				'theme_location' => 'secondary',
				'container'      => '',
				'items_wrap'     => '%3$s',
			)
		);
		echo '</ul>';
	}
	zeen_elem_bg_area( 'header' );
	echo '<ul class="menu-icons-wrap tipi-flex">';
	zeen_icons(
		array(
			'location' => 'secondary_menu',
		)
	);
	echo '</ul>';
	if ( empty( $has_menu ) ) {
		echo '<span class="menu-placeholder"></span>';
	}
	echo '</div>';
}

/**
 * Get Instagram Block
 *
 * @since 1.0.0
 */
function zeen_instagram_block( $args = array() ) {

	$i                 = 1;
	$args['placement'] = empty( $args['placement'] ) ? '' : $args['placement'];
	$insta_data        = empty( $args['custom_content'] ) ? '' : $args['custom_content'];
	$location          = 1;
	if ( 'header' == $args['location'] ) {
		$location   = 2;
		$boxed      = 2 == get_theme_mod( 'header_block_width', 1 ) ? true : '';
		$insta_data = get_theme_mod( 'header_block_instagram_shortcode' );
	}

	if ( 'footer' == $args['location'] ) {
		if ( get_theme_mod( 'footer_instagram' ) != 1 ) {
			return;
		}
		$boxed = 2 == get_theme_mod( 'footer_width', 1 ) ? true : '';
		if ( get_theme_mod( 'footer_instagram_location', 1 ) != $args['placement'] && empty( $args['override'] ) ) {
			return;
		}
		$insta_data = get_theme_mod( 'footer_instagram_shortcode' );
	}

	if ( empty( $insta_data ) ) {
		return;
	}
	echo '<div class="zeen-instagram-block tipi-flex zeen-instagram-' . (int) ( $location );
	if ( ! empty( $boxed ) ) {
		echo ' tipi-row';
	}
	echo '">' . do_shortcode( zeen_sanitize_wp_kses( $insta_data ) ) . '</div>';
}


/**
 * Slide Menus
 *
 * @since 1.0.0
 */
function zeen_slide_menu( $location = 'mob-content', $value = 1 ) {
	get_template_part( 'template-parts/menu/menu-' . $location, $value );
}

/**
 * Secondary Menu
 *
 * @since 1.0.0
 */
function zeen_secondary_menu( $row = '' ) {
	$icons = zeen_icons(
		array(
			'location' => 'secondary_menu',
			'test'     => true,
		)
	);
	if ( ! has_nav_menu( 'secondary' ) && empty( $icons ) ) {
		return;
	}

	$secondary_menu_width = zeen_check_width( get_theme_mod( 'secondary_menu_width', 1 ) );
	if ( ! empty( $row ) ) {
		$secondary_menu_width = 1;
	}
	$mm_ani = get_theme_mod( 'megamenu_animation_onoff', 1 ) == 1 ? get_theme_mod( 'megamenu_animation', 1 ) : 0;
	echo '<div id="secondary-wrap" class="secondary-wrap tipi-xs-0 clearfix font-' . (int) get_theme_mod( 'typo_secondary_menu', 3 ) . ' mm-ani-' . (int) $mm_ani . ' secondary-menu-skin-' . (int) get_theme_mod( 'secondary_menu_skin', 2 ) . ' secondary-menu-width-' . (int) $secondary_menu_width;
	if ( 3 == $secondary_menu_width ) {
		echo ' tipi-row';
	}
	$style = zeen_get_style();
	if ( $style < 70 && get_theme_mod( 'secondary_menu_flip_contents' ) == 1 ) {
		echo ' menu-secondary--flipped';
	}
	echo '">';
	echo '<div class="menu-bg-area">';

	echo '<div class="menu-content-wrap clearfix tipi-vertical-c';
	if ( 1 == $secondary_menu_width ) {
		echo ' tipi-row';
	}
	echo '">';
	get_template_part( 'template-parts/menu/menu-secondary', 1 );
	if ( ! empty( $icons ) ) {
		echo '<ul class="horizontal-menu menu-icons ul-padding tipi-vertical-c tipi-flex-r secondary-icons">';
		zeen_icons(
			array(
				'location' => 'secondary_menu',
			)
		);
		echo '</ul>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

/**
 * Mobiles
 *
 * @since 1.0.0
 */
function zeen_mobile_share_menu() {

	if ( get_theme_mod( 'mobile_bottom_sticky_onoff', 1 ) != 1 || ! is_single() ) {
		return;
	}
	get_template_part( 'template-parts/menu/menu-mob-share', 1 );

}

/**
 * Progress
 *
 * @since 1.0.0
 */
function zeen_progress() {
	if ( ! is_singular() || ( is_single() && get_theme_mod( 'header_progress', 1 ) != 1 ) || ( is_page() && get_theme_mod( 'pages_header_progress' ) != 1 ) || zeen_is_bp() || zeen_is_bbp() || zeen_is_woocommerce() || apply_filters( 'zeen_progress', true ) == false ) {
		return;
	}
	$ipl = get_theme_mod( 'ipl' );
	echo '<span id="progress" class="';
	if ( empty( $ipl ) ) {
		echo ' no-ipl';
	}
	echo '"></span>';
}

/**
 * Thumbnail Extra Check
 *
 * @since 1.0.0
 */
function zeen_thumbnail_extra_check() {
	$site_width_adjustment = get_theme_mod( 'site_width_posts', 1230 );
	$site_width_adjustment = (int) ( ( $site_width_adjustment - 1230 ) * 0.6666 );
	if ( $site_width_adjustment > 0 ) {
		add_image_size( 'medium_large', 770 + $site_width_adjustment );
	}
}
add_action( 'init', 'zeen_thumbnail_extra_check', 11 );


function zeen_dark_mode_active() {
	$dark = '';
	if ( ! ZeenMobile::amp_is_request() &&
		(
			( is_singular() && get_theme_mod( 'reading_mode' ) )
			|| get_theme_mod( 'main_menu_icon_dark_mode' )
			|| get_theme_mod( 'secondary_menu_icon_dark_mode' )
			|| get_theme_mod( 'footer_icon_dark_mode' )
			|| get_theme_mod( 'mobile_header_icon_dark_mode' )
			|| get_theme_mod( 'mobile_icon_dark_mode' )
		)
	) {
		$dark = true;
	}
	return apply_filters( 'zeen_dark_mode_stylesheet', $dark );
}

function zeen_lazyload_images( $content = '' ) {
	if ( is_admin() || ZeenMobile::amp_is_request() ) {
		return $content;
	}
	$wp_rocket = get_option( 'wp_rocket_settings' );
	if ( get_theme_mod( 'lazy', 1 ) == 1 && apply_filters( 'zeen_lazy_embedded_images', true ) && empty( $wp_rocket['lazyload'] ) ) {
		$content = preg_replace_callback(
			'#<picture(?:.*)?>(?<sources>.*)</picture>#iUs',
			function( $matches ) {
				return zeen_lazyload_images_replacement( $matches, 'picture' );
			},
			$content
		);
		$content = preg_replace_callback( '/<img[^>]+>/i', 'zeen_lazyload_images_replacement', $content );
	}
	if ( zeen_lazyload_iframe_check() ) {
		$content = preg_replace_callback( '#<iframe(.*?)></iframe>#i', 'zeen_lazyload_iframe_replacement', $content );
	}
	return $content;
}
add_filter( 'the_content', 'zeen_lazyload_images' );
add_filter( 'get_avatar', 'zeen_lazyload_images' );

function zeen_lazyload_iframe_check() {
	return ( get_theme_mod( 'lazy_iframes', 1 ) == 1 && empty( $wp_rocket['lazyload_iframes'] ) && empty( $wp_rocket['lazyload_youtube'] ) ) ? true : false;
}

function zeen_lazyload_iframe_replacement( $iframe = '' ) {
	$output   = $iframe[0];
	$excludes = apply_filters(
		'zeen_lazy_load_iframe_exclusions',
		array(
			'data-src',
			'recaptcha/api/fallback',
			'gform_ajax_frame',
			'data-lazy',
			'loading="eager"',
			'mj-w-res-iframe',
		)
	);
	foreach ( $excludes as $exclude ) {
		if ( strpos( $output, $exclude ) !== false ) {
			return $output;
		}
	}
	if ( strpos( $output, 'class="' ) === false ) {
		$output = str_replace( '<iframe', '<iframe class="zeen-lazy-load-base zeen-lazy-load"', $output );
	} else {
		$output = str_replace( 'class="', 'class="zeen-lazy-load-base zeen-lazy-load ', $output );
	}
	$output  = str_replace( 'src="', 'src="about:blank" data-lazy-src="', $output );
	$output .= '<noscript>' . $iframe[0] . '</noscript>';
	return $output;
}
function zeen_lazyload_images_replacement( $image = '', $type = 'img' ) {
	$output   = $image[0];
	$excludes = apply_filters(
		'zeen_lazy_load_images_exclusions',
		array(
			'data-src',
			'data-lazy',
			'loading="eager"',
		)
	);
	foreach ( $excludes as $exclude ) {
		if ( strpos( $output, $exclude ) !== false ) {
			return $output;
		}
	}
	preg_match( '/width=["\'](.+?)["\']/', $image[0], $width );
	$width = ! empty( $width[1] ) ? $width[1] : 370;
	preg_match( '/height=["\'](.+?)["\']/', $image[0], $height );
	$height = ! empty( $height[1] ) ? $height[1] : 247;
	$src    = "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20$width%20$height'%3E%3C/svg%3E";
	if ( strpos( $output, 'class="' ) === false ) {
		$output = str_replace( '<img', '<img class="zeen-lazy-load-base zeen-lazy-load"', $output );
	} else {
		$output = str_replace( 'class="', 'class="zeen-lazy-load-base zeen-lazy-load ', $output );
	}
	$output = str_replace( 'src=', 'data-lazy-src=', $output );
	$output = str_replace( 'srcset=', 'data-lazy-srcset=', $output );
	$output = str_replace( 'sizes=', 'data-lazy-sizes=', $output );

	$output  = str_replace( '<img', '<img src="' . $src . '"', $output );
	$output .= '<noscript>' . $image[0] . '</noscript>';
	return $output;
}

function zeen_photoswipe() {
	if ( get_theme_mod( 'lightbox', 1 ) == 1 && get_theme_mod( 'lightbox_choice', 1 ) == 1 ) {
		get_template_part( 'template-parts/pswp' );
	}
}


/**
 * Thumbnail Sizes
 *
 * @since 1.0.0
 */
function zeen_thumbnail_sizes() {
	$site_width_adjustment = get_theme_mod( 'site_width', 1230 );
	$site_width_adjustment = (int) ( ( $site_width_adjustment - 1230 ) * 0.6666 );
	$sizes                 = array(
		array(
			'label_width'  => 370,
			'label_height' => 247,
			'width'        => 370 + $site_width_adjustment,
			'height'       => 247 * ( 370 + $site_width_adjustment ) / 370,
		), // 33% LANDSCAPE
		array(
			'label_width'  => 585,
			'label_height' => 293,
			'width'        => 585 + $site_width_adjustment,
			'height'       => (int) ( 293 * ( 585 + $site_width_adjustment ) / 585 ),
		), // 50% LANDSCAPE HALF HEIGHT
		array(
			'label_width'  => 770,
			'label_height' => 513,
			'width'        => 770 + $site_width_adjustment,
			'height'       => (int) ( 513 * ( 770 + $site_width_adjustment ) / 770 ),
		), // 66% LANDSCAPE
		array(
			'label_width'  => 1155,
			'label_height' => 770,
			'width'        => 1155 + $site_width_adjustment,
			'height'       => (int) ( 770 * ( 1155 + $site_width_adjustment ) / 1155 ),
		), // 100% LANDSCAPE
		array(
			'label_width'  => 1170,
			'label_height' => 585,
			'width'        => 1170 + $site_width_adjustment,
			'height'       => (int) ( 585 * ( 1170 + $site_width_adjustment ) / 1170 ),
		), // SCREEN LANDSCAPE SMALL
		array(
			'label_width'  => 1500,
			'label_height' => 750,
			'width'        => 1500 + $site_width_adjustment,
			'height'       => (int) ( 750 * ( 1500 + $site_width_adjustment ) / 1500 ),
		), // SCREEN LANDSCAPE
		array(
			'label_width'  => 293,
			'label_height' => 293,
			'width'        => 293 + $site_width_adjustment,
			'height'       => 293 + $site_width_adjustment,
		), // 25% SQUARE
		array(
			'label_width'  => 390,
			'label_height' => 390,
			'width'        => 390 + $site_width_adjustment,
			'height'       => 390 + $site_width_adjustment,
		), // 33% SQUARE
		array(
			'label_width'  => 585,
			'label_height' => 585,
			'width'        => 585 + $site_width_adjustment,
			'height'       => 585 + $site_width_adjustment,
		), // 50% SQUARE
		array(
			'label_width'  => 900,
			'label_height' => 900,
			'width'        => 900 + $site_width_adjustment,
			'height'       => 900 + $site_width_adjustment,
		), // 66% SQUARE
		array(
			'label_width'  => 370,
			'label_height' => 490,
			'width'        => 370 + $site_width_adjustment,
			'height'       => (int) ( 490 * ( 370 + $site_width_adjustment ) / 370 ),
		), // 33% PORTRAIT
		array(
			'label_width'  => 585,
			'label_height' => 775,
			'width'        => 585 + $site_width_adjustment,
			'height'       => (int) ( 775 * ( 585 + $site_width_adjustment ) / 585 ),
		), // 50% PORTRAIT
		array(
			'label_width'  => 770,
			'label_height' => 1020,
			'width'        => 770 + $site_width_adjustment,
			'height'       => (int) ( 1020 * ( 770 + $site_width_adjustment ) / 770 ),
		), // 66% PORTRAIT
		array(
			'label_width'  => 293,
			'label_height' => 'full',
			'width'        => 293 + $site_width_adjustment,
			'height'       => 'full',
		), // 25%
		array(
			'label_width'  => 770,
			'label_height' => 'full',
			'width'        => 770 + $site_width_adjustment,
			'height'       => 'full',
		), // 50%
		array(
			'label_width'  => 1400,
			'label_height' => 'full',
			'width'        => 1400 + $site_width_adjustment,
			'height'       => 'full',
		), // 66%
	);
	if ( ZeenMobile::mobile_thumbnails() ) {
		$sizes[] = array(
			'label_width'  => 120,
			'label_height' => 80,
			'width'        => 120,
			'height'       => 80,
		);
		$sizes[] = array(
			'label_width'  => 240,
			'label_height' => 160,
			'width'        => 240,
			'height'       => 160,
		);
		$sizes[] = array(
			'label_width'  => 390,
			'label_height' => 'full',
			'width'        => 390,
			'height'       => 'full',
		);
	}
	return apply_filters(
		'zeen_thumbnail_sizes',
		$sizes
	);
}
function zeen_crop_ratio( $ratio, $thumb ) {
	if ( 'zeen-770-513' == $thumb || 'zeen-370-247' == $thumb || 'zeen-100-66' == $thumb ) {
		$ratio = '3:2';
	}
	if ( 'zeen-585-293' == $thumb ) {
		$ratio = '2:1';
	}
	if ( 'zeen-370-490' == $thumb || 'zeen-585-775' == $thumb || 'zeen-770-1020' == $thumb ) {
		$ratio = '37:49';
	}
	return $ratio;
}
add_filter( 'crop_thumbnails_editor_printratio', 'zeen_crop_ratio', 10, 2 );

/**
 * Category parents
 *
 * @since 1.0.0
 */
function zeen_parents( $id, $tax = 'category', $visited = array() ) {

	$chain  = array();
	$parent = get_term( $id, $tax );

	if ( empty( $parent ) || is_wp_error( $parent ) ) {
		return $parent;
	}

	$name = $parent->name;
	if ( $parent->parent && $parent->parent != $parent->term_id && ! in_array( $parent->parent, $visited ) ) {
		$visited[]    = $parent->parent;
		$parent_chain = zeen_parents( $parent->parent, $tax, $visited );

		$chain = $chain + $parent_chain;
	}

	$chain[ $parent->name ] = get_term_link( $parent->term_id, $tax );

	return $chain;

}

/**
 * Breadcrumb Separator
 *
 * @since 1.0.0
 */
function zeen_breadcrumbs_sep( $echo = true ) {
	if ( empty( $echo ) ) {
		return zeen_sanitize_titles( apply_filters( 'zeen_breadcrumbs_sep', '<i class="tipi-i-chevron-right"></i>' ) );
	} else {
		echo zeen_sanitize_titles( apply_filters( 'zeen_breadcrumbs_sep', '<i class="tipi-i-chevron-right"></i>' ) );
	}
}

/**
 * UID
 *
 * @since 1.0.0
 */
function zeen_uid( $prepend = '', $append = '' ) {

	return $prepend . mt_rand( 10000, 99999 ) . $append;

}

function zeen_pre() {
	echo '<link rel="preload" type="font/woff2" as="font" href="' . esc_url( get_parent_theme_file_uri( 'assets/css/tipi/tipi.woff2?9oa0lg' ) ) . '" crossorigin="anonymous">';
	if ( get_theme_mod( 'font_2_source', 1 ) == 1 || get_theme_mod( 'font_1_source', 1 ) == 1 || get_theme_mod( 'font_3_source', 1 ) == 1 ) {
		echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">';
		echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous">';
	}
	if ( get_theme_mod( 'font_2_source', 1 ) == 2 || get_theme_mod( 'font_1_source', 1 ) == 2 || get_theme_mod( 'font_3_source', 1 ) == 2 ) {
		echo '<link rel="preconnect" href="https://use.typekit.net/" crossorigin="anonymous">';
	}
	if ( is_singular() || zeen_is_shop() ) {
		$pid     = zeen_is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
		$builder = get_post_meta( $pid, 'tipi_builder_active', true );
		if ( ! empty( $builder ) ) {
			$first = TipiBuilder\ZeenHelpers::zeen_get_first_image( array( 'pid' => $pid ) );
			$mob   = TipiBuilder\ZeenHelpers::zeen_get_first_image(
				array(
					'pid'          => $pid,
					'device_check' => 'mobile',
				)
			);
			if ( ! empty( $first ) ) {
				$width  = $first['width'];
				$height = $first['height'];
				$args   = array(
					'fi' => $first['fi'],
				);
				$media  = array(
					'minmax' => 'min',
					'px'     => 768,
				);
			}
		} elseif ( ! empty( $pid ) && has_post_thumbnail( $pid ) ) {
			$args = zeen_get_hero_design( $pid );
			if ( $args['hero_design'] < 9 ) {
				$width  = 770;
				$height = 'full';
			} elseif ( $args['hero_design'] < 20 ) {
				$height = 770;
				$width  = 1155;
				if ( 18 == $args['hero_design'] ) {
					$width  = 585;
					$height = 775;
				} elseif ( 19 == $args['hero_design'] ) {
					$width  = 585;
					$height = 585;
				}
				if ( isset( $args['medium_height'] ) && 2 == $args['medium_height'] ) {
					$height = 'full';
					$width  = 1400;
				}
			} elseif ( $args['hero_design'] < 29 ) {
				$width  = 'full';
				$height = 'full';
			} elseif ( $args['hero_design'] < 32 ) {
				$width  = 'full';
				$height = 'full';
			} elseif ( $args['hero_design'] < 49 ) {
				$width  = 770;
				$height = 1020;
				if ( 43 == $args['hero_design'] ) {
					$width  = 585;
					$height = 585;
				}
			}
		}
	}
	$top_block = apply_filters( 'zeen_preload_above_header_block', zeen_header_block( array( 'return_qry' => true ) ) );
	if ( ! empty( $top_block['qry'] ) ) {
		$top_block['qry']['posts_per_page'] = 1;
		$top_block['qry']['fields']         = 'ids';
		$qry                                = new WP_Query( $top_block['qry'] );
		if ( ! empty( $qry->posts[0] ) ) :
			$pid = $qry->posts[0];
		endif;
		wp_reset_postdata();
		if ( ! empty( $pid ) && has_post_thumbnail( $pid ) ) {
			$width  = 585;
			$height = 585;
			$args   = array(
				'fi' => get_post_thumbnail_id( $pid ),
			);
			if ( get_theme_mod( 'header_block_mobile' ) != 1 ) {
				$media = array(
					'minmax' => 'min',
					'px'     => 768,
				);
			}
		}
	} else {
		if ( ! empty( $mob ) ) {
			zeen_image_preload_output(
				array(
					'width'  => $mob['width'],
					'height' => $mob['height'],
					'fi'     => $mob['fi'],
					'media'  => array(
						'minmax' => 'max',
						'px'     => 767,
					),
				)
			);
		}
	}

	if ( ! empty( $width ) && ! empty( $height ) ) {
		zeen_image_preload_output(
			array(
				'width'  => $width,
				'height' => $height,
				'fi'     => $args['fi'],
				'media'  => empty( $media ) ? '' : $media,
			)
		);
	}
}
add_action( 'wp_head', 'zeen_pre' );

function zeen_image_preload_output( $args = array() ) {
	$size          = 'full' == $args['width'] ? 'full' : 'zeen-' . $args['width'] . '-' . $args['height'];
	$size          = 'full' == $args['height'] && 770 == $args['width'] ? 'medium_large' : $size;
	$size          = 100 == $args['height'] && 100 == $args['width'] ? 'thumbnail' : $size;
	$image         = wp_get_attachment_image_src( $args['fi'], $size );
	$image_preload = zeen_image_preload(
		array(
			'src'  => empty( $image[0] ) ? '' : $image[0],
			'fi'   => $args['fi'],
			'size' => $size,
		)
	);
	if ( ! empty( $image_preload['href'] ) ) {
		echo '<link rel="preload" as="image" href="' . esc_url( $image_preload['href'] ) . '" imagesrcset="' . esc_attr( $image_preload['srcset'] ) . '" imagesizes="' . esc_attr( wp_get_attachment_image_sizes( $args['fi'], $size ) ) . '"';
		if ( ! empty( $args['media'] ) ) {
			echo ' media="(' . $args['media']['minmax'] . '-width: ' . (int) $args['media']['px'] . 'px)"';
		}
		echo '>';
	}
}

function zeen_load_check( $args = array() ) {
	$script = empty( $args['script'] ) ? '' : $args['script'];
	if ( 'lightbox' === $script ) {
		if ( is_page() || zeen_is_shop() ) {
			$pid                 = zeen_is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
			$tipi_builder_active = get_post_meta( $pid, 'tipi_builder_active', true ) == true ? true : false;
			if ( ! empty( $tipi_builder_active ) ) {
				$check = TipiBuilder\ZeenHelpers::zeen_block_finder( $pid, 'lightbox' );
				if ( empty( $check ) ) {
					return false;
				}
			}
		}
	}
	return true;
}

function zeen_image_preload( $args = array() ) {
	$srcset = wp_get_attachment_image_srcset( $args['fi'], $args['size'] );
	$href   = $args['src'];
	if ( class_exists( 'Imagify_Filesystem' ) && function_exists( 'get_imagify_option' ) && get_imagify_option( 'display_webp' ) ) {
		$filesystem = Imagify_Filesystem::get_instance();
		$webp_url   = rtrim( $href, '/' ) . '.webp';
		$webp_path  = zeen_filesystem_url_to_path( $filesystem, $webp_url );
		if ( $filesystem->exists( $webp_path ) ) {
			$href   = $webp_url;
			$srcset = str_ireplace( '.jpg', '.jpg.webp', $srcset );
			$srcset = str_ireplace( '.png', '.png.webp', $srcset );
		}
	}
	return array(
		'href'   => $href,
		'srcset' => $srcset,
	);
}

function zeen_filesystem_url_to_path( $file_system = '', $url = '' ) {
	$uploads_url = set_url_scheme( $file_system->get_upload_baseurl() );
	$uploads_dir = $file_system->get_upload_basedir( true );
	$root_url    = set_url_scheme( $file_system->get_site_root_url() );
	$root_dir    = $file_system->get_site_root();
	$cdn_url     = zeen_imagify_get_cdn_source();
	$cdn_url     = $cdn_url['url'] ? set_url_scheme( $cdn_url['url'] ) : false;
	$domain_url  = wp_parse_url( $root_url );

	if ( ! empty( $domain_url['scheme'] ) && ! empty( $domain_url['host'] ) ) {
		$domain_url = $domain_url['scheme'] . '://' . $domain_url['host'] . '/';
	} else {
		$domain_url = false;
	}

	if ( $domain_url && strpos( $url, '/' ) === 0 ) {
		$url = $domain_url . ltrim( $url, '/' );
	}

	$url = set_url_scheme( $url );

	if ( $cdn_url && $domain_url && stripos( $url, $cdn_url ) === 0 ) {
		$url = str_ireplace( $cdn_url, $domain_url, $url );
	}

	if ( stripos( $url, $uploads_url ) === 0 ) {
		return str_ireplace( $uploads_url, $uploads_dir, $url );
	}

	if ( stripos( $url, $root_url ) === 0 ) {
		return str_ireplace( $root_url, $root_dir, $url );
	}

	return false;
}

function zeen_imagify_get_cdn_source( $option_url = '' ) {
	if ( defined( 'IMAGIFY_CDN_URL' ) && IMAGIFY_CDN_URL && is_string( IMAGIFY_CDN_URL ) ) {
		$source = array(
			'source' => 'constant',
			'name'   => 'IMAGIFY_CDN_URL',
			'url'    => IMAGIFY_CDN_URL,
		);
	} else {
		$filter_source = array(
			'name' => null,
			'url'  => null,
		);

		$filter_source = apply_filters( 'imagify_cdn_source', $filter_source );

		if ( ! empty( $filter_source['url'] ) ) {
			$source = array(
				'source' => 'filter',
				'name'   => ! empty( $filter_source['name'] ) ? $filter_source['name'] : '',
				'url'    => $filter_source['url'],
			);
		}
	}

	if ( empty( $source['url'] ) ) {
		$source = array(
			'source' => 'option',
			'name'   => '',
			'url'    => $option_url && is_string( $option_url ) ? $option_url : get_imagify_option( 'cdn_url' ),
		);
	}

	if ( empty( $source['url'] ) ) {
		return array(
			'source' => 'option',
			'name'   => '',
			'url'    => '',
		);
	}

	$source['url'] = zeen_imagify_sanitize_cdn_url( $source['url'] );

	if ( empty( $source['url'] ) ) {
		return array(
			'source' => 'option',
			'name'   => '',
			'url'    => '',
		);
	}

	return $source;
}

function zeen_imagify_sanitize_cdn_url( $url ) {
	$url = sanitize_text_field( $url );

	if ( ! $url || ! preg_match( '@^https?://.+\.[^.]+@i', $url ) ) {
		return '';
	}

	return trailingslashit( $url );
}

/**
 * Breadcrumbs
 *
 * @since 1.0.0
 */
function zeen_breadcrumbs( $crumbs_only = '', $size = '', $wrap = '' ) {
	if ( is_singular() ) {
		$pid      = get_the_ID();
		$override = get_post_meta( $pid, 'zeen_breadcrumbs', true );
		if ( 2 == $override ) {
			return;
		}
	}
	if ( apply_filters( 'zeen_use_yoast_breadcrumbs', '' ) == true ) {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_class = 'breadcrumbs-wrap breadcrumbs-sz-';
			if ( ! empty( $size ) ) {
				$yoast_class .= $size;
			}
			yoast_breadcrumb( '<div class="' . $yoast_class . '">', '</div>' );
		}
		return;
	}
	if ( apply_filters( 'zeen_use_rankmath_breadcrumbs', '' ) == true ) {
		if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
			$rank_math_class = 'breadcrumbs-wrap breadcrumbs-sz-';
			if ( ! empty( $size ) ) {
				$rank_math_class .= $size;
			}
			$args = array(
				'wrap_before' => '<div class="' . $rank_math_class . '">',
				'wrap_after'  => '</div>',
				'before'      => '',
				'after'       => '',
			);
			echo rank_math_get_breadcrumbs( $args );
		}
		return;
	}
	if ( get_theme_mod( 'breadcrumbs' ) != 1 || is_front_page() || class_exists( 'bbPress' ) && is_bbpress() ) {
		return;
	}

	$crumbs     = array();
	$i          = 1;
	$home_crumb = array(
		esc_html__( 'Home', 'zeen' ) => get_home_url(),
	);

	$extensions = apply_filters( 'zeen_breadcrumbs_extension', '' );
	$ipl_pid    = ! empty( $_GET['ipl'] ) && ! empty( $_GET['pid'] ) ? $_GET['pid'] : '';
	if ( ! empty( $extensions ) ) {
		$crumbs = $home_crumb;
		$crumbs = array_merge( $crumbs, $extensions );
	} elseif ( is_date() ) {
		$crumbs    = $home_crumb;
		$year      = get_the_time( 'Y' );
		$month     = get_the_time( 'm' );
		$day       = get_the_time( 'd' );
		$month_url = get_month_link( $year, $month );
		$year_url  = get_year_link( $year );

		if ( is_day() ) {
			$crumbs[ $year ]  = $year_url;
			$crumbs[ $month ] = $month_url;
			$crumbs[ $day ]   = '';
		} elseif ( is_month() ) {
			$crumbs[ $year ]  = $year_url;
			$crumbs[ $month ] = '';
		} elseif ( is_year() ) {
			$crumbs[ $year ] = '';
		}
	} elseif ( zeen_is_shop() ) {
		$crumbs                                 = $home_crumb;
		$crumbs[ esc_html__( 'Shop', 'zeen' ) ] = '';
	} elseif ( is_archive() ) {
		$crumbs = $home_crumb;

		$term = get_queried_object();
		if ( ! $term ) {
			return;
		}
		if ( is_category() || is_tax() ) {
			$current_crumb = zeen_parents( $term->term_id, $term->taxonomy );
			$crumbs        = $crumbs + $current_crumb;
		} elseif ( is_tag() ) {
			$crumbs[ single_tag_title( '', false ) ] = '';
		} elseif ( is_author() ) {
			$crumbs[ $term->data->user_nicename ] = '';
		}
	} elseif ( is_single() || ! empty( $ipl_pid ) ) {
		$crumbs = $home_crumb;
		if ( ! empty( $ipl_pid ) ) {
			$post = get_post( $ipl_pid );
		} else {
			global $post;
		}

		if ( 'product' == $post->post_type && function_exists( 'wc_get_product_terms' ) ) {
			$terms = wc_get_product_terms(
				$post->ID,
				'product_cat',
				array(
					'orderby' => 'parent',
					'order'   => 'DESC',
				)
			);
			if ( ! empty( $terms ) ) {
				$main_term     = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
				$current_crumb = zeen_parents( $main_term->term_id, 'product_cat' );
				$crumbs        = array_merge( $crumbs, $current_crumb );
			}
		} else {
			$cats = get_the_category( $post->ID );
			if ( ! empty( $cats ) ) {
				$current_crumb = zeen_parents( $cats[0]->term_id );
				$crumbs        = is_array( $current_crumb ) ? array_merge( $crumbs, $current_crumb ) : $crumbs;
			}
		}
		if ( get_theme_mod( 'breadcrumbs_show_post_title' ) ) {
			$crumbs[ get_the_title( $post->ID ) ] = '';
		}
	} elseif ( is_page() ) {
		$crumbs = $home_crumb;
		global $post;
		$ancestors = get_post_ancestors( $post );
		if ( ! empty( $ancestors ) ) {
			$crumbs[ get_the_title( $ancestors[0] ) ] = get_permalink( $ancestors[0] );
		}
		$crumbs[ get_the_title( $post->ID ) ] = '';
	} elseif ( is_search() ) {
		$crumbs                       = $home_crumb;
		$crumbs[ get_search_query() ] = '';
	}

	if ( empty( $crumbs ) ) {
		return;
	}

	if ( ! empty( $crumbs_only ) ) {
		return $crumbs;
	}

	echo '<div class="breadcrumbs-wrap breadcrumbs-sz-';
	if ( ! empty( $size ) ) {
		echo esc_attr( $size );
	}
	echo '">';
	echo '<div class="breadcrumbs';
	if ( ! empty( $wrap ) ) {
		echo ' tipi-row';
	}
	echo '">';
	?>
			<?php foreach ( $crumbs as $key => $value ) { ?>
				<?php
				if ( 1 != $i ) {
					zeen_breadcrumbs_sep();
				}
				?>
				<div class="crumb">
				<?php if ( ! empty( $value ) ) { ?>
					<a href="<?php echo esc_url( $value ); ?>">
				<?php } ?>
					<span><?php echo esc_html( $key ); ?></span>
				<?php if ( ! empty( $value ) ) { ?>
					</a>
				<?php } ?>
				</div>
				<?php $i++; ?>
			<?php } ?>
		</div>
	</div>
	<?php
}

/**
 * Author page block
 *
 * @since 1.0.0
 */
function zeen_author_page_block( $args = array() ) {
	$action_type = empty( $args['action_type'] ) ? 'team' : $args['action_type'];
	$preview     = empty( $args['preview'] ) ? '' : $args['preview'];
	$fw          = empty( $args['fw'] ) ? '' : $args['fw'];
	if ( ! empty( $fw ) && $preview > 80 ) {
		echo '<div class="tipi-row user-page-box--with-fs">';
	}
	if ( 2 == $args['design'] ) {
		?>
		<div
		<?php
		zeen_classes(
			array(
				'location' => 'sidebar',
				'sticky'   => 'on',
			)
		);
		?>
		>
		<?php
	}
	zeen_user_box(
		array(
			'aid'         => $args['aid'],
			'skin'        => get_theme_mod( 'author_page_box_skin', 1 ),
			'action_type' => $action_type,
			'design'      => $args['design'],
		)
	);
	if ( 2 == $args['design'] || ( ! empty( $fw ) && $preview > 80 ) ) {
		?>
		</div>
		<?php
	}
}

/**
 * Image sizes
 *
 * @since 1.0.0
 */
function zeen_get_image_sizes() {

	$standard = array( 'thumbnail', 'medium', 'large' );

	foreach ( $standard as $key ) {
		$image_sizes[ $key ]['width']  = get_option( "{$key}_size_w" );
		$image_sizes[ $key ]['height'] = get_option( "{$key}_size_h" );
	}

	return $image_sizes;
}

/**
 * Modal Closer
 *
 * @since 1.0.0
 */
function zeen_modal_closer() {
	echo '<a href="#" class="tipi-i-close modal-tr-close close zeen-effect tipi-close-icon"></a>';
}

/**
 * All Sidebars
 *
 * @since  1.0.0
 */
function zeen_all_sidebars( $args = array(), $object = true, $active_only = '' ) {

	global $wp_registered_sidebars;

	foreach ( $wp_registered_sidebars as $value ) {
		$args[ $value['id'] ] = $value['name'];
	}

	$args = array_slice( $args, 0, 1, true ) + array( 2 => esc_html__( 'Create Unique Sidebar', 'zeen' ) ) + array_slice( $args, 1, count( $args ) - 1, true );

	if ( empty( $object ) ) {
		$output = array();
		foreach ( $args as $key => $value ) {
			if ( ! empty( $active_only ) && 'sidebar-default' != $key && 2 != $key ) {
				if ( ! is_active_sidebar( $key ) ) {
					continue;
				}
			}
			$output[] = array(
				'label' => $value,
				'value' => $key,
			);
		}
		$args = $output;
	}

	return $args;
}

/**
 * Get Sidebar
 *
 * @since  1.0.0
 */
function zeen_get_sidebar( $args = array() ) {
	global $post;
	if ( empty( $args ) ) {
		$args = array(
			'pid' => $post->ID,
		);
	}

	$sidebar_check = ! isset( $args['sidebar_check'] ) ? zeen_sidebar_checker( $args ) : $args['sidebar_check'];
	if ( is_page() && get_post_meta( $post->ID, 'tipi_builder_active', true ) || ( ! empty( $args['post_format'] ) && 21 == $args['media_design'] ) ) {
		return;
	}
	if ( ! empty( $args['author_design'] ) && 2 == $args['author_design'] ) {
		zeen_author_page_block(
			array(
				'design'      => 2,
				'aid'         => $args['aid'],
				'action_type' => 'archive',
			)
		);
	} else {
		if ( ! empty( $sidebar_check ) ) {
			get_sidebar();
		}
	}
}

/**
 * Review Box
 *
 * @since  1.0.0
 */
function zeen_review_box( $args = array() ) {
	if ( get_theme_mod( 'lr_show_scores_outside_post', 1 ) != 1 ) {
		return;
	}
	if ( class_exists( 'Lets_Review_API' ) && get_post_meta( $args['pid'], '_lets_review_onoff', true ) == 1 ) {
		$show_icons = ! empty( $args['block_type'] ) && 'classic' == $args['block_type'] ? true : '';
		echo Lets_Review_API::lets_review_get_score_box(
			$args['pid'],
			array(
				'classes'    => 'font-' . (int) get_theme_mod( 'typo_review_numbers', 2 ) . ' zeen-review',
				'color'      => zeen_lr_get_color(),
				'show_icons' => $show_icons,
			)
		);
	}

}

/**
 * Post count
 *
 * @since  1.0.0
 */
function zeen_posts_count() {
	global $wp_query;
	return $wp_query->found_posts;
}

/**
 * Post count
 *
 * @since  1.0.0
 */
function zeen_main_layout( $args, $echo = true ) {
	$max_col_2 = '';
	if ( 22 == $args['preview'] ) {
		$max_col_2 = true;
	}
	$fs        = empty( $args['fs'] ) ? '' : $args['fs'];
	$img_shape = empty( $args['img_shape'] ) ? '' : $args['img_shape'];
	$flipstack = empty( $args['flipstack'] ) ? '' : $args['flipstack'];
	$options   = array(
		'preview'   => $args['preview'],
		'archive'   => 'main',
		'flipstack' => $flipstack,
		'img_shape' => $img_shape,
		'max_col_2' => $max_col_2,
		'wrapper'   => 'off',
		'qry'       => array( 'posts_per_page' => get_option( 'posts_per_page' ) ),
		'fs'        => $fs,
	);

	$block = zeen_block_pick( $options );
	$block->output( $echo );

}

/**
 * Post count
 *
 * @since  1.0.0
 */
function zeen_classes( $args = '' ) {
	$preview  = empty( $args['preview'] ) ? 1 : $args['preview'];
	$location = empty( $args['location'] ) ? 'main' : $args['location'];
	$sticky   = empty( $args['sticky'] ) ? 'off' : $args['sticky'];
	$complete = empty( $args['complete'] ) ? 'on' : $args['complete'];
	$echo     = ! isset( $args['echo'] ) ? true : $args['echo'];
	$cols     = ! isset( $args['cols'] ) ? true : $args['cols'];
	$classes  = empty( $args['classes'] ) ? '' : $args['classes'];

	if ( empty( $echo ) ) {
		ob_start();
	}
	if ( 'on' == $complete ) {
		echo 'class="';
	}
	if ( ! empty( $classes ) ) {
		echo esc_attr( $classes ) . ' ';
	}
	switch ( $location ) {
		case 'sidebar':
			echo 'block clearfix sidebar-wrap sb-wrap-skin-' . (int) zeen_skin_style( 'sidebar' );
			if ( 'off' != $sticky ) {
				echo ' sticky-sb-on';
			}
			if ( ! empty( $cols ) ) {
				echo ' tipi-xs-12 tipi-l-4 tipi-col';
			}
			if ( get_theme_mod( 'sidebar_border_onoff', 1 ) == 1 && get_theme_mod( 'sidebar_border_width', 1 ) > 0 ) {
				echo ' sb-with-border';
			}
			if ( get_theme_mod( 'sidebar_widgets_border_onoff', 1 ) == 1 && get_theme_mod( 'sidebar_widgets_border_bottom', 1 ) != 1 ) {
				echo ' sb-widgets-with-border';
			}
			if ( ! empty( $args['native'] ) && get_theme_mod( 'sidebar_mob', 1 ) != 1 ) {
				echo ' tipi-xs-0';
			}

			if ( ! empty( $args['native'] ) && get_theme_mod( 'sidebar_tab', 1 ) != 1 ) {
				echo ' portrait-tablet-0';
			}
			break;
		case 'main':
			echo 'tipi-xs-12 main-block-wrap clearfix';
			if ( $preview < 50 ) {
				echo ' tipi-l-8';
			}
			if ( empty( $args['fw'] ) && empty( $args['is_product'] ) ) {
				echo ' tipi-col';
			}
			break;
	}
	if ( 'on' == $complete ) {
		echo '"';
	}
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}

function zeen_term_color( $term_id = '' ) {
	if ( ! empty( $term_id ) ) {
		$color = get_term_meta( $term_id, 'zeen_color', true );
	}

	if ( empty( $color ) ) {
		$color = get_theme_mod( 'global_color', '#f7d40e' );
	}

	return $color;
}

function zeen_get_cpt_from_tax( $tax_name = '' ) {
	global $wp_taxonomies;
	return isset( $wp_taxonomies[ $tax_name ] ) ? $wp_taxonomies[ $tax_name ]->object_type : '';
}

function zeen_main_layout_none() {
}

function zeen_is_light( $color ) {
	if ( substr( $color, 0, 1 ) === '#' ) {
		if ( strlen( $color ) == 4 ) {
			$color_d = substr( $color, -1 );
			$color   = $color . $color_d . $color_d . $color_d;
		}
		$color = substr( $color, 1 );
		$r     = hexdec( substr( $color, 0, 2 ) );
		$g     = hexdec( substr( $color, 2, 2 ) );
		$b     = hexdec( substr( $color, 4, 2 ) );
	} elseif ( substr( $color, 0, 3 ) === 'rgb' ) {
		$rgb = explode( '(', $color );
		$rgb = explode( ',', $rgb[1] );
		$r   = $rgb[0];
		$g   = $rgb[1];
		$b   = $rgb[2];
	}
	return ( ( ( (int) $r * 299 ) + ( (int) $g * 587 ) + ( (int) $b * 114 ) ) / 1000 ) > 150;
}

function zeen_color_manipulation( $hexadecimal, $steps ) {
	$output      = '';
	$hexadecimal = substr( $hexadecimal, 1 );
	if ( strlen( $hexadecimal ) == 3 ) {
		$rgbs = array( $hexadecimal[0] . $hexadecimal[0], $hexadecimal[1] . $hexadecimal[1], $hexadecimal[2] . $hexadecimal[2] );
	} else {
		$rgbs = array( $hexadecimal[0] . $hexadecimal[1], $hexadecimal[2] . $hexadecimal[3], $hexadecimal[4] . $hexadecimal[5] );
	}

	foreach ( $rgbs as $rgb ) {
		$rgb     = hexdec( $rgb );
		$rgb     = max( 0, min( 255, $rgb + $steps ) );
		$output .= str_pad( dechex( $rgb ), 2, '0', STR_PAD_LEFT );
	}
	return '#' . $output;
}

function zeen_hex_rgba( $hexadecimal = '', $opacity = 1 ) {
	$hexadecimal = substr( $hexadecimal, 1 );
	if ( strlen( $hexadecimal ) == 3 ) {
		$rgb = array( $hexadecimal[0] . $hexadecimal[0], $hexadecimal[1] . $hexadecimal[1], $hexadecimal[2] . $hexadecimal[2] );
	} else {
		$rgb = array( $hexadecimal[0] . $hexadecimal[1], $hexadecimal[2] . $hexadecimal[3], $hexadecimal[4] . $hexadecimal[5] );
	}
	$rgb = array_map( 'hexdec', $rgb );
	return 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
}

/**
 * Secondary Image
 *
 * @since 1.0.0
 */
function zeen_secondary_img( $pid = '', $size = '', $check = '' ) {
	$secondary_img = get_post_meta( $pid, 'zeen_secondary_image', true );
	if ( empty( $secondary_img ) && zeen_woo_active() ) {
		$secondary_img = get_post_meta( $pid, '_product_image_gallery', true );
		if ( ! empty( $secondary_img ) ) {
			$imgs          = explode( ',', $secondary_img, 2 );
			$secondary_img = $imgs[0];
		}
	}
	if ( ! empty( $check ) ) {
		return $secondary_img;
	}

	if ( empty( $secondary_img ) ) {
		return;
	}

	$img    = wp_get_attachment_image_src( $secondary_img, $size );
	$srcset = wp_get_attachment_image_srcset( $secondary_img, $size );
	$sizes  = wp_get_attachment_image_sizes( $secondary_img, $size );
	$alt    = get_post_meta( $secondary_img, '_wp_attachment_image_alt', true );
	$class  = '';
	$src    = empty( $img[0] ) ? '' : $img[0];
	$width  = empty( $img[1] ) ? 370 : $img[1];
	$height = empty( $img[2] ) ? 247 : $img[2];
	echo '<img width="' . (int) $width . '" height="' . (int) $height . '" ';
	if ( get_theme_mod( 'lazy', 1 ) == 1 ) {
		$class = ' zeen-lazy-load-base zeen-lazy-load';
		echo 'src="';
		echo "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20$width%20$height'%3E%3C/svg%3E";
		echo '" data-lazy-src="' . esc_url( $src ) . '"  data-lazy-srcset="' . esc_attr( $srcset ) . '" data-lazy-sizes="' . esc_attr( $sizes ) . '"';
	} else {
		echo 'src="' . esc_url( $src ) . '"  srcset="' . esc_attr( $srcset ) . '" sizes="' . esc_attr( $sizes ) . '"';
	}
	echo ' class="secondary-img attachment-zeen-585-585 size-zeen-585-585 wp-post-image' . $class . '" alt="' . esc_attr( $alt ) . '">';

}

function zeen_block_pick( $options ) {
	$p = $options['preview'];
	if ( 110 == $p ) {
		$block = new ZeenBlockColumns( $options );
	} elseif ( 101 == $p ) {
		$block = new ZeenBlockSidebar( $options );
	} elseif ( 201 == $p ) {
		$block = new ZeenBlockCollapsible( $options );
	} elseif ( 202 == $p ) {
		$block = new ZeenBlockScroller( $options );
	} elseif ( 203 == $p ) {
		$block = new ZeenBlockYoutubePlaylist( $options );
	} elseif ( $p > 80 ) {
		$block = new ZeenBlockGrid( $options );
	} elseif ( 74 == $p ) {
		$block = new ZeenBlockHoverer( $options );
	} elseif ( $p > 50 && $p < 57 ) {
		$block = new ZeenBlockSlider( $options );
	} elseif ( 60 == $p ) {
		$block = new ZeenBlockCTAGrid( $options );
	} elseif ( 59 == $p ) {
		$block = new ZeenBlockText( $options );
	} elseif ( 58 == $p ) {
		$block = new ZeenBlockGallery( $options );
	} elseif ( 57 == $p ) {
		$block = new ZeenBlockSearch( $options );
	} elseif ( 50 == $p ) {
		$block = new ZeenBlockAd( $options );
	} elseif ( 49 == $p ) {
		$block = new ZeenBlockCTA( $options );
	} elseif ( 48 == $p ) {
		$block = new ZeenBlockTitle( $options );
	} elseif ( 47 == $p ) {
		$block = new ZeenBlockAuthors( $options );
	} elseif ( 46 == $p ) {
		$block = new ZeenBlockVideo( $options );
	} elseif ( 45 == $p ) {
		$block = new ZeenBlockMiniCTA( $options );
	} elseif ( ( $p > 40 && $p < 45 ) || 75 == $p || 66 == $p || 5 == $p || 68 == $p || 22 == $p || 23 == $p ) {
		$block = new ZeenBlockClassic( $options );
	} elseif ( 30 == $p ) {
		$block = new ZeenBlockVideoSingle( $options );
	} elseif ( 31 == $p ) {
		$block = new ZeenBlockInstagram( $options );
	} elseif ( 32 == $p ) {
		$block = new ZeenBlockMailing( $options );
	} elseif ( 33 == $p ) {
		$block = new ZeenBlockQuote( $options );
	} elseif ( 34 == $p ) {
		$block = new ZeenBlockCustomCode( $options );
	} elseif ( 35 == $p ) {
		$block = new ZeenBlockImage( $options );
	} elseif ( 36 == $p ) {
		$block = new ZeenBlockButton( $options );
	} elseif ( 37 == $p ) {
		$block = new ZeenBlockTwitch( $options );
	} elseif ( 38 == $p ) {
		$block = new ZeenBlockSocialIcons( $options );
	} elseif ( 39 == $p ) {
		$block = new ZeenBlockSpacer( $options );
	} elseif ( 40 == $p ) {
		$block = new ZeenBlockEvents( $options );
	} elseif ( 24 == $p || 63 == $p || 64 == $p ) {
		$block = new ZeenBlockMasonry( $options );
	} else {
		$block = new ZeenBlockClassic( $options );
	}
	return $block;
}

function zeen_title_box( $args = array() ) {
	$sorter            = empty( $args['sorter'] ) ? 'on' : $args['sorter'];
	$description_check = empty( $args['description_check'] ) ? 'on' : $args['description_check'];
	$echo              = isset( $args['echo'] ) ? $args['echo'] : true;
	$term_id           = '';
	$tax               = '';
	if ( empty( $args['term_id'] ) ) {
		$term = get_queried_object();
		if ( ! empty( $term ) ) {
			$term_id = $term->term_id;
			$tax     = $term->taxonomy;
		}
	} else {
		$term_id = $args['term_id'];
		$tax     = $args['term'];
	}
	$args['fs']      = empty( $args['fs'] ) ? 'off' : $args['fs'];
	$size            = empty( $args['size'] ) ? 'l' : $args['size'];
	$skin            = empty( $args['skin'] ) ? '' : (int) $args['skin'];
	$skin_text_color = empty( $args['skin_text_color'] ) ? '' : $args['skin_text_color'];
	$skin_outer      = empty( $args['skin_outer'] ) ? 'on' : $args['skin_outer'];
	$skin_parallax   = empty( $args['skin_parallax'] ) ? 'on' : $args['skin_parallax'];
	if ( 3 == $skin ) {
		$skin = 11;
	}

	$block_title = get_theme_mod( 'classic_block_title_design', 1 );

	$color       = zeen_term_color( $term_id );
	$cat_color   = get_theme_mod( 'class_block_title_cat_color', 1 );
	$title_color = 2 == $cat_color || 11 == $cat_color ? $color : '';

	if ( empty( $echo ) ) {
		ob_start();
	}

	echo '<header ';
	if ( ! empty( $args['uid'] ) ) {
		echo 'id="block-wrap-' . (int) ( $args['uid'] ) . '" ';
	}

	echo 'class="page-header block-title-wrap block-title-wrap-style block-wrap clearfix block-title-' . (int) ( $block_title );
	echo ' page-header-skin-' . (int) $skin;
	if ( $skin > 0 && 'off' == $skin_outer ) {
		echo ' skin-inner';
	}
	if ( 5 === $skin && 'off' != $skin_outer ) {
		echo ' content-bg';
	}
	if ( 'off' != $sorter ) {
		echo ' with-sorter';
	}

	if ( 4 == $skin ) {
		if ( 0 == $skin_text_color ) {
			echo ' block-skin-1';
		} else {
			echo ' block-skin-2';
		}
	}

	if ( ! empty( $args['img_bg'] ) ) {
		echo ' with-bg';
	}
	echo ' block-title-' . esc_attr( $size );
	if ( 'off' == $args['fs'] && 'l' == $size ) {
		echo ' tipi-row';
	}
	echo '">';
	echo '<div class="tipi-row-inner-style block-title-wrap-style clearfix';
	if ( 5 === $skin && 'off' == $skin_outer ) {
		echo ' content-bg';
	}
	echo '">';
	echo '<div class="bg__img-wrap img-bg-wrapper';
	if ( 'on' === $skin_parallax ) {
		echo ' bg-parallax';
	}
	echo '">';
	echo '<div class="bg"></div>';
	echo '</div>';
	echo '<div class="block-title-wrap clearfix';
	if ( 'on' == $args['fs'] && 'l' == $size ) {
		echo ' tipi-row';
	}
	echo '">';
	zeen_breadcrumbs( '', $size );
	if ( 'off' != $sorter && 1 == $block_title ) {
		echo '<div class="filters font-2">';
		if ( ! empty( $term_id ) ) {
			zeen_subcats(
				array(
					'term_id' => $term_id,
					'tax'     => $tax,
				)
			);
		}
		zeen_sorter(
			array(
				'term_id' => $term_id,
				'echo'    => true,
			)
		);
		echo '</div>';
	}
	echo '<div class="block-title-area clearfix';
	if ( ! empty( $title_color ) ) {
		echo ' title-inherit';
	}
	echo '">';

	the_archive_title( '<h1 class="page-title block-title">', '</h1>' );

	if ( 'off' != $description_check ) {
		the_archive_description( '<div class="taxonomy-description block-subtitle font-' . (int) get_theme_mod( 'typo_subtitles', 1 ) . '">', '</div>' );
	}
	echo '</div>';

	if ( 'off' != $sorter && 2 == $block_title ) {
		echo '<div class="filters font-2">';
		if ( ! empty( $term_id ) ) {
			zeen_subcats(
				array(
					'term_id' => $term_id,
					'tax'     => $tax,
				)
			);
		}
		zeen_sorter(
			array(
				'term_id' => $term_id,
				'echo'    => true,
			)
		);
		echo '</div>';
	}

	echo '</div>';
	echo '</div>';
	echo '</header>';

	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}
function zeen_shape( $args = array() ) {
	$shape = empty( $args['shape'] ) ? 0 : $args['shape'];
	if ( 3 == $shape ) {
		return;
	}
	$location = empty( $args['location'] ) ? 'bottom' : $args['location'];
	$echo     = empty( $args['echo'] ) ? true : $args['echo'];
	if ( empty( $echo ) ) {
		ob_start();
	}
	echo '<div class="splitter splitter--' . esc_attr( $location );
	if ( ! empty( $args[ 'divider_skin_' . $location ] ) && 4 == $args[ 'divider_skin_' . $location ] ) {
		echo ' splitter--custom';
	}
	echo '">';
	zeen_shapes( $shape, true, $location );
	echo '</div>';
	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}

function zeen_shapes( $shape = 0, $echo = true, $location = '' ) {
	if ( empty( $echo ) ) {
		ob_start();
	}
	if ( 0 == $shape ) {
		echo '<svg viewBox="0 0 1000 81" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g class="splitter-g" fill="#FFFFFF" fill-rule="nonzero"> <path class="shape--fill" d="M0,80 C55.366413,64.1303153 122.390608,54.796982 201.072584,52 C319.095548,47.8045271 392.057167,79.2354056 544.133154,70.4810228 C696.20914,61.72664 794.286724,1.89206129e-15 897.323919,0 C926.417374,0 960.642734,3.66666667 1000,11 L1000,81 L0,81 L0,80 Z"></path></g></svg>';

	} elseif ( 1 == $shape ) {
		echo '<svg viewBox="0 0 1000 125" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M0,125 L0,95.2851074 C32.5802485,115.137489 71.2082871,122.611897 115.884116,117.708333 C172.827173,111.458333 223.776224,52.0833333 304.695305,52.0833333 C425.973963,52.0833333 430.569431,89.5833333 547.452547,76.0416667 C664.335664,62.5 716.283716,1.94524317e-15 822.177822,0 C892.773893,0 952.047952,12.8472222 1000,38.5416667 L1000,125 L0,125 Z"></path></g></svg>';
	} elseif ( 2 == $shape ) {
		echo '<svg viewBox="0 0 1000 20" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M958.5,19.5238095 L979,0 L1000,20 L959,20 L917,20 L938,0 L958.5,19.5238095 Z M791.5,19.5238095 L812,0 L833,20 L792,20 L750,20 L771,0 L791.5,19.5238095 Z M709,20 L667,20 L626,20 L647,0 L667.5,19.5238095 L688,0 L708.5,19.5238095 L729,0 L750,20 L709,20 Z M292.5,19.5238095 L313,0 L334,20 L293,20 L251,20 L272,0 L292.5,19.5238095 Z M417.5,19.5238095 L438,0 L458.5,19.5238095 L479,0 L500,20 L458,20 L418,20 L376,20 L397,0 L417.5,19.5238095 Z M41.5,19.5238095 L62,0 L83,20 L42,20 L0,20 L21,0 L41.5,19.5238095 Z M146,0 L167,20 L125,20 L146,0 Z M355,0 L376,20 L334,20 L355,0 Z M188,0 L209,20 L167,20 L188,0 Z M104,0 L125,20 L83,20 L104,0 Z M230,0 L251,20 L209,20 L230,0 Z M521,0 L542,20 L500,20 L521,0 Z M563,0 L584,20 L542,20 L563,0 Z M605,0 L626,20 L584,20 L605,0 Z M854,0 L875,20 L833,20 L854,0 Z M896,0 L917,20 L875,20 L896,0 Z"></path></g></svg>';
	} elseif ( 4 == $shape ) {
		echo '<svg viewBox="0 0 1000 30" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"><polygon class="shape--fill" points="1000 0 1000 30 0 30"></polygon></g></svg>';
	} elseif ( 5 == $shape ) {
		echo '<svg viewBox="0 0 1000 30" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"><polygon class="shape--fill" points="0 0 1000 30 0 30"></polygon></g></svg>';
	} elseif ( 6 == $shape ) {
		echo '<svg viewBox="0 0 1000 50" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M0,0 C166.666667,30 333.333333,45 500,45 C666.666667,45 833.333333,30 1000,0 L1000,50 L0,50 L0,0 Z"></path></g></svg>';
	} elseif ( 7 == $shape ) {

		echo '<svg viewBox="0 0 1000 75" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M500,0 C666.666667,0 833.333333,25 1000,75 L0,75 C166.666667,25 333.333333,0 500,0 Z"></path></g></svg>';
	} elseif ( 8 == $shape ) {
		echo '<svg viewBox="0 0 1000 50" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M0,50 L0,0 L58.9411765,0 L108.058824,25 L167,25 L167,0 L225.588235,0 L274.411765,25 L333,25 L333,0 L391.941176,0 L441.058824,25 L500,25 L500,0 L558.941176,0 L608.058824,25 L667,25 L667,0 L725.588235,0 L774.411765,25 L833,25 L833,0 L891.941176,0 L941.058824,25 L1000,25 L1000,50 L0,50 Z"></path></g></svg>';
	} elseif ( 9 == $shape ) {
		if ( 'top' == $location ) {
			echo '<svg viewBox="0 0 1000 50" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M103.317352,11.3856397 C115.703581,19.2298145 132.064017,24 150,24 C165.866417,24 180.499903,20.2671322 192.238478,13.9766339 C201.523171,17.193811 211.963302,19 223,19 C235.4895,19 247.215039,16.6870033 257.36489,12.6330938 C269.480734,19.7326299 285.035631,24 302,24 C307.349084,24 312.558034,23.5757287 317.561584,22.7730307 C328.175928,27.3579529 340.651643,30 354,30 C372.191238,30 388.761765,25.0930752 401.207799,17.0487944 C411.68086,21.463729 423.921577,24 437,24 C443.191386,24 449.195033,23.4315913 454.911229,22.3649802 C467.091278,29.6250554 482.823138,34 500,34 C518.043882,34 534.493205,29.1722488 546.903915,21.242312 C554.134944,23.0288317 561.907088,24 570,24 C576.120856,24 582.058226,23.4444678 587.715783,22.4018182 C598.510669,27.2150542 611.295414,30 625,30 C633.997843,30 642.599172,28.7995013 650.49985,26.6129299 C658.401555,28.7996027 667.002537,30 676,30 C692.825435,30 708.26439,25.8022412 720.334444,18.8075043 C726.866364,20.2326922 733.806465,21 741,21 C749.567418,21 757.775351,19.9116093 765.360085,17.9198945 C775.343005,21.7956909 786.807471,24 799,24 C804.080918,24 809.035402,23.6172023 813.807446,22.8902775 C825.858428,29.8355621 841.241477,34 858,34 C868.511184,34 878.48126,32.3617197 887.425909,29.4270178 C893.041557,30.4537636 898.93057,31 905,31 C912.213709,31 919.172559,30.2283824 925.719205,28.7948082 C935.133208,32.1256788 945.757069,34 957,34 C973.211502,34 988.135859,30.1029909 1000.00077,23.5615678 L1000,50 L-7.50510765e-14,50 L-0.000335648878,23.7556192 C13.1598581,22.8317119 25.2476827,19.3305273 35.2384777,13.9766339 C44.5231715,17.193811 54.9633023,19 66,19 C79.7194065,19 92.5169815,16.2090275 103.317352,11.3856397 Z"></path></g></svg>';
		} else {
			echo '<svg viewBox="0 0 1000 50" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M223,10 C239.964369,10 255.519266,14.2673701 267.63511,21.3669062 C277.784961,17.3129967 289.5105,15 302,15 C315.348357,15 327.824072,17.6420471 338.438416,22.2269693 C343.441966,21.4242713 348.650916,21 354,21 C367.078423,21 379.31914,23.536271 389.792201,27.9512056 C402.238235,19.9069248 418.808762,15 437,15 C454.176862,15 469.908722,19.3749446 482.088771,26.6350198 C487.804967,25.5684087 493.808614,25 500,25 C508.092912,25 515.865056,25.9711683 523.096085,27.757688 C535.506795,19.8277512 551.956118,15 570,15 C583.704586,15 596.489331,17.7849458 607.284217,22.5981818 C612.941774,21.5555322 618.879144,21 625,21 C633.997843,21 642.599172,22.2004987 650.501152,24.3873473 C658.401555,22.2003973 667.002537,21 676,21 C683.193535,21 690.133636,21.7673078 696.665556,23.1924957 C708.73561,16.1977588 724.174565,12 741,12 C753.192529,12 764.656995,14.2043091 774.639915,18.0801055 C782.224649,16.0883907 790.432582,15 799,15 C815.758523,15 831.141572,19.1644379 843.192554,26.1097225 C847.964598,25.3827977 852.919082,25 858,25 C864.06943,25 869.958443,25.5462364 875.574091,26.5729822 C884.51874,23.6382803 894.488816,22 905,22 C916.242931,22 926.866792,23.8743212 936.280795,27.2051918 C942.827441,25.7716176 949.786291,25 957,25 C960.341298,25 963.627918,25.1655447 966.844353,25.4856682 C975.586593,18.5827649 987.030273,13.425718 1000.00017,10.8451297 L1000,50 L-1.31006317e-14,50 L-0.000323870123,15.2443847 C8.45314138,15.8378696 16.4642003,17.4948199 23.7615223,20.0233661 C35.5000974,13.7328678 50.1335834,10 66,10 C83.9359829,10 100.296419,14.7701855 112.682648,22.6143603 C123.483019,17.7909725 136.280594,15 150,15 C161.036698,15 171.476829,16.806189 180.761522,20.0233661 C192.500097,13.7328678 207.133583,10 223,10 Z"></path></g></svg>';
		}
	} elseif ( 10 == $shape ) {
		if ( 'top' == $location ) {
			echo '<svg viewBox="0 0 1000 50" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M943,18 C962.110665,18 978.902672,25.6293577 988.500406,37.1410729 C991.62636,33.3914236 995.515687,30.053679 999.999868,27.257329 L1000,50 L0,50 L0.00084548436,20.0985098 C10.4459952,22.7589672 19.4769446,27.8039813 26.0014694,34.3941575 C35.862023,24.4314163 51.453717,18 69,18 C87.1508063,18 103.21002,24.8822145 113.0004,35.4363552 C122.78998,24.8822145 138.849194,18 157,18 C173.40231,18 188.096591,23.6201303 198.000244,32.4913568 C207.90439,23.6197553 222.598237,18 239,18 C258.447349,18 275.493622,25.9005477 285.000948,37.753094 C294.506378,25.9005477 311.552651,18 331,18 C349.150806,18 365.21002,24.8822145 375.0004,35.4363552 C384.78998,24.8822145 400.849194,18 419,18 C437.150806,18 453.21002,24.8822145 463.0004,35.4363552 C472.78998,24.8822145 488.849194,18 507,18 C524.546283,18 540.137977,24.4314163 550.001469,34.3941575 C559.862023,24.4314163 575.453717,18 593,18 C611.150806,18 627.21002,24.8822145 637.0004,35.4363552 C646.78998,24.8822145 662.849194,18 681,18 C697.40231,18 712.096591,23.6201303 722.000244,32.4913568 C731.90439,23.6197553 746.598237,18 763,18 C782.447349,18 799.493622,25.9005477 809.000948,37.753094 C818.506378,25.9005477 835.552651,18 855,18 C873.150806,18 889.21002,24.8822145 899.0004,35.4363552 C908.78998,24.8822145 924.849194,18 943,18 Z"></path></g></svg>';
		} else {
			echo '<svg viewBox="0 0 1000 50" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g class="splitter-g" fill="#fff" fill-rule="nonzero"> <path class="shape--fill" d="M808.999052,13.246906 C818.506378,25.0994523 835.552651,33 855,33 C873.150806,33 889.21002,26.1177855 898.9996,15.5636448 C908.78998,26.1177855 924.849194,33 943,33 C962.110665,33 978.902672,25.3706423 988.499594,13.8589271 C991.625886,17.6086642 995.515501,20.9464773 999.999934,23.7428676 L1000,50 L0,50 L0.000526861487,30.901562 C10.4451934,28.2412586 19.4756469,23.1965903 25.9995246,16.6068465 C35.8630704,26.5690158 51.4543064,33 69,33 C87.1508063,33 103.21002,26.1177855 112.9996,15.5636448 C122.78998,26.1177855 138.849194,33 157,33 C173.40231,33 188.096591,27.3798697 198.000747,18.5095311 C207.90439,27.3802447 222.598237,33 239,33 C258.447349,33 275.493622,25.0994523 284.999052,13.246906 C294.506378,25.0994523 311.552651,33 331,33 C349.150806,33 365.21002,26.1177855 374.9996,15.5636448 C384.78998,26.1177855 400.849194,33 419,33 C437.150806,33 453.21002,26.1177855 462.9996,15.5636448 C472.78998,26.1177855 488.849194,33 507,33 C524.545694,33 540.13693,26.5690158 549.999525,16.6068465 C559.86307,26.5690158 575.454306,33 593,33 C611.150806,33 627.21002,26.1177855 636.9996,15.5636448 C646.78998,26.1177855 662.849194,33 681,33 C697.40231,33 712.096591,27.3798697 722.000747,18.5095311 C731.90439,27.3802447 746.598237,33 763,33 C782.447349,33 799.493622,25.0994523 808.999052,13.246906 Z"></path></g></svg>';
		}
	}

	if ( empty( $echo ) ) {
		return ob_get_clean();
	}
}

function zeen_shape_list( $src_uri = '', $location = '' ) {
	$location_src = empty( $location ) ? $location : $location . '-';
	$output       = array(
		0  => array(
			'value'  => 0,
			'url'    => $src_uri . $location_src . 'shape-0.png',
			'srcset' => $src_uri . $location_src . 'shape-0@2x.png',
		),
		1  => array(
			'value'  => 1,
			'url'    => $src_uri . $location_src . 'shape-1.png',
			'srcset' => $src_uri . $location_src . 'shape-1@2x.png',
		),
		2  => array(
			'value'  => 2,
			'url'    => $src_uri . $location_src . 'shape-2.png',
			'srcset' => $src_uri . $location_src . 'shape-2@2x.png',
		),
		3  => array(
			'value'  => 3,
			'url'    => $src_uri . $location_src . 'shape-3.png',
			'srcset' => $src_uri . $location_src . 'shape-3@2x.png',
		),
		4  => array(
			'value'  => 4,
			'url'    => $src_uri . $location_src . 'shape-4.png',
			'srcset' => $src_uri . $location_src . 'shape-4@2x.png',
		),
		5  => array(
			'value'  => 5,
			'url'    => $src_uri . $location_src . 'shape-5.png',
			'srcset' => $src_uri . $location_src . 'shape-5@2x.png',
		),
		6  => array(
			'value'  => 6,
			'url'    => $src_uri . $location_src . 'shape-6.png',
			'srcset' => $src_uri . $location_src . 'shape-6@2x.png',
		),
		7  => array(
			'value'  => 7,
			'url'    => $src_uri . $location_src . 'shape-7.png',
			'srcset' => $src_uri . $location_src . 'shape-7@2x.png',
		),
		8  => array(
			'value'  => 8,
			'url'    => $src_uri . $location_src . 'shape-8.png',
			'srcset' => $src_uri . $location_src . 'shape-8@2x.png',
		),
		9  => array(
			'value'  => 9,
			'url'    => $src_uri . $location_src . 'shape-9.png',
			'srcset' => $src_uri . $location_src . 'shape-9@2x.png',
		),
		10 => array(
			'value'  => 10,
			'url'    => $src_uri . $location_src . 'shape-10.png',
			'srcset' => $src_uri . $location_src . 'shape-10@2x.png',
		),
	);
	if ( 'footer' == $location ) {
		unset( $output[3] );
	}
	return $output;
}

function zeen_lazy_exclusion() {
	if ( get_theme_mod( 'lazy', 1 ) == 1 ) {
		return false;
	} else {
		return true;
	}
}
add_filter( 'lazyload_is_enabled', 'zeen_lazy_exclusion', 15 );

function zeen_subcats( $args ) {

	if ( get_theme_mod( 'classic_block_title_subcats', 1 ) != 1 ) {
		return;
	}
	$echo    = isset( $args['echo'] ) ? $args['echo'] : true;
	$results = get_terms(
		array(
			'child_of' => $args['term_id'],
			'taxonomy' => $args['tax'],
		)
	);

	if ( ! empty( $results ) ) {
		if ( empty( $echo ) ) {
			ob_start();
		}
		echo '<div class="block-subcats-wrap sorter" tabindex="-1">';
		echo '<span class="current-sorter current">';
		echo '<span class="current-sorter-txt current-txt">';
		esc_html_e( 'All', 'zeen' );
		echo '<i class="tipi-i-chevron-down"></i>';
		echo '</span>';
		echo '</span>';
		echo '<ul class="options">';
		foreach ( $results as $key ) {
			echo '<li><a href="' . esc_url( get_term_link( $key ) ) . '" class="block-subcat">' . esc_attr( $key->name ) . '</a></li>';
		}
		echo '</ul>';
		echo '</div>';
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}

function zeen_builder_data( $data ) {
	TipiBuilder\ZeenHelpers::zeen_print_content( $data );
}

function zeen_unsidebar_mob() {
	if ( get_theme_mod( 'sidebar_mob', 1 ) != 1 ) {
		if ( ZeenMobile::is_mobile() ) {
			return true;
		}
	}
	return '';
}

function zeen_style_output( $args = array() ) {

	$styles       = array( 'padding', 'border' );
	$width        = empty( $args['width'] ) ? '' : $args['width'];
	$border_check = empty( $args['border_check'] ) ? 0 : $args['border_check'];
	echo ' style="';
	if ( ! empty( $args['height'] ) ) {
		echo 'height: ' . (int) ( $args['height'] ) . esc_attr( $args['height_type'] ) . ';';
	}
	foreach ( $styles as $key ) {
		if ( 'border' == $key && ( 0 == $border_check || 4 == $border_check ) ) {
			continue;
		}
		if ( ! empty( $args[ $key . 'Top' ] ) ) {
			echo esc_attr( $key ) . '-top:' . esc_attr( $args[ $key . 'Top' ] ) . ';';
		}
		if ( ! empty( $args[ $key . 'Bottom' ] ) ) {
			echo esc_attr( $key ) . '-bottom:' . esc_attr( $args[ $key . 'Bottom' ] ) . ';';
		}
		if ( ! empty( $args[ $key . 'Right' ] ) ) {
			echo esc_attr( $key ) . '-right:' . esc_attr( $args[ $key . 'Right' ] ) . ';';
		}
		if ( ! empty( $args[ $key . 'Left' ] ) ) {
			echo esc_attr( $key ) . '-left:' . esc_attr( $args[ $key . 'Left' ] ) . ';';
		}
	}

	if ( 0 != $border_check && 4 != $border_check ) {
		if ( 1 == $border_check ) {
			echo 'border-style: dotted;';
		} elseif ( 2 == $border_check ) {
			echo 'border-style: solid;';
		} elseif ( 3 == $border_check ) {
			echo 'border-style: dashed;';
		}
		echo 'border-color: ' . esc_attr( $args['borderColor'] ) . ';';
		if ( ! empty( $args['borderColor2'] ) && $args['borderColor2'] != $args['borderColor'] ) {
			echo 'border-image-source: linear-gradient(to left,' . esc_attr( $args['borderColor'] ) . ',  ' . esc_attr( $args['borderColor2'] ) . ');';
		}
	}

	if ( ! empty( $args['is_fs'] ) && ! empty( $args['fslimit'] ) && ! empty( $width ) ) {
		echo 'max-width: ' . (int) ( $width ) . 'px;';
	}

	echo '"';
}
function zeen_get_active_builder_pid() {
	if ( is_page() || zeen_is_shop() ) {
		if ( zeen_is_shop() ) {
			$pid = get_option( 'woocommerce_shop_page_id' );
		} else {
			$page_obj = get_queried_object();
			$pid      = empty( $page_obj->ID ) ? '' : $page_obj->ID;
		}
		if ( ! empty( $pid ) && get_post_meta( $pid, 'tipi_builder_active', true ) == true ) {
			return $pid;
		}
	}
}
function zeen_wsl_providers( $provider ) {
	switch ( $provider ) {
		case 'Facebook':
			?>
			<i class="tipi-i-facebook"></i>
			<?php
			break;
		case 'Twitter':
			?>
			<i class="tipi-i-twitter"></i>
			<?php
			break;
		default:
			break;
	}
}
add_filter( 'wsl_render_auth_widget_alter_provider_name', 'zeen_wsl_providers' );

function zeen_font_loader() {
	if ( get_theme_mod( 'font_2_source', 1 ) == 1 || get_theme_mod( 'font_1_source', 1 ) == 1 || get_theme_mod( 'font_3_source', 1 ) == 1 ) {
		$fonts = zeen_get_google_font();
		if ( apply_filters( 'zeen_inline_google_fonts_enabled', false ) == false ) {
			wp_enqueue_style( 'zeen-fonts', esc_url( $fonts ), array(), null );
		}
		add_editor_style( array( 'editor-style.css', esc_url( $fonts ) ) );
	}

	if ( get_theme_mod( 'font_2_source', 1 ) == 2 || get_theme_mod( 'font_1_source', 1 ) == 2 || get_theme_mod( 'font_3_source', 1 ) == 2 ) {
		$service_key = get_theme_mod( 'font_2_source', 1 ) == 2 ? get_theme_mod( 'font_2_typekit' ) : get_theme_mod( 'font_1_typekit' );
		$service_key = empty( $service_key ) ? get_theme_mod( 'font_3_typekit' ) : $service_key;
		if ( ! empty( $service_key ) ) {
			wp_enqueue_style( 'zeen-tk', 'https://use.typekit.net/' . esc_attr( $service_key ) . '.css' );
		}
	}
}

function zeen_rgba_transparent_check( $value = '' ) {
	$last_3 = substr( $value, -3 );
	if ( 'rgba' == substr( $value, 0, 4 ) && ( ',0)' == $last_3 || ' 0)' == $last_3 ) ) {
		return true;
	}
}

function zeen_button_link_check( $args = array() ) {
	if ( empty( $args['data'] ) ) {
		return;
	}
	$data         = $args['data'];
	$x            = ! isset( $args['x'] ) ? 1 : $args['x'];
	$count        = ! isset( $args['count'] ) ? 0 : $args['count'];
	$button_style = ! isset( $args['button_style'] ) ? '' : $args['button_style'];
	$output       = '';
	preg_match_all( '/<a\s[^>]*href=([\"\']??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU', $data, $result );
	preg_match( '/<[^>]+ (style=".*?")/i', $data, $style_attr );
	$button_classes = 'tipi-button cta-button';
	if ( strpos( $data, 'fontfam' ) ) {
		if ( strpos( $data, 'fontfam-1' ) ) {
			$button_classes .= ' fontfam-1';
		} elseif ( strpos( $data, 'fontfam-2' ) ) {
			$button_classes .= ' fontfam-2';
		} else {
			$button_classes .= ' fontfam-3';
		}
	}
	if ( 1 == $count ) {
		$button_classes .= ' cta-button-solo';
	}
	if ( 1 === $x && 2 != $button_style ) {
		$button_classes .= ' button-arrow-r button-arrow';
	}
	if ( ! empty( $button_style ) ) {
		$button_classes .= ' tipi-button-style-' . (int) $button_style;
	}
	$button_classes .= ' cta-button-' . (int) $x;
	$checker         = array_filter( $result );

	if ( ! empty( $checker ) ) {
		$button_text = empty( $result[3][0] ) ? '' : $result[3][0];
		if ( empty( $args['wrap_off'] ) ) {
			$output .= '<div class="cta-button-a-wrap">';
		}
		$output .= '<a';
		if ( strpos( $data, 'yout' ) !== false || strpos( $data, 'vimeo' ) !== false ) {
			$video           = true;
			$button_classes .= ' media-tr';
			$output         .= ' data-format="video" data-source="ext" data-type="frame"';
			$button_url      = zeen_media_url(
				'',
				array(
					'url'    => $result[2][0],
					'source' => 1,
				)
			);
			if ( empty( $button_url ) ) {
				$button_url = $result[2][0];
			}
			$output .= ' data-src="' . esc_url( $button_url ) . '"';
		} elseif ( strpos( $data, '"#subscribe"' ) !== false ) {
			$button_classes .= ' media-tr';
			$output         .= ' data-type="subscribe"';
			$button_url      = '#subscribe';
		} elseif ( strpos( $data, '"#search"' ) !== false ) {
			$button_classes .= ' media-tr';
			$output         .= ' data-type="search"';
			$button_url      = '#search';
		} elseif ( strpos( $data, '"#lwa"' ) !== false ) {
			$button_classes .= ' media-tr';
			$output         .= ' data-type="lwa"';
			$button_url      = '#lwa';
		} else {
			$button_url = empty( $result[2][0] ) ? '' : $result[2][0];
		}
		if ( strpos( $result[0][0], 'target="_' ) !== false ) {
			$output .= ' target="_blank"';
		}
		$output .= ' rel="noopener';
		if ( strpos( $data, 'amzn' ) !== false || strpos( $data, 'amazon' ) !== false ) {
			$output .= ' nofollow';
		}
		$output .= '"';
		$output .= ' class="cta-button-a ' . esc_attr( $button_classes ) . '" href="' . esc_url( $button_url ) . '">';
	} else {
		$output      = '<div class="cta-button-a-wrap"><div class="' . esc_attr( $button_classes ) . '">';
		$button_text = $data;
	}
	if ( 2 == $button_style ) {
		$output .= '<i class="tipi-i-play_arrow video-icon"></i>';
	}
	if ( empty( $video ) ) {
		$output .= '<span class="button-text button-title"';
		if ( ! empty( $style_attr[1] ) ) {
			$output .= ' ' . $style_attr[1];
		}
		$output .= '>';
		$output .= $button_text;
		$output .= '</span>';
		if ( 1 === $x && 2 != $button_style ) {
			$output .= '<i class="tipi-i-arrow-right"';
			if ( ! empty( $style_attr[1] ) ) {
				$output .= ' ' . $style_attr[1];
			}
			$output .= '></i>';
		}
	} else {

		$output .= '<div class="button-text button-title"';
		if ( ! empty( $style_attr[1] ) ) {
			$output .= ' ' . $style_attr[1];
		}
		$output .= '>';
		$output .= $button_text;
		$output .= '</div>';
	}
	if ( ! empty( $checker ) ) {
		$output .= '</a>';
		if ( empty( $args['wrap_off'] ) ) {
			$output .= '</div>';
		}
	} else {
		$output .= '</div></div>';
	}
	return $output;
}

function zeen_oembed_extra( $provider = '', $url = '', $args = array() ) {
	$args = wp_parse_args( $args, wp_embed_defaults( $url ) );
	if ( ! empty( $args['autoplay'] ) ) {
		$provider = add_query_arg( 'autoplay', 1, $provider );
		$provider = add_query_arg( 'auto_play', 1, $provider );
	}
	return $provider;
}

add_filter( 'oembed_fetch_url', 'zeen_oembed_extra', 10, 3 );

function zeen_helper_md_array_clean( $array = array() ) {
	if ( is_array( $array ) ) {
		foreach ( $array as $key => $value ) {
			$result = zeen_helper_md_array_clean( $value );
			if ( $result === false ) {
				unset( $array[ $key ] );
			} else {
				$array[ $key ] = $result;
			}
		}
	}
	return empty( $array ) ? false : $array;
}
function zeen_gallery_icon( $args = array() ) {
	$pid       = empty( $args['pid'] ) ? '' : $args['pid'];
	$icon_size = empty( $args['icon_size'] ) ? 's' : $args['icon_size'];
	$icon_type = get_theme_mod( 'gallery_icon', 1 ) == 1 ? 'tipi-i-camera' : 'tipi-i-camera-retro';
	echo '<a href="' . esc_url( get_permalink( $pid ) ) . '" class="media-icon icon-base-' . (int) ( get_theme_mod( 'icon_design', 1 ) ) . ' icon-size-' . esc_attr( $icon_size ) . '"><i class="' . esc_attr( $icon_type ) . '" aria-hidden="true"></i><span class="icon-bg"></span><span class="image__count font-1">';
	echo zeen_gallery_img_count( $pid );
	echo '</span></a>';
}

function zeen_font_sizes( $mode = 'desktop' ) {
	$options = array(
		array(
			'option'   => 'font_line_height',
			'selector' => 'body',
			'prop'     => 'line-height',
		),
		array(
			'option'   => 'letter_spacing_h1',
			'selector' => '.site h1',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_h2',
			'selector' => '.site h2',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_h3',
			'selector' => '.site h3',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_logo_text',
			'selector' => '.logo-fallback',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_body',
			'selector' => 'body',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_subtitle',
			'selector' => '.subtitle',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_buttons',
			'selector' => 'input[type=submit], button, .tipi-button,.button,.wpcf7-submit,.button__back__home',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_byline',
			'selector' => '.byline .byline-part',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_main_menu',
			'selector' => '.main-navigation .horizontal-menu > li > a',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_submenu',
			'selector' => '.sub-menu a:not(.tipi-button)',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_secondary_menu',
			'selector' => '.secondary-wrap li',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_footer_menu',
			'selector' => '.footer-navigation li',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_read_more',
			'selector' => '.read-more',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_copyright',
			'selector' => '.copyright',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_blockquote',
			'selector' => '.site blockquote',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'letter_spacing_widget_title',
			'selector' => '.widget-title',
			'prop'     => 'letter-spacing',
			'type'     => 'em',
		),
		array(
			'option'   => 'font_size_body',
			'selector' => 'html, body',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_byline',
			'selector' => '.byline',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_buttons',
			'selector' => 'input[type=submit], button, .tipi-button,.button,.wpcf7-submit,.button__back__home',
			'type'     => 'px',
		),
		array(
			'option'   => 'excerpt_font_size',
			'selector' => '.excerpt',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_logo_text',
			'selector' => '.logo-fallback, .secondary-wrap .logo-fallback a',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_breadcrumbs',
			'selector' => '.breadcrumbs',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_post_inner',
			'selector' => '.hero-meta.tipi-s-typo .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_hero_subtitle_s',
			'selector' => '.hero-meta.tipi-s-typo .subtitle',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_hero_title_m',
			'selector' => '.hero-meta.tipi-m-typo .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_hero_subtitle_m',
			'selector' => '.hero-meta.tipi-m-typo .subtitle',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_hero_title_l',
			'selector' => '.hero-meta.tipi-xl-typo .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_hero_subtitle_l',
			'selector' => '.hero-meta.tipi-xl-typo .subtitle',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_h1',
			'selector' => '.block-html-content h1, .single-content .entry-content h1',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_h2',
			'selector' => '.block-html-content h2, .single-content .entry-content h2',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_h3',
			'selector' => '.block-html-content h3, .single-content .entry-content h3',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_h4',
			'selector' => '.block-html-content h4, .single-content .entry-content h4',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_h5',
			'selector' => '.block-html-content h5, .single-content .entry-content h5',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_tags',
			'selector' => '.footer-block-links',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_copyright',
			'selector' => '.site-footer .copyright',
			'type'     => 'px',
		),
		array(
			'option'   => 'footer_menu_font_size',
			'selector' => '.footer-navigation',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_footer_social_icons',
			'selector' => '.site-footer .menu-icons',
			'type'     => 'px',
		),
		array(
			'option'   => 'main_menu_font_size',
			'selector' => '.main-navigation, .main-navigation .menu-icon--text',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_mm_sub_menu',
			'selector' => '.sub-menu a:not(.tipi-button)',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_main_menu_social_icons',
			'selector' => '.main-navigation .menu-icon, .main-navigation .trending-icon-solo',
			'type'     => 'px',
		),
		array(
			'option'   => 'secondary_menu_font_size',
			'selector' => '.secondary-wrap-v .standard-drop>a,.secondary-wrap, .secondary-wrap a, .secondary-wrap .menu-icon--text',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_secondary_menu_social_icons',
			'selector' => '.secondary-wrap .menu-icon, .secondary-wrap .menu-icon a, .secondary-wrap .trending-icon-solo',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_block_main_title',
			'selector' => '.block-title, .page-title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_block_main_subtitle',
			'selector' => '.block-subtitle',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_classic_blocks_title_xl',
			'selector' => '.block-col-self .preview-2 .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_classic_blocks_title_l',
			'selector' => '.block-wrap-classic .tipi-m-typo .title-wrap .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_classic_blocks_title',
			'selector' => '.tipi-s-typo .title, .ppl-s-3 .tipi-s-typo .title, .zeen-col--wide .ppl-s-3 .tipi-s-typo .title, .preview-1 .title, .preview-21:not(.tipi-xs-typo) .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_thumbnail_blocks_title',
			'selector' => '.tipi-xs-typo .title, .tipi-basket-wrap .basket-item .title',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_classic_blocks_read_more',
			'selector' => '.meta .read-more-wrap',
			'type'     => 'px',
		),
		array(
			'option'   => 'font_size_widget_title',
			'selector' => '.widget-title',
			'type'     => 'px',
		),
		array(
			'option'   => 'classis_split_img_width',
			'selector' => '.split-1:not(.preview-thumbnail) .mask',
			'type'     => '',
			'flex'     => '%-15px',
		),
		array(
			'option'   => 'thumbnail_img_width',
			'selector' => '.preview-thumbnail .mask',
			'type'     => 'px',
			'flex'     => true,
		),
		array(
			'option'   => 'footer_lower_padding_top',
			'selector' => '.footer-lower-area',
			'prop'     => 'padding-top',
			'type'     => 'px',
		),
		array(
			'option'   => 'footer_lower_padding_bottom',
			'selector' => '.footer-lower-area',
			'prop'     => 'padding-bottom',
			'type'     => 'px',
		),
		array(
			'option'   => 'footer_upper_padding_bottom',
			'selector' => '.footer-upper-area',
			'prop'     => 'padding-bottom',
			'type'     => 'px',
		),
		array(
			'option'   => 'footer_upper_padding_top',
			'selector' => '.footer-upper-area',
			'prop'     => 'padding-top',
			'type'     => 'px',
		),
		array(
			'option'   => 'footer_widgets_padding_bottom',
			'selector' => '.footer-widget-wrap',
			'prop'     => 'padding-bottom',
			'type'     => 'px',
		),
		array(
			'option'   => 'footer_widgets_padding_top',
			'selector' => '.footer-widget-wrap',
			'prop'     => 'padding-top',
			'type'     => 'px',
		),
		array(
			'option'   => 'header_cta_font_size',
			'selector' => '.tipi-button-cta-header',
			'type'     => 'px',
		),
	);
	if ( zeen_woo_active() ) {
		$options[] = array(
			'option'   => 'font_size_woo_title_s',
			'selector' => '.product-title--s .entry-title',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_title_m',
			'selector' => '.product-title--m .entry-title, .qv-wrap .entry-summary .title',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_title_l',
			'selector' => '.product-title--l .entry-title',
			'type'     => 'px',
		);

		$options[] = array(
			'option'   => 'font_size_woo_price_s',
			'selector' => '.product-title--s .price',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_price_m',
			'selector' => '.product-title--m .price, .qv-wrap .entry-summary .price',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_excerpt_m',
			'selector' => '.product-title--m .woocommerce-product-details__short-description, .qv-wrap .woocommerce-product-details__short-description',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_price_l',
			'selector' => '.product-title--l .price',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_excerpt_l',
			'selector' => '.product-title--l .woocommerce-product-details__short-description',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_classic_price_s',
			'selector' => '.tipi-xs-typo .price, .tipi-basket-wrap .basket-item .price',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_classic_price_m',
			'selector' => '.tipi-s-typo .price, .ppl-s-3 .tipi-s-typo .price, .zeen-col--wide .ppl-s-3 .tipi-s-typo .price, .preview-1 .price, .preview-21:not(.tipi-xs-typo) .price',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_woo_classic_price_l',
			'selector' => '.block-wrap-classic .tipi-m-typo .title-wrap .price',
			'type'     => 'px',
		);
	}
	if ( get_theme_mod( 'top_bar_message' ) == 1 ) {
		$options[] = array(
			'option'   => 'top_bar_message_content_font_size',
			'selector' => '#top-bar-message',
			'type'     => 'px',
		);
	}
	if ( get_theme_mod( 'grid_font_size_override' ) == 1 ) {
		$options[] = array(
			'option'   => 'font_size_grid_xl_title',
			'selector' => '.block-wrap-grid .tipi-xl-typo .title',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_grid_l_title',
			'selector' => '.block-wrap-grid .tipi-l-typo .title',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_grid_m_title',
			'selector' => '.block-wrap-grid .tipi-m-typo .title-wrap .title, .block-94 .block-piece-2 .tipi-xs-12 .title-wrap .title, .zeen-col--wide .block-wrap-grid:not(.block-wrap-81):not(.block-wrap-82) .tipi-m-typo .title-wrap .title, .zeen-col--wide .block-wrap-grid .tipi-l-typo .title, .zeen-col--wide .block-wrap-grid .tipi-xl-typo .title',
			'type'     => 'px',
		);
		$options[] = array(
			'option'    => 'font_size_grid_s_title',
			'selector'  => '.block-wrap-grid .tipi-s-typo .title-wrap .title, .block-92 .block-piece-2 article .title-wrap .title, .block-94 .block-piece-2 .tipi-xs-6 .title-wrap .title',
			'type'      => 'px',
			'important' => true,
		);
		$options[] = array(
			'option'   => 'font_size_grid_s_subtitle',
			'selector' => '.block-wrap-grid .tipi-s-typo .title-wrap .subtitle, .block-92 .block-piece-2 article .title-wrap .subtitle, .block-94 .block-piece-2 .tipi-xs-6 .title-wrap .subtitle',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_grid_l_subtitle',
			'selector' => '.block-wrap-grid .tipi-m-typo .title-wrap .subtitle, .block-wrap-grid .tipi-l-typo .title-wrap .subtitle, .block-wrap-grid .tipi-xl-typo .title-wrap .subtitle, .block-94 .block-piece-2 .tipi-xs-12 .title-wrap .subtitle, .zeen-col--wide .block-wrap-grid:not(.block-wrap-81):not(.block-wrap-82) .tipi-m-typo .title-wrap .subtitle',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'font_size_grid_read_more',
			'selector' => '.preview-grid .read-more-wrap',
			'type'     => 'px',
		);
		$options[] = array(
			'option'   => 'letter_spacing_grid',
			'selector' => '.block-wrap-grid .title',
			'type'     => 'em',
			'prop'     => 'letter-spacing',
		);
	}
	$output = '';
	foreach ( $options as $option => $value ) {
		$mod         = zeen_get_theme_mod( $value['option'] );
		$mod_desktop = isset( $mod['desktop'] ) ? $mod['desktop'] : '';
		$mod_tablet  = isset( $mod['tablet'] ) ? $mod['tablet'] : '';
		$mod_mobile  = isset( $mod['mobile'] ) ? $mod['mobile'] : '';
		if ( ! isset( $mod[ $mode ] ) || ( 'desktop' == $mode && $mod_desktop === $mod_tablet ) || ( 'tablet' == $mode && $mod_tablet == $mod_mobile ) ) {
			continue;
		}
		$prop      = empty( $value['prop'] ) ? 'font-size' : $value['prop'];
		$type      = empty( $value['type'] ) ? '' : $value['type'];
		$important = empty( $value['important'] ) ? '' : '!important';
		if ( ! empty( $mod[ $mode ] ) ) {
			$output .= $value['selector'] . '{';
			if ( ! empty( $value['flex'] ) ) {
				if ( '%-15px' === $value['flex'] ) {
					$output .= '-webkit-flex: 0 0 calc( ' . (int) $mod[ $mode ] . '% - 15px);
					-ms-flex: 0 0 calc( ' . (int) $mod[ $mode ] . '% - 15px);
					flex: 0 0 calc( ' . (int) $mod[ $mode ] . '% - 15px);
					width: calc( ' . (int) $mod[ $mode ] . '% - 15px);';
				} else {
					$output .= '-webkit-flex: 0 0 ' . (int) $mod[ $mode ] . $type . ';
					-ms-flex: 0 0 ' . (int) $mod[ $mode ] . $type . ';
					flex: 0 0 ' . (int) $mod[ $mode ] . $type . ';
					width: ' . (int) $mod[ $mode ] . $type . ';';
				}
			} else {
				$output .= $prop . ':' . $mod[ $mode ] . $type . $important;
			}
			$output .= '}';
		}
	}
	return $output;
}

function zeen_get_theme_mod( $option = '' ) {
	$default = zeen_customize_default( $option );
	$output  = get_theme_mod( $option, $default );
	if ( ! is_array( $output ) ) {
		$default['desktop'] = $output;
		return $default;
	}
	return $output;
}

function zeen_get_header_overlap() {
	$builder_pid = zeen_get_active_builder_pid();
	if ( ! empty( $builder_pid ) ) {
		$output = get_post_meta( $builder_pid, 'zeen_header_overlap', true );
	} else {
		$pid    = is_singular() ? get_the_ID() : '';
		$output = array(
			'enabled' => get_post_meta( $pid, 'zeen_header_overlap', true ) === 'on' ? 'on' : 'off',
			'inverse' => get_post_meta( $pid, 'zeen_header_overlap_inverse_logo', true ) === 'on' ? 'on' : 'off',
			'skin'    => (int) get_post_meta( $pid, 'zeen_header_overlap_skin', true ) === 2 ? 2 : 1,
		);
	}
	if ( ! empty( $output['enabled'] ) ) {
		return $output;
	} else {
		return array(
			'enabled' => 'off',
		);
	}
}
