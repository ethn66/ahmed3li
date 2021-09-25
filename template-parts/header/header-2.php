<?php
/**
 * Header 2 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$args = array(
	'wrap_class' => 'logo-main-wrap header-padding tipi-all-c',
);
?>
<div class="bg-area">
	<div class="tipi-flex-lcr logo-main-wrap header-padding tipi-flex-eq-height logo-main-wrap-center<?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?>">
		<?php do_action( 'zeen_header_inner_start' ); ?>
		<?php zeen_cta( 'header', true ); ?>
		<?php zeen_logo( 'main', $args ); ?>
		<?php zeen_cta( 'header' ); ?>
		<?php zeen_ad( 'header' ); ?>
		<?php do_action( 'zeen_header_inner_end' ); ?>
	</div>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
