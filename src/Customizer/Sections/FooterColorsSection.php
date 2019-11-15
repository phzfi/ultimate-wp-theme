<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;

class FooterColorsSection extends Section {

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
        parent::actions($panel, 'footercolors', 'Footer Colors', $description, $priority, $capability, $theme_supports);

        // Footer Line color
        new ColorControl(
            $this,
            'footer_line_color',
            'Footer Line color',
            'Change the color of the line between footer sections.'
        );

    }

    /**
     * @return void
     */
    public function render()
    {
        $footer_line_color = get_theme_mod( 'footer_line_color', '' );
        if ( ! empty( $footer_line_color ) ) {
            ?>
            .footer hr {
            background-color: <?php echo $footer_line_color; ?>;
            }
            <?php
        }

    }

}

