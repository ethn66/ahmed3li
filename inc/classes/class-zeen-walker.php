<?php
/**
 * Zeen walker
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */

class ZeenWalker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {}
	function end_lvl( &$output, $depth = 0, $args = array() ) {}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		ob_start();
		$item_id = esc_attr( $item->ID );
		$mm = empty( $item->zeen_mm_load ) ? 2 : $item->zeen_mm_load;
		$order = empty( $item->zeen_mm_order ) ? 1 : $item->zeen_mm_order;
		$quantity = empty( $item->zeen_mm_quantity ) ? 3 : $item->zeen_mm_quantity;
		$show_title = empty( $item->zeen_mm_show_title ) ? 1 : $item->zeen_mm_show_title;
		$show_subtitle = empty( $item->zeen_mm_show_subtitle ) ? 1 : $item->zeen_mm_show_subtitle;
		$title_location = empty( $item->zeen_mm_title_location ) ? 1 : $item->zeen_mm_title_location;
		$image_shape = empty( $item->zeen_mm_image_shape ) ? 1 : $item->zeen_mm_image_shape;
		$background = empty( $item->zeen_mm_background ) ? '' : $item->zeen_mm_background;
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);
		$prefix = get_theme_mod( 'white_label_onoff' ) == 1 ? get_theme_mod( 'white_label_name', 'Zeen' ) : 'Zeen';
		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) ) {
				$original_title = false;
			}
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			if ( ! empty( $original_object->ID ) ) {
				$original_title = get_the_title( $original_object->ID );
			}
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( esc_html__( '%s (Invalid)' , 'zeen' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( esc_html__('%s (Pending)' , 'zeen'), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;
		?>
		<li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
			<div class="menu-item-bar">
				<div class="menu-item-handle">
					<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php if ( 0 == $depth ) { echo 'style="display: none;"'; } ?>><?php esc_html_e( 'sub item', 'zeen' ); ?></span></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up" aria-label="<?php esc_attr_e( 'Move up', 'zeen' ) ?>">&#8593;</a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down" aria-label="<?php esc_attr_e( 'Move down', 'zeen' ) ?>">&#8595;</a>
						</span>
						<a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>" aria-label="<?php esc_attr_e( 'Edit menu item', 'zeen' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Edit', 'zeen' ); ?></span></a>
					</span>
				</div>
			</div>

			<div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
				<?php if ( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
							<?php esc_html_e( 'URL', 'zeen' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-wide">
					<label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Navigation Label', 'zeen' ); ?><br />
						<input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>
				</p>
				<p class="field-title-attribute field-attr-title description description-wide">
					<label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Title Attribute', 'zeen' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>
				<p class="field-link-target description">
					<label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php esc_html_e( 'Open link in a new tab', 'zeen' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'CSS Classes (optional)', 'zeen' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Link Relationship (XFN)', 'zeen' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>

				<p class="field-zeen-menu description">
					<label for="edit-menu-item-zeen-<?php echo esc_attr( $item_id ); ?>">
						<?php echo esc_attr( $prefix ) . ' '; esc_html_e( 'Dropdown Design', 'zeen' ); ?>
					</label>
					<div class="zeen-columns-3 zeen-mm-option field-zeen-menu description" id="edit-menu-item-zeen-<?php echo esc_attr( $item_id ); ?>">
					<span class="zeen-radio-images">
					<?php $choices =  array();
					$choices[1] =  array( 'url' => 'mm-1.png' );
					$choices[2] =  array( 'url' => 'mm-2.png' );
					$choices[51] =  array( 'url' => 'mm-51-2.png', 'alt' => array( '2b' => 'mm-51-2.png', '3a' => 'mm-51-3.png', '3b' => 'mm-51-3.png', '4a' => 'mm-51-4.png', '4b' => 'mm-51-4.png', '5a' => 'mm-51-5.png', '5b' => 'mm-51-5.png' ) );
					$choices[11] =  array( 'url' => 'mm-11-2.png', 'alt' => array( '2b' => 'mm-11-alt-2.png', '3a' => 'mm-11-3.png', '3b' => 'mm-11-alt-3.png', '4a' => 'mm-11-4.png', '4b' => 'mm-11-alt-4.png', '5a' => 'mm-11-5.png', '5b' => 'mm-11-alt-5.png' ) );
					$choices[21] =  array( 'url' => 'mm-21-2.png', 'alt' => array( '2b' => 'mm-21-alt-2.png', '3a' => 'mm-21-3.png', '3b' => 'mm-21-alt-3.png',  '4a' => 'mm-21-4.png', '4b' => 'mm-21-alt-4.png', '5a' => 'mm-21-5.png', '5b' => 'mm-21-alt-5.png' ) );
					$choices[22] =  array( 'url' => 'mm-22-2.png', 'alt' => array( '2b' => 'mm-22-alt-2.png', '3a' => 'mm-22-3.png', '3b' => 'mm-22-alt-3.png',  '4a' => 'mm-22-4.png', '4b' => 'mm-22-alt-4.png', '5a' => 'mm-22-5.png', '5b' => 'mm-22-alt-5.png' ) );
					$choices[31] =  array( 'url' => 'mm-31-2.png', 'alt' => array( '2b' => 'mm-31-alt-2.png', '3a' => 'mm-31-2.png', '3b' => 'mm-31-alt-2.png',  '4a' => 'mm-31-2.png', '4b' => 'mm-31-alt-2.png', '5a' => 'mm-31-2.png', '5b' => 'mm-31-alt-2.png' ) );

					$i = 2;
					$n = 1;
				?>
					<?php foreach ( $choices as $key => $value ) { ?>
					<?php $retina = substr_replace( $value[ 'url' ], '@2x', -4, 0);	?>
						<span class="zeen-radio-image zeen-mm-radio-image zeen-mm-radio-image-<?php echo intval( $n); ?> zeen-mm-k-<?php echo esc_attr( $key ); ?>">
							<input type="radio" id="zeen-mm-<?php echo esc_attr($item_id) . '-' . $key; ?>" value="<?php echo esc_attr( $key );?>" <?php checked( $mm, $key ); ?> name="menu-item-zeen[<?php echo esc_attr( $item_id ); ?>]" class="zeen-input-val">
							<label for="zeen-mm-<?php echo esc_attr( $item_id . '-' . $key ); ?>">
								<img class="<?php if ( ! empty( $value['alt'] ) ) { ?>mm-img mm-img-2a<?php } ?>" src="<?php echo esc_url(  get_parent_theme_file_uri( 'assets/admin/img/' . $value ['url'] ) ); ?>" srcset="<?php echo esc_url( get_parent_theme_file_uri( 'assets/admin/img/' . $retina ) ); ?> 2x">
								<?php if ( ! empty( $value['alt'] ) ) { ?>
									<?php foreach ( $value['alt'] as $altkey => $altvalue ) { ?>
									 	<?php
									 	if ( 31 == $key && '2b' != $altkey ) {
									 		continue;
									 	}
									 	?>
										<?php $retina_alt = substr_replace( $altvalue, '@2x', -4, 0); ?>
										<img class="mm-img mm-img-<?php echo esc_attr( $altkey ); ?>" src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/admin/img/' . $altvalue ) ); ?>" srcset="<?php echo esc_url( get_parent_theme_file_uri( 'assets/admin/img/' . $retina_alt ) ); ?> 2x">
									<?php $i++; } ?>
								<?php } ?>
							</label>
						</span>
					<?php $n++; ?>
					<?php } ?>
					</span>
					</div>
				</p>
				<p class="field-zeen-menu-order description description-wide">
					<label for="zeen-mm-order-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'What to show', 'zeen' ); ?><br />
						<select id="zeen-mm-order-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-order" name="menu-item-zeen-order[<?php echo esc_attr($item_id); ?>]" >
							<option value="1" <?php selected( $order, 1 ); ?>><?php esc_attr_e( 'Latest published', 'zeen' ); ?></option>
							<option value="2" <?php selected( $order, 2 ); ?>><?php esc_attr_e( 'Random', 'zeen' ); ?></option>
							<option value="3" <?php selected( $order, 3 ); ?>><?php esc_attr_e( 'Feature Posts/Pages', 'zeen' ); ?></option>
						</select>
					</label>
				</p>
				<p class="field-zeen-menu-featured description description-wide">
					<label for="zeen-mm-featured-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Enter IDs (1,2,3)', 'zeen' ); ?><br />
						<input type="text" id="zeen-mm-featured-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-featured" name="menu-item-zeen-featured[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->zeen_mm_featured ); ?>" />
					</label>
				</p>
				<p class="field-zeen-menu-quantity description description-thin">
					<label for="zeen-mm-quantity-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Number Of Items', 'zeen' ); ?><br />
						<select id="zeen-mm-quantity-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-quantity" name="menu-item-zeen-quantity[<?php echo esc_attr($item_id); ?>]" >
							<option value="2" <?php selected( $quantity, 2 ); ?>>2</option>
							<option value="3" <?php selected( $quantity, 3 ); ?>>3</option>
							<option value="4" <?php selected( $quantity, 4 ); ?>>4</option>
							<option value="5" <?php selected( $quantity, 5 ); ?>>5</option>
						</select>
					</label>
				</p>
				<p class="field-zeen-menu-show-title description description-thin">
					<label for="zeen-mm-show-title-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Show Main Title', 'zeen' ); ?><br />
						<select id="zeen-mm-show-title-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-show-title" name="menu-item-zeen-show-title[<?php echo esc_attr($item_id); ?>]" >
							<option value="1" <?php selected( $show_title, 1 ); ?>><?php esc_html_e( 'On', 'zeen' ); ?></option>
							<option value="2" <?php selected( $show_title, 2 ); ?>><?php esc_html_e( 'Off', 'zeen' ); ?></option>
						</select>
					</label>
				</p>

				<p class="field-zeen-menu-show-subtitle description description-thin">
					<label for="zeen-mm-show-subtitle-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Show Main Subtitle', 'zeen' ); ?><br />
						<select id="zeen-mm-show-subtitle-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-show-subtitle" name="menu-item-zeen-show-subtitle[<?php echo esc_attr($item_id); ?>]" >
							<option value="1" <?php selected( $show_subtitle, 1 ); ?>><?php esc_html_e( 'On', 'zeen' ); ?></option>
							<option value="2" <?php selected( $show_subtitle, 2 ); ?>><?php esc_html_e( 'Off', 'zeen' ); ?></option>
						</select>
					</label>
				</p>

				<p class="field-zeen-menu-title-location description description-thin">
					<label for="zeen-mm-title-location-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Post Title Location', 'zeen' ); ?><br />
						<select id="zeen-mm-title-location-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-title-location" name="menu-item-zeen-title-location[<?php echo esc_attr($item_id); ?>]" >
							<option value="1" <?php selected( $title_location, 1 ); ?>><?php esc_html_e( 'Under Image', 'zeen' ); ?></option>
							<option value="2" <?php selected( $title_location, 2 ); ?>><?php esc_html_e( 'On Top Of Image', 'zeen' ); ?></option>
						</select>
					</label>
				</p>
				<p class="field-zeen-menu-image-shape description description-thin">
					<label for="zeen-mm-image-shape-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Image Shape', 'zeen' ); ?><br />
						<select id="zeen-mm-image-shape-<?php echo esc_attr($item_id); ?>" class="widefat code zeen-mm-image-shape" name="menu-item-zeen-image-shape[<?php echo esc_attr($item_id); ?>]" >
							<option value="1" <?php selected( $image_shape, 1 ); ?>><?php esc_html_e( 'Landscape', 'zeen' ); ?></option>
							<option value="2" <?php selected( $image_shape, 2 ); ?>><?php esc_html_e( 'Square', 'zeen' ); ?></option>
							<option value="3" <?php selected( $image_shape, 3 ); ?>><?php esc_html_e( 'Portrait', 'zeen' ); ?></option>
						</select>
					</label>
				</p>
				<p id="<?php echo 'menu-item-zeen-background-' . esc_attr($item_id); ?>" class="zeen-engine-meta-control zeen-engine-image-wrap field-zeen-menu-background zeen--menu--img description description-thin">
					<label for="<?php echo 'menu-item-zeen-background-' . esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Background Image', 'zeen' ); ?>
					</label>
					<span class="zeen-engine-control-only">
						<input id="<?php echo 'menu-item-zeen-background-' . esc_attr( $item_id ); ?>" name="menu-item-zeen-background[<?php echo esc_attr( $item_id ); ?>]" type="hidden" value="<?php echo (int) $background; ?>" class="widefat zeen-engine-img-input zeen-engine-input-val">
						<a href="#" class="zeen-engine-upload" data-dest="<?php echo 'menu-item-zeen-background-' . esc_attr($item_id); ?>" data-output="id" data-file-type="img" data-name="<?php echo 'menu-item-zeen-background-' . esc_attr( $item_id ); ?>"><?php esc_html_e( 'Upload', 'zeen' ); ?></a>
						<?php if ( ! empty( $background ) ) { ?>
							<span class="zeen-engine-img">
								<a href="#" class="zeen-engine-remove zeen-engine--x"></a>
								<?php
								$background_img = wp_get_attachment_image_src( $background, 'zeen-engine-293-293' );
								if ( ! empty( $background_img[0] ) ) {
									echo '<img src="' . esc_url( $background_img[0] ) . '">';
								}
								?>
							</span>
						<?php } ?>
					</span>
				</p>
				<p class="field-description description description-wide">
					<label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
						<?php esc_html_e( 'Description', 'zeen' ); ?><br />
						<textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
						<span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'zeen'); ?></span>
					</label>
				</p>

				<?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args ); ?>

				<p class="field-move hide-if-no-js description description-wide">
					<label>
						<span><?php esc_html_e( 'Move', 'zeen' ); ?></span>
						<a href="#" class="menus-move menus-move-up" data-dir="up"><?php esc_html_e( 'Up one', 'zeen' ); ?></a>
						<a href="#" class="menus-move menus-move-down" data-dir="down"><?php esc_html_e( 'Down one', 'zeen' ); ?></a>
						<a href="#" class="menus-move menus-move-left" data-dir="left"></a>
						<a href="#" class="menus-move menus-move-right" data-dir="right"></a>
						<a href="#" class="menus-move menus-move-top" data-dir="top"><?php esc_html_e( 'To the top', 'zeen' ); ?></a>
					</label>
				</p>

				<div class="menu-item-actions description-wide submitbox">
					<?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( esc_html__('Original: %s', 'zeen' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							admin_url( 'nav-menus.php' )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php esc_html_e( 'Remove', 'zeen' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Cancel', 'zeen'); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}

}

