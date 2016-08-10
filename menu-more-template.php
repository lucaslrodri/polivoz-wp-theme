<ul class="dropdown-menu">
<?php
    $archive_types = array('galeria','evento','local');
    $i= 0;
    foreach ($archive_types as $archive_type){
        $i++;
        $post_permanlink = get_home_url().'/'.$archive_type;
        if(get_option('polivoz_template_'.$archive_type.'_menu')=='yes'){
            echo '<li '.((is_post_type_archive($archive_type))?'class="active active-menu-external-link"':'').'><a href="'.((!is_post_type_archive($archive_type))?$post_permanlink:'#inicio').'">'.get_option('polivoz_template_'.$archive_type.'_name').'</a></li>';
        }  
    }
    if(get_option('polivoz_template_musica_menu')=='yes'&&is_user_logged_in()){
        $i++;
        $post_permanlink = get_home_url().'/musica';
        echo '<li '.((is_post_type_archive('musica'))?'class="active active-menu-external-link"':'').'><a href="'.((!is_post_type_archive('musica'))?$post_permanlink:'#inicio').'">'.get_option('polivoz_template_musica_name').'</a></li>';
    }
    if($i>0){
        echo '<li role="separator" class="divider"></li>';
    }
    if(is_user_logged_in()):
?>
    <li><a href="<?php echo  wp_logout_url( get_home_url() );?>">Deslogar</a></li>
    <?php else:?>
    <li><a href="<?php echo wp_login_url( get_home_url().'/musica' );?>">Acesso restrito</a></li>
    <?php endif;?>
</ul>