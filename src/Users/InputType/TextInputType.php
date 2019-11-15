<?php

namespace Theme\Users\InputType;

class TextInputType{

    /**
     * @return void
     */
    public function render(
        $user_id = '',
        $name = '',
        $id = '',
        $label = '',
        $group_title = ''
    ){ ?>
        <?php if ($group_title != ''): ?>
        <tr>
            <th><h3><?php _e($group_title);?></h3></th>
        </tr>
        <?php  endif; ?>
        <tr>
        <th><label for=<?php _e($label);?>><?php _e($label); ?></label></th>
        <td>
            <input type="text" name=<?php _e($name);?> id=<?php _e($id);?> value="<?php echo esc_attr( get_the_author_meta( $name, $user_id ) ); ?>"  class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your " .$name."."); ?></span>
        </td>
        </tr><?php
    }
}

?>