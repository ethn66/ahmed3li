<?php
/**
 * Engine
 *
 * @package Zeen
 * @since 1.0.0
 */

if ( version_compare( $GLOBALS['wp_version'], '4.8', '<' ) ) {
	require get_parent_theme_file_path( 'inc/core/compat.php' );
	return;
}

require get_parent_theme_file_path( 'inc/core/sanitizers.php' );
require get_parent_theme_file_path( 'inc/core/scripts.php' );
if ( is_admin() ) {
	require get_parent_theme_file_path( 'inc/core/theme-switch.php' );
	require get_parent_theme_file_path( 'inc/core/changelog.php' );
}
require_once get_parent_theme_file_path( 'inc/core/tgm.php' );
require_once get_parent_theme_file_path( '/inc/core/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/inc/core/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/core/merlin-config.php' );
require_once get_parent_theme_file_path( 'inc/classes/class-zeen-detect.php' );
require_once get_parent_theme_file_path( 'inc/classes/class-zeen-mobile.php' );

require get_parent_theme_file_path( 'inc/builder/functions.php' );
require get_parent_theme_file_path( 'inc/core/customizer.php' );
require get_parent_theme_file_path( 'inc/classes/class-zeen-options.php' );
require get_parent_theme_file_path( 'inc/classes/class-zeen-helpers.php' );
require get_parent_theme_file_path( 'inc/classes/class-zeen-i18n.php' );
require get_parent_theme_file_path( 'inc/core/buddypress.php' );
require get_parent_theme_file_path( 'inc/core/bbpress.php' );
require get_parent_theme_file_path( 'inc/core/blocks.php' );
require get_parent_theme_file_path( 'inc/core/previews.php' );
require get_parent_theme_file_path( 'inc/core/template-tags.php' );
require get_parent_theme_file_path( 'inc/core/theme-helpers.php' );
require get_parent_theme_file_path( 'inc/core/theme-support.php' );
require get_parent_theme_file_path( 'inc/core/thumbnails.php' );
require get_parent_theme_file_path( 'inc/core/gutenberg.php' );
require get_parent_theme_file_path( 'inc/core/routes.php' );
require get_parent_theme_file_path( 'inc/core/sensei.php' );
require get_parent_theme_file_path( 'inc/core/walker.php' );
require get_parent_theme_file_path( 'inc/core/widget-areas.php' );
require get_parent_theme_file_path( 'inc/core/lets-review.php' );
require get_parent_theme_file_path( 'inc/core/woocommerce.php' );
require get_parent_theme_file_path( 'inc/core/tipi-block.php' );
require get_parent_theme_file_path( 'inc/core/theme-hooks.php' );
