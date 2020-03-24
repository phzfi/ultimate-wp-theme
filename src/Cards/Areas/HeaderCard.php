<?php

namespace Theme\Cards\Areas;

use Theme\Cards\CardTypes\FullHeightCardType;
use Theme\Cards\CardTypes\MediaCardType;

class HeaderCard {

  protected $query;

  protected $posts;

  public function __construct() {
    /*        $args = array(
                'posts_per_page' => 4,
                'ignore_sticky_posts' => 0
            );
            $this->query = new \WP_Query($args);*/

    $this->posts = [
      get_post(4185),
      get_post(2),
      get_post(431),
      get_post(1241),
    ];


  }

  public function render() {
    $text = "
      <header class=\"header\">
        <div class=\"header__body\">
            <div class=\"header__columns is-multiline\">
                <div class=\"header__column is-two-thirds-desktop top-row top-row-1st\">                
                  <a href=\"".get_permalink($this->posts[0]->ID)."\">
                      <span class=\"box-hover\">
                          <h2>{$this->posts[0]->post_title}</h2>
                          <p>
                              {$this->posts[0]->post_excerpt}
                          </p>
                      </span>
                  </a>
                </div>
                <div class=\"header__column is-one-third-desktop top-row top-row-2nd\">
                  <a href=\"".get_permalink($this->posts[1]->ID)."\">
                      <span class=\"box-hover\">
                          <h2>{$this->posts[1]->post_title}</h2>
                          <p>
                              {$this->posts[1]->post_excerpt}
                          </p>
                      </span>
                  </a>
                </div>
                <div class=\"header__column is-half-desktop bot-row bot-row-1st\">
                  <a href=\"".get_permalink($this->posts[2]->ID)."\">
                      <span class=\"box-hover\">
                          <h2>{$this->posts[2]->post_title}</h2>
                          <p>
                              {$this->posts[2]->post_excerpt}
                          </p>
                      </span>
                  </a>
                </div>
                <div class=\"header__column is-half-desktop bot-row bot-row-2nd\">
                  <a href=\"".get_permalink($this->posts[3]->ID)."\">
                      <span class=\"box-hover\">
                          <h2>{$this->posts[3]->post_title}</h2>
                          <p>
                              {$this->posts[3]->post_excerpt}
                          </p>
                      </span>
                  </a>
                </div>
            </div>
        </div>
      </header>
      ";

    print $text;


  }

}