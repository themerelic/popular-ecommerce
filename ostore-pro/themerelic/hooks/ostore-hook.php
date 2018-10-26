<?php
/**
 * Home Nav Menu
*/
if ( ! function_exists( 'ostore_pro_main_nav_menu' ) ) {    
    function ostore_pro_main_nav_menu() {
        ?>
            <nav id="primary-menu" class="primary-menu style-4 navbar navbar-default" role="navigation"  >
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="container">
          
                    <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation','ostore-pro'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php do_action("ostore_pro_logo_and_description"); ?>
                    
                    <?php if( ostore_pro_is_woocommerce_activated() ): ?>
                    <div class="pull-right">
                        <?php esc_html(ostore_pro_top_wishlist()); ?>
                        <?php do_action('ostore_pro_pro_top_cart'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="collapse navbar-collapse pull-left" id="bs-example-navbar-collapse-1">
                        <?php wp_nav_menu( 
                            array( 'theme_location' => 'menu-1',
                                    'container' => 'ul',
                                    'menu_class'=> 'nav dropdown navbar-nav'
                                ) 
                            ); 
                        ?>
                    </div><!-- /.navbar-collapse -->
              
                </div><!--/.container -->
                </div>
            </nav>
        <?php   
    }
}
add_action( 'ostore_pro_main_nav_menu', 'ostore_pro_main_nav_menu',  2 );


/**
 * Ostore Top Header
 */
 if ( ! function_exists( 'ostore_pro_top_header' ) ) {
	function ostore_pro_top_header() {
		?>
			<div class="header-top">
			  <div class="container">
                <div class="row">
                    <?php 
                    $ostore_pro_top_header_enable1 = get_theme_mod('ostore_pro_top_header_enable');
                    if(!empty( $ostore_pro_top_header_enable1 )): ?>
                    <div class="col-sm-12 col-md-12">
                        <div class="quickinfo_main pull-left hidden-xs">
                            <ul class="quickinfo">
                                <?php
                                    $email_address    = get_theme_mod('ostore_pro_top_header_email');
                                    $phone_number     = get_theme_mod('ostore_pro_top_header_phone_no');
                                    $map_address      = get_theme_mod('ostore_pro_top_header_address');
                                    $shop_open_time   = get_theme_mod('ostore_pro_top_header_time');
                                
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
                        <!-- Top Menu Section -->
                        <div class="headerlinkmenu pull-right">                       
                            <?php if (has_nav_menu('top_menu')) { ?>
                            <div class="quickinfo_main pull-left hidden-xs">
                                <?php wp_nav_menu( 
                                    array( 'theme_location' => 'top_menu',
                                            'container' => 'ul',
                                            'menu_class'=> 'quickinfo'
                                        ) 
                                    ); 
                                ?>
                            </div><?php }else{ ?>
                                <div class="links quickinfo_main">
                                <?php if (is_user_logged_in()) { ?>	
                                    <div class="myaccount">
                                        <a title="<?php esc_html_e("My Account", 'ostore-pro'); ?>" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                            <i class="fa fa-user"></i>
                                            <span ><?php esc_html_e('My Account', 'ostore-pro'); ?></span>
                                        </a>
                                    </div>

                                    <div class="login">
                                        <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                            <i class="fa fa-lock"></i>
                                            <span ><?php esc_html_e('Log Out', 'ostore-pro'); ?></span>
                                        </a>
                                    </div>

                                <?php } else{ ?>

                                <div class="login">
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                            <i class="fa fa-unlock-alt"></i>
                                            <span ><?php esc_html_e('Log In', 'ostore-pro'); ?></span>
                                        </a>
                                    </div>
                                    <div class="login">
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                            <i class="fa fa-user"></i>
                                            <span ><?php esc_html_e('Register', 'ostore-pro'); ?></span>
                                    </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
			    </div>
			  </div>
			</div><!-- End header-top -->
		<?php
	}
}
add_action( 'ostore_pro_top_header', 'ostore_pro_top_header', 15 );


/**
 * Home Client Logo Slide Function Area
*/
if ( ! function_exists( 'ostore_pro_client_logo_slider' ) ) {    
    function ostore_pro_client_logo_slider($name) {
        if($logo_slider_enable = get_theme_mod('logo_slider_on')==true){ ?>
        <section class="our-clients">
            <div class="container">
                <?php 
                $logo_slider_title = get_theme_mod('logo_slider_title');
                $logo_slider_desc = get_theme_mod('logo_slider_short_dec');
                ?>
                <div class="heading">  
                    <?php if(!empty($logo_slider_title)): ?><div class="hr-title ostore-tab-hr-title hr-long center"><span><?php echo esc_html($logo_slider_title); ?></span> </div><?php endif; ?>
                    <?php if(!empty($logo_slider_desc)): ?> <p class="ostore-hot-deal-desc"><?php echo esc_html($logo_slider_desc); ?></p> <?php endif; ?>
                </div>
            <!-- End page header-->
            <div class="slider-items-products logo-slider">
                <div id="our-clients-slider3" class="product-flexslider hidden-buttons"> 
                    <div class="slider-items slider-width-col6"> 
                    <?php  $all_brands_logo =  get_theme_mod('ostore_pro_logo_slider');
                        if(!empty( $all_brands_logo )) {
                            $client_logo_slider = json_decode( $all_brands_logo );
                        
                            foreach($client_logo_slider as $logo){
                        ?>
                            <!-- Item -->
                            <div class="item wow zoomIn"><a href="<?php echo esc_url($logo->brand_logo_url); ?>"><img src="<?php echo esc_url($logo->brand_logo); ?>" class="grayscale"> </div>
                            <!-- End Item --> 
                    
                        <?php }
                    } ?>
                </div>
                </div>
            </div>
            </div>
            </section>
        <?php }  
    }
}
add_action( 'ostore_pro_client_logo', 'ostore_pro_client_logo_slider', 10, 2 );

/**
 * Add Top Cart Header
*/
if ( ! function_exists( 'ostore_pro_logo_description' ) ) {    
    function ostore_pro_logo_description() {
        ?>
        <!-- Header Logo -->
        <div class="logo pull-left">
            <?php the_custom_logo(); ?>
            <div class="logo site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                <?php
                $description = get_bloginfo( 'description', 'display' ); ?>
                <p class="site-description"><?php echo esc_html($description);  ?></p>
            </div>
        </div>

        <?php if (get_header_image()) : ?>
        <div class="header-image">
            <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
        </div>
        <?php endif; ?> 

        <!-- End Header Logo --> 
        <?php
    }
}
add_action( 'ostore_pro_logo_and_description', 'ostore_pro_logo_description');


/**
 * Add Top Search Form
*/
if ( ! function_exists( 'ostore_pro_top_search_bar' ) ) {    
    function ostore_pro_top_search_bar() {
        ?>
        <!-- Search -->
        <div class="top-search">
            <div id="search">
                <form role="search"  method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="<?php echo esc_html_e( 'Search', 'ostore-pro' ) ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
                        <button type="button" class="btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Search -->  
    <?php
    }
}
add_action( 'ostore_pro_header_search_bar', 'ostore_pro_top_search_bar');


/**
*   Home Slider
*/
if ( ! function_exists( 'ostore_pro_home_slider' ) ) {    
    function ostore_pro_home_slider($name) {
        /*
        * Home page slider
        */
        if( get_theme_mod('ostore_pro_slider_enable', null) ) : 
            $slider_category = get_theme_mod('ostore_pro_slider_category', null);
            $number_slider_post = get_theme_mod('slider_post_count', 1);
            if( $slider_category != null ) :
            $args = array(
                'post_type'   => 'post',
                'post_count'  => -1,
                'posts_per_page'=> $number_slider_post,
                'category_name'  => $slider_category
            );
            $slider = new WP_Query( $args );
            $slider_style = get_theme_mod('ostore_pro_slider_style','default');
            
        ?>
            <div class="slider">
                <div class="row" style="margin:0px !important;">
                    <?php if($slider_style=="left"){ 
                        do_action('ostore_pro_slider_category'); 
                    }  ?>
                
                <!--End cat -->
                
                <?php 
                //Category First
                $slider_cat_1_name = get_theme_mod('ostore_pro_woo_category_1');
                //Category Second  or ()
                $slider_cat_2_name = get_theme_mod('ostore_pro_woo_category_2');

                if($slider_style=='default'  ){
                    $slider_row_class = "col-md-12 fullslider";
                    $slider_row_margin = "margin:0px !important;";
                }elseif(empty($slider_cat_1_name) or empty($slider_cat_2_name)){
                    $slider_row_class = "col-md-12 fullslider";
                    $slider_row_margin = "margin:0px !important;";
                }else{
                    $slider_row_class = "col-md-9 slide-sidebar";
                    $slider_row_margin = "";
                }

                ?>
                <div class="<?php echo esc_attr($slider_row_class); ?>" style="<?php echo esc_attr($slider_row_margin); ?>">
                    <div class="flexslider ma-nivoslider ">
                        <div id="os-inivoslider-banner" class="slides ">
                        <?php 
                            if ( $slider->have_posts() ) {
                            while ( $slider->have_posts() ) {
                                $slider->the_post();
                                if ( has_post_thumbnail() && $slider_style=='default'):
                                    the_post_thumbnail('slider-image', array( 'class' => 'img-responsive slider-image', 'title' => '#banner7-caption'. get_the_ID() ));
                                elseif(has_post_thumbnail() && ($slider_style=='left' OR $slider_style=='right' )):
                                    the_post_thumbnail('slider-widget', array( 'class' => 'img-responsive slider-widget', 'title' => '#banner7-caption'. get_the_ID() ));
                                endif;     
                            ?>
                        <?php } } wp_reset_postdata();  ?>
                        </div>
                        <?php
                        if ( $slider->have_posts() ) {
                            while ( $slider->have_posts() ) {
                                $slider->the_post();
                                if ( has_post_thumbnail()):
                                ?>
                                <div id="banner7-caption<?php echo get_the_ID(); ?>" class="banner7-caption nivo-html-caption nivo-caption">
                                <div class="timethai"></div>
                                <div class="banner7-content slider-<?php echo get_the_ID(); ?>">
                                <div class="slide-caption">
                                <div class="caption-content">
                                            <h2 class="animated fadeInDown"><?php the_title(); ?></h2>
                                            <span class="animated fadeInDown hidden-xs"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></span>
                                            <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-blue btn-effect"><?php esc_html_e('View Collection','ostore-pro'); ?></a>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                            <?php endif;
                            }} ?>
                    <!-- /.flexslider --> 
                    </div>  
                </div>
        
                <!-- <div class="col-md-12"> -->
                <?php if($slider_style=="right"){ 
                    do_action('ostore_pro_slider_category'); 
                } ?>
                </div>
                </div>
                <!--End cat -->
          
          <?php  endif ; 
         endif;    
    }
}
add_action( 'ostore_pro_main_slider', 'ostore_pro_home_slider', 10, 2 );

/**
 * Home Slider Left and Right Category Show
*/
if ( ! function_exists( 'ostore_pro_home_slider_cat' ) ) {    
    function ostore_pro_home_slider_cat($name) {

            //Category First
            $slider_cat_1_name = get_theme_mod('ostore_pro_woo_category_1');
            //Category Second
            $slider_cat_2_name = get_theme_mod('ostore_pro_woo_category_2');
            

        if(!empty($slider_cat_1_name) && !empty($slider_cat_2_name) ){ 
        ?>
        <!--Start Cat-->
        <div class="col-md-3 col-sm-12 " style="margin:0px !important;">
            <div class="row">
                <?php
                    if( ($slider_cat_1_name) !='' ){
                        $category = get_term_by( 'slug', $slider_cat_1_name, 'product_cat' );
                        $slider_1_cat_id = $category->term_id;
                        $thumbnail_id = get_woocommerce_term_meta( $slider_1_cat_id, 'thumbnail_id', true );
                        $slider_2_image = wp_get_attachment_url($thumbnail_id);
                        $slider_cat_1_url = get_term_link($slider_1_cat_id, 'product_cat');
                    }else{
                        $category = null;
                        $slider_cat_1_url = "";
                        $slider_2_image = "//via.placeholder.com/450x250";
                    }
                ?>
                <div class="col-md-12 col-sm-6" >
                    <a href="<?php echo esc_url($slider_cat_1_url);  ?>" class="ostore-bottom-banner-img">
                        <div class="overimg"> 
                        <img src="<?php echo esc_url($slider_2_image);   ?>" alt="" style="display:block;overflow:hidden; " />
                        </div>
                        <span class="ostore-banner-overly"></span>
                        <div class="bottom-img-info">
                            <h3><?php echo wp_kses_post($slider_cat_1_name); ?></h3>
                            <h6><?php echo wp_kses_post(substr(category_description($slider_1_cat_id),0,40)); ?></h6>
                            <span class="shop-now-btn"><?php esc_html_e('View more','ostore-pro'); ?></span> 
                        </div>
                    </a>
                </div>
                <!-- Second Category -->
                    <?php
                    if( ($slider_cat_2_name) != ""){
                        $slider_category_2 = get_term_by( 'slug', $slider_cat_2_name, 'product_cat' );
                        $slider_2_cat_id = $slider_category_2->term_id;
                        $thumbnail_id = get_woocommerce_term_meta( $slider_2_cat_id, 'thumbnail_id', true );
                        $slider_2_image = wp_get_attachment_url($thumbnail_id);
                        $slider_cat_2_url = get_term_link($slider_2_cat_id, 'product_cat');
                    }else{
                        $slider_category_2 = null;
                        $slider_cat_2_url = "";
                        $slider_2_image =  "//via.placeholder.com/450x250";

                    }
                    ?>
                    <div class="col-md-12 col-sm-6 " >
                        <a href="<?php echo esc_url($slider_cat_2_url);  ?>" class="ostore-bottom-banner-img">
                            <div class="overimg"> 
                            <img src="<?php echo esc_url($slider_2_image);   ?>" class="slider-cat-2-img" alt="" style=" " />
                            </div>
                            <span class="ostore-banner-overly"></span>
                            <div class="bottom-img-info">
                                <h3><?php echo wp_kses_post($slider_cat_2_name); ?></h3>
                                <h6><?php echo wp_kses_post(substr(category_description($slider_2_cat_id),0,40)); ?></h6>
                                <span class="shop-now-btn"><?php esc_html_e('View more','ostore-pro'); ?></span> 
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php }
    }
}
add_action( 'ostore_pro_slider_category', 'ostore_pro_home_slider_cat' );


/**
 * Home Page HLP Product Hot Deal Product
*/
if ( ! function_exists( 'ostore_pro_hlp_hot_deal' ) ) {    
    function ostore_pro_hlp_hot_deal($hot_deal_product_args) {
         ?>
         <div class="col-md-4 col-sm-6 col-lg-4">
         <div <?php post_class('panel_product ostore-hlp-panel-products'); ?> >
             <h2 class="ostore_pro_hlp_title"><?php esc_html_e('Hot Deals','ostore-pro'); ?></h2>
         
             <div class="ostore-slider-items-products">                        
                 <div id="hot-deals-slider" class="hot-deals-slider ">                        
                 <div class="slider-items slider-width-col3"> 
                 
                 <?php
                     $hot_deal_query = new WP_Query( $hot_deal_product_args );
                     if( $hot_deal_query->have_posts() ) {  while( $hot_deal_query->have_posts() ) { $hot_deal_query->the_post();
                 ?>
                 <div class="product-item">
                         <div class="item-inner fadeInUp">
                         <div class="product-thumbnail">
                             <div class="icon-hot-label hot-left"><?php esc_html_e('Hot','ostore-pro'); ?></div>
                             <div class="pr-img-area"> <a href="<?php echo esc_url(get_the_permalink()); ?>">
                             <figure>
                                 <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                 <?php if(has_post_thumbnail()){echo get_the_post_thumbnail(get_the_ID(), 'shop_catalog', array( 'class' => 'first-img' ) ); }else{ echo '<img src="http://via.placeholder.com/300x300&text=No%20Image%20">'; } ?> 
                                 </a>
                             </figure>
                             </a>
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
                             <div class="add-to-cart">
                                <button type="button" class="add-to-cart-mt"><span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                            </div>
                             
                             </div>
                         </div><div class="ostore-hlp-box-timer">
                             <?php
                                 $product_id = get_the_ID();
                                 $sale_price_dates_to    = ( $date = get_post_meta( $product_id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';
                                 $price_sale = get_post_meta( $product_id, '_sale_price', true );
                                 $date = date_create($sale_price_dates_to);
                                 $new_date = date_format($date,"Y/m/d H:i");
                             //if(!empty( $sale_price_dates_to ) ) { if(!empty( $price_sale) ) {
                         ?>
                                 <div class="ostore-hlp-box-timer pcountdown-cnt-list-slider">
                                 <div class="countbox_1 ostore-hlp-timer-grid  countdown_<?php echo esc_attr($product_id); ?>">
                                     <div class="day box-time-date"><span class="days">00</span><?php esc_html_e('Days','ostore-pro'); ?></div>
                                     <div class="hour box-time-date"><span class="hours">00</span><?php esc_html_e('Hours','ostore-pro'); ?></div>
                                     <div class="min box-time-date"><span class="minutes">00</span><?php esc_html_e('Mins','ostore-pro'); ?></div>
                                     <div class="sec box-time-date"><span class="seconds">00</span><?php esc_html_e('Secs','ostore-pro'); ?></div>
                                 </div>
                             </div>
                             <script type="text/javascript">
                                 jQuery(document).ready(function($) {
                                     setTimeout(function(){
                                         $(".countdown_<?php echo esc_attr($product_id); ?>").countdown({
                                             date: "<?php echo esc_attr($new_date); ?>",
                                             offset: -8,
                                             day: "Day",
                                             days: "Days"
                                         }, function () {
                                             console.log( "done")
                                             // alert("Done!");
                                         });
                                     })
                                     
                                 }, 900);
                             </script>
                         <?php //} } ?>
                         </div>
                         <div class="ostore-hlp-item-info">
                         
                             <div class="info-inner">
                             <div class="ostore-item-title"> <a title="<?php echo wp_kses_post(get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php  echo wp_kses_post(get_the_title()); ?></a> </div>
                             <div class="item-content">
                                 <div class="rating">
                                     <span>
                                         <?php 
                                             get_star_rating()?>
                                     </span>  
                                 </div>
                                 <div class="item-price">
                                 <div class="price-box"> <span class="regular-price"> <span class="price"><?php woocommerce_template_loop_price(); ?></span> </span> </div>
                                 </div>
                             </div>
                             </div>
                         </div>
                         </div>
                 </div>
                 <?php }} ?> 
                 </div>
                 </div>
             </div>
             </div>
         
         </div><!-- End of Hot Deal Product -->
    <?php }
}
add_action( 'ostore_pro_hlp_hot_deal_product', 'ostore_pro_hlp_hot_deal',10,2 );





/**
 * Home Slider Left and Right Category Show
*/
if ( ! function_exists( 'ostore_pro_recent_blog_slider' ) ) {    
    function ostore_pro_recent_blog_slider() {
         ?>
         <!-- Related Posts -->
         <div class="single-box">
           <h2><?php esc_html_e('Releated Post','ostore-pro'); ?></h2>
           <div class="slider-items-products">
             <div id="related-posts" class="product-flexslider hidden-buttons">
               <div class="slider-items slider-width-col4 fadeInUp">
               <?php 
                   $args = array( 'post_status'=>'publish', 'numberposts' => '5', 'tax_query' => array(
                           array(
                               'taxonomy' => 'post_format',
                               'field' => 'slug',
                               'terms' => 'post-format-aside',
                               'operator' => 'NOT IN'
                           ), 
                           array(
                               'taxonomy' => 'post_format',
                               'field' => 'slug',
                               'terms' => 'post-format-image',
                                'operator' => 'NOT IN'
                           )
                   ) );
                   $recent_posts = wp_get_recent_posts( $args );
                   foreach( $recent_posts as $recent ){
               ?>
               <div class="product-item">
               <article class="entry">
                 <div class="entry-thumb image-hover2"> <a href="<?php echo esc_url(get_permalink(intval($recent['ID']))); ?>"> <img src="<?php echo esc_url(get_the_post_thumbnail_url(intval($recent["ID"]))); ?>" > </a> </div>
                 <div class="entry-info">
                   <h3 class="entry-title"><a href="<?php echo esc_url(get_permalink(intval($recent['ID']))); ?>"><?php echo esc_html($recent["post_title"]); ?></a></h3>
                   <div class="entry-meta-data"> 
                       <span class="comment-count">
                           <a href="<?php echo esc_url(get_comments_link(intval($recent['ID'])) ); ?>"> 
                           <i class="fa fa-comment-o">&nbsp;</i>
                               <?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'ostore-pro'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?>
                            </a>
                        </span>
                        <span class="date"> <i class="fa fa-calendar">&nbsp;</i><?php  $cpost=get_post(intval($recent["ID"])); echo esc_html(date(get_option('date_format'), strtotime($cpost->post_date)));  ?></span>
                    </div>
                   <div class="ostore-recent-entry-more"> <a href="<?php echo esc_url(get_permalink(intval($recent['ID']))); ?>" class="ostore-recent-btn"><?php esc_html_e('Read more','ostore-pro'); ?></a> </div>
                 </div>
               </article>
             </div>
                   <?php } 
                       wp_reset_query();
                   ?>
                 
               </div>
             </div>
           </div>
         </div>
         <!-- ./Related Posts --> 
        <?php }
    }
    add_action( 'ostore_pro_recent_blog', 'ostore_pro_recent_blog_slider' );


/**
 * Footer Copyright section
*/
if ( ! function_exists( 'ostore_pro_footer_copyright' ) ) {    
    function ostore_pro_footer_copyright() {
            $footer_copyright_content = get_theme_mod('ostore_pro_footer_copyright_section',' Theme: Popular ECommerce By ThemeRelic.');
           
           ?>
            <div class="col-sm-5 col-xs-12 coppyright">
                <?php echo wp_kses_post( $footer_copyright_content ); ?>
            </div>
            <?php 
    }
}
add_action( 'ostore_pro_footer_copyright_section', 'ostore_pro_footer_copyright');






/**
 * Ostore  Social Links
 */
 if ( ! function_exists( 'ostore_pro_social_links' ) ) {
	function ostore_pro_social_links( $service_icon = null, $service_title = null, $service_desc = null ) {	
    $facebook_url = get_theme_mod('facebook_url');
    $googleplus_url = get_theme_mod('google_plus');
    $twitter_url = get_theme_mod('twitter_url');
    $rss_url = get_theme_mod('rss_url');
    $linkedin_url = get_theme_mod('linkedin_url');
    $instagram = get_theme_mod('instagram_url');
    ?>
    <ul class="inline-mode">
        <?php if(!empty( $facebook_url) ) { ?><li class="social-network fb"><a title="<?php esc_attr('Connect us on Facebook','ostore-pro') ?>" target="_blank" href="<?php echo esc_url($facebook_url);  ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
        <?php if(!empty( $googleplus_url) ) { ?><li class="social-network googleplus"><a title="<?php esc_attr('Connect us on Google+','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($googleplus_url); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
        <?php if(!empty( $twitter_url) ) { ?><li class="social-network tw"><a title="<?php esc_attr('Connect us on Twitter','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($twitter_url);  ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
        <?php if(!empty( $rss_url) ) { ?><li class="social-network rss"><a title="<?php esc_attr('Connect us on Instagram','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($rss_url);  ?>"><i class="fa fa-rss"></i></a></li><?php } ?>
        <?php if(!empty( $linkedin_url) ) { ?><li class="social-network linkedin"><a title="<?php esc_attr('Connect us on Linkedin','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
        <?php if(!empty( $instagram) ) { ?><li class="social-network instagram"><a title="<?php esc_attr('Connect us on Instagram','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($instagram);  ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
    </ul>    
	<?php 
	}
}
add_action( 'ostore_pro_footer_social_links', 'ostore_pro_social_links');

/**
 * Ostore  Payment Logo
 */
 if ( ! function_exists( 'ostore_pro_payment_logo' ) ) {
	function ostore_pro_payment_logo( $service_icon = null, $service_title = null, $service_desc = null ) {	
    $payment_enable = get_theme_mod('payment_enable');
    
    if($payment_enable==1): ?>
    <div class=" col-sm-3 col-xs-12">
      <div class="payment">
        <ul>
        <?php  $payment_logo =  get_theme_mod('payment_logo_add'); 
         $payment_logo_image = explode(",",$payment_logo,-1);
         foreach($payment_logo_image as $payment_logo_url){
        ?>
          <li><img class="payment-logo" src="<?php echo esc_url($payment_logo_url);  ?>" ></li>
        <?php } ?>
        </ul>
      </div>
    </div>
    <?php endif;
	}
}
add_action( 'ostore_pro_footer_payment_logo', 'ostore_pro_payment_logo');


/**
 * Ostore  subscription form
 */
 if ( ! function_exists( 'ostore_pro_subscription' ) ) {
	function ostore_pro_subscription( $service_icon = null, $service_title = null, $service_desc = null ) {	
    $subscription_text = get_theme_mod('ostore_pro_subscribe_heading_text','Sign up for newsletter');
    $subscription_desc = get_theme_mod('ostore_pro_subscribe_short_desc_area','Duis autem vel eum iriureDuis autem');
    $subscription_shortcode = get_theme_mod('ostore_pro_subscribe_area');
    ?>
        <div class="col-md-3 col-sm-3 hidden-sm hidden-xs">
            <h3><?php echo esc_attr($subscription_text) ; ?></h3>
            <p><?php echo esc_attr($subscription_desc) ; ?></p>
        </div>
        <div class="col-md-5 col-sm-7">
            <?php
            echo do_shortcode($subscription_shortcode);
            ?>
        </div>
    <?php
	}
}