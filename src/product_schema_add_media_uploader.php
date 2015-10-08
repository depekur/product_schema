<?php

/**
 * Loads the image management javascript
 */
function product_schema_add_media_uploader() {
    global $typenow;
    if( $typenow == 'post' or $typenow == 'page') {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'js/product_schema_script.js', array( 'jquery' ), '1.0' );
        wp_enqueue_script( 'meta-box-image' );
    }
}

?>