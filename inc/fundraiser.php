<?php 

function get_fundraiser_total( $goal, $form_id ) {
	
	$entries = GFAPI::get_entries( $form_id, null, null, array( 'page_size' => 100 ) );
	
	$total = 0;
	
	foreach( $entries as $entry ) {
		
		$total += $entry['payment_amount'];
		
	}

	$progress = ( $total/$goal ) * 100;
	
	return ( $progress );

}
?>