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

			
		<?php wp_footer(); ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.filter-toggle').on('click', function(e) {
					$('.project-filters').slideToggle('active-filter');
					e.stopPropagation();
				});

				
			});

			jQuery("#soc-carousel-385").owlCarousel({
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
		</script>
	</body>
</html>
