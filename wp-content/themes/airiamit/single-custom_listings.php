<?php
/**
 */

get_header('single-custom_listings');
?>

<main id="site-content" role="main">
	<div id="custom-listings-single" class="vip-projects-single custom-listings-single">
	<div class="single-gray-section">
		<div class="container">
		<?php

		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				?>
				<div class="project-big-title">
					<h2><?php the_title(); ?></h2>
					<h3><?php echo get_field('cl_subtitle'); ?></h3>
				</div>
				<div class="project-details">
					<div class="row">
						<div class="col-sm-8">
							<ul class="project-details-list">
								<li><span>Property Type:</span><?php echo get_field( 'cl_property_type' ); ?></li>
								<li><span>Architecture Style:</span><?php echo get_field( 'cl_architecture' ); ?></li>
								<li><span>Square Feet:</span><?php echo get_field( 'cl_square_feet' ); ?></li>
								<li><span>Maintenance:</span><?php echo get_field( 'cl_maintenance' ); ?></li>
								<li><span>Basement:</span><?php echo get_field( 'cl_basement' ); ?></li>
								<li><span>Kitchens:</span><?php echo get_field( 'cl_kitchens' ); ?></li>
								<li><span>Lot Dimensions:</span><?php echo get_field( 'cl_lot_dimensions' ); ?></li>
								<li><span>Area:</span><?php echo get_field( 'cl_location' ); ?></li>
								<li><span>Air Conditioning:</span><?php echo get_field( 'cl_air_conditioning' ); ?></li>
								<li><span>Heating:</span><?php echo get_field( 'cl_heating' ); ?></li>
								<li><span>Exterior:</span><?php echo get_field( 'cl_exterior' ); ?></li>
								<li><span>Parking Spaces:</span><?php echo get_field( 'cl_parking_spaces' ); ?></li>
								<li><span>Parking Type:</span><?php echo get_field( 'cl_parking_type' ); ?></li>
								<li><span>Water:</span><?php echo get_field( 'cl_water' ); ?></li>
							</ul>
						</div>
						<div class="col-sm-4 price">
							<div>For Sale</div>
							<div class="big-txt"><small>$ </small><?php echo get_field( 'cl_price' ); ?></div>
						</div>
					</div>
				</div>
				<!-- <div class="project-image">
					<?php //get_template_part( 'template-parts/featured-image' ); ?>
				</div> -->
				<!-- <div class="project-Title_header">
					<div class="project-title">
						<h4><?php //the_title(); ?></h2>
						<h5><?php //echo get_field('cl_subtitle'); ?></h3>
					</div>
					<div class="project-navigation">
						<?php //get_template_part( 'template-parts/navigation' ); ?>
					</div>
				</div> -->
				
				<?php 
				$intro = get_field("cl_intro_text");
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
				<div class="project-floorplan">
					<a href="javascript:;" onclick="showCustomPopup('.popup-prebook-property');" class="prebook-btn btn">
						Pre-Book This Property
					</a>
					<div class="custom-popup popup-prebook-property fade">
						<a class="btn-close" onclick="hideCustomPopup('.popup-prebook-property');">x</a>
						<?php echo do_shortcode('[fub-custom-form lead_type="Property Inquiry" tags="Pre-book - '.get_the_title().'" template="1" submit_btn_text="Pre-book Now"]'); ?>
					</div>

					<?php $floorplan = get_field('cl_floor_plans'); ?>
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
				<?php $adBanner = get_field('cl_custom_ad_banner'); ?>
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
<?php $lead_form_shortcode = get_field('cl_lead_form_shortcode'); ?>
	<?php if(!empty($lead_form_shortcode)){ ?>
		<div class="project-lead-form">
			<div class="container project-lead-form-inner">
			<div class="row form-title">
				<div class="col-sm-12">
					<?php echo get_field('cl_lead_form_title'); ?>
				</div>
			</div>
				<div class="row form-subtitle">
					<div class="col-sm-12">
					<?php  echo get_field('cl_lead_form_sub_title'); ?>
					</div>
				</div>
				<?php echo do_shortcode($lead_form_shortcode); ?>		
			</div>
		</div>
	<?php } ?>
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>