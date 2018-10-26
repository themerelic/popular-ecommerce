<?php
/**
 * H5 Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_h5( $wp_customize ) {
    
    /** H5 Typography Settings */
    $wp_customize->add_section( 'h5_section', array(
        'title'      => __( 'H5 Settings (Content)', 'popular-ecommerce' ),
        'priority'   => 27,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
        
    /** H5 Font Size */
    $wp_customize->add_setting( 'h5_font_size', array(
        'default'           => 18,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'h5_font_size',
			array(
				'section' => 'h5_section',
				'label'	  => __( 'H5 Font Size', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 10,
					'max' 	=> 25,
					'step'	=> 1,
                ),
                'priority'  => 1
			)
		)
	);
    
    /** H5 font weight */
    $wp_customize->add_setting( 
        'h5_font_weights', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => '500',
        )
    );
    $wp_customize->add_control( 
        'h5_font_weights', 
        array(
            'label'     => esc_html__( 'H5 Font Weight', 'popular-ecommerce' ),
            'section'   => 'h5_section',
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
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_h5' );