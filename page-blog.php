<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
    <?php get_template_part('parallaxheader'); ?>
    <h3><?php add_breadcrumbs()?></h3>
    <?php polivoz_search_box('post'); ?>
    <header class="container">
            <div class="section-title">
                <?php
                $args = array(
                  'type' => 'h1',
                  'post_link' => true,
                  'post' => $post
                );
                generate_title($args); 
                ?><br>
            </div>
        <h1></h1>
    </header>
<?php endwhile;?>
<?php wp_reset_postdata(); ?>
    
<main id="polivoz-posts-container-id" class="polivoz-posts-container">
    <?php
    $custom_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_visibility_hidden_key',
                'value' => 'false',
                'compare' => 'LIKE'
            )
        )
    );
    $lastBlog = new WP_Query($custom_args); 
    $pagenum = $lastBlog->max_num_pages;
    $havePosts = $lastBlog->have_posts();?>
    <?php if ($havePosts) : ?>
        <?php while ( $lastBlog->have_posts() ) : $lastBlog->the_post(); ?> 
            <?php get_template_part('post-single-post-list'); ?>
        <?php endwhile ;?>
    <?php else: 
        polivoz_error_404('Não há posts nessa página:',
            array('O conteúdo dessa página foi removido;',
                  'O conteúdo mudou de lugar; ',
                  'Você digitou o endereço errado.'
        ));?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</main>
<?php if($havePosts){polivoz_pagination('post',$pagenum);}?>
<?php get_footer();
