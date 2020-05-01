<?php
/**
 */

get_header('single-new_homes');
?>

<main id="site-content" role="main">
	<div id="vip-projects-single" class="vip-projects-single">
	<div class="single-gray-section">
		<div class="container">
		<?php

		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				?>
				<div class="project-big-title">
					<h2><?php the_title(); ?></h2>
					<h3><?php echo get_field('nh_subtitle'); ?></h3>
				</div>
				<div class="project-details">
					<div class="row">
						<div class="col-sm-8">
							<ul class="project-details-list">
								<li><span>Currently:</span><?php echo get_field( 'nh_currently' ); ?></li>
								<li><span>Location:</span><?php echo get_field( 'nh_location' ); ?></li>
								<li><span>Bedrooms:</span><?php echo implode(",", get_field( 'nh_bedrooms' )); ?></li>
								<li><span>SQFT:</span> <?php echo get_field( 'nh_area' ); ?></li> 
								<li><span>Type:</span> <?php echo get_field( 'nh_type' ); ?></li>
								<li><span>Closing Date:</span> <?php echo get_field( 'nh_closing_date' ); ?></li>
							</ul>
						</div>
						<div class="col-sm-4 price">
							<div>Starting at <?php echo get_field( 'nh_price_range_type' ); ?></div>
							<div class="big-txt"><small>$ </small><?php echo get_field( 'nh_price_range' ); ?></div>
						</div>
					</div>
				</div>
				<!-- <div class="project-image">
					<?php //get_template_part( 'template-parts/featured-image' ); ?>
				</div> -->
				<!-- <div class="project-Title_header">
					<div class="project-title">
						<h4><?php //the_title(); ?></h2>
						<h5><?php //echo get_field('nh_subtitle'); ?></h3>
					</div>
					<div class="project-navigation">
						<?php //get_template_part( 'template-parts/navigation' ); ?>
					</div>
				</div> -->
				
				<?php 
				$intro = get_field("nh_intro_text");
				if(!empty(trim(strip_tags($intro)))){
				?>
					<div class="project-intro"><?php echo $intro; ?></div>
				<?php } ?>

				<div class="project-description">
					<?php the_content(); ?>
				</div>
				</div>
				</div>
				<div class="container">
				<div class="project-features">
					<h3>Features</h3>
					<?php if( have_rows('nh_features') ): ?>
					<ul class="list">
					<?php while( have_rows('nh_features') ): the_row(); 
						$hs_feature = get_sub_field('hs_feature');
						?>
						<li class="feature">
							<?php echo $hs_feature; ?>
						</li>
					<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>
				<div class="project-floorplan">
					<a href="#" class="prebook-btn btn">
						Pre-Book This Property
					</a>
					<?php $floorplan = get_field('nh_floor_plans'); ?>
					<?php if(is_array($floorplan) && isset($floorplan['url'])){ ?>
						<a class="downloadfloor-btn btn" href="<?php echo $floorplan['url']; ?>">
							Download Floor Plans & Price List
						</a>
					<?php } ?>
				</div>

				

				
				
				<?php 
				
				
				/* $related_args = array(
						'post_type' => 'new_homes',
						'posts_per_page' => 10,
						'post_status' => 'publish',
						'post__not_in' => array( get_the_ID() ),
						'orderby' => 'rand',
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key'	 	=> 'nh_location',
								'value'	  	=> array(get_field('nh_location', get_the_ID())),
								'compare' 	=> 'IN'
							)
						)
					);
				$related = get_posts( $related_args );
				if(count($related) > 0){
				?>
					<div class="related-projects">
						<?php foreach($related as $relatedItem){ ?>
							<div class="related-project">
								<a href="<?php echo get_permalink($relatedItem->ID); ?>" alt="<?php echo $relatedItem->post_title; ?>" title="<?php echo $relatedItem->post_title; ?>">
									<?php echo get_the_post_thumbnail($relatedItem->ID, 'medium'); ?>
								</a>
							</div>
						<?php } ?>
					</div>
				<?php } */ ?>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
</main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php //get_footer(); ?>
			<footer role="contentinfo" class="header-footer-group">
				<div class="container">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</footer>
		<?php wp_footer(); ?>
		<style>
		.owl-item {
			float: left;
		}
		.owl-carousel {
			overflow: hidden;
		}
		</style>
		<link rel='stylesheet' id='vc_pageable_owl-carousel-css-css'  href='<?php echo get_site_url(); ?>/wp-content/plugins/js_composer/assets/lib/owl-carousel2-dist/assets/owl.min.css' media='all' />
		<link rel='stylesheet' id='tss-owl-carousel-css'  href='<?php echo get_site_url(); ?>/wp-content/plugins/testimonial-slider-and-showcase/assets/vendor/owl-carousel/owl.carousel.min.css?ver=1586072978' media='all' />
		<link rel='stylesheet' id='tss-owl-carousel-theme-css'  href='<?php echo get_site_url(); ?>/wp-content/plugins/testimonial-slider-and-showcase/assets/vendor/owl-carousel/owl.theme.default.min.css?ver=1586072978' media='all' />
		<script src='<?php echo get_site_url(); ?>/wp-content/plugins/js_composer/assets/lib/owl-carousel2-dist/owl.carousel.min.js?ver=6.1'></script>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			if(jQuery(document).find('.modal-projects-gallery-inner').length){
				jQuery('.modal-projects-gallery-inner').vcOwlCarousel({
					items: 1,
					singleItem: true
				});
			}
			if(jQuery(document).find('.related-projects').length){
				jQuery('.related-projects').vcOwlCarousel({
					items: 4,
					singleItem: true
				});
			}
			jQuery(document).on('keydown', function(event) {
				if (event.key == "Escape" && jQuery(document).find('.modal-projects-gallery').is(":visible")) {
					jQuery(document).find('.modal-projects-gallery').hide();
				}
			});
		});
		</script>
	</body>
</html>