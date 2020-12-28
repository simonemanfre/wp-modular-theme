<?php global $item; ?>

<div class="c-form">
    <h3 class="c-title t-title3"><?php echo get_the_title($item['form']) ?></h3>
    <?php echo do_shortcode('[contact-form-7 id="'.$item['form'].'"]') ?>
</div>