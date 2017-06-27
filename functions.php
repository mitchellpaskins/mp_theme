<?php 
add_action( 'admin_init', 'init_builder' );
function init_builder() {
	remove_post_type_support('page', 'editor');
	
}
/**
 * Register meta box(es).
 */
function add_mp_builder() {
    add_meta_box( 'mp-builder', __( 'MP Builder', 'mp_builder' ), 'mp_builder_display', 'page' );
}
add_action( 'add_meta_boxes', 'add_mp_builder' );
 
/**
 * Meta box display callback.
 */
function mp_builder_display( $post ) {
	$meta = get_post_meta($post->ID);
	$currentTester = isset($meta['testerMPyo']) ? $meta['testerMPyo'][0] : '';
	$html = '';
	$html .= sprintf('<input type="text" name="testerMP" placeholder="testerMP" value="%1s"/>', $currentTester);
    echo $html;// Display code/markup goes here. Don't forget to include nonces!
}
 
/**
 * Save meta box content.
 */
function mp_builder_save( $post_id ) {
	if(isset($_POST['testerMP'])){
		add_post_meta($post_id, 'testerMPyo', $_POST['testerMP']);
	}
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'mp_builder_save' );


function mp_builder_add_scripts( $hook ) {
    if ( 'post.php' != $hook ) {
        return;
    }
    wp_enqueue_script( 'testScript', get_template_directory_uri()  . '/assets/js/test.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'mp_builder_add_scripts' );