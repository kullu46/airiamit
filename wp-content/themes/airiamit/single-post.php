<?php get_header(); ?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			?>


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
<div class="container">
<article <?php  post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
	get_template_part( 'template-parts/entry-header' );
	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}
	
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

		

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->
	<div class="tag-section row">
		<div class="col-sm-6">
			<?php  airiamit_the_post_meta( get_the_ID(), 'single-bottom' ); ?>
		</div>
		<div class="col-sm-6">
			<?php echo do_shortcode('[ssba]'); ?>
		</div>
	</div>
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
			<h2>Comments: <?php echo get_comments_number(); ?></h2>
			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php } ?>

    <?php 
      if(get_post_type() == 'post'){
        $taxonomies = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));
        if (!empty($taxonomies)) {
          $related_args = array(
                'post_type' => 'post',
                'posts_per_page' => 2,
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
            <div class="related-posts row">
              <?php foreach($related as $relatedItem){ ?>
				<article <?php  post_class('col-sm-6'); ?> id="post-<?php the_ID(); ?>">
					<?php
					if ( ! is_search() ) {
						get_template_part( 'template-parts/featured-image' );
					}
					get_template_part( 'template-parts/entry-header' );
					?>
				  <div class="entry-content">
						<?php
						if ( !is_search() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
							echo wp_trim_words( get_the_content(), 35, '...' );
							?> <a href="<?php the_permalink(); ?>">Read More</a> <?php
						} else {
							the_content( __( 'Continue reading', 'airiamit' ) );
						}
						?>
					</div><!-- .entry-content -->
                </article>
              <?php } ?>
            </div>
          <?php 
          } 
        } 
      } 
    ?>
    </article><!-- .post -->

	</div>


      <?php 
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
