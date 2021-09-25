<?php
/**
 * @package Zeen
 * @since 1.0.0
*/

get_header();
$style           = zeen_get_hero_design( $post->ID );
$post_wrap_class = 'post-wrap clearfix title-above-c sidebar-off article-layout-skin-1 attachment-hero';
?>
<div id="primary" class="content-area">
	<div <?php post_class( $post_wrap_class ); ?>>
		<div class="contents-wrap tipi-row content-bg article-layout-1"
			<?php
			while ( have_posts() ) :
				the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
					<div class="meta-wrap clearfix">
						<div class="meta">
							<h1 class="entry-title"><?php echo get_the_title( $post->ID ); ?></h1>
						</div>
					</div>
					<div class="hero-wrap clearfix hero-13 tipi-row hero-m">
						<div class="hero">
							<?php echo wp_get_attachment_link( $post->ID, 'full' ); ?>
						</div>
					</div>

					</article>
			<?php endwhile; ?>
		</div><!-- .tipi-row -->
	</div><!-- .post-wrap -->
</div><!-- .content-area -->
<?php
get_footer();
