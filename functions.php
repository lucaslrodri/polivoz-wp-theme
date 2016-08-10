<?php

/* =============================================================================
  INCLUDES
  ============================================================================= */

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/enqueue.php';


/* =============================================================================
  MAIN FUNCTION
  ============================================================================= */

function polivoz_setup() {
    global $content_width;

    if (!isset($content_width)) {
        $content_width = 640;
    }
    if (function_exists('add_theme_support')) {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        remove_post_type_support( 'post', 'post-formats' );
        remove_post_type_support( 'post', 'page-attributes' );
        remove_post_type_support( 'post', 'author' );
        remove_post_type_support( 'page', 'author' );
        remove_post_type_support( 'page', 'comments' );
        remove_post_type_support( 'page', 'page-attributes' );
        remove_post_type_support( 'page', 'custom-fields' );
        remove_post_type_support( 'post', 'custom-fields' );
        remove_post_type_support( 'post', 'comments' );
        add_theme_support('html5', array(
        ));
    }
}

add_action('init', 'polivoz_setup');

if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

/* =============================================================================
  BREADCRUMBS
  ============================================================================= */

function add_breadcrumbs($post) {
    if (!is_front_page()) {
        echo '<ol class="breadcrumb container text-center">';
        echo '<li><a class="btn btn-link" href="' . get_home_url() . '">Home</a></li>';
        if (is_single()) {
            $postTypeName = $post->post_type;
            if ($postTypeName == 'post') {
                $blog_object = get_page_by_path('blog');
                $postTypeName = get_the_title($blog_object->ID);
                $postTypeUrl = 'blog';
            }
            elseif ($postTypeName == 'galeria') {
                $postTypeName = get_option('polivoz_template_galeria_name');
                $postTypeUrl = 'galeria';
            }
            elseif ($postTypeName == 'local') {
                $postTypeName = get_option('polivoz_template_local_name');
                $postTypeUrl = 'local';
            }
            elseif ($postTypeName == 'evento') {
                $postTypeName = get_option('polivoz_template_evento_name');
                $postTypeUrl = 'evento';
            }
            elseif ($postTypeName == 'musica') {
                $postTypeName = get_option('polivoz_template_musica_name');
                $postTypeUrl = 'musica';
            }
            echo '<li><a class="btn btn-link" href="' . get_home_url() . '/' . $postTypeUrl . '">' . $postTypeName . '</a></li>';
        }
        echo '<li class="active">';
        if (is_post_type_archive('galeria')){
            echo get_option('polivoz_template_galeria_name');
        }elseif (is_post_type_archive('local')){
            echo get_option('polivoz_template_local_name');
        }elseif (is_post_type_archive('evento')){
            echo get_option('polivoz_template_evento_name');
        }elseif (is_post_type_archive('musica')){
            echo get_option('polivoz_template_musica_name');
        }else{
            the_title();
            echo '</li>';
            echo '</ol>';
        }
    }
}

/* =============================================================================
  TITLE
  ============================================================================= */

function generate_title($args) {
    $post = $args["post"];
    $type = $args["type"];
    $post_link = $args["post_link"];
    $small_title = isset($args["small"]) ? $args["small"] : NULL;
    $post_name = empty($args["post_name"]) ? $post->post_title : $args["post_name"];
    $nota_musical = empty($args["nota_musical"]) ? get_post_meta($post->ID, '_nota_musical_key', true) : $args["nota_musical"];
    if (!empty($nota_musical)) {
        echo '<span class="nota-musical-' . $type . ' hidden-xs">' . $nota_musical . '</span>';
    } elseif ($nota_musical != "0") {
        $nota_val = array("b", "c", "K", "eQ", "f", "Y", "h", "i",
            "j", "G", "l", "n", "C", "o", "p", "Z", "L", "s", "t",
            "H", "v", "U", "y");
        echo '<span class="nota-musical-' . $type . ' hidden-xs">' . $nota_val[(($post->ID - 1) % 22)] . '</span>';
    }
    $title_small = empty($small_title) ? '' : ' <small class="visible-md-inline visible-lg-inline">Publicado em ' . $small_title . '</small>';
    if (!empty($post_link)) {
        echo '<' . $type . '>' . $post_name . $title_small . '</' . $type . '>';
    } else {
        echo '<' . $type . '><a href="' . get_permalink($post->ID) . '">' . $post_name . '</a> ' . $title_small . '</' . $type . '>';
    }
}

