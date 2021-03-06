/* global jQuery, LWA*/
( function($) {
	$(document).ready( function($) {

		var $doc = $(document);
		$doc.on( 'click', '.lwa-changer', function(e) {
			e.preventDefault();
			var linkParent = $(this).closest( '.tipi-logged-out-wrap' );
			linkParent.removeClass('lwa-active-1 lwa-active-2 lwa-active-3').addClass('lwa-active-' + $(this).data('changer'));
		});

		$doc.on( 'click', '.lwa-cancel', function(e) {
			e.preventDefault();
			var linkParent = $(this).closest( '.tipi-logged-out-wrap' );
			linkParent.removeClass('lwa-active-1 lwa-active-2 lwa-active-3').addClass('lwa-active-1');
		});

		$('.lwa-form').on( 'submit', function(event) {
			event.preventDefault();
			var form = $(this);
			var formParent = form.closest('.tipi-logged-out');
			var statusElement = form.find('.lwa-status');
			var ajaxFlag = form.find('.lwa-ajax');
			if ( ajaxFlag.length === 0 ) {
				ajaxFlag = $('<input class="lwa-ajax" name="lwa" type="hidden" value="1" />');
				form.prepend(ajaxFlag);
			}
			var formAction = typeof LWA !== 'undefined' ? formAction = LWA.ajaxurl : form.attr('action');
			$.ajax({
				type : 'POST',
				url : formAction,
				data : form.serialize(),
				beforeSend: function() {
					formParent.addClass('loading').parent().addClass('tipi-spin');
				},
				success : function(data) {
					lwaAjax( data, statusElement );
					$doc.trigger('lwa_' + data.action, [data, form]);
					formParent.removeClass('loading').parent().removeClass('tipi-spin');
				},
				error : function() { lwaAjax({}, statusElement); },
				dataType : 'jsonp'
			});
		});
		//Catch login actions
		$doc.on('lwa_login', function(event, data, form) {
			if ( data.result === true) {
				if ( data.widget !== null && typeof data.widget !== 'undefined' ) {
					$.get( data.widget, function(widget_result) {
						var newWidget = $(widget_result);
						form.parent('.lwa').replaceWith(newWidget);
						var lwaSub = newWidget.find('.').show();
						var lwaOrg = newWidget.parent().find('.lwa-title');
						lwaOrg.replaceWith(lwaSub);
					});
				} else {
					if ( data.redirect === null || typeof data.redirect === 'undefined' ) {
						window.location.reload();
					} else {
						window.location = data.redirect;
					}
				}
			}
		});
		//Handle a AJAX call for Login, RememberMe or Registration
		function lwaAjax( data, statusElement ) {
			statusElement = $(statusElement);
			if (data.result === true) { //Login Successful
				statusElement.attr('class','lwa-status lwa-status-confirm').html(data.message);
			} else if ( data.result === false ) { //Login Fail
				statusElement.attr('class','lwa-status lwa-status-invalid').html(data.error);
			} else { //Login Data Fail
				statusElement.attr('class','lwa-status lwa-status-invalid').html('Error.');
			}
		}
	});
})(jQuery);