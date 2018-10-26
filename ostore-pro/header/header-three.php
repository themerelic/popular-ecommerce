<?php 
/**
* @see  ostore_pro_pro_top_header() 
* @see  ostore_pro_pro_main_header() 
*/ ?>
<div class="top_header_style_3 container-fluid ">
    <?php do_action('ostore_pro_top_header'); ?>
</div>
<nav id="primary-menu" class="primary-menu style-4 navbar navbar-default " data-spy="affix" data-offset-top="197" role="navigation"  >
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                 <div class="container">
          
                    <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation','ostore-pro'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php do_action("ostore_pro_logo_and_description"); ?>
                    
                    <?php if( ostore_pro_is_woocommerce_activated() ): ?>
                    <div class="pull-right">
                        <?php 
                            esc_html(ostore_pro_top_wishlist()); 
                            esc_html(ostore_pro_top_cart()); 
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="collapse navbar-collapse pull-left" id="bs-example-navbar-collapse-1">
                        <?php wp_nav_menu( 
                            array( 'theme_location' => 'menu-1',
                                    'container' => 'ul',
                                    'menu_class'=> 'nav dropdown navbar-nav'
                                ) 
                            ); 
                        ?>
                    </div><!-- /.navbar-collapse -->
                </div><!--/.container -->
                </div>
            </nav>