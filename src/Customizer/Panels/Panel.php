<?php

namespace Theme\Customizer\Panels;

use Theme\Customizer\Customizer;
use Theme\Customizer\Sections\Section;

abstract class Panel {

    /**
     * @var string
     */
    public $panel_id;

    /**
     * @var Section[]
     */
    protected $sections = [];

    /**
     * Registers panel and all its sections.
     *
     * @return void
     */
    public function actions()
    {
        foreach ($this->sections as $section){
            $section->actions($this);
        }
    }
    /**
     * Renders panel and all its sections.
     *
     * @return void
     */
    public function render()
    {
        foreach ($this->sections as $section){
            $section->render();
        }
    }

    /**
     * @param $panel_id
     * @param $title
     * @param null $description
     * @param int $priority
     * @param string $capability
     * @param string $theme_supports
     */

    public function create(
        $panel_id,
        $title,
        $description = null,
        $priority = 0,
        $capability = 'edit_theme_options',
        $theme_supports = ''
    ) {

        $this->panel_id = $panel_id;
        Customizer::$WP_CUSTOMIZE->add_panel( $panel_id, array(
            'priority'       => $priority,
            'capability'     => $capability,
            'theme_supports' => $theme_supports,
            'title'          => __($title, 'mytheme'),
            'description'    => $description === null ? null : __($description, 'mytheme'),
        ) );
    }
}