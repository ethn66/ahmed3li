<?php
/**
 * @package Zeen
 * @since 1.0.0
 */

get_header();
$preview = zeen_preview_check();
$fw = zeen_fw_checker( $preview, 'archive' );
$img_shape = zeen_image_shape_checker( $preview );
$fs = empty( $fw ) ? 'off' : 'on';
$count = zeen_posts_count();
?>
<div id="primary" class="content-area">
	<div id="contents-wrap" <?php zeen_get_archive_layout_class( array( 'archive' => $preview ) ); ?>>
		<header class="page-header block-title-wrap content-bg tipi-row">
			<div class="results-count"><?php echo sprintf( _n( '%s result for', '%s results for', $count, 'zeen' ), $count ); ?></div>
			<h1 class="search-query"><?php echo esc_html( get_search_query( false ) ); ?></h1>
		</header><!-- .page-header -->
		<?php if ( empty( $fw ) ) { ?>
			<div class="tipi-row content-bg clearfix">
				<div class="tipi-cols clearfix sticky--wrap">
		<?php } ?>
		<main class="main <?php zeen_classes( array( 'preview' => $preview, 'complete' => 'off', 'fw' => $fw ) ); ?>">
			<?php if ( have_posts() ) : ?>
				<?php
				zeen_main_layout( array(
					'preview' => $preview,
					'fs' => $fs,
					'img_shape' => $img_shape,
				) );
				?>
			<?php else : ?>
				<?php zeen_main_layout_none(); ?>
			<?php endif; ?>
		</main><!-- .site-main -->
		<?php zeen_get_sidebar( array( 'archive' => $preview ) ); ?>
		<?php if ( empty( $fw ) ) { ?>
			</div>
			</div>
		<?php } ?>
	</div>
</div><!-- .content-area -->

<?php
get_footer();
