<?php
/**
 * Buddypress
 *
 * @package Zeen
 * @since 1.0.0
 */

define( 'BP_AVATAR_THUMB_WIDTH', 230 );
define( 'BP_AVATAR_THUMB_HEIGHT', 230 );

function zeen_bp_active() {
	if ( class_exists( 'buddypress' ) ) {
		return true;
	} else {
		return false;
	}
}

function zeen_is_bp() {
	if ( zeen_bp_active() && ( is_buddypress() ) ) {
		return true;
	} else {
		return false;
	}
}

if ( ! function_exists( 'zeen_bp_userlink' ) ) :
	/**
	 * Userlink Cleanup
	 *
	 * @since 1.0.0
	 */
	function zeen_bp_userlink( $link = '', $user_id = '' ) {

		$url = bp_core_get_user_domain( $user_id );
		$display_name = bp_core_get_user_displayname( $user_id );
		return '<a href="' . esc_url( $url ) . '" class="bp-display-name">' . esc_attr( $display_name ) . '</a>';
	}
endif;
add_filter( 'bp_core_get_userlink', 'zeen_bp_userlink', 10, 2 );

function zeen_bp_member_pp( $loop ) {
	$loop['per_page'] = 12;
	return $loop;
}
add_filter( 'bp_after_has_members_parse_args', 'zeen_bp_member_pp' );
add_filter( 'bp_after_has_groups_parse_args', 'zeen_bp_member_pp' );

if ( ! function_exists( 'zeen_bp_add_breadcrumbs' ) ) :
	/**
	 * Remove breadcrumbs
	 *
	 * @since 1.0.0
	 */
	function zeen_bp_add_breadcrumbs() {
		if ( ! zeen_is_bp() ) {
			return;
		}
		global $bp, $post;
		$component = bp_current_component();
		$action = bp_current_action();
		$output = array();

		if ( $action != 'my-groups' && $component == 'groups' ) {
			$group = $bp->groups->current_group;

			if ( ! is_numeric( $group ) ) {
				$output = array(
					esc_html__( 'Groups', 'zeen' ) => bp_get_root_domain() . '/' . bp_get_groups_root_slug(),
					$group->name => bp_get_group_permalink( $group )
				);
			}
		}

		if ( $action == 'my-groups' || $action == 'public' || $component == 'activity' || $component == 'settings' || $component == 'forums' || $component == 'friends' ) {
			$output = array(
				esc_html__( 'Members', 'zeen' ) => bp_get_members_directory_permalink( $post->ID ),
				get_the_title( $post->ID ) => '',
			);
		}
		return $output;
	}
endif;
add_filter( 'zeen_breadcrumbs_extension', 'zeen_bp_add_breadcrumbs' );

if ( ! function_exists( 'zeen_bp_urls' ) ) :
	/**
	 * Get Urls
	 *
	 * @since 1.0.0
	 */
	function zeen_bp_urls() {
		global $bp;
		$output = array(
			'url' => '',
		);

		if ( function_exists( 'bp_loggedin_user_domain' ) ) {
			$output['url'] = bp_loggedin_user_domain();
		}

		if ( isset( $bp->profile->slug ) ) {
			$output['author_url'] = $output['url'] . $bp->profile->slug;
		}

		if ( function_exists( 'bp_get_groups_root_slug' ) ) {
			$output['u_group_url'] = $output['url'] . bp_get_groups_root_slug();
		}

		if ( function_exists( 'bp_get_messages_slug' ) ) {
			$output['u_msg_url'] = $output['url'] . bp_get_messages_slug();
		}

		if ( function_exists( 'bp_get_activity_slug' ) ) {
			$output['u_activity_url'] = $output['url'] . bp_get_activity_slug();
		}

		return $output;
	}
endif;

if ( ! function_exists( 'zeen_cover_image' ) ) :
	function zeen_cover_image( $settings = array() ) {

		if ( zeen_get_article_layout() < 50 ) {
			$settings['width']  = 770;
			$settings['height'] = 380;
		} else {
			$settings['width']  = 1170;
			$settings['height'] = 500;
		}

		return $settings;
	}
endif;
add_filter( 'bp_before_members_cover_image_settings_parse_args', 'zeen_cover_image', 10, 1 );
