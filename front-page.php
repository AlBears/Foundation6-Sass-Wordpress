<?php get_header(); ?>

      <!-- OUR ROOMS BLOCK -->

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
          <?php the_post_thumbnail(); ?>
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

    <div class="row columns">
      <a href="<?php echo get_permalink(26)?>" class="button float-right">View All</a>
    </div>

      <!-- separator image -->
    <?php while(have_posts()) : the_post(); ?>
    <div class="separator-image" style="background-image: url(<?php the_field('separator_1'); ?>)"></div>
    <?php endwhile; ?>

      <!-- About Us Gallery  -->
    <section class="about-us-gallery ">
      <div class="medium-6 columns empty"></div>
      <div class="medium-6 columns empty bluebg"></div>

      <div class="content-about-us">
          <div class="row">
              <div class="medium-6 columns">
                <?php $about = new WP_Query('pagename=about-us');
                while($about->have_posts()) : $about->the_post(); ?>
                  <h2><?php the_title(); ?></h2>
                  <?php the_content(); ?>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>




              <div id="gallery" class="medium-6 columns bluebg">
                <?php $gallery = new WP_Query('pagename=gallery');
                while($gallery->have_posts()) : $gallery->the_post();
                ?>
                <h2 class="white"><?php the_title(); ?></h2>

                <?php $images = get_post_gallery(get_the_ID(), false); ?>
                <div class="row small-up-3 medium-up-3 large-up-3">
                  <?php $ids = $images['ids'];
                        $ids = explode(",", $ids);
                        $i = 0;

                        foreach ($ids as $image_id) :
                          $gallery_image = wp_get_attachment_image_src($image_id, 'thumbnail');?>

                          <div class="column">
                              <a data-open="galleryModal<?php echo $i; ?>">
                                <img class="thumbnail" src="<?php  echo $gallery_image[0]; ?>">
                              </a>
                          </div>

                          <!-- MODALS -->
                          <div class="reveal" id="galleryModal<?php echo $i; ?>" data-close-on-click="true" data-reveal data-animation-in="scale-in-up" data-animation-out="scale-out-down">
                            <?php $gallery_image = wp_get_attachment_image_src($image_id, 'full'); ?>
                            <img src="<?php  echo $gallery_image[0]; ?>">
                            <button class="close-button" data-close aria-label="Close reveal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!-- End of Modal-->

                  <?php $i++; endforeach; ?>





                <?php endwhile; wp_reset_postdata();?>
              </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Separator image -->
  <?php while(have_posts()) : the_post(); ?>
  <div class="separator-image" style="background-image: url(<?php the_field('separator_2'); ?>)"></div>
  <?php endwhile; ?>

  <!-- Booking section -->

   <section class="booking row">
       <div class="large-8 large-centered columns text-center">
         <h2>Book Now</h2>
         <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent a tortor vulputate tellus lacinia sagittis. Donec varius quam magna, ut tristique ipsum gravida non. Mauris tincidunt tellus nec rhoncus dictum. Suspendisse non varius est.</p>
         <a data-open="modalBook" class="button">Book Now</a>
       </div>
   </section>

   <div class="reveal" id="modalBook" data-reveal data-animation-in="scale-in-up" data-animation-out="scale-out-down">
       <h2 class="text-center">Booking Form</h2>
        <?php echo do_shortcode('[ninja_form id=1]'); ?>

   </div>

<?php get_footer(); ?>
