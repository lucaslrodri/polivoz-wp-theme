<script>
jQuery(document).ready(function($){
    $('.galeria-title').on('click touch',function(e){
        if ($(this).find('.galeria-content').css('margin-bottom')<="0px"){
            e.preventDefault();
        }
    });
    $('.card-gallery').on('click touch',function(e){
        if (($(this).find('.galeria-content').css('margin-bottom')<="0px")&&($(e.target).hasClass("galeria-img"))){
            $('.galeria-content').css('margin-bottom','-200px');
        }
    });
});
</script>
<section <?php post_class(array('card-gallery')) ?>>
    <?php
    echo '<a href="'.get_permalink($post->ID).'" >';
    if ( has_post_thumbnail($post->ID) ) {
        $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
        echo '<div class="galeria-img" style="background-image: url('.$post_thumbnail[0].');">';
    }else{
        echo '<div class="galeria-img" style="background-color:#eee;">';
        echo '<div class="galeria-inner-content"><p><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></p></div>';
    }
    echo '</div><div class="galeria-title"><h3 class="hidden-xs">'.$post->post_title.'</h3><a class="visible-xs-inline" href="'.get_permalink($_post->ID).'"><h3>'.$post->post_title.'</h3></a>';
    $excerpt = get_the_excerpt();
    if (!empty($excerpt)){
        echo '<div class="wrapp-content hidden-xs"><div class="galeria-content"><p class="text-center media-sub-title">'.$excerpt.'</p></div></div>';
    }
    echo '</div>';
    echo '</a>';
   ?>
</section>