<?php
/**
 * Zeen block youtube playlist
 *
 * @since 4.0.0
 */
class ZeenBlockYoutubePlaylist extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'youtube-playlist';
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
		$i                    = 0;
		$args                 = $this->args;
		$args['block_videos'] = true;
		$args['videos']       = empty( $this->args['video_url'] ) ? '' : $this->args['video_url'];
		$args['videos'] = str_replace( ' ', '', $args['videos'] );
		if ( ! empty( $args['videos'] ) ) {
			$first_video          = explode( ',', $args['videos'], 2 );
			$args['videos']       = $first_video[0] . ',' . $args['videos'];
		}
		$api_key              = get_theme_mod( 'google_api_key' );
		$cta_content_check    = empty( $this->args['cta_content_check'] ) ? 'off' : $this->args['cta_content_check'];
		$video_title          = empty( $this->args['video_title'] ) ? '' : $this->args['video_title'];
		$title_check          = $this->args['title_check'];
		if ( ( ! empty( $video_title ) && 'on' == $title_check ) || 'off' != $cta_content_check ) {
			$mini_title = true;
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			echo '<div class="block block-203 block-videos tipi-flex clearfix';
			if ( ! empty( $mini_title ) ) {
				echo ' with-mini-title';
			}
			echo '">';
			if ( ! empty( $mini_title ) ) {
				echo '<div class="block-title-wrap clearfix block-title-203 block-title-videos tipi-vertical-c">';
				if ( ! empty( $video_title ) && 'on' == $title_check ) {
					echo '<div class="block-title font-b">' . zeen_sanitize_titles( $video_title ) . '</div>';
				}
				if ( 'off' != $cta_content_check ) {
					echo '<div class="cta-content';
					if ( empty( $this->args['subscribe_style'] ) || ! empty( $this->args['subscribe_style'] ) && 'off' != $this->args['subscribe_style'] ) {
						echo ' tipi-button tipi-all-c tipi-button-subscribe';
					}
					echo '">';
					echo zeen_sanitize_titles( str_replace( 'href=', 'rel="noopener" href=', $this->args['cta_content'] ) );
					echo '<span class="cta-i"><i class="tipi-i-arrow-right"></i></span>';
					echo '</div>';
				}
				echo '</div>';
			}
		}
		if ( ! empty( $args['videos'] ) ) {
			$request = wp_remote_get( 'https://www.googleapis.com/youtube/v3/videos?key=' . $api_key . '&part=snippet,statistics,contentDetails&id=' . $args['videos'] );
			if ( ! is_wp_error( $request ) ) {
				$body   = json_decode( wp_remote_retrieve_body( $request ) );
				$videos = empty( $body->items ) ? '' : $body->items;
			}
		}
		if ( empty( $api_key ) ) {
			esc_html_e( 'A Google API Key is required to use this block. Add it to your Theme Options > Social Network Accounts. Refer to theme documentation for further assistance.', 'zeen' );
		} else if ( ! empty( $videos ) ) {
			foreach ( $videos as $video ) {
				$media_url = zeen_media_url(
					'',
					array(
						'media_design' => 46,
						'source'       => 1,
						'url'          => 'https://www.youtube.com/watch?v=' . $video->id,
					)
				);
				$icon_size = 's';
				$duration  = $video->contentDetails->duration;
				$src       = $video->snippet->thumbnails->default->url;
				$srcset    = $video->snippet->thumbnails->medium->url;
				if ( 0 === $i ) {
					$icon_size   = 'l';
					$final_close = true;
					echo '<div class="block-piece block-piece-1 clearfix">';
					$src    = $video->snippet->thumbnails->standard->url;
					$srcset = empty( $video->snippet->thumbnails->maxres->url ) ? '' : $video->snippet->thumbnails->maxres->url;
				}
				if ( 1 === $i ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-2 clearfix">';
					echo '<div class="videos-wrap videos-mini-wrap clearfix">';
				}
				echo '<article class="tipi-xs-12 with-fi';
				if ( 1 == $i ) {
					echo ' playing';
				}
				echo '">';
				echo '<div class="mask">';
				echo '<img ';
				if ( get_theme_mod( 'lazy', 1 ) == 1 ) {
					$height = 0 === $i ? 433 : 68;
					$width = 0 === $i ? 770 : 120;
					echo ' class="zeen-lazy-load-base zeen-lazy-load"';
					echo ' src="';
					echo "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20$width%20$height'%3E%3C/svg%3E";
					echo '" data-lazy-src="' . esc_url( $src ) . '"';
					if ( ! empty( $srcset ) ) {
						echo ' data-lazy-srcset="' . esc_attr( $srcset ) . '" data-lazy-sizes="(max-width: 1240px) 100vw, 1240px"';
					}
				} else {
					echo 'src="' . esc_url( $src ) . '"';
					if ( ! empty( $srcset ) ) {
						echo ' srcset="' . esc_url( $srcset ) . ' 2x"';
					}
				}
				echo '>';
				echo '<a href="' . esc_url( $media_url ) . '" class="tipi-all-c media-icon  media-tr icon-1 icon-base-1 icon-size-' . esc_attr( $icon_size ) . '" data-type="46" data-format="video" data-title="' . esc_attr( $video->snippet->title ) . '" data-duration="' . esc_attr( $duration ) . '" data-target="' . (int) $this->block_js_id() . '" data-source="ext" data-src="' . esc_url( $media_url ) . '"><i class="tipi-i-play_arrow" aria-hidden="true"></i><span class="icon-bg"></span></a>';
				$duration        = new DateInterval( $duration );
				$format          = ! empty( $duration->h ) ? '%H:%I:%S' : '%i:%S';
				$duration_output = $duration->format( $format );
				if ( ! empty( $i ) ) {
					echo '<span class="duration">';
					echo esc_attr( $duration_output );
					echo '</span>';
					echo '<span class="playing-msg">';
					esc_attr_e( 'Playing', 'zeen' );
					echo '</span>';
				}
				echo '</div>';
				echo '<div class="meta">';
				echo '<h3 class="title">';
				echo zeen_sanitize_wp_kses( $video->snippet->title );
				echo '</h3>';
				echo '<div class="video-meta tipi-flex-wrap tipi-vertical-c">';
				if ( empty( $i ) ) {
					echo '<span class="duration">';
					echo esc_attr( $duration_output );
					echo '</span>';
				}
				echo '<span class="duration views">';
				$views_count = zeen_integer_format_short( $video->statistics->viewCount );
				echo esc_attr( $views_count ) . ' ' . sprintf( _n( 'view', 'views', $views_count, 'zeen' ), $views_count );
				echo '</span>';
				echo '</div>';
				echo '</div>';
				echo '</article>';
				if ( 0 === $i || count( $videos ) === $i ) {
					echo '</div>';
					$final_close = false;
				}
				$i++;
			}
		}
		if ( empty( $this->args['only_inner'] ) ) {
			if ( ! empty( $final_close ) ) {
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			$this->pagi();
			$this->closing_wrap();
		}
		wp_reset_postdata();

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
