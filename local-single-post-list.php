<?php $address_string = polivoz_address($post->ID); $excerpt = get_the_excerpt();?>
<div class='col-xs-12 col-md-6'>
    <section <?php post_class(array('card-local')) ?>>
        
        <?php
            echo '<a href="'.get_permalink($post->ID).'" >';
            if ( has_post_thumbnail($post->ID) ) {
                $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                echo '<div class="local-img" style="background-image: url('.$post_thumbnail[0].');">';
            }else{
                echo '<div class="local-img" style="background-color:#eee;">';
                echo '<div class="local-inner-content"><p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></p></div>';
            }
        ?>
        <?php echo '</div></a>';?>
        <div class="local-title hidden-xs">
            <h3><?php echo $post->post_title; ?></h3>
            <div class="wrapp-content">
                <?php
                if (!empty($excerpt)){
                    echo '<p class="text-center local-sub-title">'.$excerpt.'</p>';
                }?>
                <?php
                if(!empty($address_string)){
                    echo '<div class="local-content"><p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Endereço: '.$address_string.'</p></div>';
                }
                ?>
                <table class="table-condensed btn-local-content">
                    <tr>
                        <td><a class="btn btn-link" target="_blank" href="<?php echo get_post_meta($post->ID,'_location_map_key',true); ?>">Veja no Google Maps</a></td>
                        <td><a class="btn btn-default" href="<?php the_permalink(); ?>">Eventos neste local</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="local-mobile-content visible-xs-inline-block">
            <h3><?php echo $post->post_title; ?></h3>
            <?php
            if (!empty($excerpt)){
                echo '<p class="text-center local-sub-title">'.$excerpt.'</p>';
            }?>
            <?php
            if(!empty($address_string)){
                echo '<p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Endereço: '.$address_string.'</p>';
            }
            ?>
            <table class="table-condensed btn-local-content-mobile">
                <tr><td><a class="btn btn-link" target="_blank" href="<?php echo get_post_meta($post->ID,'_location_map_key',true); ?>">Veja no Google Maps</a></td></tr>
                <tr><td><a class="btn btn-default" href="<?php the_permalink(); ?>">Eventos neste local</a></td></tr>
            </table>
        </div>
    </section>
</div>