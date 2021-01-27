<?php
add_action( 'rest_api_init', function () {
  register_rest_route( 'bikes/v1/', 'get', array(
    'methods' => 'GET',
    'callback' => 'get_bikes'
  ));
});

function get_bikes($request)
{
  $terms = get_terms( 'category' );
  $count = count( $terms );
  $result_array = array();

  if( $count > 0 ) {
    foreach( $terms as $term ) {
      $args = array(
        'post_type'       => 'bikes',
        'posts_per_page'  => -1,
        'tax_query'       => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array($term->slug),
          ),
        )
      );

      $post_array = new WP_Query($args);
      $result_array[$term->name] = $post_array->posts;

      foreach ($result_array[$term->name] as $post)
      {
        $post->prize = carbon_get_post_meta( $post->ID, 'prize');
        $post->text = carbon_get_post_meta( $post->ID, 'text');
        $post->post_image = get_the_post_thumbnail_url($post->ID);
        $post->categories = array();

        $post_categories = wp_get_post_categories( $post->ID );

        foreach($post_categories as $category_id) {
          $cat = get_category( $category_id );
          $post->categories[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
        }
      }
    }
  }

  return $result_array;
}