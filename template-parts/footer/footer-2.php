<?php
/**
 * Footer 2 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php get_template_part( 'template-parts/footer/footer-widget', 1 ); ?>
<div class="footer-lower-area footer-area clearfix site-skin-<?php echo (int) get_theme_mod( 'footer_skin', 2 ); ?>">
	<div class="tipi-row tipi-flex tipi-xs-flex-full">
		<div class="logo-copyright-block">
			<?php zeen_logo( 'footer' ); ?>
			<?php zeen_copyright_line(); ?>
		</div>
		<div class="tipi-flex-right">
			<?php zeen_footer_icons(); ?>
			<?php get_template_part( 'template-parts/menu/menu-footer', 1 ); ?>
			<?php zeen_to_top( '', 'footer' ); ?>
		</div>
	</div>
</div>
