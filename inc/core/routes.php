<?php
/**
 * Routes
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Search
 *
 * @since 1.0.0
*/
function zeen_call_search( $request ) {

	$parameters = $request->get_query_params();
	if ( empty( $parameters['kw'] ) ) {
		die();
	}
	$options = array(
		'qry'       => array(
			'posts_per_page' => $parameters['ppp'],
			's'              => $parameters['kw'],
		),
		'uid'       => zeen_uid(),
		'preview'   => 22,
		'contained' => true,
		'ajax'      => true,
		'lazy_off'  => true,
	);
	$qry     = new WP_Query(
		array(
			'posts_per_page' => -1,
			's'              => $parameters['kw'],
			'fields'         => 'ids',
		)
	);
	if ( function_exists( 'relevanssi_do_query' ) ) {
		relevanssi_do_query( $qry );
	}
	$found_posts = 0;
	if ( $qry->have_posts() ) :
		$found_posts = $qry->found_posts;
		wp_reset_postdata();
	endif;
	echo '<div class="search-title">' . sprintf( _n( '%d result for', '%d results for', (int) $found_posts, 'zeen' ), (int) $found_posts ) . ' <span class="search-kw">' . esc_attr( $parameters['kw'] ) . '</span></div>';

	$block = new ZeenBlockClassic( $options );
	$block->output();
	die();
}

/**
 * Pagi
 *
 * @since 1.0.0
*/
function zeen_call_pagi() {

	$args                    = array();
	$root                    = isset( $_POST['basePagi'] ) ? esc_url( $_POST['basePagi'] ) : '';
	$paged                   = isset( $_POST['paged'] ) ? (int) $_POST['paged'] + 1 : 1;
	$p                       = isset( $_POST['preview'] ) ? (int) $_POST['preview'] : 1;
	$img_shape               = isset( $_POST['img_shape'] ) ? (int) $_POST['img_shape'] : '';
	$byline_off              = isset( $_POST['byline_off'] ) ? (int) $_POST['byline_off'] : '';
	$mnp                     = isset( $_POST['mnp'] ) ? ( $_POST['mnp'] ) : 1;
	$pagi                    = isset( $_POST['type'] ) ? (int) ( $_POST['type'] ) : 1;
	$frontpage               = isset( $_POST['frontpage'] ) && 'true' == $_POST['frontpage'] ? true : '';
	$qry                     = isset( $_POST['qry'] ) ? $_POST['qry'] : array();
	$qry['paged']            = $paged;
	$qry['suppress_filters'] = true;
	$qry['nopaging']         = false;
	$qry['archive_qry']      = true;
	$inner                   = '';
	if ( 24 == $p || 64 == $p || 65 == $p ) {
		$inner = true;
	}
	$options = array(
		'preview'    => $p,
		'qry'        => $qry,
		'byline_off' => $byline_off,
		'paged'      => $paged,
		'pagination' => $pagi,
		'root'       => $root,
		'only_block' => true,
		'only_inner' => $inner,
		'mnp'        => $mnp,
		'ajax'       => true,
		'archive'    => true,
		'img_shape'  => $img_shape,
		'frontpage'  => $frontpage,
	);
	if ( ! empty( $_POST['excerpt_off'] ) ) {
		$options['excerpt_off'] = (int) $_POST['excerpt_off'];
	}
	$block = zeen_block_pick( $options );
	$block->output();
	die();
}

