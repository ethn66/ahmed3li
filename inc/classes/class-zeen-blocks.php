<?php
/**
 * Blocks
 *
 * @package Zeen
 * @since 1.0.0
 */
abstract class ZeenBlocks {

	private static $block_id       = 0;
	private static $block_count    = 0;
	private static $quick_count_dt = array();
	private static $term           = '';
	private static $main_id        = '';
	private static $ndp            = '';
	private static $id             = array();
	private static $did            = array();
	private static $mid            = array();
	private static $unique_ndp     = '';
	private static $undpid         = array();
	public static $is_110          = '';
	public static $is_110_1        = '';
	public static $is_110_size     = 101;
	public static $is_300          = '';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {

		$this->args    = $args;
		$this->preview = $args['preview'];
		if ( ! empty( $_GET['ndp'] ) ) {
			self::$ndp = 'on' == $_GET['ndp'] ? 'on' : 'off';
		}

		if ( ! empty( $args['ndp'] ) ) {
			self::$ndp = $args['ndp'];
		}

		if ( ! empty( $_GET['id'] ) ) {
			self::$main_id = (int) $_GET['id'];
		}

		self::$unique_ndp = empty( $args['unique_ndp'] ) ? '' : true;
		add_filter( 'lets_review_output', array( $this, 'lets_review_filter' ) );
		if ( empty( self::$main_id ) && empty( $args['ajax'] ) ) {
			if ( is_page() ) {
				self::$main_id = get_the_ID();
				self::$term    = 'page';
			} elseif ( is_search() ) {
				self::$term = 'search';
			} elseif ( is_category() || is_tax() || is_tag() ) {
				$term          = get_queried_object();
				self::$main_id = $term->term_id;
				self::$term    = 'term';
			}
		}
		if ( empty( self::$ndp ) ) {
			if ( 'page' == self::$term ) {
				self::$ndp = get_post_meta( self::$main_id, 'tipi_builder_ndp', true );
			} else {
				self::$ndp = get_term_meta( self::$main_id, 'tipi_builder_ndp', true );
			}
		}
		$checkers = array( 'desktop', 'mobile', 'title_check', 'subtitle_check', 'subtitle', 'title', 'load_more', 'only_block', 'layout', 'ad_type', 'divider_bottom_onoff', 'divider_top_onoff', 'sidebar', 'columns', 'index', 'img_bg_id', 'position', 'm_position', 't_position', 'pretitle_check', 'nested' );
		foreach ( $checkers as $key ) {
			$this->args[ $key ] = empty( $args[ $key ] ) ? '' : $args[ $key ];
		}

		if ( $this->dt_call() ) {
			$ids = self::$did;
		} elseif ( $this->mob_call() ) {
			$ids = self::$mid;
		}

		if ( 'on' == self::$ndp && ! empty( $ids ) && empty( $this->args['ndp_skip'] ) && 'videos' != $this->type ) {
			$args['qry']['post__not_in'] = $ids;
		}

		if ( ! empty( self::$unique_ndp ) && ! empty( self::$undpid ) ) {
			$args['qry']['post__not_in'] = empty( $args['qry']['post__not_in'] ) ? self::$undpid : array_merge( $args['qry']['post__not_in'], self::$undpid );
		}

		if ( ! empty( $args['filter'] ) && ( ( 'pages' == $args['filter'] && ! empty( $args['pages'] ) ) || ( 'posts' == $args['filter'] && ! empty( $args['posts'] ) ) ) ) {
			$args['qry']['posts_per_page'] = -1;
		}

		$this->qry_args = empty( $args['qry'] ) ? array() : $args['qry'];

		$this->heading        = empty( $args['heading'] ) ? 'p' : 'h' . $args['heading'];
		$this->counter        = empty( $args['counter'] ) ? '' : $args['counter'];
		$this->counter_class  = ! isset( $args['counter_class'] ) ? '' : $args['counter_class'];
		$this->excerpt_off    = ! isset( $args['excerpt_off'] ) ? '' : $args['excerpt_off'];
		$this->excerpt_full   = ! isset( $args['excerpt_full'] ) ? '' : $args['excerpt_full'];
		$this->excerpt_length = ! isset( $args['excerpt_length'] ) ? 12 : $args['excerpt_length'];
		$this->byline_off     = ! isset( $args['byline_off'] ) ? '' : $args['byline_off'];
		$this->fi_off         = ! isset( $args['fi_off'] ) ? '' : $args['fi_off'];
		$this->uid            = empty( $args['uid'] ) ? '' : $args['uid'];
		$this->mnp            = empty( $this->mnp ) ? '' : $this->mnp;
		if ( ! empty( $args['ajax'] ) && ! empty( $args['mnp'] ) ) {
			$this->mnp = $args['mnp'];
		}
		$this->found_posts              = empty( $this->found_posts ) ? '' : $this->found_posts;
		$this->paged                    = empty( $args['qry']['paged'] ) ? '' : $args['qry']['paged'];
		$this->args['skin']             = ! isset( $args['skin'] ) ? 0 : $args['skin'];
		$this->args['skin_outer']       = empty( $args['skin_outer'] ) ? 'on' : $args['skin_outer'];
		$this->args['is_fs']            = ( ! empty( $args['fs'] ) && 'on' == $args['fs'] ) ? true : '';
		$this->args['is_boxed']         = empty( $this->args['is_fs'] ) ? true : '';
		$this->args['is_boxed_content'] = ( empty( $this->args['is_boxed'] ) && ! empty( $args['boxed_content'] ) && 'on' == $args['boxed_content'] ) ? true : '';
		$this->args['specific']         = empty( $args['specific'] ) ? '' : $args['specific'];
		$this->args['is_thumbnail']     = 22 == $this->preview || 23 == $this->preview || 25 == $this->preview ? true : '';
		if ( empty( $this->args['specific'] ) && $this->enabled() === true ) {
			self::$block_count++;
		}

		self::$block_id++;
		if ( empty( $_GET['ipl'] ) ) {
			wp_add_inline_script( 'zeen-functions', $this->block_js() );
		} else {
			$this->block_js( true );
		}
	}

