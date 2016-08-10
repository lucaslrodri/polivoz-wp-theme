<?php
/*=============================================================================
                               INCLUDES
=============================================================================*/

add_action('wp_ajax_nopriv_polivoz_load_more','polivoz_load_more');
add_action('wp_ajax_polivoz_load_more','polivoz_load_more');

function polivoz_load_more(){
    //load more post
    $paged = $_POST["page"] +1;
    $terms = sanitize_text_field($_POST["term"]);
    $postype = $_POST["postype"];
    $date = esc_attr($_POST["datefilter"]);
    $address_ID = esc_attr($_POST["addressID"]);
    $lowerDate = $_POST["lowerDate"];
    $higherDate = $_POST["higherDate"];
    $posts_per_page = $_POST["postperpage"];
    $args = array(
        'post_type' => $postype,
        'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => $posts_per_page
    );
    if ($terms!="0"){
        $args['s'] = $terms;
    }
    if($postype == 'evento'){
        $args['meta_key'] = '_event_timestamp_key';
        $args['orderby'] =  'meta_value_num';
        $args['order'] = 'DESC';
        switch($date){
            case "year":
            case "month":
                $args['meta_query'] = array(
                    array(
                        'key' => '_event_timestamp_key',
                        'value' => strtotime('now'),
                        'compare' => '<='
                    ),
                    array(
                    'key' => '_event_timestamp_key',
                    'value' => strtotime('1 '.$date.' ago'),
                    'compare' => '>='
                    ));
                break;
            case "future":
                $args['meta_query'] = array(
                    array(
                    'key' => '_event_timestamp_key',
                    'value' => strtotime('now'),
                    'compare' => '>='
                    ));
                break;
            case "custom":
                $args['meta_query'] = array(
                    array(
                        'key' => '_event_timestamp_key',
                        'value' => strtotime("+1 month, -1 second", strtotime($higherDate)),
                        'compare' => '<='
                    ),
                    array(
                    'key' => '_event_timestamp_key',
                    'value' => strtotime($lowerDate),
                    'compare' => '>='
                    ));
                break;
            default:
        }
        if(!empty($address_ID)){
            $args['meta_query'][] = array(
                        'key' => '_event_location_key',
                        'value' => $address_ID,
                        'compare' => 'LIKE'
            );
        }
    }else{
        switch($date){
            case "year":
            case "month":
                $args['date_query'] = array('after' => '1 '.$date.' ago');
                break;
            case "custom":
                $args['date_query'] = array(
                    'after'     => $lowerDate,
                    'before'    => $higherDate,
                    'inclusive' => true
                );
                break;
            default:
        }
    }
    if($postype == 'galeria'||$postype == 'post'){
        $args['meta_query'][] =  array(
            'key' => '_visibility_hidden_key',
            'value' => 'false',
            'compare' => 'LIKE'
        );
    }
    $query = new WP_Query($args);
    if($query->have_posts()):
        while($query->have_posts()): $query-> the_post();
            get_template_part($postype.'-single-post-list');
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_polivoz_search','polivoz_search');
add_action('wp_ajax_polivoz_search','polivoz_search');

function polivoz_search(){
    //load more post
    $terms = sanitize_text_field($_POST["term"]);
    $postype = $_POST["postype"];
    $date = esc_attr($_POST["datefilter"]);
    $lowerDate = $_POST["lowerDate"];
    $higherDate = $_POST["higherDate"];
    $address_ID = esc_attr($_POST["addressID"]);
    $posts_per_page = $_POST["postperpage"];
    $args = array(
        'post_type' => $postype,
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page
    );
    if ($terms != ""){
        $args['s'] = $terms;
    }
    if($postype == 'evento'){
        $args['meta_key'] = '_event_timestamp_key';
        $args['orderby'] =  'meta_value_num';
        $args['order'] = 'DESC';
        switch($date){
            case "year":
            case "month":
                $args['meta_query'] = array(
                    array(
                        'key' => '_event_timestamp_key',
                        'value' => strtotime('now'),
                        'compare' => '<='
                    ),
                    array(
                    'key' => '_event_timestamp_key',
                    'value' => strtotime('1 '.$date.' ago'),
                    'compare' => '>='
                    ));
                break;
            case "future":
                $args['meta_query'] = array(
                    array(
                    'key' => '_event_timestamp_key',
                    'value' => strtotime('now'),
                    'compare' => '>='
                    ));
                break;
            case "custom":
                $args['meta_query'] = array(
                    array(
                        'key' => '_event_timestamp_key',
                        'value' => strtotime("+1 month, -1 second", strtotime($higherDate)),
                        'compare' => '<='
                    ),
                    array(
                    'key' => '_event_timestamp_key',
                    'value' => strtotime($lowerDate),
                    'compare' => '>='
                    ));
                break;
            default:
        }
        if(!empty($address_ID)){
            $args['meta_query'][] = array(
                        'key' => '_event_location_key',
                        'value' => $address_ID,
                        'compare' => 'LIKE'
            );
        }
    }else{
        switch($date){
            case "year":
            case "month":
                $args['date_query'] = array('after' => '1 '.$date.' ago');
                break;
            case "custom":
                $args['date_query'] = array(
                    'after'     => $lowerDate,
                    'before'    => $higherDate,
                    'inclusive' => true
                );
                break;
            default:
        }
    }
    if($postype == 'galeria'||$postype == 'post'){
        $args['meta_query'][] =  array(
            'key' => '_visibility_hidden_key',
            'value' => 'false',
            'compare' => 'LIKE'
        );
    }
    $query = new WP_Query($args);
    $pagenum = $query->max_num_pages;
    $havePosts = $query->have_posts();
    if($havePosts):
        while($query->have_posts()): $query-> the_post();
            get_template_part($postype.'-single-post-list');
        endwhile;
   else: {
            echo '<div class="container">';
            polivoz_error_404('Não foram encontrados resultados com este termo:',
            array('Tente um termo sinônimo ou mais abrangente;',
                  'Tente pesquisar pelo Google ou outro mecanismo de pesquisa;',
                  'Tente procurar manualmente.'
            ),"#fff");
            echo '</div></div>';
    }
    endif;
    echo '<div id="pagenum" class="hidden" data-pagenum="'.$pagenum.'" data-haveposts="'.$havePosts.'"></div>';
    wp_reset_postdata();
    die();
    
}