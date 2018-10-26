<?php
/**
 * H3 Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_h3( $wp_customize ) {
    
    /** H3 Typography Settings */
    $wp_customize->add_section( 'h3_section', array(
        'title'      => __( 'H3 Settings (Content)', 'popular-ecommerce' ),
        'priority'   => 25,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
        
    /** H3 Font Size */
    $wp_customize->add_setting( 'h3_font_size', array(
        'default'           => 24,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'h3_font_size',
			array(
				'section' => 'h3_section',
				'label'	  => __( 'H3 Font Size', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 20,
					'max' 	=> 35,
					'step'	=> 1,
                ),
                'priority'  => 1
			)
		)
	);
    
    /** H3 font weight */
    $wp_customize->add_setting( 
        'h3_font_weights', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => '600',
        )
    );
    $wp_customize->add_control( 
        'h3_font_weights', 
        array(
            'label'     => esc_html__( 'H3 Font Weight', 'popular-ecommerce' ),
            'section'   => 'h3_section',
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
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_h3' );