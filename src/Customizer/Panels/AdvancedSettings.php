<?php

namespace Theme\Customizer\Panels;

use Theme\Customizer\Sections\SearchBoxSection;

/**
 * Class Footer
 * @package Theme\Customizer\Panels
 */
class AdvancedSettings extends Panel {

    public function __construct()
    {
        $this->sections[] = new SearchBoxSection();
    }

    /**
     * Registers panel and all its sections.
     *
     * @return void
     */
    public function actions()
    {
        $this->create(
            'advancedsettings',
            'Advanced Settings'
        );

        parent::actions();
    }
}