<?php
/**
 * Header output
 *
 * @package Zeen
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( get_theme_mod( 'responsive', 1 ) == 1 ) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php } else { ?>
		<meta name="viewport" content="width=1280">
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php $color = get_theme_mod( 'global_color', '#f7d40e' ); ?>
	<meta name="theme-color" content="<?php echo esc_attr( apply_filters( 'zeen_address_bar_color', $color ) ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<?php
		$style = zeen_get_style();
		do_action( 'zeen_start_site', $style );
		?>
		<div class="site-inner">
			<?php do_action( 'zeen_start_site_inner', $style ); ?>
			<div id="content" class="site-content clearfix">
			<?php
			do_action( 'zeen_start_content' );
