<?php
/**
 * Body Typography Options
 *
 * @package Popular_ecommerce
 */

function popular_ecommerce_customize_register_typography_body( $wp_customize ) {

    /** Body Settings */
    $wp_customize->add_section( 'typography_body_section', array(
        'title'      => __( 'Body Settings', 'popular-ecommerce' ),
        'priority'   => 11,
        'capability' => 'edit_theme_options',
        'panel'      => 'typography_section'
    ) );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Poppins',
			'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
		)
	);

	$wp_customize->add_control(
		new Popular_ecommerce_Controls_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'popular-ecommerce' ),
                'description' => __( 'Primary font of the site.', 'popular-ecommerce' ),
    			'section'     => 'typography_body_section',
    			'choices'     => popular_ecommerce_get_all_fonts(),	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Montserrat',
			'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
		)
	);

	$wp_customize->add_control(
		new Popular_ecommerce_Controls_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'popular-ecommerce' ),
                'description' => __( 'Secondary font for heading,title,links.', 'popular-ecommerce' ),
    			'section'     => 'typography_body_section',
    			'choices'     => popular_ecommerce_get_all_fonts(),	
     		)
		)
	);

	/** Body Font Size */
    $wp_customize->add_setting( 'font_size', array(
        'default'           => 16,
        'sanitize_callback' => 'popular_ecommerce_sanitize_select_opt'
    ) );
    
    $wp_customize->add_control(
		new Popular_ecommerce_Controls_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section' => 'typography_body_section',
				'label'	  => __( 'Body Fonts Size', 'popular-ecommerce' ),
				'description' => __( 'Paragraph, input button , single page , links also.', 'popular-ecommerce' ),
				'choices' => array(
					'min' 	=> 15,
					'max' 	=> 24,
					'step'	=> 1,
				)
			)
		)
	);
      
}
add_action( 'customize_register', 'popular_ecommerce_customize_register_typography_body' );