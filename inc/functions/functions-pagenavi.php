<?php
/**
 * Custom template tag of paginavi.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Displays the navigation to next/previous post, when applicable.
 */
if ( ! function_exists( 'colorful_post_nav' ) ) :
function colorful_post_nav() {
	if ( is_single() && get_the_post_navigation() ) {
		$post_prev_icon = '<i class="fa fa-chevron-circle-left"></i>';
		$post_prev_icon = apply_filters( 'colorful_post_prev_icon', $post_prev_icon );

		$post_prev_text = '<span class="nav-previous">' . $post_prev_icon . '%title</span>';
		$post_prev_text = apply_filters( 'colorful_post_prev_text', $post_prev_text );

		$post_next_icon = '<i class="fa fa-chevron-circle-right"></i></span>';
		$post_next_icon = apply_filters( 'colorful_post_next_icon', $post_next_icon );

		$post_next_text = '<span class="nav-next">%title' . $post_next_icon . '</span>';
		$post_next_text = apply_filters( 'colorful_post_next_text', $post_next_text );

		$args = array(
			'prev_text' => $post_prev_text,
			'next_text' => $post_next_text,
		);

		echo '<div class="page-nav">' . "\n";
		the_post_navigation( $args );
		echo '</div>' . "\n";
	}
}
endif;

/**
 * Displays the navigation to next/previous set of posts, when applicable.
 */
if ( ! function_exists( 'colorful_posts_nav' ) ) :
function colorful_posts_nav() {
	if ( ! get_the_posts_navigation() ) {
		return false;
	}

	$posts_prev_icon = '<i class="fa fa-chevron-circle-left"></i>';
	$posts_prev_icon = apply_filters( 'colorful_posts_prev_icon', $posts_prev_icon );

	$posts_prev_text = '<span class="nav-previous">' . $posts_prev_icon . __( 'Older posts', 'colorful' ) . '</span>';
	$posts_prev_text = apply_filters( 'colorful_posts_prev_text', $posts_prev_text );

	$posts_next_icon = '<i class="fa fa-chevron-circle-right"></i></span>';
	$posts_next_icon = apply_filters( 'colorful_posts_next_icon', $posts_next_icon );

	$posts_next_text = '<span class="nav-next">' . __( 'Newer posts', 'colorful' ) . $posts_next_icon . '</span>';
	$posts_next_text = apply_filters( 'colorful_posts_next_text', $posts_next_text );

	$args = array(
		'prev_text' => $posts_prev_text,
		'next_text' => $posts_next_text,
	);

	echo '<div class="page-nav">' . "\n";
	the_posts_navigation( $args );
	echo '</div>' . "\n";
}
endif;

/**
 * Prints posts navigation links. (paginate)
 */
if ( ! function_exists( 'colorful_pagination' ) ) :
function colorful_pagination() {
	global $wp_query;
	$pages = $wp_query -> max_num_pages;

	if ( 1 >= $pages ) {
		return false;
	}

	$big        = 999999999; // need an unlikely integer.
	$mid_size   = ( colorful_is_mobile() ) ? 0 : 3 ;

	$prev_text  = __( '&lsaquo;', 'colorful' );
	$prev_text  = apply_filters( 'colorful_pagination_prev_text', $prev_text );

	$next_text  = __( '&rsaquo;', 'colorful' );
	$next_text  = apply_filters( 'colorful_pagination_next_text', $next_text );

	$translated = __( 'Page', 'colorful' ); // Supply translatable string.

	$paginate_links_args = array(
		'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'total'              => $wp_query -> max_num_pages,
		'current'            => max( 1, get_query_var( 'paged' ) ),
		'mid_size'           => $mid_size,
		'prev_text'          => $prev_text,
		'next_text'          => $next_text,
		'type'               => 'plain',
		'before_page_number' => '<span class="numbers"><span class="screen-reader-text">' . $translated . ' </span>',
		'after_page_number'  => '</span>',
	);

	$paginate_links = paginate_links( apply_filters( 'colorful_paginate_links_args', $paginate_links_args ) );

	echo '<div class="pagination cf">' . "\n";

	echo wp_kses( $paginate_links, array( 'span' => array( 'class' => array() ), 'a' => array( 'class' => array(), 'href' => array() ) ) );

	echo '</div>' . "\n";
}
endif;

/**
 * Displays page-links for paginated posts. use <!--nextpage-->.
 */
if ( ! function_exists( 'colorful_post_nextpage' ) ) :
function colorful_post_nextpage() {
	if ( ! is_singular() ) {
		return false;
	}

	$translated = __( 'Page', 'colorful' ); // Supply translatable string.

	$wp_link_pages_args = array(
		'before'      => '<div class="pagination cf"><div class="page-links">',
		'after'       => '</div></div>',
		'link_before' => '<span class="numbers"><span class="screen-reader-text">' . $translated . ' </span>',
		'link_after'  => '</span>',
	);

	wp_link_pages( apply_filters( 'colorful_link_pages_args', $wp_link_pages_args ) );
}
endif;
