<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package colorful
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head<?php echo ( ! empty( colorful_head_prefix() ) ) ? ' prefix="' . esc_attr( colorful_head_prefix() ) . '"' : ''; ?>>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'colorful' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php
		// Print site header.
		colorful_site_header_branding();
		?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
