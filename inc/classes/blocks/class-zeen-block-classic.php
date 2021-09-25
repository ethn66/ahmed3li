<?php
/**
 * Block Classic
 *
 * @package Zeen
 * @since 1.0.0
 */

class ZeenBlockClassic extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'classic';
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
		$classes                = '';
		$this->args['settings'] = array(
			'design_split'          => get_theme_mod( 'classic_split_design', 1 ),
			'design_stack'          => get_theme_mod( 'classic_stack_design', 1 ),
			'image_ani'             => get_theme_mod( 'classic_img_ani_onoff', 1 ),
			'image_color_ani'       => get_theme_mod( 'classic_img_effect', 1 ) == 1 ? '' : get_theme_mod( 'classic_img_effect', 1 ),
			'image_color_ani_hover' => get_theme_mod( 'classic_img_effect_hover', 1 ),
		);

		$p          = $this->preview;
		$is_masonry = 24 == $p || 63 == $p || 64 == $p ? true : false;
		$show_pagi  = ! empty( $is_masonry ) || 65 == $p ? true : '';
		if ( empty( $this->args['excerpt_length'] ) ) {
			if ( 68 == $p ) {
				$this->args['excerpt_length'] = 50;
			} elseif ( 5 == $p ) {
				$this->args['excerpt_length'] = 35;
			} else {
				$this->args['excerpt_length'] = 20;
			}
		}
		$i               = 0;
		$t               = 0;
		$qry             = $this->qry();
		$args            = $this->args;
		$args['qry']     = $qry;
		$args['masonry'] = $is_masonry;

		$close_a  = '';
		$close_b  = '';
		$close_c  = '';
		$open_a   = '';
		$open_b   = '';
		$open_c   = '';
		$fclose_a = '';
		$fclose_b = '';
		$fopen_a  = '';
		$fopen_b  = '';
		$class_a  = '';
		$class_b  = '';
		$class_c  = '';
		$limit    = -1;
		$ppp      = (int) $this->qry_args['posts_per_page'];
		$tile     = array(
			array(
				'width' => 33,
				'shape' => 'l',
			),
		);
		$per_row  = 1;
		$found    = empty( $qry->found_posts ) ? 999 : $qry->found_posts;
		if ( $found == 1 && 'related' == $this->args['specific'] ) {
			$p = $this->args['preview'] == 22 ? 22 : 1;
		}
		if ( 21 == $p || 63 == $p || 67 == $p ) {
			$per_row = 2;
		}

		if ( 22 == $p || 26 == $p || 27 == $p || 61 == $p || 62 == $p || 65 == $p ) {
			$per_row = 3;
		}

		if ( 25 == $p || 28 == $p || 29 == $p || 71 == $p || 72 == $p ) {
			$per_row = 4;
		}

		if ( 79 == $p ) {
			$per_row = 5;
		}

		if ( $found == 2 && 'related' == $this->args['specific'] && ( $this->args['preview'] == 22 || $this->args['preview'] == 25 ) ) {
			$per_row                     = 2;
			$this->args['posts_per_row'] = 2;
		}

		if ( ! empty( $this->args['posts_per_row'] ) ) {
			$per_row = $this->args['posts_per_row'];
		}

		if ( ( empty( $this->args['archive'] ) || ( ! empty( $this->args['archive'] ) && isset( $this->args['fs'] ) && 'on' == $this->args['fs'] ) ) && empty( parent::$is_110 ) && empty( self::$is_300 ) && empty( $this->args['is100'] ) && 'mm' != $this->args['specific'] && $per_row < 3 ) {
			$tile[0]['width'] = 50;
		}
		if ( ( get_theme_mod( 'main_menu_width', 3 ) == 2 && 'mm' == $this->args['specific'] ) || ( get_theme_mod( 'secondary_menu_width', 1 ) == 2 && ! empty( $this->args['ndp_skip'] ) && 'mm' == $this->args['specific'] ) ) {
			$tile[0]['width'] = 50;
		}

		if ( 1 == $p ) {
			$tile = array(
				array(
					'width' => 50,
					'shape' => 'l',
				),
			);
			if ( parent::$is_110_size <= 100 ) {
				$tile[0]['width'] = 33;
			}
			if ( parent::$is_110_size <= 66 ) {
				$tile[0]['width'] = 25;
			}
			if ( 'off' == $this->args['desktop'] || ZeenMobile::is_mobile() ) {
				$tile[0]['width'] = 10;
			}
		} elseif ( 2 == $p ) {
			$tile = array(
				array(
					'width' => 75,
					'shape' => 'l',
				),
			);
			if ( parent::$is_110_size < 46 ) {
				$tile[0]['width'] = 33;
			} elseif ( parent::$is_110_size < 100 ) {
				$tile[0]['width'] = 50;
			}
			if ( 'widget' == $this->args['specific'] ) {
				$tile[0]['width'] = 33;
			}
			if ( ZeenMobile::is_mobile() ) {
				$tile[0]['width'] = 33;
			}
		} elseif ( 3 == $p ) {
			$tile = array(
				array(
					'width' => 50,
					'shape' => 's',
				),
			);
			if ( parent::$is_110_size <= 100 ) {
				$tile[0]['width'] = 33;
			} elseif ( parent::$is_110_size <= 66 || 'off' == $this->args['desktop'] || ZeenMobile::is_mobile() ) {
				$tile[0]['width'] = 25;
			}
		} elseif ( 22 == $p || 23 == $p || 25 == $p ) {
			$shape = 's';
			if ( ! empty( $this->args['shape_override'] ) ) {
				$shape = $this->args['shape_override'];
			}
			$tile = array(
				array(
					'width' => 10,
					'shape' => $shape,
				),
			);
		} elseif ( 24 == $p ) {
			$tile = array(
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 's',
				),

			);
		} elseif ( 26 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 'l',
				),
			);
		} elseif ( 27 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 's',
				),
			);
		} elseif ( 28 == $p ) {

			$tile = array(
				array(
					'width' => 25,
					'shape' => 'l',
				),
			);
		} elseif ( 29 == $p ) {
			$tile = array(
				array(
					'width' => 25,
					'shape' => 's',
				),
			);
		} elseif ( 41 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
			);
		} elseif ( 42 == $p ) {
			$tile = array(
				array(
					'width' => 25,
					'shape' => 'l',
				),
				array(
					'width' => 25,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
			);
		} elseif ( 43 == $p ) {
			$tile          = array(
				array(
					'width' => 10,
					'shape' => 's',
				),
			);
			$tile_override = array(
				'position' => 0,
				'override' => array(
					'shape' => 'l',
					'width' => 66,
				),
			);
		} elseif ( 44 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
			);
		} elseif ( 63 == $p ) {
			$tile = array(
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 's',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 50,
					'shape' => 's',
				),
			);
		} elseif ( 64 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 33,
					'shape' => 's',
				),
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width' => 33,
					'shape' => 's',
				),
				array(
					'width' => 33,
					'shape' => 'l',
				),
				array(
					'width'    => 33,
					'shape'    => 's',
					'unheight' => true,
				),
			);
		} elseif ( 65 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 's',
				),
				array(
					'width' => 33,
					'shape' => 'p',
				),
				array(
					'width' => 33,
					'shape' => 's',
				),
				array(
					'width' => 33,
					'shape' => 'p',
				),
				array(
					'width' => 33,
					'shape' => 'p',
				),
				array(
					'width' => 33,
					'shape' => 's',
				),
			);

		} elseif ( 67 == $p ) {
			$tile     = array(
				array(
					'width' => 33,
					'shape' => 'l',
				),
			);
			$classes .= ' classic-title-overlay';
		} elseif ( 68 == $p ) {
			$tile = array(
				array(
					'width' => 75,
					'shape' => 'l',
				),
			);
		} elseif ( 69 == $p ) {
			$tile     = array(
				array(
					'width' => 75,
					'shape' => 'l',
				),
				array(
					'width'     => 25,
					'shape'     => 'l',
					'icon_size' => 's',
				),
				array(
					'width'     => 25,
					'shape'     => 'l',
					'icon_size' => 's',
				),
				array(
					'width'     => 25,
					'shape'     => 'l',
					'icon_size' => 's',
				),
				array(
					'width'     => 25,
					'shape'     => 'l',
					'icon_size' => 's',
				),
				array(
					'width'     => 25,
					'shape'     => 'l',
					'icon_size' => 's',
				),
			);
			$classes .= ' classic-title-overlay';
			$open_a   = 0;
			$close_a  = 0;
			$class_b  = 'zeen-review-s';
			if ( ! empty( $this->args['is_fs'] ) ) {
				$class_b .= ' tipi-row';
			}
			$open_b  = 1;
			$close_b = $ppp;
		} elseif ( 62 == $p ) {
			$tile = array(
				array(
					'width' => 33,
					'shape' => 'p',
				),
			);
		} elseif ( 66 == $p ) {
			$middle_66 = (int) floor( $ppp / 2 );
			$open_a    = 0;
			$close_a   = 0;
			$open_b    = 1;
			$close_b   = $middle_66;
			$open_c    = $middle_66 + 1;
			$close_c   = $ppp;
			$class_a   = 'tipi-m-6 tipi-col';
			$class_b   = 'tipi-m-3 tipi-col tipi-col-a';
			$class_c   = 'tipi-m-3 tipi-col tipi-col-z';
			if ( ! empty( $this->args['wide_column_position'] ) ) {
				$classes .= ' wide--column-' . $this->args['wide_column_position'];
			}
			$tile      = array();
			$order_one = array(
				array( 'shape' => 's' ),
				array(
					'shape'    => 's',
					'unheight' => true,
				),
				array( 'shape' => 'l' ),
				array( 'shape' => 's' ),
				array( 'shape' => 'l' ),
			);
			$order_two = array(
				array(
					'shape'    => 's',
					'unheight' => true,
				),
				array( 'shape' => 's' ),
				array(
					'shape'    => 's',
					'unheight' => true,
				),
				array( 'shape' => 'l' ),
				array( 'shape' => 's' ),
			);
			$x         = 0;
			$tile[]    = array(
				'width'          => 50,
				'shape'          => 's',
				'excerpt_length' => (int) ( $args['excerpt_length'] * 3 ),
			);
			for ( $n = 0; $n < $middle_66; $n++ ) {
				if ( empty( $order_one[ $x ]['shape'] ) ) {
					$x = 0;
				}
				$unheight = empty( $order_one[ $x ]['unheight'] ) ? '' : true;
				$tile[]   = array(
					'width'    => 25,
					'shape'    => $order_one[ $x ]['shape'],
					'unheight' => $unheight,
				);
				$x++;
			}
			$x = 0;
			for ( $n = 0; $n < $middle_66; $n++ ) {
				if ( empty( $order_two[ $x ]['shape'] ) ) {
					$x = 0;
				}
				$unheight = empty( $order_two[ $x ]['unheight'] ) ? '' : true;
				$tile[]   = array(
					'width'    => 25,
					'shape'    => $order_two[ $x ]['shape'],
					'unheight' => $unheight,
				);
				$x++;
			}
		} elseif ( 78 == $p ) {
			$open_a  = 0;
			$close_a = 0;
			$open_b  = 1;
			$close_b = 2;
			$open_c  = 3;
			$close_c = 5;
			$class_b = 'tipi-m-3 tipi-col tipi-col-a';
			$class_a = 'tipi-m-6 tipi-col';
			$class_c = 'tipi-m-3 tipi-col tipi-col-z';
			if ( ! empty( $this->args['wide_column_position'] ) ) {
				$classes .= ' wide--column-' . $this->args['wide_column_position'];
			}
			$tile = array(
				array(
					'width' => 50,
					'shape' => 'l',
				),
				array(
					'width' => 25,
					'shape' => 'l',
				),
				array(
					'width' => 25,
					'shape' => 'l',
				),
				array(
					'width' => 25,
					'shape' => 'l',
				),
				array(
					'width' => 25,
					'shape' => 'l',
				),
			);
		} elseif ( 72 == $p ) {
			$tile = array(
				array(
					'width' => 25,
					'shape' => 's',
				),
			);
		} elseif ( 75 == $p || 76 == $p ) {

			$tile = array(
				array(
					'width' => 10,
					'shape' => 's',
				),
			);

			$tile_override = array(
				'position' => 0,
				'override' => array(
					'shape'     => 'l',
					'width'     => 33,
					'pf_center' => true,
					'icon_size' => 's',
				),
			);
			$classes      .= ' classic-title-overlay mm-ppp-' . ( $ppp - 1 );
			$open_a        = 0;
			$open_b        = 1;
			$close_a       = 0;
			if ( 76 == $p ) {
				$class_a = 'tipi-m-5 tipi-col tipi-col-a';
				$class_b = 'tipi-m-7 tipi-col tipi-col-z block-ppl-2 tipi-flex tipi-flex-wrap';
			} else {
				$class_a = 'tipi-m-6 tipi-col tipi-col-a';
				$class_b = 'tipi-m-6 tipi-col tipi-col-z';
			}
		} elseif ( 79 == $p || 71 == $p ) {
			$tile = array(
				array(
					'width' => 25,
					'shape' => 'l',
				),
			);
		}

		if ( ! empty( $args['meta_overlay'] ) ) {
			$classes .= ' tile-design tile-design-4';
		}
		$top_block = isset( $this->args['specific'] ) && 'top_block' == $this->args['specific'];
		if ( get_theme_mod( 'classic_rounded_corners' ) == 1 && empty( $top_block ) ) {
			$classes .= ' rounded-corners';
		}

		$final_close = false;

		if ( 42 == $p ) {
			$flex = true;
		}

		if ( ! empty( $this->args['is_thumbnail'] ) ) {
			$this->args['block_ani'] = true;
			$this->excerpt_off       = true;
			$classes                .= ' block-wrap-thumbnail';
		}
		if ( ! empty( $this->args['flip'] ) && 'on' == $this->args['flip'] ) {
			$classes .= ' flipped';
		}
		if ( ! empty( $this->args['mobile_design'] ) ) {
			if ( 1 === (int) $this->args['mobile_design'] ) {
				$classes .= ' mobile__design--side';
				$classes .= ' split-design-' . get_theme_mod( 'classic_split_design', 1 );
			} elseif ( 2 === (int) $this->args['mobile_design'] ) {
				$classes .= ' ppl-xs-2';
			}
		}

		$masonry_style_class = ! empty( $is_masonry ) || 66 == $p ? ' block-masonry-style ' : '';
		$count               = 24 == $p || 63 == $p ? 3 : 4;
		$masonry_design      = get_theme_mod( 'masonry_design', 1 );
		if ( $qry->have_posts() ) :

			if ( empty( $this->mnp ) ) {
				if ( ! empty( $qry->query['offset'] ) ) {
					$this->mnp = ceil( ( $qry->found_posts - $qry->query['offset'] ) / $qry->query['posts_per_page'] );
				} else {
					$this->mnp = $qry->max_num_pages;
				}
			}
			$this->found_posts = $qry->found_posts;
			$masonry_vertical  = 1 == get_theme_mod( 'masonry_borders', 1 ) && ( 64 == $p || 66 == $p );
			if ( empty( $this->args['only_inner'] ) ) {
				if ( ! empty( $masonry_style_class ) ) {
					if ( 1 == $masonry_vertical ) {
						$masonry_style_class .= ' block-masonry-with-v ';
					} else {
						$masonry_style_class .= ' block-masonry-no-v ';
					}
					$masonry_style_class .= ' block-masonry-design-' . (int) $masonry_design . ' ';
				}
				if ( empty( $this->args['only_block'] ) ) {

					$classes .= $masonry_style_class;

					if ( ! empty( $is_masonry ) ) {
						$classes .= ' block-masonry-wrap';
					} elseif ( ! empty( $this->args['is_thumbnail'] ) && 'widget' != $this->args['specific'] ) {
						if ( ! empty( $this->args['posts_per_row'] ) && 1 == $this->args['posts_per_row'] ) {
							$classes .= ' ppl-m-1';
						} else {
							$classes .= ' ppl-s-2';
						}
						if ( 22 == $p ) {
							if ( ! empty( $this->args['posts_per_row'] ) ) {
								$classes .= ' ppl-l-' . (int) $this->args['posts_per_row'];
							} else {
								$classes .= ' ppl-l-3';
							}
						} else {
							if ( ( empty( $this->args['posts_per_row'] ) || ( ! empty( $this->args['posts_per_row'] ) && $this->args['posts_per_row'] > 1 ) ) && ( ( empty( parent::$is_300 ) && empty( parent::$is_110 ) && empty( parent::$is_110_1 ) && empty( $this->args['max_col_2'] ) ) || ! empty( parent::$is_110_1 ) ) ) {
								if ( $found > 3 ) {
									$classes .= ' ppl-l-4';
								} elseif ( 2 == $found ) {
									$classes .= ' ppl-l-2';
								} else {
									$classes .= ' ppl-l-3';
								}
							}
						}
					} elseif ( $per_row > 1 ) {
						$classes .= ' ppl-m-' . (int) $per_row;
						if ( 3 == $per_row ) {
							$classes .= ' ppl-s-3';
						} else {
							$classes .= ' ppl-s-2';
						}
					}

					$this->opening_wrap(
						array(
							'classes' => $classes,
						)
					);
					if ( 25 == $p ) {
						$this->block_tiny_title();
					} else {
						$this->block_title();
					}
				}
				if ( apply_filters( 'zeen_archive_pagination_before', '' ) == true ) {
					if ( empty( $this->args['only_inner'] ) || ( ! empty( $this->args['pagination'] ) && $this->args['pagination'] > 1 && ! empty( $this->args['ajax'] ) && ! empty( $show_pagi ) ) ) {
						$this->pagi();
					}
				}

				// Clearfix needed for correct dimensions calculation menus
				echo '<div class="block block-' . (int) $p;
				if ( empty( $is_masonry ) && ( $per_row > 1 || ! empty( $flex ) ) ) {
					echo ' tipi-flex';
				} else {
					echo ' clearfix';
				}
				if ( apply_filters( 'zeen_review_bar_some_blocks', true ) && empty( $args['meta_overlay'] ) && ( 1 == $p || 61 == $p || 79 == $p || 21 == $p || ! empty( $is_masonry ) ) ) {
					echo ' preview-review-bot';
				}

				$meta_loc = empty( $this->args['meta_location'] ) ? 0 : $this->args['meta_location'];
				if ( ! empty( $meta_loc ) ) {
					echo ' meta-overlay-base meta-overlay-' . (int) $meta_loc;
					if ( 3 == $meta_loc || 4 == $meta_loc ) {
						echo ' meta-overlay-excerpt';
					}
				}
				echo '">';

				if ( ! empty( $is_masonry ) ) {
					echo '<div class="block-masonry block-masonry-' . (int) ( $count - 1 ) . '">';
				}
			}
			if ( 1 == $masonry_vertical && ! empty( $masonry_style_class ) && empty( $this->args['ajax'] ) ) {
				for ( $n = 2; $n < $count; $n++ ) {
					echo '<span class="separation-border-v separation-border-v-' . (int) ( $n ) . ' separation-border-total-' . (int) ( $count ) . '"></span>';
				}
			}
			while ( $qry->have_posts() ) :
				$qry->the_post();

				if ( $i === $open_a ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-1 clearfix ' . esc_attr( $class_a ) . '">';
				}
				if ( $i === $open_b ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-2 clearfix ' . esc_attr( $class_b ) . '">';
				}

				if ( $i === $open_c ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-3 clearfix ' . esc_attr( $class_c ) . '">';
				}

				global $post;
				$this->id_coll( $post->ID );

				if ( empty( $tile[ $t ] ) ) {
					$t = 0;
				}

				if ( ! empty( $tile_override ) && $tile_override['position'] === $i ) {
					$tile_arg = $tile_override['override'];
				} else {
					$tile_arg = $tile[ $t ];
				}

				$args['i']    = $i;
				$args['tile'] = $tile_arg;
				zeen_block( $post, $args );

				if ( $close_a === $i || $close_b === $i || $close_c === $i ) {

					echo '</div>';
					$final_close = false;
				}

				$i++;
				$t++;

				if ( $i === $limit ) {
					echo '</div>';
					$i = 0;
					if ( true == $final_close ) {
						echo '</div>';
					}
					$final_close = false;
				}
			endwhile;
			if ( empty( $this->args['only_inner'] ) ) {

				if ( true == $final_close ) {
					echo '</div>';
				}

				echo '</div>';

				if ( ! empty( $is_masonry ) ) {
					echo '</div>';
				}
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
		$p       = $args['preview'];
		$show_sb = $p < 60;
		if ( ! empty( $show_sb ) ) {
			parent::$is_300 = true;
		}
		$classes    = '';
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
			zeen_classes(
				array(
					'preview'  => $p,
					'complete' => 'off',
				)
			);
			echo '">';
		}
		$this->output();
		if ( empty( $this->args['only_inner'] ) ) {
			echo '</main>';
			if ( $show_sb ) {
				$sb = empty( $this->args['sidebar'] ) ? 'sidebar-default' : $this->args['sidebar'];
				$sb = 2 == $sb ? 'builder-' . $this->args['uid'] : $sb;
				get_template_part(
					'sidebar',
					'',
					array(
						'sb' => $sb,
					)
				);
			}
			echo '</div></div>';
		}

		parent::$is_300 = '';
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
