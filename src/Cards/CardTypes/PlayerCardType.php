<?php

namespace Theme\Cards\CardTypes;

class PlayerCardType {

    /**
     * @param string $link
     * @param string $thumbnail
     * @param string $title
     * @param string $excerpt
     * @return void
     */
    public function render(
        $username = ''
    ){
        $curauth = get_userdatabylogin($username);
        ?>
        <div class="column is-two-thirds is-hidden-mobile">
                <div class="columns author__bio author__bio--no-bottom-border is-clearfix">
                    <div class="column is-one-thirds author__profile is-pulled-left container is-fluid">
                        <div class="author__profile-details--item is-uppercase">
                            <h4 class="author__profile-details--value  title is-4">
                                <span><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></span>
                            </h4>
                            <span class="author__profile-details--label">
                                <span><?php _e('Name'); ?></span>
                            </span>
                        </div>
                        <div class="author__profile-details--item is-uppercase">
                            <h2 class="author__profile-details--value title is-4">
                                <span><?php echo $curauth->nickname; ?></span>
                            </h2>
                            <span class="author__profile-details--label">
                                <span><?php _e('Nickname'); ?></span>
                            </span>
                        </div>
                        <div class="author__profile-details--item is-uppercase">
                            <h2 class="author__profile-details--value title is-4">
                                <span><?php echo $curauth->title; ?></span>
                            </h2>
                            <span class="author__profile-details--label">
                                <span><?php _e('Job title'); ?></span>
                            </span>
                        </div>
                        <br />
                        <div class="card__footer-left">
                             <span class="card--clickable">
                                 <a class="author__read-more card__link" href="/author/<?php echo $username; ?>">
                                     <?php _e('View their profile'); ?>
                                     <i class="fa fa-long-arrow-right card__icon" aria-hidden="true"></i>
                                </a>
                             </span>
                        </div>
                    </div>
                    <div class="author__profile_image is-pulled-right column is-half is-paddingless">
                        <img class="author__image--small" src="<?php echo esc_attr( get_the_author_meta('image',$curauth->data->ID )); ?>">
                    </div>
                </div>
        </div>
        <?php
    }
}