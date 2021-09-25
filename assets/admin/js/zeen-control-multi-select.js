/**
 * Copyright: Codetipi
 * Theme: Zeen
 * Version: 1.0.8
 */
(function( $ ) {

    'use strict';
    wp.customize.controlConstructor['zeen-multi-select'] = wp.customize.Control.extend({

        ready: function() {
            var control = this,
            input = control.container.find('.tipi-multi-on'),
            select = control.container.find('select'),
            order = select.hasClass( 'select__with-order' ),
            parent = select.closest('.zeen-select-wrap');
            if ( order === true ) {
            	select.multiSelect({
            		keepOrder: true,
            		afterSelect: function(value){
						var currentSelections = parent.find( '.ms-selection .ms-list .ms-selected' );
						currentSelections.each( function() {
							var found = select.find( 'option:contains("' + $(this).find('span').text() + '")' );
							var tempval = found.val();
							found.remove();
				      		select.append( $('<option>' + $(this).find('span').text() + '</option>').attr( 'value', tempval ).attr('selected', 'selected')  );
							
						});
				    },
				    afterDeselect: function(value){
				    	var currentSelections = parent.find( '.ms-selection .ms-list li:not(.ms-selected)' );
						currentSelections.each( function() {
							var found = select.find( 'option:contains("' + $(this).find('span').text() + '")' );
							var tempval = found.val();
							found.remove();
				      		select.append( $('<option>' + $(this).find('span').text() + '</option>').attr( 'value', tempval ) );
						});
				    },
            		selectableHeader: '<div class="selectable-header">' + select.data('selectableheader') + '</div>',
            		selectionHeader: '<div class="selectable-header">' + select.data('selectionheader') + '</div>',
            	});
            	select.on( 'change', function() {
            		setTimeout(function() {
            			select.val( select.val() ); 
            			control.setting.set( select.val() );
            		}, 100 );
            	});
            }
        }

    });

} )( jQuery );
