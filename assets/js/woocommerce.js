/**
 * Copyright: Codetipi
 * Theme: Zeen
 * Version: 4.0.9.6
 */
 /* global jQuery, zeenWooJS, IntersectionObserver, imagesLoaded, gsap, Power2, Cookies, Linear, Power0, ga, _gaq, zenscroll, FB, DISQUS */
 var zeenWoo = ( function($) { "use strict";
	var zeenWooPrv = {
		init: function() {
			this.dom();
			this.bind();
			this.qtyArrows();
			this.wooImages();
			this.wooFilterWidgets();
		},
		dom: function() {
			this.$body				= $( 'body' );
			this.$win 				= $( window );
			this.$doc 				= $( document );
			this.$page 				= $( '#page' );
			this.$rtl				= this.$body.hasClass( 'rtl' );
			this.$primary	 		= $( '#primary' );
			this.$entryContentWrap  = this.$primary.find( '.entry-content-wrap' );
			this.$modal				= $( '#modal' );
			this.$modalCustom		= this.$modal.find( '.content-custom' );
			this.$main 				= $( '#main' );
			this.$lightOverlay		= $( '#light-overlay' );
			this.$cartSlideOpen	 	= $( '.slide-cart-tr-open' );
			this.$slideInCart		= $( '#slide-in-cart' );
			this.$wooFilters		= $( '#woo-filters' );
			this.wooArchive         = '';
			this.$products         = '';
			this.wooActive          = this.$body.hasClass( 'woo--active' );
		},
		bind: function() {
			this.$winWidth			= this.$win.width();
			if ( this.$body.hasClass( 'term-woocategory' ) || this.$body.hasClass( 'post-type-archive-product' ) || this.$body.hasClass( 'woocommerce-page' ) ) {
				this.wooArchive = true;
				this.$products = this.$entryContentWrap.find( '.products:not(.related)' );
			}
			this.$cartSlideOpen.on( 'click', this.openCartSlide.bind( this ) );
			this.$body.on( 'click', '#qty-plus', this.qtyArrowChange );
			this.$body.on( 'click', '#qty-minus', this.qtyArrowChange );
			this.$doc.on( 'updated_wc_div', function() {
				zeenWooPrv.qtyArrows();
			} );

			$('#woo-filter-tr').on( 'click', this.wooFilterTr );

			this.$body.on('change', '.zeen__var__option > input', this.wooRadio );
			var variationsForm = $('.variations_form');
			variationsForm.each( function() {
				zeenWooPrv.wooVariations( $(this) );
			});
			zeenWooPrv.$doc.on( 'added_to_cart', function( e ) {
				zeenWooPrv.closeCartSlide( e );
				if ( zeenWooPrv.$modal.hasClass( 'active-qv' ) ) {
					$('.variations_form').each( function() {
						zeenWooPrv.wooVariationsOff( $(this) );
					});
				}
				setTimeout(function() {
					zeenWooPrv.openCartSlide();
				}, 500);
			} );
			this.$doc.on( 'zeenQVSuccess', this.wooQVSuccess );
			this.$doc.on( 'zeenModalOff', this.closeCartSlide );
			if ( zeenWooJS.args.wooAjaxSinglebutton === 1 ) {
				zeenWooPrv.$body.on( 'click', '.single_add_to_cart_button', { addToCartHandler: this }, this.single_add_to_cart_button );
			} else {
				zeenWooPrv.$body.on( 'click', '#modal .single_add_to_cart_button', { addToCartHandler: this }, this.single_add_to_cart_button );
			}

		},
		wooFilterWidgets: function() {
			if ( this.$wooFilters.length === 0 ) {
				return;
			}
			var widgetWrap = $('#woo-filters-widgets'),
				widgets = widgetWrap.find( '> .filters-widget');
				widgets.find('> .widget-title').on( 'click', this.filterWidgetShow );
		},
		filterWidgetShow: function( e ) {
			e.preventDefault();
			var _this = $(this),
				parent = _this.parent();
				parent.toggleClass('active');
		},
		openCartSlide: function( e ) {
			if ( this.$slideInCart.length === 0 || this.$body.hasClass( 'woocommerce-cart') || this.$body.hasClass( 'woocommerce-checkout') || this.$winWidth < 768 ) {
				return;
			}
			if ( typeof( e ) !== 'undefined' ) {
				e.preventDefault();
			}

			this.$body.addClass( 'slide-menu-open cart-slide-menu-open' );
			this.$lightOverlay.addClass( 'active' );
			this.$slideInCart.addClass( 'active' );
		},
		closeCartSlide: function( e ) {
			zeenWooPrv.$body.removeClass( 'slide-menu-open cart-slide-menu-open filter-slide-menu-open' );
			zeenWooPrv.$lightOverlay.removeClass( 'active' );
			if ( zeenWooPrv.$slideInCart.length > 0 ) {
				zeenWooPrv.$slideInCart.removeClass( 'active' );
			}
			if ( zeenWooPrv.$wooFilters.length > 0 ) {
				zeenWooPrv.$wooFilters.removeClass( 'active' );
			}
			if ( typeof( e ) !== 'undefined' ) {
				e.preventDefault();
			}
		},
		wooImages: function() {
			if ( zeenWooPrv.$products.length === 0 ) {
				return;
			}
			zeenWooPrv.$products.imagesLoaded().progress( function( instance, image ) {
				var _this = $( image.img );
				_this.closest('.product').addClass( 'article-window' );
			});
		},
		wooQVSuccess: function( e, vars ) {
			zeenWooPrv.qtyArrows();
			vars.forms.each( function() {
				var _this = $(this);
				_this.wc_variation_form();
				zeenWooPrv.wooVariations( _this, 'qv_' );
			});
		},
		wooFilterTr: function( e ) {
			e.preventDefault();
			zeenWooPrv.$body.addClass( 'slide-menu-open filter-slide-menu-open' );
			zeenWooPrv.$lightOverlay.addClass( 'active' );
			zeenWooPrv.$wooFilters.addClass( 'active' );
		},
		wooVariationChange: function( variations ) {
			variations.find('.zeen__var__options').each( function(){
				var _this = $( this ),
				attribute = _this.data('attribute'),
				attributeEl = _this.closest('form').find( '#' + attribute );
				_this.find('input').each( function() {
					var _thisInput = $(this),
					_thisLabel = _thisInput.next(),
					optionSelect = attributeEl.find('option[value="' + _thisInput.attr('value') + '"]' ),
					tooltip = false;
					if ( ! _thisLabel.hasClass( 'label-tip') && typeof _thisLabel.attr( 'data-title' ) !== 'undefined' ) {
						_thisLabel.addClass('label-tip modal-tip').attr( 'data-title-ori', _thisLabel.attr( 'data-title' ) );
					}
					var disabled = false;
					if ( optionSelect.length === 0 ) {
						disabled = true;
					} else {
						disabled = optionSelect[0].disabled ? true : false;
					}

					if ( disabled === false ) {
						_thisInput.removeClass('radio--disabled').attr( 'disabled', false );
						if ( ! _thisLabel.hasClass( 'label-tip') ) {
							_thisLabel.attr( 'data-title', _thisLabel.attr( 'data-title-ori' ) );
						} else {
							_thisLabel.removeData( 'title' );
							_thisLabel.removeClass('tipi-tip').off( 'mouseenter', zeen.toolTipInitPub );
						}
					} else {
						tooltip = true;
						_thisInput.addClass('radio--disabled').attr( 'disabled',true );
						_thisLabel.attr( 'data-title', zeenWooJS.i18n.outOfStock );
					}
					if ( tooltip == true && ! _thisLabel.hasClass( 'tipi-tip') ) {
						_thisLabel.addClass('tipi-tip tipi-tip-t modal-tip').on( 'mouseenter', zeen.toolTipInitPub );
					}
					_thisLabel.closest('tr').find('>.label .zeen-var-append').html( '<span class="zeen--colon">: </span>' + attributeEl.find(':selected').text() );
				});
			});
		},
		wooRadio: function() {
			var _this = $( this ),
				wrap = _this.closest('.zeen__var__options'),
				select = wrap.next();
				select.val( _this.val() ).trigger('change');
		},
		wooVariations: function( variationForm, prefix ) {
			var priceOriginalParent = variationForm.parent(),
			priceOriginal;
			if ( priceOriginalParent.hasClass( 'summary') ) {
				priceOriginal = priceOriginalParent.find('> .price' );
			} else {
				priceOriginalParent = priceOriginalParent.closest('.product');
				priceOriginal = priceOriginalParent.is('article') ? priceOriginalParent.find('.title-wrap > .price') : priceOriginalParent.find('>.woocommerce-loop-product__link > .price');
			}
			prefix = typeof prefix === 'undefined' ? '' : prefix;
			variationForm.data( 'priceOriginalHTML', priceOriginal.html() );
			if ( variationForm.hasClass('zeen-variations') ) {
				return;
			}
			variationForm.addClass( 'zeen-variations' );
			variationForm.find( 'td.label' ).append( '<span class="zeen-var-append"></span>');
			variationForm.on( 'show_variation.zeen_' + prefix + 'show_variation', { zeenForm: variationForm }, zeenWooPrv.wooRadioChangeShow );
			variationForm.on( 'hide_variation.zeen_' + prefix + 'hide_variation', { zeenForm: variationForm }, zeenWooPrv.wooRadioChangeHide );
			variationForm.on( 'found_variation.zeen_' + prefix + 'found_variation', { zeenForm: variationForm }, zeenWooPrv.wooFoundVariation );
		},
		wooVariationsOff: function( variationForm ) {
			variationForm.off( 'show_variation.zeen_qv_show_variation', zeenWooPrv.wooRadioChangeShow );
			variationForm.off( 'hide_variation.zeen_qv_hide_variation', zeenWooPrv.wooRadioChangeHide );
			variationForm.off( 'found_variation.zeen_qv_hide_variation', zeenWooPrv.wooFoundVariation );
		},
		wooFoundVariation: function( event, variation ) {
			var $form             = event.data.zeenForm,
			$lazyCheck,
			$product          = $form.closest( '.product' ),
			$productParent    = $form.parent(),
			$isQV             = $productParent.hasClass( 'qv-summary' ),
			$product_gallery  = $product.find( '.images' ),
			$product_img      = $product_gallery.find( 'picture' ).eq(0);
			if ( $product_img.length > 0 ) {
				$lazyCheck = $product_img;
				$product_img = $product_img.parent().find('source');
				$product_img.addClass( 'wp-post-image' );
			} else {
				$product_img = $product_gallery.find( 'img' ).eq(0);
				$lazyCheck = $product_img;
			}
			if ( $productParent.hasClass( 'summary' ) && ! $isQV ) {
				return;
			}
			if ( ! $lazyCheck.hasClass('zeen-lazy-load-base') || ( $lazyCheck.hasClass('zeen-lazy-load-base') && $lazyCheck.hasClass('zeen-lazy-loaded' ) ) ) {
				if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
					$product_img.wc_set_variation_attr( 'src', variation.image.src );
					$product_img.wc_set_variation_attr( 'height', variation.image.src_h );
					$product_img.wc_set_variation_attr( 'width', variation.image.src_w );
					$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );
					$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );
					$product_img.wc_set_variation_attr( 'title', variation.image.title );
					$product_img.wc_set_variation_attr( 'data-caption', variation.image.caption );
					$product_img.wc_set_variation_attr( 'alt', variation.image.alt );
					$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );
					$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );
					$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );
					$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );
				} else {
					$form.wc_variations_image_reset();
				}
			}
		},
		wooRadioChangeHide: function( e ) {
			var priceOriginalParent = e.data.zeenForm.parent(),
			priceOriginal;
			if ( priceOriginalParent.hasClass( 'summary') ) {
				priceOriginal = priceOriginalParent.find('> .price' );
			} else {
				priceOriginalParent = priceOriginalParent.closest('.product');
				priceOriginal = priceOriginalParent.is('article') ? priceOriginalParent.find('.title-wrap > .price') : priceOriginalParent.find('>.woocommerce-loop-product__link > .price');
			}
			var originalHTML = e.data.zeenForm.data('priceOriginalHTML');
			if ( typeof originalHTML !== 'undefined' && originalHTML !== priceOriginal.html() ) {
				priceOriginal.addClass('price--change');
				setTimeout(function() {
					priceOriginal.html( originalHTML );
					priceOriginal.removeClass('price--change');
				}, 350 );
			}
		},
		wooRadioChangeShow: function( e ) {
			zeenWooPrv.wooVariationChange( e.data.zeenForm );
			var priceOriginalParent = e.data.zeenForm.parent(),
			priceOriginal;
			if ( priceOriginalParent.hasClass( 'summary') ) {
				priceOriginal = priceOriginalParent.find('> .price' );
			} else {
				priceOriginalParent = priceOriginalParent.closest('.product');
				priceOriginal = priceOriginalParent.is('article') ? priceOriginalParent.find('.title-wrap > .price') : priceOriginalParent.find('>.woocommerce-loop-product__link > .price');
			}
			var singleVar = $( e.data.zeenForm ).find( '.single_variation'),
			change = singleVar.find('.woocommerce-variation-price > .price').html(),
			extra = zeenWooJS.args.wooStockFormat === 'no_amount' ? '' : singleVar.find('.woocommerce-variation-availability').html();
			if ( typeof change !== 'undefined' && change !== priceOriginal.html() ) {
				priceOriginal.addClass('price--change');
				setTimeout(function() {
					priceOriginal.html( change + extra );
					priceOriginal.removeClass('price--change');
				}, 350 );
			}
		},
		single_add_to_cart_button: function( e ) {
			var $thisbutton = $(this);
			if ( $thisbutton.hasClass('disabled') || false === $( document.body ).triggerHandler( 'should_send_ajax_request.adding_to_cart', [ $thisbutton ] ) ) {
				$( document.body ).trigger( 'ajax_request_not_sent.adding_to_cart', [ false, false, $thisbutton ] );
				return true;
			}
			var $thisbuttonParent = $thisbutton.parent(),
			$form = $thisbuttonParent.hasClass( 'woo-extra-button-add' ) ? $thisbutton.closest('.product').find( 'form.cart') : $thisbutton.closest('form.cart'),
			data = $form.serializeArray() || {};
			if ( $form.hasClass( 'grouped_form' ) || $form.hasClass( 'cart--external' ) || $form.find('.wc-pao-addons-container').length > 0 ) {
				return;
			}
			e.preventDefault();
			var form = {};
			$.each( data, function() {
				form[this.name] = this.value;
			});

			zeenWooPrv.$body.trigger( 'adding_to_cart', [ $thisbutton, form ] );
			data = {
				form: form,
				action: 'zeen_woo_cart_do',
				product_id: $form.find('input[name=variation_id]').val() || $thisbutton.val()
			};

			$.ajax({
				type: 'POST',
				url: wc_add_to_cart_params.ajax_url,
				data: data,
				beforeSend: function (response) {
					$thisbutton.addClass( 'tipi-spin' );
				},
				complete: function (response) {
					$thisbutton.removeClass( 'tipi-spin' );
				},
				success: function (response) {
					if ( ! response ) {
						return;
					}
					if ( response.error && response.product_url ) {
						window.location = response.product_url;
						return;
					}
					if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
						window.location = wc_add_to_cart_params.cart_url;
						return;
					}
					zeenWooPrv.$body.trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
				},
			});
		},
		qtyArrows: function() {
			$( '.cart .quantity:not(.has-arrows )' ).addClass( 'has-arrows' ).prepend( '<span id="qty-minus" class="qty-arrow qty-minus"><i class="tipi-i-minus"></i></span>' ).append( '<span id="qty-plus" class="qty-arrow qty-plus"><i class="tipi-i-plus"></i></span>' );
		},
		qtyArrowChange: function() {
			var $quantity = $( this ).closest( '.quantity' ),
				$qty = $quantity.find( '.qty' ),
				type = $( this ).hasClass( 'qty-plus' ),
				current	= parseInt( $qty.val() ),
				max = parseInt( $qty.attr( 'max' ) ),
				min = parseInt( $qty.attr( 'min' ) ),
				step = $qty.attr( 'step' );

			if ( ! current || current === '' || current === 'NaN' ) {
				current = 0;
			}
			if ( max === '' || max === 'NaN' ) {
				max = '';
			}
			if ( min === '' || min === 'NaN' ) {
				min = 0;
			}
			if ( step === 'any' || step === '' || typeof step === 'undefined' || parseInt( step ) === 'NaN' ) {
				step = 1;
			}

			if ( type === true ) {
				if ( max && ( current >= max ) ) {
					$qty.val( max );
				} else {
					$qty.val( current + parseInt( step ) );
				}
			} else {
				if ( min && ( current <= min ) ) {
					$qty.val( min );
				} else if ( current > 0 ) {
					$qty.val( current - parseInt( step ) );
				}
			}

			$qty.trigger( 'change' );
		}
	};
	zeenWooPrv.init();
})(jQuery);