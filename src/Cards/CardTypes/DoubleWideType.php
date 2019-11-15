<?php

namespace Theme\Cards\CardTypes;

class DoubleWideType {

    /**
     * @param string $link
     * @param string $thumbnail
     * @param string $title
     * @param string $excerpt
     * @return void
     */
    public function render(
        $link = '',
        $thumbnail = '',
        $title = '',
        $excerpt = ''
    ){
        ?>

        <div class="column is-two-thirds">
            <a href="<?php echo $link; ?>">
                <div class="card columns is-inline is-clearfix">
                    <div class="column is-half is-pulled-left card__header--background-image-full" style="background-image: url('<?php if($thumbnail != '') echo esc_url($thumbnail); else echo get_option('default_featured_image'); ?>'); "></div>
                    <div class="column is-half is-pulled-right">
                        <div class="card__body card--clickable">
                            <h1 class="card__body-title card__body-title--smaller-font-size"><?php _e($title); ?></h1>
                            <div class="card__body-text--flex">
                                <p><?php echo $excerpt; ?></p>
                                <div class="card__body-gradient"></div>
                            </div>

                        </div>
                        <footer class="card__footer card__footer--flex">
                            <div class="card__footer-left">
                                <span class="card__link">Read more&nbsp;&nbsp;<i class="fa fa-long-arrow-right card__icon" aria-hidden="true"></i></span>
                            </div>
                            <div class="card__footer-right">
                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j'); ?></time>
                            </div>
                        </footer>
                    </div>
                </div>
            </a>
        </div>

<?php
    }
}