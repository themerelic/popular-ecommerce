<?php
 /**
** Adds oStore-pro_category_collection_widget widget.
**/
add_action('widgets_init', 'ostore_pro_hlp_products_widget');
function ostore_pro_hlp_products_widget() {
  register_widget('ostore_pro_hlp_products_widget_area');
}
class ostore_pro_hlp_products_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'ostore_pro_hlp_products_widget_area', 'OS: HLP Products', array(
            'description' => __('widget that show Hot Deal , Latest Products and Popular Products section', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
           'ostore_pro_hlp_product_title' => array(
              'name' => 'ostore_pro_hlp_product_title',
              'title' => __('Title', 'ostore-pro'),
              'type' => 'text',
              'desc' => ""
            ),

            'ostore_pro_hlp_product_desc' => array(
              'name' => 'ostore_pro_hlp_product_desc',
              'title' => __('Very Short Description', 'ostore-pro'),
              'type' => 'textarea',
              'rows'  => 4
            ),
            'ostore_pro_header_layout' => array(
              'name' => 'ostore_pro_header_layout',
              'title' => __('Header Layout', 'ostore-pro'),
              'type' => 'select',
              'options' => array(
                  'header-layout-1' => __("Header Layout 1", 'ostore-pro'),
                  'header-layout-2' => __("Header Layout 2", 'ostore-pro'),
              )
            ),

           'ostore_pro_hlp_products_style' => array(
			  'name' => 'ostore_pro_hlp_products_style',
			  'title' => __('HLP Products Style', 'ostore-pro'),
			  'type' => 'select',
              'options' => array(
                  'style1' => __("Hot Deal Latest Popular", 'ostore-pro'),
                  'style2' => __("Latest Hot Deal Popular", 'ostore-pro'),
                  'style3' => __("Latest Popular Hot Deal", 'ostore-pro')
              )
			),
            'ostore_pro_hot_deal_cat' => array(
			  'name' => 'ostore_pro_hot_deal_cat',
			  'title' => __('HLP Category', 'ostore-pro'),
			  'type' => 'womulticategory',
			  'desc' => "Hot, Latest and Popular"
            ),
            'ostore_pro_hot_deal_post_count' => array(
                'name' => 'ostore_pro_hot_deal_post_count',
                'title' => __('Products Count', 'ostore-pro'),
                'type' => 'text',
                'desc' => ""
              ),
                         
		);
  } 
    /**
    * Update Form Vlaue 
    */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $instance[$name] = $this->kwidget->update($widget_field, $new_instance[$name]);
        }
        return $instance;
    }

    /**
    * Backend Form 
    **/
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        /*********************************************
         * Default Value Set on Widget Section
         *******************************************/
        $defaults = array(
            'ostore_pro_hlp_product_title'   => '',
            'ostore_pro_hlp_product_desc'    => '',
            'ostore_pro_header_layout'      => 'header-layout-2',
            'ostore_pro_hlp_products_style'  => 'style2',
            'ostore_pro_hot_deal_post_count'  => 3,
		);
        $instance = wp_parse_args( (array) $instance, $defaults );


        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $widgets_field_value = !empty($instance[$name]) ? $instance[$name] : '';
            $this->kwidget->prepare($this, $widget_field, $widgets_field_value);
        }
    }

    /**
    * Display section(frontend)
    */
    public function widget($args, $instance) {
        extract($args);
        extract($instance);

        /**
        * wp query for first block
        **/
        $ostore_pro_hlp_product_title = ( ! empty( $instance['ostore_pro_hlp_product_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_hlp_product_title'] ) : '';
        $ostore_pro_hlp_product_desc = ( ! empty( $instance['ostore_pro_hlp_product_desc'] ) ) ? wp_kses_post( $instance['ostore_pro_hlp_product_desc'] ) : '';
        $ostore_pro_header_layout = ( ! empty( $instance['ostore_pro_header_layout'] ) ) ? sanitize_text_field( $instance['ostore_pro_header_layout'] ) : 'header-layout-2';
		$hlp_style                  = ( ! empty( $instance['ostore_pro_hlp_products_style'] ) ) ? sanitize_text_field( $instance['ostore_pro_hlp_products_style'] ) : 'style2';
        $categories_hot_deal =  $instance['ostore_pro_hot_deal_cat'];
        $hlp_hot_deal_products_count = ( ! empty( $instance['ostore_pro_hot_deal_post_count'] ) ) ? absint( $instance['ostore_pro_hot_deal_post_count'] ) : 4;

        
        $default_cat_query = new WP_Query($args);

        $categories_id = array();
        foreach ($categories_hot_deal as $key => $value) {
            $categories_id[$key] = $key;
        }

        $hot_deal_product_args = array(
            'post_type' => 'product',
            'tax_query' => array(
                array('taxonomy'  => 'product_cat',
                    'field'     => 'term_id',
                    'terms'     => $categories_id,
                )
            ),
            'meta_query'     => array(
                array(
                    'key'           => '_sale_price_dates_to',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            ),
            'posts_per_page' => $hlp_hot_deal_products_count
        );

        echo $before_widget;

        ?>
            <?php do_action('special_offer',$hot_deal_product_args); ?>

            <section class="ostore_pro_hlp_product_area">
                <!-- End page header-->
                <div class="container">

                <?php if( $ostore_pro_hlp_product_title != '' ): ostore_pro_title($ostore_pro_hlp_product_title,$ostore_pro_hlp_product_desc,$ostore_pro_header_layout); endif; ?>
                <div class="row">
                    
                    <!-- Start Hot Deal Product -->
                    <?php if($hlp_style=='style1'){  
                            do_action('ostore_pro_hlp_hot_deal_product',$hot_deal_product_args); 
                    } ?> 
                    
                    <!-- Statrt Latest Products -->
                    <div class="col-md-4 col-sm-6 col-lg-4">
                    <div <?php post_class('panel_product ostore-hlp-panel-products'); ?> >
                        <h2 class="ostore_pro_hlp_title"><?php esc_html_e('Lastest Products','ostore-pro'); ?></h2>

                        <?php
                            $latest_product_args = array(
                                'post_type' => 'product',                             
                                'posts_per_page' => 4
                            );
                            $query = new WP_Query($latest_product_args);
                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                        ?>
                        <div class="ostore_pro_hlp_single_panel_product">
                        <div class="ostore_pro_hlp_panel_left">
                            <div class="panelp_img"> <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()){ the_post_thumbnail('hlp_products'); }else{ echo '<img src="http://via.placeholder.com/103x113&text=No%20Image%20">'; } ?></a> </div>
                            
                        </div>
                        <div class="osote_hlp_panel_right">
                            <div class="ostore_pro_hlp_des fix popular-product">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post(get_the_title()); ?></a></h2>
                            <div class="price">
                                <div class="price-box"> <span class="regular-price"> <span class="price"><?php woocommerce_template_loop_price(); ?></span> </span> </div>
                                    <div class="rating">
                                        <span><?php  get_star_rating()  ?></span>  
                                    </div>
                                
                                    <button type="button" class="add-to-cart-mt-1"><span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                                </div>

                            </div>
                            <div class="ostore_pro_hlp_actions"> 
                                <?php if(function_exists( 'ostore_pro_wishlist_products' )) { ostore_pro_wishlist_products(); } ?> 
                                <?php if(function_exists('ostore_pro_quickview')){ostore_pro_quickview();} ?> 
                                <?php if(function_exists('add_compare_link')){add_compare_link();} ?>
                            </div>
                        </div>
                        
                        </div>
                        <?php }} ?>
                        
                    </div>
                    </div><!-- End Latest Product -->
                    
                    <!-- Start Hot Deal Product -->
                    <!-- Start Hot Deal Product -->
                    <?php 
                        if($hlp_style=='style2'){  
                            do_action('ostore_pro_hlp_hot_deal_product',$hot_deal_product_args); 
                        } 
                    ?>  
                    <!-- End Hot Deal Poduct -->
                    <div class="col-md-4 col-sm-12 col-lg-4">
                    <div <?php post_class('panel_product ostore-hlp-panel-products'); ?>  >
                        <h2 class="ostore_pro_hlp_title popular"><?php esc_html_e('Popular Products','ostore-pro'); ?></h2>
                        <?php
                            $ostore_pro_hotdeal_label = esc_html__('New', 'ostore-pro');
                            $upsell_product = array(
                                'post_type'         => 'product',
                                'meta_key'          => 'total_sales',
                                'orderby'           => 'meta_value_num',
                                'posts_per_page'    => 4
                            );
                            $query = new WP_Query($upsell_product);
                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                        ?>
                        <div class="ostore_pro_hlp_single_panel_product">
                        <div class="ostore_pro_hlp_panel_left">
                            <div class="panelp_img"> <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()){ the_post_thumbnail('hlp_products'); }else{ echo '<img src="http://via.placeholder.com/103x113&text=No%20Image%20">'; } ?></a> </div>
                            
                        </div>
                        <div class="osote_hlp_panel_right">
                            <div class="ostore_pro_hlp_des fix popular-product">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post(get_the_title()); ?></a></h2>
                            <div class="ostore-hlp-desc hidden-lg hidden-md hidden-xs"><p><?php the_excerpt(); ?></p></div>
                            <div class="price">
                                <div class="price-box"> <span class="regular-price"> <span class="price"><?php woocommerce_template_loop_price(); ?></span> </span> </div>
                                    <div class="rating">
                                        <span><?php  get_star_rating()  ?></span>  
                                    </div>
                                
                                    <button type="button" class="add-to-cart-mt-1"><span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                                </div>
                            </div>
                            <div class="ostore_pro_hlp_actions"> 
                                <?php if(function_exists( 'ostore_pro_wishlist_products' )) { ostore_pro_wishlist_products(); } ?> 
                                <?php if(function_exists('ostore_pro_quickview')){ostore_pro_quickview();} ?> 
                                <?php if(function_exists('add_compare_link')){add_compare_link();} ?>
                            </div>
                        </div>
                        
                        </div>
                        <?php }} ?>
                    
                    </div>
                    </div>

                     <!-- Start Hot Deal Product -->
                     <?php if($hlp_style=='style3'){  
                         do_action('ostore_pro_hlp_hot_deal_product',$hot_deal_product_args); 
                     } ?> 
                    
                </div>
                </div>
            </section>        
        <?php        
        echo $after_widget;
    }
}