<?php

namespace Theme;

use Theme\Posts\Posts;
use Theme\Users\Users;
use Theme\Customizer\Customizer;

/**
 * Class Theme
 * @package Theme
 */
class Theme implements Actions
{
    public function __construct()
    {

    }

    /**
     * Runs all Wordpress actions to register different components.
     *
     * @param array $args
     * @return void
     */
    public function actions(...$args)
    {
        //Creates customizer
        $customizer = new Customizer();
        addAction('customize_register',  [$customizer, 'actions']);
        addAction('wp_head', [$customizer, 'render'], 100);

        //Creates custom user fields
        $user = new Users();
        addAction('show_user_profile', [$user, 'render']);
        addAction('edit_user_profile', [$user, 'render']);

        //Creates custom post fields
        $posts = new Posts();
        addAction( 'add_meta_boxes', [$posts, 'render'] );
        addAction( 'save_post', [$posts, 'actions'], 10, 1 );

        // Add JS file
        addAction('admin_enqueue_scripts',[$user, 'load_scripts']);

        addAction('personal_options_update', [$user, 'actions']);
        addAction('edit_user_profile_update', [$user, 'actions']);
    }


}