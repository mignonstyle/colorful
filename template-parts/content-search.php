<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php
		// Prints posting meta information in content header.
		colorful_entry_meta_header();
		?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php
	// Prints posting meta information in content footer.
	colorful_entry_meta_footer();
	?>
</article><!-- #post-## -->
