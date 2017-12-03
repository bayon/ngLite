<?php
//Angular table-list.component.js ////////////////////////////////
 
///////////////////////////////////////////////////////////////////// ".$objectName."   ".ucfirst($objectName)."
	unset($component_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	        // $directory = "app/".$objectName."-list/";
	        $directory = $directory_app_list;
	}
	$component_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-list.component.js";
	echo("\n\$component_final_filepath: ".$component_final_filepath);
	//---WRITE
	$fp = fopen($component_final_filepath, "w") or die("Couldn't open $component_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	
	fwrite($fp,"'use strict';\n");
	fputs($fp, "angular.\n");
	fputs($fp, "\t module('".$objectName."List').\n");
	fputs($fp, "\t\t component('".$objectName."List',{\n");
	fputs($fp, "\t\t\t templateUrl: '".$objectName."-list/".$objectName."-list.template.html',\n");
	fputs($fp, "\t\t\t controller: ['".ucfirst($objectName)."',\n");
	fputs($fp, "\t\t\t\t function ".ucfirst($objectName)."ListController(".ucfirst($objectName).") {\n");
	fputs($fp, "\t\t\t\t\t this.objects = ".ucfirst($objectName).".query();\n");
	fputs($fp, "\t\t\t\t\t this.orderProp = 'ordering';\n");
	fputs($fp, "\t\t\t\t }\n");
	fputs($fp, "\t\t\t ]\n");
	fputs($fp, "\t\t });\n");
	
	
	///////////////////////////
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-list.component.js</h3>");
	showCode($component_final_filepath);
	