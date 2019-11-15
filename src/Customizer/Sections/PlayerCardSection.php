<?php

namespace  Theme\Customizer\Sections;

use Theme\Customizer\Controls\RangeControl;
use Theme\Customizer\Controls\SelectControl;
use Theme\Customizer\Controls\TextControl;
use Theme\Customizer\Customizer;

class PlayerCardSection extends Section {

    public function actions(
        $panel='',
        $section_id='',
        $title='',
        $description = null,
        $priority = 0,
        $capability = 'edit_theme_options',
        $theme_supports = ''
    ) {
      parent::actions($panel, 'player_card', 'Player Card', $description, $priority, $capability, $theme_supports);

        $options_state = Customizer::$WP_CUSTOMIZE->unsanitized_post_values();
        $gridRowAmount = (int) isset($options_state['grid_row_amount']) ? $options_state['grid_row_amount'] : get_theme_mod('grid_row_amount', 3);

      new SelectControl(
          $this,
          'player_card',
          'Player Card',
          'Choose whether the player card is shown or not.',
          [1 => __("Show"),
              0 => __("Hidden")],
          0
      );

        new SelectControl(
            $this,
            'player_card_align',
            'Player Card Alignment',
            'Choose which side the player card is aligned to.',
            [2 => __("Left"),
                1 => __("Right")],
            2
        );

        new RangeControl(
            $this,
            'player_card_row',
            'Player Card Row',
            1,
            $gridRowAmount,
            1,
            'Set the row that a player card should be shown on'
        );

        new TextControl(
            $this,
            'player_card_user',
            'Player Card User',
            'Give the username of the featured user'
        );
    }
    public function render() {}
}