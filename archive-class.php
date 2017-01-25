<?php get_header();


?>
<div class="container-fluid">

  <div class="row">

    <div class="col-xs-12 col-md-9">

      <?php

      if (have_posts() ): ?>

        <header class="page-header">

            <h2 class="page-title">Classes</h1>

        </headers>

      <?php

      $args = array(
        'post_parent' => 0,
        'post_type' => 'class'
      );
      $parentonly = new WP_Query($args);
      ?>
      <div class="row">

      <?php while( $parentonly->have_posts() ): $parentonly->the_post(); ?>

        <div class="col-xs-12 col-md-4 <?php //ct_get_categories(); ?>" id="post-<?php the_ID();?>" style="margin: 0 auto;text-align:center; padding:25px; height: 260px !important; margin-bottom: 30px;">

          <div class="thumbnail">
            <?php $link = get_the_permalink(); ?>
            <a href="<?php echo $link ?>">
            <?php the_post_thumbnail(array('150','150'));?>

          </div>

          <div class="text-center">

            <?php the_title('<h3 class="entry-title">','</h3>'); ?>


          </div>
          <div class="post-excerpt" style="font-size: 15px;"><?php echo get_the_excerpt();?>
          </div></a>

        </div>

      <?php endwhile;

      	wp_reset_postdata();

      ?>

      </div>

    </div>

    <?php endif; ?>
    <div class="col-xs-12 col-sm-3">
      <?php get_sidebar('ct-sidebar'); ?>
    </div>

  </div>

</div>

  <?php get_footer();
