<?php
/**
 * Block Name: Form
 */ 
?>

<section class="c-form">
    <?php if(get_field('title')): ?><h3 class="c-title t-title3"><?php the_field('title') ?></h3><?php endif; ?>
    <?php echo do_shortcode('[contact-form-7 id="'.get_field('form').'"]') ?>
</section>