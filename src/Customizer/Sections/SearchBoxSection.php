<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\SelectControl;

class SearchBoxSection extends Section {

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
        parent::actions($panel, 'searchbox', 'Search Box', $description, $priority, $capability, $theme_supports);

        // Search box display
        new SelectControl(
            $this,
            'searchbox',
            'Search box',
            'Choose whether the search box is shown or not.',
            ["flex" => __("Show"),
             "none" => __("Hidden")],
            "none"
        );

    }

    /**
     * @return void
     */
    public function render()
    {
        $searchbox = get_theme_mod( 'searchbox', '' );
        if ( ! empty( $searchbox ) ) {
            ?>
            .searchform {
            display: <?php echo $searchbox; ?>;
            }
            <?php
        }
    }
}

