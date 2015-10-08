<?php
function product_schema_shortcode_handler($atts) 
{
	global $post;
	extract( shortcode_atts( array(
		'id' => $post->ID,
		'class' => 'product_schema_shortcode_class'
	), $atts, 'product_schema' ) );

	$product_schema_name = esc_attr(get_post_meta( $id, '_product_schema_name', true ));
	$product_schema_description = esc_attr(get_post_meta( $id, '_product_schema_description', true ));
	$product_schema_image = esc_attr(get_post_meta( $id, '_product_schema_image', true ));
	$product_schema_price = esc_attr(get_post_meta( $id, '_product_schema_price', true ));
	$product_schema_val = esc_attr(get_post_meta( $id, '_product_schema_val', true ));

	return   '<div class="'.$class.'" itemscope itemtype="http://schema.org/Product">
					<h2 itemprop="name"> '.$product_schema_name.' </h2>
					<span itemprop="description"> '.$product_schema_description.' </span>
					<img src="'.$product_schema_image.'" itemprop="image">
					<div itemprop="offers" itemscope itemtype="http://schema.org/Offer"> 
						<span itemprop="price">'.$product_schema_price.'</span>
						<span itemprop="priceCurrency">'.$product_schema_val.'</span>			   
				   </div>
				</div>';
}

?>