<?php
/**
 */

get_header();
?>

<main id="site-content" role="main">
	<div id="vip-projects-single" class="vip-projects-single container">
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
					<ul class="project-details-list">
						<li><span>Currently:</span><?php echo get_field( 'nh_currently' ); ?></li>
						<li><span>Location:</span><?php echo get_field( 'nh_location' ); ?></li>
						<li><span>Bedrooms:</span><?php echo implode(",", get_field( 'nh_bedrooms' )); ?></li>
						<!-- <li><span>SQFT:</span> <?php //echo get_field( 'nh_area' ); ?></li> -->
						<li><span>Type:</span> <?php echo get_field( 'nh_type' ); ?></li>
						<li><span>Closing Date:</span> <?php echo get_field( 'nh_closing_date' ); ?></li>
						<li><span>Price Range:</span><?php echo get_field( 'nh_price_range' ); ?></li>
					</ul>
				</div>
				<div class="project-image">
					<?php get_template_part( 'template-parts/featured-image' ); ?>
				</div>
				<div class="project-Title_header">
					<div class="project-title">
						<h4><?php the_title(); ?></h2>
						<h5><?php echo get_field('nh_subtitle'); ?></h3>
					</div>
					<div class="project-navigation">
						<?php get_template_part( 'template-parts/navigation' ); ?>
					</div>
				</div>
				
				<?php 
				$intro = get_field("nh_intro_text");
				if(!empty(trim(strip_tags($intro)))){
				?>
					<div class="project-intro"><?php echo $intro; ?></div>
				<?php } ?>

				<div class="project-description">
					<?php the_content(); ?>
				</div>
				

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

				<?php $siteplan = get_field('nh_site_plan'); ?>
				<?php if(is_array($siteplan) && isset($siteplan['url'])){ ?>
					<div class="project-siteplan">
						<h3>Siteplan</h3>
						<img src="<?php echo $siteplan['url']; ?>" alt="<?php echo $siteplan['title']; ?>" title="<?php echo $siteplan['title']; ?>">
					</div>
				<?php } ?>

				<?php $floor_plans = get_field('nh_floor_plans'); ?>
				<?php if(is_array($floor_plans) && count($floor_plans) > 0){ ?>
					<div class="project-floorplans">
						<h3>Floor Plans</h3>
						<ul class="list">
							<?php foreach($floor_plans as $floor_plan){ ?>
								<?php $nh_floor_plan = get_sub_field('nh_floor_plan'); ?>
								<?php if(is_array($nh_floor_plan) && isset($nh_floor_plan['url'])){ ?>
									<li class="floorplan">
										<img src="<?php echo $nh_floor_plan['url']; ?>" alt="<?php echo $nh_floor_plan['title']; ?>" title="<?php echo $nh_floor_plan['title']; ?>">
									</li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>

				<?php $price_list = get_field('nh_price_list'); ?>
				<?php if(is_array($price_list) && count($price_list) > 0){ ?>
					<div class="project-pricelist">
						<h3>Floor Plans</h3>
						<table class="table table-responsive">
							<thead>
								<th>NO</th>
								<th>SECTION</th>
								<th>UNIT</th>
								<th>PRICE</th>
								<th>GROSS RENT</th>
							</thead>
							<tbody>
								<?php foreach($price_list as $price){ ?>
									<tr class="spaceing" colspan="5">
										<td></td>
									</tr>
									<tr>
										<td><?php echo $price['nh_price_sr']; ?></td>
										<td><?php echo $price['nh_price_section']; ?></td>
										<td><?php echo $price['nh_price_unit']; ?></td>
										<td><?php echo !empty($price['nh_price_price']) ? '$'.$price['nh_price_price'] : $price['nh_price_price']; ?></td>
										<td><?php echo !empty($price['nh_price_rent']) ? '$'.$price['nh_price_rent'] : $price['nh_price_rent']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>


			<?php } ?>
		<?php } ?>
	</div>
</main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
