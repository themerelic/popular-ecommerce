<?php
add_action( 'wp_ajax_ostore_pro_demo_import', 'ostore_pro_action_callback' );
function ostore_pro_action_callback(){
    global $wpdb; 
    
    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

    // Load Importer API
    require_once ABSPATH . 'wp-admin/includes/import.php';
    $importer_error = false;

    if ( ! class_exists( 'WP_Importer' ) ) {
        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
        if ( file_exists( $class_wp_importer ) ){
            require_once $class_wp_importer;
        }else{
			$importer_error = true;
		}
    }

    if ( ! class_exists( 'WP_Import' ) ) {
        $class_wp_importer = get_template_directory() ."/themerelic/import/wordpress-importer.php";
        if ( file_exists( $class_wp_importer ) ){
            require_once $class_wp_importer;
        }else{
            $importer_error = true;
        }
    }

    if($importer_error){
			die("Import error! Please unninstall Wordpress importer plugin and try again");
    }else{
        // Get the xml file from directory 
        $import_filepath = get_template_directory() ."/themerelic/import/tmp/ostore-fashion.xml";
        require get_template_directory() . '/themerelic/import/ostore-import.php';

        $wp_import = new ostore_pro_import();
        $wp_import->fetch_attachments = true;
        $wp_import->import($import_filepath);
        $wp_import->set_widgets();
        $wp_import->set_theme_mods();
        $wp_import->set_menu();      

	    $page = get_page_by_path('home');
        if ($page) {
            $page_id  = $page->ID;
        }
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_id );
    }
    
    die(); // this is required to return a proper result 
}