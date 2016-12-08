<?php
/**
 * The template for displaying archive pages.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			// Print of the page header.
			colorful_post_header();

			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the content template.
				get_template_part( 'template-parts/content' );

			endwhile; // End of the loop.

			// Displays the navigation of posts.
			colorful_posts_page_navigation();

		else :

			// Include the content none template.
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
