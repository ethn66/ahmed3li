<?php
/**
 * Customizer Controls
 *
 * @package Zeen
 * @copyright Copyright Codetipi
 * @since 1.0.0
 */

/**
 * Controls
 *
 * @since  1.0.0
 */
function zeen_controls_sections( $wp_customize ) {

	require get_parent_theme_file_path( '/inc/classes/class-zeen-section-title.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-title.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-reset.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-subtitle.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-radio-image.php' );
	$wp_customize->register_control_type( 'Zeen_Control_Radio_Image' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-on-off.php' );
	$wp_customize->register_control_type( 'Zeen_Control_On_Off' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-slider.php' );
	$wp_customize->register_control_type( 'Zeen_Control_Slider' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-range.php' );
	$wp_customize->register_control_type( 'Zeen_Control_Range' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-multi-checkbox.php' );
	$wp_customize->register_control_type( 'Zeen_Control_Multi_Checkbox' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-border.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-multi-select.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-typo.php' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-color.php' );
	$wp_customize->register_control_type( 'Zeen_Control_Color' );
	require get_parent_theme_file_path( '/inc/classes/class-zeen-control-color-multi.php' );

}
add_action( 'customize_register', 'zeen_controls_sections' );
