<?php
/**
 * oStore-pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oStore-pro
 */
 if( !function_exists('ostore_pro_file_directory') ){

    function ostore_pro_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Load KCustomizer Class for customizer 
 */
require ostore_pro_file_directory('themerelic/KCustomizer.php');


/**
 * Load Header Class File 
 */
if( ostore_pro_pro_is_woocommerce_activated() ){
    require ostore_pro_file_directory('themerelic/hooks/woocommerce.php');
}
require ostore_pro_file_directory('themerelic/hooks/ostore-hook.php');
require ostore_pro_file_directory('themerelic/hooks/osotre-homepage-hook.php');
/**
* Customizer
**/
require ostore_pro_file_directory('themerelic/customizer.php');

require ostore_pro_file_directory('themerelic/KWidget.php');

/**
* Widgets
**/

require ostore_pro_file_directory('themerelic/widgets/blog.php');
require ostore_pro_file_directory('themerelic/widgets/services-box.php');
require ostore_pro_file_directory('themerelic/widgets/banner.php');
require ostore_pro_file_directory('themerelic/widgets/testimonial.php');

if( ostore_pro_pro_is_woocommerce_activated() ){

    require ostore_pro_file_directory('themerelic/widgets/special-product.php');
    require ostore_pro_file_directory('themerelic/widgets/category-product-slider.php');
    require ostore_pro_file_directory('themerelic/widgets/product-list.php');
    require ostore_pro_file_directory('themerelic/widgets/hlp-products.php');
    require ostore_pro_file_directory('themerelic/widgets/hot-deal.php');
    require ostore_pro_file_directory('themerelic/widgets/category-collections.php');
    require ostore_pro_file_directory('themerelic/widgets/tab.php');
}


/**
 * MetaBox
 */
require ostore_pro_file_directory('themerelic/metabox/post-layout.php');
require ostore_pro_file_directory('themerelic/metabox/testimonial-metabox.php');


/**
 * MetaBox
 */
require ostore_pro_file_directory('themerelic/dynamic-css.php');

 /**
 * Customizer Cantrol Option
 */
require ostore_pro_file_directory('themerelic/customizer/customizer-control.php');

 /**
 * Load demo impoter file
*/
require ostore_pro_file_directory('themerelic/import/ostore-importer.php');

/**
*Load Setting Page File
*/
require ostore_pro_file_directory('themerelic/setting/setting-page.php');