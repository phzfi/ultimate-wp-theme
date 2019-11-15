<?php

namespace Theme\Customizer\Panels;

use Theme\Customizer\Sections\FooterAlignmentSection;
use Theme\Customizer\Sections\FooterLegalSection;
use Theme\Customizer\Sections\FooterLogoSection;
use Theme\Customizer\Sections\FooterTextBlockSection;

/**
 * Class Footer
 * @package Theme\Customizer\Panels
 */
class Footer extends Panel {

    public function __construct()
    {
        $this->sections[] = new FooterTextBlockSection();
        $this->sections[] = new FooterLegalSection();
        $this->sections[] = new FooterLogoSection();
        $this->sections[] = new FooterAlignmentSection();
    }

    /**
     * Registers panel and all its sections.
     *
     * @return void
     */
    public function actions()
    {
        $this->create(
            'footer',
            'Footer'
        );

        parent::actions();
    }
}