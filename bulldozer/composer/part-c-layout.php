<?php 
global $content; 
global $item; 
?>

<section id="<?php echo $content['id']; ?>" class="<?php echo $content['alignment'] ?>">

    <?php if($content['header']): ?>
        <header class="c-content-block__header c-content-block__header--<?php echo $content['header_style'] ?>">
            <div class="l-container">
                <?php if($content['title']): ?><h2 class="c-title t-title2"><?php echo $content['title']; ?></h2><?php endif; ?>
                <?php if($content['subtitle']): ?><h3 class="c-subtitle"><?php echo $content['subtitle']; ?></h3><?php endif; ?>
            </div>
        </header>
    <?php endif; ?>

    <div class="<?php echo $content['style'] ?> <?php echo $content['column'] ?>">

        <?php
        foreach($content['component'] as $item):

            get_template_part('composer/component/part', $item['acf_fc_layout']);

        endforeach; 
        ?>

    </div>
</section>