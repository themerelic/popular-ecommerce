<?php
 /**
** Adds Tab widget.
**/
add_action('widgets_init', 'testimonials_widget');
function testimonials_widget() {
  register_widget('testimonials_widget_area');
}

class testimonials_widget_area extends WP_Widget {

    /**
    * Register widget with WordPress.
    **/
    protected $kwidget; 
    public function __construct() {
        parent::__construct(
            'testimonials_widget_area', 'OS: Testimonials Slider  ', array(
            'description' => esc_html__('Ostore Testimonials Slider Options', 'ostore-pro')
        ));

        $this->kwidget = KWidget::get_instance();
    }
    
    /*
    * prepare fields array
    */
    private function widget_fields() {
       return array( 
            'ostore_pro_testimonials_title' => array(
              'name' => 'ostore_pro_testimonials_title',
              'title' => __('Testimonials Main Title', 'ostore-pro'),
              'type' => 'text'
            ),
            'number_of_testimonials' => array(
              'name' => 'number_of_testimonials',
              'title' => __('Testimonials Main Title', 'ostore-pro'),
              'type' => 'text',
              'default' =>3
            ),
            'testimonials_background_image' => array(
              'name' => 'testimonials_background_image',
              'title' => __('Testimonials Background Image', 'ostore-pro'),
              'type' => 'image'
            ),
            'ostore_pro_testimonials_layout' => array(
                'name' => 'ostore_pro_testimonials_layout',
                'title' => __('Testimonials Layout', 'ostore-pro'),
                'type' => 'select',
                      'options' => array(
                          'testimonials-center' => __("Testimonials Center", 'ostore-pro'),
                          'left-image-testimonials' => __("Left Images Layout", 'ostore-pro'),
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
        $ostore_pro_testimonials_title = $instance['ostore_pro_testimonials_title']; 
        $number_of_testimonials = $instance['number_of_testimonials'];
        $testimonials_image = $instance['testimonials_background_image'];
        $ostore_pro_testimonials_layout = $instance['ostore_pro_testimonials_layout'];
        
        echo $before_widget;
        ?> 
         <!-- Testimonials Box --> 
          <div class="testimonials discount parallax_3"  style="background:url(<?php echo esc_url($testimonials_image);?>)no-repeat 0px 0px fixed; background-size: cover;" >
            <div class="content">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="testimonials-title" >
                        <h1><?php echo $ostore_pro_testimonials_title; ?></h1>
                    </div>
                    <div class="slider-items-products">
                      <div id="testimonials-slider" class="product-flexslider hidden-buttons home-testimonials">
                        <div class="slider-items slider-width-col4 fadeInUp">
                          
                          <?php
                            $args = array(
                                'post_type' => 'testimonials',
                                'posts_per_page' => $number_of_testimonials,
                                'orderby' => 'rand'
                            );
                            $testimonials = new WP_Query( $args );
                            // The Loop
                            if ( $testimonials->have_posts() ) {
                              while ( $testimonials->have_posts() ) {
                                      $testimonials->the_post();

                                      $company_name = get_post_meta(get_the_ID(), 'company', true);
                                      $client_name = get_post_meta(get_the_ID(), 'client_name', true);
                                      
                                      /*Socal Links */
                                      $facebook_url = get_post_meta(get_the_ID(), 'facebook_url', true);
                                      $google_plus_url = get_post_meta(get_the_ID(), 'google_plus_url', true);
                                      $twitter_url = get_post_meta(get_the_ID(), 'twitter_url', true);
                                      $linkedin_url = get_post_meta(get_the_ID(), 'linkedin_url', true);
                                      $instagram_url = get_post_meta(get_the_ID(), 'instagram_url', true);
                                      ?>
                              <div class="holder">

                                <?php if($ostore_pro_testimonials_layout=='testimonials-center'){
                                    if(has_post_thumbnail()  ): ?><div class="thumb"> <?php the_post_thumbnail('testimonial'); ?>  </div><?php endif ?>
                                    <?php the_content(); ?>
                                    <center>
                                  <div class="social" >
                                    <ul class="inline-mode" style="text-align: center; float: none;margin:10px">
                                        <?php if(!empty( $facebook_url) ) { ?><li class="social-network fb"><a title="<?php esc_attr('Connect us on Facebook','ostore-pro') ?>" target="_blank" href="<?php echo esc_url($facebook_url);  ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                        <?php if(!empty( $google_plus_url) ) { ?><li class="social-network googleplus"><a title="<?php esc_attr('Connect us on Google+','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($google_plus_url); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                        <?php if(!empty( $twitter_url) ) { ?><li class="social-network tw"><a title="<?php esc_attr('Connect us on Twitter','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($twitter_url);  ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                        <?php if(!empty( $linkedin_url) ) { ?><li class="social-network linkedin"><a title="<?php esc_attr('Connect us on Linkedin','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                                        <?php if(!empty( $instagram_url) ) { ?><li class="social-network instagram_url"><a title="<?php esc_attr('Connect us on Instagram','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($instagram_url);  ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                                    </ul>
                                  </div>
                                </center>
                                <?php if (!empty($client_name)): ?><strong class="name"><?php echo $company_name; ?></strong> <?php endif; ?> 
                                <?php if (!empty($company_name)): ?><strong class="designation"><?php echo $client_name; ?></strong> <?php endif; ?>
                                

                                <?php }else{ ?>
                                    <div class="col-lg-4">
                                    <?php if(has_post_thumbnail()): ?><div class="thumb"> <img src="<?php echo get_the_post_thumbnail_url();  ?>" alt="testimonials img"> </div><?php endif ?>
                                    <?php if (!empty($client_name)): ?><strong class="name"><?php echo $company_name; ?></strong> <?php endif; ?> 
                                    <?php if (!empty($company_name)): ?><strong class="designation"><?php echo $client_name; ?></strong> <?php endif; ?>
                                
                                  </div>
                                  <div class="col-lg-8">
                                    <div class="layout-2-testimonial">
                                      <div class="left-content"><?php the_content(); ?></div>
                                        <div class="social" >
                                          <ul class="inline-mode" style="text-align: left; float: none;">
                                              <?php if(!empty( $facebook_url) ) { ?><li class="social-network fb"><a title="<?php esc_attr('Connect us on Facebook','ostore-pro') ?>" target="_blank" href="<?php echo esc_url($facebook_url);  ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                              <?php if(!empty( $google_plus_url) ) { ?><li class="social-network googleplus"><a title="<?php esc_attr('Connect us on Google+','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($google_plus_url); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                              <?php if(!empty( $twitter_url) ) { ?><li class="social-network tw"><a title="<?php esc_attr('Connect us on Twitter','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($twitter_url);  ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                              <?php if(!empty( $linkedin_url) ) { ?><li class="social-network linkedin"><a title="<?php esc_attr('Connect us on Linkedin','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                                              <?php if(!empty( $instagram_url) ) { ?><li class="social-network instagram_url"><a title="<?php esc_attr('Connect us on Instagram','ostore-pro'); ?>" target="_blank" href="<?php echo esc_url($instagram_url);  ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                                          </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 
                            </div>

                            <?php }} ?>
                             <?php wp_reset_postdata();?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Testimonials Box -->
        
        <?php        
        echo $after_widget;
    }
}