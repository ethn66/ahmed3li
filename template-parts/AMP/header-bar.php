<?php
/**
 * Header bar template part.
 *
 * @package AMP
 */

?>
<amp-sidebar id="amp-sb" layout="nodisplay" side="right">
	<span on="tap:amp-sb.close" class="amp-sb-close" role="button" tabindex="2"></span>
	<ul>
		<li>
			<div class="amp-sb-logo">
				<?php zeen_logo( 'amp', array( 'amp' => true ) ); ?>
			</div>
		</li>
		<?php
		if ( has_nav_menu( 'mobile' ) ) {
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations[ 'mobile' ] );
			$menu_items = wp_get_nav_menu_items( $menu->term_id );
			if ( ! empty( $menu_items ) ) {
				foreach ( $menu_items as $key => $menu_item ) { 
					?>
					<li><a href="<?php echo esc_url( $menu_item->url ); ?>"><?php echo esc_html( $menu_item->title ); ?></a></li>
					<?php 
				}
			}
		}
		?>
	</ul>
</amp-sidebar>
<header id="top" class="amp-wp-header tipi-flex">
	<div class="amp-header-logo">
		<?php zeen_logo( 'amp', array( 'amp' => true ) ); ?>
	</div>
	<div class="header-right tipi-vertical-c" on='tap:amp-sb.toggle' role="button" tabindex="1">
		<span class="amp-sb-open"></span>
		<?php do_action( 'zeen_amp_header_right' ); ?>
	</div>
</header>

<?php zeen_amp_ad( 1 ); ?>