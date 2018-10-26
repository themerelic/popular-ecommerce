<?php
/**
 * Use: add the function for child theme
 * 
 * @package ostore-child
 */
/**
 * Woocommerce Class Plugin
 */
if ( ! function_exists( 'popular_ecommerce_is_woocommerce_activated' ) ) {
	function popular_ecommerce_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/************************************************************
 *              Popular Single Product Id
 *Description: get the woocommerce single products id
 ***********************************************************/
if( ! function_exists( 'popular_ecommerce_get_woocommerce_products_id' ) ) {
	function popular_ecommerce_get_woocommerce_products_id( ){
        if( !popular_ecommerce_is_woocommerce_activated()): return; endif;
        
            //products
            $product_args = array(
                'post_type' => 'product',
                'posts_per_page' => -1
            );
            $query = new WP_Query( $product_args );
            if($query->have_posts()) { while( $query->have_posts() ) { $query->the_post();
                $products_ids[ get_the_ID() ] = get_the_title();  
            }}
            
            wp_reset_postdata();

            return $products_ids;
        
            
        
	}

}



/************************************************************
 *              Popular eCommerce Single Functions
 *Description: single products function 
 ***********************************************************/
if( ! function_exists( 'popular_ecommerce_homepage_single_products_slider' ) ) {
	function popular_ecommerce_homepage_single_products_slider( ){
        if( !popular_ecommerce_is_woocommerce_activated()  ): return; endif;

    if( get_theme_mod('popular_ecommerce_single_products_section_enable',false) == true  ):
        //customizer Setting call
        $popular_ecommerce_single_products_ids = get_theme_mod( 'popular_ecommerce_single_products_id',array());
        
        ?>
            <!-- singl-product -->
            <section class="single-product">
                <div class="container">
                    
                    <!-- Start Header Secion -->
                    <?php if( popular_ecommerce_single_products_slider_header_title_callback() != ''): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading-text">
                                    <h2><?php echo esc_html( popular_ecommerce_single_products_slider_header_title_callback() ); ?></h2>
                                    <?php if( popular_ecommerce_single_products_slider_header_desc_callback() != '' ): ?><div class="description"><?php echo esc_attr( popular_ecommerce_single_products_slider_header_desc_callback() ); ?></div><?php endif; ?>
                                   
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/assets/images/line.png'); ?>" alt="line">
                                </div>	
                            </div>	
                        </div>
                    <?php endif; ?>
                    <!-- End Header Section -->
                    
                    <div class="owl-carousel product-slider">
                            <?php foreach( $popular_ecommerce_single_products_ids as $prodctu_count => $product_id ){ 
                               
                               //Products cart
                               $product = new WC_Product( intval($product_id) );

                                ?>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="single-img">
                                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $product->get_id(), 'full' ) ); ?>" alt="line">
                                            </div>	
                                        </div>
                                        <div class="col-md-7">
                                            <div class="single-text">
                                                <h3><?php echo esc_attr( $product->get_name() ); ?></h3>
                                                <span class="products-price" >
                                                    <?php
                                                        //Single Products Price
                                                        $single_products_price_symbol = get_woocommerce_currency_symbol();
                                                        $single_products_get_price = $product->get_price();
                                                        $single_products_get_regular_price = $product->get_regular_price();

                                                        //Price Display Section
                                                        if( $single_products_get_regular_price == '' || $single_products_get_regular_price == $single_products_get_price ){
                                                            echo "<strong>".esc_html($single_products_price_symbol).esc_html($single_products_get_price)."</strong>"; 
                                                        }else{
                                                            echo "<strong><del>".esc_html($single_products_price_symbol).esc_html($single_products_get_regular_price)."</del> - ".esc_html($single_products_price_symbol).esc_html($single_products_get_price)."</strong>"; 
                                                        }
                                                        
                                                    ?>
                                                <p><?php echo wp_kses_post( $product->get_short_description() );?></p>
                                                <div class="add-cart">
                                                    <button class="btn block" type="text"><a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo esc_html__('learn more','popular-ecommerce'); ?></button>
                                                    <button class="btn lite-blue woocommerce" type="text">
                                                        <?php
                                                            //Add to Cart
                                                            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                                sprintf( '<a href="/%s/?add-to-cart=%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-quantity="1">add to cart</a>',
                                                                    esc_attr( get_bloginfo('name') ),
                                                                    esc_attr( $product_id ),
                                                                    esc_attr( $product_id ),
                                                                    esc_attr( $product->get_sku() ),
                                                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                                    esc_attr( $product->get_type() ),
                                                                    esc_html( $product->add_to_cart_text() )
                                                                ),
                                                            $product );

                                                        ?>
                                                    </button>
                                                </div>	
                                            </div>	
                                        </div>
                                    </div>
                                </div>  	
                            <?php }  ?>
                        </div>	

                </div>	
            </section>	
            <!-- # End Popular eCommerce Single Products Slider -->
        <?php
        endif;
	}

}
add_action('popular_ecommerce_homepage_slider','popular_ecommerce_homepage_single_products_slider');

