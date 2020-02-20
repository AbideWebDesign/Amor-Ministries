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
 * Generate divider code
 *
 * @return string $divider_html
*/
function get_divider() {
	
	$divider_html = '<img src="' . get_field('divider_image', 'options') . '" width="40px" />';
	
	return $divider_html;
	
}

/**
 * Gravity Forms Bootstrap Styles
 *
 * Applies bootstrap classes to various common field types.
 * Requires Bootstrap to be in use by the theme.
 *
 * Using this function allows use of Gravity Forms default CSS
 * in conjuction with Bootstrap (benefit for fields types such as Address).
 *
 * @see  gform_field_content
 * @link http://www.gravityhelp.com/documentation/page/Gform_field_content
 *
 * @return string Modified field content
 */
add_filter("gform_field_content", "bootstrap_styles_for_gravityforms_fields", 10, 5);
function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){

	if ( !is_admin() ) {
		// Currently only applies to most common field types, but could be expanded.
	
		if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
			$content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
		}
	
		if($field["type"] == 'name' || $field["type"] == 'address') {
			$content = str_replace('<input ', '<input class=\'form-control\' ', $content);
		}
	
		if($field["type"] == 'textarea') {
			$content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
		}
	
		if ( $field["type"] == 'checkbox' ) {
			
			$content = str_replace('li class=\'', 'li class=\'form-check ', $content);
			$content = str_replace('<input ', '<input class="custom-control-input" style=\'margin-top:-2px\' ', $content);
			//$content = str_replace('<label ', '<label class=\'custom-control-label\' ', $content);
			
		}
	
		if ( $field["type"] == 'select' ) {
			
			$content = str_replace('large gfield_select', 'custom-select custom-select-lg', $content);
		
		}
		
		if ( $field["type"] == 'product' ) {
	
			$content = str_replace("<div class='ginput_container ginput_container_product_price'>", '', $content);
			$content = str_replace('</div>', '', $content);
		}
		
		if($field["type"] == 'radio') {
			$content = str_replace('li class=\'', 'li class=\'radio ', $content);
			$content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
		}
	
	}

	return $content;

} 

// End bootstrap_styles_for_gravityforms_fields()
add_filter("gform_submit_button", "form_submit_button", 10, 2);

function form_submit_button($button, $form){

    return "<button class='button btn btn-primary' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";

}

// Edit gravity form field containers
add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );

function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
	
	$id = $field->id;
		
	$field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
	
	if ( !is_admin() ) {

		if ( $field->type == 'product' ) {
			
			return '<li id="' . $field_id . '" class="' . $css_class . '"><div id="' . $field_id . '" class="' . $css_class . ' input-group input-group-lg"><div class="input-group-prepend"><span class="input-group-text">$</span></div>{FIELD_CONTENT}</div></li>';
			
		} else if ( $field->type == 'checkbox' ) {
			
			return '<li id="' . $field_id . '" class="' . $css_class . '"><div class="custom-control custom-checkbox">{FIELD_CONTENT}</div></li>';
			
		} else {
			
			return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
			
		}
		
	} else {
		
		return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
		
	}
}