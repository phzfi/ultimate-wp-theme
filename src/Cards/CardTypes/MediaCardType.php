<?php

namespace Theme\Cards\CardTypes;

class MediaCardType{

    /**
     * @return void
     */
    public function render(
        $post_number = '',
        $link = '',
        $title = ''
    ){ ?>
        <a href="<?php echo $link; ?>">
            <div class="media-card"
             style="background-image: url('<?php if(has_post_thumbnail()) echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); else echo get_option('default_featured_image'); ?>')">
              <div class="media-card__cover"></div>
                <div class="media-card__content">
                    <h1 class="media-card__title<?php if( $post_number === 0){ echo ' media-card__title--primary';} ?>"><?php _e($title); ?></h1>
                    <span class="media-card__read-more">Read more <i class="fa fa-long-arrow-right media-card__icon"></i></span>
                 </div>
            </div>
        </a>
        <?php
    }
}

?>