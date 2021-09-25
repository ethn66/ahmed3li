<?php
/**
 * Helpers
 *
 * @copyright Copyright Codetipi
 * @package Zeen
 * @since 1.0.0
 */
namespace TipiBuilder;

class ZeenHelpers {

	/**
	 * Active
	 *
	 * @since 1.0.0
	 */
	public static function zeen_builder_call() {

		if ( current_user_can( 'edit_posts' ) && ! empty( $_GET['tipi_builder'] ) ) {
			return true;
		}

	}

	/**
	 * Active
	 *
	 * @since 1.0.0
	 */
	public static function zeen_frame_call() {

		if ( current_user_can( 'edit_posts' ) && ! empty( $_GET['tipi_builder_frame'] ) ) {
			return true;
		}

	}

	/**
	 * Active
	 *
	 * @since 1.0.0
	 */
	public static function zeen_mob_active() {

		if ( current_user_can( 'edit_posts' ) && ! empty( $_GET['tipi_builder_mob'] ) ) {
			return true;
		}

	}

	/**
	 * Active PID
	 *
	 * @since 1.0.0
	 */
	public static function zeen_active_id() {
		$pid = empty( $_GET['pid'] ) ? '' : (int) $_GET['pid'];
		$tid = empty( $_GET['tid'] ) ? '' : (int) $_GET['tid'];
		if ( empty( $pid ) && empty( $tid ) ) {
			return;
		}
		if ( ! empty( $pid ) ) {
			$id   = $pid;
			$tax  = '';
			$type = 'page';
		} elseif ( ! empty( $tid ) ) {
			$id   = $tid;
			$tax  = $_GET['tax'];
			$type = 'term';
		}
		return array(
			'id'   => $id,
			'tax'  => esc_attr( $tax ),
			'type' => $type,
		);
	}

	/**
	 * Sidebar Render
	 *
	 * @since 1.0.0
	 */
	private static function zeen_sidebar_render() {
		ob_start();
		get_template_part( 'sidebar' );
		return ob_get_clean();
	}

	/**
	 * Templates
	 *
	 * @since 1.0.0
	 */
	public static function zeen_templates() {
		$ssl    = is_ssl() ? 's' : '';
		$output = array(
			array(
				'title' => 'Zeen',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/zeen-1.jpg',
				'id'    => 'zeen-1',
				'type'  => 'm,s',
				'url'   => 'https://demos.codetipi.com/zeen',
				'desc'  => 'A clean multipurpose layout ideal for lots of categories. Includes grids, video player, parallax call to action block and much more.',
			),
			array(
				'title' => 'Food',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/food-1.jpg',
				'id'    => 'food-1',
				'type'  => 'm,b',
				'url'   => 'https://demos.codetipi.com/zeen-food/',
				'desc'  => 'Share your delicious recipes in a sophisticated layout. Includes recipe schema, a call to action section, subscribe pop-up, trending blocks and much more.',
			),
			array(
				'title' => 'Minimal',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/minimal-1.jpg',
				'id'    => 'minimal-1',
				'type'  => 'm',
				'url'   => 'https://demos.codetipi.com/zeen-minimal/',
				'desc'  => 'A silky minimalist magazine perfect for creative sites that showcase beautiful imagery. Includes full-screen featured images and gallery posts.',
			),
			array(
				'title' => 'Minimal Games',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/games-1.jpg',
				'id'    => 'games-1',
				'type'  => 'm,b',
				'url'   => 'https://demos.codetipi.com/zeen-games-minimal/',
				'desc'  => 'A stunning full-screen concept with a parallax feature slider. Let\'s Info Up (included free) is used to add gorgeous info boxes and affiliate call to actions.',
			),
			array(
				'title' => 'Play',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/play-1.jpg',
				'id'    => 'play-1',
				'type'  => 'm',
				'url'   => 'https://demos.codetipi.com/zeen-play/',
				'desc'  => 'A bold concept for bigger magazines with multiple categories. Includes live Twitchstream, ajax user logins/register and affiliate reviews.',
			),
			array(
				'title' => 'Science',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/science-1.jpg',
				'id'    => 'science-1',
				'type'  => 'm',
				'url'   => 'https://demos.codetipi.com/zeen-science/',
				'desc'  => 'A gorgeous dark concept with full-screen feature grids, parallax call to action block, full-screen megamenus and much more.',
			),
			array(
				'title' => 'Blog',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/blog-1.jpg',
				'id'    => 'blog-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-blog',
				'desc'  => 'A modern blog concept with an instagram feed above the site, blocks showing trending posts, subscription prompts and a complete shop integration.',
			),
			array(
				'title' => 'Tech',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/tech-1.jpg',
				'id'    => 'tech-1',
				'type'  => 'm',
				'url'   => 'https://demos.codetipi.com/zeen-tech/',
				'desc'  => "This techy concept showcases subtle gradients, Let's Live Blog (Included free), reviews with affiliate links, trending posts, subscription prompts, video player and more.",
			),
			array(
				'title' => 'Robots',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/robots-1.jpg',
				'id'    => 'robots-1',
				'type'  => 'm',
				'url'   => 'https://demos.codetipi.com/zeen-robots/',
				'desc'  => "Another techy concept showcasing gradients, Let's Live Blog (Included free), reviews with affiliate links, trending posts, subscription prompts, video player and more.",
			),
			array(
				'title' => 'Shop',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/shop-1.jpg',
				'id'    => 'shop-1',
				'type'  => 's',
				'url'   => 'https://demos.codetipi.com/zeen-shop/',
				'desc'  => "Zeen's deep WooCommerce integration allows it to even be used as a full shop. Features the silky Tipi Quickview (included free), AJAX cart, megamenus and more.",
			),
			array(
				'title' => 'Spooked',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/horror-1.jpg',
				'id'    => 'horror-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-horror/',
				'desc'  => '',
			),
			array(
				'title' => 'Juliet',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/blog-2.jpg',
				'id'    => 'juliet-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-juliet/',
				'desc'  => '',
			),
			array(
				'title' => 'eSports',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/esports-1.jpg',
				'id'    => 'esports-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-esports/',
				'desc'  => '',
			),
			array(
				'title' => 'Adventure',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/adventure-1.jpg',
				'id'    => 'adventure-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-adventure/',
				'desc'  => '',
			),
			array(
				'title' => 'Elle',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/elle-1.jpg',
				'id'    => 'elle-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-elle/',
				'desc'  => '',
			),
			array(
				'title' => 'Berlin',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/berlin-1.jpg',
				'id'    => 'berlin-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-berlin/',
				'desc'  => '',
			),
			array(
				'title' => 'Baby',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/baby-1.jpg',
				'id'    => 'baby-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-baby/',
				'desc'  => '',
			),
			array(
				'title' => 'Husk',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/music-1.jpg',
				'id'    => 'music-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-music/',
				'desc'  => '',
			),
			array(
				'title' => 'SEO',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/seo-1.jpg',
				'id'    => 'seo-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-seo/',
				'desc'  => '',
			),
			array(
				'title' => 'Volar',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/volar-1.jpg',
				'id'    => 'volar-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-volar/',
				'desc'  => '',
			),
			array(
				'title' => 'Review',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/review-1.jpg',
				'id'    => 'review-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/letsreview/',
				'desc'  => '',
			),
			array(
				'title' => 'Jacky',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/jacky-1.jpg',
				'id'    => 'jacky-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-jacky/',
				'desc'  => '',
			),
			array(
				'title' => 'Art',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/art-1.jpg',
				'id'    => 'art-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-art/',
				'desc'  => '',
			),
			array(
				'title' => 'Freebies',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/freebies.jpg',
				'id'    => 'freebies-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-freebies/',
				'desc'  => '',
			),
			array(
				'title' => 'Symmetry',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/symmetry.jpg',
				'id'    => 'symmetry-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-symmetry/',
				'desc'  => '',
			),
			array(
				'title' => 'Newspaper',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/newspaper.jpg',
				'id'    => 'news-1',
				'type'  => 'b',
				'url'   => 'https://demos.codetipi.com/zeen-news/',
				'desc'  => '',
			),
			array(
				'title' => 'Undo',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/undo.jpg',
				'id'    => 'undo',
				'type'  => 's',
				'url'   => 'https://demos.codetipi.com/zeen-undo/',
				'desc'  => '',
			),
			array(
				'title' => 'Lyfe',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/lyfe.jpg',
				'id'    => 'lyfe',
				'type'  => 'b,m',
				'url'   => 'https://demos.codetipi.com/zeen-lyfe/',
				'desc'  => '',
			),
			array(
				'title' => 'Journal',
				'img'   => 'http' . esc_attr( $ssl ) . '://codetipi.com/wp-content/zeen-assets/img/demos/journal-1.jpg',
				'id'    => 'journal',
				'type'  => 'b,m',
				'url'   => 'https://demos.codetipi.com/zeen-journal/',
				'desc'  => '',
			),
		);

		foreach ( $output as $key => $value ) {
			$output[ $key ]['img2x'] = substr_replace( $value['img'], '@2x', -4, 0 );
		}
		return $output;
	}

