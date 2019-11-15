<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
    $image_id_cover = get_post_meta(get_the_ID(),'_hero_image', true );
    $img_cover = wp_get_attachment_url( $image_id_cover);
    $thumbnail = has_post_thumbnail() ?  esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) : get_option('default_featured_image');
    $image_cover_src = $img_cover ? $img_cover : $thumbnail;
    ?>

    <header class="hero is-medium">
        <div class="hero__body" style="background-image: url(<?php echo $image_cover_src;  ?>);">
            <div class="hero__image-cover">
                <h1 class="hero__title">
                    <?php echo esc_html(get_the_title()); ?>
                </h1>
            </div>
        </div>
    </header>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth is-hidden-touch">
                    <div class="card">
                        <div class="card-content">
                            <i class="fa fa-calendar is-size-5" aria-hidden="true"></i><span class="icon-text--padding-left"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time></span>
                        </div>
                        <div class="card-content">
                            <i class="fa fa-pencil is-size-5" aria-hidden="true"></i><span class="icon-text--padding-left"><?php the_author_posts_link(); ?></span>
                        </div>
                        <footer class="card-footer">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>" class="card-footer-item is-size-5 has-text-white has-background-facebook">
                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                            </a>
                            <a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>" class="card-footer-item is-size-5 has-text-white has-background-twitter">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo esc_html(get_the_title()); ?>&summary=&source=" class="card-footer-item is-size-5 has-text-white has-background-linkedin">
                                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            </a>
                        </footer>
                    </div>
                </div>
                <div class="column is-one-fifth is-hidden-mobile is-hidden-desktop"></div>
                <div class="column is-three-fifths">
                    <article class="article article--single-post">
                        <?php the_content(); ?>
                    </article>
                    <div class="is-clearfix"></div>
                    <div class="card is-hidden-desktop">
                        <div class="card-content">
                            <i class="fa fa-calendar is-size-5" aria-hidden="true"></i><span class="icon-text--padding-left"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time></span>
                        </div>
                        <div class="card-content">
                            <i class="fa fa-pencil is-size-5" aria-hidden="true"></i><span class="icon-text--padding-left"><?php the_author_posts_link(); ?></span>
                        </div>
                        <footer class="card-footer">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>" class="card-footer-item is-size-5 has-text-white has-background-facebook">
                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                            </a>
                            <a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>" class="card-footer-item is-size-5 has-text-white has-background-twitter">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo esc_html(get_the_title()); ?>&summary=&source=" class="card-footer-item is-size-5 has-text-white has-background-linkedin">
                                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            </a>
                        </footer>
                    </div>
                    <div class="card is-hidden-touch">
                        <div class="card__socialbar">
                            <div class="card__socialbar-item is-one-quarter">
                                <i class="fa fa-calendar is-size-5" aria-hidden="true"></i>
                                <span class="icon-text--padding-left"><time datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('M j, Y'); ?></time></span>
                            </div>
                            <div class="card__socialbar-item has-text-left is-one-quarter">
                                <i class="fa fa-pencil is-size-5" aria-hidden="true"></i>
                                <span class="icon-text--padding-left"><?php the_author_posts_link(); ?></span>
                            </div>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>" class="card__socialbar-item has-text-white has-background-facebook">
                                    <i class="fa fa-facebook-official is-size-5" aria-hidden="true"></i>
                                    <span class="icon-text--padding-left">Facebook</span>
                                </a>
                                <a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>" class="card__socialbar-item has-text-white has-background-twitter">
                                    <i class="fa fa-twitter is-size-5" aria-hidden="true"></i>
                                    <span class="icon-text--padding-left">Twitter</span>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo esc_html(get_the_title()); ?>&summary=&source=" class="card__socialbar-item has-text-white has-background-linkedin">
                                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                    <span class="icon-text--padding-left">LinkedIn</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>