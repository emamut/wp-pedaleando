<?php
function custom_post_type() {

// Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x( 'Bikes', 'Post Type General Name', 'bikes' ),
    'singular_name'       => _x( 'Bike', 'Post Type Singular Name', 'bikes' ),
    'menu_name'           => __( 'Bikes', 'bikes' ),
    'parent_item_colon'   => __( 'Parent Bike', 'bikes' ),
    'all_items'           => __( 'All Bikes', 'bikes' ),
    'view_item'           => __( 'View Bike', 'bikes' ),
    'add_new_item'        => __( 'Add New Bike', 'bikes' ),
    'add_new'             => __( 'Add New', 'bikes' ),
    'edit_item'           => __( 'Edit Bike', 'bikes' ),
    'update_item'         => __( 'Update Bike', 'bikes' ),
    'search_items'        => __( 'Search Bike', 'bikes' ),
    'not_found'           => __( 'Not Found', 'bikes' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'bikes' ),
  );

// Set other options for Custom Post Type

  $args = array(
    'label'               => __( 'bikes', 'bikes' ),
    'description'         => __( 'Bikes and accesories', 'bikes' ),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'thumbnail', 'revisions', ),
    // You can associate this CPT with a taxonomy or custom taxonomy.
    'taxonomies'          => array( 'category' ),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_icon'           => 'dashicons-store',
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,

  );

  // Registering your Custom Post Type
  register_post_type( 'bikes', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );