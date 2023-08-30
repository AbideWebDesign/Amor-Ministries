<?php

//add_filter( 'gform_stripe_charge_pre_create', 'stripe_charge_pre_create', 10, 5 );

function stripe_charge_pre_create( $charge_meta, $feed, $submission_data, $form, $entry ) {

	$forms = [ 2 ];
	
	if ( ! empty( $submission_data['payment_method'] ) ) {
	
		if ( in_array( $feed['form_id'], $forms ) ) {
			
			if ( $submission_data['payment_method'] == 'us_bank_account' ) {
							
				$amount = $charge_meta['amount'];
				
				$fee = $amount * .8;
							
				if ( $fee > 500 ) {
					
					$charge_meta['amount'] = $amount + 500;
				
				} else {
					
					$charge_meta['amount'] = $amount + $fee;
					
				}
							
			} else {
				
				$amount = $charge_meta['amount'];
	
				$fee = ( ( ( $amount / 100 ) + 0.30 ) / ( 1 - 0.022 ) ) - ( $amount / 100 );
				
				$charge_meta['amount'] = $amount + $fee;
	
			}
			
		}
		
	}

    return $charge_meta;
    
}