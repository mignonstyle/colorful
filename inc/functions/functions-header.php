<?php
/**
 * Custom template tag of header.
 *
 * @package colorful
 * @author Mignon Style
 * @license GPLv2 or later
 */

/**
 * Print of site branding title and description.
 */
if ( ! function_exists( 'colorful_site_header_branding' ) ) :
function colorful_site_header_branding() {
	echo '<div class="site-branding">' . "\n";

	// Site branding title.
	colorful_site_header_title();

	// Site branding description.
	colorful_site_header_description();

	echo '</div>' . "\n";
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
