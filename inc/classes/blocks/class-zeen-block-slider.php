<?php
/**
 * Zeen block slider
 *
 * @since 1.0.0
 */

class ZeenBlockSlider extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'slider';
		$this->slider = array(
			'fade' => 0,
			'direction' => 0,
			'ppp' => 1,
		);

		if ( 52 == $args['preview'] ) {
			$this->slider['ppp'] = 2;
		} elseif ( 53 == $args['preview'] ) {
			$this->slider['ppp'] = 3;
		} elseif ( 54 == $args['preview'] ) {
			$this->slider['ppp'] = 4;
		}

		parent::__construct( $args );
	}

	/**
	 * Block output
	 *
	 * @since 1.0.0
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
		$effect = empty( $args['effect'] ) ? 0 : $args['effect'];
		$layout = empty( $args['layout'] ) ? 0 : $args['layout'];
		$parllax_vertical = empty( $args['parllax_vertical'] ) ? 'on' : $args['parllax_vertical'];
		$classes = 'on' == $parllax_vertical && ( 0 != $effect || 51 == $p ) ? ' parallax parallax-min' : '';
		$arrows = 2;
		$opening_class = 56 == $p ? '' : 'tile-design-wrap tile-design-wrap-' . get_theme_mod( 'slider_tile_design', 1 );
		$opening_class .= get_theme_mod( 'slider_rounded_corners' ) == 1 ? ' rounded-corners' : '';
		if ( ! empty( $this->args['img_shape'] ) ) {
			if ( 3 == $this->args['img_shape'] ) {
				$tile[0]['shape'] = 'p';
			} elseif ( 4 == $this->args['img_shape'] ) {
				$tile[0]['shape'] = 'lr';
			}
			$classes .= ' img__shape-' . $this->args['img_shape'];
		}

		if ( 51 == $p ) {
			$args['tile'] = array( 'width' => 75, 'shape' => 'l' );
			$arrows = 1;
		} elseif ( 52 == $p ) {
			$args['tile'] = array( 'width' => 33, 'shape' => 'l' );
			if ( empty( parent::$is_110 ) && empty( parent::$is_300 ) ) {
				$args['tile']['width'] = 50;
			}
			if ( 'related' == $this->args['specific'] ) {
				$args['tile']['width'] = 33;
				$args['tile']['icon_size'] = 's';
			}
		} elseif ( 53 == $p ) {
			$args['tile'] = array( 'width' => 33, 'shape' => 's' );
			if ( 'related' == $this->args['specific'] ) {
				$args['tile']['width'] = 25;
				$args['tile']['icon_size'] = 's';
			}
		} elseif ( 54 == $p ) {
			$args['tile'] = array( 'width' => 33, 'shape' => 's' );
		} elseif ( 55 == $p ) {
			$args['tile'] = array( 'width' => 25, 'shape' => 'l' );
		} elseif ( 56 == $p ) {
			$layout = empty( $args['layout'] ) ? 1 : (int) $args['layout'];
			$arrows = 1 === $layout ? 'off' : 4;
			$args['tile'] = array( 'width' => 33, 'shape' => 'l' );
			$columns = (int) $args['columns'];
			$args['typo'] = 'tipi-s-typo';
			if ( 2 === $columns ) {
				$args['tile']['width'] = 50;
			} elseif ( 4 === $columns ) {
				$args['tile']['width'] = 25;
			} elseif ( 1 === $columns ) {
				$args['tile']['width'] = 75;
			}
			$opening_class .= ' slider-columns--' . $columns;
		}

		if ( $qry->have_posts() ) :

			if ( empty( $this->mnp ) ) {
				if ( ! empty( $qry->query['offset'] ) ) {
					$this->mnp = ceil( ( $qry->found_posts - $qry->query['offset'] ) / $qry->query['posts_per_page'] );
				} else {
					$this->mnp = $qry->max_num_pages;
				}
			}
			$this->found_posts = $qry->found_posts;
			if ( empty( $this->args['only_inner'] ) ) {
				$this->opening_wrap( array( 'classes' => $opening_class ) );
				$this->block_title();
			}
			echo '<div class="slider slider-art tipi-spin clearfix' . esc_attr( $classes ) . '" data-ppp="' . (int) $this->slider['ppp'] . '" data-layout="' . (int) $layout . '" data-dir="' . (int) $this->slider['direction'] . '" data-s="' . (int) $p . '" data-effect="' . esc_attr( $effect ) . '">';

			while ( $qry->have_posts() ) :
				$qry->the_post();
				global $post;
				$this->id_coll( $post->ID );
				$args['i'] = $i;
				zeen_block( $post, $args );
				$i++;
			endwhile;
			if ( 2 != $effect && 'off' != $arrows ) {
				zeen_slider_arrows( $arrows );
			}
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
