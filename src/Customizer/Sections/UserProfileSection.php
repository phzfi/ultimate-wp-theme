<?php

namespace Theme\Customizer\Sections;

use Theme\Customizer\Controls\ColorControl;

class UserProfileSection extends Section {

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
        parent::actions($panel, 'user_profile', 'User Profile colors', $description, $priority, $capability, $theme_supports);

        new ColorControl(
            $this,
            'user_profile_background',
            'User profile background color',
            'This sets the background, the borders are set in the accent colors.'
        );

        new ColorControl(
            $this,
            'user_profile_title_color',
            'User profile title color',
            'Change the color of the text in the pages main section.'
        );

    }

    /**
     * @return void
     */
    public function render()
    {
        $user_profile_background = get_theme_mod( 'user_profile_background', '' );
        if ( ! empty( $user_profile_background ) ) {
            ?>
            .author__bio, .author__socialmedia, .author__profile--pictures, .author__bottom {
            background-color: <?php echo $user_profile_background; ?>  !important;
            }
            <?php
        }

        $user_profile_title_color = get_theme_mod( 'user_profile_title_color', '' );
        if ( ! empty( $user_profile_title_color ) ) {
            ?>
            .author__profile-details--value, .author__connectwith, .hero__title--colored {
                color: <?php echo $user_profile_title_color; ?>;
            }
            <?php
        }

        $accent_color = get_theme_mod( 'accent_color', '' );
        if ( ! empty( $accent_color ) ) {
            ?>
            .author__profile-details--label, .author__equipment--title-colored, .author__profile--colored-text, .author__read-more {
                color: <?php echo $accent_color; ?> !important;
            }
            .author__bottom, .author__bio {
                border-top: 20px solid <?php echo $accent_color; ?>;
                border-bottom: 20px solid <?php echo $accent_color; ?>;
            }
            .author__border-span {
                border-left: 2px solid <?php echo $accent_color; ?>;
            }
            .author__equipment--title {
                border-top: 2px solid <?php echo $accent_color; ?>;
            }
            .author__equipment .author__equipment--title .author__equipment--title-colored, .author__profile--colored-text {
                color: <?php echo $accent_color; ?>;
            }

            <?php
        }
    }

}