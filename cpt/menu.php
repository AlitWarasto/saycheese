<?php
  /*### PIZZA MENU ###*/
$menus = array(
    'name'                  => _x( 'Menu Panties Pizza', 'Post Type General Name', 'saycheese' ),
		'singular_name'         => _x( 'Menu Panties Pizza', 'Post Type Singular Name', 'saycheese' ),
		'menu_name'             => __( 'Pizza Variant', 'saycheese' ),
		'name_admin_bar'        => __( 'Menu Panties Pizza', 'saycheese' ),
		'archives'              => __( 'Item Archives', 'saycheese' ),
		'attributes'            => __( 'Item Attributes', 'saycheese' ),
		'parent_item_colon'     => __( 'Parent Product:', 'saycheese' ),
		'all_items'             => __( 'All Pizza', 'saycheese' ),
		'add_new_item'          => __( 'Add New Pizza', 'saycheese' ),
		'add_new'               => __( 'New Pizza', 'saycheese' ),
		'new_item'              => __( 'New Pizza', 'saycheese' ),
		'edit_item'             => __( 'Edit Pizza', 'saycheese' ),
		'update_item'           => __( 'Update Menu', 'saycheese' ),
		'view_item'             => __( 'View Pizza', 'saycheese' ),
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
          'menu', array(
          'labels'        => $menus,
          'public'        => true,
          'has_archive'   => true,
          'supports'      => array('title', 'editor', 'thumbnail', 'categories'),
          'menu_icon' 	  => get_template_directory_uri() . '/img/admin/btn-menu.png',
          'menu_position' => 5,
          'taxonomies'    => array( 'category' ),
          'register_meta_box_cb' => 'add_metabox_fields',
        )
      );

?>