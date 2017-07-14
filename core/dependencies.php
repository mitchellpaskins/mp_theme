<?php 
	$depPath = file_exists('wp-content/themes/peanuts/builder/index.php') ? 'wp-content/themes/peanuts/builder/index.php' : '../wp-content/themes/peanuts/builder/index.php';
	require_once($depPath);
	require_once('helpers.php');