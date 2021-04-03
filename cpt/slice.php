<?php
  /*### Pizza Slice ###*/
$slice = array(
  'name'                  => _x( 'Slice Panties Pizza', 'Post Type General Name', 'saycheese' ),
	'singular_name'         => _x( 'Slice Panties Pizza', 'Post Type Singular Name', 'saycheese' ),
	'menu_name'             => __( 'Slice Variant', 'saycheese' ),
	'name_admin_bar'        => __( 'Slice Panties Pizza', 'saycheese' ),
	'archives'              => __( 'Item Archives', 'saycheese' ),
	'attributes'            => __( 'Item Attributes', 'saycheese' ),
	'parent_item_colon'     => __( 'Parent Product:', 'saycheese' ),
	'all_items'             => __( 'All Slice', 'saycheese' ),
	'add_new_item'          => __( 'Add New Slice', 'saycheese' ),
	'add_new'               => __( 'New Slice', 'saycheese' ),
	'new_item'              => __( 'New Slice', 'saycheese' ),
	'edit_item'             => __( 'Edit Slice', 'saycheese' ),
	'update_item'           => __( 'Update Menu', 'saycheese' ),
	'view_item'             => __( 'View Slice', 'saycheese' ),
	'view_items'            => __( 'View Items', 'saycheese' ),
	'search_items'          => __( 'Search menu', 'saycheese' ),
	'not_found'             => __( 'No menu found', 'saycheese' ),
	'not_found_in_trash'    => __( 'No menu found in Trash', 'saycheese' ),
	'featured_image'        => __( 'Icon Image', 'saycheese' ),
	'set_featured_image'    => __( 'Set icon image', 'saycheese' ),
	'remove_featured_image' => __( 'Remove icon image', 'saycheese' ),
	'use_featured_image'    => __( 'Use as icon image', 'saycheese' ),
	'insert_into_item'      => __( 'Insert into item', 'saycheese' ),
	'uploaded_to_this_item' => __( 'Uploaded to this item', 'saycheese' ),
	'items_list'            => __( 'Items list', 'saycheese' ),
	'items_list_navigation' => __( 'Items list navigation', 'saycheese' ),
	'filter_items_list'     => __( 'Filter items list', 'saycheese' ),
);

register_post_type(
  'pizza-slice', array(
  'labels'        => $slice,
  'public'        => true,
  'has_archive'   => true,
  'supports'      => array('title', 'editor', 'excerpt', 'thumbnail'),
  'menu_icon' 	  => get_template_directory_uri() . '/img/admin/btn-slice.png',
  'menu_position' => 4,
  'taxonomies'    => array( 'category' ),
  'register_meta_box_cb' => 'add_metabox_fields',
	)
);   
?>