<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;
use Theme\Customizer\Controls\RangeControl;
use Theme\Customizer\Sections\Section;

class TopMenuSection extends Section
{
    /**
     * @return void
     */
    public function render()
    {
        $top_menu_link_color = get_theme_mod('top_menu_link_color', '');
        if (!empty($top_menu_link_color)) {
            ?>
            .navbar-item, .navbar-link, .navbar__dropdown {
            color: <?php echo $top_menu_link_color; ?>;
            }
            <?php
        }

        $top_menu_link_icon_color = get_theme_mod('top_menu_link_icon_color', '');
        if (!empty($top_menu_link_icon_color)) {
            ?>
            .navbar-link::after {
            border-color: <?php echo $top_menu_link_icon_color; ?> !important;
            }
            <?php
        }


        $top_menu_link_hover_color = get_theme_mod('top_menu_link_hover_color', '');
        if (!empty($top_menu_link_hover_color)) {
            ?>
            .navbar-link.is-active, .navbar-link:hover, a.is-active.navbar__dropdown, a.navbar-item.is-active, a.navbar-item:hover, a.navbar__dropdown:hover {
            color: <?php echo $top_menu_link_hover_color; ?> !important;
            }
            <?php
        }

        $top_menu_link_hover_background_color = get_theme_mod('top_menu_link_hover_background_color', '');
        if (!empty($top_menu_link_hover_background_color)) {
            ?>
            .navbar-link.is-active, .navbar-link:hover, a.is-active.navbar__dropdown, a.navbar-item.is-active, a.navbar-item:hover, a.navbar__dropdown:hover {
            background-color: <?php echo $top_menu_link_hover_background_color; ?> !important;
            }

            .navbar__dropdown:hover .navbar-link {
                background-color:<?php echo $top_menu_link_hover_background_color; ?>;
            }

            <?php
        }

        $top_menu_background_color_gradient_top = get_theme_mod('top_menu_background_grad_top', '');
        $top_menu_background_color_gradient_top_position = get_theme_mod('top_menu_background_grad_top_position', '100');
        $top_menu_background_color_gradient_bottom = get_theme_mod('top_menu_background_grad_bottom', '');
        $top_menu_background_color_gradient_bottom_position = get_theme_mod('top_menu_background_grad_bottom_position', '50');
        if (!empty($top_menu_background_color_gradient_top) && !empty($top_menu_background_color_gradient_bottom)) {
            ?>
            .navbar {
            background: linear-gradient(to bottom, <?php echo $top_menu_background_color_gradient_top; ?> <?php echo $top_menu_background_color_gradient_top_position; ?>%,
            <?php echo $top_menu_background_color_gradient_bottom; ?> <?php echo $top_menu_background_color_gradient_bottom_position; ?>%) !important;
            }
            <?php
        }

        $searchbox_icon_color = get_theme_mod('searchbox_icon_color', '');
        if (!empty($searchbox_icon_color)) {
            ?>
            .searchform__form:before {
                color: <?php echo $searchbox_icon_color; ?> !important;
            }
            <?php
        }
    }

    public function actions(
        $panel = '',
        $section_id = '',
        $title = '',
        $description = null,
        $priority = 0,
        $capability = 'edit_theme_options',
        $theme_supports = ''
    )
    {
        parent::actions($panel, 'top_menu', 'Top Menu', $description, $priority, $capability, $theme_supports);


        new ColorControl(
            $this,
            'top_menu_link_color',
            'Top Menu Link Color'
        );
        new ColorControl(
            $this,
            'top_menu_link_icon_color',
            'Top Menu Link Icon Color'
        );

        new ColorControl(
            $this,
            'top_menu_link_hover_color',
            'Top Menu Hover Link Color'
        );

        new ColorControl(
            $this,
            'top_menu_link_hover_background_color',
            'Top Menu Hover Link Hover Background Color'
        );

        new ColorControl(
            $this,
            'top_menu_link_hover_background_color',
            'Top Menu Hover Link Hover Background Color'
        );

        new ColorControl(
            $this,
            'top_menu_background_grad_top',
            'Top Menu Background Gradient: Top Color',
            'Set or change the upper top color. If bottom gradient color is not set, this will be used as it.'
        );

        new RangeControl(
            $this,
            'top_menu_background_grad_top_position',
            'Top Menu Gradient Top Position',
            0,
            100,
            1,
            'Set the gradient percent from top to bottom, 100% means no gradient. Default is 100.',
            100
        );

        new ColorControl(
            $this,
            'top_menu_background_grad_bottom',
            'Top Menu Background Gradient: Bottom Color',
            'Set or change the bottom gradient color. You can ignore this if you do not want to use gradient.'
        );

        new RangeControl(
            $this,
            'top_menu_background_grad_bottom_position',
            'Top Menu Gradient Bottom Position',
            0,
            100,
            1,
            '',
            0
        );

        new ColorControl(
            $this,
            'searchbox_icon_color',
            'Search Box Icon Color',
            'Change the color of the magnifying glass icon in the search box.'
        );
    }
}