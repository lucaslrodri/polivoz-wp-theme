<?php
if (!is_user_logged_in()):
   auth_redirect();
else:
get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
    <?php if(get_option('polivoz_template_galeria_single_header')){get_template_part('parallaxheader');}else{echo '<div class="space"></div>';} ?>
    <h3><?php add_breadcrumbs($post)?></h3>
    <hr>
    <main class="container">
        <header class="row">
            <div class="section-title">
                <?php
                $args = array(
                      'type' => 'h1',
                      'post_link' => true,
                      'post' => $post
                );
                    generate_title($args);  ?>
            </div>
        </header>
        <article class="section-content">
            <?php
            echo '<div class="container">';
            the_content();
            echo '</div>';
            $music_list_shortcode = get_post_meta($post->ID, '_music_list_shortcode_key', true);
            if (!empty($music_list_shortcode['code'])){
                echo '<div class="container">';
                echo '<h2>'.(empty($music_list_shortcode['title'])?'Playlist':$music_list_shortcode['title']).'</h2>';
                echo do_shortcode($music_list_shortcode['code']);
                echo '</div>';
            }
            $music_list_iframe = get_post_meta($post->ID, '_music_list_iframe_key', true);
            if(!empty($music_list_iframe)){
                $iframe_count = count($music_list_iframe);
                echo '<div class="container">';
                switch ($iframe_count){
                    case 1:
                        echo '<h2>'.$music_list_iframe[0]['title'].'</h2>';
                        echo '<div class="col-md-10 col-lg-offset-1">';
                        echo '<div '.(($music_list_iframe[0]['responsive']=='yes')?'class="embed-responsive embed-responsive-16by9"':'').'>'.$music_list_iframe[0]['code'].'</div>';
                        echo '</div>';
                        break;
                    case 3:
                        echo '<h2>Mídia</h2>';
                        echo '<div class="row">';
                        echo '<div class="col-md-10 col-lg-offset-1">';
                        echo '<br><h3>'.$music_list_iframe[0]['title'].'</h3></br>';
                        echo '<div '.(($music_list_iframe[0]['responsive']=='yes')?'class="embed-responsive embed-responsive-16by9"':'').'>'.$music_list_iframe[0]['code'].'</div>';
                        echo '</div></div>';
                        for ($i=1;$i<=2;$i++){
                            echo '<div class="col-md-6">';
                            echo '<br><h3>'.$music_list_iframe[$i]['title'].'</h3></br>';
                            echo '<div '.(($music_list_iframe[0]['responsive']=='yes')?'class="embed-responsive embed-responsive-4by3"':'').'>'.$music_list_iframe[$i]['code'].'</div>';
                            echo '</div>';
                        }
                        break;
                    default:
                        echo '<h2>Mídia</h2>';
                        foreach ($music_list_iframe as $item){
                            echo '<div class="col-md-6">';
                            echo '</br><h3>'.$item['title'].'</h3></br>';
                            echo '<div '.(($music_list_iframe[0]['responsive']=='yes')?'class="embed-responsive embed-responsive-4by3"':'').'>'.$item['code'].'</div>';
                            echo '</div>';
                        }
                }
                echo '</div>';
            }
            $music_list_down_pdf = get_post_meta($post->ID, '_music_list_pdfs_key', true);
            $music_list_down_mp3 = get_post_meta($post->ID, '_music_list_mp3_key', true);
            if(!empty($music_list_down_pdf)||!empty($music_list_down_mp3)){
                echo '<div class="container">';
                echo '<h2>Anexo';
                if(!empty($music_list_down_pdf)&&empty($music_list_down_mp3)){echo ' - Partituras e documentos</h2>';}
                elseif(empty($music_list_down_pdf)&&!empty($music_list_down_mp3)){echo ' - Músicas</h2>';}
                else{echo '</h2>';}
                if(!empty($music_list_down_pdf)){
                    echo '<div class="col-md-'.(empty($music_list_down_mp3)?'12':'6').'">';
                    if(!empty($music_list_down_mp3)){echo '<h3>Partituras & documentos</h3>';}
                        echo '<table class="table-condensed"><tbody>';
                            foreach ($music_list_down_pdf as $item){
                                echo '<tr>';
                                echo '<td><span class="glyphicon glyphicon-file" aria-hidden="true"></span></td>';
                                echo '<td>'.$item['title'].'</td>';
                                echo '<td><a class="btn btn-link" href="'.($item['external']=='no'?get_home_url().'/'.$item['code']:$item['code']).'" '.($item['forcedownload']=='true'?' download':'').' target="_blank">';
                                echo 'Download';
                                echo '</a></td>';
                                echo '</tr>';
                            }
                        echo '</tbody></table>';
                    echo '</div>';
                }
                if(!empty($music_list_down_mp3)){
                    echo '<div class="col-md-'.(empty($music_list_down_pdf)?'12':'6').'">';
                        if(!empty($music_list_down_pdf)){echo '<h3>Músicas</h3>';}
                        echo '<table class="table-condensed"><tbody>';
                            foreach ($music_list_down_mp3 as $item){
                                echo '<tr>';
                                echo '<td><span class="glyphicon glyphicon-music" aria-hidden="true"></span></td>';
                                echo '<td>'.$item['title'].'</td>';
                                echo '<td><a class="btn btn-link" href="'.($item['external']=='no'?get_home_url().'/'.$item['code']:$item['code']).'"'.((($item['external']=='no')||($item['external']=='yes' && $item['forcedownload']=='true'))?' download':'').' target="_blank">';
                                echo 'Download';
                                echo '</a></td>';
                                echo '</tr>';
                            }
                        echo '</tbody></table>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </article>
    </main>
    <div class="container section-content">
        <hr>
        <div class="col-xs-6 text-left custom-pagination"><?php previous_post_link('%link', '&laquo Música anterior');?></div>
        <div class="col-xs-6 text-right custom-pagination"><?php next_post_link('%link','Próxima música &raquo');?></div>
    </div>
<?php endwhile;?>
<?php get_footer(); endif;

