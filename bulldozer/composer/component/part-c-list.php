<?php global $item; ?>

<ul class="c-list c-list--<?php echo $item['column'] ?>">
    <?php foreach($item['content_items'] as $list): ?>

        <li class="c-list__item"><span class="icon icon-check"></span><?php echo $list['title'] ?></li>

    <?php endforeach; ?>
</ul>