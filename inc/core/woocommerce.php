<?php
/**
 * WooCommerce
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * WooCommerce
 *
 * @since 1.0.0
 */
function zeen_woo_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	} else {
		return false;
	}
}

function zeen_is_woocommerce() {
	if ( zeen_woo_active() && ( is_woocommerce() || is_cart() || is_checkout() ) ) {
		return true;
	} else {
		return false;
	}
}

function zeen_is_shop() {
	if ( zeen_woo_active() && is_shop() ) {
		return true;
	} else {
		return false;
	}
}
function zeen_is_product() {
	if ( zeen_woo_active() && is_product() ) {
		return true;
	} else {
		return false;
	}
}

if ( ! function_exists( 'zeen_woo_breadcrumbs_remove' ) ) :
	/**
	 * Remove breadcrumbs
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_breadcrumbs_remove() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
endif;
add_action( 'init', 'zeen_woo_breadcrumbs_remove' );

if ( ! function_exists( 'zeen_woo_add_contents' ) ) :
	/**
	 * Add To cart
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_add_contents( $fragments ) {
		ob_start();
		$location = get_theme_mod( 'woo_ajax_cart_style', 1 ) == 1 ? 'menu' : 'slide';
		zeen_woo_contents( array( 'location' => $location ) );
		$fragments['.tipi-basket-wrap'] = ob_get_clean();

		return $fragments;

	}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'zeen_woo_add_contents' );

if ( ! function_exists( 'zeen_woo_update_count' ) ) :
	/**
	 * Add To cart
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_update_count( $fragments ) {
		ob_start();
		echo '<span class="tipi-cart-count">' . (int) ( WC()->cart->get_cart_contents_count() ) . '</span>';
		$fragments['.tipi-cart-count'] = ob_get_clean();
		return $fragments;
	}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'zeen_woo_update_count' );

if ( ! function_exists( 'zeen_woo_empty' ) ) :
	/**
	 * Contents
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_empty() {
		if ( isset( $_GET['empty'] ) ) {
			global $woocommerce;
			$woocommerce->cart->empty_cart();
		}
	}
endif;
add_action( 'init', 'zeen_woo_empty' );

if ( ! function_exists( 'zeen_woo_extra_1' ) ) :
	/**
	 * Extras 1
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_extra_1() {

		global $product;
		$attachment_ids = $product->get_gallery_image_ids();
		echo '<div class="images">';
		woocommerce_template_loop_product_link_open();
		add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
		woocommerce_template_loop_product_thumbnail();
		remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
		if ( ! empty( $attachment_ids[0] ) ) {
			$featured_img = wp_get_attachment_image_src( $attachment_ids[0], 'shop_catalog' );
			$srcset       = wp_get_attachment_image_srcset( $attachment_ids[0], 'shop_catalog' );
			if ( ! empty( $featured_img[0] ) ) {
				echo '<img src="' . esc_url( $featured_img[0] ) . '"  class="sec-img"';
				if ( ! empty( $srcset ) ) {
					echo ' srcset="' . esc_attr( $srcset ) . '"';
				}
				echo '>';
			}
		}
		echo '</div>';
		woocommerce_template_loop_product_link_close();
		echo '</div>';
		woocommerce_template_loop_product_link_open();
	}
endif;

if ( ! function_exists( 'zeen_woo_extra_2' ) ) :
	/**
	 * Extras 1
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_extra_2() {

		woocommerce_template_loop_product_link_close();
	}
endif;
add_action( 'woocommerce_after_shop_loop_item_title', 'zeen_woo_extra_2', 12 );

if ( ! function_exists( 'zeen_woo_before_shop_loop_item' ) ) :
	/**
	 * Extras 1
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_before_shop_loop_item( $args = '' ) {
		global $post;
		$qv  = get_theme_mod( 'woo_qv', 1 );
		$add = get_theme_mod( 'woo_add_to_cart', 1 );
		if ( empty( $args['wrap_off'] ) ) {
			echo '<div class="woo-img-wrap mask">';
		}
		if ( empty( $qv ) && empty( $add ) ) {
			return;
		}
		echo '<div class="extras">';
		if ( ! empty( $qv ) ) {
			?>
			<div class="woo-extra-button woo-extra-button-qv tipi-tip" data-title="<?php esc_attr_e( 'Quick View', 'zeen' ); ?>"><a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" class="tipi-i-qv modal-tr" data-pid="<?php echo (int) $post->ID; ?>" data-type="qv"></a></div>
		<?php } ?>
		<?php if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) && ! empty( $add ) ) { ?>
			<div class="woo-extra-button woo-extra-button-add tipi-tip" data-title="<?php esc_attr_e( 'Add To Cart', 'zeen' ); ?>"><?php zeen_woo_add_to_cart(); ?></div>
		<?php } ?>
		<?php
		echo '</div>';
	}
endif;
add_action( 'woocommerce_before_shop_loop_item', 'zeen_woo_before_shop_loop_item' );

if ( ! function_exists( 'zeen_woo_add_to_cart' ) ) :
	function zeen_woo_add_to_cart( $args = array() ) {
		global $product;
		if ( $product ) {
			$cart_icon = get_theme_mod( 'woo_cart', 1 ) == 1 ? 'tipi-i-cart-1-plus' : 'tipi-i-cart-2-plus';
			$defaults  = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'button',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							( $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ) || 'variable' === $product->get_type() ? 'ajax_add_to_cart' : '',
							( get_theme_mod( 'woo_tipi_blocks_variations', 1 ) == 1 && $product->is_purchasable() && $product->is_in_stock() && 'variable' === $product->get_type() ) ? 'single_add_to_cart_button' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}
			echo sprintf(
				'<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				'<i class="' . zeen_sanitizer_options( $cart_icon, array( 'tipi-i-cart-1-plus', 'tipi-i-cart-2-plus' ) ) . ' tipi-i-1"></i><i class="tipi-i-check tipi-i-2"></i>'
			);
		}
	}
endif;

function zeen_woocommerce_product_thumbnails( $html, $post_thumbnail_id ) {
	global $post;
	$pid = $post->ID;
	if ( get_post_thumbnail_id( $post ) == $post_thumbnail_id ) {
		$source = (int) get_post_meta( $pid, 'zeen_source', true );
		$media  = 2 === $source ? get_post_meta( $pid, 'zeen_video_file_1', true ) || get_post_meta( $pid, 'zeen_video_file_2', true ) : '';
		$media  = 1 === $source ? get_post_meta( $pid, 'zeen_video_code', true ) : $media;
		if ( ! empty( $media ) ) {
			$post_format = zeen_post_format_data(
				$post->ID,
				array(
					'post_format'  => 'video',
					'media_design' => 1,
					'icon_size'    => 's',
					'echo'         => false,
					'trigger_tag'  => 'span',
				)
			);
			$html        = substr( $html, -6 ) == '</div>' ? substr( $html, 0, -6 ) . $post_format . '</div>' : $html;
		}
	}
	return $html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'zeen_woocommerce_product_thumbnails', 10, 2 );

if ( ! function_exists( 'zeen_woo_before_main_content' ) ) :
	/**
	 * Before main content
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_before_main_content() {
		$preview        = 61;
		$product_design = zeen_get_product_design();
		$class          = 'main entry-content-wrap';
		$layout         = get_theme_mod( 'woo_layout', 3 );
		if ( is_product() ) {
			if ( 1 == $product_design['hero'] ) {
				$preview = 1;
			}
			$class .= ' product-hero-' . $product_design['hero'];
			$class .= ' product-tabs-' . $product_design['tabs'];
			$class .= ' product-description-width-' . $product_design['description_width'];
			if ( 1 != $product_design['hero'] ) {
				$class .= ' product-hero-no-sb';
				if ( 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
					$class .= ' product-hero-fs';
				}
				if ( 3 == $product_design['hero'] || 4 == $product_design['hero'] || 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
					$class .= ' product-hero-slider--off';
				}
				if ( 1 != $product_design['tabs'] ) {
					$class .= ' product-tabs-limit';
				}
			}
			$hero_color = zeen_woo_hero_color();
			if ( ! empty( $hero_color ) ) {
				$class .= ' product-hero-with-bg';
				if ( ! empty( $hero_color['text_color'] ) ) {
					$class .= ' product-hero-text-' . $hero_color['text_color'];
				}
			}
		} else {
			// 3 4 12 13
			if ( $layout > 10 ) {
				$preview = 22;
			}
		}
		$class  .= ' products-layout-' . (int) $layout;
		$builder = zeen_woo_builder();
		echo '<div id="primary" class="content-area">';
		echo '<div id="contents-wrap"';
		zeen_get_archive_layout_class(
			array(
				'archive' => $preview,
				'builder' => $builder,
			)
		);
		echo '>';

		if ( empty( $builder ) ) {
			echo '<div class="content-bg clearfix';
			if ( ! is_product() || ( is_product() && 1 === $product_design['hero'] ) ) {
				echo ' tipi-row';
			}
			echo '">';
			if ( ! is_product() || ( is_product() && 1 === $product_design['hero'] ) ) {
				echo '<div class="tipi-cols clearfix sticky--wrap">';
			}
			$ppl = 3;
			if ( 4 == $layout ) {
				$ppl = 4;
			} elseif ( 12 == $layout ) {
				$ppl = 2;
			}
			echo '<main id="main" class="' . esc_attr(
				zeen_classes(
					array(
						'preview'    => $preview,
						'echo'       => '',
						'complete'   => 'off',
						'classes'    => $class,
						'is_product' => is_product() && 1 !== $product_design['hero'],
					)
				)
			) . '" data-ppl="' . (int) $ppl . '">';
		}
	}
endif;
add_action( 'woocommerce_before_main_content', 'zeen_woo_before_main_content', 5 );

function zeen_woo_breadcrumbs() {
	$product_design = zeen_get_product_design();
	$wrap           = is_product() && $product_design['hero'] > 1 && $product_design['hero'] < 5 ? true : '';
	zeen_breadcrumbs( '', '', $wrap );
}
add_action( 'woocommerce_before_main_content', 'zeen_woo_breadcrumbs', 20 );

function zeen_woo_builder() {
	if ( is_shop() ) {
		$pid = get_option( 'woocommerce_shop_page_id' );
		return empty( $pid ) ? '' : get_post_meta( $pid, 'tipi_builder_active', true );
	} else {
		$tid = zeen_get_term_id();
		return empty( $tid ) ? '' : zeen_get_term_meta( 'tipi_builder_active', $tid );
	}
}
if ( ! function_exists( 'zeen_woo_after_main_content' ) ) :
	/**
	 * After main contenter
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_after_main_content() {
		$builder = zeen_woo_builder();
		if ( empty( $builder ) ) {
			echo '</main>';
			if ( zeen_sidebar_checker( array( 'archive' => 'woo' ) ) ) {
				get_sidebar();
			}
			$product_design = zeen_get_product_design();
			if ( ! is_product() || ( is_product() && 1 === $product_design['hero'] ) ) {
				echo '</div>';
			}
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}
	endif;
add_action( 'woocommerce_after_main_content', 'zeen_woo_after_main_content', 50 );

if ( ! function_exists( 'zeen_woo_archive_rows' ) ) :
	/**
	 * Rows
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_archive_rows() {
		$layout = get_theme_mod( 'woo_layout', 3 );
		if ( $layout < 10 ) {
			return $layout;
		}

		if ( 12 == $layout ) {
			return 2;
		} elseif ( 13 == $layout ) {
			return 3;
		}
	}
endif;
add_filter( 'loop_shop_columns', 'zeen_woo_archive_rows' );

if ( ! function_exists( 'zeen_woo_pagination' ) ) :
	/**
	 * Rows
	 *
	 * @since 1.0.0
	 */
	function zeen_woo_pagination() {
		$total   = wc_get_loop_prop( 'total_pages' );
		$current = wc_get_loop_prop( 'current_page' );
		$base    = esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
		$format  = '';

		return array(
			'base'      => $base,
			'format'    => $format,
			'add_args'  => false,
			'current'   => max( 1, $current ),
			'total'     => $total,
			'prev_text' => '<i class="tipi-i-chevron-left"></i>',
			'next_text' => '<i class="tipi-i-chevron-right"></i>',
		);
	}
