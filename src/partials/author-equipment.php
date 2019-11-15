<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

$user_data = get_user_meta($curauth->data->ID, '', false);
?>
<div class="author__equipment is-uppercase has-text-centered">
    <div class="author__equipment--title is-size-5">
        <h3 class="author__equipment--title-inline"><?php echo $curauth->first_name; ?>'s</h3> <h3 class="author__equipment--title-colored author__equipment--title-inline"> equipment</h3>
    </div>
    <div class="author__equipment--list">
        <table class="table--centered ">
            <tr>
                <td class="has-text-centered"><?php _e('Laptop'); ?></td>
                <td class="has-text-centered"><?php _e('Operating system'); ?></td>
                <td class="has-text-centered"><?php _e('Mouse'); ?></td>

            </tr>
            <tr>
                <td class="has-text-centered"><h3><?php echo $user_data['laptop'][0]; ?></h3></td>
                <td class="has-text-centered"><h3><?php echo $user_data['operating_system'][0];?></h3></td>
                <td class="has-text-centered"><h3><?php echo $user_data['mouse_model'][0]; ?></h3></td>
            </tr>
        </table>
    </div>
</div>
