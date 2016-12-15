<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses colorful_header_style()
 */
function colorful_custom_header_setup() {
	$defaults = array(
		'default-image'      => get_template_directory_uri() . '/images/header/header.png',
		'width'              => 1000,
		'height'             => 250,
		'flex-height'        => true,
		'flex-width'         => false,
		'uploads'            => true,
		'header-text'        => true,
		'default-text-color' => '000000',
		'wp-head-callback'   => 'colorful_header_style',
	);

	add_theme_support( 'custom-header', apply_filters( 'colorful_custom_header_args', $defaults ) );
}
add_action( 'after_setup_theme', 'colorful_custom_header_setup' );

/**
 * Styles the header image and text displayed on the blog.
 *
 * @see colorful_custom_header_setup().
 */
if ( ! function_exists( 'colorful_header_style' ) ) :
function colorful_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
