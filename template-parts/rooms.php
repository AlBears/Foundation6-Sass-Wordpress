<section class="rooms row">
  <?php $args = array(
    'post_type' => 'page',
    'post_parent' => 26,
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => 3
  );
    $rooms = new WP_Query($args);
    while($rooms->have_posts()) : $rooms->the_post();
   ?>

  <div class="medium-4 columns">
    <a href="<?php the_permalink(); ?>">
      <div class="room-image">
        <?php the_post_thumbnail('medium'); ?>
        <div class="room-title">
          <h3><?php the_title(); ?></h3>
        </div>
      </div>
      <div class="room-content">
        <p><?php the_field('short_description'); ?></p>
      </div>
    </a>
  </div>
<?php endwhile; wp_reset_postdata(); ?>

</section>
