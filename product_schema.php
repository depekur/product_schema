<?php
/*
Plugin Name: Product Schema

Description: Добавляет метабокс на страницу добавления\редактирования поста\страницы (в сайдбаре), в котором можно задавать: название услуги\товара, описание услуги\товара, изображение услуги\товара, цену услуги\товара, валюту услуги\товара. Использование: [product_schema id=123 class="my_custom_class"].

Author: Pekur Eugeniy
Version: 1.0
Author URI: depekur@gmail.com
*/

require 'src/product_schema_function.php';
require 'src/product_schema_init_meta_box.php';
require 'src/product_schema_add_media_uploader.php';
require 'src/product_schema_save_meta_data.php';
require 'src/product_schema_widget.php';
require 'src/product_schema_shortcode.php';


add_action( 'add_meta_boxes', 'product_schema_add_meta_box' );
add_action( 'admin_enqueue_scripts', 'product_schema_add_media_uploader' );
add_action( 'save_post', 'product_schema_save_meta' );
add_action( 'widgets_init', 'product_schema_register_widget');
add_shortcode( 'product_schema', 'product_schema_shortcode_handler' );

?>