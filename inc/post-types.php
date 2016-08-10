<?php

/* =============================================================================
  ADD POST-TYPE
  ============================================================================= */

function polivoz_add_custom_post() {

    /* ------------------------------------------------------------------------------
     *                        Galeria de fotos
      ------------------------------------------------------------------------------ */
    $labels = array(
        'name' => 'Galerias',
        'singular_nsme' => 'Galeria',
        'add_new' => 'Adicionar galeria',
        'add_new_item' => 'Adicionar uma nova galeria',
        'edit_item' => 'Editar galeria',
        'new_item' => 'Nova galeria',
        'search_items' => 'Procurar galeria',
        'view_item' => 'Ver galeria',
        'search_item' => 'Procurar galeria',
        'not_found' => 'Nenhuma galeria foi encontrada',
        'not_found_in_trash' => 'Não foi achada galerias na lixeira',
        'use_featured_image' => 'Usar como capa da galeria',
        'remove_featured_image' => 'Remover a capa da galeria',
        'set_featured_image' => 'Inserir capa da galeria'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'thumbnail',
        ),
        'menu_position' => 11,
        'taxonomies' => array('category', 'post_tag'),
        'exclude_from_search' => false
    );
    register_post_type('galeria', $args);
    
    /* ------------------------------------------------------------------------------
     *                        Músicas
      ------------------------------------------------------------------------------ */
    $labels = array(
        'name' => 'Músicas',
        'singular_nsme' => 'Música',
        'add_new' => 'Adicionar música',
        'add_new_item' => 'Adicionar uma nova música',
        'edit_item' => 'Editar música',
        'new_item' => 'Nova música',
        'search_items' => 'Procurar música',
        'view_item' => 'Ver música',
        'search_item' => 'Procurar música',
        'not_found' => 'Nenhuma música foi encontrada',
        'not_found_in_trash' => 'Não foi encontrado músicas na lixeira',
        'use_featured_image' => 'Usar como capa da música',
        'remove_featured_image' => 'Remover a capa da música',
        'set_featured_image' => 'Inserir capa da música'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-playlist-audio',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
        ),
        'menu_position' => 14,
        'taxonomies' => array('category', 'post_tag'),
        'exclude_from_search' => false
    );
    register_post_type('musica', $args);
    /* ------------------------------------------------------------------------------
     *                       Seções da Home Page
      ------------------------------------------------------------------------------ */

    $labels = array(
        'name' => 'Seções da homepage',
        'singular_nsme' => 'Seção da homepage',
        'add_new' => 'Adicionar seção',
        'add_new_item' => 'Adicionar uma nova seção',
        'edit_item' => 'Editar seção',
        'new_item' => 'Nova seção',
        'view_item' => 'Ver seção',
        'search_item' => 'Procurar seção',
        'not_found' => 'Nenhuma seção foi encontrada',
        'not_found_in_trash' => 'Não foi encontrado seções na lixeira'
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'publicly_queryable' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-home',
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => true,
        'supports' => array(
            'title',
        ),
        'menu_position' => 19,
        'exclude_from_search' => true
    );

    register_post_type('homepolivoz', $args);

    /* ------------------------------------------------------------------------------
     *                        Eventos
      ------------------------------------------------------------------------------ */
    $labels = array(
        'name' => 'Eventos',
        'singular_nsme' => 'Evento',
        'add_new' => 'Adicionar evento',
        'add_new_item' => 'Adicionar um novo evento',
        'edit_item' => 'Editar evento',
        'new_item' => 'Novo evento',
        'search_items' => 'Procurar evento',
        'view_item' => 'Ver evento',
        'search_item' => 'Procurar evento',
        'not_found' => 'Nenhum evento foi encontrado',
        'not_found_in_trash' => 'Não foi achado eventos na lixeira',
        'use_featured_image' => 'Usar como capa do evento',
        'remove_featured_image' => 'Remover a capa do evento',
        'set_featured_image' => 'Inserir capa do evento'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => false,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-clock',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'thumbnail'
        ),
        'menu_position' => 21,
        'taxonomies' => array('category', 'post_tag'),
        'exclude_from_search' => false
    );
    register_post_type('evento', $args);

    /* ------------------------------------------------------------------------------
     *                        Locais
      ------------------------------------------------------------------------------ */
    $labels = array(
        'name' => 'Locais',
        'singular_nsme' => 'Local',
        'add_new' => 'Adicionar local',
        'add_new_item' => 'Adicionar um novo local',
        'edit_item' => 'Editar local',
        'new_item' => 'Novo local',
        'search_items' => 'Procurar local',
        'view_item' => 'Ver local',
        'search_item' => 'Procurar local',
        'not_found' => 'Nenhum local foi encontrado',
        'not_found_in_trash' => 'Não foi achado locais na lixeira',
        'use_featured_image' => 'Usar como capa do local',
        'remove_featured_image' => 'Remover a capa do local',
        'set_featured_image' => 'Inserir capa do local'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-location-alt',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'thumbnail',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 22,
        'exclude_from_search' => false
    );
    register_post_type('local', $args);
}

add_action('init', 'polivoz_add_custom_post');

/* =============================================================================
  HOOKS
  ============================================================================= */


add_action('add_meta_boxes', 'polivoz_add_meta_box');

//Columns
add_filter('manage_post_posts_columns', 'polivoz_set_post_columns');
add_action('manage_post_posts_custom_column', 'polivoz_post_custom_column', 10, 2);

add_filter('manage_galeria_posts_columns', 'polivoz_set_galeria_columns');
add_action('manage_galeria_posts_custom_column', 'polivoz_galeria_custom_column', 10, 2);

add_filter('manage_homepolivoz_posts_columns', 'polivoz_set_homepolivoz_columns');
add_action('manage_homepolivoz_posts_custom_column', 'polivoz_homepolivoz_custom_column', 10, 2);

add_filter('manage_local_posts_columns', 'polivoz_set_local_columns');
add_action('manage_local_posts_custom_column', 'polivoz_local_custom_column', 10, 2);

add_filter('manage_evento_posts_columns', 'polivoz_set_evento_columns');
add_action('manage_evento_posts_custom_column', 'polivoz_evento_custom_column', 10, 2);

//Save post
add_action('save_post', 'polivoz_save_gallery_shortcode_data');
add_action('save_post', 'polivoz_save_music_list_shortcode_data');
add_action('save_post', 'polivoz_save_music_list_iframe_data');
add_action('save_post', 'polivoz_save_music_list_pdfs_data');
add_action('save_post', 'polivoz_save_music_list_mp3_data');
add_action('save_post', 'polivoz_save_nota_musical_data');
add_action('save_post', 'polivoz_save_subtitle_data');
add_action('save_post', 'polivoz_save_subtitle_alt_data');
add_action('save_post', 'polivoz_save_location_map_data');
add_action('save_post', 'polivoz_save_home_priority_data');
add_action('save_post', 'polivoz_save_home_type_data');
add_action('save_post', 'polivoz_save_home_columns_data');
add_action('save_post', 'polivoz_save_home_form_shortcode_data');
add_action('save_post', 'polivoz_save_home_contact_data');
add_action('save_post', 'polivoz_save_home_social_data');
add_action('save_post', 'polivoz_save_visibility_data');
add_action('save_post', 'polivoz_save_visibility_other_data');
add_action('save_post', 'polivoz_save_alt_permanlink_data');
add_action('save_post', 'polivoz_save_show_menu_data');
add_action('save_post', 'polivoz_save_location_address_data');
add_action('save_post', 'polivoz_save_event_date_data');
add_action('save_post', 'polivoz_save_event_location_data');