endif;
add_filter( 'woocommerce_pagination_args', 'zeen_woo_pagination' );

if ( ! function_exists( 'zeen_woo_per_line' ) ) :
	function zeen_woo_per_line() {
		return get_theme_mod( 'woo_ppp', 9 );
	}
endif;
add_filter( 'loop_shop_per_page', 'zeen_woo_per_line', 20 );


if ( ! function_exists( 'zeen_woo_product_rating' ) ) :
	function zeen_woo_product_rating( $html, $rating, $count ) {
		$width = floatval( $rating ) * 20 - 3;
		$width = $width < 0 ? 0 : $width;
		// NOTE: Inline style property is necessary here
		$output = '<span class="woo-product-rating"><span style="width:' . (int) $width . '%;" class="woo-product-rating-overlay"></span></span>';
		return $output;
	}
endif;
add_filter( 'woocommerce_get_star_rating_html', 'zeen_woo_product_rating', 10, 3 );

function zeen_woo_archive_rating_html() {

	if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
		return;
	}
	global $product;
	$rating_count = $product->get_rating_count();
	if ( 0 == $rating_count ) {
		return;
	}
	echo '<div class="woocommerce-product-rating">' . wc_get_rating_html( $product->get_average_rating(), $rating_count ) . '</div>';

}
add_filter( 'woocommerce_layered_nav_term_html', 'zeen_woocommerce_layered_nav_term_html', 10, 4 );
function zeen_woocommerce_layered_nav_term_html( $term_html, $term, $link, $count ) {
	return '<a rel="nofollow" href="' . esc_url( $link ) . '">' . esc_html( $term->name ) . ' (' . $count . ')</a>';
}

