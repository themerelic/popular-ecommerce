<?php
/**
 * Template Name: Home Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package oStore-pro
 */

 /*Header Section */
get_header(); 

 /*Ostore Main Slider */
$slider_enable = get_theme_mod('ostore_pro_slider_enable');
if($slider_enable == 1){
	do_action('ostore_pro_main_slider');
}

/*Full Width Homepage  Widget Area */
dynamic_sidebar( 'home_page' ); 



/*Add the Logo Slider */
do_action('ostore_pro_client_logo');

get_footer(); ?>