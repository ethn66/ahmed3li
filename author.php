<?php
/**
 * @package Zeen
 * @since 1.0.0
 */

get_header();
$preview = zeen_preview_check();
$fw = zeen_fw_checker( $preview, 'archive' );
$fs = empty( $fw ) ? 'off' : 'on';
$img_shape = zeen_image_shape_checker( $preview );
$design = $preview > 60 ? 1 : get_theme_mod( 'author_page_style', 1 );
?>
<div id="primary" class="content-area">
	<div id="contents-wrap" <?php zeen_get_archive_layout_class( array( 'archive' => $preview ) ); ?>>
		<?php
		if ( empty( $fw ) ) {
			echo '<div class="tipi-row content-bg clearfix">';
		}

		if ( 1 == $design ) {
			zeen_author_page_block( array(
				'aid' => $author,
				'design' => 1,
				'action_type' => 'archive',
				'fw' => $fw,
				'preview' => $preview,
			) );
		}
		zeen_ad( 'archive' );

		if ( empty( $fw ) ) {
			echo '<div class="tipi-cols clearfix sticky--wrap">';
		}
		if ( 2 == $design ) {
			zeen_get_sidebar( array( 'archive' => $preview, 'author_design' => $design, 'aid' => $author ) );
		}
		?>
		<main class="main <?php zeen_classes( array( 'preview' => $preview, 'complete' => 'off', 'fw' => $fw ) ); ?>">
			<?php if ( have_posts() ) : ?>
				<?php
				zeen_main_layout( array(
					'preview' => $preview,
					'img_shape' => $img_shape,
					'fs' => $fs,
					'specific' => 'archive',
				) );
				?>
			<?php else : ?>
				<?php zeen_main_layout_none(); ?>
			<?php endif; ?>
		</main><!-- .site-main -->
		<?php
		if ( 1 == $design ) {
			zeen_get_sidebar( array( 'archive' => $preview ) );
		}
		?>
		<?php if ( empty( $fw ) ) { ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div><!-- .content-area -->

<?php
get_footer();
