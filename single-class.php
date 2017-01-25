<?php

$online = rwmb_meta( 'ct_online');
$gtmlink = rwmb_meta('ct_gtm_link');
$book = rwmb_meta('ct_book');
$bookname = rwmb_meta('ct_book-name');
$bookprice = rwmb_meta('ct_book-price');
$bookisbn = rwmb_meta('ct_book-isbn');
$level = rwmb_meta('ct_level');
$summary = rwmb_meta('ct_summary');
$agenda = rwmb_meta('ct_agenda');
$agendapdf = rwmb_meta('ct_agenda-upload');
$audience = rwmb_meta('ct_audience');
$prereqs = rwmb_meta('ct_prereqs');
$price = rwmb_meta( 'ct_price');

get_header(); ?>
  <div class="row">
    <?php
    if ( wp_get_post_parent_id($post->ID) == 0 && get_post_meta($post->ID, 'ct_standalone', true) == false) {
      $args = array(
        'post_type' => 'class',
        'post_parent' => $post->ID,
        'orderby' => 'menu_order',
        'order' => 'ASC'
      );
      $children = get_posts($args);
      ?>
      <div class="row">
        <h2 class="parent-title">Select your experience level:</h2>
      </div>
      <div class="row ct-levels-row">
        <?php
      foreach ($children as $child) {
        ?>


            <?php
        $id = $child->ID;
         $ctlevel = get_post_meta($id, 'ct_level');

         $prehtml = '<a href="'.get_the_permalink($id).'"><div class="col-xs-12 col-sm-3 col-sm-offset-1 ct-class-level-box fusion-animated" data-animationType="fadeIn" data-animationDuration=".75" data-animationOffset="100%" >';
         $posthtml = '</div></a>';

         if ($ctlevel[0] == 0) {
           echo $prehtml.'New User'.$posthtml;
         }
         if ($ctlevel[0] == 1) {
           echo $prehtml.'Power User'.$posthtml;
         }
         if ($ctlevel[0] == 2) {
           echo $prehtml.'Advanced User'.$posthtml;
         }
         ?>

       <?php
      }
          ?>   </div><?php
    }
    else {
      ?>
        <div class="col-xs-12 col-md-8">
          <?php
    if (have_posts() ):

      while( have_posts() ): the_post(); ?>

        <article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
          <small>
            <?php
                      /** The taxonomy we want to parse */
            // $taxonomy = "fields";
            // /** Get all taxonomy terms */
            // $terms = get_terms($taxonomy, array(
            //         "orderby"    => "count",
            //         "hide_empty" => false
            //     )
            // );
            // /** Get terms that have children */
            // $hierarchy = _get_term_hierarchy($taxonomy);
            //     /** Loop through every term */
            //     foreach($terms as $term) {
            //     $term_link = get_term_link($term);
            //     //Skip term if it has children
            //     if($term->parent) {
            //       continue;
            //     }
            //       echo '<a href="'.$term_link.'">'.$term->name.'</a>';
            //     /** If the term has children... */
            //       if($hierarchy[$term->term_id]) {
            //     /** display them */
            //     foreach($hierarchy[$term->term_id] as $child) {
            //       $term_link = get_term_link($child);
            //     /** Get the term object by its ID */
            //     $child = get_term($child, "fields");
            //          echo ' > <a href="'.$term_link.'">'.$child->name.'</a>';
            //         }
            //      }
            //   }
           ?>

         </small>
         <br />
         <div class="col-xs-12 col-sm-6">
          <?php the_title('<h1 class="entry-title">','</h1>');

          if (!empty($price)) {
          echo '<div class="ct-class-att"><strong>Price: $'.$price.'</strong></div>';
          }
          if (!empty($online)) {
            echo '<div class="cttooltip ct-class-att ctlink"><span style="text-decoration:none;"><i class="fa fa-wifi" aria-hidden="true"></i>&nbsp; &nbsp;&nbsp;</span>Online available!<span class="cttooltiptext cttooltip-top">This class is available via live streaming online and on-site so you can learn from work, from home, or here at Computer Tutors.</span></div><br />';
          }
          if (!empty($book)) {
            echo '<div class="ct-class-att"><i class="fa fa-book" aria-hidden="true"></i>';
            if (!empty($bookname)) {
              echo '&nbsp; &nbsp;&nbsp;'.$bookname.'';
            }
            if (!empty($bookprice)) {
              echo ' - $'.$bookprice .'<br />';
            }
            if (!empty($bookisbn)) {
              echo 'ISBN: '.$bookisbn;
            }
            echo '</div>';
          }
          ?>
        </div>
        <div class="col-xs-12 col-sm-6">
          <?php if ( has_post_thumbnail() ): ?>

            <div class="pull-right"><?php the_post_thumbnail('medium'); ?></div>

          <?php endif; ?>
        </div>
          <?php
          echo get_template_part('templates/content', 'tabs'); ?>

        </article>

      <?php endwhile;

    endif;
    ?>
    </div>
    <div class="col-xs-12 col-md-4">
        <?php echo get_template_part('templates/content', 'sidebar') ?>

    </div>
	<div class="cert-icon"><i class="fa fa-circle ct-cert-icon" aria-hidden="true"></i></div>
    <div class="col-xs-12 ct-upcoming-classes">
      <?php
      ct_upcoming_dates($post);
  ?>
    </div>
    <?php
  }
    ?>

  </div>


  <?php get_footer(); ?>
