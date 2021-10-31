<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<?php 
    $body_font =  get_field('font_body', 'option'); 
    $title_font =  get_field('font_title', 'option'); 
?>
<head>
    <link href="https://fonts.googleapis.com/css?family=<?php echo $body_font['value'] ?>:300,400,500,600,700,900|<?php echo $title_font['value'] ?>:300,400,500,600,700,900" rel="stylesheet">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="theme-color" content="#000000">
    
    <title><?php wp_title(' - ', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
    <![endif]-->
    
	<?php wp_head(); ?>

    <style>
    :root {
        --text-font-family: '<?php echo $body_font['label'] ?>', sans-serif;
        --title-font-family: '<?php echo $title_font['label'] ?>', sans-serif;
        --mobile-font-size: <?php the_field('font_mobile', 'option') ?>px;
        --desktop-font-size: <?php the_field('font_desktop', 'option') ?>px;
        --color-text: <?php the_field('color_text', 'option') ?>;
        --color-primary: <?php the_field('color_primary', 'option') ?>;
        --color-secondary: <?php the_field('color_secondary', 'option') ?>;
        --color-link: <?php the_field('color_link', 'option') ?>;
        --color-button: <?php the_field('color_button', 'option') ?>;
        --bg-button: <?php the_field('bg_button', 'option') ?>;
        --hover-button: <?php the_field('hover_button', 'option') ?>;
    }
    <?php if(!get_field('header_negative')): ?>
        .c-site-header {
        position: relative;
        }
        .c-site-header__toggle__item {
        border-color: #0c40a5;
        }
        @media screen and (min-width: 1024px) {
            .c-site-header__nav__menu li a {
                color: #0c40a5 !important;
            }
            .c-site-header__nav__menu li.current-menu-item a::after,
            .c-site-header__nav__menu li a:hover::after {
                background-color: #0c40a5;
            }
        }
    <?php endif; ?>
    </style>
    
    <?php if(get_field('css_custom', 'option')): ?>
        <style>
            <?php the_field('css_custom', 'option'); ?>
        </style>
    <?php endif; ?>    
    
    <?php if(get_field('html_header', 'option')):
        the_field('html_header', 'option');
    endif; ?>
</head>

<body <?php body_class(); ?>>

    <header class="c-site-header">
        <div class="l-container">
            <a class="c-logo" href="<?php bloginfo('url'); ?>">
                <?php echo wp_get_attachment_image(get_field('contact_logo', 'option'), 'large') ?>
            </a> 
            
            <a class="c-site-header__toggle j-toggle">
                <span class="c-site-header__toggle__item"></span>
                <span class="c-site-header__toggle__item"></span>
                <span class="c-site-header__toggle__item"></span>
            </a>

            <nav class="c-site-header__nav">                          
                <ul class="c-site-header__nav__menu">
                    <?php
                    $args = array(
                    'theme_location' => 'Primario',
                    'depth'    => 1,
                    'items_wrap' => '%3$s',
                    'container' => ''
                    );

                    wp_nav_menu($args);
                    ?>
                </ul>
            </nav> 

            <?php if( class_exists('woocommerce') ): ?> 
                <!-- 
                TODO MINI CART
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
                 -->
            <?php endif; ?>
        </div>
    </header>
    <div class="l-main l-container l-container--small">