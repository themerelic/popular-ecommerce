<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ostore-child
 */
?>
	
  <footer class="ostore-footer">
    <?php if( is_active_sidebar('first_footer') OR 
      is_active_sidebar('second_footer') OR is_active_sidebar('third_footer') OR
      is_active_sidebar('forth_footer') OR is_active_sidebar("fifth_footer")): ?>
      <div class="footer-widget">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                  <?php dynamic_sidebar( 'first_footer' ); ?>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                <?php dynamic_sidebar( 'second_footer' ); ?>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                <?php dynamic_sidebar( 'third_footer' ); ?>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                <?php dynamic_sidebar( 'forth_footer' ); ?>
            </div>
          </div>
        </div>
      </div>  
    <?php endif; ?>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <?php do_action('popular_ecommerce_copyright_section'); ?>

            <div class="col-sm-6 col-xs-12 footer-menu">
                <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                        'container'		 =>	 'ul',
                        'menu_class'	 =>  'footer-links'
                    ) ); 
                ?>
            </div>
        </div>
      </div>
    </div>
  </footer>
  
  <a href="#" class="totop"><i class="fa fa-angle-up"></i></a> 
</div>
<?php wp_footer(); ?>
</body>
</html>