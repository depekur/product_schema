<?php 

function product_schema_save_meta( $post_id ) 
{

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['product_schema_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['product_schema_meta_box_nonce'], 'product_schema_save_meta' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	
//save name
	if ( isset( $_POST['product_schema_field_name'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_name', 
								sanitize_text_field( $_POST['product_schema_field_name']) 
								);
	}

//save description
	if ( isset( $_POST['product_schema_field_description'] ) ) {

		update_post_meta( $post_id, 
								'_product_schema_description', 
								sanitize_text_field( $_POST['product_schema_field_description'] ) 
								);
	}

//save image
	if ( isset( $_POST['product_schema_field_image'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_image', 
								sanitize_text_field( $_POST['product_schema_field_image'] ) 
								);
	}

//save price
	if ( isset( $_POST['product_schema_field_price'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_price', 
								sanitize_text_field( $_POST['product_schema_field_price'] ) 
								);
	}

//save val
	if ( isset( $_POST['product_schema_field_val'] ) ) {
		update_post_meta( $post_id, 
								'_product_schema_val', 
								sanitize_text_field( $_POST['product_schema_field_val'] ) 
								);
	}
	
}

?>