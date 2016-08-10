<div class='col-md-6'>
    <?php the_content(); ?>
</div>
<div class='col-md-6'>
    <div class="embed-responsive embed-responsive-4by3">
    <?php echo get_post_meta($post->ID,'_home_columns_key',true); ?>
    </div>
</div>