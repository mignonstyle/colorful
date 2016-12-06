<?php
/**
 * Enqueue scripts and styles.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */

/**
 * Enqueue scripts and styles.
 */
function colorful_enqueue_scripts() {
	// Get the theme version.
	$theme_data    = wp_get_theme();
	$theme_version = $theme_data->version;

	// font-awesome.
	wp_enqueue_style( 'colorful-awesome', get_template_directory_uri() . '/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	// Retrieves the URI of the current theme stylesheet.
	wp_enqueue_style( 'colorful-style', get_stylesheet_uri(), array(), $theme_version );

	/*
	// theme base style.
	wp_enqueue_style( 'colorful-base', get_template_directory_uri() . '/css/base.css', array(), $theme_version );
	*/

	// Script for navigation menu.
	wp_enqueue_script( 'colorful-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $theme_version, true );

	// Makes "skip to content" link work correctly in IE9, Chrome, and Opera.
	wp_enqueue_script( 'colorful-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $theme_version, true );

	// Load script that displays reply comment form under comment in comment list.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load basic Internet Explorer-specific style sheets and scripts.
	wp_enqueue_style( 'colorful-ie', get_template_directory_uri() . '/css/ie.css', array(), $theme_version );
	wp_style_add_data( 'colorful-ie', 'conditional', 'lt IE 9' );

	// Load Internet Explorer respond script.
	wp_enqueue_script( 'colorful-respond', get_template_directory_uri() . '/ library/respond/respond.min.js', array(), '1.4.2', true );
	wp_script_add_data( 'colorful-respond', 'conditional', 'lt IE 9' );

	// Load Internet Explorer html5shiv script.
	wp_enqueue_script( 'colorful-html5shiv',get_template_directory_uri() . '/ library/html5shiv/html5shiv-printshiv.min.js', array(), '3.7.3', true );
	wp_script_add_data( 'colorful-html5shiv', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'colorful_enqueue_scripts' );

/**
 * Adds extra scripts and styles.
 */
function colorful_enqueue_inline_scripts() {
	/*
	$custom_css = '
		.body {
			background: blue;
		}';
	wp_add_inline_style( 'colorful-base', $custom_css, 2 );
	*/
}
add_action( 'wp_enqueue_scripts', 'colorful_enqueue_inline_scripts' );
