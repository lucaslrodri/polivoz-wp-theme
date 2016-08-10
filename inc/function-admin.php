<?php

/*=============================================================================
                                  ADMIN PAGE
=============================================================================*/

function polivoz_add_admin_page(){
    //Generate Sunset Admin Page
    add_menu_page('Menu do Tema Polivoz','Tema Polivoz','manage_options','polivoz-admin-page','polivoz_create_page','dashicons-format-audio',60);
    //Guia
    add_submenu_page('polivoz-admin-page', 'Guia do Tema Polivoz', 'Guia', 'manage_options', 'polivoz-admin-page', 'polivoz_create_page');
    //Config
    add_submenu_page('polivoz-admin-page', 'Configurações adicionais do Tema Polivoz', 'Configurações', 'manage_options', 'polivoz-config-section', 'polivoz_config_section_page');
    //Activate custom settings
    add_action('admin_init','polivoz_custom_settings');
}
add_action('admin_menu','polivoz_add_admin_page');

function polivoz_custom_settings(){
     //================================================================//
    //                           TEMPLATES                            //
    //================================================================//
    //Registrando os dados
    //Galeria
    register_setting('polivoz-config-section-group', 'polivoz_template_galeria_header','esc_url');
    register_setting('polivoz-config-section-group', 'polivoz_template_galeria_name','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_galeria_name_plural','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_galeria_single_header');
    register_setting('polivoz-config-section-group', 'polivoz_template_galeria_nota_musical','sanitize_nota_musical');
    register_setting('polivoz-config-section-group', 'polivoz_template_galeria_menu');
    //Locais
    register_setting('polivoz-config-section-group', 'polivoz_template_local_header','esc_url');
    register_setting('polivoz-config-section-group', 'polivoz_template_local_name','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_local_name_plural','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_local_nota_musical','sanitize_nota_musical');
    register_setting('polivoz-config-section-group', 'polivoz_template_local_menu','sanitize_text_field');
    //Eventos
    register_setting('polivoz-config-section-group', 'polivoz_template_evento_header','esc_url');
    register_setting('polivoz-config-section-group', 'polivoz_template_evento_name','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_evento_name_plural','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_evento_nota_musical','sanitize_nota_musical');
    register_setting('polivoz-config-section-group', 'polivoz_template_evento_menu');
    //Músicas
    register_setting('polivoz-config-section-group', 'polivoz_template_musica_header','esc_url');
    register_setting('polivoz-config-section-group', 'polivoz_template_musica_name','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_musica_name_plural','sanitize_text_field');
    register_setting('polivoz-config-section-group', 'polivoz_template_musica_nota_musical','sanitize_nota_musical');
    register_setting('polivoz-config-section-group', 'polivoz_template_musica_menu');
    //Adicionando a seção
    add_settings_section('polivoz-template-options', 'Configurações adicionais da Seção de Galeria', 'polivoz_slug_options', 'polivoz-config-section');
    add_settings_section('polivoz-local-options', 'Configurações adicionais da Seção de Locais', 'polivoz_local_options', 'polivoz-config-section');
    add_settings_section('polivoz-evento-options', 'Configurações adicionais da Seção de Eventos', 'polivoz_evento_options', 'polivoz-config-section');
    add_settings_section('polivoz-musica-options', 'Configurações adicionais da Seção de Músicas', 'polivoz_musica_options', 'polivoz-config-section');
    //Adicionando os locais dos dados
    //Galeria
    add_settings_field('polivoz-template-galeria-name', 'Título da Seção Galeria', 'polivoz_template_galeria_name', 'polivoz-config-section', 'polivoz-template-options');
    add_settings_field('polivoz-template-galeria-name-plural', 'Nome para o plural de Galeria', 'polivoz_template_galeria_name_plural', 'polivoz-config-section', 'polivoz-template-options');
    add_settings_field('polivoz-template-galeria-header', 'Imagem destacada para a Seção Galeria', 'polivoz_template_galeria_header', 'polivoz-config-section', 'polivoz-template-options');
    add_settings_field('polivoz-template-galeria-nota-musical', 'Nota musical', 'polivoz_template_galeria_nota_musical', 'polivoz-config-section', 'polivoz-template-options');
    add_settings_field('polivoz-template-galeria-menu', 'Mostrar no menu?', 'polivoz_template_galeria_menu', 'polivoz-config-section', 'polivoz-template-options');
    add_settings_field('polivoz-template-galeria-options', 'Outras opções', 'polivoz_template_galeria_options', 'polivoz-config-section', 'polivoz-template-options');
    //Locais
    add_settings_field('polivoz-template-local-name', 'Título da Seção de Locais', 'polivoz_template_local_name', 'polivoz-config-section', 'polivoz-local-options');
    add_settings_field('polivoz-template-local-name-plural', 'Nome para o plural de Local', 'polivoz_template_local_name_plural', 'polivoz-config-section', 'polivoz-local-options');
    add_settings_field('polivoz-template-local-header', 'Imagem destacada para a Seção de Locais', 'polivoz_template_local_header', 'polivoz-config-section', 'polivoz-local-options');
    add_settings_field('polivoz-template-local-nota-musical', 'Nota musical', 'polivoz_template_local_nota_musical', 'polivoz-config-section', 'polivoz-local-options');
    add_settings_field('polivoz-template-local-menu', 'Mostrar no menu?', 'polivoz_template_local_menu', 'polivoz-config-section', 'polivoz-local-options');
    //Evento
    add_settings_field('polivoz-template-evento-name', 'Título da Seção de Eventos', 'polivoz_template_evento_name', 'polivoz-config-section', 'polivoz-evento-options');
    add_settings_field('polivoz-template-evento-name-plural', 'Nome para o plural de Evento', 'polivoz_template_evento_name_plural', 'polivoz-config-section', 'polivoz-evento-options');
    add_settings_field('polivoz-template-evento-header', 'Imagem destacada para a Seção de Eventos', 'polivoz_template_evento_header', 'polivoz-config-section', 'polivoz-evento-options');
    add_settings_field('polivoz-template-evento-nota-musical', 'Nota musical', 'polivoz_template_evento_nota_musical', 'polivoz-config-section', 'polivoz-evento-options');
    add_settings_field('polivoz-template-evento-menu', 'Mostrar no menu?', 'polivoz_template_evento_menu', 'polivoz-config-section', 'polivoz-evento-options');
   //Musica
    add_settings_field('polivoz-template-musica-name', 'Título da Seção de Músicas', 'polivoz_template_musica_name', 'polivoz-config-section', 'polivoz-musica-options');
    add_settings_field('polivoz-template-musica-name-plural', 'Nome para o plural de Música', 'polivoz_template_musica_name_plural', 'polivoz-config-section', 'polivoz-musica-options');
    add_settings_field('polivoz-template-musica-header', 'Imagem destacada para a Seção de Músicas', 'polivoz_template_musica_header', 'polivoz-config-section', 'polivoz-musica-options');
    add_settings_field('polivoz-template-musica-nota-musical', 'Nota musical', 'polivoz_template_musica_nota_musical', 'polivoz-config-section', 'polivoz-musica-options');
    add_settings_field('polivoz-template-musica-menu', 'Mostrar no menu?', 'polivoz_template_musica_menu', 'polivoz-config-section', 'polivoz-musica-options');
}

    //================================================================//
    //                     Criando Template                           //
    //================================================================//

