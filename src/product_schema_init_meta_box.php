<?php

/**
 * Adds a box to the sidebar on the Post and Page edit screens.
 */
function product_schema_add_meta_box() 
{

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'product_schema_css',
			'Product Schema',
			'product_schema_view_meta_box',
			$screen,
			'side',
			'default'
		);
	}
}

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function product_schema_view_meta_box( $post ) 
{

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'product_schema_save_meta', 'product_schema_meta_box_nonce' );

	$product_schema_name = get_post_meta( $post->ID, '_product_schema_name', true );
	$product_schema_description = get_post_meta( $post->ID, '_product_schema_description', true );
	$product_schema_image = get_post_meta( $post->ID, '_product_schema_image', true );
	$product_schema_price = get_post_meta( $post->ID, '_product_schema_price', true );
	$product_schema_val = get_post_meta( $post->ID, '_product_schema_val', true );

	?>

<p>
	<label> Название услуги\товара:
		<input type="text" id="product_schema_field_name" name="product_schema_field_name" value="<?= esc_attr( $product_schema_name ) ?>" size="25" >
	</label>
</p>
<p>
	<label> Описание услуги\товара:
		<textarea type="text" id="product_schema_field_description" name="product_schema_field_description" cols="25" rows="5"> <?= esc_attr( $product_schema_description ) ?></textarea>
	</label> 
</p>
<p>
	<label id="product_schema_field_image">Изображение услуги\товара:
		<input type="text" name="product_schema_field_image" id="meta-image" value="<?= esc_attr( $product_schema_image ) ?>" />
		<input type="button" id="meta-image-button" class="button" value="добавить изображение" />
	</label>   
</p>
<p>
	<label> Цена услуги\товара:
		<input type="text" id="product_schema_field_price" name="product_schema_field_price" value="<?= esc_attr( $product_schema_price ) ?>" size="25" >
	</label> 
</p>
<p>
	<label> Валюта услуги\товара:
		<input type="text" id="product_schema_field_val" name="product_schema_field_val" value="<?= esc_attr( $product_schema_val ) ?>" size="25" >
	</label>
</p>
<?php
}