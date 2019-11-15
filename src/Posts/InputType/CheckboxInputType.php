<?php

namespace Theme\Posts\InputType;

class CheckboxInputType{

    /**
     * @return void
     */
    public function render(
        $post = '',
        $data = ''
    ){
        $cb_value = get_post_meta($post->ID, $data['id'], true);
        ?>
        <p>
            <label><input type="checkbox" name="<?php echo $data['id'];?>" value=1 <?php echo $cb_value == 1 ? 'checked' : ''; ?> /><?php _e($data['title'] ); ?></label>
        </p>
        <?php
    }
}

?>