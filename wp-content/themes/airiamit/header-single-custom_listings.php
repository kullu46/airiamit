<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Airi_Amit
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/fontawesome/css/all.min.css" type="text/css" media="screen" />
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group single-home-header" role="banner">

			<div class="container header-inner section-inner">

				<div class="header-titles-wrapper">

					<div class="back-link">
						<a href="<?php echo home_url('/listings'); ?>"><i class="fas fa-arrow-left"></i> Back to Listings</a>
					</div>
				</div>
				<div class="header-titles pull-right" style="float: right;">

					<?php airiamit_site_logo(); ?>

				</div>

			</div>

		</header>

		<?php

		if ( !is_front_page() ){
			get_template_part( 'template-parts/content-banner-new-homes' );
		}
		