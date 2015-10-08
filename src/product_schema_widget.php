<?php 
class product_schema_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'product_schema_widget', // Base ID
			'Product Schema', // Name
			array( 'description' => __( 'Реализация Product Schema в виде виджета. ', 'text_domain' )) // Args
		);
	}



	public function widget( $args, $instance ) {

		global $post;

		$product_schema_name = esc_attr(get_post_meta( $post->ID, '_product_schema_name', true ));
		$product_schema_description = esc_attr(get_post_meta( $post->ID, '_product_schema_description', true ));
		$product_schema_image = esc_attr(get_post_meta( $post->ID, '_product_schema_image', true ));
		$product_schema_price = esc_attr(get_post_meta( $post->ID, '_product_schema_price', true ));
		$product_schema_val = esc_attr(get_post_meta( $post->ID, '_product_schema_val', true ));

		
		if (	!empty($product_schema_name) && 
				!empty($product_schema_description) && 
				!empty($product_schema_image) &&
				!empty($product_schema_price) &&
				!empty($product_schema_val)
			) {

		echo $args['before_widget'];

		echo     '<div class="'.$instance['class'].'" itemscope itemtype="http://schema.org/Product">
						<h2 itemprop="name"> '.$product_schema_name.' </h2>
						<span itemprop="description"> '.$product_schema_description.' </span>
						<img src="'.$product_schema_image.'" itemprop="image">
						<div itemprop="offers" itemscope itemtype="http://schema.org/Offer"> 
							<span itemprop="price">'.$product_schema_price.'</span>
							<span itemprop="priceCurrency">'.$product_schema_val.'</span>			   
					   </div>
					</div>';

		echo $args['after_widget'];

		} else { die(); }

		
	}


	public function form( $instance ) {

		$class = ! empty( $instance['class'] ) ? $instance['class'] : __( 'New class', 'text_domain' );
		?>
		<p>
		<label >Пожалуста, укажите css класс чтоб задать виджету свои стили:
			<input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo esc_attr( $class ); ?>">
		</label> 
		
		</p>
		<?php 
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['class'] = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['class'] ) : '';

		return $instance;
	}

} // class product_schema_widget


function product_schema_register_widget(){ 
	register_widget( 'product_schema_widget' ); 
}


?>