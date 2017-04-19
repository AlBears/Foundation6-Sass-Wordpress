<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<div class="row column show-for-small-only">
    <h2><?php the_title(); ?></h2>
</div>

<section class="content">
    <div class="row">
      <?php if(is_page('contact-us')): ?>
        <div class="large-6 columns large-centered">
            <div class="row">
              <?php the_content(); ?>
            </div>
          </div>
      <?php else: ?>
        <div class="medium-12 columns">
          <?php the_content(); ?>
        </div>
      <?php endif; ?>
    </div>
</section>

<?php endwhile;  ?>



<?php get_footer(); ?>
