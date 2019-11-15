<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;
use Theme\Customizer\Controls\NumberControl;

class CardSection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        $card_highlight_color = get_theme_mod( 'card_highlight_color', '' );
        if ( ! empty( $card_highlight_color ) ) {
            ?>
            .card__link  {
            color: <?php echo $card_highlight_color; ?>  !important;
            }
            .card__header--background-image, .card__header--background-image-half-height  {
            background-color: <?php echo $card_highlight_color; ?>  !important;
            }
            <?php
        }

        $card_image_border = get_theme_mod( 'card_image_border', '3' );
        if ( ! empty( $card_image_border ) ) {
            ?>
            .card__header--background-image, .card__header--background-image-half-height, .card__header   {
            border-bottom: <?php echo $card_image_border; ?>px solid <?php echo $card_highlight_color; ?> !important;
            }
            <?php
        }

    }

    public function actions(
        $panel='',
        $section_id='',
        $title='',
        $description = null,
        $priority = 0,
        $capability = 'edit_theme_options',
        $theme_supports = ''
    )
    {
        parent::actions($panel, 'card', 'Card Colors', $description, $priority, $capability, $theme_supports);

        // Card Highlight Color
        new ColorControl(
            $this,
            'card_highlight_color',
            'Card Highlight Color',
            'Set the color for the link in the card, the background color of the card and for the border under the card image.'
        );

        // Card Image Border
        new NumberControl(
            $this,
            'card_image_border',
            'Card Image Border',
            'Set the height of the border under the card image in pixels.',
            3
        );
    }
}
