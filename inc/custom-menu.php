<?php
/**
 * Enable custom menu functions.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */
if ( ! function_exists( 'colorful_custom_menu_setup' ) ) :
function colorful_custom_menu_setup() {
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'colorful' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'colorful_custom_menu_setup' );
