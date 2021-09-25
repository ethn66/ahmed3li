<?php
/**
 * BbPress
 *
 * @package Zeen
 * @since 1.0.0
 */

function zeen_bbp_active() {
	if ( class_exists( 'bbPress' ) ) {
		return true;
	} else {
		return false;
	}
}

function zeen_is_bbp() {
	if ( zeen_bbp_active() && ( is_bbpress() ) ) {
		return true;
	} else {
		return false;
	}
}

if ( zeen_bbp_active() ) :

	/**
	 * Title
	 *
	 * @since 1.0.0
	 */
	function zeen_bbp_title() {
		echo '<h1 class="title bbp-title bbp__thread__title">';
		the_title();
		echo '</h1>';
	}
	add_action( 'bbp_template_before_replies_loop', 'zeen_bbp_title', 10 );

	/**
	 * Topic
	 *
	 * @since 1.0.0
	 */
	function zeen_bbp_topic() {
		echo '<h1 class="title bbp-title bbp__topic__title">';
		the_title();
		echo '</h1>';
	}
	add_action( 'bbp_template_before_topics_loop', 'zeen_bbp_topic', 10 );
	/**
	 * Remove breadcrumbs
	 *
	 * @since 1.0.0
	 */
	function zeen_bbp_add_breadcrumbs() {
		$args['sep'] = zeen_breadcrumbs_sep( '' );
		$args['before'] = '<div class="breadcrumbs-wrap"><div class="breadcrumbs">';
		$args['after'] = '</div></div>';
		$args['current_before'] = '<div class="crumb">';
		$args['current_after'] = '</div>';
		$args['crumb_before'] = '<div class="crumb">';
		$args['crumb_after'] = '</div>';
		$args['sep_before'] = '';
		$args['sep_after'] = '';
		return $args;
	}
	add_filter( 'bbp_before_get_breadcrumb_parse_args', 'zeen_bbp_add_breadcrumbs' );

	/**
	 * Remove breadcrumbs
	 *
	 * @since 1.0.0
	 */
	function zeen_bbp_remove_breadcrumbs() {

		if ( get_theme_mod( 'breadcrumbs', 1 ) != 1 ) {
			return true;
		}

	}
	add_filter( 'bbp_no_breadcrumb', 'zeen_bbp_remove_breadcrumbs' );

	function zeen_cleanup_view() {
		return '';
	}
	add_filter( 'bbp_get_author_ip', 'zeen_cleanup_view' );

	/**
	 * Clean Up Lists
	 *
	 * @since 1.0.0
	 */
	function zeen_bbp_forum_list( $args ) {
		$args['separator'] = '';
		return $args;
	}
	add_filter( 'bbp_after_list_forums_parse_args', 'zeen_bbp_forum_list' );

	/**
	 * Clean Up Counts
	 *
	 * @since 1.0.0
	 */
	function zeen_remove_counts( $args ) {
		$args['show_reply_count'] = false;
		$args['count_sep'] = '';
		return $args;
	}
	add_filter( 'bbp_before_list_forums_parse_args', 'zeen_remove_counts' );
	function zeen_get_user_subscribe_link_html( $html = '', $r = '', $user_id = '', $object_id = '' ) {
		$html = str_replace( '&nbsp;|&nbsp;', '', $html );
		return $html;
	}
	add_filter( 'bbp_get_user_subscribe_link', 'zeen_get_user_subscribe_link_html', 10, 4 );

endif;

