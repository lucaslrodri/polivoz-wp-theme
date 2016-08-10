<?php get_header(); ?>
<div class="row">
    <div class="col-lg-12">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <section class="container">
                <header class="row">
                    <div class="section-title">
                        <?php generate_title($post,"h1"); ?>
                    </div>
                </header>
                <article class="section-content" id="<?php get_post_field( 'post_name', get_post() ); ?>">
                    <?php the_content(); ?>
                    <p class='leia-mais'><?php edit_post_link(); ?></p>
                    <?php wp_link_pages(); ?>
                </article>
            </section>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer();
