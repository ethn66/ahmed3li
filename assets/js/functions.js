/**
 * Copyright: Codetipi
 * Theme: Zeen
 * Version: 4.0.9.6
 */
 /* global jQuery, zeenJS, IntersectionObserver, imagesLoaded, gsap, Power2, Cookies, Linear, Power0, ga, _gaq, zenscroll, FB, DISQUS */
var zeen = ( function($) { "use strict";
	var zeenPrv = {
		initMethods: function() {
			this.dom();
			this.data();
			this.bind();
			this.anis();
			this.sticky();
			this.sliderInit();
			this.lightboxInit();
			this.sidebars();
			this.infScr();
			this.fillRunner();
			this.mobileMenuClass();
			this.header();
			this.topBlock();
			this.anchorTouch();
			this.parallax3s();
			this.parallaxIt();
			this.parallaxItBg();
			this.maskLoader();
			this.hero31();
			this.ipl();
			this.imgControl();
			this.progressPosition();
			this.postTracks();
			this.foldMid();
			this.modalCheck();
			this.footerReveal();
			this.topBarMsg();
			this.videoWrap();
			this.videoBg();
			this.stickyCheck();
			this.stickyEl();
			this.hovererBlock();
			this.videosBlock();
			this.metaLocation34();
			this.twitchLoad();
		},
		init: function() {
			if ( 'IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype ) {
				this.initMethods();
			} else {
				this.loadScript( zeenJS.args.polyfill );
			}
		},
		dom: function() {
			this.$win 				= $( window );
			this.$doc 				= $( document );
			this.$body				= $( 'body' );
			this.$page 				= $( '#page' );
			this.$rtl				= this.$body.hasClass( 'rtl' );
			this.$content			= $( '#content' );
			this.$contentWrap		= $( '#contents-wrap')
			this.$hovererBlock		= this.$contentWrap.find('> .block-wrap-hoverer').add( this.$contentWrap.find('> .block-wrap-110 .block-wrap-hoverer') );
			this.$videosBlock		= this.$contentWrap.find('> .block-wrap-video-player').add( this.$contentWrap.find('> .block-wrap-110 .block-wrap-video-player') );
			this.$metaLocation34	= this.$contentWrap.find('> .block-wrap > div > div > .meta-overlay-excerpt').add( this.$contentWrap.find('> .block-wrap-110 .meta-overlay-excerpt') );
			this.$timedPup			= $( '#timed-pup' );
			this.$modal				= $( '#modal' );
			this.$baseOverlay		= $( '#tipi-overlay' );
			this.$skinMode 			= $( '.mode__wrap' );
			this.$modalCustom		= this.$modal.find( '.content-custom' );
			this.$modalSearch		= this.$modal.find( '.content-search' );
			this.$modalSearchField	= this.$modalSearch.find( '.search-field' );
			this.$modalSearchFound	= this.$modalSearch.find( '.content-found' );
			this.$dropSearch		= $( '.drop-search' );
			this.$dropSearchFound	= this.$dropSearch.find( '.content-found' );
			this.$dropSearchField	= this.$dropSearch.find( '.search-field' );
			this.$searchResults = $( '.search-all-results' );
			this.resizing 			= false;
			this.$stickyOff 		= true;
			this.$header 			= $( '#masthead' );
			this.$trendingSecondary = $( '#trending-secondary' );
			this.$siteNav           = $( '#site-navigation' );
			this.$secondaryWrap     = $( '#secondary-wrap' );
			this.$stickyP2Share		= $( '#sticky-p2-share' );
			this.$stickyP2			= $( '#sticky-p2' );
			this.$dropper			= this.$siteNav.find( '.horizontal-menu > .dropper' ).add( this.$secondaryWrap.find( '.horizontal-menu > .dropper' ) ).add( this.$header.find( '.horizontal-menu > .dropper' ) );
			this.$dropperChild		= this.$dropper.find( '.block-mm-changer' );
			this.$toolTip			= $( '.tipi-tip' );
			this.$toolTipOutput		= '';
			this.$toolTipCurrent	= '';
			this.headerOne          = this.$header.hasClass( 'main-menu-inline' );
			this.$wpAdminBar 		= $( '#wpadminbar' );
			this.$primary	 		= $( '#primary' );
			this.$verticalMenu 		= $( '#site-header-side-70s' );
			this.$entryContentWrap  = this.$primary.find( '.entry-content-wrap' );
			this.$entryContent	 	= this.$primary.find( '.entry-content' );
			this.$parentAnimation   = this.$primary.find( '.parent-animation:not(.loaded)' );
			this.$toTopWrap			= $( '#to-top-wrap' );
			this.$toTopA 			= $( '#to-top-a' );
			this.$progress			= $( '#progress' );
			this.$mobBotShare		= $( '#mob-bot-share' );
			this.$iplTitle			= $( '#sticky-title' );
			this.$slideIn			= $( '#slide-in-box' );
			this.$slideInX			= this.$slideIn.find( '> .tipi-closer' );
			this.$slideForm			= this.$slideIn.find( 'form' );
			this.slideInScene		= '';
			this.mobMenuClearTO		= '';
			this.resizeTo			= '';
			this.pubTimer			= '';
			this.detectDark			= zeenJS.args.browserMode && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
			this.ticking			= false;
			this.tickingLb			= false;
			this.lastScrollY		= 0;
			this.$sorter			= $( '.sorter' );
			this.$topBarMsg			= $( '#top-bar-message' );
			this.$topBlock			= $( '#zeen-top-block' );
			this.imgAni				=  document.getElementsByClassName( 'article-ani' );
			this.$footer			= $( '#colophon' );
			this.$footerBgArea		= this.$footer.find( '.bg-area' );
			this.stickyVertical 	= false;
			this.$stickyMenu		= $( '.sticky-menu' );
			this.$hero31			= $( '.hero-31 > .hero' );
			this.infST 				= [];
			this.paraSaved 			= [];
			this.stickies 			= [];
			this.sbsSaved 			= [];
			this.ro 				= false;
			this.roS 				= false;
			this.roP 				= false;
			this.progressScene      = '';
			this.nonce 				= zeenJS.nonce;
			this.$main 				= $( '#main' );
			this.ignoreCodes		= [9, 13, 16, 17, 18, 20, 32, 45, 116, 224, 93, 91];
			this.timer				= 0;
			this.headerIsSticky		= false;
			this.$slideInMenu		= $( '#slide-in-menu' );
			this.$slideMenuOpen 	= $( '.slide-menu-tr-open' );
			this.$mobMenuOpen 		= $( '.mob-tr-open' );
			this.$mobMenuClose 		= $( '.mob-tr-close' );
			this.$mobHead			= $( '#mobhead' );
			this.$mobMenu 			= this.$mobHead.find( '.mobile-navigation' ).add( $( '#mob-menu-wrap' ).find( '.mobile-navigation' ) );
			this.$mobMenuChildren	= this.$mobMenu.find( '.menu-item-has-children' );
			this.thePaged			= zeenJS.qry.paged || 1;
			this.audio 				= new Audio();
			this.video 				= document.createElement( 'video' );
			this.ajaxCall			= '';
			this.ajaxData			= {};
			this.wooArchive         = '';
			this.wooActive          = this.$body.hasClass( 'woo--active' );
			this.wooGridM           = $('#woo-grid-m');
			this.wooGridS           = $('#woo-grid-s');
			this.$products 			= '';
			this.headAreaHeight 	= 0;
			this.activeFocusTarget = '';
		},
		verticalMenus: function() {
			if ( this.$verticalMenu.length === 0 ) {
				return;
			}
			this.$verticalMenu.addClass( 'v-70-vis' );

		},
		data: function() {
			this.$docHeight			= this.$doc.height();
			this.$winWidth			= this.$win.width();
			this.$winHeight			= this.$win.height() + 1;
			this.$headerHeight      = this.$header.outerHeight( true );
			this.$wpAdminBarHeight = 0;
			this.$wpAdminBarHeightNeg = 0;
			if ( this.$body.hasClass( 'admin-bar' ) && ! this.$body.hasClass( 'tipi-builder-frame-inner' ) ) {
				this.$wpAdminBarHeight = this.$winWidth > 783 ? 32 : 46;
				this.$wpAdminBarHeightNeg = this.$wpAdminBarHeight * -1;
			}

			this.mmAni = 0;
			if ( this.$body.hasClass( 'mm-ani-3' ) ) {
				this.mmAni = 3;
			}

        	if ( zeenPrv.$winWidth < 767 ) {
        		this.headAreaHeight = this.$mobHead.outerHeight();
        	} else {
	        	if ( this.$header.hasClass( 'sticky-menu-1' ) || this.$header.hasClass( 'sticky-menu-3' )  ) {
	        		this.headerIsSticky = true;
	        		this.headAreaHeight = this.$headerHeight;
	        	}

	        	if ( this.$siteNav.hasClass( 'sticky-menu-1' ) || this.$siteNav.hasClass( 'sticky-menu-3' ) ) {
	        		this.headerIsSticky = false;
	        		this.headAreaHeight = this.$siteNav.outerHeight();
	        	}
        	}

			var passiveSupported = false;
			try {
			  var options = Object.defineProperty({}, "passive", {
			    get: function() {
			      passiveSupported = true;
			    }
			  });
			  window.addEventListener("zeen", options, options);
			  window.removeEventListener("zeen", options, options);
			} catch(err) {
			  passiveSupported = false;
			}
			this.$listener = passiveSupported ? { passive: true } : false;
		},
		bind: function() {
			this.$win.on( 'resize', this.resize.bind( this ) );
			this.$win.on( 'orientationchange', this.orientationchange.bind( this ) );
			this.$toTopA.on( 'click', this.toTopInit );
			this.$doc.on( 'keyup', this.keyUp.bind( this ) );
			this.$body.on( 'click', '.block-more', this.blockMore );
			this.$body.on( 'click', '.inf-load-more', this.loadMoreButton );
			this.$body.on( 'click', '.media-tr, .modal-tr', this.modalOn );
			this.$body.on( 'click', '.close, .tipi-overlay', this.modalOff );
			this.$body.on( 'click', '.collapsible__title', this.collapsible );
			this.$body.on( 'click', '.trending-op', this.trending );
			this.$body.on( 'click', '.tipi-like-count', this.likes );
			if ( this.$body.hasClass( 'body--mobile--limit' ) ) {
				this.$body.on( 'click', '.mobile--limiter', this.mobLimiter );
			}

			if ( this.$modalSearchFound.length > 0 ) {
				this.$modalSearchField.on( 'keyup', this.liveSearch );
			}
			if ( this.$skinMode.length > 0 ) {
				this.$skinMode.on( 'click', this.skinMode );
				if ( ( parseInt( Cookies.get( 'wp_alt_mode' ) ) === 1 || this.detectDark ) && ! this.$body.hasClass('body--dark--tr' ) ) {
					this.skinMode();
				}
			}
			if ( this.$dropSearchFound.length > 0 ) {
				this.$dropSearchField.on( 'keyup', function( event ) {
					var wrapper = $( this ).parent().parent();
            		var args = {
	                	'field': $( this ),
	                	'wrapper': wrapper,
	                	'ppp': 2,
	                	'results': wrapper.find( '.content-found' ),
	                };
					zeenPrv.liveSearch( event, args );
				});
			}
			if ( this.$dropSearchFound.length > 0 || this.$modalSearchFound.length ) {
				this.$searchResults.on( 'click', this.liveSearchTr );
			}

	        this.$siteNav.find( '.horizontal-menu' ).add( this.$secondaryWrap.find( '.horizontal-menu' ) ).add( this.$header.find( '.horizontal-menu' ) ).menuAim({
	            activateCallback: zeenPrv.menuAc,
	            deactivateCallback: zeenPrv.menuDeac,
	            submenuDirection: 'below',
	            openClassName: 'active',
	            tolerance: 0,
	            exitMenuCallback: zeenPrv.menuEx,
	        });



			this.$mobMenuClose.on( 'click', this.closeMobMenu.bind( this ) );
			this.$mobMenuOpen.on( 'click', this.openMobMenu.bind( this ) );
			this.$mobMenu.on( 'click', '.open-child', this.verticalMenuShow );

			this.$slideMenuOpen.on( 'click', this.openSlideMenu.bind( this ) );


			this.$toolTip.on( 'mouseenter', this.toolTipInit );

			this.$slideInX.on( 'click', this.slideInPX.bind( this ) );
			this.$slideForm.on( 'submit', this.slideInSubmit.bind( this ) );
			this.$sorter.on( 'click', this.sorter );
			if ( this.$body.hasClass('single') && ! this.$body.hasClass('single-product') ) {
				this.$primary.on( 'click', '.reaction', this.reaction );
				this.$primary.on( 'click', '.zeen__up-down', this.upDown );
			}
			this.$win.on( 'load', function() {
				zeenPrv.loaded();
			});

			if ( this.$dropperChild.length > 0 ) {
				zeenPrv.dropperChild();
			}
			if ( this.wooActive === true ) {
				if ( this.$body.hasClass( 'term-woocategory' ) || this.$body.hasClass( 'post-type-archive-product' ) || this.$body.hasClass( 'woocommerce-page' ) ) {
					this.wooArchive = true;
					this.$products = this.$entryContentWrap.find( '.products:not(.related):not(.upsells)' );
				}
				this.wooGridM.on( 'click', this.wooLayoutChange );
				this.wooGridS.on( 'click', this.wooLayoutChange );
				zeenPrv.$doc.on( 'added_to_cart', function() {
					zeenPrv.modalOff();
				} );
			}
		},
		wooLayoutChange: function( e ) {
			e.preventDefault();
			var $this = $(this),
				size = $this.data('size');
			if ( $this.hasClass( 'active') ) {
				return;
			}
			zeenPrv.wooGridM.add( zeenPrv.wooGridS ).removeClass('active');
			zeenPrv.$main.removeClass('products-layout-3 products-layout-4 products-layout-12 products-layout-13').addClass('products-layout-' + size).data( 'ppl', size );
			$this.addClass( 'active' );
			zeenPrv.fillRunner( true );
		},
		collapsible: function( e ) {
			e.preventDefault();
			var $this = $(this),
			$collapsible = $this.closest('.collapsible__wrap').find( '> .collapsible__content');
			if ( ! $this.hasClass('active') ){
				$this.addClass('active')
				gsap.set( $collapsible, {height:"auto", marginBottom: 20, opacity: 1});
				gsap.from( $collapsible, 0.3, {height:0, opacity: 0, marginBottom: 0, ease: "power4.inOut"});
			} else {
				$this.removeClass('active');
				gsap.to($collapsible, 0.3, {height:0, opacity: 0, marginBottom: 0, ease: "power4.inOut"});
			  }
		},
		footerReveal: function( e ) {
			if ( ! this.$body.hasClass( 'footer--reveal') ) {
				return;
			}
			var _this = this;
			if ( _this.$winWidth > 767 ) {
				this.$footer.imagesLoaded().always( function( instance ) {
					_this.$content.css( 'margin-bottom', ( parseInt( _this.$footer.outerHeight() ) - 1 ) + 'px' );
				});
			} else {
				_this.$content.css( 'margin-bottom', '' );
			}

		},
		trending: function( e ) {
			var $selected = $( this );
			var $uid = $selected.parent().data( 'uid' );
			var $blockData = $( '#block-wrap-' + $uid );
			var $blockLoading = $blockData.find( ' > div' );
			if ( $blockLoading.hasClass( 'loading' ) ) {
				return;
			}
			var paged = $selected.data( 'r' ),
				trendingName = 'now';
			if ( paged === 1 ) {
				paged = 2;
			} else if ( paged === 2 ) {
				paged = 7;
				trendingName = 'week';
			} else {
				paged = 30;
				trendingName = 'month';
			}
			$selected.siblings().removeClass( 'trending-selected' );
			$selected.addClass( 'trending-selected' );
			var setter = 'zeen_' + $uid;
			var blockData = window[ setter ];
			var args = { blockData: blockData, $blockData: $blockData, changer: false, append: 2, manual: true, response: '', mm: true };
			$.ajax({
			    method: "GET",
			    data: {
			    	uid: $uid,
					mm: true,
					excerpt_off: true,
					counter: true,
					counter_class: 'border',
					byline_off: true,
					review_off: true,
					data: blockData,
					trending: [ 'zeen-trending-' + trendingName, paged ],
				},
				dataType: 'html',
			    url: zeenJS.root + 'block',
			    beforeSend: function( xhr ) {
			    	$blockLoading.addClass( 'loading' );
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			        if ( zeenPrv.ajaxChecker( setter + '_' + paged) ) {
			        	args.response = zeenPrv.ajaxGetter( setter + '_' + paged );
						zeenPrv.ajaxLoadMore( args );
						$blockData.addClass( 'loaded' );
						return false;
			    	}
			    },
			    success : function( response ) {
			    	response = JSON.parse( response );
					args.response = response;
					zeenPrv.ajaxLoadMore( args );
			    	zeenPrv.ajaxSetter( setter + '_' + paged, response );
					$blockData.addClass( 'loaded' );
			    },
			    fail : function( response ) {
			        console.log( 'ERROR', response );
			    }
			});
		},
		hovererBlock: function() {
			if ( this.$hovererBlock.length === 0 ) {
				return;
			}
			this.$hovererBlock.each( function() {
				var _this = $( this ),
				maskWrap = _this.find('.mask__wrap'),
				article = _this.find('article');
				_this.on( 'mouseenter', zeenPrv.hovererLazy );
				article.on( 'mouseenter mouseleave', function( e ) {
					var _thisArticle = $( this ),
						selection = _thisArticle.data('i'),
						excerpt = _thisArticle.find('.excerpt');
						_thisArticle.siblings().removeClass('selected');
					if ( e.type === 'mouseenter' ) {
						maskWrap.children().removeClass('selected');
						_thisArticle.addClass('selected');
						maskWrap.find( "> [data-i='" + selection + "']" ).addClass('selected');
						if ( excerpt.length > 0 ) {
							gsap.set(excerpt, {height:"auto", opacity: 1});
						    gsap.from(excerpt, 0.3, {height:0, opacity: 0, ease: "power4.inOut"});
						} else {
							_thisArticle.addClass('no-excerpt__ani');
						}
					} else {
						if ( excerpt.length > 0 ) {
						    gsap.to(excerpt, 0.3, {height:0, opacity: 0, ease: "power4.inOut"});
						} else {
							_thisArticle.removeClass('no-excerpt__ani');
						}
					}
				});

			});
		},
		hovererLazy: function() {
			var _this = $(this);
			_this.find( '.zeen-hoverer-lazy-load' ).each( function() {
				zeenPrv.iframeAttrLoad( $(this)[0] );
			});
			_this.off('mouseenter');
		},
		videosBlock: function() {
			if ( this.$videosBlock.length === 0 ) {
				return;
			}
			this.$videosBlock.each( function() {
				var _this = $( this ),
					video = _this.find('.block-piece-2 article');
					video.each( function() {
						$(this).on( 'click', function(){
							$(this).find('.media-tr').get(0).click();
						} );
					});
			});
		},
		metaLocation34: function() {
			if ( this.$metaLocation34.length === 0 ) {
				return;
			}
			this.$metaLocation34.each( function() {
				var _this = $( this ),
				article = _this.find('article');
				article.on( 'mouseenter mouseleave', function( e ) {
					var _thisArticle = $( this ),
						excerpt = _thisArticle.find('.excerpt');
					if ( e.type === 'mouseenter' ) {
						if ( excerpt.length > 0 ) {
							gsap.set(excerpt, {height:"auto", opacity: 1});
						    gsap.from(excerpt, 0.3, {height:0, opacity: 0, ease: "power4.inOut"});
						} else {
							_thisArticle.addClass('no-excerpt__ani');
						}
					} else {
						if ( excerpt.length > 0 ) {
						    gsap.to(excerpt, 0.3, {height:0, opacity: 0, ease: "power4.inOut"});
						} else {
							_thisArticle.removeClass('no-excerpt__ani');
						}
					}
				});

			});
		},
		anchorTouch: function() {
			var touch = 'ontouchstart' in document.documentElement ? true : false;

			this.$dropper.each( function( index, elem ) {
				var dropper = $( this ), dropperA = dropper.find( '> a' ), href = dropperA.attr( 'href' );
				if ( typeof href !== 'undefined' && href.indexOf( '#' ) > -1  ) {
		        	if ( '#search' === href || '#lwa' === href || '#subscribe' === href ) {
		        		dropperA.addClass( 'modal-tr').attr( 'data-type', href.split( '#' )[1] );
		        		return;
		        	} else {
			        	dropperA.on( 'click.anchor', function( e ) {
				        	var targetY = 0,
								targetElem = document.getElementById( href.split( '#' )[1] );
							if ( href !== "#" ) {
								if ( ! targetElem ) {
									return;
								}
								targetY = zenscroll.getTopOf( targetElem );
							}
							e.preventDefault();
							zenscroll.toY( ( targetY - zeenPrv.headAreaHeight - zeenPrv.$wpAdminBarHeight ), null);
			        	});
			        }
				}
				if ( touch === false ) {
					return true;
				}
				if ( dropper.find( '> .menu' ).length > 0 ) {
					dropperA.on( 'click', function( e ) {
		                var current = $( this );
		                dropper.siblings( '.tapped' ).removeClass( 'tapped' );
		                if ( ( ( dropper.find( '.menu' ).length === 0 && dropper.find( '.sub-menu' ).length === 0 ) || dropper.hasClass( 'tapped' ) ) && current.attr( 'href' ) !== '#' ) {
		                    return true;
		                } else {
		                    e.preventDefault();
		                    dropper.addClass( 'tapped' );
		                }
		            });
				}
			});

		},
		topBlock: function() {
			if ( this.$topBlock.length === 0 || this.$topBlock.hasClass( 'standard-ani' ) || this.$topBlock.hasClass( 'loaded' ) ) {
				return;
			}
			var _this = this;
			this.$topBlock.imagesLoaded().always( function( instance ) {
				var args = { y: 100 };

				if ( _this.$winWidth > 767 ) {
					if ( _this.$topBlock.hasClass( 'zeen-top-block-92' ) || _this.$topBlock.hasClass( 'zeen-top-block-94' ) ) {
						args = {};
					}
				}
				args.scrollTrigger = {
					start: "top top",
					end: "bottom top",
					trigger: _this.$topBlock,
					scrub: true
			  	};
				var img = _this.$topBlock.find( 'img' );
				if ( img.length > 0 ) {
					gsap.to( img, args );
				}
			});
		},
		anis: function( e ) {
			this.tempAni();
			this.loopAni();
			this.blockAni();
		},
		lrTempAni: function() {
			var box = document.querySelectorAll( '.lets-review-unseen' ),
				observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if ( entry.intersectionRatio > 0 ) {
						entry.target.classList.add('lets-review-seen' );
			            observer.unobserve(entry.target);
					}
				});
			}, { threshold: [0] });
			for ( var i = box.length - 1; i >= 0; i-- ) {
				observer.observe( box[i] );
			}
		},
		tempAni: function() {
			var ani = document.getElementsByClassName( 'ani-base' ),
				observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if ( entry.isIntersecting ) {
						imagesLoaded( entry.target, function( instance ) {
							entry.target.classList.add('article-window');
						});
						entry.target.classList.remove('article-ani');
						var revs = entry.target.getElementsByClassName('lets-review-api-wrap');

						if ( revs.length > 0 && ( entry.target.parentElement.classList.contains('preview-review-bot' ) || entry.target.parentElement.parentElement.classList.contains( 'preview-review-bot' ) ) ) {
							setTimeout(function() {
							entry.target.classList.add( 'review-ani-done' );
								gsap.fromTo( revs[0], 1, { width: '0' }, { width: revs[0].getAttribute('data-api-100') + '%', ease: Power2.easeOut } );
							}, 300);
						}
						observer.unobserve(entry.target);
					}
				});
			}, { threshold: [0] });
			for ( var i = ani.length - 1; i >= 0; i-- ) {
				if ( ! ani[i].classList.contains('article-window') ) {
					observer.observe( ani[i] );
				}
			}

			var blockToSee = document.getElementsByClassName( 'block-to-see' ),
				blockToSeeObs = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry ) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add('tipi-seen');
						blockToSeeObs.unobserve(entry.target);
					}
				});
			}, { threshold: [0], rootMargin: '-100px 0px', });
			for ( i = blockToSee.length - 1; i >= 0; i-- ) {
				if ( ! blockToSee[i].classList.contains('tipi-seen') ) {
					blockToSeeObs.observe( blockToSee[i] );
				}
			}
			if ( zeenJS.args.lazy !== true ) {
				return;
			}
			var lazy = document.getElementsByClassName( 'zeen-lazy-load' );
			if ( zeenJS.args.lazyNative === true && 'loading' in HTMLImageElement.prototype ) {
				for ( i = lazy.length - 1; i >= 0; i-- ) {
					if ( ! lazy[i].classList.contains( 'zeen-lazy-loaded' ) ) {
						zeenPrv.imgAttrLoad( lazy[i], false );
					}
				}
			} else {
				var lazyObs = new IntersectionObserver(function (entries) {
					entries.forEach(function (entry ) {
						if ( entry.isIntersecting ) {
							lazyObs.unobserve(entry.target);
							zeenPrv.imgAttrLoad(entry.target);
						}
					});
				}, { threshold: [0], rootMargin: '600px 0px', });
				for ( i = lazy.length - 1; i >= 0; i-- ) {
					if ( ! lazy[i].classList.contains( 'zeen-lazy-loaded' ) ) {
						lazyObs.observe( lazy[i] );
					}
				}
			}
		},
		iFrameLazy: function() {
			var iLazy = document.getElementsByClassName( 'zeen-iframe-lazy-load' ),
				ilazyObs = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry ) {
					if ( entry.isIntersecting ) {
						ilazyObs.unobserve(entry.target);
						zeenPrv.iframeAttrLoad(entry.target);
					}
				});
			}, { threshold: [0], rootMargin: '150px 0px', });
			for ( var i = iLazy.length - 1; i >= 0; i-- ) {
				if ( ! iLazy[i].classList.contains( 'zeen-lazy-loaded' ) ) {
					ilazyObs.observe( iLazy[i] );
				}
			}
		},
		imgAttrLoad: function( img, imgLdd ) {
			var el = img, src;
			if ( el.tagName === 'PICTURE' ) {
				src = el.querySelectorAll( 'source' )[0];
				img = el.querySelectorAll( 'img' )[0];
				var srcSrcset = src.getAttribute('data-lazy-srcset');
				var srcSizes = src.getAttribute('data-lazy-sizes');
				if ( srcSrcset ) {
	  				src.srcset = srcSrcset;
	  				src.removeAttribute('data-lazy-srcset');
				}
				if ( srcSizes ) {
	  				src.sizes = srcSizes;
	  				src.removeAttribute('data-lazy-sizes');
				}
			}
			src = img.getAttribute('data-lazy-src');
			var srcset = img.getAttribute('data-lazy-srcset');
			var sizes = img.getAttribute('data-lazy-sizes');
			if ( src ) {
  				img.src = src;
  				img.removeAttribute('data-lazy-src');
			}
			if ( srcset ) {
  				img.srcset = srcset;
  				img.removeAttribute('data-lazy-srcset');
			}
			if ( sizes ) {
  				img.sizes = sizes;
  				img.removeAttribute('data-lazy-sizes');
			}
			var imgLddOn = el.classList.contains( 'zeen-images-loaded' );
			if ( imgLdd === true || imgLddOn === true ) {
				imagesLoaded( img, function( instance ) {
					instance.images[0].img.classList.remove( 'zeen-lazy-load' );
					instance.images[0].img.classList.add( 'zeen-lazy-loaded' );
					if ( instance.images[0].img.parentElement.tagName === 'PICTURE' ) {
						instance.images[0].img.parentElement.parentElement.classList.add( 'zeen-lazy-loaded-wrap' );
					} else {
						instance.images[0].img.parentElement.classList.add( 'zeen-lazy-loaded-wrap' );
					}
				});
			} else {
				el.classList.remove( 'zeen-lazy-load' );
				el.classList.add( 'zeen-lazy-loaded' );
			}
		},
		iframeAttrLoad: function( iframe ) {
			var src = iframe.getAttribute('data-lazy-src');
			iframe.setAttribute('src', src );
			$(iframe).on( 'load', function() {
				iframe.classList.add('zeen-lazy-loaded');
				iframe.classList.add( 'loaded' );
			});
		},
		mobLimiter: function( e ) {
			e.preventDefault();
			$( this ).closest( '.post-wrap' ).addClass( 'mobile--limiter--more' );
			zeenPrv.progressScene.destroy();
			zeenPrv.postTracks();
		},
		progressPosition: function() {
			if ( this.$progress.length === 0 ) {
				return;
			}
			if ( this.$winWidth < 767 && this.$mobHead.length > 0 ) {
				this.$progress.addClass('has--moved');
				var progressData = this.$progress.data('parent');
				if ( typeof progressData === 'undefined' ) {
					this.$progress.data('parent', this.$progress.closest('header').attr('id') );
				}
				this.$mobHead.append( this.$progress );
			} else if ( this.$progress.hasClass('has--moved') ) {
				$( '#' + this.$progress.data('parent') ).find('> .bg-area').append( this.$progress );
			}
		},
		loopAni: function( e ) {
			if ( this.$winWidth < 1200 ) {
				return;
			}
			this.$primary.find( '> .post-wrap' ).each( function() {
				var current = $(this);
				if ( current.hasClass( 'loop-ani-checked' ) ) {
					return true;
				}
				if ( current.hasClass( 'align-fade-up' ) ) {
					var ani = current.find( '.alignleft, .alignright' ),
						observer = new IntersectionObserver(function (entries) {
						entries.forEach(function (entry) {
							if ( entry.boundingClientRect.top > 0 || entry.isIntersecting ) {
								entry.target.classList.add('tipi-seen');
								observer.unobserve(entry.target);
							}
						});
					}, { threshold: [0], rootMargin: '500px 0px 0px 0px' });
					for ( var i = ani.length - 1; i >= 0; i-- ) {
						observer.observe( ani[i] );
					}
				}
				current.addClass('loop-ani-checked');
			});
		},
		blockAni: function() {
			var ani = document.getElementsByClassName( 'block-ani' );
			if ( ani.length === 0 ) {
				return;
			}
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add('loaded');
						observer.unobserve(entry.target);
					}
				});
			}, { threshold: [0] });
			for ( var i = ani.length - 1; i >= 0; i-- ) {
				if ( ! ani[i].classList.contains('loaded') ) {
					observer.observe( ani[i] );
				}
			}
		},
		dropperChild: function() {
			var timer;
			this.$dropperChild.on( 'mouseover mouseleave', function( e ) {
				clearTimeout(timer);
				if ( e.type === 'mouseover' ) {
					var _this = $(this);
					timer = setTimeout(function() {
				  		zeenPrv.blockMore( e, _this );
					}, 300);
				}
			});
		},
		twitchLoad: function() {
			var ani = document.getElementsByClassName( 'twitch' );
			if ( ani.length === 0 ) {
				return;
			}

			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if ( entry.isIntersecting ) {
						var tw = $( entry.target );
				      	tw.append( '<iframe title="Twitch" width="1280" height="720" scrolling="no" class="twitch-frame" src="' + tw.data( 'src' ) + '" frameborder="0" seamless="seamless" allowfullscreen="true"></iframe>' );
						tw.find('iframe').on( 'load', function() {
							tw.addClass( 'ani-in loaded' );
						});
						observer.unobserve(entry.target);
					}
				});
			}, { threshold: [0] });
			for ( var i = ani.length - 1; i >= 0; i-- ) {
				if ( ! ani[i].classList.contains('loaded') ) {
					observer.observe( ani[i] );
				}
			}
		},
		sorter: function() {
			var $sorter = $( this );

			if ( $sorter.hasClass( 'load-more-wrap' ) ) {
				return;
			}
			zeenPrv.activeFocus( $sorter, 'active' );
		},
		activeFocus: function( el, classes ) {
			if ( el.hasClass( classes ) ) {
				el.blur();
			    el.removeClass( classes );
				return;
			}
			el.addClass( classes );
			if ( 'ontouchstart' in document.documentElement ) {
				zeenPrv.$doc.on( 'touchstart', function( e ) {
					el.removeClass( classes );
					zeenPrv.$doc.off( 'touchstart' );
					el.off( 'touchstart' );
				});
				el.on( 'touchstart', function( e ) {
				    e.stopPropagation();
				});
			} else {
				zeenPrv.activeFocusTarget = el;
				zeenPrv.$doc.on( 'click', zeenPrv.activeFocusClick );

			}
		},
		activeFocusClick: function( e ) {
			if ( zeenPrv.activeFocusTarget.has( e.target ).length === 0 ) {
				zeenPrv.activeFocusTarget.removeClass( 'active active-search' );
				zeenPrv.activeFocusTarget = '';
				zeenPrv.$doc.off( 'click', zeenPrv.activeFocusClick );
			}
		},
		loading: function( el, status ) {
			if ( status === 'on' ) {
				el.addClass( 'loading' );
			} else {
				el.removeClass( 'loading' );
			}
		},
		slideInP: function() {
			var postSlide = this.$slideIn.hasClass( 'slide-in-2' ) ? true : false;
			if ( this.$slideIn.length === 0 || this.$winWidth < 767 || ( Cookies.get( 'wp_sliding_box_p' ) === 'off' && postSlide === true ) || ( Cookies.get( 'wp_sliding_box' ) === 'off' && postSlide === false ) ) {
				return;
			}

			var trigger = this.$content,
			start = parseInt( zeenJS.args.slidingBoxStartPoint ) > 0 ?  parseInt( zeenJS.args.slidingBoxStartPoint ) : 50;
			if ( postSlide === true && this.$entryContentWrap.length > 0 ) {
				// Wrap used for vertical galleries and sticky gets shifted
				trigger = this.$entryContentWrap;
			}
			this.slideInScene = ScrollTrigger.create({
			    trigger: trigger,
				start: "top+=" + start + "% bottom",
				end: "bottom center",
			    toggleClass: { targets: this.$slideIn, className: "active" }
			});
		},
		slideInPX: function() {
			this.$body.removeClass( 'slide-in-active' );
			if ( this.$slideIn.hasClass( 'slide-in-1' ) ) {
				this.turnItOff( 1 );
			}
			if ( this.$slideIn.hasClass( 'slide-in-2' ) ) {
				this.turnItOff( 2 );
			}
			if ( typeof this.slideInScene === 'object' ) {
				this.slideInScene.kill();
			}
		},
		slideInSubmit: function() {
			this.turnItOff( 1 );
		},
		turnItOff: function( arg ) {
			if ( arg === 1 ) {
				Cookies.set( 'wp_sliding_box', 'off', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			} else if ( arg === 2 ) {
				Cookies.set( 'wp_sliding_box_p', 'off', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			} else if ( arg === 3 ) {
				Cookies.set( 'wp_timed_pp', 'off', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			} else if ( arg === 4 ) {
				Cookies.set( 'wp_top_bar', 'off', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			} else if ( arg === 5 ) {
				Cookies.set( 'subL', 'off', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			} else if ( arg === 6 ) {
				Cookies.set( 'wp_timed_sub', 'off', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			}
		},
		topBarMsg: function() {
			if ( this.$topBarMsg.length === 0 ) {
				return;
			}
			$( '#top-bar-message-close' ).on( 'click', function() {
				var closer = $( this );
				zeenPrv.$topBarMsg.slideUp();
				closer.off( 'click' );
				zeenPrv.turnItOff( 4 );
			});
		},
		timedPup: function() {
			var els = this.$timedPup.add( this.$modal.find( '.timed-sub' ) );
			if ( els.length === 0 ) {
				return;
			}
			var _this = this;
			els.each( function() {
				var self = $(this), disabler = 3, timer = self.data( 't' ), disable = self.data( 'd' ), type = self.data('type');
				if ( typeof timer === 'undefined' ) {
					timer = 15000;
				} else {
					timer = timer * 1000;
				}
				setTimeout( function() {
					_this.modalOff();
					setTimeout( function(){
						if ( 'pup' === type ) {
							_this.$baseOverlay.addClass( 'active' );
							_this.$body.addClass( 'modal-active' );
							_this.$timedPup.addClass( 'active' );
							if ( disable === 1 ) {
								_this.$baseOverlay.on( 'click', function() {
									_this.turnItOff( disabler );
									_this.$baseOverlay.off( 'click' );
								});
							}
						} else if ( 'sub' === type ) {
							zeenPrv.modalSubscribe();
							disabler = 6;
							if ( disable === 1 ) {
								zeenPrv.$body.addClass( 'sub-pup' );
							}
						}
					}, 300);
				}, timer);
			});
		},
		postTracks: function() {
			if ( this.$progress.length === 0 && this.$mobBotShare.length === 0 ) {
				return;
			}
			var targets = [];
			if ( this.$progress.length > 0 ) {
				targets.push( zeenPrv.$progress );
			}
			if ( this.$mobBotShare.length > 0 ) {
				targets.push( zeenPrv.$mobBotShare );
			}
			this.$entryContent.each( function( index, elem ) {
				var $elem = $( elem );
				if ( $elem.hasClass( 'sticky-el' ) || $elem.hasClass( 'woocommerce-Tabs-panel' ) && ! $elem.hasClass( 'woocommerce-Tabs-panel--description' ) ) {
					return true;
				}
				$elem.addClass( 'progresson' );
				$elem.find( 'img' ).imagesLoaded( function() {
					var $elemOuter = $elem.outerHeight( true );
					if ( zeenPrv.$winHeight < ( $elemOuter + 50 ) ) {
						var ST = gsap.timeline( {
							scrollTrigger: {
							    trigger: $elem,
							    start: "top center",
							    end: "bottom center",
								scrub: true,
							    toggleClass: { targets: targets, className: 'active' }
							}
						});
					}
					if ( zeenPrv.$progress.length !== 0 ) {
						if ( zeenPrv.$winHeight < ( $elemOuter + 50 ) ) {
							ST.fromTo( zeenPrv.$progress, {
								width: '0',
								ease: "none",
							},
							{
								width: '100%',
								ease: "none",
							});
						}
					}
				});
			});

		},
		keyUp: function( e ) {
			if ( this.$modal.hasClass( 'inactive' ) && ! this.$body.hasClass( 'slide-menu-open' ) ) {
				return;
			}
			var keyCheck = false;

			if ( 'key' in e ) {
		        keyCheck = ( e.key === 'Escape' || e.key === 'Esc' );
		    } else {
		        keyCheck = ( e.keyCode === 27 );
		    }

			if ( keyCheck !== false ) {
				this.closeSlideMenu( e );
            	this.modalOff();
	        }
		},
		header: function( resize ) {

			if ( this.$winWidth > 767 ) {
				var isStickyTop = false;

				if ( this.$header.hasClass( 'sticky-top' ) && ! this.$header.hasClass( 'evented' ) ) {
					var offset = zeenPrv.$header.hasClass( 'sticky-menu-4' ) ? { top: 0, left: 0 } : this.$header.offset();
					window.addEventListener( 'scroll', function(e) {
						  var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
						  if ( ! zeenPrv.ticking ) {
						    window.requestAnimationFrame(function() {
								if ( currentScroll > Math.min( 45, zeenPrv.$headerHeight ) && currentScroll >= offset.top - zeenPrv.$wpAdminBarHeight ) {
									if ( ! zeenPrv.$header[0].classList.contains('sticky-header--active') ) {
										zeenPrv.$header[0].classList.add('sticky-header--active');
									}
								} else {
									zeenPrv.$header[0].classList.remove('sticky-header--active');
								}
								zeenPrv.ticking = false;
						    });
						    zeenPrv.ticking = true;
						  }
					}, zeenPrv.$listener );
					isStickyTop = true;
					this.$header.addClass( 'evented' );
				}
				if ( zeenJS.args.stickyHeaderCustomize === true && ( isStickyTop || this.$header.hasClass( 'sticky-menu' ) ) ) {
					var logo = this.$header.find( '.logo-main img' );
					logo.imagesLoaded( function() {
						logo.css( 'height', '' ).css( 'height', logo.height() );
						zeenPrv.$header.css( 'height', '' ).css( 'height', zeenPrv.$headerHeight ).addClass( 'size-set' );
					});
				}
			}
		},
		mobileMenuClass: function() {
			var $mobChild = this.$mobMenuChildren.find( '> a' );
			$mobChild.each( function( index ) {
				var $this = $(this);
				if ( $this.attr('href') === '#' ) {
					$this.addClass('open-child text-link');
				} else {
					$this.addClass('open-child text-link text-with-link');
				}
			});
			$mobChild.after( '<a href="#" class="open-child"><i class="tipi-i-chevron-down"></i></a>' );
		},
		verticalMenuShow: function( e ) {
	        var currentVerticalMenu = $( this );
	        var currentParent = currentVerticalMenu.parent();
	        var currentSiblings = currentParent.siblings( '.menu-item-has-children' );
	        currentSiblings.find('> .opened-child').removeClass('opened-child');
	        currentSiblings.find('> .child-is-open').removeClass('child-is-open');
	        var currentVerticalSubMenu = currentParent.find( '> .sub-menu' );
	        if ( currentVerticalMenu.hasClass( 'child-is-open' ) ) {
				if ( ! currentVerticalMenu.hasClass('text-with-link') ) {
					e.preventDefault();
					currentParent.find('a').removeClass( 'child-is-open' );
					currentVerticalSubMenu.removeClass( 'opened-child' );
				}
	        } else {
				e.preventDefault();
	            currentParent.find('a').addClass( 'child-is-open' );
	            currentVerticalSubMenu.addClass( 'opened-child' );
	        }

		},
		 secondaryImgs: function( event ) {
		 	var hovered = $( this );
            if ( event.type === 'mouseenter' ) {
                hovered.addClass( 'hovering' );
            } else {
                hovered.removeClass( 'hovering' );
            }
        },
        stickyCheck: function() {
        	 var el = document.createElement('a'),
				check = el.style;
			check.cssText = "position:sticky;position:-webkit-sticky;";
			this.$stickyOff = check.position.indexOf('sticky')!==-1;
			if ( this.$stickyOff === false ) {
				this.$body.addClass('sticky-disabled');
			}
        },
        stickyEl: function() {
        	var spacing;
        	if ( this.headAreaHeight === 0 || this.$stickyOff === false ) {
        		return;
        	}
        	$( '.sticky-el' ).each( function( index, elem ) {
        		var $elem = $( this );
	        	if ( $elem.hasClass( 'block-wrap' ) && parseInt( $elem.find('> .tipi-row-inner-style').css( 'padding-top' ) ) > 0 ) {
	        		spacing = 0;
	        	} else {
	        		spacing = 30;
	        	}
	        	if ( zeenPrv.$winWidth < 767  ) {
	        		spacing = 15;
	        	}
        		$elem.css( 'top', zeenPrv.headAreaHeight + zeenPrv.$wpAdminBarHeight + spacing );
        	});
        },
		sticky: function() {
			if ( this.$stickyMenu.length === 0 ) {
				return;
			}

			this.$stickyMenu.each( function( index, elem ) {
				var stickyElem = $( elem );
				if ( stickyElem.hasClass( 'stickied' ) ) {
					return;
				}
				stickyElem.addClass( 'stickied' );
				var media = 'd';
				if ( stickyElem.hasClass( 'site-mob-header' ) ) {
					media = 'm';
				}
		    	var args = {
				    end: "99999999",
					trigger: $( '#header-line' ),
				};
				var offset = 200, extras, stickyMenuType;
				if ( stickyElem.hasClass( 'site-mob-header' ) ) {
		    		offset = zeenPrv.$winHeight;
					args.trigger = $( '#mob-line');
		    	}
				args.start = zeenPrv.$wpAdminBarHeightNeg + 'px top';
		    	var onUpdateKeep;
				if ( stickyElem.hasClass( 'sticky-menu-2' ) ) {
					stickyMenuType = 2;
					stickyElem.addClass( 'still' );
					var stickyElemHeight = stickyElem.outerHeight( true );
					args.onUpdate = function (_ref) {
						if ( _ref.progress * _ref.end > stickyElemHeight ) {
							stickyElem.addClass( 'stuck' );
							if ( _ref.direction === 1 ) {
								stickyElem.removeClass( 'active' );
							} else if ( _ref.direction === -1  ) {
								stickyElem.addClass( 'active' ).removeClass( 'still' );
							}
						} else if ( _ref.progress * _ref.end === 0  ) {
							stickyElem.removeClass( 'stuck active' ).addClass( 'still' );
							if ( _ref.direction === 1 ) {
							} else if ( _ref.direction === -1  ) {
							}
						}
					};
			    } else if ( stickyElem.hasClass( 'sticky-menu-3' ) ) {
			    	stickyMenuType = 3;
					onUpdateKeep = true;
			    	args.onUpdate = function (_ref) {
						if ( _ref.progress * _ref.end > offset ) {
							stickyElem.addClass( 'slidedown stuck' );
						} else if ( _ref.progress * _ref.end === 0 ) {
							stickyElem.removeClass( 'slidedown stuck' );
						}
					};
					if ( zeenPrv.$body.hasClass('single-post') && stickyElem.hasClass('main-navigation') ) {
						extras = true;
					}
			    } else if ( ( stickyElem.hasClass( 'sticky-menu-1' ) || stickyElem.hasClass( 'sticky-menu-4' ) ) && ! stickyElem.hasClass( 'site-mob-header' ) ) {
			    	stickyMenuType = 1;
					if ( zeenPrv.$body.hasClass('single-post') && stickyElem.hasClass('main-navigation') ) {
						extras = true;
					}
					args.start = "top " + zeenPrv.$wpAdminBarHeight > 0 ? zeenPrv.$wpAdminBarHeight + 'px' : 'top';
					args.onLeaveBack = function (_ref) {
						stickyElem.removeClass( 'stuck' );
					};
					args.onEnter = function (_ref) {
						stickyElem.addClass( 'stuck' );
					};
			    }
			    if ( extras === true ) {
					args.onUpdate = function (_ref) {
					   if ( _ref.progress * _ref.end > zeenPrv.$winHeight / 2 ) {
							stickyElem.addClass( 'stuck-full' );
							if ( _ref.direction === 1 ) {
							   stickyElem.removeClass( 'stuck-up' );
							} else if ( _ref.direction === -1  ) {
								stickyElem.addClass( 'stuck-up' );
							}
						}
						if ( onUpdateKeep === true ) {
							if ( _ref.progress * _ref.end > offset ) {
								stickyElem.addClass( 'slidedown stuck' );
							} else if ( _ref.progress * _ref.end === 0 ) {
								stickyElem.removeClass( 'slidedown stuck' );
							}
						}
					};
					args.onLeaveBack = function (_ref) {
					   stickyElem.removeClass( 'stuck-up stuck-full stuck' );
					};
			    }
			    ScrollTrigger.matchMedia({
					"(min-width: 768px)": function() {
						if ( media === 'd' ) {
			    			zeenPrv.stickies.push( ScrollTrigger.create( args ) );
			    		}
					},
					"(max-width: 1199px)": function() {
						if ( media === 'm' ) {
			    			zeenPrv.stickies.push( ScrollTrigger.create( args ) );
			    		}
					},
				});
			});
		},
		liveSearchTr: function( e ) {
			e.preventDefault();
			$( this ).closest( '.search-form-wrap' ).find( '> form' ).trigger( 'submit' );
		},
		liveSearch: function( e, args ) {
			if ( typeof( args ) === 'undefined' ) {
				args = {
					'field': zeenPrv.$modalSearchField,
		        	'wrapper': zeenPrv.$modalSearch,
		        	'results': zeenPrv.$modalSearchFound
		        };
			}
			if ( zeenPrv.timer ) {
                clearTimeout( zeenPrv.timer );
            }
            if ( $.inArray( e.keyCode, zeenPrv.ignoreCodes ) === -1  ) {
                zeenPrv.timer = setTimeout( function(){ zeenPrv.searchAjax( args ); }, 800 );
            }

		},
		searchAjax: function( args ) {
			var typing = args.field.val();
			args.wrapper.removeClass( 'with-results' );
            if ( typing.length < 2 ) {
				args.wrapper.addClass( 'zero-typo' );
            	return;
            }
            var ppp = zeenJS.args.searchPpp;
            var child = 0;
            if ( typeof( args.ppp ) !== 'undefined' ) {
            	ppp = args.ppp;
            	child = 1;
            }

			$.ajax({
			    method: "GET",
			    url: zeenJS.root + 's?kw=' + typing + '&ppp=' + ppp,
			    dataType: 'html',
			    beforeSend: function( xhr ) {
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			        args.wrapper.css( 'height', args.wrapper.height() );
			    },
			    success : function( response ) {
			    	args.results.empty();
			    	args.results.append( response );
			    	args.wrapper.removeClass( 'zero-typo' );
			    	var articles = args.results.find( 'article' );
			    	if ( articles.length === 0 ) {
			    		args.wrapper.addClass( 'no-results-found' );
			    	} else {
			    		args.wrapper.removeClass( 'no-results-found' );
			    		if ( ( articles.length + 1 ) % 3 === 0 ) {
				    		args.results.find( '.block' ).append( '<article></article>' );
				    	}
			    	}

			    	articles.imagesLoaded( function() {
						zeenPrv.blockAni();
						args.wrapper.css( 'height', 'auto' );
					});
					args.wrapper.addClass( 'with-results with-results-cache' );
			    },
			    fail : function( response ) {
			        console.log( 'ERROR', response );
			    }
			});
		},
		mediaPlay: function() {
			zeenPrv.video.play();
			zeenPrv.audio.play();
		},
		mediaStop: function() {
			zeenPrv.audio.pause();
			zeenPrv.video.pause();
		},
		subL: function() {
			if ( zeenJS.args.subL === false || Cookies.get( 'subL' ) === 'off' ) {
				return;
			}
			document.documentElement.addEventListener( 'mouseleave', zeenPrv.subE, zeenPrv.$listener );
		},
		modalSubscribe: function() {
			zeenPrv.$modal.addClass( 'active active-4' ).removeClass( 'inactive' );
			zeenPrv.$body.addClass( 'modal-active' );
			setTimeout( function() {
				zeenPrv.$modal.find( '.content-subscribe input[type=email]' ).trigger( 'focus' );
			}, 400 );
		},
		modalOn: function( e ) {
			e.preventDefault();
			var trigger = $( this ),
				modalData = trigger.data(),
				modalOutput;
			if ( ! zeenPrv.$body.hasClass( 'modal-skin-2' ) ) {
				if ( modalData.type == 'frame' || modalData.type == 'qv' || modalData.type == 'embed' || modalData.type == '46' ) {
					zeenPrv.$modal.addClass('dark-overlay').removeClass('light-overlay');
				} else {
					zeenPrv.$modal.addClass('light-overlay').removeClass('dark-overlay');
				}
			}

			if ( modalData.type == 'frame' || modalData.type == 'embed' || modalData.type == '46' ) {
				if ( modalData.source == 'ext' ) {
					if ( modalData.src === '' ) {
						modalOutput = '<span class="embed-error">' + zeenJS.i18n.embedError + '</span>';
					} else {
						modalOutput = '<iframe title="media" width="560" height="315"  class="frame" src="' + modalData.src + '" frameborder="0" seamless="seamless" allow="autoplay" allowfullscreen></iframe>';
					}
				} else {
					if ( modalData.format === 'audio' ) {
						if ( zeenPrv.audio.canPlayType( 'audio/mpeg;' ) ) {
						    zeenPrv.audio.type= 'audio/mpeg';
						    if ( modalData.srcA !== '' ) {
		                        zeenPrv.audio.src = modalData.srcA;
		                    }
						} else {
						    zeenPrv.audio.type= 'audio/ogg';
						     if ( modalData.srcB !== '' ) {
		                        zeenPrv.audio.src = modalData.srcB;
		                    }
						}
						zeenPrv.audio.controls = true;
						modalOutput = zeenPrv.audio;
						zeenPrv.audio.setAttribute( 'controlsList', 'nodownload' );
						zeenPrv.audio.setAttribute( 'data-pid', modalData.pid );
						zeenPrv.mediaPlay();
					}
					if ( modalData.format === 'video' ) {
						if ( zeenPrv.video.canPlayType( 'video/mp4;' ) ) {
						    zeenPrv.video.type= 'video/mp4';
						    if ( modalData.srcA !== '' ) {
		                        zeenPrv.video.src = modalData.srcA;
		                    }
						} else {
						    zeenPrv.video.type= 'video/ogg';
						     if ( modalData.srcB !== '' ) {
		                        zeenPrv.video.src = modalData.srcB;
		                    }
						}
						zeenPrv.video.setAttribute( 'controls', 'controls' );
						zeenPrv.video.setAttribute( 'controlsList', 'nodownload' );
						zeenPrv.mediaPlay();
						modalOutput = zeenPrv.video;
					}
					setTimeout(function() {
						zeenPrv.$modalCustom.addClass( 'ani-in' );
					}, 350);
				}
			}
			if ( modalData.type == 'frame' ) {
				zeenPrv.audio = new Audio();
				zeenPrv.video = document.createElement( 'video' );
				zeenPrv.$modalCustom.addClass( 'is-' + modalData.format ).append( modalOutput );
				zeenPrv.$modal.addClass( 'active active-1' ).removeClass( 'inactive' );
				zeenPrv.$body.addClass( 'modal-active' );
					zeenPrv.$modalCustom.addClass( 'tipi-spin ani-in' );
				if ( modalData.source == 'ext' ) {
					zeenPrv.$modalCustom.find('iframe').on( 'load', function() {
						zeenPrv.$modalCustom.addClass( 'frame-ldd' ).removeClass('tipi-spin');
					});
				} else {
					var obj = zeenPrv.$modalCustom.find( 'audio, video' );
					obj.on('loadstart', function() {
						zeenPrv.$modalCustom.addClass( 'frame-ldd' ).removeClass('tipi-spin');
					});
				}
			}

			if ( modalData.type == 'embed' ) {
				var  embedTarget = trigger.closest( '.hero-wrap' );
				if ( typeof modalData.target !== 'undefined' && modalData.target !== 'hero-wrap' ) {
					embedTarget = embedTarget.find( $( modalData.target ) );
				}
				if ( embedTarget.hasClass( 'active-embed' ) ) {
					return;
				}
				var targetVal = parseInt( Math.random() * ( 9999 - 1000) + 1000 );
				embedTarget.append( '<div id="frame-wrap-' + targetVal + '" class="frame-wrap media-wrap-' + modalData.format + '"></div>' ).addClass( 'active-embed is-' + modalData.format ).removeClass( 'inactive-embed' );
				$( '#frame-wrap-' + targetVal ).append(modalOutput );
			}

			if ( modalData.type == '46' ) {
				var triggerArticle = trigger.closest( 'article' );
				if ( triggerArticle.hasClass( 'playing' ) ) {
					return;
				}
				var targetBlockWrap = $( '#block-wrap-' + modalData.target );
				var targetBlockPiece1 = targetBlockWrap.find( '.block-piece-1' );
				var target = targetBlockPiece1.find( '.mask' );
				targetBlockPiece1.addClass( 'loading-embed' ).removeClass( 'active-embed' );
				target.html( '<div class="frame-wrap-46-pad"><div id="frame-wrap-' + modalData.target + '" class="frame-wrap tipi-spin frame-wrap-46"></div></div>' );
				$( '#frame-wrap-' + modalData.target ).append(modalOutput );

				setTimeout( function() {
					targetBlockPiece1.addClass( 'active-embed embed-ldd-once' );
				}, 150 );

				if ( trigger.hasClass( 'icon-size-s' ) ) {
					triggerArticle.addClass( 'playing' ).siblings().removeClass( 'playing' );
				}
			}

			if ( modalData.type == 'search' ) {
				zeenPrv.$modal.addClass( 'active active-3' ).removeClass( 'inactive' );
				zeenPrv.$body.addClass( 'modal-active' );
				if ( zeenPrv.$winWidth > 1024 ) {
					setTimeout( function() {
						zeenPrv.$modalSearchField.trigger( 'focus' );
					}, 500 );
				}
			}

			if ( modalData.type == 'subscribe' ) {
				zeenPrv.modalSubscribe();
			}

			if ( modalData.type == 'lwa' ) {
				zeenPrv.$modal.addClass( 'active active-2' ).removeClass( 'inactive' );
				zeenPrv.$body.addClass( 'modal-active' );
				setTimeout( function() {
					zeenPrv.$modal.find( '.lwa-username > input' ).trigger( 'focus' );
				}, 700 );
			}

			if ( modalData.type == 'search-drop' ) {
				zeenPrv.activeFocus( trigger.closest( '.drop-search-wrap' ), 'active-search' );
				setTimeout( function() {
					trigger.parent().find( '.search-field' ).trigger( 'focus' );
				}, 250 );
			}

			if ( modalData.type == 'qv' ) {
                zeenPrv.$modal.addClass( 'active active-qv' ).removeClass( 'inactive' );
                zeenPrv.$body.addClass( 'modal-active' );
                zeenPrv.ajaxCall = $.ajax({
                    method: "GET",
                    dataType: 'html',
                    url: zeenJS.root + 'qv?id=' + modalData.pid,
                    beforeSend: function( xhr ) {
                        zeenPrv.$modal.addClass( 'tipi-spin' );
                        zeenPrv.$modalCustom.empty().removeClass( 'is-video is-audio' );
                    },
                    success : function( response ) {
                        zeenPrv.$modalCustom.html( response );
                        zeenPrv.$modalCustom.find( 'img' ).imagesLoaded().always( function( instance ) {
							zeenPrv.$modal.removeClass( 'tipi-spin' );
							setTimeout( function() {
								zeenPrv.$modalCustom.addClass( 'ani-in' );
							}, 50 );
						});
						var forms = zeenPrv.$modalCustom.find('.variations_form');
						$( document ).trigger( 'zeenQVSuccess', {
							forms: forms
						} );
						forms.each( function() {
							$(this).find('.tipi-tip').addClass('modal-tip').on( 'mouseenter', zeenPrv.toolTipInit );
						});
                    },
                    fail : function( response ) {
                       console.log( 'ERROR', response );
                    }
                });
            }
            return false;
		},
		modalOff: function( e ) {
			if ( typeof( e ) !== 'undefined' ) {
				e.preventDefault();
			}
			zeenPrv.closeSlideMenu( e );
			zeenPrv.mediaStop();
			var to = 0;
			if ( zeenPrv.$modalCustom.hasClass( 'ani-in' ) ) {
				zeenPrv.$modalCustom.removeClass( 'ani-in' );
				to = 220;
			}
			setTimeout( function() {
				zeenPrv.$modal.removeClass( 'active active-qv active-4 active-3 active-2 active-1' ).addClass( 'inactive' );
				zeenPrv.$body.removeClass( 'modal-active' );
				zeenPrv.$timedPup.removeClass( 'active' );
			}, to);
			setTimeout( function() {
				zeenPrv.$modalCustom.empty().removeClass( 'is-video is-audio' );
			}, to * 1.5 );

			setTimeout( function() {
				zeenPrv.$modalSearch.removeClass( 'with-results-cache with-results' );
				zeenPrv.$modalSearchField.val( '' );
			}, 600 );

			if ( zeenPrv.$body.hasClass( 'sub-l' ) ) {
				zeenPrv.turnItOff( 5 );
			}
			if ( zeenPrv.$body.hasClass( 'sub-pup' ) ) {
				zeenPrv.turnItOff( 6 );
			}
			$( document ).trigger( 'zeenModalOff' );
		},
		parallax3s: function( override ) {
			if ( this.$body.hasClass( 'tipi-builder-frame-inner' ) && override !== true ) {
				return;
			}
			var $parallax = $( '.block-65' );
			if ( $parallax.length === 0 || this.$winWidth < 480 ) {
				return;
			}
			$parallax.find( '> article' ).each( function( index, elem ) {
				var $elem = $( elem );
				if ( $elem.hasClass( 'parallaxed' ) ) {
					return true;
				}
				$elem.addClass( 'parallaxed' );
			 	$elem.imagesLoaded( function() {
					var elemOH = $elem.outerHeight( true );
					var $yData = $elem.hasClass( 'odd' ) ? elemOH * 0.35 : elemOH * 0.15;
					zeenPrv.paraSaved.push( gsap.timeline( {
						scrollTrigger: {
							trigger: $elem,
							end: "+=" + ( zeenPrv.$winHeight + elemOH ),
							scrub: true
						}
					}).fromTo( $elem.find( '> .preview-mini-wrap' ), {
						y: $yData + 'px',
						ease: "none",
					},
					{
						y: ( $yData * -1 ) + 'px',
						ease: "none",
					}) );
				});
			});
		},
		modalCheck: function() {
			var modalData = zeenPrv.$modal.data( 'fid' );
			if ( modalData !== '' && modalData === zeenPrv.$modal.find( '.mc4wp-form' ).attr('id') ) {
				zeenPrv.modalSubscribe();
			}
		},
		maskLoader: function( el ) {
			var ldd = typeof el === 'undefined' ? $( '.hero-wrap' ) : el.find( '.hero-wrap' );
			if ( ldd.length === 0 ) {
				return;
			}
			ldd.imagesLoaded( function() {
				ldd.addClass( 'mask-loaded' );
		    });
		},
		parallaxIt: function( override, el ) {
			var $parallaxIt = typeof el === 'undefined' ? $( '.parallax' ) : el.find('.parallax');
			if ( $parallaxIt.length === 0 || ( this.$body.hasClass( 'tipi-builder-frame-inner' ) && override !== true ) ) {
				return;
			}

			gsap.utils.toArray( $parallaxIt ).forEach(function (el, i) {
				if ( el.classList.contains( 'parallaxed' ) ) {
					return;
				}
				el.classList.add( 'parallaxed' );
				var args = {
					trigger: el,
					scrub: true
				};
				var img, imgWrap, hero = el.classList.contains( 'hero-wrap');
				if ( el.classList.contains( 'hero-43') || el.classList.contains( 'hero-19') ) {
					imgWrap = el.querySelectorAll( '.hero-background');
					img = imgWrap[0].querySelectorAll( 'img ');
				} else {
					img = el.querySelectorAll( 'img:not(.avatar)' );
					imgWrap = el.classList.contains( 'hero-wrap') ? el.querySelectorAll( '.hero') : el.querySelectorAll( '.mask');
				}
				if ( imgWrap.length === 0 ) {
					return;
				}
				var $img = $(img),
				$imgWrap = $(imgWrap);
				$imgWrap.css( 'height', '' );

				if ( hero === false ) {
					$img.imagesLoaded( function() {
						el.classList.add( 'mask-loaded' );
				    });
				} else {
					var parent = el.closest('.post-wrap').classList.contains( 'ipl-wrap' );
					args.top = parent === true ? 'top bottom' : 'top top';
				}

				var imgHeight = imgWrap[0].offsetHeight, movement = imgHeight * 0.2;
				if ( el.classList.contains( 'parallax--resized' ) ) {
					$img.css( 'top', imgHeight * -0.1 );
					$imgWrap.css( 'height', parseInt( imgHeight * 0.8 ) + 'px' );
				}
				if ( el.classList.contains( 'parallax-tight' ) ) {
					movement = imgHeight * 0.16;
				} else if ( zeenPrv.$winHeight > zeenPrv.$winWidth ) {
					movement = imgHeight * 0.125;
				}
				if ( img.length > 0 ) {
					zeenPrv.roP = true;
					zeenPrv.resizeObs();
					zeenPrv.paraSaved.push( gsap.timeline( { scrollTrigger: args }).fromTo( img[0], {
						y: ( movement * -1 ) + 'px',
						ease: "none",
					},
					{
						y: movement + 'px',
						ease: "none",
					} ) );
				}

			});
		},
		resizeObs: function() {
			if ( 'ResizeObserver' in window && zeenPrv.ro === false ) {
				var obsHeight = 0;
				zeenPrv.ro = true;
				new ResizeObserver( function ( entries ) {
					var newHeight = entries[0].contentRect.height;
					if ( parseInt( newHeight ) !== obsHeight ) {
						if ( zeenPrv.roP === true ) {
							zeenPrv.parallaxRefresh();
						}
						if ( zeenPrv.roS === true ) {
							zeenPrv.reSidebars();
						}
						obsHeight = parseInt( newHeight );
					}
				}).observe( zeenPrv.$page[0] );
			}
		},
		parallaxItBg: function( el ) {
			var bgPar = typeof el === 'undefined' ? this.$content.find( '.has-bg-img' ) : el.find( '.has-bg-img' );
			if ( bgPar.length === 0 ) {
				return;
			}
			bgPar.each( function( index, element ){
				var $elem = $( this );
				var $imgTag = $elem.find( '> .img-bg-wrapper' );
				if ( $imgTag.length === 0 ) {
					$imgTag = $elem.find( '> div > .img-bg-wrapper' );
				}
				var tween = $imgTag.find('.bg');
				$imgTag.imagesLoaded( { background: true }, function() {
		        	if ( $imgTag.hasClass( 'bg-parallax' ) && ! $elem.hasClass( 'parallaxed' ) ) {
		        		zeenPrv.paraSaved.push( gsap.timeline({
							scrollTrigger: {
								trigger: $imgTag,
								scrub: true
							}
						}).fromTo( tween[0], {
							yPercent: -20,
							ease: "none",
						},
						{
							yPercent: 20,
							ease: "none",
						} ) );
						$elem.addClass( 'parallaxed' );
		        	}
		        	setTimeout(function() {
		        		$elem.addClass( 'bg-img-ldd' );
		        	}, 200);
		        });
			});
		},
		hero31: function() {
			if ( this.$hero31.length === 0 ) {
				return;
			}
			var $figure;
			if ( this.$hero31.closest( '.post-wrap' ).hasClass( 'format-gallery' ) ) {
			 	$figure = this.$hero31.find( '> .slider' );
				this.doHero31( $figure );
			} else {
			 	$figure = this.$hero31.find( '.fi-bg' );
				$figure.imagesLoaded( { background: true }, function() {
					$figure.addClass('fi-bg-ldd');
					gsap.to( $figure, 0.3, { opacity: 1 } );
					setTimeout(function() {
						zeenPrv.doHero31( $figure );
					}, 300);
				});
			}
		},
		doHero31: function( $figure ) {
			var height = this.$winHeight - this.$wpAdminBarHeight;
			if ( zeenPrv.$winWidth > 767 ) {
				height -= this.$headerHeight - this.$siteNav.outerHeight() - this.$secondaryWrap.outerHeight();
			} else {
				height -= this.$mobHead.outerHeight();
			}
			height -= this.$winHeight * 0.1;
			this.$hero31.parent().height( height );

			var ST = gsap.timeline( {
				scrollTrigger: {
				    trigger: this.$body,
				    scrub: true,
				    start: 'top top',
				    end: this.$winHeight * 0.1 + 'px',
				}
			}).fromTo( $figure, {
				opacity: '1',
				ease: "none",
			},
			{
				opacity: zeenJS.args.heroFade,
				ease: "none",
			}).fromTo( this.$hero31.find( '.mask-overlay' ), {
				opacity: '0',
				ease: "none",
			},
			{
				opacity: 1,
				ease: "none",
			});
		},
		loadMoreButton: function( e ) {
			e.preventDefault();
			var $elem = $( this ),
				$elemData = $elem.data();
			if ( $elem.hasClass( 'loaded' ) ) {
				return;
			}
			zeenPrv.loadMore( $elem, $elemData );
		},
		infScr: function() {
			var infScr = $( '.inf-scr' );
			if ( infScr.length === 0 ) {
				return;
			}
			var $elem, $elemData;
			var mnp = infScr.first().data( 'mnp' );

			infScr.each( function( index, elem ) {
				$elem = $( elem );
				var $block = $elem.closest( '.block-wrap' );
				if ( $elem.hasClass( 'loaded' ) || $elem.hasClass( 'inf-load-more' ) || ( $block.hasClass( 'dt-off' ) && zeenPrv.$winWidth > 767 ) || ( $block.hasClass( 'mob-off' ) && zeenPrv.$winWidth < 768 ) ) {
					return;
				}
				$elemData = $elem.data();
				$elemData.mnp = mnp;
				var masonry = ! $block.hasClass( 'block-wrap-masonry' );
				var ST = ScrollTrigger.create({
				    trigger: $elem,
				    start: "-=500 bottom",
				    once: masonry,
				    onEnter: (function (_ref) {
						zeenPrv.loadMore( $elem, $elemData );
						$elem.addClass( 'loaded' );
						zeenPrv.infStRefresh();
					})
				});
				if ( masonry === false ) {
					zeenPrv.infST.push( ST );
				}
			});
		},
		loaded: function() {
			if ( this.$body.hasClass('body--dark--tr') && this.$body.hasClass('skin-light') ) {
				this.skinMode( undefined );
			}
			this.slideInP();
			this.subL();
			this.timedPup();
			this.verticalMenus();
			this.iFrameLazy();
		},
		likes: function( e ){
			e.preventDefault();
			var elem = $( this );
			if ( elem.hasClass( 'liking' ) || elem.hasClass( 'liked' ) ) {
				return;
			}
			var data = elem.data();
			$.ajax({
			    method: "POST",
			    data: { 'pid': data.pid },
			    url: zeenJS.root + 'lk',
			    beforeSend: function( xhr ) {
			    	elem.addClass( 'liking' );
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			    },
			    success : function( response ) {
			    	elem.removeClass( 'liking' ).addClass( 'liked' );
			    	elem.find( '.tipi-value' ).html( response[0] );
			    	var checker = Cookies.getJSON( 'wp_liked_articles' );
			    	if ( typeof checker === 'undefined' ) {
			    		checker = response[1];
			    	} else {
			    		checker.push( response[1][0] );
			    	}
			    	Cookies.set( 'wp_liked_articles', checker, { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			    },
			    fail : function( response ) {
			        console.log( 'ERROR', response );
			    }
			});
		},
		upDown: function( e ) {
			e.preventDefault();
			var _this = $(this),
				type = _this.data( 'type' ),
				_thisP = _this.closest('.zeen-up-down'),
				pid = _thisP.data( 'pid' );
			$.ajax({
			    method: 'POST',
			    data: {
			    	type: type,
			    	pid: pid,
			    },
			    url: zeenJS.root + 'ud',
			    beforeSend: function( xhr ) {
			    	_thisP.addClass( 'updown-do' );
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			    },
			    success: function( response ) {
				    _thisP.find('.zeen__up .updown-count').html( response['upNew'] );
				    _thisP.find('.zeen__down .updown-count').html( response['downNew'] );
			    	Cookies.set( 'updown', JSON.stringify( response['cook'] ), { sameSite: 'lax', expires: 30 });
			    	_thisP.removeClass( 'updown-do' );
			    },
			    error: function( response ) {
			        console.log( 'ERROR', response.responseText );
			    }
			});
		},
		reaction: function( e ) {
			e.preventDefault();
			var _this = $(this),
				reaction = _this.data( 'reaction' ),
				_thisP = _this.closest('.reaction-wrap'),
				pid = _thisP.data( 'pid' );
			$.ajax({
			    method: 'POST',
			    data: {
			    	reaction: reaction,
			    	pid: pid,
			    },
			    url: zeenJS.root + 'rt',
			    beforeSend: function( xhr ) {
			    	_thisP.addClass( 'reacting--active' );
			    	_this.addClass( 'reacting' );
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			    },
			    success: function( response ) {
					if ( parseInt( response.countStyle ) === 2 ) {
						var oldScore = _this.find('.count').data('old-score');
						if ( typeof oldScore === 'undefined' ) {
							_this.find('.count').data('old-score', _this.find('.count').html() );
							if ( response.vote === 1 ) {
								_this.find('.count').html( '+1' );
							} else {
								_this.find('.count').html( '-1' );
							}
						} else {
							_this.find('.count').html( _this.find('.count').data('old-score') ).removeData( 'old-score' );
						}
					} else {
						_this.find('.count').html( response.newScore );
					}
			    	Cookies.set( 'reaction', JSON.stringify( response.cook ), { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
			    	_thisP.removeClass( 'reacting--active' );
			    	_this.removeClass( 'reacting' );
			    	_this.toggleClass( 'reacted' );
			    },
			    error: function( response ) {
			    	thisP.removeClass( 'reacting--active' );
			    	_this.removeClass( 'reacting' );
			        console.log( 'ERROR', response.responseText );
			    }
			});
		},
		ipl: function(){
			var $ipl = $( '.ipl' );
			if ( $ipl.length === 0 || ( zeenJS.args.iplMob !== true && zeenPrv.$winWidth < 768 ) ) {
				return;
			}
			$ipl.each( function( index, elem ) {
				elem = $( this );
				var data = elem.data();
				if ( elem.hasClass( 'loaded' ) ) {
					return;
				}
				ScrollTrigger.create({
				    trigger:  $( elem ),
				    start: "-=" + ( zeenPrv.$winHeight * 2  ) + " center",
				    once: true,
				    onEnter: (function (_ref) {
						zeenPrv.runIpl( elem, data );
						elem.addClass( 'loaded' );
					})
				});
			});
		},
		updateHref: function( title, url ) {
			if ( zeenJS.args.infUrlChange === false ) {
				return;
			}
			window.history.pushState( '', title, url );
			if ( title !== '' ) {
				document.title = title;
			}
		},
		GA: function( url ) {
			var index = url.indexOf(zeenJS.args.siteUrl);
			if ( index !== -1 ) {
				url = url.slice(0, index) + url.slice(index + zeenJS.args.siteUrl.length);
			}
			if ( typeof _gaq !== 'undefined' && _gaq !== null ) {
                _gaq.push(['_trackPageview', url]);
            }
            if ( typeof ga !== 'undefined' && ga !== null ) {
                ga( 'send', 'pageview', url );
            }
		},
		subE: function( e ) {
			if ( Cookies.get( 'subL' ) === 'off' && zeenJS.args.subCookie === true ) {
				document.documentElement.removeEventListener( 'mouseleave', zeenPrv.subE, zeenPrv.$listener );
				return;
			}
			if ( zeenPrv.$body.hasClass( 'modal-active' ) || e.clientY > 0 ) {
				return;
			}
			zeenPrv.$body.addClass( 'sub-l' );
			zeenPrv.modalSubscribe();
		},
		runIpl: function( elem, data ) {
			if ( typeof( data ) === 'undefined' ) {
				elem = $( this );
				data = elem.data();
			}
			var method = zeenJS.args.iplCached === true ? "GET" : "POST";
			$.ajax({
			    method: method,
			    data: { 'pid': data.pid, ipl: true },
			    dataType: 'html',
			    url: zeenJS.root + 'ipl',
			    beforeSend: function( xhr ) {
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			    },
			    success : function( response ) {
				    zeenPrv.$primary.append( response );
				    var $currentPost = zeenPrv.$primary.find( '> .post-' + data.pid );

				    var rect = $currentPost[0].getBoundingClientRect(),
						scrollTop = window.pageYOffset || document.documentElement.scrollTop,
					    height = rect.top + scrollTop;
				    if ( zeenPrv.$winWidth > 767 ) {
			        	height -= 180;
					    if ( zeenPrv.$header.hasClass( 'sticky-menu-1' ) || zeenPrv.$header.hasClass( 'sticky-menu-3' )  ) {
			        		height -= zeenPrv.$headerHeight;
			        	}
			        	if ( zeenPrv.$siteNav.hasClass( 'sticky-menu-1' ) || zeenPrv.$siteNav.hasClass( 'sticky-menu-3' ) ) {
			        		height -= zeenPrv.$siteNav.outerHeight();
			        	}
					}
		        	if ( scrollTop > height ) {
						window.scrollTo( 0, height );
					}
					$( document ).trigger( 'zeenAfterInfinitePostLoad', {
					    postid: data.pid,
					} );
					zeenPrv.blockAni();
					zeenPrv.tempAni();
					zeenPrv.iFrameLazy();
					zeenPrv.lrTempAni();
					zeenPrv.sliderInit();

					for ( var i = zeenJS.args.ipl.length - 1; i >= 0; i-- ) {
		                $.get(zeenJS.args.pluginsUrl + '/' + zeenJS.args.ipl[i]);
		            }
		            if ( typeof window.instgrm !== 'undefined' ) {
					    window.instgrm.Embeds.process();
					}

		            if ( zeenJS.args.fbComs === true && zeenJS.args.iplComs === true ) {
		            	FB.XFBML.parse( $currentPost[0] );
		            }
		            var asr;

		            ScrollTrigger.create({
					    trigger: elem,
					    start: "top center",
					    onLeaveBack: (function (_ref) {
							if ( zeenJS.args.disqus !== false ) {
								asr = zeenPrv.$primary.find( '> .post-' + data.pidori +  ' .disqus-replace');
								if ( asr.length > 0 ) {
									$('#disqus_thread').attr('id', '' ).addClass( 'disqus-replace' );
									asr.attr( 'id', 'disqus_thread' );
									setTimeout(function() {
						            	DISQUS.reset({
										  reload: true,
										  config: function () {
										    this.page.identifier = data.pidori;
										    this.page.url = data.prev;
										    this.page.title = data.titlePrev;
										  }
										});
						            }, 50);
					            }
				            }
							if ( zeenPrv.$progress.length > 0 ) {
								zeenPrv.$progress.css( 'background-color', data.prevHex );
							}
							zeenPrv.updateHref( data.titlePrev, data.prev );
							zeenPrv.GA( data.prev );
							zeenPrv.$iplTitle.html( data.titlePrev );
							if ( zeenPrv.$stickyP2Share.length > 0 ) {
								zeenPrv.$stickyP2Share.find( '.share-button-tw' ).attr( 'href', 'https://twitter.com/share?url=' + encodeURIComponent( data.prev ) );
								zeenPrv.$stickyP2Share.find( '.share-button-fb' ).attr( 'href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent( data.prev ) );
							}

							if ( zeenPrv.$mobBotShare.length > 0 ) {
								zeenPrv.$mobBotShare.find( '.share-button-tw' ).attr( 'href', 'https://twitter.com/share?url=' + encodeURIComponent( data.prev ) );
								zeenPrv.$mobBotShare.find( '.share-button-fb' ).attr( 'href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent( data.prev ) );
								zeenPrv.$mobBotShare.find( '.share-button-msg' ).attr( 'href', 'fb-messenger://share/?link=' + encodeURIComponent( data.prev ) );
								zeenPrv.$mobBotShare.find( '.share-button-wa' ).attr( 'href', 'whatsapp://send?text=' + data.titlePrev + ' – ' + encodeURIComponent( data.prev ) );
							}
					    }),
					    onEnter: (function (_ref) {
							if ( zeenPrv.$progress.length > 0 ) {
								zeenPrv.$progress.css( 'background-color', data.nextHex );
							}
							zeenPrv.updateHref( data.titleNext, data.next );
							zeenPrv.GA( data.next );
							zeenPrv.$iplTitle.html( data.titleNext);
							if ( zeenPrv.$stickyP2Share.length > 0 ) {
								zeenPrv.$stickyP2Share.find( '.share-button-tw' ).attr( 'href', 'https://twitter.com/share?url=' + encodeURIComponent( data.next ) );
								zeenPrv.$stickyP2Share.find( '.share-button-fb' ).attr( 'href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent( data.next ) );
							}
							if ( zeenPrv.$mobBotShare.length > 0 ) {
								zeenPrv.$mobBotShare.find( '.share-button-tw' ).attr( 'href', 'https://twitter.com/share?url=' + encodeURIComponent( data.next ) );
								zeenPrv.$mobBotShare.find( '.share-button-fb' ).attr( 'href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent( data.next ) );
								zeenPrv.$mobBotShare.find( '.share-button-msg' ).attr( 'href', 'fb-messenger://share/?link=' + encodeURIComponent( data.next ) );
								zeenPrv.$mobBotShare.find( '.share-button-wa' ).attr( 'href', 'whatsapp://send?text=' + data.titleNext + ' – ' + encodeURIComponent( data.next ) );
							}

				            if ( zeenJS.args.disqus !== false ) {
				            	asr = $currentPost.find( '.disqus-replace');
								if ( asr.length > 0 ) {
				            		$('#disqus_thread').attr('id', '' ).addClass( 'disqus-replace' );
									asr.attr( 'id', 'disqus_thread' );
				            		setTimeout(function() {
						            	DISQUS.reset({
										  reload: true,
										  config: function () {
										    this.page.identifier = data.pid;
										    this.page.url = data.next;
										     this.page.title = data.titleNext;
										  }
										});
						            }, 50 );
					            }

				            }

						})
					});
			        ScrollTrigger.create({
					    trigger: elem,
					    start: "top bottom",
					    once: true,
					    onEnter: (function (_ref) {
					    	zeenPrv.$stickyP2.addClass('ipl-done');
							$currentPost.removeClass( 'ipl-loading' );
							$currentPost.prev().addClass('ipl-bg');
							setTimeout(function() {
								zeenPrv.parallaxIt( null, $currentPost );
								zeenPrv.parallaxItBg( $currentPost );
								zeenPrv.maskLoader( $currentPost );
							}, 500 );
							setTimeout(function() {
								zeenPrv.sidebars();
								zeenPrv.stickyEl();
								zeenPrv.imgControl();
								zeenPrv.lightboxInit();
							}, 750);
							setTimeout(function() {
				       			zeenPrv.postTracks();
							}, 900);
					    })
					});
			        zeenPrv.$entryContent = $( '.entry-content:not(.progresson)' );
			       	zeenPrv.videoWrap();
			       	zeenPrv.stickyEl();
			       	zeenPrv.loopAni();
					zeenPrv.ipl();

					if ( zeenPrv.$primary.find( '.no-more-articles-wrap').length > 0 ) {
						$( '#ipl-loader' ).addClass( 'ipl-end' );
					}
					if ( ( zeenPrv.$skinMode.length > 0 && zeenPrv.$skinMode.hasClass( 'triggered' ) ) || zeenPrv.$body.hasClass('body--dark--tr') ) {
						var reviewBlocks = $currentPost.find( '.lets-review-block__wrap' );
						if ( zeenPrv.$skinMode.hasClass( 'mode--alt' ) || zeenPrv.$body.hasClass('body--dark--tr') ) {
							$currentPost.removeClass( 'article-layout-skin-1' ).addClass( 'article-layout-skin-2' );
							reviewBlocks.removeClass('lets-review-skin-1').addClass('lets-review-skin-2');
						} else {
							reviewBlocks.each( function() {
								var _this = $(this);
								if ( parseInt( _this.data('skin') ) === 1 ) {
									_this.removeClass('lets-review-skin-2').addClass('lets-review-skin-1');
								}
							});
							$currentPost.removeClass( 'article-layout-skin-2' ).addClass( 'article-layout-skin-1' );
						}
					}
 			    },
			    fail : function( response ) {
			    	console.log( 'ERROR', response );
			    }
			});
			$( '.inf-scr' ).removeClass("active");
		},
		blockMore: function( e, _ref ) {
			var $elem = typeof _ref === 'undefined' ? $( this ) : _ref;
			if ( ! $elem.hasClass( 'block-mm-changer' ) ) {
				e.preventDefault();
			}
			if ( $elem.hasClass( 'no-more' ) || $elem.hasClass( 'active' ) ) {
				return;
			}
			var $elemPa, $elemMenu, mm, mmChanger;
			if ( $elem.hasClass( 'block-mm-changer' ) ) {
				$elemMenu = $elem.closest( '.menu' );
				if ( parseInt( $elemMenu.data( 'mm' ) ) < 10 || parseInt( $elemMenu.data( 'mm' ) ) > 50 ) {
					return;
				}
				$elemPa = $elemMenu.find( '.block-wrap' );
				mm = true;
				mmChanger = true;
			}  else {
				$elemPa = $elem.closest( '.block-wrap' );
				if ( $elemPa.parent().hasClass( 'menu-wrap' ) ) {
					mm = true;
				}
			}

			var data = $elem.data(),
				parentData = $elemPa.data();
			var $blockData = $( '#block-wrap-' + parentData.id );
			var $blockLoading = $blockData.find( '> div' );
			if ( $blockLoading.hasClass( 'loading' ) ) {
				return;
			}

			var changer = $elem.hasClass( 'block-changer' ) ? true : false,
				dataDir = typeof( data.dir ) !== 'undefined' && data.dir === 1 ? 1 : 2,
				trigger_type = typeof( data.dir ) === 'undefined' ? 1 : 2,
				append = trigger_type,
				paged, loaders,
				term = { term: data.term, id: data.tid },
				setter = 'zeen_' + parentData.id;

			if ( window[setter].target !== 0 && ( typeof( data.tid ) === 'undefined' || data.tid === 0 ) ) {
				setter = setter + '_' + window[setter].target;
			}

			if ( data.tid > 0 ) {
				setter = setter + '_' + data.tid;
				if ( typeof( window[setter] ) === 'undefined' ) {
					window[setter] = $.extend( true, {}, window['zeen_' + parentData.id ] );
		        	window[setter].args.cat = '';
			    	window[setter].args.tag__in = '';
			    	window[setter].args.post__in = '';
			    	window[setter].term = '';
			    	if ( data.term === 'category' ) {
			    		window[setter].args.cat = data.tid;
			    	} else if ( data.term === 'post_tag' ) {
			    		window[setter].args.tag__in = data.tid;
			    	} else {
			    		window[setter].args.tax_query = {taxonomy: term.term, field: 'term_id', 'terms': term.id };
			    		window[setter].term = term;
			    	}
				}
				window['zeen_' + parentData.id ].target = data.tid;
			}
			if ( data.reset === 1 ) {
				setter = 'zeen_' + parentData.id;
				window[setter].target = 0;
			}
			var title = data.title,
				reset = data.reset,
				subtitle = data.subtitle,
				newUrl = data.ur,
				$elemN = $elemPa.find( '.block-more-2' ),
				$elemP = $elemPa.find( '.block-more-1' ),
				mnp;
			if ( $elemN.length === 0 ) {
				$elemN = $elemPa.find( '.block-more-3' );
			} else {
				if ( typeof data.term !== 'undefined' ) {
					$elemN.data({ term: data.term, tid: data.tid } );
					$elemP.data({ term: data.term, tid: data.tid } );
				} else {
					$elemN.removeData( 'term' ).removeData( 'tid' );
					$elemP.removeData( 'term' ).removeData( 'tid' );
				}
			}
			if ( changer === true ) {
				paged = 1;
				append = 2;
				if ( $elem.hasClass( 'block-mm-changer' ) ) {
					$elemMenu.find( '.active' ).removeClass( 'active' );
				} else {
					var $sorter = $elem.closest( '.sorter' );
					$sorter.find( '.block-changer' ).removeClass( 'active' );
					$sorter.find( '.current-txt' ).html( data.sorttitle + zeenJS.args.iconSorter );
				}
				if ( $elem.hasClass( 'block-mm-init' ) ) {
					$elemMenu.find( '.block-mm-init' ).removeClass( 'block-mm-init' );
				}
				$elem.addClass( 'active' );
				window[setter].next = 2;
				window[setter].prev = 0;
				mnp = data.mnp;
				if ( mnp === 1 ) {
					loaders = 'off';
				}
			} else {
				mnp = window[setter].mnp;
		    	if ( dataDir === 1 ){
		    		paged = window[setter].prev;
		    		window[setter].prev = parseInt( window[setter].prev ) - 1;
		    		window[setter].next = parseInt( window[setter].next ) - 1;
		    	} else {
		    		paged = window[setter].next;
		    		window[setter].prev = parseInt( window[setter].prev ) + 1;
		    		window[setter].next = parseInt( window[setter].next ) + 1;
		    	}
		    }

			var blockData = window[setter],
				args = { blockData: blockData, $blockData: $blockData, $elemN: $elemN, $elemP: $elemP, dir: data.dir, changer: changer, trigger_type: trigger_type, append: append, loaders: loaders, title: title, newUrl: newUrl, reset: reset, subtitle: subtitle, response: '', mm: mm };
			$.ajax({
			    method: "GET",
			    data: {
					paged: paged,
					type: trigger_type,
					mm: mm,
					term: term,
					data: blockData,
				},
				dataType: 'html',
			    url: zeenJS.root + 'block',
			    beforeSend: function( xhr ) {
			    	if ( mmChanger === true ) {
			    		if ( $elemMenu.parent().find( '> a' ).data( 'ppp' ) >= data.count ) {
			    			args.loaders = 'off';
			    		}
			    	}

			    	$blockLoading.addClass( 'loading tipi-spin' );
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
			        if ( zeenPrv.ajaxChecker( setter + '_' + paged ) ) {
			        	args.response = zeenPrv.ajaxGetter( setter + '_' + paged );
						zeenPrv.ajaxLoadMore( args );

				    	if ( mmChanger === true ) {
				    		$elemPa.closest( '.mm-wrap' ).addClass( 'active-1' );
				    	} else if ( mm === true ) {
				    		$elemPa.closest( '.mm-wrap' ).removeClass( 'active-1' );
				    	}
				    	if ( append === 2 ) {
					    	if ( dataDir === 1 ) {
					    		$elemPa.removeClass( 'loaded block-ani-r' ).addClass( 'block-ani-l' );
					    	} else {
					    		$elemPa.removeClass( 'loaded block-ani-l' ).addClass( 'block-ani-r' );
					    	}
					    }
					    zeenPrv.reSidebars();
						$elemPa.addClass( 'loaded' );
						zeenPrv.parallaxRefresh();
						zeenPrv.videoWrap();
			        	return false;
			    	}
			    },
			    success : function( response ) {
			    	response = JSON.parse( response );
					args.response = response;
					zeenPrv.ajaxLoadMore( args );
					if ( mmChanger === true ) {
			    		$elemPa.closest( '.mm-wrap' ).addClass( 'active-1' );
			    	} else if ( mm === true ) {
			    		$elemPa.closest( '.mm-wrap' ).removeClass( 'active-1' );
			    	}
			    	zeenPrv.ajaxSetter( setter + '_' + paged, response );
					$elemPa.addClass( 'loaded' );
					zeenPrv.parallaxRefresh();
					zeenPrv.videoWrap();
					if ( append === 2 ) {
				    	if ( dataDir === 1 ) {
				    		$elemPa.removeClass( 'block-ani-r' ).addClass( 'block-ani-l' );
				    	} else {
				    		$elemPa.removeClass( 'block-ani-l' ).addClass( 'block-ani-r' );
				    	}
				    }
			    },
			    fail : function( response ) {
			        console.log( 'ERROR', response );
			    }
			});
			return false;
		},
		masonryAppend: function( $items, target ) {
			$items.each( function() {
				var item = $( this );
				if ( item.hasClass('masonry__col-1' ) ) {
					target.find( '.masonry__col-1' ).append( item.children('article') );
				} else if ( item.hasClass('masonry__col-2' ) ) {
					target.find( '.masonry__col-2' ).append( item.children('article') );
				} else if ( item.hasClass('masonry__col-3' ) ) {
					target.find( '.masonry__col-3' ).append( item.children('article') );
				} else if ( item.hasClass('pagination' ) ) {
					target.append( item );
				}
			});
		},
		ajaxLoadMore: function( args ) {
			var $items = $( args.response[1] );
			if ( typeof args.title !== 'undefined' || typeof args.subtitle !== 'undefined' ) {
				var titleTarget = args.$blockData.find( '.block-title-wrap' );
				if ( typeof args.title !== 'undefined' ) {
					if ( typeof args.newUrl !== 'undefined' ) {
						titleTarget.find( '.block-title-url' ).attr( 'href', args.newUrl ).html( args.title );
					} else {
						titleTarget.find( '.block-title' ).html( args.title );
					}
				}
				if ( typeof args.subtitle !== 'undefined' ) {
					titleTarget.find( '.block-subtitle' ).html( args.subtitle );
				}
			}
			var target = args.$blockData.find( '.block' );
			var masonryTarget = target.find( '> .block-masonry' );
			if ( args.append === 1 ) {
				if ( args.$blockData.hasClass( 'block-wrap-grid' ) ) {
					target.last().after( $items );
				} else if ( masonryTarget.length > 0 ) {
					zeenPrv.masonryAppend( $items, target );
				} else {
					target.append( $items );
				}
				zeenPrv.reSidebars();
			} else {
				if ( args.$blockData.hasClass( 'block-wrap-grid' ) ) {
					args.$blockData.css( 'height', args.$blockData.height() );
					if ( target.length === 1 ) {
						target.replaceWith( $items );
					} else {
						$items = $items.filter( function() { return this.nodeType === 1; });
						for ( var i = 0; i < target.length; i++ ) {
							target[i].replaceWith( $items[i] );
						}
					}
		            target.imagesLoaded( function() {
		            	args.$blockData.css( 'height', 'auto' );
		            });
				} else {
					target.css( 'height', target.height() );
					target.html( $items );
		            target.imagesLoaded( function() {
		            	target.css( 'height', 'auto' );
		            });
				}
			}
			if ( args.manual !== true ) {
				if ( args.changer === true ) {
					if ( args.loaders === 'off' ) {
						args.$elemN.addClass( 'no-more' );
						args.$elemP.addClass( 'no-more' );
						if ( args.$elemN.hasClass( 'block-more-3' ) ) {
							args.$elemN.html( zeenJS.i18n.noMore );
						}
					} else {
						args.$elemN.removeClass( 'no-more' );
						args.$elemP.addClass( 'no-more' );
						if ( args.$elemN.hasClass( 'block-more-3' ) ) {
							args.$elemN.html( zeenJS.i18n.loadMore );
						}
					}

				} else {
					if ( args.trigger_type === 1 ) {
						if ( args.blockData !== '' && args.blockData.next > args.response[0] ) {
							args.$elemP.html( zeenJS.i18n.noMore ).addClass( 'no-more' );
						}
					} else {
						args.$elemN.removeClass( 'no-more' );
						args.$elemP.removeClass( 'no-more' );
						if ( args.blockData !== '' && args.blockData.prev === 0 ) {
							args.$elemP.addClass( 'no-more' );
							args.$elemN.removeClass( 'no-more' );
						}

						if ( args.blockData !== '' && args.response[0] < args.blockData.next ) {
							if ( args.blockData.prev !== 0 ) {
								args.$elemP.removeClass( 'no-more' );
							}
							args.$elemN.addClass( 'no-more' );
						}
					}
				}
			}

			args.$blockData.find( '> div' ).removeClass( 'loading tipi-spin' );
			zeenPrv.fillRunner();
			zeenPrv.tempAni();
			zeenPrv.iFrameLazy();
			if ( typeof args.mm !== 'undefined' && args.mm === true ) {
				args.$blockData.find( '.zeen-lazy-load-mm' ).each( function() {
					zeenPrv.imgAttrLoad( $(this)[0], true );
				});
			}
		},
		ajaxGetter: function( ajaxCall ) {
			return zeenPrv.ajaxData[ajaxCall];
		},
		ajaxSetter: function( ajaxCall, ajaxData ) {
			zeenPrv.ajaxDeleter(ajaxCall);
			zeenPrv.ajaxData[ ajaxCall ] = ajaxData;
		},
		videoWrap: function() {
			$( 'iframe' ).each( function() {
				var _this = $( this ), src = _this.attr('src'), lazySrc = _this.data('lazy-src'), thisParent = _this.parent(), video = false;
				if ( src === 'about:blank' && lazySrc.length > 0 ) {
					src = lazySrc;
				}
				if ( typeof src === 'undefined' ) {
					return;
				}
				src = src.toLowerCase();
				if ( src.indexOf('yout') >= 0 || src.indexOf('vime') >= 0 || src.indexOf('dailymo') >= 0 ) {
					video = true;
				}
				if ( video === false ) {
					return;
				}
				if ( ! thisParent.hasClass( 'video-wrap' ) && ! thisParent.hasClass( 'wp-block-embed__wrapper' ) && ! thisParent.parent().hasClass( 'wp-block-embed__wrapper' ) && ! thisParent.hasClass( 'frame-wrap' ) && ! thisParent.hasClass( 'content-custom' ) && ! _this.hasClass( 'elementor-video-iframe' ) && ! _this.hasClass( 'skip-video' ) && ! thisParent.hasClass( 'fluid-width-video-wrapper' ) ) {
					_this.wrap( '<div class="video-wrap"></div>' );
				}
			});
		},
		videoBg: function() {
			if ( this.$winWidth > 767 ) {
				var $media_bg = [], $header_bg = this.$header.find( '.bg-area > .background .media-bg' ), $footer_bg = this.$footerBgArea.find( '.background .media-bg' );
				if ( $header_bg.length > 0 ) {
					$media_bg.push( $header_bg );
				}
				if ( $footer_bg.length > 0 ) {
					$media_bg.push( $footer_bg );
				}
				for ( var i = $media_bg.length - 1; i >= 0; i-- ) {
					if ( $media_bg[i].find( '> source' ).length > 0 ) {
						var $media_bg_src = $media_bg[i].find( '> source' );
						$media_bg_src.attr( 'src', $media_bg_src.data( 'src' ) ).removeAttr( 'data-src' );
						$media_bg[i][0].load();
					} else {
						$media_bg[i].attr( 'src', $media_bg[i].data( 'src' ) );
					}
					$media_bg[i].addClass( 'active' );
				}
			}
		},
		skinMode: function( e ) {
			if ( typeof e !== 'undefined' ) {
				e.preventDefault();
			}
			if ( zeenPrv.$body.hasClass( 'tipi-builder-frame-inner' ) ) {
				return;
			}
			zeenPrv.$skinMode.addClass( 'triggered' );
			var logo = $('.logo'),
				logoImg = logo.find('img').add( logo.find('picture') ),
				$primary = $('#primary');
			if ( zeenPrv.$skinMode.hasClass( 'mode--alt' ) ) {
				zeenPrv.$skinMode.removeClass( 'mode--alt' );
				zeenPrv.$body.removeClass( 'mode--alt--b' );
				Cookies.remove( 'wp_alt_mode', { path: zeenJS.args.path } );
				logoImg.each( function() {
					var _this = $(this),
						el = _this,
						baseSrc = _this.data('base-src');
					if ( _this.is( 'picture' ) ) {
						el = _this.find( 'source' );
					}
					if ( typeof baseSrc !== 'undefined' ) {
						el.attr('src', baseSrc );
						var baseSrcset = _this.data('base-srcset');
						if ( typeof baseSrcset !== 'undefined' ) {
							el.attr('srcset', baseSrcset );
						}
					}
				});

				if ( zeenPrv.$body.hasClass('single') || ( zeenPrv.$body.hasClass('page') && ! zeenPrv.$body.hasClass('tipi-builder-page') ) ) {
					$primary.find( '> .article-layout-skin-2' ).removeClass('article-layout-skin-2').addClass('article-layout-skin-1');
					$primary.find( '.entry-content >.lets-review-skin-2' ).each( function() {
						var _this = $(this);
						if ( parseInt( _this.data('skin') ) === 1 ) {
							_this.removeClass('lets-review-skin-2').addClass('lets-review-skin-1');
						}
					});
				}
			} else {
				zeenPrv.$skinMode.addClass( 'mode--alt' );
				zeenPrv.$body.addClass( 'mode--alt--b' );
				Cookies.set( 'wp_alt_mode', '1', { sameSite: 'lax', expires: zeenJS.args.cookieDuration, path: zeenJS.args.path } );
				logoImg.each( function() {
					var _this = $(this),
						el = _this,
						altSrc = _this.data('alt-src');
					if ( _this.is( 'picture' ) ) {
						el = _this.find( 'source' );
					}
					if ( typeof altSrc !== 'undefined' ) {
						el.attr('src', altSrc );
						var altSrcset = _this.data('alt-srcset');
						if ( typeof altSrcset !== 'undefined' ) {
							el.attr('srcset', altSrcset );
						}
					}
				});

				if ( zeenPrv.$body.hasClass('single') || ( zeenPrv.$body.hasClass('page') && ! zeenPrv.$body.hasClass('tipi-builder-page') ) ) {
					$primary.find( '> .article-layout-skin-1' ).removeClass('article-layout-skin-1').addClass('article-layout-skin-2');
					$primary.find( '.entry-content >.lets-review-skin-1' ).removeClass('lets-review-skin-1').addClass('lets-review-skin-2');
				}

			}
		},
		imgControl: function( resize ) {
			this.$primary.find( '> .post-wrap' ).each( function() {
				var current = $( this );
		        var img = current.find( '.entry-content .alignnone' ).add( current.find( '.entry-content .aligncenter' ) );
		        if ( img.length > 0 ) {
					var imgObs = new IntersectionObserver(function (entries) {
						entries.forEach(function (entry ) {
							if ( entry.isIntersecting ) {
								entry.target.classList.add('embed-vis');
								imgObs.unobserve(entry.target);
							}
						});
					}, { threshold: [0], rootMargin: '-100px 0px', });
					var currentImg;
					img.each( function( index, elem ) {
						currentImg = $( this );
						if ( ! currentImg.hasClass('embed-vis') ) {
							imgObs.observe( currentImg[0] );
						}
					});
				}
			});
	    },
		ajaxDeleter: function( ajaxCall, target ) {
			if ( target === true ) {

				for ( var el in zeenPrv.ajaxData ) {
				  if ( el.indexOf(ajaxCall) === 0 ) {
					  delete zeenPrv.ajaxData[el];
					}
				}
				if ( typeof( window[ ajaxCall + '_2' ] ) !== 'undefined' ) {
					window[ ajaxCall + '_2' ] = '';
				}
			} else {
				delete zeenPrv.ajaxData[ajaxCall];
			}
		},
		ajaxChecker: function( ajaxCall ) {
			if ( typeof( window[ ajaxCall ] ) !== 'undefined' && window[ ajaxCall ] !== '' ) {
				zeenPrv.ajaxData[ ajaxCall ] = window[ ajaxCall ];
				return true;
			}

			if ( typeof( zeenPrv.ajaxData[ ajaxCall ] ) !== 'undefined' ) {
				return true;
			}
		},
		lightboxClasses: function() {
			this.$entryContent.find( 'a' ).has( 'img' ).each( function() {

	            var attrTitle = $( 'img', this ).attr( 'title' ), $instance = $( this ),
	                attrHref = $instance.attr( 'href' );

				if ( typeof attrTitle !== 'undefined' ) {
					$instance.attr( 'title', attrTitle );
				}
	            if ( typeof attrHref !== 'undefined' && $instance.data( 'rel' ) !== 'prettyPhoto[product-gallery]' ) {
	                var splitHref = attrHref.split( '.' ),
	                	ext = $(splitHref)[$(splitHref).length - 1];
	                if ( ext.substring(0, 3) === 'jpg' || ext.substring(0, 4) === 'jpeg' || ext.substring(0, 3) === 'png' || ext.substring(0, 3) === 'gif' ) {
	                    $instance.addClass( 'tipi-lightbox' );
	                }
	            }
	        });
	        if ( parseInt( zeenJS.args.lightboxChoice ) === 2 ) {
	        	var lists = this.$entryContent.find('> .zeen__list--1');
	        	if ( lists.length > 0 ) {
	        		lists.find( 'a' ).has( 'img' ).removeClass('tipi-lightbox');
	        	}
	        }
		},
		loadMore: function( elem, data ) {
			elem.addClass( 'loaded' );
			if ( typeof( zeenPrv.thePaged ) === 'undefined' || zeenPrv.thePaged === 0 ) {
				zeenPrv.thePaged = 1;
			}
			if ( typeof( data ) === 'undefined' ) {
				elem = $( this );
				data = elem.data();
			}
			var elemBlockWrap = elem.closest( '.block-wrap' );
			var type = data.type;
			if ( type === 4 ) {
				type = 3;
			}
			var target = elemBlockWrap, masonry;

			if ( elemBlockWrap.hasClass( 'block-masonry-wrap' ) ) {
				target = target.find( '.block' );
				masonry = true;
			} else if ( elemBlockWrap.hasClass( 'block-wrap-65' ) ) {
				target = target.find( '.block' );
				masonry = 65;
			} else {
				target = target.find( '> .tipi-row-inner-style > .tipi-row-inner-box' );
			}
			var currentLoader, qry = zeenJS.qry, bid = elemBlockWrap.data('id');
			if ( typeof bid !== 'undefined' && typeof window[ 'zeen_' + bid ] !== 'undefined' && ! zeenPrv.$body.hasClass( 'blog' ) ) {
				qry = window[ 'zeen_' + bid ].args;
			}
			$.ajax({
			    method: "POST",
			    data: {
					preview: data.preview,
					img_shape: data.shape,
					byline_off: data.byline,
					excerpt_off: data.excerpt,
					mnp: data.mnp,
					qry: qry,
					paged: zeenPrv.thePaged,
					frontpage: zeenJS.args.frontpage,
					basePagi: window.location.pathname,
					type: type,
				},
			    url: zeenJS.root + 'pagi',
			    dataType: 'html',
			    beforeSend: function( xhr ) {
			    	zeenPrv.thePaged = parseInt( zeenPrv.thePaged ) + 1;
			        xhr.setRequestHeader( 'X-WP-Nonce', zeenPrv.nonce );
   					currentLoader = elemBlockWrap.find( '.inf-load-more-wrap:not(.inf-loaded)' ).addClass( 'tipi-spin inf-loading' );
			    },
			    success : function( response ) {
					var $items = $( response ), item;
					var offset;
					if ( masonry === 65 ) {
						offset = zeenPrv.getDetails( target );
						elemBlockWrap.find( '.inf-scr:not(.inf-scr-masonry)' ).css( 'top', offset.height - 200 ).addClass( 'inf-scr-masonry' );
						currentLoader.addClass( 'inf-scr-masonry' ).css( 'top', offset.height - 200 );
						$items.each( function() {
							item = $( this );
							if ( item.hasClass( 'pagination' ) || item.hasClass( 'inf-scr' ) ) {
								elemBlockWrap.append( item );
							} else {
								target.append( item );
							}
						});
					} else if ( masonry === true ) {
						zeenPrv.masonryAppend( $items, target );
					} else {
						target.append( $items );
					}
					currentLoader.removeClass( 'tipi-spin inf-loading' ).addClass( 'inf-loaded' );
					zeenPrv.tempAni();
					zeenPrv.iFrameLazy();
					zeenPrv.parallaxRefresh();
					zeenPrv.infScr();
					zeenPrv.fillRunner();
					if ( masonry !== true ) {
						zeenPrv.infPagi( elem, data );
						zeenPrv.reSidebars();
					}
					zeenPrv.GA( data.next );
					zeenPrv.infStRefresh();
			    },
			    fail : function( response ) {
			        console.log( 'ERROR', response );
			    }
			});
			$( '.inf-scr' ).removeClass("active");
		},
		infStRefresh: function() {
			for (var i = zeenPrv.infST.length - 1; i >= 0; i--) {
				if ( zeenPrv.infST[i].scrollTrigger !== null ) {
					zeenPrv.infST[i].refresh();
				}
			}
		},
		infPagi: function( elem, data ) {
			if ( zeenJS.args.archiveUrlChange !== true ) {
				return;
			}
			ScrollTrigger.create({
				trigger: elem,
				start: "top center",
				onEnter: (function (_ref) {
					zeenPrv.updateHref( data.titleNext, data.next );
				}),
				onLeaveBack: (function (_ref) {
					zeenPrv.updateHref( data.titlePrev, data.prev );
				}),
			});
		},
		menuAc: function( row ) {
			var drop = $( row ),
			_parent = drop.closest( '.horizontal-menu' );
			if ( ! drop.hasClass( 'dropper' ) ) {
				_parent.removeClass( 'menu--active' );
				if ( zeenPrv.mmAni === 3 ) {
			   		var stopper = _parent.find( '.menu--slid' );
			   		stopper.stop().slideUp( 200 );
				}
				return;
			}
			if ( ! drop.hasClass( 'zeen-lazy-loaded') ) {
				drop.find( '.zeen-lazy-load-mm' ).each( function() {
					zeenPrv.imgAttrLoad( $(this)[0], true );
				});
			}
			drop.addClass( 'active active-1 zeen-lazy-loaded' );
			if ( zeenPrv.mmAni === 3 ) {
				var trigger = drop.find( '> .menu' );
				if ( trigger.hasClass( 'mm-1' ) ) {
					trigger = trigger.find( '> .menu-wrap > .sub-menu' );
				}
				_parent.find( '.menu--slid' ).hide().removeClass('menu--slid');
				trigger.css( { 'visibility': 'visible', 'opacity': '1'  } ).addClass('menu--slid');
				if ( _parent.hasClass( 'menu--active') ) {
		   			trigger.show();
		   		} else {
		   			trigger.hide().stop().slideDown( 200 );
		   		}
			}
			setTimeout(function() {
        		_parent.addClass('menu--active');
			}, 220 );
        },
        menuDeac: function( row ) {
        	$( row ).removeClass( 'active' );
        },
        menuEx: function( item ) {
        	if ( zeenPrv.mmAni === 3 ) {
		   		var trigger = $(item).find( '.menu--slid' );
		   		trigger.stop().slideUp( 200 );
			}
        	$( item ).removeClass( 'menu--active' );
        },
		reSidebars: function( index ) {
			if ( typeof index !== 'undefined' ) {
				zeenPrv.sbsSaved[ index ].refresh();
				return;
			}
			for (var i = zeenPrv.sbsSaved.length - 1; i >= 0; i--) {
				if ( zeenPrv.sbsSaved[i] !== null ) {
					zeenPrv.sbsSaved[i].refresh();
				}
			}
		},
		sidebars: function() {
			var builder = '';
			if ( this.$body.hasClass( 'tipi-builder-frame-inner' ) ) {
        		builder = true;
        	}
			var _this = this, stickies;
			if ( zeenPrv.$winWidth < 1020 ) {
				stickies = $( '.sticky-sb-on:not(.sidebar-wrap)' );
			} else {
				stickies = $( '.sticky-sb-on' );
			}
			stickies.each( function() {
				var sb = $(this),
				heightCheck,
				isSb = false,
				tweaks = 0;
				sb.imagesLoaded( function() {
					var cont = sb.closest('.sticky--wrap'),
					contHeight;
					if ( typeof cont !== 'undefined' ) {
						var totalHeight = 0;
						var $wrapP = sb.parent(),
						$wrap = $wrapP.hasClass('sticky--wrap') ? sb : $wrapP;
						$wrap.children().each(function(){
						    totalHeight = totalHeight + $(this).outerHeight(true);
						});
						contHeight = cont.outerHeight();
						if ( totalHeight >= contHeight ) {
							return;
						}
					}
					if ( sb.hasClass( 'sidebar-wrap') ) {
						isSb = true;
						heightCheck = sb.find('> .sidebar').outerHeight( true );
					}  else {
						heightCheck = sb.outerHeight( true );
					}
					if ( contHeight > 0 && heightCheck >= contHeight ) {
						return;
					}
					var navH = 0;
					if ( _this.$siteNav.hasClass( 'sticky-menu' ) ) {
						if ( ! _this.$siteNav.hasClass( 'sticky-menu-2' ) ) {
							navH = _this.$siteNav.outerHeight();
						}
					} else {
						var navP = _this.$siteNav.closest( '.site-header' );
						if ( navP.length > 0 && ! navP.hasClass( 'sticky-menu-2' ) ) {
							navH = navP.outerHeight();
						}
					}

					if ( _this.headerIsSticky === true ) {
						navH = _this.$headerHeight - _this.$header.data( 'ptDiff' ) - _this.$header.data( 'pbDiff' );
						tweaks = 15;
					}
					var top = 30 + zeenPrv.$wpAdminBarHeight + navH - tweaks;
					if ( ( _this.$winWidth < 1020 && isSb === true ) || _this.$winWidth < 767 ) {
						top = 0;
					}
					if ( _this.$winHeight < heightCheck + top ) {
						if ( sb.hasClass( 'sticky-on' ) || builder === true ) {
							sb.removeClass( 'sticky-sb sticky-el' );
							return;
						}
						if ( typeof cont !== 'undefined' ) {
							_this.pinner( { element: sb, top: top, start: "top " + top + 'px', end: "bottom bottom", endTrigger: cont[0], cont: cont } );
						}
					} else {
						sb.addClass('sticky-sb sticky-el');
						sb.css( 'top', top );
					}
				});
			});
		},
		sliderInit: function( reset ) {
			zeenPrv.wooSliderInit();
			var sliders = $( '.slider' );
			if ( sliders.length === 0 ) {
				return;
			}
			sliders.each( function() {
				var $slider = $( this ), $sliderData = $slider.data(), arrows = true, artArrows = false, run = true, hideMeta, $sliderToArrow = $slider, sliderEffect = parseInt( $sliderData.effect );
				var args = {
					wrapAround: true,
					imagesLoaded: true,
					draggable: false,
					pageDots: false,
					setGallerySize: false,
					prevNextButtons: false,
					cellSelector: typeof $sliderData.cell !== 'undefined' ? $sliderData.cell : '.slide',
					contain: true,
					rightToLeft: zeenPrv.$rtl,
				};
				if ( zeenPrv.$winWidth < 768 ) {
					args.draggable = true;
				}
				if ( $slider.hasClass( 'flickity-enabled' ) ) {
					run = false;
				}

				if ( $sliderData.s === 10 ) {
					hideMeta = true;
					args.draggable = true;
					args.lazyLoad = 1;
					if ( $sliderData.fs === 's' || $sliderData.fs === 'm' ) {
						args.fullscreen = true;
					}
					args.autoPlay =  zeenJS.args.galleryAutoplay;
				}

				if ( $sliderData.s > 50 && $sliderData.s < 60 ) {
					args.setGallerySize = true;
					args.adaptiveHeight = true;
					args.selectedAttraction = 0.0925;
					args.friction = 0.725;
					if ( sliderEffect === 2 || ( $sliderData.s !== 51 && $sliderData.s !== 55 ) ) {
						args.autoPlay =  zeenJS.args.sDelay;
					}
				}

				if ( $sliderData.s === 56 ) {
					args.draggable = true;
					args.adaptiveHeight = false;
					args.autoPlay = false;
					args.freeScroll = true;
					if ( $sliderData.layout === 2 ) {
						args.wrapAround = true;
					} else {
						args.groupCells = zeenPrv.$winWidth < 768 ? 1 : 2;
						args.pageDots = true;
						args.wrapAround = false;
						arrows = false;
					}
					if ( $sliderData.sWoo ) {
						args.pageDots = true;
						args.freeScroll = false;
						args.adaptiveHeight = true;
						args.setGallerySize = true;
					}

				}
				if ( $sliderData.s === 51 || $sliderData.s === 55 ) {
					artArrows = true;
					arrows = false;
					if ( sliderEffect === 0 ) {
						args.selectedAttraction = 0.2;
						args.friction = 0.8;
					}
				}
				if ( zeenPrv.$winWidth > 768 ) {
					if ( $sliderData.s === 52 ) {
						args.groupCells = 2;
					} else if ( $sliderData.s === 53 ) {
						args.groupCells = 3;
					} else if ( $sliderData.s === 54 ) {
						args.groupCells = 4;
					}
				}

				if ( $sliderData.s === 15 ) {
					arrows = false;
					args.wrapAround = false;
					args.lazyLoad = 2;
					args.draggable = true;
				}
				if ( $sliderData.s === 16 ) {
					args.wrapAround = false;
					args.cellAlign = 'left';
					$sliderToArrow = $slider.prev();
					args.asNavFor = $sliderToArrow[0];
				}
				if ( $sliderData.s === 21 ) {
					args.setGallerySize = true;
					args.wrapAround = false;
					args.adaptiveHeight = true;
				}
				// Gallery BLock
				if ( $sliderData.s === 31 ) {
					args.setGallerySize = true;
					args.draggable = true;
					args.lazyLoad = 2;
					args.wrapAround = false;
					args.adaptiveHeight = true;
					args.freeScroll = true;
					args.fullscreen = true;
					args.cellAlign = 'left';
					args.autoPlay = $sliderData.autoplay === 'on' ? 3000 : false;
				}

				if ( sliderEffect === 2 ) {
					args.contain = false;
					args.fade = true;
					args.pageDots = true;
					arrows = false;
					artArrows = false;
				}

				if ( run === true ) {
					$slider.on( 'ready.flickity', function() {
						$slider.addClass( 'slider-ldd' );
						if ( $sliderData.s === 21 ) {
							$slider.removeClass('tipi-spin');
						}
						var slides;
						if ( $sliderData.s > 50 ) {
							slides = $slider.find( 'article');
						} else {
							slides = $slider.find( 'img');
						}
						if ( $sliderData.s === 51 || $sliderData.s === 55 ) {
							slides.first().imagesLoaded( function() {
								$slider.addClass('slider-rdy');
							});
						} else if ( $sliderData.s === 52 ) {
							slides.slice(0, 1).imagesLoaded( function() {
								$slider.addClass('slider-rdy');
							});
						} else if ( $sliderData.s === 53 || $sliderData.s === 56 ) {
							slides.slice(0, 2).imagesLoaded( function() {
								$slider.addClass('slider-rdy');
							});
						} else if ( $sliderData.s === 54 ) {
							slides.slice(0, 3).imagesLoaded( function() {
								$slider.addClass('slider-rdy');
							});
						} else if ( $sliderData.s === 10 || $sliderData.s === 15 ) {
							slides.imagesLoaded( function(e) {
								$slider.addClass('slider-rdy');
								$slider.closest('.hero-wrap').addClass( 'mask-loaded' );
							});
						} else if ( $sliderData.s === 16 ) {
							slides.imagesLoaded( function(e) {
								$slider.addClass('nav-slider-rdy');
							});
						}
					});
					$slider.flickity( args );
					var flkty = '';
					if ( args.wrapAround === false ) {
						flkty = $slider.data( 'flickity' );
					}
					if ( arrows === true ) {
						var prev = $slider.find( '.slider-arrow-prev' );
						var next = $slider.find( '.slider-arrow-next' );
						prev.on( 'click', function() {
							$sliderToArrow.flickity( 'previous' );
							if ( args.wrapAround === false ) {
								if ( flkty.selectedIndex === 0 ) {
									prev.addClass('disabled');
								} else {
									prev.removeClass('disabled');
								}
								if ( flkty.selectedIndex === flkty.slides.length - 1 ) {
									next.addClass('disabled');
								} else {
									next.removeClass('disabled');
								}
							}
						});
						next.on( 'click', function() {
							$sliderToArrow.flickity( 'next' );
							if ( args.wrapAround === false ) {
								if ( flkty.selectedIndex === 0 ) {
									prev.addClass('disabled');
								} else {
									prev.removeClass('disabled');
								}
								if ( flkty.selectedIndex === flkty.slides.length - 1 ) {
									next.addClass('disabled');
								} else {
									next.removeClass('disabled');
								}
							}
						});
					}
					if ( hideMeta === true ) {
						$slider.on( 'change.flickity', function( event, index ) {
							var sliderHeroWrap = $slider.closest('.hero-wrap');
				            if ( ! sliderHeroWrap.hasClass( 'gallery-viewing' ) ) {
					            $slider.on( 'mouseleave', function() {
									sliderHeroWrap.removeClass( 'gallery-viewing' );
									$slider.off( 'mouseleave' );
								});
					        }
				            sliderHeroWrap.addClass( 'gallery-viewing' );
				        });
					}
					if ( artArrows === true ) {
						flkty = $slider.data( 'flickity' );
						var $sliderArrows = $slider.find( '.slider-arrow' );
						$sliderArrows.on( 'click', function() {
							var arrow = $( this );
							if ( arrow.data( 'doing' ) ) return;
							arrow.data( 'doing', true );
							var start = flkty.selectedIndex;
							if ( arrow.hasClass( 'slider-arrow-next' ) ) {
								$sliderToArrow.flickity( 'next' );
							} else {
								$sliderToArrow.flickity( 'previous' );
							}
							var finish = flkty.selectedIndex;
							if ( flkty.cells.length > 1 ) {
								zeenPrv.sliderAlt( flkty, start, finish, $sliderData.effect );
							}
						});

						if ( zeenJS.args.sDelay > 0 ) {
							$slider.data( 'autoplay', true );
							setInterval( function() {
								if ( $slider.data('autoplay') === true ) {
									var start = flkty.selectedIndex;
									$sliderToArrow.flickity( 'next' );
									var finish = flkty.selectedIndex;
									if ( flkty.cells.length > 1 ) {
										zeenPrv.sliderAlt( flkty, start, finish, $sliderData.effect );
									}
								}
							}, zeenJS.args.sDelay );
							$slider.on( 'mouseenter', function() {
								$slider.data( 'autoplay', false );
							});
							$slider.on( 'mouseleave', function() {
								$slider.data( 'autoplay', true );
							});
						}

						$slider.on( 'settle.flickity', function( event, index ) {
							$sliderArrows.removeData( 'doing' );
						});

						$slider.on( 'settle.flickity', function( event, index ) {
							$sliderArrows.removeData( 'doing' );
						});

					}
				} else if ( reset === true ) {
					$slider.flickity('reposition').flickity('resize');
				}
			});
		},
		sliderAlt: function( flkty, start, finish, effect ) {
			if ( parseInt( effect ) !== 0 ) {
				return;
			}
			var length = flkty.cells.length;
			if ( finish === length ) {
				finish = 0;
			}
			var dir = ! ( start === 0 && finish === length - 1 ) && ( ( finish === 0 && start === length - 1 ) || start < finish ) ? 'R' : 'L',
			$start = $( flkty.slides[start].cells[0].element ),
			$finish = $( flkty.slides[finish].cells[0].element ),
			outerWidth = flkty.slides[start].outerWidth,
			ease = Power2.easeInOut,
			outerWidthCalc = outerWidth - outerWidth * 0.2,
			finishR = dir === 'R' ? -Math.abs( outerWidthCalc ) : outerWidthCalc,
			startMaskL = dir === 'L' ? -Math.abs( outerWidthCalc ) : outerWidthCalc,
			startL = dir === 'L' ? -Math.abs( outerWidth ) : outerWidth,
			startR = dir === 'R' ? -Math.abs( outerWidth ) : outerWidth;
			for ( var i = flkty.slides.length - 1; i >= 0; i-- ) {
				flkty.slides[i].cells[0].element.classList.remove( 'old-slide', 'new-slide' );
			}
			$start.addClass( 'old-slide' );
			$finish.addClass( 'new-slide' );

			gsap.fromTo( $finish, 0.6, { x: startL }, { x: 0, ease: ease } );
			gsap.fromTo( $start, 0.6, { x: 0 }, { x: startR, ease: ease } );
			var finishMask = $finish.find( '> .mask' );
			if ( finishMask.length > 0 ) {
				gsap.fromTo( finishMask, 0.6, { x: finishR }, { x: 0, ease: ease } );
			}
			var startMask = $start.find( '> .mask' );
			if ( startMask.length > 0 ) {
				gsap.fromTo( startMask, 0.6, { x: 0 }, { x: startMaskL, ease: ease } );
			}
			gsap.fromTo( $finish.find( '> .meta' ), 0.6, { x: startR }, { x: 0, ease: ease } );
			gsap.fromTo( $start.find( '> .meta' ), 0.6, { x: 0 }, { x: startL, ease: ease } );
		},
		lightboxInit: function() {
			zeenPrv.lightboxClasses();
			if ( zeenJS.args.lightbox !== true ) {
				return;
			}
			if ( parseInt( zeenJS.args.lightboxChoice ) === 2 ) {
					var parentCheck = false, _thisParent;
					$( '.tipi-lightbox' ).fluidbox({
						loader: true,
					}).on('openstart.fluidbox', function() {
						var _this = $( this );
						_thisParent = _this.parent();
						if ( _thisParent.hasClass('alignwide') || _thisParent.hasClass( 'gallery-block__image' ) ) {
							parentCheck = true;
							_thisParent.addClass( 'lightboxing' );
						}
						zeenPrv.lastScrollY = window.scrollY;
						window.addEventListener( 'scroll', zeenPrv.lbHandler, zeenPrv.$listener );
					} )
					.on('closeend.fluidbox', function() {
						if ( parentCheck === true ) {
							_thisParent.removeClass( 'lightboxing' );
							parentCheck = false;
						}
						window.removeEventListener( 'scroll', zeenPrv.lbHandler, zeenPrv.$listener );
					});
			} else {
				zeenPrv.$body.on( 'click', '.tipi-lightbox', zeenPrv.openPhotoswipe );
				this.$entryContent.find('.wp-block-gallery').each( function( index ) {
					var $this = $(this);
					$this.attr( 'id', 'gallery-uid-' + index );
					var links = $this.find('.tipi-lightbox');
					links.attr('data-gallery-uid', index );
					links.each( function( index ) {
						$(this).attr('data-index', index );
					});
				});
			}
		},
		openPhotoswipe: function( e ) {
			e.preventDefault();
			var items = [],
			tipiLightbox = $( e.currentTarget ),
			tipiLightboxGID = tipiLightbox.data( 'gallery-uid' ),
			options = {
				bgOpacity: 0.9,
				showHideOpacity: true,
				shareButtons: [
					{id:'facebook', label:'<i class="tipi-i-facebook"></i> ' + zeenJS.i18n.share, url:'https://facebook.com/sharer/sharer.php?u={{url}}'},
					{id:'twitter', label: '<i class="tipi-i-twitter"></i> ' + zeenJS.i18n.tweet, url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'},
					{id:'pinterest', label: '<i class="tipi-i-pinterest"></i> ' + zeenJS.i18n.pin, url:'https://pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}'},
				],
			};
			if ( typeof tipiLightboxGID !== 'undefined' ) {
				options.index = tipiLightbox.data('index');
				$( '#gallery-uid-' + tipiLightboxGID ).find('.tipi-lightbox').each( function() {
					items.push( zeenPrv.itemPusher( $(this) ) );
				} );
			} else {
				items.push( zeenPrv.itemPusher( tipiLightbox ) );
			}
			var photoswipe = new PhotoSwipe( $( '#pswp' )[0], PhotoSwipeUI_Default, items, options );
			photoswipe.init();
		},
		itemPusher: function( $item ) {
			var $img  = $item.find('img'),
			title = $img.attr( 'data-caption' ) ? $img.attr( 'data-caption' ) : $img.attr( 'title' ),
			caption;
			if ( typeof title === 'undefined' ) {
				caption = $item.next();
				if ( caption.is('figcaption') ) {
					title = caption.text();
				}
			}
			return {
				alt  : $img.attr( 'alt' ),
				src  : $item.attr( 'href' ),
				title: title,
			};
		},
		pinner: function( vars ) {
			var element = gsap.utils.toArray( vars.element )[0];
			var placeholder = document.createElement('span');
			element.insertAdjacentElement('beforebegin', placeholder);
			var keywords = {
				top: "0",
				center: "50%",
				bottom: "100%"
			},
		    overlap,
		    topOffset,
		    updateOverlap = function updateOverlap() {
				topOffset = ( ( typeof vars.start === 'function' ? vars.start() : vars.start || '0 0' ) + '' ).split(' ')[1] || '0';
				topOffset = keywords[topOffset] || topOffset;
				topOffset = ~topOffset.indexOf('%') ? parseFloat(topOffset) / 100 * zeenPrv.$winWidth : parseFloat(topOffset) || 0;
				overlap = Math.max( 0, element.offsetHeight - zeenPrv.$winHeight + topOffset );
			},
		    _vars = vars,
		    onUpdate = _vars.onUpdate,
		    onRefresh = _vars.onRefresh,
		    offset = 0,
		    lastY = 0,
		    pinned,
		    pin = function pin(value, bottom) {
				pinned = value;
				if ( pinned ) {
					var bounds = element.getBoundingClientRect();
					gsap.set( element, {
						position: 'fixed',
						left: bounds.left,
						width: bounds.width,
						y: 0,
						top: bottom ? topOffset - overlap : topOffset
					});
				} else {
					gsap.set( element, {
						position: 'relative',
						clearProps: 'left,top,width',
						y: offset
					});
				}
			},
		    self;
			updateOverlap();
			vars.trigger = placeholder;
			vars.start = 'start' in vars ? vars.start : 'top top';
			vars.onRefresh = function ( self ) {
				updateOverlap();
				self.vars.onUpdate( self );
				onRefresh && onRefresh( self );
			};
			vars.onUpdate = function ( _ref ) {
				if ( zeenPrv.$winWidth < 1020 && _ref.vars.element.hasClass( 'sidebar-wrap') ) {
					gsap.set( element, {
						position: 'relative',
						clearProps: 'left,top,width',
						y: '0'
					});
					return;
				}
				var progress = _ref.progress,
					start = _ref.start,
					end = _ref.end,
					isActive = _ref.isActive;
				var y = progress * (end - start),
					delta = y - lastY,
					exceedsBottom = y + Math.max(0, delta) >= overlap + offset;
				if ((exceedsBottom || y + Math.min(0, delta) < offset) && isActive) {
					offset += exceedsBottom ? y - overlap - offset : y - offset;
					pinned || pin( true, exceedsBottom );
				} else if ( pinned || !isActive ) {
					isActive || (offset = y && typeof self !== 'undefined' ? self.end - self.start - overlap : 0);
					pin( false );
				}

				lastY = y;
				onUpdate && onUpdate( self );
			};
			var i = zeenPrv.sbsSaved.length;
			vars.endTrigger.setAttribute( 'data-sticky', i );
			if ( 'ResizeObserver' in window ) {
				zeenPrv.roS = true;
				zeenPrv.resizeObs();
			} else {
				new IntersectionObserver(function (entries) {
					entries.forEach(function (entry) {
						if ( entry.intersectionRatio > 0 ) {
							zeenPrv.reSidebars( entry.target.getAttribute( 'data-sticky') );
						}
					});
				}, { threshold: [0], rootMargin: ( vars.top * -1 ) + 'px 0px 0px 0px' }).observe( vars.endTrigger );
			}
			self = ScrollTrigger.create( vars );
			zeenPrv.sbsSaved.push( self );
			return self;
		},
		toolTipInit: function( e, el ) {
			zeenPrv.$toolTipCurrent = typeof el === 'undefined' ? $( this ) : $( el );
			if ( zeenPrv.$winWidth < 1200 || zeenPrv.$toolTipCurrent.hasClass('tipi-tipped')) return;
			zeenPrv.$toolTipCurrent.addClass( 'tipi-tipped' );
			var direction = 'tipi-tip-wrap-b';
			var zIndex = '';
			if ( zeenPrv.$toolTipCurrent.hasClass('modal-tip') ) {
				zIndex = ' z-index-override';
			}

			if ( zeenPrv.$toolTipCurrent.hasClass( 'tipi-tip-r' ) ) {
				direction = 'tipi-tip-wrap-r';
			} else if ( zeenPrv.$toolTipCurrent.hasClass( 'tipi-tip-l' ) ) {
				direction = 'tipi-tip-wrap-l';
			} else if ( zeenPrv.$toolTipCurrent.hasClass( 'tipi-tip-t' ) ) {
				direction = 'tipi-tip-wrap-t';
			}

			var output = '<div class="tipi-tip-wrap font-' + zeenJS.args.toolTipFont + ' ' + direction  + zIndex + '">' +
				'<div class="inner">' +
					zeenPrv.$toolTipCurrent.data( 'title' ) +
				'</div>' +
				'<div class="detail"></div>' +
				'</div>';

			zeenPrv.$body.append( output );

			zeenPrv.$toolTipOutput = zeenPrv.$body.find( ' > .tipi-tip-wrap:not(.removing)' );

			if ( zeenPrv.$toolTipCurrent.hasClass( 'tipi-tip-move' ) ) {
				zeenPrv.$toolTipCurrent.on( 'mousemove', zeenPrv.tooltipLive );
				zeenPrv.$toolTipOutput.addClass( 'tipi-tip-mover' );
			} else {
				zeenPrv.tooltipSetup();
			}

			zeenPrv.$toolTipCurrent.on( 'mouseleave', zeenPrv.tooltipDestroy );
		},
		tooltipDestroy: function() {
			zeenPrv.$toolTipOutput.addClass( 'removing' );
			zeenPrv.$toolTipCurrent.removeClass('tipi-tipped');
			setTimeout( function() {
				$( '.removing' ).remove();
			}, 500 );
			zeenPrv.$toolTipCurrent.off( 'mouseleave mousemove' );
		},
		tooltipLive: function( e ) {
			zeenPrv.tooltipSetup( { 'left': e.clientX, 'top': e.clientY } );
		},
		tooltipSetup: function( args ) {
			if ( typeof( args ) === 'undefined' ) {
				args = {};
			}
			if ( typeof( args.output ) === 'undefined' ) {
				args.output = zeenPrv.$toolTipOutput;
			}

			if ( typeof( args.current ) === 'undefined' ) {
				args.current = zeenPrv.$toolTipCurrent;
			}

			var	instanceDetails = zeenPrv.getDetails( args.output );
			var offset = zeenPrv.getDetails( args.current );
			if ( typeof( args.left ) === 'undefined' ) {
				args.left = offset.left + ( offset.width / 2 ) - instanceDetails.width / 2;
			} else {
				args.left = args.left - instanceDetails.width / 2;
			}

			if ( typeof( args.top ) === 'undefined' ) {
				args.top = offset.top;
				args.top = args.top + offset.height;
			} else {
				args.top = args.top + 10;
			}

			if ( args.current.hasClass( 'tipi-tip-r' ) ) {
				args.top = offset.top + ( offset.height / 2 ) - ( instanceDetails.height / 2 );
				args.left = offset.width + offset.left + 10;
			} else if ( args.current.hasClass( 'tipi-tip-l' ) ) {
				args.top = offset.top + ( offset.height / 2 ) - ( instanceDetails.height / 2 );
				args.left =  offset.left - instanceDetails.width - 10;
			} else if ( args.current.hasClass( 'tipi-tip-t' ) ) {
				args.top = offset.top - instanceDetails.height;
			}
			args.output.css({
				left: args.left,
				top: args.top
			}).addClass( 'tipi-tip-wrap-visible' );
		},
		getDetails: function( elem ) {
	   		var output = elem[0].getBoundingClientRect();
	   		return { left: output.left, top: output.top, width: output.width, height: output.height };
		},
		orientationchange: function() {
			this.cleanUp();
			this.parallaxRefresh();
		},
		resize: function() {
			this.resizing = true;
			var width = this.$winWidth;
			this.data();
			var _this = this;
			clearTimeout( this.resizeTo );
			this.resizeTo = setTimeout( function() {
				if ( width !== _this.$winWidth ) {
					_this.cleanUp();
					_this.header();
					_this.sticky();
					_this.sliderInit();
					_this.sidebars();
					_this.reSidebars();
					_this.progressPosition();
					if ( _this.$winWidth > 767 ) {
						_this.$body.removeClass( 'mob-open' );
					}
				}
				_this.imgControl( true );
				_this.resizing = false;
			}, 275 );

		},
		cleanUp: function() {
			this.cleanUpParallax();
			$( '.parallaxed' ).removeClass( 'parallaxed' );
			this.parallaxIt();
			this.parallaxItBg();
			this.footerReveal();
		},
		cleanUpParallax: function() {
			for (var i = zeenPrv.paraSaved.length - 1; i >= 0; i--) {
				if ( zeenPrv.paraSaved[i].scrollTrigger !== null ) {
					zeenPrv.paraSaved[i].kill();
					zeenPrv.paraSaved[i].scrollTrigger.kill();
				}
			}
		},
		parallaxRefresh: function() {
			for (var i = zeenPrv.paraSaved.length - 1; i >= 0; i--) {
				if ( zeenPrv.paraSaved[i].scrollTrigger !== null ) {
					zeenPrv.paraSaved[i].scrollTrigger.refresh();
				}
			}
		},
		cleanupStickies: function() {
			for (var i = zeenPrv.stickies.length - 1; i >= 0; i--) {
				if ( zeenPrv.stickies[i] !== null ) {
					zeenPrv.stickies[i].kill();
				}
			}
		},
		lbHandler: function() {
			var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
			if ( ! zeenPrv.tickingLb ) {
				window.requestAnimationFrame(function() {
					if ( Math.abs( currentScroll - zeenPrv.lastScrollY ) > 45 ) {
						$( '.tipi-lightbox' ).fluidbox('close');
					}
					zeenPrv.tickingLb = false;
				});
				zeenPrv.tickingLb = true;
			}
		},
		fillRunner: function( override ) {
			if ( this.$body.hasClass( 'tipi-builder-frame-inner' ) && override !== true ) {
				return;
			}
			if ( override === true ) {
				$( '.tipi-fill' ).remove();
			}
			if ( this.wooArchive === true ) {
				var woo = this.$entryContentWrap.data('ppl');
				if ( woo > 2 && this.$products.length > 0 ) {
					this.$products.each( function() {
						zeenPrv.fillIt( $( this ), woo, 'product' );
					});
				}
			}
			var block = this.$primary.add(this.$dropper).find( '.ppl-l-4, .ppl-m-4' );
			if ( block.length > 0 ) {
				block = block.find( '.block:not(.block-65)' );
				block.each( function() {
					zeenPrv.fillIt( $( this ), 4 );
				});
			}
			block = this.$primary.add(this.$dropper).find( '.ppl-l-5, .ppl-m-5' );
			if ( block.length > 0 ) {
				block = block.find( '.block:not(.block-65)' );
				block.each( function() {
					zeenPrv.fillIt( $( this ), 5 );
				});
			}
			block = this.$primary.add(this.$dropper).find( '.ppl-l-3, .ppl-m-3' );
			if ( block.length > 0 ) {
				block = block.find( '.block:not(.block-65)' );
				block.each( function() {
					if ( ! block.hasClass( 'block-wrap-65' ) ) {
						zeenPrv.fillIt( $( this ), 3 );
					}
				});
			}
		},
		fillIt: function( block, count, classes ) {
			if ( this.$winWidth > 767 ) {
				var counter = block.children().length;
				if ( counter === count ) {
					return;
				}
				var remainder;
				if ( counter < count ) {
					remainder = count - counter;
				} else{
					remainder = counter - ( Math.floor( counter / count ) * count );
					remainder = count - remainder;
				}
				if ( remainder < count ) {
					for ( var i = 0; i < remainder; i++ ) {
						var article = document.createElement( 'article' );
						article.classList.add( 'tipi-fill' );
						if ( typeof classes !== 'undefined' ) {
							article.classList.add( classes );
						}
						block.append(article );
					}
				}
			} else {
				$( '.tipi-fill' ).remove();
			}

		},
		toTopInit: function( e ) {
			e.preventDefault();
			zenscroll.toY( 0, 800 );
		},
		foldMid: function() {
			var togglers = this.$toTopWrap.add(this.$verticalMenu).add( $('#next-block__wrap' ) ).add( $('#prev-block__wrap' ) );
			if ( togglers.length > 0 ) {
				ScrollTrigger.create({
				    trigger: this.$body,
				    start: Math.min( 400, this.$winHeight ),
				    toggleClass: { targets: togglers, className: 'past__mid' },
				});
			}
		},
		openSlideMenu: function( e ) {
			e.preventDefault();
			this.$body.addClass( 'slide-menu-open' );
			this.$baseOverlay.addClass( 'active' );
			this.$slideInMenu.addClass( 'active' );
		},
		closeSlideMenu: function( e ) {
			if ( typeof( e ) !== 'undefined' ) {
				e.preventDefault();
			}
			this.$body.removeClass( 'slide-menu-open' );
			this.$slideInMenu.removeClass( 'active' );
			this.$baseOverlay.removeClass( 'active' );
		},
		openMobMenu: function( e ) {
			e.preventDefault();
			if ( this.$body.hasClass( 'site-mob-menu-a-3' ) ) {
				var currentTop = $(window).scrollTop();
				zeenPrv.$body.addClass( 'mob-open mob-open-3' );
				this.$content.add( this.$topBlock ).add( this.$mobHead ).css( 'top', '-' + currentTop + 'px' );
				this.$page.css( 'height', this.$winHeight );
			} else {
				if ( this.$body.hasClass( 'mob-open' ) ) {
					this.$body.removeClass( 'mob-open' );
				} else {
					this.$body.addClass( 'mob-open' );
				}
			}
		},
		mobMenuClear: function( e ) {
			this.$body.removeClass( 'mob-open' );
			if ( ! this.$body.hasClass( 'site-mob-menu-a-3' ) ) {
				return;
			}
			clearTimeout( zeenPrv.mobMenuClearTO );
			zeenPrv.mobMenuClearTO = setTimeout( function() {

				var scrollTo = ( zeenPrv.$content.css( 'top' ) );
				zeenPrv.$content.add( zeenPrv.$topBlock ).add( zeenPrv.$mobHead ).css( 'top', '' );
				zeenPrv.$page.css( 'height', '' );
				zeenPrv.$body.removeClass( 'mob-open mob-open-3' );
				window.scrollTo(0, scrollTo);
			}, 500 );
		},
		closeMobMenu: function( e ) {
			e.preventDefault();
			zeenPrv.mobMenuClear();
		},
		loadScript: function( src ) {
			var js = document.createElement('script');
			js.src = src;
			js.onload = function() {
			 	zeenPrv.initMethods();
			};
			js.onerror = function() {
				console.log( 'ERROR: JS' );
			};
			document.head.appendChild(js);
		},
		wooSliderInit: function () {
			if ( ! ( zeenPrv.$body.hasClass('single-product') && zeenPrv.$main.hasClass('product-hero-slider--off') ) ) {
				return;
			}
			var wrapper = zeenPrv.$main.find('.woocommerce-product-gallery__wrapper');
			if ( wrapper.length === 0 ) {
				return;
			}
			if ( zeenPrv.$winWidth < 768 ) {
				wrapper.addClass('slider');
				if ( ! wrapper.hasClass('slider--data') ) {
					wrapper.addClass('slider-data').data({
						's': 56,
						'sWoo': true,
						'cell': '.woocommerce-product-gallery__image',
						'layout': 2
					});
				}
			} else {
				if ( wrapper.data('flickity') ) {
					wrapper.removeClass('slider').flickity('destroy');
				}
			}
		},
		pub: function() {
			var _this = this;
			clearTimeout( this.pubTimer );
			this.pubTimer = setTimeout( function() {
				_this.cleanUpParallax();
				$( '.parallaxed').removeClass('parallaxed');
				$( '.tipi-parallax-ani .bg, .tipi-parallax-ani iframe, .tipi-parallax-ani img' ).css( 'transform', '' );
				_this.dom();
				_this.data();
				_this.anis();
				_this.sliderInit( true );
				_this.sidebars();
				_this.reSidebars();
				_this.maskLoader();
				_this.fillRunner( true );
				_this.stickyEl();
				_this.parallaxIt( true );
				_this.parallax3s( true );
			}, 50 );
		},
		cus: function( setting ) {
			if ( setting === 'sticky' ) {
				zeenPrv.cleanupStickies();
			}
			this.dom();
			this.data();
			this.bind();
			if ( setting === 'sticky' ) {
				this.$stickyMenu.removeClass( 'slidedown stickied stuck active still' );
				this.sticky();
			}

		}
	};
	zeenPrv.init();
	return {
		pub: function() {
			zeenPrv.pub();
		},
		cus: function( setting ) {
			zeenPrv.cus( setting );
		},
		toolTipInitPub: function( e ) {
			zeenPrv.toolTipInit( e, e.currentTarget );
		}
	};
})(jQuery);
/**
 * Zenscroll 4.0.2
 * https://github.com/zengabor/zenscroll/
 *
 * Copyright 2015–2018 Gabor Lenard
 *
 * This is free and unencumbered software released into the public domain.
 * 
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 * 
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 * 
 * For more information, please refer to <http://unlicense.org>
 * 
 */


 /* CODETIPI CHANGES:

 Removed auto smoothscroll entire section

/*jshint devel:true, asi:true */

/*global define, module */


(function (root, factory) {
	if (typeof define === "function" && define.amd) {
		define([], factory())
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory()
	} else {
		(function install() {
			// To make sure Zenscroll can be referenced from the header, before `body` is available
			if (document && document.body) {
				root.zenscroll = factory()
			} else {
				// retry 9ms later
				setTimeout(install, 9)
			}
		})()
	}
}(this, function () {
	"use strict"


	// Detect if the browser already supports native smooth scrolling (e.g., Firefox 36+ and Chrome 49+) and it is enabled:
	var isNativeSmoothScrollEnabledOn = function (elem) {
		return elem && "getComputedStyle" in window &&
			window.getComputedStyle(elem)["scroll-behavior"] === "smooth"
	}


	// Exit if it’s not a browser environment:
	if (typeof window === "undefined" || !("document" in window)) {
		return {}
	}


	var makeScroller = function (container, defaultDuration, edgeOffset) {

		// Use defaults if not provided
		defaultDuration = defaultDuration || 999 //ms
		if (!edgeOffset && edgeOffset !== 0) {
			// When scrolling, this amount of distance is kept from the edges of the container:
			edgeOffset = 9 //px
		}

		// Handling the life-cycle of the scroller
		var scrollTimeoutId
		var setScrollTimeoutId = function (newValue) {
			scrollTimeoutId = newValue
		}

		/**
		 * Stop the current smooth scroll operation immediately
		 */
		var stopScroll = function () {
			clearTimeout(scrollTimeoutId)
			setScrollTimeoutId(0)
		}

		var getTopWithEdgeOffset = function (elem) {
			return Math.max(0, container.getTopOf(elem) - edgeOffset)
		}

		/**
		 * Scrolls to a specific vertical position in the document.
		 *
		 * @param {targetY} The vertical position within the document.
		 * @param {duration} Optionally the duration of the scroll operation.
		 *        If not provided the default duration is used.
		 * @param {onDone} An optional callback function to be invoked once the scroll finished.
		 */
		var scrollToY = function (targetY, duration, onDone) {
			stopScroll()
			if (duration === 0 || (duration && duration < 0) || isNativeSmoothScrollEnabledOn(container.body)) {
				container.toY(targetY)
				if (onDone) {
					onDone()
				}
			} else {
				var startY = container.getY()
				var distance = Math.max(0, targetY) - startY
				var startTime = new Date().getTime()
				duration = duration || Math.min(Math.abs(distance), defaultDuration);
				(function loopScroll() {
					setScrollTimeoutId(setTimeout(function () {
						// Calculate percentage:
						var p = Math.min(1, (new Date().getTime() - startTime) / duration)
						// Calculate the absolute vertical position:
						var y = Math.max(0, Math.floor(startY + distance*(p < 0.5 ? 2*p*p : p*(4 - p*2)-1)))
						container.toY(y)
						if (p < 1 && (container.getHeight() + y) < container.body.scrollHeight) {
							loopScroll()
						} else {
							setTimeout(stopScroll, 99) // with cooldown time
							if (onDone) {
								onDone()
							}
						}
					}, 9))
				})()
			}
		}

		/**
		 * Scrolls to the top of a specific element.
		 *
		 * @param {elem} The element to scroll to.
		 * @param {duration} Optionally the duration of the scroll operation.
		 * @param {onDone} An optional callback function to be invoked once the scroll finished.
		 */
		var scrollToElem = function (elem, duration, onDone) {
			scrollToY(getTopWithEdgeOffset(elem), duration, onDone)
		}

		/**
		 * Scrolls an element into view if necessary.
		 *
		 * @param {elem} The element.
		 * @param {duration} Optionally the duration of the scroll operation.
		 * @param {onDone} An optional callback function to be invoked once the scroll finished.
		 */
		var scrollIntoView = function (elem, duration, onDone) {
			var elemHeight = elem.getBoundingClientRect().height
			var elemBottom = container.getTopOf(elem) + elemHeight
			var containerHeight = container.getHeight()
			var y = container.getY()
			var containerBottom = y + containerHeight
			if (getTopWithEdgeOffset(elem) < y || (elemHeight + edgeOffset) > containerHeight) {
				// Element is clipped at top or is higher than screen.
				scrollToElem(elem, duration, onDone)
			} else if ((elemBottom + edgeOffset) > containerBottom) {
				// Element is clipped at the bottom.
				scrollToY(elemBottom - containerHeight + edgeOffset, duration, onDone)
			} else if (onDone) {
				onDone()
			}
		}

		/**
		 * Scrolls to the center of an element.
		 *
		 * @param {elem} The element.
		 * @param {duration} Optionally the duration of the scroll operation.
		 * @param {offset} Optionally the offset of the top of the element from the center of the screen.
		 *        A value of 0 is ignored.
		 * @param {onDone} An optional callback function to be invoked once the scroll finished.
		 */
		var scrollToCenterOf = function (elem, duration, offset, onDone) {
			scrollToY(Math.max(0, container.getTopOf(elem) - container.getHeight()/2 + (offset || elem.getBoundingClientRect().height/2)), duration, onDone)
		}

		/**
		 * Changes default settings for this scroller.
		 *
		 * @param {newDefaultDuration} Optionally a new value for default duration, used for each scroll method by default.
		 *        Ignored if null or undefined.
		 * @param {newEdgeOffset} Optionally a new value for the edge offset, used by each scroll method by default. Ignored if null or undefined.
		 * @returns An object with the current values.
		 */
		var setup = function (newDefaultDuration, newEdgeOffset) {
			if (newDefaultDuration === 0 || newDefaultDuration) {
				defaultDuration = newDefaultDuration
			}
			if (newEdgeOffset === 0 || newEdgeOffset) {
				edgeOffset = newEdgeOffset
			}
			return {
				defaultDuration: defaultDuration,
				edgeOffset: edgeOffset
			}
		}

		return {
			setup: setup,
			to: scrollToElem,
			toY: scrollToY,
			intoView: scrollIntoView,
			center: scrollToCenterOf,
			stop: stopScroll,
			moving: function () { return !!scrollTimeoutId },
			getY: container.getY,
			getTopOf: container.getTopOf
		}

	}


	var docElem = document.documentElement
	var getDocY = function () { return window.scrollY || docElem.scrollTop }

	// Create a scroller for the document:
	var zenscroll = makeScroller({
		body: document.scrollingElement || document.body,
		toY: function (y) { window.scrollTo(0, y) },
		getY: getDocY,
		getHeight: function () { return document.documentElement.clientHeight || docElem.clientHeight },
		getTopOf: function (elem) { return elem.getBoundingClientRect().top + getDocY() - docElem.offsetTop }
	})


	/**
	 * Creates a scroller from the provided container element (e.g., a DIV)
	 *
	 * @param {scrollContainer} The vertical position within the document.
	 * @param {defaultDuration} Optionally a value for default duration, used for each scroll method by default.
	 *        Ignored if 0 or null or undefined.
	 * @param {edgeOffset} Optionally a value for the edge offset, used by each scroll method by default. 
	 *        Ignored if null or undefined.
	 * @returns A scroller object, similar to `zenscroll` but controlling the provided element.
	 */
	zenscroll.createScroller = function (scrollContainer, defaultDuration, edgeOffset) {
		return makeScroller({
			body: scrollContainer,
			toY: function (y) { scrollContainer.scrollTop = y },
			getY: function () { return scrollContainer.scrollTop },
			getHeight: function () { return Math.min(scrollContainer.clientHeight, document.documentElement.clientHeight || docElem.clientHeight) },
			getTopOf: function (elem) { return elem.offsetTop }
		}, defaultDuration, edgeOffset)
	}

	return zenscroll


}));