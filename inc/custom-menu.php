<?php
/**
 * Enable custom menu functions.
 *
 * @package colorful
 * @author  Mignon Style
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

/**
 * Site global navigation.
 */
if ( ! function_exists( 'colorful_site_global_navi' ) ) :
function colorful_site_global_navi() {
	?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'colorful' ); ?></button>
		<?php wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_id'        => 'primary-menu',
		) ); ?>
	</nav><!-- #site-navigation -->
	<?php
}
endif;
