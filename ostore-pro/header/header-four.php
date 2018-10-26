<?php 
/**
* @see  ostore_pro_pro_top_header() 
* @see  ostore_pro_pro_main_header() 
*/ ?>
<div class="top_header_style_2">
   <?php  //do_action('ostore_pro_top_header'); ?>
</div>
</div>
<div id="header-wrap " class="header-wrap-2">
<div class="container">
<!-- Header Logo -->
    <div class="row">
    <div class="hidden-sm hidden-lg hidden-md col-xs-3">
                <button type="button" class="navbar-toggle pull-left header-two-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php esc_html_e('Toggle navigation','ostore-pro'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        <div class="col-sm-4 hidden-xs">
            <?php do_action('ostore_pro_header_search_bar'); ?>
        </div>
        <div class="col-sm-4 col-xs-6 center-header">
            <!-- Header Logo -->
            <div class="logo pull-left">
                <?php the_custom_logo(); ?>
                <div class="logo site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    <?php
                    $description = get_bloginfo( 'description', 'display' ); ?>
                    <p class="site-description"><?php echo esc_html($description);  ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-3">
        <?php if( ostore_pro_is_woocommerce_activated() ): ?>
            <div class="pull-right">
                <?php 
                    esc_html(ostore_pro_top_wishlist()); 
                    esc_html(ostore_pro_top_cart()); 
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<nav id="primary-menu" class="primary-menu style-4 navbar navbar-default header-two" role="navigation"  >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="container">
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <?php wp_nav_menu( 
                array( 'theme_location' => 'menu-1',
                        'container' => 'ul',
                        'menu_class'=> 'nav dropdown navbar-nav nav-dark',
                    ) 
                ); 
            ?>
        </div><!-- /.navbar-collapse -->
        
        </div><!--/.container -->
        </div>
</nav>