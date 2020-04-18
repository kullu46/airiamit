			<footer role="contentinfo" class="header-footer-group">
				<div class="container">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</footer>
		<?php wp_footer(); ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.filter-toggle').on('click', function(e) {
					$('.project-filters').slideToggle('active-filter');
					e.stopPropagation();
				});
			});
		</script>
	</body>
</html>
