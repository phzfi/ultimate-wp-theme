<?php

namespace Theme\Customizer\Controls;

use Theme\Customizer\Sections\Section;
use Theme\Customizer\Customizer;


class RangeControl extends Control {
    /**
     * RangeControl constructor.
     * @param string|Section $section
     * @param $control_id
     * @param $label
     * @param int $min
     * @param int $max
     * @param int $step
     * @param null $description
     * @param int $default
     */
    public function __construct(
        $section,
        $control_id,
        $label,
        $min = 0,
        $max = 100,
        $step = 1,
        $description = null,
        $default = '50'
    ){
        if(is_a($section, Section::class)){
            $section = $section->section_id;
        }

        parent::__construct($control_id, $default);

        Customizer::$WP_CUSTOMIZE->add_setting($control_id, array(
            'default' => $default,
            'transport' => 'refresh'
        ));

        Customizer::$WP_CUSTOMIZE->add_control($control_id, array(
            'type' => 'range',
            'section' => $section,
            'label' => __($label, 'mytheme'),
            'description' => $description === null ? null : __($description, 'mytheme'),
            'input_attrs' => array(
                'min' => $min,
                'max' => $max,
                'step' => $step
            ),
        ));
    }
}