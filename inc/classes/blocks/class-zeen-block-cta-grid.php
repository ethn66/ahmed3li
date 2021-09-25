<?php
/**
 * Zeen block Taxonomy CTA
 *
 * @since 3.8.0
 */

class ZeenBlockCTAGrid extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'ctagrid';
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
		$layout = empty( $this->args['layout'] ) ? 0 : $this->args['layout'];
		$meta_location = empty( $this->args['meta_location'] ) ? 0 : $this->args['meta_location'];
		$category = $layout < 4 ? ' cta-grid-wrap--cat-1' : ' cta-grid-wrap--cat-2';
		$this->args['custom_class'] = 'cta-grid-wrap-' . $layout . ' cta-title-loc-' . $meta_location . $category;
		$parallax = ! empty( $this->args['parallax'] ) && 'on' == $this->args['parallax'] ? true : '';
		$ppp = 3;
		if ( 0 == $layout ) {
			$ppp = 2;
		} elseif ( 1 == $layout || 6 == $layout || 7 == $layout ) {
			$ppp = 4;
		}
		if ( empty( $echo ) ) {
			ob_start();
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
		}
		$buttons = ! empty( $this->args['button_check'] ) && 'on' == $this->args['button_check'] ? true : '';
		$button_style = $this->args['button_style_1'];
		$button_alignment = $this->args['button_alignment'];
		$button_size = empty( $this->args['button_size'] ) ? '' : $this->args['button_size'];
		$button_design = empty( $this->args['button_design'] ) ? '' : $this->args['button_design'];
		$opener_b = 7 == $layout ? 2 : '';
		$opener_b = 4 == $layout || 5 == $layout || 6 == $layout ? 1 : $opener_b;
		echo '<div class="cta-inner-wrap tipi-flex">';
		for ( $i = 0; $i < $ppp; $i++ ) {
			$url = $this->args[ 'ctagrid_url_' . $i ];
			$img = $this->args[ 'ctagrid_img_' . $i . '_id' ];
			$title = $this->args[ 'ctagrid_title_' . $i ];
			$subtitle = $this->args[ 'ctagrid_subtitle_' . $i ];
			$button_text = empty( $this->args['button_text_' . $i ] ) ? '' : $this->args['button_text_' . $i ];
			if ( ! empty( $opener_b ) && $i == $opener_b ) {
				echo '</div>';
				echo '<div class="cta-inner-wrap tipi-flex">';
			}
			echo '<div class="cta-tile cta-tile-' . (int) $i;
			if ( ! empty( $parallax ) ) {
				echo ' parallax';
			}
			$this->tile_animation_class();
			echo '">';
			if ( ! empty( $url ) ) {
				?>
				<a href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo strip_tags( zeen_sanitize_titles( $title ) ); ?>" class="overlay"></a>
				<?php
			}
			echo '<div class="meta">';
			echo '<div class="title-area">';
			if ( ! empty( $title ) ) {
				echo '<div class="cta-title">' . zeen_sanitize_titles( $title ) . '</div>';
			}
			if ( ! empty( $subtitle ) ) {
				echo '<div class="subtitle">' . zeen_sanitize_titles( $subtitle ) . '</div>';
			}
			echo '</div>';
			if ( ! empty( $buttons ) && ! empty( $button_text ) ) {
				echo '<span class="tipi-button-wrap clearfix';
				if ( ! empty( $button_size ) ) {
					echo ' button-size-wrap-' . (int) $button_size;
				}
				if ( ! empty( $button_design ) ) {
					echo ' button-design-wrap-' . (int) $button_design;
				}
				if ( ! empty( $button_alignment ) ) {
					echo ' tipi-button-align-' . (int) $button_alignment;
				}
				echo '">';
				$button = zeen_button_link_check( array(
					'data' => $button_text,
					'wrap_off' => true,
					'button_style' => $button_style,
				) );
				echo zeen_sanitize_titles( $button );
				echo '</span>';
			}
			echo '</div>';
			echo '<div class="mask mask__wrap">';
			if ( ! empty( $img ) ) {
				echo wp_get_attachment_image( $img, 'full' );
			}
			echo '<span class="mask-overlay"></span>';
			echo '</div>';
			echo '</div>';
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
