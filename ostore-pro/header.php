<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oStore-pro
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class('cms-index-index cms-home-page home'); ?>>

<div id="page" class="site">
	<?php   if( get_theme_mod( 'ostore_pro_pro_preloader_options',false ) == true ) { ?>
		<div class="ostore-preloader"></div>
	<?php } ?>
	<?php do_action("ostore_pro_before_header"); ?>
	<!-- Header -->
	<header id="header" class="sticky-style-2 navbar-in-header">
	<?php 
		$header_style= get_theme_mod('ostore_pro_pro_header','header-four');
		if($header_style == 'header-one'){
			get_template_part('header/header', 'one');
		}elseif($header_style == 'header-two'){
			get_template_part('header/header', 'two');
		}elseif($header_style == 'header-three'){
			get_template_part('header/header', 'three');
		}else{
			get_template_part('header/header', 'four');
		}
	?>
	</header><!-- Osotre header end -->
<div id="content" class="">