<?php
/**
 * Header 53 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area">
	<div class="logo-main-wrap clearfix tipi-row tipi-vertical-c">
		<?php zeen_logo( 'p_menu'); ?>
		<ul class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_secondary_menu', 3 ); ?> menu-icons tipi-flex-r">
			<?php zeen_icons( array( 'location' => 'secondary_menu', 'p-menu' => true, 'type' => 'search' ) ); ?>
			<?php zeen_icons( array( 'location' => 'secondary_menu', 'p-menu' => true, 'type' => 'slide' ) ); ?>
		</ul>
	</div>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
