<?php
/**
 * Custom template tags for this theme.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Prints posting meta information in content header.
 */
if ( ! function_exists( 'colorful_entry_meta_header' ) ) :
function colorful_entry_meta_header() {
	echo '<div class="entry-meta">';
	// entry meta date time.
	colorful_entry_meta_date();

	// entry meta author.
	colorful_entry_meta_author();

	echo '</div>';
}
endif;

/**
 * Prints posting meta information in content footer.
 */
if ( ! function_exists( 'colorful_entry_meta_footer' ) ) :
function colorful_entry_meta_footer() {
	echo '<footer class="entry-footer">';

	// entry meta category.
	colorful_entry_meta_cat();

	// entry meta tags.
	colorful_entry_meta_tags();

	// entry meta edit.
	colorful_entry_meta_edit();

	// entry meta comments link.
	colorful_entry_meta_comments_link();

	echo '</footer>';
}
endif;

/**
 * entry meta date time.
 */
if ( ! function_exists( 'colorful_entry_meta_date' ) ) :
function colorful_entry_meta_date() {
	if ( 'post' != get_post_type() ) {
		return false;
	}

	$meta_date_icon = '<i class="fa fa-clock-o"></i>';
	$meta_date_icon = apply_filters( 'colorful_meta_date_icon', $meta_date_icon );

	$meta_date = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$meta_date = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$meta_date = sprintf( $meta_date,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="entry-meta-date  entry-metadata">';
	echo wp_kses( $meta_date_icon, colorful_wp_kses_allowed_html_icon() );
	echo wp_kses( $meta_date, array( 'time' => array( 'class' => array(), 'datetime' => array() ) ) );
	echo '</span>';
}
endif;

/**
 * entry meta author.
 */
if ( ! function_exists( 'colorful_entry_meta_author' ) ) :
function colorful_entry_meta_author() {
	if ( 'post' != get_post_type() ) {
		return false;
	}

	$meta_author_icon = '<i class="fa fa-user"></i>';
	$meta_author_icon = apply_filters( 'colorful_meta_author_icon', $meta_author_icon );

	$meta_author = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

	echo '<span class="entry-meta-author  entry-metadata">';
	echo wp_kses( $meta_author_icon, colorful_wp_kses_allowed_html_icon() );
	echo wp_kses( $meta_author, array( 'span' => array( 'class' => array() ), 'a' => array( 'class' => array(), 'href' => array() ) ) );
	echo '</span>';
}
endif;

/**
 * entry meta category.
 */
if ( ! function_exists( 'colorful_entry_meta_cat' ) ) :
function colorful_entry_meta_cat() {
	$meta_cat_icon = '<i class="fa fa-folder-open"></i>';
	$meta_cat_icon = apply_filters( 'colorful_meta_cat_icon', $meta_cat_icon );

	if ( 'post' === get_post_type() ) {
		// translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( esc_html__( ', ', 'colorful' ) );

		if ( $categories_list && colorful_categorized_blog() ) {
			echo '<span class="entry-meta-cat entry-metadata">';
			echo wp_kses( $meta_cat_icon, colorful_wp_kses_allowed_html_icon() );
			echo wp_kses( $categories_list, colorful_wp_kses_allowed_html_link() );
			echo '</span>';
		}
	}
}
endif;

/**
 * entry meta tags.
 */
if ( ! function_exists( 'colorful_entry_meta_tags' ) ) :
function colorful_entry_meta_tags() {
	$meta_tags_icon = '<i class="fa fa-tags"></i>';
	$meta_tags_icon = apply_filters( 'colorful_meta_tags_icon', $meta_tags_icon );

	if ( 'post' === get_post_type() ) {
		// translators: used between list items, there is a space after the comma.
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'colorful' ) );
		if ( $tags_list ) {
			echo '<span class="entry-meta-tags entry-metadata tags-links">';
			echo wp_kses( $meta_tags_icon, colorful_wp_kses_allowed_html_icon() );
			echo wp_kses( $tags_list, colorful_wp_kses_allowed_html_link() );
			echo '</span>';
		}
	}
}
endif;

/**
 * entry meta edit.
 */
if ( ! function_exists( 'colorful_entry_meta_edit' ) ) :
function colorful_entry_meta_edit() {
	$meta_edit_icon = '<i class="fa fa-pencil"></i>';
	$meta_edit_icon = apply_filters( 'colorful_meta_edit_icon', $meta_edit_icon );

	edit_post_link(
		sprintf(
			// translators: %s: Name of current post.
			esc_html__( 'Edit %s', 'colorful' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="entry-meta-edit entry-metadata edit-link">' . $meta_edit_icon,
		'</span>'
	);
}
endif;

/**
 * entry meta comments link.
 */
if ( ! function_exists( 'colorful_entry_meta_comments_link' ) ) :
function colorful_entry_meta_comments_link() {
	if (  is_singular() ) {
		return false;
	}

	$meta_comments_icon = '<i class="fa fa-comment"></i>';
	$meta_comments_icon = apply_filters( 'colorful_meta_comments_icon', $meta_comments_icon );

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="entry-meta-comments entry-metadata comments-link">';
		echo wp_kses( $meta_comments_icon, colorful_wp_kses_allowed_html_icon() );
		// translators: %s: post title.
		comments_popup_link( sprintf( wp_kses( __( '<span class="screen-reader-text"> on %s</span>', 'colorful' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'colorful_categorized_blog' ) ) :
function colorful_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'colorful_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'colorful_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so colorful_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so colorful_categorized_blog should return false.
		return false;
	}
}
endif;
