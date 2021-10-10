<?php
/**
 * Block Name: Card
 */ 
?>

<?php $cards = get_field('cards'); ?>

<section class="c-content-block l-tablet-grid <?php the_field('width') ?> <?php the_field('column') ?>">
    <?php foreach($cards as $item): ?>

        <article class="c-card c-card--<?php the_field('style') ?>">
            <?php if($item['url']): ?>
                <a href="<?php echo $item['url'] ?>">
            <?php endif; ?>
            
                <figure class="c-picture">
                    <?php echo wp_get_attachment_image($item['img'], 'large'); ?>
                </figure>
                <header class="c-card__header">
                    <?php if($item['title']): ?><h3 class="c-title t-title4"><?php echo $item['title']; ?></h3><?php endif; ?>
                    <?php if($item['subtitle']): ?><h4 class="c-subtitle"><?php echo $item['subtitle']; ?></h4><?php endif; ?>
                </header>
                <div class="c-card__content">
                    <?php echo $item['text']; ?>
                </div>
                <?php if($item['button']): ?>
                    <footer class="c-card__footer">
                        <span class="c-button"><?php echo $item['button'] ?></span>
                    </footer>
                <?php endif; ?>
                
            <?php if($item['url']): ?>
                </a>
            <?php endif; ?>
        </article>

    <?php endforeach; ?>
</section>