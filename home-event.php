<?php $sectionID = get_the_ID();?>
<p class="veja-mais"><a class="btn btn-link" href="<?php echo get_home_url().'/evento'; ?>" role="button">Veja mais &raquo;</a></p>
<div class="col-md-6 col-sm-12" id="featured-event">
    <h2>Próximo evento</h2>
    <?php
    $event_featured_args = array(
        'post_type' => 'evento',
        'meta_key' => '_event_timestamp_key',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => '_event_timestamp_key',
                'value' => strtotime('now'),
                'compare' => '>='
            )
        )
    );
    $event_featured_query = new WP_query($event_featured_args);
    $hasFutureEvent = $event_featured_query->have_posts();
    if($hasFutureEvent){
        $event_featured_query->the_post();
        get_template_part('evento-card');
        $featuredID = get_the_ID();
    }
    wp_reset_postdata();
    if(!$hasFutureEvent){
        $event_featured_args = array(
            'post_type' => 'evento',
            'meta_key' => '_event_timestamp_key',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => 1
        );
        $event_featured_query = new WP_query($event_featured_args);
        if($event_featured_query->have_posts()){
            $event_featured_query->the_post();
            get_template_part('evento-card');
            $featuredID = get_the_ID();
        }
        wp_reset_postdata();
    }
    ?>
</div>
<div class="col-md-6 col-sm-12">
    <script>
        jQuery(document).ready(function($){
            var eventSlider = $('.owl-carousel-event');
            var mobileSize = true;
            var oldSize;
            $(window).on('resize',function(){
                oldSize = mobileSize;
                setTimeout(function(){
                    if($(window).width()<=768){
                        mobileSize = true;
                    }else{
                        mobileSize = false;
                    }
                    if(mobileSize !== oldSize){
                        changeCarousel()
                    }
                },33);
            });
            function changeCarousel(){
                 if($(window).width()<=768){
                    eventSlider.data('owlCarousel').reinit({autoPlay: false});
                 }else{
                    eventSlider.data('owlCarousel').reinit({autoPlay: 7000});
                }
            }
        });
    </script>
    <h2>Outros Eventos</h2>
    <?php
    $slider_event_args = array(
        'post_type' => 'evento',
        'post_status' => 'publish',
        'post__not_in' => array($featuredID),
        'posts_per_page' => 5,
            'meta_key' => '_event_timestamp_key',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
    );
    $slider_event_query = new WP_query($slider_event_args);
    if ($slider_event_query->have_posts()):?>
    <div id="owl-slider-event-<?php echo $sectionID; ?>" class="owl-carousel owl-theme owl-carousel-event">
    <?php while ($slider_event_query->have_posts() ) : $slider_event_query->the_post();?>
        <div class="item" style="padding: 0px 1px 6px 1px;">
            <?php get_template_part('evento-card'); ?>
        </div>
    <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
</div>