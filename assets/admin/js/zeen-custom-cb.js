/**
 * Copyright: Codetipi
 * Theme: Zeen
 * Version: 1.0.8
 */
(function( $, Zeen ) {
'use strict';
Zeen.bind( 'ready', function () {

	function headerBlockData( setting ) {
		Zeen.control( 'header_block_pids', ZeenControlStatus( setting, [ [ 'header_block_source', 'pids', '=' ] ], '=' ) );
		Zeen.control( 'header_block_categories', ZeenControlStatus( setting, [ [ 'header_block_source', 'categories', '=' ], [ 'header_block_sortby', 1, '!=int'  ] ], '=' ) );
		Zeen.control( 'header_block_tags', ZeenControlStatus( setting, [ [ 'header_block_source', 'tags', '=' ], [ 'header_block_sortby', 1, '!=int'  ] ], '=' ) );
	};

	function ZeenControlStatus( setting, toCheck, comparison, initialCheck ) {

	    return function( control ) {
	        var status = function() {

		        	if ( comparison === 'intarray' ) {
		            	return $.inArray( parseInt( setting.get() ), toCheck ) !== -1;
		            } else if ( comparison === '=' ) {
		            	return setting.get() === toCheck;
		            } else if ( comparison === '!=' ) {
		            	return setting.get() !== toCheck;
		            }  else if ( comparison === '!empty' ) {
		            	return setting.get() !== '';
		            } else if ( comparison === 'empty' ) {
		            	return setting.get() === '';
		            }  else if ( comparison === '!=int' ) {
		            	return parseInt( setting.get() ) !== toCheck;
		            } else if ( comparison === 'gt' ) {
		            	return parseInt( setting.get() ) > toCheck;
		            } else if ( comparison === 'lt' ) {
		            	return parseInt( setting.get() ) < toCheck;
		            } else if ( comparison === 'true' ) {
		            	return ( setting.get() === true || setting.get() === 1 || setting.get() === 'true' )
		            } else if ( comparison === 'false' ) {
		            	return ( setting.get() !== true && setting.get() !== 1 && setting.get() !== 'true' )
		            } else if ( comparison === 'int' ) {
		            	if ( typeof( toCheck ) === 'object' ) {
		            		for (var i = 0; i < toCheck.length; i++) {
		            			if ( parseInt( setting.get() ) === toCheck[i] ) {
		            				return true;
		            			}
		            		}
		            		return false;
		            	} else {
		            		return ( parseInt( setting.get() ) === toCheck );
		            	}
		            } else if ( comparison === 'object' ) {
		            	var showIt = true;
		            	for ( var i = 0; i < toCheck.length; i++ ) {
		            		var valToCheck = Zeen.value( toCheck[i][0] )();
		        			if ( toCheck[i][2] === '=' ) {
			        			if ( valToCheck !== toCheck[i][1] ) {
			        				showIt = false;
			        			}
			        		} else if ( toCheck[i][2] === 'true' ) {
			        			if ( valToCheck !== true && valToCheck !== 1 && valToCheck !== 'true' ) {
			        				showIt = false;
			        			}
			        		} else if ( toCheck[i][2] === 'false' ) {
			        			if ( valToCheck === true || valToCheck === 1 || valToCheck === 'true' ) {
			        				showIt = false;
			        			}
			        		} else if ( toCheck[i][2] === '!empty' ) {
			        			if ( valToCheck === '' ) {
			        				showIt = false;
			        			}
			        		} else if ( toCheck[i][2] === 'empty' ) {
			        			if ( valToCheck !== '' ) {
			        				showIt = false;
			        			}
			        		} else if ( toCheck[i][2] === 'gt' ) {

				            	if ( parseInt( valToCheck ) <= toCheck[i][1] ) {
				            		showIt = false;
				            	}
				            } else if ( toCheck[i][2] === 'lt' ) {
				            	if ( parseInt( valToCheck ) >= toCheck[i][1] ) {
				            		showIt = false;
				            	}
			        		} else if ( toCheck[i][2] === 'int' ) {
			        			if ( toCheck[i][1] !== parseInt( valToCheck ) ) {
			        				showIt = false;
			        			}
			        		}  else if ( toCheck[i][2] === '!=int' ) {
				            	if ( parseInt( valToCheck ) === toCheck[i][1] ) {
				            		showIt = false
				            	}
				            }
		        		}

		        		return showIt;
		            }
	        };
	        var changeStatus = function() {
	            control.active.set( status() );
	        };

	        control.active.validate = status;
	        if ( initialCheck !== 'off' ) {
	        	changeStatus();
	        }
	        setting.bind( changeStatus );
	    };
	}

	Zeen( 'header_block_source', function( setting ) {
		headerBlockData( setting );
	} );
	Zeen( 'header_block_sortby', function( setting ) {
		headerBlockData( setting );
	} );

	Zeen( 'footer_instagram', function( setting ) {
		Zeen.control( 'footer_instagram_location', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'footer_instagram_shortcode', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'footer_style', function( setting ) {
		Zeen.control( 'footer_upper_padding_top', ZeenControlStatus( setting, [3,4], 'intarray' ) );
		Zeen.control( 'footer_upper_padding_bottom', ZeenControlStatus( setting, [3,4], 'intarray' ) );
	} );

	Zeen( 'subscribe_on_leave', function( setting ) {
		Zeen.control( 'subscribe_leave_cookie', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'slider_args_autoplay', function( setting ) {
		Zeen.control( 'slider_args_delay', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'classic_post_ani_onoff', function( setting ) {
		Zeen.control( 'classic_post_ani', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'splitter_bottom_onoff', function( setting ) {
		Zeen.control( 'splitter_bottom', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'pages_splitter_bottom_onoff', function( setting ) {
		Zeen.control( 'pages_splitter_bottom', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'footer_splitter_top_onoff', function( setting ) {
		Zeen.control( 'footer_splitter_top', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'mobile_header_sticky_onoff', function( setting ) {
		Zeen.control( 'mobile_header_sticky', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'mobile_header_style', function( setting ) {
		Zeen.control( 'subtitle_mobile_header_icons', ZeenControlStatus( setting, '10', 'lt' ) );
		Zeen.control( 'customize-control-mobile_header_icon_search', ZeenControlStatus( setting, '10', 'lt' ) );
		Zeen.control( 'mobile_header_icon_mobile_slide', ZeenControlStatus( setting, '10', 'lt' ) );
		Zeen.control( 'mobile_header_icon_search', ZeenControlStatus( setting, '10', 'lt' ) );
		Zeen.control( 'mobile_header_icon_login', ZeenControlStatus( setting, '10', 'lt' ) );
		Zeen.control( 'mobile_header_icon_cart', ZeenControlStatus( setting, '10', 'lt' ) );
		Zeen.control( 'mobile_header_icon_dark_mode', ZeenControlStatus( setting, '10', 'lt' ) );
	} );

	Zeen( 'mobile_bottom_sticky_onoff', function( setting ) {
		Zeen.control( 'mobile_bottom_sticky', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_tw', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_fb', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_msg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_wa', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_telegram', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_line', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mob_bot_share_pinterest', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'woo_summary_share', function( setting ) {
		Zeen.control( 'woo_summary_share_fb', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_tw', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_pin', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_li', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_re', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_pocket', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_instapaper', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_tu', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_vk', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_em', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_wa', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_msg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_viber', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_flip', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_summary_share_line', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'classic_bottom_border_onoff', function( setting ) {
		Zeen.control( 'classic_bottom_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'classic_bottom_border_padding', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'classic_cats', function( setting ) {
		Zeen.control( 'classic_cats_design', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'posts_cats', function( setting ) {
		Zeen.control( 'posts_cats_design', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'single_next_previous', function( setting ) {
		Zeen.control( 'single_next_previous_design', ZeenControlStatus( setting, 'true', 'true' ) );
	} );
	Zeen( 'breadcrumbs', function( setting ) {
		Zeen.control( 'breadcrumbs_show_post_title', ZeenControlStatus( setting, 'true', 'true' ) );
	} );
	Zeen( 'single_related_posts', function( setting ) {
		Zeen.control( 'single_related_posts_order', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_design', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_location', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_ajax_arrow', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_ppp', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_only_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_source', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_related_posts_date', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'amp_ad', function( setting ) {
		Zeen.control( 'amp_ad_footer', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'amp_ad_header', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'amp_ad_client', ZeenControlStatus( setting, [ [ 'amp_ad_type', 'true', 'true' ], [ 'amp_ad', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'amp_ad_slot', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'amp_ad_type', ZeenControlStatus( setting, 'true', 'true' ) );
	} );
	Zeen( 'amp_ad_type', function( setting ) {
		Zeen.control( 'amp_ad_client', ZeenControlStatus( setting, [ [ 'amp_ad_type', 0, 'int' ], [ 'amp_ad', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'footer_widgets_border_onoff', function( setting ) {
		Zeen.control( 'footer_widgets_border_width', ZeenControlStatus( setting, [ [ 'footer_widgets_border_onoff', 'true', 'true' ], [ 'footer_widgets_style', 1, 'gt' ] ], 'object' ) );
	} );

	Zeen( 'footer_top_border_onoff', function( setting ) {
		Zeen.control( 'footer_top_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'footer_widgets_style', function( setting ) {
		Zeen.control( 'footer_widgets_border_onoff', ZeenControlStatus( setting, 1, 'gt' ) );
		Zeen.control( 'footer_widgets_border_width', ZeenControlStatus( setting, [ [ 'footer_widgets_border_onoff', 'true', 'true' ], [ 'footer_widgets_style', 1, 'gt' ] ], 'object' ) );

	} );


	Zeen( 'sidebar_border_onoff', function( setting ) {
		Zeen.control( 'sidebar_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'sidebar_widgets_border_onoff', function( setting ) {
		Zeen.control( 'sidebar_widgets_border_bottom', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sidebar_widgets_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'sidebar_widgets_skin', function( setting ) {
		Zeen.control( 'sidebar_widgets_spacing', ZeenControlStatus( setting, 4, '!=int' ) );
	} );

	Zeen( 'to_top', function( setting ) {
		Zeen.control( 'to_top_icon_show', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'to_top_icon', ZeenControlStatus( setting, [ [ 'to_top', 'true', 'true' ], [ 'to_top_icon_show', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'to_top_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'to_top_fixed', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'to_top_fixed_background', ZeenControlStatus( setting, [ [ 'to_top', 'true', 'true' ], [ 'to_top_fixed', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'to_top_fixed_color', ZeenControlStatus( setting, [ [ 'to_top', 'true', 'true' ], [ 'to_top_fixed', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'to_top_fixed', function( setting ) {
		Zeen.control( 'to_top_fixed_background', ZeenControlStatus( setting, [ [ 'to_top', 'true', 'true' ], [ 'to_top_fixed', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'to_top_fixed_color', ZeenControlStatus( setting, [ [ 'to_top', 'true', 'true' ], [ 'to_top_fixed', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'to_top_icon_show', function( setting ) {
		Zeen.control( 'to_top_icon', ZeenControlStatus( setting, [ [ 'to_top', 'true', 'true' ], [ 'to_top_icon_show', 'true', 'true' ] ], 'object' ) );
	} );
	Zeen( 'secondary_menu_side_enable', function( setting ) {
		Zeen.control( 'floating_side_menu', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'header_cta', function( setting ) {
		Zeen.control( 'header_cta_bg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_color_hover', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_color_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_rounded', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_fill', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_content', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_font_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_url', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_cta_new_tab', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'mobile_menu_cta', function( setting ) {
		Zeen.control( 'mobile_menu_cta_bg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_color_hover', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_color_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_rounded', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_fill', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_content', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_font_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_url', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_cta_new_tab', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'mobile_menu_secondary_cta', function( setting ) {
		Zeen.control( 'mobile_menu_secondary_cta_bg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_color_hover', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_color_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_rounded', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_fill', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_content', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_font_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_url', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'mobile_menu_secondary_cta_new_tab', ZeenControlStatus( setting, 'true', 'true' ) );
	} );


	Zeen( 'header_style', function( setting ) {
		Zeen.control( 'header_side_width', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'main_menu_flip_contents', ZeenControlStatus( setting, [ [ 'header_style', 11, 'gt' ], [ 'header_style', 70, 'lt' ] ], 'object' ) );
		Zeen.control( 'secondary_menu_flip_contents', ZeenControlStatus( setting, [ [ 'header_style', 70, 'lt' ] ], 'object' ) );
		Zeen.control( 'floating_side_menu', ZeenControlStatus( setting, [ [ 'secondary_menu_side_enable', 'true', 'true' ], [ 'header_style', 81, '!=int' ], [ 'header_style', 82, '!=int' ], [ 'header_style', 70, 'gt' ] ], 'object' ) );
		Zeen.control( 'secondary_menu_side_enable', ZeenControlStatus( setting, [ [ 'header_style', 81, '!=int' ], [ 'header_style', 82, '!=int' ], [ 'header_style', 70, 'gt' ] ], 'object' ) );

		Zeen.control( 'secondary_menu_padding_bottom', ZeenControlStatus( setting, 20, 'lt' ) );
		Zeen.section( 'section_main_menu', ZeenControlStatus( setting, 80, 'lt' ) );
		Zeen.control( 'secondary_menu_padding_top', ZeenControlStatus( setting, 20, 'lt' ) );

		var lessthan80 = [ 'header_width', 'title_header_details', 'header_padding_top', 'header_padding_bottom', 'title_stickies_header', 'header_sticky_onoff', 'header_sticky', 'title_header_ad', 'header_pub' ];
		var lessthan72 = [ 'logo_main_menu_position', 'logo_main_menu_visible', 'logo_main_menu_retina', 'logo_main_menu', 'title_main_menu_logo', 'main_menu_top_border_width', 'main_menu_bottom_border_width', 'main_menu_skin', 'main_menu_width', 'main_menu_padding_bottom', 'main_menu_padding_top' ];
		var lessthan70 = [ 'secondary_menu_skin_color', 'secondary_menu_skin', 'secondary_menu_width', 'secondary_date', 'current_date_color', 'secondary_menu_trending_inline', 'secondary_menu_padding_sides' ];
		var secondaryMix = [ 'secondary_menu_skin_color', 'secondary_menu_skin', 'secondary_menu_width', 'secondary_menu_padding_top', 'secondary_menu_padding_bottom' ];

		for (var i = 0; i < lessthan70.length; i++) {
			Zeen.control( lessthan70[i], ZeenControlStatus( setting, 70, 'lt' ) );
		}
		for (var i = 0; i < lessthan80.length; i++) {
			Zeen.control( lessthan80[i], ZeenControlStatus( setting, 80, 'lt' ) );
		}
		for (var i = 0; i < lessthan72.length; i++) {
			Zeen.control( lessthan72[i], ZeenControlStatus( setting, 72, 'lt' ) );
		}
		for (var i = 0; i < secondaryMix.length; i++) {
			Zeen.control( secondaryMix[i], ZeenControlStatus( setting, [ [ 'header_style', 11, '!=int' ], [ 'header_style', 5, '!=int' ], [ 'header_style', 70, 'lt' ] ], 'object' ) );
		}
	} );

	Zeen( 'header_sticky_onoff', function( setting ) {
		Zeen.control( 'header_sticky', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_menu_post_name', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_customize', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_logo_height', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_padding_bottom', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_padding_top', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_bg', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'reading_mode', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_menu_post_name', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_menu_share', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_menu_post_name', 'true', 'true' ] ], 'object' ) );
	} );


	Zeen( 'sticky_header_customize', function( setting ) {
		Zeen.control( 'sticky_header_logo_height', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_padding_bottom', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_padding_top', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_header_bg', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'header_sticky_onoff', 'true', 'true' ], [ 'sticky_header_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'sticky_menu_post_name', function( setting ) {
		Zeen.control( 'reading_mode', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'sticky_menu_post_name', 'true', 'true' ], [ 'header_sticky_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'sticky_menu_share', ZeenControlStatus( setting, [ [ 'header_style', 80, 'lt' ], [ 'sticky_menu_post_name', 'true', 'true' ], [ 'header_sticky_onoff', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'classic_read_more', function( setting ) {
		Zeen.control( 'classic_read_more_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'classic_read_more_customize', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'classic_read_more_bg', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_color_hover', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_color_text', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_rounded', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_fill', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'grid_read_more', function( setting ) {
		Zeen.control( 'grid_read_more_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'grid_read_more_customize', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'grid_read_more_bg', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_color_hover', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_color_text', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_rounded', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_fill', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'slider_read_more', function( setting ) {
		Zeen.control( 'slider_read_more_text', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'slider_read_more_customize', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'slider_read_more_bg', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_color_hover', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_color_text', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_rounded', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_fill', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'grid_read_more_customize', function( setting ) {
		Zeen.control( 'grid_read_more_bg', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_color_hover', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_color_text', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_rounded', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'grid_read_more_fill', ZeenControlStatus( setting, [ [ 'grid_read_more_customize', 'true', 'true' ], [ 'grid_read_more_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'slider_read_more_customize', function( setting ) {
		Zeen.control( 'slider_read_more_bg', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_color_hover', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_color_text', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_rounded', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'slider_read_more_fill', ZeenControlStatus( setting, [ [ 'slider_read_more_customize', 'true', 'true' ], [ 'slider_read_more_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'classic_read_more_customize', function( setting ) {
		Zeen.control( 'classic_read_more_bg', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_color_hover', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_color_text', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_rounded', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'classic_read_more_fill', ZeenControlStatus( setting, [ [ 'classic_read_more', 'true', 'true' ], [ 'classic_read_more_customize', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'masonry_design', function( setting ) {
		Zeen.control( 'masonry_text_color', ZeenControlStatus( setting, 2, 'int' ) );
		Zeen.control( 'masonry_background_color', ZeenControlStatus( setting, 2, 'int' ) );
		Zeen.control( 'masonry_whitespace', ZeenControlStatus( setting, 2, 'int' ) );
	} );

	Zeen( 'masonry_borders', function( setting ) {
		Zeen.control( 'masonry_border_color', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'main_menu_icon_search', function( setting ) {
		Zeen.control( 'main_menu_icon_search_type', ZeenControlStatus( setting, [ [ 'main_menu_icon_search', 'true', 'true' ], [ 'header_style', 80, 'lt' ] ], 'object' ) );
	} );

	Zeen( 'secondary_menu_icon_search', function( setting ) {
		Zeen.control( 'secondary_menu_icon_search_type', ZeenControlStatus( setting, [ [ 'secondary_menu_icon_search', 'true', 'true' ], [ 'header_style', 80, 'lt' ] ], 'object' ) );
	} );

	Zeen( 'logo_main_menu', function( setting ) {
		Zeen.control( 'logo_main_menu_retina', ZeenControlStatus( setting, [ [ 'logo_main_menu', 'true', '!empty' ], [ 'header_style', 72, 'lt' ] ], 'object' ) );
		Zeen.control( 'logo_main_menu_visible', ZeenControlStatus( setting, [ [ 'logo_main_menu', 'true', '!empty' ], [ 'header_style', 72, 'lt' ] ], 'object' ) );
		Zeen.control( 'logo_main_menu_position', ZeenControlStatus( setting, [ [ 'logo_main_menu', 'true', '!empty' ], [ 'header_style', 72, 'lt' ] ], 'object' ) );
		Zeen.control( 'alt_logo_main_menu', ZeenControlStatus( setting, [ [ 'logo_main_menu', 'true', '!empty' ], [ 'header_style', 72, 'lt' ] ], 'object' ) );
		Zeen.control( 'alt_logo_main_menu_retina', ZeenControlStatus( setting, [ [ 'alt_logo_main_menu', 'true', '!empty' ], [ 'header_style', 72, 'lt' ], [ 'logo_main_menu', 'true', '!empty' ] ], 'object' ) );
	} );

	Zeen( 'alt_logo_main_menu', function( setting ) {
		Zeen.control( 'alt_logo_main_menu_retina', ZeenControlStatus( setting, [ [ 'alt_logo_main_menu', 'true', '!empty' ], [ 'header_style', 72, 'lt' ], [ 'logo_main_menu', 'true', '!empty' ] ], 'object' ) );
	} );

	Zeen( 'logo_mobile', function( setting ) {
		Zeen.control( 'logo_mobile_retina', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'alt_logo_mobile', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'alt_logo_mobile_retina', ZeenControlStatus( setting, [ [  'alt_logo_mobile', '', '!empty' ], [ 'logo_mobile', '', '!empty' ] ], 'object') );
		Zeen.control( 'logo_text_mobile', ZeenControlStatus( setting, [ [  'logo_text_mobile_onoff', 'true', 'true' ], [ 'logo_mobile', '', 'empty' ] ], 'object') );
		Zeen.control( 'color_logo_mobile_text', ZeenControlStatus( setting, [ [  'logo_text_mobile_onoff', 'true', 'true' ], [ 'logo_mobile', '', 'empty' ] ], 'object') );
		Zeen.control( 'logo_text_mobile_onoff', ZeenControlStatus( setting, '', '=' ) );
	} );

	Zeen( 'logo_text_mobile_onoff', function( setting ) {
		Zeen.control( 'logo_text_mobile', ZeenControlStatus( setting, [ [  'logo_text_mobile_onoff', 'true', 'true' ], [ 'logo_mobile', '', 'empty' ] ], 'object') );
		Zeen.control( 'color_logo_mobile_text', ZeenControlStatus( setting, [ [  'logo_text_mobile_onoff', 'true', 'true' ], [ 'logo_mobile', '', 'empty' ] ], 'object') );
	} );

	Zeen( 'grid_font_size_override', function( setting ) {
		Zeen.control( 'font_size_grid_xl_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_size_grid_l_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_size_grid_m_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_size_grid_s_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'subtitle_typo_font_sizes_grids_extras', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'subtitle_typo_font_sizes_grids_titles', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_size_grid_s_subtitle', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_size_grid_l_subtitle', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_size_grid_read_more', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'letter_spacing_grid', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'category_layout', function( setting ) {
		Zeen.control( 'category_fs', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'category_image_shape', ZeenControlStatus( setting, [1, 21, 26, 27, 28, 61, 71, 72, 79], 'int'  ) );
		Zeen.control( 'category_flipstack', ZeenControlStatus( setting, [61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79], 'int'  ) );
	} );

	Zeen( 'tags_layout', function( setting ) {
		Zeen.control( 'tags_fs', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'tags_image_shape', ZeenControlStatus( setting, [1, 21, 26, 27, 28, 61, 71, 72, 79], 'int'  ) );
		Zeen.control( 'tags_flipstack', ZeenControlStatus( setting, [61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79], 'int'  ) );
	} );

	Zeen( 'author_layout', function( setting ) {
		Zeen.control( 'author_fs', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'author_image_shape', ZeenControlStatus( setting, [1, 21, 26, 27, 28, 61, 71, 72, 79], 'int'  ) );
		Zeen.control( 'author_flipstack', ZeenControlStatus( setting, [61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79], 'int'  ) );
	} );

	Zeen( 'search_layout', function( setting ) {
		Zeen.control( 'search_fs', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'search_image_shape', ZeenControlStatus( setting, [1, 21, 26, 27, 28, 61, 71, 72, 79], 'int'  ) );
		Zeen.control( 'search_flipstack', ZeenControlStatus( setting, [61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79], 'int'  ) );
	} );
	Zeen( 'tax_layout', function( setting ) {
		Zeen.control( 'tax_fs', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'tax_image_shape', ZeenControlStatus( setting, [1, 21, 26, 27, 28, 61, 71, 72, 79], 'int'  ) );
		Zeen.control( 'tax_flipstack', ZeenControlStatus( setting, [61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79], 'int'  ) );
	} );

	Zeen( 'blog_page_layout', function( setting ) {
		Zeen.control( 'blog_page_fs', ZeenControlStatus( setting, 80, 'gt' ) );
		Zeen.control( 'blog_page_image_shape', ZeenControlStatus( setting, [1, 21, 26, 27, 28, 61, 71, 72, 79], 'int'  ) );
		Zeen.control( 'blog_page_flipstack', ZeenControlStatus( setting, [61, 24, 26, 27, 28, 29, 64, 68, 2, 21, 71, 72, 79], 'int'  ) );
	} );

	Zeen( 'blog_page_cat_exclude', function( setting ) {
		Zeen.control( 'blog_page_cat_excluded', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'woo_cart_icon_onoff', function( setting ) {
		Zeen.control( 'woo_cart', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'woo_tipi_blocks_variations', function( setting ) {
		Zeen.control( 'woo_tipi_blocks_variations_simple', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'woo_tipi_blocks_variations_labels', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'global_background_img', function( setting ) {
		Zeen.control( 'global_background_img_repeat', ZeenControlStatus( setting, '', '!empty' ) );
	} );

	Zeen( 'bg_ad', function( setting ) {
		Zeen.control( 'bg_ad_url', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'bg_ad_img', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'bg_ad_img_stretch', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'bg_ad_spacing', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'bg_ad_only_hp', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'ipl', function( setting ) {
		Zeen.control( 'ipl_source', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_coms', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_mobile', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_separation', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_newsletter', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_before_post_ad', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_end_post_ad', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'ipl_author', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'bbpress_layout', function( setting ) {
		Zeen.control( 'bbpress_sidebar', ZeenControlStatus( setting, 50, 'lt' ) );
	} );

	Zeen( 'buddypress_layout', function( setting ) {
		Zeen.control( 'buddypress_sidebar', ZeenControlStatus( setting, 50, 'lt' ) );
	} );

	Zeen( 'woo_product_layout', function( setting ) {
		Zeen.control( 'woo_product_sidebar', ZeenControlStatus( setting, 1, 'int' ) );
		Zeen.control( 'woo_product_hero_bg_onoff', ZeenControlStatus( setting, 1, '!=int' ) );
		Zeen.control( 'woo_product_hero_bg', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_text_color', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_input_bg', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_input_border', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_input_color', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'woo_new_onoff', function( setting ) {
		Zeen.control( 'woo_new_date', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'woo_product_hero_bg_onoff', function( setting ) {
		Zeen.control( 'woo_product_hero_bg', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_text_color', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_input_bg', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_input_border', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'woo_product_hero_input_color', ZeenControlStatus( setting, [ [ 'woo_product_layout', 1, '!=int' ], [ 'woo_product_hero_bg_onoff', 'true', 'true' ] ], 'object' ) );

	});

	Zeen( 'woo_qv', function( setting ) {
		Zeen.control( 'woo_qv_price', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'single_before_share', function( setting ) {
		Zeen.control( 'single_share_design_start_article', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'single_below_title_share', function( setting ) {
		Zeen.control( 'single_share_design_below_title', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'single_end_share', function( setting ) {
		Zeen.control( 'single_share_design', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'woo_layout', function( setting ) {
		Zeen.control( 'woo_shop_sidebar', ZeenControlStatus( setting, 10, 'gt' ) );
	} );

	Zeen( 'sliding_global', function( setting ) {
		Zeen.control( 'sliding_box_location', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_cookie', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_subtitle', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_smallprint', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_code', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_url', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_bg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_global_font_color', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'sliding_post', function( setting ) {
		Zeen.control( 'sliding_post_source', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_post_date', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_post_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'sliding_post_cookie', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'post_mid_inline', function( setting ) {
		Zeen.control( 'post_mid_inline_date', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'footer_width', function( setting ) {
		Zeen.control( 'footer_reveal', ZeenControlStatus( setting, 1, 'int' ) );
	} );

	Zeen( 'header_block_featured_title_onoff', function( setting ) {
		Zeen.control( 'header_block_featured_title', ZeenControlStatus( setting, [ [ 'header_block_featured_title_onoff', 'true', 'true' ], [ 'header_block_hp_onoff', 'true', 'true' ] ], 'object') );
	} );
	Zeen( 'classic_title_line_onoff', function( setting ) {
		Zeen.control( 'classic_title_line_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'megamenu_animation_onoff', function( setting ) {
		Zeen.control( 'megamenu_animation', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'un_link', function( setting ) {
		Zeen.control( 'un_link_height', ZeenControlStatus( setting, 1, 'gt' ) );
		Zeen.control( 'un_link_color', ZeenControlStatus( setting, 1, 'gt' ) );
		Zeen.control( 'un_link_style', ZeenControlStatus( setting, 1, 'gt' ) );
	} );

	Zeen( 'lr_override_accent_color_onoff', function( setting ) {
		Zeen.control( 'reviews_color_source', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'lr_override_accent_color', ZeenControlStatus( setting, [ [ 'lr_override_accent_color_onoff', 'true', 'true' ], [ 'reviews_color_source', '2', '=' ] ], 'object') );
	} );

	Zeen( 'reviews_color_source', function( setting ) {
			Zeen.control( 'lr_override_accent_color', ZeenControlStatus( setting, '2', '=' ) );
	} );

	Zeen( 'megamenu_color_usage_onoff', function( setting ) {
		Zeen.control( 'megamenu_color_usage', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'megamenu_skin', function( setting ) {
		Zeen.control( 'megamenu_skin_background', ZeenControlStatus( setting, 4, 'int' ) );
		Zeen.control( 'megamenu_skin_color', ZeenControlStatus( setting, 4, 'int' ) );
	} );

	Zeen( 'megamenu_submenu_color', function( setting ) {
		Zeen.control( 'dropdown_top_bar_height', ZeenControlStatus( setting, 2, 'int' ) );
	} );

	Zeen( 'classic_title_top_border_onoff', function( setting ) {
		Zeen.control( 'classic_title_top_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'classic_title_bottom_border_onoff', function( setting ) {
		Zeen.control( 'classic_title_bottom_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'single_reactions', function( setting ) {
		Zeen.control( 'single_reactions_style', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_emotions', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_reactions_score', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'single_thumbs', function( setting ) {
		Zeen.control( 'single_thumbs_title', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'single_thumbs_button_color', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'og_meta', function( setting ) {
		Zeen.control( 'og_meta_img', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'white_label_onoff', function( setting ) {
		Zeen.control( 'white_label_name', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'white_label_welcome_image', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'white_label_mark', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'white_label_folder_name', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'white_label_folder_name_child', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'white_label_theme_screenshot', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'white_label_theme_screenshot_child', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'title_theme_branding', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'title_theme_name', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'header_block_design', function( setting ) {
		Zeen.control( 'header_block_parallax', ZeenControlStatus( setting, [ [ 'header_block_hp_onoff', 'true', 'true' ], [ 'header_block_design', 90, 'lt' ] ], 'object') );
	} );
	Zeen( 'header_block_hp_onoff', function( setting ) {
		Zeen.control( 'header_block_featured_title', ZeenControlStatus( setting, [ [ 'header_block_featured_title_onoff', 'true', 'true' ], [ 'header_block_hp_onoff', 'true', 'true' ] ], 'object') );
		Zeen.control( 'header_block_featured_title_onoff', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_block_design', ZeenControlStatus( setting, 'true', 'true' ) );

		Zeen.control( 'header_block_parallax', ZeenControlStatus( setting, [ [ 'header_block_hp_onoff', 'true', 'true' ], [ 'header_block_design', 90, 'lt' ] ], 'object') );
		Zeen.control( 'header_block_hp', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_block_mobile', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_block_source', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'header_block_sortby', ZeenControlStatus( setting, 'true', 'true' ) );

		Zeen.control( 'header_block_pids', ZeenControlStatus( setting, [ [ 'header_block_hp_onoff', 'true', 'true' ], [ 'header_block_source', 'pids', '=' ] ], 'object') );
		Zeen.control( 'header_block_categories', ZeenControlStatus( setting, [ [ 'header_block_hp_onoff', 'true', 'true' ], [ 'header_block_source', 'categories', '=' ], [ 'header_block_sortby', 1, '!=int' ] ], 'object') );
		Zeen.control( 'header_block_tags', ZeenControlStatus( setting, [ [ 'header_block_hp_onoff', 'true', 'true' ], [ 'header_block_source', 'tags', '=' ], [ 'header_block_sortby', 1, '!=int' ] ], 'object') );
		Zeen.control( 'header_top_pub', ZeenControlStatus( setting, 'true', 'false' ) );
		Zeen.control( 'title_header_base_design_above_ad', ZeenControlStatus( setting, 'true', 'false' ) );
		Zeen.control( 'header_block_instagram', ZeenControlStatus( setting, 'true', 'false' ) );
		Zeen.control( 'header_block_instagram_shortcode', ZeenControlStatus( setting, [ [ 'header_block_hp_onoff', 'true', 'false' ], [ 'header_block_instagram', 'true', 'true' ] ], 'object') );

	} );

	Zeen( 'header_block_instagram', function( setting ) {
		Zeen.control( 'header_block_instagram_shortcode', ZeenControlStatus( setting, [ [ 'header_block_instagram', 'true', 'true' ], [ 'header_block_hp_onoff', 'true', 'false' ] ], 'object') );
	});

	Zeen( 'single_subscribe_end', function( setting ) {
		Zeen.control( 'single_subscribe_end_skin', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	Zeen( 'secondary_menu_borders', function( setting ) {
		Zeen.control( 'secondary_menu_top_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'secondary_menu_bottom_border_width', ZeenControlStatus( setting, 'true', 'true' ) );
	} );

	var skins = [ 'subscribe', 'popup', 'footer', 'footer_widgets', 'header', 'sidebar', 'mobile_header', 'mobile_menu', 'slide', 'lwa', 'single_subscribe_end' ];

	for ( var i = 0; i < skins.length; i++ ) {
		Zeen( skins[i] + '_skin', function( setting ) {
			Zeen.control( skins[i] + '_color', ZeenControlStatus( setting, [3,4], 'int' ) );
			Zeen.control( skins[i] + '_video_self', ZeenControlStatus( setting, 5, 'int' ) );
			Zeen.control( skins[i] + '_video_url', ZeenControlStatus( setting, 6, 'int' ) );
			Zeen.control( skins[i] + '_video_fb', ZeenControlStatus( setting, 4, 'gt' ) );
			Zeen.control( skins[i] + '_skin_color', ZeenControlStatus( setting, 3, 'int' ) );
			Zeen.control( skins[i] + '_skin_color_b', ZeenControlStatus( setting, 3, 'int' ) );
			Zeen.control( skins[i] + '_skin_img', ZeenControlStatus( setting, 3, 'int' ) );
			if ( skins[i] === 'header' || skins[i] === 'footer' || skins[i] === 'mobile_header' ) {
				Zeen.control( skins[i] + '_change_in_dark_mode', ZeenControlStatus( setting, 3, 'int' ) );
			}
			Zeen.control( skins[i] + '_skin_img_repeat', ZeenControlStatus( setting, [ [ skins[i] + '_skin', 3, 'int' ], [skins[i] + '_skin_img', '', '!empty' ] ], 'object') );
			Zeen.control( skins[i] + '_skin_img_transparency', ZeenControlStatus( setting, [ [ skins[i] + '_skin', 3, 'int' ], [skins[i] + '_skin_img', '', '!empty' ] ], 'object') );
		} );
		Zeen( skins[i] + '_skin_img', function( setting ) {
			Zeen.control( skins[i] + '_skin_img_transparency', ZeenControlStatus( setting, [ [ skins[i] + '_skin', 3, 'int' ], [skins[i] + '_skin_img', '', '!empty' ] ], 'object') );
			Zeen.control( skins[i] + '_skin_img_repeat', ZeenControlStatus( setting, [ [ skins[i] + '_skin', 3, 'int' ], [skins[i] + '_skin_img', '', '!empty' ] ], 'object') );
		} );
	}

	var skin_color = [ 'main_menu', 'footer_lower', 'secondary_menu' ];

	for ( var i = 0; i < skin_color.length; i++ ) {
		Zeen( skin_color[i] + '_skin', function( setting ) {
			Zeen.control( skin_color[i] + '_skin_color', ZeenControlStatus( setting, 3, 'int' ) );
			Zeen.control( skin_color[i] + '_skin_color_b', ZeenControlStatus( setting, 3, 'int' ) );
			if ( skin_color[i] === 'main_menu' ) {
				Zeen.control( skin_color[i] + '_change_in_dark_mode', ZeenControlStatus( setting, 3, 'int' ) );
			}
		} );
	}

	Zeen( 'logo_footer', function( setting ) {
		Zeen.control( 'logo_subtitle_footer_color', ZeenControlStatus( setting, [ [  'logo_subtitle_footer', '', '!empty' ], [ 'logo_footer', '', '!empty' ] ], 'object') );
		Zeen.control( 'logo_subtitle_footer', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'logo_footer_retina', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'alt_logo_footer', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'alt_logo_footer_retina', ZeenControlStatus( setting, [ [  'alt_logo_footer', '', '!empty' ], [ 'logo_footer', '', '!empty' ] ], 'object') );
	} );

	Zeen( 'logo_subtitle_footer' , function( setting ) {
		Zeen.control( 'logo_subtitle_footer_color', ZeenControlStatus( setting, [ [  'logo_subtitle_footer', '', '!empty' ], [ 'logo_footer', '', '!empty' ] ], 'object') );
	} );

	Zeen( 'alt_logo_footer', function( setting ) {
		Zeen.control( 'alt_logo_footer_retina', ZeenControlStatus( setting, [ [  'alt_logo_footer', '', '!empty' ], [ 'logo_footer', '', '!empty' ] ], 'object') );
	} );

	Zeen( 'logo_main', function( setting ) {
		Zeen.control( 'logo_subtitle_main_color', ZeenControlStatus( setting, [ [  'logo_subtitle_main', '', '!empty' ], [ 'logo_main', '', '!empty' ] ], 'object') );
		Zeen.control( 'logo_subtitle_main', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'logo_main_retina', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'logo_text', ZeenControlStatus( setting, [ [  'logo_text_onoff', 'true', 'true' ], [ 'logo_main', '', 'empty' ] ], 'object') );
		Zeen.control( 'color_logo_text', ZeenControlStatus( setting, [ [  'logo_text_onoff', 'true', 'true' ], [ 'logo_main', '', 'empty' ] ], 'object') );
		Zeen.control( 'logo_text_onoff', ZeenControlStatus( setting, '', '=' ) );
		Zeen.control( 'logo_main_h1', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'alt_logo_main', ZeenControlStatus( setting, 'true', '!empty' ) );
		Zeen.control( 'alt_logo_main_retina', ZeenControlStatus( setting, [ [  'alt_logo_main', '', '!empty' ], [ 'logo_main', '', '!empty' ] ], 'object') );
	} );

	Zeen( 'logo_text_onoff', function( setting ) {
		Zeen.control( 'logo_text', ZeenControlStatus( setting, [ [  'logo_text_onoff', 'true', 'true' ], [ 'logo_main', '', 'empty' ] ], 'object') );
		Zeen.control( 'color_logo_text', ZeenControlStatus( setting, [ [  'logo_text_onoff', 'true', 'true' ], [ 'logo_main', '', 'empty' ] ], 'object') );
	} );

	Zeen( 'alt_logo_main', function( setting ) {
		Zeen.control( 'alt_logo_main_retina', ZeenControlStatus( setting, [ [  'alt_logo_main', '', '!empty' ], [ 'logo_main', '', '!empty' ] ], 'object') );
	} );

	Zeen( 'logo_subtitle_main' , function( setting ) {
		Zeen.control( 'logo_subtitle_main_color', ZeenControlStatus( setting, [ [  'logo_subtitle_main', '', '!empty' ], [ 'logo_main', '', '!empty' ] ], 'object') );
	} );

	Zeen( 'logo_subtitle_slide' , function( setting ) {
		Zeen.control( 'logo_subtitle_slide_color', ZeenControlStatus( setting, '', '!=' ) );
	} );

	Zeen( 'font_3_onoff', function( setting ) {
		Zeen.control( 'font_3_source', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'font_3_color', ZeenControlStatus( setting, 'true', 'true' ) );

		Zeen.control( 'font_3_google', ZeenControlStatus( setting, [ [ 'font_3_source', 1, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_weight_custom', ZeenControlStatus( setting, [ [ 'font_3_source', 1, '!=int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_typekit', ZeenControlStatus( setting, [ [ 'font_3_source', 2, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_typekit_custom', ZeenControlStatus( setting, [ [ 'font_3_source', 2, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_typekit_fallback', ZeenControlStatus( setting, [ [ 'font_3_source', 2, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_custom', ZeenControlStatus( setting, [ [ 'font_3_source', 3, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
	} );

	Zeen( 'font_3_source', function( setting ) {
		Zeen.control( 'font_3_google', ZeenControlStatus( setting, [ [ 'font_3_source', 1, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_weight_custom', ZeenControlStatus( setting, [ [ 'font_3_source', 1, '!=int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_typekit', ZeenControlStatus( setting, [ [ 'font_3_source', 2, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_typekit_custom', ZeenControlStatus( setting, [ [ 'font_3_source', 2, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_typekit_fallback', ZeenControlStatus( setting, [ [ 'font_3_source', 2, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
		Zeen.control( 'font_3_custom', ZeenControlStatus( setting, [ [ 'font_3_source', 3, 'int' ], [ 'font_3_onoff', 'true', 'true' ] ], 'object' ) );
	} );


   var fonts = [ 1, 2 ];

   for ( var i = 0; i < fonts.length; i++ ) {
   		Zeen( 'font_' + fonts[i] + '_source', function( setting ) {
			Zeen.control( 'font_' + fonts[i] + '_google', ZeenControlStatus( setting, 1, 'int' ) );
			Zeen.control( 'font_' + fonts[i] + '_weight_custom', ZeenControlStatus( setting, 1, 'gt' ) );
			Zeen.control( 'font_' + fonts[i] + '_typekit', ZeenControlStatus( setting, 2, 'int' ) );
			Zeen.control( 'font_' + fonts[i] + '_typekit_fallback', ZeenControlStatus( setting, 2, 'int' ) );
			Zeen.control( 'font_' + fonts[i] + '_typekit_custom', ZeenControlStatus( setting, 2, 'int' ) );
			Zeen.control( 'font_' + fonts[i] + '_custom', ZeenControlStatus( setting, 3, 'int' ) );

		} );
   }

   var bylines = [ 'posts' ];

	for ( var i = 0; i < bylines.length; i++ ) {
		Zeen( bylines[i] + '_byline', function( setting ) {
			Zeen.control( bylines[i] + '_byline_comments', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( bylines[i] + '_byline_cats', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( bylines[i] + '_byline_author', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( bylines[i] + '_byline_author_avatar', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( bylines[i] + '_byline_read_time', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( bylines[i] + '_byline_like_count', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( bylines[i] + '_byline_date', ZeenControlStatus( setting, 'true', 'true' ) );
		} );
	}

	var tileTypes = [ 'grid', 'slider' ];

	for ( var i = 0; i < tileTypes.length; i++ ) {

		Zeen( tileTypes[i] + '_ani_onoff', function( setting ) {
			Zeen.control( tileTypes[i] + '_ani', ZeenControlStatus( setting, 'true', 'true' ) );
		} );

		Zeen( tileTypes[i] + '_title_ani_onoff', function( setting ) {
			Zeen.control( tileTypes[i] + '_title_ani', ZeenControlStatus( setting, 'true', 'true' ) );
		} );

		Zeen( tileTypes[i] + '_cats', function( setting ) {
			Zeen.control( tileTypes[i] + '_cats_design', ZeenControlStatus( setting, 'true', 'true' ) );
		} );

		Zeen( tileTypes[i] + '_title_bg_onoff', function( setting ) {
			Zeen.control( tileTypes[i] + '_title_bg', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( tileTypes[i] + '_title_bg_edge', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( tileTypes[i] + '_title_solid', ZeenControlStatus( setting, [ [ tileTypes[i] + '_title_bg_onoff', 'true', 'true' ], [tileTypes[i] + '_title_bg', 1, 'int' ] ], 'object' ) );
			Zeen.control( tileTypes[i] + '_title_gradient_a', ZeenControlStatus( setting, [ [ tileTypes[i] + '_title_bg_onoff', 'true', 'true' ], [tileTypes[i] + '_title_bg', 2, 'int' ] ], 'object' ) );
		} );

		Zeen( tileTypes[i] + '_title_bg', function( setting ) {
			Zeen.control( tileTypes[i] + '_title_solid', ZeenControlStatus( setting, [ [ tileTypes[i] + '_title_bg_onoff', 'true', 'true' ], [tileTypes[i] + '_title_bg', 1, 'int' ] ], 'object' ) );
			Zeen.control( tileTypes[i] + '_title_gradient_a', ZeenControlStatus( setting, [ [ tileTypes[i] + '_title_bg_onoff', 'true', 'true' ], [tileTypes[i] + '_title_bg', 2, 'int' ] ], 'object' ) );
		} );

		Zeen( tileTypes[i] + '_img_overlay_onoff', function( setting ) {

			Zeen.control( tileTypes[i] + '_img_overlay_opacity', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( tileTypes[i] + '_img_overlay_opacity_hover', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( tileTypes[i] + '_img_overlay', ZeenControlStatus( setting, 'true', 'true' ) );
			Zeen.control( tileTypes[i] + '_img_overlay_solid', ZeenControlStatus( setting, [ [ tileTypes[i] + '_img_overlay_onoff', 'true', 'true' ], [tileTypes[i] + '_img_overlay', 1, 'int' ] ], 'object' ) );
			for ( var n = 0; n < 7; n++ ) {
				Zeen.control( tileTypes[i] + '_gradient_' + n + '_a', ZeenControlStatus( setting, [ [ tileTypes[i] + '_img_overlay_onoff', 'true', 'true' ], [tileTypes[i] + '_img_overlay', 2, 'int' ] ], 'object' ) );
				if ( n === 1 && tileTypes[i] === 'slider' ) {
					break;
				}
			}
		} );

		Zeen( tileTypes[i] + '_img_overlay', function( setting ) {
			Zeen.control( tileTypes[i] + '_img_overlay_solid', ZeenControlStatus( setting, [ [ tileTypes[i] + '_img_overlay_onoff', 'true', 'true' ], [tileTypes[i] + '_img_overlay', 1, 'int' ] ], 'object' ) );
			for ( var n = 0; n < 7; n++ ) {
				Zeen.control( tileTypes[i] + '_gradient_' + n + '_a', ZeenControlStatus( setting, [ [ tileTypes[i] + '_img_overlay_onoff', 'true', 'true' ], [tileTypes[i] + '_img_overlay', 2, 'int' ] ], 'object' ) );
				if ( n === 1 && tileTypes[i] === 'slider' ) {
					break;
				}
			}
		} );

	}

	Zeen( 'top_bar_message', function( setting ) {
		Zeen.control( 'top_bar_message_content_spacing', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_message_content', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_message_font_color', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_message_content_font_size', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_message_link', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_message_bg', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_cookie', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'top_bar_newtab', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'timed_popup', function( setting ) {
		Zeen.control( 'timed_popup_timer', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'timed_popup_cookie', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'subscribe_on_timer', function( setting ) {
		Zeen.control( 'subscribe_timer', ZeenControlStatus( setting, 'true', 'true' ) );
		Zeen.control( 'subscribe_timer_cookie', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'grid_cats', function( setting ) {
		Zeen.control( 'grid_cat_design', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'slider_cats', function( setting ) {
		Zeen.control( 'slider_cat_design', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'classic_cats', function( setting ) {
		Zeen.control( 'classic_cat_design', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	Zeen( 'lightbox', function( setting ) {
		Zeen.control( 'lightbox_choice', ZeenControlStatus( setting, 'true', 'true' ) );
	});

	$('.tipi-tip').on( 'mouseenter', function(){
		var $tipOutput, $current;
		$current = $(this);
		$current.addClass( 'tipi-tipped' );
		var output = '<div class="tipi-tip-wrap">' +
			'<div class="inner">' +
				$current.data( 'title' ) +
			'</div>' +
			'<div class="detail"></div>' +
			'</div>';
		$('body').append( output );
		$tipOutput = $('body').find( '> .tipi-tip-wrap' );
		var offset = $current[0].getBoundingClientRect();
		var top = offset.top;
		top = top + offset.height;
		$tipOutput.css('top', top + 'px').addClass( 'tipi-tip-wrap-visible' );
		var left = offset.left;
		left = left - ( offset.width / 2 ) + 6;
		$tipOutput.find('.detail').css('left', left + 'px' );
		$current.on( 'mouseleave', function() {
			$tipOutput.remove();
			$current.off( 'mouseleave mousemove' );
		});
	} );


    Zeen.section( 'section_amp', function( section ) {
        section.expanded.bind( function( isExpanded ) {
            if ( isExpanded ) {
            } else {
            }
        } );
    } );

    $( '#zeen-reset' ).on( 'click', function( e ) {
    	e.preventDefault();
        var check = confirm( zeenCB.check );
        if ( ! check ) {
        	return;
        }
        $.ajax({
			    method: "GET",
			    url: zeenCB.root + 'c_r',
			    beforeSend: function( xhr ) {
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenCB.nonce );
			    },
			    success : function( response ) {
			    	Zeen.state( 'saved' ).set( true );
            		location.reload();
			    },
			    fail : function( response ) {
			        console.log( 'ERROR', response );
			    }
			});

    });
});

} )( jQuery, wp.customize );