function polivoz_create_page(){
    require_once(get_template_directory().'/inc/templates/guia-template.php' );
}

function polivoz_config_section_page(){
    require_once(get_template_directory().'/inc/templates/polivoz-config-section-template.php' );
}


    //================================================================//
    //                       Criando Seções                           //
    //================================================================//

function polivoz_slug_options(){
    echo '<p>Abaixo está disponível as configurações adicionais para customização da página de busca da seção galeria e das galerias em geral.</p>';
}

function polivoz_local_options(){
    echo '<p>Abaixo está disponível as configurações adicionais para customização da página de locais e dos locais em geral.</p>';
}

function polivoz_evento_options(){
    echo '<p>Abaixo está disponível as configurações adicionais para customização da página de eventos e dos eventos em geral.</p>';
}

function polivoz_musica_options(){
    echo '<p>Abaixo está disponível as configurações adicionais para customização da página de músicas e das músicas em geral.</p>';
}

    //================================================================//
    //                       Criando Campos                           //
    //================================================================//

//Templates

function polivoz_template_galeria_name(){
    $title_galeria = sanitize_text_field(get_option('polivoz_template_galeria_name'));
    if (empty($title_galeria)){$title_galeria ='Galeria';}
    echo '<input type="text" name="polivoz_template_galeria_name" size="60" value="'.$title_galeria.'" placeholder="Digite o nome da seção Galeria."/><p>  Caso deixe em branco o nome será definido como Galeria.</p>';
}

