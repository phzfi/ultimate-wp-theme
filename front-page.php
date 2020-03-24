<?php

use Theme\Cards\Cards;
/*
Template Name: Frontpage
*/

get_header();

$query = new Cards();

// header -section
$query->render('header');

// lifted posts -section
$query->render('grid');

wp_reset_postdata();

$pageContent = get_post(get_the_ID());
if (strlen($pageContent->post_content) > 0) {
?>
    <!-- Page post content -->
    <section class="section">
        <div class="container">
            <h2 class="title" style="text-align: center;">PHZ Full Stack numeroina</h2>
            <img src="http://wordpress.local/app/uploads/siili_numerot_esim.png" />
            <div class="center">
                <p class="center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Etiam finibus odio quis feugiat facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Etiam finibus odio quis feugiat facilisis.</p>
            </div>
        </div>
    </section>
    <!-- // Page post content -->
    <!-- Page post content -->
    <section class="section">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>
    <!-- // Page post content -->
<?php } ?>
<section class="section">
    <div class="container">
        <?php
        // This prints out a form if we have ACF and Gravity form activated
        if (function_exists('get_field') && function_exists('gravity_form')) {
            $form_object = get_field('contact_us_form');
            if ($form_object) {
                echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
            }
        }
        ?>
    </div>
</section>
<?php get_footer(); ?>
