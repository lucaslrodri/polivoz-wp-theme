<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
    <?php if(get_option('polivoz_template_galeria_single_header')){get_template_part('parallaxheader');}else{echo '<div class="space"></div>';} ?>
    <h3><?php add_breadcrumbs($post)?></h3>
    <hr>
    <main class="container">
        <header class="row">
            <div class="section-title">
                <?php
                $args = array(
                      'type' => 'h1',
                      'post_link' => true,
                      'post' => $post
                );
                    generate_title($args);  ?>
            </div>
            <?php 
                $custom_url = get_post_meta($post->ID, '_alt_permanlink_key', true);
                if (!empty($custom_url)){
                    echo '<h4 class="leia-mais"><a href="'.get_home_url().'/blog/'.$custom_url.'" class="btn btn-link">Saiba mais</a></h4>';

                } ?>
        </header>
        <article class="section-content">
            <?php echo do_shortcode(get_post_meta($post->ID,'_gallery_shortcode_key',true)) ?>
            <p class='leia-mais'><?php edit_post_link(); ?></p>
            <?php wp_link_pages(); ?>
        </article>
    </main>
    <div class="container section-content">
        <hr>
        <div class="col-xs-6 text-left custom-pagination"><?php previous_post_link('%link', '&laquo Álbum anterior');?></div>
        <div class="col-xs-6 text-right custom-pagination"><?php next_post_link('%link','Próximo álbum &raquo');?></div>
    </div>
<?php endwhile;?>
<?php get_footer();

