<?php
/**
 * Enable custom menu functions.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */
if ( ! function_exists( 'colorful_setup_custom_menu' ) ) :
function colorful_setup_custom_menu() {
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'colorful' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'colorful_setup_custom_menu' );
