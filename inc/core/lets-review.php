<?php
/**
 * Let's Review
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Icon 1
 *
 * @since 1.0.0
*/
function zeen_lr_icon_1() {
	return 'tipi-i-cart-1 ';
}

/**
 * Icon 2
 *
 * @since 1.0.0
*/
function zeen_lr_icon_2() {
	return 'tipi-i-long-arrow-right ';
}

/**
 * Color helper
 *
 * @since 4.0.5
*/
function zeen_lr_get_color() {
	$color = '';
	$pid = '';
	if ( get_theme_mod( 'lr_override_accent_color_onoff' ) == true ) {
		$source = get_theme_mod( 'reviews_color_source', 1 );
		if ( 1 == $source ) {
			$categories_list = get_the_category( $pid );
			if ( ! empty( $categories_list ) ) {
				$color = get_term_meta( $categories_list[0]->term_id, 'zeen_color', true );
			}
		} elseif ( 2 == $source ) {
			$color = get_theme_mod( 'lr_override_accent_color', '#f8d92f' );
		}
	}
	return apply_filters( 'zeen_lets_review_color', $color, $pid );
}

/**
 * Term Check
 *
 * @since 1.0.0
*/
function zeen_lr_cat_check() {
	$cats = get_categories();
	if ( ! empty( $cats ) ) {
		foreach ( $cats as $cat ) {
			if ( class_exists( 'Lets_Review_API' ) ) {
				$args = array(
					'posts_per_page' => -1,
					'meta_key' => '_lets_review_onoff',
					'meta_value' => 1,
					'cat' => $cat->term_id,
				);
				$qry = new WP_Query( $args );
				if ( $qry->have_posts() ) {
					update_term_meta( $cat->term_id, '_lets_review_active', true );
				} else {
					update_term_meta( $cat->term_id, '_lets_review_active', '' );
				}
			} else {
				update_term_meta( $cat->term_id, '_lets_review_active', '' );
			}
		}
	}
}