/* =============================================================================
  COLUMNS
  ============================================================================= */

/* ----------------------------------------------------------------------------/
/*--------------------------------Post Columns------------------------------- */
/* -------------------------------------------------------------------------- */
function polivoz_set_post_columns($columns) {
    $newColumns = array();
    $newColumns['visibility'] = 'Visibilidade';
    return array_slice($columns, 0, 4, true) + $newColumns + array_slice($columns, 4, count($columns) - 4, true);
}

function polivoz_post_custom_column($column, $post_id) {
    switch ($column) {
        case 'visibility':
            $hidden = get_post_meta($post_id, '_visibility_hidden_key', true);
            $featured = get_post_meta($post_id, '_visibility_featured_key', true);
            if($hidden=='checked'||$featured=='checked'){
                echo ($hidden=='checked'?'Oculto':'').(($hidden=='checked'&&$featured=='checked')?'<br>':'').($featured=='checked'?'Destacado':'');
            }else{
                echo 'Normal';
            }
            break;
    }
}

/* ----------------------------------------------------------------------------/
  /*------------------------------Galeria Columns------------------------------ */
/* ---------------------------------------------------------------------------- */

function polivoz_set_galeria_columns($columns) {
    $newColumns = array();
    $newColumns['shortcode'] = 'Shortcode da galeria';
    $newColumns['visibility'] = 'Visibilidade';
    return array_slice($columns, 0, 2, true) + $newColumns + array_slice($columns, 2, count($columns) - 2, true);
}

function polivoz_galeria_custom_column($column, $post_id) {
    switch ($column) {
        case 'shortcode':
            $gallery_shortcode = get_post_meta($post_id, '_gallery_shortcode_key', true);
            echo $gallery_shortcode;
            break;
        case 'visibility':
            $hidden = get_post_meta($post_id, '_visibility_hidden_key', true);
            $featured = get_post_meta($post_id, '_visibility_featured_key', true);
            if($hidden=='checked'||$featured=='checked'){
                echo ($hidden=='checked'?'Oculto':'').(($hidden=='checked'&&$featured=='checked')?'<br>':'').($featured=='checked'?'Destacado':'');
            }else{
                echo 'Normal';
            }
            break;
    }
}

/* ----------------------------------------------------------------------------/
  /*------------------------------Local Columns------------------------------ */
/* ---------------------------------------------------------------------------- */

function polivoz_set_local_columns($columns) {
    $newColumns = array();
    $newColumns['address'] = 'Endereço';
    return array_slice($columns, 0, 2, true) + $newColumns + array_slice($columns, 2, count($columns) - 2, true);
}

function polivoz_local_custom_column($column, $post_id) {
    switch ($column) {
        case 'address':
            echo polivoz_address($post_id);
            break;
    }
}

/* ----------------------------------------------------------------------------/
  /*------------------------------Evento Columns------------------------------ */
/* ---------------------------------------------------------------------------- */

function polivoz_set_evento_columns($columns) {
    $newColumns = array();
    $newColumns['evento_address'] = 'Localização';
    $newColumns['period'] = 'Dia e horário';
    return array_slice($columns, 0, 2, true) + $newColumns;
}

function polivoz_evento_custom_column($column, $post_id) {
    switch ($column) {
        case 'evento_address':
            $address_id = get_post_meta($post_id, '_event_location_key', true);
            echo '<b>' . get_the_title($address_id) . '</b></br>' . polivoz_address($address_id);
            break;
        case 'period':
            $period_obj = get_post_meta($post_id, '_event_date_key', true);
            $same_day = (($period_obj['from_date'] == $period_obj['to_date']) || empty($period_obj['to_date']) || $period_obj['to_date'] == '') ? true : false;
            echo convertToPTdate($period_obj['from_date']) . ($same_day ? '' : (' - ' . convertToPTdate($period_obj['to_date']))) . '<br>';
            echo ($period_obj['all_day'] == 'allday') ? 'Dia todo' : ($period_obj['from_time'] . ' - ' . $period_obj['to_time']);
            break;
    }
}

function polivoz_evento_register_sortable_column($columns) {
    $columns['evento_address'] = 'evento_address';
    $columns['period'] = 'period';
    return $columns;
}

add_filter('manage_edit-evento_sortable_columns', 'polivoz_evento_register_sortable_column');

function evento_address_column_orderby($vars) {
    if (isset($vars['orderby']) && 'evento_address' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => '_event_location_key',
            'orderby' => 'meta_value_num'
                ));
    }

    return $vars;
}

add_filter('request', 'evento_address_column_orderby');

function period_column_orderby($vars) {
    if (isset($vars['orderby']) && 'period' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => '_event_timestamp_key',
            'orderby' => 'meta_value_num'
                ));
    }

    return $vars;
}

add_filter('request', 'period_column_orderby');

/* ----------------------------------------------------------------------------/
  /*-------------------------------------Page--------------------------------- */
/* ---------------------------------------------------------------------------- */



/* ----------------------------------------------------------------------------/
  /*------------------------------Sections Columns----------------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_set_homepolivoz_columns($columns) {
    $newColumns = array();
    $newColumns['type'] = 'Tipo da seção';
    $newColumns['priority'] = 'Prioridade da seção';
    return array_slice($columns, 0, 2, true) + $newColumns + array_slice($columns, 2, count($columns) - 2, true);
}

function polivoz_homepolivoz_custom_column($column, $post_id) {
    switch ($column) {
        case 'type':
            $list_values = array('content' => 'Normal', 'gallery' => 'Galeria', 'contact' => 'Contato', 'event' => 'Evento', 'columns' => 'Coluna Destacada');
            $section_type = $list_values[get_post_meta($post_id, '_home_type_key', true)];
            echo $section_type;
            break;
        case 'priority':
            $section_priority = get_post_meta($post_id, '_home_priority_key', true);
            echo $section_priority;
    }
}

function polivoz_homepolivoz_register_sortable_column($columns) {
    $columns['priority'] = 'priority';
    $columns['type'] = 'type';
    return $columns;
}

add_filter('manage_edit-homepolivoz_sortable_columns', 'polivoz_homepolivoz_register_sortable_column');

function home_priority_column_orderby($vars) {
    if (isset($vars['orderby']) && 'priority' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => '_home_priority_key',
            'orderby' => 'meta_value_num'
                ));
    }

    return $vars;
}

add_filter('request', 'home_priority_column_orderby');

function home_type_column_orderby($vars) {
    if (isset($vars['orderby']) && 'type' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => '_home_type_key',
            'orderby' => 'meta_value'
                ));
    }

    return $vars;
}

add_filter('request', 'home_type_column_orderby');

/* =============================================================================
  METABOXES
  ============================================================================= */


/* Galeria METABOX */

