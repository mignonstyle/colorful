<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package colorful
 * @author  Mignon Style
 * @license GPLv2 or later
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		echo '<div class="sidebar">';
		dynamic_sidebar( 'sidebar-1' );
		echo '</div>';
	}
	?>
</aside><!-- #secondary -->
