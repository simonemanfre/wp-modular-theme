<?php 

	function site_scripts_and_css() {
        $dati_tema = wp_get_theme();
        $var_array = array();

        //FILE CSS
        wp_enqueue_style('normalize', get_template_directory_uri() . "/normalize.css", array(), $dati_tema->Version);
        wp_enqueue_style('icons', get_template_directory_uri() . "/icons.css", array('normalize'), $dati_tema->Version);
        wp_enqueue_style('slick', get_template_directory_uri() . "/slick.css", array('normalize'), $dati_tema->Version);
        wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), $dati_tema->Version);
        wp_enqueue_style('responsive', get_template_directory_uri() . "/responsive.css", array('style'), $dati_tema->Version, '(min-width: 480px)');
        
		//FILE SCRIPTS
        wp_enqueue_script( 'ofi', get_template_directory_uri() . "/js/ofi.min.js", array('jquery'), '1.0', true);
        wp_register_script('siteScripts', get_template_directory_uri() . "/js/scripts.js", array('jquery'), '1.0', true );

        //SLICK
        $var_array['slick'] = true;
        wp_enqueue_script('slick', get_template_directory_uri() . "/js/slick.min.js", array('jquery'), '1.0', true);
        
        //VARIABILI DA PASSARE A JS
        $var_array['home'] = get_bloginfo('url');

        wp_localize_script('siteScripts', 'php_vars', $var_array );

		wp_enqueue_script('siteScripts');
	}
    add_action( 'wp_enqueue_scripts', 'site_scripts_and_css' );