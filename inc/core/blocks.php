<?php
/**
 * Blocks
 *
 * @package Zeen
 * @since 1.0.0
 */
$blocks = array(
	'collapsible',
	'grid',
	'slider',
	'masonry',
	'classic',
	'text',
	'title',
	'cta',
	'mini-cta',
	'button',
	'hoverer',
	'authors',
	'instagram',
	'twitch',
	'quote',
	'custom-code',
	'search',
	'social-icons',
	'image',
	'gallery',
	'cta-grid',
	'events',
	'mailing',
	'spacer',
	'video',
	'videos',
	'ad',
	'sidebar',
	'columns',
	'scroller',
	'youtube-playlist',
);
require get_parent_theme_file_path( 'inc/classes/class-zeen-blocks.php' );
foreach ( $blocks as $block ) {
	require get_parent_theme_file_path( 'inc/classes/blocks/class-zeen-block-' . $block . '.php' );
}
