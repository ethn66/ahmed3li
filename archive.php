<?php
/**
 * Archive Template
 *
 * @package Zeen
 * @since 1.0.0
 */
get_header();
$preview       = zeen_preview_check();
$fw            = zeen_fw_checker( $preview, 'archive' );
$tid           = zeen_get_term_id();
$builder       = empty( $tid ) ? '' : zeen_get_term_meta( 'tipi_builder_active', $tid );
$img_shape     = zeen_image_shape_checker( $preview );
$flipstack     = zeen_flipstack_checker( $preview );
$fs            = empty( $fw ) ? 'off' : 'on';
$sidebar_check = zeen_sidebar_checker(
	array(
		'archive' => $preview,
	)
);
?><div id="primary" class="content-area">
	<?php
	echo '<div id="contents-wrap" ';
	zeen_get_archive_layout_class(
		array(
			'archive' => $preview,
			'builder' => $builder,
		)
	);
	echo '>';
	?>
		<?php
		if ( empty( $builder ) ) {
			if ( empty( $sidebar_check ) ) {
				if ( 'off' == $fs ) {
					$size = 'l';
				} else {
					$size = 'xl';
				}
				zeen_title_box(
					array(
						'echo' => true,
						'size' => $size,
						'uid'  => $tid,
					)
				);
			}
			?>
			<?php if ( empty( $fw ) ) { ?>
				<div class="tipi-row content-bg clearfix">
					<div class="tipi-cols clearfix sticky--wrap">
			<?php } ?>
			<?php zeen_ad( 'archive' ); ?>
			<?php
			echo '<main class="';
			zeen_classes(
				array(
					'preview'  => $preview,
					'complete' => 'off',
					'fw'       => $fw,
					'classes' => 'main',
				)
			);
			echo '">';
			?>
				<?php
				if ( ! empty( $sidebar_check ) ) {
					zeen_title_box(
						array(
							'echo' => true,
							'size' => 'm',
							'uid'  => $tid,
						)
					);
				}
				if ( have_posts() ) :
					zeen_main_layout(
						array(
							'preview'   => $preview,
							'fs'        => $fs,
							'flipstack' => $flipstack,
							'img_shape' => $img_shape,
							'specific'  => 'archive',
						)
					);
				else :
					zeen_main_layout_none();
				endif;
				?>
			</main><!-- .site-main -->
			<?php
			zeen_get_sidebar(
				array(
					'archive'       => $preview,
					'sidebar_check' => $sidebar_check,
				)
			);

			if ( empty( $fw ) ) {
				echo '</div>';
				echo '</div>';
			}
			zeen_ad( 'archive_below' );
		} else {
			zeen_builder_data( zeen_get_term_meta( 'tipi_builder_data' ) );
		}
		?>
		<?php do_action( 'zeen_end_contents_wrap' ); ?>
	</div>
</div><!-- .content-area -->
<?php
get_footer();
