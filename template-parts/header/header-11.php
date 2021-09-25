<?php
/**
 * Header 11 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$secondary = zeen_icons(
	array(
		'location' => 'secondary_menu',
		'test'     => true,
	)
);
?>
<div class="bg-area">
	<?php
	echo '<div class="tipi-flex-lcr header-padding tipi-flex-eq-height';
	if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) {
		echo ' tipi-row';
	}
	echo '">';
	?>
		<ul class="horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_secondary_menu', 3 ); ?> menu-icons tipi-flex-l secondary-wrap">
		<?php if ( ! empty( $secondary ) ) { ?>
			<?php
			zeen_icons(
				array(
					'location' => 'secondary_menu',
					'type'     => 'social',
				)
			);
			?>
		<?php } ?>
		</ul>
		<?php zeen_logo( 'main', array( 'wrap_class' => 'logo-main-wrap header-padding tipi-all-c logo-main-wrap-center' ) ); ?>
		<?php zeen_cta( 'header' ); ?>
		<ul class="horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_secondary_menu', 3 ); ?> menu-icons tipi-flex-r secondary-wrap">
		<?php if ( ! empty( $secondary ) ) { ?>
				<?php
				zeen_icons(
					array(
						'location' => 'secondary_menu',
						'type'     => 'cart',
					)
				);
				?>
				<?php
				zeen_icons(
					array(
						'location' => 'secondary_menu',
						'type'     => 'util',
					)
				);
				?>
				<?php zeen_trending_inline( 'secondary_menu', array( 'title_off' => true ) ); ?>
		<?php } ?>
		</ul>
	</div>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
