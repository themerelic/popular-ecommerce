<?php 
add_action( 'admin_menu', 'subscription_setting' );
function subscription_setting() {
    add_options_page( 'Subscription Popup Settings','Subscription Popup Settings', 'manage_options', 'subscription_popup', 'subscription_popup_options_page' );
}
add_action( 'admin_init', 'ostore_pro_admin_init' );

function ostore_pro_admin_init() {
    register_setting( 'ostore-menu-group', 'subscription-popup-settings' );
 
    add_settings_section( 'menu-setting-section', __( '', 'ostore-pro' ), 'menu_setting_callback', 'subscription_popup' );

    add_settings_field( 'title', __( 'Title', 'ostore-pro' ), 'title_callback', 'subscription_popup', 'menu-setting-section' );
    
    add_settings_field( 'mailchimp_shortcode', __( 'Mailchimp Shortcode', 'ostore-pro' ), 'mailchimp_shortcode_callback', 'subscription_popup', 'menu-setting-section' );

    add_settings_field( 'description', __( 'Description', 'ostore-pro' ), 'description_callback', 'subscription_popup', 'menu-setting-section' );
    
    add_settings_field( 'background_image', __( 'Background Image', 'ostore-pro' ), 'background_image_callback', 'subscription_popup', 'menu-setting-section' );


function subscription_popup_options_page() {
?>
  <div class="wrap">
      <h2><?php esc_html_e('Menu Settings', 'ostore-pro'); ?></h2>
      <form action="options.php" method="POST">
        <?php settings_fields('ostore-menu-group'); ?>
        <?php do_settings_sections('subscription_popup'); ?>
        <?php submit_button(); ?>
      </form>
  </div>
<?php }

function menu_setting_callback() {
    esc_html_e( '', 'ostore-pro' );
}



function title_callback() {
    echo ostore_pro_title_page();
}

function mailchimp_shortcode_callback(){
    echo mailchimp_shortcode();
}


function description_callback() {
    echo ostore_pro_description_page();
}
function background_image_callback() {
    $settings = (array) get_option( 'subscription-popup-settings' );
    $background_img_id =  ( $settings["background_image"] );
    $background_img_src = wp_get_attachment_image_src( $background_img_id);

    ?>
    <div id="bg-img-container">
    <?php if ( $background_img_src ) : ?>
        <img src="<?php echo $background_img_src[0] ?>" alt="" style="max-width:50%;" />
    <?php endif; ?>
    </div>
    
    <input type="button" id="ostore_pro_menu_background" value="Upload Image"></input>
    <input type="hidden" id="background-img-id" name="subscription-popup-settings[background_image]" value="<?php echo $background_img_id; ?>">
    <?php
}
}

function ostore_pro_title_page(){
    $settings = (array) get_option( 'subscription-popup-settings' );
    $title =  ( $settings["title"] );
    if(empty($title)){
        $title = 'SIGNUP FOR OUR NEWSLETTER & PROMOTIONS';
    }
    ob_start();
    ?>
    <input type='text' name="subscription-popup-settings[title]" value='<?php echo $title; ?>'></input>
    <?php return ob_get_clean();
}

function mailchimp_shortcode(){
    $settings = (array) get_option( 'subscription-popup-settings' );
    $mailchimp_shortcode =  ( $settings["mailchimp_shortcode"] );
    ob_start();
    ?>
    <input type='text' name="subscription-popup-settings[mailchimp_shortcode]" value='<?php echo $mailchimp_shortcode; ?>'></input>
    <?php return ob_get_clean();
}

function ostore_pro_description_page(){
    $settings = (array) get_option( 'subscription-popup-settings' );
    $description =  ( $settings["description"] );
    ob_start();
    ?>
    <textarea rows="4" cols="50" name="subscription-popup-settings[description]"><?php echo $description; ?></textarea>
    <?php return ob_get_clean();
}

/** Demo Data Import Link */
/** Step 1. */
function ostore_pro_import_demo_data_menu() {
	add_options_page( 'Ostore Pro Demo Data Import', 'Ostore Pro Demo Data Import', 'manage_options', 'ostore-pro-demo-data-import', 'ostore_pro_import_demo_data_options' );
}
/** Step 2 (from text above). */
add_action( 'admin_menu', 'ostore_pro_import_demo_data_menu' );

/** Step 3. */
function ostore_pro_import_demo_data_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    echo '<div class="wrap">';
    echo "<h3>Are you sure to reset your store with demo data? All your theme settings will be overwritten </h3>";
	echo '<a href="'. home_url( 'wp-admin/admin-ajax.php?action=ostore_pro_demo_import' ).'"> Click Here </a>';
	echo '</div>';
}