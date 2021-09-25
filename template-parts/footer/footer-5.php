<?php
/**
 * Footer 5 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php $class = get_theme_mod( 'footer_icon_style', 1 ) == 3 ? ' tipi-flex-wrap' : ''; ?>
<?php get_template_part( 'template-parts/footer/footer-widget', 1 ); ?>
<div class="footer-lower-area footer-area tipi-xs-12 clearfix site-skin-<?php echo (int) get_theme_mod( 'footer_skin', 2 ); ?>">
	<div class="tipi-row">
		<div class="tipi-flex">
			<?php zeen_logo( 'footer' ); ?>
			<div class="tipi-flex-right">
				<?php get_template_part( 'template-parts/menu/menu-footer', 1 ); ?>
				<ul class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_footer_menu', 3 ); ?> menu-icons<?php echo esc_attr( $class ); ?>">
					<?php zeen_icons( array( 'location' => 'footer' ) ); ?>
					<?php zeen_to_top( 'li', 'footer' ); ?>
				</ul>
			</div>
		</div>
		<?php zeen_copyright_line( 'c' ); ?>
	</div>
</div>