function zeen_woo_archive_rating() {

	if ( get_theme_mod( 'woo_archive_stars', 1 ) != 1 ) {
		return;
	}
	zeen_woo_archive_rating_html();

}
add_action( 'woocommerce_after_shop_loop_item_title', 'zeen_woo_archive_rating', 11 );

function zeen_woo_archive_variations() {
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		woocommerce_variable_add_to_cart();
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'zeen_woo_archive_variations', 9 );

if ( ! function_exists( 'zeen_woo_related_args' ) ) :
	function zeen_woo_related_args( $args ) {

		$layout = get_theme_mod( 'woo_layout', 3 );
		$ppr    = 4;
		if ( 3 == $layout || 13 == $layout ) {
			$ppr  = 3;
			$cols = 3;
		} elseif ( 4 == $layout ) {
			$cols = 4;
		} else {
			$cols = 2;
		}

		$args['posts_per_page'] = $ppr;
		$args['columns']        = $cols;
		return $args;
	}
endif;
add_filter( 'woocommerce_output_related_products_args', 'zeen_woo_related_args' );


/**
 * Init tweaks
 *
 * @since 1.0.0
 */
function zeen_woo_related() {
	if ( function_exists( 'is_product' ) && is_product() ) {
		global $post;
		$pid     = $post->ID;
		$related = get_post_meta( $pid, 'zeen_related_posts', true );
		if ( 2 == $related ) {
			$related_off = true;
		}
		if ( empty( $related ) || 99 == $related ) {
			if ( get_theme_mod( 'woo_related_products', 1 ) != 1 ) {
				$related_off = true;
			}
		}
		if ( ! empty( $related_off ) ) {
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		}
	}
}
add_action( 'template_redirect', 'zeen_woo_related' );

if ( ! function_exists( 'zeen_woo_cart_class' ) ) :
	function zeen_woo_cart_class() {
		return 'mini_cart_item clearfix';
	}
endif;
add_filter( 'woocommerce_mini_cart_item_class', 'zeen_woo_cart_class' );

