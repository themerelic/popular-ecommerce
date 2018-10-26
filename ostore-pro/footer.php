<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oStore-pro
 */
?>
  </div><!-- #content -->

  <?php 
  
  $subscribe_enable = get_theme_mod('ostore_pro_subscribe_enable',false);
  $social_links_enable = get_theme_mod('ostore_pro_social_links_enable',false);
  if( $subscribe_enable == true or $social_links_enable == true) : ?>
  <!-- Footer -->
  <div class="footer-newsletter">
    <div class="container">
      
      <div class="row">
        <?php 
        $subscribe_enable = get_theme_mod('ostore_pro_subscribe_enable');
        if($subscribe_enable==true){
          ostore_pro_subscription();
        } 
        if($social_links_enable==true){ ?>
          <div class="social col-md-4 col-sm-5">
              <?php ostore_pro_social_links(); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  
  <footer class="ostore-footer">
    <?php if( is_active_sidebar('first_footer') OR 
      is_active_sidebar('second_footer') OR is_active_sidebar('third_footer') OR
      is_active_sidebar('forth_footer') OR is_active_sidebar("fifth_footer")): ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-4">
              <?php dynamic_sidebar( 'first_footer' ); ?>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-2 collapsed-block">
            <?php dynamic_sidebar( 'second_footer' ); ?>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-2 collapsed-block">
            <?php dynamic_sidebar( 'third_footer' ); ?>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-2 collapsed-block">
            <?php dynamic_sidebar( 'forth_footer' ); ?>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-2 collapsed-block">
            <?php dynamic_sidebar( 'fifth_footer' ); ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <?php do_action('ostore_pro_footer_copyright_section'); 
           if(get_theme_mod('ostore_pro_btn_social_enable')==1): ?>
            <div class="footer-social col-sm-4 col-xs-12">
              <?php do_action("ostore_pro_footer_social_links"); ?>
            </div>
          <?php endif;
            do_action('ostore_pro_footer_payment_logo');
          ?>
        </div>
      </div>
    </div>


  </footer>
  
  <a href="#" class="totop"><i class="fa fa-angle-up"></i></a> 
</div>


<?php 
   $enable_pupup_subscription = get_theme_mod('ostore_pro_subscribe_pupup_enable',false);
  if($enable_pupup_subscription== 'true'){
    $subscription_setting = (array) get_option( 'subscription-popup-settings' );
    $popup_title = ( $subscription_setting["title"] );
    $popup_description = ( $subscription_setting["description"] );
    $popup_mailchimp_shortcode = ( $subscription_setting["mailchimp_shortcode"] );
    $background_img_id = ( $subscription_setting["background_image"] );
    $background_img_src = wp_get_attachment_image_src( $background_img_id,'new_letter' );

?>
<div class="popup-block-subscribe popup" style="display:none; ">
  <div style="display: none;" id="popup-newsletter">
    <form action="#" method="post" id="popup-newsletter-validate-detail" style="display: inline;">
      <div class="popup-block-content" style="background:url(<?php echo  esc_url($background_img_src[0]); ?>);">
        <div class="popup-right">
          <div class="form-subscribe-header popup-block-title">
            <label><?php echo esc_html($popup_title); ?></label>
          </div>
          <h2 class="sub-text"><?php echo esc_html($popup_description); ?></h2>
             <?php  echo do_shortcode($popup_mailchimp_shortcode); ?>
          <div class="social">
              <?php do_action("ostore_pro_footer_social_links"); ?>
          </div>
          <div class="subscribe-bottom">
            <input type="checkbox">
            <?php esc_html_e('Dont show this popup again','ostore-pro'); ?> </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>


<?php wp_footer(); ?>
</body>
</html>