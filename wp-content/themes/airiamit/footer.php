			<footer role="contentinfo" class="header-footer-group">
				<div class="section-inner">
					<div class="footer-copyright">
						&copy;Team Amit Airi  independently owned & operated realtor&reg; websites by incom real estate 
					</div>
					<div class="footer-right-links">
						<?php 
							wp_nav_menu(
									array(
										'menu' => "footer",
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);
						?>
					</div>
				</div>
			</footer>
		<?php wp_footer(); ?>
	</body>
</html>
