<?php
/**
 * Page Template
 *
 * @package Zeen
 * @since 1.0.0
 * Template Name: Fully Blank Page
 */
$builder = get_post_meta( $post->ID, 'tipi_builder_active', true );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( get_theme_mod( 'responsive', 1 ) == 1 ) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php } else { ?>
		<meta name="viewport" content="width=1280">
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div class="site-inner">
			<div id="content" class="site-content clearfix">
				<div id="primary" class="content-area">

					<div id="page-wrap" <?php post_class(); ?>>

						<div id="contents-wrap" class="single-content contents-wrap <?php if ( empty( $builder ) ) { echo 'tipi-row content-bg '; } ?>clearfix">
							<div class="tipi-cols clearfix sticky--wrap">
								<?php
								while ( have_posts() ) :
									the_post();
									if ( ! empty( $builder ) ) {
										$content = get_post_meta( $post->ID, 'tipi_builder_data', true );
										zeen_builder_data( $content );
									} else {
										the_content();
									}
								endwhile;
								?>
							</div><!-- .tipi-cols -->
						</div><!-- .tipi-row -->
					</div><!-- .post-wrap -->
				</div><!-- .content-area -->
			</div><!-- .site-content -->

		</div><!-- .site-inner -->

	</div><!-- .site -->
	<?php zeen_slide_menu(); ?>
	<?php zeen_slide_menu( 'cart' ); ?>
	<?php zeen_slide_menu( 'slide' ); ?>
	<?php do_action( 'zeen_after_site' ); ?>
	<?php wp_footer(); ?>
</body>
</html><!-- And they all lived happily ever after... The End. -->