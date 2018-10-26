<?php
/**
 * Front Page Template
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ostore-child
 */

get_header(); 


//Fontpage settings
if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
    include( get_home_template() );
    
}else{ 
    
    //Loop the Calling Functions
    foreach( get_theme_mod('ostore_pro_home_page_sort',array('ostore_pro_main_slider','popular_ecommerce_homepage_widgets','popular_ecommerce_homepage_slider','ostore_pro_client_logo')) as $homepage_item ){
        $homepage_function = $homepage_item;
        //$homepage_function();
        /*Add the Logo Slider */
        if( $homepage_function == 'popular_ecommerce_homepage_widgets'){
            dynamic_sidebar( 'home_page' );
        }else{
            do_action($homepage_function);
        }
        
    }


}

get_footer();