	/**
	 * Check if enabled
	 *
	 * @since 1.0.0
	 */
	public function enabled() {
		if ( TipiBuilder\ZeenHelpers::zeen_builder_call() ) {

			if ( TipiBuilder\ZeenHelpers::zeen_mob_active() ) {
				if ( 'off' == $this->args['mobile'] ) {
					return false;
				}
				return true;
			} else {
				if ( 'off' == $this->args['desktop'] ) {
					return false;
				}
				return true;
			}
		} elseif ( ZeenMobile::is_mobile() ) {
			if ( 'off' == $this->args['mobile'] ) {
				return false;
			}
			return true;
		}

		return true;
	}

	public function responsive_check() {
		$output = array(
			'mobile'  => true,
			'desktop' => true,
		);
		if ( ! TipiBuilder\ZeenHelpers::zeen_builder_call() ) {
			if ( 'off' == $this->args['mobile'] ) {
				$output['mobile'] = false;
			}

			if ( 'off' == $this->args['desktop'] ) {
				$output['desktop'] = false;
			}
		}
		return $output;
	}

	public function opening_wrap( $args = array() ) {
		$is_110_child = self::$is_110 && 110 != $this->preview;
		echo '<div id="block-wrap-' . (int) $this->block_js_id() . '" class="';
		echo 'block-wrap-native block-wrap block-wrap-' . (int) $this->preview . ' block-css-' . (int) $this->block_js_id() . ' block-wrap-' . esc_attr( $this->type );
		if ( 'grid' == $this->type || 'slider' == $this->type ) {
			echo ' block-wrap-tiles';
		}

		if ( 'videos' == $this->type || 'youtube-playlist' == $this->type ) {
			echo ' block-wrap-video-player';
		}
		if ( 'da' == $this->type ) {
			if ( get_theme_mod( 'ads_responsive' ) != 1 ) {
				echo ' da-resp-off';
			}
		}
		if ( ! empty( $this->args['qry']['post_type'] ) && ( 'product' == $this->args['qry']['post_type'] || ( is_array( $this->args['qry']['post_type'] ) && in_array( 'product', $this->args['qry']['post_type'] ) ) ) ) {
			echo ' block--products';
			if ( get_theme_mod( 'woo_tipi_blocks_variations', 1 ) == 1 ) {
				echo ' block--products-var';
			}
			if ( 3 == $this->preview ) {
				echo ' woo-show--add-to-cart';
			}
		}
		if ( ( ! empty( $this->args['margin_top'] ) && $this->args['margin_top'] < 0 ) || ( ! empty( $this->args['margin_bottom'] ) && $this->args['margin_bottom'] < 0 ) ) {
			echo ' block-negative-margins';
		}
		if ( ! empty( $this->args['custom_class'] ) ) {
			echo ' ' . esc_attr( $this->args['custom_class'] );
		}
		if ( empty( $this->args['specific'] ) ) {
			echo ' block-wrap-no-' . (int) $this->block_id();
		}
		$columns_m = empty( $this->args['columns_m'] ) ? 1 : $this->args['columns_m'];
		echo ' columns__m--' . (int) $columns_m;
		if ( $columns_m > 1 ) {
			echo ' columns__m--mt1';
		}
		$type = 'classic';
		if ( 'grid' == $this->type ) {
			$type = 'grid';
		} elseif ( 'slider' == $this->type ) {
			$type = 'slider';
		}
		if ( 'cta' == $this->type || 'ctagrid' == $this->type || 'image' == $this->type ) {
			echo ' block-to-see';
		}
		echo ' elements-design-' . (int) get_theme_mod( $type . '_meta_design', 1 );
		if ( ! empty( $this->args['m_fs'] ) && 'on' == $this->args['m_fs'] ) {
			echo ' mob-fs';
		}
		$responsive = $this->responsive_check();
		if ( empty( $responsive['mobile'] ) ) {
			echo ' mob-off';
		}

		if ( empty( $responsive['desktop'] ) ) {
			echo ' dt-off';
		}

		if ( ! empty( $this->args['block_ani'] ) && 'slider' != $this->type ) {
			echo ' block-ani';
		}
		if ( ! empty( $this->args['skin_img'] ) ) {
			echo ' has-bg-img';
			if ( ! empty( $this->args['skin_color'] ) ) {
				if ( zeen_is_light( $this->args['skin_color'] ) ) {
					echo ' has-bg-color-light';
				} else {
					echo ' has-bg-color-dark';
				}
			}
		}
		$this->meta_skin();

		$skin = $this->get_skin();
		if ( 110 == $this->preview ) {
			echo ' block-skin-bg-' . (int) $skin;
		} else {
			echo ' block-skin-' . (int) $skin;
			if ( 1 == $skin || 11 == $skin ) {
				echo ' block-skin--light';
			}
			if ( 4 == $skin ) {
				if ( 0 == $this->args['skin_text_color'] ) {
					echo ' block-skin-1';
				} else {
					echo ' block-skin-2';
				}
			}
		}
		if ( $skin > 0 && 'off' == $this->args['skin_outer'] ) {
			echo ' skin-inner';
		}
		if ( ! empty( $this->args['load_more'] ) ) {
			echo ' filter-wrap-' . (int) $this->args['load_more'];
		}

		if ( 49 == $this->preview ) {
			$video_bg = ! empty( $this->args['video_bg'] ) && 'on' == $this->args['video_bg'] ? true : false;
			if ( empty( $this->args['img_bg'] ) && empty( $video_bg ) ) {
				echo ' cta-no-img';
			}
			echo ' cta-meta-' . (int) $this->args['position'];
			echo ' m-cta-meta-' . (int) $this->args['m_position'];
			echo ' t-cta-meta-' . (int) $this->args['t_position'];
			if ( $this->args['position'] < 4 ) {
				echo ' cta-meta-b';
			} elseif ( $this->args['position'] > 6 ) {
				echo ' cta-meta-t';
			} else {
				echo ' cta-meta-mv';
			}
			if ( 1 == $this->args['position'] || 4 == $this->args['position'] || 7 == $this->args['position'] ) {
				echo ' cta-meta-l';
			} elseif ( 3 == $this->args['position'] || 6 == $this->args['position'] || 9 == $this->args['position'] ) {
				echo ' cta-meta-r';
			} else {
				echo ' cta-meta-mh';
			}
			if ( $this->args['m_position'] < 4 ) {
				echo ' m-cta-meta-b';
			} elseif ( $this->args['m_position'] > 6 ) {
				echo ' m-cta-meta-t';
			} else {
				echo ' m-cta-meta-mv';
			}
			if ( 1 == $this->args['m_position'] || 4 == $this->args['m_position'] || 7 == $this->args['m_position'] ) {
				echo ' m-cta-meta-l';
			} elseif ( 3 == $this->args['m_position'] || 6 == $this->args['m_position'] || 9 == $this->args['m_position'] ) {
				echo ' m-cta-meta-r';
			} else {
				echo ' m-cta-meta-mh';
			}

			if ( $this->args['t_position'] < 4 ) {
				echo ' t-cta-meta-b';
			} elseif ( $this->args['t_position'] > 6 ) {
				echo ' t-cta-meta-t';
			} else {
				echo ' t-cta-meta-mv';
			}
			if ( 1 == $this->args['t_position'] || 4 == $this->args['t_position'] || 7 == $this->args['t_position'] ) {
				echo ' t-cta-meta-l';
			} elseif ( 3 == $this->args['t_position'] || 6 == $this->args['t_position'] || 9 == $this->args['t_position'] ) {
				echo ' t-cta-meta-r';
			} else {
				echo ' t-cta-meta-mh';
			}
		}

		if ( ! empty( $is_110_child ) ) {
			$sticky = empty( $this->args['sticky'] ) ? '' : $this->args['sticky'];
			if ( 'on' == $sticky ) {
				echo ' sticky-sb-on';
			}
		}
		if ( empty( $is_110_child ) && empty( self::$is_300 ) ) {
			if ( empty( $this->args['archive'] ) && empty( $this->args['specific'] ) && 'columns' != $this->type ) {
				echo ' block-col-self';
			}
			if ( empty( $this->args['is_fs'] ) ) {
				echo ' tipi-box';
				if ( empty( $this->args['archive'] ) && empty( $this->args['contained'] ) ) {
					echo ' tipi-row';
				}
			} else {
				echo ' tipi-fs';
				if ( ! empty( $this->args['is_boxed_content'] ) && empty( $is_110_child ) && empty( self::$is_300 ) ) {
					echo ' tipi-fs--contents-boxed';
				}
			}
		} elseif ( empty( $this->args['archive'] ) && empty( $this->args['contained'] ) ) {
			echo ' block-is-nest';
		}

		if ( 'search' == $this->type ) {
			$button_design = empty( $this->args['button_design'] ) ? 0 : $this->args['button_design'];
			echo ! empty( $this->args['centered'] ) && 'on' == $this->args['centered'] ? ' search-form--centered' : '';
			$fill = 0 == $button_design ? 1 : 2;
			echo ' search-form__fill-' . (int) $fill;
		}

		echo empty( $args['classes'] ) ? '' : ' ' . esc_attr( ltrim( $args['classes'] ) );
		echo ' clearfix"';
		echo ' data-id="' . (int) $this->block_js_id() . '"';
		echo ' data-base="' . (int) $skin . '"';
		echo '>';
		if ( 4 == $skin && 'on' == $this->args['skin_outer'] && ! empty( $this->args['skin_img'] ) ) {
			$this->bg_img();
		}
		echo '<div class="tipi-row-inner-style clearfix';
		if ( ! empty( $this->args['vertical_centered'] ) && 'on' == $this->args['vertical_centered'] ) {
			echo ' tipi-vertical-c';
		}
		if ( 110 == $this->preview ) {
			echo ' tipi-flex tipi-flex-wrap';
		}
		echo '">';
		if ( 4 == $skin && 'off' == $this->args['skin_outer'] && ! empty( $this->args['skin_img'] ) ) {
			$this->bg_img();
		}
		if ( 39 != $this->preview ) {
			echo '<div class="tipi-row-inner-box contents sticky--wrap';
			if ( 30 == $this->preview || 32 == $this->preview || 35 == $this->preview || 36 == $this->preview || 60 == $this->preview || 74 == $this->preview || 57 == $this->preview || 'da' == $this->type ) {
				$this->animation_class();
			}
			if ( 110 == $this->preview ) {
				echo ' zeen-col-wrap tipi-flex tipi-flex-wrap tipi-flex-space-between';
			}
			if ( ! empty( $this->args['is_boxed_content'] ) && ! empty( $this->args['is_fs'] ) && empty( $is_110_child ) && empty( self::$is_300 ) ) {
				echo ' tipi-row';
			} elseif ( ! empty( $this->args['is_fs'] ) && empty( $is_110_child ) && empty( self::$is_300 ) ) {
				echo ' fs-contents';
			}
			if ( ! empty( $this->args['vertical_centered'] ) && 'on' == $this->args['vertical_centered'] ) {
				echo ' tipi-vertical-c';
			}
			echo '">';
		}
	}

