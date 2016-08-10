<p class="veja-mais"><a class="btn btn-link" href="<?php echo get_home_url().'/galeria'; ?>" role="button">Veja mais &raquo;</a></p>
<div class='row'>
    <?php echo do_shortcode(get_post_meta($post->ID,'_gallery_shortcode_key',true));
    $sectionID = get_the_ID(); ?>
</div>
<?php
    $slider_gallery_args = array(
        'post_type' => 'galeria',
        'post_status' => 'publish',
        'posts_per_page' => mmc_array(array(3,2,get_option('posts_per_page'))),
        'meta_query' => array(
            array(
                'key' => '_visibility_featured_key',
                'value' => 'checked',
                'compare' => 'LIKE'
            )
        ),
    );
    $slider_gallery_query = new WP_query($slider_gallery_args);
?>
<?php if ($slider_gallery_query->have_posts()): ?>
    <div id="owl-slider-gallery-<?php echo $sectionID; ?>" class="owl-carousel owl-theme">
        <?php while ( $slider_gallery_query->have_posts() ) : $slider_gallery_query->the_post();?>
        <div class="item" style="padding: 6px;">
            <?php get_template_part('galeria-card'); ?>
        </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata();