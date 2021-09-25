<?php
/**
 * Compatibility
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Prevent switching to Zeen on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 1.0.0
 */
function zeen_switcher() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'zeen_upgrade_notice' );
}
add_action( 'after_switch_theme', 'zeen_switcher' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Zeen on WordPress versions prior to 4.7.
 *
 * @since 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function zeen_upgrade_notice() {
	$message = sprintf( esc_html__( 'Zeen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'zeen' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function zeen_customize() {
	wp_die( sprintf( esc_html__( 'Zeen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'zeen' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'zeen_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function zeen_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Zeen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'zeen' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'zeen_preview' );