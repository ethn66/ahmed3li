<?php
/**
 * Previews
 *
 * @package Zeen
 * @since 1.0.0
 */
abstract class ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {
		if ( empty( $post ) ) {
			global $post;
		}
		$this->post        = $post;
		$this->i           = $i;
		$this->pid         = $post->ID;
		$this->post_format = get_post_format( $this->pid );
		$this->md          = '';
		if ( ! empty( $this->post_format ) ) {
			if ( 'thumbnail' == $this->type || 'video' == $this->type ) {
				$this->md = 1;
			} else {
				$this->md = get_theme_mod( 'video_background_global' ) == 1 ? 12 : zeen_get_media_design( $this->pid, $this->post_format );
			}
		}
		$this->options  = $options;
		$this->specific = isset( $options['specific'] ) ? $options['specific'] : '';
		$options_arr    = array( 'category', 'comments', 'classes', 'img_or_css', 'preview', 'post_subtitle', 'share', 'meta_design', 'mask_link', 'tile', 'settings' );

		foreach ( $options_arr as $key ) {
			if ( ! isset( $this->options[ $key ] ) ) {
				if ( 'classes' == $key ) {
					$this->options[ $key ] = array();
				} else {
					$this->options[ $key ] = '';
				}
			}
		}
		$found = empty( $this->options['qry']->found_posts ) ? 999 : $this->options['qry']->found_posts;
		if ( 1 == $found && 'related' == $this->options['specific'] ) {
			if ( 'grid' == $this->type ) {
				$this->options['preview']   = 81;
				$this->options['img_shape'] = 'l';
				if ( ! empty( $this->options['tile']['width'] ) ) {
					$this->options['tile']['shape'] = 'l';
					if ( get_theme_mod( 'single_related_posts_location', 1 ) == 2 ) {
						$this->options['tile']['width'] = '75';
					} else {
						$this->options['tile']['width'] = '50';
					}
				}
			} elseif ( 'classic' == $this->type ) {
				$this->options['preview'] = 1;
			}
		}
		$this->options['meta_classes']         = empty( $this->options['meta_classes'] ) ? 'meta' : 'meta ' . $this->options['meta_classes'];
		$this->options['classes']['structure'] = 'tipi-xs-12';
		$this->options['mask_link']            = empty( $this->options['mask_link'] ) ? true : '';
		$this->counter                         = ! isset( $this->options['counter'] ) ? '' : $this->options['counter'];
		if ( 'grid' == $this->type ) {
			if ( ! empty( $this->options['tile'] ) ) {
				switch ( $this->options['tile']['width'] ) {
					case 25:
						$this->options['classes']['structure'] = 'tipi-m-3 tipi-xs-6';
						break;
					case 33:
						$this->options['classes']['structure'] = 'tipi-m-4 tipi-xs-12';
						break;
					case 50:
						$this->options['classes']['structure'] = 'tipi-m-6 tipi-xs-12';
						break;
					case 66:
						$this->options['classes']['structure'] = 'tipi-m-8 tipi-xs-12';
						break;
					case 75:
						$this->options['classes']['structure'] = 'tipi-m-10 tipi-xs-12';
						break;
					default:
						$this->options['classes']['structure'] = 'tipi-m-12 tipi-xs-12';
						break;
				}
			}
		}

		if ( 'grid' == $this->type ) {
			$this->options['classes']['elements-location'] = 'elements-location-' . (int) ( get_theme_mod( 'grid_meta_location', 1 ) );
		} elseif ( 'classic' == $this->type ) {
			$this->options['classes']['elements-location'] = 'elements-location-' . (int) ( get_theme_mod( 'classic_meta_location', 1 ) );
		}

		$this->options['classes'][] = 'clearfix';
		$tid                        = get_post_meta( $this->pid, '_thumbnail_id', true );
		if ( empty( $tid ) || ( ( 'classic' == $this->type || 'thumbnail' == $this->type ) && ! empty( $this->options['fi_off'] ) ) ) {
			$this->options['classes'][] = 'no-fi';
		} else {
			$this->options['classes'][] = 'with-fi';
		}

