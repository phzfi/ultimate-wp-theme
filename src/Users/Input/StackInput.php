<?php

namespace Theme\Users\Input;

use Theme\Users\InputType\TextAreaInputType;

class StackInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $text = new TextAreaInputType();
        $text->render(
            $user_id = $user_id,
            $name = 'stack',
            $id = 'stack',
            $label = 'Tech Stack'
        );
    }

    public function actions( $user_id = '') {
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'stack', $_POST['stack'] );
    }
}

?>