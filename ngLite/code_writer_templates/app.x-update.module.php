<?php
//---////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* Example:
'use strict';

// Define the module
angular.module('sowUpdate', [
  'ngRoute',
  'core.data'
]);
*/
///////////////////////////////////////////////////////////////////// ".$objectName."
	unset($module_update_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 //$directory = "app/".$objectName."-update/";
	 $directory = $directory_app_update;
	}
	$module_update_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-update.module.js";
	echo("\n\$module_update_final_filepath: ".$module_update_final_filepath);
	//---WRITE
	$fp = fopen($module_update_final_filepath, "w") or die("Couldn't open $module_update_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	fwrite($fp,"'use strict';\n");
	fputs($fp, "angular.module('".$objectName."Update',[\n");
	fputs($fp, "\t'ngRoute',\n");
	fputs($fp, "\t'core.".$objectName."',\n");
	fputs($fp, "]);");
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-update.module.js</h3>");
	showCode($module_update_final_filepath);