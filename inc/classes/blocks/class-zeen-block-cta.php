<?php
/**
 * Zeen block CTA
 *
 * @since 1.0.0
 */

class ZeenBlockCTA extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'cta';
		parent::__construct( $args );
	}
	/**
	 * Media Callback
	 *
	 * @since 1.0.0
	 *
	*/
	function zeen_media_url_cb( $matches ) {
		$url = zeen_media_url( '', array( 'url' => $matches[1], 'source' => 1 ) );
		return 'href="' . $url . '" data-src="' . $url . '"';
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

		$buttons = array();
		if ( ! empty( $this->args['button_check'] ) && 'on' == $this->args['button_check'] ) {
			$buttons[] = $this->args['button_text'];
		} else {
			$buttons[] = '';
 		}
		if ( ! empty( $this->args['button_check_2'] ) && 'on' == $this->args['button_check_2'] ) {
			$buttons[] = $this->args['button_text_2'];
		}
		if ( empty( $echo ) ) {
			ob_start();
		}
		$parallax = ! empty( $this->args['parallax'] ) && 'on' == $this->args['parallax'] ? true : false;
		$img_bg = empty( $this->args['img_bg_id'] ) ? '' : $this->args['img_bg_id'];
		$png = zeen_is_png( wp_get_attachment_image_src( $img_bg ) );
		$opening_classes = ! empty( $png ) ? 'is-png' : '';
		if ( ! empty( $parallax ) ) {
			$opening_classes .= ' parallax';
		} else {
			$animation = ! empty( $this->args['animation_type'] ) ? $this->args['animation_type'] : '';
			if ( ! empty( $animation ) ) {
				$opening_classes .= ' ani-on-load ani-on-load-' . ( (int) $animation - 1 );
			}
		}
		$video_bg = ! empty( $this->args['video_bg'] ) && 'on' == $this->args['video_bg'] ? true : false;
		$divider_bottom = 'on' == $this->args['divider_bottom_onoff'] && isset( $this->args['divider_bottom'] ) ? $this->args['divider_bottom'] : '';
		$divider_top = 'on' == $this->args['divider_top_onoff'] && isset( $this->args['divider_top'] ) ? $this->args['divider_top'] : '';
		$video_url = empty( $this->args['video_url'] ) ? '' : $this->args['video_url'];

		$open_args = array( 'classes' => $opening_classes );
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap( $open_args );
			echo '<div class="mask mask__wrap';
			if ( empty( $video_bg ) && ! wp_attachment_is_image( $img_bg ) ) {
				echo ' mask-no-img';
			}
			if ( ! empty( $video_bg ) ) {
				echo ' video-wrap';
			}
			if ( 3 == $divider_bottom || 3 == $divider_top ) {
				echo ' splitter--fade';
				if ( 3 == $divider_bottom ) {
					echo ' splitter--fade--bottom';
				}
				if ( 3 == $divider_top ) {
					echo ' splitter--fade--top';
				}
			}
			echo '">';
			echo '<span class="mask-overlay"></span>';
		}

		if ( empty( $video_bg ) ) {
			if ( ! empty( $img_bg ) ) {
				echo '<span class="mask-img';
				if ( get_theme_mod( 'lazy', 1 ) != 1 || is_admin() || is_feed() || is_preview() || ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) ) {
					echo ' zeen-lazy-loaded-wrap';
				}
				echo '">';
				add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_with_images_loaded' );
				echo wp_get_attachment_image( $img_bg, 'full' );
				remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off_with_images_loaded' );
				echo '</span>';
			}
		} else {
			if ( strpos( $video_url, 'yout' ) !== false ) {
				preg_match( '([-\w]{11})', $video_url, $matches );
				if ( ! empty( $matches ) ) {
					$video_url = add_query_arg( array(
						'autoplay' => 1,
						'mute' => 1,
						'rel' => 0,
						'controls' => 0,
						'loop' => 1,
						'showinfo' => 0,
						'iv_load_policy' => 3,
						'fs' => 0,
						'playlist' => $matches[0],
						'modestbranding' => 1,
					), 'https://www.youtube-nocookie.com/embed/' . $matches[0] );
				}
			} elseif ( strpos( $video_url, 'vim' ) !== false ) {
				$video_url = substr( wp_parse_url( $video_url, PHP_URL_PATH ), 1 );
				$video_url = add_query_arg(
					array(
						'autoplay' => 1,
						'muted' => 1,
						'loop' => 1,
						'quality' => '720p',
						'byline' => 0,
						'background' => 1,
						'title' => 0,
					),
					'https://player.vimeo.com/video/' . $video_url
				);
			}

			?>
				<iframe width="560" height="315" src="<?php echo esc_url( $video_url ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php
		}
		if ( empty( $this->args['only_inner'] ) ) {
			echo '</div>';
		}
		if ( 'on' == $this->args['divider_bottom_onoff'] ) {
			zeen_shape( array(
				'shape' => $divider_bottom,
				'divider_skin_bottom' => $this->args['divider_skin_bottom'],
			) );
		}
		if ( 'on' == $this->args['divider_top_onoff'] ) {
			zeen_shape( array(
				'shape' => $divider_top,
				'location' => 'top',
				'divider_skin_top' => $this->args['divider_skin_top'],
			) );
		}

		if ( ! empty( $this->args['is_fs'] ) ) {
			echo '<div class="cta-row">';
			echo '<div class="tipi-row">';
		}
		$button_size = empty( $this->args['button_size'] ) ? '' : $this->args['button_size'];
		$button_design = empty( $this->args['button_design'] ) ? '' : $this->args['button_design'];
		echo '<div class="tipi-cta-contents title-area';

		if ( ! empty( $button_size ) ) {
			echo ' button-size-wrap-' . (int) $button_size;
		}
		if ( ! empty( $button_design ) ) {
			echo ' button-design-wrap-' . (int) $button_design;
		}
		echo '">';

		if ( 'off' != $this->args['pretitle_check'] && ! empty( $this->args['pretitle'] ) && '<p><br></p>' != $this->args['pretitle'] ) {
			echo '<div class="block-pretitle cta-title-color font-s">' . zeen_sanitize_titles( $this->args['pretitle']  ) . '</div>';
		}

		if ( ! empty( $this->args['custom_content'] ) ) {
			echo '<div class="cta-title cta-title-color">' . zeen_sanitize_titles( $this->args['custom_content']  ) . '</div>';
		}

		if ( ! empty( $this->args['cta_content'] ) && '<p><br></p>' != $this->args['cta_content'] ) {
			echo '<div class="cta-content">' . zeen_sanitize_titles( $this->args['cta_content']  ) . '</div>';
		}

		if ( ! empty( $buttons ) ) {
			$x = 1;
			foreach ( $buttons as $button ) {
				if ( empty( $button ) ) {
					$x++;
					continue;
				}
				$button = zeen_button_link_check( array(
					'data' => $button,
					'x' => $x,
					'count' => count( $buttons ),
					'button_style' => empty( $this->args[ 'button_style_' . $x ] ) ? '' : $this->args[ 'button_style_' . $x ],
				) );
				echo zeen_sanitize_titles( $button );
				$x++;
			}
		}

		echo '</div>';
		if ( ! empty( $this->args['is_fs'] ) ) {
			echo '</div>';
			echo '</div>';
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
