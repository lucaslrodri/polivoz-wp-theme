<div class="col-md-6">
    <h2>Dados para contato</h2>
        <?php the_content();
        $contact_data=get_post_meta($post->ID,'_home_contact_key',true);
        $contact_name=array(
            'name' => 'Nome',
            'mobile' => 'Celular',
            'phone' => 'Telefone',
            'email' => 'E-mail',
            'address' =>'Endereço');
        $contact_icon=array(
            'name' => 'glyphicon-user',
            'mobile' => 'glyphicon-phone',
            'phone' => 'glyphicon-phone-alt',
            'email' => 'glyphicon glyphicon-envelope',
            'address' =>'glyphicon-map-marker');
        foreach($contact_data as $key => $contact_item){
            if ($contact_item!=""){
               echo '<p><span class="glyphicon '.$contact_icon[$key].'"></span>&nbsp; '.$contact_name[$key].': '.$contact_item.'</p>';
            }
        }
        ?>
    <div class='text-center'>
        <?php
        $social_data=get_post_meta($post->ID,'_home_social_key',true);
        $social_icon=array('facebook' => 'polivoz-facebook',
                           'instagram' => 'polivoz-instagram',
                           'twitter' => 'polivoz-twitter',
                           'youtube' => 'polivoz-youtube',
                           'soundcloud' => 'polivoz-soundcloud2');
        $social_name=array('facebook' => 'Facebook',
                         'instagram' => 'Instagram',
                         'twitter' => 'Twitter',
                         'youtube' => 'Youtube',
                         'soundcloud' => 'SoundCloud');
        foreach($social_data as $key => $url){
            if ($url!=""){
               echo '<a href="'.$url.'" target="_blank" class="btn social-icons" data-placement="bottom" data-toggle="tooltip" title="'.$social_name[$key].'"><span data-toggle="tooltip" class="polivoz-icon '.$social_icon[$key].'"></span></a>&nbsp;';
            }
        }
        ?>
    </div>
</div>
<div class="col-md-6">
    <h2 id="formulario-polivoz">Formulário</h2>
    <?php echo do_shortcode(get_post_meta($post->ID,'_home_form_shortcode_key',true)) ?>
</div>