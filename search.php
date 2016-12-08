<?php
/**
 * The template for displaying search results pages.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'colorful' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the content template of search.
				get_template_part( 'template-parts/content', 'search' );

			endwhile; // End of the loop.

			// Displays the navigation of posts.
			colorful_posts_page_navigation();

		else :

			// Include the content none template.
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
