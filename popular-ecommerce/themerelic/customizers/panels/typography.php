<?php
/**
 * Typography Options 
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography( $wp_customize ) {
    
    $wp_customize->add_panel( 'typography_section', array(
        'title'          => __( 'Typography Settings', 'popular-ecommerce' ),
        'priority'       => 60,
        'capability'     => 'edit_theme_options',
    ) );
    
}
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography' );                                                         