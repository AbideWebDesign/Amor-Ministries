( function( $ ) {
	
	$( '.monthly input' ).click( function() {

		if ( $( this ).is( ':checked ') ) {

			$( '#post-amount' ).text( 'USD/Month' );
				
		} else {
	
			$( '#post-amount' ).text( 'USD' );
			
		}
	
	} );
	
} )( jQuery );