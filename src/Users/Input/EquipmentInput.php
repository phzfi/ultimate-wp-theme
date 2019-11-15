<?php

namespace Theme\Users\Input;

use Theme\Users\InputType\TextInputType;

class EquipmentInput extends Input {
    /**
     * @param string $user_id
     */
    public function render( $user_id = '') {
        $text = new TextInputType();
        $text->render(
            $user_id,
            'laptop',
            'laptop',
            'Laptop',
            'Equipments'
        );
        $text->render(
            $user_id,
            'mouse_model',
            'mouse_model',
            'Mouse'
        );
        $text->render(
            $user_id,
            'operating_system',
            'operating_system',
            'Operating system'
        );
    }

    public function actions( $user_id = '') {
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        updateUserMeta( $user_id, 'laptop', $_POST['laptop'] );
        updateUserMeta( $user_id, 'mouse_model', $_POST['mouse_model'] );
        updateUserMeta( $user_id, 'operating_system', $_POST['operating_system'] );
    }
}


?>