/* =============================================================================
  REMOVE WORDPRESS VERSION
  ============================================================================= */

function polivoz_edit_header() {
    return '';
}

add_filter('the_generator', 'polivoz_edit_header()');

function filter_post_link($permalink, $post) {
    if ($post->post_type != 'post')
        return $permalink;
    return 'blog' . $permalink;
}

add_filter('pre_post_link', 'filter_post_link', 10, 2);

/* =============================================================================
  ADD /BLOG/ PERMANLINK
  ============================================================================= */

add_action('generate_rewrite_rules', 'add_blog_rewrites');

function add_blog_rewrites($wp_rewrite) {
    $wp_rewrite->rules = array(
        'blog/([^/]+)/?$' => 'index.php?name=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/?$' => 'index.php?attachment=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/trackback/?$' => 'index.php?attachment=$matches[1]&tb=1',
        'blog/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?attachment=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)/trackback/?$' => 'index.php?name=$matches[1]&tb=1',
        'blog/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?name=$matches[1]&paged=$matches[2]',
        'blog/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?name=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)(/[0-9]+)?/?$' => 'index.php?name=$matches[1]&page=$matches[2]',
        'blog/[^/]+/([^/]+)/?$' => 'index.php?attachment=$matches[1]',
        'blog/[^/]+/([^/]+)/trackback/?$' => 'index.php?attachment=$matches[1]&tb=1',
        'blog/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?attachment=$matches[1]&cpage=$matches[2]',
            ) + $wp_rewrite->rules;
}

function polivoz_create_pages($pageName, $slug) {
    if (get_page_by_path($slug) == NULL) {
        $createPage = array(
            'post_title' => $pageName,
            'post_content' => 'Starter content',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => $slug
        );

        // Insert the post into the database
        wp_insert_post($createPage);
    }
}

function polivoz_create_not_existing_pages() {
    polivoz_create_pages('Blog', 'blog');
}

add_action('init', 'polivoz_create_not_existing_pages');


/* =============================================================================
  ERROR 404
  ============================================================================= */

function polivoz_error_404($title, $args,$color) {
    echo'
        <article class="jumbotron row" '.((!empty($color))?'style="background-color:'.$color.'"':'').'>
            <div class="col-md-6 col-xs-12 text-center">
                <br>
                <h1>OOPS! &#9785;</h1>
            </div>
            <div class="col-md-6 col-xs-12 text-center">
                <div class="row erro404-list section-content">
                    <h2>' . $title . '</h2>
                    <ul>';
    foreach ($args as $item) {
        echo '<li>' . $item . '</li>';
    }
    echo '</ul>
                </div>
            </div>
        </article>
    ';
}

/* =============================================================================
  SEARCH ENGINE
  ============================================================================= */

