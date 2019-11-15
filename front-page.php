<?php
use Theme\Cards\Cards;
/*
Template Name: Frontpage
*/
get_header();

$query = new Cards();
$query->render('header');
$query->render('grid');

wp_reset_postdata();

$page = get_post(get_the_ID());
if(strlen($page->post_content) > 0) {
?>
<section class="section">
    <div class="container">
        <?php echo $page->post_content; ?>
    </div>
</section>
<?php } ?>
<section class="section">
    <div class="container">
        <?php
        // This prints out a form if we have ACF and Gravity form activated
        if(function_exists('get_field') && function_exists('gravity_form')) {
            $form_object = get_field('contact_us_form');
           if($form_object) {
               echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
           }
        }
        ?>
    </div>
</section>
<?php get_footer(); ?>