	public function bg_img() {
		echo '<div class="bg__img-wrap img-bg-wrapper';
		if ( ! empty( $this->args['skin_parallax'] ) && 'on' == $this->args['skin_parallax'] ) {
			echo ' bg-parallax';
		}
		echo '">';
		echo '<div class="bg"></div>';
		echo '</div>';
	}

	public function closing_wrap() {
		echo '</div>';
		if ( 34 == $this->preview ) {
			$this->divider();
		}
		echo '</div>';
		if ( 110 == $this->preview ) {
			$this->divider();
		}
		if ( 39 != $this->preview ) {
			echo '</div>';
		}
	}

	public function divider() {
		$divider_bottom = 'on' == $this->args['divider_bottom_onoff'] && isset( $this->args['divider_bottom'] ) ? $this->args['divider_bottom'] : '';
		$divider_top    = 'on' == $this->args['divider_top_onoff'] && isset( $this->args['divider_top'] ) ? $this->args['divider_top'] : '';

		if ( 'on' == $this->args['divider_bottom_onoff'] ) {
			zeen_shape(
				array(
					'shape'               => $divider_bottom,
					'divider_skin_bottom' => $this->args['divider_skin_bottom'],
				)
			);
		}
		if ( 'on' == $this->args['divider_top_onoff'] ) {
			zeen_shape(
				array(
					'shape'            => $divider_top,
					'location'         => 'top',
					'divider_skin_top' => $this->args['divider_skin_top'],
				)
			);
		}
	}

