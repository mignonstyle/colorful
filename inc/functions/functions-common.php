<?php
/**
 * Custom template tag of common.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Exclude tablet from is_mobile.
 */
if ( ! function_exists( 'colorful_is_mobile' ) ) :
function colorful_is_mobile() {
	$ua   = $_SERVER['HTTP_USER_AGENT'];
	$_ret = true;

	if ( wp_is_mobile() ) {
		if ( preg_match( '/ipad/i', $ua ) ) {
			$_ret = false;
		} elseif ( preg_match( '/Android/i', $ua ) && ! ( preg_match( '/Mobile/i', $ua ) ) ) {
			$_ret = false;
		}
	} else {
		$_ret = false;
	}

	return $_ret;
}
endif;

/**
 * prints head prefix.
 */
if ( ! function_exists( 'colorful_head_prefix' ) ) :
function colorful_head_prefix() {
	if ( is_single() || is_page() ) {
		$head_prefix_fb = 'fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#';

	} else {
		$head_prefix_fb = 'fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#';
	}

	$head_prefix = 'og: http://ogp.me/ns# ' . $head_prefix_fb;
	$head_prefix = apply_filters( 'colorful_head_prefix_args', $head_prefix );

	return $head_prefix;
}
endif;

/**
 * Allow tag to wp_kses of icon.
 */
if ( ! function_exists( 'colorful_wp_kses_allowed_html_icon' ) ) :
function colorful_wp_kses_allowed_html_icon() {
	$allowed_html = array(
		'i' => array(
			'class' => array(),
		),
	);

	return $allowed_html;
}
endif;

/**
 * Allow tag to wp_kses of a link.
 */
if ( ! function_exists( 'colorful_wp_kses_allowed_html_link' ) ) :
function colorful_wp_kses_allowed_html_link() {
	$allowed_html = array(
		'a' => array(
			'href'   => array(),
			'target' => array(),
			'rel'    => array(),
		),
	);

	return $allowed_html;
}
endif;
