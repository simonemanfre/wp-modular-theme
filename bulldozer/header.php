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
    html, input, select, textarea {
        font-family: '<?php echo $body_font['label'] ?>', sans-serif;
        font-size: <?php the_field('font_mobile', 'option') ?>px;
    }
    html, p, input, select, textarea {
        color: <?php the_field('color_text', 'option') ?>;
    }
    h1, h2, h3, h4, h5, h6, .c-title, .c-subtitle, .c-button, .c-site-header__nav__menu li {
        font-family: '<?php echo $title_font['label'] ?>', sans-serif;
    }
    .c-title{
        color: <?php the_field('color_primary', 'option') ?>;
    }
    .c-subtitle{
        color: <?php the_field('color_secondary', 'option') ?>;
    }
    a, a:hover {
        color: <?php the_field('color_link', 'option') ?>;
    }
    .c-site-header.j-sticky .c-site-header__nav__menu li a::after {
        background-color: <?php the_field('color_link', 'option') ?>;;
    }
    .c-site-header__nav__menu li.current-menu-item a {
        background-color: <?php the_field('color_link', 'option') ?>;;
        color: #fff;
    }
    .c-button, body .c-button--ghost:hover {
        color: <?php the_field('color_button', 'option') ?>;
        background-color: <?php the_field('bg_button', 'option') ?>;
        border: 1px solid <?php the_field('bg_button', 'option') ?>;
    }
    .c-button:hover{
        color: <?php the_field('color_button', 'option') ?>;
        background-color: <?php the_field('hover_button', 'option') ?>;
        border-color: <?php the_field('hover_button', 'option') ?>;
    }
    .c-button--ghost {
        color: <?php the_field('bg_button', 'option') ?>;
    }
    .c-form__field input, .c-form__field textarea, .c-select-container {
        border-color: <?php the_field('bg_button', 'option') ?>;
    }
    .c-hero::before, .c-cta::before, .c-content-block__header--background, .c-content-block__header--background::after, .c-text-item--inline::before, .c-site-footer {
        background-color: <?php the_field('color_primary', 'option') ?>;
    }
    .j-menu-open .c-site-header__toggle__item, .c-site-header.j-sticky .c-site-header__toggle__item, .c-text-item--inline .c-text-item__header{
        border-color: <?php the_field('color_primary', 'option') ?>;
    }
    @media screen and (min-width:1024px) {
        html {
            font-size: <?php the_field('font_desktop', 'option') ?>px;
        }
        .c-site-header.j-sticky .c-site-header__nav__menu li a {
            color: <?php the_field('color_link', 'option') ?>;
        }
    }
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
        </div>
    </header>
    <main class="l-main">