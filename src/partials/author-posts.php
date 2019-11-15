<?php
if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;

?>

 <h3 class="postsby is-uppercase author__personal-title"><span class="author__border-span"></span><i class="fa fa-bookmark" aria-hidden="true"></i></span><span class="author__title--padded"> <?php echo $curauth->first_name; ?>'S</span><span class="author__profile-colored-text"> Posts</span></h3>
<ul>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li>
                <span id="post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </span>
            </li>

    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>
    <?php endif; ?>
    </ul>