<?php
/**
 * Popular eCommerceTheme Customizer
 *
 * @package Popular_ecommerce
 */
	

$popular_ecommerce_panels   = array( 'typography');
$popular_ecommerce_sub_sections = array(
    'typography' => array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
);


foreach( $popular_ecommerce_panels as $panel ){
   require get_stylesheet_directory() . '/themerelic/customizers/panels/' . $panel . '.php';
}

foreach( $popular_ecommerce_sub_sections as $k => $v ){
    foreach( $v as $w ){        
        require get_stylesheet_directory() . '/themerelic/customizers/panels/' . $k . '/' . $w . '.php';
    }
}

//customizer file settings hear
function popular_ecommerce_customizer_scripts() {
	 //Popular ecommerce style
     wp_enqueue_style('popular_ecommerce_customizer_style', get_theme_file_uri().'/themerelic/customizers/css/customizer-popular.css' );
	
}
add_action( 'customize_preview_init', 'popular_ecommerce_customizer_scripts' );



/*****************************************************
 * Sanitize callback for checkbox
****************************************************/
require get_stylesheet_directory() . '/themerelic/customizers/sanitization-functions.php';