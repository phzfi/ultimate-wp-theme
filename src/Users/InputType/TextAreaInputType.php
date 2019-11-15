<?php

namespace Theme\Users\InputType;

class TextAreaInputType{

    /**
     * @return void
     */
    public function render(
        $user_id = '',
        $name = '',
        $id = '',
        $label = ''
    ){ ?>
        <tr>
        <th><label for=<?php _e($label);?>><?php _e($label); ?></label></th>
        <td>
            <textarea type="text" name=<?php _e($name);?> id=<?php _e($id);?>  cols="40" rows="5" class="regular-text" ><?php echo esc_attr( get_the_author_meta( $name, $user_id ) ); ?></textarea><br />
            <span class="description"><?php _e("Please enter your " .$name."."); ?></span>
        </td>
        </tr><?php
    }
}

?>