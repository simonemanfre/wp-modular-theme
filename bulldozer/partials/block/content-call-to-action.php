<?php
/**
 * Block Name: Call To Action
 */ 
?>

<section class="c-cta<?php if(get_field('style')): echo ' '.get_field('style'); endif; if(get_field('width')): echo ' '.get_field('width'); endif; if(get_field('align')): echo ' '.get_field('align'); endif; ?>" style="background-image: url('<?php echo wp_get_attachment_image_url(get_field('bg'), 'large') ?>')">
    <div class="l-container l-container--small">
        <?php if(get_field('title')): ?>
            <header class="c-cta__header">
                <h3 class="c-title t-title2"><?php the_field('title'); ?></h3>
            </header>
        <?php endif; ?>
        <?php if(get_field('text')): ?>
            <div class="c-cta__content">
                <?php the_field('text'); ?>
            </div>
        <?php endif;?>
        <?php if(get_field('form')): ?>
            <div class="c-form">
                <?php echo do_shortcode(get_field('form')) ?>
            </div>
        <?php endif;?>
        <?php if(get_field('button')): ?>
            <footer class="c-cta__footer">
                <a href="<?php the_field('url'); ?>" class="c-button c-button--special"><?php the_field('button'); ?></a>
            </footer>
        <?php endif;?>
    </div>
</section>