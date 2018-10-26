<?php
add_action( 'add_meta_boxes', 'ostore_pro_meta_box_add' );
function ostore_pro_meta_box_add()
{
   add_meta_box( 'ostore-meta-box-id', 'Display layout', 'ostore_pro_meta_box_cb', array('post'), 'normal', 'high' );
}

function ostore_pro_meta_box_cb()
{
   global $post;
   $layout = get_post_meta( $post->ID,'layout',true);
   
   // We'll use this nonce field later on when saving.
   wp_nonce_field( 'layout_nonce', 'meta_box_nonce' );
   ?>
   <p>
       Choose from following layout:<hr/>
       <input type="radio" name="layout" value="left-sidebar" <?php checked( $layout, 'left-sidebar' ); ?>>Left Sidebar
       <input type="radio" name="layout" value="right-sidebar" <?php checked( $layout, 'right-sidebar' ); ?>>Right Sidebar
       <input type="radio" name="layout" value="full-width" <?php checked( $layout, 'full-width' ); ?>>Full Width
   </p>
   
   <?php    
}

add_action( 'save_post', 'ostore_pro_meta_box_save' );

function ostore_pro_meta_box_save($news_id)
{
   // Bail if we're doing an auto save
   if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
   
   // if our nonce isn't there, or we can't verify it, bail
   if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'layout_nonce' ) ) return;
   
   
   
   // now we can actually save the data
   $allowed = array(
       'a' => array( // on allow a tags
           'href' => array() // and those anchors can only have href attribute
       )
   );

   if( isset( $_POST['layout'] ) )
       update_post_meta( $news_id, 'layout',  esc_attr( $_POST['layout'] ));

}


