<?php
/**
 * Ostore  Services Area Style 1
 */
if ( ! function_exists( 'ostore_pro_services_area' ) ) {
	function ostore_pro_services_area( $service_icon = null, $service_title = null, $service_desc = null) {	
          ?>
		<div class="col-sm-4 ostore-service-boxw " >
            <div class="ostore-service-box ">
            <div class="front">
                <div class="ostore-service-icon"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                <div class="ostore-service-icon-info">
                <h5><?php echo esc_html($service_title); ?></h5>
                <div class="hidden-sm "><p><?php echo esc_html($service_desc); ?></p></div>
                </div>
            </div>
            <div class="back">
                <div class="ostore-service-icon"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                <div class="ostore-service-icon-info">
                <h5><?php echo esc_html($service_title); ?></h5>
                <div class="hidden-sm "><p><?php echo esc_html($service_desc); ?></p></div>
                </div>
            </div>
            </div>
        </div>
      <?php
	}
}

/**
 * Ostore  Services Area Style 2
 */
if ( ! function_exists( 'ostore_pro_services_area_2' ) ) {
	function ostore_pro_services_area_2( $service_icon = null, $service_title = null, $service_desc = null) {	
    ?>
		<div class="col-xs-12 col-sm-4">
        <div class="service-item">    
            <div class="icon"> <i class="<?php echo esc_attr($service_icon); ?>"></i> </div>
            <div class="info"> <a href="#">
                <h3><?php echo esc_html($service_title); ?></h3>
                </a> <span><?php echo esc_html($service_desc); ?></span> </div>
            </div>
        </div>
    <?php
	}
}


/**
 * Ostore  Tab Layout
 */
if ( ! function_exists( 'ostore_pro_tab_layout_option' ) ) {
	function ostore_pro_tab_layout_option( $tab_product_default,$tab_multiple_category_id,$tab_product_multiple_select,$tab_layout) {	
    
        $woo_defaut_cat = array(
            'feature_product' => __("Feature Product", 'ostore-pro'),
            'latest_product' =>  __("Latest Product", 'ostore-pro'),
            'onsale_product'  =>  __("Onsale Product", 'ostore-pro'),
            'upsale_product'  =>  __("Upsale Product", 'ostore-pro')
        );
        $tab_layout == 'tab-layout-1';

        if($tab_layout == 'tab-layout-1'){
            $tab_layout_wraper = "tab-style-center";
            $tab_layout_class="tab-nav clearfix";
        }elseif($tab_layout == 'tab-layout-2'){
            $tab_layout_wraper = "tab-style-left";
            $tab_layout_class = "nav home-nav-tabs home-product-tabs";
        }else{
            $tab_layout_wraper = "tab-style-right";
            $tab_layout_class = "ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all";
        }
        ?>
        <div class="<?php echo esc_attr($tab_layout_wraper); ?>">
		<ul class="<?php echo esc_attr($tab_layout_class); ?> new_cat">
         <?php 
            $count = 1;
            if($tab_product_default == 'cat' ){
                if(!empty($tab_multiple_category_id)){
                foreach($tab_multiple_category_id as $tab_key =>  $tab_cat_id){ 
                    $term = get_term_by( 'id', $tab_key, 'product_cat');
                    if(!$term) continue;
            ?>
            <li class="<?php if($count == 1){ ?>active <?php }$count++; ?>" cat_link ="<?php echo esc_attr(get_category_link($tab_key)); ?>" >
                <a  href="#<?php echo esc_attr( $term->slug ); ?>" data-toggle="tab" aria-expanded="false"><?php echo esc_attr( $term->name ); ?></a>
            </li>
            
            <?php 
            


            $count++; }} 
                }else{
                
                foreach($tab_product_multiple_select as $tab_key =>  $tab_cat_id){
                ?> 
                <li <?php if($count == 1){ ?> class="active"<?php }  ?>   ><a href="#<?php echo esc_attr( $tab_cat_id ); ?>" data-toggle="tab" aria-expanded="false"><?php echo esc_html($woo_defaut_cat[$tab_cat_id]);  ?></a></li>
            <?php

            $count++; }} ?>
            
        </ul>
            <?php if($tab_product_default == 'cat' ): ?><div class=" tab-all-product pull-right "> <a href=""> All View</a></div><?php endif; ?>
        </div>
    <?php 
	}
}
add_action( 'ostore_pro_tab_diff_layout', 'ostore_pro_tab_layout_option', 10, 4);


/**
 * Ostore  3 Column Product View
 */
