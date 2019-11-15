<?php
$locations = get_nav_menu_locations();
foreach(['footer-pages', 'footer-technical', 'footer-social-media', 'footer-help'] as $footer_menu_name) {
    if(isset($locations[$footer_menu_name]) && is_object(wp_get_nav_menu_object($locations[$footer_menu_name])) && wp_get_nav_menu_object($locations[$footer_menu_name])->count > 0) {
        ?>
        <div class="column is-half-mobile is-one-fifth-tablet">
            <h4><?php echo esc_html(wp_get_nav_menu_name($footer_menu_name)); ?></h4>
            <?php
            wp_nav_menu([
                'theme_location' => $footer_menu_name,
                'items_wrap' => '<ul class="basic-list">%3$s</ul>',
                'container' => 'false',
                'walker' => new FooterWalker
            ]);
            ?>
        </div>
        <?php
    }
}
?>