	/**
	 * Data
	 *
	 * @since 1.0.0
	 */
	public static function zeen_js_data( $taxonomy = '', $id = '' ) {

		$output                  = self::zeen_data_op( $taxonomy, $id );
		$output['tax']           = ZeenPreps::zeen_data_pre_term();
		$src_uri                 = get_parent_theme_file_uri( 'assets/admin/img/' );
		$output['mobile_design'] = array(
			array(
				'url'    => esc_url( $src_uri ) . 'block-mob-design-1.png',
				'srcset' => esc_url( $src_uri ) . 'block-mob-design-1@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-mob-design-2.png',
				'srcset' => esc_url( $src_uri ) . 'block-mob-design-2@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-mob-design-3.png',
				'srcset' => esc_url( $src_uri ) . 'block-mob-design-3@2x.png',
			),
		);
		$output['columns2']      = array(
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2-2.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2-2@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2-3.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2-3@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2-4.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2-4@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2-5.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2-5@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2-6.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2-6@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-2-7.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-2-7@2x.png',
			),
		);
		$output['columns3']      = array(
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3-2.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3-2@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3-3.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3-3@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3-4.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3-4@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3-5.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3-5@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3-6.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3-6@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-3-7.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-3-7@2x.png',
			),
		);
		$output['columns4']      = array(
			array(
				'url'    => esc_url( $src_uri ) . 'block-110-4.png',
				'srcset' => esc_url( $src_uri ) . 'block-110-4@2x.png',
			),
		);
		$output['sliders']       = array(
			array(
				'url'    => esc_url( $src_uri ) . 'block-51.png',
				'srcset' => esc_url( $src_uri ) . 'block-51@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-52.png',
				'srcset' => esc_url( $src_uri ) . 'block-52@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-53.png',
				'srcset' => esc_url( $src_uri ) . 'block-53@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-54.png',
				'srcset' => esc_url( $src_uri ) . 'block-54@2x.png',
			),
		);
		$output['ctagrid']       = array(
			array(
				'url'    => esc_url( $src_uri ) . 'block-82.png',
				'srcset' => esc_url( $src_uri ) . 'block-82@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-84.png',
				'srcset' => esc_url( $src_uri ) . 'block-84@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-83.png',
				'srcset' => esc_url( $src_uri ) . 'block-83@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-86.png',
				'srcset' => esc_url( $src_uri ) . 'block-86@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-93.png',
				'srcset' => esc_url( $src_uri ) . 'block-93@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-98.png',
				'srcset' => esc_url( $src_uri ) . 'block-98@2x.png',
			),

			array(
				'url'    => esc_url( $src_uri ) . 'block-94.png',
				'srcset' => esc_url( $src_uri ) . 'block-94@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'block-97.png',
				'srcset' => esc_url( $src_uri ) . 'block-97@2x.png',
			),
		);
		$output['ctagridtitles'] = array(
			array(
				'url'    => esc_url( $src_uri ) . 'cta-title-loc-1.png',
				'srcset' => esc_url( $src_uri ) . 'cta-title-loc-1@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'cta-title-loc-2.png',
				'srcset' => esc_url( $src_uri ) . 'cta-title-loc-2@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'cta-title-loc-3.png',
				'srcset' => esc_url( $src_uri ) . 'cta-title-loc-3@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'cta-title-loc-4.png',
				'srcset' => esc_url( $src_uri ) . 'cta-title-loc-4@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'cta-title-loc-5.png',
				'srcset' => esc_url( $src_uri ) . 'cta-title-loc-5@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'cta-title-loc-6.png',
				'srcset' => esc_url( $src_uri ) . 'cta-title-loc-6@2x.png',
			),
		);
		$output['button_styles'] = array(
			array(
				'url'    => esc_url( $src_uri ) . 'button-style-1.png',
				'srcset' => esc_url( $src_uri ) . 'button-style-1@2x.png',
			),
			array(
				'url'    => esc_url( $src_uri ) . 'button-style-2.png',
				'srcset' => esc_url( $src_uri ) . 'button-style-2@2x.png',
			),
		);

		$shape_list              = zeen_shape_list( $src_uri );
		$output['bottom_shapes'] = array();
		$output['top_shapes']    = array();
		foreach ( $shape_list as $key ) {
			$output['bottom_shapes'][] = array(
				'value'  => $key['value'],
				'url'    => esc_url( $src_uri ) . 'bottom-shape-' . $key['value'] . '.png',
				'srcset' => esc_url( $src_uri ) . 'bottom-shape-' . $key['value'] . '@2x.png',
			);
			$output['top_shapes'][]    = array(
				'value'  => $key['value'],
				'url'    => esc_url( $src_uri ) . 'top-shape-' . $key['value'] . '.png',
				'srcset' => esc_url( $src_uri ) . 'top-shape-' . $key['value'] . '@2x.png',
			);
		}

		$current                 = self::zeen_active_id();
		$output['id']            = $current['id'];
		$output['classes']       = array();
		$customizer_sb_border    = ( 1 == get_theme_mod( 'sidebar_border_onoff', 1 ) ) ? get_theme_mod( 'sidebar_border_width', 1 ) . 'px ' . get_theme_mod( 'sidebar_border_color', '#dddddd' ) . ' ' . get_theme_mod( 'sidebar_border_style', 'solid' ) : '';
		$customizer_sb_bg        = zeen_skin_style( 'sidebar' );
		$output['sb_render']     = self::zeen_sidebar_render();
		$output['sb_render_mob'] = get_theme_mod( 'sidebar_mob', 1 );

		$output['load_more_1']                           = zeen_block_loader(
			array(
				'inner_only' => true,
				'echo'       => '',
				'id'         => 1,
				'mnp'        => 2,
				'loader'     => 1,
			)
		);
		$output['load_more_2']                           = zeen_block_loader(
			array(
				'inner_only' => true,
				'echo'       => '',
				'id'         => 1,
				'mnp'        => 2,
				'loader'     => 2,
			)
		);
		$output['sorter']                                = ( 'page' == $taxonomy ) ? '' : zeen_sorter(
			array(
				'term_id' => $id,
				'echo'    => '',
			)
		);
		$output['subcats']                               = ( 'page' == $taxonomy ) ? '' : zeen_subcats(
			array(
				'term_id' => $id,
				'tax'     => $taxonomy,
				'echo'    => '',
			),
			''
		);
		$output['classes']['woo_tipi_blocks_variations'] = get_theme_mod( 'woo_tipi_blocks_variations', 1 );
		$output['classes']['slider_tile_design']         = get_theme_mod( 'slider_tile_design', 1 );
		$output['classes']['classic_block_title']        = get_theme_mod( 'classic_block_title_design', 1 );
		$output['classes']['masonry_design']             = get_theme_mod( 'masonry_design', 1 );
		$output['classes']['masonry_borders']            = get_theme_mod( 'masonry_borders', 1 );
		$output['fbbg']                                  = zeen_get_bg( true );
		$output['split_design']                          = get_theme_mod( 'classic_split_design', 1 );
		$output['icons']                                 = zeen_customizer_blocks_icons();
		$output['fontfamily']                            = array();
		$webfonts                                        = array();
		$font = 'Playfair Display';
		for ( $i = 1; $i < 4; $i++ ) {
			$source = get_theme_mod( 'font_' . $i . '_source', 1 );
			if ( 2 == $source ) {
				$family = get_theme_mod( 'font_' . $i . '_typekit_custom' );
			} elseif ( 3 == $source ) {
				$family = get_theme_mod( 'font_' . $i . '_custom' );
			} else {
				if ( 2 == $i ) {
					$font = 'Open San';
				} elseif ( 3 == $i ) {
					$font = 'Montserrat';
				}
				$family = get_theme_mod( 'font_' . $i . '_google', $font );
			}
			$webfonts[ 'f' . $i ] = $family;
		}
		$output['fontfamily']['default']                       = array_unique( $webfonts );
		$output['fontfamily']['web']['arial']                  = 'Arial';
		$output['fontfamily']['web']['arialblack']             = 'Arial Black';
		$output['fontfamily']['web']['brush_script_mt']        = 'Brush Script Mt';
		$output['fontfamily']['web']['courier_new']            = 'Courier New';
		$output['fontfamily']['web']['comic_sans_ms']          = 'Comic Sans MS';
		$output['fontfamily']['web']['copperplate']            = 'Copperplate';
		$output['fontfamily']['web']['lucida_bright']          = 'Lucida Bright';
		$output['fontfamily']['web']['lucida_sans_typewriter'] = 'Lucida Sans Typewriter';
		$output['fontfamily']['web']['tahoma']                 = 'Tahoma';
		$output['fontfamily']['web']['times_new_roman']        = 'Times New Roman';
		$output['fontfamily']['web']['georgia']                = 'Georgia';
		$output['fontfamily']['web']['trebuchet_ms']           = 'Trebuchet MS';
		$output['fontfamily']['web']['palatino']               = 'Palatino';
		$output['fontfamily']['web']['papyrus']                = 'Papyrus';
		$output['fontfamily']['web']['verdana']                = 'Verdana';

		$output['fontfamily']['google'] = zeen_google_simp();

		$output['fonts']      = array(
			'subtitle' => get_theme_mod( 'typo_subtitles', 1 ),
			'body'     => get_theme_mod( 'typo_body', 2 ),
			'buttons'  => get_theme_mod( 'typo_buttons', 2 ),
			'headings' => get_theme_mod( 'typo_headings', 1 ),
		);
		$output['components'] = array(
			'class_main'               => zeen_classes(
				array(
					'location' => 'main',
					'complete' => 'off',
					'echo'     => false,
				)
			),
			'class_sb'                 => zeen_classes(
				array(
					'location' => 'sidebar',
					'complete' => 'off',
					'echo'     => false,
				)
			),
			'customizer_sb'            => $customizer_sb_border,
			'customizer_sb_bg'         => $customizer_sb_bg,
			'customizer_sb_no_styling' => esc_html__( 'The global styling for sidebars is set in the customizer. Go to Appearance > Customize > Sidebars to change the settings.', 'zeen' ),
		);

		return $output;

	}

	/**
	 * Data
	 *
	 * @since 1.0.0
	 */
	public static function zeen_data_op( $taxonomy = '', $id = '' ) {

		$output = array();

		$output['order'] = array(
			array(
				'value' => 9,
				'label' => esc_attr__( 'Default', 'zeen' ),
			),
			array(
				'value' => 0,
				'label' => esc_attr__( 'Latest', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Oldest', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Random', 'zeen' ),
			),
			array(
				'value' => 31,
				'label' => esc_attr__( 'Trending Now', 'zeen' ),
			),
			array(
				'value' => 32,
				'label' => esc_attr__( 'Trending Last 30 Days', 'zeen' ),
			),
			array(
				'value' => 6,
				'label' => esc_attr__( 'Latest Reviews', 'zeen' ),
			),
			array(
				'value' => 7,
				'label' => esc_attr__( 'By Title (A-Z)', 'zeen' ),
			),
			array(
				'value' => 8,
				'label' => esc_attr__( 'By Title (Z-A)', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Top Editor Review Scores', 'zeen' ),
			),
			array(
				'value' => 5,
				'label' => esc_attr__( 'Top User Rating Scores', 'zeen' ),
			),
		);
		if ( zeen_is_woocommerce() ) {
			$output['order'][] = array(
				'value' => 41,
				'label' => esc_attr__( 'Top Selling Products', 'zeen' ),
			);
		}
		$output['load_more'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'None', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Load More Button', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Load Left/Right Buttons', 'zeen' ),
			),
		);

		$output['pagination'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Numbers', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Load More Button', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Infinite Scroll', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Load More Once Then Infinite Scroll', 'zeen' ),
			),
		);

		$output['skin'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Transparent', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'White', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Dark', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Light Gray', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Custom', 'zeen' ),
			),
			array(
				'value' => 5,
				'label' => esc_attr__( 'Content Area Background', 'zeen' ),
			),
		);

		$output['image_animation_load'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Off', 'zeen' ),
			),
			array(
				'value' => 6,
				'label' => esc_attr__( 'Slow Pan + Zoom', 'zeen' ),
			),
			array(
				'value' => 7,
				'label' => esc_attr__( 'Zoom In', 'zeen' ),
			),
			array(
				'value' => 8,
				'label' => esc_attr__( 'Zoom Out', 'zeen' ),
			),
		);

		$output['meta_background'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Transparent', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'White', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Dark', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Custom', 'zeen' ),
			),
		);

		$output['animation_type_tile_extras'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Use Theme Options setting', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Fade In', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Slide Up', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Slide Right', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Slide Down', 'zeen' ),
			),
			array(
				'value' => 5,
				'label' => esc_attr__( 'Slide Left', 'zeen' ),
			),
			array(
				'value' => 6,
				'label' => esc_attr__( 'Slow Pan + Zoom', 'zeen' ),
			),
			array(
				'value' => 98,
				'label' => esc_attr__( 'Off', 'zeen' ),
			),
		);
		$output['animation_type_tile']        = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Use Theme Options setting', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Fade In', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Slide Up', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Slide Right', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Slide Down', 'zeen' ),
			),
			array(
				'value' => 5,
				'label' => esc_attr__( 'Slide Left', 'zeen' ),
			),
			array(
				'value' => 98,
				'label' => esc_attr__( 'Off', 'zeen' ),
			),
		);

		$output['animation_type']             = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Fade In', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Slide Up', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Slide Right', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Slide Down', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Slide Left', 'zeen' ),
			),
		);
		$output['image_hover_animation_type'] = array(
			array(
				'value' => 2,
				'label' => esc_attr__( 'Black and White', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Blur', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Sepia', 'zeen' ),
			),
			array(
				'value' => 11,
				'label' => esc_attr__( 'Blue', 'zeen' ),
			),
			array(
				'value' => 12,
				'label' => esc_attr__( 'Red', 'zeen' ),
			),
			array(
				'value' => 13,
				'label' => esc_attr__( 'Yellow', 'zeen' ),
			),
		);

		$output['skin_text_color'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Dark', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'White', 'zeen' ),
			),
		);

		$output['meta_background_text_color'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Dark', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'White', 'zeen' ),
			),
		);

		$output['button_size'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Standard', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Large', 'zeen' ),
			),
		);

		$output['divider_skin_top'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Inherit', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Custom', 'zeen' ),
			),
		);

		$output['divider_skin_bottom'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Inherit', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Custom', 'zeen' ),
			),
		);

		$shape_list               = zeen_shape_list();
		$output['divider_top']    = array();
		$output['divider_bottom'] = array();
		$output['shapes']         = array();
		foreach ( $shape_list as $key ) {
			$output['divider_top'][]    = array( 'value' => $key['value'] );
			$output['divider_bottom'][] = array( 'value' => $key['value'] );
			$output['shapes'][]         = zeen_shapes( $key['value'], '' );
		}

		$output['button_design'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Solid', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Outline', 'zeen' ),
			),
		);

		$output['button_alignment'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Left', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Center', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Right', 'zeen' ),
			),
		);

		$output['meta_location'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Classic', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Over Image On Hover (Center)', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Over Image On Hover (Bottom)', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Over Image (Center)', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Over Image (Bottom)', 'zeen' ),
			),
		);

		$output['slide_effects'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Parallax', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Slide', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Fade', 'zeen' ),
			),
		);

		$output['img_shape']        = array(
			array(
				'value' => 1,
				'label' => esc_attr__( 'Landscape', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Square', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Portrait', 'zeen' ),
			),
		);
		$output['img_shape_uncrop'] = array(
			array(
				'value' => 1,
				'label' => esc_attr__( 'Landscape', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Square', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Portrait', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'No Crop', 'zeen' ),
			),
		);
		$output['layout_slider56']  = array(
			array(
				'value' => 1,
				'label' => esc_attr__( 'Dot Navigation', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Infinite Navigation', 'zeen' ),
			),
		);

		$output['button_style_1'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Slightly Rounded', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Rounded', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Square', 'zeen' ),
			),
		);

		$output['title_location'] = array(
			array(
				'value' => 5,
				'label' => esc_attr__( 'Centered', 'zeen' ),
			),
			array(
				'value' => 4,
				'label' => esc_attr__( 'Center Left', 'zeen' ),
			),
			array(
				'value' => 6,
				'label' => esc_attr__( 'Center Right', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Bottom Left', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Bottom Centered', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Bottom Right', 'zeen' ),
			),
			array(
				'value' => 7,
				'label' => esc_attr__( 'Top Left', 'zeen' ),
			),
			array(
				'value' => 8,
				'label' => esc_attr__( 'Top Centered', 'zeen' ),
			),
			array(
				'value' => 9,
				'label' => esc_attr__( 'Top Right', 'zeen' ),
			),
		);

		$output['button_style_2'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Slightly Rounded', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Rounded', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Square', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Video', 'zeen' ),
			),
		);

		$output['wide_column_position'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Middle', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Left', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Right', 'zeen' ),
			),
		);

		$output['img_block_shape'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Default', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Landscape', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Square', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Portrait', 'zeen' ),
			),
		);

		$output['grid_shape']      = array(
			array(
				'value' => 1,
				'label' => esc_attr__( 'Default', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Square', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Portrait', 'zeen' ),
			),
		);
		$output['grid_81_shape']   = $output['grid_shape'];
		$output['grid_81_shape'][] = array(
			'value' => 4,
			'label' => esc_attr__( 'Long Rectangle', 'zeen' ),
		);

		$output['filter'] = array(
			array(
				'value' => 'posts',
				'label' => esc_attr__( 'Posts', 'zeen' ),
			),
		);

		$output['sticky']  = 'off';
		$output['desktop'] = 'on';
		$output['mobile']  = 'on';

		$output['padding_top']    = '30px';
		$output['padding_bottom'] = '30px';
		$output['padding_right']  = '0';
		$output['padding_left']   = '0';

		$output['m_padding_top']    = '30px';
		$output['m_padding_bottom'] = '30px';
		$output['m_padding_right']  = '0';
		$output['m_padding_left']   = '0';

		$output['t_padding_top']    = '30px';
		$output['t_padding_bottom'] = '30px';
		$output['t_padding_right']  = '0';
		$output['t_padding_left']   = '0';

		$output['border_top']         = '0';
		$output['border_bottom']      = '0';
		$output['border_right']       = '0';
		$output['border_left']        = '0';
		$output['border_color']       = 'rgba(0,0,0)';
		$output['border_color_2']     = 'rgba(0,0,0)';
		$output['gradient_direction'] = '30';
		$output['border_outer']       = 'on';
		$output['skin_outer']         = 'on';

		$output['border_check'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'None', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Dotted', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'Solid', 'zeen' ),
			),
			array(
				'value' => 3,
				'label' => esc_attr__( 'Dashed', 'zeen' ),
			),
			array(
				'value' => 10,
				'label' => esc_attr__( 'Gradient', 'zeen' ),
			),
		);

		$output['bg_repeat'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Cover', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Repeat', 'zeen' ),
			),
			array(
				'value' => 2,
				'label' => esc_attr__( 'No Repeat', 'zeen' ),
			),
		);

		$output['ad_type'] = array(
			array(
				'value' => 0,
				'label' => esc_attr__( 'Code', 'zeen' ),
			),
			array(
				'value' => 1,
				'label' => esc_attr__( 'Image', 'zeen' ),
			),
		);

		$output['preview'] = zeen_customizer_blocks();
		$output['layout']  = zeen_customizer_layouts();
		$output['sidebar'] = zeen_all_sidebars( array(), false, true );
		$mnp               = 2;
		if ( 'page' == $taxonomy ) {
			$count_posts = wp_count_posts();
			$found       = $count_posts->publish;
		} else {
			$post_types = get_post_types(
				array(
					'public' => true,
				)
			);
			$args       = array(
				'post_type' => $post_types,
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field'    => 'term_id',
						'terms'    => $id,
					),
				),
			);
			$qry        = new \WP_Query( $args );
			$found      = $qry->found_posts;
			wp_reset_postdata();
		}
		$mnp = ceil( $found / get_option( 'posts_per_page' ) );

		$output['pagination_output'] = array(
			zeen_pagination( 1, array( 'mnp' => $mnp ), '' ),
			zeen_pagination( 2, array(), '' ),
		);

		return $output;

	}

	/**
	 * Deep Array Search
	 *
	 * @since 1.0.0
	 */
	public static function zeen_deep_search( $needle, $haystack, $prop ) {
		foreach ( $haystack as $key => $value ) {
			if ( $value[ $prop ] === $needle ) {
				return $key;
			}
		}
		return false;
	}

	/**
	 * Posts Per Page
	 *
	 * @since 1.0.0
	 */
	private static function zeen_ppp_from_preview( $preview ) {
		if ( 66 == $preview || 79 == $preview || 92 == $preview || 95 == $preview || 78 == $preview ) {
			return 5;
		} elseif ( 83 == $preview || 86 == $preview || 62 == $preview || 61 == $preview || 93 == $preview || 98 == $preview || 91 == $preview || 42 == $preview || 74 == $preview || 41 == $preview || 51 == $preview || 22 == $preview ) {
			return 3;
		} elseif ( 82 == $preview ) {
			return 2;
		} elseif ( 81 == $preview || 3 == $preview ) {
			return 1;
		} elseif ( 64 == $preview || 53 == $preview || 56 == $preview || 69 == $preview ) {
			return 6;
		} elseif ( 54 == $preview ) {
			return 8;
		} elseif ( 65 == $preview ) {
			return 9;
		} elseif ( 46 == $preview ) {
			return 10;
		} else {
			return 4;
		}
	}

	/**
	 * Defaults
	 *
	 * @since 1.0.0
	 */
	public static function zeen_default_values( $block = array(), $taxonomy = '', $id = '' ) {

		$block['uid']     = empty( $block['uid'] ) ? zeen_uid() : $block['uid'];
		$block['preview'] = empty( $block['preview'] ) ? 1 : $block['preview'];
		$p                = $block['preview'];

		$block['mobile']  = empty( $block['mobile'] ) ? 'on' : $block['mobile'];
		$block['desktop'] = empty( $block['desktop'] ) ? 'on' : $block['desktop'];

		// DESIGN
		$block['label']        = empty( $block['label'] ) ? '' : $block['label'];
		$block['border_check'] = empty( $block['border_check'] ) ? 0 : $block['border_check'];

		$block['padding_top']     = ! isset( $block['padding_top'] ) ? '30' : $block['padding_top'];
		$block['padding_bottom']  = ! isset( $block['padding_bottom'] ) ? '30' : $block['padding_bottom'];
		$block['padding_right']   = ! isset( $block['padding_right'] ) ? ( 110 == $p ? '30' : '0' ) : $block['padding_right'];
		$block['padding_left']    = ! isset( $block['padding_left'] ) ? ( 110 == $p ? '30' : '0' ) : $block['padding_left'];
		$block['padding_type']    = ! isset( $block['padding_type'] ) ? 'px' : $block['padding_type'];
		$block['margin_bottom']   = ! isset( $block['margin_bottom'] ) ? '0' : $block['margin_bottom'];
		$block['margin_top']      = ! isset( $block['margin_top'] ) ? '0' : $block['margin_top'];
		$block['margin_type']     = ! isset( $block['margin_type'] ) ? 'px' : $block['margin_type'];
		$block['t_margin_bottom'] = ! isset( $block['t_margin_bottom'] ) ? '0' : $block['t_margin_bottom'];
		$block['t_margin_top']    = ! isset( $block['t_margin_top'] ) ? '0' : $block['t_margin_top'];
		$block['t_margin_type']   = ! isset( $block['t_margin_type'] ) ? 'px' : $block['t_margin_type'];
		$block['m_margin_bottom'] = ! isset( $block['m_margin_bottom'] ) ? '0' : $block['m_margin_bottom'];
		$block['m_margin_top']    = ! isset( $block['m_margin_top'] ) ? '0' : $block['m_margin_top'];
		$block['m_margin_type']   = ! isset( $block['m_margin_type'] ) ? 'px' : $block['m_margin_type'];
		$m_pad_default            = 30;
		$m_fs                     = '';
		if ( $p > 80 || 51 == $p ) {
			$m_pad_default = 0;
			$m_fs          = 'on';
		} elseif ( $p > 50 && $p < 57 ) {
			$m_fs = 'on';
		}
		$block['z_index']          = empty( $block['z_index'] ) ? 0 : $block['z_index'];
		$block['m_padding_top']    = ! isset( $block['m_padding_top'] ) ? $m_pad_default : $block['m_padding_top'];
		$block['m_padding_bottom'] = ! isset( $block['m_padding_bottom'] ) ? $m_pad_default : $block['m_padding_bottom'];
		$block['m_padding_right']  = ! isset( $block['m_padding_right'] ) ? ( 110 == $p ? '20' : '0' ) : $block['m_padding_right'];
		$block['m_padding_left']   = ! isset( $block['m_padding_left'] ) ? ( 110 == $p ? '20' : '0' ) : $block['m_padding_left'];
		$block['m_padding_type']   = ! isset( $block['m_padding_type'] ) ? 'px' : $block['m_padding_type'];

		$block['t_padding_top']    = ! isset( $block['t_padding_top'] ) ? '30' : $block['t_padding_top'];
		$block['t_padding_bottom'] = ! isset( $block['t_padding_bottom'] ) ? '30' : $block['t_padding_bottom'];
		$block['t_padding_right']  = ! isset( $block['t_padding_right'] ) ? ( 110 == $p ? '30' : '0' ) : $block['t_padding_right'];
		$block['t_padding_left']   = ! isset( $block['t_padding_left'] ) ? ( 110 == $p ? '30' : '0' ) : $block['t_padding_left'];
		$block['t_padding_type']   = ! isset( $block['t_padding_type'] ) ? 'px' : $block['t_padding_type'];

		$block['border_top']         = empty( $block['border_top'] ) ? '0' : $block['border_top'];
		$block['border_bottom']      = empty( $block['border_bottom'] ) ? '0' : $block['border_bottom'];
		$block['border_right']       = empty( $block['border_right'] ) ? '0' : $block['border_right'];
		$block['border_left']        = empty( $block['border_left'] ) ? '0' : $block['border_left'];
		$block['border_color']       = empty( $block['border_color'] ) ? 'rgba(0,0,0)' : $block['border_color'];
		$block['border_color_2']     = empty( $block['border_color_2'] ) ? 'rgba(0,0,0)' : $block['border_color_2'];
		$block['gradient_direction'] = ! isset( $block['gradient_direction'] ) ? '30' : $block['gradient_direction'];
		$block['border_outer']       = empty( $block['border_outer'] ) ? 'on' : $block['border_outer'];

		$skin = 32 == $p ? 1 : 0;
		if ( 46 == $p || 203 == $p ) {
			$skin = 2;
		}
		if ( 110 == $p ) {
			$skin = 5;
		}
		$block['meta_background']             = ! isset( $block['meta_background'] ) ? 0 : $block['meta_background'];
		$block['article_shadow']              = ! isset( $block['article_shadow'] ) ? '' : $block['article_shadow'];
		$block['meta_background_padding']     = ! isset( $block['meta_background_padding'] ) ? 30 : $block['meta_background_padding'];
		$block['meta_background_img_opacity'] = empty( $block['meta_background_img_opacity'] ) ? 100 : $block['meta_background_img_opacity'];
		$block['meta_background_text_color']  = empty( $block['meta_background_text_color'] ) ? 0 : $block['meta_background_text_color'];
		$block['meta_background_color']       = empty( $block['meta_background_color'] ) ? 'rgb(255,255,255)' : $block['meta_background_color'];
		$block['meta_background_img']         = empty( $block['meta_background_img'] ) ? '' : $block['meta_background_img'];

		$block['columns_m']            = empty( $block['columns_m'] ) ? '1' : $block['columns_m'];
		$block['skin']                 = ! isset( $block['skin'] ) ? $skin : $block['skin'];
		$block['skin_img_opacity']     = empty( $block['skin_img_opacity'] ) ? 100 : $block['skin_img_opacity'];
		$block['skin_text_color']      = empty( $block['skin_text_color'] ) ? 0 : $block['skin_text_color'];
		$block['skin_color']           = empty( $block['skin_color'] ) ? 'rgb(255,255,255)' : $block['skin_color'];
		$block['skin_img']             = empty( $block['skin_img'] ) ? '' : $block['skin_img'];
		$block['skin_parallax']        = empty( $block['skin_parallax'] ) ? 'off' : $block['skin_parallax'];
		$block['skin_outer']           = empty( $block['skin_outer'] ) ? 'on' : $block['skin_outer'];
		$block['divider_top_onoff']    = empty( $block['divider_top_onoff'] ) ? 'off' : $block['divider_top_onoff'];
		$block['divider_bottom_onoff'] = empty( $block['divider_bottom_onoff'] ) ? 'off' : $block['divider_bottom_onoff'];
		$block['divider_skin_bottom']  = empty( $block['divider_skin_bottom'] ) ? '' : $block['divider_skin_bottom'];
		$block['divider_skin_top']     = empty( $block['divider_skin_top'] ) ? '' : $block['divider_skin_top'];
		$block['divider_color_top']    = empty( $block['divider_color_top'] ) ? '#fff' : $block['divider_color_top'];
		$block['divider_color_botom']  = empty( $block['divider_color_botom'] ) ? '#fff' : $block['divider_color_botom'];

		$block['mobile_design']     = empty( $block['mobile_design'] ) ? 0 : $block['mobile_design'];
		$block['animation_onoff']   = empty( $block['animation_onoff'] ) ? 'off' : $block['animation_onoff'];
		$block['animation_stagger'] = empty( $block['animation_stagger'] ) ? 'off' : $block['animation_stagger'];
		$block['animation_type']    = empty( $block['animation_type'] ) ? 0 : $block['animation_type'];
		$block['divider_top']       = ! isset( $block['divider_top'] ) ? 0 : $block['divider_top'];
		$block['divider_bottom']    = ! isset( $block['divider_bottom'] ) ? 0 : $block['divider_bottom'];
		$block['m_fs']              = empty( $block['m_fs'] ) ? $m_fs : $block['m_fs'];
		$block['fs']                = empty( $block['fs'] ) ? '' : $block['fs'];
		$default_bc                 = 22 == $p || 23 == $p || 25 == $p || 32 == $p || 37 == $p || 40 == $p || 47 == $p || 46 == $p ? 'on' : 'off';
		$block['boxed_content']     = empty( $block['boxed_content'] ) ? $default_bc : $block['boxed_content'];
		$block['width']             = empty( $block['width'] ) ? 950 : $block['width'];
		$titles_on                  = ( 301 == $p || $p < 30 || 32 == $p || 41 == $p || 42 == $p || 43 == $p || 45 == $p || 48 == $p || 49 == $p || ( $p < 80 && $p > 60 ) ) ? true : '';
		if ( empty( $block['title_check'] ) ) {
			$block['title_check'] = ! empty( $titles_on ) ? 'on' : '';
		}

		if ( empty( $block['subtitle_check'] ) ) {
			$block['subtitle_check'] = ! empty( $titles_on ) ? 'on' : '';
		}
		$block['title']          = empty( $block['title'] ) ? '' : $block['title'];
		$block['subtitle']       = empty( $block['subtitle'] ) ? '' : $block['subtitle'];
		$block['pretitle_check'] = empty( $block['pretitle_check'] ) ? '' : $block['pretitle_check'];
		$block['pretitle']       = empty( $block['pretitle'] ) ? '' : $block['pretitle'];

		if ( 301 == $p ) {
			$block['sorter']            = empty( $block['sorter'] ) ? 'on' : $block['sorter'];
			$block['description_check'] = empty( $block['description_check'] ) ? 'on' : $block['description_check'];
			$block['img_bg']            = empty( $block['img_bg'] ) ? '' : $block['img_bg'];
			$block['img_bg_id']         = empty( $block['img_bg_id'] ) ? '' : $block['img_bg_id'];
		} elseif ( 300 == $p ) {
			$block['sidebar']        = empty( $block['sidebar'] ) ? 'sidebar-default' : $block['sidebar'];
			$block['layout']         = empty( $block['layout'] ) ? '1' : $block['layout'];
			$block['pagination']     = empty( $block['pagination'] ) ? 0 : $block['pagination'];
			$block['sidebar']        = empty( $block['sidebar'] ) ? 0 : $block['sidebar'];
			$block['byline_off']     = empty( $block['byline_off'] ) ? 'off' : $block['byline_off'];
			$block['cat__not_in']    = ! isset( $block['cat__not_in'] ) ? '' : $block['cat__not_in'];
			$block['excerpt_off']    = empty( $block['excerpt_off'] ) ? 'off' : $block['excerpt_off'];
			$block['excerpt_length'] = empty( $block['excerpt_length'] ) ? 12 : $block['excerpt_length'];
			$block['offset']         = empty( $block['offset'] ) ? 0 : $block['offset'];
		} elseif ( 110 == $p ) {
			$block['min_height']     = empty( $block['min_height'] ) ? 0 : $block['min_height'];
			$block['gutter_width_d'] = ! isset( $block['gutter_width_d'] ) ? ( ! isset( $block['gutter_width'] ) ? 30 : $block['gutter_width'] ) : $block['gutter_width_d'];
			$block['gutter_width_t'] = ! isset( $block['gutter_width_t'] ) ? '30' : $block['gutter_width_t'];
			$block['gutter_width_m'] = ! isset( $block['gutter_width_m'] ) ? '30' : $block['gutter_width_m'];
			$block['layout']         = empty( $block['layout'] ) ? 0 : $block['layout'];
			$block['columns']        = empty( $block['columns'] ) ? '2' : $block['columns'];
			if ( empty( $block['nested'] ) ) {
				$block['nested'] = array(
					array(),
					array(),
					array(),
					array(),
					array(),
					array(),
				);
			} else {
				foreach ( $block['nested'] as $key => $value ) {
					$block['nested'][ $key ] = self::zeen_data( $value, true );
				}
			}
		} elseif ( 101 == $p ) {
			$block['sidebar'] = empty( $block['sidebar'] ) ? 0 : $block['sidebar'];
		} elseif ( 201 == $p ) {
			$block['custom_content'] = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
		} elseif ( 202 == $p ) {
			$block['content_font_size_m'] = empty( $block['content_font_size_m'] ) ? '16' : $block['content_font_size_m'];
			$block['content_font_size_t'] = empty( $block['content_font_size_t'] ) ? '16' : $block['content_font_size_t'];
			$block['content_font_size_d'] = empty( $block['content_font_size_d'] ) ? '16' : $block['content_font_size_d'];
			$block['custom_content']      = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
			$block['duration']            = empty( $block['duration'] ) ? 10 : $block['duration'];
		} elseif ( 58 == $p ) {
			$block['gallery']      = empty( $block['gallery'] ) ? '' : $block['gallery'];
			$block['layout_onoff'] = empty( $block['layout_onoff'] ) ? 'off' : $block['layout_onoff'];
			$block['layout']       = empty( $block['layout'] ) ? '0' : $block['layout'];
			$block['img_shape']    = empty( $block['img_shape'] ) ? '2' : $block['img_shape'];
			$block['separation']   = empty( $block['separation'] ) ? '0' : $block['separation'];
			$block['columns_d']    = empty( $block['columns_d'] ) ? '2' : $block['columns_d'];
			$block['columns_t']    = empty( $block['columns_t'] ) ? '2' : $block['columns_t'];
			$block['columns_m']    = empty( $block['columns_m'] ) ? '1' : $block['columns_m'];
		} elseif ( 60 == $p ) {
			$block['parallax']                    = empty( $block['parallax'] ) ? 'off' : $block['parallax'];
			$block['layout']                      = empty( $block['layout'] ) ? '0' : $block['layout'];
			$block['height_d']                    = empty( $block['height_d'] ) ? '600' : $block['height_d'];
			$block['height_t']                    = empty( $block['height_t'] ) ? '450' : $block['height_t'];
			$block['height_m']                    = empty( $block['height_m'] ) ? '450' : $block['height_m'];
			$block['image_hover_animation_onoff'] = empty( $block['image_hover_animation_onoff'] ) ? 'off' : $block['image_hover_animation_onoff'];
			$block['image_hover_animation_type']  = empty( $block['image_hover_animation_type'] ) ? '2' : $block['image_hover_animation_type'];
			$block['meta_location']               = empty( $block['meta_location'] ) ? '0' : $block['meta_location'];
			$block['button_color']                = empty( $block['button_color'] ) ? 'rgb(20, 20, 20)' : $block['button_color'];
			$block['button_design']               = empty( $block['button_design'] ) ? '' : $block['button_design'];
			$block['img_bg_overlay']              = empty( $block['img_bg_overlay'] ) ? 'rgba(0,0,0,0)' : $block['img_bg_overlay'];
			$block['gutter_width_d']              = ! isset( $block['gutter_width_d'] ) ? '30' : $block['gutter_width_d'];
			$block['gutter_width_t']              = ! isset( $block['gutter_width_t'] ) ? '30' : $block['gutter_width_t'];
			$block['gutter_width_m']              = ! isset( $block['gutter_width_m'] ) ? '30' : $block['gutter_width_m'];
			$block['meta_padding_d']              = empty( $block['meta_padding_d'] ) ? '60' : $block['meta_padding_d'];
			$block['meta_padding_t']              = empty( $block['meta_padding_t'] ) ? '30' : $block['meta_padding_t'];
			$block['meta_padding_m']              = empty( $block['meta_padding_m'] ) ? '20' : $block['meta_padding_m'];
			$block['title_font_size_m']           = empty( $block['title_font_size_m'] ) ? '18' : $block['title_font_size_m'];
			$block['title_font_size_t']           = empty( $block['title_font_size_t'] ) ? '24' : $block['title_font_size_t'];
			$block['title_font_size_d']           = empty( $block['title_font_size_d'] ) ? '30' : $block['title_font_size_d'];
			$block['content_font_size_m']         = empty( $block['content_font_size_m'] ) ? '14' : $block['content_font_size_m'];
			$block['content_font_size_t']         = empty( $block['content_font_size_t'] ) ? '14' : $block['content_font_size_t'];
			$block['content_font_size_d']         = empty( $block['content_font_size_d'] ) ? '16' : $block['content_font_size_d'];
			for ( $i = 0; $i < 6; $i++ ) {
				$block[ 'button_text_' . $i ]         = empty( $block[ 'button_text_' . $i ] ) ? '' : $block[ 'button_text_' . $i ];
				$block[ 'ctagrid_img_' . $i ]         = empty( $block[ 'ctagrid_img_' . $i ] ) ? '' : $block[ 'ctagrid_img_' . $i ];
				$block[ 'ctagrid_img_' . $i . '_id' ] = empty( $block[ 'ctagrid_img_' . $i . '_id' ] ) ? '' : $block[ 'ctagrid_img_' . $i . '_id' ];
				$block[ 'ctagrid_url_' . $i ]         = empty( $block[ 'ctagrid_url_' . $i ] ) ? '' : $block[ 'ctagrid_url_' . $i ];
				$block[ 'ctagrid_title_' . $i ]       = empty( $block[ 'ctagrid_title_' . $i ] ) ? '' : $block[ 'ctagrid_title_' . $i ];
				$block[ 'ctagrid_subtitle_' . $i ]    = empty( $block[ 'ctagrid_subtitle_' . $i ] ) ? '' : $block[ 'ctagrid_subtitle_' . $i ];
			}
		} elseif ( 57 == $p ) {
			$block['centered']          = empty( $block['centered'] ) ? 'on' : $block['centered'];
			$block['button_color']      = empty( $block['button_color'] ) ? 'rgb(20, 20, 20)' : $block['button_color'];
			$block['button_design']     = empty( $block['button_design'] ) ? '' : $block['button_design'];
			$block['button_text_color'] = empty( $block['button_text_color'] ) ? 'rgb(230, 230, 230)' : $block['button_text_color'];
			$block['color']             = empty( $block['color'] ) ? 'rgb(255, 255, 255)' : $block['color'];
			$block['text_color']        = empty( $block['text_color'] ) ? 'rgb(20, 20, 20)' : $block['text_color'];
			$block['height']            = empty( $block['height'] ) ? '48' : $block['height'];
			$block['width']             = empty( $block['width'] ) ? '770' : $block['width'];
		} elseif ( 48 == $p || 59 == $p ) {
			$block['content_font_size_m'] = empty( $block['content_font_size_m'] ) ? zeen_customize_default( 'font_size_body' )['mobile'] : $block['content_font_size_m'];
			$block['content_font_size_t'] = empty( $block['content_font_size_t'] ) ? zeen_customize_default( 'font_size_body' )['tablet'] : $block['content_font_size_t'];
			$block['content_font_size_d'] = empty( $block['content_font_size_d'] ) ? zeen_customize_default( 'font_size_body' )['desktop'] : $block['content_font_size_d'];
			$block['custom_content']      = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
		} elseif ( 49 == $p || 45 == $p ) {
			$block['meta_padding_d']      = empty( $block['meta_padding_d'] ) ? '30' : $block['meta_padding_d'];
			$block['meta_padding_t']      = empty( $block['meta_padding_t'] ) ? '30' : $block['meta_padding_t'];
			$block['meta_padding_m']      = empty( $block['meta_padding_m'] ) ? '20' : $block['meta_padding_m'];
			$block['meta_width_d']        = empty( $block['meta_width_d'] ) ? '50' : $block['meta_width_d'];
			$block['meta_width_t']        = empty( $block['meta_width_t'] ) ? '80' : $block['meta_width_t'];
			$block['meta_width_m']        = empty( $block['meta_width_m'] ) ? '80' : $block['meta_width_m'];
			$block['content_font_size_m'] = empty( $block['content_font_size_m'] ) ? '14' : $block['content_font_size_m'];
			$block['content_font_size_t'] = empty( $block['content_font_size_t'] ) ? '16' : $block['content_font_size_t'];
			$block['content_font_size_d'] = empty( $block['content_font_size_d'] ) ? ( 45 == $p ? '18' : '20' ) : $block['content_font_size_d'];
			$block['title_font_size_m']   = empty( $block['title_font_size_m'] ) ? '18' : $block['title_font_size_m'];
			$block['title_font_size_t']   = empty( $block['title_font_size_t'] ) ? ( 45 == $p ? '20' : '30' ) : $block['title_font_size_t'];
			$block['title_font_size_d']   = empty( $block['title_font_size_d'] ) ? ( 45 == $p ? '24' : '60' ) : $block['title_font_size_d'];
			$block['custom_content']      = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
			$block['cta_content']         = empty( $block['cta_content'] ) ? '' : $block['cta_content'];
			$block['parallax']            = empty( $block['parallax'] ) ? 'off' : $block['parallax'];
			$block['img_bg_overlay']      = empty( $block['img_bg_overlay'] ) ? 'rgba(0,0,0,0)' : $block['img_bg_overlay'];
			$block['img_bg']              = empty( $block['img_bg'] ) ? '' : $block['img_bg'];
			$block['img_bg_id']           = empty( $block['img_bg_id'] ) ? '' : $block['img_bg_id'];
			$block['pretitle_check']      = empty( $block['pretitle_check'] ) ? 'on' : $block['pretitle_check'];
			$block['button_color']        = empty( $block['button_color'] ) ? 'rgb(60, 120, 216)' : $block['button_color'];
			$block['position']            = empty( $block['position'] ) ? 4 : $block['position'];
			$block['m_position']          = empty( $block['m_position'] ) ? 4 : $block['m_position'];
			$block['button_color_2']      = empty( $block['button_color_2'] ) ? '#ffffff' : $block['button_color_2'];
			$block['button_check']        = empty( $block['button_check'] ) ? 'on' : $block['button_check'];
			$block['button_text']         = empty( $block['button_text'] ) ? '' : $block['button_text'];
			$block['button_text_2']       = empty( $block['button_text_2'] ) ? '' : $block['button_text_2'];
			$block['button_check_2']      = empty( $block['button_check_2'] ) ? '' : $block['button_check_2'];
			$block['button_style_1']      = empty( $block['button_style_1'] ) ? '' : $block['button_style_1'];
			$block['button_style_2']      = empty( $block['button_style_2'] ) ? '' : $block['button_style_2'];
			$block['button_size']         = ! isset( $block['button_size'] ) ? '' : $block['button_size'];
			$block['button_design']       = empty( $block['button_design'] ) ? '' : $block['button_design'];
			$block['video_bg']            = empty( $block['video_bg'] ) ? '' : $block['video_bg'];
		} elseif ( 30 == $p ) {
			$block['video_url'] = empty( $block['video_url'] ) ? '' : $block['video_url'];
			$block['autoplay']  = empty( $block['autoplay'] ) ? 'off' : $block['autoplay'];
			$block['loop']      = empty( $block['loop'] ) ? 'off' : $block['loop'];
			$block['video_bg']  = empty( $block['video_bg'] ) ? 'off' : $block['video_bg'];
			$block['info']      = empty( $block['info'] ) ? 'on' : $block['info'];
		} elseif ( 36 == $p ) {
			$block['button_style_1']   = empty( $block['button_style_1'] ) ? '' : $block['button_style_1'];
			$block['button_size']      = ! isset( $block['button_size'] ) ? '' : $block['button_size'];
			$block['button_text']      = empty( $block['button_text'] ) ? '' : $block['button_text'];
			$block['button_design']    = empty( $block['button_design'] ) ? '' : $block['button_design'];
			$block['button_color']     = empty( $block['button_color'] ) ? 'rgb(10, 10, 10)' : $block['button_color'];
			$block['button_alignment'] = empty( $block['button_alignment'] ) ? 0 : $block['button_alignment'];
		} elseif ( 37 == $p ) {
			$block['user']     = empty( $block['user'] ) ? '' : $block['user'];
			$block['autoplay'] = empty( $block['autoplay'] ) ? true : $block['autoplay'];
		} elseif ( 38 == $p ) {
			$block['icon_size_m']  = empty( $block['icon_size_m'] ) ? 32 : $block['icon_size_m'];
			$block['icon_size_t']  = empty( $block['icon_size_t'] ) ? 32 : $block['icon_size_t'];
			$block['icon_size_d']  = empty( $block['icon_size_d'] ) ? 32 : $block['icon_size_d'];
			$block['color']        = empty( $block['color'] ) ? 'rgb(0,0,0)' : $block['color'];
			$block['separation_d'] = empty( $block['separation_d'] ) ? '20' : $block['separation_d'];
			$block['separation_t'] = empty( $block['separation_t'] ) ? '20' : $block['separation_t'];
			$block['separation_m'] = empty( $block['separation_m'] ) ? '20' : $block['separation_m'];
			$block['centered']     = empty( $block['centered'] ) ? 'on' : $block['centered'];
			$block['use_to']       = empty( $block['use_to'] ) ? 'on' : $block['use_to'];
			$social_networks       = array(
				'facebook',
				'twitter',
				'instagram',
				'pinterest',
				'youtube',
				'twitch',
				'spotify',
				'medium',
				'apple_music',
				'patreon',
				'imdb',
				'tumblr',
				'vimeo',
				'bandcamp',
				'unsplash',
				'tiktok',
				'mixcloud',
				'discord',
				'soundcloud',
				'goodreads',
				'letterboxd',
				'vk',
				'linkedin',
			);
			foreach ( $social_networks as $key ) {
				$block[ $key ]          = empty( $block[ $key ] ) ? '' : $block[ $key ];
				$block[ $key . '_url' ] = empty( $block[ $key . '_url' ] ) ? '' : $block[ $key . '_url' ];
			}
		} elseif ( 40 == $p ) {
			$block['divider_color'] = empty( $block['divider_color'] ) ? 'rgb(220,220,220)' : $block['divider_color'];
			$block['button_color']  = empty( $block['button_color'] ) ? 'rgb(29, 31, 33)' : $block['button_color'];
			$block['events_count']  = empty( $block['events_count'] ) ? 1 : $block['events_count'];
			for ( $i = 0; $i < 5; $i++ ) {
				$block[ 'event_date_' . $i ]        = empty( $block[ 'event_date_' . $i ] ) ? '' : $block[ 'event_date_' . $i ];
				$block[ 'event_img_' . $i ]         = empty( $block[ 'event_img_' . $i ] ) ? '' : $block[ 'event_img_' . $i ];
				$block[ 'event_img_' . $i . '_id' ] = empty( $block[ 'event_img_' . $i . '_id' ] ) ? '' : $block[ 'event_img_' . $i . '_id' ];
				$block[ 'event_location_' . $i ]    = empty( $block[ 'event_location_' . $i ] ) ? '' : $block[ 'event_location_' . $i ];
				$block[ 'event_url_' . $i ]         = empty( $block[ 'event_url_' . $i ] ) ? '' : $block[ 'event_url_' . $i ];
				$block[ 'event_url_title_' . $i ]   = empty( $block[ 'event_url_title_' . $i ] ) ? '' : $block[ 'event_url_title_' . $i ];
				$block[ 'event_name_' . $i ]        = empty( $block[ 'event_name_' . $i ] ) ? '' : $block[ 'event_name_' . $i ];
			}
		} elseif ( 50 == $p ) {
			$block['ad_type']           = empty( $block['ad_type'] ) ? 0 : $block['ad_type'];
			$block['ad_url']            = empty( $block['ad_url'] ) ? '' : $block['ad_url'];
			$block['new_tab']           = empty( $block['new_tab'] ) ? '' : $block['new_tab'];
			$block['small_print_check'] = empty( $block['small_print_check'] ) ? 'on' : $block['small_print_check'];
			$block['ad_img']            = empty( $block['ad_img'] ) ? '' : $block['ad_img'];
			$block['custom_content']    = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
			$block['ad_img_2x']         = empty( $block['ad_img_2x'] ) ? '' : $block['ad_img_2x'];
			$block['small_print']       = empty( $block['small_print'] ) ? '' : $block['small_print'];
		} elseif ( 31 == $p ) {
			$block['custom_content'] = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
		} elseif ( 32 == $p ) {
			$block['small_print_check'] = empty( $block['small_print_check'] ) ? 'on' : $block['small_print_check'];
			$block['small_print']       = empty( $block['small_print'] ) ? '' : $block['small_print'];
			$block['custom_content']    = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
		} elseif ( 33 == $p ) {
			$block['small_print_check'] = empty( $block['small_print_check'] ) ? 'on' : $block['small_print_check'];
			$block['small_print']       = empty( $block['small_print'] ) ? '' : $block['small_print'];
			$block['custom_content']    = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
		} elseif ( 34 == $p ) {
			$block['custom_content'] = empty( $block['custom_content'] ) ? '' : $block['custom_content'];
		} elseif ( 35 == $p ) {
			$block['img_shape']           = empty( $block['img_shape'] ) ? '' : $block['img_shape'];
			$block['img_bg_overlay']      = empty( $block['img_bg_overlay'] ) ? 'rgba(0,0,0,0)' : $block['img_bg_overlay'];
			$block['color']               = empty( $block['color'] ) ? 'rgba(0,0,0,0)' : $block['color'];
			$block['img_link']            = empty( $block['img_link'] ) ? '' : $block['img_link'];
			$block['new_tab']             = empty( $block['new_tab'] ) ? '' : $block['new_tab'];
			$block['lightbox']            = empty( $block['lightbox'] ) ? '' : $block['lightbox'];
			$block['img_bg']              = empty( $block['img_bg'] ) ? '' : $block['img_bg'];
			$block['img_bg_id']           = empty( $block['img_bg_id'] ) ? '' : $block['img_bg_id'];
			$block['parallax']            = empty( $block['parallax'] ) ? 'off' : $block['parallax'];
			$block['content_font_size_m'] = empty( $block['content_font_size_m'] ) ? zeen_customize_default( 'font_size_body' )['mobile'] : $block['content_font_size_m'];
			$block['content_font_size_t'] = empty( $block['content_font_size_t'] ) ? zeen_customize_default( 'font_size_body' )['tablet'] : $block['content_font_size_t'];
			$block['content_font_size_d'] = empty( $block['content_font_size_d'] ) ? zeen_customize_default( 'font_size_body' )['desktop'] : $block['content_font_size_d'];
		} elseif ( 39 == $p ) {
			$block['coor_2'] = empty( $block['coor_2'] ) ? '30' : $block['coor_2'];
		} else {
			$block['posts_per_page'] = empty( $block['posts_per_page'] ) ? self::zeen_ppp_from_preview( $block['preview'] ) : $block['posts_per_page'];
			if ( 22 == $p ) {
				$block['posts_per_row'] = empty( $block['posts_per_row'] ) ? 3 : $block['posts_per_row'];
			}
			if ( 25 == $p ) {
				$block['posts_per_row'] = empty( $block['posts_per_row'] ) ? 4 : $block['posts_per_row'];
			}
			if ( 56 == $p ) {
				$block['columns'] = empty( $block['columns'] ) ? 3 : $block['columns'];
			}
			$block['filter']        = empty( $block['filter'] ) ? '' : $block['filter'];
			$block['flip']          = empty( $block['flip'] ) ? '' : $block['flip'];
			$block['flipstack']     = empty( $block['flipstack'] ) ? '' : $block['flipstack'];
			$block['order']         = empty( $block['order'] ) ? 0 : $block['order'];
			$block['offset']        = empty( $block['offset'] ) ? 0 : $block['offset'];
			$block['meta_location'] = empty( $block['meta_location'] ) ? 0 : $block['meta_location'];
			$block['load_more']     = empty( $block['load_more'] ) ? 0 : $block['load_more'];
			if ( 62 == $p ) {
				$block['byline_off'] = ! isset( $block['byline_off'] ) ? 'on' : $block['byline_off'];
			} else {
				$block['byline_off'] = empty( $block['byline_off'] ) ? 'off' : $block['byline_off'];
			}
			if ( 66 == $p || 78 == $p ) {
				$block['wide_column_position'] = empty( $block['wide_column_position'] ) ? 0 : $block['wide_column_position'];
			}
			$block['fi_off']      = empty( $block['fi_off'] ) ? 'off' : $block['fi_off'];
			$excerpt              = ( 1 == $p || 2 == $p || 21 == $p || 41 == $p || 42 == $p || 43 == $p || 61 == $p || 66 == $p || 71 == $p || 74 == $p ) ? 'off' : 'on';
			$block['excerpt_off'] = empty( $block['excerpt_off'] ) ? $excerpt : $block['excerpt_off'];
			$excerpt_length       = 12;
			if ( 2 == $p ) {
				$excerpt_length        = 50;
				$block['excerpt_full'] = empty( $block['excerpt_full'] ) ? 'off' : $block['excerpt_full'];
			}
			if ( 3 == $p ) {
				$excerpt_length = 50;
			}
			$block['excerpt_length'] = empty( $block['excerpt_length'] ) ? $excerpt_length : $block['excerpt_length'];
			if ( empty( $block['filter'] ) ) {
				$block['filter'] = 'category';
				if ( ! empty( $taxonomy ) && 'taxonomy' == $taxonomy ) {
					$block['filter']    = $taxonomy;
					$block[ $taxonomy ] = $id;
				}
			}
		}
		if ( 61 == $p || 21 == $p || 74 == $p || 71 == $p || 79 == $p || 82 == $p || 83 == $p || 84 == $p ) {
			$block['img_shape'] = empty( $block['img_shape'] ) ? '' : $block['img_shape'];
		}
		if ( 46 == $p || 203 == $p ) {
			if ( 203 == $p ) {
				$block['subscribe_style'] = empty( $block['subscribe_style'] ) ? 'on' : $block['subscribe_style'];
			}
			$block['cta_content']       = empty( $block['cta_content'] ) ? '' : $block['cta_content'];
			$block['cta_content_check'] = empty( $block['cta_content_check'] ) ? 'off' : $block['cta_content_check'];
			$block['video_title']       = empty( $block['video_title'] ) ? '' : $block['video_title'];
		}
		if ( 51 == $p ) {
			$block['effect']           = empty( $block['effect'] ) ? 0 : $block['effect'];
			$block['parllax_vertical'] = empty( $block['parllax_vertical'] ) ? 'on' : $block['parllax_vertical'];
		}

		if ( 49 == $p ) {
			$block['height_d']      = empty( $block['height_d'] ) ? '800' : $block['height_d'];
			$block['height_t']      = empty( $block['height_t'] ) ? '500' : $block['height_t'];
			$block['height_m']      = empty( $block['height_m'] ) ? '500' : $block['height_m'];
			$block['height_d_type'] = empty( $block['height_d_type'] ) ? 'px' : $block['height_d_type'];
			$block['height_t_type'] = empty( $block['height_t_type'] ) ? 'px' : $block['height_t_type'];
			$block['height_m_type'] = empty( $block['height_m_type'] ) ? 'px' : $block['height_m_type'];
		}

		return $block;
	}

	public static function zeen_default( $block = array(), $taxonomy = '', $id = '' ) {

		$block = self::zeen_default_values( $block, $taxonomy, $id );

		$terms = (object) array_merge( (array) zeen_get_taxonomies( 'objects' ), (array) ZeenGetters::zeen_get_taxonomies_with_extras() );
		if ( ! empty( $block['filter'] ) ) {
			$cpts = zeen_get_post_types(
				array(
					'output'  => 'names',
					'builtin' => false,
					'shop'    => true,
				)
			);
			if ( ! in_array( $block['filter'], $cpts ) && 'posts' != $block['filter'] && 'catstags' != $block['filter'] && 'pages' != $block['filter'] && ! taxonomy_exists( $block['filter'] ) ) {
				$block['filter']   = 'category';
				$block['category'] = '';
			}
		}
		foreach ( $terms as $key ) {
			if ( empty( $block['filter'] ) ) {
				break;
			}

			if ( ! empty( $block[ $key->name ] ) ) {

				if ( false != strpos( $block[ $key->name ], ',' ) ) {
					$current = explode( ',', $block[ $key->name ] );
				} else {
					$current = array( $block[ $key->name ] );
				}

				$key_term = array();

				if ( empty( $key->data ) ) {
					// Tax
					$term_data = get_terms(
						array(
							'taxonomy' => $key->name,
						)
					);
					foreach ( $term_data as $term_data_key ) {
						if ( in_array( $term_data_key->term_id, $current ) ) {
							$key_term[] = array(
								'value' => $term_data_key->term_id,
								'label' => $term_data_key->name,
							);
						}
					}
				} else {
					$term_data     = $key->data;
					$key_term_temp = array();
					// Singular
					foreach ( $term_data as $term_data_key ) {
						if ( in_array( $term_data_key['value'], $current ) ) {
							$key_term_temp[ $term_data_key['value'] ] = array(
								'value' => $term_data_key['value'],
								'label' => $term_data_key['label'],
							);
						}
					}
					foreach ( $current as $current_key ) {
						$key_term[] = array(
							'value' => $key_term_temp[ $current_key ]['value'],
							'label' => $key_term_temp[ $current_key ]['label'],
						);
					}
				}

				$block[ $key->name ] = $key_term;

			}
		}
		if ( ! empty( $block['cat__not_in'] ) ) {
			if ( false != strpos( $block['cat__not_in'], ',' ) ) {
				$current = explode( ',', $block['cat__not_in'] );
			} else {
				$current = array( $block['cat__not_in'] );
			}
			$term_data = get_terms(
				array(
					'taxonomy' => 'category',
				)
			);
			foreach ( $term_data as $term_data_key ) {
				if ( in_array( $term_data_key->term_id, $current ) ) {
					$key_term[] = array(
						'value' => $term_data_key->term_id,
						'label' => $term_data_key->name,
					);
				}
			}
			$block['cat__not_in'] = $key_term;
		}
		return $block;
	}

	public static function zeen_save_sanitize( $blocks = array(), $id = '' ) {

		foreach ( $blocks as $block ) {
			$block = zeen_sanitizer_builder( $block, $id );
		}

		return $blocks;
	}

	public static function zeen_save_filtered( $blocks = array() ) {

		$output = '';

		foreach ( $blocks as $block ) {

			if ( ! empty( $block->nested ) ) {
				foreach ( $block->nested as $key ) {
					$output .= zeen_sanitizer_builder_filter( $key );
				}
			} else {
				$output .= zeen_sanitizer_builder_filter( $block );
			}
		}

		return $output;
	}

	public static function zeen_update( $block ) {
		$block                    = zeen_sanitizer_builder( $block );
		$block                    = json_decode( wp_json_encode( $block ), true );
		$block['only_inner']      = true;
		$block['builder_request'] = true;
		$output                   = array();
		if ( self::zeen_prew_type( $block['preview'] ) ) {
			$output = array( 'render' => tipi_builder_block( $block ) );
			if ( 'on' == $block['mobile'] ) {
				$_GET['tipi_builder_mob'] = true;
				$output['render_m']       = tipi_builder_block( $block );
				unset( $_GET['tipi_builder_mob'] );
			}
		}
		return $output;
	}

	public static function zeen_new( $block, $taxonomy = '', $id = '' ) {
		$preview = $block->preview;
		$new     = array( 'preview' => $preview );
		if ( ! empty( $block->columns ) ) {
			$new['columns'] = $block->columns;
		}
		$block                    = self::zeen_default_values( $new, $taxonomy, $id );
		$block['only_inner']      = true;
		$block['builder_request'] = true;
		if ( self::zeen_prew_type( $preview ) ) {
			$block['render']          = tipi_builder_block( $block );
			$_GET['tipi_builder_mob'] = true;
			$block['render_m']        = tipi_builder_block( $block );
			unset( $_GET['tipi_builder_mob'] );
		}
		$block = self::zeen_default( $block, $taxonomy, $id );
		return $block;
	}

	private static function zeen_prew_type( $preview ) {
		// Also update rendered blocks
		if ( $preview > 49 || 41 == $preview || 31 == $preview || 32 == $preview || 34 == $preview || 35 == $preview || 36 == $preview || 47 == $preview || 42 == $preview || 43 == $preview || 46 == $preview || 61 == $preview || 71 == $preview || 79 == $preview || $preview < 30 ) {
			return true;
		}
		return false;
	}

	public static function zeen_data( $content, $jsoned = '' ) {
		if ( empty( $jsoned ) ) {
			$content = self::zeen_content_json( $content );
		}
		if ( empty( $content ) ) {
			return array();
		}
		foreach ( $content as $key => $value ) {
			$content[ $key ] = self::zeen_default( $value );
			if ( self::zeen_prew_type( $key['preview'] ) ) {
				$value['only_inner']      = true;
				$value['builder_request'] = true;

				if ( ! empty( $value['filter'] ) ) {
					$cpts = zeen_get_post_types(
						array(
							'output'  => 'names',
							'builtin' => false,
							'shop'    => true,
						)
					);
					if ( ! in_array( $value['filter'], $cpts ) && 'posts' != $value['filter'] && 'pages' != $value['filter'] ) {
						if ( ! taxonomy_exists( $value['filter'] ) ) {
							$value['filter']   = 'category';
							$value['category'] = '';
						} elseif ( ! empty( $value[ $value['filter'] ] ) ) {
							$the_tax = $value[ $value['filter'] ];
							if ( false != strpos( $the_tax, ',' ) ) {
								$current = explode( ',', $the_tax );
								$current = $current[0];
							} else {
								$current = $the_tax;
							}
							if ( ! term_exists( (int) $current, $value['filter'] ) ) {
								$value[ $value['filter'] ] = '';
							}
						}
					} else {
						$reset = false;
						if ( ! empty( $value[ $value['filter'] ] ) ) {
							$posts = $value[ $value['filter'] ];
							if ( false != strpos( $posts, ',' ) ) {
								$posts = explode( ',', $posts );
							} else {
								$posts = array( $posts );
							}
							foreach ( $posts as $checker ) {
								if ( ! get_post_status( $checker ) ) {
									$reset = true;
								}
							}
						}
						if ( ! empty( $reset ) ) {
							$value['filter']           = 'category';
							$value['category']         = '';
							$value[ $value['filter'] ] = '';
						}
					}
				}

				$_GET['tipi_builder_call'] = true;
				$content[ $key ]['render'] = tipi_builder_block( $value );
				unset( $_GET['tipi_builder_call'] );
				$_GET['tipi_builder_mob']    = true;
				$content[ $key ]['render_m'] = tipi_builder_block( $value );
				unset( $_GET['tipi_builder_mob'] );
			}
			$content[ $key ]['refreshing'] = false;
		}
		return $content;
	}

	private static function zeen_content_json( $content ) {
		$output = array();
		if ( ! empty( $content ) ) {
			$output = json_decode( $content, true );
		}

		return $output;
	}

	public static function zeen_print_content( $content, $jsoned = '' ) {
		if ( empty( $jsoned ) ) {
			$content = self::zeen_content_json( $content );
		}
		if ( empty( $content ) ) {
			return;
		}
		foreach ( $content as $key ) {
			echo tipi_builder_block( $key );
		}
	}

	public static function zeen_get_first_block( $content = '', $jsoned = '' ) {
		if ( empty( $content ) ) {
			return;
		}
		if ( empty( $jsoned ) ) {
			$content = self::zeen_content_json( $content );
		}
		if ( ! empty( $content[0] ) ) {
			return $content[0];
		}
	}
	public static function zeen_get_first_image( $args = array() ) {
		if ( is_singular() || zeen_is_shop() ) {
			$pid     = empty( $args['pid'] ) ? ( zeen_is_shop() ? get_option( 'woocommerce_shop_page_id' ) : get_the_ID() ) : $args['pid'];
			$content = get_post_meta( $pid, 'tipi_builder_data', true );
		}
		if ( empty( $content ) ) {
			return;
		}
		$device     = empty( $args['device_check'] ) ? 'desktop' : $args['device_check'];
		$block_type = ! empty( $args['block_type'] ) ? $args['block_type'] : 'image';
		$content    = self::zeen_content_json( $content );
		$output     = '';
		if ( ! empty( $device ) ) {
			foreach ( $content as $key ) {
				if ( ( 'desktop' === $device && 'on' != $key['desktop'] ) || ( 'mobile' === $device && 'on' != $key['mobile'] ) ) {
					continue;
				}
				$p = (int) $key['preview'];
				if ( 110 === $p ) {
					foreach ( $key['nested'] as $columns ) {
						foreach ( $columns as $block ) {
							if ( ( 'desktop' === $device && 'off' == $block['desktop'] ) || ( 'mobile' === $device && 'off' == $block['mobile'] ) ) {
								continue;
							}
							$output = self::zeen_get_first_image_block( $block );
							if ( 'skip' === $output ) {
								continue;
							}
							if ( ! empty( $output ) ) {
								return $output;
							}
						}
					}
				} else {
					$output = self::zeen_get_first_image_block( $key );
					if ( 'skip' === $output ) {
						continue;
					}
				}
				if ( ! empty( $output ) && 'skip' !== $output ) {
					return $output;
				}
				break;
			}
		}
	}

	public static function zeen_get_first_image_block( $block = array() ) {
		$skip     = array( 101, 201, 48, 59 );
		$p        = (int) $block['preview'];
		$wp_query = $p < 30 || ( $p > 50 && $p < 100 ) || ( $p > 40 && $p < 45 );
		if ( in_array( $p, $skip ) ) {
			return 'skip';
		}
		$images = array( 35, 45, 49 );
		if ( in_array( $p, $images ) ) {
			if ( ! empty( $block['img_bg_id'] ) ) {
				return array(
					'width'  => 'full',
					'height' => 'full',
					'fi'     => $block['img_bg_id'],
				);
			}
		}
	}

	public static function zeen_block_finder( $pid = '', $needle = '', $key_check = array(), $content = '' ) {
		$content     = empty( $content ) ? get_post_meta( $pid, 'tipi_builder_data', true ) : $content;
		$content     = self::zeen_content_json( $content );
		$needle_type = $needle;
		if ( 'slider' == $needle ) {
			$needle = array( 51, 52, 53, 54, 56, 58 );
		}
		if ( 'lightbox' == $needle ) {
			$needle = array( 35, 58 );
		}
		if ( empty( $content ) ) {
			return;
		}
		if ( ! empty( $key_check ) ) {
			foreach ( $content as $key ) {
				if ( ! empty( $key[ $key_check['field'] ] ) && $key[ $key_check['field'] ] == $key_check['value'] ) {
					$found = true;
					break;
				}
				if ( 110 == $key['preview'] && ! empty( $key['nested'] ) ) {
					foreach ( $key['nested'] as $nests ) {
						foreach ( $nests as $nest ) {
							if ( ! empty( $nest[ $key_check['field'] ] ) && $nest[ $key_check['field'] ] == $key_check['value'] ) {
								$found = true;
								break 2;
							}
						}
					}
				}
			}
		} else {
			foreach ( $content as $key ) {
				if ( in_array( $key['preview'], $needle ) ) {
					if ( 'lightbox' == $needle_type ) {
						if ( ! empty( $key['lightbox'] ) && 'on' === $key['lightbox'] ) {
							$found = true;
						}
					} else {
						$found = true;
					}
					break;
				}
				if ( 110 == $key['preview'] && ! empty( $key['nested'] ) ) {
					foreach ( $key['nested'] as $nests ) {
						foreach ( $nests as $nest ) {
							if ( in_array( $nest['preview'], $needle ) ) {
								if ( 'lightbox' == $needle_type ) {
									if ( ! empty( $nest['lightbox'] ) && 'on' === $nest['lightbox'] ) {
										$found = true;
									}
								} else {
									$found = true;
								}
								break 3;
							}
						}
					}
				}
			}
		}
		if ( ! empty( $found ) ) {
			return true;
		}
	}

	public static function zeen_style( $content, $responsive = '' ) {
		$content = self::zeen_content_json( $content );
		$output  = '';
		if ( empty( $content ) ) {
			return;
		}
		foreach ( $content as $key ) {
			$key['styling'] = true;
			$args           = tipi_builder_block( $key );
			if ( 300 == $args['p'] ) {
				continue;
			}
			if ( 110 == $args['p'] ) {
				$nested_count = count( $key['nested'] );
				$output      .= self::zeen_style_data( $args, $responsive );
				for ( $i = 0; $i < $nested_count; $i++ ) {
					foreach ( $key['nested'][ $i ] as $nest_key ) {
						$nest_key['styling'] = true;
						$nest_args           = tipi_builder_block( $nest_key );
						if ( 101 != $nest_args['p'] ) {
							$output .= self::zeen_style_data( $nest_args, $responsive );
						}
					}
				}
			} else {
				$output .= self::zeen_style_data( $args, $responsive );
			}
		}

		return $output;
	}

	private static function zeen_responsive_option( $options = array(), $args = array(), $ext = 'd' ) {
		$output = '';
		$args['p'] = empty( $args['p'] ) ? 0 : $args['p'];
		foreach ( $options as $option => $responsive_value ) {
			$type = empty( $responsive_value['type'] ) ? '' : $responsive_value['type'];
			if ( 'gap' === $type ) {
				if ( isset( $args[ 'gutter_width_' . $ext ] ) && 110 == $args['p'] ) {
					$columns_ext = 'm' == $ext ? '_m' : '';
					$columns     = empty( $args[ 'columns' . $columns_ext ] ) ? 1 : (int) $args[ 'columns' . $columns_ext ];
					if ( 4 == $columns ) {
						$mat = $args[ 'gutter_width_' . $ext ] * 3 / $columns;
						if ( ! empty( $mat ) ) {
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col {';
							$output .= 'width: calc( 100% / 4 - ' . (int) $mat . 'px);';
							$output .= '}';
						}
					} elseif ( 2 == $columns || 3 == $columns ) {
						$mat  = 2 == $columns ? $args[ 'gutter_width_' . $ext ] / $columns : $args[ 'gutter_width_' . $ext ] * 2 / $columns;
						$calc = 2 == $columns ? 50 : 33.33333;
						if ( 'm' == $ext ) {
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col {';
							$output .= 'width: calc( ' . (int) $calc . '% - ' . (int) $mat . 'px);';
							$output .= '}';
						} else {
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col-sz-33 {';
							$output .= 'width: calc( 33.33333% - ' . (int) $mat . 'px);';
							$output .= '}';
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col-sz-46 {';
							$output .= 'width: calc( 46.666666% - ' . (int) $mat . 'px);';
							$output .= '}';
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col-sz-66 {';
							$output .= 'width: calc( 66.666666% - ' . (int) $mat . 'px);';
							$output .= '}';
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col-sz-20 {';
							$output .= 'width: calc( 20% - ' . (int) $mat . 'px);';
							$output .= '}';
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col-sz-50 {';
							$output .= 'width: calc( 50% - ' . (int) $mat . 'px);';
							$output .= '}';
							$output .= '#block-wrap-' . (int) $args['uid'] . ' .zeen-col-sz-25 {';
							$output .= 'width: calc( 25% - ' . (int) $mat . 'px);';
							$output .= '}';
						}
					}
				}
			} else {
				if ( $option == $args['p'] ) {
					foreach ( $responsive_value as $key => $value ) {
						if ( 'font-size' == $value['css'] && $args[ $value['field'] . '_' . $ext ] < 5 ) {
							continue;
						}
						if ( empty( $value['type'] ) ) {
							$type = empty( $args[ $value['field'] . '_' . $ext . '_type' ] ) ? 'px' : $args[ $value['field'] . '_' . $ext . '_type' ];
						} else {
							$type = $value['type'];
						}
						$output .= '#block-wrap-' . (int) $args['uid'] . ' ' . $value['class'] . '{';
						$output .= $value['css'] . ':' . (int) $args[ $value['field'] . '_' . $ext ] . esc_attr( $type ) . ';';
						$output .= '}';
					}
				}
			}
		}
		return $output;
	}

	private static function zeen_style_data( $args, $responsive = '' ) {
		$output             = '';
		$padding_off        = 49 == $args['p'] || 39 == $args['p'];
		$responsive_options = array(
			60  => array(
				array(
					'class' => '.title *',
					'field' => 'title_font_size',
					'css'   => 'font-size',
				),
				array(
					'class' => '.contents',
					'field' => 'height',
					'css'   => 'height',
				),
				array(
					'class' => '.meta',
					'field' => 'meta_padding',
					'css'   => 'padding',
				),
				array(
					'class' => '.contents',
					'field' => 'gutter_width',
					'css'   => '--gap',
				),
			),
			59  => array(
				array(
					'class' => '.block-html-content',
					'field' => 'content_font_size',
					'css'   => 'font-size',
				),
			),
			35  => array(
				array(
					'class' => '.title',
					'field' => 'content_font_size',
					'css'   => 'font-size',
				),
			),
			49  => array(
				array(
					'class' => '.cta-content',
					'field' => 'content_font_size',
					'css'   => 'font-size',
				),
				array(
					'class' => '.contents',
					'field' => 'height',
					'css'   => 'height',
				),
				array(
					'class' => '.cta-title *',
					'field' => 'title_font_size',
					'css'   => 'font-size',
				),
				array(
					'class' => '.title-area',
					'field' => 'meta_padding',
					'css'   => 'padding',
				),
				array(
					'class' => '.title-area',
					'field' => 'meta_width',
					'type'  => '%',
					'css'   => 'width',
				),
			),
			45  => array(
				array(
					'class' => '.mini-cta-title *',
					'field' => 'title_font_size',
					'css'   => 'font-size',
				),
				array(
					'class' => '.mini-cta-subtitle *',
					'field' => 'content_font_size',
					'css'   => 'font-size',
				),
			),
			38  => array(
				array(
					'class' => '.menu-icons--wrap',
					'field' => 'icon_size',
					'css'   => 'font-size',
				),
				array(
					'class' => '.menu-icons--wrap a',
					'field' => 'separation',
					'css'   => 'padding-left',
				),
				array(
					'class' => '.menu-icons--wrap a',
					'field' => 'separation',
					'css'   => 'padding-right',
				),
			),
			202 => array(
				array(
					'class' => '.contents *',
					'field' => 'content_font_size',
					'css'   => 'font-size',
				),
			),
			110 => array(
				'type' => 'gap',
			),
		);

		if ( 'm' == $responsive ) {
			if ( ! empty( $args['min_height'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' {';
				$output .= 'min-height: ' . (int) $args['min_height'] . 'vh;';
				$output .= '}';
			}
			if ( 4 == $args['skin'] ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= 'on' == $args['skin_outer'] ? ':not(.skin-inner)' : '.skin-inner > .tipi-row-inner-style';
				$output .= ' {';
				$output .= 'background-color: ' . esc_attr( $args['skin_color'] ) . ';';
				$output .= '}';
				if ( ! zeen_is_light( $args['skin_color'] ) ) {
					$skin_17 = substr( $args['skin_color'], 0, 1 ) === '#' ? zeen_color_manipulation( $args['skin_color'], 5 ) : $args['skin_color'];
					$output .= '#block-wrap-' . (int) $args['uid'];
					$output .= 'on' == $args['skin_outer'] ? ':not(.skin-inner)' : '.skin-inner > .tipi-row-inner-style';
					$output .= ' .block-wrap .mask {';
					$output .= 'background-color: ' . esc_attr( $skin_17 ) . ';';
					$output .= '}';
				}
				if ( ! empty( $args['skin_img'] ) ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .bg { background-image: url(' . esc_attr( $args['skin_img'] ) . '); opacity: ' . (float) ( $args['skin_img_opacity'] / 100 ) . '}';
				}
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .tipi-row-inner-box{background: none;}';
			}
			if ( 4 == $args['meta_background'] && empty( $args['meta_location'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' .preview-mini-wrap {';
				$output .= 'background-color: ' . esc_attr( $args['meta_background_color'] ) . ';';
				$output .= '}';

				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' .stack-design-3 .meta {';
				$output .= 'background-color: ' . esc_attr( $args['meta_background_color'] ) . ';';
				$output .= '}';
				if ( ! empty( $args['meta_background_img'] ) ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .preview-mini-wrap:before { background-image: url(' . esc_attr( $args['meta_background_img'] ) . '); opacity: ' . (float) ( $args['meta_background_img_opacity'] / 100 ) . '}';
				}
			}
			if ( 40 == $args['p'] && ! empty( $args['divider_color'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .event__wrap { border-color: ' . esc_attr( $args['divider_color'] ) . ';}';
			}
			if ( 202 == $args['p'] ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .block-html-content { animation-duration: ' . esc_attr( $args['duration'] ) . 's;}';
			}
			if ( ! empty( $args['divider_bottom_onoff'] ) && 'on' == $args['divider_bottom_onoff'] ) {
				if ( ! empty( $args['divider_skin_bottom'] ) && ! empty( $args['divider_color_bottom'] ) && 4 == $args['divider_skin_bottom'] ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .splitter--bottom svg g { fill: ' . esc_attr( $args['divider_color_bottom'] ) . ';}';
				}
			}
			if ( ! empty( $args['divider_top_onoff'] ) && 'on' == $args['divider_top_onoff'] ) {
				if ( ! empty( $args['divider_skin_top'] ) && ! empty( $args['divider_color_top'] ) && 4 == $args['divider_skin_top'] ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .splitter--top svg g { fill: ' . esc_attr( $args['divider_color_top'] ) . ';}';
				}
			}
		}

		if ( 39 == $args['p'] ) {
			if ( 'dt' == $responsive ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .tipi-row-inner-style {';
				$output .= 'height: ' . (int) $args['padding_top'] . 'px;';
				if ( ! empty( $args['margin_top'] ) ) {
					$output .= 'margin-top: ' . (int) $args['margin_top'] . zeen_sanitizer_measurement_type( $args['margin_type'] ) . ';';
				}
				if ( ! empty( $args['margin_bottom'] ) ) {
					$output .= 'margin-bottom: ' . (int) $args['margin_bottom'] . zeen_sanitizer_measurement_type( $args['margin_type'] ) . ';';
				}
				$output .= '}';
			} elseif ( 'm' == $responsive ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .tipi-row-inner-style {';
				$output .= 'height: ' . (int) $args['m_padding_top'] . 'px;';
				if ( ! empty( $args['t_margin_top'] ) ) {
					$output .= 'margin-top: ' . (int) $args['t_margin_top'] . zeen_sanitizer_measurement_type( $args['t_margin_type'] ) . ';';
				}
				if ( ! empty( $args['t_margin_bottom'] ) ) {
					$output .= 'margin-bottom: ' . (int) $args['t_margin_bottom'] . zeen_sanitizer_measurement_type( $args['t_margin_type'] ) . ';';
				}
				$output .= '}';
			} else {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .tipi-row-inner-style {';
				$output .= 'height: ' . (int) $args['t_padding_top'] . 'px;';
				if ( ! empty( $args['m_margin_top'] ) ) {
					$output .= 'margin-top: ' . (int) $args['m_margin_top'] . zeen_sanitizer_measurement_type( $args['m_margin_type'] ) . ';';
				}
				if ( ! empty( $args['m_margin_bottom'] ) ) {
					$output .= 'margin-bottom: ' . (int) $args['m_margin_bottom'] . zeen_sanitizer_measurement_type( $args['m_margin_type'] ) . ';';
				}
				$output .= '}';
			}
			return $output;
		}
		if ( 58 == $args['p'] ) {
			$args['separation'] = empty( $args['separation'] ) ? 0 : $args['separation'];
			if ( 'dt' == $responsive ) {
				if ( ! ( ! empty( $args['layout_onoff'] ) && 'on' == $args['layout_onoff'] ) ) {
					$args['columns_d'] = empty( $args['columns_d'] ) ? 1 : $args['columns_d'];
					$output           .= '#block-wrap-' . (int) $args['uid'] . ' .gallery-block__image {width:calc((100% - ' . esc_attr( $args['separation'] ) . 'px) / ' . (int) $args['columns_d'] . '); }';
				}
			} elseif ( 't' == $responsive ) {
				if ( ! ( ! empty( $args['layout_onoff'] ) && 'on' == $args['layout_onoff'] ) ) {
					$args['columns_t'] = empty( $args['columns_t'] ) ? 1 : $args['columns_t'];
					$output           .= '#block-wrap-' . (int) $args['uid'] . ' .gallery-block__image {width:calc((100% - ' . esc_attr( $args['separation'] ) . 'px) / ' . (int) $args['columns_t'] . '); }';
				}
			} elseif ( 'm' == $responsive ) {
				$args['columns_m'] = empty( $args['columns_m'] ) ? 1 : $args['columns_m'];
				if ( ! empty( $args['separation'] ) ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .gallery-block__image { margin-right:' . esc_attr( $args['separation'] ) . 'px; }';
				}
				if ( ! empty( $args['layout_onoff'] ) && 'on' == $args['layout_onoff'] ) {
					$layout  = empty( $args['layout'] ) ? 1 : $args['layout'] + 1;
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .gallery-block__image {width:calc((100% - ' . esc_attr( $args['separation'] ) . 'px) / ' . (int) $layout . '); }';
				} else {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .gallery-block__image {width:calc((100% - ' . esc_attr( $args['separation'] ) . 'px) / ' . (int) $args['columns_m'] . '); }';
				}
			}
		}

		if ( 35 == $args['p'] ) {
			if ( 'm' == $responsive ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .cta-title-bg { background:' . esc_attr( $args['color'] ) . '; }';
			}
		}
		if ( 38 == $args['p'] ) {
			if ( 'm' == $responsive ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .menu-icons--wrap a { color:' . esc_attr( $args['color'] ) . '; }';
			}
		}
		if ( 'dt' == $responsive ) {
			if ( empty( $padding_off )
				&& (
					$args['t_padding_top'] != $args['padding_top']
					|| $args['t_padding_right'] != $args['padding_right']
					|| $args['t_padding_left'] != $args['padding_left']
					|| $args['t_padding_bottom'] != $args['padding_bottom']
				)
			) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' > .tipi-row-inner-style';
				$output .= '{';
				$output .= 'padding:' . (int) $args['padding_top'] . zeen_sanitizer_measurement_type( $args['padding_type'] ) . ' ' . (int) $args['padding_right'] . zeen_sanitizer_measurement_type( $args['padding_type'] ) . ' ' . (int) $args['padding_bottom'] . zeen_sanitizer_measurement_type( $args['padding_type'] ) . ' ' . (int) $args['padding_left'] . zeen_sanitizer_measurement_type( $args['padding_type'] ) . ';';
				$output .= '}';
			}

			if ( ! empty( $args['meta_background'] ) && $args['meta_background'] > 0 && ! empty( $args['meta_background_padding'] ) && empty( $args['meta_location'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . '.meta-skin-base .meta {';
				$output .= 'padding: ' . (int) $args['meta_background_padding'] . 'px;';
				$output .= '}';
			}

			if ( ! empty( $args['margin_top'] ) || ! empty( $args['margin_bottom'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' > .tipi-row-inner-style';
				$output .= '{';
				if ( ! empty( $args['margin_top'] ) ) {
					$output .= 'margin-top: ' . (int) $args['margin_top'] . zeen_sanitizer_measurement_type( $args['margin_type'] ) . ';';
				}
				if ( ! empty( $args['margin_bottom'] ) ) {
					$output .= 'margin-bottom: ' . (int) $args['margin_bottom'] . zeen_sanitizer_measurement_type( $args['margin_type'] ) . ';';
				}
				$output .= '}';
			}

			$width = empty( $args['width'] ) ? '' : $args['width'];

			if ( ! empty( $args['fs'] ) && 'off' != $args['fs'] && ! empty( $args['fs_limit'] ) && 'on' == $args['fs_limit'] && ! empty( $width ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' {';
				$output .= 'max-width: ' . (int) $width . 'px;';
				$output .= '}';
			}

			if ( 60 == $args['p'] ) {
				$site_width = get_theme_mod( 'site_width', 1230 );
				$output    .= '#block-wrap-' . (int) $args['uid'] . '.tipi-fs--contents-boxed .contents {';
				$output    .= 'max-width:calc(' . (int) $site_width . 'px + var(--gap) );';
				$output    .= '}';
			}
			$output .= self::zeen_responsive_option( $responsive_options, $args );
		} elseif ( '767d' == $responsive ) {
			$output .= self::zeen_responsive_option( $responsive_options, $args, 'm' );
		} elseif ( '1239d' == $responsive ) {
			$output .= self::zeen_responsive_option( $responsive_options, $args, 't' );
		} elseif ( 't' == $responsive ) {
			if ( ! empty( $args['t_margin_top'] ) || ! empty( $args['t_margin_bottom'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' > .tipi-row-inner-style';
				$output .= '{';
				if ( ! empty( $args['t_margin_top'] ) ) {
					$output .= 'margin-top: ' . (int) $args['t_margin_top'] . zeen_sanitizer_measurement_type( $args['t_margin_type'] ) . ';';
				}
				if ( ! empty( $args['t_margin_bottom'] ) ) {
					$output .= 'margin-bottom: ' . (int) $args['t_margin_bottom'] . zeen_sanitizer_measurement_type( $args['t_margin_type'] ) . ';';
				}
				$output .= '}';
			}
			if ( empty( $padding_off )
				&& (
					$args['t_padding_top'] != $args['m_padding_top']
					|| $args['t_padding_right'] != $args['m_padding_right']
					|| $args['t_padding_left'] != $args['m_padding_left']
					|| $args['t_padding_bottom'] != $args['m_padding_bottom']
				)
			) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' > .tipi-row-inner-style';
				$output .= '{';
				$output .= 'padding:' . (int) $args['t_padding_top'] . zeen_sanitizer_measurement_type( $args['t_padding_type'] ) . ' ' . (int) $args['t_padding_right'] . zeen_sanitizer_measurement_type( $args['t_padding_type'] ) . ' ' . (int) $args['t_padding_bottom'] . zeen_sanitizer_measurement_type( $args['t_padding_type'] ) . ' ' . (int) $args['t_padding_left'] . zeen_sanitizer_measurement_type( $args['t_padding_type'] ) . ';';
				$output .= '}';
			}
		} else {
			if ( ! empty( $args['meta_background'] ) && $args['meta_background'] > 0 && ! empty( $args['meta_background_padding'] ) && $args['meta_background_padding'] > 30 && empty( $args['meta_location'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . '.meta-skin-base .meta {';
				$output .= 'padding: 30px;';
				$output .= '}';
			}

			if ( ! empty( $args['z_index'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= '{';
				$output .= 'position:relative; z-index:' . (int) $args['z_index'] . ';';
				$output .= '}';

			}
			if ( ! empty( $args['m_margin_top'] ) || ! empty( $args['m_margin_bottom'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' > .tipi-row-inner-style';
				$output .= '{';
				if ( ! empty( $args['m_margin_top'] ) ) {
					$output .= 'margin-top: ' . (int) $args['m_margin_top'] . zeen_sanitizer_measurement_type( $args['m_margin_type'] ) . ';';
				}
				if ( ! empty( $args['m_margin_bottom'] ) ) {
					$output .= 'margin-bottom: ' . (int) $args['m_margin_bottom'] . zeen_sanitizer_measurement_type( $args['m_margin_type'] ) . ';';
				}
				$output .= '}';
			}

			if ( 57 == $args['p'] ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .search {';
				$output .= 'height: ' . (int) $args['height'] . 'px; line-height: ' . (int) $args['height'] . 'px; max-width: ' . (int) $args['width'] . 'px; }';

				$output     .= '#block-wrap-' . (int) $args['uid'] . ' .search-submit { width: ' . (int) $args['height'] . 'px; }';
				$search_type = 1 == $args['button_design'] ? 'border-color' : 'background';
				$output     .= '#block-wrap-' . (int) $args['uid'] . ' .search-submit { background-color: ' . $args['button_color'] . '; color: ' . $args['button_text_color'] . '; }';
				$output     .= '#block-wrap-' . (int) $args['uid'] . ' .search-field { ' . $search_type . ': ' . $args['color'] . '; color: ' . $args['text_color'] . '; }';
			} elseif ( ! empty( $args['height'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .tipi-row-inner-style {';
				$output .= 'height: ' . (int) $args['height'] . 'px;';
				$output .= '}';
			}

			if ( ! empty( $args['img_bg_overlay'] ) && ! zeen_rgba_transparent_check( $args['img_bg_overlay'] ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .mask-overlay {';
				$output .= 'background-color: ' . esc_attr( $args['img_bg_overlay'] ) . '; ';
				$output .= '}';
			}
			if ( 36 == $args['p'] || 40 == $args['p'] || 60 == $args['p'] ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .tipi-button {';
				if ( ! empty( $args['button_design'] ) && 1 == $args['button_design'] ) {
					$output .= 'border-color: ' . esc_attr( $args['button_color'] ) . '; ';
				} else {
					$output .= 'background-color: ' . esc_attr( $args['button_color'] ) . '; ';
				}
				$output .= '}';
			}
			if ( 49 == $args['p'] || 45 == $args['p'] ) {
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .cta-button-1 {';
				if ( ! empty( $args['button_design'] ) && 1 == $args['button_design'] ) {
					$output .= 'border-color: ' . esc_attr( $args['button_color'] ) . '; ';
				} else {
					$output .= 'background-color: ' . esc_attr( $args['button_color'] ) . '; ';
				}
				$output .= '}';
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .cta-button-2 {';
				$output .= 'border-color: ' . esc_attr( $args['button_color_2'] ) . '; ';
				$output .= 'color: ' . esc_attr( $args['button_color_2'] ) . '; ';
				$output .= '}';
				$output .= '#block-wrap-' . (int) $args['uid'] . ' .cta-button-2.tipi-button-style-2 .video-icon {';
				$output .= 'background-color: ' . esc_attr( $args['button_color_2'] ) . '; ';
				$output .= '}';
				if ( ! empty( $args['img_bg_id'] ) ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' .bg { background-image: url(' . esc_url( wp_get_attachment_url( $args['img_bg_id'] ) ) . ');}';
				}
			}
			if ( ! empty( $args['img_bg'] ) ) {
				if ( 301 == $args['p'] ) {
					$output .= '#block-wrap-' . (int) $args['uid'] . ' { background-image: url(' . esc_url( $args['img_bg'] ) . '); }';
				}
			}
			if ( empty( $padding_off ) ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				$output .= ' > .tipi-row-inner-style';
				$output .= '{';
				$output .= 'padding:' . (int) $args['m_padding_top'] . zeen_sanitizer_measurement_type( $args['m_padding_type'] ) . ' ' . (int) $args['m_padding_right'] . zeen_sanitizer_measurement_type( $args['m_padding_type'] ) . ' ' . (int) $args['m_padding_bottom'] . zeen_sanitizer_measurement_type( $args['m_padding_type'] ) . ' ' . (int) $args['m_padding_left'] . zeen_sanitizer_measurement_type( $args['m_padding_type'] ) . ';';
				$output .= '}';
			}

			$border_check = empty( $args['border_check'] ) ? 0 : $args['border_check'];
			if ( 0 != $border_check && 4 != $border_check ) {
				$output .= '#block-wrap-' . (int) $args['uid'];
				if ( $args['border_outer'] == 'off' ) {
					$output .= ' .tipi-row-inner-style';
				}
				$output .= '{';
				$output .= 'border-top-width:' . (int) $args['border_top'] . 'px;';
				$output .= 'border-bottom-width:' . (int) $args['border_bottom'] . 'px;';
				$output .= 'border-left-width:' . (int) $args['border_left'] . 'px;';
				$output .= 'border-right-width:' . (int) $args['border_right'] . 'px;';
				if ( 1 == $border_check ) {
					$output .= 'border-style: dotted;';
				} elseif ( 2 == $border_check ) {
					$output .= 'border-style: solid;';
				} elseif ( 3 == $border_check ) {
					$output .= 'border-style: dashed;';
				}
				if ( 10 == $border_check && ! empty( $args['border_color_2'] ) && $args['border_color_2'] != $args['border_color'] ) {
					$gradient_direction = isset( $args['gradient_direction'] ) ? $args['gradient_direction'] : 0;
					$output            .= 'border-style: solid;border-image-source: linear-gradient(' . (int) $gradient_direction . 'deg,' . esc_attr( $args['border_color'] ) . ',  ' . esc_attr( $args['border_color_2'] ) . ');';
				} else {
					$output .= 'border-color: ' . esc_attr( $args['border_color'] ) . ';';
				}
				$output .= '}';
			}
		}
		return $output;
	}

}
