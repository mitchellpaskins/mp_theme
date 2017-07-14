<?php 
$depPath = file_exists('wp-content/themes/peanuts/core/dependencies.php') ? 'wp-content/themes/peanuts/core/dependencies.php' : '../wp-content/themes/peanuts/core/dependencies.php';

require_once($depPath);


add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//function check(){
//	$builder = new pn_builder();
//	
//}
//
//check();