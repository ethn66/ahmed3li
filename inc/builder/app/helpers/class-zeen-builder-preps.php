<?php
/**
 * Builder Preps
 *
 * @copyright Copyright Codetipi
 * @package Zeen
 * @since 1.0.0
 */

namespace TipiBuilder;

/**
 * Class holding prep methods
 */
class ZeenPreps {
	/**
	 * Data
	 *
	 * @since 1.0.0
	 */
	public static function zeen_data_pre_term() {

		$output = array();
		$output[] = array(
			'value' => 'posts',
			'label' => esc_attr__( 'Posts', 'zeen' ),
			'data' => ZeenGetters::zeen_get_posts(),
		);
		$output[] = array(
			'value' => 'pages',
			'label' => esc_attr__( 'Pages', 'zeen' ),
			'data' => ZeenGetters::zeen_get_pages(),
		);

		$tax = zeen_get_taxonomies( 'objects' );
		$tags = get_tags();
		if ( ! empty( $tags ) ) {
			$categories = get_categories();
			if ( ! empty( $categories ) ) {
				$output[] = array(
					'value' => 'catstags',
					'label' => esc_attr__( 'Category + Tag', 'zeen' ),
					'data' => '',
				);
			}
		}

		foreach ( $tax as $key => $value ) {

			$term_data = get_terms( array(
				'taxonomy' => $key,
			) );

			if ( ! empty( $term_data ) ) {
				$data = array();
				foreach ( $term_data as $term_data_key ) {
					$data[] = array(
						'value' => $term_data_key->term_id,
						'label' => $term_data_key->name . ' (' . $term_data_key->count . ')',
					);
				}
				$output[] = array(
					'value' => $key,
					'label' => $value->label,
					'data' => $data,
				);
			}
		}
		$cpts = zeen_get_post_types( array(
			'output' => 'objects',
			'builtin' => false,
			'shop' => true,
		) );
		if ( ! empty( $cpts ) ) {
			foreach ( $cpts as $cpt ) {
				$getter = ZeenGetters::zeen_get_posts(
					array(
						'post_type' => $cpt->name,
					)
				);
				if ( ! empty( $getter ) ) {
					$output[] = array(
						'value' => $cpt->name,
						'label' => $cpt->label,
						'data' => $getter,
					);
				}
			}
		}

		return $output;

	}


}
