<?php

/*Ostore Page Layout Setting */
if ( ! function_exists( 'ostore_pro_get_layout' ) ) :
function ostore_pro_get_layout() {
	global $post;

	$layout = get_theme_mod( 'archive_page_layout_option', 'right-sidebar' );

	// Front page displays in Reading Settings
	$page_for_posts = get_option('page_for_posts');

	// Get Layout meta
	if($post) {
		$post_specific_layout = get_post_meta( $post->ID, 'layout', true );
	}
	// Home page if Posts page is assigned
	if( is_home() && !( is_front_page() ) ) {
		$queried_id  = get_option( 'page_for_posts' );
		$post_specific_layout = get_post_meta( $queried_id, 'layout', true );

		if( !empty($post_specific_layout) && $post_specific_layout != 'default-layout' ) {
			$layout = get_post_meta( $post->ID, 'layout', true );
		}
	}

	elseif( is_page() ) {
		$layout = get_theme_mod( 'ostore_pro_page_layout_option', 'right-sidebar' );
		if( !empty($post_specific_layout) && $post_specific_layout != 'default-layout' ) {
			$layout = get_post_meta( $post->ID, 'layout', true );
		
		}
	}

	elseif( is_single() ) {
		$layout = get_theme_mod( 'ostore_pro_single_page_layout_option', 'right-sidebar' );
		if( !empty($post_specific_layout) && $post_specific_layout != 'default-layout' ) {
			$layout = get_post_meta( $post->ID, 'layout', true );
		}
	}

	return $layout;
}
endif;


/**
 * Ostore WooCommerce Breadcrumbs Function
*/
add_filter( 'woocommerce_breadcrumb_defaults', 'ostore_pro_pro_woocommerce_breadcrumbs' );
function ostore_pro_pro_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' &#47; ',
        'wrap_before' => '<div class="woocommerce-breadcrumb" itemprop="breadcrumb">',
        'wrap_after'  => '</div>',
        'before'      => '',
        'after'       => '',
        'home'        => esc_html__( 'Home', 'ostore-pro'),
    );
}


/**
 * ostore Breadcrumbs Function Area
*/
if ( ! function_exists( 'ostore_pro_pro_breadcrumb_woocommerce' ) ) {    
    function ostore_pro_pro_breadcrumb_woocommerce() {
        $breadcrumb_options = get_theme_mod('ostore_pro_woocommerce_enable_disable_section', 'disable');
        $breadcrumb_bg_image = get_theme_mod('ostore_pro_breadcrumbs_woocommerce_background_image', get_template_directory_uri(). "/assets/images/banner-img.png");
        $breadcrumb_menu = get_theme_mod('ostore_pro_woocommerce_breadcrumb_only_enable_disable_options', 'disable');

        if($breadcrumb_options == 'enable' and ostore_pro_pro_is_woocommerce_activated() ) { ?>
            <div class="page_header_wrap " style="background:url('<?php echo esc_url($breadcrumb_bg_image); ?>') no-repeat center; background-size: cover; background-attachment:fixed;">
                <div class="container">
                    <?php   woocommerce_breadcrumb(); ?>
                </div>

            </div>
        <?php }
    }
}
add_action( 'breadcrumb-woocommerce', 'ostore_pro_pro_breadcrumb_woocommerce' );
add_action( 'breadcrumb-normal', 'ostore_pro_pro_breadcrumb_woocommerce' );
