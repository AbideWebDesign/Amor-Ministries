( function( $ ) {
	
	// These handlers prefill the amount for certain designations. Remember what was
	// prefilled so switching designation clears only that prefill, never an amount
	// the donor typed in themselves.
	function setPresetAmount( $input, amount ) {

		$input.val( amount ).data( 'presetAmount', amount );

	}
	
	function clearPresetAmount( $input ) {

		if ( $input.val() === $input.data( 'presetAmount' ) ) {

			$input.val( '' );

		}

		$input.removeData( 'presetAmount' );

	}
	
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

            setPresetAmount( $priceInput, '$30.00' );

            $priceInput.prop( 'readonly', true );

            $monthlyCheckbox.prop( 'checked', true ).prop( 'disabled', true );

        } else {

            clearPresetAmount( $priceInput );

            $priceInput.prop( 'readonly', false );

            $monthlyCheckbox.prop( 'checked', false ).prop( 'disabled', false );

        }

    } );
	
	$( '#input_7_3' ).change( function() {

        var $priceInput = $( '#input_7_1' );
        var val = $( this ).val();

        $priceInput.next( '.gf-price-suffix' ).remove();

        if ( val === 'Complete House Sponsorship' ) {

            setPresetAmount( $priceInput, '5000' );

            $priceInput.prop( 'readonly', true );

        } else if ( val === 'Amor 365' ) {

            setPresetAmount( $priceInput, '15' );

            $priceInput.prop( 'readonly', false );

            $priceInput.after( '<span class="gf-price-suffix">/month</span>' );

        } else {

            clearPresetAmount( $priceInput );

            $priceInput.prop( 'readonly', false );

        }

    } );

} )( jQuery );