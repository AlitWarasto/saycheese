<?php
/*********************
 * Custome metaboxes.
 *********************/
function add_metabox_fields() {

	add_meta_box(
		'harga_wil_1',
		'Harga Wilayah 1 Rp.',
		'harga_wil_1',
		array('menu','beverage','rice','pasta','pizza-slice'),
		'normal',
		'high'
	);

	add_meta_box(
		'harga_wil_2',
		'Harga Wilayah 2 Rp.',
		'harga_wil_2',
		array('menu','beverage','rice','pasta','pizza-slice'),
		'normal',
		'high'
	);
	add_meta_box(
		'harga_wil_3',
		'Harga Wilayah 3 Rp.',
		'harga_wil_3',
		array('menu','beverage','rice','pasta','pizza-slice'),
		'normal',
		'high'
	);

}

/***********************************
 * Output the HTML for the metabox.
 ***********************************/
function harga_wil_2() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'event_fields' );

	// Get the hwil2 data if it's already been entered
	$hwil2 = get_post_meta( $post->ID, 'hargawil2', true );

	// Output the field
	echo '<input type="text" name="hargawil2" value="' . esc_textarea( $hwil2 )  . '" class="widefat">';

}
function harga_wil_1() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'event_fields' );

	// Get the hwil1 data if it's already been entered
	$hwil1 = get_post_meta( $post->ID, 'hargawil1', true );

	// Output the field
	echo '<input type="text" name="hargawil1" value="' . esc_textarea( $hwil1 )  . '" class="widefat">';

}
function harga_wil_3() {
	global $post;

	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'event_fields' );

	// Get the hwil3 data if it's already been entered
	$hwil3 = get_post_meta( $post->ID, 'hargawil3', true );

	// Output the field
	echo '<input type="text" name="hargawil3" value="' . esc_textarea( $hwil3 )  . '" class="widefat">';

}

/*************************
 * Save the metabox data
 *************************/
function wpt_save_events_meta( $post_id, $post ) {

	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
  /*==== Harga Wilayah 1 ====*/
	if ( ! isset( $_POST['hargawil1'] ) || ! wp_verify_nonce( $_POST['event_fields'], basename(__FILE__) ) ) {
		return $post_id;
	}
  if(isset($_POST['hargawil1'])) {
    update_post_meta($post_id, 'hargawil1', $_POST['hargawil1']);
  }
  /*==== Harga Wilayah 2 ====*/
  if ( ! isset( $_POST['hargawil2'] ) || ! wp_verify_nonce( $_POST['event_fields'], basename(__FILE__) ) ) {
		return $post_id;
	}
  if(isset($_POST['hargawil2'])) {
    update_post_meta($post_id, 'hargawil2', $_POST['hargawil2']);
  }
  /*==== Harga Wilayah 3 ====*/
  if ( ! isset( $_POST['hargawil3'] ) || ! wp_verify_nonce( $_POST['event_fields'], basename(__FILE__) ) ) {
		return $post_id;
	}
  if(isset($_POST['hargawil3'])) {
    update_post_meta($post_id, 'hargawil3', $_POST['hargawil3']);
  }
  
	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $events_meta.
	$save_meta_hwil1['hargawil1'] = esc_textarea( $_POST['hargawil1'] );
  $save_meta_hwil2['hargawil2'] = esc_textarea( $_POST['hargawil2'] );
  $save_meta_hwil2['hargawil2'] = esc_textarea( $_POST['hargawil2'] );
  

	// Cycle through the $events_meta array.
	// Note, in this example we just have one item, but this is helpful if you have multiple.
	foreach ( $save_meta_hwil1 as $key => $value ) :

		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}

		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}

		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}

	endforeach;
foreach ( $save_meta_hwil2 as $key => $value ) :

		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}

		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}

		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}

	endforeach;
foreach ( $save_meta_hwil3 as $key => $value ) :

		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}

		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}

		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}

	endforeach;

}
add_action( 'save_post', 'wpt_save_events_meta', 1, 2 );

?>