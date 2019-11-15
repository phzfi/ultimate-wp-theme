<?php

namespace Theme\Users\InputType;

class CheckboxInputType{

    /**
     * @return void
     */
    public function render(
        $user_id = '',
        $name = '',
        $id = '',
        $label = '',
        $default = '',
        $group_title = ''
    ){?>
        <?php if ($group_title != ''): ?>
            <tr>
                <th><h3><?php _e($group_title);?></h3></th>
            </tr>
        <?php  endif; ?>
        <tr>
        <th><label for=<?php _e($label);?>><?php _e($label); ?></label></th>
        <td>
            <input type="checkbox" name=<?php _e($name);?> id=<?php _e($id);?> value="yes" <?php if (esc_attr( get_the_author_meta( $name ,$user_id )) == "yes") echo "checked"; ?>/><br />
        </td>
        </tr><?php
    }
}

?>