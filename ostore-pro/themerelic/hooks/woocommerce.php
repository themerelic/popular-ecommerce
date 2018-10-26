<?php
/**
 * Woo Commerce Add Content Primary Div Function
**/
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
if (!function_exists('ostore_pro_woocommerce_output_content_wrapper')) {
    function ostore_pro_woocommerce_output_content_wrapper(){ ?>
    <div class="main-container">
      <div class="container">
       <div class="row">
          <div class="col-main col-md-9 col-sm-12">
            <?php   }
        }
        add_action( 'woocommerce_before_main_content', 'ostore_pro_woocommerce_output_content_wrapper', 10 );

        remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
        if (!function_exists('ostore_pro_woocommerce_output_content_wrapper_end')) {
            function ostore_pro_woocommerce_output_content_wrapper_end(){ ?>
        </div>
        <?php get_sidebar('woocommerce'); ?>
    </div><!-- row -->
    </div><!-- container -->
</div><!-- main-container -->
<?php   }
}
add_action( 'woocommerce_after_main_content', 'ostore_pro_woocommerce_output_content_wrapper_end', 10 );


/**
 * WooCommerce Manage Product Div Structure
**/
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );


if (!function_exists('ostore_pro_woocommerce_before_shop_loop_item')) {
    function ostore_pro_woocommerce_before_shop_loop_item(){ ?>
    <div class="product-item">
        <div class="item-inner">
           <div class="product-thumbnail">
                <?php global $post, $product; 
                if ( $product->is_on_sale() ) :
                    echo apply_filters( 'woocommerce_sale_flash', '<div class="icon-sale-label sale-left">' . esc_html( 'Sale', 'ostore-pro' ) . '</div>', $post, $product ); ?>
                <?php endif; ?>
                <?php
                global $product_label_custom;
                if ($product_label_custom != ''){
                    echo '<div class="icon-new-label new-right">'.esc_html($product_label_custom).'</div>';
                }
                ?>
                <div class="pr-img-area">
                    <figure>
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                                if( has_post_thumbnail() ){ 
                                    the_post_thumbnail('woocommerce_thumbnail'); #Products Thumbnail
                                }else{ 
                                    echo '<img src="http://via.placeholder.com/240x240&text=No%20Image%20">'; 
                                } 
                            ?> 
                        </a>
                    </figure>
                    <button type="button" class="add-to-cart-mt"> <span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                </div>
            
                <div class="pr-info-area">
                   <div class="pr-button">
                        <div class="mt-button add_to_wishlist">
                            <?php if(function_exists( 'ostore_pro_wishlist_products' )) { ostore_pro_wishlist_products(); } ?> 
                        </div>
                        <div class="mt-button add_to_compare"> 
                            <?php if(function_exists( 'add_compare_link' )) { add_compare_link(); } ?>                                   
                        </div>
                        <div class="mt-button quick-view"> 
                            <?php if(function_exists( 'ostore_pro_quickview' )) { ostore_pro_quickview(); } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-wrap">
            <div class="item-info clearfix">
                <div class="info-inner">
                    <div class="item-title"> 
                        <h3>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>

                    <div class="item-content">

                    <div class="item-price">
                        <?php woocommerce_template_loop_price(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php  }
}
add_action( 'woocommerce_before_shop_loop_item', 'ostore_pro_woocommerce_before_shop_loop_item', 9 );

add_action( 'woocommerce_before_single_product_summary', 'ostore_pro_woocommerce_single_product_sale_flash', 10 );
if( !function_exists('ostore_pro_woocommerce_single_product_sale_flash')){
    function ostore_pro_woocommerce_single_product_sale_flash(){
        global $post, $product; if ( $product->is_on_sale() ) :
        echo apply_filters( 'woocommerce_sale_flash', '<div class="icon-sale-label sale-left">' . __( 'Sale', 'ostore-pro' ) . '</div>', $post, $product );
    endif;
}
}

if (!function_exists('ostore_pro_woocommerce_after_shop_loop_item')) {
    function ostore_pro_woocommerce_after_shop_loop_item(){ ?>
</div>
<!-- End info wrap -->
</div>
</div>
<?php  }
}
add_action( 'woocommerce_after_shop_loop_item', 'ostore_pro_woocommerce_after_shop_loop_item', 11 );


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_show_page_title', '__return_false' );



/**
 *
**/

if( !function_exists( 'ostore_pro_woocommerce_result_count' )){
    function ostore_pro_woocommerce_result_count(){
        echo '<div class="toolbar">';
    }
}

add_action( 'woocommerce_before_shop_loop','ostore_pro_woocommerce_result_count', 14 );

if( !function_exists( 'ostore_pro_woocommerce_catalog_ordering' )){
    function ostore_pro_woocommerce_catalog_ordering(){
        echo '</div>';
    }
}
add_action( 'woocommerce_before_shop_loop','ostore_pro_woocommerce_catalog_ordering', 36);


/**
 * WooCommerce Breadcrumbs Section
**/
if( !function_exists( 'ostore_pro_woocommerce_breadcrumb' )){
    function ostore_pro_woocommerce_breadcrumb(){
      do_action( 'breadcrumb-woocommerce' );
  }
}
add_action( 'woocommerce_before_main_content','ostore_pro_woocommerce_breadcrumb', 9 );



/**
 * WooCommerce Number of row filter Function
**/

add_filter('loop_shop_columns', 'ostore_pro_loop_columns');
if (!function_exists('ostore_pro_loop_columns')) {
    function ostore_pro_loop_columns() {
        if(get_theme_mod('ostore_pro_woocommerce_product_row','3')){
            $xr = get_theme_mod('ostore_pro_woocommerce_product_row','3');
        } else {
            $xr = 3;
        }
        return $xr;
    }
}

add_action( 'body_class', 'ostore_pro_woo_body_class');
if (!function_exists('ostore_pro_woo_body_class')) {
    function ostore_pro_woo_body_class( $class ) {
     $class[] = 'columns-'.ostore_pro_loop_columns();
     return $class;
 }
}

/**
 * Woo Commerce Number of Columns filter Function
**/
$column = get_theme_mod('ostore_pro_woocommerce_display_product_number','12');
//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$column.';' ), 20 );



/**
 * Tabs Category Products Ajax Function
**/
if ( ! function_exists( 'ostore_pro_tabs_ajax_action' ) ) {
    function ostore_pro_tabs_ajax_action() {
        $cat_slug    = $_POST['category_slug'];
        $product_num    = $_POST['product_num'];
        ob_start();
        ?>

        <div class="tab-pane active in" id="<?php echo esc_attr( $cat_slug ); ?>">
          <div class="new-arrivals-pro">
            <div class="slider-items-products">
              <div id="tabs-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">

                  <?php 
                  $product_args = array(
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'product_cat',
                            'field'     => 'slug', 
                            'terms'     => $cat_slug                                                                 
                        )),
                    'posts_per_page' => $product_num
                );
                  $query = new WP_Query($product_args);

                  if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                      ?>
                      <?php wc_get_template_part( 'content', 'product' ); ?>
                      
                      <?php } } wp_reset_query(); ?>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <?php
  $sv_html = ob_get_contents();
  ob_get_clean();
  echo $sv_html;
  die();
}
}
add_action( 'wp_ajax_ostore_pro_tabs_ajax_action', 'ostore_pro_tabs_ajax_action' );
add_action( 'wp_ajax_nopriv_ostore_pro_tabs_ajax_action', 'ostore_pro_tabs_ajax_action' );


