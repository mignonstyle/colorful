<?php
/**
 * Register widget area.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */

/**
 * Register widget area.
 */
if ( ! function_exists( 'colorful_widgets_init' ) ) :
function colorful_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'colorful' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'colorful' ),
		'before_widget' => '<section id="%1$s" class="widget widget-common cf %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-header"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
}
endif;
add_action( 'widgets_init', 'colorful_widgets_init' );
