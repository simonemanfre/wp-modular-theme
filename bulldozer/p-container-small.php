<?php 
/* Template Name: Layout più piccolo */
get_header(); 
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php the_content() ?>

        <?php get_template_part('part', 'composer'); ?>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>