function polivoz_template_galeria_name_plural(){
    $name_galeria = sanitize_text_field(get_option('polivoz_template_galeria_name_plural'));
    if (empty($name_galeria)){$name_galeria ='Galerias';}
    echo '<input type="text" name="polivoz_template_galeria_name_plural" size="60" value="'.$name_galeria.'" placeholder="Digite o nome para o plural de Galeria."/><p>  Caso deixe em branco o nome será definido como Galerias.</p>';
}

function polivoz_template_galeria_header(){
    $galeria_header = esc_url(get_option('polivoz_template_galeria_header'));
    $galeria_item_selected_display = empty($galeria_header) ? 'hidden' : '';
    $galeria_item_not_select_display = empty($galeria_header) ? '' : 'hidden';
    $galeria_select_text = empty($galeria_header)? 'Selecionar': 'Trocar a';
    echo '<div class="card">';
    echo '<p class="galeria-header-not-selected'.$galeria_item_not_select_display.'">Selecione a imagem destacada da Seção Galeria. Imagem destacada é uma imagem que ficará no cabeçalho da seção com efeito de paralaxe.</p>';
    echo '<div class="img-header-container"><div id="header-galeria-image" class="galeria-header-selected featured-image'.$galeria_item_selected_display.'" style="background-image: url('.$galeria_header.')"></div></div>';
    echo '<input type="button" class="button button-primary galeria-header-selected'.$galeria_item_selected_display.'" id="upload-galeria-remove" value="Remover a imagem"/> ';
    echo '<input id="galeria_header_url" type="hidden" name="polivoz_template_galeria_header" value="'.$galeria_header.'"/>';
    echo '<input type="button" class="button button-secondary" id="upload-galeria-header" value="'.$galeria_select_text.' imagem"/> ';
    echo '</div>';
}

function polivoz_template_galeria_options(){
    $single_header_galeria = sanitize_text_field(get_option('polivoz_template_galeria_single_header'));
    echo '<input type="checkbox" name="polivoz_template_galeria_single_header" value="checked"'.$single_header_galeria.'>Adicionar uma imagem em paralaxe no topo de cada galeria<br>';
 }
 
 function polivoz_template_galeria_nota_musical(){
    $value = sanitize_text_field(get_option('polivoz_template_galeria_nota_musical'));
    if(empty($value)){$value = 'p';}
    echo '<div class="card">';
    echo '<p><input type="text" id="polivoz_template_galeria_nota_musical" class="polivoz_nota_musical_field" pattern="[a-zA-Z]*||[0]{1}" data-postid="' . 15 . '" name="polivoz_template_galeria_nota_musical" value="'.$value.'" maxlength="2" size="4"/>';
    echo '<span class="nota-musical">'.$value.'</span></p>';
    echo '<p><a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-nota-musical" target="_blank"">Aprenda mais sobre notas musicais</a></p>';
    echo '</div>';
 }
 
