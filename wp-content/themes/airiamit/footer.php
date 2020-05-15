		<footer role="contentinfo" class="header-footer-group">
			<div class="container">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		</footer>
		<div class="social-sidebar">
			<ul>
				<?php if(get_field('social_media_list', 'option')): ?>
					<?php while(has_sub_field('social_media_list', 'option')):
						$sicon = get_sub_field('social_icon');
						$slink = get_sub_field('link');
					?>
					<li>
					<a href="<?php echo $slink['url']; ?>" target="_blank">
						<i class="fab <?php echo $sicon; ?>"></i>
					</a>
					</il>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>

		<div class="floating-left btn-book-meeting">
			<a href="<?php echo home_url('/virtual-appointment'); ?>" alt="BOOK Virtual Meeting" title="BOOK Virtual Meeting">BOOK Virtual Meeting</a>
		</div>
		<!-- <div class="custom-popup popup-book-meeting fade">
			<a class="btn-close" onclick="hideCustomPopup('.popup-book-meeting');">x</a>
			<?php echo do_shortcode('[fub-custom-form lead_type="Inquiry" tags="Book Virtual Meeting" title="Book Virtual Meeting" template="1" submit_btn_text="Book Now"]'); ?>
		</div> -->

		<div class="floating-right btn-contact-us">
			<a href="javascript:;" onclick="showCustomPopup('.popup-contact-us')">Contact Us</a>
		</div>
		<div class="custom-popup popup-contact-us fade">
			<a class="btn-close" onclick="hideCustomPopup('.popup-contact-us');">x</a>
			<?php echo do_shortcode('[fub-custom-form lead_type="General Inquiry" tags="Contact Us" title="Contact Us" show_title="true" subtitle="Please fill the form to get your questions answered"  template="1" submit_btn_text="Enquire Now"]'); ?>
		</div>
		<div class="inline-modal-overlay fade"></div>
			
		<?php wp_footer(); ?>
		<?php global $wp_scripts; ?>
		<?php if(!in_array('vc_pageable_owl-carousel', $wp_scripts->queue)){ ?>
			<link rel='stylesheet' id='vc_pageable_owl-carousel-css-css'  href='<?php echo get_site_url(); ?>/wp-content/plugins/js_composer/assets/lib/owl-carousel2-dist/assets/owl.min.css' media='all' />
			<script src='<?php echo get_site_url(); ?>/wp-content/plugins/js_composer/assets/lib/owl-carousel2-dist/owl.carousel.min.js?ver=6.1'></script>
		<?php } ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				if($(document).find('.modal-projects-gallery-inner').length){
					$('.modal-projects-gallery-inner').vcOwlCarousel({
						items: 1,
						singleItem: true
					});
				}
				if($(document).find('.related-projects').length){
					$('.related-projects').vcOwlCarousel({
						items: 4,
						singleItem: true
					});
				}
				$(document).on('keydown', function(event) {
					if (event.key == "Escape" && $(document).find('.modal-projects-gallery').is(":visible")) {
						$(document).find('.modal-projects-gallery').hide();
					}
				});
				$('.filter-toggle').on('click', function(e) {
					$('.project-filters').slideToggle('active-filter');
					e.stopPropagation();
				});

				if($(document).find('#soc-carousel-385').length){
					$("#soc-carousel-385").owlCarousel({
						nav: false,
						dots: false,
						mouseDrag: true,
						responsiveClass: true,
						loop: true,
						margin: 0,
						autoHeight: true,
						center: true,
						responsive: {
							0: {
							items: 1
							},

							600: {
							items: 2
							},

							1024: {
							items: 3
							},

							1360: {
							items: 5
							}
						}
					});
				}
			});
			function showCustomPopup(container){
				jQuery(document).find(container).addClass('in');
				jQuery('body').addClass('inline-modal-opened');
				jQuery('.inline-modal-overlay').addClass('in');
			}
			function hideCustomPopup(container){
				if(jQuery(container).find('form').length){
					jQuery(container).find('form')[0].reset();
				}
				jQuery(container).removeClass('in');
				jQuery('body').removeClass('inline-modal-opened');
				jQuery('.inline-modal-overlay').removeClass('in');
			}
		</script>
	</body>
</html>
