<?php
/**
 * Block: Text
 *
 * @package Zeen
 * @since 1.0.0
 */

class ZeenBlockEvents extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'events';
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
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			$this->block_title();
		}

		for ( $i = 0; $i < $this->args['events_count']; $i++ ) {
			$date = empty( $this->args[ 'event_date_' . $i ] ) ? '' : $this->args[ 'event_date_' . $i ];
			$img = empty( $this->args[ 'event_img_' . $i . '_id' ] ) ? '' : $this->args[ 'event_img_' . $i . '_id' ];
			$location = empty( $this->args[ 'event_location_' . $i ] ) ? '' : $this->args[ 'event_location_' . $i ];
			$name = empty( $this->args[ 'event_name_' . $i ] ) ? '' : $this->args[ 'event_name_' . $i ];
			$url = empty( $this->args[ 'event_url_' . $i ] ) ? '' : $this->args[ 'event_url_' . $i ];
			$url_title = empty( $this->args[ 'event_url_title_' . $i ] ) ? '' : $this->args[ 'event_url_title_' . $i ];
			if ( empty( $date ) && empty( $location ) && empty( $name ) ) {
				continue;
			}
			$classes = empty( $url_title ) ? 3 : 4;
			?>
			<div class="event__wrap block-to-see block__ani-1 block__ani-on tipi-flex col--<?php echo (int) $classes; ?>">
				<div class="event__els event__info tipi-flex tipi-vertical-c">
					<div class="event__el event__date">
						<?php echo zeen_sanitize_titles( $date ); ?>
					</div>
					<div class="event__el tipi-vertical-c tipi-flex event__name__wrap">
						<div class="event__img">
							<?php echo wp_get_attachment_image( $img, 'thumbnail' ); ?>
						</div>
						<div class="event__name">
							<?php echo zeen_sanitize_titles( $name ); ?>
						</div>
						<div class="event__el event__location">
							<?php echo zeen_sanitize_titles( $location ); ?>
						</div>
					</div>
				</div>
				<?php if ( ! empty( $url_title ) ) { ?>
					<div class="event__els event__url__wrap">
						<div class="event__el event__url">
							<?php if ( ! empty( $url ) ) { ?>
								<a href="<?php echo esc_url( $url ); ?>" class="tipi-button button-arrow button-arrow-r" target="_blank">
							<?php } else { ?>
								<span class="tipi-button">
							<?php } ?>
							<span class="button-title">
								<?php echo zeen_sanitize_titles( $url_title ); ?>
							</span>
							<?php if ( ! empty( $url ) ) { ?>
								<i class="tipi-i-arrow-right"></i>
								</a>
							<?php } else { ?>
								</span>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
