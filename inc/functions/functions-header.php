<?php
/**
 * Custom template tag of header.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */

/**
 * Print site header.
 */
if ( ! function_exists( 'colorful_site_header_branding' ) ) :
function colorful_site_header_branding() {
	echo '<div class="site-branding">' . "\n";

	// Site branding title.
	colorful_site_header_title();

	// Site branding description.
	colorful_site_header_description();

	echo '</div>' . "\n";

	// Site global navigation.
	colorful_site_global_navi();

	// Site main header image.
	colorful_site_header_image();
}
endif;

/**
 * Site branding title.
 */
if ( ! function_exists( 'colorful_site_header_title' ) ) :
function colorful_site_header_title() {
	?>
	<h1 class="site-branding-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	</h1>
	<?php
}
endif;

/**
 * Site branding description.
 */
if ( ! function_exists( 'colorful_site_header_description' ) ) :
function colorful_site_header_description() {
	$description = get_bloginfo( 'description', 'display' );

	if ( $description || is_customize_preview() ) : ?>
	<p class="site-branding-description"><?php echo esc_attr( $description ); ?></p>
	<?php endif;
}
endif;

/**
 * Site main header image.
 */
if ( ! function_exists( 'colorful_site_header_image' ) ) :
function colorful_site_header_image() {
	if ( get_header_image() ) : ?>
	<div class="header-image">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</div><!-- .header-image -->
	<?php endif;
}
endif;