if ( ! function_exists( 'ostore_pro_product_list_view' ) ) {
	function ostore_pro_product_list_view($product_list_category_collection_id,$ostore_pro_product_list_style) {	
     if($ostore_pro_product_list_style== 'product-list-style-2'){
     ?>
     
        <?php 
        $count_cat = 0;
            foreach($product_list_category_collection_id as $tab_multiple_cat => $key_nothing){ 
            $term = get_term_by( 'id', $tab_multiple_cat, 'product_cat');
            if(!$term) continue;

            if( $count_cat % 3 == 0){
                echo "</div><div class='row'>";
            }$count_cat++;
        ?>
        <!-- Statrt Latest Products -->
        <div class="col-md-4 col-sm-6 col-lg-4">
            <div <?php post_class('panel_product ostore-hlp-panel-products'); ?> >
                <h2 class="ostore_pro_hlp_title"><?php echo esc_html(get_cat_name($tab_multiple_cat)); ?></h2>
                <?php
                $product_args = array(
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'product_cat',
                            'field'     => 'term_id', 
                            'terms'     => $tab_multiple_cat                                                                 
                        )),
                    'posts_per_page' => 4
                );
                $query = new WP_Query($product_args);
                if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                ?>
                <div class="ostore_pro_hlp_single_panel_product">
                        <div class="ostore_pro_hlp_panel_left">
                            <div class="panelp_img"> <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()){the_post_thumbnail('hlp_products'); }else{ echo '<img src="http://via.placeholder.com/103x113&text=No%20Image%20">'; } ?></a> </div>
                        </div>
                        <div class="osote_hlp_panel_right">
                            <div class="ostore_pro_hlp_des fix popular-product">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post(get_the_title()); ?></a></h2>
                            
                            <div class="price">
                                <div class="price-box"> <span class="regular-price"> <span class="price"><?php woocommerce_template_loop_price(); ?></span> </span> </div>
                                <div class="rating">
                                    <span><?php  get_star_rating()  ?></span>  
                                </div>
                                
                                <button type="button" class="add-to-cart-mt-1"> <span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                            </div>

                            </div>
                        </div>
                        
                        </div>
                <?php }} ?>
                
            </div>
            </div><!-- End Latest Product -->
            <?php } ?>
            
    <?php }else{ ?>
        <?php 
                foreach($product_list_category_collection_id as $tab_multiple_cat => $key_nothing){ 
                $term = get_term_by( 'id', $tab_multiple_cat, 'product_cat');
                if(!$term) continue;
            ?>
                <div class="products-list-display">
	            <div class="heading-left">
	                <h4 class="section-title"><?php echo $term->name; ?></h4>
	            </div>
            	<div class="default_list_style">
                <div class="row">
            <?php
                $product_args = array(
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'product_cat',
                            'field'     => 'term_id', 
                            'terms'     => $tab_multiple_cat                                                                 
                        )),
                    'posts_per_page' => 4
                );
                $query = new WP_Query($product_args);
                
                if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                    ?>
                    <div class="col-md-3 col-sm-6 ostore-hot-deal">
                        <div <?php post_class('product-item product-hot-item'); ?> >
                            <div class="item-inner fadeInUp">
                            <div class="product-thumbnail">
                                <div class="pr-img-area">
                                    <figure>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if(has_post_thumbnail()){echo get_the_post_thumbnail(get_the_ID(), 'shop_catalog', array( 'class' => 'first-img' ) ); }else{ echo '<img src="http://via.placeholder.com/300x330&text=No%20Image%20">'; } ?> 
                                        </a>    
                                    </figure>   
                                    <button type="button" class="add-to-cart-mt"><span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <span> <?php get_star_rating() ?></span>  
                                            </div>
                                            <div class="item-price">
                                            <div class="price-box"> <span class="regular-price"> <span class="price"><?php woocommerce_template_loop_price(); ?></span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } } wp_reset_postdata(); 
                
                ?>
                </div>
            </div>
        </div>
                
        <?php }  ?>
        
    <?php }
	}
}
add_action( 'product_list_view', 'ostore_pro_product_list_view',4,2);



/**
 * Ostore  Category Product Slider -Category-img
 */
if ( ! function_exists( 'category_product_slider_option' ) ) {
    function category_product_slider_option( $category_product_category_collection_id,$category_product_image) {  

    //Category Image
    $thumbnail_id = get_woocommerce_term_meta( $category_product_category_collection_id, 'thumbnail_id', true );
    $category_product_image = wp_get_attachment_url( $thumbnail_id );

    if(empty($category_product_image)){
        $category_product_image =  'http://via.placeholder.com/530x450';
    } 
     ?>
        <div class="feature-cat-image col-lg-6 right_align">
            <a href="<?php echo esc_url(get_category_link($category_product_category_collection_id)); ?>"><img src="<?php echo $category_product_image; ?>" alt=""></a>                    
            <div class="product-cat-desc">
                <h3><?php echo esc_html(get_cat_name($category_product_category_collection_id)); ?></h3>
                <div class="product-cat-info"><h6><?php echo substr(category_description($category_product_category_collection_id),0,40); ?></h6></div>  
            </div>
        </div>
          
    <?php 
}
}
add_action( 'category_product_slider_image_option', 'category_product_slider_option', 10, 2);


/**
*   Home Slider
*/
if ( ! function_exists( 'ostore_pro_title' ) ) {    
    function ostore_pro_title($title,$short_desc,$ostore_pro_header_layout) {

        if ($ostore_pro_header_layout=='header-layout-1') {
            $ostore_pro_header_layout = "tab-nav hot-deal-tab clearfix";
            $ostore_pro_header_wrapper = "title-center";
        }else{
            $ostore_pro_header_layout = "ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all";
            $ostore_pro_header_wrapper = "title-bg";
        }

        ?>
        <div class="<?php echo esc_attr($ostore_pro_header_wrapper); ?>">
            <ul class="<?php if(!empty($ostore_pro_header_layout)){ echo esc_attr($ostore_pro_header_layout); } ?>" role="tablist">
                <?php if(!empty($title)): ?><li class="active"><a href=""><?php echo esc_html($title); ?></a></li><?php endif; ?>
            </ul>
            <?php if(!empty($short_desc)): ?><p class="pull-right"><?php echo esc_html($short_desc); ?></p><?php endif; ?>
        </div>

        <?php     
    }
}
add_action( 'ostore_pro_home_title', 'ostore_pro_title',  3 );