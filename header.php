<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta description="<?php bloginfo('description');?>">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Wordpress Configs -->
    <title><?php
    if(is_front_page()){bloginfo('name');echo ' &#45; '; bloginfo('description');}
    else{wp_title('');echo ' &#45; ';bloginfo('name');}
    ?></title>
    <?php wp_head(); ?>

  </head>
  <body <?php body_class("preload"); ?>>
<nav class="navbar navbar-default navbar-fixed-top" id="main-menu">
  <div class="container">
    <!-- MenuHeader -->
    <div class="navbar-header">
        <header <?php if ((is_front_page())){echo 'class="home-menu"';} ?>>
            <a class="navbar-brand <?php if((is_front_page())){ echo 'home-link';}?>" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/logo.svg)" href="<?php if (!(is_front_page())){echo get_home_url();} else{echo '#';} ?>">
            </a>
        </header>
        <button type="button" onclick="$(this)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- FimMenuHeader -->
    <!-- Menu -->
    <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
        <ul class="nav navbar-nav <?php if ((is_front_page())){echo "home-menu";} ?>">
        <?php
            $menu_args = array(
                'post_type' => 'homepolivoz',
                'post_status' => 'publish',
                'meta_key' => '_home_priority_key',
                'posts_per_page' => 6,
                'orderby' => 'meta_value_num',
                'meta_query' => array(
                    array(
                        'key' => '_show_menu_key',
                        'value' => 'yes',
                        'compare' => 'LIKE'
                    )
                ),
                'order' => 'ASC'
            );
            $menu_query = new WP_query($menu_args);
        ?>
        <?php if ($menu_query->have_posts()) : ?>
                <?php while ( $menu_query->have_posts() ) : $menu_query->the_post(); ?>
                    <li><a <?php if((is_front_page())){ echo 'class="home-link"';}?> href="<?php if (!(is_front_page())){echo get_home_url();} ?>#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li>
                <?php endwhile ;?>
        <?php endif; ?>
        <?php wp_reset_postdata(); $current_page_permanlink = get_permalink(); ?>
        <?php
            $menu_args = array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'meta_key' => '_home_priority_key',
                'posts_per_page' => 3,
                'orderby' => array(
                    'meta_value_num'
                ),
                'meta_query' => array(
                    array(
                        'key' => '_show_menu_key',
                        'value' => 'yes',
                        'compare' => 'LIKE'
                    )
                ),
                'order' => 'ASC'
            );
            $menu_query = new WP_query($menu_args);
        ?>
        <?php if ($menu_query->have_posts()) : ?>
                <?php while ( $menu_query->have_posts() ) : $menu_query->the_post(); $post_permanlink = get_permalink($post->ID);?>
                    <li <?php if($current_page_permanlink == $post_permanlink){ echo 'class="active active-menu-external-link"';}?>><a href="<?php if($current_page_permanlink != $post_permanlink){ echo $post_permanlink;}else{echo '#inicio';} ?>"><?php the_title(); ?></a></li>
                <?php endwhile ;?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
            <li class="dropdown hidden-sm">
                <a href="#" class="dropdown-toggle <?php if(is_post_type_archive()){echo 'active-mais';} ?>" data-toggle="dropdown" role="button" aria-haspopup="true">Mais<span class="caret"></span></a> 
                <?php get_template_part('menu-more-template');?>
            </li>
        </ul>
        <ul class="nav navbar-nav more-mobile visible-sm-inline-block">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span></a> 
            <?php get_template_part('menu-more-template');?>
            </li>
        </ul>
    </div>
      <!-- FimMenu -->
  </div>
</nav>