if ( ! function_exists( 'zeen_woo_summary_bot' ) ) :
	function zeen_woo_summary_bot() {
		global $product;
		echo '<div class="product_meta tipi-flex tipi-flex-wrap">';
		do_action( 'woocommerce_product_meta_start' );
		if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) {
			$sku = $product->get_sku();
			if ( ! empty( $sku ) ) {
				echo '<span class="sku_wrapper">';
				esc_html_e( 'SKU:', 'zeen' );
				echo '<span class="sku">';
				if ( empty( $sku ) ) {
					esc_html__( 'N/A', 'zeen' );
				} else {
					echo esc_attr( $sku );
				}
				echo '</span></span>';
			}
		}

		echo wc_get_product_tag_list( $product->get_id(), ' ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'zeen' ) . ' ', '</span>' );

		do_action( 'woocommerce_product_meta_end' );

		echo '</div>';
	}
endif;

if ( ! function_exists( 'zeen_woo_empty_cart' ) ) :
	function zeen_woo_empty_cart() {
		$options = array(
			'qry'         => array(
				'post_type'      => 'product',
				'posts_per_page' => 3,
			),
			'preview'     => 61,
			'specific'    => 'related',
			'img_shape'   => 2,
			'excerpt_off' => true,
			'contained'   => true,
			'meta_key'    => 'total_sales',
			'orderby'     => 'meta_value_num',
			'title'       => esc_html__( 'Best Sellers', 'zeen' ),
		);

		echo '<div class="shop-empty-cart clearfix">';
		$block = zeen_block_pick( $options );
		$block->output();
		echo '</div>';
	}
endif;

if ( ! function_exists( 'zeen_woo_summary_top' ) ) :
	function zeen_woo_summary_top() {
		global $product;
		echo '<span class="woo-cats">' . wc_get_product_category_list( $product->get_id(), ', ' ) . '</span>';
	}
endif;
add_action( 'woocommerce_single_product_summary', 'zeen_woo_summary_top', 4 );
add_action( 'woocommerce_single_product_summary', 'zeen_woo_summary_bot', 40 );


remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 15 );
remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_rating', 14 );

function zeen_woo_review_before() {
	echo '<div class="review-meta-wrap tipi-flex tipi-flex-wrap">';
}
add_action( 'woocommerce_review_before_comment_meta', 'zeen_woo_review_before', 9 );

function zeen_woo_review_after() {
	echo '</div>';
}
add_action( 'woocommerce_review_meta', 'zeen_woo_review_after', 12 );

remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_gravatar', 10 );


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 11 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_cart_is_empty', 'zeen_woo_empty_cart' );
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_true' );
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_product_related_products_heading', 'zeen_woocommerce_product_related_products_heading' );
add_filter( 'woocommerce_product_upsells_products_heading', 'zeen_woocommerce_product_upsells_products_heading' );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'zeen_woocommerce_before_shop_loop', 20 );

