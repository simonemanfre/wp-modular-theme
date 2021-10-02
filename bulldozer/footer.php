<?php
?>

        </main>
        <footer class="c-site-footer">
            <div class="l-container l-3col">
                <div class="c-site-footer__address">
                    <h3 class="c-title t-title4"><?php bloginfo('name'); ?></h3>
                    <?php the_field('contact_footer', 'option'); ?>
                </div>
                <ul class="c-site-footer__contact">
                    <?php if(get_field('contact_tel', 'option')): ?>
                        <li class="c-site-footer__contact__item">
                            <a href="tel:<?php the_field('contact_tel', 'option') ?>"><span class="icon icon-tel"></span> <?php the_field('contact_tel', 'option') ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if(get_field('contact_mail', 'option')): ?>
                        <li class="c-site-footer__contact__item">
                            <a href="mailto:<?php the_field('contact_mail', 'option') ?>"><span class="icon icon-mail"></span> <?php the_field('contact_mail', 'option') ?></a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $social = get_field('contact_social', 'option');
                    if($social):
                    ?>
                        <li class="c-site-footer__contact__item">
                            <ul class="c-social">
                                <?php foreach($social as $item): ?>
                                    <li class="c-social__item"><a target="_blank" href="<?php echo $item['url'] ?>" class="icon icon-<?php echo $item['social'] ?>"></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="c-site-footer__menu">
                    <?php
                    $args = array(
                        'theme_location' => 'Footer',
                        'depth'    => 1,
                        'items_wrap' => '%3$s',
                        'container' => ''
                    );

                    wp_nav_menu($args);
                    ?>
                </ul>
            </div>
            <div class="c-site-footer__disclaimer">
                <div class="l-container">
                    <small>&copy; <?php echo date('Y') ?> <?php bloginfo('name'); ?> - Developed by <a target="_blank" rel="noopner" href="https://wp-startup.com/">Simone Manfredini</a></small>
                </div>
            </div>
        </footer>
    </div><!-- L-PAGE -->    

	<?php wp_footer(); ?>
	
	<?php if(get_field('html_footer', 'option')):
        the_field('html_footer', 'option'); 
    endif; ?>

</body>
</html>