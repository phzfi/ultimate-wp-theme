<html class="has-navbar-fixed-top" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="contact" content="<?php bloginfo('admin_email'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="<?php echo get_option('page_keywords'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar is-fixed-top<?php if(is_admin_bar_showing()) echo ' navbar--adminbar-fixed-top'; ?>" role="navigation" aria-label="dropdown navigation">
    <div class="navbar-brand">
        <a class="navbar_item" href="<?php echo get_home_url(); ?>">
            <img width="100" height="100" class="navbar__logo" src="<?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo $image[0];
            ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </a>
        <a role="button" class="navbar-burger" data-target="main-navbar" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu" id="main-navbar">
        <?php
        wp_nav_menu([
            'theme_location'    => 'navbar-left',
            'items_wrap' => '%3$s',
            'container_class'   => 'navbar-start',
            'walker'            => new NavWalker
        ]);
        wp_nav_menu([
            'theme_location'    => 'navbar-right',
            'items_wrap' => '%3$s',
            'container_class'   => 'navbar-end',
            'walker'            => new NavWalker
        ]);
        ?>
    </div>
</nav>
