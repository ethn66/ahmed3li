<?php
/**
 * Builder i18n
 *
 * @package Zeen
 * @copyright Copyright Codetipi
 * @since 1.0.0
*/
namespace TipiBuilder;

class ZeenI18n {

	/**
	 * Main
	 *
	 * @since 1.0.0
	 */
	public static function zeen_i18n() {

		$output = array(
			'heading'                     => esc_attr__( 'Heading', 'zeen' ),
			'dashboard'                   => esc_attr__( 'Back To Dashboard', 'zeen' ),
			'meta_styling'                => esc_attr__( 'Meta Styling', 'zeen' ),
			'cta_title_position'          => esc_attr__( 'Meta Layout', 'zeen' ),
			'position'                    => esc_attr__( 'Position', 'zeen' ),
			'wide_column_position'        => esc_attr__( 'Wide Column Position', 'zeen' ),
			'columns_m'                   => esc_attr__( 'Mobile Columns', 'zeen' ),
			'ad_tip'                      => esc_attr__( 'For tips on ad management you can refer to the theme documentation', 'zeen' ),
			'animation_onoff'             => esc_attr__( 'Animation', 'zeen' ),
			'image_animation_load'        => esc_attr__( 'Animation On Load', 'zeen' ),
			'animation_stagger'           => esc_attr__( 'Staggered Animation', 'zeen' ),
			'add_more'                    => esc_attr__( 'Add More', 'zeen' ),
			'tag'                         => esc_attr__( 'Tag', 'zeen' ),
			'category'                    => esc_attr__( 'Category', 'zeen' ),
			'cat__not_in'                 => esc_attr__( 'Exclude Categories', 'zeen' ),
			'ndp_skip'                    => esc_attr__( 'Exclude From No Duplicates', 'zeen' ),
			'ad_code'                     => esc_attr__( 'Ad Code', 'zeen' ),
			'ad_type'                     => esc_attr__( 'Ad Type', 'zeen' ),
			'ad_img'                      => esc_attr__( 'Ad Image', 'zeen' ),
			'ad_img_2x'                   => esc_attr__( 'Ad Image (Retina)', 'zeen' ),
			'ad_url'                      => esc_attr__( 'Ad URL', 'zeen' ),
			'min_height'                  => esc_attr__( 'Min. Height', 'zeen' ),
			'screen_height'               => esc_attr__( 'Screen Height', 'zeen' ),
			'titleAbove'                  => esc_attr__( 'Move Title Above Image', 'zeen' ),
			'flip'                        => esc_attr__( 'Flip Image and Meta', 'zeen' ),
			'block_flip'                  => esc_attr__( 'Flip Block Design', 'zeen' ),
			'mobile_design'               => esc_attr__( 'Mobile Block Design', 'zeen' ),
			'gutter_width'                => esc_attr__( 'Gutter Width', 'zeen' ),
			'image_hover_animation_onoff' => esc_attr__( 'Image Animation (Hover)', 'zeen' ),
			'custom_css'                  => esc_attr__( 'Custom CSS', 'zeen' ),
			'custom_css_desc'             => esc_attr__( 'To target this block with custom CSS, copy/paste the code below into your Theme Options (Additional CSS tab) and add your desired custom css.', 'zeen' ),
			'custom_css_or_add_class'     => esc_attr__( 'You can also add your own custom class name to this block:', 'zeen' ),
			'custom_class'                => esc_attr__( 'Custom Class Name:', 'zeen' ),
			'ad_url_tip'                  => esc_attr__( 'The ad will automatically have the rel attribute value set to nofollow', 'zeen' ),
			'sidebar'                     => esc_attr__( 'Sidebar', 'zeen' ),
			'onclick'                     => esc_attr__( 'On Click', 'zeen' ),
			'button'                      => esc_attr__( 'Button', 'zeen' ),
			'button_style'                => esc_attr__( 'Button Style', 'zeen' ),
			'ndppagi'                     => esc_attr__( "Due to WordPress limitations: The Tipi Builder's No Duplicates Post option will not apply to this block if you have the Pagination option below set to the 'Numbers' option.", 'zeen' ),
			'events'                      => esc_attr__( 'Events', 'zeen' ),
			'tiles'                       => esc_attr__( 'Tiles', 'zeen' ),
			'tile'                        => esc_attr__( 'Tile', 'zeen' ),
			'tile_url'                    => esc_attr__( 'Tile Link', 'zeen' ),
			'event'                       => esc_attr__( 'Event', 'zeen' ),
			'gallerySettings'             => esc_attr__( 'Gallery Options', 'zeen' ),
			'divider_color'               => esc_attr__( 'Divider Color', 'zeen' ),
			'dark'                        => esc_attr__( 'Dark', 'zeen' ),
			'light'                       => esc_attr__( 'Light', 'zeen' ),
			'date'                        => esc_attr__( 'Date', 'zeen' ),
			'location'                    => esc_attr__( 'Location', 'zeen' ),
			'name'                        => esc_attr__( 'Name', 'zeen' ),
			'events_count'                => esc_attr__( 'Number Of Events', 'zeen' ),
			'search_form'                 => esc_attr__( 'Search Form', 'zeen' ),
			'search_design'               => esc_attr__( 'Search Design', 'zeen' ),
			'use_to'                      => esc_attr__( 'Use URLs from Theme Options', 'zeen' ),
			'button_size'                 => esc_attr__( 'Button Size', 'zeen' ),
			'icons'                       => esc_attr__( 'Icons', 'zeen' ),
			'separation'                  => esc_attr__( 'Separation', 'zeen' ),
			'lightbox'                    => esc_attr__( 'Open in Lightbox', 'zeen' ),
			'vertical_centered'           => esc_attr__( 'Contents Centered', 'zeen' ),
			'centered'                    => esc_attr__( 'Centered', 'zeen' ),
			'icon_size'                   => esc_attr__( 'Icon Size', 'zeen' ),
			'icon_color'                  => esc_attr__( 'Icon Color', 'zeen' ),
			'button_design'               => esc_attr__( 'Button Design', 'zeen' ),
			'button_alignment'            => esc_attr__( 'Button Alignment', 'zeen' ),
			'autoplay'                    => esc_attr__( 'Autoplay', 'zeen' ),
			'fonts'                       => esc_attr__( 'Extra Fonts', 'zeen' ),
			'fonttip'                     => esc_attr__( 'Add more fonts to use in this layout. Remember fonts affect loading speed so be mindful here.', 'zeen' ),
			'sticky'                      => esc_attr__( 'Sticky Block', 'zeen' ),
			'stickytip'                   => esc_attr__( 'Make the block stick vertically when scrolling. Only applies if there is empty space below.', 'zeen' ),
			'quote'                       => esc_attr__( 'Quote', 'zeen' ),
			'buttons'                     => esc_attr__( 'Buttons', 'zeen' ),
			'background'                  => esc_attr__( 'Background', 'zeen' ),
			'suggestblock'                => esc_attr__( 'If you have an idea for a block that you would like to see added to the Tipi Builder - Please send your suggestion(s) by clicking the button below.', 'zeen' ),
			'suggestemail'                => esc_attr__( 'Send Suggestion', 'zeen' ),
			'lookingmore'                 => esc_attr__( 'Looking for something?', 'zeen' ),
			'google_api_key'              => esc_attr__( 'A Google API Key is required to use this block. Add it to your Theme Options > Social Network Accounts. Refer to theme documentation for further assistance.', 'zeen' ),
			'video_ids'                   => esc_attr__( 'YouTube Video IDs', 'zeen' ),
			'video_ids_tip'               => esc_attr__( 'Enter YouTube videos IDs separated by commas', 'zeen' ),
			'video_title'                 => esc_attr__( 'Playlist Title', 'zeen' ),
			'video_title_url'             => esc_attr__( 'Playlist See All Link', 'zeen' ),
			'cta_content_check'           => esc_attr__( 'Call To Action Button', 'zeen' ),
			'placeholderA'                => 'http://',
			'placeholderMail'             => esc_attr__( 'Enter the shortcode or HTML code from your subscription service provider into the Subscribe Form box in the builder panel', 'zeen' ),
			'placeholderAd'               => esc_attr__( 'Enter Ad Code', 'zeen' ),
			'placeholderAdImg'            => esc_attr__( 'Upload Ad Image', 'zeen' ),
			'upload_image'                => esc_attr__( 'Upload Background Image', 'zeen' ),
			'placeholderUser'             => esc_attr__( 'No username has been entered', 'zeen' ),
			'placeholderInsta'            => esc_attr__( 'Instagram shortcode has not been entered', 'zeen' ),
			'placeholderDescription'      => esc_attr__( 'Enter taxonomy description...', 'zeen' ),
			'startTyping'                 => esc_attr__( 'Click here to write...', 'zeen' ),
			'label'                       => esc_attr__( 'Label', 'zeen' ),
			'labeltip'                    => esc_attr__( 'This is to identify each block in the builder. It does not appear anywhere else.', 'zeen' ),
			'layout_slider56'             => esc_attr__( 'Navigation', 'zeen' ),
			'height'                      => esc_attr__( 'Height', 'zeen' ),
			'height_t'                    => esc_attr__( 'Height (Tablet)', 'zeen' ),
			'height_m'                    => esc_attr__( 'Height (Mobile)', 'zeen' ),
			'height_d'                    => esc_attr__( 'Height (Desktop)', 'zeen' ),
			'width'                       => esc_attr__( 'Width', 'zeen' ),
			'unit'                        => esc_attr__( 'Unit', 'zeen' ),
			'maxwidth'                    => esc_attr__( 'Max Width', 'zeen' ),
			'custom_code'                 => esc_attr__( 'Custom Code', 'zeen' ),
			'tax_description'             => esc_attr__( 'Taxonomy Description', 'zeen' ),
			'description_check'           => esc_attr__( 'Description', 'zeen' ),
			'descriptiontip'              => esc_attr__( 'This option is to show the description you have already set for this taxonomy.', 'zeen' ),
			'sorter'                      => esc_attr__( 'Sort By', 'zeen' ),
			'user'                        => esc_attr__( 'Username', 'zeen' ),
			'channel'                     => esc_attr__( 'Channel', 'zeen' ),
			'in_shortcode'                => esc_attr__( 'Instagram Shortcode', 'zeen' ),
			'in_shortcode_tip'            => esc_attr__( 'See Documentation > Instagram Feed section for more info', 'zeen' ),
			'sidebartip'                  => esc_attr__( 'Only widget areas that have widgets inside them will appear here', 'zeen' ),
			'responsive'                  => esc_attr__( 'Responsive', 'zeen' ),
			'desktoptip'                  => esc_attr__( 'Enable to show this block on devices bigger than phones', 'zeen' ),
			'mobiletip'                   => esc_attr__( 'Enable to show this block on mobile devices', 'zeen' ),
			'source'                      => esc_attr__( 'Source', 'zeen' ),
			'filters'                     => esc_attr__( 'Filters', 'zeen' ),
			'meta_background_padding'     => esc_attr__( 'Inner Padding', 'zeen' ),
			'article_shadow'              => esc_attr__( 'Drop Shadow', 'zeen' ),
			'meta_location'               => esc_attr__( 'Meta Location', 'zeen' ),
			'meta_location_m'             => esc_attr__( 'Meta Location (Mobile)', 'zeen' ),
			'meta_background'             => esc_attr__( 'Meta Background', 'zeen' ),
			'meta_location_tip'           => esc_attr__( 'The post excerpt will only appear on Classic option', 'zeen' ),
			'offset'                      => esc_attr__( 'Offset', 'zeen' ),
			'posts_per_page'              => esc_attr__( 'Quantity', 'zeen' ),
			'posts_per_row'               => esc_attr__( 'Per Row', 'zeen' ),
			'font_size'                   => esc_attr__( 'Font size', 'zeen' ),
			'font_size_m'                 => esc_attr__( 'Font size (Mobile)', 'zeen' ),
			'meta_padding'                => esc_attr__( 'Meta Padding', 'zeen' ),
			'order'                       => esc_attr__( 'Order', 'zeen' ),
			'img_shape'                   => esc_attr__( 'Image Shape', 'zeen' ),
			'title_type'                  => esc_attr__( 'Heading Type', 'zeen' ),
			'meta_width'                  => esc_attr__( 'Meta Width', 'zeen' ),
			'title_font_size'             => esc_attr__( 'Heading Font Size', 'zeen' ),
			'subtitle_font_size'          => esc_attr__( 'Subheading Font Size', 'zeen' ),
			'content_font_size'           => esc_attr__( 'Body Font Size', 'zeen' ),
			'pagination'                  => esc_attr__( 'Pagination', 'zeen' ),
			'selections'                  => esc_attr__( 'Selections', 'zeen' ),
			'margin'                      => esc_attr__( 'Margin', 'zeen' ),
			'top'                         => esc_attr__( 'Top', 'zeen' ),
			'bottom'                      => esc_attr__( 'Bottom', 'zeen' ),
			'left'                        => esc_attr__( 'Left', 'zeen' ),
			'right'                       => esc_attr__( 'Right', 'zeen' ),
			'padding'                     => esc_attr__( 'Padding', 'zeen' ),
			'border'                      => esc_attr__( 'Border', 'zeen' ),
			'borderwidth'                 => esc_attr__( 'Border Width', 'zeen' ),
			'borderouter'                 => esc_attr__( 'Outer Border', 'zeen' ),
			'color'                       => esc_attr__( 'Color', 'zeen' ),
			'gradient_direction'          => esc_attr__( 'Gradient Direction', 'zeen' ),
			'bordercolor'                 => esc_attr__( 'Border Color', 'zeen' ),
			'bordercheck'                 => esc_attr__( 'Border Check', 'zeen' ),
			'skin'                        => esc_attr__( 'Background', 'zeen' ),
			'skin_outer'                  => esc_attr__( 'Outer Background', 'zeen' ),
			'slide_effect'                => esc_attr__( 'Slide Effect', 'zeen' ),
			'parllax_vertical'            => esc_attr__( 'Vertical Parallax', 'zeen' ),
			'effects'                     => esc_attr__( 'Effects', 'zeen' ),
			'divider_top_onoff'           => esc_attr__( 'Divider Top', 'zeen' ),
			'divider_bottom_onoff'        => esc_attr__( 'Divider Bottom', 'zeen' ),
			'shape'                       => esc_attr__( 'Shape', 'zeen' ),
			'subscribe_style'             => esc_attr__( 'Subscribe Design', 'zeen' ),
			'columns'                     => esc_attr__( 'Columns', 'zeen' ),
			'parallax'                    => esc_attr__( 'Parallax', 'zeen' ),
			'img'                         => esc_attr__( 'Image', 'zeen' ),
			'gallery'                     => esc_attr__( 'Gallery', 'zeen' ),
			'img_link'                    => esc_attr__( 'Image Link', 'zeen' ),
			'img_opacity'                 => esc_attr__( 'Image Opacity', 'zeen' ),
			'img_bg'                      => esc_attr__( 'Image', 'zeen' ),
			'small_print_check'           => esc_attr__( 'Small Print', 'zeen' ),
			'small_print_placeholder'     => esc_attr__( 'Click to write a small print...', 'zeen' ),
			'quote_citation'              => esc_attr__( 'Quote Citation', 'zeen' ),
			'subscribe_form'              => esc_attr__( 'Subscribe Form', 'zeen' ),
			'subscribe_form_tip'          => esc_attr__( 'Enter the shortcode or HTML of your chosen subscription form. Refer to the documentation for tips', 'zeen' ),
			'img_bg_overlay'              => esc_attr__( 'Background Color Overlay', 'zeen' ),
			'attachmentTitle'             => esc_attr__( 'Select/Insert Media', 'zeen' ),
			'attachmentButton'            => esc_attr__( 'Insert', 'zeen' ),
			'video_url'                   => esc_attr__( 'Video URL', 'zeen' ),
			'video'                       => esc_attr__( 'Video', 'zeen' ),
			'video_bg'                    => esc_attr__( 'Video Background', 'zeen' ),
			'bg_color'                    => esc_attr__( 'Background Color', 'zeen' ),
			'bg_img'                      => esc_attr__( 'Background Image', 'zeen' ),
			'button_color'                => esc_attr__( 'Button Color', 'zeen' ),
			'button_color_2'              => esc_attr__( 'Secondary Button Color', 'zeen' ),
			'button_check_2'              => esc_attr__( 'Secondary Button', 'zeen' ),
			'button_check'                => esc_attr__( 'Primary Button', 'zeen' ),
			'button_new_tab_tip'          => esc_attr__( 'For when a user clicks the button', 'zeen' ),
			'new_tab'                     => esc_attr__( 'Open in new tab', 'zeen' ),
			'title_color'                 => esc_attr__( 'Title Color', 'zeen' ),
			'skin_text_color'             => esc_attr__( 'Text Color', 'zeen' ),
			'cta_content_color'           => esc_attr__( 'Secondary Text Color', 'zeen' ),
			'button_text'                 => esc_attr__( 'Button Text', 'zeen' ),
			'button_url'                  => esc_attr__( 'Button URL', 'zeen' ),
			'button_is_video'             => esc_attr__( 'URL is video', 'zeen' ),
			'edge'                        => esc_attr__( 'Edge To Edge', 'zeen' ),
			'boxed_content'               => esc_attr__( 'Boxed Content', 'zeen' ),
			'm_edge'                      => esc_attr__( 'Edge To Edge (Mobile/Tablet)', 'zeen' ),
			'edgelimit'                   => esc_attr__( 'Limit Max Width', 'zeen' ),
			'edgetip'                     => esc_attr__( 'Block width will be 100% of the screen width', 'zeen' ),
			'title_check'                 => esc_attr__( 'Block Title', 'zeen' ),
			'subtitle_check'              => esc_attr__( 'Block Subtitle', 'zeen' ),
			'pretitle_check'              => esc_attr__( 'Block Pretitle', 'zeen' ),
			'blocktitle'                  => esc_attr__( 'Title', 'zeen' ),
			'subtitle'                    => esc_attr__( 'Subtitle', 'zeen' ),
			'duration'                    => esc_attr__( 'Duration', 'zeen' ),
			'title_url'                   => esc_attr__( 'Title Link (optional)', 'zeen' ),
			'text'                        => esc_attr__( 'Text', 'zeen' ),
			'selectOptions'               => esc_attr__( 'Select option(s)', 'zeen' ),
			'selectOption'                => esc_attr__( 'Select option', 'zeen' ),
			'headerOverlap'               => esc_attr__( 'Overlapping Header', 'zeen' ),
			'headerOverlapInverse'        => esc_attr__( 'Use Inverse Logo', 'zeen' ),
			'headerOverlapInverseTip'     => esc_attr__( 'Use the inverse header logo you have set in the theme options', 'zeen' ),
			'ndp'                         => esc_attr__( 'No Duplicates', 'zeen' ),
			'ndptip'                      => esc_attr__( 'This option automatically skips any duplicated posts from loading on the page', 'zeen' ),
			'title'                       => esc_attr__( 'Page Title', 'zeen' ),
			'title_tip'                   => esc_attr__( 'This title appears in the browser tab', 'zeen' ),
			'filterBlocks'                => esc_attr__( 'Search...', 'zeen' ),
			'layout'                      => esc_attr__( 'Layout', 'zeen' ),
			'title_settings'              => esc_attr__( 'General Options', 'zeen' ),
			'title_add'                   => esc_attr__( 'Add Block', 'zeen' ),
			'title_edit'                  => esc_attr__( 'Block Options', 'zeen' ),
			'block'                       => esc_attr__( 'Block', 'zeen' ),
			'title_edit_sb'               => esc_attr__( 'Sidebar Options', 'zeen' ),
			'custom_sb_msg'               => esc_attr__( 'In Appearance > Widgets look for:', 'zeen' ),
			'open_in_new'                 => esc_attr__( 'Open Page', 'zeen' ),
			'save'                        => esc_attr__( 'Save', 'zeen' ),
			'settings'                    => esc_attr__( 'Settings', 'zeen' ),
			'saved'                       => esc_attr__( 'Saved', 'zeen' ),
			'saving'                      => esc_attr__( 'Saving', 'zeen' ),
			'hide'                        => esc_attr__( 'Hide Panel', 'zeen' ),
			'show'                        => esc_attr__( 'Show Panel', 'zeen' ),
			'mobile'                      => esc_attr__( 'Mobile', 'zeen' ),
			'desktop'                     => esc_attr__( 'Desktop', 'zeen' ),
			'tablet'                      => esc_attr__( 'Tablet', 'zeen' ),
			'words'                       => esc_attr__( 'Words', 'zeen' ),
			'fi_off'                      => esc_attr__( 'Show Featured Images', 'zeen' ),
			'byline_off'                  => esc_attr__( 'Show Byline', 'zeen' ),
			'excerpt_full'                => esc_attr__( 'Show Full Content', 'zeen' ),
			'excerpt_off'                 => esc_attr__( 'Show Excerpts', 'zeen' ),
			'excerpt_length'              => esc_attr__( 'Excerpt Length', 'zeen' ),
			'back'                        => esc_attr__( 'Back', 'zeen' ),
			'undo'                        => esc_attr__( 'Undo', 'zeen' ),
			'redo'                        => esc_attr__( 'Redo', 'zeen' ),
			'ok'                          => esc_attr__( 'OK', 'zeen' ),
			'autoplaytip'                 => esc_attr__( 'Autoplay videos are automatically muted by browsers', 'zeen' ),
			'showinfo'                    => esc_attr__( 'Show Information', 'zeen' ),
			'loop'                        => esc_attr__( 'Loop', 'zeen' ),
			'info'                        => esc_attr__( 'Information', 'zeen' ),
			'video_bg_vimeo'              => esc_attr__( 'Vimeo is recommended for this. However, video needs to be in Plus/Pro account to be perfect background video.', 'zeen' ),
			'infoDisableBothResp'         => esc_attr__( 'Blocks cannot be disabled for both desktop and mobile devices.', 'zeen' ),
			'warning'                     => esc_attr__( 'Warning', 'zeen' ),
			'sidebar_area'                => esc_attr__( 'Sidebar Area', 'zeen' ),
			'sidebar_id'                  => esc_attr__( 'Tipi Builder Sidebar', 'zeen' ),
			'edit'                        => esc_attr__( 'Edit', 'zeen' ),
			'remove'                      => esc_attr__( 'Remove', 'zeen' ),
			'success'                     => esc_attr__( 'Success', 'zeen' ),
			'error'                       => esc_attr__( 'Error', 'zeen' ),
			'slider'                      => esc_attr__( 'Slider', 'zeen' ),
			'resize'                      => esc_attr__( 'Resize', 'zeen' ),
			'hw'                          => esc_attr__( 'Half Width', 'zeen' ),
			'clone'                       => esc_attr__( 'Clone', 'zeen' ),
			'delete'                      => esc_attr__( 'Delete', 'zeen' ),
			'ok'                          => esc_attr__( 'Okay', 'zeen' ),
			'confirmImport'               => esc_attr__( 'Importing a layout will overwrite your current layout. Continue?', 'zeen' ),
			'confirmTemplateImport'       => esc_attr__( 'Are you sure you want to import this layout?', 'zeen' ),
			'cancel'                      => esc_attr__( 'Cancel', 'zeen' ),
			'confirmD'                    => esc_attr__( 'This will permanently delete this block. Continue?', 'zeen' ),
			'noresults'                   => esc_attr__( 'No results', 'zeen' ),
			'successImport'               => esc_attr__( 'Import was successful', 'zeen' ),
			'successDelete'               => esc_attr__( 'Block deletion was successful', 'zeen' ),
			'errorImport'                 => esc_attr__( 'Invalid import data. Please ensure you entered the correct data.', 'zeen' ),
			'successDeleteBlock'          => esc_attr__( 'Block was deleted', 'zeen' ),
			'successCloneBlock'           => esc_attr__( 'Block was cloned', 'zeen' ),
			'successD'                    => esc_attr__( 'Saved changes', 'zeen' ),
			'unsaved_title'               => esc_attr__( 'Are you sure to want to do this?', 'zeen' ),
			'display'                     => esc_attr__( 'Display', 'zeen' ),
			'styling'                     => esc_attr__( 'Style', 'zeen' ),
			'content_options'             => esc_attr__( 'Content Options', 'zeen' ),
			'viewing'                     => esc_attr__( 'Viewing', 'zeen' ),
			'mode'                        => esc_attr__( 'Mode', 'zeen' ),
			'desktopblocks'               => esc_attr__( 'Desktop Layout', 'zeen' ),
			'mobileblocks'                => esc_attr__( 'Mobile Layout', 'zeen' ),
			'deleteall'                   => esc_attr__( 'Delete All Blocks', 'zeen' ),
			'help_delete'                 => esc_attr__( 'Use the button below to remove all the blocks that are currently added. To make it permanent click the save button and the Tipi Builder will no longer be active on this page/taxonomy.', 'zeen' ),
			'confirmdeleteall'            => esc_attr__( 'You are about to delete all blocks that are on this page. Continue?', 'zeen' ),
			'reset'                       => esc_attr__( 'Reset', 'zeen' ),
			'backups'                     => esc_attr__( 'Backups', 'zeen' ),
			'import'                      => esc_attr__( 'Import', 'zeen' ),
			'import'                      => esc_attr__( 'Import', 'zeen' ),
			'export'                      => esc_attr__( 'Export', 'zeen' ),
			'globalBgColor'               => esc_attr__( 'Color', 'zeen' ),
			'globalBgColorTip'            => esc_attr__( 'You can control the transparency of the color with the white to black slider', 'zeen' ),
			'general'                     => esc_attr__( 'General', 'zeen' ),
			'page'                        => esc_attr__( 'Page', 'zeen' ),
			'help'                        => esc_attr__( 'Help', 'zeen' ),
			'help_title'                  => esc_attr__( 'Help And Tips', 'zeen' ),
			'preview'                     => esc_attr__( 'Preview', 'zeen' ),
			'addfirstblocktitle'          => esc_attr__( 'Start From Scratch', 'zeen' ),
			'addfirstblock'               => esc_attr__( 'Click to add your first block', 'zeen' ),
			'addblock'                    => esc_attr__( 'Click to add another block', 'zeen' ),
			'templateTitle'               => esc_attr__( 'Or Import A Layout', 'zeen' ),
			'templateSubtitle'            => esc_attr__( 'For a quick start you can import a pre-made layout. These layouts can be a starting point and further tweaked to suit your exact needs. Have fun!', 'zeen' ),
			'help_content'                => esc_attr__( 'If you require help with the Tipi Builder, you can find lots of information and videos in the documentation.', 'zeen' ),
			'help_export'                 => esc_attr__( 'To create a backup of your current layout click the export button below.', 'zeen' ),
			'help_import'                 => esc_attr__( 'To import a layout, simply copy the contents of your exported layout file and then paste it all in the input box below. Then click the Import button for the magic to happen.', 'zeen' ),
			'help_docs'                   => esc_attr__( 'Open Documentation', 'zeen' ),
			'unsaved_data'                => esc_attr__( 'You have unsaved changes that will be lost if you continue', 'zeen' ),
			'unsaved_confirm'             => esc_attr__( 'Leave', 'zeen' ),
			'unsaved_stay'                => esc_attr__( 'Stay', 'zeen' ),
			'sb_responsive'               => esc_attr__( 'Parent sidebar controls this', 'zeen' ),
			'sb_disabled'                 => esc_attr__( 'This option is controlled by the Columns Block that contains this block.', 'zeen' ),

		);
		return $output;
	}

}
