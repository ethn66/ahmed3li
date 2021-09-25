<?php
/**
 * Page Template
 *
 * @package Zeen
 * @since 1.0.0
 * Template Name: Team Template (4 author per row)
 */

get_header();
$args = zeen_get_hero_design( $post->ID, 'pages_' );
$args['is_page'] = 'pages_';
$post_wrap_class = zeen_post_wrap_class( $post->ID, $args, array( 'page-wrap' ) );
$layout = zeen_get_article_layout( $post->ID );
$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
?>
<div id="primary" class="content-area">

	<div id="page-wrap" <?php post_class( $post_wrap_class ); ?>>

		<?php
		if ( $args['hero_design'] > 9 || 4 == $args['hero_design'] ) {
			zeen_hero_design( $args );
		}
		?>
		<div id="contents-wrap" class="single-content contents-wrap tipi-row <?php if ( empty( $builder ) ) { echo 'content-bg '; } ?>article-layout-<?php echo intval( $layout ); ?> clearfix">
			<div class="tipi-cols clearfix sticky--wrap">
				<?php
				while ( have_posts() ) :
					the_post();
					zeen_single_bones( array(
						'style' => $args,
						'page_template' => 4,
						'builder' => $builder,
					) );
				endwhile;
				zeen_get_sidebar();
				?>
			</div><!-- .tipi-cols -->
		</div><!-- .tipi-row -->
	</div><!-- .post-wrap -->
</div><!-- .content-area -->

<?php
get_footer();