function polivoz_add_meta_box() {
    global $post;
    //Galeria
    add_meta_box('gallery_shortcode', 'Shortcode da galeria', 'polivoz_gallery_shortcode_callback', 'galeria', 'normal', 'high');
    add_meta_box('polivoz_subtitle', 'Subtitulo', 'polivoz_subtitle_callback', 'galeria', 'normal', 'high');
    add_meta_box('nota_musical', 'Numeração de títulos (Nota musical)', 'polivoz_nota_musical_callback', 'galeria', 'side', 'high');
    add_meta_box('polivoz_alt_permanlink', 'Post sobre a galeria', 'polivoz_alt_permanlink_callback', 'galeria', 'normal');
    add_meta_box('polivoz_visibility_other', 'Visibilidade', 'polivoz_visibility_other_callback', 'galeria', 'side', 'high');
    //Post
    add_meta_box('nota_musical', 'Numeração de títulos (Nota musical)', 'polivoz_nota_musical_callback', 'post', 'side', 'high');
    add_meta_box('polivoz_visibility', 'Visibilidade', 'polivoz_visibility_callback', 'post', 'normal', 'high'); 
    //Música
    add_meta_box('nota_musical', 'Numeração de títulos (Nota musical)', 'polivoz_nota_musical_callback', 'musica', 'side', 'high');
    add_meta_box('polivoz_subtitle_alt', 'Subtitulo', 'polivoz_subtitle_alt_callback', 'musica', 'normal', 'high');
    add_meta_box('music_list_shortcode', 'Shortcode da lista de música', 'polivoz_music_list_shortcode_callback', 'musica', 'normal');
    add_meta_box('music_list_iframe', 'Lista de música incorporada (Iframe)', 'polivoz_music_list_iframe_callback', 'musica', 'normal');
    add_meta_box('music_list_pdfs', 'Lista de partituras (PDFs ou documentos)', 'polivoz_music_list_pdfs_callback', 'musica', 'normal');
    add_meta_box('music_list_mp3', 'Lista de músicas (mp3, wma, wav ou formatos de música)', 'polivoz_music_list_mp3_callback', 'musica', 'normal');
    //Page
    add_meta_box('nota_musical', 'Numeração de títulos (Nota musical)', 'polivoz_nota_musical_callback', 'page', 'side', 'high');
    add_meta_box('show_menu', 'Mostrar no menu?', 'polivoz_show_menu_callback', 'page', 'side', 'high');
    add_meta_box('page_priority', 'Prioridade da página no menu', 'polivoz_home_priority_callback', 'page', 'side', 'high');
    //Homepage
    add_meta_box('nota_musical', 'Numeração de títulos (Nota musical)', 'polivoz_nota_musical_callback', 'homepolivoz', 'side');
    add_meta_box('show_menu', 'Mostrar no menu?', 'polivoz_show_menu_callback', 'homepolivoz', 'side', 'high');
    $my_data = get_post_meta($post->ID, '_home_type_key', true);
    if (($my_data === 'content') || ($my_data === 'columns') || ($my_data === 'contact')) {
        add_post_type_support('homepolivoz', 'editor');
    } else {
        remove_post_type_support('homepolivoz', 'editor');
    }
    switch ($my_data) {
        case 'gallery':
            add_meta_box('gallery_shortcode', 'Shortcode da galeria', 'polivoz_gallery_shortcode_callback', 'homepolivoz', 'normal');
            break;
        case 'columns':
            add_meta_box('home_columns', 'Conteúdo da segunda coluna', 'polivoz_home_columns_callback', 'homepolivoz', 'normal');
            break;
        case 'contact':
            add_meta_box('home_form_shortcode', 'Shortcode do formulário de contato', 'polivoz_home_form_shortcode_callback', 'homepolivoz', 'normal');
            add_meta_box('home_contact', 'Dados para contato', 'polivoz_home_contact_callback', 'homepolivoz', 'normal');
            add_meta_box('home_social', 'Midias sociais', 'polivoz_home_social_callback', 'homepolivoz', 'normal');
            break;
    }
    add_meta_box('home_type', 'Tipo de seção', 'polivoz_home_type_callback', 'homepolivoz', 'side', 'high');
    add_meta_box('home_priority', 'Prioridade da seção', 'polivoz_home_priority_callback', 'homepolivoz', 'side', 'high');
    //Locais
    add_meta_box('nota_musical', 'Numeração de títulos (Nota musical)', 'polivoz_nota_musical_callback', 'local', 'side', 'high');
    add_meta_box('local_address', 'Endereço', 'polivoz_location_address_callback', 'local', 'normal');
    add_meta_box('local_map', 'Mapa', 'polivoz_location_map_callback', 'local', 'normal');
    add_meta_box('polivoz_subtitle', 'Subtitulo', 'polivoz_subtitle_callback', 'local', 'normal', 'high');
    //Eventos
    add_meta_box('polivoz_subtitle', 'Subtitulo', 'polivoz_subtitle_callback', 'evento', 'normal', 'high');
    add_meta_box('polivoz_event_date', 'Quando', 'polivoz_event_date_callback', 'evento', 'normal');
    add_meta_box('polivoz_event_location', 'Onde', 'polivoz_event_location_callback', 'evento', 'normal', 'high');
    add_meta_box('polivoz_alt_permanlink', 'Post sobre o evento', 'polivoz_alt_permanlink_callback', 'evento', 'normal');
}

