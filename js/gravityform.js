( function( $ ) {
	
	$( '.monthly input' ).click( function() {

		if ( $( this ).is( ':checked ' ) ) {

			$( '#post-amount' ).text( 'USD/Month' );
				
		} else {
	
			$( '#post-amount' ).text( 'USD' );
			
		}
	
	} );
	
	$( '#input_42_14' ).change( function() {

        var $priceInput = $( '#input_42_1' );
        var $monthlyCheckbox = $( '#choice_42_15_1' );

        if ( $( this ).val() === 'Amor YP Champion' ) {

            $priceInput.val( '$30.00/month' ).prop( 'disabled', true );

            $monthlyCheckbox.prop( 'checked', true ).prop( 'disabled', true );

        } else {

            $priceInput.val( '' ).prop( 'disabled', false );

            $monthlyCheckbox.prop( 'checked', false ).prop( 'disabled', false );

        }

    } );
	
} )( jQuery );