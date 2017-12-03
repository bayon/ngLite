<?php
//PHP MODEL---////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* Example:
'use strict';

// Define the module
angular.module('sowNew', [
  'ngRoute',
  'core.data'
]);
*/
///////////////////////////////////////////////////////////////////// ".$objectName."
	unset($module_new_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 //$directory = "app/".$objectName."-new/";
	 $directory = $directory_app_new;
	}
	$module_new_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-new.module.js";
	echo("\n\$module_new_final_filepath: ".$module_new_final_filepath);
	//---WRITE
	$fp = fopen($module_new_final_filepath, "w") or die("Couldn't open $module_new_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	fwrite($fp,"'use strict';\n");
	fputs($fp, "angular.module('".$objectName."New',[\n");
	fputs($fp, "\t'ngRoute',\n");
	fputs($fp, "\t'core.".$objectName."',\n");
	fputs($fp, "]);");
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-new.module.js</h3>");
	showCode($module_new_final_filepath);
	