/**
 * Block
 *
 * @since 1.0.0
*/
function zeen_call_block() {
	$term_data             = '';
	$term                  = empty( $_GET['data']['term'] ) ? '' : $_GET['data']['term'];
	$preview               = isset( $_GET['data']['preview'] ) ? $_GET['data']['preview'] : 1;
	$byline_off            = ( empty( $_GET['data']['byline_off'] ) || ( isset( $_GET['data']['byline_off'] ) && 'off' === $_GET['data']['byline_off'] ) ) ? '' : true;
	$fi_off                = ( empty( $_GET['data']['fi_off'] ) || ( isset( $_GET['data']['fi_off'] ) && 'off' === $_GET['data']['fi_off'] ) ) ? '' : true;
	$excerpt_off           = empty( $_GET['data']['excerpt_off'] ) || ( isset( $_GET['data']['excerpt_off'] ) && 'off' === $_GET['data']['excerpt_off'] ) ? '' : true;
	$excerpt_length        = empty( $_GET['data']['excerpt_length'] ) ? 12 : $_GET['data']['excerpt_length'];
	$excerpt_full          = empty( $_GET['data']['excerpt_full'] ) ? '' : true;
	$review_off            = empty( $_GET['data']['review_off'] ) ? '' : true;
	$img_shape             = empty( $_GET['data']['img_shape'] ) ? '' : $_GET['data']['img_shape'];
	$is110                 = empty( $_GET['data']['is110'] ) ? '' : $_GET['data']['is110'];
	$post_subtitle         = empty( $_GET['data']['post_subtitle'] ) ? '' : $_GET['data']['post_subtitle'];
	$counter               = empty( $_GET['data']['counter'] ) ? '' : true;
	$counter_class         = empty( $_GET['data']['counter_class'] ) ? '' : esc_attr( $_GET['counter_class'] );
	$qry                   = isset( $_GET['data']['args'] ) ? $_GET['data']['args'] : array();
	$qry['posts_per_page'] = isset( $_GET['data']['ppp'] ) ? (int) $_GET['data']['ppp'] : '';
	$qry['paged']          = ! empty( $_GET['paged'] ) ? (int) $_GET['paged'] : 2;
	$uid                   = empty( $_GET['data']['id'] ) ? '' : $_GET['data']['id'];
	$uid                   = empty( $_GET['uid'] ) ? $uid : $_GET['uid'];
	$specific              = empty( $_GET['mm'] ) ? '' : 'mm';
	if ( ! empty( $_GET['trending'] ) ) {
		$qry['trending'] = array(
			'name' => $_GET['trending'][0],
			'num'  => $_GET['trending'][1],
		);
	}
	if ( ! empty( $term ) ) {

		switch ( $term['term'] ) {
			case 'category':
				$qry['cat'] = $term['id'];
				break;
			case 'post_tag':
				$qry['tag__in'] = $term['id'];
				break;
			default:
				$qry['post_type'] = zeen_get_cpt_from_tax( $term['term'] );
				$qry['tax_query'] = array(
					array(
						'taxonomy' => $term['term'],
						'field'    => 'term_id',
						'terms'    => $term['id'],
					),
				);
				break;
		}
		$term_data = array(
			'id'   => $term['id'],
			'term' => $term['term'],
		);
	}
	$qry['block_qry'] = true;
	$options          = array(
		'qry'            => $qry,
		'uid'            => (int) $uid,
		'preview'        => $preview,
		'excerpt_off'    => $excerpt_off,
		'excerpt_length' => $excerpt_length,
		'excerpt_full'   => $excerpt_full,
		'img_shape'      => $img_shape,
		'post_subtitle'  => $post_subtitle,
		'byline_off'     => $byline_off,
		'fi_off'         => $fi_off,
		'review_off'     => $review_off,
		'only_inner'     => true,
		'is100'          => $is110,
		'specific'       => $specific,
		'counter_class'  => $counter_class,
		'counter'        => $counter,
		'term'           => $term_data,
		'ajax'           => true,
		'lazy_off'       => true,
	);
	$block            = zeen_block_pick( $options );
	$response         = $block->output( false );
	$mnp              = $block->mnp();
	die( wp_json_encode( array( $mnp, $response ) ) );
}

/**
 * Like
 *
 * @since 1.0.0
*/
function zeen_call_like() {
	$pid = isset( $_POST['pid'] ) ? $_POST['pid'] : '';
	if ( isset( $_COOKIE['liked_articles'] ) ) {
		$cook   = json_decode( $_COOKIE['liked_articles'], true );
		$cook[] = $pid;
	} else {
		$cook = array( $pid );
	}
	$count = get_post_meta( (int) $pid, 'zeen_like_count', true );
	$count = empty( $count ) ? 0 : $count;

	update_post_meta( (int) $pid, 'zeen_like_count', (int) ( $count + 1 ) );

	$count = wp_json_encode( (int) ( $count + 1 ) );

	die( wp_json_encode( array( $count, $cook ) ) );
}

