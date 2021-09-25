<?php
/**
 * Zeen Getters
 *
 * @copyright Codetipi
 * @since 1.0.0
*/
namespace TipiBuilder;
class ZeenGetters {

	/**
	 *  Posts
	 *
	 * @since 1.0.0
	 */
	public static function zeen_get_posts( $args = array() ) {
		$args['args'] = empty( $args['args'] ) ? array( 'fields' => 'ids', 'numberposts' => 2000, 'post_status' => array( 'publish', 'private' ) ) : $args['args'];
		if ( ! empty( $args['post_type'] ) ) {
			$args['args']['post_type'] = $args['post_type'];
		}
		$args['title'] = empty( $args['title'] ) ? 'on' : 'off';

		$posts = get_posts( $args['args'] );

		if ( 'on' == $args['title'] ) {
			$output = array();
			foreach ( $posts as $key ) {
				$output[] = array(
					'label' => get_the_title( $key ),
					'value' => $key,
				);
			}
		} else {
			$output = $posts;
		}

		return $output;

	}

	/**
	 *  Pages
	 *
	 * @since 1.0.0
	 */
	public static function zeen_get_pages( $title = true ) {

		$args['title'] = empty( $args['title'] ) ? false : true;

		$pages = get_all_page_ids();

		if ( ! empty( $title ) ) {
			$output = array();

			foreach ( $pages as $key ) {
				if ( get_post_status( $key ) == 'publish' ) {
					$output[] = array(
						'label' => get_the_title( $key ),
						'value' => $key,
					);
				}
			}
		} else {
			$output = $pages;
		}

		return $output;

	}

	/**
	 *  Pages
	 *
	 * @since 1.0.0
	 */
	public static function zeen_get_taxonomies_with_extras() {

		$posts = new \stdClass();
		$posts->name = 'posts';
		$posts->label = esc_attr__( 'Posts', 'zeen' );
		$posts->data = self::zeen_get_posts();

		$pages = new \stdClass();
		$pages->name = 'pages';
		$pages->label = esc_attr__( 'Pages', 'zeen' );
		$pages->data = self::zeen_get_pages();

		$output = array(
			'posts' => $posts,
			'pages' => $pages,
		);

		$cpts = zeen_get_post_types( array(
			'builtin' => false,
			'output' => 'objects',
			'shop' => true,
		) );

		if ( ! empty( $cpts ) ) {
			foreach ( $cpts as $cpt ) {
				$getter = self::zeen_get_posts(
					array(
						'post_type' => $cpt->name,
					)
				);
				if ( ! empty( $getter ) ) {
					$output[ $cpt->name ] = new \stdClass();
					$output[ $cpt->name ]->name = $cpt->name;
					$output[ $cpt->name ]->label = $cpt->label;
					$output[ $cpt->name ]->data = $getter;
				}
			}
		}

		return $output;

	}

}
