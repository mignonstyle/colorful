<?php
/**
 * colorful functions and definitions.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

if ( ! function_exists( 'colorful_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function colorful_setup() {
	// Read the translation file of the theme.
	load_theme_textdomain( 'colorful', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'colorful_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'colorful_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function colorful_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'colorful_content_width', 640 );
}
add_action( 'after_setup_theme', 'colorful_content_width', 0 );

/**
 * Include functions.
 */
// Enqueue scripts and styles.
require get_template_directory() . '/inc/enqueue-scripts.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Enable custom menu functions.
require get_template_directory() . '/inc/custom-menu.php';

// Register widget area.
require get_template_directory() . '/inc/register-widgets.php';

// The thumbnails settings.
require get_template_directory() . '/inc/thumbnails.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/functions/functions-common.php';
require get_template_directory() . '/inc/functions/functions-copyright.php';
require get_template_directory() . '/inc/functions/functions-posts.php';
require get_template_directory() . '/inc/functions/functions-pagenavi.php';
require get_template_directory() . '/inc/functions/functions-header.php';


// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/extras/extras-common.php';
require get_template_directory() . '/inc/extras/extras-posts.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';
