<?php if(!(is_active_sidebar('footer-widget'))){
    return;
}
?>
<div class="footer-sidebar">
    <?php dynamic_sidebar('footer-widget');?>
</div>