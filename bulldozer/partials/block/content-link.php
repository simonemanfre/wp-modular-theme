<?php
/**
 * Block Name: Custom Link
 */ 
?>
<a href="<?php the_field('url') ?>"<?php if(get_field('target_blank')): ?> target="_blank"<?php endif; ?> class="<?php the_field('style') ?>"><?php the_field('text') ?></a>