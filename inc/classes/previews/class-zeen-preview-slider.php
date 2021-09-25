<?php
/**
 * Zeen preview slider
 *
 * @since 1.0.0
 */

class ZeenPreviewslider extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {

		$this->type = 'slider';
		parent::__construct( $post, $i, $options );
		$this->options['classes'][] = 'loop-' . $this->i;
		$this->options['classes'][] = 'preview-' . $this->options['preview'];
		$this->options['classes'][] = 'preview-slider';

		if ( 51 != $this->options['preview'] && 55 != $this->options['preview'] ) {
			$this->options['classes'][] = 'slider-spacing';
		}
		$this->options['classes'][] = 'slider-overlay-' . get_theme_mod( 'slider_overlay', 1 );


		$ani = get_theme_mod( 'slider_img_ani_onoff', 1 );

		if ( ! empty( $ani ) && 51 != $this->options['preview'] ) {
			$this->options['classes'][] = 'img-ani-base img-ani-' . (int) $ani;
		}
		$img_ani = get_theme_mod( 'slider_img_effect', 1 );
		if ( $img_ani > 1 ) {
			$this->options['classes'][] = 'img-color-base img-color-' . $img_ani;
			if ( $img_ani > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}
		$img_ani_hover = get_theme_mod( 'slider_img_effect_hover', 1 );
		if ( ! empty( $img_ani_hover ) ) {
			$this->options['classes'][] = 'img-color-hover-base img-color-hover-' . $img_ani_hover;
			if ( $img_ani_hover > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}
		if ( 56 != $this->options['preview'] ) {
			$this->options['classes'][] = 'preview-slider-overlay';
			if ( get_theme_mod( 'slider_title_bg_onoff' ) == 1 ) {
				$this->options['classes'][] = 'slider-meta-bg meta-bg-' . get_theme_mod( 'slider_title_bg', 1 );
				$this->options['classes'][] = 'meta-edge-' . get_theme_mod( 'slider_title_bg_edge', 1 );
			}
			if ( get_theme_mod( 'slider_img_overlay_onoff', 1 ) == 1 ) {
				$this->options['classes'][] = 'slider-image-' . get_theme_mod( 'slider_img_overlay', 1 );
			}
			$this->options['classes'][] = 'tile-design';
			$this->options['classes'][] = 'tile-design-' . get_theme_mod( 'slider_tile_design', 1 );
			$this->options['classes'][] = 'elements-design-' . get_theme_mod( 'slider_meta_design', 1 );
		}

	}

	/**
	 * Preview output
	 *
	 * @since 1.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( empty( $echo ) ) {
			ob_start();
		}
		$subtitle = get_theme_mod( 'slider_subtitle', 1 ) == 1 ? 'on' : 'off';
		$titles = array(
			'post_subtitle' => $subtitle,
		);
		if ( 51 != $this->options['preview'] ) {
			$titles['post_subtitle'] = 'off';
		}

		echo '<article class="slide ' . esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ) . '">';
		$this->mask( array(
			'review_off' => true,
			'overlay' => true,
		) );
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		$this->byline( array(
			'location' => 2,
		) );
		$this->titles( $titles );
		$this->excerpt();
		$this->byline( array(
			'location' => 3,
		) );

		$this->read_more();
		echo '</div>';
		echo '</article>';

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}
}
