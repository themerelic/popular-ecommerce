<?php
/**
 * Register Custom Controls
*/
function popular_ecommerce_controls1( $wp_customize ){
    
    //Customizer Settings 
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/select/class-select-control.php';
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/slider/class-slider-control.php';
    
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/toggle/class-toggle-control.php';
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/sortable/class-sortable-control.php';
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/multicheck/class-multicheck-control.php';
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/radio/class-control-radio.php';
    
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/typography/class-fonts.php';
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/typography/class-typography-control.php';
    
    

    //Repeater Section
    
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/repeater/class-repeater-setting.php';
    require_once get_stylesheet_directory() . '/themerelic/customizers/custom-controls/repeater/class-control-repeater.php';


    $wp_customize->register_control_type( 'Popular_ecommerce_Controls_Slider_Control' );
    $wp_customize->register_control_type( 'Popular_ecommerce_MultiCheck_Control' );
    $wp_customize->register_control_type( 'Popular_ecommerce_Toggle_Control' );
    $wp_customize->register_control_type( 'Popular_ecommerce_Controls_Select_Control' );
    $wp_customize->register_control_type( 'Popular_ecommerce_' );
    $wp_customize->register_control_type( 'Popular_ecommerce_Drag_Section_Control' );
   
}
add_action( 'customize_register', 'popular_ecommerce_controls1' );