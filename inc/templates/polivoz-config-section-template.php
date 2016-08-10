<section class="wrap">
    <h1>Configurações adicionais do Tema Polivoz</h1>
    <?php settings_errors();?>
    <form method="post" action="options.php">
        <?php settings_fields('polivoz-config-section-group');?>
        <?php do_settings_sections('polivoz-config-section');?>
        <?php submit_button();?>
    </form>
</section>