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
		$prev_icon = colorful_post_prev_icon();
		$next_icon = colorful_post_next_icon();

		$prev_text = '<span class="nav-previous">' . $prev_icon . '%title</span>';
		$prev_text = apply_filters( 'colorful_post_prev_text', $prev_text );

		$next_text = '<span class="nav-next">%title' . $next_icon . '</span>';
		$next_text = apply_filters( 'colorful_post_next_text', $next_text );

		$args = array(
			'prev_text' => $prev_text,
			'next_text' => $next_text,
		);

		echo '<div class="page-nav">' . "\n";
		the_post_navigation( $args );
		echo '</div>' . "\n";
	}
}
endif;

/**
 * Displays the navigation of posts.
 */
if ( ! function_exists( 'colorful_posts_page_navigation' ) ) :
function colorful_posts_page_navigation( $navi_type = 'pagination' ) {
	if ( 'pagination' == $navi_type ) {
		// Prints posts navigation links. (paginate).
		colorful_pagination();

	} else {
		// Displays the navigation to next/previous set of posts, when applicable.
		colorful_posts_nav();

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

	$prev_icon = colorful_post_prev_icon();
	$next_icon = colorful_post_next_icon();

	$prev_text = '<span class="nav-previous">' . $prev_icon . __( 'Older posts', 'colorful' ) . '</span>';
	$prev_text = apply_filters( 'colorful_posts_prev_text', $prev_text );

	$next_text = '<span class="nav-next">' . __( 'Newer posts', 'colorful' ) . $next_icon . '</span>';
	$next_text = apply_filters( 'colorful_posts_next_text', $next_text );

	$args = array(
		'prev_text' => $prev_text,
		'next_text' => $next_text,
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

	$prev_text  = colorful_pagination_prev_text();
	$next_text  = colorful_pagination_next_text();

	$translated = __( 'Page', 'colorful' ); // Supply translatable string.

	$args = array(
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

	$paginate_links = paginate_links( apply_filters( 'colorful_paginate_links_args', $args ) );

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

/**
 * Displays the comments navigation.
 */
if ( ! function_exists( 'colorful_comment_navigation' ) ) :
function colorful_comment_navigation( $navi_type = 'pagination' ) {
	// Check for comment navigation.
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'colorful' ); ?></h2>

	<?php
		if ( 'pagination' == $navi_type ) {
			// Prints the comments paginate links.
			colorful_comments_pagination();

		} else {
			// Displays the comments navigation to next/previous.
			colorful_comments_nav();

		}
		?>
		</nav>
	<?php
	endif;
}
endif;

/**
 * Displays the comments navigation to next/previous.
 */
if ( ! function_exists( 'colorful_comments_nav' ) ) :
function colorful_comments_nav() {
	$prev_icon = colorful_comments_prev_icon();
	$next_icon = colorful_comments_next_icon();

	$prev_text = $prev_icon . __( 'Older Comments', 'colorful' );
	$prev_text = apply_filters( 'colorful_comments_prev_text', $prev_text );

	$next_text = __( 'Newer Comments', 'colorful' ) . $next_icon;
	$next_text = apply_filters( 'colorful_comments_next_text', $next_text );
	?>

	<div class="nav-links">
		<div class="nav-previous"><?php previous_comments_link( wp_kses( $prev_text, colorful_wp_kses_allowed_html_icon() ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( wp_kses( $next_text, colorful_wp_kses_allowed_html_icon() ) ); ?></div>
	</div><!-- .nav-links -->

	<?php
}
endif;

/**
 * Prints the comments paginate links.
 */
if ( ! function_exists( 'colorful_comments_pagination' ) ) :
function colorful_comments_pagination() {
	$prev_text  = colorful_pagination_prev_text();
	$next_text  = colorful_pagination_next_text();

	$translated = __( 'Page', 'colorful' ); // Supply translatable string.

	$args = array(
		'prev_text'          => $prev_text,
		'next_text'          => $next_text,
		'type'               => 'plain',
		'before_page_number' => '<span class="numbers"><span class="screen-reader-text">' . $translated . ' </span>',
		'after_page_number'  => '</span>',
	);

	echo '<div class="pagination cf"><div class="page-links">' . "\n";
	paginate_comments_links( apply_filters( 'colorful_paginate_comments_links_args', $args ) );
	echo '</div></div>' . "\n";
}
endif;

/**
 * paginate links prev text.
 */
if ( ! function_exists( 'colorful_pagination_prev_text' ) ) :
function colorful_pagination_prev_text() {
	$prev_text  = __( '&lsaquo;', 'colorful' );
	$prev_text  = apply_filters( 'colorful_pagination_prev_text', $prev_text );

	return $prev_text;
}
endif;

/**
 * paginate links next text.
 */
if ( ! function_exists( 'colorful_pagination_next_text' ) ) :
function colorful_pagination_next_text() {
	$next_text  = __( '&rsaquo;', 'colorful' );
	$next_text  = apply_filters( 'colorful_pagination_next_text', $next_text );

	return $next_text;
}
endif;
