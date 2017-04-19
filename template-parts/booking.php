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
