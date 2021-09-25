<?php
/**
 * @package Zeen
 * @since 1.0.0
 */

get_header();
?>
<div id="primary" class="content-area">
	<div class="contents-wrap tipi-row content-bg article-layout-3">
		<main id="main" class="error404-main tipi-vertical-c">
			<h1><?php echo esc_attr( get_theme_mod( 'page_404_title', esc_attr__( "Sorry, this page doesn't exist", 'zeen' ) ) ); ?></h1>
			<?php if ( get_theme_mod( 'page_404_image' ) != '' ) { ?>
				<div class="img">
					<img src="<?php echo esc_url( get_theme_mod( 'page_404_image' ) ); ?>" alt="404">
				</div>
			<?php } ?>
			<a href="<?php echo esc_url( get_home_url() ); ?>" class="tipi-button error404-back button-arrow-l button-arrow"><i class="tipi-i-arrow-left"></i><span class="button-title"><?php echo esc_attr( get_theme_mod( 'page_404_button', esc_attr__( 'Back to homepage', 'zeen' ) ) ); ?></span></a>
		</main><!-- .site-main -->
	</div>
</div><!-- .content-area -->
<?php
get_footer();
