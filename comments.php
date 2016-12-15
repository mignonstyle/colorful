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
		// Displays the comments navigation.
		colorful_comment_navigation();
	endif;

	// You can start editing here -- including this pings!
	$pings_number = colorful_get_pings_only_number();
	if ( 0 < $pings_number ) : ?>
	<div class="comments-inner pings-inner common-contents cf">
		<?php
		// Display the trackback and pinback title.
		colorful_pings_title();

		// Displays trackback and pinback for a post or page.
		colorful_list_pings();
		?>
	</div><!-- /comments-inner -->
	<?php endif;

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		// If comments are closed and there are comments.
		colorful_no_comment();
	}

	// Display the posts comment form.
	comment_form();
	?>

</div><!-- #comments -->
<?php  endif; ?>
