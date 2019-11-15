<?php

namespace Theme\Posts\Input;


use Theme\Posts\InputType\ImageInputType;

class HeroImage extends Input {
    /**
     * @param string $post_id
     */
    public function render( $post_id = '') {
        $image = new ImageInputType();

        add_meta_box( '_hero_image', __( 'Hero image', 'text-domain' ), [$image, 'render'], 'post' , 'side', 'low');
    }

    public function actions( $post_id = '') {
        if( isset( $_POST['_hero_image_input'] ) ) {
            $image_id = (int) $_POST['_hero_image_input'];

            updatePostMeta( $post_id, '_hero_image', $image_id );
        }

    }
}


?>