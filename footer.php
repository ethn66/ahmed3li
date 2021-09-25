<?php
/**
 * @package Zeen
 * @since 1.0.0
 */
?>
		</div><!-- .site-content -->
		<?php
		zeen_instagram_block( array(
			'placement' => 1,
			'location' => 'footer',
		) );
		?>
		<footer id="colophon" class="site-footer site-footer-<?php echo (int) zeen_get_style( 'footer' ); ?> site-img-<?php echo (int) zeen_skin_style( 'footer', 'repeat' ); ?> widget-area-borders-<?php echo (int) get_theme_mod( 'footer_widget_borders', 1 ); ?> footer-<?php if ( get_theme_mod( 'footer_width', 1 ) == 1 ) { echo 'fs'; } else { echo 'box'; } ?> <?php if ( get_theme_mod( 'footer_widgets_centered' ) == 1 ) { echo ' widget-title-center'; } else { echo ' widget-title-default'; } ?> footer__mob__cols-<?php echo (int) get_theme_mod( 'footer_widgets_columns_mobile', 1 ); ?> clearfix">
			<div class="bg-area">
				<?php if ( get_theme_mod( 'footer_splitter_top_onoff' ) == 1 ) { ?>
					<?php zeen_shape( array( 'shape' => get_theme_mod( 'footer_splitter_top' ), 'location' => 'top' ) ); ?>
				<?php } ?>
				<div class="bg-area-inner<?php if ( 2 == get_theme_mod( 'footer_width', 1 ) ) { echo ' tipi-row'; } ?>">
					<?php zeen_ad( 'footer', true ); ?>
					<?php get_template_part( 'template-parts/footer/footer', zeen_get_style( 'footer' ) ); ?>
					<?php zeen_elem_bg_area( 'footer' ); ?>
				</div>
			</div>
		</footer><!-- .site-footer -->
		<?php do_action( 'zeen_after_footer' ); ?>
		<?php
		zeen_instagram_block( array(
			'placement' => 2,
			'location'  => 'footer',
		) );
		?>

	</div><!-- .site-inner -->

</div><!-- .site -->
<?php zeen_slide_menu(); ?>
<?php zeen_slide_menu( 'slide' ); ?>
<?php zeen_slide_menu( 'cart' ); ?>
<?php zeen_slide_menu( 'filter' ); ?>
<?php do_action( 'zeen_after_site' ); ?>
<?php wp_footer(); ?>
</body>
</html>