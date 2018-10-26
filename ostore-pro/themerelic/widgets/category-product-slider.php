<?php
 /**
** Adds logo_slider_widget widget.
**/
add_action('widgets_init', 'category_product_slider_widget');
function category_product_slider_widget() {
  register_widget('ostore_pro_category_product_slider_widget_area');
}

class ostore_pro_category_product_slider_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'ostore_pro_category_product_slider_widget_area', 'OS: Category Products Slider', array(
            'description' => __('Display Category wise Products ', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
		  
			'ostore_pro_category_product_title' => array(
			  'name' => 'ostore_pro_category_product_title',
			  'title' => __('Title', 'ostore-pro'),
			  'type' => 'text',
              'desc' => ""
			),

			'ostore_pro_category_product_desc' => array(
			  'name' => 'ostore_pro_category_product_desc',
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
			'category_product_collection' => array(
			  'name' => 'category_product_collection',
			  'title' => __('Select Hot Deal Category', 'ostore-pro'),
			  'desc'  => __("only shows scheduled products from category", 'ostore-pro'),
			  'type'  => 'wocategory'
			),
            'category_product_style' => array(
                'name' => 'category_product_style',
                'title' => __('Category Layout', 'ostore-pro'),
                'type' => 'select',
                'options' => array("products-category" => "Products-Category", "category-products" => "Category-Products ")
            ),
            'ostore_pro_category_product_number' => array(
              'name' => 'ostore_pro_category_product_number',
              'title' => __('Display Product', 'ostore-pro'),
              'type' => 'text',
              'desc' => ""
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
            'ostore_pro_category_product_title'  => '',
            'ostore_pro_category_product_desc'=> '',
            'ostore_pro_header_layout' => 'header-layout-2',
            'category_product_style' => 'products-category',
            'ostore_pro_category_product_number' => 4,
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
        $category_product_title = ( ! empty( $instance['ostore_pro_category_product_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_category_product_title'] ) : '';
        $category_product_short_desc = ( ! empty( $instance['ostore_pro_category_product_desc'] ) ) ? wp_kses_post( $instance['ostore_pro_category_product_desc'] ) : '';
        $category_product_category_collection_id = ( ! empty( $instance['category_product_collection'] ) ) ? absint($instance['category_product_collection'])  : '';
        $category_product_layout = ( ! empty( $instance['category_product_style'] ) ) ? sanitize_text_field( $instance['category_product_style'] ) : 'products-category';
		$category_product_number = ( ! empty( $instance['ostore_pro_category_product_number'] ) ) ? absint( $instance['ostore_pro_category_product_number'] ) : 4;
      
        
        //Category Image
        $category_product_thumbnail_id = get_woocommerce_term_meta( $category_product_category_collection_id, 'thumbnail_id', true );
        $category_product_image = wp_get_attachment_url( $category_product_thumbnail_id);
        $category_product_image = $category_product_image[0];
        
        echo $before_widget; 
        ?>
            <section class="category_product">
                <div class="container">
                    <?php if( !empty($category_product_title) ): ostore_pro_title($category_product_title,$category_product_short_desc,$ostore_pro_header_layout); endif; ?>
                        <aside id="ostore_pro_product2-2" class="widget widget_ostore_pro_product2">                
                            <div class="feature-cat-product-wrap row">
                                <?php if($category_product_layout=='category-products'){do_action('category_product_slider_image_option',$category_product_category_collection_id,$category_product_image); }?>

                                    <div class="feature-cat-product col-lg-6 right_align slick-initialized slick-slider">
                                        <div  class="tab-pane active in "  id="latest_product" >
                                            <div class="slider-items-products">
                                                <div id="new-product-slider2" class="product-flexslider hidden-buttons">
                                                    <div class="slider-items">
                                                        <?php
                                                            $product_args = array(
                                                                'post_type' => 'product',
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy'  => 'product_cat',
                                                                        'field'     => 'term_id', 
                                                                        'terms'     => $category_product_category_collection_id                                                                 
                                                                    )),
                                                                'posts_per_page' => $category_product_number
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
                                    </div>
                                <?php if($category_product_layout=='products-category'){do_action('category_product_slider_image_option',$category_product_category_collection_id,$category_product_image); } ?>
                            </div>
                        </aside>
                </div>
        </section>
        <?php      
        echo $after_widget;
    }
}