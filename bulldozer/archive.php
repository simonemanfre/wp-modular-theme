<?php 
get_header(); 
$news = get_option('page_for_posts');
$post = get_post($news);
setup_postdata($post);
?>

    <div class="l-container">
        <?php the_content() ?>
    </div>

    <?php get_template_part('part', 'composer'); ?>

<?php 
wp_reset_postdata();
get_footer(); 
?>