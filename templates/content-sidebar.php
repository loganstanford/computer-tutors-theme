<div class="cert-container">
  <div class="ct-cert-title"><?php
  $terms = wp_get_post_terms($post->ID, 'certification', array('fields' => 'names'));

$items = array();
  foreach ($terms as $term) {

    $the_query = new WP_Query(array(
      'post_type' => 'class',
      'tax_query' => array(
        'relation' => 'OR',
        array(
        'taxonomy' => 'certification',
        'field' => 'name',
        'terms' => $term
          )
        ),
        'orderby' => 'menu_order',
        'order' => 'ASC'
      )
    );
    echo '<h2 class="cert-title">'.$term.'</h2>';
	echo '<div class="cert-icon"><i class="fa fa-circle ct-cert-icon" aria-hidden="true"></i></div>';
    $items = $the_query->posts;
    echo '<ul class="cert-track-list">';
    foreach ($items as $post) {
      echo '<li class="cert-track-item"><a href="' . get_the_permalink($post) . '">' . $post->post_title . '</a></li>';
    }
    echo '</ul>';
  }



     wp_reset_postdata();

?>
  </div>
  <div class="ct-bar">
    <!--<div class="vert-line"></div>-->
  </div>
  <div class="cert-name"></div>
</div>
