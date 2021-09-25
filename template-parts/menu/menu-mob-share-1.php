<?php
/**
 * Mobile Menu
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div id="mob-bot-share" class="mob-bot-share tipi-m-0 mob-bot-share-<?php echo intval( get_theme_mod( 'mobile_bottom_sticky', 1 ) ); ?>">
	<div class="share-buttons">
		<?php
		if ( get_theme_mod( 'mob_bot_share_tw', 1 ) == 1 ) {
			zeen_share( array(
				'type' => 'twitter',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_fb', 1 ) == 1 ) {
			zeen_share( array(
				'type' => 'facebook',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_telegram' ) == 1 ) {
			zeen_share( array(
				'type' => 'telegram',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_pinterest' ) == 1 ) {
			zeen_share( array(
				'type' => 'pinterest',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_wa', 1 ) == 1 ) {
			zeen_share( array(
				'type' => 'whatsapp',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_viber' ) == 1 ) {
			zeen_share( array(
				'type' => 'viber',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_msg', 1 ) == 1 ) {
			zeen_share( array(
				'type' => 'messenger',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}
		if ( get_theme_mod( 'mob_bot_share_line' ) == 1 ) {
			zeen_share( array(
				'type' => 'line',
				'location' => 'mob_bot_share',
				'design' => 1,
				'override' => true,
			) );
		}

		?>
	</div>
</div>
