<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

$user_data = get_user_meta($curauth->data->ID, '', false);
?>
<div class="columns author__bio is-clearfix">
    <div class="column is-one-thirds author__profile is-pulled-left is-uppercase container is-fluid">
        <div class="author__profile-details--item">
            <h2 class="author__profile-details--value  title is-2">
                <span><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></span>
            </h2>
            <span class="author__profile-details--label">
                        <span><?php _e('Name'); ?></span>
                </span>
        </div>
        <div class="author__profile-details--item">
            <h2 class="author__profile-details--value title is-2">
                <span><?php echo $curauth->nickname; ?></span>
            </h2>
            <span class="author__profile-details--label">
                        <span><?php _e('Nickname'); ?></span>
                    </span>
        </div>
        <div class="author__profile-details--item">
            <h2 class="author__profile-details--value title is-2">
                <span><?php echo $curauth->title; ?></span>
            </h2>
            <span class="author__profile-details--label">
                        <span><?php _e('Job title'); ?></span>
                    </span>
        </div>
        <div class="author__profile-details--item">
            <h2 class="author__profile-details--value title is-2">
                <span><?php echo $user_data['city'][0]; ?></span>
            </h2>
            <span class="author__profile-details--label">
                        <span><?php _e('Hometown'); ?></span>
                </span>
        </div>
        <br />
        <?php get_template_part( 'src/partials/author', 'socialmedia' ); ?>
        <br>
    </div>
    <div class="author__profile_image is-pulled-right column is-half">
        <img class="author__user-preview-image" src="<?php echo esc_attr( get_the_author_meta('image',$curauth->data->ID )); ?>">
    </div>
</div>