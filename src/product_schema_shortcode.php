<?php
function product_schema_shortcode_handler($atts) 
{
	global $post;
	extract( shortcode_atts( array(
		'id' => $post->ID,
		'class' => 'product_schema_shortcode_class'
	), $atts, 'product_schema' ) );



	return productSchemaGetMeta($id, $class);
}

?>