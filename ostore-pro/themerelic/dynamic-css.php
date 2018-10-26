<?php
/**
 * Dynamic css
*/
if ( ! function_exists( 'ostore_pro_dynamic_css' ) ) {
    function ostore_pro_dynamic_css() {
        
        $theme_color    = get_theme_mod('ostore_pro_pro_primary_color', '#1ccca9');
        $secondry_color = get_theme_mod('ostore_pro_pro_secondry_color', '#c2185b');

        $top_footer_color = get_theme_mod('ostore_pro_top_footer_color', 'rgba(0, 0, 0, 0.75)');
        $buttom_footer_color = get_theme_mod('ostore_pro_mid_footer_color', 'rgb(51, 51, 51)');

        $ostore_pro_pro_colors = '';



        /**
         * Footer Color
        */         
        $ostore_pro_pro_colors .= "
        .footer-newsletter{
            background-color: $top_footer_color !important;
        }\n";

        $ostore_pro_pro_colors .= "
        .ostore-footer{
            background-color: $buttom_footer_color !important;
        }\n";

        
        /**
         * Background Color
        */         
        $ostore_pro_pro_colors .= "
        .entry-more a,
        h2.widget-title,
        .ostore-recent-btn,
        .widget.widget_tag_cloud a:hover,
        button.button.subscribe,
        a.totop,
        .ostore-entry-meta-data,
        #search button,
        .comment-form input[type='submit'],
        .section-title:after,
        .woocommerce ul.products li.product .button,
        .add-to-cart-mt:hover,
        .add-to-cart-mt,
        .pr-button .mt-button a:hover,
        .ostore-bottom-banner-img .shop-now-btn,
        .btn-blue,
        .ostore-service-box .front,
        ul.tab-nav:not(.tab-nav-lg) li.active a,
        .view,
        .woocommerce a.remove,
        .current,
        .navigation .nav-links a:hover, 
        .navigation .nav-links a:focus,
        .ostore-hlp-box-timer,
        .ostore_pro_hlp_actions a i:hover,
        .timer-grid .day.box-time-date,
        .woocommerce nav.woocommerce-pagination ul li a:hover,
        .add-to-cart-mt-1,
        .slider-items-products .owl-buttons a,
        .toolbar,
        .flex-direction-nav a, 
        .nivo-directionNav a,
        .title-bg,
        h1.recent-single-heading,



        .woocommerce div.product .woocommerce-tabs ul.tabs li,
        .woocommerce button.button.alt:hover,
        .woocommerce a.button.alt:hover,
	.woocommerce-cart .woocommerce table.shop_table.cart tr td.actions input[type=submit]
        {
            background-color: $theme_color !important;
        }\n";

        /**
         * Background Color
        */         
        $ostore_pro_pro_colors .= "

        .woocommerce a.button.wc-forward,
        .woocommerce a.button.checkout,
        .woocommerce .widget_shopping_cart .cart_list li a.remove:hover,
        .footer_logo:after,
        .pr-button .mt-button a:hover,
        .toolbar .gridlist-toggle a.active, 
        .toolbar .gridlist-toggle a:hover,
        .toolbar .gridlist-toggle a,
        .pagination-area ul li > .current,
        .pagination-area ul li a:hover, 
        .pagination-area ul li a.current,
        .calendar_wrap caption,

        nav.navigation.pagination.stick .current,

        .woocommerce #respond input#submit, 
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button,

        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, 
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt,

        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,

        .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
        {
            background-color: $theme_color !important;
        }\n";

        /**
         * Background & Border Important css
        */
        $ostore_pro_pro_colors .= "
        .widget-area .widget .widget-title,
        .yith-woocompare-widget .compare, 
        .yith-woocompare-widget .clear-all,

        .woocommerce div.product .woocommerce-tabs ul.tabs li:hover, 
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active
        nav.navigation.pagination.stick .current,{
            background-color: $theme_color !important;
        }\n";

        // Border
        $ostore_pro_pro_colors .= "
        .woocommerce .quantity .qty,
        button.button.subscribe,
        .comment-form input[type='submit'],
        .comment-list .reply a:hover, 
        .comment-list .reply a:focus,
        .ostore-recent-btn:hover,
        .ostore-recent-btn,
        .woocommerce nav.woocommerce-pagination ul,
        .woocommerce .woocommerce-ordering select,
        .ostore-bottom-banner-img .shop-now-btn,
        .navigation .nav-links a,
        .navigation .nav-links > span,
        .ostore_pro_hlp_actions a i:hover,
        .timer-grid .day.box-time-date,
        .add-to-cart-mt-1,
        .slider-items-products .owl-buttons a,
        .title-bg,



        .yith-woocompare-widget .compare, 
        .yith-woocompare-widget .clear-all,
        .yith-woocompare-widget .compare:hover, 
        .yith-woocompare-widget .clear-all:hover{
            border-color: $theme_color !important;
        }\n";

        $ostore_pro_pro_colors .= "
        .ui-tabs-nav:after,
        .ui-tabs-nav li{
            border-right-color:   $theme_color !important;
        }\n";

        // Color
        $ostore_pro_pro_colors .= "
        .home-nav-tabs>li.active>a, 
        .home-nav-tabs>li>a:hover,
        #primary-menu ul li:hover > a, 
        #primary-menu ul li.current_page_item > a,
        .woocommerce .woocommerce-ordering select,
        ul.quickinfo li:hover,
        .comment-metadata a:hover, 
        .comment-metadata a:focus,
        h3.entry-title a:hover,
        .sidebar-widget ul li a:hover,
        i.fa.fa-search.form-control-feedback,
        .ostore_pro_hlp_des h2 a:hover,
        .home-testimonials strong.name,
        .quickinfo_main ul li a:hover,
        .logo.site-title  a,
        .has-feedback label~.form-control-feedback,
        .ostore-item-title h4:hover,
        .woocommerce-breadcrumb a:hover, 

        .yith-woocompare-widget .compare:hover, 
        .yith-woocompare-widget .clear-all:hover,
        .single-product .yith-wcwl-wishlistexistsbrowse.show a:hover, 
        .single-product .entry-summary .compare.button:hover, 
        .single-product .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover,
        .price,
        .top-cart-content .block-subtitle{
            color: $theme_color !important;
        }\n";

        $ostore_pro_pro_colors .= "
        
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
        .top-cart-content .block-subtitle{
            border-color: $theme_color;
        }\n";

        /**
         * Main Menu Border Button Only
        */
        $ostore_pro_pro_colors .= "
        .hove-style-underline.mtmegamenu ul>li.current-menu-item,
        .hove-style-underline.mtmegamenu ul>li:hover,
        .mtmegamenu ul ul.sub-menu li:last-child, 
        .mtmegamenu ul ul ul li:last-child, 
        .mtmegamenu ul ul.children li:last-child,
        .header-five .mtmegamenu ul li.current-menu-item a{
            border-bottom: 2px solid $theme_color;
        }\n";

        /**
         * Tab Boter Color Only
        */
        $ostore_pro_pro_colors .= "
        .tab_styletwo .home-nav-tabs.home-product-tabs li a:before{
            border-top: 1px solid $theme_color;
            border-bottom: 1px solid $theme_color;
            border-right: 1px solid $theme_color;
            border-left: 1px solid $theme_color;
        }\n";

        /**
         * Text Color
        */
        $ostore_pro_pro_colors .= "
        

        .woocommerce ul.product_list_widget li span.quantity,
        .woocommerce ul.products li.product .price ins, 
        .woocommerce ul.products li.product .price, 
        .woocommerce li.product .price ins, 
        .woocommerce li.product .price,
        .social_menu ul li:hover a,

        .widget a:hover, 
        .widget a:hover::before, 
        .widget li:hover::before,
        .woocommerce-info:before,

        a:hover,

        .woocommerce button.button:hover, 
        .woocommerce input.button:hover,

        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce input.button.alt:hover,

        .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
        .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,
        .woocommerce-MyAccount-content a:hover, 
        .woocommerce-MyAccount-content a:hover,
        .team-details h4,
        .team-details .social-icons li:hover a,
        .wishlist_table td.product-name a.button,
        .woocommerce-message:before,
        .comment-left a:hover, .comment-left a:hover:before,
        .topsocial .social ul.inline-mode li a,
        .headerlinkmenu div.links div a:hover,
        .title_stylethree .page-header h2:after, 
        .title_stylethree .page-header h2:before,
        .tab_stylethree .home-nav-tabs.home-product-tabs>li>a,
        .layout-one .service-area:hover .service-icon i, 
        .layout-one .service-area:hover .service-icon-info p, 
        .layout-one .service-area:hover .service-icon-info h5,
        .divider-icon,
        .woocommerce ul.cart_list li a:hover, 
        .woocommerce ul.product_list_widget li a:hover,
        a.pause-bnt i:hover, 
        a.play-bnt i:hover,
        .news h3 a:hover,
        .news ul li a:hover,
        .mobile-menu .expand,
        .woocommerce ul.products li.product .item-inner .item-info .item-title h3 a:hover,
        .woocommerce .woocommerce-breadcrumb a:hover, 
        .woocommerce .woocommerce-breadcrumb a:hover,
        .testimonial_dreams_sub_content header,
        .headerlinkmenu-four.headerlinkmenu .top-search a:hover,
        .product-item .item-inner .item-info .item-title a:hover,
        .cat-menu-title h3

        {
            color: $theme_color;
        }\n";

        $ostore_pro_pro_colors .= "
        {
            color: $theme_color !important;
        }\n";



        /**
         * Secondry Color Options
        */
        $ostore_pro_pro_colors .= "
        .top-search a:hover,
        .layout-two .service-area:hover .mainservices,
        .advancesearch #search button,
        .cat-menu-title h3:before,
        .mini-cart .basket a:hover .fa-shopping-cart,
        .headerlinkmenu-four.headerlinkmenu .top-search a,
        .woocommerce a.button.wc-forward:hover,
        .woocommerce-product-search input[type='submit']:hover{
            background-color: $secondry_color;
        }\n";


        $ostore_pro_pro_colors .= "
        .bttn,
        .social-shortcode > a,
        .social-shortcode > a:hover,
        .social-shortcode > a:hover:before,
        .widget-area .page-header h2{
            border-color: $theme_color;
        }\n";

        $ostore_pro_pro_colors .= "
        .widget.widget_tag_cloud a:hover,
        {
            background-color: $secondry_color;
        }\n";

        /**
         * Tab Layout Section
        */         
        
        
        $ostore_pro_pro_colors .= "
        .widget.widget_tag_cloud a:hover,
        {
            background-color: $secondry_color;
        }\n";
              
        
        wp_add_inline_style( 'ostore-main-style', $ostore_pro_pro_colors );
    }
}
add_action( 'wp_enqueue_scripts', 'ostore_pro_dynamic_css', 99 );