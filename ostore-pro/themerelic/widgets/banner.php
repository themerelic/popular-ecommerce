<?php
// Register the news section
function ostore_pro_banner_widget() { 
  register_widget( 'ostore_pro_banner' );
}
add_action( 'widgets_init', 'ostore_pro_banner_widget' );

class ostore_pro_banner extends WP_Widget {
  // Set up the news section widget 
  public function __construct() {
     parent::__construct(
            'ostore_pro_banner', esc_html__('OS : Home Banner ', 'ostore-pro'), array(
            'description' => esc_html__('Ostore Banner Section', 'ostore-pro')
        ));
    }

    // Create the News section widget output.
  public function widget( $args, $instance ) {
      $banner_title = ( ! empty( $instance['title'] ) ) ? sanitize_text_field( $instance['title'] ) : 'Banner Title';
      $banner_desc = ( ! empty( $instance['banner_description'] ) ) ? wp_kses_post( $instance['banner_description'] ) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
      
      $banner_img_id = $instance[ 'background-img-id' ];
      $banner_img_url = wp_get_attachment_image_src( $banner_img_id, 'homepage-thumb' );

      
      $banner_btn_url = ( ! empty( $instance['banner_btn_url'] ) ) ? $instance['banner_btn_url'] : '';
      $banner_btn_text = ( ! empty( $instance['banner_btn_text'] ) ) ? sanitize_text_field( $instance['banner_btn_text'] ) : 'Shop Now';
      
      echo $args['before_widget']; 
      ?>
      <!-- .fullwidth -->
        <div class="discount parallax_3" style="background: #666 url(<?php echo esc_url($banner_img_url[0]); ?>)no-repeat; background-size:cover;">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix text-center">
                <div class="discount-info"> <span class="discount-info_small_txt wow fadeInUp text-center" data-wow-delay="0.6s" data-wow-duration="2s"><?php echo esc_html($banner_desc); ?></span> <span class="discount-info_shadow_txt wow fadeIn text-center" data-wow-delay="0.8s" data-wow-duration="2s"><?php echo esc_html($banner_title); ?></span> <a href="<?php echo esc_url($banner_btn_url); ?>" class="view" ><?php echo esc_attr($banner_btn_text); ?></a> </div>
                </div>
            </div>
            </div>
        </div>
       
      <?php 
      echo $args['after_widget'];
  }

   // Apply settings to the widget instance News Main Slider.
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance['banner_description'] = strip_tags( $new_instance['banner_description' ] );
    
    $instance[ 'background-img-id' ] = strip_tags( $new_instance[ 'background-img-id' ] );
    $instance[ 'banner_btn_url' ] = strip_tags( $new_instance[ 'banner_btn_url' ] );
    $instance[ 'banner_btn_text' ] = strip_tags( $new_instance[ 'banner_btn_text' ] );
    return $instance;
  }

  // Create the admin area widget settings form News Banner Promo Slider.
  public function form( $instance ) {

    /*********************************************
     * Default Value Set on Widget Section
     *******************************************/
    $defaults = array(
        'title'                 => __('Banner Title','ostore-pro'),
        'banner_description'    => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','ostore-pro'),
        'background-img-id'     => 'header-layout-2',
        'banner_btn_url'        => 'https://www.example.com/category-id',
        'banner_btn_text'       => __('Shop Now','ostore-pro'),
    );
    $instance = wp_parse_args( (array) $instance, $defaults );

  
  $title = isset($instance['title']) ? $instance['title'] : '';
  $banner_description = isset($instance['banner_description']) ? $instance['banner_description'] : '';
  $background_img_id =  isset($instance['background-img-id']) ? $instance['background-img-id'] : '';
  $background_img_src = wp_get_attachment_image_src( $background_img_id, 'homepage-thumb' ); 
  $banner_btn_url = isset($instance['banner_btn_url']) ? $instance['banner_btn_url'] : '';
  $banner_btn_text = isset($instance['banner_btn_text']) ? $instance['banner_btn_text'] : '';
  ?>

  <table class="news_widget">
    <tr>
      <td>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:','ostore-pro'); ?></label>
      </p>
      </td>
      <td>
        <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </td>
    </tr>

    <tr>
      <td>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('banner_description')); ?>"><?php esc_html_e('Description:','ostore-pro'); ?></label>
      </p>
      </td>
      <td>
      <input type="textarea" cols="35"  id="<?php echo esc_attr($this->get_field_id( 'banner_description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'banner_description' )); ?>" value="<?php echo esc_attr( $banner_description ); ?>" />
      </td>
    </tr>

    
    
    <tr>
      <td colspan="2">
        <label for="<?php echo esc_attr($this->get_field_id( 'background-img-id' )); ?>"><p><?php esc_html_e('Title Background:','ostore-pro'); ?><p></label>
        <div id="bg-img-container" class="bg-img-container" style="text-align: center;" >
            <img src="<?php echo esc_url($background_img_src[0]); ?>" alt="" >
        </div>
        <p>
        <input type="button" id="category_background" class ="category_background" value="Upload Image" />
        </p>
        <input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'background-img-id' )); ?>" class="background-img-id" name="<?php echo esc_attr($this->get_field_name( 'background-img-id' )); ?>" value="<?php echo esc_attr( $background_img_id ); ?>" />
      </td>
    </tr>

    <tr>
    <td>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('banner_btn_text')); ?>"><?php esc_html_e('Buttom Text:','ostore-pro'); ?></label>
    </p>
    </td>
    <td>
    <input type="textarea" cols="35"  id="<?php echo esc_attr($this->get_field_id( 'banner_btn_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'banner_btn_text' )); ?>" value="<?php echo esc_attr( $banner_btn_text ); ?>" />
    </td>
  </tr>

    <tr>
      <td>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'banner_btn_url' )); ?>"><?php esc_html_e('Botton URL','ostore-pro'); ?></label>
      </p>
      </td>
      <td>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'banner_btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'banner_btn_url' )); ?>" value="<?php echo esc_url( $banner_btn_url ); ?>" />
      </td>
    </tr>

 </table>

  <?php 
  }
}