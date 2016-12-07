<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */

/**
 * Specify the number of characters in the excerpt.
 */
if ( ! function_exists( 'colorful_excerpt_length' ) ) :
function colorful_excerpt_length( $length ) {
	$length = 100;

	return $length;
}
endif;
add_filter( 'excerpt_mblength', 'colorful_excerpt_length' );
add_filter( 'excerpt_length',   'colorful_excerpt_length' );

/**
 * Change the last character of the excerpt [...].
 */
if ( ! function_exists( 'colorful_excerpt_more' ) ) :
function colorful_excerpt_more( $more ) {
	$more = __( '&nbsp;&hellip;', 'colorful' );

	return $more;
}
endif;
add_filter( 'excerpt_more', 'colorful_excerpt_more' );
