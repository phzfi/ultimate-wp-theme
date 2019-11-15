<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;
use Theme\Customizer\Controls\RangeControl;

class HeroSection extends Section {
    /**
     * @return void
     */
    public function render()
    {
        $hero_cover_color = get_theme_mod( 'hero_cover_color', '' );
        $hero_cover_alpha = get_theme_mod( 'hero_cover_alpha', 100);
        if ( ! empty( $hero_cover_color ) &&  ! empty( $hero_cover_alpha ) ) {
            $hex_without_hash = substr($hero_cover_color,1);
            $r = hexdec(substr($hex_without_hash, 0, 2));
            $g = hexdec(substr($hex_without_hash, 2, 2));
            $b = hexdec(substr($hex_without_hash, 4, 2));
            ?>
            .hero__image-cover {
            background-color: rgba( <?php echo "$r,$g,$b,"; echo $hero_cover_alpha / 100; ?> ) !important;
            }
            <?php
        }
    }

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
        parent::actions($panel, 'hero', 'Hero Colors', $description, $priority, $capability, $theme_supports);

        new ColorControl($this,'hero_cover_color', 'Hero Cover Color');

        new RangeControl(
            $this,
            'hero_cover_alpha',
            'Hero Cover Alpha',
            0,
            100,
            1,
            'Set the Alpha in Hero Cover in percents. 100% means solid color.'
        );
    }
}