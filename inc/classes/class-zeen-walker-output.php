<?php
/**
 * Zeen Walker Outpu
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class ZeenWalkerOutput extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$subtitle  = '';
		$post_type = '';
		$mm        = $item->zeen_mm_load ? $item->zeen_mm_load : 2;

		if ( ! ( 'post_tag' == $item->object || 'category' == $item->object || 'post' == $item->object || 'custom' == $item->object || 'page' == $item->object ) ) {
			$post_type = zeen_get_cpt_from_tax( $item->object );
		}

		$image_shape    = $item->zeen_mm_image_shape ? $item->zeen_mm_image_shape : 1;
		$show_title     = $item->zeen_mm_show_title ? $item->zeen_mm_show_title : 1;
		$show_subtitle  = $item->zeen_mm_show_subtitle ? $item->zeen_mm_show_subtitle : 1;
		$title_location = 2 == $item->zeen_mm_title_location ? true : '';
		$ppp            = $item->zeen_mm_quantity ? $item->zeen_mm_quantity : 3;
		$child          = false;
		if ( is_array( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
			$child = true;
		}
		if ( 31 == $mm ) {
			$ppp = empty( $child ) ? apply_filters( 'zeen_mm_31_no_child', 7 ) : apply_filters( 'zeen_mm_31_with_child', 4 );
		}
		if ( 'custom' != $item->object && 'page' != $item->object && 'post' != $item->object ) {
			if ( $depth > 0 ) {
				$attributes .= apply_filters( 'zeen_megamenu_subitem_ajax', true ) ? ' class="block-more block-mm-changer block-mm-init block-changer"' : '';
				$term        = get_term_by( 'id', $item->object_id, $item->object );
				if ( ! empty( $term ) ) {
					if ( 1 == $show_title ) {
						$attributes .= ' data-title="' . esc_attr( $term->name ) . '"';
						$attributes .= ' data-url="' . esc_url( $item->url ) . '"';
					}
					if ( 1 == $show_subtitle ) {
						$attributes .= ' data-subtitle="' . esc_attr( $term->description ) . '"';
					}

					$tax         = get_term( $item->object_id, $item->object );
					$tax         = $tax->count;
					$attributes .= ' data-count="' . (int) $tax . '"';
				}
			} else {
				$attributes .= ' data-ppp="' . (int) $ppp . '"';
			}

			$attributes .= ' data-tid="' . (int) $item->object_id . '"  data-term="' . esc_attr( $item->object ) . '"';
		}

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$title        = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		$item_output  = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= isset( $args->link_before ) ? $args->link_before . $title . $args->link_after : $title;
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
		$output  .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		$order    = $item->zeen_mm_order ? $item->zeen_mm_order : 1;
		$featured = $item->zeen_mm_featured ? $item->zeen_mm_featured : array();
		$parent   = 0 == $item->menu_item_parent ? true : false;
		wp_register_style( 'zeen-mm-style', false );
		wp_enqueue_style( 'zeen-mm-style' );
		wp_add_inline_style( 'zeen-mm-style', zeen_mm_style( $item ) );
		if ( empty( $parent ) || ( empty( $child ) && $mm < 10 ) ) {
			return; // No need to continue
		}
		$background    = $item->zeen_mm_background ? $item->zeen_mm_background : '';
		$background_on = ! empty( $background ) && wp_get_attachment_image( $background, 'full' ) ? true : '';
		$uid           = $item->ID;
		$qry           = array();
		$output       .= '<div class="menu mm-' . (int) $mm;
		$ppr           = '';
		if ( $mm > 1 ) {
			$output .= ' tipi-row';
		}
		if ( 51 == $mm ) {
			$output .= ' mm-51-ppp-' . (int) $ppp;
		}
		if ( ! empty( $background_on ) ) {
			$output .= ' menu-with--bg';
		}
		$output .= '" data-mm="' . (int) $mm . '">';
		if ( ! empty( $background_on ) ) {
			add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_mm', 10, 3 );
			$output .= '<div class="menu--bg">' . wp_get_attachment_image( $background, 'full' ) . '</div>';
			remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_mm', 10, 3 );
		}
		if ( $mm < 10 ) {
			$output .= '<div class="menu-wrap menu-wrap-minus-10">';
		} elseif ( $mm < 50 ) {

			switch ( $ppp ) {
				case 2:
					$preview = 67;
					break;
				case 4:
					$preview = 31 == $mm ? 75 : 71;
					break;
				case 5:
					$preview = 31 == $mm ? 75 : 79;
					break;
				default:
					$preview = 31 == $mm ? 75 : 61;
					break;
			}
			if ( 22 == $mm ) {
				$preview        = 22;
				$ppr            = apply_filters( 'zeen_megamenu_thumbnail_posts_per_line', 4 );
				$ppp            = apply_filters( 'zeen_megamenu_thumbnail_posts_per_line', 4 ) * ( $ppp - 1 );
				$image_shape    = '';
				$title_location = '';
			}
			if ( 31 == $mm ) {
				$preview = empty( $child ) ? 76 : 75;
				$image_shape = '';
			}

			if ( 'category' == $item->object ) {
				$qry['cat'] = $item->object_id;
			} elseif ( 'post_tag' == $item->object ) {
				$qry['tag__in'] = $item->object_id;
			} elseif ( 'post' == $item->object || 'custom' == $item->object || 'page' == $item->object ) {
				$order = 3;
			} else {
				$qry['tax_query'] = array(
					array(
						'taxonomy' => $item->object,
						'field'    => 'term_id',
						'terms'    => $item->object_id,
					),
				);
			}

			if ( ! ( 'post' == $item->object || 'custom' == $item->object || 'page' == $item->object ) ) {
				$subtitle = 1 == $show_subtitle ? term_description( $item->object_id, $item->object ) : '';
			}
			$pages = '';
			switch ( $order ) {
				case 2:
					$qry['tipi'] = 'random';
					break;
				case 3:
					if ( ! empty( $featured ) ) {
						$featured = explode( ',', $featured );
						array_splice( $featured, $ppp );
						$qry['orderby'] = 'post__in';
					} else {
						break;
					}
					$pages            = true;
					$qry['cat']       = '';
					$qry['tag__in']   = '';
					$qry['tax_query'] = '';
					$qry['post__in']  = $featured;
					break;
				default:
					break;
			}

			$post_types = zeen_get_post_types(
				array(
					'page'       => apply_filters( 'zeen_megamenu_pages_override', $pages ),
					'essentials' => true,
					'shop'       => true,
				)
			);
			if ( 'page' == $item->object && $item->object_id == get_option( 'woocommerce_shop_page_id' ) ) {
				$post_types = array( 'product' );
			}
			$qry['post_type']           = $post_types;
			$qry['posts_per_page']      = $ppp;
			$qry['ignore_sticky_posts'] = 1;
			$mobile                     = ZeenMobile::is_mobile() ? 'off' : '';
			$title                      = 1 == $show_title ? $item->title : '';
			$load_more                  = '';
			if ( ! empty( $title ) || ! empty( $subtitle ) ) {
				$load_more = 2;
			}
			$options = apply_filters(
				'zeen_megamenu_args',
				array(
					'qry'           => $qry,
					'uid'           => $uid,
					'preview'       => $preview,
					'specific'      => 'mm',
					'img_shape'     => $image_shape,
					'ndp_skip'      => true,
					'byline_off'    => true,
					'excerpt_off'   => true,
					'mobile'        => $mobile,
					'title'         => $title,
					'posts_per_row' => $ppr,
					'padding'       => '',
					'margin'        => '',
					'load_more'     => $load_more,
					'subtitle'      => $subtitle,
					'post_subtitle' => apply_filters( 'zeen_megamenu_subtitles', 'on' ),
					'meta_overlay'  => $title_location,
					'title_url'     => $item->url,
					'linkcheck'     => true,
				)
			);
			$block   = new ZeenBlockClassic( $options );
			$output .= '<div class="menu-wrap menu-wrap-more-10 tipi-flex">';
			$output .= $block->output( false );
			if ( empty( $child ) ) {
				$output .= '</div></div>';
			}
		} else {
			$output .= '<div class="menu-wrap">';
		}

	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= 0 == $depth ? "$indent</ul></div></div>\n" : "$indent</ul>\n";
	}
}

function zeen_mm_style( $item ) {
	$ioi   = empty( $item->object_id ) ? '' : $item->object_id;
	$color = get_term_meta( $ioi, 'zeen_color', true );
	$color = empty( $color ) ? get_theme_mod( 'menu_accent', '#111' ) : $color;
	if ( ! empty( $color ) && empty( $item->menu_item_parent ) ) {
		$output = '';
		if ( get_theme_mod( 'megamenu_color_usage_onoff', 1 ) == 1 ) {
			$mm_color = (int) get_theme_mod( 'megamenu_color_usage', 2 );
			if ( 1 === $mm_color ) {
				$output .= '.main-menu-bar-color-1 .menu-main-menu .mm-color.menu-item-' . $item->ID . '.active > a,
				.main-menu-bar-color-1.mm-ani-0 .menu-main-menu .mm-color.menu-item-' . $item->ID . ':hover > a,
				.main-menu-bar-color-1 .menu-main-menu .current-menu-item.menu-item-' . $item->ID . ' > a { background: ' . $color . '; }';
			} else {
				$output .= '.main-menu-bar-color-' . $mm_color . ' .menu-main-menu .menu-item-' . $item->ID . '.drop-it > a:before { border-bottom-color: ' . $color . ';}';
			}
		}
		if ( get_theme_mod( 'megamenu_submenu_color', 1 ) == 1 ) {
			$output .= '.main-navigation .mm-color.menu-item-' . $item->ID . ' .sub-menu { background: ' . $color . ';}';
		} else {
			$output .= '.main-navigation .menu-item-' . $item->ID . ' .menu-wrap > * { border-top-color: ' . $color . '!important; }';
		}
		return $output;
	}
}
