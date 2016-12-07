<?php
/**
 * The template for displaying all single posts.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the content template.
			get_template_part( 'template-parts/content', get_post_format() );

			// Displays the navigation to next/previous post, when applicable.
			colorful_post_nav();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
