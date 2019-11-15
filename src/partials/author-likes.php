<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

$user_data = get_user_meta($curauth->data->ID, '', false);
?>
<div class="author__likes is-capitalized">
    <h3  class="is-uppercase is-marginless author__personal-title"><span class="author__border-span"></span><i class="fa fa-heart" aria-hidden="true"></i><span class="author__title--padded"><?php echo $curauth->first_name;?>'S </span><span class="author__profile-colored-text"> <?php _e('Likes'); ?></h3>
    <br />
    <table class="author__likes_table">
        <tr>
            <td class="has-text-centered"><img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta('tv_show_image',$curauth->data->ID )); ?>"></td>
            <td class="has-text-centered table__column--padded-left"><img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta('destination_image',$curauth->data->ID )); ?>"></td>
            <td class="has-text-centered table__column--padded-left"><img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta('pastime_image',$curauth->data->ID )); ?>"></td>
        </tr>
        <tr>
            <td class="has-text-centered"><?php _e('TV Show'); ?></td>
            <td class="has-text-centered table__column--padded-left"><?php _e('Travel destination'); ?></td>
            <td class="has-text-centered table__column--padded-left"><?php _e('Pastime'); ?></td>
        </tr>
        <tr>
            <td class="has-text-centered"><h3><?php echo $user_data['tv_show'][0]; ?></h3></td>
            <td class="has-text-centered table__column--padded-left"><h3><?php echo $user_data['destination'][0];?></h3></td>
            <td class="has-text-centered table__column--padded-left"><h3><?php echo $user_data['pastime'][0]; ?></h3></td>
        </tr>
    </table>

</div>
