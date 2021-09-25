<?php
/**
 * Mobile Menu
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div id="mob-menu-wrap" class="mob-menu-wrap mobile-navigation-dd tipi-m-0 site-skin-<?php echo intval( zeen_skin_style( 'mobile_menu', 'skin', 2 ) ); ?> site-img-<?php echo intval( zeen_skin_style( 'mobile_menu', 'repeat' ) ); ?>">
	<div class="bg-area">
		<a href="#" class="mob-tr-close tipi-close-icon"><i class="tipi-i-close" aria-hidden="true"></i></a>
		<div class="content-wrap">
			<div class="content">
				<?php zeen_logo( 'mobile_menu' ); ?>
				<?php do_action( 'zeen_mobile_menu_before_content' ); ?>
				<?php get_template_part( 'template-parts/menu/menu-mob', 1 ); ?>
				<ul class="menu-icons horizontal-menu">
					<?php zeen_icons( array( 'location' => 'mobile' ) ); ?>
				</ul>
			</div>
		</div>
		<?php zeen_elem_bg_area( 'mobile_menu' ); ?>
	</div>
</div>
