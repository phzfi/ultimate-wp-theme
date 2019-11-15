<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <header class="hero is-medium">
        <div class="hero__body" style="background-image: url('<?php if(has_post_thumbnail()) echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); else echo get_option('default_featured_image'); ?>');">
            <div class="hero__image-cover">
                <h1 class="hero__title">
                    <?php echo esc_html(get_the_title()); ?>
                </h1>
            </div>
        </div>
    </header>

    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-three-fifths">
                    <article class="article article--single-post">
                        <?php the_content(); ?>
                    </article>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; else : ?>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-three-fifths has-text-centered">
                    <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>
