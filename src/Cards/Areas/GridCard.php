<?php

namespace Theme\Cards\Areas;

use Theme\Cards\CardTypes\AddCardType;
use Theme\Cards\CardTypes\DoubleWideType;
use Theme\Cards\CardTypes\GridCardType;
use Theme\Cards\CardTypes\PlayerCardType;
use Theme\Customizer\Customizer;

class GridCard
{

  /** @var \WP_Query  */
  protected $query_large;
  protected $query_small;

  // how many items per block?
  protected $large_post_amount = 2;
  protected $small_post_amount = 6;


  /**
   * GridCard constructor.
   */
  public function __construct()
  {

    // settings for queries
    $args_large = [
      'offset'              => 0,
      'posts_per_page'      => 2,
      'ignore_sticky_posts' => 0,
    ];
    $args_small = [
      'ignore_sticky_posts' => 1,
      // 'offset' => 2,
      'posts_per_page'      => 6,
    ];

    // init queries
    $this->query_large = new \WP_Query($args_large);
    $this->query_small = new \WP_Query($args_small);
  }

  public function render()
  {

    // get html for large articles
    $large_html = $this->getLargeHTML($this->query_large->posts);

    /* Restore original Post Data
   * NB: Because we are using new WP_Query we aren't stomping on the
   * original $wp_query and it does not need to be reset with
   * wp_reset_query(). We just need to set the post data back up with
   * wp_reset_postdata().
   */
    wp_reset_postdata();

    // get html for small posts
    $small_html = $this->getSmallHTML($this->query_small->posts);

    // set container
    $text = "
      <section class=\"section front-page-articles\">
          <div class=\"container\">
              <div class=\"columns\">
                  " . $large_html . "                   
                  " . $small_html . "                   
              </div>
          </div>
      </section>
      ";

    // print out section
    print($text);
  }

  /**
   * Extract images from posts.
   *
   * @param $post
   *
   * @return array
   */
  public function postExtractImages($post): array
  {
    // settings and query
    $args            = [
      'post_type'      => 'attachment',
      'post_mime_type' => 'image',
      'numberposts'    => -1,
      'post_status'    => NULL,
      'post_parent'    => $post->ID,
    ];
    $attached_images = get_posts($args);
    $first_image     = reset($attached_images);
    // return all & first image
    return [$attached_images, $first_image];
  }

  /**
   * Exctract tags from posts
   *
   * @param $post
   *
   * @return string
   */
  public function postExtractTags($post): string
  {
    $tags_html = "";
    $post_tags = get_the_tags($post->ID);
    if (is_array($post_tags)) {
      foreach ($post_tags as $tag) {
        $tag_link  = get_term_link($tag);
        $tag_html  = "
                <a href=\"" . $tag_link . "\">#" . $tag->name . "</a>
            ";
        $tags_html .= $tag_html;
      }
    }
    return $tags_html;
  }

  /**
   *  Build and return html for large posts
   *
   * @return string
   * @throws \Exception
   */
  public function getLargeHTML($posts): string
  {
    $large_parts = "";
    $large_index = 0;
    // loop items
    while ($large_index < $this->large_post_amount) {
      // get current post
      $post = $posts[$large_index];
      // extract data
      $post_date      = new \DateTime($post->post_date);
      $post_author_id = $post->post_author;
      // images
      [$post_images, $first_image] = $this->postExtractImages($post);
      // tags
      $tags_html = $this->postExtractTags($post);
      // link to post
      $post_link = get_post_permalink($post->ID);
      // buiold html
      $part = "
            <div class=\"column is-four-fifths is-offset-one-fifth\">
                <div class=\"card\">
                    <div class=\"card-image\">
                        <figure class=\"image is-4by3\">
                            <img src=\"" . $first_image->guid . "\" alt=\"" . $first_image->post_title . "\">
                        </figure>
                    </div>
                    <div class=\"card-content\">
                        <div class=\"media\">
                            <div class=\"media-content\">
                                <h4 class=\"subtitle is-4\">
                                    <a href=\"" . $post_link . "\">" . $post->post_title . "</a>
                                </h4>
                                <span class=\"author\">
                                    <time datetime=\"" . $post_date->format('Y-m-d') . "\">" . $post_date->format('d.m.Y') . "
                                    By <a href=\"#\">" . get_the_author_meta(
        'display_name',
        $post_author_id
      ) . "</a>
                                </span>
                            </div>
                        </div>

                        <div class=\"content\">
                           " . $post->post_excerpt . "
                            " . $tags_html . "
                        </div>
                    </div>
                </div>
            </div>
                ";

      $large_index++;
      $large_parts .= $part;
    }

    $large_html = "
        <div class=\"column is-half big-lift\">
<!--
            <h3 class=\"title\">Tärkeät artikkelit</h3>
-->
            " . $large_parts . "
        </div>
    ";

    // return html
    return $large_html;
  }

  /**
   * Build & return html for small parts
   *
   * @return string
   * @throws \Exception
   */
  public function getSmallHTML($posts): string
  {
    $small_parts = "";
    $small_index = 0;
    // loop items
    while ($small_index < $this->small_post_amount) {

      $post = $posts[$small_index];
      $post_date      = new \DateTime($post->post_date);
      $post_author_id = $post->post_author;
      [$post_images, $first_image] = $this->postExtractImages($post);

      $tags_html = $this->postExtractTags($post);

      $post_link = get_post_permalink($post->ID);

      if ($first_image) {
        $imgstring = "<img src=\"" . $first_image->guid . "\" alt=\"" . $first_image->post_title . "\">";
      } else {
        $imgstring = '';
      }

      $part = "  
        <article class=\"media\">
            <figure class=\"media-left\">
                <p class=\"image is-128x128\">
                    " . $imgstring . "
                </p>
            </figure>
            <div class=\"media-content\">
                <div class=\"content\">
                    <h4 class=\"subtitle is-4\">
                        <a href=\"" . $post_link . "\">" . $post->post_title . "</a>
                    </h4>
                    <span class=\"author\">
                        <time datetime=\"" . $post_date->format('Y-m-d') . "\">" . $post_date->format('d.m.Y') . " 
                        By <a href=\"#\">" . get_the_author_meta(
        'display_name',
        $post_author_id
      ) . "</a>
                        </span>
                    <div class='content'>
                     " . $post->post_excerpt . "
                     " . $tags_html . "
                    </div>
                </div>
            </div>
        </article>
        ";

      $small_index++;
      $small_parts .= $part;
    }

    $small_html = "
        <div class=\"column is-half small-lift\">
<!--
            <h3 class=\"title\">Ehkä pelaajakorttinostot?</h3>
-->
            " . $small_parts . "
        </div>
    ";

    return $small_html;
  }
}
