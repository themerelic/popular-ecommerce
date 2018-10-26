<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package oStore-pro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ostore_pro_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( get_theme_mod('ostore_pro_layout_style','default') == 'box-layout' ){
		$classes[] = 'popular-ecommerce-theme-box-layout';
	}

	return $classes;
}
add_filter( 'body_class', 'ostore_pro_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ostore_pro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ostore_pro_pingback_header' );