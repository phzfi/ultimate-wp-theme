<?php wp_footer(); ?>
<footer class="footer">
    <div class="container">
        <div class="columns footer__columns is-multiline is-mobile">
            <div class="column footer__column--align-left is-full-mobile is-one-fifth-tablet">
                <figure class="footer__image is-128x128">
                    <?php if(get_theme_mod('footer_logo_link') != '') : ?>
                        <a href="<?php echo get_theme_mod('footer_logo_link');?>"><img src="<?php echo get_site_icon_url(); ?>"
                            alt="Logo" class="footer__image_src"></a>
                    <?php else : ?>
                         <img src="<?php echo get_site_icon_url(); ?>" lt="Logo" class="footer__image_src">
                    <?php endif; ?>
                </figure>
            </div>
            <?php get_template_part( 'src/partials/footer', 'menu' ); ?>
        </div>
        <?php if(get_theme_mod('footer_bottom_text_left') != '' || get_theme_mod('footer_bottom_text_center') || get_theme_mod('footer_bottom_text_right')) : ?>
        <hr>
        <div class='footer__bottom'>
            <div class="footer__bottom-left is-size-7">
                <?php echo get_theme_mod('footer_bottom_text_left'); ?>
            </div>
            <div class="footer__bottom-center is-size-7">
                <?php echo get_theme_mod('footer_bottom_text_center'); ?>
            </div>
            <div class="footer__bottom-right is-size-7">
                <?php echo get_theme_mod('footer_bottom_text_right'); ?>
            </div>
            <div class="is-clearfix"></div>
        </div>
        <?php endif; ?>
        <?php if(get_theme_mod('footer_legal_text_left') != '' || get_theme_mod('footer_legal_text_right')) : ?>
            <hr>
        <div class='footer__bottom footer__legal'>
            <div class="footer__bottom-left is-size-7">
                <?php echo get_theme_mod('footer_legal_text_left'); ?>
            </div>
            <div class="footer__bottom-right is-size-7">
                <?php echo get_theme_mod('footer_legal_text_right'); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</footer>


<script>
    document.addEventListener('DOMContentLoaded', function () {

// Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

// Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

// Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

// Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>