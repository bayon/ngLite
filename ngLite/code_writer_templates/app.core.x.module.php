<?php

	unset($core_x_module_final_path);
	
	$directory = "./" . strtolower($objectName) . "/";
	
	if($appropriateDirectory){
	 //$directory = "app/core/".$objectName."/";
	  $directory = $directory_app_core;
	}
	
	$core_x_module_final_path = $OS_FILE_PATH . $directory .= $objectName."-core.module.js";
	
	echo("\n\$core_x_module_final_path: ".$core_x_module_final_path);
	
	//---WRITE
	$fp = fopen($core_x_module_final_path, "w") or die("Couldn't open $core_x_module_final_path");
	
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	
	fwrite($fp,"'use strict';\n");
	
	fputs($fp, "angular.module('core.".$objectName."',['ngResource']);");
	
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-core.module.js</h3>");
	
	showCode($core_x_module_final_path);
?>