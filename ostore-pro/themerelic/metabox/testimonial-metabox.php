<?php 
function my_add_meta_box(){
    add_meta_box( 'testimonial-details', 'Testimonial Details', 'my_meta_box_cb', 'testimonials', 'normal', 'default');
}
function my_meta_box_cb($post){
    $values = get_post_custom( $post->ID );
    $client_name = isset( $values['client_name'] ) ? esc_attr( $values['client_name'][0] ) : "";
    $company = isset( $values['company'] ) ? esc_attr( $values['company'][0] ) : "";
    
    /*Social Links */
    $facebook_url = isset( $values['facebook_url'] ) ? esc_attr( $values['facebook_url'][0] ) : "";
    $google_plus_url = isset( $values['google_plus_url'] ) ? esc_attr( $values['google_plus_url'][0] ) : "";
    $twitter_url = isset( $values['twitter_url'] ) ? esc_attr( $values['twitter_url'][0] ) : "";
    $linkedin_url = isset( $values['linkedin_url'] ) ? esc_attr( $values['linkedin_url'][0] ) : "";
    $instagram_url = isset( $values['instagram_url'] ) ? esc_attr( $values['instagram_url'][0] ) : "";


    wp_nonce_field( 'testimonial_details_nonce_action', 'testimonial_details_nonce' );
    $html = '';
    $html .= '<label>Client Name</label>';
    $html .= '<input type="text" name="client_name" id="client_name" style="width:250px; margin-top:15px; margin-left:9px; margin-bottom:10px;" value="'. $client_name .'" /><br/>';
    $html .= '<label>Company</label>';
    $html .= '<input type="text" name="company" id="company" style="width:250px; margin-left:25px; margin-bottom:15px;" value="'. $company .'" />';

    /*Social Links */
    $html .= '<br ><table><tr><th><h1><strong>Social Links</strong></h1></th></tr><tr><td><label>Facebook URL</label></td>';
    $html .= '<td><input type="text" name="facebook_url" id="facebook_url" style="width:250px; margin-left:25px; margin-bottom:15px;" value="'. $facebook_url .'" /></td><tr>';

    $html .= '<tr><td><label>Twitter URL</label></td>';
    $html .= '<td><input type="text" name="twitter_url" id="twitter_url" style="width:250px; margin-left:25px; margin-bottom:15px;" value="'. $twitter_url .'" /></td></td>';

    $html .= '<tr><td><label>Google-plus URL</label></td>';
    $html .= '<td><input type="text" name="google_plus_url" id="google_plus_url" style="width:250px; margin-left:25px; margin-bottom:15px;" value="'. $google_plus_url .'" /></td></tr>';


    $html .= '<tr><td><label>Instagram URL</label></td>';
    $html .= '<td><input type="text" name="instagram_url" id="instagram_url" style="width:250px; margin-left:25px; margin-bottom:15px;" value="'. $instagram_url .'" /></td></tr>';

    $html .= '<tr><td><label>Linkedin URL</label></td>';
    $html .= '<td><input type="text" name="linkedin_url" id="linkedin_url" style="width:250px; margin-left:25px; margin-bottom:15px;" value="'. $linkedin_url .'" /></td></tr></table>';

    echo $html;
}
function my_save_meta_box($post_id){
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
 
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['testimonial_details_nonce'] ) || !wp_verify_nonce( $_POST['testimonial_details_nonce'], 'testimonial_details_nonce_action' ) ) return;
 
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
 
    if(isset( $_POST['client_name'] ) )
        update_post_meta( $post_id, 'client_name', $_POST['client_name']);

    if(isset( $_POST['client_name'] ) )
        update_post_meta( $post_id, 'client_name', $_POST['client_name']);
 
    if(isset( $_POST['company'] ) )
        update_post_meta( $post_id, 'company', $_POST['company']);

    /*social links */
    if(isset( $_POST['facebook_url'] ) )
        update_post_meta( $post_id, 'facebook_url', $_POST['facebook_url']);

    if(isset( $_POST['twitter_url'] ) )
        update_post_meta( $post_id, 'twitter_url', $_POST['twitter_url']);

    if(isset( $_POST['google_plus_url'] ) )
        update_post_meta( $post_id, 'google_plus_url', $_POST['google_plus_url']);

    if(isset( $_POST['linkedin_url'] ) )
        update_post_meta( $post_id, 'linkedin_url', $_POST['linkedin_url']);

    if(isset( $_POST['instagram_url'] ) )
        update_post_meta( $post_id, 'instagram_url', $_POST['instagram_url']);

}
add_action( 'add_meta_boxes', 'my_add_meta_box' );
add_action( 'save_post', 'my_save_meta_box' );