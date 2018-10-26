<?php
/**
 * H1 Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_h1( $wp_customize ) {
    
    /** H1 Typography Settings */
    $wp_customize->add_section( 'h1_section', array(
        'title'      => __( 'H1 Settings (Content)', 'popular-ecommerce' ),
        'priority'   => 23,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
    
    /** H1 Font Size */
    $wp_customize->add_setting( 'h1_font_size', array(
        'default'           => 32,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'h1_font_size',
			array(
				'section' => 'h1_section',
				'label'	  => __( 'H1 Font Size', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 25,
					'max' 	=> 45,
					'step'	=> 1,
                ),
                'priority'  => 1
			)
		)
	);
    
    //Category Section Hear 
    $wp_customize->add_setting( 
        'h1_font_weights', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => '600',
        )
    );
    $wp_customize->add_control( 
        'h1_font_weights', 
        array(
            'label'     => esc_html__( 'H1 Font Weight', 'popular-ecommerce' ),
            'section'   => 'h1_section',
            'type'      => 'select',
            'choices'   => array(
                                'normal'    => 'Normal',
                                'bold'      => 'Bold',
                                'bolder'    => 'Bolder',
                                'lighter'   => 'Lighter',
                                '100'       => '100',
                                '200'       => '200',
                                '400'       => '400',
                                '500'       => '500',
                                '600'       => '600',
                                '900'       => '900',
                        ),
            'priority'  => 2
        )
    );

    
}
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_h1' );