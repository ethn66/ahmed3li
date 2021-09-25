<?php
/**
 * Header 5 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$icons = zeen_icons( array(
	'location' => 'secondary_menu',
	'test' => true,
) );
?>
<div class="bg-area">
	<div class="logo-main-wrap header-padding clearfix<?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?> tipi-vertical-c">
		<?php zeen_logo(); ?>
		<?php zeen_cta( 'header' ); ?>
		<?php if ( has_nav_menu( 'secondary' ) || ! empty( $icons ) ) { ?>
			<div id="secondary-wrap" class="secondary-wrap tipi-flex-right font-<?php echo (int) get_theme_mod( 'typo_secondary_menu', 3 ); ?>">
				<?php get_template_part( 'template-parts/menu/menu-secondary', 2 ); ?>
			</div>
		<?php } ?>
	</div>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
