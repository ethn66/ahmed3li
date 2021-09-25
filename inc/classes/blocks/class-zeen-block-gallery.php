<?php
/**
 * Zeen block gallery
 *
 * @since 2.5.0
 */

class ZeenBlockGallery extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'gallery';
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

		$lightbox = ! empty( $this->args['lightbox'] ) && 'on' == $this->args['lightbox'] ? true : false;
		$autoplay = ! empty( $this->args['autoplay'] ) ? $this->args['autoplay'] : 'off';
		$slider = ! empty( $this->args['layout_onoff'] ) && 'on' == $this->args['layout_onoff'] ? true : false;
		$slider_p = empty( $this->args['layout'] ) ? 0 : (int) $this->args['layout'];
		$tag_el = empty( $slider ) ? 'div' : 'article';
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			$this->block_title();
		}
		echo '<div id="gallery-uid-' . (int) $this->uid . '" class="gallery-block__wrap ';
		echo empty( $slider ) ? 'tipi-flex tipi-flex-wrap' : 'slider';
		if ( ! empty( $slider ) ) {
			$lightbox = false;
			$ppp = 1;
			if ( 1 === $slider_p ) {
				$slider_p = 52;
				$ppp = 2;
			} elseif ( 2 === $slider_p ) {
				$slider_p = 53;
				$ppp = 3;
			} elseif ( 3 === $slider_p ) {
				$slider_p = 54;
				$ppp = 4;
			}
			echo ' gallery-slider--' . (int) $slider_p;
			echo '"';
			echo ' data-effect="0" data-s="31" data-autoplay="' . esc_attr( $autoplay ) . '" data-ppp="' . (int) $ppp . '';
		}
		echo '">';
		$link_size = 'full';
		$fb = get_theme_mod( 'lightbox_choice', 1 ) == 2 ? true : '';
		if ( ! empty( $this->args['gallery'] ) ) {
			$imgs = explode( ',', $this->args['gallery'] );
			$count = count( $imgs );
			$height = 293;
			$width = 293;
			if ( 1 == $count ) {
				$height = 900;
				$width = 900;
			} elseif ( 2 == $count ) {
				$height = 585;
				$width = 585;
			} elseif ( 3 == $count ) {
				$height = 390;
				$width = 390;
			}
			if ( ! empty( $slider ) ) {
				$width = parent::$is_110_size < 50 ? 585 : 900;
				$height = parent::$is_110_size < 50 ? 585 : 900;
			}
			if ( ! empty( $fb ) ) {
				$link_size = 'zeen-900-900';
			}
			if ( 1 == $this->args['img_shape'] ) {
				$height = 247;
				$width = 370;
				if ( 1 == $count ) {
					$width = 1155;
					$height = 770;
				} elseif ( 2 == $count ) {
					$width = 770;
					$height = 513;
				}
				if ( ! empty( $slider ) ) {
					$width = parent::$is_110_size < 50 ? 770 : 1155;
					$height = parent::$is_110_size < 50 ? 513 : 770;
				}
				if ( ! empty( $fb ) ) {
					$link_size = 'zeen-1155-770';
				}
			} elseif ( 3 == $this->args['img_shape'] ) {
				$height = 490;
				$width = 370;
				if ( 1 == $count ) {
					$height = 1020;
					$width = 770;
				} elseif ( 2 == $count ) {
					$height = 775;
					$width = 585;
				}
				if ( ! empty( $slider ) ) {
					$width = parent::$is_110_size < 50 ? 585 : 770;
					$height = parent::$is_110_size < 50 ? 775 : 1020;
				}
				if ( ! empty( $fb ) ) {
					$link_size = 'zeen-770-1020';
				}
			}
			$i = 1;
			$j = 0;
			foreach ( $imgs as $key ) {
				echo '<' . esc_attr( $tag_el ) . ' class="gallery-block__image';
				if ( ! empty( $slider ) ) {
					echo ' slide';
				}
				$this->animation_class();
				echo '" style="--animation-order:' . (int) $i . '">';
				if ( ! empty( $lightbox ) ) {
					$img_link = wp_get_attachment_image_src( $key, $link_size );
					if ( ! empty( $img_link[0] ) ) {
						echo '<a href="' . esc_url( $img_link[0] ) . '"  class="tipi-lightbox" data-gallery-uid="' . (int) $this->uid . '" data-index="' . (int) $j . '">';
					}
				}
				echo wp_get_attachment_image( $key, 'zeen-' . $width . '-' . $height );
				$caption = wp_get_attachment_caption( $key );
				if ( ! empty( $caption ) ) {
					echo '<span class="caption">' . zeen_sanitize_titles( $caption ) . '</span>';
				}
				if ( ! empty( $lightbox ) ) {
					echo '</a>';
				}
				echo '</' . esc_attr( $tag_el ) . '>';
				$i++;
				$j++;
			}
		}
		if ( ! empty( $slider ) ) {
			zeen_slider_arrows( 1 );
		}
		echo '</div>';
		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
