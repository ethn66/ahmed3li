<?php
/**
 * Zeen preview grid
 *
 * @since 1.0.0
 */

class ZeenPreviewGrid extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {

		$this->type = 'grid';
		parent::__construct( $post, $i, $options );
		$this->options['classes'][] = 'loop-' . $this->i;
		$this->options['classes'][] = 'block__ani-stagger';
		$this->options['classes'][] = 'preview-' . $this->options['preview'];
		$this->options['classes'][] = 'preview-grid';
		$parallax = isset( $this->options['parallax'] ) && 'on' == $this->options['parallax'] ? true : '';

		if ( get_theme_mod( 'grid_title_bg_onoff' ) == 1 ) {
			$this->options['classes'][] = 'grid-meta-bg meta-bg-' . get_theme_mod( 'grid_title_bg', 1 );
			$this->options['classes'][] = 'meta-edge-' . get_theme_mod( 'grid_title_bg_edge', 1 );
		}
		if ( get_theme_mod( 'grid_img_overlay_onoff', 1 ) == 1 ) {
			$this->options['classes'][] = 'grid-image-' . get_theme_mod( 'grid_img_overlay', 1 );
		}

		$ani = get_theme_mod( 'grid_img_ani_onoff', 1 );
		$article_ani = get_theme_mod( 'grid_ani_onoff', 1 );
		if ( ! empty( $this->options['animation_type'] ) ) {
			$article_ani = 98 == $this->options['animation_type'] ? '' : 1;
		}
		if ( 'top_block' != $this->specific ) {
			$this->options['classes'][] = 'grid-spacing';
			if ( ! empty( $ani ) && empty( $parallax ) ) {
				$this->options['classes'][] = 'img-ani-base img-ani-' . (int) $ani;
			}
			$this->options['classes'][] = 'ani-base';
			if ( ! empty( $article_ani ) ) {
				$this->options['classes'][] = 'block-to-see block__ani-on';
				$ani = get_theme_mod( 'grid_ani', 1 ) - 1;
				if ( ! empty( $this->options['animation_type'] ) ) {
					$ani = $this->options['animation_type'] - 1;
				}
				$this->options['classes'][] = 'block__ani-' . (int) $ani;
			}
		}
		$img_ani = get_theme_mod( 'grid_img_effect', 1 );
		if ( $img_ani > 1 ) {
			$this->options['classes'][] = 'img-color-base img-color-' . $img_ani;
			if ( $img_ani > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}
		$img_ani_hover = get_theme_mod( 'grid_img_effect_hover', 1 );
		if ( ! empty( $img_ani_hover ) ) {
			$this->options['classes'][] = 'img-color-hover-base img-color-hover-' . $img_ani_hover;
			if ( $img_ani_hover > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}
		if ( ! empty( $parallax ) ) {
			$this->options['classes'][] = 'parallax parallax-min';
		}

		$this->options['classes'][] = 'tile-design';
		$this->options['classes'][] = 'tile-design-' . get_theme_mod( 'grid_tile_design', 1 );
		$this->options['classes'][] = 'elements-design-' . get_theme_mod( 'grid_meta_design', 1 );
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
		$subtitle = get_theme_mod( 'grid_subtitle', 1 ) == 1 ? 'on' : 'off';
		$titles = array(
			'post_subtitle' => $subtitle,
		);

		if ( empty( $this->options['is_fs'] ) ) {
			if ( 83 == $this->options['preview'] && 84 == $this->options['preview'] ) {
				$titles['post_subtitle'] = 'off';
			}
		}

		echo '<article class="' . esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ) . '">';
		$this->mask( array(
			'overlay' => true,
			'review_off' => true,
		) );
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		$this->byline( array(
			'location' => 2,
		) );
		$this->titles( $titles );
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
