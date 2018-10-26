<?php 
/*Ostore Custom Testimonial */
function ostore_pro_testimonial() { 
  register_post_type( 'testimonials',     
    array( 'labels' => 
        array(
        'name' => esc_html__( 'Testimonial', 'ostore-pro' ),
        'singular_name' => esc_html__( 'Testimonial', 'ostore-pro' ), 
        'all_items' => esc_html__( 'All Testimonial', 'ostore-pro' ), 
        'add_new' => esc_html__( 'Add New', 'ostore-pro' ), 
        'add_new_item' => esc_html__( 'Add New Testimonial', 'ostore-pro' ), 
        'edit' => esc_html__( 'Edit Testimonial', 'ostore-pro' ), 
        'edit_item' => esc_html__( 'Edit', 'ostore-pro' ), 
        'new_item' => esc_html__( 'New Post Testimonial', 'ostore-pro' ), 
        'view_item' => esc_html__( 'View Testimonial', 'ostore-pro' ), 
        'search_items' => esc_html__( 'Search Testimonial', 'ostore-pro' ),
        'not_found' =>  esc_html__( 'Nothing found in the Database.', 'ostore-pro' ), 
        'not_found_in_trash' => esc_html__( 'Nothing found in Trash', 'ostore-pro' ), 
        'parent_item_colon' => ''
        ), 
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 4,
      'menu_icon' => 'dashicons-businessman',
      'rewrite' => array( 'slug' => 'testimonial', 'with_front' => false ), 
      'has_archive' => 'testimonial',
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','comments')
    ) 
  ); 
}
add_action( 'init', 'ostore_pro_testimonial');

