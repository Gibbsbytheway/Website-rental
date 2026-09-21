( function( $ ) {
	'use strict';

	function renderPreview( wrapper, ids ) {
		var preview = wrapper.find( '#asteria-galerie-preview' );
		preview.empty();

		if ( ! ids.length ) {
			return;
		}

		ids.forEach( function( id ) {
			var attachment = wp.media.attachment( id );
			attachment.fetch().done( function() {
				var thumb = attachment.get( 'sizes' ) && attachment.get( 'sizes' ).thumbnail
					? attachment.get( 'sizes' ).thumbnail.url
					: attachment.get( 'url' );
				preview.append( '<img src="' + thumb + '" style="width:60px;height:60px;object-fit:cover;margin:2px;" />' );
			} );
		} );
	}

	$( document ).ready( function() {
		var wrapper = $( '#asteria-galerie-wrapper' );
		if ( ! wrapper.length ) {
			return;
		}

		var input = $( '#asteria-galerie-ids' );
		var ids = ( input.val() || '' ).split( ',' ).filter( Boolean ).map( Number );
		renderPreview( wrapper, ids );

		var frame;
		$( '#asteria-galerie-select' ).on( 'click', function( e ) {
			e.preventDefault();

			if ( frame ) {
				frame.open();
				return;
			}

			frame = wp.media( {
				title: 'Choisir les photos du logement',
				button: { text: 'Ajouter à la galerie' },
				multiple: true,
			} );

			frame.on( 'select', function() {
				var selection = frame.state().get( 'selection' );
				ids = selection.map( function( attachment ) {
					return attachment.id;
				} );
				input.val( ids.join( ',' ) );
				renderPreview( wrapper, ids );
			} );

			frame.open();
		} );
	} );
} )( jQuery );
