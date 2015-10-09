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

		if (!is_front_page()) {		

			global $post;

			$id = $post->ID;

			$class = $instance['class'];

			echo $args['before_widget'];

			echo productSchemaGetMeta($id, $class);

			echo $args['after_widget'];

			} 

	
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