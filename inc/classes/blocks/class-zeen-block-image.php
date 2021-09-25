<?php
/**
 * Zeen block Image
 *
 * @since 1.0.0
 */

class ZeenBlockImage extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'image';
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

		$parallax       = ! empty( $this->args['parallax'] ) && 'on' == $this->args['parallax'] ? true : false;
		$img_bg         = empty( $this->args['img_bg_id'] ) ? '' : $this->args['img_bg_id'];
		$img_link       = empty( $this->args['img_link'] ) ? '' : $this->args['img_link'];
		$lightbox       = ! empty( $this->args['lightbox'] ) && 'on' == $this->args['lightbox'] ? true : false;
		$new_tab        = empty( $this->args['new_tab'] ) ? '' : $this->args['new_tab'];
		$divider_bottom = 'on' == $this->args['divider_bottom_onoff'] && isset( $this->args['divider_bottom'] ) ? $this->args['divider_bottom'] : '';
		$divider_top    = 'on' == $this->args['divider_top_onoff'] && isset( $this->args['divider_top'] ) ? $this->args['divider_top'] : '';
		$open_args      = array();
		if ( ! empty( $parallax ) ) {
			$open_args = array( 'classes' => 'parallax parallax--resized' );
		}

		$title = ! empty( $this->args['title_check'] ) && 'on' == $this->args['title_check'] && ! empty( $this->args['title'] ) ? $this->args['title'] : '';
		$png   = zeen_is_png( wp_get_attachment_image_src( $this->args['img_bg_id'] ) );
		if ( 'on' == $lightbox ) {
			$img_link = wp_get_attachment_url( $this->args['img_bg_id'] );
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap( $open_args );
			echo '<div class="clearfix mask mask__wrap';
			if ( ! empty( $png ) ) {
				echo ' mask-transparent';
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
		}

		if ( ! empty( $img_bg ) ) {
			$columns = empty( parent::$is_110_size ) ? 101 : parent::$is_110_size;
			$fs      = ! empty( $this->args['is_fs'] ) && empty( $this->args['is_boxed_content'] );
			$size    = empty( $fs ) ? 'zeen-1400-full' : 'full';
			$size    = $columns < 100 ? 'zeen-770-full' : $size;
			$size    = $columns < 33 ? 'zeen-293-full' : $size;
			if ( ! empty( $this->args['img_shape'] ) ) {
				if ( 1 == $this->args['img_shape'] ) {
					$size = empty( $fs ) ? 'zeen-1155-770' : 'zeen-1500-750';
					$size = $columns < 100 ? 'zeen-585-585' : $size;
					$size = $columns < 34 ? 'zeen-370-247' : $size;
				} elseif ( 2 == $this->args['img_shape'] ) {
					$size = 'zeen-900-900';
					$size = $columns < 100 ? 'zeen-770-513' : $size;
					$size = 33 == $columns ? 'zeen-390-390' : $size;
					$size = $columns < 33 ? 'zeen-293-293' : $size;
				} elseif ( 3 == $this->args['img_shape'] ) {
					$size = empty( $fs ) ? 'zeen-770-1020' : 'zeen-770-1020';
					$size = $columns < 60 ? 'zeen-585-775' : $size;
					$size = $columns < 34 ? 'zeen-370-490' : $size;
				}
			}
			add_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
			echo wp_get_attachment_image( $this->args['img_bg_id'], $size );
			remove_filter( 'wp_get_attachment_image_attributes', 'zeen_lazy_load_on_off' );
		}
		if ( 'on' == $this->args['divider_bottom_onoff'] ) {
			zeen_shape( array( 'shape' => $divider_bottom ) );
		}
		if ( 'on' == $this->args['divider_top_onoff'] ) {
			zeen_shape(
				array(
					'shape'    => $divider_top,
					'location' => 'top',
				)
			);
		}
		if ( empty( $this->args['only_inner'] ) ) {
			echo '</div>';
			if ( ! empty( $img_link ) ) {
				echo '<a href="' . esc_url( $img_link ) . '"  class="overlay';
				if ( 'on' == $lightbox ) {
					echo ' tipi-lightbox';
				}
				echo '"';
				if ( 'on' == $new_tab ) {
					echo ' target="_blank"';
				}
				echo '>';
				echo '</a>';
			}
			if ( ! empty( $title ) ) {
				echo '<div class="meta__wrap meta__wrap_f tipi-all-c title-area mask-overlay">';
				echo '<div class="title cta-title-bg">';
				echo zeen_sanitize_titles( $title );
				echo '</div>';
				echo '</div>';
			}
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
