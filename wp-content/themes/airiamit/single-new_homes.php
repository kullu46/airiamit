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
					<a href="javascript:;" onclick="showCustomPopup('.popup-prebook-property');" class="prebook-btn btn">
						Pre-Book This Property
					</a>
					<div class="custom-popup popup-prebook-property fade">
						<a class="btn-close" onclick="hideCustomPopup('.popup-prebook-property');">x</a>
						<?php echo do_shortcode('[fub-custom-form lead_type="Property Inquiry" tags="Pre-book - '.get_the_title().'" template="1" submit_btn_text="Pre-book Now"]'); ?>
					</div>

					<?php $floorplan = get_field('nh_floor_plans'); ?>
					<?php if(is_array($floorplan) && isset($floorplan['url'])){ ?>
						<a class="downloadfloor-btn btn" href="javascript:;" onclick="showCustomPopup('.popup-plans-pricing');">
							Get Floor Plans and Pricing
						</a>
						<div class="custom-popup popup-plans-pricing fade">
							<a class="btn-close" onclick="hideCustomPopup('.popup-plans-pricing');">x</a>
							<?php echo do_shortcode('[fub-custom-form lead_type="Property Inquiry" tags="'.get_the_title().',Plans and Pricing" template="1" submit_btn_text="Submit Details"]'); ?>
						</div>
					<?php } ?>
				</div>
				<?php $adBanner = get_field('nh_custom_ad_banner'); ?>
				<?php if(!empty($adBanner)){ ?>
					<div class="project-ad-banner">
						<?php echo $adBanner; ?>	
					</div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
</main>
<?php $lead_form_shortcode = get_field('nh_lead_form_shortcode'); ?>
	<?php if(!empty($lead_form_shortcode)){ ?>
		<div class="project-lead-form">
			<div class="container project-lead-form-inner">
				<?php echo do_shortcode($lead_form_shortcode); ?>		
			</div>
		</div>
	<?php } ?>
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>