<?php
// ACF 
if( function_exists('acf_add_options_page') ) {
    // PAGE OPTION
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Opzioni Tema',
		'menu_slug' 	=> 'acf-options',
		'redirect' 		=> false
	));	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contatti',
		'menu_slug' 	=> 'acf-contact',
		'parent_slug' 	=> $parent['menu_slug'],
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Colori & Font',
		'menu_slug' 	=> 'acf-typography',
		'parent_slug' 	=> $parent['menu_slug'],
	));
    
    // API KEY
    function my_acf_init() {
        acf_update_setting('google_api_key', get_field('api', 'option'));
        
        // check function exists
        if( function_exists('acf_register_block') ) {
            
            // Hero
            acf_register_block(array(
                'name'				=> 'hero',
                'title'				=> __('Hero'),
                'render_callback'	=> 'my_acf_block_render_callback',
                'category'			=> 'formatting',
                'icon'				=> 'button', //https://developer.wordpress.org/resource/dashicons/#table-col-before
            ));
            
        }
    }
    add_action('acf/init', 'my_acf_init');
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/example") into path friendly slug ("example")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/partials/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/partials/block/content-{$slug}.php") );
	}
}

?>