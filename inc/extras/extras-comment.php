<?php
/**
 * Custom functions of the comments templates.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * The customize comment form arguments.
 */
if ( ! function_exists( 'colorful_comment_form_customize' ) ) :
function colorful_comment_form_customize( $args ) {
	$args['title_reply'] = __( 'Please feel free to comment.', 'colorful' );
	$args['comment_notes_before'] = '';

	return $args;
}
endif;
add_filter( 'comment_form_defaults', 'colorful_comment_form_customize' );

/**
 * The customize comment fields.
 */
if ( ! function_exists( 'colorful_form_customize_fields' ) ) :
function colorful_form_customize_fields( $fileds ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? ' aria-required="true"' : '' );
	$html_req  = ( $req ? ' required="required"' : '' );

	$fileds['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Email', 'colorful' ) . ( $req ? '<span class="required">*</span><small>' . __( '(Will not be published.)', 'colorful' ) . '</small>' : '' ) . '</label><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';

	return $fileds;
}
endif;
add_filter( 'comment_form_default_fields', 'colorful_form_customize_fields' );

/**
 * Change order of comment form.
 */
if ( ! function_exists( 'colorful_comment_form_fields' ) ) :
function colorful_comment_form_fields( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}
endif;
add_filter( 'comment_form_fields', 'colorful_comment_form_fields' );
