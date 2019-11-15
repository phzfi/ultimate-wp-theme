<?php

namespace Theme\Users\InputType;

class DateInputType{

    /**
     * @return void
     */
    public function render(
        $user_id = '',
        $name = '',
        $id = '',
        $label = '',
        $description = ''
    ){ ?>
        <tr>
        <th><label for=<?php _e($label);?>><?php _e($label); ?></label></th>
        <td>
            <input type="date" name=<?php _e($name);?> id=<?php _e($id);?> value="<?php echo esc_attr( get_the_author_meta( $name, $user_id ) ); ?>"  class="regular-text" /><br />
            <span class="description"><?php _e( $description != '' ? $description : "Please enter your " .$name."."); ?></span>
        </td>
        </tr><?php
    }
}

?>