/* ----------------------------------------------------------------------------/
  /*----------------------------- Galeria Shortcode METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_gallery_shortcode_callback($post) {
    wp_nonce_field('polivoz_save_gallery_shortcode_data', 'polivoz_gallery_shortcode_nonce');
    $value = esc_attr(get_post_meta($post->ID, '_gallery_shortcode_key', true));
    echo '<input type="text" id="polivoz_gallery_shortcode_field" name="polivoz_gallery_shortcode_field" value="'.$value.'" class="widefat"/>';
    echo '<p>Shortcode são pequenos códigos que criam galerias e outras ações. Estes códigos podem ser utilizados com a instalações de plugins de galerias. <code>Ex: [gm album=1]</code> <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-shortcode-gallery" target="_blank"">Aprenda mais sobre shortcode da galeria</a></p>';
}

function polivoz_save_gallery_shortcode_data($post_id) {
    if (!isset($_POST['polivoz_gallery_shortcode_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_gallery_shortcode_nonce'], 'polivoz_save_gallery_shortcode_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_gallery_shortcode_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_gallery_shortcode_field'];
    update_post_meta($post_id, '_gallery_shortcode_key', esc_attr($my_data));
}


/* ----------------------------------------------------------------------------/
  /*------------------ Lista de música Shortcode METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_music_list_shortcode_callback($post) {
    wp_nonce_field('polivoz_save_music_list_shortcode_data', 'polivoz_music_list_shortcode_nonce');
    $value = get_post_meta($post->ID, '_music_list_shortcode_key', true);
    if (empty($value['title'])){
        $value['title'] = 'Playlist';
    }
    echo '<p><input type="text" id="polivoz_music_list_shortcode_field" placeholder="Titulo" name="polivoz_music_list_shortcode_field[title]" value="'.sanitize_text_field($value['title']).'" class="widefat"/></p>';
    echo '<p><input type="text" id="polivoz_music_list_shortcode_field" placeholder="Digite um shortcode ou um iframe" name="polivoz_music_list_shortcode_field[code]" value="'.esc_attr($value['code']).'" class="widefat"/></p>';
    echo '<p>Shortcode são pequenos códigos que criam lista de músicas e outras ações. Estes códigos podem ser utilizados com a instalações de plugins de galerias. <code>Ex: [gm album=1]</code> <a href="'.menu_page_url('polivoz-admin-page', false).'#polivoz-guide-shortcode-music-shortcode" target="_blank"">Aprenda mais sobre shortcode de lista  de musicas</a></p>';
}

function polivoz_save_music_list_shortcode_data($post_id) {
    if (!isset($_POST['polivoz_music_list_shortcode_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_music_list_shortcode_nonce'], 'polivoz_save_music_list_shortcode_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_music_list_shortcode_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_music_list_shortcode_field'];
    update_post_meta($post_id, '_music_list_shortcode_key', $my_data);
}

/* ----------------------------------------------------------------------------/
/*-----------------------Lista incorporada METABOX----------------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_music_list_iframe_callback($post) {
    wp_nonce_field('polivoz_save_music_list_iframe_data', 'polivoz_music_list_iframe_nonce');
    $value = get_post_meta($post->ID, '_music_list_iframe_key', true);
    
    $qtd = empty($value)?1:count($value);
    for($i=0; $i<=3;$i++){
        if(empty($value[$i])||$value[$i]==''){
            $value[$i] = array(
            'title' => '',
            'code' => '',
            'responsive' => 'yes'
            );
        }
        echo '<div id="iframe-music-container-'.$i.'" class="iframe-music-container'.(($i<$qtd)?'':' hidden').'">';
            echo '<p><a class="delete-iframe-item delete-list-icon'.(($qtd==1)?' hidden':'').'"><span class="dashicons dashicons-no"></span></a> <b>Lista incorporada n° '.($i+1).'</b>';
            echo '<div class="responsive-iframe"><label> Resposivo <input type="radio" name="polivoz_music_list_iframe_field['.$i.'][responsive]" value="yes" '.(($value[$i]['responsive'])=='yes'?'checked':'').'>Sim </input></label>';
            echo '<label><input type="radio" name="polivoz_music_list_iframe_field['.$i.'][responsive]" value="no" '.(($value[$i]['responsive']=='no')?'checked':'').'>Não </input></label>';
            echo '</div></p>';
            echo '<p><input type="text" class="widefat iframe-title" id="polivoz_list_iframe_title_'.$i.'" placeholder="Titulo" name="polivoz_music_list_iframe_field['.$i.'][title]" value="'.sanitize_text_field($value[$i]['title']).'"></p>';
            echo '<p><textarea rows="2" class="widefat iframe-code" id="polivoz_list_iframe_code_'.$i.'" placeholder="Digite a lista de música incorporada (iframe)" name="polivoz_music_list_iframe_field['.$i.'][code]">'.esc_attr($value[$i]['code']).'</textarea></p>';
        echo '</div>';
    }
    echo '<input type="button" class="button button-primary '.($qtd>=4?'hidden':'').'" id="add_new_iframe" value="Adicionar item"/>';
    ?>
<?php
    echo '<p>Esse espaço é usado para incorporar (Iframes) lista de músicas ou uma música de sites externos (Ex: Youtube, Soundcloud, Vimeo...)</p>';
}

function polivoz_save_music_list_iframe_data($post_id) {
    if (!isset($_POST['polivoz_music_list_iframe_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_music_list_iframe_nonce'], 'polivoz_save_music_list_iframe_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $my_data = $_POST['polivoz_music_list_iframe_field'];
    $my_data = array_filter($my_data,function($value){
        return($value['title'] !== '' && $value['code']!=='');});
    
    update_post_meta($post_id, '_music_list_iframe_key', array_values($my_data));
}

/* ----------------------------------------------------------------------------/
/*-----------------------Lista de partituras METABOX----------------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_music_list_pdfs_callback($post) {
    wp_nonce_field('polivoz_save_music_list_pdfs_data', 'polivoz_music_list_pdfs_nonce');
    $value = get_post_meta($post->ID, '_music_list_pdfs_key', true);
    $max_list = 20;
    $qtd = empty($value)?1:count($value);
    echo '<input id="max-pdfs-num" type="hidden" value="'.esc_attr($max_list).'">';
    for($i=0; $i<=$max_list-1;$i++){
        if(empty($value[$i])||$value[$i]==''){
            $value[$i] = array(
            'title' => '',
            'code' => '',
            'forcedownload' => '',
            'external' => 'no'
            );
        }
        echo '<div id="pdfs-music-container-'.$i.'" class="pdfs-music-container'.(($i<$qtd)?'':' hidden').'">';
            echo '<a class="delete-pdfs-item delete-list-icon'.(($qtd==1)?' hidden':'').'"><span class="dashicons dashicons-no"></span></a> <b>Partitura n° '.($i+1).'</b>&thinsp;&thinsp;';
            echo '<a href="#" class="open-media open-media-pdfs'.($value[$i]['external']=='yes'?' hidden': '').'" data-homeurl="'.get_home_url().'" title="Open-Media"> Adicionar o arquivo da partitura</a>';
            echo '<div class="pdfs-external link-externo"><label>Forçar download <input type="checkbox" class="force-download" value="true" '.(($value[$i]['forcedownload']=='true')?'checked':'').' name="polivoz_music_list_pdfs_field['.$i.'][forcedownload]" ></label><label> Link externo <input type="radio" name="polivoz_music_list_pdfs_field['.$i.'][external]" class="external-yes" value="yes" '.(($value[$i]['external'])=='yes'?'checked':'').'>Sim </input></label>';
            echo '<label><input type="radio" name="polivoz_music_list_pdfs_field['.$i.'][external]" class="external-no" value="no" '.(($value[$i]['external']=='no')?'checked':'').'>Não </input></label>';
            echo '</div>';
            echo '<p><input type="text" class="widefat pdfs-title" id="polivoz_list_pdfs_title_'.$i.'" placeholder="Titulo" name="polivoz_music_list_pdfs_field['.$i.'][title]" value="'.sanitize_text_field($value[$i]['title']).'"></p>';
            echo '<p><input type="text" class="widefat pdfs-code" id="polivoz_list_pdfs_code_'.$i.'" placeholder="Digite o endereço URL da partitura da música" name="polivoz_music_list_pdfs_field['.$i.'][code]" value="'.esc_attr($value[$i]['code']).'"></p>';
        echo '</div>';
    }
    echo '<input type="button" class="button button-primary '.($qtd>=$max_list?'hidden':'').'" id="add_new_pdfs" value="Adicionar item"/>';
    ?>
<?php
    echo '<p>Esse espaço é usado para postar os links das partituras (Em formato de documento PDF ou similares). Podendo estes serem links externos ao site (com endereço completo) ou internos (apenas o slug).</p>';
}

function polivoz_save_music_list_pdfs_data($post_id) {
    if (!isset($_POST['polivoz_music_list_pdfs_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_music_list_pdfs_nonce'], 'polivoz_save_music_list_pdfs_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $my_data = $_POST['polivoz_music_list_pdfs_field'];
    $my_data = array_filter($my_data,function($value){
        return($value['title'] !== '' && $value['code']!=='');});
    
    update_post_meta($post_id, '_music_list_pdfs_key', array_values($my_data));
}

/* ----------------------------------------------------------------------------/
/*-----------------------Lista de músicas METABOX----------------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_music_list_mp3_callback($post) {
    wp_nonce_field('polivoz_save_music_list_mp3_data', 'polivoz_music_list_mp3_nonce');
    $value = get_post_meta($post->ID, '_music_list_mp3_key', true);
    $max_list = 20;
    echo '<input id="max-mp3-num" type="hidden" value="'.esc_attr($max_list).'">';
    $qtd = empty($value)?1:count($value);
    for($i=0; $i<=$max_list-1;$i++){
        if(empty($value[$i])||$value[$i]==''){
            $value[$i] = array(
            'title' => '',
            'code' => '',
            'forcedownload' => '',
            'external' => 'no'
            );
        }
        echo '<div id="mp3-music-container-'.$i.'" class="mp3-music-container'.(($i<$qtd)?'':' hidden').'">';
            echo '<a class="delete-mp3-item delete-list-icon'.(($qtd==1)?' hidden':'').'"><span class="dashicons dashicons-no"></span></a> <b>Música n° '.($i+1).'</b>&thinsp;&thinsp;';
            echo '<a href="#" class="open-media open-media-mp3'.($value[$i]['external']=='yes'?' hidden': '').'" data-homeurl="'.get_home_url().'" title="Open-Media"> Adicionar o arquivo da música</a>';
            echo '<div class="mp3-external link-externo"><label>Forçar download <input type="checkbox" class="force-download" value="true" '.(($value[$i]['forcedownload']=='true')?'checked':'').' name="polivoz_music_list_mp3_field['.$i.'][forcedownload]" '.($value[$i]['external']=='no'?' disabled': '').' ></label> <label>Link externo <input type="radio" name=polivoz_music_list_mp3_field['.$i.'][external] class="external-yes" value="yes" '.(($value[$i]['external'])=='yes'?'checked':'').'>Sim </input></label>';
            echo '<label><input type="radio" name=polivoz_music_list_mp3_field['.$i.'][external] class="external-no" value="no" '.(($value[$i]['external']=='no')?'checked':'').'>Não </input></label></div>';
            echo '<p><input type="text" class="widefat mp3-title" id="polivoz_list_mp3_title_'.$i.'" placeholder="Titulo" name="polivoz_music_list_mp3_field['.$i.'][title]" value="'.sanitize_text_field($value[$i]['title']).'"></p>';
            echo '<p><input type="text" class="widefat mp3-code" id="polivoz_list_mp3_code_'.$i.'" placeholder="Digite o endereço URL da música no formato mp3, wav, wma, flac e outros formatos de música" name="polivoz_music_list_mp3_field['.$i.'][code]" value="'.esc_attr($value[$i]['code']).'"></p>';
        echo '</div>';
    }
    echo '<input type="button" class="button button-primary '.($qtd>=$max_list?'hidden':'').'" id="add_new_mp3" value="Adicionar item"/>';
    ?>
<?php
    echo '<p>Esse espaço é usado para postar os links de formatos de músicas. Podendo estes serem links externos ao site (com endereço completo) ou internos (apenas o slug do site ex: www.meusite.com/<code>meu_slug_parte1/meu_slug_parte2</code>).</p>';
}

function polivoz_save_music_list_mp3_data($post_id) {
    if (!isset($_POST['polivoz_music_list_mp3_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_music_list_mp3_nonce'], 'polivoz_save_music_list_mp3_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $my_data = $_POST['polivoz_music_list_mp3_field'];
    $my_data = array_filter($my_data,function($value){
        return($value['title'] !== '' && $value['code']!=='');});
    
    update_post_meta($post_id, '_music_list_mp3_key', array_values($my_data));
}


/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Visibility METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_visibility_other_callback($post) {
    wp_nonce_field('polivoz_save_visibility_other_data', 'polivoz_visibility_other_nonce');
    $hidden = esc_attr(get_post_meta($post->ID, '_visibility_hidden_key', true));
    $featured = esc_attr(get_post_meta($post->ID, '_visibility_featured_key', true));
    echo '<ul class="form-no-clear">';
    echo '<li><input type ="checkbox" id="polivoz_visibility_other_field_hidden" name="polivoz_visibility_field_hidden" value="checked"'.(($hidden == 'checked') ? 'checked':'').'>Oculto</input></li>';
    echo '<li><input type ="checkbox" id="polivoz_visibility_other_field_featured" name="polivoz_visibility_field_featured" value="checked"'.(($featured == 'checked') ? 'checked':'').'>Destacado</input></li>';
    echo '</ul>';
}

function polivoz_save_visibility_other_data($post_id) {
    if (!isset($_POST['polivoz_visibility_other_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_visibility_other_nonce'], 'polivoz_save_visibility_other_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['polivoz_visibility_field_hidden'])) {
        $hidden = $_POST['polivoz_visibility_field_hidden'];
    }else{
        $hidden = 'false';
    }
    if($hidden!='checked'){
        $hidden = 'false';
    }
    update_post_meta($post_id, '_visibility_hidden_key', esc_attr($hidden));
    $featured = $_POST['polivoz_visibility_field_featured'];
    update_post_meta($post_id, '_visibility_featured_key', esc_attr($featured));
}

/* ----------------------------------------------------------------------------/
  /*--------------------------Polivoz Nota Musical METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_nota_musical_callback($post) {
    wp_nonce_field('polivoz_save_nota_musical_data', 'polivoz_nota_musical_nonce');
    $value = sanitize_nota_musical(get_post_meta($post->ID, '_nota_musical_key', true));
    echo '<p><input type="text" id="polivoz_nota_musical_field" pattern="[a-zA-Z]*||[0]{1}" data-postid="'.$post->ID.'" name="polivoz_nota_musical_field" value="'.$value.'" maxlength="2" size="4"/>';
    echo '<span class="nota-musical">'.calculate_nota_musical($post->ID, $value).'</span></p>';
    echo '<p><a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-nota-musical" target="_blank"">Aprenda mais sobre notas musicais</a></p>';
}

function polivoz_save_nota_musical_data($post_id) {
    if (!isset($_POST['polivoz_nota_musical_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_nota_musical_nonce'], 'polivoz_save_nota_musical_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_nota_musical_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_nota_musical_field'];
    update_post_meta($post_id, '_nota_musical_key', sanitize_nota_musical($my_data));
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Visibility METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_visibility_callback($post) {
    wp_nonce_field('polivoz_save_visibility_data', 'polivoz_visibility_nonce');
    $hidden = esc_attr(get_post_meta($post->ID, '_visibility_hidden_key', true));
    $featured = esc_attr(get_post_meta($post->ID, '_visibility_featured_key', true));
    $data = get_post_meta($post->ID, '_visibility_data_key', true);
    echo '<ul class="form-no-clear">';
    echo '<li><input type ="checkbox" id="polivoz_visibility_field_hidden" name="polivoz_visibility_field_hidden" value="checked"'.(($hidden == 'checked') ? 'checked':'').'>Oculto</input></li>';
    echo '<li><input type ="checkbox" id="polivoz_visibility_field_featured" name="polivoz_visibility_field_featured" value="checked"'.(($featured == 'checked') ? 'checked':'').'>Destacado</input></li>';
    echo '</ul>';
    echo '<div id="featured-atributes" '.($featured!='checked'?'class="hidden"':'').'>';
        echo '<h4>Subtítulo</h4>';
        echo '<textarea type="text" rows="2" id="polivoz_subtitle_field" name="polivoz_visibility_field_data[subtitle]" maxlength="140" class="widefat">' . esc_attr($data['subtitle']) . '</textarea>';
        $subtitle_len = ((141 - strlen(esc_attr($data['subtitle'])))<=0)?0:(141 - strlen(esc_attr($data['subtitle'])));
        echo '<p>Caracteres restantes: <span id="count-character">'.$subtitle_len.'</span>.</p><p>Subtítulos são curtas descrições com uma única linha com até 140 caracteres.';
        echo '<a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-subtitulo" target="_blank""> Aprenda mais sobre subtitulos</a></p>';
        echo '<h4>Link alternativo</h4>';
        echo '<input type="text" id="polivoz_visibility_field_permanlink" name="polivoz_visibility_field_data[permanlink]" value="' . esc_attr($data['permanlink']) . '" class="widefat"/>';
        echo '<p>Não é necessário digitar o endereço do site. Ex: Se a url completa do post for <code>www.meusite.com/blog/descrevendo-item</code> digite apenas <code>blog/descrevendo-item</code>. Caso não queira um link alternativo deixe em vazio. <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-featured-post" target="_blank"">Aprenda mais sobre posts destacados</a></p>';
    echo '</div>';
}

function polivoz_save_visibility_data($post_id) {
    if (!isset($_POST['polivoz_visibility_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_visibility_nonce'], 'polivoz_save_visibility_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['polivoz_visibility_field_hidden'])) {
        $hidden = $_POST['polivoz_visibility_field_hidden'];
    }else{
        $hidden = 'false';
    }
    if($hidden!='checked'){
        $hidden = 'false';
    }
    update_post_meta($post_id, '_visibility_hidden_key', esc_attr($hidden));
    $featured = $_POST['polivoz_visibility_field_featured'];
    update_post_meta($post_id, '_visibility_featured_key', esc_attr($featured));
    if (isset($_POST['polivoz_visibility_field_data'])) {
        $data = $_POST['polivoz_visibility_field_data'];
        update_post_meta($post_id, '_visibility_data_key', $data);
    }
}

/* ----------------------------------------------------------------------------/
  /*--------------------------Polivoz Subtitle METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_subtitle_callback($post) {
    wp_nonce_field('polivoz_save_subtitle_data', 'polivoz_subtitle_nonce');
    $value = get_the_excerpt();
    echo '<textarea type="text" rows="2" id="polivoz_subtitle_field" name="polivoz_subtitle_field" maxlength="140" class="widefat">'.$value.'</textarea>';
    $subtitle_len = ((141 - strlen($value))<=0)?0:(141 - strlen($value));
    echo '<p>Caracteres restantes: <span id="count-character">'.$subtitle_len.'</span>.</p><p>Subtítulos são curtas descrições com uma única linha com até 140 caracteres.';
    echo '<a href="' . menu_page_url('polivoz-admin-page', false).'#polivoz-guide-subtitulo" target="_blank""> Aprenda mais sobre subtitulos</a></p>';
}

function polivoz_save_subtitle_data($post_id) {
    if (!isset($_POST['polivoz_subtitle_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_subtitle_nonce'], 'polivoz_save_subtitle_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_subtitle_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_subtitle_field'];
    $post_array = array(
        'ID' => $post_id,
        'post_excerpt' => $my_data);
    remove_action('save_post', 'polivoz_save_subtitle_data');
    wp_update_post($post_array);
    add_action('save_post', 'polivoz_save_subtitle_data');
}


/* ----------------------------------------------------------------------------/
  /*--------------------------Polivoz Subtitle Alt METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_subtitle_alt_callback($post) {
    wp_nonce_field('polivoz_save_subtitle_alt_data', 'polivoz_subtitle_alt_nonce');
    $value = sanitize_text_field(get_post_meta($post->ID, '_subtitle_alt_key', true));
    echo '<textarea type="text" rows="2" id="polivoz_subtitle_field" name="polivoz_subtitle_alt_field" maxlength="140" class="widefat">'.$value.'</textarea>';
    $subtitle_len = ((141 - strlen(($value))<=0)?0:(141 - strlen($value)));
    echo '<p>Caracteres restantes: <span id="count-character">'.$subtitle_len.'</span>.</p><p>Subtítulos são curtas descrições com uma única linha com até 140 caracteres.';
    echo '<a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-subtitulo" target="_blank""> Aprenda mais sobre subtitulos</a></p>';
}

function polivoz_save_subtitle_alt_data($post_id) {
    if (!isset($_POST['polivoz_subtitle_alt_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_subtitle_alt_nonce'], 'polivoz_save_subtitle_alt_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_subtitle_alt_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_subtitle_alt_field'];
    update_post_meta($post_id, '_subtitle_alt_key', sanitize_text_field($my_data));
}

/* ----------------------------------------------------------------------------/
  /*--------------------------Polivoz Home Priority METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_home_priority_callback($post) {
    wp_nonce_field('polivoz_save_home_priority_data', 'polivoz_home_priority_nonce');
    $value = sanitize_text_field(get_post_meta($post->ID, '_home_priority_key', true));
    if (empty($value)) {
        $value = wp_count_posts('homepolivoz')->publish + 1;
        if ($value > 9) {
            $value = 9;
        }
    }
    echo '<input type="number" min="1" max="9" id="polivoz_home_priority_field" name="polivoz_home_priority_field" value="'.$value.'"/>';
    echo '<p><a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-home-priority" target="_blank"">Aprenda mais sobre prioridade de páginas e seções</a></p>';
}

function polivoz_save_home_priority_data($post_id) {
    if (!isset($_POST['polivoz_home_priority_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_home_priority_nonce'], 'polivoz_save_home_priority_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_home_priority_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_home_priority_field'];
    if ($my_data == "") {
        return;
    }
    update_post_meta($post_id, '_home_priority_key', sanitize_text_field($my_data));
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Home Type METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_home_type_callback($post) {
    wp_nonce_field('polivoz_save_home_type_data', 'polivoz_home_type_nonce');
    $value = esc_attr(get_post_meta($post->ID, '_home_type_key', true));
    $list_values = array('content' => 'Normal', 'gallery' => 'Galeria', 'contact' => 'Contato', 'event' => 'Evento', 'columns' => 'Colunas');
    if (empty($value))
        $value = 'content';
    echo '<ul class="form-no-clear">';
    foreach ($list_values as $key => $name) {
        echo '<li><label><input type="radio" class="home-type-radio" id="polivoz_home_type_field_'.$key.'" name="polivoz_home_type_field" value="'.$key.'"'.(($key == $value)?'checked':'').'></input>' . $name . '</label></li>';
    }
    echo '</ul>';
    echo '<p>Ver mais em Guia.</p>';
}

function polivoz_save_home_type_data($post_id) {
    if (!isset($_POST['polivoz_home_type_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_home_type_nonce'], 'polivoz_save_home_type_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $my_data = $_POST['polivoz_home_type_field'];
    update_post_meta($post_id, '_home_type_key', esc_attr($my_data));
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------2 Colunas METABOX----------------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_home_columns_callback($post) {
    wp_nonce_field('polivoz_save_home_columns_data', 'polivoz_home_columns_nonce');
    $value = esc_attr(get_post_meta($post->ID, '_home_columns_key', true));
    echo '<textarea rows="4" class="widefat" id="polivoz_home_columns_field" name="polivoz_home_columns_field">'.$value.'</textarea>';
    echo '<p>Este campo deve ser escrito em HTML.</p>';
}

function polivoz_save_home_columns_data($post_id) {
    if (!isset($_POST['polivoz_home_columns_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_home_columns_nonce'], 'polivoz_save_home_columns_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_home_columns_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_home_columns_field'];
    update_post_meta($post_id, '_home_columns_key', esc_attr($my_data));
}

/* ----------------------------------------------------------------------------/
/*-----------------------------Formulário Shortcode METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_home_form_shortcode_callback($post) {
    wp_nonce_field('polivoz_save_home_form_shortcode_data', 'polivoz_home_form_shortcode_nonce');
    $value = esc_attr(get_post_meta($post->ID, '_home_form_shortcode_key', true));
    echo '<input type="text" id="polivoz_home_form_shortcode_field" name="polivoz_home_form_shortcode_field" value="'.$value.'" class="widefat"/>';
    echo '<p>Shortcode são pequenos códigos que criam formulários e outras ações. Estes códigos podem ser utilizados com a instalações de plugins de formulários. <code>Ex: [contact-form-7 id="335" title="Formulário"]</code> <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-home-type" target="_blank"">Aprenda mais sobre shortcode de formulários</a></p>';
}

function polivoz_save_home_form_shortcode_data($post_id) {
    if (!isset($_POST['polivoz_home_form_shortcode_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_home_form_shortcode_nonce'], 'polivoz_save_home_form_shortcode_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_home_form_shortcode_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_home_form_shortcode_field'];
    update_post_meta($post_id, '_home_form_shortcode_key', $my_data);
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Home Contact METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_home_contact_callback($post) {
    wp_nonce_field('polivoz_save_home_contact_data', 'polivoz_home_contact_nonce');
    $value = get_post_meta($post->ID, '_home_contact_key', true);
    $list_values = array(
        'name' => 'Nome da pessoa para contato',
        'email' => 'E-mail para contato',
        'mobile' => 'Telefone celular para contato',
        'phone' => 'Telefone fixo para contato',
        'email' => 'E-mail para contato',
        'address' => 'Endereço');
    echo '<p>Adicione os dados para contato que vai aparecer na página inicial na seção de contatos. Caso queira que um item não apareça deixe em branco.</p>';
    echo '<ul class="form-no-clear">';
    foreach ($list_values as $key => $name) {
        echo '<li><label>'.$name.'</li><li><input type ="text" id="polivoz_home_contact_field_'.$key.'" name="polivoz_home_contact_field['.$key.']" value="'.esc_attr($value[$key]).'" class="widefat"/></label></li>';
    }
    echo '</ul>';
}

function polivoz_save_home_contact_data($post_id) {
    if (!isset($_POST['polivoz_home_contact_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_home_contact_nonce'], 'polivoz_save_home_contact_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $my_data = $_POST['polivoz_home_contact_field'];
    update_post_meta($post_id, '_home_contact_key', $my_data);
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Home Social METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_home_social_callback($post) {
    wp_nonce_field('polivoz_save_home_social_data', 'polivoz_home_social_nonce');
    $value = get_post_meta($post->ID, '_home_social_key', true);
    $list_values = array('facebook' => 'URL da página do Facebook',
        'instagram' => 'URL do perfil no Instagram',
        'twitter' => 'URL do perfil no Twitter',
        'youtube' => 'URL do canal no Youtube',
        'soundcloud' => 'URL do perfil no SoundCloud');
    echo '<p>Adicione os dados das mídias sociais que vai aparecer na página inicial na seção de contatos. Os endereços não devem incluir o <code>http://</code>. Ex: <code>www.facebook.com/minha_pagina</code>. Caso queira que um item não apareça deixe em branco.</p>';
    echo '<ul class="form-no-clear">';
    foreach ($list_values as $key => $name) {
        echo '<li><label>' . $name . '</li><li><input type ="text" id="polivoz_home_social_field_'.$key.'" name="'.polivoz_home_social_field.'['.$key.']" value="'.sanitize_polivoz_url($value[$key]).'" class="widefat"/></label></li>';
    }
    echo '</ul>';
}

function sanitize_polivoz_url($input){
    $output = esc_url($input);
    $output = str_replace(array('http://','https://'), '', $output);
    return $output;
}

function polivoz_save_home_social_data($post_id) {
    if (!isset($_POST['polivoz_home_social_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_home_social_nonce'], 'polivoz_save_home_social_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $my_data = $_POST['polivoz_home_social_field'];
    foreach ($my_data as $key => $url){
        $my_data[$key]=sanitize_polivoz_url($url);
    }
    update_post_meta($post_id, '_home_social_key', $my_data);
}


/* ----------------------------------------------------------------------------/
/*-----------------------------Link Alternativo--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_alt_permanlink_callback($post) {
    wp_nonce_field('polivoz_save_alt_permanlink_data', 'polivoz_alt_permanlink_nonce');
    $value = sanitize_text_field(get_post_meta($post->ID, '_alt_permanlink_key', true));
    echo '<input type="text" id="polivoz_alt_permanlink_field" name="polivoz_alt_permanlink_field" value="'.$value.'" class="widefat"/>';
    echo '<p>Digite aqui APENAS o final da URL de um post que descreve este item. Ex: Se a url completa do post for <code>www.meusite.com/blog/descrevendo-item</code> digite apenas <code>descrevendo-item</code>. Caso não exista um post deixe em vazio. <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-alt-url" target="_blank"">Aprenda mais sobre URL alternativas</a></p>';
}

function polivoz_save_alt_permanlink_data($post_id) {
    if (!isset($_POST['polivoz_alt_permanlink_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_alt_permanlink_nonce'], 'polivoz_save_alt_permanlink_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_alt_permanlink_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_alt_permanlink_field'];
    update_post_meta($post_id, '_alt_permanlink_key', sanitize_text_field($my_data));
}

/* ----------------------------------------------------------------------------/
/*-----------------------------Link Alternativo--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_show_menu_callback($post) {
    wp_nonce_field('polivoz_save_show_menu_data', 'polivoz_show_menu_nonce');
    $value = esc_attr(get_post_meta($post->ID, '_show_menu_key', true));
    if (empty($value)){
        $value = "yes";
    }
    echo '<ul><li><input type="radio" id="polivoz_show_menu_field_yes" name="polivoz_show_menu_field" '. (($value == "yes") ? 'checked' : '') .' value="yes">Sim</input></li>';
    echo '<li><input type="radio" id="polivoz_show_menu_field_no" name="polivoz_show_menu_field" '. (($value == "no") ? 'checked' : '') .' value="no">Não</input></li>';
    echo '<p>Quer mostrar este item no menu? (Caso não queria deixe desmarcado) <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-menu" target="_blank"">Aprenda mais sobre menu e homepage</a></p>';
}

function polivoz_save_show_menu_data($post_id) {
    if (!isset($_POST['polivoz_show_menu_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_show_menu_nonce'], 'polivoz_save_show_menu_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_show_menu_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_show_menu_field'];
    update_post_meta($post_id, '_show_menu_key', esc_attr($my_data));
}

/* ----------------------------------------------------------------------------/
  /*----------------------------- Endereço METABOX------------------------------ */
/* ---------------------------------------------------------------------------- */

function polivoz_location_address_callback($post) {
    wp_nonce_field('polivoz_save_location_address_data', 'polivoz_location_address_nonce');
    $value = get_post_meta($post->ID, '_location_address_key', true);
    $address_fields = array(
        'country' => 'País',
        'city' => 'Cidade',
        'province' => 'Estado',
        'neighborhood' => 'Bairro',
        'cep' => 'CEP',
        'street' => 'Logadouro',
        'number' => 'Número',
        'other' => 'Complemento');
    $address_fields_class = array(
        'country' => 'all-options',
        'city' => 'all-options',
        'province' => 'all-options',
        'cep' => '',
        'neighborhood' => 'all-options',
        'street' => 'large-text',
        'number' => 'small-text',
        'other' => 'regular-text');
    $address_default_fields = array(
        'city' => 'Salvador',
        'province' => 'Bahia',
        'country' => 'Brasil');
    $adress_fields_desc = array(
        'cep' => ' Ex: <code>45780-200</code>',
        'street' => 'Ex: <code>Avenida da Conceição</code>',
        'number' => ' Exs: <code>113</code> <code>20a</code>',
        'neighborhood' => 'Ex: <code>Federação</code>',
        'other' => 'Ex: <code>Apartamento 114</code>'
    );
    foreach ($address_default_fields as $key => $default_value) {
        $value[$key] = empty($value[$key]) ? $default_value : $value[$key];
    }
    echo '<p>Preencha os campos de endereço do local. <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-local" target="_blank"">Aprenda mais sobre locais e eventos</a></p>';
    echo '<table class="form-table"><tbody>';
    foreach ($address_fields as $key => $name) {
        echo '<tr>
                <td><label for="polivoz_location_address_field_'.$key.'"><b>'.$name.'</b></label></td>
                <td><input type="text" id="polivoz_location_address_field_'.$key.'" name="polivoz_location_address_field[' . $key . ']" value="'.sanitize_text_field($value[$key]).'"" class="address_field_input '.$address_fields_class[$key].'">';
        if (!empty($address_default_fields[$key])) {
            echo ' <span class="description">Padrão: <code>' . $address_default_fields[$key] . '</code></span>';
        }
        if (!empty($adress_fields_desc[$key])) {
            echo '<span class="description">' . $adress_fields_desc[$key] . '</span>';
        }
        echo '</td></tr>';
    }
    echo '</tbody></table>';
}

function polivoz_save_location_address_data($post_id) {
    if (!isset($_POST['polivoz_location_address_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_location_address_nonce'], 'polivoz_save_location_address_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_location_address_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_location_address_field'];
    update_post_meta($post_id, '_location_address_key', $my_data);
}

/* ----------------------------------------------------------------------------/
  /*--------------------------Polivoz Mapa METABOX----------------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_location_map_callback($post) {
    wp_nonce_field('polivoz_save_location_map_data', 'polivoz_location_map_nonce');
    $value = esc_url(get_post_meta($post->ID, '_location_map_key', true));
    echo '<textarea rows="2" class="widefat" id="polivoz_location_map_field" name="polivoz_location_map_field" required>'.$value.'</textarea>';
    echo '<table><tr>';
    echo '<td><input type="button" class="button button-secondary" id="create_map_link" value="Gerar a url do mapa"/></td>';
    echo '<td><input type="button" class="button button-primary" id="go_to_link" value="Ir para o mapa"/></td></tr></table>';
    echo '<p>Neste local escreva a url do local no google maps.</p>';
}

function polivoz_save_location_map_data($post_id) {
    if (!isset($_POST['polivoz_location_map_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_location_map_nonce'], 'polivoz_save_location_map_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_location_map_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_location_map_field'];

    update_post_meta($post_id, '_location_map_key', esc_url($my_data));
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Event Date METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_event_date_callback($post) {
    wp_nonce_field('polivoz_save_event_date_data', 'polivoz_event_date_nonce');
    $value = get_post_meta($post->ID, '_event_date_key', true);
    $timestamp = esc_attr(get_post_meta($post->ID, '_event_timestamp_key', true));
    echo '<p>Preencha os campos data e horário do evento. <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-local" target="_blank"">Aprenda mais sobre locais e eventos</a></p>';
    echo '<table class="form-table"><tbody>';
    echo '<tr>
            <td><b>Data</b></td>
            <td>
            <label for="polivoz_event_date_field_from_date">De </label>
            <input type="text" id="polivoz_event_date_field_from_date" name="polivoz_event_date_field[from_date]" required value="'.sanitize_text_field($value['from_date']).'"" class="event_input_date event_input_date_time">
            <label for="polivoz_event_date_field_to_date"> até </label>
            <input type="text" id="polivoz_event_date_field_to_date" name="polivoz_event_date_field[to_date]" value="'.sanitize_text_field($value['to_date']).'"" class="event_input_date event_input_date_time">
            </td>
        </tr>';
    if(empty($value['from_time'])){
        $value['from_time'] = '07:00';
    }
    if(empty($value['to_time'])){
        $value['to_time'] = '22:00';
    }
    $from_time = explode(":", $value['from_time']);
    $to_time = explode(":", $value['to_time']);
    echo '<tr>
            <td><b>Horário</b></td>
            <td>
            <label for="from_time_hour">De</label>
            <select class="from_time select_time" id="from_time_hour">' . polivoz_interval(1, 23, $from_time[0]) . '</select>
            <label for="from_time_minute">:</label>
            <select class="from_time select_time" id="from_time_minute">' . polivoz_interval(1, 59, $from_time[1]) . '</select>
            <input type="hidden" id="polivoz_event_date_field_from_time" name="polivoz_event_date_field[from_time]" value="' . $value['from_time'] . '"/>
            <label for="to_time_hour"> até </label>
            <select class="to_time select_time" id="to_time_hour">' . polivoz_interval(1, 23, $to_time[0]) . '</select>
            <label for="to_time_minute">:</label>
            <select class="to_time select_time" id="to_time_minute">' . polivoz_interval(1, 59, $to_time[1]) . '</select></label>
            <input type="hidden" id="polivoz_event_date_field_to_time" name="polivoz_event_date_field[to_time]" value="' . $value['to_time'] . '"/>
            <label>&nbsp;
            <input type="checkbox" id="polivoz_event_date_field_all_day" value="allday"' . (($value['all_day'] == "allday") ? 'checked' : '') . ' name="polivoz_event_date_field[all_day]">Dia todo</input></label>
            </td>
        </tr>';
    echo '<input type="hidden" id="data_event_date_field_timestamp" name="polivoz_event_date_field_timestamp" value="' . $timestamp . '"/>';
    echo '</tbody></table>';
}

function polivoz_save_event_date_data($post_id) {
    if (!isset($_POST['polivoz_event_date_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_event_date_nonce'], 'polivoz_save_event_date_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_event_date_field']) || !isset($_POST['polivoz_event_date_field_timestamp'])) {
        return;
    }
    $my_data = $_POST['polivoz_event_date_field'];
    $time_stamp = $_POST['polivoz_event_date_field_timestamp'];
    update_post_meta($post_id, '_event_date_key', $my_data);
    update_post_meta($post_id, '_event_timestamp_key', esc_attr($time_stamp));
}

/* ----------------------------------------------------------------------------/
  /*-----------------------------Polivoz Event Location METABOX--------------------- */
/* ---------------------------------------------------------------------------- */

function polivoz_event_location_callback($post) {
    wp_nonce_field('polivoz_save_event_location_data', 'polivoz_event_location_nonce');
    $value = esc_attr(get_post_meta($post->ID, '_event_location_key', true));
    echo '<p>Preencha os campos data e horário do evento. <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-local" target="_blank">Aprenda mais sobre locais e eventos</a></p>';
    $local_data = load_locals();
    echo '<table class="form-table"><tbody>';
    if (count($local_data) > 0) {
        echo '<td><b>Local</b></td>';
        echo '<td><select id="polivoz_event_location_field" name="polivoz_event_location_field">';
        foreach ($local_data as $local_ID) {
            //<option value = "'.$val.'"'.(($select == $i)?'selected':'').'>'.$val.'</option>'
            echo '<option value="' . $local_ID . '" ' . (($value == $local_ID) ? 'selected' : '') . '>' . get_the_title($local_ID) . '</option>';
        }
        echo '</select></td>';
        foreach ($local_data as $local_ID) {
            echo '<input type="hidden" id="address-' . $local_ID . '" value="' . polivoz_address($local_ID) . '"/>';
        }
        echo '<tr><td><b>Endereço</b></td><td id="current-address">' . polivoz_address($value) . '</tr>';
    } else {
        echo '<tr><td>Não existem locais no momento :( Tente adicionar alguns :)</td></tr>';
    }
    echo '</tbody></table>';
    echo '<table><tr>';
    echo '<td><a class="button button-secondary" target="_blank" href="' . admin_url('post-new.php?post_type=local', false) . '">Adicionar local</a></td>';
    echo '<td><a class="button button-primary" target="_blank" href="' . admin_url('edit.php?post_type=local', false) . '">Editar locais</a></td></tr></table>';
}

function polivoz_save_event_location_data($post_id) {
    if (!isset($_POST['polivoz_event_location_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['polivoz_event_location_nonce'], 'polivoz_save_event_location_data')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['polivoz_event_location_field'])) {
        return;
    }
    $my_data = $_POST['polivoz_event_location_field'];
    update_post_meta($post_id, '_event_location_key', esc_attr($my_data));
}