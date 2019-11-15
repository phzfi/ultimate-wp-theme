<?php

namespace Theme\Customizer\Controls;

use Theme\Customizer\Sections\Section;
use Theme\Customizer\Customizer;

class NumberControl extends Control {

    /**
     * NumberControl constructor.
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
        $default = null,
        $max = ''
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
                'type' => 'number',
                'description' => $description === null ? null : __($description, 'mytheme')
            ]
        );
    }

}