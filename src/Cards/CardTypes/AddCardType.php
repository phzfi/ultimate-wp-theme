<?php

namespace Theme\Cards\CardTypes;

class AddCardType{

    /**
     * @param string $link
     * @param string $thumbnail
     * @param string $title
     * @param string $excerpt
     * @param string $index
     * @return void
     */
    public function render(
        $thumbnail = '',
        $index = ''
    ){
        ?>
        <div class="column is-one-third<?php if($index > 8) echo ' is-hidden-mobile'; ?>">
            <div class="card__header--background-image-full"
                 style="background-image: url('<?php if($thumbnail != '') echo esc_url($thumbnail); else echo get_option('default_featured_image'); ?>')">
            </div>
        </div>
        <?php
    }
}