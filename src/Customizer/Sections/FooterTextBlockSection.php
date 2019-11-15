<?php

namespace Theme\Customizer\Sections;


use Theme\Customizer\Controls\TextBlockControl;

class FooterTextBlockSection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        //Render happens in footer.php file.
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
        parent::actions($panel, 'footer_bottom_text', 'Footer Bottom Text', $description, $priority, $capability, $theme_supports);

        // Text left
        new TextBlockControl(
            $this,
            'footer_bottom_text_left',
            'Footer Bottom Text Left Side',
            'Change the text in the left side of the footer.'

        );

        // Text center
        new TextBlockControl(
            $this,
            'footer_bottom_text_center',
            'Footer Bottom Text Center',
            'Change the text in the center of the footer.'

        );

        // Text right
        new TextBlockControl(
            $this,
            'footer_bottom_text_right',
            'Footer Bottom Text Right Side',
            'Change the text in the right side of the footer.'

        );

    }
}

