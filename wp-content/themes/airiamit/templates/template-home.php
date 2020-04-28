<?php
/**
 * Template Name: Homepage Template
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
            get_template_part( 'template-parts/content-home' );
            ?>
            
                <div class="container">
                <div class="top-content-slider">
                    <div class="owl-carousel owl-theme top-slider-home">
                        <?php if( have_rows('home_top_slider') ): ?>
                            <?php while( have_rows('home_top_slider') ): the_row(); 
                                $image = get_sub_field('section_icon');
                                $content = get_sub_field('section_title');
                                $link = get_sub_field('page_link');
                                ?>
                                <div class="item">
                                    <?php if( $link ): ?>
                                        <a href="<?php echo $link['url']; ?>">
                                    <?php endif; ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                        <?php echo $content; ?>
                                    <?php if( $link ): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                    <div class="alignfull no-padding no-margin">
                        <?php the_content(); ?>
                    </div>
                </div>
            
            <?php 
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

<script type="text/javascript">
        jQuery(document).ready(function($){
            $('.owl-carousel.top-slider-home').owlCarousel({
                center:true,
                loop:true,
                margin:20,
                dots: true,
                responsive:{
                    0:{
                        items:1
                    },
                    992:{
                        items:3
                    }
                }
            })
        });
</script>

