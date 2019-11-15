<?php

namespace Theme\Users\Input;

use Theme\Users\InputType\TextInputType;

class TitleInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $text = new TextInputType();
        $text->render(
            $user_id,
            'title',
            'title',
            'Title'
        );
    }

    public function actions( $user_id = '') {
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'title', $_POST['title'] );
    }
}

?>