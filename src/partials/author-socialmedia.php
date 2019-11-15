<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

$user_data = get_user_meta($curauth->data->ID, '', false);
?>
<h4 class="author__connectwith is-capitalized">
    <i class="fa fa-share-alt" aria-hidden="true"></i>
    <span class="author__profile--colored-text">Follow</span><span> <?php echo $curauth->first_name; ?></span>
</h4>
<table class="author__socialmedia is-size-7">
    <?php if (isset($user_data['linkedIn'][0]) && $user_data['linkedIn'][0] != ''): ?>
        <tr>
            <td class="table__column--no-borders table__column--vertical-middle table__column--padded">
                <a class="socialmedia__link is-size-7" href="<?php echo $user_data['linkedIn'][0]; ?>">LinkedIn</a>
            </td>
            <td class="table__column--no-borders table__column--padded"></td>
            <td class="table__column--no-borders table__column--vertical-middle table__column--padded">
                <a href="<?php echo $user_data['linkedIn'][0]; ?>" class="socialmedia__button has-background-linkedin is-size-7"><?php _e('Follow')?></a>
            </td>
        </tr>
    <?php endif;?>
    <?php if (isset($curauth->facebook) && $curauth->facebook != ''): ?>
        <tr>
            <td class="table__column--no-borders table__column--vertical-middle table__column--padded">
                <a class="socialmedia__link is-size-7" href="<?php echo $curauth->facebook; ?>">Facebook</a>
            </td>
            <td class="table__column--no-borders table__column--padded"></td>
            <td class="table__column--no-borders table__column--vertical-middle table__column--padded">
                <a href="<?php echo $curauth->facebook; ?>" class="socialmedia__button has-background-facebook is-size-7"><?php _e('Follow')?></a>
            </td>
        </tr>
    <?php endif; ?>
    <?php if (isset($curauth->twitter) && $curauth->twitter != ''): ?>
        <tr>
            <td class="table__column--no-borders table__column--vertical-middle table__column--padded">
                <a class="socialmedia__link is-size-7" href="<?php echo $curauth->twitter; ?>">Twitter</a>
            </td>
            <td class="table__column--no-borders table__column--padded"></td>
            <td class="table__column--no-borders table__column--vertical-middle table__column--padded">
                <a href="<?php echo $curauth->twitter; ?>" class="socialmedia__button has-background-twitter is-size-7"><?php _e('Follow')?></a>
            </td>
        </tr>
    <?php endif; ?>
</table>
