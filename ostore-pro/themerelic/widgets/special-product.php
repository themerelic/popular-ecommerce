<?php
 /**
** Adds logo_slider_widget widget.
**/
add_action('widgets_init', 'special_product_widget');
function special_product_widget() {
  register_widget('ostore_pro_special_product_widget_area');
}

class ostore_pro_special_product_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'ostore_pro_special_product_widget_area', 'OS:Special Products', array(
            'description' => __('Display Special Products Display', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
		  
			'ostore_pro_special_product_title' => array(
			  'name' => 'ostore_pro_special_product_title',
			  'title' => __('Title', 'ostore-pro'),
			  'type' => 'text',
              'desc' => ""
			),

			'ostore_pro_special_product_desc' => array(
			  'name' => 'ostore_pro_special_product_desc',
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
			'special_product_category_first' => array(
			  'name' => 'special_product_category_first',
			  'title' => __('Select Products Cateogry First', 'ostore-pro'),
			  'desc'  => __("only shows scheduled products from category", 'ostore-pro'),
			  'type'  => 'womulticategory'
			),
            
            'ostore_pro_special_product_number' => array(
              'name' => 'ostore_pro_special_product_number',
              'title' => __('Display Product', 'ostore-pro'),
              'type' => 'text',
              'desc' => ""
            ),
            'special_product_col' => array(
              'name' => 'special_product_col',
              'title' => __('Select Default Column', 'ostore-pro'),
              'type' => 'select',
              'options' => array(
                  'two_column' => __("2 Column", 'ostore-pro'),
                  'three_column' =>  __("3 Column", 'ostore-pro'),
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
            'ostore_pro_special_product_title'      => __('Special Offer','ostore'),
            'ostore_pro_special_product_desc'       => '',
            'ostore_pro_header_layout'              => 'header-layout-2',
            'special_product_category_first'        => '',
            'ostore_pro_special_product_number'     => 4,
            'special_product_col'                   => 'three_column'
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
        $ostore_pro_special_product_title = ( ! empty( $instance['ostore_pro_special_product_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_special_product_title'] ) : 'Special Offer';
        $ostore_pro_special_product_desc = ( ! empty( $instance['ostore_pro_special_product_desc'] ) ) ? wp_kses_post( $instance['ostore_pro_special_product_desc'] ) : '';
        $ostore_pro_header_layout = ( ! empty( $instance['ostore_pro_header_layout'] ) ) ? sanitize_text_field( $instance['ostore_pro_header_layout'] ) : 'header-layout-2';
		$special_product_category_first = $instance['special_product_category_first'];
        $ostore_pro_special_product_number = ( ! empty( $instance['ostore_pro_special_product_number'] ) ) ? absint( $instance['ostore_pro_special_product_number'] ) : 4;
        $special_product_col = ( ! empty( $instance['special_product_col'] ) ) ? sanitize_text_field( $instance['special_product_col'] ) : 'three_column';
        
        echo $before_widget; 
        ?>
        <div class="container">
             <?php if(!empty($ostore_pro_special_product_title)): ?>
                <?php ostore_pro_title($ostore_pro_special_product_title,$ostore_pro_special_product_desc,$ostore_pro_header_layout);  ?>
            <?php endif; ?>
        <div class="products-grid row">
            <?php 
             
                foreach($special_product_category_first as $special_multiple_cat => $key_nothing){ 
                $term = get_term_by( 'id', $special_multiple_cat, 'product_cat');
                if(!$term) continue;
            ?>
            <?php if($special_product_col == 'two_column'): ?>
                <div class="col-md-6 col-xs-12 col-sm-6  large-product-top">
            <?php else: ?>
                <div class="col-md-4 col-xs-12 col-sm-6  large-product-top">
            <?php endif; ?>
                <div class="large-product">
                     <div <?php post_class('panel_product ostore-hlp-panel-products'); ?> >
                         <h2 class="ostore_pro_hlp_title"><?php echo get_cat_name($special_multiple_cat); ?></h2>
                     
                         <div class="ostore-slider-items-products">                        
                             <div id="hot-deals-slider" class="hot-deals-slider product-flexslider hidden-buttons">                        
                             <div class="slider-items slider-width-col3"> 
                             
                            <?php 
                                    $product_args = array(
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            array('taxonomy'  => 'product_cat',
                                                'field'     => 'term_id',
                                                'terms'     => $special_multiple_cat,
                                            )
                                        ),
                                        'posts_per_page' => $ostore_pro_special_product_number
                                    );
                                    $query = new WP_Query($product_args);
                                    if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                    ?>

                                       <div class="product-item">
                                     <div class="item-inner fadeInUp">
                                     <div class="product-thumbnail">
                                         <div class="icon-hot-label hot-left"><?php esc_html_e('Hot','ostore-pro'); ?></div>
                                         <div class="pr-img-area"> 

                                         <figure>
                                             <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <?php if($special_product_col == 'two_column'):?>
                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'special-product', array( 'class' => 'first-img' ) ); ?>
                                                <?php else: ?>
                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'blog', array( 'class' => 'first-img' ) ); ?>
                                                <?php endif; ?>
                                             </a>
                                         </figure>
                                         
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
                                            <button type="button" class="add-to-cart-mt"> <span><?php woocommerce_template_loop_add_to_cart(); ?> </span> </button>
                                        </div>
                                         
                                         </div>
                                     </div>
                                     <div class="ostore-hlp-item-info">
                                     
                                         <div class="info-inner">
                                         <div class="ostore-item-title"> <a title="<?php echo wp_kses_post(get_the_title()); ?>" href="<?php the_permalink(); ?>"><h4><?php  echo wp_kses_post(get_the_title()); ?></h4></a> </div>
                                         <div class="ostore-item-desc"><?php echo substr(get_the_excerpt(),0,120); ?></div>
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
                                        <?php } } wp_reset_postdata(); ?>
                             </div>
                             </div>
                         </div>
                         </div>
                </div><!--large-product-->
            </div>

            <?php } ?>
            
            
        </div>
        </div>
    </div>
        <?php      
        echo $after_widget;
    }
}