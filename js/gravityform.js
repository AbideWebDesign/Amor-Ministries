( function( $ ) {
	
	gform.addAction( 'gform_input_change', function( elem, formId, fieldId ) {
	    
		if ( fieldId == '2.1' ) {
			
			if ( document.getElementById('choice_6_2_1').checked ) {
				
				document.getElementById('post-amount').innerHTML = "USD/Month";
				
			} else {
	
				document.getElementById('post-amount').innerHTML = "USD";
				
			}
		
		}
		
	}, 10, 3 );
	
} )( jQuery );