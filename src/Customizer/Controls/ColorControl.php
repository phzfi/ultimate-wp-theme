<?php

namespace Theme\Customizer\Controls;

use Theme\Customizer\Sections\Section;
use Theme\Customizer\Customizer;
use WP_Customize_Color_Control;

class ColorControl extends Control {
    /**
     * ColorControl constructor.
     * @param $section
     * @param $control_id
     * @param $label
     * @param $description
     * @param string $default
     */
    public function __construct(
        $section,
        $control_id,
        $label,
        $description = null,
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
                'sanitize_callback' => 'sanitize_hex_color',
            ]
        );
        Customizer::$WP_CUSTOMIZE->add_control(
            new WP_Customize_Color_Control(
                Customizer::$WP_CUSTOMIZE,
                $control_id,
                [
                    'section' => $section,
                    'label' => __($label, 'theme'),
                    'description' => $description === null ? null : __($description, 'mytheme'),
                    'settings'   => $control_id,
                ]
            )
        );
    }
}