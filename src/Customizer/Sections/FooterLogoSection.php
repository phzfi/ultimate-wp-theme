<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ImageControl;
use Theme\Customizer\Controls\URLController;

class FooterLogoSection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        if ( get_theme_mod( 'footer_logo' ) > 0 ) {
            $footer_logo =  wp_get_attachment_url( get_theme_mod( 'footer_logo' ) );
        }

        if ( ! empty( $footer_logo ) ) {
            ?>
            .image img, .footer__image .footer__image_src {
                background: url(<?php echo $footer_logo; ?>) no-repeat;
                height: 128px; /* Height of new image */
                padding-left: 128px; /* Equal to width of new image */
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
        parent::actions($panel, 'footer_logo', 'Footer Logo', $description, $priority, $capability, $theme_supports);

        // Footer logo
        new ImageControl(
            $this,
            'footer_logo',
            'Footer logo',
            128,
            128
        );

        //Logo link
        new URLController(
            $this,
            'footer_logo_link',
            'Footer logo link',
            '',
            '/'
        );
    }
}

