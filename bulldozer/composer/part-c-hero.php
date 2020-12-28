<?php global $content; ?>

<header id="<?php echo $content['id']; ?>" class="c-hero c-hero--<?php echo $content['style'] ?>">
    <?php if($content['bg']['type'] == 'image'): ?>

        <figure class="c-picture">
            <?php echo wp_get_attachment_image($content['bg']['ID'], 'hero'); ?>
        </figure>
        
    <?php elseif($content['bg']['type'] == 'video'): ?>

        <video id="video" autoplay loop muted poster="" class="c-video">
            <source src="<?php echo $content['bg']['url']; ?>" type="video/mp4">
        </video>

    <?php endif; ?>
    
    <div class="l-container">
        <div class="c-hero__text">
            <h1 class="c-title t-title1"><?php if($content['title']): echo $content['title']; else: the_title(); endif; ?></h1>
            <?php if($content['subtitle']): ?><h2 class="c-subtitle"><?php echo $content['subtitle'] ?></h2><?php endif ?>
            <?php if($content['button']): ?><a class="c-button c-button--ghost" href="<?php echo $content['url'] ?>"><?php echo $content['button'] ?></a><?php endif ?>
        </div>
    </div>
</header>