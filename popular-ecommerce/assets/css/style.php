<?php
/**
 * Dynamic Styles
 * 
 * @package Popular Ecommerce
*/
class Popular_Ecommerce_Custom_Style {
    static $instance;
    
    // Construct functions
    function __construct() {
        add_action('init',array($this,'init'));
    }

    //Init file
    function init(){
        // generate enline css
        add_action( 'wp_enqueue_scripts', array($this,'popular_ecommerce_google_fonts_enqueue') );
        add_action( 'wp_enqueue_scripts',array($this,'popular_ecommerce_inline_css') );
        
    }

    //Public Static fuctions
    public static function getInstance(){
        if (!is_null(self::$instance)) return self::$instance;
        self::$instance = new self;
        return self::$instance;
    }


    //Enqueue Google Fonts using a function
    function popular_ecommerce_google_fonts_enqueue() {
        $primary_font    = array( get_theme_mod( 'primary_font', 'Dosis' ) );
        $secondary_font  = array( get_theme_mod( 'secondary_font', 'Poppins' ) );


        //All Array Values Merge
        $theme_selected_fonts = array_unique ( array_merge( $primary_font,$secondary_font ) );


        foreach( $theme_selected_fonts as $fonts_name ){

            //Check the condtions
            if( $fonts_name != 'Default' ){
                // Setup font arguments
                $query_args = array(
                    'family' => $fonts_name.':300,400,700' // Change this font to whatever font you'd like
                );
            
                // A safe way to register a CSS style file for later use
                wp_register_style( 'google-fonts'.$fonts_name, add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
                
                // A safe way to add/enqueue a CSS style file to a WordPress generated page
                wp_enqueue_style( 'google-fonts'.$fonts_name );
            }
        }
    }


    //Popular Ecommerce Inline Style
    function popular_ecommerce_inline_css(){
        $custom_css = "";
        
        /************************************************************************************* */
        $primary_font    = get_theme_mod( 'primary_font', 'Dosis' );
        $secondary_font  = get_theme_mod( 'secondary_font', 'Poppins' );
        $font_size       = get_theme_mod( 'font_size', 16 ).'px';
        
        $h1_font_size = get_theme_mod( 'h1_font_size', 32 ).'px';
        $h1_font_weight = get_theme_mod( 'h1_font_weights','600' );
        
        $h2_font_size = get_theme_mod( 'h2_font_size', 28 ).'px';
        $h2_font_weight = get_theme_mod( 'h2_font_weights','600' );

        $h3_font_size = get_theme_mod( 'h3_font_size', 24 ).'px';
        $h3_font_weight = get_theme_mod( 'h3_font_weights','600' );

        $h4_font_size = get_theme_mod( 'h4_font_size', 20 ).'px';
        $h4_font_weight = get_theme_mod( 'h4_font_weights','600' );

        $h5_font_size = get_theme_mod( 'h5_font_size', 18 ).'px';
        $h5_font_weight = get_theme_mod( 'h5_font_weights','400' );

        $h6_font_size = get_theme_mod( 'h6_font_size', 16 ).'px';
        $h6_font_weight = get_theme_mod( 'h6_font_weights','400' );

        //Background Color
        $theme_primary_color            = get_theme_mod('ostore_pro_pro_primary_color','#222');
        $secondary_primary_color        = get_theme_mod('ostore_pro_pro_secondry_color','#626ea3');
        $ostore_pro_top_footer_color    = get_theme_mod('ostore_pro_top_footer_color','#fff');
        $ostore_pro_mid_footer_color    = get_theme_mod('ostore_pro_mid_footer_color','#222');

        /*************************************************************
         *               Secondary header nav li a,
         *********************************************************/
        /*  Secondery Fonts Family*/
        if( !empty( $secondary_font ) ){        
            $custom_css .= "
            body, p, section.widget_product_categories ul li a,
            .woocommerce-table td,
            .woocommerce-checkout-review-order-table td,
            .cart_totals td,
            .my-order td, th,
            .payment form .form-group  label,
            .recent-blog-text ol li,
            .widget button, 
            input[type='button'], 
            input[type='reset'], 
            input[type='submit'],
            small, span,pre,mark,
            ins,code,
            kbd,
            tt,
            var,
            .navigation .nav-links,
            header .header-top .headerlinkmenu li a,
            a.button.product_type_grouped,
            .product_add .product_add_item 
            .pro_add_text a.view-all, 
            .product .pro_add a.view ,
            .blog_text.main_blog_text p.blog_text_des,
            .breadcrumbs-section a,.breadcrumbs-section span,.breadcrumbs-section,
            .widget-area .widget ul li a,
            .blog_text.blog_text1 a,
            .blog-content p,
            div#comments p.logged-in-as a,
            p.comment-form-comment label,
            .comment-content p,
            .comment-metadata time,
            .breadcrumb-section a,
            h5.page-title,
            header .header-wrap-2 .top-links li.woocommerce-mini-cart-item a,
            .woocommerce-mini-cart__total strong,
            p.woocommerce-mini-cart__buttons.buttons a,
            section.main_blog.no-margin.bg-grey p.top-p,
            .contact-info label,
                a.button.product_type_external,
            p.woocommerce-result-count,
            nav.woocommerce-breadcrumb a,
            .summary.entry-summary h1,
            .add-card-detail .product_meta span,
            .woocommerce-variation-description p,
            .page-template-v3 .product03 .pro_list ul li a,
            .woocommerce nav.woocommerce-MyAccount-navigation ul li a,
            .woocommerce-MyAccount-content p,
            .woocommerce-MyAccount-content p a,
            a.single_add_to_cart_button.button.alt,
            .btn, p.form-submit input,
            .bottom-img-info h6,
            .ostore-hlp-timer-grid .box-time-date, .comment-reply-title, .woocommerce-error li, .entry-excerpt,
            .woocommerce form .form-row label,
            li.wc_payment_method.payment_method_ppec_paypal label
            {
                font-family: $secondary_font;
            }\n";
        }

        /*************************************************************
         *                  Primary Fonts
         *********************************************************/
        /*  Primary fonts */
        if( !empty( $primary_font ) ){        
            $custom_css .= "
            
            .site-branding p.site-title a,
            .site-branding p.site-description,
            .widget .widget-title,
            .post-navigation .post-title,
            .related-post .title,
            .comments-area .comments-title,
            .comments-area .comment-body .fn,
            .comments-area .comment-reply-title,
            .banner_content .banner_item2 .banner_item2_text h4,
            .product .pro_add h3,
            .product .product_detail h5 a,
            .product .pro_add h5,
            .product_add .product_add_item .pro_add_text h2,
            .pro_right.products-slider-title h3,
            h1,h2,h3,h4,h5,h6,
            .widget_ostore_single_category_products_widget_area .title-bg a,
            .site-branding a,
            .discount-info span.discount-info_small_txt,
            .widget-title span,
            section.widget_ostore_pro_category_collection_widget_area .title-bg ul li a,
            .title-bg ul li a,
            .ostore-hot-deal .title-bg a,
            .our-clients .hr-title span,
            .ostore-item-title a,
            .woocommerce div.product .product_title,
            .woocommerce-tabs .panel h2:first-of-type,
            .woocommerce div.product .woocommerce-tabs ul.tabs li a,
            h2.woocommerce-Reviews-title span,
            .woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a,
            .widget_tab_widget_area ul li a,
            .ostore-hot-deal .item-title a
                {
                    font-family: $primary_font;
                }\n";
        }

        

        /*************************************************************
         *               Paragraphy fonts size
         *********************************************************/
        /*  p font style */
        if( !empty( $font_size ) ){        
            $custom_css .= "
            body,
            p,
            section.widget_product_categories ul li a,
            .caption-content span,
            .nivo-caption .btn,
            .title-bg p.pull-right,
            .woocommerce a.button,
            .woocommerce-Price-amount,
            .entry-meta-data span a,
            .new-product p.ostore-hot-deal-desc, 
            .ostore-hot-deal .title-bg p, 
            .our-clients p.ostore-hot-deal-desc,
            .entry-meta-data span.author,
            .entry-meta-data span.date,
            .discount-info span.discount-info_shadow_txt,
            .tagcloud a,
            span.page-numbers.current,
            span.comment-author-link
            {
                font-size: $font_size
            }\n";
        }

        /*************************************************************
         *               H1 Style
         *********************************************************/
        /*  h1 font style */
        if( !empty( $h1_font_size ) ){        
            $custom_css .= "
            h1,
            .site-branding h1.site-title,
            .error-page h1,
            .banner_content .banner_item-v1 .item h1,
             h1.recent-single-heading,
             .archive .blog_post h1.page-title,
             .discount-info span.discount-info_small_txt,
             .woocommerce div.product .product_title
            {
                font-size: $h1_font_size !important;
                font-weight:$h1_font_weight;
            }\n";
        }

        /*************************************************************
         *               H2 Style
         *********************************************************/
        /*  h1 font style */
        if( !empty( $h2_font_size ) ){        
            $custom_css .= "
            h2,
            .woocommerce h2,
            .widget-area h2.widget-title,
            .woocommerce-tabs .panel h2:first-of-type,
            .ypop-wrapper .ypop-content h2,
            h2.screen-reader-text,
            .comments-area h2,
            .woocommerce h2
            {
                font-size: $h2_font_size !important;
                font-weight:$h2_font_weight;
            }\n";
        }


        /*************************************************************
         *               H3 Style
         *********************************************************/
        /*  h3 font style */
        if( !empty( $h3_font_size ) ){        
            $custom_css .= "
            h3,
            h3.entry-title,
            header .header-wrap-2 .top-links li > .cart_item .process h3.tick,
            .product .pro_add h3,
            .product figure:hover h3,
            .main_blog h3,
            .payment_process .process h3 ,
            .blog-detail_text h3,
            h3.comment-reply-title,
            .item-title h3,
            .woocommerce h2,
            .blog_post .hr-title span,
            .new-product .hr-title span,
            .title-bg ul li a,
            .our-clients .hr-title span,
            section#ostore_category_collection_widget_area-2
            {
                font-size: $h3_font_size;
                font-weight:$h3_font_weight;
            }\n";
        }

        /*************************************************************
         *               H4 Style
         *********************************************************/
        /*  h4 font style */
        if( !empty( $h4_font_size ) ){        
            $custom_css .= "
            h4,
            footer h4.widget-title
            {
                font-size: $h4_font_size;
                font-weight:$h4_font_weight;
            }\n";
        }

        /*************************************************************
         *               H5 Style
         *********************************************************/
        /*  h5 font style */
        if( !empty( $h5_font_size ) ){        
            $custom_css .= "
            h5{
                font-size: $h5_font_size;
                font-weight:$h5_font_weight;
            }\n";
        }

        /*************************************************************
         *               H6 Style
         *********************************************************/
        /*  h6 font style */
        if( !empty( $h6_font_size ) ){        
            $custom_css .= "
            h6{
                font-size: $h6_font_size;
                font-weight:$h6_font_weight;
            }\n";
        }

        /*************************************************************
         *              Color Options
         *********************************************************/

         /*************************************************************
         *              Primary Color
         *********************************************************/
        /*  theme primary background color */
        if( !empty( $theme_primary_color ) ){        
            $custom_css .= "
            .entry-more,
            nav.woocommerce-pagination.stick a.page-numbers,
            button.button.subscribe,
            a.totop,
            #search button,
            .comment-form input[type='submit'],
            .section-title:after,
            .woocommerce ul.products li.product .button,
            .add-to-cart-mt:hover,
            .add-to-cart-mt,
            .pr-button .mt-button a:hover,
            .btn-blue,
            .ostore-service-box .front,
            .view,
            .current,
            .navigation .nav-links a:hover, 
            .navigation .nav-links a:focus,
            .ostore_pro_hlp_actions a i:hover,
            .woocommerce nav.woocommerce-pagination ul li a:hover,
            .add-to-cart-mt-1,
            .slider-items-products .owl-buttons a,
            .flex-direction-nav a, 
            .nivo-directionNav a,
            .title-bg,
            h1.recent-single-heading,
            .woocommerce div.product .woocommerce-tabs ul.tabs li,
            .woocommerce button.button.alt,
            .woocommerce a.button.alt:hover,
            .woocommerce-cart .woocommerce table.shop_table.cart tr td.actions input[type=submit],
            .navbar,
            .nivo-directionNav a.nivo-nextNav,
            .nivo-directionNav a.nivo-prevNav,
            .mt-button.add_to_wishlist-1, .mt-button.add_to_wishlist, .mt-button.add_to_compare, .mt-button.quick-view,
            .product-thumbnail:hover button.add-to-cart-mt,
            .add-cart button,
            .footer-coppyright,
            .top-cart-contain a.js-prevent sup, .wishlist-wrapper .quick-wishlist sup, .top_add_cart.pull-right sup,
            .navbar-nav > li:hover .sub-menu,
            .service .service-item .icon i:hover,
            .widget_tab_widget_area ul li,
            .home .top-cart-content .woocommerce a.button, 
            .top-cart-content .woocommerce a.button,
            .widget-area .searchform input#searchsubmit,
            .gridlist-toggle a.active,
            .quantity-spinner.quantity-up, 
            .quantity-spinner.quantity-down,
            body.woocommerce-cart .woocommerce .cart .button,
            body.woocommerce-cart .woocommerce a.button.wc-forward
            {
                background-color: $theme_primary_color;
            }\n";
        }

        /*  border section */
        if( !empty( $theme_primary_color ) ){        
            $custom_css .= "
            .form-control:focus,
            .woocommerce a.button.wc-forward,
            .woocommerce a.button.checkout,
            .pagination-area ul li a:hover, 
            .pagination-area ul li a.current,
            .woocommerce-info,
            .cross-sells h2, 
            .cart_totals h2, 
            .woocommerce-billing-fields h3, 
            .woocommerce-shipping-fields h3, 
            #order_review_heading, .upsells h2,
            .title-bg ul li a,
            .related h2, 
            .woocommerce-account .woocommerce h2,
            .woocommerce-additional-fields h3,
            .woocommerce-additional-fields h3,
            .woocommerce-Address-title h3,
            .widget-area .widget .widget-title,
            .woocommerce #respond input#submit, 
            .woocommerce a.button, 
            .woocommerce button.button, 
            .woocommerce input.button,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
            .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
            .woocommerce-account .woocommerce-MyAccount-content,
            .team-details .social-icons li a,
            .blog-posts .post-item .entry-more a,
            .blog-posts .post-item .entry-more a:hover,
            .wishlist_table td.product-name a.button,
            .woocommerce-message,
            .woocommerce div.product .woocommerce-tabs ul.tabs:before,
            .hove-style-box.mtmegamenu ul>li.current-menu-item, 
            .hove-style-box.mtmegamenu ul>li:hover,
            .top-cart-content .block-subtitle,
            .service .service-item .icon i,
            #hot-deals-slider .owl-buttons a:hover,
            .title-bg,
            .owl-page,
            .owl-page.active{
                border-color: $theme_primary_color;
            }\n";
        }

        /*  theme primary color */
        if( !empty( $theme_primary_color ) ){        
            $custom_css .= "
            
            #yith-quick-view-content .product_meta a, 
            #yith-quick-view-content .product_meta .sku, 
            .single-product.woocommerce div.product .product_meta a, 
            .single-product.woocommerce div.product .product_meta .sku,
            .woocommerce-tabs .panel h2:first-of-type,
            .woocommerce-tabs.wc-tabs-wrapper ul li a,
            .woocommerce-Tabs-panel--description ul li:before,
            .woocommerce-Tabs-panel--description ul li,
            .page-template-v4 header nav li a ,
            .item_pro span.price,
            .product_add .product_add_item2 .product_text h6 a,
            .product_add .product_add_item2 .product_text span.price,
            .single-box h2,
            h3.entry-title a,
            .widget-area h2.widget-title,
            .page-title, #right-sidebar .col-md-3,
            h1.entry-title,
            .page-title h1,
            h3.comment-reply-title,
            .wishlist-wrapper a.quick-wishlist .fa,
            .top-cart-contain i.fa.fa-shopping-cart,
            .woocommerce-breadcrumb a,
            .woocommerce .woocommerce-ordering select,
            ul.quickinfo li:hover,
            .comment-metadata a:hover, 
            .comment-metadata a:focus,
            h3.entry-title a:hover,
            .sidebar-widget ul li a:hover,
            i.fa.fa-search.form-control-feedback,
            .ostore_pro_hlp_des h2 a,
            .home-testimonials strong.name,
            .quickinfo_main ul li a:hover,
            .logo.site-title  a,
            .has-feedback label~.form-control-feedback,
            .ostore-item-title h4,
            .woocommerce-breadcrumb a:hover, 

            .yith-woocompare-widget .compare:hover, 
            .yith-woocompare-widget .clear-all:hover,
            .single-product .yith-wcwl-wishlistexistsbrowse.show a:hover, 
            .single-product .entry-summary .compare.button:hover, 
            .single-product .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover,
            .top-cart-content .block-subtitle,
            .widget .widget-title,
            .woocommerce h2,
            .item-title h3 a,
            .site-title a, .site-description,
            .single-text h3,
            div.ostore-item-title a,
            blog_post .hr-title span,
            .ostore-hot-deal .item-title a,
            .woocommerce div.product span.price,
            div.heading-left h4.section-title,
            .default_list_style .entry-title a,
            .title-bg ul.ui-tabs-nav.ui-helper-reset.ui-helper-clearfix.ui-widget-header.ui-corner-all li.active a,
            .our-clients .hr-title span
            {
                color: $theme_primary_color;
            }\n";
        }

        /*  theme primary color */
        if( !empty( $theme_primary_color ) ){        
            $custom_css .= "
            .title-bg .ui-tabs-nav:after{
                border-right:47px solid $theme_primary_color !important;
            }\n";
        }
        
        
        /*************************************************************
         *              Secondary Color
         *************************************************************/

         //Background color
        if( !empty( $secondary_primary_color ) ){        
            $custom_css .= "
            
            .woocommerce button.button:hover,
            .tagcloud a:hover,
            .widget.widget_tag_cloud a:hover,
            .woocommerce nav.woocommerce-pagination ul li span.current,
            section.single-product div.product-slider .woocommerce a.button,
            .widget_tab_widget_area ul li.active,
            slider-items-products .owl-buttons a,
            .service .service-item,
            .slider-items-products .owl-buttons a:hover,
            .slider-items-products .owl-buttons a:hover
            {
                background-color: $secondary_primary_color;
            }\n";
        }

        //color Options
        if( !empty( $secondary_primary_color ) ){        
            $custom_css .= "
            
            .widget-area .widget ul li a:hover,
            h3.entry-title a:hover,
            #primary-menu ul li:hover > a, 
            #primary-menu ul li.current_page_item > a,
            h3.entry-title a:hover
            {
                color: $secondary_primary_color;
            }\n";
        }

        //Border Color
        if( !empty( $secondary_primary_color ) ){        
            $custom_css .= "
            
            h3.entry-title a:hover,
            .slider-items-products .owl-buttons a:hover,
            .slider-items-products .owl-buttons a:hover
            {
                border-color: $secondary_primary_color;
            }\n";
        }

        
        /****************************************************************
         *                  Theme Color
         ***************************************************************/
        /*  theme color options */
        if( !empty( $theme_background_color ) ){        
            $custom_css .= "
            div#page{
                background: $theme_background_color;
            }\n";
        }

        /*********************************************************************
         *                             Footer Color
         ********************************************************************/
        /*  footer background color options */
        if( !empty( $ostore_pro_top_footer_color ) ){        
            $custom_css .= "
            footer{
                background: $ostore_pro_top_footer_color;
            }\n";
        }

        /*  footer text color and hover */
        if( !empty( $ostore_pro_mid_footer_color ) ){        
            $custom_css .= "
            footer.ostore-footer .widget ul li a,
            footer .widget-title span{
                color: $ostore_pro_mid_footer_color;
            }\n";
        }
        
        /******************************************************************** */
        
        wp_add_inline_style( 'ostore-style', $custom_css );
    }

}
Popular_Ecommerce_Custom_Style::getInstance();