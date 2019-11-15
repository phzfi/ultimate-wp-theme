<?php

namespace Theme\Customizer\Panels;

use Theme\Customizer\Sections\DoubleWideSection;
use Theme\Customizer\Sections\PlayerCardSection;
use Theme\Customizer\Sections\GridSettingsSection;

/**
 * Class FrontPageGridSettings
 * @package Theme\Customizer\Panels
 */
class FrontPageGridSettings extends Panel {

    public function __construct()
    {
        $this->sections[] = new GridSettingsSection();
        $this->sections[] = new DoubleWideSection();
        $this->sections[] = new PlayerCardSection();
    }

    /**
     * Registers panel and all its sections.
     *
     * @return void
     */
    public function actions()
    {
        $this->create(
            'front_page_grid_settings',
            'Front Page Grid Settings'
        );

        parent::actions();
    }
}