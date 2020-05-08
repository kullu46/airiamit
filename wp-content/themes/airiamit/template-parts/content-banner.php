<?php
/**
 * Displays the content when the cover template is used.
 *
 * @package WordPress
 * @subpackage Airi_Amit
 * @since 1.0.0
 */

?>

<section class="inner-banner" id="post-<?php the_ID(); ?>">

	<?php
	// On the cover page template, output the cover header.
	$cover_header_style   = '';
	$cover_header_classes = '';

	$color_overlay_style   = '';
	$color_overlay_classes = '';
	  
	$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'twentytwenty-fullscreen' ) : '';

	if ( $image_url ) {
		$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
		$cover_header_classes = ' bg-image';
	}

	// Get the color used for the color overlay.
	$color_overlay_color = get_theme_mod( 'cover_template_overlay_background_color' );
	if ( $color_overlay_color ) {
		$color_overlay_style = ' style="color: ' . esc_attr( $color_overlay_color ) . ';"';
	} else {
		$color_overlay_style = '';
	}

	// Get the fixed background attachment option.
	if ( get_theme_mod( 'cover_template_fixed_background', true ) ) {
		$cover_header_classes .= ' bg-attachment-fixed';
	}

	// Get the opacity of the color overlay.
	$color_overlay_opacity  = get_theme_mod( 'cover_template_overlay_opacity' );
	$color_overlay_opacity  = ( false === $color_overlay_opacity ) ? 80 : $color_overlay_opacity;
	$color_overlay_classes .= ' opacity-' . $color_overlay_opacity;
	?>
	<?php
		if ( get_field('common_banner_image', 'option') ) {
			$img = get_field('common_banner_image', 'option'); ?>
	<?php if ( is_blog( )) {   ?> 		
	<div class="cover-header <?php echo $cover_header_classes; ?>" style="<?php echo 'background-image: url(\'' . $img . '\');'; ?>" >
	<?php  } else { ?>
	<div class="cover-header <?php echo $cover_header_classes; ?>"<?php echo $cover_header_style;?>	" >
	<?php  }  ?> 
	<div class="cover-header-inner-wrapper screen-height">
			<div class="cover-header-inner">
				<div class="cover-color-overlay color-accent<?php echo esc_attr( $color_overlay_classes ); ?>"<?php echo $color_overlay_style; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;) ?>></div>
					<header class="entry-header has-text-align-center container">
					
						<?php if ( is_blog( )) {   ?> 
						<h2><?php the_field('blog_page_title', 'option'); ?></h2>
						<?php } elseif ( is_page( '216' )) { ?> 
							<div class="video-banner">
								<?php echo do_shortcode('[wp-video-popup video="'.get_field('video_link').'"]'); ?>
								<a href="#" class="wp-video-popup">
									<img src="../wp-content/uploads/2020/04/play-button.png" alt="Play Button"> 
									<span>Play to Watch</span>
								</a>
								<h2><?php the_field('page_header_title'); ?></h2>
								<p><?php the_field('page_header_sub_content'); ?></p>
							</div>
						<?php } elseif ( is_page( '214' )) { ?> 
							<div class="video-banner">
								<?php echo do_shortcode('[wp-video-popup video="'.get_field('video_link').'"]'); ?>
								<a href="#" class="wp-video-popup">
									<img src="../wp-content/uploads/2020/04/play-button.png" alt="Play Button"> 
									<span>Play to Watch</span>
								</a>
								<h2><?php the_field('page_header_title'); ?></h2>
								<p><?php the_field('page_header_sub_content'); ?></p>
							</div>
						<?php } elseif ( is_page( '218' )) { ?> 
						<div class="video-banner">
							<?php echo do_shortcode('[wp-video-popup video="'.get_field('video_link').'"]'); ?>
							<a href="#" class="wp-video-popup">
								<img src="../wp-content/uploads/2020/04/play-button.png" alt="Play Button"> 
								<span>Play to Watch</span>
							</a>
							<h2><?php the_field('page_header_title'); ?></h2>
							<p><?php the_field('page_header_sub_content'); ?></p>
						</div>
						<?php  } else { ?>
							<h2> <?php echo get_the_title(); ?> </h2>
						<?php  }  ?> 


					</header><!-- .entry-header -->
			</div><!-- .cover-header-inner -->
		</div><!-- .cover-header-inner-wrapper -->
	</div><!-- .cover-header -->
<?php } ?>
</section><!-- .post -->



			
		 
