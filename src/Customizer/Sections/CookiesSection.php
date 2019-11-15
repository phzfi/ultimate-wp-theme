<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;

class CookiesSection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        $cookie_policy_background = get_theme_mod( 'cookie_policy_background', '' );
        if ( ! empty( $cookie_policy_background ) ) {
            ?>
            #easy-cookies-policy-main-wrapper {
            background-color: <?php echo $cookie_policy_background; ?>  !important;
            }
            <?php
        }

        $cookie_policy_text = get_theme_mod( 'cookie_policy_text', '' );
        if ( ! empty( $cookie_policy_text ) ) {
            ?>
            .easy-cookies-policy-content  > span{
            color: <?php echo $cookie_policy_text; ?>  !important;
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
        parent::actions($panel, 'cookies', 'Cookies Colors', $description, $priority, $capability, $theme_supports);

        // Cookie Policy Background
        new ColorControl(
            $this,
            'cookie_policy_background',
            'Cookie Policy Background Color'
        );

        // Cookie Policy Text
        new ColorControl(
            $this,
            'cookie_policy_text',
            'Cookie Policy Text Color'
        );
    }
}
