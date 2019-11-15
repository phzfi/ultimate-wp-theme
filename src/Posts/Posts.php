<?php

namespace Theme\Posts;

use Theme\Actions;
use Theme\Posts\Input\HeroImage;
use Theme\Posts\Input\OnlyImage;
use Theme\Render;

/**
 * Class Users
 */
class Posts implements Actions, Render
{

    /**
     * @var Input[]
     */
    protected $inputs = [];

    protected $custom_post;

    public function __construct()
    {
        $this->inputs[] = new HeroImage();
        $this->inputs[] = new OnlyImage();

    }

    /**
     * Runs all Wordpress actions to register different components.
     *
     * @param array $args
     * @return void
     */
    public function actions(...$args)
    {
        $this->custom_post = get_post();
        foreach($this->inputs as $input) {
            $input->actions($this->custom_post->ID);
        }
    }


    /**
     * Echoes all contents inside of it.
     *
     * @return void
     */
    public function render()
    {
        $this->custom_post = get_post();

        foreach($this->inputs as $input) {
            $input->render($this->custom_post->ID);
        }

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