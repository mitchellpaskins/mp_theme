<?php 

//class pn_builder {
//	public $paths = array('/modules');
//	public $modules = array();
//	
//	public function setup(){
//		foreach ($this->paths as $path) {
//			$pathChildren = scandir($path);
//			var_dump($pathChildren);
//			foreach($pathChildren as $child){
//				print_r($child);
//				if ($child === '.' or $child === '..') continue;
//				
//			    if (is_dir($path . '/' . $child)) {
//					array_push($modules, $child);
//			    }
//			}
//		}
//	}
//	
//	public function addPath($path){
//		array_push($paths, $path);
//	}
//	
//	public function getModules(){
//		
//	}
//	
//	
//}