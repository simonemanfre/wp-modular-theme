<?php

define( 'THEME_URL', get_template_directory_uri() . '/' );
define( 'THEME_DIR', dirname(__FILE__).'/' );

require_once(THEME_DIR . 'inc/trapstudio/security.php');
require_once(THEME_DIR . 'inc/trapstudio/scripts.php');
require_once(THEME_DIR . 'inc/trapstudio/backoffice.php');

/*
//CUSTOM POST TYPE
require_once(THEME_DIR . 'inc/trapstudio/cpt.php');
*/

//DISABLE COMMENTS
require_once(THEME_DIR . 'inc/trapstudio/comments.php');

//ACF
if( function_exists('acf_add_options_page') ):
    require_once(THEME_DIR . 'inc/trapstudio/acf.php');
endif;

//WOOCOMMERCE
if( class_exists('woocommerce') ):
    require_once(THEME_DIR . 'inc/trapstudio/woocommerce.php');
endif;

//MENU
add_theme_support( 'nav-menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array('Primario' => __( 'Navigazione primaria') ) );
	register_nav_menus( array('Footer' => __( 'Navigazione footer') ) );
}


//THUMBNAILS
add_theme_support('post-thumbnails' );
//add_image_size('customThumbSize', 180, 120, true);


//CF7
if (function_exists('wpcf7')) {
	add_filter('wpcf7_autop_or_not', '__return_false');
	//RIMUOVO STILE E SCRIPT CF7 OVUNQUE
    //add_filter( 'wpcf7_load_js', '__return_false' );
    //add_filter( 'wpcf7_load_css', '__return_false' );
}

/*
** PER REGISTRARE CF7 NEI TEMPLATE IN CUI È USATO

//REGISTRO FILE E SCRIPT CF7 IN QUESTO TEMPLATE
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
    wpcf7_enqueue_scripts();
}
if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
    wpcf7_enqueue_styles();
}
*/


// LOGIN CUSTOM LOGO
function my_login_logo_url() {
    return 'http://www.webdesignsimone.it/';
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Realizzato da Simone Manfredini';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//SVG UPLOAD
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
    }
add_filter('upload_mimes', 'cc_mime_types');


//REQUIRED PLUGIN
require_once(THEME_DIR . 'inc/plugins/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'bulldozer_register_required_plugins' );

function bulldozer_register_required_plugins() {

	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Custom Post Type UI',
			'slug'      => 'custom-post-type-ui',
			'required'  => false,
        ),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
        ),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'yoast-seo',
			'required'  => false,
		),
		array(
			'name'      => 'Smush',
			'slug'      => 'smush',
			'required'  => false,
        ),
		array(
			'name'      => 'Autoptimize',
			'slug'      => 'autoptimize',
			'required'  => false,
        ),
		array(
			'name'      => 'WP Fastest Cache',
			'slug'      => 'wp-fastest-cache',
			'required'  => false,
        ),
		array(
			'name'      => 'Flying Pages',
			'slug'      => 'flying-pages',
			'required'  => false,
        ),
        
        // This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Advanced Custom Fields Pro',
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => THEME_DIR . 'inc/plugins/advanced-custom-fields-pro.zip',
			'required'           => true,
		),
	);

	$config = array(
		'id'           => 'bulldozer',              // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

?>