	public function meta_skin() {
		if ( empty( $this->args['meta_background'] ) || ! empty( $this->args['meta_location'] ) ) {
			return;
		}
		echo ' meta-skin-base meta-skin-' . (int) $this->args['meta_background'];
		if ( ! empty( $this->args['article_shadow'] ) && 'on' == $this->args['article_shadow'] ) {
			echo ' meta-skin-shadow';
		}
		if ( 4 == $this->args['meta_background'] ) {
			if ( empty( $this->args['meta_background_text_color'] ) ) {
				echo ' meta-text-1';
			} else {
				echo ' meta-text-2';
			}
		}

		if ( ! empty( $this->args['meta_background_img'] ) ) {
			echo ' has-meta-bg-img';
		}
	}

	/**
	 * Block Title
	 *
	 * @since 1.0.0
	 */
	public function block_tiny_title( $classes = '', $args = array() ) {
		$title_check = $this->args['title_check'];
		$title       = $this->args['title'];
		if ( 'off' == $title_check || empty( $title ) ) {
			return;
		}
		echo '<div class="block-tiny-title tipi-flex font-' . (int) get_theme_mod( 'typo_headings', 1 ) . '">';
		echo zeen_sanitize_titles( $title );
		echo '</div>';
	}

	/**
	 * Block Title
	 *
	 * @since 1.0.0
	 */
	public function block_title( $classes = '', $args = array() ) {

		$title          = $this->args['title'];
		$subtitle       = empty( $this->args['subtitle'] ) ? '' : $this->args['subtitle'];
		$title_check    = ( ! empty( $this->args['title_check'] ) && 'off' == $this->args['title_check'] ) || empty( $title ) ? '' : true;
		$subtitle_check = ( ! empty( $this->args['subtitle_check'] ) && 'off' == $this->args['subtitle_check'] ) || empty( $subtitle ) ? '' : true;

		if ( ( empty( $title_check ) && empty( $subtitle_check ) && 2 != $this->args['load_more'] ) || ! empty( $this->args['title_block_off'] ) ) {
			return;
		}

		$only_filters = '';

		$any_title_check = empty( $title_check ) && empty( $subtitle_check ) ? '' : true;
		if ( empty( $any_title_check ) && ! empty( $this->args['load_more'] ) ) {
			$only_filters = true;
		}

		if ( 'da' != $this->type && 'cta' != $this->type ) {
			$block_title = get_theme_mod( 'classic_block_title_design', 1 );
			if ( 'mm' == $this->args['specific'] ) {
				$block_title = 1;
			} elseif ( empty( $only_filters ) ) {
				$classes .= ' block-title-wrap-style';
			}
			$classes .= ' block-title-' . (int) $block_title;
			$term_id  = '';
			if ( ! empty( $this->args['qry']['cat'] ) ) {
				$cat     = explode( ',', $this->args['qry']['cat'] );
				$term_id = $cat[0];
			}

			$color = zeen_term_color( $term_id );

			switch ( get_theme_mod( 'class_block_title_cat_color', 1 ) ) {
				case 2:
					$title_color = $color;
					break;
				case 3:
					$mid_line = $color;
					break;
				case 4:
					$bt = $color;
					break;
				case 5:
					$bb = $color;
					break;
				case 11:
					$title_color = $color;
					$mid_line    = $color;
					$bt          = $color;
					$bb          = $color;
					break;
				default:
					break;
			}
		}

		if ( ! empty( $this->args['title_color'] ) ) {
			$title_color = $this->args['title_color'];
		}

		if ( 2 == $this->args['load_more'] ) {
			$classes .= ' with-load-more';
		}
		if ( ! empty( $any_title_check ) || ! empty( $this->args['load_more'] ) ) {

			if ( ! empty( $only_filters ) ) {
				$classes .= ' only-filters';
			} elseif ( empty( $any_title_check ) ) {
				$classes .= ' empty-title';
			}
			echo '<div class="block-title-wrap module-block-title clearfix ' . esc_attr( $classes ) . '"';
			if ( ! empty( $title_color ) ) {
				echo ' style="color: ' . esc_attr( $title_color ) . '"';
			}
			if ( ! empty( $bb ) || ! empty( $bt ) ) {
				echo ' style="';
				if ( ! empty( $bb ) ) {
					echo 'border-bottom-color:' . esc_attr( $bb ) . ';';
				}
				if ( ! empty( $bt ) ) {
					echo 'border-top-color:' . esc_attr( $bt ) . ';';
				}
				echo '"';
			}
			echo '>';
		}

		if ( ! empty( self::$is_300 ) && empty( $this->args['specific'] ) ) {
			if ( is_category() || is_tag() || is_tax() ) {
				echo '<div class="block-title-wrap-style">';
				echo '<div class="filters font-2">';
				$term    = get_queried_object();
				$term_id = $term->term_id;
				$tax     = $term->taxonomy;

				if ( ! empty( $term_id ) ) {
					zeen_subcats(
						array(
							'term_id' => $term_id,
							'tax'     => $tax,
						)
					);
				}
				zeen_sorter(
					array(
						'term_id' => $term_id,
						'echo'    => true,
					)
				);
				echo '</div>';
			}
		}

		if ( ! empty( $any_title_check ) ) {
			echo '<div class="block-title-area clearfix">';
		}

		if ( ! empty( $title_check ) ) {
			echo '<div class="block-title font-' . (int) get_theme_mod( 'typo_headings', 1 );
			echo '"';
			if ( ! empty( $title_color ) ) {
				echo ' style="color: ' . esc_attr( $title_color ) . '"';
			}
			echo '>';
			echo zeen_sanitize_titles( $title );
			echo '</div>';
		}

		if ( ! empty( $subtitle_check ) ) {
			echo '<div class="block-subtitle font-' . (int) get_theme_mod( 'typo_subtitles', 1 ) . '">' . zeen_sanitize_titles( $subtitle ) . '</div>';
		}

		if ( ! empty( $any_title_check ) ) {
			echo '</div>';
		}
		if ( ! empty( self::$is_300 ) && empty( $this->args['specific'] ) ) {
			if ( is_category() || is_tag() || is_tax() ) {
				echo '</div>';
			}
		}

		$subcats = get_theme_mod( 'classic_block_title_subcats', 1 );
		if ( $this->args['load_more'] > 0 && ( 'grid' == $this->type || 'classic' == $this->type || 'masonry' == $this->type || 'thumbnail' == $this->type ) ) {
			echo '<div class="filters tipi-flex font-' . (int) get_theme_mod( 'typo_body', 2 ) . '">';
			$subcats_check = 1 == $subcats && ! empty( $this->args['qry']['cat'] ) && empty( $this->args['nosubcats'] ) && empty( $this->args['ajax'] ) && 'mm' != $this->args['specific'];
			if ( ! empty( $subcats_check ) && 2 == $this->args['load_more'] && 'widget' != $this->args['specific'] ) {
				$this->subcats();
			}
			$this->load_more( 1 );
			echo '</div>';
		}

		if ( ! empty( $any_title_check ) || ! empty( $this->args['load_more'] ) ) {
			echo '</div>';
		}

	}

