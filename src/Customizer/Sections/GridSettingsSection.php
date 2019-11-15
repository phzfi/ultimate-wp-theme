<?php

namespace  Theme\Customizer\Sections;

use Theme\Customizer\Controls\NumberControl;

class GridSettingsSection extends Section
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
        parent::actions($panel, 'grid_row_amount', 'Grid Rows', $description, $priority, $capability, $theme_supports);

        new NumberControl(
            $this,
            'grid_row_amount',
            'Grid Row Amount',
            'How many rows there should be on the front page grid',
            3
        );
    }

    public function render()
    {
    }
}