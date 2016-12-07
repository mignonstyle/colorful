<?php
/**
 * Template part for displaying posts.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		// Prints the entry header.
		colorful_entry_header();
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			// Print the entry content.
			colorful_entry_content();

			// Displays page-links for paginated posts.
			colorful_post_nextpage();
		?>
	</div><!-- .entry-content -->

	<?php
	// Prints posting meta information in content footer.
	colorful_entry_meta_footer();
	?>
</article><!-- #post-## -->
