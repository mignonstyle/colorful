<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colorful
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


			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'colorful' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
	// Prints posting meta information in content footer.
	colorful_entry_meta_footer();
	?>
</article><!-- #post-## -->
