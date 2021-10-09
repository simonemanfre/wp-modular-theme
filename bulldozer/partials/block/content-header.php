<?php
/**
 * Block Name: Intestazione
 */ 
?>

<header class="c-block-header c-block-header--<?php the_field('style') ?> <?php the_field('align') ?> u-wide-full">
    <?php if(get_field('title')): ?><h2 class="c-title t-title2"><?php the_field('title'); ?></h2><?php endif; ?>
    <?php if(get_field('subtitle')): ?><h3 class="c-subtitle"><?php the_field('subtitle'); ?></h3><?php endif; ?>
</header>