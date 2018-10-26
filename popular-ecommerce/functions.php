<?php
/**
 * Dequeue parent theme style and scripts
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 * @package ostore-child
 */
function popular_ecommerce_enqueue_scripts() {
	//remove css from parent
   wp_dequeue_style( 'ostore-main-style' );
   wp_dequeue_script( 'single-product-zoom-js' );
   wp_dequeue_style('ostore-pro-woocommerce-style');
   //Theme Version Check 
		$popular_ecommerce_var = wp_get_theme();
		$theme_version = $popular_ecommerce_var->get( 'Version' );

   //Google Fonts Enqueue
    $popular_ecommerce_google_fonts_list = array('Dosis','Poppins');
    foreach(  $popular_ecommerce_google_fonts_list as $google_font ){
        wp_enqueue_style( 'google-fonts-'.$google_font, '//fonts.googleapis.com/css?family='.$google_font.':300italic,400italic,700italic,400,700,300', false ); 
    }

    /** Theme CSS */
    wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.css' ),array(),$theme_version);
    wp_enqueue_style( 'ostore-css-yith-popup', get_theme_file_uri( '/assets/css/ostore-css-yith-popup.css' ),array(),$theme_version);
    

   /*THEME JS */
   	wp_enqueue_script( 'sidebar-nav', get_theme_file_uri( '/assets/js/sidenav.min.js' ),$theme_version, '', true );
    wp_enqueue_script( 'popular-ecommerce', get_theme_file_uri( '/assets/js/popular-ecommerce.js' ),$theme_version, '', true );
    wp_enqueue_script( 'easyzoom-js', get_theme_file_uri() . '/assets/js/easyzoom.js', array('jquery'), esc_attr( $theme_version ), true );
	
}
add_action( 'wp_enqueue_scripts', 'popular_ecommerce_enqueue_scripts', 100 );


//Add the menu
add_action( 'init', 'popular_ecommerce_store_footer_menu' );
function popular_ecommerce_store_footer_menu() {
    register_nav_menu( 'footer-menu',esc_html__( 'Footer Menu','popular-ecommerce' ) );
}


//Add the submenu class
function my_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'sidenav-dropdown';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function popular_ecommerce_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
    }
    
    if( get_theme_mod('ostore_pro_layout_style','box-layout') == 'box-layout' ){
        $classes[] = 'popular-ecommerce-theme-box-layout';
    }

	return $classes;
}
add_filter( 'body_class', 'popular_ecommerce_body_classes' );

//Require file
require get_stylesheet_directory() . '/themerelic/customizers/custom-controls/custom-control.php';
require get_stylesheet_directory() . '/themerelic/customizers/customizer.php';

/*
* Require Popular eCommerce child theme file
*/
require get_stylesheet_directory() . '/themerelic/extras.php';
require get_stylesheet_directory() . '/themerelic/popular-ecommerce-customizer.php';



//Enqueue the style file
require get_stylesheet_directory() . '/assets/css/style.php';