<?php

define( 'THEME_URL', get_template_directory_uri() . '/' );
define( 'THEME_DIR', dirname(__FILE__).'/' );

require_once(THEME_DIR . 'inc/trapstudio/security.php');
require_once(THEME_DIR . 'inc/trapstudio/scripts.php');
require_once(THEME_DIR . 'inc/trapstudio/backoffice.php');

//CUSTOM POST TYPE
require_once(THEME_DIR . 'inc/trapstudio/cpt.php');

//DISABLE COMMENTS
//require_once(THEME_DIR . 'inc/trapstudio/comments.php');

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

//WIDGET SIDEBAR
if ( function_exists('register_sidebars') ) {
	register_sidebar(
		array(
			'name' => 'Sidebar 1',
			'id' => 'sidebar-1'
		)
	);
	register_sidebar(
		array(
			'name' => 'Sidebar 2',
			'id' => 'sidebar-2'
		)
	);
	register_sidebar(
		array(
			'name' => 'Sidebar 3',
			'id' => 'sidebar-3'
		)
	);
}

//CF7
if (function_exists('wpcf7')) {
	add_filter('wpcf7_autop_or_not', '__return_false');
}

//REQUIRED PLUGIN
require_once(THEME_DIR . 'inc/plugins/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'bulldozer_register_required_plugins' );

function bulldozer_register_required_plugins() {

	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
        ),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
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
