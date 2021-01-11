<?php
/**
 * Block Name: Hero
 */ 
?>

<header class="c-hero c-hero--<?php the_field('style') ?> u-wide-full">
    <?php 
    $file = get_field('bg');
    if($file['type'] == 'image'): 
    ?>

        <figure class="c-picture">
            <?php echo wp_get_attachment_image($file['ID'], 'hero'); ?>
        </figure>
        
    <?php elseif($file['type'] == 'video'): ?>

        <video id="video" autoplay loop muted poster="" class="c-video">
            <source src="<?php echo $file['url']; ?>" type="video/mp4">
        </video>

    <?php endif; ?>
    
    <div class="l-container">
        <div class="c-hero__text">
            <h1 class="c-title t-title1"><?php if(get_field('title')): the_field('title'); else: the_title(); endif; ?></h1>
            <?php if(get_field('subtitle')): ?><h2 class="c-subtitle"><?php the_field('subtitle') ?></h2><?php endif ?>
            <?php if(get_field('button')): ?><a class="c-button c-button--ghost" href="<?php the_field('url') ?>"><?php the_field('button') ?></a><?php endif ?>
        </div>
    </div>
</header>