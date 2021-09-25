<?php
/**
 * Block Hoverer
 *
 * @package Zeen
 * @since 3.0.0
 */

class ZeenBlockHoverer extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'hoverer';
		parent::__construct( $args );
	}

	/**
	 * Block output
	 *
	 * @since 3.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( $this->enabled() != true ) {
			return;
		}

		if ( empty( $echo ) ) {
			ob_start();
		}

		$i = 1;
		$qry = $this->qry();
		$p = $this->args['preview'];
		$args = $this->args;
		$args['qry'] = $qry;
		$opening_class = get_theme_mod( 'grid_rounded_corners' ) == 1 ? ' rounded-corners' : '';
		$classes = 'preview-hoverer__wrap tipi-flex tipi-flex-hc preview-hoverer-74 md-12-ext block';
		$img_shape = '';
		if (  ! empty( $this->args['img_shape'] ) ) {
			$classes .= ' img__shape-' . $this->args['img_shape'];
		}
		$args['tile'] = array(
			'width' => 75,
			'shape' => 'l',
		);
		$parallax = isset( $this->args['parallax'] ) && 'on' == $this->args['parallax'] ? true : '';
		if ( ! empty( $parallax ) ) {
			$opening_class .= ' parallax parallax-min';
		}
		if ( parent::$is_110 && empty( parent::$is_110_1 ) ) {
			$args['tile'] = array(
				'width' => 50,
				'shape' => 'l',
			);
			$opening_class .= ' parallax-tight';
		}
		if ( $qry->have_posts() ) :
			$opening_class .= ' ppp-' . $qry->post_count;
			if ( empty( $this->mnp ) ) {
				if ( ! empty( $qry->query['offset'] ) ) {
					$this->mnp = ceil( ( $qry->found_posts - $qry->query['offset'] ) / $qry->query['posts_per_page'] );
				} else {
					$this->mnp = $qry->max_num_pages;
				}
			}
			if ( empty( $this->args['only_inner'] ) ) {
				$this->opening_wrap( array( 'classes' => $opening_class ) );
				$this->block_title();
			}
			echo '<div class="' . esc_attr( $classes ) . '">';
			$output = array();
			while ( $qry->have_posts() ) :
				$qry->the_post();
				global $post;
				$this->id_coll( $post->ID );
				$args['i'] = $i;
				$ind_args = $args;
				$ind_args['post'] = $post;
				$ind_args['pid'] = $post->ID;
				$ind_args['is_110'] = parent::$is_110 && empty( parent::$is_110_1 );
				$output[ $post->ID ] = $ind_args;
				$i++;
			endwhile;

			echo '<div class="mask__wrap">';
			foreach ( $output as $key => $value ) {
				$mask_value = $value;
				$mask_value['output_override'] = 'mask';
				zeen_block( $value['post'], $mask_value );
			}
			echo '</div>';

			echo '<div class="meta__wrap tipi-flex">';
			foreach ( $output as $key => $value ) {
				$meta_value = $value;
				$meta_value['output_override'] = 'meta';
				zeen_block( $value['post'], $meta_value );
			}
			echo '</div>';
			echo '</div>';
			if ( empty( $this->args['only_inner'] ) ) {
				$this->closing_wrap();
			}

			wp_reset_postdata();

		endif;

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
