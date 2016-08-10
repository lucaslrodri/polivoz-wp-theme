<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
    <div class="space"></div>
    <h3><?php add_breadcrumbs($post)?></h3>
    <hr>
    <main class="container">
        <article class='col-xs-12 col-md-6 col-md-offset-3 section-content'>
            <?php get_template_part('evento-card'); ?>
        </article>
    </main>
<?php endwhile;?>
<?php get_footer();