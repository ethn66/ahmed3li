<?php
/**
 * Main Menu 1 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$header_style = zeen_get_style();
$logo_vis = get_theme_mod( 'logo_main_menu_visible', 1 );
$main_menu_width = zeen_check_width( get_theme_mod( 'main_menu_width', 3 ) );
$icons = zeen_icons( array(
	'test' => true,
) );
$overlap = zeen_get_header_overlap();
$has_menu = has_nav_menu( 'main' );
if ( ! empty( $has_menu ) || ! empty( $icons ) ) :
	echo '<nav id="site-navigation" class="main-navigation main-navigation-1 tipi-xs-0 clearfix';
	if ( 2 == $logo_vis || ( is_singular() && 51 == $header_style ) ) {
		echo ' logo-always-vis';
	} elseif ( 1 == $logo_vis ) {
		echo ' logo-only-when-stuck';
	}
	if ( 3 == $main_menu_width ) {
		echo ' tipi-row';
	}
	echo ' main-menu-skin-' . (int) get_theme_mod( 'main_menu_skin', 1 );
	echo ' main-menu-width-' . (int) get_theme_mod( 'main_menu_width', 1 );
	if ( get_theme_mod( 'megamenu_color_usage_onoff', 1 ) == 1 ) {
		echo ' main-menu-bar-color-' . (int) get_theme_mod( 'megamenu_color_usage', 2 );
	}
	echo ' mm-skin-' . (int) get_theme_mod( 'megamenu_skin', 2 );
	echo ' mm-submenu-' . (int) get_theme_mod( 'megamenu_submenu_color', 1 );
	$mm_ani = get_theme_mod( 'megamenu_animation_onoff', 1 ) == 1 ? get_theme_mod( 'megamenu_animation', 1 ) : 0;
	echo ' mm-ani-' . (int) $mm_ani;
	zeen_extra_header_classes( $header_style );
	if ( get_theme_mod( 'header_sticky_onoff', 1 ) == 1 && 'on' != $overlap['enabled'] ) {
		$header_st = get_theme_mod( 'header_sticky', 1 );
		if ( $header_style < 70 ) {
			echo ' sticky-menu-dt sticky-menu sticky-menu-' . (int) $header_st;
			if ( 1 == $header_st ) {
				echo ' sticky-top';
			}
		}
	}
	echo '">';
?>
	<div class="main-navigation-border menu-bg-area">
		<div class="nav-grid clearfix<?php if ( $main_menu_width == 2 ) { ?> tipi-row-off<?php } ?> tipi-row">
			<div class="tipi-flex sticky-part sticky-p1">
				<?php do_action( 'zeen_before_main_nav', $header_style ); ?>
				<ul id="menu-main-menu" class="menu-main-menu horizontal-menu tipi-flex font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?>">
					<?php
					do_action( 'zeen_before_main_menu' );
					zeen_current_date( 'main_menu' );
					if ( ! empty( $has_menu ) ) {
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => '',
							'items_wrap' => '%3$s',
							'walker' => new ZeenWalkerOutput(),
						) );
					}
					?>
				</ul>
				<ul class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> menu-icons tipi-flex-eq-height">
					<?php zeen_trending_inline( 'main_menu' ); ?>
					<?php zeen_icons(); ?>
					<?php do_action( 'zeen_after_main_menu_icons' ); ?>
				</ul>
			</div>
			<?php do_action( 'zeen_after_sticky_p1' ); ?>
		</div>
		<?php do_action( 'zeen_after_nav_grid' ); ?>
	</div>
</nav><!-- .main-navigation -->
<?php
endif;
