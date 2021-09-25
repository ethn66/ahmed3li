<?php
/**
 * Page Template
 *
 * @package Zeen
 * @since 1.0.0
 */

get_header();
$pw           = post_password_required( $post );
$builder      = empty( $pw ) ? get_post_meta( $post->ID, 'tipi_builder_active', true ) : '';
$builder_call = TipiBuilder\ZeenHelpers::zeen_frame_call();
if ( empty( $builder ) ) {
	$builder = $builder_call;
}

$args               = zeen_get_hero_design( $post->ID, 'pages_' );
$args['is_page']    = 'pages_';
$args['is_builder'] = $builder;
$layout             = zeen_get_article_layout( $post->ID );
$post_wrap_class    = zeen_post_wrap_class( $post->ID, $args, array( 'page-wrap' ) );
$class              = 'single-content contents-wrap clearfix article-layout-' . intval( $layout );
if ( empty( $builder ) ) {
	$class .= ' tipi-row content-bg ';
} elseif ( zeen_bg_ad_is_active() ) {
	$class .= ' tipi-row';
}
?>
<div id="primary" class="content-area">
	<div id="page-wrap" <?php post_class( $post_wrap_class ); ?>>
		<?php
		if ( ( $args['hero_design'] > 9 || 4 == $args['hero_design'] ) && empty( $builder ) ) {
			zeen_hero_design( $args );
		}
		?>
		<div id="contents-wrap" class="<?php echo esc_attr( $class ); ?>">
			<?php if ( empty( $builder ) ) { ?>
			<div class="tipi-cols clearfix sticky--wrap">
			<?php } ?>
				<?php
				if ( empty( $builder_call ) ) {
					while ( have_posts() ) :
						the_post();
						zeen_single_bones(
							array(
								'style'   => $args,
								'layout'  => $layout,
								'builder' => $builder,
							)
						);
					endwhile;
					zeen_get_sidebar();
				}
				?>
			<?php if ( empty( $builder ) ) { ?>
			</div><!-- .tipi-cols -->
			<?php } ?>
		</div><!-- .tipi-row -->
		<?php do_action( 'zeen_end_contents_wrap' ); ?>
	</div><!-- .post-wrap -->
</div><!-- .content-area -->
<?php
get_footer();
