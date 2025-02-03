<?php
/**
 * Amor modify editor
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue supplemental block editor styles.
 */
function amor_block_editor_styles() {

	$css_dependencies = array();

	// Enqueue the editor styles.
	wp_enqueue_style( 'amor-block-editor-styles', get_theme_file_uri( '/css/custom-editor-style.min.css' ), $css_dependencies, wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style('amor-fonts', 'https://use.typekit.net/emd8vfp.css', array() );
	wp_style_add_data( 'amor-block-editor-styles', 'rtl', 'replace' );

}

add_action( 'enqueue_block_editor_assets', 'amor_block_editor_styles', 1, 1 );

/**
 * ACF Color Palette
 *
 * Add default color palatte to ACF color picker for branding
 * Match these colors to colors set up in /sass/theme/theme_variables.scss
 *
*/
function amor_acf_extension_enqueue() {
	
	$handle = 'acf-js';
	$src = get_template_directory_uri() . '/js/acf.js';
	
	$deps = array('acf-input');
	
	wp_enqueue_script( $handle, $src, $deps, false, true );

}

add_action( 'acf/input/admin_enqueue_scripts', 'amor_acf_extension_enqueue' );

/** 
 * Function to return color class based on ACF color selection
*/
function get_color_class( $color_picker_value ) {

	$wd_block_colors = [
		// Change these to match theme color classes 
		'primary'	=> '#0f71b6',
		'secondary'	=> '#72c6a6',
		'accent' 	=> '#fbd402',
		'secondary-accent' => '#fb6263',
		'black'		=> '#1d1d2c',
		'white'     => '#ffffff',
		'light'		=> '#f8f8f8',
	];
	
	// Loop over colors array and set proper class if background color selection matches value
	foreach ( $wd_block_colors as $key => $value ) {
		
		if ( $color_picker_value == $value ) {
		
				return $key;
		
		}
	}
	
	return 'primary';
}

/** 
 * Function to return color class based on ACF color selection
*/
function get_color_text_class( $bg_color_class ) {
	
	$dark_colors = array('primary', 'secondary', 'secondary-accent', 'black');
	
	if ( in_array( $bg_color_class, $dark_colors ) ) {
		
		return true;
		
	} else {
		
		return false;
		
	}
	
}
/** 
 * Generate button code
 * 
 * @param array $group_content.
 *
 * @return string $button_html
*/
function get_button( $group_content ) {

		
	$button = array (
		'link' 			=> $group_content['button']['button_link'],
		'class_size' 	=> $group_content['button']['button_size'],
		'class_color' 	=> get_color_class( $group_content['button']['button_color'] ),
		'label' 		=> $group_content['button']['button_label'],	
	);
	
	$button_html = '<a class="btn ' . $button['class_size'] . ' btn-' . $button['class_color'] . '" href="' . $button['link']['url'] . '" target="' . $button['link']['target'] . '">' . $button['label'] . '</a>';

	return $button_html;
	
}

/** 
 * Generate button code
 * 
 * @param array $group_content.
 *
 * @return string $button_html
*/
function get_button_alt( $b ) {

		
	$button = array (
		'link' 			=> $b['button_link'],
		'class_size' 	=> $b['button_size'],
		'class_color' 	=> get_color_class( $b['button_color'] ),
		'label' 		=> $b['button_label'],	
	);
	
	$button_html = '<a class="btn ' . $button['class_size'] . ' btn-' . $button['class_color'] . '" href="' . $button['link']['url'] . '" target="' . $button['link']['target'] . '">' . $button['label'] . '</a>';

	return $button_html;
	
}

/** 
 * Generate divider code
 *
 * @return string $divider_html
*/
function get_divider() {
	
	$divider_html = '<img src="' . get_field('divider_image', 'options') . '" width="40px" />';
	
	return $divider_html;
	
}

function has_alert() {
	
	global $post;
	
	if ( have_rows( 'alerts', 'options' ) && $post ) {
						
		while ( have_rows( 'alerts', 'options' ) ) {
			
			the_row();
			
			if ( get_sub_field('active') ) {
				
				$pages = get_sub_field('pages');
				
				if ( in_array( $post->ID, $pages ) ) {
				
					return true;
				
				}
			
			}
			
		}
	
	}
	
	return false;
}

/**
 * Gravity Forms
*/
 
// Script enqueues
add_action( 'gform_enqueue_scripts', 'enqueue_custom_script', 10, 2 );

function enqueue_custom_script( $form, $is_ajax ) {
    
    wp_enqueue_script( 'amor-gravity-scripts', get_template_directory_uri() . '/js/gravityform-min.js', array(), true );

}

// Edit gravity form fee product label on payment form
add_filter( 'gform_product_price_2', 'set_cc_price_label', 10, 2 );
add_filter( 'gform_product_price_6', 'set_cc_price_label', 10, 2 );
add_filter( 'gform_product_price_3', 'set_price_label', 10, 2 );
add_filter( 'gform_product_price_7', 'set_cc_price_label', 10, 2 );
add_filter( 'gform_product_price_9', 'set_price_label', 10, 2 );
add_filter( 'gform_product_price_11', 'set_price_label', 10, 2 );
add_filter( 'gform_product_price_13', 'set_price_label', 10, 2 );
add_filter( 'gform_product_price_24', 'set_price_label', 10, 2 );
add_filter( 'gform_product_price_25', 'set_cc_price_label', 10, 2 );
add_filter( 'gform_product_price_46', 'set_cc_price_label', 10, 2 );

function set_price_label( $sublabel, $form_id ) {
	
	return 'Fee';

}

function set_cc_price_label( $sublabel, $form_id ) {
	
	return 'Processing Fee'; 
	
}

// Change the stripe description
add_filter( 'gform_stripe_charge_description', 'change_stripe_description', 10, 3 );

function change_stripe_description( $description, $strings, $entry ) {

    $form_id = rgar( $entry, 'form_id' );
	$form = GFAPI::get_form( $form_id );
	$description = $form['title'];
	return $description;

}

// Remove scroll to top functionality on multi-page forms.
add_filter( 'gform_confirmation_anchor', '__return_false' );

// Remove dollar symbol
add_filter( 'gform_currencies', 'modify_currencies' );

function modify_currencies( $currencies ) {

	$currencies['USD'] = array(
		'name'               => esc_html__( 'USD', 'gravityforms' ),
		'symbol_left'        => '',
		'symbol_right'       => '',
		'symbol_padding'     => ' ',
		'thousand_separator' => ',',
		'decimal_separator'  => '.',
		'decimals'           => 2
	);

	return $currencies;
}

// Change spinner
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );

function spinner_url( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

}

// Set default amount for Amor 365 Form
add_filter( 'gform_field_value_amor365_amount', 'amor365_populate_function' );

function amor365_populate_function( $value ) {
	
    return '15.00';

}


// Set default amount for CHS Form
add_filter( 'gform_field_value_chs_amount', 'chs_populate_function' );

function chs_populate_function( $value ) {
	
    return '3,780.00';

}

// Custom early bird calculations
add_filter( 'gform_field_value_now', 'pre_load_timestamp' );

function pre_load_timestamp( $value ) {
	
	$tz = new DateTimeZone( 'America/Los_Angeles' );
	
	$date_now = new DateTime();
	
	$date_now->setTimezone( $tz );

	return $date_now->getTimestamp();
	
}