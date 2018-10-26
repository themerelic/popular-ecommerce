<?php
/**
 * woocommerce sidebar options The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oStore-pro
 */

if ( ! is_active_sidebar( 'woocommerce' ) ) {
	return;
}


?>

<aside id="secondary" class="widget-area">
	<div class="col-md-3">
		<?php dynamic_sidebar( 'woocommerce' ); ?>
	</div>
</aside><!-- #secondary -->

