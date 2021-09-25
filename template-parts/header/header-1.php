<?php
/**
 * Header 1 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$logo = zeen_logo( 'main', array( 'check' => true ) );
$ad = get_theme_mod( 'header_pub' );
?>
<div class="bg-area">
	<?php if ( ! empty( $logo ) || ! empty( $ad ) ) { ?>
		<div class="logo-main-wrap header-padding tipi-vertical-c logo-main-wrap-l<?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?>">
			<?php do_action( 'zeen_header_inner_start' ); ?>
			<?php zeen_logo( 'main' ); ?>
			<?php zeen_ad( 'header' ); ?>
			<?php zeen_cta( 'header' ); ?>
			<?php do_action( 'zeen_header_inner_end' ); ?>
		</div>
	<?php } ?>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
