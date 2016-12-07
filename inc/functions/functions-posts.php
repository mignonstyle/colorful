<?php
/**
 * Custom template tag of posts
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Prints the entry header.
 */
if ( ! function_exists( 'colorful_entry_header' ) ) :
function colorful_entry_header() {
	// Print the post thumbnails.
	colorful_post_thumb();

	// Prints the post title.
	colorful_entry_title();

	// Prints posting meta information in content header.
	colorful_entry_meta_header();
}
endif;

/**
 * Prints the post title.
 */
if ( ! function_exists( 'colorful_entry_title' ) ) :
function colorful_entry_title() {
	if ( is_singular() ) {
		the_title( '<h2 class="entry-title">', '</h2>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
	}
}
endif;

/**
 * Select the post thumbnail size.
 */
if ( ! function_exists( 'colorful_post_thumb_size' ) ) :
function colorful_post_thumb_size() {
	if ( is_singular() ) {
		$thumb_size = 'large-thumbnail';
	} else {
		$thumb_size = 'middle-thumbnail';
	}

	return $thumb_size;
}
endif;

/**
 * Print the post thumbnails.
 */
if ( ! function_exists( 'colorful_post_thumb' ) ) :
function colorful_post_thumb() {
	if ( has_post_thumbnail() ) {
		$thumb_size = colorful_post_thumb_size();

		echo '<div class="entry-thumbnail thumbnail cf">';

		if ( is_singular() ) {
			the_post_thumbnail( $thumb_size );
		} else {
			echo '<a href="' . esc_url( get_the_permalink() ) . '">';
			the_post_thumbnail( $thumb_size );
			echo '</a>';
		}

		echo '</div>';
	}
}
endif;

/**
 * Print the entry content.
 */
if ( ! function_exists( 'colorful_entry_content' ) ) :
function colorful_entry_content() {
	if ( is_singular() ) {
		// display entry content.
		colorful_entry_content_post();
	} else {
		// display entry excerpt.
		colorful_entry_content_excerpt();
	}
}
endif;

/**
 * display entry content.
 */
if ( ! function_exists( 'colorful_entry_content_post' ) ) :
function colorful_entry_content_post() {
	the_content( sprintf(
		// translators: %s: Name of current post.
		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'colorful' ), array( 'span' => array( 'class' => array() ) ) ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
	) );
}
endif;

/**
 * display entry excerpt.
 */
if ( ! function_exists( 'colorful_entry_content_excerpt' ) ) :
function colorful_entry_content_excerpt() {
	$more_link_icon = '<i class="fa fa-chevron-right"></i>';
	$more_link_icon = apply_filters( 'colorful_more_link_icon', $more_link_icon );

	$more_link = '<p class="more-link"><a href="' . esc_url( get_permalink() ) . '">' . __( 'READ POST', 'chocolat' ) . $more_link_icon . '</a></p>';
	$more_link = apply_filters( 'colorful_more_link', $more_link );

	echo '<div class="entry-summary">' . "\n";
	echo '<div class="cf">' . esc_attr( get_the_excerpt() ) . '</div>' . "\n";

	echo wp_kses( $more_link, array( 'p' => array( 'class' => array() ), 'a' => array( 'href' => array() ), 'i' => array( 'class' => array() ) ) );

	echo '</div>' . "\n";
}
endif;

/**
 * Print of the page header of no posts and 404 page.
 */
if ( ! function_exists( 'colorful_no_post_header' ) ) :
function colorful_no_post_header() {
	if ( is_404() ) {
		$pege_title_text = __( '404 Not found', 'colorful' );
	} else {
		$pege_title_text = __( 'Nothing Found', 'colorful' );
	}

	echo '<header class="page-header">' . "\n";
	echo '<h1 class="page-title">' . esc_attr( $pege_title_text ) . '</h1>' . "\n";
	echo '</header>' . "\n";
}
endif;

/**
 * Print of the content of no posts and 404 page.
 */
if ( ! function_exists( 'colorful_no_post_content' ) ) :
function colorful_no_post_content() {
	if ( is_home() && current_user_can( 'publish_posts' ) ) {

		$no_post_home_text = sprintf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'colorful' ), esc_url( admin_url( 'post-new.php' ) ) );
		$no_post_text = apply_filters( 'colorful_no_post_home_text', $no_post_home_text );

		$search_form = 'false';
	} elseif ( is_404() ) {

		$no_post_404_text = __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'colorful' );
		$no_post_text = apply_filters( 'colorful_no_post_404_text', $no_post_404_text );

		$search_form = 'true';
	} elseif ( is_search() ) {

		$no_post_search_text = __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'colorful' );
		$no_post_text = apply_filters( 'colorful_no_post_search_text', $no_post_search_text );

		$search_form = 'true';
	} else {

		$no_post_default_text = __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'colorful' );
		$no_post_text = apply_filters( 'colorful_no_post_default_text', $no_post_default_text );

		$search_form = 'true';
	}

	echo '<div class="page-content">' . "\n";
	echo '<p>' . wp_kses( $no_post_text, colorful_wp_kses_allowed_html_link() ) . '</p>' . "\n";
	if ( $search_form ) {
		get_search_form();
	}
	echo '</div>' . "\n";
}
endif;
