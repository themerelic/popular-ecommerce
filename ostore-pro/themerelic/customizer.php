<?php
    /**
    * oStore-pro Theme Customizer
    *
    * @package oStore-pro
    */

    /**
    * Add postMessage support for site title and description for the Theme Customizer.
    *
    * @param WP_Customize_Manager $wp_customize Theme Customizer object.
    */

    class oStoreCustomizer{
        function __construct(){
            add_action( 'customize_register', array($this,'ostore_pro_general_customize') );
            add_action( 'customize_register', array($this,'ostore_pro_header_customizer') );
            add_action( 'customize_register', array($this,'ostore_pro_page_layout_customizer') );
            add_action( 'customize_register', array($this,'ostore_pro_slider_customizer') );
           
            add_action('customize_register',array($this,'ostore_pro_footer_customizer'));
            add_action('customize_register',array($this,'ostore_pro_demo_import_customize'));
    
        }
        function __destruct() {
            $vars = array_keys(get_defined_vars());
            for ($i = 0; $i < sizeOf($vars); $i++) {
                unset($vars[$i]);
            }
            unset($vars,$i);
        }
        public static function get_instance() {
            static $instance;
            $class = __CLASS__;
            if( ! $instance instanceof $class) {
                $instance = new $class;
            }
            return $instance;
        }

        function ostore_pro_general_customize( $wp_customize ) {
            $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
            $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
            $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

            if ( isset( $wp_customize->selective_refresh ) ) {
                $wp_customize->selective_refresh->add_partial( 'blogname', array(
                    'selector'        => '.site-title a',
                    'render_callback' => 'ostore_pro_customize_partial_blogname',
                ) );
                $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                    'selector'        => '.site-description',
                    'render_callback' => 'ostore_pro_customize_partial_blogdescription',
                ) );
            }
            /**
            * General Settings Panel
            */
            $wp_customize->add_panel('ostore_pro_general_settings', array(
                'priority' => 3,
                'title' => esc_html__('General Settings', 'ostore-pro')
            ));

            $wp_customize->get_section('title_tagline')->panel = 'ostore_pro_general_settings';
            $wp_customize->get_section('title_tagline' )->priority = 1;

            $wp_customize->get_section('header_image')->panel = 'ostore_pro_general_settings';
            $wp_customize->get_section('header_image' )->priority = 2;

            $wp_customize->get_section('colors')->panel = 'ostore_pro_general_settings';

            $wp_customize->add_setting('ostore_pro_pro_primary_color', array(
                'default' => '#222',
                'sanitize_callback' => 'sanitize_hex_color',        
            ));
            $wp_customize->add_control('ostore_pro_pro_primary_color', array(
                'type'     => 'color',
                'label'    => esc_html__('Primary Colors', 'ostore-pro'),
                'section'  => 'colors',
                'setting'  => 'ostore_pro_pro_primary_color',
            ));
        
        
            $wp_customize->add_setting('ostore_pro_pro_secondry_color', array(
                'default' => '#c2185b',
                'sanitize_callback' => 'sanitize_hex_color',        
            ));
            $wp_customize->add_control('ostore_pro_pro_secondry_color', array(
                'type'     => 'color',
                'label'    => esc_html__('Secondry Colors', 'ostore-pro'),
                'section'  => 'colors',
                'setting'  => 'ostore_pro_pro_secondry_color',
            ));


            $wp_customize->add_setting('ostore_pro_top_footer_color', array(
                'default' => '#fff',
                'sanitize_callback' => 'sanitize_hex_color',        
            ));
            $wp_customize->add_control('ostore_pro_top_footer_color', array(
                'type'     => 'color',
                'label'    => esc_html__('Top Footer  Color', 'ostore-pro'),
                'section'  => 'colors',
                'setting'  => 'ostore_pro_pro_secondry_color',
            ));
            

            $wp_customize->add_setting('ostore_pro_mid_footer_color', array(
                'default' => '#222',
                'sanitize_callback' => 'sanitize_hex_color',        
            ));
            $wp_customize->add_control('ostore_pro_mid_footer_color', array(
                'type'     => 'color',
                'label'    => esc_html__('Buttom  Footer  Color', 'ostore-pro'),
                'section'  => 'colors',
                'setting'  => 'ostore_pro_pro_secondry_color',
            ));

            /**
             * OStore Important Link
            */
            $wp_customize->add_section( 'ostore_pro_implink_section', array(
                'title'             => esc_html__( 'Important Links', 'ostore-pro' ),
                'priority'          => 1
            ) );

            $wp_customize->add_setting( 'ostore_pro_imp_links', array(
                'default' => '',
                'sanitize_callback' => 'ostore_pro_text_sanitize'
            ));

            $wp_customize->add_control( new Ostore_Info_Text( $wp_customize,'ostore_pro_imp_links', array(
                    'settings'      => 'ostore_pro_imp_links',
                    'section'       => 'ostore_pro_implink_section',
                    'description'   => '<a class="pro-implink" href="'.esc_url('http://docs.themerelic.com/ostore-pro','ostore-pro').'" target="_blank">'.esc_html__('Documentation', 'ostore-pro').'</a>
                                        <a class="pro-implink" href="'.esc_url('http://demo.themerelic.com/ostore-pro','ostore-pro').'" target="_blank">'.esc_html__('Live Demo', 'ostore-pro').'</a>
                                        <a class="pro-implink" href="'.esc_url('http://themerelic.com','ostore-pro').'" target="_blank">'.esc_html__('Support Forum', 'ostore-pro').'</a>
                                        <a class="pro-implink" href="'.esc_url('http://www.facebook.com/themerelic','ostore-pro').'" target="_blank">'.esc_html__('Like Us in Facebook', 'ostore-pro').'</a>',
                )
            ));


            /**
             * Preloader Settings Panel
            */
            $wp_customize->add_section( 'ostore_pro_pro_per_loader_settings', array(
                'title' => esc_html__( 'Preloader Settings', 'ostore-pro' ),
                'priority' => 3,
            ));

            $wp_customize->add_setting( 'ostore_pro_pro_preloader_options', array(
                'default'           => false, 
                'sanitize_callback' => 'ostore_pro_sanitize_checkbox' 
            ));

            $wp_customize->add_control( 'ostore_pro_pro_preloader_options', array(
                'type' => 'checkbox',
                'label' => esc_html__( 'Enable Preloader', 'ostore-pro' ),
                'section' => 'ostore_pro_pro_per_loader_settings',
                'settings' => 'ostore_pro_pro_preloader_options',
            ));

            // Preloader Select Image Options
            $wp_customize->add_setting( 'ostore_pro_pro_preloader' , array( 
                'default' => 'default', 
                'sanitize_callback' => 'ostore_pro_text_sanitize'
            ));

            $wp_customize->add_control( new Ostore_Preloader_Control( $wp_customize, 'ostore_pro_pro_preloader', array(
                'label'      => esc_html__( 'Preloader', 'ostore-pro' ),
                'section'    => 'ostore_pro_pro_per_loader_settings',
                'settings'   => 'ostore_pro_pro_preloader',
            )));

            
            $wp_customize->get_section('background_image')->panel = 'ostore_pro_general_settings';
            $wp_customize->get_section('header_image' )->priority = 4;

        }

        /**
         * Demo Import Function Area
        */
        function ostore_pro_demo_import_customize( $wp_customize ) {
            $wp_customize->add_section( 'ostore_pro_demo_import_settings', array(
                'title'           =>      esc_html__('Import Demo Data', 'ostore-pro'),
                'priority'        =>      1,
            ));

            $wp_customize->add_setting( 'ostore_pro_demo_import', array(
                'default' =>  1,
                'sanitize_callback'     =>  'ostore_pro_text_sanitize'
            ));

            $wp_customize->add_control(new Osotre_WP_Customize_Demo_Control( $wp_customize, 'ostore_pro_demo_import', array(
                'section'       =>      'ostore_pro_demo_import_settings',
                'label'         =>      esc_html__('Import Demo', 'ostore-pro'),
            )));
        }

        function ostore_pro_header_customizer( $wp_customize ) {
                
            $customizer = KCustomizer::get_instance($wp_customize);
            
            $default = array(
                'panel' => array(
                    'id'            => "os_store_header",
                    'label'         => __("Header Settings", 'ostore-pro'),
                    "desc"          => "",
                    "priority"      => 1
                ),
                "sections" => array(
                    array(
                    'section' => array(
                            'id'        => "top_header",
                            'label'     => __("Top Header", "ostore-pro"),
                            'priority'  => 1
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => false,
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_enable",
                                'type'  => 'checkbox',
                                'label' => __("Enable", 'ostore-pro')
                            ),
                            
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_email",
                                'type'  => 'text',
                                'label' => __("Email", "ostore-pro")
                            ),
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_address",
                                'type'  => 'text',
                                'label' => __("Address", "ostore-pro")
                            ),
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_phone_no",
                                'type'  => 'text',
                                'label' => __("Phone No", "ostore-pro")
                            ),
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_time",
                                'type'  => 'text',
                                'label' => __("Opening Time", "ostore-pro")
                            )
                        )
                    ),
                    array(
                        'section' => array(
                                'id'        => "header_por_style",
                                'label'     => __("Pro Header Style", "ostore-pro"),
                                'priority'  => 2
                            ),
                            'fields' => array(
                                array(
                                    // for settigns
                                    'default'   => 'header-four',
                                    'transport' => 'refresh',
                                    //for control
                                    'id'    => "ostore_pro_pro_header",
                                    'type'  => 'radio',
                                    'label' => __("Pro Header Style", 'ostore-pro'),
                                    'choices'  => array(
                                        'header-four'=>  __('Center Logo With Add Header', 'ostore-pro'),
                                        'header-two' => __('Two Row Header With Add', 'ostore-pro'),
                                        'header-three'=>  __('Sticky Header', 'ostore-pro'),
                                        'header-one'  => 'Default Header'
                                    )
                                )
                            )
                        )
                )
            );
            $customizer->prepare( $default );
        }

        function ostore_pro_slider_customizer($wp_customize) {
            $customizer = KCustomizer::get_instance($wp_customize);
            $default = array(
                'section' => array(
                        'id'        => "ostore_pro_slider",
                        'label'     => __("Slider", 'ostore-pro'),
                        'priority'  => 2
                    ),
                    'fields' => array(
                        array(
                            // for settigns
                            'default'   => false,
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_slider_enable",
                            'type'  => 'checkbox',
                            'label' => __("Enable", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => false,
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_slider_category",
                            'type'  => 'category',
                            'label' => __("Slider Category", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => 3,
                            'transport' => 'postMessage',
                            //for control
                            'id'    => "slider_post_count",
                            'type'  => 'number',
                            'label' => __("Number of Post", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => 'default',
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_slider_style",
                            'type'  => 'radio',
                            'label' => __("Slider Style", 'ostore-pro'),
                            'choices'  => array(
                                'default'  => 'Full Width Slider',
                                'left' => __('Slider & Left Category', 'ostore-pro'),
                                'right'=>  __('Slider & Right Category', 'ostore-pro')
                            )
                        ),
                        array(
                            // for settigns
                            'default'   => '',
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_woo_category_1",
                            'type'  => 'woselect',
                            'label' => __("Select First Category", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => '',
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_woo_category_2",
                            'type'  => 'woselect',
                            'label' => __("Select Second Category", 'ostore-pro')
                        ),
                    )
                
                );
            $customizer->prepare( $default );
            

            
            $wp_customize->selective_refresh->add_partial( 'ostore_pro_slider_category', array(
                'selector' 			=> '.fullslider .slide-caption',
                'render_callback' 	=> 'ostore_pro_slider_category_callback',
            ) );
        }

        function ostore_pro_typography_customizer( $wp_customize ) {
            
            $customizer = KCustomizer::get_instance($wp_customize);
            
            $default = array(
                'panel' => array(
                    'id'            => "os_store_header",
                    'label'         => __("Typography Settings", 'ostore-pro'),
                    "desc"          => "",
                    "priority"      => 4
                ),
                "sections" => array(
                    array(
                    'section' => array(
                            'id'        => "top_header",
                            'label'     => __("Top Header", "ostore-pro"),
                            'priority'  => 4
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => false,
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_enable",
                                'type'  => 'checkbox',
                                'label' => __("Enable", 'ostore-pro')
                            ),
                            
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_email",
                                'type'  => 'text',
                                'label' => __("Email", "ostore-pro")
                            ),
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_address",
                                'type'  => 'text',
                                'label' => __("Address", "ostore-pro")
                            ),
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_phone_no",
                                'type'  => 'text',
                                'label' => __("Phone No", "ostore-pro")
                            ),
                            array(
                                // for settigns
                                'default'   => "",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "ostore_pro_top_header_time",
                                'type'  => 'text',
                                'label' => __("Opening Time", "ostore-pro")
                            )
                        )
                    ),
                    array(
                        'section' => array(
                                'id'        => "header_por_style",
                                'label'     => __("Pro Header Style", "ostore-pro"),
                                'priority'  => 2
                            ),
                            'fields' => array(
                                array(
                                    // for settigns
                                    'default'   => 'default',
                                    'transport' => 'refresh',
                                    //for control
                                    'id'    => "ostore_pro_pro_header",
                                    'type'  => 'radio',
                                    'label' => __("Pro Header Style", 'ostore-pro'),
                                    'choices'  => array(
                                        'header-four'=>  __('Center Logo With Add Header', 'ostore-pro'),
                                        'header-two' => __('Two Row Header With Add', 'ostore-pro'),
                                        'header-three'=>  __('Sticky Header', 'ostore-pro'),
                                        'header-one'  => 'Default Header'
                                    )
                                )
                            )
                        )
                )
            );
            $customizer->prepare( $default );
        }

        function ostore_pro_page_layout_customizer($wp_customize) {
            $customizer = KCustomizer::get_instance($wp_customize);
            $default = array(
                'panel' => array(
                    'id'            => "os_layout",
                    'label'         => __("Layout Settings", 'ostore-pro'),
                    "desc"          => "",
                    "priority"      => 3
                ),
                "sections" => array(
                    array(
                        'section' => array(
                            'id'        => "ostore_pro_theme_layout",
                            'label'     => "Theme Layout",
                            'priority'  => 5
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => 'box-layout',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_layout_style",
                                'type'  => 'radio',
                                'label' => __("Theme Layout", 'ostore'),
                                'choices'  => array(
                                    'default'  => 'Defult Layout',
                                    'box-layout' => __('Box Layout', 'ostore'),
                                )
                            ),
                        )
                        
                    ),
                    array(
                    'section' => array(
                            'id'        => "ostore_pro_page_layout",
                            'label'     => __("Page Layout", 'ostore-pro'),
                            'priority'  => 3
                        ),
                        'fields' => array(
                        
                            array(
                                // for settigns
                                'default'   => 'right-sidebar',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "archive_page_layout_option",
                                'type'  => 'select',
                                'label' => __("Archie Page Layout", 'ostore-pro'),
                                'choices'  => array(
                                    'right-sidebar'  => __('Right Sidebar', 'ostore-pro'),
                                    'left-sidebar' => __('Left Sidebar', 'ostore-pro'),
                                    'full-width'=>  __('Full Width', 'ostore-pro')
                                )
                            ),
                            array(
                                // for settigns
                                'default'   => 'right-sidebar',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_single_page_layout_option",
                                'type'  => 'select',
                                'label' => __("Single Page Layout", 'ostore-pro'),
                                'choices'  => array(
                                    'right-sidebar'  => __('Right Sidebar', 'ostore-pro'),
                                    'left-sidebar' => __('Left Sidebar', 'ostore-pro'),
                                    'full-width'=>  __('Full Width', 'ostore-pro')
                                )
                            ),
                            array(
                                // for settigns
                                'default'   => 'right-sidebar',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_page_layout_option",
                                'type'  => 'select',
                                'label' => __("Main Page Layout", 'ostore-pro'),
                                'choices'  => array(
                                    'right-sidebar'  => __('Right Sidebar', 'ostore-pro'),
                                    'left-sidebar' => __('Left Sidebar', 'ostore-pro'),
                                    'full-width'=>  __('Full Width', 'ostore-pro')
                                )
                            ),
                            
                        )
                    ),
                    array(
                        'section' => array(
                            'id'        => "ostore_pro_blog_layout",
                            'label'     => __("Blog Layout", 'ostore-pro'),
                            'priority'  => 3
                        ),
                        'fields' => array(
                        
                            array(
                                // for settigns
                                'default'   => 'blog-list-view',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "blog_layout_option",
                                'type'  => 'select',
                                'label' => __("Blog Page Layout", 'ostore-pro'),
                                'choices'  => array(
                                    'blog-grid-view'  => __('Blog Grid View', 'ostore-pro'),
                                    'blog-list-view' => __('List View', 'ostore-pro'),
                                    'blog-alternative'=>  __('Alternative', 'ostore-pro'),
                                    'blog-full-width'=>  __('Full Width', 'ostore-pro')
                                )
                            )
                            
                        )
                    
                    )
                    
                )
                
                );
            $customizer->prepare( $default );
        }


        
        //Footer Customizer
        function ostore_pro_footer_customizer($wp_customize) {
            $customizer = KCustomizer::get_instance($wp_customize);
            $default = array(
                'panel' => array(
                    'id'            => "os_store_footer",
                    'label'         => __("Footer Settings", 'ostore-pro'),
                    "desc"          => "",
                    "priority"      => 40
                ),
                array(
                    // for settigns
                    'default'   => true,
                    'transport' => 'refresh',
                    'panel'     =>  'os_store_footer',
                    //for control
                    'id'    => "ostore_pro_footer_enable",
                    'type'  => 'checkbox',
                    'label' => __("Enable", 'ostore-pro')
                ),
                "sections" => array(
                    array(
                    'section' => array(
                            'id'        => "ostore_pro_social_links",
                            'label'     => __("Social Links", 'ostore-pro'),
                            'priority'  => 41,
                            'panel'     =>'os_store_footer'
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => false,
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_social_links_enable",
                                'type'  => 'checkbox',
                                'label' => __("Enable", 'ostore-pro')
                            ),
                            array(
                                    // for settigns
                                    'default'   => "",
                                    'transport' => 'postMessage',
                                    //for control
                                    'id'    => "facebook_url",
                                    'type'  => 'url',
                                    'label' => __("Facebook URL", 'ostore-pro')
                                ),
                                array(
                                    // for settigns
                                    'default'   => "",
                                    'transport' => 'postMessage',
                                    //for control
                                    'id'    => "google_plus",
                                    'type'  => 'url',
                                    'label' => __("Google Plus", 'ostore-pro')
                                ),
                                array(
                                    // for settigns
                                    'default'   => "",
                                    'transport' => 'postMessage',
                                    //for control
                                    'id'    => "twitter_url",
                                    'type'  => 'url',
                                    'label' => __("Twitter URL", 'ostore-pro')
                                ),
                                array(
                                    // for settigns
                                    'default'   => "",
                                    'transport' => 'postMessage',
                                    //for control
                                    'id'    => "rss_url",
                                    'type'  => 'url',
                                    'label' => __("RSS URL", 'ostore-pro')
                                ),
                                array(
                                    // for settigns
                                    'default'   => "",
                                    'transport' => 'postMessage',
                                    //for control
                                    'id'    => "linkedin_url",
                                    'type'  => 'url',
                                    'label' => __("Linkedin URL", 'ostore-pro')
                                ),
                                array(
                                    // for settigns
                                    'default'   => "",
                                    'transport' => 'postMessage',
                                    //for control
                                    'id'    => "instagram_url",
                                    'type'  => 'url',
                                    'label' => __("Instagram URL", 'ostore-pro')
                                ),
                                
                        )),
                        array(
                        'section' => array(
                            'id'        => "ostore_pro_subscribe",
                            'label'     => "Subscribe Section",
                            'priority'  => 42,
                            'panel'     =>'os_store_footer'
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => false,
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_subscribe_enable",
                                'type'  => 'checkbox',
                                'label' => __("Enable Subscribe", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => '',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_subscribe_area",
                                'type'  => 'text',
                                'label' => __("Mailchimp Shortcode", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => 'SIGN UP FOR oStore-pro',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_subscribe_heading_text",
                                'type'  => 'text',
                                'label' => __("Singup Header Text", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => 'Duis autem vel eum iriureDuis autem',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_subscribe_short_desc_area",
                                'type'  => 'textarea',
                                'label' => __("Singup Short Descrption", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => false,
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_subscribe_pupup_enable",
                                'type'  => 'checkbox',
                                'label' => __("Enable Subscribe Pupup Box", 'ostore-pro')
                            )
                        )),
                        array(
                        'section' => array(
                            'id'        => "ostore_pro_btn_social",
                            'label'     => __("Buttom Footer Section", 'ostore-pro'),
                            'priority'  => 43,
                            'panel'     =>'os_store_footer'
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => false,
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_btn_social_enable",
                                'type'  => 'checkbox',
                                'label' => __("Enable Social Links Footer", 'ostore-pro')
                            )
                            
                        )),
                        array(
                        'section' => array(
                            'id'        => "ostore_pro_copy_right_section",
                            'label'     => __("Footer Copyright Text", 'ostore-pro'),
                            'priority'  => 43,
                            'panel'     =>'os_store_footer'
                        ),
                        'fields' => array(
                            array(
                                // for settigns
                                'default'   => ' Theme: Popular ECommerce By ThemeRelic.',
                                'transport' => 'refresh',
                                //for control
                                'id'    => "ostore_pro_footer_copyright_section",
                                'type'  => 'textarea',
                                'label' => __("Footer Copyright Area","ostore-pro"),
                            )
                            
                        ))
                        
                    )
                );
                

            $customizer->prepare( $default );
        }
        
        //Social Links
        function ostore_pro_social_links_customizer($wp_customize) {
            $customizer = KCustomizer::get_instance($wp_customize);
            $default = array(
                'section' => array(
                        'id'        => "ostore_pro_social_links",
                        'label'     => __("Social Links", 'ostore-pro'),
                        'priority'  => 4
                    ),
                    'fields' => array(
                        array(
                            // for settigns
                            'default'   => true,
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_social_links_enable",
                            'type'  => 'checkbox',
                            'label' => __("Enable", 'ostore-pro')
                        ),
                        array(
                                // for settigns
                                'default'   => "www.facebook.com",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "facebook_url",
                                'type'  => 'url',
                                'label' => __("Facebook URL", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => "www.google-plus.com",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "google_plus",
                                'type'  => 'url',
                                'label' => __("Google Plus", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => "www.twitter.com",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "twitter_url",
                                'type'  => 'url',
                                'label' => __("Twitter URL", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => "www.rss.com",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "rss_url",
                                'type'  => 'url',
                                'label' => __("RSS URL", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => "www.linkedin.com",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "linkedin_url",
                                'type'  => 'url',
                                'label' => __("Linkedin URL", 'ostore-pro')
                            ),
                            array(
                                // for settigns
                                'default'   => "www.instagram.com",
                                'transport' => 'postMessage',
                                //for control
                                'id'    => "instagram_url",
                                'type'  => 'url',
                                'label' => __("Instagram URL", 'ostore-pro')
                            ),
                            
                    )
                );
            $customizer->prepare( $default );
        }

        function ostore_pro_subscribe_customizer($wp_customize) {
            $customizer = KCustomizer::get_instance($wp_customize);
            $default = array(
                'section' => array(
                        'id'        => "ostore_pro_subscribe",
                        'label'     => "Subscribe Section",
                        'priority'  => 5
                    ),
                    'fields' => array(
                        array(
                            // for settigns
                            'default'   => false,
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_subscribe_enable",
                            'type'  => 'checkbox',
                            'label' => __("Enable Subscribe", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => '',
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_subscribe_area",
                            'type'  => 'text',
                            'label' => __("Mailchimp Shortcode", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => '',
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_subscribe_heading_text",
                            'type'  => 'text',
                            'label' => __("Singup Header Text", 'ostore-pro')
                        ),
                        array(
                            // for settigns
                            'default'   => '',
                            'transport' => 'refresh',
                            //for control
                            'id'    => "ostore_pro_subscribe_short_desc_area",
                            'type'  => 'textarea',
                            'label' => __("Singup Short Descrption", 'ostore-pro')
                        )

                    )
                
                );
            $customizer->prepare( $default );
        }

        
    }
oStoreCustomizer::get_instance();


//add the customizer 
function customize_breadcrumbs_settings( $wp_customize ) {
       
            $wp_customize->add_section('ostore_pro_woocommerce_breadcrumbs_settings', array(
                'priority' => 20,
                'title' => esc_html__('Breadcrumbs Settings', 'ostore-pro')
            ));           

            $wp_customize->add_setting('ostore_pro_woocommerce_enable_disable_section', array(
                'default' => 'disable',
                'capability' => 'edit_theme_options',
            ));

            $wp_customize->add_control('ostore_pro_woocommerce_enable_disable_section', array(
                'type' => 'radio',
                'label' => esc_html__('Enable Section', 'ostore-pro'),
                'description' => esc_html__('You can enable and disable','ostore-pro'),
                'section' => 'ostore_pro_woocommerce_breadcrumbs_settings',
                'setting' => 'ostore_pro_woocommerce_enable_disable_section',
                'choices' => array(
                    'enable' => esc_html__('Enable', 'ostore-pro'),
                    'disable' => esc_html__('Disable', 'ostore-pro'),
            )));

            $wp_customize->add_setting('ostore_pro_breadcrumbs_woocommerce_background_image', array(
                'default' => '',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'esc_url_raw'
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ostore_pro_breadcrumbs_woocommerce_background_image', array(
                'label' => esc_html__('Upload Background Image', 'ostore-pro'),
                'section' => 'ostore_pro_woocommerce_breadcrumbs_settings',
                'setting' => 'ostore_pro_breadcrumbs_woocommerce_background_image'
            )));

}
add_action( 'customize_register', 'customize_breadcrumbs_settings' );

//add the customizer 
function customize_logo_slider( $wp_customize ) {

//add the custom_info  section
    $wp_customize->add_section('logo_slider',array(
        'title'     =>esc_html__('Logo Slider','ostore-pro'),
        'description'=>esc_html__('logo Slider Section Hear','ostore-pro'),
        'priority'  =>35,       
    ));

    //Logo Slider On Checkbox            
    $wp_customize->add_setting('logo_slider_on', array(
    'default' => '',
    'type' => 'theme_mod',
    'sanitize_callback' => 'ostore_pro_sanitize_checkbox'
    ));  
    $wp_customize->add_control( 'logo_slider_on', array(
        'label' => esc_html__('Enable', 'ostore-pro'),
        'description'=>esc_html__('Enable and Disable Logo Slider','ostore-pro'),
        'section' => 'logo_slider',
        'type'     =>'checkbox',
        'priority'=>36
    ));

    
    //Add the tile
    $wp_customize->add_setting('logo_slider_title', array(
        'default' => '',
        'type' => 'theme_mod',
        'sanitize_callback' => 'ostore_pro_text_sanitize'
        
        ));  
    $wp_customize->add_control( 'logo_slider_title', array(
        'label' => esc_html__('Title', 'ostore-pro'),
        'description'=>esc_html__('Write title','ostore-pro'),
        'section' => 'logo_slider',
        'type'     =>'text',
        'priority'=>37
            
    ));
    $wp_customize->selective_refresh->add_partial( 'logo_slider_title', array(
        'selector' 			=> '.our-clients .logo-slider-title',
        'render_callback' 	=> 'logo_slider_title_callback',
    ) );

    //Add the Short Description
    $wp_customize->add_setting('logo_slider_short_dec', array(
        'default' => '',
        'type' => 'theme_mod',
        'sanitize_callback' => 'ostore_pro_text_sanitize'
        ));  
    $wp_customize->add_control( 'logo_slider_short_dec', array(
        'label' => esc_html__('Description Hear', 'ostore-pro'),
        'description'=>esc_html__('Write your description','ostore-pro'),
        'section' => 'logo_slider',
        'type'     =>'textarea',
        'priority'=>38
            
    ));
    $wp_customize->selective_refresh->add_partial( 'logo_slider_short_dec', array(
        'selector' 			=> '.our-clients .logo-slider-description',
        'render_callback' 	=> 'logo_slider_short_dec_callback',
    ) );

    //Logo Side Add Image Multiple Image Slect
    $wp_customize->add_setting('ostore_pro_logo_slider', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'ostore_pro_sanitize_repeater',
        'default' => json_encode( array(
            array(
                'brand_logo' => '' ,
                'brand_logo_url' => ''
                )
            ) ) 
    ));

    $wp_customize->add_control( new OstorePro_Repeater_Controler( $wp_customize, 'ostore_pro_logo_slider', array(
            'label'   => esc_html__('Brand/Client Logo Settings','ostore-pro'),
            'section' => 'logo_slider',
            'settings' => 'ostore_pro_logo_slider',
            'ostore_pro_box_label' => esc_html__('Brand Logo Settings','ostore-pro'),
            'ostore_pro_box_add_control' => esc_html__('Add New Logo','ostore-pro'),
            'priority'=>39
        ),
        array(
            'brand_logo' => array(
                'type'      => 'upload',
                'label'     => esc_html__( 'Upload Logo', 'ostore-pro' )
            ),
            'brand_logo_url' => array(
                'type'      => 'text',
                'label'     => esc_html__( 'Link URL', 'ostore-pro' ),
                'default'   => ''
            )
        )
    ));
    


    ################################################################
    //add the custom_info  section
    $wp_customize->add_section('payment_logo_slider',array(
        'title'     =>esc_html__('Payment Logo ','ostore-pro'),
        'description'=>esc_html__('Payment logo  Section Hear','ostore-pro'),
        'priority'  =>40,       
    ));

    $wp_customize->add_setting('payment_enable',array(
        'default'   =>  '',
        'type'      =>  'theme_mod',
        'sanitize_callback' => 'ostore_pro_sanitize_checkbox'
    ));
    $wp_customize->add_control('payment_enable',array(
        'label'     =>  esc_html__( 'Payment Enable','ostore-pro'),
        'description'=>'',
        'section'   => 'payment_logo_slider',
        'type'      =>  'checkbox'
    ));

    $wp_customize->add_setting('payment_logo_add', array(
    'default' => '',
    'type' => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new Multi_Image_Custom_Control(
        $wp_customize, 'payment_logo_add', array(
            'label' => esc_html__('Payment Logo Image', 'ostore-pro'),
            'desciption'=>esc_html__('Payment Logo Image','ostore-pro'),
            'section' => 'payment_logo_slider',
            'settings' => 'payment_logo_add',
            'priority'=>41
        )
    ));

}
add_action( 'customize_register', 'customize_logo_slider' );


if (!class_exists('WP_Customize_Image_Control')) {
    return null;
}
class Multi_Image_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
        wp_enqueue_style('multi-image-style', get_template_directory_uri().'/themerelic/customizer/custom.css');
        wp_enqueue_script('multi-image-script', get_template_directory_uri().'/themerelic/customizer/custom.js', array( 'jquery', 'customize-controls' ), rand(), true);
    }

    public function render_content()
{ ?>
    <div class="payment_wraper">
        <label>
            <span class='customize-control-title'><?php esc_html_e('Image','ostore-pro'); ?></span>
        </label>
        <div>
            <ul class='images'></ul>
        </div>
        <div class='actions'>
            <a class="button-secondary upload"><?php esc_html_e('Add','ostore-pro'); ?></a>
        </div>

        <input class="wp-editor-area images-input" type="hidden" <?php esc_url($this->link()); ?>>
    </div>
    <?php
    }
}


/**
 * Text fields sanitization
*/
function ostore_pro_text_sanitize( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function ostore_pro_array_sanitize($values){
    if(is_array($values)){
        return $values;
    }
    return array();
}

function ostore_pro_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * repeator field sanitization
*/
function ostore_pro_sanitize_repeater($input){        
    $input_decoded = json_decode( $input, true );
    $allowed_html = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'a' => array(
            'href' => array(),
            'class' => array(),
            'id' => array(),
            'target' => array()
        ),
        'button' => array(
            'class' => array(),
            'id' => array()
        )
    ); 

    if(!empty($input_decoded)) {
        foreach ($input_decoded as $boxes => $box ){
            foreach ($box as $key => $value){
            $input_decoded[$boxes][$key] = sanitize_text_field( $value );
            }
        }
        return json_encode($input_decoded);
    }      
    return $input;
}

if( !function_exists('logo_slider_title_callback')){
    function logo_slider_title_callback(){
        return get_theme_mod('logo_slider_title', "");
    }
}

if( !function_exists('logo_slider_short_dec_callback')){
    function logo_slider_short_dec_callback(){
        return get_theme_mod('logo_slider_short_dec', '');
    }
}
if( !function_exists('ostore_pro_slider_category_callback')){
    function ostore_pro_slider_category_callback(){
        return get_theme_mod('ostore_pro_slider_category', 0);
    }
}