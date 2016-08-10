<section <?php post_class(array('container')) ?>>
    <div class="media">
        <div class="media-left media-middle hidden-xs">
            <a class="media-object" href="<?php the_permalink(); ?>" role="button">
                <?php
               if ( has_post_thumbnail() ) {
                   echo '<img class="img-circle" alt="Thumbnail" src="';
                   the_post_thumbnail_url('thumbnail');
                   echo '">';
               }
               ?>
            </a>
        </div>
        <div class="media-body">
            <header class="media-heading">
                <?php
                $args = array(
                  'type' => 'h2',
                  'post' => $post,
                  'small' => get_the_date()
                );
                generate_title($args);
                if ( has_post_thumbnail() ) {
                   echo '<div class="media-heading row container-fluid visible-xs-block">';
                       echo '<a href="'; the_permalink(); echo '" role="button">';
                       echo '<img class="img-rounded" width="100%" alt="Thumbnail" src="';
                       the_post_thumbnail_url('large');
                  echo '"></a> </div>';
               }  ?>
            </header>
            <article class="section-content">
                <p><?php the_excerpt(); ?></p>
                <p class='leia-mais'><?php edit_post_link(); ?></p>
            </article>
        </div>
        <hr>
    </div>
</section>