<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'colorful_body_classes' ) ) :
function colorful_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
endif;
add_filter( 'body_class', 'colorful_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if ( ! function_exists( 'colorful_pingback_header' ) ) :
function colorful_pingback_header() {
	echo '<meta charset="' . esc_attr( get_bloginfo( 'charset' ) ) . '">' . "\n";
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
	echo '<link rel="profile" href="http://gmpg.org/xfn/11">' . "\n";

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">' . "\n";
	}
}
endif;
add_action( 'wp_head', 'colorful_pingback_header', -9999 );

/**
 * Flush out the transients used in colorful_categorized_blog.
 */
if ( ! function_exists( 'colorful_category_transient_flusher' ) ) :
function colorful_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'colorful_categories' );
}
endif;
add_action( 'edit_category', 'colorful_category_transient_flusher' );
add_action( 'save_post',     'colorful_category_transient_flusher' );
