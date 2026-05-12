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

            $priceInput.val( '$30.00' ).prop( 'readonly', true );

            $monthlyCheckbox.prop( 'checked', true ).prop( 'disabled', true );

        } else {

            $priceInput.val( '' ).prop( 'readonly', false );

            $monthlyCheckbox.prop( 'checked', false ).prop( 'disabled', false );

        }

    } );
	
	$( '#input_7_3' ).change( function() {

        var $priceInput = $( '#input_7_1' );
        var val = $( this ).val();

        $priceInput.next( '.gf-price-suffix' ).remove();

        if ( val === 'Complete House Sponsorship' ) {

            $priceInput.val( '5000' ).prop( 'readonly', true );

        } else if ( val === 'Amor 365' ) {

            $priceInput.val( '15' ).prop( 'readonly', false );

            $priceInput.after( '<span class="gf-price-suffix">/month</span>' );

        } else {

            $priceInput.val( '' ).prop( 'readonly', false );

        }

    } );

} )( jQuery );