/**
 * Copyright: Codetipi
 * Theme: Zeen
 */
(function( $, Zeen ) {
    'use strict';

    var metaStyles = document.head.appendChild( document.createElement( 'style' ) );
    var blockTitles = document.head.appendChild( document.createElement( 'style' ) );
    var stickyStyle = document.head.appendChild( document.createElement( 'style' ) );
    var widgetTitles = document.head.appendChild( document.createElement( 'style' ) );
    var logoText = document.head.appendChild( document.createElement( 'style' ) );
    var logoTextMob = document.head.appendChild( document.createElement( 'style' ) );
    Zeen.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {
        if ( placement.partial.id === 'secondary_menu_icon_facebook' || placement.partial.id === 'mobile_icon_facebook' || placement.partial.id === 'footer_icon_facebook' ) {
           window.zeen.cus();
        }
    } );


    Zeen( 'amp_header_background', function( value ) {
        value.bind( function( newval ) {
            $( 'header.amp-wp-header' ).css( 'background', newval );
        });
    });

    Zeen( 'trending_color', function( value ) {
        value.bind( function( newval ) {
            $( '.trending-accent-border' ).css( 'border-color', newval );
            $( '.trending-accent-bg' ).css( 'background', newval );
        });
    });

    Zeen( 'load_more_fill', function( value ) {
        value.bind( function( newval ) {
        	$( '.tipi-button.block-loader' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
            if ( parseInt( newval ) === 1 ) {
            	$( '.custom-button__fill-1.tipi-button.block-loader' ).css( 'background', Zeen( 'load_more_bg' ).get() );
            	$( '.custom-button__fill-1.tipi-button.block-loader' ).css( 'color', '#fff' );
        	} else {
            	$( '.tipi-button.block-loader' ).css( 'color', Zeen( 'load_more_bg' ).get() );
            	$( '.tipi-button.block-loader' ).css( 'border-color', Zeen( 'load_more_bg' ).get() );
        	}
        });
    });

    Zeen( 'load_more_size', function( value ) {
        value.bind( function( newval ) {
        	$( '.tipi-button.block-loader' ).removeClass( 'custom-button__size-1 custom-button__size-2 custom-button__size-3' ).addClass( 'custom-button__size-' + newval );
        });
    });

    Zeen( 'load_more_rounded', function( value ) {
        value.bind( function( newval ) {
        	$( '.tipi-button.block-loader' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
        });
    });

    Zeen( 'load_more_bg', function( value ) {
        value.bind( function( newval ) {
        	var fill = parseInt( Zeen( 'load_more_fill' ).get() );
        	if ( fill === 1 ) {
            	$( '.tipi-button.block-loader' ).css( 'background', newval );
        	} else {
            	$( '.tipi-button.block-loader' ).css( 'border-color', newval );
        	}
        });
    });

	Zeen( 'header_cta_fill', function( value ) {
        value.bind( function( newval ) {
        	$( '.tipi-button-cta-header' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
            if ( parseInt( newval ) === 1 ) {
            	$( '.custom-button__fill-1.tipi-button-cta-header' ).css( 'background', Zeen( 'header_cta_bg' ).get() );
            	$( '.custom-button__fill-1.tipi-button-cta-wrap-header' ).css( 'color', '#fff' );
				$( '.tipi-button-cta-header_menu' ).css( 'border-color', 'transparent' );
        	} else {
            	$( '.tipi-button-cta-header' ).css( 'color', Zeen( 'header_cta_bg' ).get() );
            	$( '.tipi-button-cta-header' ).css( 'border-color', Zeen( 'header_cta_bg' ).get() );
        	}
        });
    });

    Zeen( 'header_cta_size', function( value ) {
        value.bind( function( newval ) {
        	$( '.tipi-button-cta-header' ).removeClass( 'custom-button__size-1 custom-button__size-2 custom-button__size-3' ).addClass( 'custom-button__size-' + newval );
        });
    });

     Zeen( 'header_cta_font_size', function( value ) {
        value.bind( function( newval ) {
        	  $( '.tipi-button-cta-header' ).css( 'font-size', newval + 'px' );
			  zeenResponsiveStyle( newval, '.tipi-button-cta-header', 'font-size', 'px', 'header_cta_font_size' );
        });
    });
     Zeen( 'header_cta_color_text', function( value ) {
        value.bind( function( newval ) {
        	  $( '.tipi-button-cta-wrap-header' ).css( 'color', newval );
        });
    });
    Zeen( 'header_cta_content', function( value ) {
        value.bind( function( newval ) {
        	  $( '.tipi-button-cta-header .button-text' ).html( newval );
        });
    });

    Zeen( 'header_cta_rounded', function( value ) {
        value.bind( function( newval ) {
        	$( '.tipi-button-cta-header' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
        });
    });

    Zeen( 'header_cta_bg', function( value ) {
        value.bind( function( newval ) {
        	var fill = parseInt( Zeen( 'header_cta_fill' ).get() );
        	if ( fill === 1 ) {
            	$( '.tipi-button-cta-header' ).css( 'background', newval );
        	} else {
            	$( '.tipi-button-cta-header' ).css( 'border-color', newval );
        	}
        });
    });

	Zeen( 'mobile_menu_cta_fill', function( value ) {
		value.bind( function( newval ) {
			$( '.tipi-button-cta-mobile_menu' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
			if ( parseInt( newval ) === 1 ) {
				$( '.custom-button__fill-1.tipi-button-cta-mobile_menu' ).css( 'background', Zeen( 'mobile_menu_cta_bg' ).get() );
				$( '.custom-button__fill-1.tipi-button-cta-wrap-mobile_menu' ).css( 'color', '#fff' );

				$( '.tipi-button-cta-mobile_menu' ).css( 'border-color', 'transparent' );
			} else {
				$( '.tipi-button-cta-mobile_menu' ).css( 'color', Zeen( 'mobile_menu_cta_bg' ).get() );
				$( '.tipi-button-cta-mobile_menu' ).css( 'border-color', Zeen( 'mobile_menu_cta_bg' ).get() );
			}
		});
	});

	Zeen( 'mobile_menu_cta_size', function( value ) {
		value.bind( function( newval ) {
			$( '.tipi-button-cta-mobile_menu' ).removeClass( 'custom-button__size-1 custom-button__size-2 custom-button__size-3' ).addClass( 'custom-button__size-' + newval );
		});
	});

	 Zeen( 'mobile_menu_cta_font_size', function( value ) {
		value.bind( function( newval ) {
			  $( '.tipi-button-cta-mobile_menu' ).css( 'font-size', newval + 'px' );
			  zeenResponsiveStyle( newval, '.tipi-button-cta-mobile_menu.tipi-button', 'font-size', 'px', 'mobile_menu_cta_font_size' );
		});
	});
	 Zeen( 'mobile_menu_cta_color_text', function( value ) {
		value.bind( function( newval ) {
			  $( '.tipi-button-cta-wrap-mobile_menu' ).css( 'color', newval );
		});
	});
	Zeen( 'mobile_menu_cta_content', function( value ) {
		value.bind( function( newval ) {
			  $( '.tipi-button-cta-mobile_menu .button-text' ).html( newval );
		});
	});

	Zeen( 'mobile_menu_cta_rounded', function( value ) {
		value.bind( function( newval ) {
			$( '.tipi-button-cta-mobile_menu' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
		});
	});

	Zeen( 'mobile_menu_cta_bg', function( value ) {
		value.bind( function( newval ) {
			var fill = parseInt( Zeen( 'mobile_menu_cta_fill' ).get() );
			if ( fill === 1 ) {
				$( '.tipi-button-cta-mobile_menu' ).css( 'background', newval );
			} else {
				$( '.tipi-button-cta-mobile_menu' ).css( 'border-color', newval );
			}
		});
	});

	Zeen( 'mobile_menu_secondary_cta_fill', function( value ) {
		value.bind( function( newval ) {
			$( '.tipi-button-cta-mobile_menu_secondary' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
			if ( parseInt( newval ) === 1 ) {
				$( '.custom-button__fill-1.tipi-button-cta-mobile_menu_secondary' ).css( 'background', Zeen( 'mobile_menu_secondary_cta_bg' ).get() );
				$( '.custom-button__fill-1.tipi-button-cta-wrap-mobile_menu_secondary' ).css( 'color', '#fff' );
				$( '.tipi-button-cta-mobile_menu_secondary' ).css( 'border-color', 'transparent' );
			} else {
				$( '.tipi-button-cta-mobile_menu_secondary' ).css( 'color', Zeen( 'mobile_menu_secondary_cta_bg' ).get() );
				$( '.tipi-button-cta-mobile_menu_secondary' ).css( 'border-color', Zeen( 'mobile_menu_secondary_cta_bg' ).get() );
			}
		});
	});

	Zeen( 'mobile_menu_secondary_cta_size', function( value ) {
		value.bind( function( newval ) {
			$( '.tipi-button-cta-mobile_menu_secondary' ).removeClass( 'custom-button__size-1 custom-button__size-2 custom-button__size-3' ).addClass( 'custom-button__size-' + newval );
		});
	});

	 Zeen( 'mobile_menu_secondary_cta_font_size', function( value ) {
		value.bind( function( newval ) {
			  $( '.tipi-button-cta-mobile_menu_secondary' ).css( 'font-size', newval + 'px' );
			  zeenResponsiveStyle( newval, '.tipi-button-cta-mobile_menu_secondary.tipi-button', 'font-size', 'px', 'mobile_menu_secondary_cta_font_size' );
		});
	});
	 Zeen( 'mobile_menu_secondary_cta_color_text', function( value ) {
		value.bind( function( newval ) {
			  $( '.tipi-button-cta-wrap-mobile_menu_secondary' ).css( 'color', newval );
		});
	});
	Zeen( 'mobile_menu_secondary_cta_content', function( value ) {
		value.bind( function( newval ) {
			  $( '.tipi-button-cta-mobile_menu_secondary .button-text' ).html( newval );
		});
	});

	Zeen( 'mobile_menu_secondary_cta_rounded', function( value ) {
		value.bind( function( newval ) {
			$( '.tipi-button-cta-mobile_menu_secondary' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
		});
	});

	Zeen( 'mobile_menu_secondary_cta_bg', function( value ) {
		value.bind( function( newval ) {
			var fill = parseInt( Zeen( 'mobile_menu_secondary_cta_fill' ).get() );
			if ( fill === 1 ) {
				$( '.tipi-button-cta-mobile_menu_secondary' ).css( 'background', newval );
			} else {
				$( '.tipi-button-cta-mobile_menu_secondary' ).css( 'border-color', newval );
			}
		});
	});

    Zeen( 'classic_read_more_fill', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-classic .read-more.tipi-button' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
            if ( parseInt( newval ) === 1 ) {
            	$( '.preview-classic .read-more.tipi-button' ).css( 'background', Zeen( 'classic_read_more_bg' ).get() );
            	$( '.preview-classic .read-more.tipi-button' ).css( 'color', '#fff' );
        	} else {
            	$( '.preview-classic .read-more.tipi-button' ).css( 'color', Zeen( 'classic_read_more_bg' ).get() );
            	$( '.preview-classic .read-more.tipi-button' ).css( 'border-color', Zeen( 'classic_read_more_bg' ).get() );
        	}
        });
    });

    Zeen( 'classic_read_more_rounded', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-classic .read-more.tipi-button' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
        });
    });

    Zeen( 'classic_read_more_bg', function( value ) {
        value.bind( function( newval ) {
        	var fill = parseInt( Zeen( 'classic_read_more_fill' ).get() );
        	if ( fill === 1 ) {
            	$( '.preview-classic .read-more.tipi-button' ).css( 'background', newval );
        	} else {
            	$( '.preview-classic .read-more.tipi-button' ).css( 'border-color', newval );
        	}
        });
    });

    Zeen( 'grid_read_more_fill', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-grid .read-more.tipi-button' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
            if ( parseInt( newval ) === 1 ) {
            	$( '.preview-grid .read-more.tipi-button' ).css( 'background', Zeen( 'grid_read_more_bg' ).get() );
            	$( '.preview-grid .read-more.tipi-button' ).css( 'color', '#fff' );
        	} else {
            	$( '.preview-grid .read-more.tipi-button' ).css( 'color', Zeen( 'grid_read_more_bg' ).get() );
            	$( '.preview-grid .read-more.tipi-button' ).css( 'border-color', Zeen( 'grid_read_more_bg' ).get() );
        	}
        });
    });

    Zeen( 'grid_read_more_rounded', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-grid .read-more.tipi-button' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
        });
    });

    Zeen( 'grid_read_more_bg', function( value ) {
        value.bind( function( newval ) {
        	var fill = parseInt( Zeen( 'grid_read_more_fill' ).get() );
        	if ( fill === 1 ) {
            	$( '.preview-grid .read-more.tipi-button' ).css( 'background', newval );
        	} else {
            	$( '.preview-grid .read-more.tipi-button' ).css( 'border-color', newval );
        	}
        });
    });

    Zeen( 'slider_read_more_fill', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-slider .read-more.tipi-button' ).removeClass( 'custom-button__fill-1 custom-button__fill-2' ).addClass( 'custom-button__fill-' + newval );
            if ( parseInt( newval ) === 1 ) {
            	$( '.preview-slider .read-more.tipi-button' ).css( 'background', Zeen( 'slider_read_more_bg' ).get() );
            	$( '.preview-slider .read-more.tipi-button' ).css( 'color', '#fff' );
        	} else {
            	$( '.preview-slider .read-more.tipi-button' ).css( 'color', Zeen( 'slider_read_more_bg' ).get() );
            	$( '.preview-slider .read-more.tipi-button' ).css( 'border-color', Zeen( 'slider_read_more_bg' ).get() );
        	}
        });
    });

    Zeen( 'slider_read_more_rounded', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-slider .read-more.tipi-button' ).removeClass( 'custom-button__rounded-1 custom-button__rounded-2 custom-button__rounded-3' ).addClass( 'custom-button__rounded-' + newval );
        });
    });

    Zeen( 'slider_read_more_bg', function( value ) {
        value.bind( function( newval ) {
        	var fill = parseInt( Zeen( 'slider_read_more_fill' ).get() );
        	if ( fill === 1 ) {
            	$( '.preview-slider .read-more.tipi-button' ).css( 'background', newval );
        	} else {
            	$( '.preview-slider .read-more.tipi-button' ).css( 'border-color', newval );
        	}
        });
    });

    Zeen( 'contact_button_color', function( value ) {
        value.bind( function( newval ) {
            $( '.wpcf7-submit' ).css( 'background', newval );
        });
    });

    Zeen( 'amp_body_background', function( value ) {
        value.bind( function( newval ) {
            $( '.amp-mode-mouse' ).css( 'background', newval );
        });
    });

    Zeen( 'amp_body_color', function( value ) {
        value.bind( function( newval ) {
            $( '.amp-mode-mouse' ).css( 'color', newval );
        });
    });

    Zeen( 'add_to_cart_background', function( value ) {
        value.bind( function( newval ) {
            $( '.cart .button, .woocommerce .button' ).css( 'background', newval );
        });
    });

    Zeen( 'sale_background', function( value ) {
        value.bind( function( newval ) {
            $( '.outofstock, .onsale' ).css( 'background', newval );
        });
    });



	Zeen( 'amp_body_a_color', function( value ) {
        value.bind( function( newval ) {
            $( '.amp-mode-mouse a, .amp-wp-comments-link a' ).css( 'color', newval );
        });
    });

    Zeen( 'amp_footer_background', function( value ) {
        value.bind( function( newval ) {
            $( '.amp-wp-footer' ).css( 'background', newval );
        });
    });

    Zeen( 'amp_footer_color', function( value ) {
        value.bind( function( newval ) {
            $( '.amp-wp-footer, .amp-wp-footer a' ).css( 'color', newval );
        });
    });

    Zeen( 'amp_header_color', function( value ) {
        value.bind( function( newval ) {
            $( 'header.amp-wp-header, header.amp-wp-header a' ).css( 'color', newval );
            $( '.amp-sb-open' ).css( 'background', newval );
        });
    });

    Zeen( 'dropdown_top_bar_height', function( value ) {
        value.bind( function( newval ) {
            $( '.mm-submenu-2 .mm-11 .menu-wrap > *, .mm-submenu-2 .mm-31 .menu-wrap > *, .mm-submenu-2 .mm-21 .menu-wrap > *' ).css( 'border-top-width', newval + 'px' );
        });
    });

    Zeen( 'header_sticky_onoff', function( value ) {
        value.bind( function( newval ) {
        	var stickyable = $( '#masthead' );
        	var style = parseInt( Zeen( 'header_style' ).get() );
        	if ( style < 70 ) {
        		stickyable = $( '.main-navigation' );
        	}
        	var header_sticky = parseInt( Zeen( 'header_sticky' ).get() );
        	if ( newval === true ) {

	        	stickyable.removeClass( 'sticky-top stickied sticky-menu sticky-menu-1 sticky-menu-2 sticky-menu-3' ).addClass( 'sticky-menu sticky-menu-' + header_sticky );
	        	if ( 1 === parseInt( header_sticky ) ) {
					stickyable.addClass( 'sticky-top' );
				}
	            window.zeen.cus( 'sticky' );
        	} else {
        		stickyable.removeClass( 'sticky-top stickied sticky-menu sticky-menu-1 sticky-menu-2 sticky-menu-3' );
        	}

        });
    });


    Zeen( 'header_sticky', function( value ) {
        value.bind( function( newval ) {
        	var stickyable = $( '#masthead' );
        	var style = parseInt( Zeen( 'header_style' ).get() );
        	if ( style < 70 ) {
        		stickyable = $( '.main-navigation' );
        	}
        	stickyable.removeClass( 'sticky-top stickied sticky-menu sticky-menu-1 sticky-menu-2 sticky-menu-3' ).addClass( 'sticky-menu sticky-menu-' + newval );
        	if ( 1 === parseInt( newval ) ) {
				stickyable.addClass( 'sticky-top' );
			}
            window.zeen.cus( 'sticky' );
        });
    });

	Zeen( 'trending_icon', function( value ) {
        value.bind( function( newval ) {
        	var icon = 'zap';
        	if ( 2 === parseInt( newval ) ) {
				icon = 'bolt';
			} else if ( 3 === parseInt( newval ) ) {
				icon = 'hash';
			} else if ( 4 === parseInt( newval ) ) {
				icon = 'flame';
			} else if ( 5 === parseInt( newval ) ) {
				icon = 'trend';
			} else if ( 6 === parseInt( newval ) ) {
				icon = 'trend-2';
			}
        	$( '.tipi-trending-icon' ).removeClass( 'tipi-i-bolt tipi-i-hash tipi-i-zap tipi-i-flame tipi-i-trend tipi-i-trend-2 tipi-trending-icon' ).addClass( 'tipi-i-' + icon + ' tipi-trending-icon' );
        });
    });

    Zeen( 'trending_text', function( value ) {
        value.bind( function( newval ) {
        	$( '.trending-text' ).text( newval );
        });
    });

    Zeen( 'trending_mm_title', function( value ) {
        value.bind( function( newval ) {
        	$( '.trending-op-title' ).text( newval );
        });
    });

    Zeen( 'top_bar_message_font_color', function( value ) {
        value.bind( function( newval ) {
        	$( '#top-bar-message' ).css( 'color', newval );
        });
    });

    Zeen( 'top_bar_message_bg', function( value ) {
        value.bind( function( newval ) {
        	$( '#top-bar-message' ).css( 'background', newval );
        });
    });

    Zeen( 'mobile_menu_style', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).removeClass( 'site-mob-menu-1 site-mob-menu-2 site-mob-menu-3 site-mob-menu-4' ).addClass( 'site-mob-menu-' + newval );
        });
    });

    Zeen( 'header_change_in_dark_mode', function( value ) {
        value.bind( function( newval ) {
        	 $( 'body' ).removeClass( 'dark-mode--header-off' );
            if ( newval !== true ) {
            	$( 'body' ).addClass( 'dark-mode--header-off' );
            }
        });
    });
    Zeen( 'main_menu_change_in_dark_mode', function( value ) {
        value.bind( function( newval ) {
        	 $( 'body' ).removeClass( 'dark-mode--main-menu-off' );
            if ( newval !== true ) {
            	$( 'body' ).addClass( 'dark-mode--main-menu-off' );
            }
        });
    });
    Zeen( 'footer_change_in_dark_mode', function( value ) {
        value.bind( function( newval ) {
        	 $( 'body' ).removeClass( 'dark-mode--footer-off' );
            if ( newval !== true ) {
            	$( 'body' ).addClass( 'dark-mode--footer-off' );
            }
        });
    });


    Zeen( 'mobile_menu_animation_style', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).removeClass( 'site-mob-menu-a-1 site-mob-menu-a-2 site-mob-menu-a-3 site-mob-menu-a-4' ).addClass( 'site-mob-menu-a-' + newval );
        });
    });

    Zeen( 'bg_ad_img_stretch', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).removeClass( 'has-bg-stretch' );
            if ( newval === true ) {
            	$( 'body' ).addClass( 'has-bg-stretch' );
            }
        });
    });


    Zeen( 'megamenu_skin', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === 4 ) {
        		$( '.mm-skin-4 .mm-art .tipi-arrow' ).css( 'border-color', Zeen( 'megamenu_skin_color' ).get() );
		        $( '.mm-skin-4 .mm-art .tipi-arrow i:after' ).css( 'background', Zeen( 'megamenu_skin_color' ).get() );
		        $( '.mm-skin-4 .mm-art .menu-wrap, .mm-skin-4 .sub-menu' ).css( 'background', Zeen( 'megamenu_skin_background' ).get() );
		        $( '.mm-skin-4 .mm-art .menu-wrap a, .mm-skin-4 .sub-menu a, .mm-skin-4 .dropper .block-title-area .block-title, .mm-skin-4 .dropper .block-title-area .block-title a, .mm-skin-4 .mm-art .tipi-arrow, .mm-skin-4 .drop-it article .price' ).css( 'color', Zeen( 'megamenu_skin_color' ).get() );
        	} else {
	        	$( '.mm-skin-4 .mm-art .tipi-arrow' ).css( 'border-color', '' );
		        $( '.mm-skin-4 .mm-art .tipi-arrow i:after' ).css( 'background', '' );
		        $( '.mm-skin-4 .mm-art .menu-wrap a, .mm-skin-4 .sub-menu a, .mm-skin-4 .dropper .block-title-area .block-title, .mm-skin-4 .dropper .block-title-area .block-title a, .mm-skin-4 .mm-art .tipi-arrow, .mm-skin-4 .drop-it article .price' ).css( 'color', '' );
        	}

            $( '#masthead' ).add('#site-navigation').removeClass( 'mm-skin-1 mm-skin-2 mm-skin-3 mm-skin-4' ).addClass( 'mm-skin-' + newval );
        });
    });

    Zeen( 'megamenu_skin_background', function( value ) {
        value.bind( function( newval ) {
            $( '.mm-skin-4 .mm-art .menu-wrap, .mm-skin-4 .sub-menu' ).css( 'background', newval );
        });
    });

    Zeen( 'megamenu_skin_color', function( value ) {
        value.bind( function( newval ) {
	        $( '.mm-skin-4 .mm-art .tipi-arrow' ).css( 'border-color', newval );
	        $( '.mm-skin-4 .mm-art .tipi-arrow i:after' ).css( 'background', newval );
	        $( '.mm-skin-4 .mm-art .menu-wrap a, .mm-skin-4 .sub-menu a, .mm-skin-4 .dropper .block-title-area .block-title, .mm-skin-4 .dropper .block-title-area .block-title a, .mm-skin-4 .mm-art .tipi-arrow, .mm-skin-4 .drop-it article .price' ).css( 'color', newval );
        });
    });

    Zeen( 'classic_breathing_bot', function( value ) {
        value.bind( function( newval ) {
            $( '.separation-border' ).css( 'margin-bottom', newval);
        });
    });

    Zeen( 'site_width', function( value ) {
        value.bind( function( newval ) {
            $( 'body:not(.single) .tipi-row, .tipi-builder-on .contents-wrap > p' ).css( 'max-width', newval + 'px' );
        });
    });

    Zeen( 'site_width_posts', function( value ) {
        value.bind( function( newval ) {
            $( '.single .tipi-row' ).css( 'max-width', newval + 'px' );
        });
    });


    Zeen( 'letter_spacing_h1', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.site h1', 'letter-spacing', 'em', 'letter_spacing_h1' );
        });
    });
    Zeen( 'letter_spacing_h2', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.site h2', 'letter-spacing', 'em', 'letter_spacing_h2' );
        });
    });
    Zeen( 'letter_spacing_h3', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.site h3', 'letter-spacing', 'em', 'letter_spacing_h3' );
        });
    });
    Zeen( 'letter_spacing_buttons', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, 'input[type=submit], button, .tipi-button,.button,.wpcf7-submit,.button__back__home', 'letter-spacing', 'em', 'letter_spacing_buttons' );
        });
    });
    Zeen( 'letter_spacing_byline', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.byline .byline-part', 'letter-spacing', 'em', 'letter_spacing_byline' );
        });
    });
    Zeen( 'letter_spacing_main_menu', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.main-navigation .horizontal-menu > li > a', 'letter-spacing', 'em', 'letter_spacing_main_menu' );
        });
    });

	Zeen( 'letter_spacing_submenu', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.sub-menu a:not(.tipi-button)', 'letter-spacing', 'em', 'letter_spacing_submenu' );
        });
    });
    Zeen( 'letter_spacing_secondary_menu', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.secondary-wrap li', 'letter-spacing', 'em', 'letter_spacing_secondary_menu' );
        });
    });
    Zeen( 'letter_spacing_footer_menu', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-navigation li', 'letter-spacing', 'em', 'letter_spacing_footer_menu' );
        });
    });
    Zeen( 'letter_spacing_widget_title', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.widget-title', 'letter-spacing', 'em', 'letter_spacing_widget_title' );
        });
    });
    Zeen( 'letter_spacing_read_more', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.read-more', 'letter-spacing', 'em', 'letter_spacing_read_more' );
        });
    });
    Zeen( 'letter_spacing_copyright', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.copyright', 'letter-spacing', 'em', 'letter_spacing_copyright' );
        });
    });
    Zeen( 'letter_spacing_blockquote', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.site blockquote', 'letter-spacing', 'em', 'letter_spacing_blockquote' );
        });
    });
    Zeen( 'letter_spacing_subtitle', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.logo-fallback', 'letter-spacing', 'em', 'letter_spacing_subtitle' );
        });
    });
    Zeen( 'letter_spacing_logo_text', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.logo-fallback', 'letter-spacing', 'em', 'letter_spacing_logo_text' );
        });
    });
    Zeen( 'letter_spacing_body', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, 'body', 'letter-spacing', 'em', 'letter_spacing_body' );
        });
    });

    Zeen( 'font_size_tags', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.post-tags a', 'font-size', 'px', 'font_size_tags' );
        });
    });
    Zeen( 'font_size_breadcrumbs', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.breadcrumbs', 'font-size', 'px', 'font_size_breadcrumbs' );
        });
    });

    Zeen( 'font_size_classic_blocks_read_more', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.meta .excerpt .read-more-wrap', 'font-size', 'px', 'font_size_classic_blocks_read_more' );
        });
    });

    Zeen( 'font_size_inline_post', function( value ) {
        value.bind( function( newval ) {
            $( '.inline-post .block article .title' ).css( 'font-size', newval + 'px' );
        });
    });

    Zeen( 'font_size_byline', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.byline', 'font-size', 'px', 'font_size_byline' );
        });
    });

 	Zeen( 'font_size_post_inner', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.hero-meta.tipi-m-typo .title', 'font-size', 'px', 'font_size_post_inner' );
        });
    });
 	Zeen( 'font_size_hero_subtitle_s', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.hero-meta.tipi-s-typo .subtitle', 'font-size', 'px', 'font_size_hero_subtitle_s' );
        });
    });
 	Zeen( 'font_size_hero_title_m', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.hero-meta.tipi-m-typo .title .subtitle', 'font-size', 'px', 'font_size_hero_title_m' );
        });
    });
	Zeen( 'font_size_hero_subtitle_m', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.hero-meta.tipi-m-typo .subtitle', 'font-size', 'px', 'font_size_hero_subtitle_m' );
        });
    });

	Zeen( 'font_size_hero_title_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.hero-meta.tipi-xl-typo .title', 'font-size', 'px', 'font_size_hero_title_l' );
        });
    });
	Zeen( 'font_size_hero_subtitle_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.hero-meta.tipi-xl-typo .subtitle', 'font-size', 'px', 'font_size_hero_subtitle_l' );
        });
    });

    Zeen( 'font_size_classic_blocks_title', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.tipi-s-typo .title, .ppl-s-3 .tipi-s-typo .title, .zeen-col--wide .ppl-s-3 .tipi-s-typo .title, .preview-1 .title, .preview-21:not(.tipi-xs-typo) .title', 'font-size', 'px', 'font_size_classic_blocks_title' )
        });
    });

    Zeen( 'font_size_classic_blocks_title_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.block-wrap-classic .tipi-m-typo .title-wrap .title', 'font-size', 'px', 'font_size_classic_blocks_title_l' );
        });
    });

    Zeen( 'font_size_classic_blocks_title_xl', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.block-col-self .preview-2 .title', 'font-size', 'px', 'font_size_classic_blocks_title_xl' );
        });
    });
    Zeen( 'font_size_woo_classic_price_s', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.tipi-xs-typo .price, .tipi-basket-wrap .basket-item .price', 'font-size', 'px', 'font_size_woo_classic_price_s' );
        });
    });

	Zeen( 'font_size_woo_classic_price_m', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.tipi-s-typo .price, .ppl-s-3 .tipi-s-typo .price, .zeen-col--wide .ppl-s-3 .tipi-s-typo .price, .preview-1 .price, .preview-21:not(.tipi-xs-typo) .price', 'font-size', 'px', 'font_size_woo_classic_price_m' );
        });
    });
	Zeen( 'font_size_woo_classic_price_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.block-wrap-classic .tipi-m-typo .title-wrap .price', 'font-size', 'px', 'font_size_woo_classic_price_l' );
        });
    });

    Zeen( 'font_size_thumbnail_blocks_title', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.tipi-xs-typo .title, .tipi-basket-wrap .basket-item .title', 'font-size', 'px', 'font_size_thumbnail_blocks_title' );
        });
    });



    Zeen( 'font_size_h1', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.single-content .entry-content h1', 'font-size', 'px', 'font_size_h1' );
        });
    });
    Zeen( 'font_size_h2', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.single-content .entry-content h2', 'font-size', 'px', 'font_size_h2' );
        });
    });
    Zeen( 'font_size_h3', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.single-content .entry-content h3', 'font-size', 'px', 'font_size_h3' );
        });
    });
    Zeen( 'font_size_h4', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.single-content .entry-content h4', 'font-size', 'px', 'font_size_h4' );
        });
    });
    Zeen( 'font_size_h5', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.single-content .entry-content h5', 'font-size', 'px', 'font_size_h5' );
        });
    });

    Zeen( 'font_size_mm_sub_menu', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.sub-menu a:not(.tipi-button)', 'font-size', 'px', 'font_size_mm_sub_menu' );
        });
    });

    Zeen( 'top_bar_message_content_font_size', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '#top-bar-message', 'font-size', 'px', 'top_bar_message_content_font_size' );
        });
    });

    Zeen( 'top_bar_message_content_spacing', function( value ) {
        value.bind( function( newval ) {
            $( '#top-bar-message' ).css({'padding-top': newval + 'px', 'padding-bottom': newval + 'px' } );
        });
    });

    Zeen( 'sliding_global_font_color', function( value ) {
        value.bind( function( newval ) {
            $( '.subscribe-wrap, .subscribe-wrap .content div' ).css( 'color', newval);
        });
    });

    Zeen( 'sliding_global_bg', function( value ) {
        value.bind( function( newval ) {
            $( '.subscribe-wrap' ).css( 'background-image', 'url( ' + newval + ' )' );
        });
    });

    Zeen( 'classic_bottom_border_padding', function( value ) {
        value.bind( function( newval ) {
            $( '.separation-border-style' ).css( 'padding-bottom', newval);
        });
    });

    Zeen( 'sidebar_widgets_title_centered', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
            	$( 'body' ).addClass( 'widget-title-c' );
        	} else {
        		$( 'body' ).removeClass( 'widget-title-c' );
        	}
        });
    });

    Zeen( 'modal_skin', function( value ) {
        value.bind( function( newval ) {
        	if ( parseInt( newval ) === 2 ) {
            	$( 'body' ).addClass( 'modal-skin-2' );
            	$( '#modal' ).addClass( 'dark-overlay' );
        	} else {
        		$( '#modal' ).removeClass( 'dark-overlay' );
        		$( 'body' ).removeClass( 'modal-skin-2' );
        	}
        });
    });

    Zeen( 'mobile_header_on_tablet', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
            	$( 'body' ).addClass( 'mob-menu-on-tab' );
        	} else {
        		$( 'body' ).removeClass( 'mob-menu-on-tab' );
        	}
        });
    });

    Zeen( 'sidebar_widgets_skin', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap .sidebar' ).removeClass( 'widgets-skin-1 widgets-skin-2 widgets-skin-3 widgets-skin-4 widgets-skin-11' ).addClass( 'widgets-skin-' + newval );
            if ( parseInt( newval ) === 11 ) {
            	$( '.sidebar-wrap .sidebar' ).addClass( 'widgets-skin-1' );
            }
            if ( parseInt( newval ) === 4 ) {
            	$( '.content-area .zeen-widget' ).css('margin-bottom', 0);
            } else {
            	$( '.content-area .zeen-widget' ).css('margin-bottom',  Zeen( 'sidebar_widgets_spacing' ).get() + 'px' );
            }
        });
    });

    Zeen( 'sidebar_widgets_title_skin', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap .sidebar' ).removeClass( 'widgets-title-skin-1 widgets-title-skin-2 widgets-title-skin-3 widgets-title-skin-4 widgets-title-skin-11' ).addClass( 'widgets-title-skin-' + newval );
        });
    });

    Zeen( 'sidebar_widgets_spacing', function( value ) {
        value.bind( function( newval ) {
            $( '.content-area .zeen-widget:not(:last-child)' ).css('margin-bottom', newval + 'px');
        });
    });



    Zeen( 'sticky_sidebar', function( value ) {
        value.bind( function( newval ) {
        	var stickies = $( '.sidebar-wrap' );
            if ( newval === true ) {
				stickies.each( function() {
					$(this).stick_in_parent({ offset_top: 30});
				});
            } else {
            	stickies.trigger("sticky_kit:detach");
            }
        });
    });


    Zeen( 'classic_split_design', function( value ) {
        value.bind( function( newval ) {
            $( '.split-1' ).removeClass( 'split-design-1 split-design-2' ).addClass( 'split-design-' + newval);
        });
    });

    Zeen( 'classis_split_img_width', function( value ) {
        value.bind( function( newval ) {
			var flexNewVal = {
				desktop: 'calc(' + newval.desktop + '% - 15px)',
				tablet: 'calc(' + newval.tablet + '% - 15px)',
				mobile: 'calc(' + newval.mobile + '% - 15px)',
			};
			zeenResponsiveStyle( flexNewVal, '.split-1:not(.preview-thumbnail) .mask', 'flex', '', 'classis_split_img_width' );
        });
    });

    Zeen( 'thumbnail_img_width', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.preview-thumbnail .mask', 'flex', 'px', 'thumbnail_img_width' );
        });
    });

    Zeen( 'classic_stack_design', function( value ) {
    	var oldval = parseInt( Zeen( 'classic_stack_design' ).get() );
        value.bind( function( newval ) {
            $( '.stack-1' ).removeClass( 'stack-design-1 stack-design-2' ).addClass( 'stack-design-' + newval);

	        if ( ( oldval < 3 && parseInt( newval ) > 2 ) || ( parseInt( newval ) < 3 && oldval > 2 ) ) {
        		Zeen.selectiveRefresh.requestFullRefresh();
        		oldval = parseInt( newval );
        	}
        });
    });

    Zeen( 'classic_img_ani_onoff', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
        		$( '.preview-classic' ).addClass( 'img-ani-1' );
        	} else {
            	$( '.preview-classic' ).removeClass( 'img-ani-1 img-ani-0' );
        	}
        });
    });

    Zeen( 'classic_bottom_border_onoff', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
        		$( '.separation-border-style' ).css( 'padding-bottom', Zeen( 'classic_bottom_border_padding' ).get());
        	} else {
            	$( '.separation-border-style' ).css( 'padding-bottom', '0px' );
        	}
        });
    });



    Zeen( 'masonry_design', function( value ) {
        value.bind( function( newval ) {
        	if ( parseInt( newval ) === 1 ) {
            	$( '.block-masonry-style .meta-overlay-0 article .preview-mini-wrap .meta' ).css( 'background',' inherit' );
            	 $( '.block-masonry-style .meta-overlay-0 article' ).find( '.meta' ).add($( '.block-masonry-style .meta-overlay-0 article' ).find( 'a, .excerpt, .byline' )).css( 'color', '#111' );
            	$( '.block-masonry-style .meta-overlay-0 article' ).find( '.meta' ).css({'padding-top': '0px','padding-bottom': '0px','padding-left': '0px','padding-right': '0px' });
            } else {
            	$( '.block-masonry-style .meta-overlay-0 article .preview-mini-wrap .meta' ).css( 'background', Zeen( 'masonry_background_color' ).get() );
            	$( '.block-masonry-style .meta-overlay-0 article' ).find( '.meta' ).css({ 'padding-bottom': Zeen( 'masonry_whitespace' ).get(),'padding-left': Zeen( 'masonry_whitespace' ).get(),'padding-right': Zeen( 'masonry_whitespace' ).get(), } );
            }
        });
    });

    Zeen( 'masonry_border_color', function( value ) {
        value.bind( function( newval ) {
            $( '.separation-border-v' ).css( 'background', newval);
        });
    });

    Zeen( 'global_border_width', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).css( 'border-width', newval + 'px' );
			$( 'body' ).css( 'border-color', Zeen( 'global_border_color' ).get() );
			$( 'body' ).css( 'border-style', Zeen( 'global_border_style' ).get() );
        });
    });

    Zeen( 'global_border_color', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).css( 'border-color', newval );
            $( 'body' ).css( 'border-style', Zeen( 'global_border_style' ).get() );
            $( 'body' ).css( 'border-width', Zeen( 'global_border_width' ).get() + 'px' );
        });
    });

    Zeen( 'global_border_style', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).css( 'border-style', newval );
            $( 'body' ).css( 'border-color', Zeen( 'global_border_color' ).get() );
            $( 'body' ).css( 'border-width', Zeen( 'global_border_width' ).get() + 'px' );
        });
    });



    Zeen( 'masonry_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.block-masonry-style .meta-overlay-0 article .preview-mini-wrap .meta' ).css( 'background', newval);
        });
    });

    Zeen( 'masonry_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.block-masonry-style .meta-overlay-0 article' ).find( '.meta' ).add($( '.block-masonry-style .meta-overlay-0 article' ).find( 'a, .excerpt, .byline' )).css( 'color', newval);
        });
    });

    Zeen( 'masonry_whitespace', function( value ) {
        value.bind( function( newval ) {
            $( '.block-masonry-style .meta-overlay-0 article' ).find( '.meta' ).css({ 'padding-bottom': newval,'padding-left': newval,'padding-right': newval } );

        });
    });

    Zeen( 'slider_args_autoplay', function( value ) {
        value.bind( function( newval ) {
           $( '.slider' ).each( function(){
        		var s = $( this ).data( 's' );
        		if ( s !== 51 ) {
        			if ( newval === true ) {
        				$( this ).flickity( 'playPlayer' );
        			} else {
        				$( this ).flickity( 'stopPlayer' );
        			}
        		}
        	});
        });
    });

    function zeen_borders( $name, $direction, target ) {

		Zeen( $name + '_border_style', function( value ) {
		    value.bind( function( newval ) {
		        $(target).css( 'border-' + $direction + 'style', newval ).css( 'border-' + $direction + 'color', Zeen( $name + '_border_color' ).get() ).css( 'border-' + $direction + 'width', Zeen( $name + '_border_width' ).get() + 'px' );
		    });
		});
		Zeen( $name + '_border_color', function( value ) {
		    value.bind( function( newval ) {
		        $(target).css( 'border-' + $direction + 'color', newval ).css( 'border-' + $direction + 'style', Zeen( $name + '_border_style' ).get() ).css( 'border-' + $direction + 'width', Zeen( $name + '_border_width' ).get() + 'px' );
		    });
		});

		Zeen( $name + '_border_width', function( value ) {
		    value.bind( function( newval ) {
		        $(target).css( 'border-' + $direction + 'width', newval + 'px' ).css( 'border-' + $direction + 'style', Zeen( $name + '_border_style' ).get() ).css( 'border-' + $direction + 'color', Zeen( $name + '_border_color' ).get() );
		    });
		});


       Zeen( $name + '_border_onoff', function( value ) {
            value.bind( function( newval ) {
            	if ( newval === true ) {
		        	$(target).css( 'border-' + $direction + 'width', Zeen( $name + '_border_width' ).get() + 'px' ).css( 'border-' + $direction + 'style', Zeen( $name + '_border_style' ).get() ).css( 'border-' + $direction + 'color', Zeen( $name + '_border_color' ).get() );
		        } else {
		            $(target).css( 'border-' + $direction + 'width', '0px' );
		        }
	        });
        });
    }
    zeen_borders( 'classic_bottom', 'bottom-', '.separation-border-style' );
    zeen_borders( 'classic_title_bottom', 'bottom-', '.block-title-wrap-style .block-title-area' );
    zeen_borders( 'classic_title_top', 'top-', '.block-title-wrap-style .block-title-area' );
    zeen_borders( 'main_menu_bottom', 'bottom-',  '.main-navigation .main-navigation-border' );
    zeen_borders( 'main_menu_top', 'top-',  '.main-navigation .main-navigation-border' );
    zeen_borders( 'secondary_menu_bottom', 'bottom-',  '.secondary-wrap .menu-bg-area' );
    zeen_borders( 'secondary_menu_top', 'top-',  '.secondary-wrap .menu-bg-area' );
    zeen_borders( 'sidebar', '', '.sidebar-wrap .sidebar:not(.sidebar-own-border)' );
    zeen_borders( 'footer_widgets', 'right-', '#colophon .footer-widget-wrap' );
    zeen_borders( 'footer_widgets', 'bottom-', '#colophon .footer-widget-wrap .zeen-widget' );
    zeen_borders( 'footer_top', 'top-', '#colophon .bg-area-inner' );

    function zeen_skins( args ) {

    	var $name = args.name,
    	selector = args.selector,
    	bg_selector = args.bg_selector,
    	bg_area = args.bg_area,
    	classes = args.classes;

		Zeen( $name + '_skin', function( value ) {
			var oldval = parseInt( Zeen( $name + '_skin' ).get() );
			value.bind( function( newval ) {
				if ( ( oldval < 3 && parseInt( newval ) > 2 ) || ( parseInt( newval ) < 3 && oldval > 2 ) ) {
            		Zeen.selectiveRefresh.requestFullRefresh();
            		oldval = parseInt( newval );
            	}

				var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		         if ( typeof( classes ) === 'undefined' ) {
		            classes = 'site-skin-';
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }

				$selector.removeClass( classes + '1 ' + classes + '2 ' + classes + '3 ' + classes + '4' ).addClass(  classes + newval );
				$bg_selector.css( 'background-image', 'none' );
				$bg_area.css( 'background-image', 'none' );
				var fontTweaks = $bg_area;
				if ( $name !== 'header' || parseInt( Zeen( 'header_style' ).get() ) > 80 ) {
					fontTweaks = $bg_area.find( 'a, h2, h3, h4, .font-1, .font-2' ).add($bg_area);
				}

				if ( newval == 1 ) {
				    fontTweaks.css( 'color', '#111' );
				    $bg_area.find( '.menu-icon-basket i' ).css( 'color', '' );
				    $bg_area.css( 'background-color', '' );
				}
				if ( newval == 2 ) {
				    $bg_area.css( 'background-color', '' );
				    fontTweaks.css( 'color', '#ffffff' );
				    $bg_area.find( '.menu-icon-basket i' ).css( 'color', '' );
				}
				if ( newval == 3 ) {
					fontTweaks.css( 'color', Zeen( $name + '_color' ).get());
					if ( Zeen( $name + '_skin_img' ).get() === '' ) {
						if ( Zeen( $name + '_skin_color_b' ).get() !== '' ) {
				 			$bg_area.css( 'background-image', 'linear-gradient(130deg, ' + Zeen( $name + '_skin_color_b' ).get()  + ' 0%, ' + Zeen( $name + '_skin_color' ).get() + ' 80%)' );
				    	} else {
				    		$bg_area.css( 'background-color', Zeen( $name + '_skin_color' ).get());
				    	}
					} else {
				    	$bg_selector.css( { 'background-image': 'url( ' + Zeen( $name + '_skin_img' ).get() + ' )', 'color': '' } );
				    }
				}
				if ( newval == 4 ) {

				    $bg_area.css( 'background-color', 'transparent' );
				    fontTweaks.css( 'color', Zeen( $name + '_color' ).get());
				}
				$bg_area.find( 'video, iframe, img' ).addClass( 'hidden' );

				if ( newval == 5 ) {
					$bg_area.find( 'video, img' ).removeClass( 'hidden' );
				}
				if ( newval == 6 ) {
					$bg_area.find( 'iframe, img' ).removeClass( 'hidden' );
				}
			});
		});

		Zeen( $name + '_skin_color', function( value ) {
			value.bind( function( newval ) {
				var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }
				if ( Zeen( $name + '_skin_color_b' ).get() === '' ) {
			    	$bg_area.css( 'background-image', 'none' );
			    	$bg_area.css( 'background-color', newval );
				} else {
					$bg_area.css( 'background-image', 'linear-gradient(130deg, ' + newval + ' 0%, ' + Zeen( $name + '_skin_color_b' ).get() + ' 80%)' );
				}
			});
		});

		Zeen( $name + '_color', function( value ) {
			value.bind( function( newval ) {

				var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }

				var fontTweaks = $bg_area;
				if ( $name !== 'header' || parseInt( Zeen( 'header_style' ).get() ) > 80 ) {
					fontTweaks = $bg_area.find( 'a, h2, h3, h4, .font-1, .font-2' ).add($bg_area);
				}
				fontTweaks.css( 'color', Zeen( $name + '_color' ).get());
			});
		});

     Zeen( $name + '_skin_color_b', function( value ) {
            value.bind( function( newval ) {
            	var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }
            	if ( newval === '' ) {
            		$bg_area.css( 'background-image', 'none' );
            		$bg_area.css( 'background-color', Zeen( $name + '_skin_color' ).get() );
            	} else {
            		$bg_area.css( 'background-image', 'linear-gradient(130deg, ' + Zeen( $name + '_skin_color' ).get() + ' 0%, ' + newval + ' 80%)' );
            	}
            });
        });

      	Zeen( $name + '_skin_img', function( value ) {
            value.bind( function( newval ) {
            	var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }
                $bg_selector.css( 'background-image', 'url( ' + newval + ' )' );
            });
        });

      	Zeen( $name + '_skin_img_repeat', function( value ) {
            value.bind( function( newval ) {
            	var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }
                $selector.removeClass( 'site-img-1 site-img-2 site-img-3 site-img-4' ).addClass( 'site-img-' + newval );
            });
        });

      	Zeen( $name + '_skin_img_transparency', function( value ) {
            value.bind( function( newval ) {
            	var $selector = $( selector ), $bg_selector, $bg_area;
		        if ( typeof( bg_selector ) === 'undefined' ) {
		            $bg_selector = $selector.find( '.background' );
		        } else {
		        	$bg_selector = $ ( bg_selector );
		        }

		        if ( typeof( bg_area ) === 'undefined' ) {
		            $bg_area = $selector.find( '.bg-area' );
		            if ( $bg_area.length === 0 ) {
		            	$bg_area = $bg_selector;
		            }
		        } else {
		        	$bg_area = $( bg_area );
		        }
                $bg_selector.css( 'opacity', newval );
            });
        });

    }

    zeen_skins( { name: 'mobile_menu', selector: '.mob-menu-wrap' });
    zeen_skins( { name: 'footer', selector: '#colophon .footer-area', bg_selector: '#colophon .bg-area-inner > .background', bg_area: '#colophon .footer-area' });
    zeen_skins( { name: 'footer_widgets', selector: '#colophon .footer-widget-bg-area', bg_selector: '#colophon .footer-widget-bg-area .background', bg_area: '#colophon .footer-widget-bg-area', classes: 'footer-widgets-skin-'  });
    zeen_skins( { name: 'lwa', selector: '#modal .content-lwa' });
    zeen_skins( { name: 'single_subscribe_end', selector: '.content-subscribe-block' });
    zeen_skins( { name: 'header', selector: '#masthead', classes: 'header-skin-' });
    zeen_skins( { name: 'header', selector: '#site-header-side', bg_selector: '.site-header-side', classes: 'header-skin-' });
    zeen_skins( { name: 'subscribe', selector: '#modal .content-subscribe' });
    zeen_skins( { name: 'sidebar', selector: '.sidebar-wrap .sidebar:not(.sidebar-own-bg)', bg_selector: '.sidebar-wrap .sidebar:not(.sidebar-own-bg) .background', bg_area: '.sidebar-wrap .sidebar:not(.sidebar-own-bg)', classes: 'sb-skin-' });
    zeen_skins( { name: 'slide', selector: '#slide-in-menu' });
    zeen_skins( { name: 'mobile_header', selector: '#mobhead' });

	Zeen( 'mobile_menu_color', function( value ) {
		value.bind( function( newval ) {
			$( '.mob-menu-wrap' ).find( 'a' ).css( 'color', newval );
		});
	});

	Zeen( 'footer_color', function( value ) {
		value.bind( function( newval ) {
			$( '#colophon' ).find( '.footer-area' ).add( $( '#colophon' ).find( '.footer-area a' ) ) .css( 'color', newval );
			$( '#colophon' ).find( '.to-top .tipi-arrow' ).css( 'border-color', newval );
			$( '#colophon' ).find( '.to-top-2 i:after' ).css( 'background', newval );
		});
	});

	Zeen( 'footer_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$( '#colophon' ).find( '.footer-widget-wrap' ).add(  $( '#colophon' ).find( '.footer-widget-wrap a' ) ).css( 'color', newval );
		});
	});

	Zeen( 'subscribe_color', function( value ) {
		value.bind( function( newval ) {
			$( '#modal' ).find( '.content-subscribe' ).add( $( '#modal' ).find( '.content-subscribe' ).find( 'a, h2, h3, h4, .font-1, .font-s, .subtitle, p, .small-print, input[type="email"]' ) ).css( 'color', newval );
			$( '#modal' ).find( '.content-subscribe input[type="email"]' ).css( 'border-bottom-color', newval );
		});
	});

	Zeen( 'subscribe_button_color', function( value ) {
	    value.bind( function( newval ) {
	    	if ( Zeen( 'subscribe_button_color_b' ).get() === '' ) {
	    		$( '.mc4wp-form-fields button[type="submit"], .subscribe-wrap input[type="submit"], #subscribe-submit input[type="submit"], #modal .content-subscribe .button-arrow, input[type="submit"]' ).css( 'background-image', 'none' );
	        	$( '.mc4wp-form-fields button[type="submit"], .subscribe-wrap input[type="submit"], #subscribe-submit input[type="submit"], #modal .content-subscribe .button-arrow, input[type="submit"]' ).css( 'background-color', newval );
	    	} else {
	 			$( '.mc4wp-form-fields button[type="submit"], .subscribe-wrap input[type="submit"], #subscribe-submit input[type="submit"], #modal .content-subscribe .button-arrow, input[type="submit"]' ).css( 'background-image', 'linear-gradient(130deg, ' + newval + ' 0%, ' + Zeen( 'subscribe_button_color_b' ).get() + ' 80%)' );
	    	}
	    });
	});

	Zeen( 'subscribe_button_color_b', function( value ) {
	    value.bind( function( newval ) {
	    	if ( Zeen( 'subscribe_button_color' ).get() === '' ) {
	    		$( '.mc4wp-form-fields button[type="submit"], .subscribe-wrap input[type="submit"], #subscribe-submit input[type="submit"], #modal .content-subscribe .button-arrow, input[type="submit"]' ).css( 'background-image', 'none' );
	        	$( '.mc4wp-form-fields button[type="submit"], .subscribe-wrap input[type="submit"], #subscribe-submit input[type="submit"], #modal .content-subscribe .button-arrow, input[type="submit"]' ).css( 'background-color', newval );
	    	} else {
	 			$( '.mc4wp-form-fields button[type="submit"], .subscribe-wrap input[type="submit"], #subscribe-submit input[type="submit"], #modal .content-subscribe .button-arrow, input[type="submit"]' ).css( 'background-image', 'linear-gradient(130deg, ' + Zeen( 'subscribe_button_color' ).get() + ' 0%, ' + newval + ' 80%)' );
	    	}
	    });
	});


	Zeen( 'subscribe_button_font_color', function( value ) {
		value.bind( function( newval ) {
			$( '#modal' ).find( '.content-subscribe input[type="submit"], .content-subscribe button[type="submit"]' ).css( 'color', newval );
		});
	});

	Zeen( 'secondary_menu_padding_sides', function( value ) {
        value.bind( function( newval ) {
            $( '.menu-secondary li a, .secondary-icons li a, .secondary-wrap li a' ).css({ 'padding-left': newval,'padding-right': newval } );
        });
    });

    Zeen( 'main_menu_padding_sides', function( value ) {
        value.bind( function( newval ) {
            $( '.main-navigation .horizontal-menu>li>a' ).css({ 'padding-left': newval,'padding-right': newval } );
        });
    });

	Zeen( 'secondary_menu_color', function( value ) {
		value.bind( function( newval ) {
			$( '.secondary-wrap' ).add( $( '.secondary-wrap' ).find( 'a' ) ).css( 'color', newval );
		});
	});

	Zeen( 'logo_subtitle_footer_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-footer .logo-subtitle' ).css( 'color', newval );
		});
	});

	Zeen( 'to_top_fixed_background', function( value ) {
		value.bind( function( newval ) {
			$( '.to-top__fixed .to-top a' ).css( 'background-color', newval );
	    });
	});
	Zeen( 'to_top_fixed_color', function( value ) {
		value.bind( function( newval ) {
			$( '.to-top__fixed .to-top a' ).css( 'color', newval );
	    });
	});

	Zeen( 'logo_subtitle_slide_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-slide .logo-subtitle' ).css( 'color', newval );
		});
	});

    function zeen_tt( entry, target ) {
    	Zeen( entry, function( value ) {
	        value.bind( function( newval ) {
	             if ( newval == 1 ) {
	                target.css( 'text-transform', 'uppercase' );
	            } else {
	                target.css( 'text-transform', 'none' );
	            }
	        });
	    });
    }
    function zeen_bold( entry, target ) {
    	Zeen( entry, function( value ) {
	        value.bind( function( newval ) {
	             if ( newval == 1 ) {
	                target.css( 'font-weight', '700' );
	            } else {
	                target.css( 'font-weight', '400' );
	            }
	        });
	    });
    }
    function zeen_italic( entry, target ) {
    	Zeen( entry, function( value ) {
	        value.bind( function( newval ) {
	             if ( newval == 1 ) {
	                target.css( 'font-style', 'italic' );
	            } else {
	                target.css( 'font-style', 'normal' );
	            }
	        });
	    });
    }

    zeen_italic( 'italic_subtitle', $( '.subtitle' ) );
    zeen_italic( 'italic_blockquotes', $( 'blockquote' ) );

    zeen_bold( 'bold_main_menu', $( '.main-navigation .horizontal-menu, .main-navigation .menu-item, .main-navigation .menu-icon .menu-icon--text,  .main-navigation .tipi-i-search span' ) );
    zeen_bold( 'bold_buttons', $( '.tipi-button.block-loader, .wpcf7-submit' ) );
    zeen_bold( 'bold_secondary_menu', $( '.secondary-wrap .menu-secondary li, .secondary-wrap .menu-item, .secondary-wrap .menu-icon .menu-icon--text' ) );
    zeen_bold( 'bold_footer_menu', $( '.footer-lower-area, .footer-lower-area .menu-item, .footer-lower-area .menu-icon span' ) );
    zeen_bold( 'bold_widget_title', $( '.widget-title' ) );
    zeen_bold( 'bold_xs_typo', $( '.tipi-xs-typo .title' ) );
    zeen_bold( 'bold_read_more', $( '.meta .excerpt .read-more-wrap' ) );


    zeen_tt( 'tt_buttons', $( 'input[type=submit], button, .tipi-button,.button,.onsale,.wpcf7-submit,.button__back__home' ) );
    zeen_tt( 'tt_main_menu', $( '.main-navigation .menu-item, .main-navigation .menu-icon .menu-icon--text' ) );
    zeen_tt( 'tt_logo_text', $( '.logo-fallback' ) );
    zeen_tt( 'tt_secondary_menu', $( '.secondary-navigation, .secondary-wrap .menu-icon .menu-icon--text' ) );
    zeen_tt( 'tt_footer_menu', $( '.footer-lower-area .menu-item, .footer-lower-area .menu-icon span' ) );
    zeen_tt( 'tt_submenu', $( '.sub-menu a:not(.tipi-button)' ) );
    zeen_tt( 'tt_block_main_title', $( '.block-title' ) );
    zeen_tt( 'tt_block_main_subtitle', $( '.block-subtitle' ) );
    zeen_tt( 'tt_widget_title', $( '.widget-title' ) );
    zeen_tt( 'tt_byline', $( '.byline' ) );
    zeen_tt( 'tt_read_more', $( '.meta .excerpt .read-more' ) );
    zeen_tt( 'tt_grid_read_more', $( '.preview-grid .read-more' ) );
    zeen_tt( 'tt_heading', $( '.single-content .entry-content h1, .single-content .entry-content h2, .single-content .entry-content h3, .single-content .entry-content h4, .single-content .entry-content h5, .single-content .entry-content h6' ) );
    zeen_tt( 'tt_classic_post_title', $( '.block-wrap-classic .title-wrap .title' ) );
    zeen_tt( 'tt_grid_post_title', $( '.block-wrap-grid .title-wrap .title' ) );
    zeen_tt( 'tt_slider_post_title', $( '.block-wrap-slider .title-wrap .title' ) );
    zeen_tt( 'tt_inner_post_title', $( '.entry-title' ) );

		Zeen( 'logo_subtitle_main_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-main .logo-subtitle' ).css( 'color', newval );
		});
	});

	Zeen( 'footer_widgets_centered', function( value ) {
        value.bind( function( newval ) {
             if ( newval == 1 ) {
                $( '#colophon' ).addClass( 'widget-title-center' );
            } else {
                $( '#colophon' ).removeClass( 'widget-title-center' );
            }
        });
    });

	Zeen( 'logo_main_menu_visible', function( value ) {
		value.bind( function( newval ) {
			if ( newval == 2 ) {
            	$( '.main-navigation' ).removeClass( 'logo-only-when-stuck' ).addClass( 'logo-always-vis' );
            } else {
            	$( '.main-navigation' ).removeClass( 'logo-always-vis' ).addClass( 'logo-only-when-stuck' );
            }
		});
	});

	Zeen( 'logo_main_menu_position', function( value ) {
		value.bind( function( newval ) {
			if ( newval == 2 ) {
            	$( 'body' ).removeClass( 'main-menu-logo-1' ).addClass( 'main-menu-logo-2' );
            } else {
            	$( 'body' ).removeClass( 'main-menu-logo-2' ).addClass( 'main-menu-logo-1' );
            }
		});
	});


	Zeen( 'lwa_color', function( value ) {
		value.bind( function( newval ) {
			$( '#modal' ).add( $( '#modal' ).find( 'a' )).css( 'color', newval );
		});
	});

	Zeen( 'main_menu_color', function( value ) {
		value.bind( function( newval ) {
			$( '.main-navigation' ).find( 'a' ).css( 'color', newval );
		});
	});

	Zeen( 'header_width', function( value ) {
		value.bind( function( newval ) {
			var nav = $( '#masthead' ),
				navInner = nav.find( '.header-padding' );
				nav.removeClass( 'header-width-1 header-width-2 header-width-3' ).addClass( 'header-width-' + newval );
				newval = parseInt( newval );
			if ( newval === 3 ) {
				nav.addClass( 'tipi-row' );
				navInner.removeClass( 'tipi-row' );
			} else if ( newval === 2 ) {
				navInner.removeClass( 'tipi-row' );
				nav.removeClass( 'tipi-row' );
			} else if ( newval === 1 ) {
				navInner.addClass( 'tipi-row' );
				$('.logo-main-wrap-center').removeClass('tipi-row');
				nav.removeClass( 'tipi-row' );
			}
		});
	});

	Zeen( 'main_menu_width', function( value ) {
		value.bind( function( newval ) {
			var nav = $( '.main-navigation' ),
				navInner = nav.find( '.nav-grid' );
				nav.removeClass( 'main-menu-width-1 main-menu-width-2 main-menu-width-3' ).addClass( 'main-menu-width-' + newval );
				newval = parseInt( newval );
			if ( newval === 3 ) {
				nav.addClass( 'tipi-row' );
				navInner.removeClass( 'tipi-row' );
			} else if ( newval === 2 ) {
				navInner.removeClass( 'tipi-row' );
				nav.removeClass( 'tipi-row' );
			} else if ( newval === 1 ) {
				navInner.addClass( 'tipi-row' );
				nav.removeClass( 'tipi-row' );
			}
		});
	});

	Zeen( 'secondary_menu_width', function( value ) {
		value.bind( function( newval ) {
			var nav = $( '.secondary-wrap' ),
				navInner = nav.find( '.menu-content-wrap' );
				nav.removeClass( 'secondary-menu-width-1 secondary-menu-width-2 secondary-menu-width-3' ).addClass( 'secondary-menu-width-' + newval );
				newval = parseInt( newval );
			if ( newval === 3 ) {
				nav.addClass( 'tipi-row' );
				navInner.removeClass( 'tipi-row' );
			} else if ( newval === 2 ) {
				navInner.removeClass( 'tipi-row' );
				nav.removeClass( 'tipi-row' );
			} else if ( newval === 1 ) {
				navInner.addClass( 'tipi-row' );
				nav.removeClass( 'tipi-row' );
			}
		});
	});



	Zeen( 'header_color', function( value ) {
		value.bind( function( newval ) {
			if ( parseInt( Zeen( 'header_style' ).get() ) > 80 ) {
				$( '#masthead' ).find( 'a' ).add($( '#masthead' )).css( 'color', newval );
			}
		});
	});

	Zeen( 'sidebar_color', function( value ) {
		value.bind( function( newval ) {
			$( '.sidebar-wrap .sidebar' ).add( $( '.sidebar-wrap .sidebar' ).find( 'a, h3, h3, h4, h5' ) ).css( 'color', newval );
		});
	});

	Zeen( 'slide_color', function( value ) {
		value.bind( function( newval ) {
			$( '#slide-in-menu' ).add( $( '#slide-in-menu a, #slide-in-menu .widget-title' ) ).css( 'color', newval );
			$( '#slide-in-menu' ).find( '.mc4wp-form-fields input[type="email"], #subscribe-submit input[type="email"], .subscribe-wrap input[type="email"]' ).css( 'border-bottom-color', newval );
		});
	});

	Zeen( 'mobile_header_color', function( value ) {
		value.bind( function( newval ) {
			$( '#mobhead' ).find( 'a' ).css( 'color', newval );
			$( '#mobhead' ).find( '.tipi-i-menu-mob' ).css( 'background', newval );
		});
	});

	Zeen( 'logo_subtitle_footer_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-footer .logo-subtitle' ).css( 'color', newval );
		});
	});

    function zeen_half_skins( $name, selector, bg_selector ) {
    	var $bg_selector;
        if ( typeof( bg_selector ) === 'undefined' ) {
            $bg_selector = selector;
        } else {
        	$bg_selector = $( bg_selector );
        }

        var $name_hy = $name.replace(/_/g, '-' );
      	Zeen( $name + '_skin', function( value ) {
            value.bind( function( newval ) {
            	newval = parseInt(newval);
                $(selector).removeClass( $name_hy + '-skin-1 ' + $name_hy + '-skin-2 ' + $name_hy + '-skin-3 ' + $name_hy + '-skin-4' ).addClass(  $name_hy + '-skin-' + newval );

                if ( newval === 3 ) {
                	if ( Zeen( $name + '_skin_color_b' ).get() === '' ) {
                		$bg_selector.css( 'background-color', Zeen( $name + '_skin_color' ).get() );
	            	} else {
	         			$bg_selector.css( 'background-image', 'linear-gradient(130deg, ' + Zeen( $name + '_skin_color' ).get() + ' 0%, ' + Zeen( $name + '_skin_color_b' ).get() + ' 80%)' );
	         			$bg_selector.css( 'background-color', '' );
	            	}
                } else {
                	$bg_selector.css( 'background-image', 'none' );
                }
                if ( newval === 1 ) {
                    $bg_selector.css( 'background-color', '#fff' );
                }
                if ( newval === 2 ) {
                    $bg_selector.css( 'background-color', '#141516' );
                }
                if ( newval === 4 ) {
                    $bg_selector.css( 'background-color', 'transparent' );
                }

            });
        });

     Zeen( $name + '_skin_color', function( value ) {
            value.bind( function( newval ) {
            	if ( Zeen( $name + '_skin_color_b' ).get() === '' ) {
            		 $bg_selector.css( 'background-image', 'none' );
                	 $bg_selector.css( 'background-color', newval );
            	} else {
         			 $bg_selector.css( 'background-image', 'linear-gradient(130deg, ' + newval + ' 0%, ' + Zeen( $name + '_skin_color_b' ).get() + ' 80%)' );
            	}
            });
        });

     Zeen( $name + '_skin_color_b', function( value ) {
            value.bind( function( newval ) {
            	if ( newval === '' ) {
            		 $bg_selector.css( 'background-image', 'none' );
            		 $bg_selector.css( 'background-color', Zeen( $name + '_skin_color' ).get() );
            	} else {
            		 $bg_selector.css( 'background-image', 'linear-gradient(130deg, ' + Zeen( $name + '_skin_color' ).get() + ' 0%, ' + newval + ' 80%)' );
            	}

            });
        });
    }

    zeen_half_skins( 'main_menu', '.main-navigation', '.main-navigation .menu-bg-area' );
    zeen_half_skins( 'secondary_menu', '.secondary-wrap', '.secondary-wrap .menu-bg-area' );

    Zeen( 'secondary_menu_font_size', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.secondary-wrap-v .standard-drop>a,.secondary-wrap, .secondary-wrap a, .secondary-wrap .menu-icon--text', 'font-size', 'px', 'secondary_menu_font_size' );
			zeenResponsiveStyle( Zeen( 'font_size_logo_text' ).get(), '.logo-fallback, .secondary-wrap .logo-fallback a', 'font-size', 'px', 'font_size_logo_text' );
        });
    });

    Zeen( 'mobile_header_menu_font_size', function( value ) {
        value.bind( function( newval ) {
            $( '.site-mob-header .menu-icon' ).css( 'font-size', newval + 'px' );
        });
    });

    Zeen( 'font_size_footer_social_icons', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.site-footer .menu-icons', 'font-size', 'px', 'font_size_footer_social_icons' );
        });
    });

    Zeen( 'font_size_main_menu_social_icons', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.main-navigation .menu-icon, .main-navigation .trending-icon-solo', 'font-size', 'px', 'font_size_main_menu_social_icons' );
        });
    });

    Zeen( 'font_size_secondary_menu_social_icons', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.secondary-wrap .menu-icon, .secondary-wrap .menu-icon a, .secondary-wrap .trending-icon-solo', 'font-size', 'px', 'font_size_secondary_menu_social_icons' );
        });
    });

    Zeen( 'font_size_copyright', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.site-footer .copyright', 'font-size', 'px', 'font_size_copyright' );
        });
    });

    Zeen( 'font_size_logo_text', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.logo-fallback, .secondary-wrap .logo-fallback a', 'font-size', 'px', 'font_size_logo_text' );
        });
    });

    Zeen( 'font_size_buttons', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, 'input[type=submit], button, .tipi-button,.button,.onsale,.wpcf7-submit,.button__back__home', 'font-size', 'px', 'font_size_buttons' );
        });
    });

    Zeen( 'footer_menu_font_size', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-navigation', 'font-size', 'px', 'footer_menu_font_size' );
        });
    });

    Zeen( 'main_menu_font_size', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.main-navigation, .main-navigation .menu-icon--text', 'font-size', 'px', 'main_menu_font_size' );
        });
    });

    Zeen( 'sidebar_padding_top', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar' ).css({ 'padding-top': newval + 'px' });
        });
    });

    Zeen( 'sidebar_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar' ).css({ 'padding-bottom': newval + 'px' });
        });
    });

    Zeen( 'sidebar_padding_left', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar' ).css({ 'padding-left': newval + 'px' });
        });
    });

    Zeen( 'sidebar_padding_right', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar' ).css({ 'padding-right': newval + 'px' });
        });
    });

  	Zeen( 'sidebar_widgets_border_style', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-widget' ).css( 'border-style', newval );
            $( '.sidebar-widget:last-of-type' ).css( 'border-style', 'none' );
        });
    });
  	Zeen( 'sidebar_widgets_border_color', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-widget' ).css( 'border-color', newval );
        });
    });

    Zeen( 'current_date_color', function( value ) {
        value.bind( function( newval ) {
            $( '.current-date' ).css( 'color', newval );
        });
    });



    Zeen( 'sidebar_widgets_border_bottom', function( value ) {
        value.bind( function( newval ) {
            var borderwidth = Zeen( 'sidebar_widgets_border_width' ).get()  + 'px';
        	if ( newval === true ) {
        		borderwidth = '0 0 ' + borderwidth + 'px 0';
        	}

            $( '.sidebar-widget' ).css( 'border-width', borderwidth );
        });
    });

    Zeen( 'sidebar_widgets_border_width', function( value ) {
        value.bind( function( newval ) {
        	var borderwidth = newval + 'px';
        	if ( Zeen( 'sidebar_widgets_border_bottom' ).get() === true ) {
        		borderwidth = '0 0 ' + newval + 'px 0';
        	}
            $( '.sidebar-widget' ).css( 'border-width', borderwidth );
        });
    });

     Zeen( 'sidebar_widgets_border_onoff', function( value ) {
            value.bind( function( newval ) {
            	$( '.sidebar-widget' ).css( 'border-style', Zeen( 'sidebar_widgets_border_style' ).get() );
            	 $( '.sidebar-widget:last-of-type' ).css( 'border-style', 'none' );
	            $( '.sidebar-widget' ).css( 'border-color', Zeen( 'sidebar_widgets_border_color' ).get() );
            	if ( newval === true ) {
		        	$( '.sidebar-widget' ).css( 'border-width', Zeen( 'sidebar_widgets_border_width' ).get() + 'px' );
		        } else {
		            $( '.sidebar-widget' ).css( 'border-width', '0px' );
		        }
	        });
        });

    Zeen( 'sidebar_widgets_padding_top', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar-widget' ).css( 'padding-top', newval + 'px' );
        });
    });

    Zeen( 'sidebar_widgets_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar-widget' ).css( 'padding-bottom', newval + 'px' );
        });
    });

    Zeen( 'sidebar_widgets_padding_lr', function( value ) {
        value.bind( function( newval ) {
            $( '.sidebar-wrap' ).find( '.sidebar-widget' ).css({ 'padding-left': newval + 'px', 'padding-right': newval + 'px' });
        });
    });

    Zeen( 'header_padding_top', function( value ) {
        value.bind( function( newval ) {
            $( '#masthead' ).find( '.header-padding' ).css( 'padding-top', newval + 'px'  );
        });
    });

    function zeen_sticky() {
		var sticky_pad_top = Zeen( 'sticky_header_padding_top' ).get();
		var sticky_pad_bot = Zeen( 'sticky_header_padding_bottom' ).get();
		var sticky_logo_height = Zeen( 'sticky_header_logo_height' ).get();
		var sticky_bg = Zeen( 'sticky_header_bg' ).get();
		var output = '';
		output += '@media only screen and (min-width: 768px) {';
		output += '.sticky-header--active .site-header .bg-area, .site-header.sticky-menu-2.stuck .bg-area, .site-header.slidedown .bg-area, .main-navigation.stuck .menu-bg-area { background:' + sticky_bg + ';}';
		output += '.sticky-header--active .logo img, .site-header.slidedown .logo img, .site-header.sticky-menu-2.stuck .logo img { height: ' + sticky_logo_height  + 'px!important; }';
		output += '.site-header.sticky-menu-2.stuck .header-padding, .site-header.slidedown .header-padding, .sticky-header--active .site-header .header-padding, , .main-navigation.stuck .horizontal-menu > li > a { padding-top:' + sticky_pad_top + 'px; padding-bottom:' + sticky_pad_bot + 'px; }';
		output += '}';
		return output;
    }

    Zeen( 'sticky_header_logo_height', function( value ) {
        value.bind( function( newval ) {
			var output = zeen_sticky();
	    	stickyStyle.innerHTML = output;
        });
    });

    Zeen( 'sticky_header_bg', function( value ) {
        value.bind( function( newval ) {
			var output = zeen_sticky();
	    	stickyStyle.innerHTML = output;
        });
    });

    Zeen( 'sticky_header_padding_top', function( value ) {
        value.bind( function( newval ) {
			var output = zeen_sticky();
	    	stickyStyle.innerHTML = output;
        });
    });

    Zeen( 'sticky_header_padding_bottom', function( value ) {
        value.bind( function( newval ) {
			var output = zeen_sticky();
	    	stickyStyle.innerHTML = output;
        });
    });

    Zeen( 'header_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            $( '#masthead' ).find( '.header-padding' ).css( 'padding-bottom', newval + 'px' );
        });
    });

    Zeen( 'mobile_header_padding_top', function( value ) {
        value.bind( function( newval ) {
            $( '.site-mob-header:not(.site-mob-header-11) .header-padding .logo-main-wrap, .site-mob-header:not(.site-mob-header-11) .header-padding .icons-wrap a, .site-mob-header-11 .header-padding' ).css( 'padding-top', newval + 'px'  );
            if ( $( '#mobhead' ).parent().hasClass( 'spacer' ) ) {
            	$( '#mobhead' ).parent().css( 'min-height', '' );
            }
        });
    });

    Zeen( 'mobile_header_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            $( '.site-mob-header:not(.site-mob-header-11) .header-padding .logo-main-wrap, .site-mob-header:not(.site-mob-header-11) .header-padding .icons-wrap a, .site-mob-header-11 .header-padding' ).css( 'padding-bottom', newval + 'px' );
            if ( $( '#mobhead' ).parent().hasClass( 'spacer' ) ) {
            	$( '#mobhead' ).parent().css( 'min-height', '' );
            }
        });
    });

	Zeen( 'footer_upper_padding_bottom', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-upper-area', 'padding-bottom', 'px', 'footer_upper_padding_bottom' );
        });
    });

    Zeen( 'footer_lower_padding_bottom', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-lower-area', 'padding-bottom', 'px', 'footer_lower_padding_bottom' );
        });
    });

    Zeen( 'footer_upper_padding_top', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-upper-area', 'padding-top', 'px', 'footer_upper_padding_top' );
        });
    });

    Zeen( 'footer_lower_padding_top', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-lower-area', 'padding-top', 'px', 'footer_lower_padding_top' );
        });
    });

    Zeen( 'footer_widgets_padding_top', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-widget-wrap', 'padding-top', 'px', 'footer_widgets_padding_top' );
        });
    });

    Zeen( 'footer_widgets_padding_bottom', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.footer-widget-wrap', 'padding-bottom', 'px', 'footer_widgets_padding_bottom' );
        });
    });
    Zeen( 'font_size_woo_title_s', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--s .entry-title', 'font-size', 'px', 'font_size_woo_title_s' );
        });
    });
	Zeen( 'font_size_woo_title_m', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--m .entry-title, .qv-wrap .entry-summary .title', 'font-size', 'px', 'font_size_woo_title_m' );
        });
    });

	Zeen( 'font_size_woo_title_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--l .entry-title', 'font-size', 'px', 'font_size_woo_title_l' );
        });
    });
	 Zeen( 'font_size_woo_price_s', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--s .price', 'font-size', 'px', 'font_size_woo_price_s' );
        });
    });
	Zeen( 'font_size_woo_price_m', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--m .price, .qv-wrap .entry-summary .price', 'font-size', 'px', 'font_size_woo_price_m' );
        });
    });
	Zeen( 'font_size_woo_excerpt_m', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--m .woocommerce-product-details__short-description', 'font-size', 'px', 'font_size_woo_excerpt_m' );
        });
    });

	Zeen( 'font_size_woo_price_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--l .price', 'font-size', 'px', 'font_size_woo_price_l' );
        });
    });
	Zeen( 'font_size_woo_excerpt_l', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.product-title--l .woocommerce-product-details__short-description', 'font-size', 'px', 'font_size_woo_excerpt_l' );
        });
    });

    Zeen( 'main_menu_padding_top', function( value ) {
        value.bind( function( newval ) {
            $( '#menu-main-menu' ).find( '.horizontal-menu .drop' ).add( '.main-navigation .horizontal-menu > li > a' ).css( 'padding-top', newval + 'px'  );
        });
    });

    Zeen( 'main_menu_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            $( '#menu-main-menu' ).find( '.horizontal-menu .drop' ).add( '.main-navigation .horizontal-menu > li > a' ).css( 'padding-bottom', newval + 'px'  );
        });
    });

    Zeen( 'secondary_menu_padding_top', function( value ) {
        value.bind( function( newval ) {
            $( '.site' ).css( 'padding-left', '' );
            $( '.secondary-wrap' ).find( '.menu-padding, .ul-padding > li > a ' ).css( 'padding-top', newval + 'px'  );
        });
    });

    Zeen( 'secondary_menu_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            $( '.site' ).css( 'padding-left', '' );
            $( '.secondary-wrap' ).find( '.menu-padding, .ul-padding > li > a ' ).css( 'padding-bottom', newval + 'px' );
        });
    });

    Zeen( 'floating_side_menu', function( value ) {
        value.bind( function( newval ) {
            var direction = $( 'body' ).hasClass( 'body-header-style-82' ) ? 'right' : 'left';
            $( '.secondary-wrap-v' ).css( 'width', newval + 'px' );
            $( ' .header-width-2 .header-side-padding, .standard-archive' ).css( {'padding-right': newval + 'px', 'padding-left': newval + 'px'} );

            var header_style = parseInt( Zeen( 'header_style' ).get() );
            if ( header_style > 80 ) {
            	$( '.site' ).css( 'padding-' + direction , newval + 'px' );
            } else {
            	$( '.site' ).css( { 'padding-left': '', 'padding-right': '' });
            }
        });
    });
    Zeen( 'header_side_width', function( value ) {
    var oldwidth = Zeen( 'header_side_width' ).get();
        value.bind( function( newval ) {
            var direction = $( 'body' ).hasClass( 'body-header-style-82' ) ? 'right' : 'left';
            if ( newval > 130 && oldwidth < 130 ){
            	oldwidth = 140;
            	Zeen.selectiveRefresh.requestFullRefresh();
            }

            if ( newval < 130 && oldwidth > 130 ){
            	oldwidth = 1;
            	Zeen.selectiveRefresh.requestFullRefresh();
            }
        	$( '.site' ).css( 'padding-' + direction , newval + 'px' );
            $( '.secondary-wrap-v' ).css( 'width', newval + 'px' );
        });
    });



    Zeen( 'skin', function( value ) {
        value.bind( function( newval ) {
            $( '.content-bg, .article-layout-skin-1.title-cut-bl .hero-wrap .meta, .article-layout-skin-1.title-cut-bc .hero-wrap .meta, .standard-archive .page-header').css('background-color', newval );
            $( '.splitter .shape--fill' ).css( 'fill', newval );
        });
    });


    Zeen( 'global_background_color', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === '' || typeof newval === 'undefined' || newval === '#ffffff' || newval === '#fff' ) {
        		$( 'body' ).removeClass( 'has-bg' );
        		$( '.site-inner' ).css( 'background-color', '#fff' );
        	} else {
        		$( 'body' ).addClass( 'has-bg' );
            	$( '.site-inner' ).css( 'background-color', newval );
        	}
        });
    });

    Zeen( 'global_background_img', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === '' || typeof newval === 'undefined' ) {
        		$( 'body' ).removeClass( 'has-bg' );
        	} else {
        		$( 'body' ).addClass( 'has-bg' );
            	$( '.site-inner' ).css( 'background-image', 'url( ' + newval + ' )' );
        	}
        });
    });

    Zeen( 'bg_ad_img', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === '' || typeof newval === 'undefined' ) {
        		$( '.site-inner' ).css( 'background-image', '' );
        	} else {
            	$( '.site-inner' ).css( 'background-image', 'url( ' + newval + ' )' );
        	}
        });
    });

    Zeen( 'bg_ad', function( value ) {
        value.bind( function( newval ) {
        	if ( newval == 1 ) {
        		$( 'body' ).addClass( 'has-bg-da' );
        		$( '.site-inner' ).css({ 'padding-top': Zeen( 'bg_ad_spacing' ).get() + 'px' });
        	} else {
        		$( 'body' ).removeClass( 'has-bg-da' );
        		$( '.site-inner' ).css({ 'padding-top': '0px' });
        	}
        });
    });

    Zeen( 'bg_ad_spacing', function( value ) {
         value.bind( function( newval ) {
            $( '.site-inner' ).css({ 'padding-top': newval + 'px' });
        });
    });




    Zeen( 'global_background_img_repeat', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).removeClass( 'bg-img-1 bg-img-2 bg-img-3 bg-img-4' ).addClass( 'bg-img-' + newval );
        });
    });

	Zeen( 'color_byline', function( value ) {
        value.bind( function( newval ) {
            $( '.preview-classic .byline, .preview-classic .byline a, .preview-thumbnail .byline, .preview-thumbnail .byline a' ).css( 'color', newval );
        });
    });

    Zeen( 'color_block_post_title', function( value ) {
        value.bind( function( newval ) {
            $( '.preview-classic .meta .title, .preview-thumbnail .meta .title' ).css( 'color', newval );
        });
    });

    Zeen( 'color_heading', function( value ) {
        value.bind( function( newval ) {
            $( 'article > .hero-meta .entry-title, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .sb-skin-1 .cb-title, .sb-skin-1 .meta .title' ).css( 'color', newval );
        });
    });

    Zeen( 'color_body', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).css( 'color', newval );
        });
    });

    Zeen( 'color_excerpt', function( value ) {
        value.bind( function( newval ) {
            $( '.excerpt' ).css( 'color', newval );
        });
    });

    Zeen( 'color_read_more', function( value ) {
        value.bind( function( newval ) {
            $( '.read-more-wrap' ).css( 'color', newval );
        });
    });

    Zeen( 'color_logo_text', function( value ) {
         value.bind( function( newval ) {
        	logoText.innerHTML = '.logo-fallback a { color: ' + newval + '!important; }';
        });
    });

    Zeen( 'color_logo_mobile_text', function( value ) {
         value.bind( function( newval ) {
        	logoTextMob.innerHTML = '.site-mob-header .logo-fallback a { color: ' + newval + '!important; }';
        });
    });

    Zeen( 'color_blockquote', function( value ) {
        value.bind( function( newval ) {
            $( 'blockquote:not(.comment-excerpt)' ).css( 'color', newval );
        });
    });

    Zeen( 'color_widget_title', function( value ) {
        value.bind( function( newval ) {
        	widgetTitles.innerHTML = '.sidebar-widget .widget-title { color: ' + newval + '!important; }';
        });
    });

    Zeen( 'grid_font_size_override', function( value ) {
        value.bind( function( newval ) {
			if ( newval != 1 ) {
				$('#letter_spacing_grid').remove();
				$('#font_size_grid_xl_title').remove();
				$('#font_size_grid_l_title').remove();
				$('#font_size_grid_m_title').remove();
				$('#font_size_grid_s_title').remove();
				$('#font_size_grid_s_subtitle').remove();
				$('#font_size_grid_l_subtitle').remove();
				$('#font_size_grid_read_more').remove();
           } else {
				zeenResponsiveStyle( Zeen( 'font_size_grid_read_more' ).get(), '.preview-grid .read-more-wrap', 'font-size', 'px', 'font_size_grid_read_more' );
				zeenResponsiveStyle( Zeen( 'letter_spacing_grid' ).get(), '.block-wrap-grid .title', 'letter-spacing', 'em', 'letter_spacing_grid' );
				zeenResponsiveStyle( Zeen( 'font_size_grid_l_title' ).get(), '.block-wrap-grid .tipi-l-typo .title', 'font-size', 'px', 'font_size_grid_l_title' );
				zeenResponsiveStyle( Zeen( 'font_size_grid_xl_title' ).get(), '.block-wrap-grid .tipi-xl-typo .title', 'font-size', 'px', 'font_size_grid_xl_title' );
				zeenResponsiveStyle( Zeen( 'font_size_grid_m_title' ).get(), '.block-wrap-grid .tipi-m-typo .title-wrap .title, .block-94 .block-piece-2 .tipi-xs-12 .title-wrap .title, .zeen-col--wide .block-wrap-grid:not(.block-wrap-81):not(.block-wrap-82) .tipi-m-typo .title-wrap .title, .zeen-col--wide .block-wrap-grid .tipi-l-typo .title, .zeen-col--wide .block-wrap-grid .tipi-xl-typo .title', 'font-size', 'px', 'font_size_grid_m_title' );
				zeenResponsiveStyle( Zeen( 'font_size_grid_s_title' ).get(), '.block-wrap-grid .tipi-s-typo .title-wrap .title, .block-92 .block-piece-2 article .title-wrap .title, .block-94 .block-piece-2 .tipi-xs-6 .title-wrap .title', 'font-size', 'px', 'font_size_grid_s_title' );
				zeenResponsiveStyle( Zeen( 'font_size_grid_s_subtitle' ).get(), '.block-wrap-grid .tipi-s-typo .title-wrap .subtitle, .block-92 .block-piece-2 article .title-wrap .subtitle, .block-94 .block-piece-2 .tipi-xs-6 .title-wrap .subtitle', 'font-size', 'px', 'font_size_grid_s_subtitle' );
				zeenResponsiveStyle( Zeen( 'font_size_grid_l_subtitle' ).get(), '.block-wrap-grid .tipi-m-typo .title-wrap .subtitle, .block-wrap-grid .tipi-l-typo .title-wrap .subtitle, .block-wrap-grid .tipi-xl-typo .title-wrap .subtitle, .block-94 .block-piece-2 .tipi-xs-12 .title-wrap .subtitle, .zeen-col--wide .block-wrap-grid:not(.block-wrap-81):not(.block-wrap-82) .tipi-m-typo .title-wrap .subtitle', 'font-size', 'px', 'font_size_grid_l_subtitle' );
		   }
        });
    });

	Zeen( 'font_size_grid_read_more', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.preview-grid .read-more-wrap', 'font-size', 'px', 'font_size_grid_read_more' );
        });
    });

    Zeen( 'letter_spacing_grid', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.block-wrap-grid .title', 'letter-spacing', 'em', 'letter_spacing_grid' );
        });
    });

    Zeen( 'font_size_grid_xl_title', function( value ) {
        value.bind( function( newval ) {
            zeenResponsiveStyle( newval, '.block-wrap-grid .tipi-xl-typo .title', 'font-size', 'px', 'font_size_grid_xl_title' );
        });
    });
    Zeen( 'font_size_grid_l_title', function( value ) {
        value.bind( function( newval ) {
             zeenResponsiveStyle( newval, '.block-wrap-grid .tipi-l-typo .title', 'font-size', 'px', 'font_size_grid_l_title' );
        });
    });
     Zeen( 'font_size_grid_m_title', function( value ) {
        value.bind( function( newval ) {
             zeenResponsiveStyle( newval, '.block-wrap-grid .tipi-m-typo .title-wrap .title, .block-94 .block-piece-2 .tipi-xs-12 .title-wrap .title, .zeen-col--wide .block-wrap-grid:not(.block-wrap-81):not(.block-wrap-82) .tipi-m-typo .title-wrap .title, .zeen-col--wide .block-wrap-grid .tipi-l-typo .title, .zeen-col--wide .block-wrap-grid .tipi-xl-typo .title', 'font-size', 'px', 'font_size_grid_m_title' );
        });
    });
	Zeen( 'font_size_grid_s_title', function( value ) {
        value.bind( function( newval ) {
             zeenResponsiveStyle( newval, '.block-wrap-grid .tipi-s-typo .title-wrap .title, .block-92 .block-piece-2 article .title-wrap .title, .block-94 .block-piece-2 .tipi-xs-6 .title-wrap .title', 'font-size', 'px', 'font_size_grid_s_title' );
        });
	});
	Zeen( 'font_size_grid_s_subtitle', function( value ) {
        value.bind( function( newval ) {
             zeenResponsiveStyle( newval, '.block-wrap-grid .tipi-s-typo .title-wrap .subtitle, .block-92 .block-piece-2 article .title-wrap .subtitle, .block-94 .block-piece-2 .tipi-xs-6 .title-wrap .subtitle', 'font-size', 'px', 'font_size_grid_s_subtitle' );
        });
	});
	Zeen( 'font_size_grid_l_subtitle', function( value ) {
        value.bind( function( newval ) {
             zeenResponsiveStyle( newval, '.block-wrap-grid .tipi-m-typo .title-wrap .subtitle, .block-wrap-grid .tipi-l-typo .title-wrap .subtitle, .block-wrap-grid .tipi-xl-typo .title-wrap .subtitle, .block-94 .block-piece-2 .tipi-xs-12 .title-wrap .subtitle, .zeen-col--wide .block-wrap-grid:not(.block-wrap-81):not(.block-wrap-82) .tipi-m-typo .title-wrap .subtitle', 'font-size', 'px', 'font_size_grid_l_subtitle' );
        });
    });


    Zeen( 'color_copyright', function( value ) {
        value.bind( function( newval ) {
            $( '.copyright, .site-footer .bg-area-inner .copyright a' ).css( 'color', newval );
        });
    });
    Zeen( 'color_link', function( value ) {
        value.bind( function( newval ) {
            $( '.link-color-wrap a' ).css( 'color', newval );
        });
    });


    Zeen( 'color_link_hover', function( value ) {
    	value.bind( function( newval ) {
	        $( '.link-color-wrap a' ).off( 'mouseleave', { newval: newval }, zeen_color_out);
	        $( '.link-color-wrap a' ).off( 'mouseenter', { newval: newval }, zeen_color_in);
	        $( '.link-color-wrap a' ).on( 'mouseenter', { newval: newval }, zeen_color_in );
	        $( '.link-color-wrap a' ).on( 'mouseleave', { newval: newval }, zeen_color_out );
    	});
    });

	function zeen_color_in( e ) {
		$( this ).css( 'color', e.data.newval );
	}


	Zeen( 'font_size_body', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, 'body', 'font-size', 'px', 'font_size_body' );
        });
    });
    Zeen( 'excerpt_font_size', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.excerpt', 'font-size', 'px', 'excerpt_font_size' );
        });
    });

    Zeen( 'font_line_height', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, 'body', 'line-height', '', 'font_line_height' );
        });
    });

    Zeen( 'footer_width', function( value ) {
        value.bind( function( newval ) {
        	if ( parseInt( newval ) === 2 ) {
        		$( '#colophon' ).find( '.bg-area-inner' ).addClass( 'tipi-row' );
				$( '.zeen-instagram-block' ).addClass( 'tipi-row' );
        		$( '#colophon' ).find( '.footer-widget-bg-area-inner' ).removeClass( 'tipi-row' );
        	} else {
        		$( '#colophon' ).find( '.bg-area-inner' ).removeClass( 'tipi-row' );
        		$( '#colophon' ).find( '.footer-widget-bg-area-inner' ).addClass( 'tipi-row' );
        		$( '.zeen-instagram-block' ).removeClass( 'tipi-row' );

        	}
        });
    });

    Zeen( 'typo_body', function( value ) {
        value.bind( function( newval ) {
             $( 'body' ).removeClass( 'body-f1 body-f2 body-f3' ).addClass( 'body-f' + newval );
        });
    });

    Zeen( 'typo_buttons', function( value ) {
        value.bind( function( newval ) {
        	$( 'input[type=submit], button, .tipi-button,.button,.onsale,.wpcf7-submit,.button__back__home' ).removeClass( 'font-1 font-2 font-3' ).addClass( 'font-' + newval );
        });
    });

    Zeen( 'typo_blockquotes', function( value ) {
        value.bind( function( newval ) {
             $( 'body' ).removeClass( 'quotes-f1 quotes-f2 quotes-f3' ).addClass( 'quotes-f' + newval );
        });
    });

    Zeen( 'typo_share_buttons', function( value ) {
        value.bind( function( newval ) {
             $( '.share-button .font-base' ).removeClass( 'font-1 font-2 font-3' ).addClass( 'font-' + newval );
        });
    });

    Zeen( 'typo_logo_text', function( value ) {
        value.bind( function( newval ) {
             $( '.logo-fallback' ).removeClass( 'font-1 font-2 font-3' ).addClass( 'font-' + newval );
        });
    });


    Zeen( 'typo_byline', function( value ) {
        value.bind( function( newval ) {
             $( 'body' ).removeClass( 'by-f1 by-f2 by-f3' ).addClass( 'by-f' + newval );
        });
    });

    Zeen( 'typo_subtitles', function( value ) {
        value.bind( function( newval ) {
             $( 'body' ).removeClass( 'sub-f1 sub-f2 sub-f3' ).addClass( 'sub-f' + newval );
             $( '.block-subtitle' ).removeClass( 'font-1 font-2 font-3' ).addClass( 'font-' + newval );

        });
    });

   	Zeen( 'typo_headings', function( value ) {
        value.bind( function( newval ) {
             $( 'body' ).removeClass( 'headings-f1 headings-f2 headings-f3' ).addClass( 'headings-f' + newval );
        });
    });

    Zeen( 'typo_widget_headers', function( value ) {
        value.bind( function( newval ) {
             $( 'body' ).removeClass( 'wh-f1 wh-f2 wh-f3' ).addClass( 'wh-f' + newval );
        });
    });

    Zeen( 'font_size_block_main_title', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.block-title, .page-title', 'font-size', 'px', 'font_size_block_main_title' );
        });
    });
    Zeen( 'font_size_block_main_subtitle', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.block-subtitle', 'font-size', 'px', 'font_size_block_main_subtitle' );
        });
    });

    Zeen( 'font_size_widget_title', function( value ) {
        value.bind( function( newval ) {
			zeenResponsiveStyle( newval, '.widget-title', 'font-size', 'px', 'font_size_widget_title' );
        });
    });
    Zeen( 'classic_title_top_border_onoff', function( value ) {
        value.bind( function( newval ) {
            if ( newval == 1 ) {
                $( 'body' ).addClass( 'block-title-bt' );
            } else {
                $( 'body' ).removeClass( 'block-title-bt' );
            }
        });
    });

    Zeen( 'classic_title_bottom_border_onoff', function( value ) {
        value.bind( function( newval ) {
            if ( newval == 1 ) {
                $( 'body' ).addClass( 'block-title-bb' );
            } else {
                $( 'body' ).removeClass( 'block-title-bb' );
            }
        });
    });

    Zeen( 'classic_block_title_design', function( value ) {
        value.bind( function( newval ) {
        	var blockTitles = $( '.block-title-1,.block-title-2' );
            if ( newval == 1 ) {
              blockTitles.addClass( 'block-title-1' ).removeClass( 'block-title-2' );
            } else {
              blockTitles.addClass( 'block-title-2' ).removeClass( 'block-title-1' );
            }
        });
    });

	Zeen( 'classic_title_line_style', function( value ) {
	    value.bind( function( newval ) {
	       var $inner = '.block-title:after,.block-title:before { border-top:' + Zeen( 'classic_title_line_width' ).get() + 'px ' + Zeen( 'classic_title_line_style' ).get() + ' ' + Zeen( 'classic_title_line_color' ).get()  + '!important; }';
	       if ( Zeen( 'classic_title_line_width' ).get() > 1 ) {
	       		$inner += '.block-title:after,.block-title:before { margin-top: -' + parseInt( Zeen( 'classic_title_line_width' ).get() / 2 + 1 ) + 'px!important; }';
	       }  else {
	        	$inner += '.block-title:after,.block-title:before { margin-top: 0!important; }';
	        }
	       blockTitles.innerHTML = $inner;

	    });
	});
	Zeen( 'classic_title_line_color', function( value ) {
	    value.bind( function( newval ) {
	       var $inner = '.block-title:after,.block-title:before { border-top:' + Zeen( 'classic_title_line_width' ).get() + 'px ' + Zeen( 'classic_title_line_style' ).get() + ' ' + Zeen( 'classic_title_line_color' ).get()  + '!important; }';
	       if ( Zeen( 'classic_title_line_width' ).get() > 1 ) {
	       		$inner += '.block-title:after,.block-title:before { margin-top: -' + parseInt( Zeen( 'classic_title_line_width' ).get() / 2 + 1 ) + 'px!important; }';
	       }  else {
	        	$inner += '.block-title:after,.block-title:before { margin-top: 0!important; }';
	        }
	       blockTitles.innerHTML = $inner;
	    });
	});

	Zeen( 'classic_title_line_width', function( value ) {
	    value.bind( function( newval ) {
	        var $inner = '.block-title:after,.block-title:before { border-top:' + Zeen( 'classic_title_line_width' ).get() + 'px ' + Zeen( 'classic_title_line_style' ).get() + ' ' + Zeen( 'classic_title_line_color' ).get()  + '!important; }';
	        if ( Zeen( 'classic_title_line_width' ).get() > 1 ) {
	        		$inner += '.block-title:after,.block-title:before { margin-top: -' + parseInt( Zeen( 'classic_title_line_width' ).get() / 2 + 1 ) + 'px!important; }';
	        } else {
	        	$inner += '.block-title:after,.block-title:before { margin-top: 0!important; }';
	        }
	        blockTitles.innerHTML = $inner;
	    });
	});

	Zeen( 'classic_title_line_onoff', function( value ) {
	    value.bind( function( newval ) {
	    	var $inner;
	    	if ( newval === true ) {
	        	$inner = '.block-title:after,.block-title:before { border-top:' + Zeen( 'classic_title_line_width' ).get() + 'px ' + Zeen( 'classic_title_line_style' ).get() + ' ' + Zeen( 'classic_title_line_color' ).get()  + '!important; }';
	        } else {
	            $inner = '.block-title:after,.block-title:before { border-top: 0!important; margin-top: 0!important; }';
	        }
	        blockTitles.innerHTML = $inner;
	    });
	});

    function overlayMeta( type ) {
    	var $current, $imageOverlay, $titleArea, styleTarget;
    	if ( type === 'slider' ) {
    		$current = $( '.preview-slider' );
    		$imageOverlay = $( '.preview-slider' ).find( '.mask-overlay' );
    		$titleArea = $( '.preview-slider' ).find( '.meta' );
    		styleTarget = '.slider-meta-bg .mask:before';
    	} else {
    		$current = $( '.preview-grid' );
    		$imageOverlay = $( '.preview-grid' ).find( '.mask-overlay' );
    		$titleArea = $( '.preview-grid' ).find( '.meta' );
    		styleTarget = '.grid-meta-bg .mask:before';
    	}
    	$current.off( 'mouseenter', zeen_opacity_in );
		$current.off( 'mouseleave', zeen_opacity_out );
    	var titleBg =  Zeen( type + '_title_bg' ).get();
    	var titleBgOnOff =  Zeen( type + '_title_bg_onoff' ).get();
    	if ( titleBgOnOff === true || parseInt(titleBgOnOff ) === 1  ) {
    		titleBgOnOff = true;
    	}

    	$titleArea.css( 'background-image', 'none' );
		$titleArea.css( 'background', 'transparent' );
		$titleArea.css( 'background-color', 'transparent' );
		metaStyles.innerHTML = styleTarget + '{ background-image: none!important; }';
    	if ( titleBgOnOff === true ) {
    		$current.removeClass( type + '-meta-bg meta-bg-1 meta-bg-2' ).addClass(type + '-meta-bg meta-bg-' + titleBg);
	   		var edge = Zeen( type + '_title_bg_edge' ).get();
    		if ( edge === true || parseInt(edge ) === 1  ) {
				$current.addClass( 'meta-edge-1' ).removeClass( 'meta-edge-0' );
			} else {
				$current.addClass( 'meta-edge-0' ).removeClass( 'meta-edge-1' );
			}

	    	switch( parseInt( titleBg ) ) {
	    		case 2:
		    		var $a = Zeen( type + '_title_gradient_a' ).get();
		    		var $b = Zeen( type + '_title_gradient_b' ).get();
		    		if ( $a === '' ) {
		    			$a = 'rgba(0,0,0,0)';
		    		}
		    		if ( $b === '' ) {
		    			$b =  'rgba(0,0,0,0)';
		    		}
		       		//$titleArea.css( 'background-image', 'linear-gradient(to top, ' + $a + ' 0%, ' + $b + ' 100%)' );

					metaStyles.innerHTML = styleTarget + '{ content: ""; background-image: linear-gradient(to top, ' + $a + ' 0%, ' + $b + ' 100%)!important; }';
	    		break;
	    		default:
	   				$titleArea.css( 'background', Zeen( type + '_title_solid' ).get() );
	    		break;
	    	}
	    }
    	var imageBg =  Zeen( type + '_img_overlay' ).get();
    	var imageBgOnOff =  Zeen( type + '_img_overlay_onoff' ).get();
    	if ( imageBgOnOff === true || parseInt( imageBgOnOff ) === 1 ) {
    		$current.removeClass( type + '-image-1 ' + type + '-image-2 ' + type + '-image-3' + type + '-image-4' ).addClass( type + '-image-' + imageBg );
	    	switch( parseInt( imageBg ) ) {
	    		case 2:
				    var $a, $b;
				    if ( type === 'grid' ) {
		    			for ( var $i = 1; $i < 7; $i++ ) {
				    		$a = Zeen(  type + '_gradient_' + $i + '_a' ).get();
				    		$b = Zeen(  type + '_gradient_' + $i + '_b' ).get();

				    		if ( $a === '' ) {
				    			$a = Zeen(  type + '_gradient_1_a' ).get();
				    		}

				    		if ( $b === '' ) {
				    			$b = Zeen(  type + '_gradient_1_b' ).get();
				    		}

					    	$( '.' + type + '-image-2.loop-' + ( $i - 1 ) ).find( '.mask-overlay' ).css( 'background-image', 'linear-gradient(130deg, ' + $a + ' 0%, ' + $b + ' 80%)' );
					    }
					} else {
						$a = Zeen(  type + '_gradient_1_a' ).get();
			    		$b = Zeen(  type + '_gradient_1_b' ).get();

				    	$( '.' + type + '-image-2' ).find( '.mask-overlay' ).css( { 'background-color': 'transparent', 'background-image': 'linear-gradient(130deg, ' + $a + ' 0%, ' + $b + ' 80%)' } );
					}

					$current.on( 'mouseenter', { newval: Zeen( type + '_img_overlay_opacity_hover' ).get() }, zeen_opacity_in );
					$current.on( 'mouseleave', { newval: Zeen( type + '_img_overlay_opacity' ).get() }, zeen_opacity_out );

	    		break;
	    		default:
    				$imageOverlay.css( 'background', Zeen( type + '_img_overlay_solid' ).get() );
	    		break;
	    	}
	    } else {
	    	$imageOverlay.css( 'background', 'transparent' );
	    	$imageOverlay.css( 'background-image', 'none' );
	    }
    }

    Zeen( 'grid_title_color', function( value ) {
        value.bind( function( newval ) {
       		$( '.preview-grid, .preview-grid a, .preview-grid .byline a, .preview-grid .byline, .preview-grid .excerpt, .preview-grid p' ).css( 'color', newval );
        });
    });

    Zeen( 'grid_tile_design', function( value ) {
        value.bind( function( newval ) {
        	if ( parseInt( newval ) === 2 ) {
        		Zeen.selectiveRefresh.requestFullRefresh();
        	}
        	$( '.preview-grid.tile-design' ).removeClass( 'tile-design-1 tile-design-2 tile-design-3 tile-design-4' ).addClass( 'tile-design-' + newval );
        });
    });

	Zeen( 'grid_title_color_hover', function( value ) {
		value.bind( function( newval ) {
			$( '.preview-grid, .preview-grid a, .preview-grid .byline a, .preview-grid .byline, .preview-grid .excerpt, .preview-grid p' ).off( 'mouseenter', zeen_title_hover_in );
	    	$( '.preview-grid, .preview-grid a, .preview-grid .byline a, .preview-grid .byline, .preview-grid .excerpt, .preview-grid p' ).off( 'mouseleave', zeen_title_hover_out );

	    	$( '.preview-grid, .preview-grid a, .preview-grid .byline a, .preview-grid .byline, .preview-grid .excerpt, .preview-grid p' ).on( 'mouseenter', { newval: newval }, zeen_title_hover_in );
	    	$( '.preview-grid, .preview-grid a, .preview-grid .byline a, .preview-grid .byline, .preview-grid .excerpt, .preview-grid p' ).on( 'mouseleave', { newval: Zeen( 'grid_title_color' ).get() }, zeen_title_hover_out );
	    });
    });

	function zeen_title_hover_in( e ) {
		$(this).add($(this).find( '.excerpt, a' )).css( 'color', e.data.newval );
	}

	function zeen_title_hover_out( e ) {
		$(this).add($(this).find( '.excerpt, a' )).css( 'color', e.data.newval );
	}


	Zeen( 'grid_title_solid', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

    Zeen( 'grid_title_bg_edge', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

    Zeen( 'grid_title_gradient_a', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

	Zeen( 'grid_title_gradient_b', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

	Zeen( 'grid_img_overlay_solid', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'grid' );
        });
    });

    Zeen( 'grid_img_overlay', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'grid' );
        });
    });


    Zeen( 'grid_img_overlay_opacity', function( value ) {
        value.bind( function( newval ) {
            $( '.preview-grid' ).find( '.mask-overlay' ).css( 'opacity', newval );
        });
    });

    Zeen( 'grid_img_overlay_opacity_hover', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-grid' ).off( 'mouseenter', zeen_opacity_in );
        	$( '.preview-grid' ).off( 'mouseleave', zeen_opacity_out );

        	$( '.preview-grid' ).on( 'mouseenter', { newval: newval }, zeen_opacity_in );
        	$( '.preview-grid' ).on( 'mouseleave', { newval: Zeen( 'grid_img_overlay_opacity' ).get() }, zeen_opacity_out );

        });
    });

	function zeen_opacity_in( e ) {
		$(this).find( '.mask-overlay' ).css( 'opacity', e.data.newval );
	}

	function zeen_opacity_out( e ) {
		$(this).find( '.mask-overlay' ).css( 'opacity', e.data.newval );
	}

    Zeen( 'grid_title_bg', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

    Zeen( 'grid_title_bg_onoff', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

    Zeen( 'grid_img_ani_onoff', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
        		$( '.preview-grid' ).addClass( 'img-ani-1' );
            	$( '#zeen-top-block .preview-grid' ).removeClass( 'img-ani-1 img-ani-0' );
        	} else {
            	$( '.preview-grid' ).removeClass( 'img-ani-1 img-ani-0' );
        	}
        });
    });

	Zeen( 'grid_spacing_tiles', function( value ) {
        value.bind( function( newval ) {
    		$( '.grid-spacing' ).css({ 'border-right-width': newval + 'px', 'border-top-width': newval + 'px' });
        	$( '.block-wrap-grid .block' ).css( 'width', 'calc( 100% + ' + newval + 'px )' );
        	$( '#zeen-top-block .block' ).css( 'width', '' );
        	if ( newval > 5 ) {
        		$( '.block-fs' ).css( 'padding', newval + 'px' );
        	} else {
        		$( '.block-fs' ).css( 'padding', '0px' );
        	}
        	$( '.contents-wrap .block-wrap:first-of-type .block-81:first-of-type article:first-of-type, .contents-wrap .block-wrap:first-of-type  .block-96:first-of-type	article:first-of-type' ).css( 'border-top-width', 0 );
        });
    });

	Zeen( 'grid_title_ani', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-grid' ).removeClass( 'meta-ani-0 meta-ani-1 meta-ani-2 meta-ani-11' ).addClass( 'meta-ani-' + newval );
        });
    });

    Zeen( 'grid_title_ani_onoff', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
        		$( '.preview-grid' ).addClass( 'meta-ani-' + Zeen( 'grid_title_ani' ).get() );
        	} else {
        		$( '.preview-grid' ).removeClass( 'meta-ani-0 meta-ani-1 meta-ani-2 meta-ani-11' ).addClass( 'meta-ani-0' );
        	}
        });
    });

	Zeen( 'grid_overlay_color', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'grid' );
        });
    });

    Zeen( 'grid_overlay_hover_color', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'grid' );
        });
    });
   Zeen( 'grid_img_overlay_onoff', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'grid' );
        });
    });


	Zeen( 'grid_overlay', function( value ) {
        value.bind( function( newval ) {
            $( '.preview-grid' ).removeClass( 'grid-overlay-1 grid-overlay-2 grid-overlay-3 grid-overlay-4' ).addClass( 'grid-overlay-' + newval );
        	overlayMeta( 'grid' );
        });
    });

	for ( var $i = 1; $i < 7; $i++ ) {
		Zeen( 'grid_gradient_' + $i + '_a', function( value ) {
	        value.bind( function( newval ) {
	        	overlayMeta( 'grid' );
	        });
	    });

	    Zeen( 'grid_gradient_' + $i + '_b', function( value ) {
	        value.bind( function( newval ) {
	        	overlayMeta( 'grid' );
	        });
	    });
	}

	Zeen( 'slider_spacing_tiles', function( value ) {
        value.bind( function( newval ) {
    		$( '.slider-spacing' ).css( 'margin-right', newval + 'px' );
    		$( '.slider' ).flickity( 'reposition' );
        });
    });

	Zeen( 'slider_title_color', function( value ) {
        value.bind( function( newval ) {
       		$( '.preview-slider, .preview-slider a, .preview-slider .excerpt, .preview-slider p' ).css( 'color', newval );
        });
    });


	Zeen( 'slider_title_color_hover', function( value ) {
		value.bind( function( newval ) {
			$( '.preview-slider' ).off( 'mouseenter', zeen_title_hover_in );
	    	$( '.preview-slider' ).off( 'mouseleave', zeen_title_hover_out );

	    	$( '.preview-slider' ).on( 'mouseenter', { newval: newval }, zeen_title_hover_in );
	    	$( '.preview-slider' ).on( 'mouseleave', { newval: Zeen( 'slider_title_color' ).get() }, zeen_title_hover_out );
	    });
    });


	Zeen( 'slider_title_solid', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_title_bg_edge', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_title_gradient_a', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

	Zeen( 'slider_title_gradient_b', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_img_overlay_onoff', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_img_overlay', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'slider' );
        });
    });

	Zeen( 'slider_img_overlay_solid', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'slider' );
        });
    });

	Zeen( 'slider_img_overlay_opacity', function( value ) {
        value.bind( function( newval ) {
            $( '.preview-slider' ).find( '.mask-overlay' ).css( 'opacity', newval );
        });
    });

    Zeen( 'slider_img_overlay_opacity_hover', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-slider' ).off( 'mouseenter', zeen_opacity_in );
        	$( '.preview-slider' ).off( 'mouseleave', zeen_opacity_out );

        	$( '.preview-slider' ).on( 'mouseenter', { newval: newval }, zeen_opacity_in );
        	$( '.preview-slider' ).on( 'mouseleave', { newval: Zeen( 'slider_img_overlay_opacity' ).get() }, zeen_opacity_out );
        });
    });

    Zeen( 'slider_title_bg', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_title_bg_onoff', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_img_ani_onoff', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
        		$( '.preview-slider' ).addClass( 'img-ani-1' );
        	} else {
            	$( '.preview-slider' ).removeClass( 'img-ani-1 img-ani-0' );
        	}
        });
    });

    Zeen( 'slider_title_ani_onoff', function( value ) {
        value.bind( function( newval ) {
        	if ( newval === true ) {
        		$( '.preview-slider' ).addClass( 'meta-ani-' + Zeen( 'slider_title_ani' ).get() );
        	} else {
        		$( '.preview-slider' ).removeClass( 'meta-ani-0 meta-ani-1 meta-ani-2 meta-ani-11' ).addClass( 'meta-ani-0' );
        	}
        });
    });
	Zeen( 'slider_title_ani', function( value ) {
        value.bind( function( newval ) {
        	$( '.preview-slider' ).removeClass( 'meta-ani-0 meta-ani-1 meta-ani-2 meta-ani-11' ).addClass( 'meta-ani-' + newval );
        });
    });


	Zeen( 'slider_overlay_color', function( value ) {
        value.bind( function( newval ) {
        	overlayMeta( 'slider' );
        });
    });

    Zeen( 'slider_overlay_hover_color', function( value ) {
        value.bind( function( newval ) {
            overlayMeta( 'slider' );
        });
    });

	Zeen( 'slider_overlay', function( value ) {
        value.bind( function( newval ) {
            $( '.preview-slider' ).removeClass( 'grid-overlay-1 grid-overlay-2 grid-overlay-3 grid-overlay-4' ).addClass( 'grid-overlay-' + newval );
        	overlayMeta( 'slider' );
        });
    });

	for ( var $i = 1; $i < 7; $i++ ) {
		Zeen( 'slider_gradient_' + $i + '_a', function( value ) {
	        value.bind( function( newval ) {
	        	overlayMeta( 'slider' );
	        });
	    });

	    Zeen( 'slider_gradient_' + $i + '_b', function( value ) {
	        value.bind( function( newval ) {
	        	overlayMeta( 'slider' );
	        });
	    });
	}
	function zeenResponsiveStyle( val, styleTarget, prop, unit, sheet ) {
		var  $sheet = $('#' + sheet );
		if ( $sheet.length === 0 ) {
			var styleSheet = document.createElement( 'style' );
			styleSheet.setAttribute( 'id', sheet );
			document.head.appendChild( styleSheet );
		}
		var output = '';
		if ( prop === 'flex' ) {
			output += typeof( val.mobile ) === 'undefined' ? '' : styleTarget + '{ ' + prop + ':' + '0 0 ' + val.mobile + unit + '; }';
			output += typeof( val.tablet ) === 'undefined' ? '' : '@media only screen and (min-width: 768px) {' + styleTarget + '{ ' + prop + ':' + '0 0 ' + val.tablet + unit + '; } }';
			output += typeof( val.desktop ) === 'undefined' ? '' : '@media only screen and (min-width: 1020px) {' + styleTarget + '{ ' + prop + ':' + '0 0 ' + val.desktop + unit + '; } )';
		} else {
			output += typeof( val.mobile ) === 'undefined' ? '' : styleTarget + '{ ' + prop + ':' + val.mobile + unit + '; }';
			output += typeof( val.tablet ) === 'undefined' ? '' : '@media only screen and (min-width: 768px) {' + styleTarget + '{ ' + prop + ':' + val.tablet + unit + '; } }';
			output += typeof( val.desktop ) === 'undefined' ? '' : '@media only screen and (min-width: 1020px) {' + styleTarget + '{ ' + prop + ':' + val.desktop + unit + '; } }';
		}
		$('#'+sheet)[0].innerHTML = output;
	}

} )( jQuery, wp.customize );