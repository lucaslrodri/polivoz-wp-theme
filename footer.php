<footer>
    <p class="text-center">&nbsp;<span class="glyphicon glyphicon-chevron-up"></span></p>
    <?php get_sidebar();
    $rodape_code = get_option('polivoz_rodape_widget');
    if(!empty($rodape_code)):
    ?>
    <div class="center-block">
        <div class="center-block-wrap">
        <?php echo do_shortcode($rodape_code);?>
        </div>
    </div>
    <?php endif;
    $rodape_text = get_option('polivoz_rodape_text');
    if(!empty($rodape_text)){
        echo '<p class="text-center">'.$rodape_text.'</p>';
    }
    ?>
    
    <p class="text-center">Site & Template idealizado e criado por <a href="http://drosah.deviantart.com/">Lucas Lima Rodrigues </a></p>
</footer>
    <?php wp_footer(); ?>
    </body>
</html>