<?php
/**
 * Add customizer settings
 * 
 * @since Popular ecommerce
 */
function popular_ecommerce_customize_register_homepage( $wp_customize ) {

   
    
    //Homepage Panel Create
    $wp_customize->add_panel( 'popular_ecommerce_homepage_panel', array(
        'title'      => esc_html__( 'Frontpage', 'popular-ecommerce' ),
        'priority'   => 5
    ) );

    /************************************************************
     *              Homepage Single Products Select
     ***********************************************************/
    //Single Products Section
    $wp_customize->add_section( 'popular_ecommerce_single_products', array(
        'title'    => esc_html__( 'Single Products Section', 'popular-ecommerce' ),
        'priority' => 5,
        'panel'    =>'popular_ecommerce_homepage_panel'
    ) );

    /** Single products */
    $wp_customize->add_setting( 
        'popular_ecommerce_single_products_section_enable', 
        array(
            'default' => false,
            'sanitize_callback' => 'popular_ecommerce_sanitize_checkbox'
        )
    );
     
    $wp_customize->add_control( 
        'popular_ecommerce_single_products_section_enable', 
        array(
            'label' => esc_html__( 'Enable Single Products Secion', 'popular-ecommerce' ),
            'section' => 'popular_ecommerce_single_products',
            'type' => 'checkbox',
            'priority' => 1,
        )
    );      
    


    /** Single Products Title */
	$wp_customize->add_setting(
        'popular_ecommerce_single_products_slider_header_title',
        array(
            'default'           => esc_html__('CHOOSE THE BEST','popular-ecommerce'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
		'popular_ecommerce_single_products_slider_header_title',
		array(
			'section'	  => 'popular_ecommerce_single_products',
			'label'		  => esc_html__( 'Header Title', 'popular-ecommerce' ),
			'description' => esc_html__( 'Display the header title.Ex: CHOOSE THE BEST', 'popular-ecommerce' ),
            'type'        => 'text',
            'priority'    => 2,
		)		
    );
    $wp_customize->selective_refresh->add_partial( 'popular_ecommerce_single_products_slider_header_title', array(
        'selector' 			=> '.single-product .heading-text h2',
        'render_callback' 	=> 'popular_ecommerce_single_products_slider_header_title_callback',
    ) );

    /** Single Products Desc */
	$wp_customize->add_setting(
        'popular_ecommerce_single_products_slider_header_desc',
        array(
            'default'           => esc_html__('MIRUM EST NOTARE QUAM LITTERA GOTHICA QUAM NUNC PUTAMUS PARUM CLARAM!','popular-ecommerce'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'popular_ecommerce_single_products_slider_header_desc',
		array(
			'section'	  => 'popular_ecommerce_single_products',
			'label'		  => esc_html__( 'Header Sort Description', 'popular-ecommerce' ),
			'description' => esc_html__( 'Display the header sort description.', 'popular-ecommerce' ),
            'type'        => 'textarea',
            'priority'    => 3,
		)		
    );

    $wp_customize->selective_refresh->add_partial( 'popular_ecommerce_single_products_slider_header_desc', array(
        'selector' 			=> '.single-product .heading-text .description',
        'render_callback' 	=> 'popular_ecommerce_single_products_slider_header_desc_callback',
    ) );


    /** Category Section Hear */
    $wp_customize->add_setting(
		'popular_ecommerce_single_products_id', 
		array(
            'default' => array(),
            'sanitize_callback'=>'popular_ecommerce_sanitize_multiple_check'
		)
	);
	$wp_customize->add_control(
		new Popular_Ecommerce_MultiCheck_Control(
			$wp_customize,
            'popular_ecommerce_single_products_id',
			array(
				'section'     => 'popular_ecommerce_single_products',
				'label'       => esc_html__( 'Single Products Select', 'popular-ecommerce' ),
                'description' => esc_html__( 'Select the Single products.', 'popular-ecommerce' ),
				'choices'     => popular_ecommerce_get_woocommerce_products_id( )
			)
		)
    );


    //Header Section
    $wp_customize->add_section( 
        'popular_ecommerce_header_section', 
        array(
            'title' => esc_html__( 'Menu Options', 'popular-commerce' ),
            'panel' => 'ostore_pro_general_settings'
        )
    ); 
    //Header Search Box Options Hear
    $wp_customize->add_setting( 
        'popular_ecommerce_menu_layout_options', 
        array(
            'sanitize_callback' => 'popular_ecommerce_sanitize_select',
            'default'           => 'nav-header-2'
        )
    );
    $wp_customize->add_control( 
        'popular_ecommerce_menu_layout_options', 
        array(
            'label' => esc_html__( 'Menu Options', 'popular-commerce' ),
            'section' => 'popular_ecommerce_header_section',
            'type' => 'select',
            'choices' => array(
                'nav-header-1' => esc_html__('Sidebar Menu','popular-commerce'),
                'nav-header-2' => esc_html__('Default Menu','popular-commerce'),
                'nav-header-3' => esc_html__('Sticky Menu','popular-commerce')              
            )
        )
    );
    
    //Header Section
    $wp_customize->add_section( 
        'popular_ecommerce_woocommerce_options', 
        array(
            'title' => esc_html__( 'Add To Cart Text Change', 'popular-commerce' ),
            'panel' => 'woocommerce'
        )
    );
    
    //add setting to your section
    $wp_customize->add_setting( 
        'popular_ecommerce_add_to_cart_button_text_change_enable', 
        array(
            'default' => false,
            'sanitize_callback' => 'popular_ecommerce_sanitize_checkbox'
        )
    );
    $wp_customize->add_control( 
        'popular_ecommerce_add_to_cart_button_text_change_enable', 
        array(
            'label' => esc_html__( 'Add To Cart Button Text Enable', 'popular-ecommerce' ),
            'section' => 'popular_ecommerce_woocommerce_options',
            'type' => 'checkbox'
        )
    );
    
    //add setting to your section
    $wp_customize->add_setting( 
        'popular_ecommerce_add_to_cart_text_change', 
        array(
            'default'           => 'Add To Cart',
            'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
        )
    );
    $wp_customize->add_control( 
        'popular_ecommerce_add_to_cart_text_change', 
        array(
            'label' => esc_html__( 'Add To Cart Text Change', 'popular-commerce' ),
            'section' => 'popular_ecommerce_woocommerce_options',
            'type' => 'text'
        )
    ); 
    
    
    /**
     * Homepage Sort Section
     */
    $wp_customize->add_section( 'ostore_pro_homepage_short', array(
        'title'    => esc_html__( 'Sort Home Page Section', 'popular-ecommerce' ),
        'priority' => 20,
        'panel'    => 'popular_ecommerce_homepage_panel',
    ) ); 


    /** Homepage Sort Settings*/
    $wp_customize->add_setting(
		'ostore_pro_home_page_sort', 
		array(
			'default' => array('ostore_pro_main_slider','popular_ecommerce_homepage_widgets','popular_ecommerce_homepage_slider','ostore_pro_client_logo'),
			'sanitize_callback' => 'popular_ecommerce_sanitize_sortable',						
		)
	);
    /** Homepage Sort Controls */
	$wp_customize->add_control(
		new Popular_ecommerce_Drag_Section_Control(
			$wp_customize,
			'ostore_pro_home_page_sort',
			array(
				'section'     => 'ostore_pro_homepage_short',
				'label'       => esc_html__( 'Homepage Sort Sections', 'popular-ecommerce' ),
				'description' => esc_html__( 'Sort or toggle home page sections.', 'popular-ecommerce' ),
				'choices'     => array(
                                        'ostore_pro_main_slider'                => esc_html__( 'Homepage Slider', 'popular-ecommerce' ),
                                        'popular_ecommerce_homepage_widgets'	=> esc_html__( 'Homepage Widgets','popular-ecommerce'),
                                        'popular_ecommerce_homepage_slider'		=> esc_html__( 'Homepage Single Products', 'popular-ecommerce' ),
                                        'ostore_pro_client_logo'				=> esc_html__( 'Brand Logo','popular-ecommerce' ),
                                    )
			)
		)
	);
        
}
add_action( 'customize_register', 'popular_ecommerce_customize_register_homepage' );

//Remove the Section on child theme
function popular_ecommerce_remove_section_customize_register() {     
    global $wp_customize;
        //priority logo_slider
        $wp_customize->get_section('ostore_pro_social_links')->panel = 'os_store_header';
        $wp_customize->get_section('ostore_pro_social_links' )->priority = 1;

        $wp_customize->get_section('static_front_page')->panel = 'popular_ecommerce_homepage_panel';
        $wp_customize->get_section('static_front_page' )->priority = 1;


        $wp_customize->get_section('ostore_pro_slider')->panel = 'popular_ecommerce_homepage_panel';
        $wp_customize->get_section('ostore_pro_slider' )->priority = 2;

        $wp_customize->get_section('logo_slider')->panel = 'popular_ecommerce_homepage_panel';
        $wp_customize->get_section('logo_slider' )->priority = 3;


        //Remove control  
        $wp_customize->remove_control( 'ostore_pro_woo_category_1' );
        $wp_customize->remove_control( 'ostore_pro_woo_category_2' );
        $wp_customize->remove_control( 'ostore_pro_slider_style' );
        $wp_customize->remove_control( 'ostore_pro_page_layout_option' );



        //Remove section 
        $wp_customize->remove_section( 'ostore_pro_subscribe' );
        $wp_customize->remove_section( 'ostore_pro_btn_social' );
        $wp_customize->remove_section( 'header_por_style' );
        $wp_customize->remove_section( 'ostore_pro_pro_per_loader_settings' );
        $wp_customize->remove_section( 'ostore_pro_demo_import_settings' );
        $wp_customize->remove_section( 'ostore_pro_implink_section' );
        $wp_customize->remove_section( 'payment_logo_slider' );
        
} 
add_action( 'customize_register', 'popular_ecommerce_remove_section_customize_register', 11 );
