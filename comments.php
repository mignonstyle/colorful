<?php
/**
 * The template for displaying comments.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

if ( post_password_required() ) {
	return;
}

if ( have_comments() || comments_open() || pings_open() ) : ?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	// コメントがあるばあい.
	$comments_number = colorful_get_comments_only_number();
	if ( 0 < $comments_number ) : ?>

		<div class="comments-inner common-contents cf">
			<?php
			// Display the comment title.
			colorful_comment_title();

			// Displays comments for a post or page.
			colorful_list_comments();
			?>
		</div><!-- /comments-inner -->

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			// Displays the comments navigation.
			colorful_comment_navigation();
		}

	// end　コメントがあるばあい.
	endif; // Check for have_comments().

	// pinback.
	// If comments are closed and there are comments.
	colorful_no_comment();

	// Display the posts comment form.
	comment_form();
	?>
	</div><!-- .comments-inner -->
</div><!-- #comments -->
<?php endif; ?>
