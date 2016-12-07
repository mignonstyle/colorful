<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<?php
				// Print of the page header of no posts and 404 page.
				colorful_no_post_header();

				// Print of the content of no posts and 404 page.
				colorful_no_post_content();
				?>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
