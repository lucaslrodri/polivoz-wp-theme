<?php get_header(); ?>
<header>
    <?php
        $slider_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'meta_query' => array(
                array(
                    'key' => '_visibility_featured_key',
                    'value' => 'checked',
                    'compare' => 'LIKE'
                )
            ),
        );
        $slider_query = new WP_query($slider_args);
    ?>
    <?php if ($slider_query->have_posts()): ?>
    <div id="polivoz-slider-wrap">
        <div class="carousel-buttons carousel-button-left-wrap">
            <p><a><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a></p>
        </div>
        <div class="carousel-buttons carousel-button-right-wrap">
            <p><a><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
        </div>
        <div id="polivoz-slider" class="owl-carousel owl-theme owl-inner-slider">
            <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();
            if(has_post_thumbnail($post->ID)){
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-size' );
                $thumbnail_str = 'style="background-image: url('.$thumbnail[0].')"';
            }  else {
                $thumbnail_str = 'style="background-color:#eee; background-position: center center; background-image: url('.get_template_directory_uri().'/img/music-note-1.svg);background-size: 20%;"';
            }
            $item_data = get_post_meta($post->ID, '_visibility_data_key', true);
            $featured_post_permanlink = empty($item_data['permanlink'])? get_the_permalink() : get_home_url().'/'.$item_data['permanlink'];
            ?>
            
            <div class="item carousel-box" <?php echo $thumbnail_str;?>>
                <div class="carousel-wrap container">
                    <div class="carousel-inside hidden-xs">
                        <a class="carousel-card carousel-card-tablet hidden-lg" title='Clique para ir para o post' href="<?php echo $featured_post_permanlink; ?>">
                            <h3><?php the_title();?></h3>
                            <p>
                            <?php
                            if(!empty($item_data['subtitle'])){ echo $item_data['subtitle'];}
                            else{echo limit_excerpt(20);}
                            ?>
                            </p>
                        </a>
                        <div class="carousel-card visible-lg">
                            <h3><?php the_title();?></h3>
                            <p>
                            <?php
                            if(!empty($item_data['subtitle'])){ echo $item_data['subtitle'];}
                            else{echo limit_excerpt(20);}
                            ?>
                            </p>
                            <a class="btn btn-link" href="<?php echo $featured_post_permanlink; ?>">Leia mais</a>
                        </div>
                    </div>
                    <div class="carousel-mobile-link visible-xs">
                        <a href="<?php echo $featured_post_permanlink; ?>" title="Clique para ir ao post" class="carousel-mobile-link visible-xs-inline-block">
                        <h3><?php the_title();?></h3>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</header>
<?php
    $home_args = array(
        'post_type' => 'homepolivoz',
        'post_status' => 'publish',
        'meta_key' => '_home_priority_key',
        'posts_per_page' => -1,
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );
    $home_query = new WP_query($home_args);
?>
<main class="polivoz-posts-container">
<?php if ($home_query->have_posts()) : 
    echo '<div class="page-limit" date-page="/">';
    ?>
    
    <?php while ($home_query->have_posts()):$home_query->the_post(); 
        echo '<span class="anchor" id="'.$post->post_name.'"></span>';?>
        <section class="container" data-id='<?php the_ID(); ?>'>
            <header class="row">
                <div class="section-title">
                <?php
                    $args = array(
                      'type' => 'h1',
                      'post_link' => true,
                      'post' => $post
                    );
                    generate_title($args); 
                ?>
                </div>
            </header>
            <article class="section-content">
                <?php get_template_part('home-'.get_post_meta($post->ID,'_home_type_key',true));?>
            </article>
        </section>
    <?php endwhile ;?>
<?php echo '</div>';
    else: 
    polivoz_error_404('Não há seções na página inicial:',
        array('O conteúdo dessa página foi removido;',
              'O conteúdo mudou de lugar; ',
              'O site está em manutenção, tente mais tarde.'
    ));?>
<?php endif; ?>
</main>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>