function zeen_woocommerce_before_shop_loop() {
	echo '<div class="woo-filters__wrap">';
	echo '<div class="woo-filters__titles tipi-flex tipi-vertical-c">';
	woocommerce_result_count();
	echo '<div class="woo-filters--right tipi-flex tipi-flex-wrap tipi-vertical-c">';
	zeen_woo_grid_ordering();
	if ( is_active_sidebar( 'woocommerce-filters' ) && zeen_woo_filters_on() ) {
		echo '<div class="filter__title tipi-flex tipi-flex-wrap filter__sep">';
		echo '<a href="#" id="woo-filter-tr" class="tipi-vertical-c tipi-inline tipi-button">';
		esc_html_e( 'Filter', 'zeen' );
		echo '</a>';
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
function zeen_woo_filters_on() {
	$output = true;
	if ( ! is_tax() ) {
		$output = '';
	}
	if ( zeen_is_shop() ) {
		$builder = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'tipi_builder_active', true );
		if ( empty( $builder ) ) {
			$output = true;
		}
	}
	return $output;
}

function zeen_woo_grid_ordering( $args = array() ) {
	$layout = get_theme_mod( 'woo_layout', 3 );
	$s      = 3 == $layout || 12 == $layout ? true : '';
	$type_s = $layout > 10 ? 2 : 3;
	$type_m = $layout > 10 ? 3 : 4;
	echo '<a href="#" id="woo-grid-s" class="grid-sep filter__sep tipi-xs-0';
	if ( ! empty( $s ) ) {
		echo ' active';
	}
	echo '" data-type="s" data-size="' . esc_attr( $type_s ) . '">';
	echo '<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M6 11a1 1 0 011 1v5a1 1 0 01-1 1H1a1 1 0 01-1-1v-5a1 1 0 011-1h5zm11 0a1 1 0 011 1v5a1 1 0 01-1 1h-5a1 1 0 01-1-1v-5a1 1 0 011-1h5zM6 0a1 1 0 011 1v5a1 1 0 01-1 1H1a1 1 0 01-1-1V1a1 1 0 011-1h5zm11 0a1 1 0 011 1v5a1 1 0 01-1 1h-5a1 1 0 01-1-1V1a1 1 0 011-1h5z" fill="#000" fill-rule="evenodd"/></svg>';
	echo '</a>';
	echo '<a href="#" id="woo-grid-m" class="grid-sep filter__sep tipi-xs-0';
	if ( empty( $s ) ) {
		echo ' active';
	}

	echo '" data-type="m" data-size="' . esc_attr( $type_m ) . '">';
	echo '<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M3.25 14a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75H.75a.75.75 0 01-.75-.75v-2.5A.75.75 0 01.75 14h2.5zm7 0a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 01.75-.75h2.5zm7 0a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 01.75-.75h2.5zm-14-7a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75H.75a.75.75 0 01-.75-.75v-2.5A.75.75 0 01.75 7h2.5zm7 0a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5A.75.75 0 017.75 7h2.5zm7 0a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 01.75-.75h2.5zm-14-7A.75.75 0 014 .75v2.5a.75.75 0 01-.75.75H.75A.75.75 0 010 3.25V.75A.75.75 0 01.75 0h2.5zm7 0a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5A.75.75 0 017 3.25V.75A.75.75 0 017.75 0h2.5zm7 0a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75V.75a.75.75 0 01.75-.75h2.5z" fill="#000" fill-rule="evenodd"/></svg>';
	echo '</a>';
}
function zeen_woo_catalog_ordering( $args = array() ) {
	if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
		return;
	}
	$show_default_orderby = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );

	$catalog_orderby_options = apply_filters(
		'woocommerce_catalog_orderby',
		array(
			'menu_order' => esc_html__( 'Default', 'zeen' ),
			'date'       => esc_html__( 'Latest', 'zeen' ),
			'popularity' => esc_html__( 'Popularity', 'zeen' ),
			'price'      => esc_html__( 'Price: Low to High', 'zeen' ),
			'price-desc' => esc_html__( 'Price: High to Low', 'zeen' ),
			'rating'     => esc_html__( 'Average Rating', 'zeen' ),
		)
	);

	$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
	$orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby;

	if ( wc_get_loop_prop( 'is_search' ) ) {
		$catalog_orderby_options = array_merge( array( 'relevance' => esc_html__( 'Relevance', 'zeen' ) ), $catalog_orderby_options );

		unset( $catalog_orderby_options['menu_order'] );
	}

	if ( ! $show_default_orderby ) {
		unset( $catalog_orderby_options['menu_order'] );
	}

	if ( ! wc_review_ratings_enabled() ) {
		unset( $catalog_orderby_options['rating'] );
	}

	if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
		$orderby = current( array_keys( $catalog_orderby_options ) );
	}
	if ( is_page() || zeen_is_shop() ) {
		$pid    = zeen_is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID();
		$term_a = get_permalink( $pid );
	} else {
		$term    = get_queried_object();
		$term_id = $term->term_id;
		if ( is_post_type_archive() ) {
			$term_a = get_post_type_archive_link( get_query_var( 'post_type' ) );
		} else {
			$term_a = get_term_link( $term_id );
		}

		if ( is_wp_error( $term_a ) ) {
			return;
		}
	}

	echo '<div class="filters-widget clearfix woocommerce widget_sort_by">';
	echo '<h3 class="widget-title title">' . esc_html__( 'Sort By', 'zeen' ) . '</h3>';

	echo '<ul>';
	foreach ( $catalog_orderby_options as $id => $name ) :
		echo '<li value="' . esc_attr( $id ) . '" class="wc-layered-nav-filter';
		if ( $orderby == $id ) {
			echo ' chosen';
		}
		echo '">';
		echo '<a class="zeen-effect" href="' . esc_url( add_query_arg( array( 'orderby' => esc_attr( $id ) ), $term_a ) ) . '" data-type="' . esc_attr( $id ) . '">' . esc_html( $name ) . '</a>';
		echo '</li>';
	endforeach;
	echo '</ul>';

	echo '</div>';
}

function zeen_woocommerce_product_related_products_heading() {
	return esc_html__( 'You May Also Like', 'zeen' );
}
function zeen_woocommerce_product_upsells_products_heading() {
	return esc_html__( "Can't Be Missed", 'zeen' );
}

function zeen_woocommerce_billing_fields( $fields = array() ) {
	$fields['billing_address_2']['label']       = esc_html__( 'Apartment, suite, unit, etc.', 'zeen' );
	$fields['billing_address_2']['label_class'] = '';
	$fields['billing_address_2']['placeholder'] = '';
	return $fields;
}
add_filter( 'woocommerce_billing_fields', 'zeen_woocommerce_billing_fields' );

function zeen_woocommerce_shipping_fields( $fields = array() ) {
	$fields['shipping_address_2']['label']       = esc_html__( 'Apartment, suite, unit, etc.', 'zeen' );
	$fields['shipping_address_2']['label_class'] = '';
	$fields['shipping_address_2']['placeholder'] = '';
	return $fields;
}
add_filter( 'woocommerce_shipping_fields', 'zeen_woocommerce_shipping_fields' );

function zeen_woocommerce_default_address_fields( $fields = array() ) {
	$fields['address_2']['placeholder'] = '';
	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'zeen_woocommerce_default_address_fields' );


function zeen_product_attributes_type_selector( $types = '' ) {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return $types;
	}
	$current = get_current_screen();
	if ( 'product_page_product_attributes' == $current->base ) {
		$extra_types = zeen_product_attributes_types();
		foreach ( $extra_types as $key => $value ) {
			$types[ $key ] = $value['label'];
		}
	}
	return $types;
}
add_filter( 'product_attributes_type_selector', 'zeen_product_attributes_type_selector' );

