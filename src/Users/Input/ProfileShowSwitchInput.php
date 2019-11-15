<?php

namespace Theme\Users\Input;

use Theme\Users\InputType\CheckboxInputType;

class ProfileShowSwitchInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $text = new CheckboxInputType();
        $text->render(
            $user_id = $user_id,
            $name = 'profile_on',
            $id = 'profile_on',
            $label = 'Show user profile'
        );
    }

    public function actions( $user_id = '') {

        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'profile_on', $_POST['profile_on'] );
    }
}


?>