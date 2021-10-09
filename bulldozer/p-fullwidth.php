<?php 
/* Template Name: Pagina intera senza margini */
get_header(); 
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="l-container l-container--fullwidth">
            <?php the_content() ?>
        </div>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>