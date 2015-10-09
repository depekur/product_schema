<?php

function productSchemaGetMeta($id, $class) {

	$product_shema_result = '';

	$product_schema_name = esc_attr(get_post_meta( $id, '_product_schema_name', true ));
	$product_schema_description = esc_attr(get_post_meta( $id, '_product_schema_description', true ));
	$product_schema_image = esc_attr(get_post_meta( $id, '_product_schema_image', true ));
	$product_schema_price = esc_attr(get_post_meta( $id, '_product_schema_price', true ));
	$product_schema_val = esc_attr(get_post_meta( $id, '_product_schema_val', true ));



	$product_shema_result = '<div class="'.$class.'" itemscope itemtype="http://schema.org/Product">';
	

	if (!empty($product_schema_name)) {
		$product_shema_result .= '<h2 itemprop="name"> '.$product_schema_name.' </h2>';
	}

	if (!empty($product_schema_description)) {
		$product_shema_result .= '<span itemprop="description"> '.$product_schema_description.' </span>';
	}

	if (!empty($product_schema_image)) {
		$product_shema_result .= '<img src="'.$product_schema_image.'" itemprop="image">';
	}

	$product_shema_result .= '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';

	if (!empty($product_schema_price)) {
		$product_shema_result .= '<span itemprop="price">'.$product_schema_price.'</span>';
	}

	if (!empty($product_schema_val)) {
		$product_shema_result .= '<span itemprop="priceCurrency">'.$product_schema_val.'</span></div>';
	}

	$product_shema_result .= '</div>';

	return $product_shema_result;
}


?>