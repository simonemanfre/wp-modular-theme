<?php 
/* Template Name: Pagina intera con margini */
get_header(); 
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="l-container l-container--wide">
            <?php the_content() ?>
        </div>

        <?php get_template_part('part', 'composer'); ?>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>