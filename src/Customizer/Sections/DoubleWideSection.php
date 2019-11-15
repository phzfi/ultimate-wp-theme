<?php

namespace  Theme\Customizer\Sections;

use Theme\Customizer\Controls\RangeControl;
use Theme\Customizer\Controls\SelectControl;
use Theme\Customizer\Customizer;


class DoubleWideSection extends Section
{

    public function actions(
        $panel = '',
        $section_id = '',
        $title = '',
        $description = null,
        $priority = 0,
        $capability = 'edit_theme_options',
        $theme_supports = ''
    )
    {
        parent::actions($panel, 'double_wide', 'Double Wide', $description, $priority, $capability, $theme_supports);

        $options_state = Customizer::$WP_CUSTOMIZE->unsanitized_post_values();
        $gridRowAmount = (int) isset($options_state['grid_row_amount']) ? $options_state['grid_row_amount'] : get_theme_mod('grid_row_amount', 3);

        new SelectControl(
            $this,
            'double_wide',
            'Double Wide',
            'Choose whether there is a double wide post on the front page grid',
            [
                1 => __("Show"),
                0 => __("Hidden")
            ],
            0
        );

        new SelectControl(
            $this,
            'double_wide_align',
            'Double Wide Alignment',
            'Choose which side the double wide post is aligned to.',
            [
                2 => __("Left"),
                1 => __("Right")
            ],
            2
        );

        new RangeControl(
            $this,
            'double_wide_row',
            'Double Wide Row',
            1,
            $gridRowAmount,
            1,
            'Set the row that a double wide article should be shown on'
        );
    }

    public function render()
    {
    }
}