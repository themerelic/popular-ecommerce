<?php
/**
 * H6 Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_h6( $wp_customize ) {
    
    /** H6 Typography Settings */
    $wp_customize->add_section( 'h6_section', array(
        'title'      => __( 'H6 Settings (Content)', 'popular-ecommerce' ),
        'priority'   => 28,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
    
    /** H6 Font Size */
    $wp_customize->add_setting( 'h6_font_size', array(
        'default'           => 16,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'h6_font_size',
			array(
				'section' => 'h6_section',
				'label'	  => __( 'H6 Font Size', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 10,
					'max' 	=> 20,
					'step'	=> 1,
                ),
                'priority'  => 1
			)
		)
	);
    
    /** H6 font weight */
    $wp_customize->add_setting( 
        'h6_font_weights', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => '400',
        )
    );
    $wp_customize->add_control( 
        'h6_font_weights', 
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
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_h6' );