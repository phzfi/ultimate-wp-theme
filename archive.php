<?php get_header();
/*
Template Name: Archive
*/
?>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-three-fifths">
                    <h1>Archive</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <?php
            if ( have_posts() ) {
            ?>
            <div class="columns">
                <div class="column is-one-fifth">
                    <aside class="menu">
                        <ul class="menu-list menu-list--archive-page">
                            <?php
                            wp_get_archives('type=monthly');
                            ?>
                        </ul>
                    </aside>
                </div>
                <div class="column is-three-fifths">
                    <div class="columns is-multiline">
                        <?php
                             while ( have_posts() ) {
                                the_post();

                                 if(is_archive()) {
                        ?>
                        <div class="column is-full">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                <div class="card card--clickable">
                                    <div class="columns is-marginless is-vcentered">
                                        <div class="column column--archive-thumbnail is-one-quarter">
                                            <div class="image is-square card--archive-thumbnail"
                                                 style="background-image: url('<?php if(has_post_thumbnail()) echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); else echo get_option('default_featured_image'); ?>');">
                                            </div>
                                        </div>
                                        <div class="column">
                                            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
                                            <h1 class="card--archive-title"><?php echo esc_html(get_the_title()); ?></h1>
                                            <span class="card__link">Read more&nbsp;&nbsp;<i class="fa fa-long-arrow-right card__icon" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php   }
                             }

                        if($wp_query->max_num_pages > 1) { ?>
                            <div class="column is-full">
                                <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                                    <?php numeric_posts_nav(); ?>
                                </nav>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
    </section>

<?php get_footer(); ?>