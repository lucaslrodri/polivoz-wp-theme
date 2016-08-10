<?php
/*=============================================================================
                              ENQUEUE FUNCTIONS
=============================================================================*/

function polivoz_load_admin_scripts($hook){
    wp_register_style('polivoz_admin', get_template_directory_uri().'/css/admin.css',array(),'1.0','all');
    wp_enqueue_style('polivoz_admin'); 
    if("tema-polivoz_page_polivoz-config-section"==$hook){
        wp_enqueue_media();
        wp_register_script('admin_uploader',get_template_directory_uri().'/js/admin_uploader.js',array('jquery'),'1.0',true);
        wp_enqueue_script('admin_uploader');
    }elseif("post.php"==$hook||"post-new.php"==$hook){
        wp_register_script('datepicker_ptbr',get_template_directory_uri().'/js/datepicker-pt-BR.js',array(),'1.8.2',true);
        wp_register_script('admin_aux',get_template_directory_uri().'/js/admin_aux.js',array('jquery','jquery-ui-datepicker'),'1.0',true);
        wp_enqueue_script('admin_aux');
        wp_enqueue_script('datepicker_ptbr');
        wp_enqueue_style('jquery-datepicker-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
    }
}

add_action('admin_head', 'polivoz_load_admin_scripts');

add_action('admin_enqueue_scripts','polivoz_load_admin_scripts');

function polivoz_load_scripts(){
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css',array(),'3.3.6','all');
    wp_register_style('bootstrap_date_picker3', get_template_directory_uri().'/css/bootstrap-datepicker3.min.css',array(),'1.6.1','all');
    wp_register_style('owl_theme', get_template_directory_uri().'/css/owl.carousel.css',array('owl_theme_aux'),'1.6.1','all');
    wp_register_style('owl_theme_aux', get_template_directory_uri().'/css/owl.theme.css',array(),'1.6.1','all');
    wp_register_style('polivoz_style', get_stylesheet_uri(),array(),'0.1a','all');
    wp_register_style('polivoz_menu', get_template_directory_uri().'/css/menu.css',array(),'0.1a','all');
    
    wp_register_style('polivoz_home', get_template_directory_uri().'/css/home.css',array('owl_theme','polivoz_galeria','polivoz_evento'),'0.1a','all');
    wp_register_style('polivoz_page', get_template_directory_uri().'/css/page.css',array(),'0.1a','all');
    wp_register_style('polivoz_blog', get_template_directory_uri().'/css/blog.css',array('bootstrap_date_picker3'),'0.1a','all');
    wp_register_style('polivoz_galeria', get_template_directory_uri().'/css/galeria.css',array('bootstrap_date_picker3'),'0.1a','all'); 
    wp_register_style('polivoz_local', get_template_directory_uri().'/css/local.css',array(),'0.1a','all');
    wp_register_style('polivoz_evento', get_template_directory_uri().'/css/evento.css',array('bootstrap_date_picker3'),'0.1a','all');
    
    wp_register_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'3.3.6',true);
    wp_register_script('owljs',get_template_directory_uri().'/js/owl.carousel.min.js',array('jquery'),'1.3.2',true);
    wp_register_script('bootstrap_date_picker3jsptbr',get_template_directory_uri().'/js/bootstrap-datepicker.pt-BR.min.js',array('bootstrap_date_picker3js'),'1.6.1',true);
    wp_register_script('bootstrap_date_picker3js',get_template_directory_uri().'/js/bootstrap-datepicker.min.js',array(),'1.6.1',true);
    wp_register_script('scriptsjs',get_template_directory_uri().'/js/scripts.js',array('owljs'),'1.0.0',true);
    wp_register_script('paginationjs',get_template_directory_uri().'/js/pagination.js',array(),'1.0.0',true);
    
}
add_action('init','polivoz_load_scripts');

function polivoz_enqueue_scripts(){
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('polivoz_style');
    wp_enqueue_style('polivoz_menu');
    
    if(is_front_page()){wp_enqueue_style('polivoz_home');}else{wp_enqueue_style('polivoz_page');}
    if(basename(get_page_template ())=='page-blog.php'){wp_enqueue_style('polivoz_blog');}
    elseif (is_post_type_archive('galeria')||is_post_type_archive('musica')) {wp_enqueue_style('polivoz_galeria');}
    elseif (is_post_type_archive('local')) {wp_enqueue_style('polivoz_local');}
    elseif (is_post_type_archive('evento')||is_singular('local')||is_singular('evento')) {wp_enqueue_style('polivoz_evento');}
    
    wp_enqueue_script("jquery");
    wp_enqueue_script('bootstrapjs');
    wp_enqueue_script('scriptsjs');
    if((basename(get_page_template())=='page-blog.php')||is_archive()||is_singular('local')){
        wp_enqueue_script('bootstrap_date_picker3jsptbr');
        wp_enqueue_script('bootstrap_date_picker3js');
        wp_enqueue_script('paginationjs');
    }
}

add_action('wp_enqueue_scripts','polivoz_enqueue_scripts');


function polivoz_login_page() { 
    wp_register_style('polivoz_login', get_template_directory_uri().'/css/login.css',array(),'0.1a','all');
    wp_enqueue_style('polivoz_login');
    ?>

    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/img/logo.svg);
            background-size:contain;
            width: 100%;
            height: 128px;
            padding-bottom: -10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'polivoz_login_page' );
    