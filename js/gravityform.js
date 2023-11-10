( function( $ ) {
	
	$( '.monthly input' ).click( function() {

		if ( $( this ).is( ':checked ' ) ) {

			$( '#post-amount' ).text( 'USD/Month' );
				
		} else {
	
			$( '#post-amount' ).text( 'USD' );
			
		}
	
	} );
	
	$( '#input_42_14' ).change( function() {

        if ( $( this ).val() === 'Amor YP Sponsorship' ) {

            $( '#choice_42_15_1').prop( 'checked', true );
            
        } else {

            $( '#choice_42_15_1' ).prop( 'checked', false );
            
        }
        
    } );
	
} )( jQuery );