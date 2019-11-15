<?php

namespace Theme\Customizer\Controls;

use Theme\Customizer\Sections\Section;
use Theme\Customizer\Customizer;
use WP_Customize_Cropped_Image_Control;

class ImageControl extends Control {

    /**
     * ImageControl constructor.
     * @param $section
     * @param $control_id
     * @param $label
     * @param $width
     * @param $height
     * @param string $default
     */
    public function __construct(
        $section,
        $control_id,
        $label,
        $width,
        $height,
        $default = ''
    )
    {
        if (is_a($section, Section::class)) {
            $section = $section->section_id;
        }

        parent::__construct($control_id, $default);

        Customizer::$WP_CUSTOMIZE->add_setting(
            $control_id,
            [
                'default' => $this->default,
                'transport' => 'refresh',
            ]
        );

        Customizer::$WP_CUSTOMIZE->add_control(
            new WP_Customize_Cropped_Image_Control(
                Customizer::$WP_CUSTOMIZE,
                'footer_logo',
                array(
                    'label'      => __($label, 'theme'),
                    'section'    => $section,
                    'settings'   => $control_id,
                    'width'       => $width,
                    'height'      => $height,
                )
            )
        );
    }
}