<?php
/**
 * Walker
 *
 * @package Zeen
 * @since 1.0.0
 */

require get_parent_theme_file_path( 'inc/classes/class-zeen-walker.php' );
require get_parent_theme_file_path( 'inc/classes/class-zeen-walker-output.php' );

function zeen_walker_menu( $walker ) {

	if ( 'Walker_Nav_Menu_Edit' == $walker ) {
		$walker = 'ZeenWalker';
	}
	return $walker;
}
add_filter( 'wp_edit_nav_menu_walker', 'zeen_walker_menu' );

function zeen_walker_menu_save( $menu_id, $menu_item_db_id, $menu_item_data ) {
	$default = 2;

	if ( 'taxonomy' == $menu_item_data['menu-item-type'] ) {
		$default = 11;
	}

	isset( $_POST['menu-item-zeen'][ $menu_item_db_id ]) ? update_post_meta( $menu_item_db_id, '_menu_zeen', (int) ( $_POST['menu-item-zeen'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen', $default );
	isset( $_POST['menu-item-zeen-show-title'][ $menu_item_db_id ] ) ? update_post_meta( $menu_item_db_id, '_menu_zeen_show_title', (int) ( $_POST['menu-item-zeen-show-title'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_show_title', 1 );
	isset( $_POST['menu-item-zeen-image-shape'][ $menu_item_db_id ] ) ? update_post_meta( $menu_item_db_id, '_menu_zeen_image_shape', (int) ( $_POST['menu-item-zeen-image-shape'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_image_shape', 1 );
	isset( $_POST['menu-item-zeen-show-subtitle'][ $menu_item_db_id ] ) ? update_post_meta( $menu_item_db_id, '_menu_zeen_show_subtitle', (int) ( $_POST['menu-item-zeen-show-subtitle'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_show_subtitle', 1 );
	isset( $_POST['menu-item-zeen-title-location'][ $menu_item_db_id ] ) ? update_post_meta( $menu_item_db_id, '_menu_zeen_title_location', (int) ( $_POST['menu-item-zeen-title-location'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_title_location', 1 );
	isset( $_POST['menu-item-zeen-background'][ $menu_item_db_id ] ) ? update_post_meta( $menu_item_db_id, '_menu_zeen_background', (int) ( $_POST['menu-item-zeen-background'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_background', '' );
	isset( $_POST['menu-item-zeen-quantity'][ $menu_item_db_id ] ) ? update_post_meta( $menu_item_db_id, '_menu_zeen_quantity', (int) ( $_POST['menu-item-zeen-quantity'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_quantity', 3 );
	isset( $_POST['menu-item-zeen-order'][ $menu_item_db_id ]) ? update_post_meta( $menu_item_db_id, '_menu_zeen_order', (int) ( $_POST['menu-item-zeen-order'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_order', 1 );
	isset( $_POST['menu-item-zeen-featured'][ $menu_item_db_id ]) ? update_post_meta( $menu_item_db_id, '_menu_zeen_featured', esc_attr( $_POST['menu-item-zeen-featured'][ $menu_item_db_id ] ) ) : update_post_meta( $menu_item_db_id, '_menu_zeen_featured', '' );

}
add_action( 'wp_update_nav_menu_item', 'zeen_walker_menu_save', 10, 3 );

function zeen_walker_menu_loader( $menu_item ) {
	$mm_load = get_post_meta( $menu_item->ID, '_menu_zeen', true );
	if ( empty( $mm_load ) ) {
		$mm_load = 2;
		if ( 'taxonomy' == $menu_item->type ) {
			$mm_load = 11;
		}
	}
	$menu_item->zeen_mm_load = $mm_load;
	$menu_item->zeen_mm_featured = get_post_meta( $menu_item->ID, '_menu_zeen_featured', true );
	$menu_item->zeen_mm_quantity = get_post_meta( $menu_item->ID, '_menu_zeen_quantity', true ) == '' ? 3 : get_post_meta( $menu_item->ID, '_menu_zeen_quantity', true );
	$menu_item->zeen_mm_show_title = get_post_meta( $menu_item->ID, '_menu_zeen_show_title', true ) == '' ? 1 : get_post_meta( $menu_item->ID, '_menu_zeen_show_title', true );
	$menu_item->zeen_mm_image_shape = get_post_meta( $menu_item->ID, '_menu_zeen_image_shape', true ) == '' ? 1 : get_post_meta( $menu_item->ID, '_menu_zeen_image_shape', true );
	$menu_item->zeen_mm_show_subtitle = get_post_meta( $menu_item->ID, '_menu_zeen_show_subtitle', true ) == '' ? 1 : get_post_meta( $menu_item->ID, '_menu_zeen_show_subtitle', true );
	$menu_item->zeen_mm_title_location = get_post_meta( $menu_item->ID, '_menu_zeen_title_location', true ) == '' ? 1 : get_post_meta( $menu_item->ID, '_menu_zeen_title_location', true );
	$menu_item->zeen_mm_background = get_post_meta( $menu_item->ID, '_menu_zeen_background', true ) == '' ? '' : get_post_meta( $menu_item->ID, '_menu_zeen_background', true );
	$menu_item->zeen_mm_order = get_post_meta( $menu_item->ID, '_menu_zeen_order', true ) == '' ? 1 : get_post_meta( $menu_item->ID, '_menu_zeen_order', true );
	return $menu_item;

}
add_filter( 'wp_setup_nav_menu_item', 'zeen_walker_menu_loader' );

function zeen_walker_menu_objects( $object, $args ) {
	$style = zeen_get_style();
	$main = ! empty( $args->theme_location ) && $style < 80 && ( 'main' == $args->theme_location || 'main_b' == $args->theme_location || 'secondary' == $args->theme_location ) ? true : false;
	foreach ( $object as $menu ) {
		$menu->classes[] = 'dropper';
		if ( 1 == $menu->zeen_mm_load || empty( $main ) ) {
			$menu->classes[] = 'standard-drop';
		} else {
			$menu->classes[] = 'drop-it';
		}
		if ( 0 == $menu->menu_item_parent && $menu->zeen_mm_load > 1 ) {
			$menu->classes[] = 'mm-art';
			$menu->classes[] = 'mm-wrap-' . $menu->zeen_mm_load;
			$menu->classes[] = 'mm-wrap';
			if ( $menu->zeen_mm_load < 50 && 2 != $menu->zeen_mm_load ) {
					$menu->classes[] = 'mm-color';
				if ( $menu->zeen_mm_load < 20 || $menu->zeen_mm_load > 30 ) {
					$menu->classes[] = 'mm-sb-left';
				} else {
					$menu->classes[] = 'mm-sb-top';
				}
			}
		}
	}
	return $object;
}
add_filter( 'wp_nav_menu_objects', 'zeen_walker_menu_objects', 10, 2 );
