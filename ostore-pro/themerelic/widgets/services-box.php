<?php
 /**
** Adds ostore_pro_service_box_widget widget.
**/
add_action('widgets_init', 'ostore_pro_service_box_widget');
function ostore_pro_service_box_widget() {
  register_widget('ostore_pro_service_box_widget_area');
}

class ostore_pro_service_box_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'ostore_pro_service_box_widget_area', 'OS: Service Box', array(
            'description' => __('widget that show service box section', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 

            'ostore_pro_service_style1' => array(
                'name' => 'ostore_pro_service_style1',
                'title' => __('Service Style', 'ostore-pro'),
                'type' => 'select',
                'options' => array(
                    'service_style_1' => __("Style 1", 'ostore-pro'),
                    'service_style_2' => __("Style 2", 'ostore-pro'),
                )
            ),           
			'ostore_pro_service_box_1_title' => array(
			  'name' => 'ostore_pro_service_box_1_title',
			  'title' => __('Box 1 Title', 'ostore-pro'),
			  'type' => 'text',
			),
			'ostore_pro_service_box_1_desc' => array(
			  'name' => 'ostore_pro_service_box_1_desc',
			  'title' => __('Box 1 Very Short Description', 'ostore-pro'),
			  'type' => 'textarea',
              'rows'  => 4
			),
            'ostore_pro_service_box_1_icon' => array(
			  'name' => 'ostore_pro_service_box_1_icon',
			  'title' => __('Box 1 Font Awesome Icon', 'ostore-pro'),
			  'type' => 'fa-icons'
			),
            //Service box 2
            'ostore_pro_service_box_2_title' => array(
			  'name' => 'ostore_pro_service_box_2_title',
			  'title' => __('Box 2 Title', 'ostore-pro'),
			  'type' => 'text',
			),
			'ostore_pro_service_box_2_desc' => array(
			  'name' => 'ostore_pro_service_box_2_desc',
			  'title' => __('Box 2 Short Description', 'ostore-pro'),
			  'type' => 'textarea',
              'rows'  => 4
			),
            'ostore_pro_service_box_2_icon' => array(
			  'name' => 'ostore_pro_service_box_2_icon',
			  'title' => __('Box 2 Font Awesome Icon', 'ostore-pro'),
			  'type' => 'fa-icons'
			),
            //Service Box 3
            
            'ostore_pro_service_box_3_title' => array(
			  'name' => 'ostore_pro_service_box_3_title',
			  'title' => __('Box 3 Title', 'ostore-pro'),
			  'type' => 'text',
			),
			'ostore_pro_service_box_3_desc' => array(
			  'name' => 'ostore_pro_service_box_3_desc',
			  'title' => __('Box 3 Short Description', 'ostore-pro'),
			  'type' => 'textarea',
              'rows'  => 4
			),
            'ostore_pro_service_box_3_icon' => array(
			  'name' => 'ostore_pro_service_box_3_icon',
			  'title' => __('Box 3 Font Awesome Icon', 'ostore-pro'),
			  'type' => 'fa-icons'
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
            'ostore_pro_service_style1'         => 'service_style_2',

            'ostore_pro_service_box_1_title'  	=> __('FREE DELIVERY','ostore'),
            'ostore_pro_service_box_1_desc'  	=> __('From $59.89','ostore'),
            'ostore_pro_service_box_1_icon'  	=> 'fa fa-ambulance',

            'ostore_pro_service_box_2_title'  	=> __('FREE RETURN','ostore'),
            'ostore_pro_service_box_2_desc'  	=> __('365 a day','ostore'),
            'ostore_pro_service_box_2_icon'  	=> 'fa fa-usd',

            'ostore_pro_service_box_3_title'  	=> __('SUPPORT 24/7','ostore'),
            'ostore_pro_service_box_3_desc'  	=> __('Online 24 hours','ostore'),
            'ostore_pro_service_box_3_icon'  	=> 'fa fa-user',

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
        $service_box_style = ( ! empty( $instance['ostore_pro_service_style1'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_style1'] ) : 'service_style_2';

        $service_box_text_1 = ( ! empty( $instance['ostore_pro_service_box_1_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_1_title'] ) : 'FREE DELIVERY';
        $service_box_text_2 = ( ! empty( $instance['ostore_pro_service_box_2_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_2_title'] ) : 'From $59.89';
        $service_box_text_3 = ( ! empty( $instance['ostore_pro_service_box_3_title'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_3_title'] ) : 'fa fa-ambulance';
       
        $service_box_desc_1 = ( ! empty( $instance['ostore_pro_service_box_1_desc'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_1_desc'] ) : 'FREE RETURN';
        $service_box_desc_2 = ( ! empty( $instance['ostore_pro_service_box_2_desc'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_2_desc'] ) : '365 a day';
        $service_box_desc_3 = ( ! empty( $instance['ostore_pro_service_box_3_desc'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_3_desc'] ) : 'fa fa-usd';

        $service_box_icon_1 = ( ! empty( $instance['ostore_pro_service_box_1_icon'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_1_icon'] ) : 'SUPPORT 24/7';
        $service_box_icon_2 = ( ! empty( $instance['ostore_pro_service_box_2_icon'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_2_icon'] ) : 'Online 24 hours';
        $service_box_icon_3 = ( ! empty( $instance['ostore_pro_service_box_3_icon'] ) ) ? sanitize_text_field( $instance['ostore_pro_service_box_3_icon'] ) : 'fa fa-user';


        echo $before_widget;
        if($service_box_style == 'service_style_1') {
        ?>  
        <div class="container">
            <div class="row column-no-padding ">
            <?php
                //Service Box first 
                ostore_pro_services_area($service_box_icon_1,$service_box_text_1,$service_box_desc_1); 
                //Service Box Second
                ostore_pro_services_area($service_box_icon_2,$service_box_text_2,$service_box_desc_2);
                //Service Box Third
                ostore_pro_services_area($service_box_icon_3,$service_box_text_3,$service_box_desc_3);
            ?>
            </div>
        </div>
        <?php }else{ ?>
            <!-- servives -->
            <div class="container">
                <div class="service">
                    <div class="row">
                        <?php 
                        //Service Box first 
                        ostore_pro_services_area_2($service_box_icon_1,$service_box_text_1,$service_box_desc_1); 
                        //Service Box Second
                        ostore_pro_services_area_2($service_box_icon_2,$service_box_text_2,$service_box_desc_2);
                        //Service Box Third
                        ostore_pro_services_area_2($service_box_icon_3,$service_box_text_3,$service_box_desc_3);
                        ?>
                    </div>
                </div>
            </div>    
            <!-- end services -->
        <?php }      
        echo $after_widget;
    }
}