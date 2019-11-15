<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;

class TypographySection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        $link_color = get_theme_mod( 'link_color', '' );
        if ( ! empty( $link_color ) ) {
            ?>
            .article--single-post a, a {
            color: <?php echo $link_color; ?>;
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
        parent::actions($panel, 'typography', 'Typography Colors', $description, $priority, $capability, $theme_supports);

        new ColorControl(
            $this,
            'link_color',
            'Link Color'
        );
    }
}