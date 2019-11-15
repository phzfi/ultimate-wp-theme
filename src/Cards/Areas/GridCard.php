<?php
namespace Theme\Cards\Areas;

use Theme\Cards\CardTypes\AddCardType;
use Theme\Cards\CardTypes\DoubleWideType;
use Theme\Cards\CardTypes\GridCardType;
use Theme\Cards\CardTypes\PlayerCardType;
use Theme\Customizer\Customizer;

class GridCard {

    protected $query;

    public function __construct()
    {
        $args = array(
            'ignore_sticky_posts' => 1,
            'offset' => 6
        );
        $this->query = new \WP_Query($args);
    }

    public function render() {

        $options_state = Customizer::$WP_CUSTOMIZE != null ? Customizer::$WP_CUSTOMIZE->unsanitized_post_values() : [];

        $gridRowAmount = (int) isset($options_state['grid_row_amount']) ? $options_state['grid_row_amount'] : get_theme_mod('grid_row_amount', 3);

        $playerCardSet = isset($options_state['player_card']) ? $options_state['player_card'] : get_theme_mod('player_card', 0);
        $playerCardAlign = isset($options_state['player_card_align']) ? $options_state['player_card_align'] : get_theme_mod('player_card_align', 2);
        $playerCardRow = isset($options_state['player_card_row']) ? $options_state['player_card_row'] : get_theme_mod('player_card_row', 2);
        $playerCardPosition = $playerCardRow * 3 + 5 - $playerCardAlign;
        $playerCardUser = isset($options_state['player_card_user']) ? $options_state['player_card_user'] : get_theme_mod('player_card_user', '');

        $doubleWideSet = isset($options_state['double_wide']) ? $options_state['double_wide'] : get_theme_mod('double_wide', 0);
        $doubleWideAlign = isset($options_state['double_wide_align']) ? $options_state['double_wide_align'] : get_theme_mod('double_wide_align', 2);
        $doubleWideRow = isset($options_state['double_wide_row']) ? $options_state['double_wide_row'] : get_theme_mod('double_wide_row', 2);

        if($playerCardSet == 1 && $playerCardRow < $doubleWideRow) {
            $doubleWidePosition = $playerCardPosition + 3 * ($doubleWideRow - $playerCardRow)  - ($doubleWideAlign + (2- $playerCardAlign) );
        } else if ($playerCardSet == 1 && $playerCardRow == $doubleWideRow){
            $doubleWidePosition = $playerCardPosition - $doubleWideAlign + 2;
        } else {
            $doubleWidePosition = $doubleWideRow * 3 + 5 - $doubleWideAlign;
        }

        // This calculates the correct number of articles to be shown. Each grid holds 3 articles, player card takes too slots and 6 for the offset
        $articleCount = $gridRowAmount * 3 - (2 * $playerCardSet) + 6;
        $gridCard = new GridCardType();
        $playerCard = new PlayerCardType();
        $doubleWideCard = new DoubleWideType();
        $addCard = new AddCardType();
        if ( $this->query->have_posts() ) {
            if($this->query->found_posts > 6) { ?>
                <section class="section">
                    <div class="container">
                        <div class="columns is-multiline">
                            <?php
                            for ($i = 6; $i < min($articleCount, $this->query->found_posts); $i++) {
                                $this->query->the_post();

                                // Player card isn't an article so we dont have to skip a post.
                                if($playerCardSet == 1 && $i == $playerCardPosition && $playerCardUser != '') {
                                    $playerCard->render($playerCardUser);
                                }
                                if ($doubleWideSet == 1 && $i == $doubleWidePosition) {
                                    $doubleWideCard->render(
                                        esc_url(get_the_permalink()),
                                        get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                                        esc_html(get_the_title()),
                                        esc_html(get_the_excerpt()),
                                        $i
                                    );
                                    $i++;

                                } else {
                                    if(get_post_meta(get_the_ID(),'_only_image', true ) == 1) {
                                        $addCard->render(
                                            get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                                            $i
                                        );
                                    } else {
                                        $gridCard->render(
                                            esc_url(get_the_permalink()),
                                            get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                                            esc_html(get_the_title()),
                                            esc_html(get_the_excerpt()),
                                            get_post_meta(get_the_ID(),'_only_image', true ),
                                            $i
                                        );
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
    }
}
