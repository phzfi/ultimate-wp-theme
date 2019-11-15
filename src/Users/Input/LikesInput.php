<?php

namespace Theme\Users\Input;

use Theme\Users\InputType\ImageInputType;
use Theme\Users\InputType\TextInputType;

class LikesInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $text = new TextInputType();
        $text->render(
            $user_id,
            'tv_show',
            'tv_show',
            'Tv show',
            'Favorites'

        );

        $image = new ImageInputType();
        $image->render(
            $user_id,
            'tv_show_image',
            'tv_show_image',
            'Tv show image'
        );

        $text->render(
            $user_id,
            'destination',
            'destination',
            'Travel Destination'
        );

        $image->render(
            $user_id,
            'destination_image',
            'destination_image',
            'Travel Destination image'
        );

        $text->render(
            $user_id,
            'pastime',
            'pastime',
            'Pastime'
        );

        $image->render(
            $user_id,
            'pastime_image',
            'pastime_image',
            'Pastime Image'
        );
    }

    public function actions( $user_id = '') {
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'tv_show', $_POST['tv_show'] );
        updateUserMeta( $user_id, 'destination', $_POST['destination'] );
        updateUserMeta( $user_id, 'pastime', $_POST['pastime'] );

        updateUserMeta( $user_id, 'tv_show_image', $_POST['tv_show_image'] );
        updateUserMeta( $user_id, 'destination_image', $_POST['destination_image'] );
        updateUserMeta( $user_id, 'pastime_image', $_POST['pastime_image'] );
    }
}


?>