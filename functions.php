<?php

require __DIR__.'/vendor/autoload.php';

use Theme\Theme;

function addAction(string $id, array $callback, int $priority = 10) {
    add_action($id, $callback, $priority);
}

function updateUserMeta($user_id, string $name){
    update_user_meta( $user_id, $name, $_POST[$name] );
}

function updatePostMeta($post_id, string $name, $post){
    update_post_meta( $post_id, $name, $post );
}

$theme = new Theme();
$theme->actions();

require_once('src/NavWalker.php');
require_once('src/FooterWalker.php');


add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo',
    array(
        'height'      => 200,
        'width'       => 496,
        'flex-height' => true,
        'flex-width'  => true
    ));

// Register nav menus
function register_navigation() {
    register_nav_menus([
        'navbar-left' => __( 'Navbar Menu Left' ),
        'navbar-right' => __( 'Navbar Menu Right' ),
        'footer-pages' => __( 'Footer Pages' ),
        'footer-technical' => __( 'Footer Technical' ),
        'footer-social-media' => __( 'Footer Social Media' ),
        'footer-help' => __( 'Footer Help' )
  ]);
}
add_action( 'init', 'register_navigation' );

add_filter('previous_posts_link_attributes', 'posts_link_attributes_previous');
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');

function posts_link_attributes_previous() {
    return 'class="pagination-previous"';
}

function posts_link_attributes_next() {
    return 'class="pagination-next"';
}

function theme_settings_page() {
?>
    <div class="wrap">
        <h1>Theme settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('section');
            do_settings_sections('theme-options');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

function add_theme_menu_item() {
    add_menu_page('Theme settings', 'Theme settings', 'manage_options', 'theme-panel', 'theme_settings_page', null, 99);
}

add_action('admin_menu', 'add_theme_menu_item');

function display_keywords_element() {
?>
    <input type="text" name="page_keywords" id="page_keywords" value="<?php echo get_option('page_keywords'); ?>" /> <i>e.g. Ultimate, Theme, Wordpress</i>...
<?php
}

function display_featured_image_element() {
    ?>
    <input type="text" name="default_featured_image" id="default_featured_image" value="<?php echo get_option('default_featured_image'); ?>" /> <i>Url to default featured image</i>
<?php
}

function display_footer_content_left() {
    ?>
    <textarea name="footer_content_left" id="footer_content_left"><?php echo get_option('footer_content_left'); ?></textarea>
<?php
}

function display_footer_content_center() {
    ?>
    <textarea name="footer_content_center" id="footer_content_center"><?php echo get_option('footer_content_center'); ?></textarea>
    <?php
}


function display_footer_content_right() {
    ?>
    <textarea name="footer_content_right" id="footer_content_right"><?php echo get_option('footer_content_right'); ?></textarea>
<?php
}

function display_theme_settings_fields() {
    add_settings_section('section', 'All Settings', null, 'theme-options');
    add_settings_field('page_keywords', 'Page keywords', 'display_keywords_element', 'theme-options', 'section');
    register_setting('section', 'page_keywords');
    add_settings_field('default_featured_image', 'Default featured image', 'display_featured_image_element', 'theme-options', 'section');
    register_setting('section', 'default_featured_image');
}

add_action('admin_init', 'display_theme_settings_fields');

// https://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
function numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    if ( get_previous_posts_link() )
        previous_posts_link('Newer posts');

    echo '<ul class="pagination-list">' . "\n";

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' is-current' : '';

        printf( '<li><a class="pagination-link%s" href="%s" aria-label="Goto page 1">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li><span class="pagination-ellipsis">&hellip;</span></li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' is-current' : '';
        printf( '<li><a class="pagination-link%s" href="%s" aria-label="Goto page %s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link, $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li><span class="pagination-ellipsis">&hellip;</span></li>' . "\n";

        $class = $paged == $max ? ' is-current' : '';
        printf( '<li><a class="pagination-link%s" href="%s" aria-label="Goto page %s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max, $max );
    }

    echo '</ul>' . "\n";

    if ( get_next_posts_link() )
        next_posts_link('Older posts');
}

/**
 * Proper way to enqueue scripts and styles
 */
function styles() {
    wp_enqueue_style( 'app-styling', get_template_directory_uri() . '/app.css');
}
add_action( 'wp_enqueue_scripts', 'styles' );

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
    if ($args->theme_location=="navbar-right"){
        $items .= get_search_form( false );
    }
        return $items;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function ultimatewptheme_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'ultimatewptheme_widgets_init' );
