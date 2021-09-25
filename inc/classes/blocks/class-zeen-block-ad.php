<?php
/**
 * Zeen block ad
 *
 * @since 1.0.0
 */

class ZeenBlockAd extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'da';
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
		$ad_img = empty( $this->args['ad_img'] ) ? '' : $this->args['ad_img'];
		$ad_img_data = empty( $this->args['ad_img_id'] ) ? '' : wp_get_attachment_image_src( $this->args['ad_img_id'], 'full' );
		$ad_url = empty( $this->args['ad_url'] ) ? '' : $this->args['ad_url'];
		$ad_img_2x = empty( $this->args['ad_img_2x'] ) ? '' : $this->args['ad_img_2x'];
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			echo '<div class="zeen-da-wrap">';
		}

		if ( 1 != $this->args['ad_type'] ) {
			$this->block_content();
		}

		if ( empty( $this->args['only_inner'] ) ) {
			if ( 1 == $this->args['ad_type'] ) {
				if ( ! empty( $ad_url ) ) {
					echo '<a href="' . esc_url( $ad_url ) . '" rel="nofollow" class="zeen-da-url"';
					if ( ! empty( $this->args['new_tab'] ) && 'on' == $this->args['new_tab'] ) {
						echo ' target="_blank"';
					}
					echo '>';
				}
				echo '<img';
				$width = 728;
				$height = 90;
				if ( ! empty( $ad_img_data ) ) {
					if ( ! empty( $ad_img_data[1] ) ) {
						$width = $ad_img_data[1];
						echo ' width="' . (int) $ad_img_data[1] . '"';
					}
					if ( ! empty( $ad_img_data[2] ) ) {
						$height = $ad_img_data[2];
						echo ' height="' . (int) $ad_img_data[2] . '"';
					}
				}
				echo ' src="';
				echo "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20" . (int) $width . '%20' . (int) $height . "'%3E%3C/svg%3E";
				echo '" data-lazy-src="' . esc_url( $ad_img ) .'" alt="da block" class="zeen-da-img zeen-lazy-load-base zeen-lazy-load" data-lazy-srcset="';
				if ( ! empty( $ad_img_2x ) ) {
					echo esc_url( $ad_img_2x ) . ' 2x';
				}
				echo '">';
				if ( ! empty( $ad_url ) ) {
					echo '</a>';
				}
			}
			echo '</div>';
			if ( ! empty( $this->args['small_print_check'] ) && 'off' != $this->args['small_print_check'] ) {
				echo '<div class="small-print clearfix">' . zeen_sanitize_titles( $this->args['small_print'] ) . '</div>';
			}
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}
}
