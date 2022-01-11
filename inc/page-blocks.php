<?php 
	
add_action( 'after_setup_theme', 'amor_remove_patterns' );

function amor_remove_patterns() {
	
	remove_theme_support( 'core-block-patterns' );

}

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
			'mode'				=> 'edit',
		));
		
		// register a hero banner block
		acf_register_block(array(
			'name'				=> 'hero-banner',
			'title'				=> __('Hero Banner'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'format-image',
			'mode'				=> 'edit',
		));
		
		// register a pattern hero banner block
		acf_register_block(array(
			'name'				=> 'pattern-hero-banner',
			'title'				=> __('Pattern Hero Banner'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'format-image',
			'mode'				=> 'edit',
		));
		
		// register a image feature block
		acf_register_block(array(
			'name'				=> 'image-feature',
			'title'				=> __('Image Feature'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'align-left',
			'mode'				=> 'edit',
		));
		
		// register a icon group block
		acf_register_block(array(
			'name'				=> 'icon-group',
			'title'				=> __('Icon Group'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'megaphone',
			'mode'				=> 'edit',
		));
		
		// register a divider block
		acf_register_block(array(
			'name'				=> 'divider',
			'title'				=> __('Divider Pattern'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'editor-insertmore',
			'mode'				=> 'edit',
		));
		
		// register a divider block
		acf_register_block(array(
			'name'				=> 'divider-alt',
			'title'				=> __('Divider House'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'editor-insertmore',
			'mode'				=> 'edit',
		));
		
		// register a card block
		acf_register_block(array(
			'name'				=> 'cards',
			'title'				=> __('Cards block'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'mode'				=> 'edit',
		));		
		
		// register a form block
		acf_register_block(array(
			'name'				=> 'form',
			'title'				=> __('Form block'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'welcome-write-blog',
			'mode'				=> 'edit',
		));	
		
		// register a list group block
		acf_register_block(array(
			'name'				=> 'list-group',
			'title'				=> __('List Group'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'menu',
			'mode'				=> 'edit',
		));	
		
		// register a single image block
		acf_register_block(array(
			'name'				=> 'single-image',
			'title'				=> __('Single Image'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'format-image',
			'mode'				=> 'edit',
		));	
		// register vimeo block
		acf_register_block(array(
			'name'				=> 'vimeo',
			'title'				=> __('Vimeo Video'),
			'description'		=> __(''),
			'render_callback'	=> 'amor_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'format-video',
			'mode'				=> 'edit',
		));	
	}
}

function amor_acf_block_render_callback( $block ) {
	
	$slug = str_replace( 'acf/', '', $block['name'] );
	
	if ( file_exists( get_theme_file_path( "/template-parts/blocks/content-{$slug}.php" ) ) ) {
		
		include( get_theme_file_path( "/template-parts/blocks/content-{$slug}.php" ) );
	
	}
}

add_filter( 'allowed_block_types_all', 'amor_allowed_block_types', 10, 2 );
 
function amor_allowed_block_types( $allowed_blocks ) {

	global $post;
	
	if ( $post->post_type == 'post' ) {
		
		return array(
			'acf/default-text',
			'acf/single-image',
			'acf/vimeo',
		);
		
	} else {
		
		return array(
			'acf/default-text',
			'acf/hero-banner',
			'acf/pattern-hero-banner',
			'acf/image-feature',
			'acf/icon-group',
			'acf/divider',
			'acf/divider-alt',
			'acf/cards',
			'acf/form',
			'acf/list-group',
			'acf/single-image',
		);
		
	} 

}