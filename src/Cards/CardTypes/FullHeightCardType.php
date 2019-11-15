<?php

namespace Theme\Cards\CardTypes;

class FullHeightCardType{

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
    ){ ?>
        <a href="<?php echo $link; ?>">
            <div class="card card--full-height card--clickable card--no-shadow card--border card--flex">
                <div class="card__header card__header--flex card__header--background-image-half-height"
                     style="background-image: url('<?php if($thumbnail != '') echo esc_url($thumbnail); else echo get_option('default_featured_image'); ?>')">
                </div>
                <div class="card__body">
                    <h1 class="card__body-title card__body-title--smaller-font-size"><?php _e($title); ?></h1>

                    <div class="card__body-text card__body-text--flex">
                        <p><?php echo $excerpt; ?></p>
                        <div class="card__body-gradient"></div>
                    </div>
                </div>
                <footer class="card__footer card__footer--flex card__footer--smaller-padding">
                    <div class="card__footer-left">
                                    <span class="card__link">
                                        Read more&nbsp;&nbsp;<i class="fa fa-long-arrow-right card__icon"
                                                                aria-hidden="true"></i>
                                    </span>
                    </div>
                    <div class="card__footer-right">
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j'); ?></time>
                    </div>
                </footer>
            </div>
        </a>
        <?php
    }
}

?>