<?php
/**
 * The template for displaying comments.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Get number of comments.
 */
if ( ! function_exists( 'colorful_get_comments_only_number' ) ) :
function colorful_get_comments_only_number() {
	global $post;

	$comment_cnt = get_comments( array(
		'status'      => 'approve',
		'post_status' => 'publish',
		'post_id'     => $post->ID,
		'type'        => 'comment',
		'count'       => true,
	) );

	return $comment_cnt;
}
endif;

/**
 * Display the comment title.
 */
if ( ! function_exists( 'colorful_comment_title' ) ) :
function colorful_comment_title() {
	$comments_number = colorful_get_comments_only_number();

	$one_comment_title = sprintf( __( '%d Comment', 'chocolat' ), absint( $comments_number ) );
	$one_comment_title = apply_filters( 'colorful_one_comment_title', $one_comment_title );

	$multiple_comment_title = sprintf( __( '%d Comments', 'chocolat' ), absint( $comments_number ) );
	$multiple_comment_title = apply_filters( 'colorful_multiple_comment_title', $multiple_comment_title );

	echo '<h2 class="comments-title">' . "\n";

	if ( 1 === $comments_number ) {
		echo esc_attr( $one_comment_title );

	} else {
		echo esc_attr( $multiple_comment_title );

	}

	echo '</h2>' . "\n";
}
endif;

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
		</article><!-- .comment-body -->
	<?php
	// Note the lack of a trailing </li>. In order to accommodate nested replies, WordPress will add the appropriate closing tag after listing any child elements.
}
endif;

/**
 * Get number of trackback and pinback.
 */
if ( ! function_exists( 'colorful_get_pings_only_number' ) ) :
function colorful_get_pings_only_number() {
	global $post;

	$comment_cnt = get_comments( array(
		'status'      => 'approve',
		'post_status' => 'publish',
		'post_id'     => $post->ID,
		'type'        => 'pings',
		'count'       => true,
	) );

	return $comment_cnt;
}
endif;

/**
 * Display the trackback and pinback title.
 */
if ( ! function_exists( 'colorful_pings_title' ) ) :
function colorful_pings_title() {
	$pings_number = colorful_get_pings_only_number();

	$one_pings_title = sprintf( __( '%d Trackback', 'chocolat' ), absint( $pings_number ) );
	$one_pings_title = apply_filters( 'colorful_one_comment_title', $one_pings_title );

	$multiple_pings_title = sprintf( __( '%d Trackbacks', 'chocolat' ), absint( $pings_number ) );
	$multiple_pings_title = apply_filters( 'colorful_multiple_comment_title', $multiple_pings_title );

	echo '<h2 class="comments-title">' . "\n";

	if ( 1 === $pings_number ) {
		echo esc_attr( $one_pings_title );

	} else {
		echo esc_attr( $multiple_pings_title );

	}

	echo '</h2>' . "\n";
}
endif;

/**
 * Displays trackback and pinback for a post or page.
 */
if ( ! function_exists( 'colorful_list_pings' ) ) :
function colorful_list_pings() {
	global $comment, $post;
	$comment_order = get_option( 'comment_order' );

	$comments_pings = get_comments( array(
		'number'      => '',
		'status'      => 'approve',
		'post_status' => 'publish',
		'post_id'     => $post->ID,
		'order'       => $comment_order,
		'type'        => 'pings',
	) );
	?>

	<ol class="comment-list">
		<?php foreach ( $comments_pings as $comment ) : ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body cf">

					<div class="comment-body-center">

						<div class="comment-author-data">
							<?php
							// comment author name and link.
							printf( '<span class="comment-author"><cite class="fn">%s</cite></span>', get_comment_author_link() );
							?>

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

				</article><!-- .comment-body -->
			</li>
		<?php endforeach; ?>
	</ol><!-- .comment-list -->
<?php
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
