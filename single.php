<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
    <header>
        <?php get_template_part('parallaxheader'); ?>
        <h3><?php add_breadcrumbs($post)?></h3>
    </header>
    <main class="container">
        <header>
            <div class="section-title">
                <?php
                $args = array(
                      'type' => 'h1',
                      'post_link' => true,
                      'post' => $post
                );
                    generate_title($args);  ?>
            </div>
            <div class='text-right'>
                <p class='initialism'>Publicado em <?php the_date(); ?></p>
            </div>
        </header>
        <article class="section-content">
            <?php the_content(); ?>
            <p class='leia-mais'><?php edit_post_link(); ?></p>
            <?php wp_link_pages(); ?>
        </article>
    </main>
    <div class="container section-content">
        <hr>
        <div class="col-xs-6 text-left custom-pagination"><?php previous_post_link('%link', '&laquo Post anterior');?></div>
        <div class="col-xs-6 text-right custom-pagination"><?php next_post_link('%link','Próximo post &raquo');?></div>
    </div>
<?php endwhile;?>
<?php get_footer();

