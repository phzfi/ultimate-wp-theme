<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;

class AdditionalSections extends Section {

    /**
     * @return void
     */
    public function render()
    {
        $accent_color = get_theme_mod( 'accent_color', '' );
        if ( ! empty( $accent_color ) ) {
            ?>
            .header {
            border-bottom: 4px solid <?php echo $accent_color; ?> !important;
            }
            .navbar::after, .media-card {
            background-color: <?php echo $accent_color; ?>;
            }
            .media-card:hover .media-card__read-more {
            color: <?php echo $accent_color; ?>;
            }
            @keyframes media-card-title-border {
                100% {
                border-left: 5px solid <?php echo $accent_color; ?>;
                }

            }
            <?php
        }

        $form_hover_color = get_theme_mod( 'form_hover_color', '' );
        if ( ! empty( $form_hover_color ) ) {
            ?>
            .input:hover, .ginput_container input:hover, .input.is-hovered, .ginput_container input.is-hovered, .textarea:hover, .textarea.is-hovered,
            .input:focus, .ginput_container input:focus, .input.is-focused, .ginput_container input.is-focused, .input:active, .ginput_container input:active, .input.is-active, .ginput_container input.is-active, .textarea:focus, .textarea.is-focused, .textarea:active, .textarea.is-active{
                border-color: <?php echo $form_hover_color; ?> !important;
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
        parent::actions($panel, 'additional', 'Additional Colors', $description, $priority, $capability, $theme_supports);
        // Accent color
        new ColorControl(
            $this,
            'accent_color',
            'Accent color'
        );

        // Form hover border color
        new ColorControl(
            $this,
            'form_hover_color',
            'Form hover border color'
        );
    }
}