/**
 * IPL
 *
 * @since 1.0.0
*/
function zeen_call_ipl() {

	if ( apply_filters( 'zeen_ipl_cached', true ) === true ) {
		$pid    = isset( $_GET['pid'] ) ? (int) $_GET['pid'] : '';
		$offset = isset( $_GET['counter'] ) ? $_GET['counter'] : 0;
	} else {
		$pid    = isset( $_POST['pid'] ) ? (int) $_POST['pid'] : '';
		$offset = isset( $_POST['counter'] ) ? $_POST['counter'] : 0;
	}
	$qry = zeen_qry(
		array(
			'p'                   => (int) $pid,
			'offset'              => (int) $offset,
			'posts_per_page'      => 1,
			'post_status'         => array( 'publish', 'private' ),
			'ignore_sticky_posts' => true,
			'post_type'           => get_post_type( $pid ),
		)
	);

	$ipl_args = array();
	if ( $qry->have_posts() ) {

		while ( $qry->have_posts() ) :
			$qry->the_post();
			global $post;
			$pid               = $post->ID;
			$args              = zeen_get_hero_design( $pid, '', true );
			$args['ipl']       = true;
			$layout            = zeen_get_article_layout( $pid, $args );
			$post_wrap_class   = zeen_post_wrap_class( $pid, $args );
			$ipl_args          = zeen_ipl_args( $pid );
			$post_wrap_class[] = 'ipl-wrap';
			$post_wrap_class[] = 'ipl-loading';
			?>
			<div <?php post_class( $post_wrap_class ); ?>>
			<?php
			if ( 51 == $args['hero_design'] ) {
				$skip_bones = true;
				zeen_hero_with_content( $args );
			} elseif ( $args['hero_design'] > 9 || 4 == $args['hero_design'] ) {
				zeen_hero_design( $args );
			}
			if ( empty( $skip_bones ) ) {
				echo '<div class="single-content contents-wrap tipi-row content-bg clearfix article-layout-' . (int) $layout;
				if ( empty( $args['fi'] ) ) {
					echo ' no-fi-wrap';
				}
				if ( $layout > 30 && $layout < 40 && 25 == $args['hero_design'] ) {
					echo ' limited-width-cut';
				}
				echo '">';
				echo '<div class="tipi-cols clearfix sticky--wrap">';
				zeen_single_bones(
					array(
						'style'  => $args,
						'layout' => $layout,
						'pid'    => $pid,
						'ipl'    => true,
					)
				);
			}
		endwhile;
		zeen_get_sidebar( $args );
		if ( empty( $skip_bones ) ) {
			?>
		</div><!-- .tipi-cols -->
			<?php zeen_end_post_sticky_wrap( $post, true ); ?>
		</div><!-- .tipi-row -->
		<?php } ?>
		</div><!-- .post-wrap -->
		<?php
		zeen_ipl_base( $ipl_args );
		wp_reset_postdata();
	}
	die();
}