/*****************************************
 * WooCommerce Settings Function Area
*******************************************/


/**
 * Product Wishlist Button Function
**/
if (defined( 'YITH_WCWL' )) { 

    function ostore_pro_wishlist_products() {      
      global $product;
      $url = add_query_arg( 'add_to_wishlist', $product->get_id() );
      $id =  $product->get_id();
      $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>

        <!-- new file -->
        <div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr( $id ); ?>">

            <div class="yith-wcwl-add-button show" style="display:block">  
                <a href="<?php echo esc_url( $url ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr( $id ); ?>" data-product-type="simple" class="add_to_wishlist">
                    <i class="fa fa-heart"></i>
                </a>
            </div>

            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> 
                <a href="<?php echo esc_url( $wishlist_url ); ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
            </div>

            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                <span class="feedback"><i class="fa fa-check" aria-hidden="true"></i></span>
            </div>

            <div class="clear"></div>
            <div class="yith-wcwl-wishlistaddresponse"></div>

        </div>        
    <?php
}

/**
 * Wishlist Header Count Ajax Function
**/
if ( ! function_exists( 'ostore_pro_wishlist' ) ) {
    function ostore_pro_wishlist() {
        if ( function_exists( 'YITH_WCWL' ) ) {
            global $product;
            $url = add_query_arg( 'add_to_wishlist', $product->get_id() );
            $id =  $product->get_id();
            $wishlist_url = YITH_WCWL()->get_wishlist_url();

            ?>
            <a href="<?php echo esc_url($wishlist_url ); ?>" title="Wishlist" data-toggle="tooltip">
                <div class="count">                            
                    <i class="fa fa-heart"></i>
                    <span class="hidden-xs"><?php esc_attr_e('Wishlist', 'ostore-pro'); ?></span>
                    <span class="badge bigcounter"><?php echo esc_html(yith_wcwl_count_products()); ?></span>
                </div>
            </a>
            <?php
        }
    }
}
add_action( 'wp_ajax__wcwl_update_single_product_list', 'ostore_pro_wishlist' );
add_action( 'wp_ajax_nopriv__wcwl_update_single_product_list', 'ostore_pro_wishlist' );
}



