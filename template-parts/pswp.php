<?php
/**
 * @package Zeen
 * @since 4.0.0
 */
?>
<div id="pswp" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container tipi-spin">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp-all-c pswp__button--close" title="<?php esc_attr_e( 'Close', 'zeen' ); ?>"><svg tabindex="0" aria-hidden="true" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M6.586 8L.93 2.344 2.344.93 8 6.586 13.656.93l1.414 1.414L9.414 8l5.656 5.656-1.414 1.414L8 9.414 2.344 15.07.93 13.656z" fill="#FFF" fill-rule="nonzero"/></svg></button>

				<button class="pswp__button pswp-all-c pswp__button--share" title="<?php esc_attr_e( 'Share', 'zeen' ); ?>"><svg tabindex="0" aria-hidden="true" width="20" height="22" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg"><path d="M16 14c-1.1 0-2.1.5-2.8 1.2l-5.3-3.1c0-.4.1-.7.1-1.1 0-.4-.1-.7-.2-1.1l5.3-3.1c.8.7 1.8 1.2 2.9 1.2 2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4c0 .4.1.7.2 1.1L6.8 8.2C6.1 7.5 5.1 7 4 7c-2.2 0-4 1.8-4 4s1.8 4 4 4c1.1 0 2.1-.5 2.8-1.2l5.3 3.1c0 .4-.1.7-.1 1.1 0 2.2 1.8 4 4 4s4-1.8 4-4-1.8-4-4-4zm0-12c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zM4 13c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm12 7c-1.1 0-2-.9-2-2 0-.4.1-.7.3-1 .3-.6 1-1 1.7-1 1.1 0 2 .9 2 2s-.9 2-2 2z" fill="#FFF" fill-rule="nonzero"/></svg></button>

				<button class="pswp__button pswp-all-c pswp__button--fs" title="<?php esc_attr_e( 'Toggle fullscreen', 'zeen' ); ?>"><svg tabindex="0" aria-hidden="true" class="pswp-fs-out" width="18" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M0 14V9h2v3h3v2H0zM0 0h5v2H2v3H0V0zm18 0v5h-2V2h-3V0h5zm0 14h-5v-2h3V9h2v5z" fill="#FFF" fill-rule="nonzero"/></svg><svg tabindex="0" aria-hidden="true" class="pswp-fs-in" width="18" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M5 9v5H3v-3H0V9h5zm0-4H0V3h3V0h2v5zm8 0V0h2v3h3v2h-5zm0 4h5v2h-3v3h-2V9z" fill="#FFF" fill-rule="nonzero"/></svg></button>

				<button class="pswp__button pswp-all-c pswp__button--zoom" title="<?php esc_attr_e( 'Zoom in/out', 'zeen' ); ?>"><svg tabindex="0" aria-hidden="true" class="pswp-zoom-in" width="15" height="15" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#FFF" fill-rule="nonzero" d="M14.957 13.543l-1.414 1.414-3.25-3.25 1.414-1.414z"/><path d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 100 11z" stroke="#FFF" stroke-width="1.5"/><path fill="#FFF" fill-rule="nonzero" d="M4 6h5v1H4z"/><path fill="#FFF" fill-rule="nonzero" d="M7.043 4.008l-.085 5-1-.017.085-5z"/></g></svg><svg tabindex="0" aria-hidden="true" class="pswp-zoom-out" width="15" height="15" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#FFF" fill-rule="nonzero" d="M14.957 13.543l-3.25-3.25-1.413 1.414 3.25 3.25z"/><path d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 100 11z" stroke="#FFF" stroke-width="1.5"/><path fill="#FFF" fill-rule="nonzero" d="M4 6h5v1H4z"/></g></svg></button>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>

			<button class="pswp__button pswp-all-c pswp__button--arrow--left" title="<?php esc_attr_e( 'Previous', 'zeen' ); ?>"><svg tabindex="0" aria-hidden="true" width="14" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M5.215 12.03L7 10.5 4 7h10V5H4l3-3.5L5.215.032 0 6z" fill="#FFF" fill-rule="nonzero"/></svg></button>

			<button class="pswp__button pswp-all-c pswp__button--arrow--right" title="<?php esc_attr_e( 'Next', 'zeen' ); ?>"><svg tabindex="0" aria-hidden="true" width="14" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M8.785 12.03L7 10.5 10 7H0V5h10L7 1.5 8.785.032 14 6z" fill="#FFF" fill-rule="nonzero"/></svg></button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>
	</div>
</div>