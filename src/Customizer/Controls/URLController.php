<?php

namespace Theme\Customizer\Controls;

use Theme\Customizer\Sections\Section;
use Theme\Customizer\Customizer;

class URLController extends Control {

    /**
     * URLController constructor.
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
                'sanitize_callback' => 'esc_url_raw'
            ]
        );

        Customizer::$WP_CUSTOMIZE->add_control(
            $control_id,
            [
                'section' => $section,
                'label' => __($label, 'theme'),
                'type' => 'url',
                'description' => $description === null ? null : __($description, 'mytheme'),
            ]
        );
    }
}