function zeen_product_attributes_types() {
	$output = array(
		'zeen_button' => array(
			'label' => 'Zeen: ' . esc_html__( 'Buttons', 'zeen' ),
		),
		'zeen_color'  => array(
			'label' => 'Zeen: ' . esc_html__( 'Colors', 'zeen' ),
		),
		'zeen_image'  => array(
			'label' => 'Zeen: ' . esc_html__( 'Images', 'zeen' ),
		),
	);
	return $output;
}

function zeen_woocommerce_dropdown_variation_attribute_options_html( $html = '', $args = array() ) {
	global $product;
	$tax   = wc_get_attribute_taxonomies();
	$types = zeen_product_attributes_types();
	$terms = get_terms( array( 'taxonomy' => $args['attribute'] ) );
	foreach ( $terms as $term => $term_val ) {
		if ( ! empty( $term_val->slug ) && ! in_array( $term_val->slug, $args['options'] ) ) {
			unset( $terms[ $term ] );
		}
	}

	foreach ( $tax as $key => $value ) {
		if ( ! empty( $value->attribute_type ) && ! empty( $types[ $value->attribute_type ] ) && 'pa_' . $value->attribute_name == $args['attribute'] ) {
			$html = zeen_woo_attribute_type(
				array(
					'type'                => $value->attribute_type,
					'name'                => $value->attribute_name,
					'attribute'           => $args['attribute'],
					'attribute_available' => $product->get_available_variations(),
					'attribute_default'   => $product->get_default_attributes(),
					'product'             => $product,
					'options'             => $terms,
				)
			) . $html;
		}
	}

	return $html;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'zeen_woocommerce_dropdown_variation_attribute_options_html', 10, 2 );
function zeen_woo_range( $price = '', $product = null ) {
	if ( get_theme_mod( 'woo_variable_show_min_price' ) != 1 ) {
		return $price;
	}
	$price_min      = $product->get_variation_regular_price( 'min', true );
	$price_sale_min = $product->get_variation_sale_price( 'min', true );
	$price          = $price_sale_min == $price_min ? wc_price( $price_min ) : '<del>' . wc_price( $price_min ) . '</del><ins>' . wc_price( $price_sale_min ) . '</ins>';
	return $product->get_variation_price( 'min', true ) == $product->get_variation_price( 'max', true ) ?
	$price : apply_filters( 'zeen_woocommerce_variable_range_prefix', '' ) . $price . apply_filters( 'zeen_woocommerce_variable_range_suffix', '+' );
}

add_filter( 'woocommerce_variable_sale_price_html', 'zeen_woo_range', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'zeen_woo_range', 10, 2 );

function zeen_woo_attribute_type( $args = array() ) {
	ob_start();
	$class = 'zeen_color' == $args['type'] ? $args['type'] . '_type tipi-flex tipi-flex-wrap' : $args['type'] . '_type';

	$default = empty( $args['attribute_default'][ $args['attribute'] ] ) ? '' : $args['attribute_default'][ $args['attribute'] ];
	echo '<div class="zeen__var__options ' . esc_attr( $class ) . '" data-attribute="' . esc_attr( $args['attribute'] ) . '">';
	foreach ( $args['options'] as $option ) {
		echo '<div class="zeen__var__option">';
		$id = 'zeen__radio-' . esc_attr( $option->slug ) . '-' . (int) zeen_uid();
		echo '<input type="radio" id="' . esc_attr( $id ) . '" name="' . esc_attr( $option->taxonomy ) . '" value="' . esc_attr( $option->slug ) . '"' . checked( $option->slug, $default, false ) . '>';
		echo '<label for="' . esc_attr( $id ) . '"';
		if ( ! empty( $option->description ) ) {
			echo 'class="tipi-tip tipi-tip-t" data-title="' . esc_attr( $option->description ) . '"';
		}
		echo '>';
		if ( 'zeen_color' == $args['type'] ) {
			$color = zeen_get_term_meta( 'zeen_color', $option->term_id );
			if ( ! empty( $color ) ) {
				echo '<span style="background:' . esc_attr( $color ) . '"></span>';
			}
		} elseif ( 'zeen_image' == $args['type'] ) {
			$img = zeen_get_term_meta( 'zeen_image', $option->term_id );
			if ( ! empty( $img ) ) {
				add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
				echo wp_get_attachment_image( $img, 'thumbnail' );
				remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
			}
		} else {
			echo esc_html( $option->name );
		}
		echo '</label>';
		echo '</div>';
	}
	echo '</div>';
	return ob_get_clean();
}

function zeen_woocommerce_variation_is_active( $true = '', $instance = null ) {
	if ( ! $instance->is_in_stock() ) {
		return false;
	}
	return $true;
}
add_filter( 'woocommerce_variation_is_active', 'zeen_woocommerce_variation_is_active', 10, 2 );

function zeen_woo_template_redirect() {
	global $post;
	if ( empty( $post ) || ! is_singular( 'product' ) ) {
		return;
	}
	$product_design = zeen_get_product_design();
	if ( 3 == $product_design['hero'] || 4 == $product_design['hero'] || 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
		add_filter( 'woocommerce_single_product_flexslider_enabled', '__return_false' );
	}
	if ( 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
		add_filter( 'woocommerce_single_product_zoom_enabled', '__return_false' );
	}
	if ( get_theme_mod( 'woo_external_redirect' ) == 1 ) {
		$product = wc_get_product( $post );
		if ( $product->is_type( 'external' ) ) {
			wp_safe_redirect( $product->get_product_url(), 301, '' );
			exit;
		}
	}
}
add_action( 'template_redirect', 'zeen_woo_template_redirect' );


