<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;

class ButtonsSections extends Section {
    /**
     * @return void
     */
    public function render()
    {
        $cookies_button_background = get_theme_mod( 'cookies_button_background', '' );
        if ( ! empty( $cookies_button_background ) ) {
            ?>
            .easy-cookies-policy-accept {
            background-color: <?php echo $cookies_button_background; ?>  !important;
            }
            <?php
        }

        $cookies_button_text = get_theme_mod( 'cookies_button_text', '' );
        if ( ! empty( $cookies_button_text ) ) {
            ?>
            .easy-cookies-policy-accept {
            color: <?php echo $cookies_button_text; ?>  !important;
            }
            <?php
        }

        $submit_button_background = get_theme_mod( 'submit_button_background', '' );
        if ( ! empty( $submit_button_background ) ) {
            ?>
            .gform_button {
            background-color: <?php echo $submit_button_background; ?>  !important;
            }
            <?php
        }

        $submit_button_color = get_theme_mod( 'submit_button_color', '' );
        if ( ! empty( $submit_button_color ) ) {
            ?>
            .gform_button {
            color: <?php echo $submit_button_color; ?>  !important;
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
        parent::actions($panel, 'buttons', 'Buttons Colors', $description, $priority, $capability, $theme_supports);

        // Cookies button background color
        new ColorControl(
            $this,
            'cookies_button_background',
            'Cookies accept button background color'
        );

        // Cookies button text color
        new ColorControl(
            $this,
            'cookies_button_text',
            'Cookies accept button text color'
        );

        // Submit button color
        new ColorControl(
            $this,
            'submit_button_background',
            'Submit button background color'
        );

        // Submit text color
        new ColorControl(
            $this,
            'submit_button_color',
            'Submit button text color'
        );
    }
}