/**
 * Footer Copyright section
*/
if ( ! function_exists( 'popular_ecommerce_footer_copyright' ) ) {    
    function popular_ecommerce_footer_copyright() {
        $ostore_pro_copy_right_section = get_theme_mod('ostore_pro_footer_copyright_section','<a href="www.themerelic.com"><i class="fa fa-copyright"></i> Theme: Popular ECommerce By ThemeRelic.</a>');
        
    ?>
    <div class="col-sm-6 col-xs-12 coppyright">
        <?php echo wp_kses_post( $ostore_pro_copy_right_section ) ?>
    </div>
    <?php
    }
}
add_action( 'popular_ecommerce_copyright_section', 'popular_ecommerce_footer_copyright');



if( ! function_exists( 'popular_ecommerce_get_all_fonts' ) ) :
    /**
     * Return Web safe font and google font
    */
    function popular_ecommerce_get_all_fonts(){
        $google = array();        
        $standard = array(
            'georgia-serif'       => __( 'Georgia', 'ostore' ),
            'palatino-serif'      => __( 'Palatino Linotype, Book Antiqua, Palatino', 'ostore' ),
            'times-serif'         => __( 'Times New Roman, Times', 'ostore' ),
            'arial-helvetica'     => __( 'Arial, Helvetica', 'ostore' ),
            'arial-gadget'        => __( 'Arial Black, Gadget', 'ostore' ),
            'comic-cursive'       => __( 'Comic Sans MS, cursive', 'ostore' ),
            'impact-charcoal'     => __( 'Impact, Charcoal', 'ostore' ),
            'lucida'              => __( 'Lucida Sans Unicode, Lucida Grande', 'ostore' ),
            'tahoma-geneva'       => __( 'Tahoma, Geneva', 'ostore' ),
            'trebuchet-helvetica' => __( 'Trebuchet MS, Helvetica', 'ostore' ),
            'verdana-geneva'      => __( 'Verdana, Geneva', 'ostore' ),
            'courier'             => __( 'Courier New, Courier', 'ostore' ),
            'lucida-monaco'       => __( 'Lucida Console, Monaco', 'ostore' ),
        );
        
        $fonts = include wp_normalize_path( get_stylesheet_directory() . '/themerelic/customizers/custom-controls/typography/webfonts.php' );
        
        foreach( $fonts['items'] as $font ){
            $google[$font['family']] = $font['family'];
        }
        $all_fonts = array_merge( $standard, $google );
        return $all_fonts; 
    }
    endif;



    
/**
 * Function to get valid font, weight and style
*/
function popular_ecommerce_get_fonts( $font_family, $font_variant ){
    
    $fonts = array();
    $websafe_fonts = popular_ecommerce_get_websafe_font(); //Web Safe Font
    
    if( $font_family ){
        if( popular_ecommerce_is_google_font( $font_family ) ){
            $fonts['font'] = esc_attr( $font_family ); //Google Font
            if( $font_variant ){
                $weight_style    = popular_ecommerce_get_css_variant( popular_ecommerce_check_varient( $font_family, $font_variant ) );
                $fonts['weight'] = $weight_style['weight'];
                $fonts['style']  = $weight_style['style'];
            }else{
                $fonts['weight'] = '400';
                $fonts['style']  = 'normal';
            }
        }else{
            if( array_key_exists( $font_family, $websafe_fonts ) ){
                $fonts['font'] = $websafe_fonts[ $font_family ]['fonts']; //Web Safe Font
                if( $font_variant ){
                    $weight_style    = popular_ecommerce_get_css_variant( popular_ecommerce_check_varient( $font_family, $font_variant ) );
                    $fonts['weight'] = $weight_style['weight'];
                    $fonts['style']  = $weight_style['style'];
                }else{
                    $fonts['weight'] = '400';
                    $fonts['style']  = 'normal';
                }
            }
        }   
    }else{
        $fonts['font']   = '"Times New Roman", Times, serif';
        $fonts['weight'] = '400';
        $fonts['style']  = 'normal';
    }
    
    return $fonts;
}


