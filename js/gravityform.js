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

            $priceInput.val( '$30.00' ).prop( 'disabled', true );

            if ( ! $priceInput.next( '.ginput_amount_suffix' ).length ) {

                $priceInput.after( '<span class="ginput_amount_suffix">/month</span>' );

            }

            $monthlyCheckbox.prop( 'checked', true ).prop( 'disabled', true );

        } else {

            $priceInput.val( '' ).prop( 'disabled', false );

            $priceInput.next( '.ginput_amount_suffix' ).remove();

            $monthlyCheckbox.prop( 'checked', false ).prop( 'disabled', false );

        }

    } );
	
} )( jQuery );