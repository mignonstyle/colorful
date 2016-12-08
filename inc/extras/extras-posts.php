<?php
/**
 * Custom functions that act independently of the theme templates of posts.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Retrieve the archive title based on the queried object.
 */
if ( ! function_exists( 'colorful_custom_archive_title' ) ) :
function colorful_custom_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_year() ) {
		$title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
	} else if ( is_month() ) {
		$title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
	} else if ( is_day() ) {
		$title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} else {
		$title = __( 'Archives', 'colorful' );
	}

	return $title;
}
endif;
add_filter( 'get_the_archive_title', 'colorful_custom_archive_title' );