/**
 * Ostore Top Header
 */
if ( ! function_exists( 'popular_ecommerce_pro_top_header' ) ) {
	function popular_ecommerce_pro_top_header() {
        $ostore_pro_social_links_enable = get_theme_mod('ostore_pro_social_links_enable',true);

        if( $ostore_pro_social_links_enable == false ){
            $top_header_class = 'col-lg-12 col-md-12 col-sm-12 top-header-info-center';
        }else{
            $top_header_class = 'col-lg-6 col-md-6 col-sm-12';
        }
        ?>
			<div class="header-top">
			  <div class="container">
                    <div class="row">
                        <div class="<?php echo esc_attr( $top_header_class ); ?>">
                            <div class="quickinfo_main">
                                <ul class="quickinfo">
                                    <?php
                                        $email_address    = get_theme_mod('ostore_pro_top_header_email','your_gmail@gmail.com');
                                        $phone_number     = get_theme_mod('ostore_pro_top_header_phone_no','+123-4567890');
                                        $map_address      = get_theme_mod('ostore_pro_top_header_address','your address');
                                        $shop_open_time   = get_theme_mod('ostore_pro_top_header_time','10am-5pm');
                                    
                                    if(!empty( $email_address )) { ?>        							
                                        <li>
                                            <a href="mailto:<?php echo antispambot( $email_address ); ?>">
                                                <i class="fa fa-envelope"></i>
                                                <?php echo antispambot( $email_address ); ?>
                                            </a>
                                        </li>
                                    <?php }  ?>
                                    
                                    <?php if(!empty( $phone_number )) { ?>        							
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:<?php echo esc_attr( $phone_number ); ?>">
                                                <?php echo esc_attr( $phone_number ); ?>
                                            </a>
                                        </li>
                                    <?php }  ?>
                                    
                                    <?php if(!empty( $map_address )) { ?>        							
                                        <li>        	                    	
                                            <i class="fa fa-map"></i>
                                            <?php echo esc_attr( $map_address ); ?>
                                        </li>
                                    <?php }  ?>
                                    
                                    <?php if(!empty( $shop_open_time )) { ?>        							
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            <?php echo esc_attr( $shop_open_time ); ?>
                                        </li>
                                    <?php }  ?>        	                    
                                </ul>
                            </div>
                        </div>
                        <?php if( $ostore_pro_social_links_enable == true ): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <?php
                                    $facebook_url = get_theme_mod('facebook_url','www.facebook.com/');
                                    $googleplus_url = get_theme_mod('google_plus','www.plus.google.com/');
                                    $twitter_url = get_theme_mod('twitter_url','www.twitter.com');
                                    $rss_url = get_theme_mod('rss_url');
                                    $linkedin_url = get_theme_mod('linkedin_url','www.linkedin.com/');
                                    $instagram = get_theme_mod('instagram_url','www.instagram.com/');
                                
                                ?>
                                <div class="social-links-section">
                                    <ul class="inline-mode">
                                        <?php if(!empty( $facebook_url) ) { ?><li class="social-network fb"><a title="<?php esc_attr('Connect us on Facebook','ostore-pro') ?>" target="_blank" href="<?php echo esc_url($facebook_url);  ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                        <?php if(!empty( $googleplus_url) ) { ?><li class="social-network googleplus"><a title="<?php esc_attr('Connect us on Google+','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($googleplus_url); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                        <?php if(!empty( $twitter_url) ) { ?><li class="social-network tw"><a title="<?php esc_attr('Connect us on Twitter','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($twitter_url);  ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                        <?php if(!empty( $rss_url) ) { ?><li class="social-network rss"><a title="<?php esc_attr('Connect us on Instagram','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($rss_url);  ?>"><i class="fa fa-rss"></i></a></li><?php } ?>
                                        <?php if(!empty( $linkedin_url) ) { ?><li class="social-network linkedin"><a title="<?php esc_attr('Connect us on Linkedin','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                                        <?php if(!empty( $instagram) ) { ?><li class="social-network instagram"><a title="<?php esc_attr('Connect us on Instagram','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($instagram);  ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif;#disable social links ?>
                    </div>
			  </div>
			</div><!-- End header-top -->
		<?php
	}
}
add_action( 'popular_ecommerce_top_header_functions', 'popular_ecommerce_pro_top_header');


/**
 * Woocommerce Section Hear
 */
if( popular_ecommerce_is_woocommerce_activated()){
    
    //WooCommerce Add to Cart Text Change
    if( get_theme_mod('popular_ecommerce_add_to_cart_button_text_change_enable',false) ):
        
        //Add to cart button text change
        add_filter('woocommerce_product_add_to_cart_text', 'popular_ecommerce_archive_custom_cart_button_text');   // 2.1 +
        function popular_ecommerce_archive_custom_cart_button_text(){
            $popular_ecommerce_cart_button_text_change = get_theme_mod('popular_ecommerce_add_to_cart_text_change','Add To Cart');
            return $popular_ecommerce_cart_button_text_change;
        }

    endif;

    //pupup file section
    /** Woocommerce Shop Products Quick View */
    function css_js_woocomerce() {
        //slider test 
        wp_enqueue_script('slick.min.js', get_theme_file_uri() . '/assets/js/slick.min.js', array(), false, false);
        wp_enqueue_script('ostore_pro_img_js', get_theme_file_uri() . '/assets/js/img-load.js', array(), false, false);
            
    }
    add_action('wp_enqueue_scripts', 'css_js_woocomerce');

    function ostore_pro_product_image_wrap_open () {
        echo '<div class="ostore-pro-product-image-wrapper">';
    }

    function ostore_pro_product_image_wrap_close () {
        echo '</div>';
    }


    add_action( 'yith_wcqv_product_image', 'ostore_pro_product_image_wrap_open', 9 );
    add_action( 'yith_wcqv_product_image', 'ostore_pro_product_image_wrap_close', 21 );



    function ostore_pro_add_thumb_wcqv () {
        add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 2);
    }
    add_action( 'wp_ajax_yith_load_product_quick_view', "ostore_pro_add_thumb_wcqv", 1);
    add_action( 'wp_ajax_nopriv_yith_load_product_quick_view', 'ostore_pro_add_thumb_wcqv',1 );

    //Replace Ratings in popup
    remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 10 );
    add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 4 );

    add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 17 );
    add_action( 'yith_wcqv_product_summary' , 'ostore_pro_add_title_quantity', 18 );

    function ostore_pro_add_instock () {
        global $product;

        $availability      = $product->get_availability();
        $availability_icon = $availability['class'] === "in-stock" ? '<i class="fa fa-check"></i>' : '';
        $availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . $availability_icon . esc_html( $availability['availability'] ) . '</p>';
        echo $availability_html;
    }
    add_action( 'yith_wcqv_product_summary', 'ostore_pro_add_instock', 16 );
    add_action( 'woocommerce_single_product_summary', 'ostore_pro_add_instock', 11 );
}

if( !function_exists('popular_ecommerce_single_products_slider_header_title_callback')){
    function popular_ecommerce_single_products_slider_header_title_callback(){
        return  get_theme_mod( 'popular_ecommerce_single_products_slider_header_title','CHOOSE THE BEST' );
    }
}

if( !function_exists('popular_ecommerce_single_products_slider_header_desc_callback')){
    function popular_ecommerce_single_products_slider_header_desc_callback(){
        return get_theme_mod( 'popular_ecommerce_single_products_slider_header_desc','MIRUM EST NOTARE QUAM LITTERA GOTHICA QUAM NUNC PUTAMUS PARUM CLARAM!' );
    }
}