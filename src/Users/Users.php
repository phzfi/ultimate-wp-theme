<?php

namespace Theme\Users;

use Theme\Actions;
use Theme\Render;
use Theme\Users\Input\BirthdayInput;
use Theme\Users\Input\CityInput;
use Theme\Users\Input\EquipmentInput;
use Theme\Users\Input\LikesInput;
use Theme\Users\Input\ProfileImageInput;
use Theme\Users\Input\ProfileShowSwitchInput;
use Theme\Users\Input\SocialMediaInput;
use Theme\Users\Input\TitleInput;
use Theme\Users\Input\NicknameInput;

/**
 * Class Users
 */
class Users implements Actions, Render
{
    public static $USER;
    /**
     * @var Input[]
     */
    protected $inputs = [];

    public function __construct()
    {
        $this->inputs[] = new ProfileShowSwitchInput();
        $this->inputs[] = new CityInput();
        $this->inputs[] = new NicknameInput();
        $this->inputs[] = new TitleInput();
        $this->inputs[] = new BirthdayInput();
        $this->inputs[] = new ProfileImageInput();
        $this->inputs[] = new SocialMediaInput();
        $this->inputs[] = new LikesInput();
        $this->inputs[] = new EquipmentInput();
    }

    /**
     * Runs all Wordpress actions to register different components.
     *
     * @param array $args
     * @return void
     */
    public function actions(...$args)
    {
        $user = $args[0];
        foreach($this->inputs as $input) {
           $input->actions($user);
        }
    }


    /**
     * Echoes all contents inside of it.
     *
     * @return void
     */
    public function render(...$args)
    {
        $user = $args[0]->data;
        ?>
        <h3><?php _e("Extra profile information", "blank"); ?></h3>
        <?php
        echo '<table class="form-table">';
        foreach($this->inputs as $input) {
            $input->render($user->ID);
        }
        echo '</table>';

    }

    /**
     * Load needed js scripts.
     */
    public function load_scripts() {
        wp_enqueue_script( 'admin', get_template_directory_uri() . '/admin.js');
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_style('thickbox');

        wp_enqueue_script('media-upload');
    }

}