<?php
/**
 * Thumbnails settings.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Thumbnails settings.
 */
if ( ! function_exists( 'colorful_setup_thumbnails' ) ) :
function colorful_setup_thumbnails() {
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Set the default Featured Image (formerly Post Thumbnail) dimensions.
	set_post_thumbnail_size( 300, 300, true );

	// Register a new image size.
	add_image_size( 'large-thumbnail', 1000, 400, true );
	add_image_size( 'middle-thumbnail', 1000, 400, true );
	add_image_size( 'small-thumbnail', 500, 200, true );
}
endif;
add_action( 'after_setup_theme', 'colorful_setup_thumbnails' );
