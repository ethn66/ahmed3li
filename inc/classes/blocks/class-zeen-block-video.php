<?php
/**
 * Zeen block video
 *
 * @since 1.0.0
 */
class ZeenBlockVideoSingle extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'video-single';
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
		$video_url  = empty( $this->args['video_url'] ) ? '' : $this->args['video_url'];
		$autoplay   = 'on' == $this->args['autoplay'] ? 1 : 0;
		$loop       = 'on' == $this->args['loop'] ? 1 : 0;
		$info       = 'on' == $this->args['info'] ? 1 : 0;
		$video_bg   = 'on' == $this->args['video_bg'] ? 1 : 0;
		$video_args = array(
			'autoplay' => $autoplay,
			'loop'     => $loop,
		);
		if ( strpos( $video_url, 'yout' ) !== false ) {
			preg_match( '([-\w]{11})', $video_url, $matches );
			if ( ! empty( $matches ) ) {
				$video_args['modestbranding'] = 1;
				$video_args['rel']            = 0;
				$video_args['controls']       = empty( $video_bg ) ? 1 : 0;
				$video_args['showinfo']       = $info;
				$video_args['mute']           = $autoplay;

				if ( ! empty( $loop ) ) {
					$video_args['playlist'] = $matches[0];
				}

				$video_url = add_query_arg( $video_args, 'https://www.youtube-nocookie.com/embed/' . $matches[0] );
			}
		} elseif ( strpos( $video_url, 'vim' ) !== false ) {
			$video_url            = substr( wp_parse_url( $video_url, PHP_URL_PATH ), 1 );
			$video_args['byline'] = $info;
			$video_args['title']  = $info;
			if ( ! empty( $video_bg ) ) {
				$video_args['background'] = 1;
			}
			$video_args['dnt']   = 1;
			$video_args['muted'] = $autoplay;
			$video_url           = add_query_arg(
				$video_args,
				'https://player.vimeo.com/video/' . $video_url
			);
		}
		if ( ! empty( $video_url ) ) {
			$class = 'video-wrap';
			$class = empty( $autoplay ) ? $class : $class . ' media-autoplay-on';
			$lazy  = zeen_lazyload_iframe_check();
			$src   = empty( $lazy ) ? $video_url : 'about:blank';
			echo '<div class="' . esc_attr( $class ) . '">';
			echo '<iframe width="560" height="315" src="' . esc_attr( $src ) . '"';
			if ( ! empty( $lazy ) ) {
				echo ' class="zeen-lazy-load-base zeen-iframe-lazy-load" data-lazy-src="' . esc_url( $video_url ) . '"';
			}
			echo ' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			echo '<noscript><iframe width="560" height="315" src="' . esc_url( $video_url ) . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></noscript>';
			echo '</div>';
		} else {
			esc_html_e( 'Video Block added but no video url entered.', 'zeen' );
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}

}
