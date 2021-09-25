<?php
/**
 * Zeen block Twitch
 *
 * @since 1.0.0
 */

class ZeenBlockTwitch extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'twitch';
		parent::__construct( $args );
		add_action( 'wp_enqueue_scripts', array( $this, 'zeen_twitch_script' ) );
	}

	public function zeen_twitch_script() {
		wp_enqueue_script( 'twitch-embed', '//embed.twitch.tv/embed/v1.js', array(), ZEEN_VERSION, true );

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
			$parent = get_site_url();
			$parent = str_replace( 'http://', '', $parent );
			$parent = str_replace( 'https://', '', $parent );
			$parent = strpos( $parent, '/' ) !== false ? substr( $parent, 0, strrpos( $parent, '/' ) ) : $parent;
			$autoplay = ! empty( $this->args['autoplay'] ) && 'off' == $this->args['autoplay'] ? 'false' : 'true';
			?>
			<div class="twitch tipi-spin" data-src="//player.twitch.tv/?channel=<?php echo esc_attr( $this->args['user'] ); ?>&parent=<?php echo esc_attr( $parent ); ?>&muted=true&autoplay=<?php echo esc_attr( $autoplay ); ?>">
			</div>
			<?php
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
