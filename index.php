<?php
/**
 * @package Zeen
 * @since 1.0.0
 */

get_header();
$p         = zeen_preview_check();
$img_shape = zeen_image_shape_checker( $p );
$fw        = zeen_fw_checker( $p, 'archive' );
$fs        = empty( $fw ) ? 'off' : 'on';
?>
<div id="primary" class="content-area">
	<div id="contents-wrap" <?php zeen_get_archive_layout_class( array( 'archive' => $p ) ); ?>>
		<?php if ( empty( $fw ) ) { ?>
			<div class="tipi-row content-bg clearfix">
				<div class="tipi-cols clearfix sticky--wrap">
		<?php } ?>
		<?php zeen_ad( 'blog_page' ); ?>
		<main class="main 
		<?php
		zeen_classes(
			array(
				'preview'  => $p,
				'complete' => 'off',
				'fw'       => $fw,
			)
		);
		?>
		">
			<?php if ( have_posts() ) : ?>
				<?php
				zeen_main_layout(
					array(
						'preview'   => $p,
						'fs'        => $fs,
						'img_shape' => $img_shape,
					)
				);
				?>
			<?php else : ?>
				<?php zeen_main_layout_none(); ?>
			<?php endif; ?>
		</main><!-- .site-main -->
		<?php zeen_get_sidebar( array( 'archive' => $p ) ); ?>
		<?php if ( empty( $fw ) ) { ?>
			</div>
			</div>
		<?php } ?>
		<?php do_action( 'zeen_end_contents_wrap' ); ?>
	</div>
</div><!-- .content-area -->

<?php
get_footer();
