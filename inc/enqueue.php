<?php
/**
 * Amor enqueue scripts
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'amor_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function amor_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'amor-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		
		wp_enqueue_style('amor-fonts', 'https://use.typekit.net/emd8vfp.css', array() );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
					
		wp_enqueue_script( 'sharethis', 'https://platform-api.sharethis.com/js/sharethis.js#property=608c4c4a3a051200125df93d&&product=custom-share-buttons', array(), $js_version, true );
			
	}
} // endif function_exists( 'amor_scripts' ).

add_action( 'wp_enqueue_scripts', 'amor_scripts' );
