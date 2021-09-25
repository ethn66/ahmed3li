<?php
/**
 * Zeen preview video
 *
 * @since 1.0.0
 */

class ZeenPreviewVideo extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {
		$this->type = 'video';
		parent::__construct( $post, $i, $options );
		if ( ( 1 == $i ) && ! empty( $options['block_videos'] ) ) {
			$this->options['classes'][] = 'playing';
		}
	}

	/**
	 * Preview output
	 *
	 * @since 1.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( false == $echo ) {
			ob_start();
		}
		?>
		<article class="<?php echo esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ); ?>">

			<?php
			$this->mask(
				array(
					'review_off' => true,
				)
			);
			?>
			<div class="<?php echo esc_attr( $this->options['meta_classes'] ); ?>">
				<?php
				$this->titles(
					array(
						'duration'      => true,
						'post_subtitle' => 'off',
					)
				);
				?>
			</div>

		</article>

		<?php
		if ( false == $echo ) {
			return ob_get_clean();
		}

	}

}