	/**
	 * Subcategory Content
	 *
	 * @since 1.0.0
	 */
	public function subcats() {
		$cats  = explode( ',', $this->args['qry']['cat'] );
		$terms = array();
		foreach ( $cats as $key ) {
			$args_terms = array(
				'taxonomy' => 'category',
				'child_of' => $key,
				'orderby'  => 'name',
			);
			$terms      = array_merge( get_terms( $args_terms ), $terms );
		}
		if ( ! empty( $terms ) ) {

			echo '<div class="block-subcats-wrap sorter" tabindex="-1">';
			echo '<span class="current-sorter current">';
			echo '<span class="current-sorter-txt current-txt">';
			esc_html_e( 'All', 'zeen' );
			echo '<i class="tipi-i-chevron-down"></i>';
			echo '</span>';
			echo '</span>';
			echo '<ul class="options">';
			echo '<li><a href="#" class="block-more block-subcat block-changer active" data-mnp="' . (int) $this->mnp . '" data-id="' . (int) $this->uid . '" data-reset="1" data-sorttitle="' . esc_attr__( 'All', 'zeen' ) . '">' . esc_attr__( 'All', 'zeen' ) . '</a></li>';

			foreach ( $terms as $key ) {
				$offset = empty( $this->qry_args['offset'] ) ? 0 : $this->qry_args['offset'];
				$mnp    = ceil( ( $key->count - $offset ) / $this->qry_args['posts_per_page'] );
				echo '<li><a href="' . esc_url( get_term_link( $key ) ) . '" class="block-more block-changer block-subcat" data-id="' . (int) $this->uid . '" data-sorttitle="' . esc_attr( $key->name ) . '" data-mnp="' . (int) $mnp . '" data-term="category" data-tid="' . (int) $key->term_id . '">' . esc_attr( $key->name ) . '</a></li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}

	/**
	 * Block Content
	 *
	 * @since 1.0.0
	 */
	public function block_content() {
		if ( ! empty( $this->args['custom_content'] ) ) {
			echo '<div class="block-html-content clearfix';
			$this->animation_class();
			if ( 'mailing' == $this->type ) {
				echo ' subscribe-button-' . (int) get_theme_mod( 'subscribe_signup_style', 1 );
			}
			if ( 'text' == $this->type || 'code' == $this->type || 'scroller' == $this->type ) {
				echo ' link-color-wrap';
			}
			echo '">';
			echo do_shortcode( $this->args['custom_content'] );
			echo '</div>';
		}
	}

	public function animation_class( $echo = true ) {
		if ( empty( $echo ) ) {
			ob_start();
		}
		if ( ! empty( $this->args['animation_onoff'] ) && 'on' == $this->args['animation_onoff'] ) {
			echo ' block-to-see block__ani-on block__ani-' . (int) $this->args['animation_type'];
			if ( ! empty( $this->args['animation_stagger'] ) && 'on' == $this->args['animation_stagger'] ) {
				echo ' block__ani-stagger';
			}
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}

	public function tile_animation_class( $echo = true ) {
		if ( empty( $echo ) ) {
			ob_start();
		}
		if ( ! empty( $this->args['image_hover_animation_onoff'] ) && 'on' == $this->args['image_hover_animation_onoff'] ) {
			echo ' img-color-hover-base img-color-hover-' . (int) $this->args['image_hover_animation_type'];
			if ( $this->args['image_hover_animation_type'] > 10 ) {
				echo ' img-color-content';
			}
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}

	/**
	 * IDs
	 *
	 * @since 1.0.0
	 */
	public function id_coll( $pid ) {
		if ( ! empty( $this->args['ndp_skip'] ) ) {
			return;
		}
		if ( $this->dt_call() ) {
			self::$did[] = $pid;
		} elseif ( $this->mob_call() ) {
			self::$mid[] = $pid;
		}
		self::$id[] = $pid;
		if ( ! empty( self::$unique_ndp ) ) {
			self::$undpid[] = $pid;
		}
	}

	public function mob_call() {
		if ( TipiBuilder\ZeenHelpers::zeen_builder_call() ) {
			if ( TipiBuilder\ZeenHelpers::zeen_mob_active() ) {
				return true;
			}
		} else {
			if ( 'off' != $this->args['mobile'] ) {
				return true;
			}
		}
		return false;
	}

	public function dt_call() {
		if ( TipiBuilder\ZeenHelpers::zeen_builder_call() ) {
			if ( ! TipiBuilder\ZeenHelpers::zeen_mob_active() ) {
				return true;
			}
		} else {
			if ( 'off' != $this->args['desktop'] ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Block Query
	 *
	 * @since 1.0.0
	 */
	public function qry() {

		if ( empty( $this->args['archive'] ) ) {
			return zeen_qry( $this->qry_args );
		} elseif ( 'home' == $this->args['archive'] ) {
			return zeen_qry( $this->qry_args );
		} else {
			if ( empty( $this->args['builder_request'] ) ) {
				global $wp_query;
				if ( 'on' == self::$ndp && ! empty( $this->args['pagination'] ) ) {
					$qry_args = array_merge( $wp_query->query, $this->qry_args );
					return zeen_qry( $qry_args );
				}
				return $wp_query;
			} else {
				$term = empty( $_GET['taxonomy'] ) ? 'page' : esc_attr( $_GET['taxonomy'] );
				$id   = empty( $_GET['id'] ) ? '' : $_GET['id'];
				if ( 'category' == $term ) {
					$this->qry_args['cat'] = (int) $id;
				} elseif ( 'post_tag' == $term ) {
					$this->qry_args['tag__in'] = (int) $id;
				} else {
					$this->qry_args['tax_query'] = array(
						'taxonomy' => $term,
						'field'    => 'term_id',
						'terms'    => array( (int) $id ),
					);
				}

				return zeen_qry( $this->qry_args );
			}
		}
	}

	/**
	 * Block ID
	 *
	 * @since 1.0.0
	 */
	public function block_js_id() {

		return $this->uid;

	}

	/**
	 * Block ID
	 *
	 * @since 1.0.0
	 */
	public function block_id() {
		return self::$block_id;
	}

	/**
	 * Block JS
	 *
	 * @since 1.0.0
	 */
	public function block_js( $echo = '' ) {
		if ( ! empty( $this->args['ajax'] ) || 'js' == $this->args['specific'] || ( ! empty( $this->args['archive'] ) && 'home' != $this->args['archive'] ) ) {
			return;
		}
		$quick = count( self::$quick_count_dt ) < 3 && ! in_array( $this->uid, self::$quick_count_dt ) && empty( $this->args['js_off'] ) && 'on' == $this->args['desktop'] && $this->args['load_more'] > 0 ? true : false;
		if ( ! empty( $quick ) ) {
			self::$quick_count_dt[] = $this->uid;
		}
		$review_off    = empty( $this->args['review_off'] ) ? '' : true;
		$img_shape     = empty( $this->args['img_shape'] ) ? '' : $this->args['img_shape'];
		$post_subtitle = empty( $this->args['post_subtitle'] ) ? '' : $this->args['post_subtitle'];

		return zeen_block_js(
			array(
				'uid'            => $this->uid,
				'qry_args'       => $this->qry_args,
				'quick'          => $quick,
				'echo'           => $echo,
				'is110'          => self::$is_110 && 110 != $this->preview,
				'excerpt_full'   => $this->excerpt_full,
				'excerpt_off'    => $this->excerpt_off,
				'excerpt_length' => $this->excerpt_length,
				'counter'        => $this->counter,
				'counter_class'  => $this->counter_class,
				'byline_off'     => $this->byline_off,
				'fi_off'         => $this->fi_off,
				'img_shape'      => $img_shape,
				'post_subtitle'  => $post_subtitle,
				'review_off'     => $review_off,
				'mnp'            => $this->mnp,
				'preview'        => $this->preview,
				'ppp'            => $this->qry_args['posts_per_page'],
			)
		);
	}

	public function get_skin() {
		if ( 200 == $this->preview ) {
			$skin = get_theme_mod( 'sidebar_skin', 1 );
		} else {
			$skin = (int) $this->args['skin'];
		}
		if ( 3 == $skin ) {
			$skin = 11;
		}

		return $skin;
	}

	/**
	 * Button
	 *
	 * @since 1.0.0
	 */
	public function button( $args ) {

		if ( ( empty( $args['button_text'] ) ) ) {
			return;
		}

		$button_url      = empty( $args['button_url'] ) ? '' : $args['button_url'];
		$button_text     = empty( $args['button_text'] ) ? '' : $args['button_text'];
		$button_icon     = empty( $args['button_icon'] ) ? '' : $args['button_icon'];
		$button_new_tab  = empty( $args['button_new_tab'] ) ? '' : $args['button_new_tab'];
		$button_is_video = empty( $args['button_is_video'] ) ? '' : $args['button_is_video'];
		echo '<a class="tipi-button cta-button cta-button-' . (int) $args['button'];
		if ( 'on' == $button_icon ) {
			echo ' button-arrow-r button-arrow';
		}
		if ( 'on' == $button_is_video ) {
			echo ' media-tr" data-format="video" data-source="ext" data-type="frame" data-src="' . zeen_media_url(
				'',
				array(
					'url'    => $button_url,
					'source' => 1,
				)
			) . '" href="#"';
		} else {
			echo '"';
			echo ' href="' . esc_url( $button_url ) . '"';
			if ( 'on' == $button_new_tab ) {
				echo ' target="_blank" ';
			}
		}

		echo '>';
		if ( 'video' == $button_icon ) {
			echo '<i class="tipi-i-play_arrow video-icon"></i>';
		}
		echo '<span class="button-text button-title">' . zeen_sanitize_titles( $button_text ) . '</span>';

		if ( 'on' == $button_icon ) {
			echo '<i class="tipi-i-arrow-right"></i>';
		}
		echo '</a>';

	}

	/**
	 * Image
	 *
	 * @since 1.0.0
	 */
	public function img_bg() {

		if ( empty( $this->args['img_bg_id'] ) ) {
			return;
		}

		$img_bg_overlay = empty( $this->args['img_bg_overlay'] ) ? 'rgba(0,0,0,0.3)' : $this->args['img_bg_overlay'];
		if ( 35 == $this->preview ) {
			$img_bg_overlay = '';
			$url            = empty( $this->args['img_link'] ) ? '' : $this->args['img_link'];
		}
		?>
		<div class="mask">
			<?php if ( 35 == $this->preview ) { ?>
				<a href="<?php echo esc_url( $url ); ?>" class="zeen-img-url">
			<?php } ?>
			<?php
			if ( ! empty( $this->args['img_bg_id'] ) ) {
				echo wp_get_attachment_image( $this->args['img_bg_id'], 'full' );
			}

			if ( 35 == $this->preview ) {
				echo '</a>';
			}

			if ( ! empty( $img_bg_overlay ) ) {
				?>
				<span class="mask-overlay"></span>
			<?php } ?>
		</div>
		<?php
	}

	/**
	 * Block Load More
	 *
	 * @since 1.0.0
	 */
	public function load_more( $position = '' ) {
		if ( 1 == $this->mnp || $this->args['load_more'] < 1 || ( 1 == $this->args['load_more'] && 1 == $position ) || ( 2 == $this->args['load_more'] && 2 == $position ) ) {
			return;
		}
		$size = 2;
		if ( 22 == $this->preview || 25 == $this->preview || 23 == $this->preview ) {
			$size = 1;
		}
		zeen_block_loader(
			array(
				'mnp'    => $this->mnp,
				'id'     => $this->uid,
				'loader' => $this->args['load_more'],
				'size'   => $size,
			)
		);

	}

	/**
	 * Block Load More
	 *
	 * @since 1.0.0
	 */
	public function pagi() {
		if ( empty( $this->args['archive'] ) && empty( $this->args['pagination'] ) ) {
			return;
		}
		$pagi_type = ! isset( $this->args['pagination'] ) ? zeen_pagination_type() : $this->args['pagination'];
		$frontpage = empty( $this->args['frontpage'] ) ? '' : $this->args['frontpage'];
		$root      = empty( $this->args['root'] ) ? '' : $this->args['root'];
		$img_shape = empty( $this->args['img_shape'] ) ? '' : $this->args['img_shape'];
		zeen_pagination(
			$pagi_type,
			array(
				'preview'     => $this->preview,
				'img_shape'   => $img_shape,
				'byline_off'  => $this->byline_off,
				'excerpt_off' => $this->excerpt_off,
				'frontpage'   => $frontpage,
				'mnp'         => $this->mnp,
				'paged'       => $this->paged,
				'root'        => $root,
			)
		);

	}

	/**
	 * MNP
	 *
	 * @since 1.0.0
	 */
	public function mnp() {
		return $this->mnp;
	}

	/**
	 * Found Posts
	 *
	 * @since 1.0.0
	 */
	public function found_posts() {
		return $this->found_posts;
	}

	/**
	 * Let's Review Filter
	 *
	 * @since 1.0.0
	 */
	public function lets_review_filter() {
		return false;
	}

}
