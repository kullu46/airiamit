<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group container " role="banner">

			<div class="vc_row">
				<div class="header-inner section-inner">

					<div class="header-titles-wrapper">

						<?php

						// Check whether the header search is activated in the customizer.
						$enable_header_search = get_theme_mod( 'enable_header_search', true );

						if ( true === $enable_header_search ) {

							?>

							<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
								<span class="toggle-inner">
									<span class="toggle-icon">
										<?php twentytwenty_the_theme_svg( 'search' ); ?>
									</span>
									<span class="toggle-text"><?php _e( 'Search', 'airiamit' ); ?></span>
								</span>
							</button><!-- .search-toggle -->

						<?php } ?>

						<div class="header-titles">

							<?php 
								twentytwenty_site_logo();
								//twentytwenty_site_description();
							?>

						</div>

						<butt
						on class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
								</span>
								<span class="toggle-text"><?php _e( 'Menu', 'airiamit' ); ?></span>
							</span>
						</button>

					</div>

					<div class="header-nav header-navigation-wrapper">
						<ul class="nav">
							<li>
								<div class="header-top pull-right">
									<?php $header_right_html = WPEX_Theme_Options::get_theme_option("header_right_html"); ?>
									<?php if($header_right_html != ""){ ?>
										<?php echo stripslashes($header_right_html); ?>
									<?php } ?>
								</div>
							</li>
							<!-- <li>
								<?php
								if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
									?>

										<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'airiamit' ); ?>" role="navigation">

											<ul class="primary-menu reset-list-style">

											<?php
											if ( has_nav_menu( 'primary' ) ) {

												wp_nav_menu(
													array(
														'container'  => '',
														'items_wrap' => '%3$s',
														'theme_location' => 'primary',
													)
												);

											} elseif ( ! has_nav_menu( 'expanded' ) ) {

												wp_list_pages(
													array(
														'match_menu_classes' => true,
														'show_sub_menu_icons' => true,
														'title_li' => false,
														'walker'   => new TwentyTwenty_Walker_Page(),
													)
												);

											}
											?>

											</ul>

										</nav>

									<?php
								}

								if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
									?>

									<div class="header-toggles hide-no-js">

									<?php
									if ( has_nav_menu( 'expanded' ) ) {
										?>

										<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

											<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
												<span class="toggle-inner">
													<span class="toggle-text"><?php _e( 'Menu', 'airiamit' ); ?></span>
													<span class="toggle-icon">
														<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
													</span>
												</span>
											</button>

										</div>

										<?php
									}

									if ( true === $enable_header_search ) {
										?>

										<div class="toggle-wrapper search-toggle-wrapper">

											<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
												<span class="toggle-inner">
													<?php twentytwenty_the_theme_svg( 'search' ); ?>
													<span class="toggle-text"><?php _e( 'Search', 'airiamit' ); ?></span>
												</span>
											</button>

										</div>

										<?php
									}
									?>

									</div>
									<?php
								}
								?>
							</li> -->
						</ul>
					</div><!-- .header-navigation-wrapper -->

				</div><!-- .header-inner -->
			</div>
			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>

		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
