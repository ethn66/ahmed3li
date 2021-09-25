<?php
/**
 * Sensei
 *
 * @package Zeen
 * @since 1.0.0
 */

/**
 * Sensei
 *
 * @since 1.0.0
 */
function zeen_sensei_active() {
	if ( class_exists( 'Sensei_Autoloader' ) ) { 
		return true; 
	} else { 
		return false; 
	}
}


if ( zeen_sensei_active() ) :

if ( ! function_exists( 'zeen_sensei_before_main' ) ) :
/**
 * Sensei: Before Content
 *
 * @since  1.0.0
 */
function zeen_sensei_before_main() {
  echo '<div id="primary" class="content-area">	<main id="main" class="' . esc_attr( zeen_main_class() ) . '">
';
}
endif;

if ( ! function_exists( 'zeen_sensei_after_main' ) ) :
/**
 * Sensei: After content
 *
 * @since  1.0.0
 */
function zeen_sensei_after_main() {
  echo '</div><!-- #primary -->
	</div><!-- #main -->';
	zeen_get_sidebar( array( 'archive' => 'sensei' ) ); 
}
endif;

endif; // Do not touch