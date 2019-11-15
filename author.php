<?php get_header(); ?>

<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

$user_data = get_user_meta($curauth->data->ID, '', false);

// Hide profile if user has hidden it.
if(!isset($user_data['profile_on'][0]) || $user_data['profile_on'][0] != 'yes'): ?>
    <div class="author">
        <br />
        <h3 class="has-text-centered"><?php _e("This user doesn't have a profile");?></h3>
        <br />
    </div>
<?php else: ?>
<div class="author">
    <div class="hero">
        <div class="hero__body" style="background-image: url(<?php echo esc_attr( get_the_author_meta('banner_image',$curauth->data->ID )); ?>)">
            <div class="hero__title">
                <h2 class="is-uppercase hero__title--colored"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
            </div>
        </div>
    </div>
    <?php get_template_part( 'src/partials/author', 'bio' ); ?>
    <?php get_template_part( 'src/partials/author', 'equipment' ); ?>
    <br />
    <div class="author__profile--pictures">
        <div class="columns author__profile--pictures-group">
            <div class="column is-one-third">
                <img src="<?php echo esc_attr( get_the_author_meta('additional_image_1',$curauth->data->ID )); ?>">
            </div>
            <div class="column is-one-third">
                <img src="<?php echo esc_attr( get_the_author_meta('additional_image_2',$curauth->data->ID )); ?>">
            </div>
            <div class="column is-one-third">
                <img src="<?php echo esc_attr( get_the_author_meta('additional_image_3',$curauth->data->ID )); ?>">
            </div>
        </div>
    </div>
    <br />
        <div class="columns container is-clearfix author__personal">
            <div class="column is-half bio is-pulled-left">
                <h3 class="is-uppercase author__personal--title"><span class="author__border-span"></span><i class="fa fa-edit" aria-hidden="true"></i><span class="author__title--padded"><?php echo $curauth->first_name; ?>'S </span><span class="author__profile-colored-text">Biography</span></h3>
                <p><?php echo $curauth->description; ?></p>
                <br/>
                <?php get_template_part( 'src/partials/author', 'posts' ); ?>
            </div>
            <div class="is-pulled-right column is-half author__border-left">
                <?php get_template_part( 'src/partials/author', 'id-card' ); ?>
                <br />
                <?php get_template_part( 'src/partials/author', 'likes' ); ?>
            </div>
        </div>
        <div class="clear"></div>

    <br/>
    <div class="author__bottom">
    </div>
</div>

<?php endif; ?>
<?php get_footer(); ?>