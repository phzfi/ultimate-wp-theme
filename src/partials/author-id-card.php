<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

$user_data = get_user_meta($curauth->data->ID, '', false);

//Calculate the age
if(isset($curauth->birthday)) {
    $birthday = $curauth->birthday;
    $now = time();
    $dob = strtotime($birthday);
    $difference = $now - $dob;
    $age = floor($difference / 31556926);
}
?>
<div class="idCard">
    <h3 class="is-uppercase author__personal-title"><span class="author__border-span"></span><i class="fa fa-id-card" aria-hidden="true"></i> </span><span class="author__title--padded"><?php echo $curauth->first_name; ?>'S</span><span class="author__profile-colored-text"> ID Card</span></h3>
    <table>
        <tr class="table__row--with-border">
            <td class="table__column--padded"><strong class="table__column--padded-left"><?php _e('Name'); ?></strong></td>
            <td class="table__column--padded"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></td>
        </tr>
        <tr class="table__row--with-border">
            <td class="table__column--padded"><strong class="table__column--padded-left"><?php _e('Nickname'); ?></strong></td>
            <td class="table__column--padded"><?php echo $curauth->nickname;; ?></td>
        </tr>
        <tr class="table__row--with-border">
            <td class="table__column--padded"><strong class="table__column--padded-left"><?php _e('Age'); ?></strong></td>
            <td class="table__column--padded"><?php echo $age; ?> <?php _e('years old'); ?></td>
        </tr>
        <tr class="table__row--with-border">
            <td class="table__column--padded"><strong class="table__column--padded-left"><?php _e('Title'); ?></strong></td>
            <td class="table__column--padded"><?php echo $curauth->title; ?></td>
        </tr>
        <tr class="table__row--with-border">
            <td class="table__column--padded"><strong class="table__column--padded-left"><?php _e('Hometown'); ?></strong></td>
            <td class="table__column--padded"><?php echo $user_data['city'][0]; ?></td>
        </tr>
    </table>
</div>
