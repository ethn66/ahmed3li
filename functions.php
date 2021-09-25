<?php
/**
 * Theme functions
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 *  Version constant
 */
define( 'ZEEN_VERSION', '4.0.9.6' );
define( 'ZEEN_DEBUG', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) );

/**
 * Theme engine
 */
require get_parent_theme_file_path( 'inc/core/engine.php' );
