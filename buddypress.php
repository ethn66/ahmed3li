<?php
/**
 * @package Zeen
 * @since 1.0.0
*/

get_header();
$sidebar_check = zeen_sidebar_checker(
	array(
		'archive' => 'buddypress',
	)
);
?>
<div id="primary" class="content-area">

	<div id="contents-wrap" <?php zeen_get_archive_layout_class( array( 'archive' => 'buddypress' ) ); ?>>
		<div class="tipi-row content-bg clearfix">
				<div class="tipi-cols clearfix sticky--wrap">
					<?php
					echo '<main class="';
					zeen_classes(
						array(
							'preview'  => get_theme_mod( 'buddypress_layout', 1 ),
							'complete' => 'off',
							'classes'  => 'main',
						)
					);
					echo '">';
					?>
					<?php zeen_ad( 'buddypress_top' ); ?>
					<?php
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
					?>
					</main>
					<?php
					zeen_get_sidebar(
						array(
							'sidebar_check' => $sidebar_check,
						)
					);
					?>
			</div>
		</div>
	</div>
</div><!-- .content-area -->

<?php
get_footer();
