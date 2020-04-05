
<section class="inner-banner banner-inner-new-homes" id="post-<?php the_ID(); ?>">

	<?php

	$color_overlay_style   = '';
	$color_overlay_classes = '';
	  
	$image_url = get_field('nh_cover_image', get_the_ID());
	$gallery_images = get_field('nh_image_gallery', get_the_ID());

	if ( $image_url ) {
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
	<?php if ($image_url) { ?>
		<div class="cover-header <?php echo $cover_header_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" style="<?php echo 'background-image: url(\'' . $image_url . '\');'; ?>" >
			<div class="cover-header-inner-wrapper screen-height">
				<div class="cover-header-inner">
					<div class="cover-color-overlay color-accent<?php echo esc_attr( $color_overlay_classes ); ?>"<?php echo $color_overlay_style; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;) ?>></div>
				</div><!-- .cover-header-inner -->
			</div><!-- .cover-header-inner-wrapper -->
		</div><!-- .cover-header -->
	<?php } ?>
	<?php if ($gallery_images) { ?>
		<div class="projects-gallery">
			<?php $i=0; foreach($gallery_images as $img){ $i++;?>
				<?php if($i < 5){ ?>
					<div class="gallery-item">
						<img src="<?php echo $img['sizes']['medium']; ?>" style="max-width: 300px"/>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="view-all-projects"><a href="javascript:;" onClick="jQuery('.modal-projects-gallery').show();">See All Pictures</a></div>
	<?php } ?>
</section>

<?php if ($gallery_images) { ?>
	<section class="modal-projects-gallery" style="display: none; height: 100%; width: 100%; position: fixed; top: 0; left: 0; z-index: 99999; background: #fff;">
		<div class="modal-projects-gallery-inner">
			<?php foreach($gallery_images as $img){ ?>
				<div class="gallery-item">
					<img src="<?php echo $img['url']; ?>"/>
				</div>
			<?php } ?>
		</div>
		<a class="close-icon" onclick="jQuery('.modal-projects-gallery').hide();" href="javascript:;">x</a>
	</section>
<?php } ?>


			
		 
