<?php
/**
 * The template for displaying comments.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Displays comments for a post or page.
 */
if ( ! function_exists( 'colorful_list_comments' ) ) :
function colorful_list_comments() {
	$reply_text  = __( 'Reply', 'colorful' );
	$reply_text  = apply_filters( 'colorful_comment_reply_text', $reply_text );

	$avatar_size = 50;
	$avatar_size = apply_filters( 'colorful_comment_avatar_size', $avatar_size );

	$args = array(
		'callback'    => 'colorful_comment_cb',
		'type'        => 'comment',
		'reply_text'  => $reply_text,
		'avatar_size' => $avatar_size,
		'format'      => 'html5',
	);

	echo '<ol class="comment-list">' . "\n";
	wp_list_comments( apply_filters( 'colorful_list_comments_args', $args ) );
	echo '</ol>' . "\n";
}
endif;

/**
 * Custom function to display comments.
 */
if ( ! function_exists( 'colorful_comment_cb' ) ) :
function colorful_comment_cb( $comment, $args, $depth ) {
	?>

	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<article id="div-comment-<?php comment_ID() ?>" class="comment-body cf">
			<?php
			// When waiting for approval by administrator.
			if ( '0' == $comment->comment_approved ) :
				// When waiting for approval by administrator.
				colorful_comment_awaiting_text();

			else :
			// Display comment of posts.
			?>
				<div class="comment-body-header">
					<div class="comment-author vcard">
						<?php
						// comment author image (avatar).
						if ( 0 != $args['avatar_size'] ) {
							echo get_avatar( $comment, $args['avatar_size'] );
						}
						?>
					</div>
				</div><!-- .comment-body-header -->

				<div class="comment-body-center">

					<div class="comment-author-data">
						<?php
						// comment author name and link.
						printf( '<span class="comment-author"><cite class="fn">%s</cite></span>', get_comment_author_link() );
						?>

						<span class="reply">
						<?php
						// comment reply link.
						comment_reply_link( array_merge( $args, array( 'reply_text' => $args['reply_text'], 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
						?>
						</span>

						<?php
						// comment edit link.
						edit_comment_link( __( 'Edit', 'colorful' ), '<span class="edit-link">', '</span>' );
						?>
					</div><!-- .comment-author-data -->

					<div class="comment-content">
						<?php
						// comment contents text.
						comment_text();
						?>
					</div><!-- .comment-content -->

					<div class="comment-meta commentmetadata">
						<?php
						// comment date. translators: 1: date, 2: time.
						printf( esc_html__( '%1$s %2$s', 'colorful' ), get_comment_date(), get_comment_time() );
						?>
					</div><!-- .comment-meta -->

				</div><!-- .comment-body-center -->

			<?php endif; ?>
		</article><!-- comment-body -->
	<?php
	// Note the lack of a trailing </li>. In order to accommodate nested replies, WordPress will add the appropriate closing tag after listing any child elements.
}
endif;

/**
 * When waiting for approval by administrator.
 */
if ( ! function_exists( 'colorful_comment_awaiting_text' ) ) :
function colorful_comment_awaiting_text() {
	$awaiting_text = __( 'Your comment is awaiting moderation.', 'colorful' );
	$awaiting_text = apply_filters( 'colorful_comment_awaiting_text', $awaiting_text );

	if ( ! empty( $awaiting_text ) ) : ?>
		<p class="comment-awaiting-moderation"><?php echo esc_attr( $awaiting_text ); ?></p>
	<?php endif;
}
endif;

/**
 * If comments are closed and there are comments.
 */
if ( ! function_exists( 'colorful_no_comment' ) ) :
function colorful_no_comment() {
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		$no_comment_text = __( 'Comments are closed.', 'colorful' );
		$no_comment_text = apply_filters( 'colorful_no_comment_text', $no_comment_text );

		if ( ! empty( $no_comment_text ) ) {
			echo '<p class="no-comments common-contents cf">' . esc_attr( $no_comment_text ) . '</p>';
		}
	}
}
endif;
