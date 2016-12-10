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
	if ( have_comments() ) : ?>
	<div class="comments-inner common-contents cf">
		<h2 class="comments-title">
			<?php
				// コメントタイトル
				// comment.
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					printf(
						/* translators: %s: post title */
						esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'colorful' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'colorful'
						) ),
						number_format_i18n( $comments_number ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				// end　コメントタイトル.
			?>
		</h2>

		<?php
		// Displays comments for a post or page.
		colorful_list_comments();

		// Displays the comments navigation.
		colorful_comment_navigation();

	// end　コメントがあるばあい
	endif; // Check for have_comments().

	// If comments are closed and there are comments.
	colorful_no_comment();

	// Display the posts comment form.
	comment_form();
	?>
	</div><!-- .comments-inner -->
</div><!-- #comments -->
<?php endif; ?>
