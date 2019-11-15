<?php
/**
 * Bulma-Navwalker
 *
 * @package Bulma-Navwalker
 */

/**
 * Class Name: Navwalker
 * Plugin Name: Bulma Navwalker
 * Plugin URI:  https://github.com/Poruno/Bulma-Navwalker
 * Description: An extended Wordpress Navwalker object that displays Bulma framework's Navbar https://bulma.io/ in Wordpress.
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

class FooterWalker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {

    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        if(! isset($args->walker)) {
            return;
        }

        $liClasses = 'basic-list__item '.$item->title;

        $output .= "<li class='".$liClasses."'><a href='".$item->url."'>".$item->title."</li>";

    }

    public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){

        $output .= "</a></li>";

    }

    public function end_lvl (&$output, $depth = 0, $args = array()) {

    }
}
