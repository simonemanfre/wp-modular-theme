<?php global $item; ?>

<article class="<?php echo $item['style'] ?>">
    <?php if($item['title'] || $item['subtitle']): ?>
        <header class="c-text-item__header">
            <?php if($item['title']): ?><h2 class="c-title t-title3"><?php echo $item['title']; ?></h2><?php endif; ?>
            <?php if($item['subtitle']): ?><h3 class="c-subtitle"><?php echo $item['subtitle']; ?></h3><?php endif; ?>
        </header>
    <?php endif; ?>
    <div class="c-text-item__content">
        <?php echo $item['text']; ?>
    </div>

    <?php if($item['button']): ?>
        <footer class="c-text-item__footer">
            <a class="c-button" href="<?php echo $item['url']; ?>"><?php echo $item['button']; ?></a>
        </footer>
    <?php endif; ?>
</article>