		if ( empty( $this->options['settings'] ) ) {
			$this->options['settings'] = array(
				'design_split' => 1,
				'design_stack' => 1,
				'image_ani'    => 1,
				'meta_ani'     => 1,
			);
		}

		if ( ! empty( $this->post_format ) && 'gallery' != $this->post_format && 46 != $this->options['preview'] ) {
			$md = zeen_get_media_design( $this->pid, $this->post_format );
			if ( 12 == $md || get_theme_mod( 'video_background_global' ) == 1 ) {
				$this->options['classes'][] = 'md-12-ext';
			}
		}

		$this->options['classes'][] = 'ani-base';
		if ( 'mm' != $this->specific ) {
			if ( 'classic' == $this->type ) {
				if ( get_theme_mod( 'classic_post_ani_onoff', 1 ) == 1 && empty( $this->options['tile']['ani_off'] ) ) {
					$this->options['classes'][] = 'article-ani';
					$this->options['classes'][] = 'article-ani-' . get_theme_mod( 'classic_post_ani', 1 );
				}
			}
		}
		if ( ( 'grid' != $this->type && 'slider' != $this->type ) || 56 == $this->options['preview'] ) {
			$secondary = zeen_secondary_img( $this->pid, '', true );
			if ( ! empty( $secondary ) ) {
				$this->options['classes'][] = 'with-second-img';
			}
		}
		$this->thumbnail_params();

	}

	public function is_mobile() {
		if ( ZeenMobile::is_mobile() || 'off' == $this->options['desktop'] ) {
			return true;
		}
	}

	public function thumbnail_params() {
		$p          = $this->options['preview'];
		$block_type = $this->type;

		if ( ! empty( $this->options['img_shape'] ) ) {
			switch ( $this->options['img_shape'] ) {
				case 2:
					$this->options['tile']['shape'] = 's';
					$this->options['classes'][]     = 'shape-s';
					break;
				case 3:
					$this->options['tile']['shape'] = 'p';
					$this->options['classes'][]     = 'shape-p';
					break;
				case 4:
					$this->options['tile']['shape']    = 'un';
					$this->options['tile']['unheight'] = true;
					$this->options['width']            = 293;
					break;
				default:
					$this->options['tile']['shape'] = 'l';
					break;
			}
		}

		if ( ! empty( $this->options['tile'] ) ) {
			$fs = ! empty( $this->options['is_fs'] ) && empty( $this->options['is_boxed_content'] );
			if ( 100 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-xl-typo';
				if ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 1500;
					$this->options['height'] = 750;
					if ( $this->is_mobile() ) {
						$this->options['width']  = 370;
						$this->options['height'] = 247;
					}
					if ( 'related' == $this->options['specific'] ) {
						if ( get_theme_mod( 'single_related_posts_location', 1 ) == 2 ) {
							$this->options['width']  = 1170;
							$this->options['height'] = 585;
						} else {
							$this->options['width']  = 770;
							$this->options['height'] = 513;
						}
					}
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 900;
					$this->options['height'] = 900;
					if ( $this->is_mobile() ) {
						$this->options['width']  = 390;
						$this->options['height'] = 390;
					}
				} elseif ( 'p' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 770;
					$this->options['height'] = 1020;
				} elseif ( 'un' == $this->options['tile']['shape'] ) {
					$this->options['width'] = 1400;
				}
			} elseif ( 75 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-l-typo';
				if ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 1170;
					$this->options['height'] = 585;
					if ( ! empty( $fs ) ) {
						$this->options['width']  = 1500;
						$this->options['height'] = 750;
					}
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 900;
					$this->options['height'] = 900;
					if ( $this->is_mobile() ) {
						$this->options['width']  = 390;
						$this->options['height'] = 390;
					}
				} elseif ( 'p' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 770;
					$this->options['height'] = 1020;
				} elseif ( 'un' == $this->options['tile']['shape'] ) {
					$this->options['width'] = 770;
				}
			} elseif ( 66 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-l-typo';
				if ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 770;
					$this->options['height'] = 513;
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 900;
					$this->options['height'] = 900;
					if ( $this->is_mobile() ) {
						$this->options['width']  = 390;
						$this->options['height'] = 390;
					}
				} elseif ( 'un' == $this->options['tile']['shape'] ) {
					$this->options['width'] = 770;
				}
			} elseif ( 50 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-m-typo';
				if ( 'h' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 585;
					$this->options['height'] = 293;
				} elseif ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 770;
					$this->options['height'] = 513;
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 585;
					$this->options['height'] = 585;
					if ( ! empty( $fs ) ) {
						$this->options['width']  = 900;
						$this->options['height'] = 900;
					}
				} elseif ( 'p' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 370;
					$this->options['height'] = 490;
				}
			} elseif ( 33 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-s-typo';
				if ( 'h' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 585;
					$this->options['height'] = 293;
				} elseif ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 370;
					$this->options['height'] = 247;
					if ( ZeenMobile::mobile_thumbnails() && $this->is_mobile() ) {
						$this->options['width']  = 120;
						$this->options['height'] = 80;
					}
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 390;
					$this->options['height'] = 390;
					if ( ! empty( $fs ) ) {
						$this->options['width']  = 585;
						$this->options['height'] = 585;
					}
				} elseif ( 'p' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 370;
					$this->options['height'] = 490;
				}
			} elseif ( 25 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-s-typo';
				if ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 370;
					$this->options['height'] = 247;
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 293;
					$this->options['height'] = 293;
					if ( ! empty( $fs ) && 'grid' == $this->type ) {
						$this->options['width']  = 390;
						$this->options['height'] = 390;
					}
				} elseif ( 'p' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 370;
					$this->options['height'] = 490;
				}
			} elseif ( 10 == $this->options['tile']['width'] ) {
				$this->options['classes']['typo'] = 'tipi-xs-typo';
				$this->options['width']           = 100;
				$this->options['height']          = 100;
				if ( 'l' == $this->options['tile']['shape'] && ZeenMobile::mobile_thumbnails() ) {
					$this->options['width']  = 120;
					$this->options['height'] = 80;
				}
			} elseif ( 5 == $this->options['tile']['width'] ) {
				if ( 'l' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 30;
					$this->options['height'] = 20;
				} elseif ( 's' == $this->options['tile']['shape'] ) {
					$this->options['width']  = 30;
					$this->options['height'] = 30;
				}
			}
			if ( ! empty( $fs ) ) {
				if ( 'tipi-s-typo' == $this->options['classes']['typo'] && 'slider' != $block_type ) {
					$this->options['classes']['typo'] = 'tipi-m-typo';
				} elseif ( 'tipi-m-typo' == $this->options['classes']['typo'] ) {
					$this->options['classes']['typo'] = 'tipi-l-typo';
				}
			}
			if ( 'hoverer' == $block_type ) {
				$ppp                              = isset( $this->options['qry']->query['posts_per_page'] ) ? $this->options['qry']->query['posts_per_page'] : 3;
				$this->options['classes']['typo'] = $ppp > 2 ? 'tipi-s-typo' : 'tipi-m-typo';
				$this->options['classes']['typo'] = empty( $this->options['is_110'] ) ? $this->options['classes']['typo'] : 'tipi-s-typo';
				if ( ! empty( $fs ) ) {
					$this->options['classes']['typo'] = $ppp > 3 ? 'tipi-s-typo' : 'tipi-m-typo';
				}
			}

			if ( ! empty( $this->options['tile']['unheight'] ) ) {
				$this->options['height'] = 'full';
			}
		}
		if ( 1 == $p ) {
			$this->options['classes']['typo'] = 'tipi-s-typo';
		}
		if ( 3 == $p ) {
			$this->options['classes']['typo'] = 'tipi-l-typo';
		}
		if ( 24 == $p || 64 == $p ) {
			$this->options['classes']['typo'] = 'tipi-s-typo';
			$this->options['classes'][]       = 'masonry-child';
		} elseif ( 65 == $p ) {
			if ( 0 == $this->i % 2 ) {
				$this->options['classes'][] = 'odd';
			} else {
				$this->options['classes'][] = 'even';
			}
		} elseif ( 62 == $p || 63 == $p || 5 == $p || 97 == $p ) {
			$this->options['classes']['typo'] = 'tipi-m-typo';
		} elseif ( 79 == $p ) {
			$this->options['classes']['typo'] = 'tipi-xs-typo';
		}
		$split = ( 1 == $p || 3 == $p || 22 == $p || 23 == $p || 25 == $p || ! empty( $this->options['split'] ) ) ? true : false;

		if ( 62 != $p && ( 'classic' == $block_type || 'thumbnail' == $block_type || 56 == $p ) ) {
			if ( true == $split ) {
				$this->options['classes'][] = 'split-1';
				$this->options['classes'][] = 'split-design-' . $this->options['settings']['design_split'];
			} else {
				$this->options['classes'][] = 'stack-1';
				$this->options['classes'][] = 'stack-design-' . $this->options['settings']['design_stack'];
			}
		}

		if ( 62 == $p || 63 == $p ) {
			$this->options['classes'][] = 'tile-design tile-design-4 preview-grid grid-image-1';
		}

		if ( 'classic' == $block_type && empty( $this->options['separator_off'] ) ) {
			if ( 'mm' != $this->specific ) {
				$this->options['classes'][] = 'separation-border';
			}

			if ( 41 == $p || 61 == $p || 21 == $p || 2 == $p || 1 == $p ) {
				$this->options['classes'][] = 'separation-border-style';
			}
		}

		if ( empty( $this->options['width'] ) ) {
			$this->options['width'] = 370;
		}
		if ( empty( $this->options['height'] ) ) {
			$this->options['height'] = 247;
		}

		if ( ! empty( $this->options['typo'] ) ) {
			$this->options['classes']['typo'] = $this->options['typo'];
		}
	}

	public function subtitle() {
		if ( 'off' == $this->options['post_subtitle'] ) {
			return;
		}
		return zeen_subtitle( $this->pid );
	}

	public function review_box() {
		zeen_review_box(
			array(
				'pid'        => $this->pid,
				'block_type' => $this->type,
			)
		);
	}

	public function mask( $args = array() ) {
		if ( ( 'classic' == $this->type || 'thumbnail' == $this->type ) && ! empty( $this->options['fi_off'] ) ) {
			return;
		}
		$type     = empty( $args['img_or_css'] ) ? $this->options['img_or_css'] : $args['img_or_css'];
		$overlay  = empty( $args['overlay'] ) ? '' : $args['overlay'];
		$thumb_id = get_post_meta( $this->pid, '_thumbnail_id', true );
		$lazy_off = empty( $this->options['lazy_off'] ) ? '' : true;
		if ( empty( $thumb_id ) ) {
			return;
		}
		if ( 'css' == $type ) {
			$color     = ! isset( $args['color'] ) ? zeen_post_color( $this->pid ) : $args['color'];
			$width     = empty( $args['width'] ) ? $this->options['width'] : $args['width'];
			$height    = empty( $args['height'] ) ? $this->options['height'] : $args['height'];
			$mask_link = empty( $args['mask_link'] ) ? $this->options['mask_link'] : $args['mask_link'];
			if ( empty( $args['review_off'] ) && empty( $this->options['review_off'] ) ) {
				$this->review_box();
			}
			zeen_featured_img(
				$this->pid,
				array(
					'width'      => $width,
					'height'     => $height,
					'link'       => $mask_link,
					'img_or_css' => 'css',
					'color'      => $color,
					'lazy_off'   => $lazy_off,
					'specific'   => $this->specific,
				)
			);
			return;
		}
		$secondary = ( 56 != $this->options['preview'] && 'slider' == $this->type ) || 'grid' == $this->type || 'video' == $this->type ? 'off' : '';
		$fi_args   = array(
			'width'      => $this->options['width'],
			'height'     => $this->options['height'],
			'link'       => $this->options['mask_link'],
			'img_or_css' => 'img',
			'secondary'  => $secondary,
			'lazy_off'   => $lazy_off,
			'specific'   => $this->specific,
		);
		if ( 'classic' == $this->type ) {
			$fi_args['pinable'] = true;
		}
		echo '<div class="mask';
		if ( 'product' == $this->post->post_type ) {
			echo ' images';
		}
		if ( ! empty( $args['data'] ) ) {
			if ( 1 == $this->i ) {
				echo ' selected';
			}
			echo '" data-i="' . (int) $this->i;
		}
		echo '">';
		$this->byline(
			array(
				'location' => 1,
			)
		);
		if ( empty( $args['review_off'] ) && empty( $this->options['review_off'] ) ) {
			$this->review_box();
		}
		$this->counter();
		zeen_featured_img( $this->pid, $fi_args );
		if ( 'grid' == $this->type && 'gallery' != $this->post_format && 'mm' != $this->specific ) {
			if ( get_theme_mod( 'grid_tile_design', 1 ) != 4 || 12 == $this->md ) {
				$this->post_format();
			}
		} elseif ( 'slider' == $this->type && 'gallery' != $this->post_format && 'mm' != $this->specific ) {
			if ( get_theme_mod( 'slider_tile_design', 1 ) != 4 || 12 == $this->md || 56 == $this->options['preview'] ) {
				$this->post_format();
			}
		} elseif ( ! ( 'grid' == $this->type || 'slider' == $this->type && 'gallery' == $this->post_format ) && empty( $this->options['tile']['pf_center'] ) && ( 62 != $this->options['preview'] && 63 != $this->options['preview'] || 12 == $this->md ) ) {
			$this->post_format();
		}

		if ( 44 == $this->options['preview'] || 63 == $this->options['preview'] || ! empty( $overlay ) ) {
			echo '<a href="' . esc_url( get_permalink( $this->pid ) ) . '" class="mask-overlay" aria-label="' . esc_attr( the_title_attribute( array( 'echo' => '' ) ) ) . '"></a>';
		}

		if ( 'product' == $this->post->post_type ) {
			zeen_woo_badges();
			zeen_woo_before_shop_loop_item(
				array(
					'wrap_off' => true,
				)
			);
		}

		echo '</div>';
		do_action( 'zeen_block_post_image_after', $this->pid );
	}

	public function read_more() {
		if ( 'grid' == $this->type ) {
			if ( get_theme_mod( 'grid_read_more' ) == 1 ) {
				echo zeen_get_read_more(
					$this->pid,
					array(
						'location' => 'grid',
					)
				);
			}
		} elseif ( 'slider' == $this->type ) {
			if ( get_theme_mod( 'slider_read_more' ) == 1 ) {
				echo zeen_get_read_more(
					$this->pid,
					array(
						'location' => 'slider',
					)
				);
			}
		}
	}

	public function post_format( $args = array() ) {
		$post_format = $this->post_format;
		if ( empty( $post_format ) || ! empty( $this->options['pf_off'] ) ) {
			return;
		}

		$pf_classes = empty( $this->options['tile']['pf_classes'] ) ? '' : $this->options['tile']['pf_classes'];
		$icon_size  = empty( $this->options['tile']['icon_size'] ) ? 'm' : $this->options['tile']['icon_size'];
		$icon_size  = empty( $this->options['tile']['icon_size'] ) && get_theme_mod( 'icon_design', 1 ) == 3 ? 's' : $icon_size;

		$js_id = empty( $this->options['tile']['js_id'] ) ? '' : $this->options['tile']['js_id'];
		if ( 'thumbnail' == $this->type ) {
			$icon_size = 'xs';
		} elseif ( 29 == $this->options['preview'] || 28 == $this->options['preview'] || 79 == $this->options['preview'] || 71 == $this->options['preview'] || 67 == $this->options['preview'] ) {
			$icon_size = 's';
		} elseif ( empty( $this->options['is_fs'] ) && ( 54 == $this->options['preview'] || 53 == $this->options['preview'] ) ) {
			$icon_size = 's';
		}

		$media_design = empty( $this->options['tile']['media_design'] ) ? 1 : $this->options['tile']['media_design'];
		if ( 'gallery' != $post_format ) {
			$media_design = 12 == $this->md ? 12 : $media_design;
			$dt           = ! empty( $this->options['desktop'] ) && $this->is_mobile() ? '' : true;
			$media_design = empty( $dt ) && 12 == $media_design ? 1 : $media_design;
			zeen_post_format_data(
				$this->pid,
				array(
					'media_design' => $media_design,
					'post_format'  => $post_format,
					'preview'      => true,
					'classes'      => $pf_classes,
					'icon_size'    => $icon_size,
					'js_id'        => $js_id,
					'preview_type' => $this->type,
					'trigger_on'   => 'video' == $this->type,
					'hoverer'      => 'hoverer' == $this->type && $this->i > 1,
				)
			);
		} else {
			zeen_gallery_icon(
				array(
					'pid'       => $this->pid,
					'icon_size' => $icon_size,
				)
			);
		}
	}

	public function byline( $args = array() ) {
		if ( ! empty( $this->options['byline_off'] ) || 'product' == $this->post->post_type ) {
			return;
		}

		$args['type'] = $this->type;
		if ( 'grid' == $this->type ) {
			$args['cat_design']        = get_theme_mod( 'grid_cat_design', 1 );
			$args['base_design']       = get_theme_mod( 'grid_tile_design', 1 );
			$args['elements_location'] = get_theme_mod( 'grid_meta_location', 1 );
			$args['elements_design']   = get_theme_mod( 'grid_meta_design', 1 );
		} elseif ( 'slider' == $this->type ) {
			$args['cat_design']        = get_theme_mod( 'slider_cat_design', 1 );
			$args['base_design']       = get_theme_mod( 'slider_tile_design', 1 );
			$args['elements_location'] = get_theme_mod( 'slider_meta_location', 1 );
			$args['elements_design']   = get_theme_mod( 'slider_meta_design', 1 );
		} elseif ( 'classic' == $this->type || 'thumbnail' == $this->type ) {
			$args['base_design']       = get_theme_mod( 'classic_base_design', 1 );
			$args['elements_location'] = get_theme_mod( 'classic_meta_location', 1 );
			$args['cat_design']        = get_theme_mod( 'classic_cat_design', 1 );
			$args['elements_design']   = get_theme_mod( 'classic_meta_design', 1 );
			$args['type']              = 'classic';
		}

		$args = zeen_byline_args_check( $args );

		if ( ! empty( $args ) ) {
			zeen_byline( $this->pid, $args );
		}

	}

	public function excerpt( $limit = 12, $read_more = true ) {

		if ( 62 == $this->options['preview'] || 63 == $this->options['preview'] ) {
			return;
		}

		if ( ! empty( $this->options['excerpt_full'] ) && ( 'on' == $this->options['excerpt_full'] || 1 === $this->options['excerpt_full'] ) ) {
			echo '<div class="meta__full entry-content">';
			the_content();
			echo '</div>';
			return;
		}
		if ( ! empty( $this->options['excerpt_off'] ) || ( ! isset( $this->options['excerpt_off'] ) && 'classic' == $this->type && get_theme_mod( 'classic_excerpt', 1 ) != 1 ) ) {
			return;
		} else {
			$limit = empty( $this->options['excerpt_length'] ) ? $limit : $this->options['excerpt_length'];
			zeen_excerpt( $this->post, $limit, $read_more );
		}
	}

	public function titles( $args = array() ) {
		$titles_args     = array_merge(
			$args,
			array(
				'pid'  => $this->pid,
				'type' => $this->type,
			)
		);
		$titles_disabled = apply_filters( 'zeen_blocks_titles_disabled', false, $titles_args );
		if ( ! empty( $titles_disabled ) ) {
			return;
		}
		$subtitle = ! empty( $args['post_subtitle'] ) && 'off' == $args['post_subtitle'] ? '' : true;
		if ( 'classic' == $this->type && get_theme_mod( 'classic_subtitle' ) != 1 ) {
			$subtitle = '';
		}
		echo '<div class="title-wrap">';
		echo '<';
		if ( 'inline-post' == $this->specific ) {
			echo esc_attr( apply_filters( 'zeen_inline_post_title_markup', 'h3' ) );
		} elseif ( 'mm' != $this->specific ) {
			echo esc_attr( apply_filters( 'zeen_block_post_title_markup', 'h3' ) );
		} else {
			echo esc_attr( apply_filters( 'zeen_megamenu_block_post_title_markup', 'h3' ) );
		}
		echo ' class="title"><a href="' . esc_url( get_permalink( $this->pid ) ) . '">';
		echo get_the_title( $this->pid );
		echo '</a></';
		if ( 'inline-post' == $this->specific ) {
			echo esc_attr( apply_filters( 'zeen_inline_post_title_markup', 'h3' ) );
		} elseif ( 'mm' != $this->specific ) {
			echo esc_attr( apply_filters( 'zeen_block_post_title_markup', 'h3' ) );
		} else {
			echo esc_attr( apply_filters( 'zeen_megamenu_block_post_title_markup', 'h3' ) );
		}
		echo '>';
		if ( ! empty( $subtitle ) ) {
			$this->subtitle();
		}

		if ( ( 'slider' == $this->type || 'grid' == $this->type ) && 'gallery' == $this->post_format && empty( $this->options['pf_off'] ) ) {
			zeen_gallery_icon( array( 'pid' => $this->pid ) );
		} else {
			if ( 12 != $this->md && 56 != $this->options['preview'] && ( ( 'grid' == $this->type && get_theme_mod( 'grid_tile_design', 1 ) == 4 ) || ( 'slider' == $this->type && get_theme_mod( 'slider_tile_design', 1 ) == 4 ) || ! empty( $this->options['tile']['pf_center'] ) || 62 == $this->options['preview'] || 63 == $this->options['preview'] ) ) {
				$this->post_format();
			}
		}

		if ( ! empty( $args['duration'] ) ) {
			$this->duration();
		}

		if ( 'product' == $this->post->post_type ) {
			if ( function_exists( 'woocommerce_template_single_price' ) ) {
				woocommerce_template_single_price();
			}
			if ( 'classic' == $this->type || 56 == $this->options['preview'] && get_theme_mod( 'woo_tipi_blocks_reviews', 1 ) == 1 ) {
				zeen_woo_archive_rating_html();
			}
			if ( get_theme_mod( 'woo_tipi_blocks_variations', 1 ) == 1 ) {
				add_filter( 'woocommerce_gallery_image_size', array( $this, 'zeen_woocommerce_gallery_image_size' ) );
				zeen_woo_archive_variations();
				remove_filter( 'woocommerce_gallery_image_size', array( $this, 'zeen_woocommerce_gallery_image_size' ) );
			}
		}
		echo '</div>';
	}

	public function share( $on_off = 1 ) {

		if ( 'off' == $this->options['share'] || 1 != $on_off ) {
			return;
		}
		zeen_share( $this->pid );
	}

	public function duration() {
		zeen_media_duration( $this->pid );
	}

	public function counter() {
		if ( empty( $this->counter ) ) {
			return;
		}

		echo '<div class="counter counter-' . (int) ( $this->i + 1 );
		echo ' font-' . (int) get_theme_mod( 'typo_main_menu', 3 );
		if ( ! empty( $this->options['counter_class'] ) ) {
			echo ' trending-accent-' . esc_attr( $this->options['counter_class'] );
		}
		echo '"></div>';
	}

	public function zeen_woocommerce_gallery_image_size() {
		return array(
			$this->options['width'],
			$this->options['height'],
		);
	}

}
