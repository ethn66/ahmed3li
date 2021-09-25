<div class="tipi-logged-out-wrap lwa-active-1">
	<?php zeen_logo( 'lwa' ); ?>
	<?php $override = get_theme_mod( 'lwa_register_url' ); ?>
	<div class="tipi-lwa-login tipi-logged-out">
		<?php
		do_action( 'zeen_before_login_form' );
		if ( function_exists( 'wsl_render_auth_widget' ) ) {
			echo '<div class="tipi-wsl-wrap clearfix">';
			do_action( 'wordpress_social_login' );
			echo '<div class="tipi-wsl-divider"><span>' . esc_attr__( 'Or', 'zeen' ) . '</span></div>';
			echo '</div>';
		}
		?>
		<form class="lwa-form lwa-form-base" action="<?php echo esc_attr( LoginWithAjax::$url_login ); ?>" method="post">
			<div class="lwa-username lwa-input-wrap">
				<?php esc_attr_e( 'Username', 'zeen' ); ?>
				<input type="text" name="log" class="input" autocomplete="username" tabindex="1" />
			</div>
			<div class="lwa-password lwa-input-wrap">
				<?php esc_attr_e( 'Password', 'zeen' ); ?>
				<input type="password" name="pwd" class="input" autocomplete="current-password" tabindex="2" />
			</div>
			<div class="lwa-login_form">
				<?php do_action( 'login_form' ); ?>
			</div>
			<span class="lwa-status"></span>
			<div class="lwa-rememberme zeen-checkbox clearfix">
				<label class="tipi-vertical-c">
					<input name="rememberme" tabindex="3" type="checkbox"  value="forever" />
					<span class="zeen-i"></span>
					<?php esc_attr_e( 'Remember Me', 'zeen' ); ?>
				</label>
			</div>
			<div class="lwa-submit-button font-b">
				<button type="submit" name="wp-submit" class="tipi-button button-arrow-r button-arrow" tabindex="4">
					<span class="button-title"><?php esc_attr_e( 'Sign In', 'zeen' ); ?></span><i class="tipi-i-log-in"></i>
				</button>
				<input type="hidden" name="lwa_profile_link" value="<?php echo esc_attr( $lwa_data['profile_link'] ); ?>" />
				<input type="hidden" name="login-with-ajax" value="login" />
				<?php if ( ! empty( $lwa_data['redirect'] ) ) : ?>
					<input type="hidden" name="redirect_to" value="<?php echo esc_url( $lwa_data['redirect'] ); ?>" />
				<?php endif; ?>
			</div>
			<?php if ( get_option( 'users_can_register' ) && ! empty( $lwa_data['registration'] ) ) : ?>
			<div class="bottom-options clearfix">
				<?php if ( ! empty( $lwa_data['remember'] ) ) : ?>
				<div class="lwa-lostpassword">
					<a class="lwa-changer" href="<?php echo esc_url( LoginWithAjax::$url_remember ); ?>" data-changer="3"><?php esc_attr_e( 'Lost password?', 'zeen' ); ?></a>
				</div>
				<?php endif; ?>
				<div class="br-option">
					<?php $register_url = empty( $override ) ? LoginWithAjax::$url_register : $override; ?>
					<a href="<?php echo esc_url( $register_url ); ?>"
										<?php
										if ( empty( $override ) ) {
											?>
						 class="lwa-changer"<?php } ?> data-changer="2" ><?php esc_attr_e( 'Create an account', 'zeen' ); ?></a>
				</div>
			</div>
			<?php endif; ?>
		</form>
	</div>
	<div class="tipi-lwa-register tipi-logged-out">
		<?php if ( empty( $override ) && get_option( 'users_can_register' ) && ! empty( $lwa_data['registration'] ) && 1 == $lwa_data['registration'] ) : ?>
			<?php
			if ( function_exists( 'wsl_render_auth_widget' ) ) {
				echo '<div class="tipi-wsl-wrap clearfix">';
				do_action( 'wordpress_social_login' );
				echo '<div class="tipi-wsl-divider"><span>' . esc_attr__( 'Or', 'zeen' ) . '</span></div>';
				echo '</div>';
			}
			?>
		<form class="lwa-form lwa-register" action="<?php echo esc_attr( LoginWithAjax::$url_register ); ?>" method="post">
			<div class="lwa-username lwa-input-wrap">
				<?php esc_attr_e( 'Username', 'zeen' ); ?>
				<input type="text" name="user_login"  value="">
			</div>
			<div class="lwa-email lwa-input-wrap">
				<?php esc_attr_e( 'Email', 'zeen' ); ?>
				<input type="text" name="user_email"  value="">
			</div>
			<?php do_action( 'register_form' ); ?>
			<span class="lwa-status"></span>
			<?php
			$terms_text = get_theme_mod( 'lwa_terms_text' );
			if ( ! empty( $terms_text ) ) {
				$terms_link = get_theme_mod( 'lwa_terms_text_url' );
				?>
				<div class="lwa-terms zeen-checkbox clearfix">
					<label class="tipi-vertical-c">
						<input name="terms" required tabindex="3" type="checkbox"  value="forever" />
					  <span class="zeen-i"></span>
					</label>
					<?php
					if ( ! empty( $terms_link ) ) {
						echo '<a href="' . esc_url( $terms_link ) . '" target="_blank">';
					}
					echo esc_attr( $terms_text );
					if ( ! empty( $terms_link ) ) {
						echo '</a>';
					}
					?>
				</div>
			<?php } ?>
			<div class="lwa-submit-button font-b">
				<input type="submit" name="wp-submit" class="tipi-button" value="<?php esc_attr_e( 'Sign Up', 'zeen' ); ?>" tabindex="100" />
				<input type="hidden" name="login-with-ajax" value="register" />
			</div>

			<div class="bottom-options clearfix">
				<div class="bl-option clearfix">
					<label class="clearfix"><?php esc_attr_e( 'A password will be emailed to you.', 'zeen' ); ?></label>
				</div>
				<div class="lwa-cancel-wrap">
					<a class="lwa-cancel" href="#"><?php esc_attr_e( 'Cancel', 'zeen' ); ?></a>
				</div>
			</div>
		</form>
		<?php endif; ?>
	</div>
	<div class="tipi-lwa-remember tipi-logged-out">
		<?php if ( ! empty( $lwa_data['remember'] ) && $lwa_data['remember'] == true ) : ?>
			<form class="lwa-form lwa-remember" action="<?php echo esc_attr( LoginWithAjax::$url_remember ); ?>" method="post">
				<div class="lwa-remember-email lwa-input-wrap">
					<?php esc_attr_e( 'Enter username or email', 'zeen' ); ?>
					<input type="text" name="user_login"  value="">
					<?php do_action( 'lostpassword_form' ); ?>
				</div>
				<span class="lwa-status"></span>
				<div class="lwa-submit-button font-b">
					<input type="submit" class="tipi-button" value="<?php esc_attr_e( 'Reset Password', 'zeen' ); ?>" tabindex="100" />
					<input type="hidden" name="login-with-ajax" value="remember" />
				</div>
				<div class="bottom-options clearfix">
				<div class="lwa-cancel-wrap">
					<a class="lwa-cancel" href="#"><?php esc_attr_e( 'Cancel', 'zeen' ); ?></a>
				</div>
			</div>
			</form>
		<?php endif; ?>
	</div>
</div>
