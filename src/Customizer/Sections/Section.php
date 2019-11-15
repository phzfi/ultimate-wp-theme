<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Customizer;
use Theme\Customizer\Panels\Panel;
use Theme\Render;

abstract class Section implements Render {

    /**
     * @var string
     */
    public $section_id;

    public $panel;
    public $title;

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
        if(is_a($panel, Panel::class)){
            $panel = $panel->panel_id;
        }

        $this->section_id = $section_id;
        $this->panel = $panel;
        $this->title = $title;
        Customizer::$WP_CUSTOMIZE->add_section( $section_id, array(
            'priority'       => $priority,
            'capability'     => $capability,
            'theme_supports' => $theme_supports,
            'title'          => __($title, 'mytheme'),
            'description'    =>  $description === null ? null : __($description, 'mytheme'),
            'panel'  => $panel
        ) );
    }

    /**
     * @return void
     */
    public abstract function render ();
}
