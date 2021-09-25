<?php
/**
 * Zeen block grid
 *
 * @since 1.0.0
 */

class ZeenBlockGrid extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'grid';
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

		$i = 0;
		$j = 0;
		$qry = $this->qry();
		$args = $this->args;
		$args['qry'] = $qry;
		$args['preview'] = $this->args['preview'];
		$p = $args['preview'];

		$close_a = '';
		$close_b = '';
		$open_a = '';
		$open_b = '';
		$fclose_a = '';
		$fclose_b = '';
		$fopen_a = '';
		$fopen_b = '';
		$fdisabled = '';
		$limit = -1;
		$top_block = isset( $this->args['specific'] ) && 'top_block' == $this->args['specific'];
		$classes = get_theme_mod( 'grid_rounded_corners' ) == 1 && empty( $top_block ) ? ' rounded-corners' : '';
		$classes .= ' tile-design-wrap block-icon-base-' . get_theme_mod( 'icon_design', 1 );
		$tile = array(
			array(
				'width' => 33,
				'shape' => 's',
			),
		);
		if ( 'related' == $this->args['specific'] ) {
			$tile[0]['width'] = 25;
		}
		$img_shape = '';
		if (  ! empty( $this->args['img_shape'] ) && ( 81 == $p || 82 == $p || 83 == $p || 84 == $p ) ) {
			if ( 3 == $this->args['img_shape'] ) {
				$img_shape = 'p';
				$tile[0]['shape'] = 'p';
			} elseif ( 4 == $this->args['img_shape'] ) {
				$img_shape = 'p';
				$tile[0]['shape'] = 'lr';
			}
			$classes .= ' img__shape-' . $this->args['img_shape'];
		}

		if ( 91 == $p ) {
			$limit = 3;
			$tile = array(
				array( 'width' => 100, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 's' ),
			);
			$fdisabled = true;
		} elseif ( 92 == $p ) {
			$limit = 5;
			$open_a = 0;
			$open_b = 1;
			$close_a = 0;
			$close_b = 4;
			$fopen_a = 0;
			$fopen_b = 4;
			$fclose_a = 3;
			$fclose_b = 4;
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 25, 'shape' => 's' ),
				array( 'width' => 25, 'shape' => 's' ),
				array( 'width' => 25, 'shape' => 's' ),
				array( 'width' => 25, 'shape' => 's' ),
			);
		} elseif ( 93 == $p ) {
			$limit = 3;
			$open_a = 0;
			$open_b = 1;
			$close_a = 0;
			$close_b = 2;
			$fopen_a = 0;
			$fopen_b = 2;
			$fclose_a = 1;
			$fclose_b = 2;
			$tile = array(
				array( 'width' => 66, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 's' ),
			);

		} elseif ( 98 == $p ) {
			$limit = 3;
			$open_a = 0;
			$open_b = 1;
			$close_a = 0;
			$close_b = 2;
			$fopen_a = 0;
			$fopen_b = 2;
			$fclose_a = 1;
			$fclose_b = 2;
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 'l' ),
			);

		} elseif ( 94 == $p ) {
			$limit = 4;
			$open_a = 0;
			$open_b = 1;
			$close_a = 0;
			$close_b = 3;
			$fopen_a = 0;
			$fopen_b = 3;
			$fclose_a = 2;
			$fclose_b = 3;
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'h' ),
				array( 'width' => 25, 'shape' => 's' ),
				array( 'width' => 25, 'shape' => 's' ),
			);
		} elseif ( 95 == $p ) {
			$limit = 5;
			$open_a = 0;
			$open_b = 2;
			$close_a = 1;
			$close_b = 4;
			$tile = array(
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 33, 'shape' => 'l' ),
				array( 'width' => 33, 'shape' => 'l' ),
				array( 'width' => 33, 'shape' => 'l' ),
			);
			$fdisabled = true;
		} elseif ( 96 == $p ) {
			$limit = 4;
			$tile = array(
				array( 'width' => 100, 'shape' => 'l' ),
				array( 'width' => 33, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 's' ),
			);
			$fdisabled = true;
		} elseif ( 97 == $p ) {
			$limit = 4;
			$open_a = 0;
			$open_b = 2;
			$close_a = 1;
			$close_b = 3;
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 's' ),
			);
			$fdisabled = true;
		} elseif ( 86 == $p ) {
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 25, 'shape' => 'p' ),
				array( 'width' => 25, 'shape' => 'p' ),
			);
		} elseif ( 84 == $p ) {
			$tile = array(
				array( 'width' => 25, 'shape' => 's' ),
			);
			if ( ! empty( $img_shape ) ) {
				$tile[0]['shape'] = $img_shape;
			}
		} elseif ( 82 == $p ) {
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
			);
			if ( ! empty( $img_shape ) ) {
				$tile[0]['shape'] = $img_shape;
			}
			if ( 'related' == $this->args['specific'] ) {
				$tile[0]['width'] = 33;
			}
		} elseif ( 81 == $p ) {
			$tile = array(
				array( 'width' => 100, 'shape' => 'l' ),
			);
			if ( ! empty( parent::$is_110 ) ) {
				$tile[0]['width'] = parent::$is_110_size > 45 ? 75 : 33;
				$tile[0]['width'] = parent::$is_110_size == 66 ? 50 : $tile[0]['width'];
			}
			if ( ! empty( $img_shape ) ) {
				$tile[0]['shape'] = $img_shape;
			}
		}

		$final_close = false;
		$first_close = false;
		$flipped = ! empty( $this->args['flip'] ) && 'on' == $this->args['flip'] ? true : false;

		if ( $qry->have_posts() ) :
			if ( empty( $this->mnp ) ) {
				if ( ! empty( $qry->query['offset'] ) ) {
					$this->mnp = ceil( ( $qry->found_posts - $qry->query['offset'] ) / $qry->query['posts_per_page'] );
				} else {
					$this->mnp = $qry->max_num_pages;
				}
			}
			$this->found_posts = $qry->found_posts;
			if ( $this->found_posts == 1 && 'related' == $this->args['specific'] ) {
				$this->preview = $this->args['preview'] = 81;
				$classes = str_replace( 'img__shape-2', 'img__shape-1', $classes );
			}
			if ( empty( $this->args['only_inner'] ) && empty( $this->args['only_block'] ) ) {
				$this->opening_wrap( array(
					'classes' => $classes,
				) );
				if ( apply_filters( 'zeen_archive_pagination_before', '' ) == true ) {
					$this->pagi();
				}
				$this->block_title();
			}
			while ( $qry->have_posts() ) :
				$qry->the_post();

				if ( 0 == $i ) {
					$first_close = true;
					echo '<div class="block block-' . intval( $this->args['preview'] ) . ' tipi-flex ';
					if ( ! empty( $flipped ) ) {
						echo ' block-flipped';
					}
					echo '">';
				}

				if ( $i === $open_a ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-1 cf">';
				}
				if ( $i === $open_b ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-2 cf">';
				}

				global $post;
				$this->id_coll( $post->ID );
				$tile_arg = empty( $tile[ $i ] ) ? $tile[0] : $tile[ $i ];
				$args['i'] = $j;
				$args['tile'] = $tile_arg;

				zeen_block( $post, $args );

				if ( ( $close_a === $i || $close_b === $i ) ) {
					echo '</div>';
					$final_close = false;
				}

				$i++;
				$j++;
				if ( 6 == $j ) {
					$j = 0;
				}

				if ( $i === $limit ) {
					echo '</div>';
					$i = 0;
					if ( true == $final_close ) {
						echo '</div>';
					}
					$flipped = empty( $fdisabled ) ? ! $flipped : false;
					$final_close = false;
					$first_close = false;
				}
			endwhile;
			if ( empty( $this->args['only_inner'] ) ) {
				if ( true == $final_close ) {
					echo '</div>';
				}

				if ( true == $first_close ) {
					echo '</div>';
				}

				if ( empty( $this->args['only_block'] ) ) {
					$this->block_js();
					$this->load_more( 2 );
				}
				$this->pagi();
				if ( empty( $this->args['only_block'] ) ) {
					$this->closing_wrap();
				}
			}

			wp_reset_postdata();

		endif;

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

	function output_with_sb( $echo = true, $args = array() ) {
		$p = $args['preview'];
		if ( $this->enabled() != true ) {
			return;
		}
		$classes = '';
		$responsive = $this->responsive_check();
		if ( empty( $responsive['mobile'] ) ) {
			$classes .= ' mob-off';
		}

		if ( empty( $responsive['desktop'] ) ) {
			$classes .= ' dt-off';
		}

		if ( empty( $echo ) ) {
			ob_start();
		}
		if ( empty( $this->args['only_inner'] ) ) {
			echo '<div class="content-bg block-300 clearfix block-300-grid';
			if ( empty( $this->args['is_fs'] ) ) {
				echo ' tipi-row';
			}
			echo esc_attr( $classes );
			echo '">';
			echo '<main class="main ';
			zeen_classes( array(
				'preview' => $p,
				'complete' => 'off',
			) );
			echo '">';
		}
		$this->output();
		if ( empty( $this->args['only_inner'] ) ) {
			echo '</main><!-- .site-main -->';
			echo '</div>';
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}


}
