<?php $address_id = get_post_meta($post->ID, '_event_location_key', true);
$address_title = get_the_title($address_id);
$address_string = polivoz_address($address_id);
$period_obj = get_post_meta($post->ID, '_event_date_key', true);
$event_post = get_post_meta($post->ID, '_alt_permanlink_key', true);
$same_day = (($period_obj['from_date'] == $period_obj['to_date']) || empty($period_obj['to_date']) || $period_obj['to_date'] == '') ? true : false;
$excerpt = get_the_excerpt();
?>
<section <?php post_class(array('card-evento')) ?>>

    <?php
        if(!empty($event_post)){echo '<a href="'.get_home_url().'/blog/'.$event_post.'" >';}
        if ( has_post_thumbnail($post->ID) ) {
            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
            echo '<div class="evento-img" style="background-image: url('.$post_thumbnail[0].');">';
        }else{
            echo '<div class="evento-img" style="background-color:#eee;">';
            echo '<div class="evento-inner-content"><p><span class="glyphicon glyphicon-music" aria-hidden="true"></span></p></div>';
        }
    ?>
    <?php echo '</div>';
    if(!empty($event_post)){echo '</a>';}
    ?>
    <div class="evento-content">
        <h3><?php echo $post->post_title; ?></h3>
        <?php
        if (!empty($excerpt)){
            echo '<p class="evento-sub-title">'.$excerpt.'</p>';
        }?>
        <?php
            if(!empty($address_title)||!empty($address_string)){
                echo '<table><tbody>';
                echo '<tr><td class="evento-symbol"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td><td>';
                if(!empty($address_title)){
                    echo 'Local: '.$address_title.'<br>';
                }
                if(!empty($address_string)){
                    echo 'Endereço: '.$address_string;
                }
                echo '</td></tr>';
                echo '</tbody></table>';
            }
            if(!empty($period_obj)){
                echo '<table><tbody>';
                echo '<tr><td class="evento-symbol"><span class="glyphicon glyphicon-time"></td>';
                echo '<td>Data: '.convertToPTdate($period_obj['from_date']) . ($same_day ? '' : (' a ' . convertToPTdate($period_obj['to_date']))) . '<br>';
                echo 'Horário: '.(($period_obj['all_day'] == 'allday') ? 'Dia todo' : ($period_obj['from_time'] . ' a ' . $period_obj['to_time'])).'</td></tr>';
                echo '</tbody></table>';
            }
        ?>
        <table class="table-condensed btn-evento-content hidden-xs">
            <tr>
                <?php if(!empty($event_post)):?>
                <td><a class="btn btn-link" href="<?php echo get_home_url().'/blog/'.$event_post; ?>">Saiba mais</a></td>
                <?php endif; ?>
                <td><a class="btn btn-default" target="_blank" href="<?php echo get_post_meta($address_id,'_location_map_key',true); ?>">Veja no Google Maps</a></td>
            </tr>
        </table>
        <div class="btn-mobile-div visible-xs-block">
            <?php if(!empty($event_post)):?>
            <p><a class="btn btn-link" href="<?php echo get_home_url().'/blog/'.$event_post; ?>">Saiba mais</a></p>
            <?php endif; ?>
            <p><a class="btn btn-default" target="_blank" href="<?php echo get_post_meta($address_id,'_location_map_key',true); ?>">Veja no Google Maps</a></p>
        </div>
    </div>
</section>