<?php $links = apply_filters( 'zeen_logged_in_default_links', true ); ?>
<?php $log_out = apply_filters( 'zeen_logged_in_log_out_button', true ); ?>
<div class="tipi-lwa tipi-logged-in">
	<?php zeen_logo( 'lwa' ); ?>
	<?php $user = wp_get_current_user(); ?>
	<div class="title-wrap tipi-vertical-c">
		<div class="avatar-wrap lwa-avatar">
			<?php echo get_avatar( $user->ID, 90 );  ?>
		</div>
		<div class="title"><?php the_author_meta( 'display_name', $user->ID ); ?></div>
	</div>
	<div class="lwa-contents">
		<?php if ( ! empty( $links ) ) { ?>
			<?php
			if ( function_exists( 'bp_get_loggedin_user_link' ) ) {
				$url = bp_get_loggedin_user_link();
			} elseif ( function_exists( 'bbp_get_user_profile_url' ) ) {
				$url = bbp_get_user_profile_url( $user->ID );
			} else {
				$url = trailingslashit( get_admin_url() ) . 'profile.php';
			}
			?>
			<a href="<?php echo esc_url( $url ); ?>"><?php esc_attr_e( 'Profile', 'zeen' ); ?></a>
			<?php if ( class_exists( 'BuddyPress' ) ) { ?>
				<?php $urls = zeen_bp_urls(); ?>
				<?php if ( function_exists( 'bp_get_activity_slug' ) ) { ?>
					<div class="lwa-a"><a  href="<?php echo esc_url( $urls['u_activity_url'] ); ?>"><?php esc_attr_e( 'Activity', 'zeen' ); ?></a></div>
				<?php } ?>

				<?php if ( function_exists( 'bp_get_groups_root_slug' ) ) { ?>
					<div class="lwa-a"><a href="<?php echo esc_url( $urls['u_group_url'] ); ?>"><?php esc_attr_e( 'Groups', 'zeen' ); ?></a></div>
				<?php } ?>

				<?php if ( function_exists( 'bp_get_messages_slug' ) ) { ?>
					<div class="lwa-a"><a href="<?php echo esc_url( $urls['u_msg_url'] ); ?>"><?php esc_attr_e( 'Messages', 'zeen' ); ?></a></div>
				<?php } ?>

				<?php if ( class_exists( 'bbpress' ) ) { ?>
					<div class="lwa-a"><a href="<?php esc_url( bbp_subscriptions_permalink( $user->ID ) ); ?>"><?php esc_attr_e( 'Subscriptions', 'zeen' ); ?></a></div>
				<?php } ?>

			<?php } elseif ( class_exists( 'bbpress' ) ) { ?>

				<div class="lwa-a"><a href="<?php esc_url( bbp_user_replies_created_url( $user->ID ) ); ?>"><?php esc_attr_e( 'Replies', 'zeen' ); ?></a></div>
				<div class="lwa-a"><a href="<?php esc_url( bbp_favorites_permalink( $user->ID ) ); ?>"><?php esc_attr_e( 'Favorites', 'zeen' ); ?></a></div>
				<div class="lwa-a"><a href="<?php esc_url( bbp_subscriptions_permalink( $user->ID ) ); ?>"><?php esc_attr_e( 'Subscriptions', 'zeen' ); ?></a></div>

			<?php } elseif ( class_exists( 'WooCommerce' ) ) { ?>
				<div class="lwa-a"><a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_shop_page_id' ) ) ); ?>"><?php esc_attr_e( 'Browse Shop', 'zeen' ); ?></a></div>
				<div class="lwa-a"><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_attr_e( 'View Cart', 'zeen' ); ?></a></div>
			<?php } ?>
		<?php } ?>
		<?php do_action( 'zeen_logged_in' ); ?>
		<?php if ( ! empty( $log_out ) ) { ?>
			<div class="lwa-submit-button font-b">
				<a class="lwa-log-out tipi-button button-arrow-r button-arrow" href="<?php echo esc_url( wp_logout_url() ); ?>"><span class="button-title"><?php esc_attr_e( 'Log Out', 'zeen' ); ?></span><i class="tipi-i-log-out"></i></a>
			</div>
		<?php } ?>
	</div>
</div>
