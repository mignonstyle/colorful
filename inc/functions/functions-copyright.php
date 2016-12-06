<?php
/**
 * Custom template tag of copyright.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */

/**
 * footer info.
 */
if ( ! function_exists( 'colorful_footer_info' ) ) :
function colorful_footer_info() {
	$colorful_footer_powered = colorful_footer_powered();
	$colorful_footer_copyright = colorful_footer_copyright();

	echo '<div class="site-info-footer">';

	echo wp_kses( $colorful_footer_powered, array( 'p' => array( 'class' => array() ), 'a' => array( 'href' => array(), 'target' => array() ) ) );
	echo wp_kses( $colorful_footer_copyright, array( 'p' => array( 'class' => array() ), 'a' => array( 'href' => array(), 'target' => array() ) ) );

	echo '</div>';
}
endif;

/**
 * footer powered.
 */
if ( ! function_exists( 'colorful_footer_powered' ) ) :
function colorful_footer_powered() {
	$theme_name    = __( 'Colorful', 'colorful' );
	$theme_url     = __( 'http://mignonstyle.com/', 'colorful' );
	$wordpress_url = ( 'ja' == get_locale() ) ? __( 'https://ja.wordpress.org/', 'colorful' ) : __( 'https://wordpress.org/', 'colorful' );

	$theme_link    = sprintf(
		'<a href="%s" target="_blank">%s</a>',
		esc_url( $theme_url ),
		__( 'Mignon Style', 'colorful' )
	);

	$wordpress_link = sprintf(
		'<a href="%s" target="_blank">%s</a>',
		esc_url( $wordpress_url ),
		__( 'WordPress', 'colorful' )
	);

	$powered_by = sprintf(
		__( 'Powered by %1$s %2$s theme by %3$s.', 'colorful' ),
		$wordpress_link,
		$theme_name,
		$theme_link
	);
	$powered_by = apply_filters( 'colorful_footer_powered_by', $powered_by );

	$powered_before = '<p class="site-info-powered powered">';
	$powered_after  = '</p>';

	return $powered_before . $powered_by . $powered_after;
}
endif;

/**
 * footer copyright.
 */
if ( ! function_exists( 'colorful_footer_copyright' ) ) :
function colorful_footer_copyright() {
	$copyright_by = sprintf(
		__( 'Copyright &copy; %1$s All Rights Reserved.', 'colorful' ),
		get_bloginfo( 'name' )
	);
	$copyright_by = apply_filters( 'colorful_footer_copyright_by', $copyright_by );

	$copyright_before = '<p class="site-info-copyright copyright"><small>';
	$copyright_after  = '</small></p>';

	return $copyright_before . $copyright_by . $copyright_after;
}
endif;
