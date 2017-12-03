<?php
//PHP MODEL---////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* Example:
'use strict';
angular.module('sowList', ['core.data']);
*/
///////////////////////////////////////////////////////////////////// ".$objectName."
	unset($module_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	  // $directory = "app/".$objectName."-list/";
	        $directory = $directory_app_list;
	}
	$module_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-list.module.js";
	echo("\n\$module_final_filepath: ".$module_final_filepath);
	//---WRITE
	$fp = fopen($module_final_filepath, "w") or die("Couldn't open $module_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	fwrite($fp,"'use strict';\n");
	fputs($fp, "angular.module('".$objectName."List',['core.".$objectName."']);");
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-list.module.js</h3>");
	showCode($module_final_filepath);
	