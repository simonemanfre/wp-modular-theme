<?php 
/* Template Name: Layout più piccolo */
get_header(); 
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('partials/page', 'header'); ?>

        <div class="c-post-content l-container l-container--small">
            <?php the_content() ?>
        </div>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>