<?php

namespace Theme\Posts\InputType;

class ImageInputType{

    /**
     * @return void
     */
    public function render(
        $post = '',
        $data = ''
    ){
        $image_id = get_post_meta($post->ID, $data['id'], true);
        $image_src = wp_get_attachment_url( $image_id );
        ?>
        <img id="<?php echo $data['id'];?>" src="<?php echo $image_src ?>" style="max-width:100%;" />
        <input type="hidden" name="<?php echo $data['id'] . '_input';?>" id="<?php echo $data['id'] . '_input';?>" value="<?php echo $image_id;?>" />
        <p class="hide-if-no-js">
        <a title="<?php esc_attr_e( 'Set book image' ) ?>" class="button-link" onClick="uploadPost('<?php _e($data['id']);?>', '<?php _e($post->ID);?>')" id="set-<?php echo$data['id']; ?>"><?php _e( 'Set hero image' ) ?></a>
        <br />
        <a title="<?php esc_attr_e( 'Remove book image' ) ?>"  onClick="remove('<?php _e($data['id']);?>')" id="remove-<?php echo$data['id']; ?>" style="<?php echo ( ! $image_id ? 'display:none;' : '' ); ?>"><?php _e( 'Remove hero image' ) ?></a>
        </p>
        <?php
    }
}

?>