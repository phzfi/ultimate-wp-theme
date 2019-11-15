<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\TextBlockControl;

class FooterLegalSection extends Section {

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
        parent::actions($panel, 'footer_legal_text', 'Footer Legal Text', $description, $priority, $capability, $theme_supports);

        // Text left
        new TextBlockControl(
            $this,
            'footer_legal_text_left',
            'Legal Text Left Side',
            'Change the text in the left side of the legal footer.'

        );

        // Text right
        new TextBlockControl(
            $this,
            'footer_legal_text_right',
            'Legal Text Right Side',
            'Change the text in the right side of the legal footer.'
        );

    }

    /**
     * @return void
     */
    public function render()
    {
        // Text Block render happens in functions.php file.

    }
}

