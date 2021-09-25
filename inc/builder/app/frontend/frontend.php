<?php
/**
 * Zeen builder frontend
 *
 * @since 1.0.0
 */

$classes = '';
if ( is_rtl() ) {
	$classes = 'rtl';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body class="tipi-builder-body <?php echo esc_attr( $classes ); ?>">
	<div id="builder-loading" class="tipi-builder-loader-wrap">
		<div class="tipi-builder-loader">
			<div class="tipi-builder-logo"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'inc/builder/assets/img/tipi-builder-mark-m.png' ) ); ?>" srcset="<?php echo esc_url( get_parent_theme_file_uri( 'inc/builder/assets/img/tipi-builder-mark-m@2x.png' ) ); ?> 2x" ></div>
			<div class="tipi-builder-text font-builder"><?php esc_html_e( 'Loading', 'zeen' ); ?><span>.</span><span>.</span><span>.</span></div>
		</div>
	</div>
	<div id="tipi-builder-sb"></div>
	<div id="tipi-builder-frame-wrap"></div>
	<?php
		wp_footer();
		/** This action is documented in wp-admin/admin-footer.php */
		do_action( 'admin_print_footer_scripts' );
	?>
</body>
</html>