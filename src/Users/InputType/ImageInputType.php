<?php

namespace Theme\Users\InputType;

class ImageInputType{

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
            <input type="text" name=<?php _e($id);?> id=<?php echo $id;?> value="<?php echo esc_attr( get_the_author_meta( $id, $user_id ) ); ?>" class="regular-text" />
            <input type='button' class="button-primary" value="Upload Image" onclick="upload('<?php _e($id);?>')"/><br />
            <span class="description">Please upload an <?php _e($name);?> for your profile.</span>
        </td>
        <td>
            <img src="<?php echo esc_attr( get_the_author_meta( $id, $user_id ) ); ?>" height="128px">
        </td>
        </tr><?php
    }
}

?>