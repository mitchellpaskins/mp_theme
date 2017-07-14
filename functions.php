<?php 
add_action( 'admin_init', 'init_builder' );
function init_builder() {
	remove_post_type_support('page', 'editor');
	include_once('bulider.index.php');
//	$build = new pn_builder();
//	$build->setup();
}
/**
 * Register meta box(es).
 */
function add_pn_builder() {
    add_meta_box( 'mp-builder', __( 'MP Builder', 'pn_builder' ), 'pn_builder_display', 'page' );
}
add_action( 'add_meta_boxes', 'add_pn_builder' );
 
/**
 * Meta box display callback.
 */
function pn_builder_display( $post ) {
	$meta = get_post_meta($post->ID);
	$currentTester = isset($meta['testerMPyo']) ? $meta['testerMPyo'][0] : '';
	$html = '';
	$html .= sprintf('<input type="text" name="testerMP" placeholder="testerMP" value="%1s"/>', $currentTester);
    echo $html;// Display code/markup goes here. Don't forget to include nonces!
}
 
/**
 * Save meta box content.
 */
function pn_builder_save( $post_id ) {
	if(isset($_POST['testerMP'])){
		add_post_meta($post_id, 'testerMPyo', $_POST['testerMP']);
	}
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'pn_builder_save' );


function pn_builder_add_scripts( $hook ) {
    if ( 'post.php' != $hook ) {
        return;
    }
    wp_enqueue_script( 'testScript', get_template_directory_uri()  . '/assets/js/test.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'pn_builder_add_scripts' );
