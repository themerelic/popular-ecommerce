<?php
 /**
** Adds logo_slider_widget widget.
**/
add_action('widgets_init', 'product_list_widget');
function product_list_widget() {
  register_widget('ostore_pro_product_list_widget_area');
}

class ostore_pro_product_list_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'ostore_pro_product_list_widget_area', 'OS Pro: Products List', array(
            'description' => __('Display Hot Deal Products Display', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
		  
			'ostore_pro_product_list_title' => array(
			  'name' => 'ostore_pro_product_list_title',
			  'title' => __('Title', 'ostore-pro'),
			  'type' => 'text',
              'desc' => ""
			),

			'ostore_pro_product_list_desc' => array(
			  'name' => 'ostore_pro_product_list_desc',
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
			'product_list_category_collection' => array(
			  'name' => 'product_list_category_collection',
			  'title' => __('Select Product List Category', 'ostore-pro'),
			  'desc'  => __("only shows scheduled products from category", 'ostore-pro'),
			  'type'  => 'womulticategory'
            ),
            'ostore_pro_product_list_style' => array(
                'name' => 'ostore_pro_product_list_style',
                'title' => __('Product List Style', 'ostore-pro'),
                'type' => 'select',
                'options' => array(
                    'product-list-style-1' => __("Defaut Style", 'ostore-pro'),
                    'product-list-style-2' => __("Box Style", 'ostore-pro')
                )
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
            'ostore_pro_product_list_title'     => '',
            'ostore_pro_product_list_desc'      => '',
            'ostore_pro_header_layout'          => 'header-layout-2',
            'ostore_pro_product_list_style'     => 'product-list-style-1',
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
        $product_list_title = ( ! empty( $instance['ostore_pro_product_list_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_product_list_title'] ) : '';
        $product_list_short_desc = ( ! empty( $instance['ostore_pro_product_list_desc'] ) ) ? wp_kses_post( $instance['ostore_pro_product_list_desc'] ) : '';
        $ostore_pro_header_layout = ( ! empty( $instance['ostore_pro_header_layout'] ) ) ? sanitize_text_field( $instance['ostore_pro_header_layout'] ) : 'header-layout-2';
		$product_list_category_collection_id = $instance['product_list_category_collection'];
        $ostore_pro_product_list_style = ( ! empty( $instance['ostore_pro_product_list_style'] ) ) ? sanitize_text_field( $instance['ostore_pro_product_list_style'] ) :'product-list-style-1';

        echo $before_widget; 
        ?>
        <section class="ostore_pro_hlp_product_area">
        <!-- End page header-->
            <div class="container">
                <?php if(!empty($product_list_title)): 
                     ostore_pro_title($product_list_title,$product_list_short_desc,$ostore_pro_header_layout);  
                         endif; 
                ?>
                <div class="row">
                    
                    <?php 
                     do_action('product_list_view',$product_list_category_collection_id,$ostore_pro_product_list_style); 
                    ?>
                </div>
            </div>
        </section>
        <?php      
        echo $after_widget;
    }
}