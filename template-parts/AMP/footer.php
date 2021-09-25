<?php zeen_amp_ad( 2 ); ?>
<footer class="amp-wp-footer">
	<div>
		<?php do_action( 'zeen_amp_footer' );?>
		<?php zeen_copyright_line( '', '_footer' ); ?>
		<div>
			<a href="#top" class="back-top copyright font-<?php echo (int) get_theme_mod( 'typo_copyright', 2 ); ?>"><?php esc_html_e( 'Back to top', 'zeen' ); ?></a>
		</div>
	</div>
</footer>