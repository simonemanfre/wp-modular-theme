<?php global $content; ?>

<section id="<?php echo $content['id']; ?>" class="c-cta" style="background-image: url('<?php echo wp_get_attachment_image_url($content['bg'], 'large') ?>')">
    <div class="l-container l-container--small">
        <?php if($content['title']): ?>
            <header class="c-cta__header">
                <h3 class="c-title t-title2"><?php echo $content['title']; ?></h3>
            </header>
        <?php endif; ?>
        <?php if($content['text']): ?>
            <div class="c-cta__content">
                <?php echo $content['text']; ?>
            </div>
        <?php endif;?>
        <?php if($content['form']): ?>
            <div class="c-form">
                <?php echo do_shortcode($content['form']) ?>
            </div>
        <?php endif;?>
        <?php if($content['button']): ?>
            <footer class="c-cta__footer">
                <a href="<?php echo $content['url']; ?>" class="c-button c-button--special"><?php echo $content['button']; ?></a>
            </footer>
        <?php endif;?>
    </div>
</section>