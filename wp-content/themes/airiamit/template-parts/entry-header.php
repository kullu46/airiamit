<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Airi_Amit
 * @since 1.0.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>

<header class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php
			/**
			 * Allow child themes and plugins to filter the display of the categories in the entry header.
			 *
			 * @since 1.0.0
			 *
			 * @param bool   Whether to show the categories in header, Default true.
			 */
		$show_categories = apply_filters( 'airiamit_show_categories_in_entry_header', true );

		

		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		} ?>

<div class="post-meta-wrapper post-meta-single post-meta-single-top">

<ul class="post-meta">
		<li class="post-author meta-wrapper">
			<span class="meta-icon">
				<span class="screen-reader-text">Post author</span>
				<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"><path fill="" d="M18,19 C18,19.5522847 17.5522847,20 17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,15.3431458 14.6568542,14 13,14 L5,14 C3.34314575,14 2,15.3431458 2,17 L2,19 C2,19.5522847 1.55228475,20 1,20 C0.44771525,20 0,19.5522847 0,19 L0,17 C0,14.2385763 2.23857625,12 5,12 L13,12 C15.7614237,12 18,14.2385763 18,17 L18,19 Z M9,10 C6.23857625,10 4,7.76142375 4,5 C4,2.23857625 6.23857625,0 9,0 C11.7614237,0 14,2.23857625 14,5 C14,7.76142375 11.7614237,10 9,10 Z M9,8 C10.6568542,8 12,6.65685425 12,5 C12,3.34314575 10.6568542,2 9,2 C7.34314575,2 6,3.34314575 6,5 C6,6.65685425 7.34314575,8 9,8 Z"></path></svg>						</span>
			<span class="meta-text">By <?php the_author(); ?></span>
		</li>
		<li class="post-comment-link meta-wrapper">
			<span class="meta-icon">
				<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><path d="M9.43016863,13.2235931 C9.58624731,13.094699 9.7823475,13.0241935 9.98476849,13.0241935 L15.0564516,13.0241935 C15.8581553,13.0241935 16.5080645,12.3742843 16.5080645,11.5725806 L16.5080645,3.44354839 C16.5080645,2.64184472 15.8581553,1.99193548 15.0564516,1.99193548 L3.44354839,1.99193548 C2.64184472,1.99193548 1.99193548,2.64184472 1.99193548,3.44354839 L1.99193548,11.5725806 C1.99193548,12.3742843 2.64184472,13.0241935 3.44354839,13.0241935 L5.76612903,13.0241935 C6.24715123,13.0241935 6.63709677,13.4141391 6.63709677,13.8951613 L6.63709677,15.5301903 L9.43016863,13.2235931 Z M3.44354839,14.766129 C1.67980032,14.766129 0.25,13.3363287 0.25,11.5725806 L0.25,3.44354839 C0.25,1.67980032 1.67980032,0.25 3.44354839,0.25 L15.0564516,0.25 C16.8201997,0.25 18.25,1.67980032 18.25,3.44354839 L18.25,11.5725806 C18.25,13.3363287 16.8201997,14.766129 15.0564516,14.766129 L10.2979143,14.766129 L6.32072889,18.0506004 C5.75274472,18.5196577 4.89516129,18.1156602 4.89516129,17.3790323 L4.89516129,14.766129 L3.44354839,14.766129 Z"></path></svg>						</span>
			<span class="meta-text"><?php echo get_comments_number(); ?></span>
		</li>
</ul>
</div>
	</div>
	<!-- .entry-header-inner -->
</header><!-- .entry-header -->
