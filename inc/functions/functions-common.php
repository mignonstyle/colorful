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
	$head_prefix = apply_filters( 'colorful_head_prefix_text', $head_prefix );

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

/**
 * Icon font setting.
 */
if ( ! function_exists( 'colorful_meta_icon' ) ) :
function colorful_meta_icon() {
	if ( is_category() ) {
		$meta_icon_text = 'fa fa-folder-open';
		$meta_icon_text = apply_filters( 'colorful_meta_cat_icon', $meta_icon_text );
	} elseif ( is_tag() ) {
		$meta_icon_text = 'fa fa-tags';
		$meta_icon_text = apply_filters( 'colorful_meta_tags_icon', $meta_icon_text );
	} elseif ( is_author() ) {
		$meta_icon_text = 'fa fa-user';
		$meta_icon_text = apply_filters( 'colorful_meta_author_icon', $meta_icon_text );
	} elseif ( is_date() ) {
		$meta_icon_text = 'fa fa-calendar';
		$meta_icon_text = apply_filters( 'colorful_meta_date_icon', $meta_icon_text );
	} elseif ( is_post_type_archive() ) {
		$meta_icon_text = 'fa fa-archive';
		$meta_icon_text = apply_filters( 'colorful_meta_archive_icon', $meta_icon_text );
	} elseif ( is_tax() ) {
		$meta_icon_text = 'fa fa-folder-open-o';
		$meta_icon_text = apply_filters( 'colorful_meta_tax_icon', $meta_icon_text );
	} else {
		$meta_icon_text = 'fa fa-bookmark-o';
		$meta_icon_text = apply_filters( 'colorful_meta_default_icon', $meta_icon_text );
	}

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;
