<?php
/**
 * Zeen block video
 *
 * @since 1.0.0
 */
class ZeenBlockVideo extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'videos';
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
		$i           = 0;
		$qry         = $this->qry();
		$args        = $this->args;
		$args['block_videos'] = true;
		$args['qry'] = $qry;
		$close_b     = $this->qry_args['posts_per_page'];
		$tile        = array(
			array(
				'width'        => 66,
				'shape'        => 'l',
				'icon_size'    => 'l',
				'media_design' => 46,
				'js_id'        => $this->block_js_id(),
			),
			array(
				'width'        => 10,
				'shape'        => 's',
				'icon_size'    => 's',
				'media_design' => 46,
				'js_id'        => $this->block_js_id(),
				'ani_off'      => true,
			),
		);
		if ( $qry->have_posts() ) :
			$cta_content_check = empty( $this->args['cta_content_check'] ) ? 'off' : $this->args['cta_content_check'];
			$video_title       = empty( $this->args['video_title'] ) ? '' : $this->args['video_title'];
			$title_check       = $this->args['title_check'];
			if ( ( ! empty( $video_title ) && 'on' == $title_check ) || 'off' != $cta_content_check ) {
				$mini_title = true;
			}
			if ( empty( $this->args['only_inner'] ) ) {
				$this->opening_wrap();
				echo '<div class="block block-46 block-videos tipi-flex clearfix';
				if ( ! empty( $mini_title ) ) {
					echo ' with-mini-title';
				}
				echo '">';
				if ( ! empty( $mini_title ) ) {
					echo '<div class="block-title-wrap clearfix block-title-46 block-title-videos tipi-vertical-c">';
					if ( ! empty( $video_title ) && 'on' == $title_check ) {
						echo '<div class="block-title font-b">' . zeen_sanitize_titles( $video_title ) . '</div>';
					}
					if ( 'off' != $cta_content_check ) {
						echo '<div class="cta-content">';
						echo zeen_sanitize_titles( str_replace( 'href=', 'rel="noopener" href=', $this->args['cta_content'] ) );
						echo '<span class="cta-i"><i class="tipi-i-arrow-right"></i></span>';
						echo '</div>';
					}
					echo '</div>';
				}
			}
			while ( $qry->have_posts() ) :
				$qry->the_post();
				global $post;
				$args['subtitle'] = empty( $i ) ? '' : 'off';
				if ( 0 === $i ) {
					$qry->rewind_posts();
					$final_close = true;
					echo '<div class="block-piece block-piece-1 clearfix">';
				}
				if ( 1 === $i ) {
					$final_close = true;
					echo '<div class="block-piece block-piece-2 clearfix">';
					echo '<div class="videos-wrap videos-mini-wrap clearfix">';
				}

				$tile_arg     = empty( $tile[ $i ] ) ? $tile[1] : $tile[ $i ];
				$args['i']    = $i;
				$args['tile'] = $tile_arg;
				zeen_block( $post, $args );

				if ( 0 === $i || $close_b === $i ) {
					echo '</div>';
					$final_close = false;
				}

				$i++;

			endwhile;

			if ( empty( $this->args['only_inner'] ) ) {
				if ( true == $final_close ) {
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
				$this->pagi();
				$this->closing_wrap();
			}
		endif;
		wp_reset_postdata();

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}

}
