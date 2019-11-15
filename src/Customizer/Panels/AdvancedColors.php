<?php

namespace Theme\Customizer\Panels;

use Theme\Customizer\Sections\AdditionalSections;
use Theme\Customizer\Sections\ButtonsSections;
use Theme\Customizer\Sections\CardSection;
use Theme\Customizer\Sections\CookiesSection;
use Theme\Customizer\Sections\FooterColorsSection;
use Theme\Customizer\Sections\HeroSection;
use Theme\Customizer\Sections\TopMenuSection;
use Theme\Customizer\Sections\TypographySection;
use Theme\Customizer\Sections\UserProfileSection;

/**
 * Class AdvancedColors
 * @package Theme\Customizer\Panels
 */
class AdvancedColors extends Panel {

    public function __construct()
    {
        $this->sections[] = new AdditionalSections();
        $this->sections[] = new ButtonsSections();
        $this->sections[] = new CardSection();
        $this->sections[] = new CookiesSection();
        $this->sections[] = new FooterColorsSection();
        $this->sections[] = new HeroSection();
        $this->sections[] = new TopMenuSection();
        $this->sections[] = new TypographySection();
        $this->sections[] = new UserProfileSection();

    }

    /**
     * Registers panel and all its sections.
     *
     * @return void
     */
    public function actions()
    {
        $this->create(
            'advanced_colors',
            'Advanced Colors'
        );

        parent::actions();
    }
}