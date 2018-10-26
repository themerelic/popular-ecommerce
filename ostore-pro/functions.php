<?php
/**
 * oStore-pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oStore-pro
 */

if ( ! function_exists( 'ostore_pro_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	*/
	function ostore_pro_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'ostore-pro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		$defaults = array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ostore-pro' ),
			'top_menu' => esc_html__( 'Top Menu', 'ostore-pro' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( '', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ostore_pro_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		/**
		* Editor style.
		*/
		add_editor_style( 'assets/css/editor-style.css' );

		/*Add the Style Size */
		add_image_size( 'slider-image', 1250, 500, true );
		add_image_size('slider-widget',990,510,true);
		add_image_size('blog-image',350,230,true);
		add_image_size('recent-post',275,170,true);
		add_image_size('blog',400,250,true);
		add_image_size('hlp_products',103,113,true);
		add_image_size('product_list',80,80,true);
		add_image_size('new_letter',775,375,true);
		add_image_size('special-product',450,600);
		add_image_size('testimonial',130,130);
	}
endif;
add_action( 'after_setup_theme', 'ostore_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ostore_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ostore_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'ostore_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ostore_pro_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'ostore-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Left  Sidebar', 'ostore-pro' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'ostore-pro' ),
		'id'            => 'woocommerce',
		'description'   => esc_html__( 'Add widgets here.', 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	

	register_sidebar( array(
		'name'			=> esc_html__("Home Page", 'ostore-pro'),
		'id'			=> "home_page",
		'description'	=> esc_html__( "Home page Sections widget area", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("First Footer Area", 'ostore-pro'),
		'id'			=> "first_footer",
		'description'	=> esc_html__( "First Footer Area", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Second Footer Area", 'ostore-pro'),
		'id'			=> "second_footer",
		'description'	=> esc_html__( "Second Footer widget area", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Third Footer Area", 'ostore-pro'),
		'id'			=> "third_footer",
		'description'	=> esc_html__( "Third Footer Area", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Forth Footer Area", 'ostore-pro'),
		'id'			=> "forth_footer",
		'description'	=> esc_html__( "Forth Footer area", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Fifth Footer Area", 'ostore-pro'),
		'id'			=> "fifth_footer",
		'description'	=> esc_html__( "Fifth Footer Area", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );


	register_sidebar( array(
		'name'			=> esc_html__("Header: add", 'ostore-pro'),
		'id'			=> "header-add",
		'description'	=> esc_html__( "Top Header add", 'ostore-pro' ),
		'before_widget' => '<section id="%1$s" class="">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	
}
add_action( 'widgets_init', 'ostore_pro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ostore_pro_scripts() {
	$osStoreTheme = wp_get_theme();
	$theme_version = $osStoreTheme->get( 'Version' );

	$ostore_pro_pro_theme = wp_get_theme();
	$theme_version = $ostore_pro_pro_theme->get( 'Version' );

	/* oStore-pro Google Font */
	$ostore_pro_font_args = array(
		'family' => 'Open+Sans:300,400,600,700,800|Raleway:300,400,500,600,700',
	);
	wp_enqueue_style('ostore-google-fonts', add_query_arg( $ostore_pro_font_args, "//fonts.googleapis.com/css" ) );


	wp_enqueue_script( 'ostore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $theme_version ), true );

	wp_enqueue_script( 'ostore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $theme_version ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css', array(), esc_attr( $theme_version ) );

	wp_enqueue_style( 'ostore-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ostore-main-style', get_template_directory_uri() . '/assets/css/ostore-main-style.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'popup-newsletter-css', get_template_directory_uri() . '/assets/css/popup-newsletter.css', array(), esc_attr( $theme_version ) );

	// js
	wp_enqueue_script( 'ostore-cookes', get_template_directory_uri() . '/assets/js/me.js', array('jquery'), esc_attr( $theme_version ), true );
	
	wp_enqueue_script( 'popup-newsletter-js-file', get_template_directory_uri() . '/assets/js/popup-newsletter.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'single-product-zoom-js', get_template_directory_uri() . '/assets/js/single-product-zoom.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'jquery.nivo.slider', get_template_directory_uri() . '/assets/js/jquery.nivo.slider.pack.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), esc_attr( $theme_version ), true );

	wp_enqueue_script( 'ostore-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), esc_attr( $theme_version ), true );
	
}
add_action( 'wp_enqueue_scripts', 'ostore_pro_scripts' );

//Admin Css enque
function ostore_pro_custom_wp_admin_style($hook){
	$osStoreTheme = wp_get_theme();
	$theme_version = $osStoreTheme->get( 'Version' );
    wp_register_style( 'ostore_pro_custom_wp_admin_css', get_template_directory_uri('stylesheet_directory') . '/assets/admin/css/ostore-pro-admin.css',array(), esc_attr( $theme_version ) );
    wp_enqueue_style( 'ostore_pro_custom_wp_admin_css' );

    //Script file
    wp_register_script( 'ostore_pro_custom_wp_admin_js', get_template_directory_uri() . '/themerelic/setting/js/page-setting.js',array(), esc_attr( $theme_version ) );
    wp_enqueue_script( 'ostore_pro_custom_wp_admin_js' );
}
add_action('admin_enqueue_scripts', 'ostore_pro_custom_wp_admin_style');



/**
 * Admin Script
 **/
function ostore_pro_admin_script_enque($hook) {
	if(!$hook == "widget.php") return;
	$osStoreTheme = wp_get_theme();
	$theme_version = $osStoreTheme->get( 'Version' );
	wp_enqueue_script( 'ostore-admin', get_template_directory_uri() . '/assets/admin/js/ostore-pro-main.js', array('jquery'), esc_attr( $theme_version ), true );
	
}
add_action( 'admin_enqueue_scripts', 'ostore_pro_admin_script_enque' );

function pw_load_scripts($hook) {
	if( $hook != 'widgets.php' ) 
		return;
	wp_enqueue_script( 'media-js', get_template_directory_uri() . '/assets/js/media.js', array('jquery'), 1, true );
}
add_action('admin_enqueue_scripts', 'pw_load_scripts');

/**
 * Query WooCommerce activation
*/
if ( ! function_exists( 'ostore_pro_pro_is_woocommerce_activated' ) ) {
	function ostore_pro_pro_is_woocommerce_activated() {
	  return class_exists( 'woocommerce' ) ? true : false;
	}
  }
  
/**
 * Require init.
**/
require  trailingslashit( get_template_directory() ).'themerelic/init.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Plugins TGM
 */
 require get_template_directory() ."/inc/class-tgm-plugin-activation.php";


/**
 * Ostore Custom  Functions
 */
require get_template_directory() . '/inc/extras.php';

if ( ! function_exists( 'ostore_pro_is_woocommerce_activated' ) ) {
  function ostore_pro_is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
  }
}


/**
 * Filter the except length to 20 words.
 */
function ostore_pro_blog_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'ostore_pro_blog_excerpt_length', 999 );

/*woocommerce Product Rating Star */
add_action('woocommerce_after_shop_loop_item', 'get_star_rating' );
function get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();
	
	for( $i = 1; $i<=5; $i++ ) {
		if ($i<=$average){
			echo '<i class="fa fa-star gold" aria-hidden="true"></i>';
	 	}
		else{ 
			echo '<i class="fa fa-star blank" aria-hidden="true"></i>';
		 } 
	 } 
}


function create_posttype() {
  $args = array(
    'labels' => array(
      	'name' => esc_html__( 'Testimonial', 'ostore-pro' ),
        'singular_name' => esc_html__( 'Testimonial', 'ostore-pro' ), 
        'all_items' => esc_html__( 'All Testimonial', 'ostore-pro' ), 
        'add_new' => esc_html__( 'Add New', 'ostore-pro' ), 
        'add_new_item' => esc_html__( 'Add New Testimonial', 'ostore-pro' ), 
        'edit' => esc_html__( 'Edit Testimonial', 'ostore-pro' ), 
        'edit_item' => esc_html__( 'Edit', 'ostore-pro' ), 
        'new_item' => esc_html__( 'New Post Testimonial', 'ostore-pro' ), 
        'view_item' => esc_html__( 'View Testimonial', 'ostore-pro' ), 
        'search_items' => esc_html__( 'Search Testimonial', 'ostore-pro' ),
        'not_found' =>  esc_html__( 'Nothing found in the Database.', 'ostore-pro' ), 
        'not_found_in_trash' => esc_html__( 'Nothing found in Trash', 'ostore-pro' ), 
        'parent_item_colon' => ''
        ),
    'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 4,
      'menu_icon' => 'dashicons-businessman',
      'rewrite' => array( 'slug' => 'testimonial', 'with_front' => false ), 
      'has_archive' => 'testimonial',
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','comments')
    );
  register_post_type('testimonials', $args);
}
add_action( 'init', 'create_posttype');



  /**
 * Preloader Frontend Section area
*/
if ( ! function_exists( 'ostore_pro_pro_dynamic_preloader' ) ) {
    function ostore_pro_pro_dynamic_preloader() {
        $preloader = esc_attr( get_theme_mod( 'ostore_pro_pro_preloader', 'preloader-1' ) );
        if( isset( $preloader ) && $preloader != '' ) { ?>
            <style type='text/css'>
                .no-js #loader {
                    display: none;
                }
                .js #loader {
                    display: block;
                    position: absolute;
                    left: 100px;
                    top: 0;
                }
                .ostore-preloader {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999999;
                    background: url('<?php echo esc_url( get_template_directory_uri() ."/assets/images/preloader/".$preloader.".gif"); ?>') center no-repeat #fff;
                }
            </style>
        <?php  }
    }
}
add_action( 'wp_head', 'ostore_pro_pro_dynamic_preloader');





/**
 * check blog page
 **/
function ostore_pro_is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

add_action( 'tgmpa_register', 'ostore_pro_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function ostore_pro_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(

        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Quick View',
            'slug' => 'yith-woocommerce-quick-view',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Compare',
            'slug' => 'yith-woocommerce-compare',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Wishlist',
            'slug' => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name' => 'WooCommerce Grid / List toggle',
            'slug' => 'woocommerce-grid-list-toggle',
            'required' => false,
        ),
        array(
            'name' => 'Easy Google Fonts',
            'slug' => 'easy-google-fonts',
            'required' => false,
        )

    );

	/*
	 * Array of configuration settings. Amend each line as needed.
	*/
	$config = array(
		'id'           => 'ostore-pro',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                       
		'is_automatic' => false,                   
		'message'      => '',                      
		
	);

	tgmpa( $plugins, $config );
}