function polivoz_search_box($postype, $post_per_page,$address_ID) {
    if (empty($post_per_page)) {
        $post_per_page = get_option('posts_per_page');
    }
    if($postype=='evento'){
        $custom_args = array(
            'post_type' => 'evento',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'meta_key' => '_event_timestamp_key',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        if(!empty($address_ID)){
            $custom_args['meta_query'] =  array(
                    array(
                        'key' => '_event_location_key',
                        'value' => $address_ID,
                        'compare' => 'LIKE'
            ));
        }
        $firstDateQuery = new WP_Query($custom_args);
        if ($firstDateQuery->have_posts()) {
            $firstDateQuery->the_post();
            $max_date= date('m/Y',get_post_meta(get_the_id(), '_event_timestamp_key', true));
        }
        wp_reset_postdata();
        $custom_args = array(
            'post_type' => 'evento',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'meta_key' => '_event_timestamp_key',
            'orderby' => 'meta_value_num',
            'order' => 'ASC'
        );
        if(!empty($address_ID)){
            $custom_args['meta_query'] =  array(
                    array(
                        'key' => '_event_location_key',
                        'value' => $address_ID,
                        'compare' => 'LIKE'
            ));
        }
        $lastDateQuery = new WP_Query($custom_args);
        if ($lastDateQuery->have_posts()) {
            $lastDateQuery->the_post();
            $min_date= date('m/Y',get_post_meta(get_the_id(), '_event_timestamp_key', true));
        }
        wp_reset_postdata();
    }else{
        $custom_args = array(
            'post_type' => $postype,
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'order' => 'DESC'
        );
        $firstDateQuery = new WP_Query($custom_args);
        if ($firstDateQuery->have_posts()) {
            $firstDateQuery->the_post();
            $max_date = get_the_date('m/Y');
        }
        wp_reset_postdata();
        $custom_args = array(
            'post_type' => $postype,
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'order' => 'ASC'
        );
        $lastDateQuery = new WP_Query($custom_args);
        if ($lastDateQuery->have_posts()) {
            $lastDateQuery->the_post();
            $min_date = get_the_date('m/Y');
        }
        wp_reset_postdata();
    }
    echo '
        <div class="container text-center">
            <form role="search" method="post" class="search-container" data-filterbydate="none"'.(!empty($address_ID)?'data-addressid="'.$address_ID.'"':'').' data-postperpage="' . $post_per_page . '" data-postype="' . $postype . '" data-url="' . admin_url('admin-ajax.php') . '">
                <input type="text" id="polivoz-search-input" autocomplete="off" class="polivoz-search-form" placeholder="Pesquisar" value="" name="s" title="Pesquisar" dir="ltr">';
                if(is_post_type_archive('evento')){
                echo '<a class="inside-icon" id="polivoz-local-link" title="Pesquisar por locais" href="'.get_home_url().'/local"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a>';
                echo '
                <div id="filter-by-date-form" class="inside-icon dropdown">
                <span class="glyphicon glyphicon-calendar dropdown-toggle" id="filter-by-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></span>
                <sub class="glyphicon glyphicon-ok custom-date-ok" aria-hidden="true"></sub>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="active-item filter-by-date" data-rule="none"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a>Em qualquer data</a></li>
                    <li class="filter-by-date" data-rule="future"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a>Eventos futuros</a></li>
                    <li class="filter-by-date" data-rule="month"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a >No último mês</a></li>
                    <li class="filter-by-date" data-rule="year"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a >No último ano</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="filter-by-date custom-date" data-rule="custom"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a>Personalizado</a></li>                    
                </ul>
                </div>';}
                elseif(!is_post_type_archive('local')){
                echo '
                <div id="filter-by-date-form" class="inside-icon dropdown">
                <span class="glyphicon glyphicon-calendar dropdown-toggle" id="filter-by-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></span>
                <sub class="glyphicon glyphicon-ok custom-date-ok" aria-hidden="true"></sub>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="active-item filter-by-date" data-rule="none"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a>Em qualquer data</a></li>';
                    if(is_post_type_archive('evento')||is_singular('local')){
                    echo '<li class="filter-by-date" data-rule="future"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a>Eventos futuros</a></li>';}
                    echo '
                    <li class="filter-by-date" data-rule="month"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a >No último mês</a></li>
                    <li class="filter-by-date" data-rule="year"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a >No último ano</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="filter-by-date custom-date" data-rule="custom"><span class="glyphicon glyphicon-ok mark-true" aria-hidden="true"></span><a>Personalizado</a></li>                    
                </ul>
                </div>';}
                echo '</input>
                <a id="search-trigger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
            </form></div>';
    echo
    '<div id="modal-custom-date" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="changeDateModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Selecione duas datas</h3>
                </div>
                <div class="modal-body">
                    <div class="calendar" data-date-start-date="' . $min_date . '" data-date-end-date="' . $max_date . '"></div>
                </div>
                <div class="modal-footer">
                    <table class="table-condensed"><tr>
                        <td><a class="btn btn-link" id="btn-close-date">Fechar</a></td>
                        <td><a class="btn btn-link" id="btn-clear-date">Limpar</a></td>
                        <td><a class="btn btn-default" id="btn-submit-date">Ok</a></td>
                    </tr></table>
                </div>
            </div>
        </div>
    </div>';
}

/* =============================================================================
  PAGINATION
  ============================================================================= */

function polivoz_pagination($postype, $pagenum, $post_per_page,$name,$addressID) {
    if (empty($post_per_page)) {
        $post_per_page = get_option('posts_per_page');
    }
    if (empty($name)){
        $name = $postype.'s';
    }
    if ($pagenum != 1) {
        echo '<div class="container text-center" id="pagination">
            <a data-page="1" data-url="' . admin_url("admin-ajax.php") . '" data-pagenum="' . $pagenum . '" data-postype="' . $postype . '" data-postperpage="' . $post_per_page . '" '.(!empty($addressID)?'data-addressid="'.$addressID.'"':'').' class="load-more btn btn-link">
            <span class="text">Carregar mais '.$name.'&nbsp;&nbsp;</span>
            <span class="polivoz-icon polivoz-spinner10"></span>
            </a>
        </div>';
        echo '<div class="container text-center hidden" id="end-pagination">
        <div class="text-center breadcrumb col-lg-12 active">~/ FIM /~</div>
        </div>';
    } else {
        echo '<div class="container text-center">
        <div id="end-pagination" class="text-center breadcrumb col-lg-12 active">~/ FIM /~</div>
        </div>';
    }
}

/* =============================================================================
  ADDRESS
  ============================================================================= */

function polivoz_address($post_ID) {
    $addresss = get_post_meta($post_ID, '_location_address_key', true);
    $address_string = '';
    $address_string.= (!empty($addresss['street'])) ? $addresss['street'] : 'Sem logadouro';
    $address_string.= (!empty($addresss['number'])) ? ', ' . $addresss['number'] : ', s/n';
    $address_string.= (!empty($addresss['other'])) ? ', ' . $addresss['other'] : '';
    $address_string.= ' - ';
    $address_string.= (!empty($addresss['neighborhood'])) ? $addresss['neighborhood'] . ', ' : '';
    $address_string.= (!empty($addresss['city'])) ? $addresss['city'] . ', ' : '';
    $address_string.= (!empty($addresss['province'])) ? $addresss['province'] : '';
    $address_string.= (!empty($addresss['country']) && $addresss['country'] != 'Brasil') ? ', ' . $addresss['country'] : '';
    $address_string.= (!empty($addresss['cep'])) ? '. Cep: ' . $addresss['cep'] : '';
    return $address_string;
}

/* =============================================================================
  Funções matemáticas
  ============================================================================= */

function mmc_array($items) {
    //Input: An Array of numbers
    //Output: The LCM of the numbers
    while (2 <= count($items)) {
        array_push($items, mmc(array_shift($items), array_shift($items)));
    }
    return reset($items);
}

function mdc($n, $m) {
    $n = abs($n);
    $m = abs($m);
    if ($n == 0 and $m == 0)
        return 1; //avoid infinite recursion
    if ($n == $m and $n >= 1)
        return $n;
    return $m < $n ? mdc($n - $m, $n) : mdc($n, $m - $n);
}

function mmc($n, $m) {
    return $m * ($n / mdc($n, $m));
}

function polivoz_interval($interval, $limit, $select) {
    if ($select >= $limit || !is_numeric($select)) {
        $select = 0;
    }
    $str = '';
    for ($i = 0; $i <= $limit; $i+=$interval) {
        $val = str_pad($i, 2, '0', STR_PAD_LEFT);
        $str.='<option value = "' . $val . '"' . (($select == $i) ? 'selected' : '') . '>' . $val . '</option>';
    }
    return $str;
}

function convertToPTdate($date) {
    $meses = array('janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');
    $date_part = explode("/", $date);
    return intval($date_part[0], 10) . ' de ' . $meses[intval($date_part[1], 10) - 1] . ' de ' . $date_part[2];
}

/* =============================================================================
  Funções auxiliares
  ============================================================================= */

function load_locals() {
    $args = array(
        'post_type' => 'local',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'asc'
    );
    $locals_list = get_posts($args);
    $locals_ID = array();

    foreach ($locals_list as $local) {
        $locals_ID[] += $local->ID;
    }
    return $locals_ID;
}


function calculate_nota_musical($postID, $nota) {
    $nota_val = array("b", "c", "K", "eQ", "f", "Y", "h", "i",
        "j", "G", "l", "n", "C", "o", "p", "Z", "L", "s", "t",
        "H", "v", "U", "y");
    if (empty($nota)) {
        return $nota_val[(($postID - 1) % 22)];
    } elseif (ctype_alpha($nota)) {
        return $nota;
    } else {
        return "";
    }
}

function limit_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' [...]';
    } else {
    $excerpt = implode(" ",$excerpt);
    } 
    return $excerpt;
}

