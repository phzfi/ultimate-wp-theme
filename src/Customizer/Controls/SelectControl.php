<?php

namespace Theme\Customizer\Controls;

use Theme\Customizer\Sections\Section;
use Theme\Customizer\Customizer;

class SelectControl extends Control {

    /**
     * SelectControl constructor.
     * @param $section
     * @param $control_id
     * @param $label
     * @param $description
     * @param array $choices
     * @param string $default
     */
    public function __construct(
        $section,
        $control_id,
        $label,
        $description = null,
        $choices = [],
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
            $control_id,
            [
                'section' => $section,
                'label' => __($label, 'theme'),
                'type' => 'select',
                'description' => $description === null ? null : __($description, 'mytheme'),
                'choices' => $choices
            ]
        );
    }
}