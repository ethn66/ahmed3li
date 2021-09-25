<?php
/**
 * @package Zeen
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	if ( get_theme_mod( 'comment_location', 1 ) == 2 ) {
		comment_form();
	}
	?>
	<?php if ( have_comments() ) { ?>
		<h2 class="comments-title footer-block-title">
			<?php comments_number( esc_html__( 'No Comments', 'zeen' ), esc_html__( 'One Comment', 'zeen' ), esc_html__( '% Comments', 'zeen' ) ); ?>
		</h2>

		<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'avatar_size' => 65,
				'style'       => 'ol',
				'short_ping'  => true,
			) );
		?>
		</ol>
		<?php
		the_comments_navigation();
	}

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		echo '<p class="no-comments">' . esc_html__( 'Comments are closed.', 'zeen' ) . '</p>';
	}
	if ( get_theme_mod( 'comment_location', 1 ) == 1 ) {
		comment_form();
	}
?>

</div><!-- #comments -->
