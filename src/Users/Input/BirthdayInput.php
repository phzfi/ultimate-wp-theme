<?php

namespace Theme\Users\Input;

use Theme\Users\InputType\DateInputType;

class BirthdayInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $text = new DateInputType();
        $text->render(
            $user_id,
            'birthday',
            'birthday',
            'Date of birth',
            'This will only used to calculate your age. It wont be shown.'
        );
    }

    public function actions( $user_id = '') {
        var_dump($user_id);
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'birthday', $_POST['birthday'] );
    }
}


?>