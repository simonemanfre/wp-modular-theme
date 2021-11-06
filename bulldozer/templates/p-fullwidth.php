<?php 
/* Template Name: Pagina intera senza margini */
get_header(); 
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('partials/page', 'header'); ?>

        <?php 
        //SIDEBAR
        $sidebar = get_field('page_sidebar');
        if($sidebar && is_active_sidebar($sidebar)): 
        ?>

            <div class="c-post-content l-container l-container--fullwidth <?php the_field('align_sidebar') ?>">
                <div class="u-flex-4">
                    <?php the_content() ?>
                </div>
                <ul class="c-sidebar u-flex-1 <?php the_field('margin_sidebar') ?>">
                    <?php dynamic_sidebar($sidebar) ?>
                </ul>
            </div>

        <?php else: ?>

            <div class="c-post-content l-container l-container--fullwidth">
                <?php the_content() ?>
            </div>
        
        <?php endif; ?>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>