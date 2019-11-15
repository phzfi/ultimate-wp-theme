<?php

namespace Theme\Users\Input;


use Theme\Users\InputType\ImageInputType;

class ProfileImageInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $image = new ImageInputType();
        $image->render(
            $user_id,
            'image',
            'image',
            'Profile',
            'Images'
        );

        $image->render(
            $user_id,
            'banner image',
            'banner_image',
            'Banner'
        );

        $image->render(
            $user_id,
            'additional image 1',
            'additional_image_1',
            'Additional 1'
        );

        $image->render(
            $user_id,
            'additional image 2',
            'additional_image_2',
            'Additional 2'
        );

        $image->render(
            $user_id,
            'additional image 3',
            'additional_image_3',
            'Additional 3'
        );
    }

    public function actions( $user_id = '') {
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'image', $_POST['image'] );
        updateUserMeta( $user_id, 'banner_image', $_POST['banner_image'] );
        updateUserMeta( $user_id, 'additional_image_1', $_POST['additional_image_1'] );
        updateUserMeta( $user_id, 'additional_image_2', $_POST['additional_image_2'] );
        updateUserMeta( $user_id, 'additional_image_3', $_POST['additional_image_3'] );
    }
}


?>