<?php
  /*### Pizza Slice ###*/
$slice = array(
    'name'                  => _x( 'Slice Panties Pizza', 'Post Type General Name', 'respanpiz theme' ),
		'singular_name'         => _x( 'Slice Panties Pizza', 'Post Type Singular Name', 'respanpiz theme' ),
		'menu_name'             => __( 'Slice Variant', 'respanpiz theme' ),
		'name_admin_bar'        => __( 'Slice Panties Pizza', 'respanpiz theme' ),
		'archives'              => __( 'Item Archives', 'respanpiz theme' ),
		'attributes'            => __( 'Item Attributes', 'respanpiz theme' ),
		'parent_item_colon'     => __( 'Parent Product:', 'respanpiz theme' ),
		'all_items'             => __( 'All Slice', 'respanpiz theme' ),
		'add_new_item'          => __( 'Add New Slice', 'respanpiz theme' ),
		'add_new'               => __( 'New Slice', 'respanpiz theme' ),
		'new_item'              => __( 'New Slice', 'respanpiz theme' ),
		'edit_item'             => __( 'Edit Slice', 'respanpiz theme' ),
		'update_item'           => __( 'Update Menu', 'respanpiz theme' ),
		'view_item'             => __( 'View Slice', 'respanpiz theme' ),
		'view_items'            => __( 'View Items', 'respanpiz theme' ),
		'search_items'          => __( 'Search menu', 'respanpiz theme' ),
		'not_found'             => __( 'No menu found', 'respanpiz theme' ),
		'not_found_in_trash'    => __( 'No menu found in Trash', 'respanpiz theme' ),
		'featured_image'        => __( 'Icon Image', 'respanpiz theme' ),
		'set_featured_image'    => __( 'Set icon image', 'respanpiz theme' ),
		'remove_featured_image' => __( 'Remove icon image', 'respanpiz theme' ),
		'use_featured_image'    => __( 'Use as icon image', 'respanpiz theme' ),
		'insert_into_item'      => __( 'Insert into item', 'respanpiz theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'respanpiz theme' ),
		'items_list'            => __( 'Items list', 'respanpiz theme' ),
		'items_list_navigation' => __( 'Items list navigation', 'respanpiz theme' ),
		'filter_items_list'     => __( 'Filter items list', 'respanpiz theme' ),
);

register_post_type(
          'pizza-slice', array(
          'labels'        => $slice,
          'public'        => true,
          'has_archive'   => true,
          'supports'      => array('title', 'editor', 'excerpt', 'thumbnail'),
          'menu_icon' 	  => get_template_directory_uri() . '/img/admin/btn-slice.png',
          'menu_position' => 4,
          'register_meta_box_cb' => 'add_metabox_fields',
        )
      );
      
?>