function polivoz_template_galeria_menu(){
    $value = sanitize_text_field(get_option('polivoz_template_galeria_menu'));
    if(empty($value)){$value = 'yes';}
    echo '<div class="card">';
    echo '<ul><li><input type="radio" name="polivoz_template_galeria_menu" '. (($value == "yes") ? 'checked' : '') .' value="yes">Sim</input></li>';
    echo '<li><input type="radio" name="polivoz_template_galeria_menu" '. (($value == "no") ? 'checked' : '') .' value="no">Não</input></li>';
    echo '<p>Quer mostrar este item no menu? (Caso não queria deixe desmarcado) <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-menu" target="_blank"">Aprenda mais sobre menu e homepage</a></p>';
    echo '</div>';
 }
 
 //Locais
 
 function polivoz_template_local_name(){
    $title_local = sanitize_text_field(get_option('polivoz_template_local_name'));
    if (empty($title_local)){$title_local ='Locais';}
    echo '<input type="text" name="polivoz_template_local_name" size="60" value="'.$title_local.'" placeholder="Digite o nome da seção de Locais."/><p>  Caso deixe em branco o nome será definido como Locais.</p>';
}

function polivoz_template_local_name_plural(){
    $name_local = sanitize_text_field(get_option('polivoz_template_local_name_plural'));
    if (empty($name_local)){$name_local ='Locais';}
    echo '<input type="text" name="polivoz_template_local_name_plural" size="60" value="'.$name_local.'" placeholder="Digite o nome para o plural de Local."/><p>  Caso deixe em branco o nome será definido como Locais.</p>';
}


function polivoz_template_local_header(){
    $local_header = esc_url(get_option('polivoz_template_local_header'));
    $local_item_selected_display = empty($local_header) ? 'hidden' : '';
    $local_item_not_select_display = empty($local_header) ? '' : 'hidden';
    $local_select_text = empty($local_header)? 'Selecionar': 'Trocar a';
    echo '<div class="card">';
    echo '<p class="local-header-not-selected'.$local_item_not_select_display.'">Selecione a imagem destacada da Seção de Locais. Imagem destacada é uma imagem que ficará no cabeçalho da seção com efeito de paralaxe.</p>';
    echo '<div class="img-header-container"><div id="header-local-image" class="local-header-selected featured-image'.$local_item_selected_display.'" style="background-image: url('.$local_header.')"></div></div>';
    echo '<input type="button" class="button button-primary local-header-selected'.$local_item_selected_display.'" id="upload-local-remove" value="Remover a imagem"/> ';
    echo '<input id="local_header_url" type="hidden" name="polivoz_template_local_header" value="'.$local_header.'"/>';
    echo '<input type="button" class="button button-secondary" id="upload-local-header" value="'.$local_select_text.' imagem"/> ';
    echo '</div>';
}

function polivoz_template_local_nota_musical(){
    $value = sanitize_text_field(get_option('polivoz_template_local_nota_musical'));
    if(empty($value)){$value = 'o';}
    echo '<div class="card">';
    echo '<p><input type="text" id="polivoz_template_local_nota_musical" class="polivoz_nota_musical_field" pattern="[a-zA-Z]*||[0]{1}" data-postid="' . 14 . '" name="polivoz_template_local_nota_musical" value="'.$value.'" maxlength="2" size="4"/>';
    echo '<span class="nota-musical">'.$value.'</span></p>';
    echo '<p><a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-nota-musical" target="_blank"">Aprenda mais sobre notas musicais</a></p>';
    echo '</div>';
 }
 
 function polivoz_template_local_menu(){
    $value = sanitize_text_field(get_option('polivoz_template_local_menu'));
    if(empty($value)){$value = 'yes';}
    echo '<div class="card">';
    echo '<ul><li><input type="radio" name="polivoz_template_local_menu" '. (($value == "yes") ? 'checked' : '') .' value="yes">Sim</input></li>';
    echo '<li><input type="radio" name="polivoz_template_local_menu" '. (($value == "no") ? 'checked' : '') .' value="no">Não</input></li>';
    echo '<p>Quer mostrar este item no menu? (Caso não queria deixe desmarcado) <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-menu" target="_blank"">Aprenda mais sobre menu e homepage</a></p>';
    echo '</div>';
 }

