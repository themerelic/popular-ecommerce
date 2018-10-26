<?php
/**
 * Right Sidebar The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oStore-pro
 */

 /* Show Sidebar Layout */
 $layout = ostore_pro_get_layout();

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if($layout == 'right-sidebar'){
?>

<aside id="secondary" class="widget-area">
	<div class="col-md-3">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->

<?php } ?>