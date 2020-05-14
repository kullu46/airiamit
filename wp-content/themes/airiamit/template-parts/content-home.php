<?php
/**
 * Displays the content when the cover template is used.
 *
 * @package WordPress
 * @subpackage Airi_Amit
 * @since 1.0.0
 */

?>

<section <?php post_class('home-page-banner'); ?> id="post-<?php the_ID(); ?>">
    <div id="home-slider" class="owl-carousel owl-theme">
    <?php if( have_rows('slider_content') ): ?>
        <?php while( have_rows('slider_content') ): the_row(); 
            $image = get_sub_field('slider_image');
            $content = get_sub_field('slider_title');
            $link = get_sub_field('page_link');
            ?>
            <div class="item">
                <?php if( $link ): ?>
                    <a href="<?php echo $link['url']; ?>">
                <?php endif; ?>
                    <div class="image-block">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    </div>
                    <div class="slider-content">
                        <div class="container">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php if( $link ): ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
    <div id="thumbs" class="owl-carousel owl-theme container">
        <?php if( have_rows('slider_thumb') ): ?>
            <?php while( have_rows('slider_thumb') ): the_row(); 
                $image = get_sub_field('thumb_image');
                $content = get_sub_field('section_title');
                $link = get_sub_field('page_link');
                ?>
                <div class="item">
                    <?php if( $link ): ?>
                        <a href="<?php echo $link['url']; ?>">
                    <?php endif; ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                        <p><?php echo $content; ?></p>
                    <?php if( $link ): ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section><!-- .post -->
<script>
jQuery(document).ready(function($) {
  var bigimage = $("#home-slider");
  var thumbs = $("#thumbs");
  //var totalslides = 10;
  var syncedSecondary = true;

  bigimage
    .owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: false,    
    autoplay: false,
    autoHeight: false,
    dots: false,
    loop: true,
    responsiveRefreshRate: 200,
    navText: [
      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ]
  })
    .on("changed.owl.carousel", syncPosition);

  thumbs
    .on("initialized.owl.carousel", function() {
    thumbs
      .find(".owl-item")
      .eq(0)
      .addClass("current");
  })
    .owlCarousel({
    items: 3,
    dots: true,
    nav: false,
    margin:20,
    navText: [
      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ],
    smartSpeed: 200,
    slideSpeed: 500,
    slideBy: 3,
    responsiveRefreshRate: 100,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        }
    }
  })
    .on("changed.owl.carousel", syncPosition2);

  function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }
    //to this
    thumbs
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first()
    .index();
    var end = thumbs
    .find(".owl-item.active")
    .last()
    .index();

    if (current > end) {
      thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      bigimage.data("owl.carousel").to(number, 100, true);
    }
  }

  thumbs.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    bigimage.data("owl.carousel").to(number, 300, true);
  });
});
</script>