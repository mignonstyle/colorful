<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package colorful
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

if ( ! function_exists( 'colorful_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function colorful_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'colorful' ) );
		if ( $categories_list && colorful_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'colorful' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'colorful' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'colorful' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'colorful' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'colorful' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * entry meta date time
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

	echo '<span class="entry-meta-date">';
	echo wp_kses( $meta_date_icon, colorful_wp_kses_allowed_html_icon() );
	echo wp_kses( $meta_date, array( 'time' => array( 'class' => array(), 'datetime' => array() ) ) );
	echo '</span>';
}
endif;

/**
 * entry meta author
 */
if ( ! function_exists( 'colorful_entry_meta_author' ) ) :
function colorful_entry_meta_author() {
	if ( 'post' != get_post_type() ) {
		return false;
	}

	$meta_author_icon = '<i class="fa fa-user"></i>';
	$meta_author_icon = apply_filters( 'colorful_meta_author_icon', $meta_author_icon );

	$meta_author = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

	echo '<span class="entry-meta-author">';
	echo wp_kses( $meta_author_icon, colorful_wp_kses_allowed_html_icon() );
	echo wp_kses( $meta_author, array( 'span' => array( 'class' => array() ), 'a' => array( 'class' => array(), 'href' => array() ) ) );
	echo '</span>';
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
