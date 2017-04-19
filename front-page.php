<?php get_header(); ?>

      <!-- OUR ROOMS BLOCK -->

      <?php get_template_part('template', 'parts/rooms'); ?>

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

   <?php get_template_part('template', 'parts/booking'); ?>

<?php get_footer(); ?>