if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
function yith_wcwl_ajax_update_count(){
$wishlist_count = wp_send_json( array(
'count' => yith_wcwl_count_all_products()
) );
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}


/*
*Top Header Wishlist function
*/
if(!function_exists('ostore_pro_top_wishlist')){
    function ostore_pro_top_wishlist() {
        if (!defined( 'YITH_WCWL' )) return;
        ?>
        <div class="wishlist-wrapper">
            <a class="quick-wishlist" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url()); ?>" title="<?php echo esc_attr("Wishlist", "ostore"); ?>">
                <i class="fa fa-heart"></i>
                <sup> <?php $wishlist_count = YITH_WCWL()->count_products();
                    echo esc_html($wishlist_count); ?>
                </sup>
            </a>
        </div>
    <?php 
    }
}

/**
 *  Add the Link to Compare Function
**/
if( defined( 'YITH_WOOCOMPARE' ) ){

    function add_compare_link2( $product_id = false, $args = array() ) {
        extract( $args );

        if ( ! $product_id ) {
            global $product;
            $product_id = ! is_null( $product ) ? yit_get_prop( $product, 'id', true ) : 0;
        }

        // return if product doesn't exist
        if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
            return;
        
        $is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;
        $compare = new YITH_Woocompare_Frontend();
        if ( ! isset( $button_text ) || $button_text == 'default' ) {
            $button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'ostore-pro' ) );
            do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text );
            $button_text = apply_filters( 'wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text' );
        }
        printf( '<a href="%s" class="%s" data-product_id="%d" rel="nofollow"><i class="fa fa-signal"></i></a>', $compare->add_product_url( intval($product_id) ), 'compare' . ( $is_button == 'button' ? ' button' : '' ), intval($product_id), esc_html($button_text) );
        
    }
    
    // remove_action( 'woocommerce_after_shop_loop_item',  array( 'YITH_Woocompare_Frontend', 'add_compare_link' ), 20 );



    function add_compare_link( $product_id = false, $args = array() ) {
        extract( $args );

        if ( ! $product_id ) {
            global $product;
            $productid = $product->get_id();
            $product_id = isset( $productid ) ? $productid : 0;
        }
        
        $is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;

        if ( ! isset( $button_text ) || $button_text == 'default' ) {
            $button_text = get_option( 'yith_woocompare_button_text', esc_html__( 'Compare', 'ostore-pro' ) );
            yit_wpml_register_string( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
            $button_text = yit_wpml_string_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
        }
        printf( '<a title="'. esc_html__( 'Add to Compare', 'ostore-pro' ) .'" href="%s" class="%s" data-product_id="%d" rel="nofollow"><i class="fa fa-signal"></i></a>', '#', 'compare', intval($product_id));
    }
    remove_action( 'woocommerce_after_shop_loop_item',  array( 'YITH_Woocompare_Frontend', 'add_compare_link' ), 20 );



}


