<?php
/**
 * Block Masonry
 *
 * @package Zeen
 * @since 2.5.0
 */

class ZeenBlockMasonry extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'masonry';
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
		$image_ani = 1 == get_theme_mod( 'classic_img_ani_onoff', 1 ) ? get_theme_mod( 'classic_img_ani', 1 ) : '';
		$classes = '';
		$this->args['settings'] = array(
			'design_split' => get_theme_mod( 'classic_split_design', 1 ),
			'design_stack' => get_theme_mod( 'classic_stack_design', 1 ),
			'image_ani'    => $image_ani,
			'image_color_ani' => get_theme_mod( 'classic_img_effect', 1 ) == 1 ? '' : get_theme_mod( 'classic_img_effect', 1 ),
			'image_color_ani_hover' => get_theme_mod( 'classic_img_effect_hover', 1 ),
		);

		$p = $this->preview;
		$show_pagi = true;
		if ( empty( $this->args['excerpt_length'] ) ) {
			$this->args['excerpt_length'] = 20;
		}
		$i = 0;
		$n = 1;
		$t = 0;
		$qry = $this->qry();
		$args = $this->args;
		$args['qry'] = $qry;
		$args['masonry'] = true;

		$ppp = (int) $this->qry_args['posts_per_page'];
		$line_quantity = 2;
		$column_count = 2;
		$found = empty( $qry->found_posts ) ? 999 : $qry->found_posts;

		if ( 64 == $p ) {
			$line_quantity = 3;
			$column_count = 3;
		}
		$col_width = 2 == $column_count ? '6' : '4';

		if ( $line_quantity > $found ) {
			$line_quantity = $found;
		}
		if ( 24 == $p ) {
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'p' ),
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 's' ),
			);
			$mid = round( $ppp / 2 );
			$tile[ $mid ]['shape'] = 'p';
		} elseif ( 63 == $p ) {
			$tile = array(
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'p' ),
				array( 'width' => 50, 'shape' => 's' ),
				array( 'width' => 50, 'shape' => 'l' ),
				array( 'width' => 50, 'shape' => 's' ),
			);
		} elseif ( 64 == $p ) {

			$tile = array(
				array( 'width' => 33, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 'p' ),
				array( 'width' => 33, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 'l' ),
				array( 'width' => 33, 'shape' => 'p' ),
				array( 'width' => 33, 'shape' => 'l' ),
				array( 'width' => 33, 'shape' => 's' ),
				array( 'width' => 33, 'shape' => 'p' ),
			);
			if ( 12 == $ppp ) {
				$tile[6]['shape'] = 'p';
				$tile[7]['shape'] = 's';
			} elseif ( 9 == $ppp ) {
				$tile[3]['shape'] = 'p';
			} elseif ( 7 == $ppp || 8 == $ppp ) {
				$tile[1]['shape'] = 'l';
			} elseif ( 6 == $ppp ) {
				$tile[2]['shape'] = 'p';
				$tile[4]['shape'] = 's';
				$tile[5]['shape'] = 'p';
			}
		}

		if ( get_theme_mod( 'classic_rounded_corners' ) == 1 ) {
			$classes .= ' rounded-corners';
		}
		$count = 24 == $p || 63 == $p ? 3 : 4;
		$masonry_design = get_theme_mod( 'masonry_design', 1 );
		if ( $qry->have_posts() ) :
			if ( empty( $this->mnp ) ) {
				if ( ! empty( $qry->query['offset'] ) ) {
					$this->mnp = ceil( ( $qry->found_posts - $qry->query['offset'] ) / $qry->query['posts_per_page'] );
				} else {
					$this->mnp = $qry->max_num_pages;
				}
			}
			$this->found_posts = $qry->found_posts;
			$masonry_vertical = 1 == get_theme_mod( 'masonry_borders', 1 ) && ( 64 == $p || 66 == $p );
			if ( empty( $this->args['only_inner'] ) ) {
				if ( empty( $this->args['only_block'] ) ) {
					$classes .= ' block-masonry-style block-masonry-design-' . (int) $masonry_design . ' ';
					$classes .= 1 == $masonry_vertical ? ' block-masonry-with-v ' : ' block-masonry-no-v ';
					$classes .= ' block-masonry-wrap';
					$this->opening_wrap( array(
						'classes' => $classes,
					) );
					$this->block_title();
				}
				if ( apply_filters( 'zeen_archive_pagination_before', '' ) == true ) {
					if ( empty( $this->args['only_inner'] ) || ( ! empty( $this->args['pagination'] ) && $this->args['pagination'] > 1 && ! empty( $this->args['ajax'] ) && ! empty( $show_pagi ) ) ) {
						$this->pagi();
					}
				}

				echo '<div class="block block-' . (int) $p;
				$meta_loc = empty( $this->args['meta_location'] ) ? 0 : $this->args['meta_location'];
				if ( ! empty( $meta_loc ) ) {
					echo ' meta-overlay-base meta-overlay-' . (int) $meta_loc;
					if ( 3 == $meta_loc || 4 == $meta_loc ) {
						echo ' meta-overlay-excerpt';
					}
				}
				echo '">';
				echo '<div class="block-masonry block-masonry-' . (int) ( $count - 1 ) . ' tipi-flex">';
			}

			$rows = array_chunk( $qry->get_posts(), $column_count );
			if ( 1 == $masonry_vertical && empty( $this->args['ajax'] ) ) {
				for ( $x = 2; $x < $count; $x++ ) {
					echo '<span class="separation-border-v separation-border-v-' . (int) ( $x ) . ' separation-border-total-' . (int) ( $count ) . '"></span>';
				}
			}
			foreach ( range( 0, $column_count - 1 ) as $column ) {
			   echo '<div class="masonry__col tipi-xs-12 tipi-m-' . (int) $col_width . ' tipi-col masonry__col-' . (int) $n . '">';
				foreach ( $rows as $row ) {
					if ( false == isset( $row[ $column ] ) ) {
						continue;
					}
					$post = $row[ $column ];
					setup_postdata( $post );
					$this->id_coll( $post->ID );
					if ( empty( $tile[ $t ] ) ) {
						$t = 0;
					}
					$args['i'] = $i;
					$args['tile'] = $tile[ $t ];
					zeen_block( $post, $args );
					$t++;
					$i++;
				}
				$n++;
				echo '</div>';
				wp_reset_postdata();
			}

			if ( empty( $this->args['only_inner'] ) ) {
				echo '</div>';
				echo '</div>';
			}

			if ( empty( $this->args['only_inner'] ) ) {
				if ( empty( $this->args['only_block'] ) ) {
					$this->block_js();
					$this->load_more( 2 );
				}
			}
			if ( empty( $this->args['only_inner'] ) || ( ! empty( $this->args['pagination'] ) && $this->args['pagination'] > 1 && ! empty( $this->args['ajax'] ) && ! empty( $show_pagi ) ) ) {
				$this->pagi();
			}
			if ( empty( $this->args['only_inner'] ) || empty( $this->args['only_block'] ) ) {
				$this->closing_wrap();
			}
			wp_reset_postdata();
		endif;

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

	function output_with_sb( $echo = true, $args = array() ) {
		if ( $this->enabled() != true ) {
			return;
		}
		$p = $args['preview'];
		$show_sb = $p < 60;
		if ( ! empty( $show_sb ) ) {
			parent::$is_300 = true;
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

			echo '<div class="tipi-row content-bg block-300 clearfix' . esc_attr( $classes ) . '">';
			echo '<div class="tipi-cols clearfix sticky--wrap">';
			echo '<main class="main ';
			zeen_classes( array(
				'preview' => $p,
				'complete' => 'off',
			) );
			echo '">';
		}
		$this->output();
		if ( empty( $this->args['only_inner'] ) ) {
			echo '</main>';
			if ( $show_sb ) {
				get_template_part( 'sidebar', '', array(
					'sb' => empty( $this->args['sidebar'] ) ? 'sidebar-default' : $this->args['sidebar'],
				) );
			}
			echo '</div></div>';
		}

		parent::$is_300 = '';
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
