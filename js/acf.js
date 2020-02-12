( function($) {
		
	/**
	* ACF Color Palette
	*
	* Add default color palatte to ACF color picker for branding
	* Match these colors to colors in /functions.php & /sass/theme/theme_variables.scss
	*
	*/
	acf.add_filter( 'color_picker_args', function( args, $field ){

		// add the hexadecimal codes here for the colors you want to appear as swatches
		if ( $field[0].dataset.name == 'background_color' ) {
		
		// Limit to colors appropriate for backgrounds 
		 args.palettes = ['#0f71b6', '#72c6a6', '#fb6263', '#ffffff', '#f8f8f8']; 
		
		} else {
		
			// Display full color options
			args.palettes = ['#0f71b6', '#72c6a6', '#fbd402', '#fb6263', '#1d1d2c', '#ffffff', '#f8f8f8'];
		  
		}
		
		// return colors
		return args;
		
 	});
 	
})(jQuery);