function zeen_woocommerce_gallery_image_size( $output = '' ) {
	$product_design = zeen_get_product_design();
	if ( 3 == $product_design['hero'] || 4 == $product_design['hero'] || 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
		$output = 'woocommerce_single';
	}
	if ( is_product_category() || is_shop() ) {
		$output = zeen_single_product_archive_thumbnail_size( 'woocommerce_single' );
	}
	return $output;
}
add_filter( 'woocommerce_gallery_image_size', 'zeen_woocommerce_gallery_image_size' );

/**
 * Cart Do
 *
 * @since 4.0.0
*/
function zeen_woo_cart_do() {
	ob_start();
	if ( ! isset( $_POST['product_id'] ) ) {
		die();
	}
	$product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
	$product           = wc_get_product( $product_id );
	$quantity          = empty( $_POST['form']['quantity'] ) ? 1 : wc_stock_amount( wp_unslash( $_POST['form']['quantity'] ) );
	$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
	$product_status    = get_post_status( $product_id );
	$variation_id      = '';
	$variation         = array();
	if ( $product && 'variation' === $product->get_type() ) {
		$variation_id = $_POST['form']['variation_id'];
		foreach ( $_POST['form'] as $key => $value ) {
			if ( strpos( $key, 'attribute_' ) === 0 ) {
				$variation[ $key ] = $value;
			}
		}
	}
	if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) && 'publish' === $product_status ) {
		do_action( 'woocommerce_ajax_added_to_cart', $product_id );
		if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
			wc_add_to_cart_message( array( $product_id => $quantity ), true );
		}
		WC_AJAX::get_refreshed_fragments();
	} else {
		$data = array(
			'error'       => true,
			'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
		);
		wp_send_json( $data );
	}
	die();
}
add_action( 'wp_ajax_zeen_woo_cart_do', 'zeen_woo_cart_do' );
add_action( 'wp_ajax_nopriv_zeen_woo_cart_do', 'zeen_woo_cart_do' );

function zeen_woocommerce_template_single_title() {
	echo '<a href="' . esc_url( get_permalink() ) . '">';
	the_title( '<h1 class="product_title entry-title title">', '</h1>' );
	echo '</a>';

}
add_filter( 'woocommerce_sale_flash', 'zeen_woocommerce_sale_flash', 20, 3 );
function zeen_woocommerce_sale_flash( $html = '', $post = '', $product = null ) {

	if ( $product->is_type( 'grouped' ) ) {
		return '<span class="onsale zeen-badge onsale--title">' . esc_html__( 'Sale', 'zeen' ) . '</span>';
	} elseif ( $product->is_type( 'variable' ) ) {
		$percentages = array();
		$prices      = $product->get_variation_prices();
		foreach ( $prices['price'] as $key => $price ) {
			if ( $prices['regular_price'][ $key ] !== $price ) {
				$percentages[] = 100 - ( $prices['sale_price'][ $key ] / $prices['regular_price'][ $key ] * 100 );
			}
		}
		$percentage = max( $percentages );
	} else {
		$regular_price = $product->get_regular_price();
		$sale_price    = $product->get_sale_price();

		$percentage = 100 - ( (float) $sale_price / (float) $regular_price * 100 );
	}
	if ( $percentage > 1 ) {
		return '<span class="onsale zeen-badge font-' . get_theme_mod( 'typo_price', 1 ) . '">-' . round( (float) $percentage ) . '%</span>';
	}
}

function zeen_woocommerce_before_single_product_summary() {
	echo '<div class="single_product_summary__wrap clearfix">';
	echo '<div class="single_product_summary">';
	echo '<div class="sticky--wrap clearfix';
	$product_design = zeen_get_product_design();
	if ( 1 !== $product_design['hero'] && 5 !== $product_design['hero'] && 6 !== $product_design['hero'] && 7 !== $product_design['hero'] ) {
		echo ' tipi-row';
	}
	echo '">';
	echo '<div class="woo-gallery__wrap tipi-xs-12 tipi-m-6';
	$product_design = zeen_get_product_design();
	if ( 1 !== $product_design['hero'] ) {
		echo ' tipi-l-7';
	}
	echo '">';
	zeen_woo_badge_new();
}
add_action( 'woocommerce_before_single_product_summary', 'zeen_woocommerce_before_single_product_summary', 9 );

function zeen_woocommerce_before_single_product_summary_after_images() {
	echo '</div>'; // woo-gallery__wrap tipi-xs-12 tipi-m-6 tipi-l-8
	echo '<div class="summary__wrap tipi-xs-12 tipi-m-6';
	$product_design = zeen_get_product_design();
	$size           = 's';
	if ( 1 !== $product_design['hero'] ) {
		echo ' tipi-l-5';
	}
	if ( 2 == $product_design['hero'] || 3 == $product_design['hero'] || 4 == $product_design['hero'] ) {
		$size = 'm';
	}
	if ( 5 == $product_design['hero'] || 6 == $product_design['hero'] || 7 == $product_design['hero'] ) {
		$size = 'l';
	}
	if ( get_theme_mod( 'woo_summary_sticky', 1 ) == 1 ) {
		echo ' sticky-sb-on';
	}
	echo ' product-title--' . esc_attr( $size );
	echo '">';
}
add_action( 'woocommerce_before_single_product_summary', 'zeen_woocommerce_before_single_product_summary_after_images', 21 );

