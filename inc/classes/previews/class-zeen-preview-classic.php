<?php
/**
 * Preview Classic
 *
 * @since 1.0.0
 */

class ZeenPreviewClassic extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {
		$this->type = 'classic';
		parent::__construct( $post, $i, $options );
		if ( 66 == $this->options['preview'] ) {
			if ( 0 == $this->i ) {
				$this->options['classes'][] = 'sticky-el';
			}
		}
		$this->options['classes'][] = 'loop-' . $this->i;
		$this->options['classes'][] = 'preview-classic';
		if ( ! empty( $this->options['tile']['excerpt_length'] ) ) {
			$this->options['excerpt_length'] = $this->options['tile']['excerpt_length'];
		}
		if ( ! empty( $this->options['tile']['shape'] ) ) {
			$this->options['classes'][] = 'preview__img-shape-' . $this->options['tile']['shape'];
		}
		$this->options['classes'][] = 'preview-' . $this->options['preview'];
		$parallax                   = isset( $this->options['parallax'] ) && 'on' == $this->options['parallax'] ? true : '';
		if ( ! empty( $this->options['settings']['image_ani'] ) && empty( $parallax ) ) {
			$this->options['classes'][] = 'img-ani-base img-ani-' . $this->options['settings']['image_ani'];
		}

		if ( ! empty( $this->options['settings']['image_color_ani'] ) ) {
			$this->options['classes'][] = 'img-color-base img-color-' . $this->options['settings']['image_color_ani'];
			if ( $this->options['settings']['image_color_ani'] > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}

		if ( ! empty( $this->options['settings']['image_color_ani_hover'] ) ) {
			$this->options['classes'][] = 'img-color-hover-base img-color-hover-' . $this->options['settings']['image_color_ani_hover'];
			if ( $this->options['settings']['image_color_ani_hover'] > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}

		if ( 62 == $this->options['preview'] && ! empty( $parallax ) ) {
			$this->options['classes'][] = 'parallax parallax-min';
		}

		$this->options['classes'][] = 'elements-design-' . intval( get_theme_mod( 'classic_meta_design', 1 ) );
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

		$mask_args  = array();
		$subtitle   = get_theme_mod( 'classic_subtitle' ) == 1 ? '' : 'off';
		$meta_above = empty( $this->options['meta_location'] ) && ! empty( $this->options['flipstack'] ) && ( 1 === (int) $this->options['flipstack'] || 'on' === $this->options['flipstack'] ) ? true : '';

		if ( ! empty( $this->options['overlay'] ) ) {
			$mask_args['overlay'] = true;
		}

		echo '<article class="' . esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ) . '" style="--animation-order:' . (int) $this->i;
		if ( ! empty( $this->options['var'] ) ) {
			echo ';' . esc_attr( $this->options['var'] );
		}
		echo '">';
		echo '<div class="preview-mini-wrap clearfix">';
		if ( ! empty( $meta_above ) ) {
			echo '<div class="meta--above ' . esc_attr( $this->options['meta_classes'] ) . '">';
			$this->byline(
				array(
					'location' => 2,
				)
			);
			$this->titles(
				array(
					'post_subtitle' => $subtitle,
				)
			);

			$this->byline(
				array(
					'location' => 3,
				)
			);
			echo '</div>';
		}
		$this->mask( $mask_args );
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		if ( empty( $meta_above ) ) {
			$this->byline(
				array(
					'location' => 2,
				)
			);
			$this->titles(
				array(
					'post_subtitle' => $subtitle,
				)
			);

			$this->byline(
				array(
					'location' => 3,
				)
			);
		}
		$this->excerpt();
		$this->byline(
			array(
				'location' => 4,
			)
		);
		echo '</div>';
		echo '</div>';
		echo '</article>';

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
