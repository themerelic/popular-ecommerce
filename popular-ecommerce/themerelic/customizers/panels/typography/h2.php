<?php
/**
 * H2 Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_h2( $wp_customize ) {
    
    /** H2 Typography Settings */
    $wp_customize->add_section( 'h2_section', array(
        'title'      => __( 'H2 Settings (Content)', 'popular-ecommerce' ),
        'priority'   => 24,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
    
    /** H2 Font Size */
    $wp_customize->add_setting( 'h2_font_size', array(
        'default'           => 28,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'h2_font_size',
			array(
				'section' => 'h2_section',
				'label'	  => __( 'H2 Font Size', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 20,
					'max' 	=> 40,
					'step'	=> 1,
                ),
                'priority'  => 1
			)
		)
	);
    
    //Category Section Hear 
    $wp_customize->add_setting( 
        'h2_font_weights', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => '600',
        )
    );
    $wp_customize->add_control( 
        'h2_font_weights', 
        array(
            'label'     => esc_html__( 'H2 Font Weight', 'popular-ecommerce' ),
            'section'   => 'h2_section',
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
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_h2' );