/**
 *  Add the Link to Quick View Function
**/

if( defined( 'YITH_WCQV' ) ){
    function ostore_pro_quickview(){
        global $product;
        $quick_view = YITH_WCQV_Frontend();
        remove_action( 'woocommerce_after_shop_loop_item', array( $quick_view, '_add_quick_view_button' ), 15 );
        echo '<a title="'. esc_html( 'Quick View', 'ostore-pro' ) .'" href="#" class="yith-wcqv-button" data-product_id="' . get_the_ID() . '"> 
        <i class="fa fa-search"></i> 
        </a>';
    }
}

if ( ! function_exists( 'YITH_WOOCOMPARE' ) ) {
    function ostore_pro_cart_link(){ ?>
        <a class="mini-cart-link cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>">
            <i class="fa fa-shopping-cart"></i>
            <sup><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></sup>
        </a>
    
    <?php
    }
}

 /**
* Cart Function Area
*/

if ( ! function_exists( 'ostore_pro_top_cart' ) ) {
function ostore_pro_top_cart() { ?>
<div class="top-cart-contain">
    <div class="mini-cart">
        <div data-toggle="collapse" data-hover="collapse" class="top_add_cart " data-target="#top-add-cart">

            <a href="" class="js-prevent">
                <i class="fa fa-shopping-cart"></i>
                <sup id="miniCartItemCount"><?php echo intval(WC()->cart->get_cart_contents_count()); ?></sup>
            </a>

            
        </div>
        <div id="top-add-cart" class="collapse">
            <div class="top-cart-content">
                <div class="block-subtitle"><?php esc_html_e('Recently added item(s)','ostore-pro'); ?></div>
                <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            </div>
        </div>
    </div>
</div>
<?php 
}
}
add_action('ostore_pro_pro_top_cart','ostore_pro_top_cart');


function ostore_pro_woocommerce_header_add_to_cart_fragment($fragments) {
    ob_start();
    ?>
        <sup id="miniCartItemCount"><?php echo intval(WC()->cart->get_cart_contents_count()); ?></sup>
    <?php
    $fragments['#miniCartItemCount'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'ostore_pro_woocommerce_header_add_to_cart_fragment');


/**
 * Woocommerce Zoom 
 */
add_action( 'after_setup_theme','ostore_pro_woocommerce_setup');
function ostore_pro_woocommerce_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

function ostore_pro_woocommerce_scripts() {

    
    wp_enqueue_style( 'ostore-pro-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

    $font_path   = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
            font-family: "star";
            src: url("' . $font_path . 'star.eot");
            src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
                url("' . $font_path . 'star.woff") format("woff"),
                url("' . $font_path . 'star.ttf") format("truetype"),
                url("' . $font_path . 'star.svg#star") format("svg");
            font-weight: normal;
            font-style: normal;
        }';

    wp_add_inline_style( 'ostore-pro-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts','ostore_pro_woocommerce_scripts' );