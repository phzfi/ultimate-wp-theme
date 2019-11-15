<?php
namespace Theme\Cards\Areas;

use Theme\Cards\CardTypes\FullHeightCardType;
use Theme\Cards\CardTypes\MediaCardType;

class HeaderCard
{
    protected $query;

    public function __construct()
    {
        $args = array(
            'posts_per_page' => 6,
            'ignore_sticky_posts' => 0
        );
        $this->query = new \WP_Query($args);
    }

    public function render()
    {
        $mediaCard = new MediaCardType();
        $fullHeightCard = new FullHeightCardType();
        echo '<header class="header"><div class="header__body"><div class="header__columns is-multiline">';
        for ($i = 0; $i < min(6,  $this->query->found_posts); $i++) {
            $this->query->the_post();

            switch ( $this->query->current_post) {
                case 0:
                    echo '<div class="header__column is-two-thirds-desktop is-12-touch">';
                    break;
                case 1:
                    echo '<div class="header__column is-one-third-desktop is-12-touch">';
                    break;
                case 2:
                    echo '<div class="header__column is-half-desktop is-12-touch">';
                    break;
                default:
                    echo '<div class="header__column header__column--card is-one-sixth">';
            }

            if( $this->query->current_post < 3) {
                $mediaCard->render(
                    $this->query->current_post,
                    esc_url(get_the_permalink()),
                    esc_html(get_the_title())
                );
            } else {
                $fullHeightCard->render(
                    esc_url(get_the_permalink()),
                    get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                    esc_html(get_the_title()),
                    esc_html(get_the_excerpt())
                );
            }
            echo '</div>'; // This closes the header__column div
        }
        echo'</div></div></header>';
    }
}