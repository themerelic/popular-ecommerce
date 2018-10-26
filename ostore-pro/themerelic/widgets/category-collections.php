<?php
/**
** Adds oStore-pro_category_collection_widget widget.
**/
add_action('widgets_init', 'ostore_pro_category_collection_widget');
function ostore_pro_category_collection_widget() {
  register_widget('ostore_pro_category_collection_widget_area');
}
class ostore_pro_category_collection_widget_area extends WP_Widget {
    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'ostore_pro_category_collection_widget_area', 'OS: Woo Category Collection', array(
            'description' => __('widget that show woocommerce category collection with feature image', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
		  
			'ostore_pro_collection_title' => array(
			  'name' => 'ostore_pro_collection_title',
			  'title' => __('Title', 'ostore-pro'),
			  'type' => 'text'
			),

			'ostore_pro_collection_desc' => array(
			  'name' => 'ostore_pro_collection_desc',
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
			
			'ostore_pro_category_collection' => array(
			  'name' => 'ostore_pro_category_collection',
			  'title' => __('Select Lists Collection Category', 'ostore-pro'),
			  'type' => 'womulticategory'
			),
            'ostore_pro_collection_option' => array(
			  'name' => 'ostore_pro_collection_option',
			  'title' => __('Collection Show Style', 'ostore-pro'),
			  'type' => 'radio',
              'options' => array(
                  '3-column-grid' => __("3 Column Grid", 'ostore-pro'),
                  'random-size-category' => __("Random Size Category", 'ostore-pro'),
                  'category-slider' => __("Category Slider", 'ostore-pro'),
                  'category-attach' => __("Category Attach", 'ostore-pro')
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
            'ostore_pro_collection_title'   => '',
            'ostore_pro_collection_desc'    => '',
            'ostore_pro_header_layout'      => 'header-layout-2',
            'ostore_pro_collection_option'  => '3-column-grid',
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
        $collection_title = ( ! empty( $instance['ostore_pro_collection_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_collection_title'] ) : '';
        $collection_desc = ( ! empty( $instance['ostore_pro_collection_desc'] ) ) ? wp_kses_post( $instance['ostore_pro_collection_desc'] ) : '';
        $ostore_pro_collection_id = ( ! empty( $instance['ostore_pro_category_collection'] ) ) ? $instance['ostore_pro_category_collection']  : '';
        $ostore_pro_collection_style = ( ! empty( $instance['ostore_pro_collection_option'] ) ) ? sanitize_text_field( $instance['ostore_pro_collection_option'] ) : '3-column-grid';
		$ostore_pro_category_heading_layout = ( ! empty( $instance['ostore_pro_header_layout'] ) ) ? sanitize_text_field( $instance['ostore_pro_header_layout'] ) : 'header-layout-2';
      
        echo $before_widget; 
        ?>
        
        <!-- end main container --> 
        <?php if($ostore_pro_collection_style == '3-column-grid'): ?>
            <div class="ostore-bottom-banner-section">   
                <div class="container">
                    <?php
                    if( !empty($collection_title) ):
                        ostore_pro_title($collection_title,$collection_desc,$ostore_pro_category_heading_layout); 
                    endif;
                     ?>
                    <div class="row">
                        <?php  
                        foreach($ostore_pro_collection_id as $ostore_pro_cat => $cat_name){
                            
                            $term = get_term_by( 'id', intval($ostore_pro_cat), 'product_cat');
                            if(!$term) continue;
                            //Category Image
                            $thumbnail_id = get_woocommerce_term_meta( $ostore_pro_cat, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id );
                        ?>
                        <div class="col-md-4 col-sm-4">
                            <a href="<?php echo esc_url(get_term_link($ostore_pro_cat, 'product_cat')); ?>" class="ostore-bottom-banner-img">
                            <div class="overimg">
                                <img src="<?php echo esc_url($image); ?>" alt=""  />
                            </div>
                            <span class="ostore-banner-overly"></span>
                                <div class="bottom-img-info">
                                    <h3><?php echo esc_html( $term->name ); ?></h3>
                                    <h6><?php echo wp_kses_post(substr($term->description,0,100)); ?></h6>
                                    <span class="shop-now-btn"><?php esc_html_e('View more','ostore-pro'); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php  } ?>    
                    </div>
                </div>
            </div>
        
        <?php elseif($ostore_pro_collection_style == 'random-size-category'): ?>
        <!-- end main container --> 
       <div class="ostore-bottom-banner-section">   
            <div class="container">
                <?php 
                    if(!empty($collection_title)): 
                        ostore_pro_title($collection_title,$collection_desc,$ostore_pro_category_heading_layout);  
                    endif;
                    ?>

                    <div class="row">
                        <?php 
                    $count = 0 ;
                    foreach($ostore_pro_collection_id as $ostore_pro_cat => $cat_name){ 
                        $term = get_term_by( 'id', $ostore_pro_cat, 'product_cat');
                        if(!$term) continue;
                    //Category Image
                        $thumbnail_id = get_woocommerce_term_meta( $ostore_pro_cat, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id );
                        
                        if($count % 6 == 0){
                            $category_class= "col-md-8";
                        }else{
                            $category_class = "col-md-4 col-sm-6 ";
                        }

                        if($count % 3 == 0){
                            echo "</div><div class='row'>";

                        }


                ?>
                <div class=" <?php echo $category_class; ?> ">    
                <a href="<?php echo esc_url(get_term_link($ostore_pro_cat, 'product_cat')); ?>" class="ostore-bottom-banner-img">
                    <div class="overimg"> 
                        <img src="<?php echo esc_url($image); ?>" class="catgory-collection-img" alt=""  />
                    </div>
                    <span class="ostore-banner-overly"></span>
                        <div class="bottom-img-info">
                            <h3><?php echo esc_html( $term->name ); ?></h3>
                            <h6><?php echo wp_kses_post(substr($term->description,0,100)); ?></h6>
                            <span class="shop-now-btn"><?php esc_html_e('View more','ostore-pro'); ?></span> 
                        </div>
                    </a>
                </div>
                <?php $count++;  } ?>    
                    </div>
                </div>
            </div>
        
        <?php else: ?>
            <div class="container">
        <?php 
            if(!empty($collection_title)): 
                ostore_pro_title($collection_title,$collection_desc,$ostore_pro_category_heading_layout); 
            endif; 
        ?>
        
        <div class="slider-items-products" style="margin: 20px 20px 10px 10px;">
                <div id="new-category-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4">
                        <?php  foreach($ostore_pro_collection_id as $ostore_pro_cat => $cat_name){ 
                            $term = get_term_by( 'id', $ostore_pro_cat, 'product_cat');
                            if(!$term) continue;
                            //Category Image
                            $thumbnail_id = get_woocommerce_term_meta( $ostore_pro_cat, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id );
                        ?>
                        <div class="category-slider" style="<?php if($ostore_pro_collection_style=='category-attach'){ ?>      padding: 0px 0px;<?php } ?>"> 
                            <a href="<?php echo esc_url(get_term_link($ostore_pro_cat, 'product_cat')); ?>" class="ostore-bottom-banner-img">
                                <div class="overimg">
                                    <img src="<?php echo esc_url($image); ?>" alt=""  />
                                </div>
                                <span class="ostore-banner-overly"></span>
                                <div class="bottom-img-info">
                                    <h3><?php echo esc_html( $term->name ); ?></h3>
                                    <h6><?php echo wp_kses_post(substr($term->description,0,100)); ?></h6>
                                    <span class="shop-now-btn"><?php esc_html_e('View more','ostore-pro'); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php  } ?>    
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?> 
        <?php         
        echo $after_widget;
    }
}