//Evento
 
 function polivoz_template_evento_name(){
    $title_evento = sanitize_text_field(get_option('polivoz_template_evento_name'));
    if (empty($title_evento)){$title_evento ='Eventos';}
    echo '<input type="text" name="polivoz_template_evento_name" size="60" value="'.$title_evento.'" placeholder="Digite o nome da seção de Eventos."/><p>  Caso deixe em branco o nome será definido como Eventos.</p>';
}

function polivoz_template_evento_name_plural(){
    $name_evento = sanitize_text_field(get_option('polivoz_template_evento_name_plural'));
    if (empty($name_evento)){$name_evento ='Eventos';}
    echo '<input type="text" name="polivoz_template_evento_name_plural" size="60" value="'.$name_evento.'" placeholder="Digite o nome para o plural de Evento."/><p>  Caso deixe em branco o nome será definido como Eventos.</p>';
}

function polivoz_template_evento_header(){
    $evento_header = esc_url(get_option('polivoz_template_evento_header'));
    $evento_item_selected_display = empty($evento_header) ? 'hidden' : '';
    $evento_item_not_select_display = empty($evento_header) ? '' : 'hidden';
    $evento_select_text = empty($evento_header)? 'Selecionar': 'Trocar a';
    echo '<div class="card">';
    echo '<p class="evento-header-not-selected'.$evento_item_not_select_display.'">Selecione a imagem destacada da Seção de Eventos. Imagem destacada é uma imagem que ficará no cabeçalho da seção com efeito de paralaxe.</p>';
    echo '<div class="img-header-container"><div id="header-evento-image" class="evento-header-selected featured-image'.$evento_item_selected_display.'" style="background-image: url('.$evento_header.')"></div></div>';
    echo '<input type="button" class="button button-primary evento-header-selected'.$evento_item_selected_display.'" id="upload-evento-remove" value="Remover a imagem"/> ';
    echo '<input id="evento_header_url" type="hidden" name="polivoz_template_evento_header" value="'.$evento_header.'"/>';
    echo '<input type="button" class="button button-secondary" id="upload-evento-header" value="'.$evento_select_text.' imagem"/> ';
    echo '</div>';
}

function polivoz_template_evento_nota_musical(){
    $value = sanitize_text_field(get_option('polivoz_template_evento_nota_musical'));
    if(empty($value)){$value = 'j';}
    echo '<div class="card">';
    echo '<p><input type="text" id="polivoz_template_evento_nota_musical" class="polivoz_nota_musical_field" pattern="[a-zA-Z]*||[0]{1}" data-postid="' . 9 . '" name="polivoz_template_evento_nota_musical" value="'.$value.'" maxlength="2" size="4"/>';
    echo '<span class="nota-musical">'.$value.'</span></p>';
    echo '<p><a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-nota-musical" target="_blank"">Aprenda mais sobre notas musicais</a></p>';
    echo '</div>';
 }

 
 
  function polivoz_template_evento_menu(){
    $value = sanitize_text_field(get_option('polivoz_template_evento_menu'));
    if(empty($value)){$value = 'yes';}
    echo '<div class="card">';
    echo '<ul><li><input type="radio" name="polivoz_template_evento_menu" '. (($value == "yes") ? 'checked' : '') .' value="yes">Sim</input></li>';
    echo '<li><input type="radio" name="polivoz_template_evento_menu" '. (($value == "no") ? 'checked' : '') .' value="no">Não</input></li>';
    echo '<p>Quer mostrar este item no menu? (Caso não queria deixe desmarcado) <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-menu" target="_blank"">Aprenda mais sobre menu e homepage</a></p>';
    echo '</div>';
 }
 
 //Música
 
 function polivoz_template_musica_name(){
    $title_musica = sanitize_text_field(get_option('polivoz_template_musica_name'));
    if (empty($title_musica)){$title_musica ='Músicas';}
    echo '<input type="text" name="polivoz_template_musica_name" size="60" value="'.$title_musica.'" placeholder="Digite o nome da seção de Músicas."/><p>  Caso deixe em branco o nome será definido como Músicas.</p>';
}