function zeen_woocommerce_after_single_product_summary() {
	echo '</div>'; // .summary__wrap tipi-xs-12 tipi-s-6 tipi-l-5
	echo '</div>'; // .tipi-row sticky--wrap
	echo '</div>'; // .single_product_summary
	echo '<div class="woo-tabs__wrap';
	$product_design = zeen_get_product_design();
	if ( ( 1 !== $product_design['hero'] ) ) {
		echo ' tipi-row';
	}
	echo '">';
}
add_action( 'woocommerce_after_single_product_summary', 'zeen_woocommerce_after_single_product_summary', 9 );

function zeen_woocommerce_after_single_product_summary_end() {
	echo '</div>'; // .tipi-row woo-tabs__wrap
	echo '</div>'; // .single_product_summary__wrap
}
add_action( 'woocommerce_after_single_product_summary', 'zeen_woocommerce_after_single_product_summary_end', 90 );

function zeen_woo_loop_image( $attr = array(), $attachment = '', $size = '' ) {
	$attr['class'] .= ' wp-post-image';
	return $attr;
}
add_action( 'woocommerce_before_shop_loop_item_title', 'zeen_woo_extra_1' );

function zeen_woo_badges() {
	echo '<div class="zeen-badges tipi-flex">';
	zeen_woo_badge_new();
	if ( function_exists( 'woocommerce_show_product_sale_flash' ) ) {
		woocommerce_show_product_sale_flash();
	}
	echo '</div>';
}
function zeen_woo_badge_new() {
	$pid      = get_the_ID();
	$override = (int) get_post_meta( $pid, 'zeen_new', true );
	if ( 1 === $override ) {
		$output = true;
	} elseif ( 2 !== $override && get_theme_mod( 'woo_new_onoff' ) == 1 ) {
		$date = get_the_date( '', $pid );
		if ( strtotime( $date ) > strtotime( '-' . get_theme_mod( 'woo_new_date', 7 ) . ' days' ) ) {
			$output = true;
		}
	}
	if ( ! empty( $output ) ) {
		echo '<span class="zeen-badge badge--new">' . esc_html__( 'New', 'zeen' ) . '</span>';
	}
}
add_action( 'woocommerce_before_shop_loop_item', 'zeen_woo_badges' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

function zeen_woocommerce_output_all_notices() {
	$class = 'woocommerce-notices-wrapper';
	if ( is_product() ) {
		$product_design = zeen_get_product_design();
		if ( 1 != $product_design['hero'] ) {
			$class .= ' tipi-row';
		}
	}
	echo '<div class="' . esc_attr( $class ) . '">';
	wc_print_notices();
	echo '</div>';
}
add_action( 'woocommerce_before_single_product', 'zeen_woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

function zeen_woocommerce_out_of_stock_message() {
	return esc_html__( 'Out Of Stock', 'zeen' );
}
add_filter( 'woocommerce_out_of_stock_message', 'zeen_woocommerce_out_of_stock_message' );

function zeen_woocommerce_share() {
	if ( get_theme_mod( 'woo_summary_share' ) != 1 ) {
		return;
	}
	global $post;
	zeen_share(
		array(
			'pid'    => $post->ID,
			'design' => 11,
			'mod'    => 'woo_summary',
		)
	);
}
add_action( 'woocommerce_share', 'zeen_woocommerce_share' );

function zeen_use_block_editor_for_post_type( $can_edit = '', $post_type = '' ) {
	if ( get_theme_mod( 'woo_gutenberg' ) == 1 && 'product' == $post_type ) {
		$can_edit = true;
	}
	return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'zeen_use_block_editor_for_post_type', 10, 2 );

function zeen_woocommerce_product_price_class( $class = '' ) {
	$class .= ' font-' . get_theme_mod( 'typo_price', 1 );
	return $class;
}
add_filter( 'woocommerce_product_price_class', 'zeen_woocommerce_product_price_class' );


function zeen_single_product_archive_thumbnail_size( $size = '' ) {
	$shape  = (int) get_theme_mod( 'woo_archive_image_shape', 1 );
	$layout = (int) get_theme_mod( 'woo_layout', 3 );
	if ( 1 === $shape ) {
		return $size;
	} elseif ( 2 === $shape ) {
		$width  = 390;
		$height = 390;
		if ( 4 === $layout || 13 === $layout ) {
			$width  = 293;
			$height = 293;
		}
	} elseif ( 3 === $shape ) {
		$width  = 370;
		$height = 490;
	}

	return array( $width, $height );
}
add_filter( 'single_product_archive_thumbnail_size', 'zeen_single_product_archive_thumbnail_size' );

function zeen_woocommerce_order_item_name( $item_name = '', $item = '', $is_visible = '' ) {
	if ( ! is_wc_endpoint_url( 'order-received' ) ) {
		return $item_name;
	}

	$product = $item->get_product();
	$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item );

	if ( $product->get_image_id() > 0 ) {
		$product_image = '<span>' . $product->get_image( 'thumbnail' ) . '</span>';

		$product_image = '<a href="' . esc_url( $product_permalink ) . '">' . apply_filters( 'woocommerce_cart_item_thumbnail', $product->get_image( 'thumbnail' ), $item ) . '</a>';

		$item_name     = $product_image . $item_name;
	}

	return $item_name;
}
add_filter( 'woocommerce_order_item_name', 'zeen_woocommerce_order_item_name', 10, 3 );
