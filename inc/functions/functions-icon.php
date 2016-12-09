<?php
/**
 * Custom template icon settings.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Icon font setting category.
 */
if ( ! function_exists( 'colorful_meta_cat_icon' ) ) :
function colorful_meta_cat_icon() {
	$meta_icon_text = 'fa fa-folder-open';
	$meta_icon_text = apply_filters( 'colorful_meta_cat_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting tags.
 */
if ( ! function_exists( 'colorful_meta_tags_icon' ) ) :
function colorful_meta_tags_icon() {
	$meta_icon_text = 'fa fa-tags';
	$meta_icon_text = apply_filters( 'colorful_meta_tags_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting author.
 */
if ( ! function_exists( 'colorful_meta_author_icon' ) ) :
function colorful_meta_author_icon() {
	$meta_icon_text = 'fa fa-user';
	$meta_icon_text = apply_filters( 'colorful_meta_author_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting date.
 */
if ( ! function_exists( 'colorful_meta_date_icon' ) ) :
function colorful_meta_date_icon() {
	$meta_icon_text = 'fa fa-calendar';
	$meta_icon_text = apply_filters( 'colorful_meta_date_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting archive.
 */
if ( ! function_exists( 'colorful_meta_archive_icon' ) ) :
function colorful_meta_archive_icon() {
	$meta_icon_text = 'fa fa-archive';
	$meta_icon_text = apply_filters( 'colorful_meta_archive_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting tax.
 */
if ( ! function_exists( 'colorful_meta_tax_icon' ) ) :
function colorful_meta_tax_icon() {
	$meta_icon_text = 'fa fa-folder-open-o';
	$meta_icon_text = apply_filters( 'colorful_meta_tax_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting edit.
 */
if ( ! function_exists( 'colorful_meta_edit_icon' ) ) :
function colorful_meta_edit_icon() {
	$meta_icon_text = 'fa fa-pencil';
	$meta_icon_text = apply_filters( 'colorful_meta_edit_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting comments.
 */
if ( ! function_exists( 'colorful_meta_comments_icon' ) ) :
function colorful_meta_comments_icon() {
	$meta_icon_text = 'fa fa-comment';
	$meta_icon_text = apply_filters( 'colorful_meta_comments_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting prev.
 */
if ( ! function_exists( 'colorful_post_prev_icon' ) ) :
function colorful_post_prev_icon() {
	$meta_icon_text = 'fa fa-angle-left';
	$meta_icon_text = apply_filters( 'colorful_post_prev_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting next.
 */
if ( ! function_exists( 'colorful_post_next_icon' ) ) :
function colorful_post_next_icon() {
	$meta_icon_text = 'fa fa-angle-right';
	$meta_icon_text = apply_filters( 'colorful_post_next_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;

/**
 * Icon font setting prev of comments.
 */
if ( ! function_exists( 'colorful_comments_prev_icon' ) ) :
function colorful_comments_prev_icon() {
	$meta_icon_text = '';
	$meta_icon_text = apply_filters( 'colorful_comments_prev_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': colorful_post_prev_icon();

	return $meta_icon;
}
endif;

/**
 * Icon font setting next of comments.
 */
if ( ! function_exists( 'colorful_comments_next_icon' ) ) :
function colorful_comments_next_icon() {
	$meta_icon_text = '';
	$meta_icon_text = apply_filters( 'colorful_comments_next_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': colorful_post_next_icon();

	return $meta_icon;
}
endif;

/**
 * Icon font setting more link.
 */
if ( ! function_exists( 'colorful_more_link_icon' ) ) :
function colorful_more_link_icon() {
	$meta_icon_text = 'fa fa-angle-right';
	$meta_icon_text = apply_filters( 'colorful_more_link_icon', $meta_icon_text );

	$meta_icon = ( ! empty( $meta_icon_text ) ) ? '<i class="' . $meta_icon_text . '"></i>': '';

	return $meta_icon;
}
endif;
