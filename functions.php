<?php
/**
 * colorful functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package colorful
 */

if ( ! function_exists( 'colorful_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function colorful_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on colorful, use a find and replace
	 * to change 'colorful' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'colorful', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
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
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function colorful_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'colorful_content_width', 640 );
}
add_action( 'after_setup_theme', 'colorful_content_width', 0 );

/**
 *
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


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/functions/functions-common.php';



/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
