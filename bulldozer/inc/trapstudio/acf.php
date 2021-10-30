<?php

//DISABILITO EDITOR VISUALE ACF
//add_filter('acf/settings/show_admin', '__return_false');

// PAGE OPTION
$dati_tema = wp_get_theme();
$title_option_page = 'Opzioni '.$dati_tema->Name;

acf_add_options_sub_page(array(
    'page_title' 	    => $title_option_page,
    'menu_slug' 	    => 'acf-options',
    'parent_slug'       => 'themes.php',
    'update_button'     => __('Aggiorna', 'acf'),
    'updated_message'   => __("Opzioni aggiornate", 'acf'),
));	

function my_acf_init() {
    // API KEY
    acf_update_setting('google_api_key', get_field('api', 'option'));
    
    // GUTENBERG BLOCK REGISTRATION
    if( function_exists('acf_register_block_type') ) {
        
        acf_register_block_type(array(
            'name'				=> 'layout',
            'title'				=> __('Layout'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'mode'              => 'preview',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'icon'				=> 'layout', //https://developer.wordpress.org/resource/dashicons/
        ));

        acf_register_block_type(array(
            'name'				=> 'hero',
            'title'				=> __('Hero'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'cover-image',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'page-header',
            'title'				=> __('Page Header WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'welcome-widgets-menus',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'call-to-action',
            'title'				=> __('Call To Action'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'admin-links',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'header',
            'title'				=> __('Intestazione'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'heading',
        ));

        
        acf_register_block_type(array(
            'name'				=> 'link',
            'title'				=> __('Link Custom'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'admin-links',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'video',
            'title'				=> __('Video WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'format-video',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'gallery',
            'title'				=> __('Galleria Custom WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'format-gallery',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'media-text',
            'title'				=> __('Blocco testo + immagine WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'align-pull-left',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'list',
            'title'				=> __('Lista WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'editor-ul',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'cards',
            'title'				=> __('Cards'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'id',
        ));
        
        /*
        acf_register_block_type(array(
            'name'				=> 'posts',
            'title'				=> __('Articoli'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'post',
        ));
        */
        
        acf_register_block_type(array(
            'name'				=> 'form',
            'title'				=> __('Form'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'forms',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'partner',
            'title'				=> __('Partner WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'businessman',
        ));
        
        acf_register_block_type(array(
            'name'				=> 'slider',
            'title'				=> __('Slider WIP'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'custom',
            'icon'				=> 'slides',
        ));
        
    }
}
add_action('acf/init', 'my_acf_init');

// GUTENBERG CATEGORIES REGISTRATION
function bulldozer_block_categories( $categories, $post ) {
    return array_merge(
		array(
            array(
                'slug' => 'custom',
                'title' => __( 'Custom Blocks', 'bulldozer' ),
                'icon'  => 'wordpress',
            ),
        ),
        $categories
    );
}   
add_filter( 'block_categories_all', 'bulldozer_block_categories', 10, 2 );

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/example") into path friendly slug ("example")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/partials/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/partials/block/content-{$slug}.php") );
	}
}

//REMOVE ADMIN BAR FOR ADMINISTRATOR IF OPTION FIELD IS CHECKED
if(!is_admin() && current_user_can('administrator') && get_field('admin_bar', 'option')){
    add_filter('show_admin_bar', '__return_false');
}