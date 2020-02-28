<?php 
	

add_action('acf/init', 'amor_acf_init');

function amor_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {

		// register a default text block
		acf_register_block(array(
			'name'				=> 'default-text',
			'title'				=> __('Default Text'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'text',
		));
		
		// register a hero banner block
		acf_register_block(array(
			'name'				=> 'hero-banner',
			'title'				=> __('Hero Banner'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'format-image',
		));
		
		// register a pattern hero banner block
		acf_register_block(array(
			'name'				=> 'pattern-hero-banner',
			'title'				=> __('Pattern Hero Banner'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'format-image',
		));
		
		// register a image feature block
		acf_register_block(array(
			'name'				=> 'image-feature',
			'title'				=> __('Image Feature'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'align-left',
		));
		
		// register a icon group block
		acf_register_block(array(
			'name'				=> 'icon-group',
			'title'				=> __('Icon Group'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'megaphone',
		));
		
		// register a divider block
		acf_register_block(array(
			'name'				=> 'divider',
			'title'				=> __('Divider Pattern'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'editor-insertmore',
		));
		
		// register a divider block
		acf_register_block(array(
			'name'				=> 'divider-alt',
			'title'				=> __('Divider House'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'editor-insertmore',
		));
		
		// register a card block
		acf_register_block(array(
			'name'				=> 'cards',
			'title'				=> __('Cards block'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
		));		
		// register a form block
		acf_register_block(array(
			'name'				=> 'form',
			'title'				=> __('Form block'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'welcome-write-blog',
		));	
		// register a list group block
		acf_register_block(array(
			'name'				=> 'list-group',
			'title'				=> __('List Group block'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'menu',
		));	
	}
}

function amor_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/blocks" folder
	if( file_exists( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") ) ) {
		
		include( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") );
	
	}
}