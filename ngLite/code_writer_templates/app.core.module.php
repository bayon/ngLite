<?php

///////////////////////////////////////////////////////////////////// ".$objectName."
	unset($core_module_final_path);
	
    $directory = "./" . strtolower($objectName) . "/";
    

	
	if($appropriateDirectory){
	// $directory = "app/core/".$objectName."/";
	 	$directory = $directory_app_core;//defined in main file
	}
	
	$core_module_final_path = $OS_FILE_PATH . $directory .= $objectName."-core.module.js";
	
	echo("\n\$core_module_final_path: ".$core_module_final_path);
	

	$fp = fopen($core_module_final_path, "w") or die("Couldn't open $core_module_final_path");
	
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	fwrite($fp,"'use strict';\n");
	
	fputs($fp, "angular.module('core',['core.".$objectName."']);");
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-core.module.js</h3>");
	showCode($core_module_final_path);
	
?>