/**
 * QV
 *
 * @since 1.0.0
*/
function zeen_call_qv( $request ) {

	$parameters = $request->get_query_params();

	if ( empty( $parameters['id'] ) ) {
		return;
	}

	$args = array(
		'p'         => $parameters['id'],
		'post_type' => 'product',
	);

	$qry = new WP_Query( $args );
	if ( $qry->have_posts() ) :
		while ( $qry->have_posts() ) :
			WC()->frontend_includes();
			$qry->the_post();
			echo '<div id="product-' . (int) $parameters['id'] . '" class="qv-wrap product tipi-flex" data-pid="' . (int) $parameters['id'] . '">';
			echo '<div class="images woo-gallery__wrap tipi-xs-12 tipi-s-6"><div class="mask">';
			zeen_featured_img(
				$parameters['id'],
				array(
					'width'    => 585,
					'height'   => 585,
					'lazy_off' => true,
				)
			);
			echo '</div></div>';

			echo '<div class="qv-summary summary entry-summary tipi-xs-12 tipi-s-6">';
			add_action( 'woocommerce_single_product_summary', 'zeen_woo_summary_top', 4 );
			add_action( 'woocommerce_single_product_summary', 'zeen_woo_summary_bot', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			add_action( 'woocommerce_single_product_summary', 'zeen_woocommerce_template_single_title', 5 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );
			do_action( 'woocommerce_single_product_summary' );
			echo '</div>';
			echo '</div>';
		endwhile;
		wp_reset_postdata();
	endif;
	die();
}

/**
 * Posts
 *
 * @since 1.0.0
*/
function zeen_call_posts( $request ) {

	$posts  = get_posts(
		array(
			'posts_per_page' => -1,
		)
	);
	$output = array();
	foreach ( $posts as $key ) {
		$output[] = array(
			'label' => $key->post_title,
			'value' => $key->ID,
		);
	}
	die( wp_json_encode( $output ) );
}


function zeen_call_rt() {
	$pid      = isset( $_POST['pid'] ) ? (int) $_POST['pid'] : '';
	$reaction = isset( $_POST['reaction'] ) ? esc_attr( $_POST['reaction'] ) : '';
	if ( empty( $pid ) || empty( $reaction ) ) {
		die();
	}
	$cook   = isset( $_COOKIE['reaction'] ) ? json_decode( stripslashes( html_entity_decode( $_COOKIE['reaction'] ) ), true ) : array();
	$cook   = is_array( $cook ) ? $cook : array();
	$scores = get_post_meta( $pid, 'zeen_reaction', true );
	if ( ! empty( $scores ) ) {
		$voted = 1;
		if ( ! empty( $cook[ $pid ] ) ) {
			if ( strpos( $cook[ $pid ], $reaction ) !== false ) {
				$voted   = -1;
				$newcook = str_replace( $reaction, '', $cook[ $pid ] );
				$newcook = str_replace( ',,', ',', $newcook );
				$newcook = rtrim( $newcook, ',' );
			} else {
				$newcook = $cook[ $pid ] . ',' . $reaction;
			}
		} else {
			$newcook = $reaction;
		}
		$scores[ $reaction ] = empty( $scores[ $reaction ] ) ? 1 : $scores[ $reaction ] + $voted;
	} else {
		$scores  = array(
			$reaction => 1,
		);
		$newcook = $reaction;
	}
	$cook[ $pid ] = $newcook;
	update_post_meta( $pid, 'zeen_reaction', $scores );
	die(
		wp_json_encode(
			array(
				'newScore' => $scores[ $reaction ],
				'cook'     => $cook,
				'countStyle' => get_theme_mod( 'single_reactions_score', 1 ),
				'vote' => $voted,
			)
		)
	);
}


function zeen_call_ud() {
	$pid = isset( $_POST['pid'] ) ? (int) $_POST['pid'] : '';
	$type = isset( $_POST['type'] ) && 'down' == $_POST['type'] ? 'down' : 'up';
	if ( empty( $pid ) ) {
		die();
	}
	$cook = isset( $_COOKIE['updown'] ) ? json_decode( stripslashes( html_entity_decode( $_COOKIE['updown'] ) ), true ) : array();
	$cook = is_array( $cook ) ? $cook : array();
	$existing = ! empty( $cook[ $pid ] ) ? $cook[ $pid ] : false;
	$up_downs = get_post_meta( $pid, 'zeen_ur_up_down', true );
	if ( ! empty( $up_downs ) ) {
		if ( false !== $existing ) {
			if ( 'up' == $type && 'up' == $existing || 'down' == $type && 'down' == $existing ) {
				if ( 'down' == $type ) {
					$down_new = (int) $up_downs['down'] - 1;
					$up_new = $up_downs['up'];
				} else {
					$up_new = (int) $up_downs['up'] - 1;
					$down_new = $up_downs['down'];
				}
				$unsetter = true;
			} else {
				if ( 'down' == $type ) {
					$down_new = (int) $up_downs['down'] + 1;
					$up_new = $up_downs['up'] - 1;
				} else {
					$up_new = (int) $up_downs['up'] + 1;
					$down_new = $up_downs['down'] - 1;
				}
			}
		} else {
			$up_new = 'up' == $type ? (int) $up_downs['up'] + 1 : $up_downs['up'];
			$down_new = 'down' == $type ? (int) $up_downs['down'] + 1 : $up_downs['down'];
		}
	} else {
		$up_new = 'up' == $type ? 1 : 0;
		$down_new = 'down' == $type ? 1 : 0;
	}
	$up_new = $up_new < 0 ? 0 : $up_new;
	$down_new = $down_new < 0 ? 0 : $down_new;
	update_post_meta( $pid, 'zeen_ur_up_down',  array(
		'up' => $up_new,
		'down' => $down_new,
	)  );
	$cook[ $pid ] = $type;
	if ( ! empty( $unsetter ) ) {
		unset( $cook[ $pid ] );
	}
	die( wp_json_encode( array(
		'upNew' => $up_new,
		'downNew' => $down_new,
		'cook' => $cook,
	) ) );
}

/**
 * Reset
 *
 * @since 1.0.0
*/
function zeen_call_c_reset() {
	remove_theme_mods();
	die();
}

/**
 * Routes
 *
 * @since 1.0.0
*/
function zeen_routes() {
	register_rest_route(
		'codetipi-zeen/v1',
		'/sort',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'zeen_call_sort',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/s',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'zeen_call_search',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/pagi',
		array(
			'methods'             => WP_REST_Server::EDITABLE,
			'callback'            => 'zeen_call_pagi',
			'permission_callback' => '__return_true',
		)
	);
	register_rest_route(
		'codetipi-zeen/v1',
		'/ud',
		array(
			'methods'             => WP_REST_Server::EDITABLE,
			'callback'            => 'zeen_call_ud',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/block',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'zeen_call_block',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/ipl',
		array(
			'methods'             => apply_filters( 'zeen_ipl_cached', true ) === true ? WP_REST_Server::READABLE : WP_REST_Server::EDITABLE,
			'callback'            => 'zeen_call_ipl',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/lk',
		array(
			'methods'             => WP_REST_Server::EDITABLE,
			'callback'            => 'zeen_call_like',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/rt',
		array(
			'methods'             => WP_REST_Server::EDITABLE,
			'callback'            => 'zeen_call_rt',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v1',
		'/qv',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'zeen_call_qv',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v2',
		'/posts',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'zeen_call_posts',
			'permission_callback' => '__return_true',
		)
	);

	register_rest_route(
		'codetipi-zeen/v2',
		'/c_r',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'zeen_call_c_reset',
			'permission_callback' => function () {
				return current_user_can( 'edit_others_posts' );
			},
		)
	);
}
add_action( 'rest_api_init', 'zeen_routes' );
