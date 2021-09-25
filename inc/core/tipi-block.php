<?php
/**
 * Tipi Builder Block
 *
 * @since 1.0.0
 */
function tipi_builder_block( $args ) {
	$uid      = $args['uid'];
	$p        = empty( $args['preview'] ) ? 1 : $args['preview'];
	$paged    = get_query_var( 'paged' );
	$page_var = get_query_var( 'page' );
	if ( ( ! empty( $paged ) || ! empty( $page_var ) ) && $p < 300 ) {
		return;
	}
	$builder_request = empty( $args['builder_request'] ) ? '' : $args['builder_request'];
	$fs              = empty( $args['fs'] ) ? 'off' : $args['fs'];
	$default_bc      = 22 == $p || 23 == $p || 25 == $p || 32 == $p || 37 == $p || 40 == $p || 47 == $p || 46 == $p ? 'on' : 'off';
	$img_shape       = 58 == $p ? 2 : '';
	$boxed_content   = ! isset( $args['boxed_content'] ) ? $default_bc : $args['boxed_content'];
	$fs_limit        = empty( $args['fs_limit'] ) ? 'off' : $args['fs_limit'];
	$skin            = isset( $args['skin'] ) ? $args['skin'] : '';
	$skin_outer      = isset( $args['skin_outer'] ) ? $args['skin_outer'] : 'on';
	$t_padding_top   = empty( $args['t_padding_top'] ) ? '' : $args['t_padding_top'];
	$skin_text_color = empty( $args['skin_text_color'] ) ? 0 : $args['skin_text_color'];

	if ( ! isset( $args['t_padding_top'] ) ) {
		$t_padding_top = 30;
	}
	$t_padding_bottom = empty( $args['t_padding_bottom'] ) ? '' : $args['t_padding_bottom'];
	if ( ! isset( $args['t_padding_bottom'] ) ) {
		$t_padding_bottom = 30;
	}
	// 110 + 300
	if ( 300 == $p ) {
		$layout = empty( $args['layout'] ) ? 1 : $args['layout'];
	} else {
		$layout = empty( $args['layout'] ) ? 0 : $args['layout'];
	}

	if ( ! empty( $args['styling'] ) ) {
		$output = array(
			'uid'                         => $uid,
			'p'                           => $p,
			'fs'                          => $fs,
			'boxed_content'               => $boxed_content,
			'skin'                        => $skin,
			'skin_outer'                  => $skin_outer,
			'skin_color'                  => empty( $args['skin_color'] ) ? '' : $args['skin_color'],
			'skin_img'                    => empty( $args['skin_img'] ) ? '' : $args['skin_img'],
			'skin_img_opacity'            => empty( $args['skin_img_opacity'] ) ? '100' : $args['skin_img_opacity'],
			'meta_background'             => isset( $args['meta_background'] ) ? $args['meta_background'] : '',
			'meta_background_padding'     => isset( $args['meta_background_padding'] ) ? $args['meta_background_padding'] : 30,
			'meta_background_color'       => empty( $args['meta_background_color'] ) ? '' : $args['meta_background_color'],
			'meta_background_img'         => empty( $args['meta_background_img'] ) ? '' : $args['meta_background_img'],
			'meta_background_img_opacity' => empty( $args['meta_background_img_opacity'] ) ? '100' : $args['meta_background_img_opacity'],
			'meta_location'               => empty( $args['meta_location'] ) ? '' : $args['meta_location'],
			'meta_padding'                => empty( $args['meta_padding'] ) ? 0 : $args['meta_padding'],
			'fs_limit'                    => $fs_limit,
			'layout'                      => $layout,
			'layout_onoff'                => empty( $args['layout_onoff'] ) ? '' : $args['layout_onoff'],
			'columns'                     => empty( $args['columns'] ) ? 2 : $args['columns'],
			'columns_d'                   => empty( $args['columns_d'] ) ? 2 : $args['columns_d'],
			'columns_t'                   => empty( $args['columns_t'] ) ? 2 : $args['columns_t'],
			'columns_m'                   => empty( $args['columns_m'] ) ? 1 : $args['columns_m'],
			'z_index'                     => empty( $args['z_index'] ) ? 0 : $args['z_index'],
			'duration'                    => empty( $args['duration'] ) ? 10 : $args['duration'],
			'padding_top'                 => empty( $args['padding_top'] ) ? '' : $args['padding_top'],
			'padding_bottom'              => empty( $args['padding_bottom'] ) ? '' : $args['padding_bottom'],
			'padding_right'               => empty( $args['padding_right'] ) ? '' : $args['padding_right'],
			'padding_left'                => empty( $args['padding_left'] ) ? '' : $args['padding_left'],
			'padding_type'                => empty( $args['padding_type'] ) ? 'px' : $args['padding_type'],
			'm_padding_bottom'            => empty( $args['m_padding_bottom'] ) ? '' : $args['m_padding_bottom'],
			'm_padding_top'               => empty( $args['m_padding_top'] ) ? '' : $args['m_padding_top'],
			'm_padding_right'             => empty( $args['m_padding_right'] ) ? '' : $args['m_padding_right'],
			'm_padding_left'              => empty( $args['m_padding_left'] ) ? '' : $args['m_padding_left'],
			'm_padding_type'              => empty( $args['m_padding_type'] ) ? 'px' : $args['m_padding_type'],
			't_padding_bottom'            => $t_padding_bottom,
			't_padding_top'               => $t_padding_top,
			't_padding_right'             => empty( $args['t_padding_right'] ) ? '' : $args['t_padding_right'],
			't_padding_left'              => empty( $args['t_padding_left'] ) ? '' : $args['t_padding_left'],
			't_padding_type'              => empty( $args['t_padding_type'] ) ? 'px' : $args['t_padding_type'],
			'img_bg'                      => empty( $args['img_bg'] ) ? '' : $args['img_bg'],
			'img_bg_id'                   => empty( $args['img_bg_id'] ) ? '' : $args['img_bg_id'],
			'margin_type'                 => empty( $args['margin_type'] ) ? 'px' : $args['margin_type'],
			'margin_top'                  => empty( $args['margin_top'] ) ? '' : $args['margin_top'],
			'margin_bottom'               => empty( $args['margin_bottom'] ) ? '' : $args['margin_bottom'],
			't_margin_type'               => empty( $args['t_margin_type'] ) ? 'px' : $args['t_margin_type'],
			't_margin_top'                => empty( $args['t_margin_top'] ) ? '' : $args['t_margin_top'],
			't_margin_bottom'             => empty( $args['t_margin_bottom'] ) ? '' : $args['t_margin_bottom'],
			'm_margin_type'               => empty( $args['m_margin_type'] ) ? 'px' : $args['m_margin_type'],
			'm_margin_top'                => empty( $args['m_margin_top'] ) ? '' : $args['m_margin_top'],
			'm_margin_bottom'             => empty( $args['m_margin_bottom'] ) ? '' : $args['m_margin_bottom'],
			'divider_bottom_onoff'        => empty( $args['divider_bottom_onoff'] ) ? '' : $args['divider_bottom_onoff'],
			'divider_top_onoff'           => empty( $args['divider_top_onoff'] ) ? '' : $args['divider_top_onoff'],
			'divider_top_onoff'           => empty( $args['divider_top_onoff'] ) ? '' : $args['divider_top_onoff'],
			'divider_color'               => empty( $args['divider_color'] ) ? '' : $args['divider_color'],
			'divider_skin_top'            => empty( $args['divider_skin_top'] ) ? '' : $args['divider_skin_top'],
			'divider_skin_bottom'         => empty( $args['divider_skin_bottom'] ) ? '' : $args['divider_skin_bottom'],
			'divider_color_bottom'        => empty( $args['divider_color_bottom'] ) ? '' : $args['divider_color_bottom'],
			'divider_color_top'           => empty( $args['divider_color_top'] ) ? '' : $args['divider_color_top'],
			'border_color'                => empty( $args['border_color'] ) ? '' : $args['border_color'],
			'border_color_2'              => empty( $args['border_color_2'] ) ? '' : $args['border_color_2'],
			'gradient_direction'          => ! isset( $args['gradient_direction'] ) ? '' : $args['gradient_direction'],
			'border_outer'                => empty( $args['border_outer'] ) ? 'on' : $args['border_outer'],
			'border_bottom'               => empty( $args['border_bottom'] ) ? '' : $args['border_bottom'],
			'border_top'                  => empty( $args['border_top'] ) ? '' : $args['border_top'],
			'border_left'                 => empty( $args['border_left'] ) ? '' : $args['border_left'],
			'border_right'                => empty( $args['border_right'] ) ? '' : $args['border_right'],
			'button_design'               => empty( $args['button_design'] ) ? '' : $args['button_design'],
			'button_color'                => empty( $args['button_color'] ) ? '' : $args['button_color'],
			'button_color_2'              => empty( $args['button_color_2'] ) ? '' : $args['button_color_2'],
			'text_color'                  => empty( $args['text_color'] ) ? '' : $args['text_color'],
			'button_text_color'           => empty( $args['button_text_color'] ) ? '' : $args['button_text_color'],
			'height'                      => empty( $args['height'] ) ? '' : $args['height'],
			'height_d'                    => ! isset( $args['height_d'] ) ? '800' : $args['height_d'],
			'height_m'                    => ! isset( $args['height_m'] ) ? '500' : $args['height_m'],
			'height_t'                    => ! isset( $args['height_t'] ) ? '500' : $args['height_t'],
			'height_d_type'               => empty( $args['height_d_type'] ) ? 'px' : $args['height_d_type'],
			'height_m_type'               => empty( $args['height_m_type'] ) ? 'px' : $args['height_m_type'],
			'height_t_type'               => empty( $args['height_t_type'] ) ? 'px' : $args['height_t_type'],
			'min_height'                  => empty( $args['min_height'] ) ? '' : $args['min_height'],
			'gutter_width_d'              => ! isset( $args['gutter_width_d'] ) ? ( ! isset( $args['gutter_width'] ) ? 30 : $args['gutter_width'] ) : $args['gutter_width_d'],
			'gutter_width_t'              => ! isset( $args['gutter_width_t'] ) ? 30 : $args['gutter_width_t'],
			'gutter_width_m'              => ! isset( $args['gutter_width_m'] ) ? 30 : $args['gutter_width_m'],
			'height_type'                 => empty( $args['height_type'] ) ? '' : $args['height_type'],
			'img_bg_overlay'              => empty( $args['img_bg_overlay'] ) ? '' : $args['img_bg_overlay'],
			'color'                       => empty( $args['color'] ) ? '' : $args['color'],
			'separation'                  => empty( $args['separation'] ) ? '' : $args['separation'],
			'separation_m'                => empty( $args['separation_m'] ) ? '' : $args['separation_m'],
			'separation_t'                => empty( $args['separation_t'] ) ? '' : $args['separation_t'],
			'separation_d'                => ! isset( $args['separation_d'] ) ? ( ! isset( $args['separation'] ) ? '' : $args['separation'] ) : $args['separation_d'],
			'icon_size_d'                 => ! isset( $args['icon_size_d'] ) ? ( ! isset( $args['icon_size'] ) ? 32 : $args['icon_size'] ) : $args['icon_size_d'],
			'icon_size_t'                 => empty( $args['icon_size_t'] ) ? '' : $args['icon_size_t'],
			'icon_size_m'                 => empty( $args['icon_size_m'] ) ? '' : $args['icon_size_m'],
			'title_font_size_m'           => empty( $args['title_font_size_m'] ) ? '' : $args['title_font_size_m'],
			'title_font_size_t'           => empty( $args['title_font_size_t'] ) ? '' : $args['title_font_size_t'],
			'title_font_size_d'           => empty( $args['title_font_size_d'] ) ? '' : $args['title_font_size_d'],
			'meta_padding_m'              => empty( $args['meta_padding_m'] ) ? 20 : $args['meta_padding_m'],
			'meta_padding_t'              => empty( $args['meta_padding_t'] ) ? 30 : $args['meta_padding_t'],
			'meta_padding_d'              => empty( $args['meta_padding_d'] ) ? 30 : $args['meta_padding_d'],
			'meta_width_m'                => empty( $args['meta_width_m'] ) ? 80 : $args['meta_width_m'],
			'meta_width_t'                => empty( $args['meta_width_t'] ) ? 80 : $args['meta_width_t'],
			'meta_width_d'                => empty( $args['meta_width_d'] ) ? 50 : $args['meta_width_d'],
			'content_font_size_m'         => empty( $args['content_font_size_m'] ) ? '' : $args['content_font_size_m'],
			'content_font_size_t'         => empty( $args['content_font_size_t'] ) ? '' : $args['content_font_size_t'],
			'content_font_size_d'         => empty( $args['content_font_size_d'] ) ? '' : $args['content_font_size_d'],
			'width'                       => empty( $args['width'] ) ? '950' : $args['width'],
			'coor_8'                      => empty( $args['coor_8'] ) ? 0 : $args['coor_8'],
			'coor_2'                      => empty( $args['coor_2'] ) ? 0 : $args['coor_2'],
			'm_coor_2'                    => empty( $args['m_coor_2'] ) ? 0 : $args['m_coor_2'],
			'm_coor_8'                    => empty( $args['m_coor_8'] ) ? 0 : $args['m_coor_8'],
			'border'                      => empty( $args['border'] ) ? '' : $args['border'],
			'border_check'                => empty( $args['border_check'] ) ? '' : $args['border_check'],
		);
		return $output;
	}
	$filter      = empty( $args['filter'] ) ? 'home' : $args['filter'];
	$tags        = empty( $args['post_tag'] ) ? '' : explode( ',', $args['post_tag'] );
	$posts       = empty( $args['posts'] ) ? '' : explode( ',', $args['posts'] );
	$cat         = empty( $args['category'] ) ? '' : $args['category'];
	$cat__not_in = empty( $args['cat__not_in'] ) ? array() : explode( ',', $args['cat__not_in'] );
	$ppp         = empty( $args['posts_per_page'] ) ? '' : $args['posts_per_page'];
	$offset      = empty( $args['offset'] ) ? '' : $args['offset'];
	$img_bg      = empty( $args['img_bg'] ) ? '' : $args['img_bg'];
	$img_bg_id   = empty( $args['img_bg_id'] ) ? '' : $args['img_bg_id'];

	$post_type = '';
	$tax_query = '';
	$tipi      = '';
	$trending  = '';

	if ( 301 == $p ) {
		$term    = '';
		$term_id = '';
		if ( TipiBuilder\ZeenHelpers::zeen_builder_call() ) {
			$term    = esc_attr( $_GET['taxonomy'] );
			$term_id = (int) $_GET['id'];
		}
		$description_check = empty( $args['description_check'] ) ? 'on' : $args['description_check'];
		$sorter            = empty( $args['sorter'] ) ? 'on' : $args['sorter'];
		$args['echo']      = false;
		$size              = 'on' == $fs ? 'xl' : 'l';
		return zeen_title_box(
			array(
				'echo'              => '',
				'term'              => $term,
				'img_bg'            => $img_bg,
				'img_bg_id'         => $img_bg_id,
				'uid'               => $uid,
				'size'              => $size,
				'term_id'           => $term_id,
				'sorter'            => $sorter,
				'description_check' => $description_check,
				'skin'              => $skin,
				'skin_outer'        => $skin_outer,
				'skin_text_color'   => $skin_text_color,
				'fs'                => $fs,
				'boxed_content'     => $boxed_content,
			)
		);
	}

	if ( ! empty( $args['order'] ) ) {
		switch ( $args['order'] ) {
			case 1:
				$tipi = 'oldest';
				break;
			case 2:
				$tipi = array( 'random' => rand( 10, 100 ) );
				break;
			case 31:
				$trending = array(
					'name' => 'tipi_trending_' . $ppp . '_' . $uid,
					'max'  => $ppp,
					'num'  => 2,
				);
				break;
			case 32:
				$trending = array(
					'name' => 'tipi_trending_' . $ppp . '_' . $uid,
					'max'  => $ppp,
					'num'  => 31,
				);
				break;
			case 4:
				$tipi = 'editor_rating';
				break;
			case 5:
				$tipi = 'visitor_rating';
				break;
			case 6:
				$tipi = 'latest_rating';
				break;
			case 7:
				$tipi = 'a_z';
				break;
			case 8:
				$tipi = 'z_a';
				break;
			case 9:
				$tipi = ! empty( $args['filter'] ) && ( 'posts' == $args['filter'] || 'product' == $args['filter'] ) ? 'post__in' : 'latest';
				break;
			case 41:
				$tipi = 'top_sellers';
				break;
			default:
				$tipi = 'latest';
				break;
		}
	}
	switch ( $filter ) {
		case 'category':
			$tags      = '';
			$posts     = '';
			$tax_query = '';
			break;
		case 'post_tag':
			$cat       = '';
			$posts     = '';
			$tax_query = '';
			break;
		case 'catstags':
			$posts     = '';
			$tax_query = '';
			break;
		case 'pages':
			$cat       = '';
			$tags      = '';
			$tax_query = '';
			$posts     = empty( $args['pages'] ) ? '' : explode( ',', $args['pages'] );
			$post_type = 'page';
			break;
		case 'post_format':
			$cat    = '';
			$tags   = '';
			$posts  = '';
			$format = empty( $args['post_format'] ) ? '' : $args['post_format'];
			if ( empty( $format ) ) {
				break;
			}
			$term      = get_term_by( 'id', $format, 'post_format' );
			$tax_query = $term->slug;
			break;
		case 'posts':
			$cat       = '';
			$tags      = '';
			$tax_query = '';
			break;
		case 'home':
			$cat       = '';
			$tags      = '';
			$tax_query = '';
			break;
		case 'product_cat':
			$cat       = '';
			$tags      = '';
			$tax_query = '';
			$post_type = 'product';
			$get_terms = true;
			break;
		case 'product_tag':
			$cat       = '';
			$tags      = '';
			$tax_query = '';
			$post_type = 'product';
			$get_terms = true;
			break;
		default:
			$get_terms = true;
			$cat       = '';
			$tags      = '';
			$posts     = '';
			$cpts      = zeen_get_post_types(
				array(
					'output'  => 'names',
					'builtin' => false,
					'shop'    => true,
				)
			);
			if ( in_array( $filter, $cpts ) ) {
				$post_type = $filter;
				$get_terms = '';
				$posts     = empty( $args[ $filter ] ) ? '' : explode( ',', $args[ $filter ] );
			}
			break;
	}

	if ( ! empty( $get_terms ) ) {
		$terms = empty( $args[ $args['filter'] ] ) ? '' : explode( ',', $args[ $args['filter'] ] );
		if ( ! empty( $terms ) ) {
			$tax_query = array(
				'relation' => 'OR',
			);
			foreach ( $terms as $key ) {
				$tax_query[] = array(
					'taxonomy' => $args['filter'],
					'field'    => 'term_id',
					'terms'    => array(
						$key,
					),
				);
			}
		}
	}

	if ( 46 == $p ) {
		$tax_query = 'post-format-video';
	}
	$options = array(
		'qry'                         => array(
			'cat'              => $cat,
			'posts_per_page'   => $ppp,
			'tag__in'          => $tags,
			'post__in'         => $posts,
			'category__not_in' => $cat__not_in,
			'offset'           => $offset,
			'post_type'        => $post_type,
			'tax_query'        => $tax_query,
			'tipi'             => $tipi,
			'trending'         => $trending,
		),
		'uid'                         => $uid,
		'preview'                     => $p,
		'fs'                          => $fs,
		'boxed_content'               => $boxed_content,
		'filter'                      => $filter,
		'fs_limit'                    => $fs_limit,
		'skin'                        => $skin,
		'skin_outer'                  => $skin_outer,
		'ndp_skip'                    => ! empty( $args['ndp_skip'] ) && 'on' == $args['ndp_skip']  ? true : '',
		'skin_parallax'               => empty( $args['skin_parallax'] ) ? '' : $args['skin_parallax'],
		'skin_text_color'             => $skin_text_color,
		'skin_img'                    => empty( $args['skin_img'] ) ? '' : $args['skin_img'],
		'skin_color'                  => empty( $args['skin_color'] ) ? '' : $args['skin_color'],
		'meta_background'             => isset( $args['meta_background'] ) ? $args['meta_background'] : '',
		'article_shadow'              => isset( $args['article_shadow'] ) ? $args['article_shadow'] : '',
		'meta_background_text_color'  => isset( $args['meta_background_text_color'] ) ? $args['meta_background_text_color'] : '',
		'meta_background_img'         => empty( $args['meta_background_img'] ) ? '' : $args['meta_background_img'],
		'meta_background_color'       => empty( $args['meta_background_color'] ) ? '' : $args['meta_background_color'],
		'img_bg'                      => $img_bg,
		'img_bg_id'                   => $img_bg_id,
		'img_shape'                   => empty( $args['img_shape'] ) ? $img_shape : $args['img_shape'],
		'gallery'                     => empty( $args['gallery'] ) ? '' : $args['gallery'],
		'layout_onoff'                => empty( $args['layout_onoff'] ) ? '' : $args['layout_onoff'],
		'layout'                      => $layout,
		'builder_block'               => true,
		'builder_request'             => $builder_request,
		'animation_stagger'           => empty( $args['animation_stagger'] ) ? 'off' : $args['animation_stagger'],
		'animation_onoff'             => empty( $args['animation_onoff'] ) ? 'off' : $args['animation_onoff'],
		'animation_type'              => empty( $args['animation_type'] ) ? 0 : $args['animation_type'],
		'image_hover_animation_onoff' => empty( $args['image_hover_animation_onoff'] ) ? 'off' : $args['image_hover_animation_onoff'],
		'image_hover_animation_type'  => empty( $args['image_hover_animation_type'] ) ? '2' : $args['image_hover_animation_type'],
		'position'                    => empty( $args['position'] ) ? '' : $args['position'],
		't_position'                  => empty( $args['t_position'] ) ? '' : $args['t_position'],
		'm_position'                  => empty( $args['m_position'] ) ? '' : $args['m_position'],
		'ad_type'                     => empty( $args['ad_type'] ) ? 0 : $args['ad_type'],
		'ad_img'                      => empty( $args['ad_img'] ) ? '' : $args['ad_img'],
		'ad_img_id'                   => empty( $args['ad_img_id'] ) ? '' : $args['ad_img_id'],
		'ad_img_2x'                   => empty( $args['ad_img_2x'] ) ? '' : $args['ad_img_2x'],
		'ad_img_2x_id'                => empty( $args['ad_img_2x_id'] ) ? '' : $args['ad_img_2x_id'],
		'ad_url'                      => empty( $args['ad_url'] ) ? '' : $args['ad_url'],
		'video_url'                   => empty( $args['video_url'] ) ? '' : $args['video_url'],
		'user'                        => empty( $args['user'] ) ? '' : $args['user'],
		'centered'                    => empty( $args['centered'] ) ? '' : $args['centered'],
		'autoplay'                    => empty( $args['autoplay'] ) ? '' : $args['autoplay'],
		'loop'                        => empty( $args['loop'] ) ? '' : $args['loop'],
		'info'                        => empty( $args['info'] ) ? '' : $args['info'],
		'mobile_design'               => empty( $args['mobile_design'] ) ? '' : $args['mobile_design'],
		'flip'                        => empty( $args['flip'] ) ? '' : $args['flip'],
		'flipstack'                   => empty( $args['flipstack'] ) ? '' : $args['flipstack'],
		'm_fs'                        => empty( $args['m_fs'] ) ? 'off' : $args['m_fs'],
		'posts_per_row'               => empty( $args['posts_per_row'] ) ? '' : $args['posts_per_row'],
		'byline_off'                  => empty( $args['byline_off'] ) || ( isset( $args['byline_off'] ) && 'off' == $args['byline_off'] ) ? '' : true,
		'fi_off'                      => empty( $args['fi_off'] ) || ( isset( $args['fi_off'] ) && 'off' == $args['fi_off'] ) ? '' : true,
		'pf_off'                      => empty( $args['pf_off'] ) || ( isset( $args['pf_off'] ) && 'off' == $args['pf_off'] ) ? '' : true,
		'excerpt_full'                => isset( $args['excerpt_full'] ) && 'on' == $args['excerpt_full'] ? true : '',
		'excerpt_off'                 => empty( $args['excerpt_off'] ) || ( isset( $args['excerpt_off'] ) && 'off' == $args['excerpt_off'] ) ? '' : true,
		'excerpt_length'              => empty( $args['excerpt_length'] ) ? '' : $args['excerpt_length'],
		'meta_location'               => empty( $args['meta_location'] ) ? '' : $args['meta_location'],
		'load_more'                   => empty( $args['load_more'] ) ? '' : $args['load_more'],
		'title_check'                 => empty( $args['title_check'] ) ? '' : $args['title_check'],
		'subtitle_check'              => empty( $args['subtitle_check'] ) ? '' : $args['subtitle_check'],
		'sticky'                      => empty( $args['sticky'] ) ? 'off' : $args['sticky'],
		'pretitle_check'              => empty( $args['pretitle_check'] ) ? '' : $args['pretitle_check'],
		'subscribe_style'             => empty( $args['subscribe_style'] ) ? '' : $args['subscribe_style'],
		'title'                       => empty( $args['title'] ) ? '' : $args['title'],
		'pretitle'                    => empty( $args['pretitle'] ) ? '' : $args['pretitle'],
		'subtitle'                    => empty( $args['subtitle'] ) ? '' : $args['subtitle'],
		'img_link'                    => empty( $args['img_link'] ) ? '' : $args['img_link'],
		'new_tab'                     => empty( $args['new_tab'] ) ? '' : $args['new_tab'],
		'small_print'                 => empty( $args['small_print'] ) ? '' : $args['small_print'],
		'small_print_check'           => empty( $args['small_print_check'] ) ? '' : $args['small_print_check'],
		'vertical_centered'           => empty( $args['vertical_centered'] ) ? '' : $args['vertical_centered'],
		'button_check'                => empty( $args['button_check'] ) ? '' : $args['button_check'],
		'divider_top'                 => empty( $args['divider_top'] ) ? '' : $args['divider_top'],
		'divider_bottom'              => empty( $args['divider_bottom'] ) ? '' : $args['divider_bottom'],
		'divider_bottom_onoff'        => empty( $args['divider_bottom_onoff'] ) ? '' : $args['divider_bottom_onoff'],
		'divider_top_onoff'           => empty( $args['divider_top_onoff'] ) ? '' : $args['divider_top_onoff'],
		'button_text'                 => empty( $args['button_text'] ) ? '' : $args['button_text'],
		'button_alignment'            => empty( $args['button_alignment'] ) ? '' : $args['button_alignment'],
		'button_check_2'              => empty( $args['button_check_2'] ) ? '' : $args['button_check_2'],
		'button_text_2'               => empty( $args['button_text_2'] ) ? '' : $args['button_text_2'],
		'button_design'               => empty( $args['button_design'] ) ? '' : $args['button_design'],
		'button_size'                 => ! isset( $args['button_size'] ) ? '' : $args['button_size'],
		'button_style_1'              => empty( $args['button_style_1'] ) ? '' : $args['button_style_1'],
		'button_style_2'              => empty( $args['button_style_2'] ) ? '' : $args['button_style_2'],
		'margin_top'                  => empty( $args['margin_top'] ) ? '' : $args['margin_top'],
		'margin_bottom'               => empty( $args['margin_bottom'] ) ? '' : $args['margin_bottom'],
		'effect'                      => empty( $args['effect'] ) ? '' : $args['effect'],
		'parllax_vertical'            => empty( $args['parllax_vertical'] ) ? 'on' : $args['parllax_vertical'],
		'wide_column_position'        => empty( $args['wide_column_position'] ) ? '' : $args['wide_column_position'],
		'parallax'                    => empty( $args['parallax'] ) ? '' : $args['parallax'],
		'custom_content'              => empty( $args['custom_content'] ) ? '' : $args['custom_content'],
		'desktop'                     => empty( $args['desktop'] ) ? 'on' : $args['desktop'],
		'mobile'                      => empty( $args['mobile'] ) ? 'on' : $args['mobile'],
		'pagination'                  => empty( $args['pagination'] ) ? 0 : $args['pagination'] + 1,
		'sidebar'                     => empty( $args['sidebar'] ) ? 'sidebar-default' : $args['sidebar'],
		'video_bg'                    => empty( $args['video_bg'] ) ? '' : $args['video_bg'],
		'only_inner'                  => empty( $args['only_inner'] ) ? '' : $args['only_inner'],
		'cta_content'                 => empty( $args['cta_content'] ) ? '' : $args['cta_content'],
		'separation'                  => empty( $args['separation'] ) ? '' : $args['separation'],
		'lightbox'                    => empty( $args['lightbox'] ) ? '' : $args['lightbox'],
		'cta_content_check'           => empty( $args['cta_content_check'] ) ? '' : $args['cta_content_check'],
		'video_title'                 => empty( $args['video_title'] ) ? '' : $args['video_title'],
		'nested'                      => empty( $args['nested'] ) ? array() : $args['nested'],
		'custom_class'                => empty( $args['custom_class'] ) ? '' : $args['custom_class'],
		'columns'                     => empty( $args['columns'] ) ? 2 : $args['columns'],
		'columns_d'                   => empty( $args['columns_d'] ) ? 2 : $args['columns_d'],
		'columns_t'                   => empty( $args['columns_t'] ) ? 2 : $args['columns_t'],
		'columns_m'                   => empty( $args['columns_m'] ) ? 1 : $args['columns_m'],
		'divider_skin_top'            => empty( $args['divider_skin_top'] ) ? '' : $args['divider_skin_top'],
		'divider_skin_bottom'         => empty( $args['divider_skin_bottom'] ) ? '' : $args['divider_skin_bottom'],
	);
	if ( 40 == $p ) {
		$options['events_count'] = empty( $args['events_count'] ) ? array() : $args['events_count'];
		for ( $i = 0; $i < 5; $i++ ) {
			$options[ 'event_date_' . $i ]        = empty( $args[ 'event_date_' . $i ] ) ? '' : $args[ 'event_date_' . $i ];
			$options[ 'event_url_' . $i ]         = empty( $args[ 'event_url_' . $i ] ) ? '' : $args[ 'event_url_' . $i ];
			$options[ 'event_url_title_' . $i ]   = empty( $args[ 'event_url_title_' . $i ] ) ? '' : $args[ 'event_url_title_' . $i ];
			$options[ 'event_img_' . $i ]         = empty( $args[ 'event_img_' . $i ] ) ? '' : $args[ 'event_img_' . $i ];
			$options[ 'event_img_' . $i . '_id' ] = empty( $args[ 'event_img_' . $i . '_id' ] ) ? '' : $args[ 'event_img_' . $i . '_id' ];
			$options[ 'event_location_' . $i ]    = empty( $args[ 'event_location_' . $i ] ) ? '' : $args[ 'event_location_' . $i ];
			$options[ 'event_name_' . $i ]        = empty( $args[ 'event_name_' . $i ] ) ? '' : $args[ 'event_name_' . $i ];
		}
	} elseif ( 60 == $p ) {
		for ( $i = 0; $i < 6; $i++ ) {
			$options[ 'button_text_' . $i ]         = empty( $args[ 'button_text_' . $i ] ) ? '' : $args[ 'button_text_' . $i ];
			$options[ 'ctagrid_url_' . $i ]         = empty( $args[ 'ctagrid_url_' . $i ] ) ? '' : $args[ 'ctagrid_url_' . $i ];
			$options[ 'ctagrid_title_' . $i ]       = empty( $args[ 'ctagrid_title_' . $i ] ) ? '' : $args[ 'ctagrid_title_' . $i ];
			$options[ 'ctagrid_subtitle_' . $i ]    = empty( $args[ 'ctagrid_subtitle_' . $i ] ) ? '' : $args[ 'ctagrid_subtitle_' . $i ];
			$options[ 'ctagrid_img_' . $i ]         = empty( $args[ 'ctagrid_img_' . $i ] ) ? '' : $args[ 'ctagrid_img_' . $i ];
			$options[ 'ctagrid_img_' . $i . '_id' ] = empty( $args[ 'ctagrid_img_' . $i . '_id' ] ) ? '' : $args[ 'ctagrid_img_' . $i . '_id' ];
		}
	} elseif ( 38 == $p ) {
		$social_networks = array(
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
			'mixcloud',
			'discord',
			'tiktok',
			'soundcloud',
			'letterboxd',
			'goodreads',
			'vk',
			'linkedin',
		);
		foreach ( $social_networks as $key ) {
			$options[ $key ]          = empty( $args[ $key ] ) ? '' : $args[ $key ];
			$options[ $key . '_url' ] = empty( $args[ $key . '_url' ] ) ? '' : $args[ $key . '_url' ];
		}
		$options['use_to'] = empty( $args['use_to'] ) ? 'on' : $args['use_to'];
	}

	$p_cache = $p;

	if ( 300 == $p ) {

		if ( is_page() && is_front_page() ) {
			$paged            = get_query_var( 'page' );
			$options['paged'] = empty( $paged ) ? 1 : (int) $paged;
		} else {
			$options['paged'] = empty( $paged ) ? 1 : (int) $paged;
		}

		if ( is_home() || is_page() ) {
			$options['archive'] = 'home';
			$options['filter']  = 'home';
		} else {
			$options['archive'] = 'tax';
			$options['filter']  = 'tax';
		}
		$options['preview'] = $layout;

		$options['qry'] = array(
			'posts_per_page'   => get_option( 'posts_per_page' ),
			'paged'            => $options['paged'],
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_status'      => 'publish',
			'category__not_in' => $cat__not_in,
		);
		if ( ! empty( $offset ) ) {
			$options['qry']['offset'] = $offset + ( ( $options['paged'] - 1 ) * get_option( 'posts_per_page' ) );
		}
	}

	$block = zeen_block_pick( $options );
	if ( 300 == $p_cache ) {
		return $block->output_with_sb(
			false,
			array(
				'preview' => $options['preview'],
			)
		);
	} elseif ( 110 == $p_cache ) {
		if ( empty( $builder_request ) ) {
			return $block->output( false );
		}
	} else {
		return $block->output( false );
	}

}
