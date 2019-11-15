<?php

namespace Theme\Customizer;

use Theme\Actions;
use Theme\Customizer\Panels\AdvancedColors;
use Theme\Customizer\Panels\AdvancedSettings;
use Theme\Customizer\Panels\Footer;
use Theme\Customizer\Panels\FrontPageGridSettings;
use Theme\Customizer\Panels\Panel;
use Theme\Render;

/**
 * Class Customizer
 */
class Customizer implements Actions, Render
{
    public static $WP_CUSTOMIZE = null;

    /**
     * @var Panel[]
     */
    protected $panels = [];

    public function __construct()
    {
        $this->panels[] = new AdvancedColors();
        $this->panels[] = new AdvancedSettings();
        $this->panels[] = new Footer();
        $this->panels[] = new FrontPageGridSettings();
    }

    /**
     * Runs all Wordpress actions to register different components.
     *
     * @param array $args
     * @return void
     */
    public function actions(...$args)
    {
        $this::$WP_CUSTOMIZE = $args[0];

        foreach($this->panels as $panel) {
            $panel->actions();
        }
    }


    /**
     * Echoes all contents inside of it.
     *
     * @return void
     */
    public function render()
    {
        echo '<style>';
        foreach($this->panels as $panel) {
            $panel->render();
        }
        echo '</style>';
    }

}