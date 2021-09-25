<?php
/**
 * Mobile Header 11 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area tipi-row header-padding">
	<div class="logo-main-wrap logo-mob-wrap">
		<?php zeen_logo( 'mobile' ); ?>
	</div>
	<?php get_template_part( 'template-parts/menu/menu-mob', 2 ); ?>
	<?php zeen_elem_bg_area( 'mobile_header' ); ?>
</div>
