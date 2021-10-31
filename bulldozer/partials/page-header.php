<?php 
$hero_type = get_field('hero_type');
if($hero_type == 'hero'):
?>
    <header class="c-hero c-hero--<?php the_field('hero_style') ?> u-wide-full">
        <?php 
        $file = get_field('hero_bg');
        if($file):
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
        <?php else: ?>

            <figure class="c-picture">
                <?php the_post_thumbnail('hero') ?>
            </figure>

        <?php endif; ?>
        
        <div class="l-container">
            <div class="c-hero__text">
                <h1 class="c-title t-title1"><?php if(get_field('hero_title')): the_field('hero_title'); else: the_title(); endif; ?></h1>
                <?php if(get_field('hero_subtitle')): ?><h2 class="c-subtitle"><?php the_field('hero_subtitle') ?></h2><?php endif ?>
                <?php if(get_field('hero_button')): ?><a class="c-button c-button--ghost" href="<?php the_field('hero_url') ?>"><?php the_field('hero_button') ?></a><?php endif ?>
            </div>
        </div>
    </header>
<?php endif; ?>