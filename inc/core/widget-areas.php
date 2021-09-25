<?php
/**
 * Widget Areas
 *
 * @package Zeen
 * @since 1.0.0
 */
function zeen_widget_areas() {

	$footer_widgets = get_theme_mod( 'footer_widgets_style', 3 );
	$sidebar_pids = ZeenOptions::zeen_get_sidebar_pids();
	$sidebar_tids = ZeenOptions::zeen_get_sidebar_tids();
	$sidebar_bids = ZeenOptions::zeen_get_sidebar_bids();
	$sidebar_cids = ZeenOptions::zeen_get_sidebar_cids();

	register_sidebar( array(
		'id'            => 'sidebar-default',
		'name'          => esc_html__( 'Default Sidebar', 'zeen' ),
		'description'   => esc_html__( 'This is the global default sidebar for your site.', 'zeen' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
		'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
	));

	register_sidebar( array(
		'id'            => 'slide-menu',
		'name'          => esc_html__( 'Slide-In Menu (Optional)', 'zeen' ),
		'description'   => esc_html__( 'Add widgets to appear inside your slide-in menu', 'zeen' ),
		'before_widget' => '<div id="%1$s" class="slide-in-widget zeen-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
		'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
	));

	register_sidebar( array(
		'id'            => 'footer-1',
		'name'          => esc_html__( 'Footer 1', 'zeen' ),
		'description'   => esc_html__( 'This is a footer widget area.', 'zeen' ),
		'before_widget' => '<div id="%1$s" class="footer-widget zeen-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
		'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
	));

	if ( $footer_widgets > 1 ) {
		register_sidebar( array(
			'id'            => 'footer-2',
			'name'          => esc_html__( 'Footer 2', 'zeen' ),
			'description'   => esc_html__( 'This is a footer widget area.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="footer-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

	if ( $footer_widgets > 2 ) {
		register_sidebar( array(
			'id'            => 'footer-3',
			'name'          => esc_html__( 'Footer 3', 'zeen' ),
			'description'   => esc_html__( 'This is a footer widget area.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="footer-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

	if ( 6 == $footer_widgets ) {
		register_sidebar( array(
			'id'            => 'footer-4',
			'name'          => esc_html__( 'Footer 4', 'zeen' ),
			'description'   => esc_html__( 'This is a footer widget area.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="footer-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

	register_sidebar( array(
		'id'            => 'footer-mob',
		'name'          => esc_html__( 'Footer Mobile (Optional)', 'zeen' ),
		'description'   => esc_html__( 'If your footer has lots of widgets and you wish to show less/different ones on mobile devices, add widgets here and they will load instead of the regular footer widgets set.', 'zeen' ),
		'before_widget' => '<div id="%1$s" class="footer-widget footer-widget-mob zeen-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
		'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
	));

	if ( ! empty( $sidebar_pids ) ) {
		foreach ( $sidebar_pids as $key ) {
			$name = get_the_title( $key );
			register_sidebar( array(
				'id'            => 'singular-' . (int) $key,
				'name'          => esc_attr( $name ) . ' (' . ucfirst( get_post_type( $key ) ) . ')',
				'description'   => esc_html__( 'This a custom created sidebar.', 'zeen' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
				'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
			));
		}
	}

	if ( ! empty( $sidebar_bids ) ) {
		foreach ( $sidebar_bids as $key => $bid_val ) {
			if ( is_array( $bid_val ) ) {
				$uid = $bid_val['uid'];
				$label = $bid_val['label'];
			} else {
				$uid = $key;
			}
			$name = empty( $label ) ? esc_attr( 'Tipi Builder Sidebar', 'zeen' ) : $label;
			$name .= ' (' . $uid . ')';
			register_sidebar( array(
				'id'            => 'builder-' . (int) $uid,
				'name'          => esc_attr( $name ),
				'description'   => esc_html__( 'This is a sidebar created in the Tipi Builder.', 'zeen' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
				'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
			));
		}
	}

	if ( ! empty( $sidebar_cids ) ) {
		foreach ( $sidebar_cids as $key => $cid_val ) {
			if ( is_array( $cid_val ) ) {
				$uid = $cid_val['uid'];
				$label = $cid_val['label'];
			} else {
				$uid = $key;
			}
			$name = empty( $label ) ? esc_attr( 'Zeen Custom Sidebar', 'zeen' ) : $label;
			$name .= ' (' . $uid . ')';
			register_sidebar( array(
				'id'            => 'cid-' . (int) $uid,
				'name'          => esc_attr( $name ),
				'description'   => esc_html__( 'This is a sidebar created via Zeen > Custom Sidebars.', 'zeen' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
				'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
			));
		}
	}

	register_sidebar( array(
		'id'            => 'timed-popup',
		'name'          => esc_html__( 'Timed Popup Content', 'zeen' ),
		'description'   => esc_html__( 'Whatever you enter here will appear inside the timed popup. To enable, go to Appearance > Customize > Timed Popup.', 'zeen' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
		'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
	));

	if ( ! empty( $sidebar_tids ) ) {
		$taxonomies = get_taxonomies(
			array(
				'public'   => true,
			),
			'names'
		);
		foreach ( $sidebar_tids as $key => $value ) {
			$tax_label = '';
			if ( is_array( $value ) ) {
				$uid = $value['uid'];
				$label = $value['label'];
				$tax_name = empty( $value['taxonomy'] ) ? '' : $value['taxonomy'];
			} else {
				$uid = $value;
				$terms = get_terms( array(
					'taxonomy' => $taxonomies,
					'hide_empty' => false,
					'include' => $uid,
				) );
				$label = $terms[0]->name;
				$tax_name = $terms[0]->taxonomy;
			}
			if ( empty( $tax_name ) || ! empty( $tax_name ) && 'post_tag' == $tax_name ) {
				if ( empty( $terms ) ) {
					$terms = get_terms( array(
						'taxonomy' => $taxonomies,
						'hide_empty' => false,
						'include' => $uid,
					) );
				}
				$tax = get_taxonomy_labels( $terms[0] );
				$tax_label = $tax->singular_name;
			} else {
				$tax_label = $tax_name;
			}
			$tax_label = ' (' . ucfirst( $tax_label ) . ')';
			$name = $label . $tax_label;
			register_sidebar( array(
				'id'            => 'archive-' . (int) $uid,
				'name'          => $name,
				'description'   => esc_html__( 'This a custom created sidebar.', 'zeen' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
				'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
			));
		}
	}

	if ( zeen_woo_active() && get_theme_mod( 'woo_layout', 3 ) > 10 && get_theme_mod( 'woo_shop_sidebar', 2 ) == 2 ) {
		register_sidebar( array(
			'id'            => 'woocommerce-shop-area',
			'name'          => esc_html__( 'WooCommerce Shop Sidebar', 'zeen' ),
			'description'   => esc_html__( 'This is the sidebar that appears on WooCommerce Shop pages.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

	if ( zeen_woo_active() && get_theme_mod( 'woo_product_sidebar', 2 ) == 2 ) {
		register_sidebar( array(
			'id'            => 'woocommerce-product-area',
			'name'          => esc_html__( 'WooCommerce Product Sidebar', 'zeen' ),
			'description'   => esc_html__( 'This is the sidebar that appears on WooCommerce Product pages.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}
	if ( zeen_woo_active() ) {
		register_sidebar( array(
			'id'            => 'woocommerce-filters',
			'name'          => esc_html__( 'WooCommerce Filters Area', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="filters-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

	if ( zeen_bbp_active() && get_theme_mod( 'bbpress_sidebar' ) == 2 ) {
		register_sidebar( array(
			'id'            => 'bbpress',
			'name'          => esc_html__( 'bbPress Sidebar', 'zeen' ),
			'description'   => esc_html__( 'This is the sidebar that appears on bbPress pages.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

	if ( zeen_bp_active() && get_theme_mod( 'buddypress_sidebar' ) == 2 ) {
		register_sidebar( array(
			'id'            => 'buddypress',
			'name'          => esc_html__( 'BuddyPress Sidebar', 'zeen' ),
			'description'   => esc_html__( 'This is the sidebar that appears on BuddyPress pages.', 'zeen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget zeen-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . ' class="widget-title title">',
			'after_title'   => '</' . esc_attr( apply_filters( 'zeen_widgets_title_tag', 'h3' ) ) . '>',
		));
	}

}
add_action( 'widgets_init', 'zeen_widget_areas' );
