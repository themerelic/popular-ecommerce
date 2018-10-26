<?php
/**
 * H4 Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_h4( $wp_customize ) {
    
    /** H4 Typography Settings */
    $wp_customize->add_section( 'h4_section', array(
        'title'      => __( 'H4 Settings (Content)', 'popular-ecommerce' ),
        'priority'   => 26,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
    
    /** H4 Font Size */
    $wp_customize->add_setting( 'h4_font_size', array(
        'default'           => 20,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'h4_font_size',
			array(
				'section' => 'h4_section',
				'label'	  => __( 'H4 Font Size', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 10,
					'max' 	=> 30,
					'step'	=> 1,
                ),
                'priority'  => 1
			)
		)
	);
    
    /** H4 font weight */
    $wp_customize->add_setting( 
        'h4_font_weights', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => '600',
        )
    );
    $wp_customize->add_control( 
        'h4_font_weights', 
        array(
            'label'     => esc_html__( 'H4 Font Weight', 'popular-ecommerce' ),
            'section'   => 'h4_section',
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
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_h4' );