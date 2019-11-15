<?php

namespace Theme\Customizer\Sections;


use Theme\Customizer\Controls\SelectControl;

class FooterAlignmentSection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        $footer_alignment_left = get_theme_mod( 'footer_left_text_alignment', '' );
        if ( ! empty( $footer_alignment_left ) ) {
            ?>
            .footer__bottom-left {
            text-align: <?php echo $footer_alignment_left; ?> !important;
            }
            <?php
        }

        $footer_alignment_center = get_theme_mod( 'footer_center_text_alignment', '' );
        if ( ! empty( $footer_alignment_center ) ) {
            ?>
            .footer__bottom-center {
            text-align: <?php echo $footer_alignment_center; ?> !important;
            }
            <?php
        }

        $footer_alignment_right = get_theme_mod( 'footer_right_text_alignment', '' );
        if ( ! empty( $footer_alignment_right ) ) {
            ?>
            .footer__bottom-right {
            text-align: <?php echo $footer_alignment_right; ?> !important;
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
        parent::actions($panel, 'footer_alignment', 'Footer Text Alignment', $description, $priority, $capability, $theme_supports);

        // Left alignment selection
        new SelectControl(
            $this,
            'footer_left_text_alignment',
            'Left Footer Text Alignment',
            'Change the alignment of the text in left footer',
            ['left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            ],
            'left'

        );

        // Center alignment selection
        new SelectControl(
            $this,
            'footer_center_text_alignment',
            'Center Footer Text Alignment',
            'Change the alignment of the text in center footer',
            ['left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            ],
            'center'

        );

        // Right alignment selection
        new SelectControl(
            $this,
            'footer_right_text_alignment',
            'Right Footer Text Alignment',
            'Change the alignment of the text in right footer',
            ['left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            ],
            'right'

        );
    }
}

