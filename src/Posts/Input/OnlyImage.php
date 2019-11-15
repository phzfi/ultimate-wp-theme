<?php

namespace Theme\Posts\Input;


use Theme\Posts\InputType\CheckboxInputType;

class OnlyImage extends Input {
    /**
     * @param string $post_id
     */
    public function render( $post_id = '') {
        $checkbox = new CheckboxInputType();

        add_meta_box( '_only_image', __( 'This is an advertisement so hide the text', 'text-domain' ), [$checkbox, 'render'], 'post' , 'normal', 'high');
    }

    public function actions( $post_id = '') {
        if( isset( $_POST['_only_image'] ) ) {
            $checkbox_id = (int) $_POST['_only_image'];
            updatePostMeta( $post_id, '_only_image', $checkbox_id );
        }

    }
}


?>