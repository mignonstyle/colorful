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
		// Print of site branding title and description.
		colorful_site_header_branding();

		// Site global navigation.
		colorful_site_g_navigation();
		?>


		<?php if ( get_header_image() ) : ?>
		<div class="header-image">
			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
		</div><!-- .header-image -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
