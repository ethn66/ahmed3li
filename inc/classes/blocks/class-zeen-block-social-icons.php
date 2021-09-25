<?php
/**
 * Zeen block social icons
 *
 * @since 1.0.0
 */

class ZeenBlockSocialIcons extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'social';
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
		$fs = $this->args['fs'];
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			$this->block_title();
		}
		$icons           = array();
		$use_to          = empty( $this->args['use_to'] ) ? 'on' : $this->args['use_to'];
		$social_networks = array(
			array(
				'title'    => 'Facebook',
				'network'  => 'facebook',
				'icon'     => 'facebook',
				'base_url' => 'https://facebook.com/',
			),
			array(
				'title'    => 'Twitter',
				'network'  => 'twitter',
				'icon'     => 'twitter',
				'base_url' => 'https://twitter.com/',
			),
			array(
				'title'    => 'Instagram',
				'network'  => 'instagram',
				'icon'     => 'instagram',
				'base_url' => 'https://instagram.com/',
			),
			array(
				'title'    => 'Pinterest',
				'network'  => 'pinterest',
				'icon'     => 'pinterest',
				'base_url' => 'https://pinterest.com/',
			),
			array(
				'title'    => 'Youtube',
				'network'  => 'youtube',
				'icon'     => 'youtube-play',
				'base_url' => 'https://youtube.com/',
			),
			array(
				'title'    => 'Twitch',
				'network'  => 'twitch',
				'icon'     => 'twitch',
				'base_url' => 'https://twitch.com/',
			),
			array(
				'title'    => 'Soundcloud',
				'network'  => 'soundcloud',
				'icon'     => 'soundcloud',
				'base_url' => 'https://soundcloud.com/',
			),
			array(
				'title'    => 'Spotify',
				'network'  => 'spotify',
				'icon'     => 'spotify',
				'base_url' => '',
			),
			array(
				'title'    => 'Medium',
				'network'  => 'medium',
				'icon'     => 'medium',
				'base_url' => 'https://medium.com/',
			),
			array(
				'title'    => 'Apple Music',
				'network'  => 'apple_music',
				'icon'     => 'apple_music',
				'base_url' => '',
			),
			array(
				'title'    => 'Patreon',
				'network'  => 'patreon',
				'icon'     => 'patreon',
				'base_url' => 'https://patreon.com/',
			),
			array(
				'title'    => 'IMDB',
				'network'  => 'imdb',
				'icon'     => 'imdb',
				'base_url' => 'https://imdb.com/',
			),
			array(
				'title'    => 'Tumblr',
				'network'  => 'tumblr',
				'icon'     => 'tumblr',
				'base_url' => 'https://tumblr.com/',
			),
			array(
				'title'    => 'Vimeo',
				'network'  => 'vimeo',
				'icon'     => 'vimeo',
				'base_url' => 'https://vimeo.com/',
			),
			array(
				'title'    => 'VK',
				'network'  => 'vk',
				'icon'     => 'vk',
				'base_url' => 'https://vk.com/',
			),
			array(
				'title'    => 'Goodreads',
				'network'  => 'goodreads',
				'icon'     => 'goodreads',
				'base_url' => 'https://goodreads.com/',
			),
			array(
				'title'    => 'Itch.io',
				'network'  => 'itch',
				'icon'     => 'itch',
				'base_url' => '',
			),
			array(
				'title'    => 'Product Hunt',
				'network'  => 'producthunt',
				'icon'     => 'producthunt',
				'base_url' => 'https://producthunt.com/',
			),
			array(
				'title'    => 'Letterboxd',
				'network'  => 'letterboxd',
				'icon'     => 'letterboxd',
				'base_url' => 'https://letterboxd.com/',
			),
			array(
				'title'    => 'Tiktok',
				'network'  => 'tiktok',
				'icon'     => 'tiktok',
				'base_url' => 'https://tiktok.com/@',
			),
			array(
				'title'    => 'Linkedin',
				'network'  => 'linkedin',
				'icon'     => 'linkedin',
				'base_url' => 'https://linkedin.com/',
			),
			array(
				'title'    => 'Unsplash',
				'network'  => 'unsplash',
				'icon'     => 'unsplash',
				'base_url' => 'https://unsplash.com/',
			),
			array(
				'title'    => 'Bandcamp',
				'network'  => 'bandcamp',
				'icon'     => 'bandcamp',
				'base_url' => '',
			),
			array(
				'title'    => 'Mixcloud',
				'network'  => 'mixcloud',
				'icon'     => 'mixcloud',
				'base_url' => 'https://mixcloud.com/',
			),
			array(
				'title'    => 'Discord',
				'network'  => 'discord',
				'icon'     => 'discord',
				'base_url' => '',
			),

		);
		$social_networks_output = array();
		foreach ( $social_networks as $key => $value ) {
			if ( 'on' != $this->args[ $value['network'] ] ) {
				continue;
			}
			$social_networks_output[ $key ]        = $social_networks[ $key ];
			$social_networks_output[ $key ]['url'] = 'on' == $use_to || empty( $this->args[ $value['network'] . '_url' ] ) ? $value['base_url'] . get_theme_mod( 'icons_' . $value['network'] ) : $this->args[ $value['network'] . '_url' ];
		}
		$classes = 'on' == $this->args['centered'] ? ' centered' : '';
		$i       = 1;
		?>
		<span class="social-icons clearfix<?php echo esc_attr( $classes ); ?>">
			<ul class="horizontal-menu menu-icons--wrap">
				<?php foreach ( $social_networks_output as $key ) { ?>
					<?php $url = $key['url']; ?>
					<li class="menu-icon menu-icon-<?php echo esc_attr( $key['icon'] ); ?><?php $this->animation_class(); ?>" style="--animation-order: <?php echo (int) $i; ?>">
						<a href="<?php echo esc_url( $url ); ?>" data-title="<?php echo esc_attr( $key['title'] ); ?>" class="tipi-i-<?php echo esc_attr( $key['icon'] ); ?> tipi-tip tipi-tip-move" rel="nofollow noopener" target="_blank"></a>
					</li>
					<?php $i++; ?>
				<?php } ?>
			</ul>
		</span>
		<?php

		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}
}