function polivoz_template_musica_name_plural(){
    $name_musica = sanitize_text_field(get_option('polivoz_template_musica_name_plural'));
    if (empty($name_musica)){$name_musica ='Músicas';}
    echo '<input type="text" name="polivoz_template_musica_name_plural" size="60" value="'.$name_musica.'" placeholder="Digite o nome para o plural de Música."/><p>  Caso deixe em branco o nome será definido como Músicas.</p>';
}

function polivoz_template_musica_header(){
    $musica_header = esc_url(get_option('polivoz_template_musica_header'));
    $musica_item_selected_display = empty($musica_header) ? 'hidden' : '';
    $musica_item_not_select_display = empty($musica_header) ? '' : 'hidden';
    $musica_select_text = empty($musica_header)? 'Selecionar': 'Trocar a';
    echo '<div class="card">';
    echo '<p class="musica-header-not-selected'.$musica_item_not_select_display.'">Selecione a imagem destacada da Seção de Eventos. Imagem destacada é uma imagem que ficará no cabeçalho da seção com efeito de paralaxe.</p>';
    echo '<div class="img-header-container"><div id="header-musica-image" class="musica-header-selected featured-image'.$musica_item_selected_display.'" style="background-image: url('.$musica_header.')"></div></div>';
    echo '<input type="button" class="button button-primary musica-header-selected'.$musica_item_selected_display.'" id="upload-musica-remove" value="Remover a imagem"/> ';
    echo '<input id="musica_header_url" type="hidden" name="polivoz_template_musica_header" value="'.$musica_header.'"/>';
    echo '<input type="button" class="button button-secondary" id="upload-musica-header" value="'.$musica_select_text.' imagem"/> ';
    echo '</div>';
}

function polivoz_template_musica_nota_musical(){
    $value = sanitize_text_field(get_option('polivoz_template_musica_nota_musical'));
    if(empty($value)){$value = 'q';}
    echo '<div class="card">';
    echo '<p><input type="text" id="polivoz_template_musica_nota_musical" class="polivoz_nota_musical_field" pattern="[a-zA-Z]*||[0]{1}" data-postid="' . 9 . '" name="polivoz_template_musica_nota_musical" value="'.$value.'" maxlength="2" size="4"/>';
    echo '<span class="nota-musical">'.$value.'</span></p>';
    echo '<p><a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-nota-musical" target="_blank"">Aprenda mais sobre notas musicais</a></p>';
    echo '</div>';
 }

 
 
  function polivoz_template_musica_menu(){
    $value = sanitize_text_field(get_option('polivoz_template_musica_menu'));
    if(empty($value)){$value = 'yes';}
    echo '<div class="card">';
    echo '<ul><li><input type="radio" name="polivoz_template_musica_menu" '. (($value == "yes") ? 'checked' : '') .' value="yes">Sim</input></li>';
    echo '<li><input type="radio" name="polivoz_template_musica_menu" '. (($value == "no") ? 'checked' : '') .' value="no">Não</input></li>';
    echo '<p>Quer mostrar este item no menu? (Caso não queria deixe desmarcado) <a href="' . menu_page_url('polivoz-admin-page', false) . '#polivoz-guide-menu" target="_blank"">Aprenda mais sobre menu e homepage</a></p>';
    echo '</div>';
 }
 
 
 function sanitize_nota_musical($input){
     $value = sanitize_text_field($input);
     $value = filter_var($value, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-Z|a-z|0])\.*/")));
     return $value;
 }