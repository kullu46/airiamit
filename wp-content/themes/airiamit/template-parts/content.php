<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Airi_Amit
 * @since 1.0.0
 */

?>

<article <?php  post_class('col-sm-6'); ?> id="post-<?php the_ID(); ?>">

	<?php
	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}
	get_template_part( 'template-parts/entry-header' );
	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				echo wp_trim_words( get_the_content(), 35, '...' );
				?> <a href="<?php the_permalink(); ?>">Read More</a> <?php
			} else {
				the_content( __( 'Continue reading', 'airiamit' ) );
			}
			

			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'airiamit' ) . '"><span class="label">' . __( 'Pages:', 'airiamit' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		airiamit_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

	<?php 
	if(get_post_type() == 'post'){
		$taxonomies = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));
		if (!empty($taxonomies)) {
			$related_args = array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'post_status' => 'publish',
						'post__not_in' => array( get_the_ID() ),
						'orderby' => 'rand',
						'tax_query' => array(
							array(
									'taxonomy' => 'category',
									'field' => 'term_id',
									'terms' => $taxonomies
							)
						)
					);
			$related = get_posts( $related_args );
			if(count($related) > 0){
			?>
				<div class="related-posts">
					<?php foreach($related as $relatedItem){ ?>
						<div class="related-post">
							<a href="<?php echo get_permalink($relatedItem->ID); ?>" alt="<?php echo $relatedItem->post_title; ?>" title="<?php echo $relatedItem->post_title; ?>">
								<?php echo get_the_post_thumbnail($relatedItem->ID, 'medium'); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			<?php 
			} 
		} 
		?>
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
			if(jQuery(document).find('.related-posts').length){
				jQuery('.related-posts').vcOwlCarousel({
					items: 4,
					singleItem: true
				});
			}
		});
		</script>
	<?php } ?>
</article><!-- .post -->

