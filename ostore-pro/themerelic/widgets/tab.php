<?php
 /**
** Adds Tab widget.
**/
add_action('widgets_init', 'tab_widget');
function tab_widget() {
  register_widget('tab_widget_area');
}

class tab_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'tab_widget_area', 'OS: Tab Products Slider  ', array(
            'description' => esc_html__('Tab for WooCommerce or Product Category', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
			
            'ostore_pro_tab_radio' => array(
			  'name' => 'ostore_pro_tab_radio',
			  'title' => __('Type of Tabs', 'ostore-pro'),
              'type' => 'radio',
              'default'=>'wo',
              'options' => array(
                  'wo' => __("WoCommerce", 'ostore-pro'),
                  'cat' => __("Categories", 'ostore-pro')
              )
			),
            'default_woocommerce_collection' => array(
			  'name' => 'default_woocommerce_collection',
			  'title' => __('Select Default Woocommerce', 'ostore-pro'),
			  'type' => 'multiselect',
              'options' => array(
                  'feature_product' => __("Feature Product", 'ostore-pro'),
                  'latest_product' =>  __("Latest Product", 'ostore-pro'),
                  'onsale_product'  =>  __("Onsale Product", 'ostore-pro'),
                  'upsale_product'  =>  __("Upsale Product", 'ostore-pro')
              )
              
			),     
			'category_tab_collection' => array(
			  'name' => 'category_tab_collection',
			  'title' => __('Select Lists Collection Category', 'ostore-pro'),
			  'type' => 'womulticategory',
              'desc' => 'Select Multiple Category Show'
			),
            'ostore_pro_tab_number' => array(
			  'name' => 'ostore_pro_tab_number',
			  'title' => __('Number of product', 'ostore-pro'),
			  'type' => 'number'
            ),
            'ostore_pro_tab_layout' => array(
                'name' => 'ostore_pro_tab_layout',
                'title' => __('Tab Layout', 'ostore-pro'),
                'type' => 'select',
                'options' => array(
                        "tab-layout-1" => "Tab Layout One", 
                        "tab-layout-2" => "Tab Layout Two", 
                        "tab-layout-3" => "Tab Layout Three"
                )
            ),
            'ostore_pro_product_tab_style' => array(
                'name' => 'ostore_pro_product_tab_style',
                'title' => __('Product Style', 'ostore-pro'),
                'type' => 'select',
                'options' => array(
                    "product-slide" => "Product Slide", 
                    "product-list" => "Product List", 
                    "product-gird" => "Product Grid"
                )
              )
            
                      
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
            'ostore_pro_tab_radio'          => 'cat',
            'ostore_pro_tab_number'         => '5',
            'ostore_pro_tab_layout'         => 'tab-layout-1',
            'ostore_pro_product_tab_style'  => 'product-slide',
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
         
        $tab_layout = $instance['ostore_pro_tab_layout']; 
        $tab_multiple_category_id = $instance['category_tab_collection'];
        $tab_product_count = $instance['ostore_pro_tab_number'];
        if( $tab_product_count == 1 or $tab_product_count == '') {
            $tab_product_count = 4;
        } 
        $tab_product_option = $instance['ostore_pro_tab_radio'];
        $tab_product_multiple_select = $instance['default_woocommerce_collection'];
        $tab_product_default = $instance['ostore_pro_tab_radio'];
      
        
        echo $before_widget;
        ?> 
        
            <div class="container">
                <div class="row">
                    <div class="new-product col-xs-12 wow fadeInUp">
                        <!-- Osotre Product Tab -->
                        <?php  do_action('ostore_pro_tab_diff_layout',$tab_product_default,$tab_multiple_category_id,$tab_product_multiple_select,$tab_layout); ?>
                        <div id="productTabContent" class="tab-content">
                
                        <?php 
                         if($tab_product_default == 'cat' && (!empty($tab_multiple_category_id))){  
                            $count =1;
                            foreach($tab_multiple_category_id as $tab_multiple_cat => $key_nothing){ 
                            $term = get_term_by( 'id', $tab_multiple_cat, 'product_cat');
                            if(!$term) continue;
                        ?>
                        <div  class="tab-pane fade <?php if($count == 1){ ?>active in <?php }$count++; ?>"  id="<?php echo esc_attr( $term->slug ); ?>" >
                            <div class="slider-items-products">
                                <div id="<?php echo esc_attr($ostore_pro_product_tab_style); ?>" class="product-flexslider hidden-buttons <?php echo esc_attr($ostore_pro_product_tab_style); ?>">
                                    <div class="slider-items slider-width-col4">
                                    
                                            <?php
                                            $product_args = array(
                                                'post_type' => 'product',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy'  => 'product_cat',
                                                        'field'     => 'term_id', 
                                                        'terms'     => $tab_multiple_cat                                                                 
                                                    )),
                                                'posts_per_page' => $tab_product_count
                                            );
                                            $query = new WP_Query($product_args);
                                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                                
                                                 wc_get_template_part( 'content', 'product' ); 
                                             } } wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php   }  
                         if(!empty($tab_product_count)){
                        ?> 
                        <div  class="tab-pane fade "  id="all" >
                            <div class="slider-items-products">
                                <div id="<?php echo esc_attr($ostore_pro_product_tab_style); ?>" class="product-flexslider hidden-buttons <?php echo esc_attr($ostore_pro_product_tab_style); ?>">
                                    <div class="slider-items slider-width-col4">
                                        <?php
                                            $args = array(
                                                'number'     => $tab_product_count,
                                                'orderby'    => 'rand',
                                                'order'      => 'ASC',
                                            );
                                            $product_categories = get_terms( 'product_cat', $args );
                                            
                                                foreach ( $product_categories as $product_category ) {
                                                    $args = array(
                                                        'posts_per_page' => 1,
                                                        'tax_query' => array(
                                                            'relation' => 'AND',
                                                            array(
                                                                'taxonomy' => 'product_cat',
                                                                'field' => 'slug',
                                                                'terms' => $product_category->slug
                                                            )
                                                        ),
                                                        'post_type' => 'product',
                                                        'orderby' => 'rand,'
                                                    );
                                                    $products = new WP_Query( $args );
                                                    while ( $products->have_posts() ) {
                                                        $products->the_post();
                                                        ?>
                                                            <?php wc_get_template_part( 'content', 'product' ); ?>                          
                                                        <?php } } wp_reset_postdata(); ?>
                                                        <?php
                                                    }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php }else{
                            $woo_count1 = 1;
                            if(in_array('feature_product', $tab_product_multiple_select)){ ?>
                            <div  class="tab-pane fade <?php if($woo_count1 == 1){ ?>active in <?php }$woo_count1++; ?>"  id="feature_product" >
                                <div class="slider-items-products">
                                    <div id="<?php echo esc_attr($ostore_pro_product_tab_style); ?>" class="product-flexslider hidden-buttons <?php echo esc_attr($ostore_pro_product_tab_style); ?>">
                                        <div class="slider-items slider-width-col4">
                                                <?php 
                                                $meta_query   = WC()->query->get_meta_query();
                                                $meta_query[] = array(
                                                    'key'   => '_featured',
                                                    'value' => 'yes'
                                                );
                                                $args = array(
                                                    'post_type'   =>  'product',
                                                    'stock'       =>  1,
                                                    'showposts'   =>  $tab_product_count,
                                                    'orderby'     =>  'date',
                                                    'order'       =>  'DESC',
                                                    'meta_query'  =>  $meta_query,
                                                );
                                                $query = new WP_Query($args);
                                                if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                                ?>
                                                <?php wc_get_template_part( 'content', 'product' ); ?>                          
                                                <?php } } wp_reset_postdata(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <?php

                            }
                            if(in_array('latest_product', $tab_product_multiple_select)){?>
                            <div  class="tab-pane fade <?php if($woo_count1 == 1){ ?>active in <?php }$woo_count1++; ?>"  id="latest_product" >
                                <div class="slider-items-products">
                                    <div id="<?php echo esc_attr($ostore_pro_product_tab_style); ?>" class="product-flexslider hidden-buttons <?php echo esc_attr($ostore_pro_product_tab_style); ?>">
                                        <div class="slider-items slider-width-col4">
                                            <?php
                                                $product_args = array(
                                                    'post_type' => 'product',                             
                                                    'posts_per_page' => $tab_product_count
                                                );
                                                $query = new WP_Query($product_args);
                                                if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                                     wc_get_template_part( 'content', 'product' ); 
                                                      } } wp_reset_postdata(); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            
                            if(in_array('onsale_product', $tab_product_multiple_select)){?>
                            <div  class="tab-pane fade <?php if($woo_count1 == 1){ ?>active in <?php }$woo_count1++; ?>"  id="onsale_product" >
                                <div class="slider-items-products">
                                    <div id="<?php echo esc_attr($ostore_pro_product_tab_style); ?>" class="product-flexslider hidden-buttons <?php echo esc_attr($ostore_pro_product_tab_style); ?>">
                                        <div class="slider-items slider-width-col4">
                                            <?php
                                                $on_sale = array(
                                                'post_type'      => 'product',
                                                'posts_per_page' => $tab_product_count,
                                                'meta_query'     => array(
                                                  'relation' => 'OR',
                                                    array( // Simple products type
                                                      'key'           => '_sale_price',
                                                      'value'         => 0,
                                                      'compare'       => '>',
                                                      'type'          => 'numeric'
                                                      ),
                                                    array( // Variable products type
                                                      'key'           => '_min_variation_sale_price',
                                                      'value'         => 0,
                                                      'compare'       => '>',
                                                      'type'          => 'numeric'
                                                      )
                                                    )
                                              );
                                            $query = new WP_Query($on_sale);
                                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                                 wc_get_template_part( 'content', 'product' ); 
                                                  } } wp_reset_postdata(); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            if(in_array('upsale_product', $tab_product_multiple_select)){?>
                            <div  class="tab-pane fade <?php if($woo_count1 == 1){ ?>active in <?php }$woo_count1++; ?>"  id="upsale_product" >
                                <div class="slider-items-products">
                                    <div id="<?php echo esc_attr($ostore_pro_product_tab_style); ?>" class="product-flexslider hidden-buttons <?php echo esc_attr($ostore_pro_product_tab_style); ?>">
                                        <div class="slider-items slider-width-col4">
                                            <?php
                                                $ostore_pro_hotdeal_label = esc_html__('New', 'ostore-pro');
                                                $upsell_product = array(
                                                'post_type'         => 'product',
                                                'meta_key'          => 'total_sales',
                                                'orderby'           => 'meta_value_num',
                                                'posts_per_page'    => $tab_product_count
                                                );
                                                $query = new WP_Query($upsell_product);
                                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                            wc_get_template_part( 'content', 'product' ); 
                                             } } wp_reset_postdata(); 
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            
                            }
                        ?>
                </div>
            </div>
      </div>
    </div>
  <!-- </div> -->
        <?php         
        echo $after_widget;
    }
}