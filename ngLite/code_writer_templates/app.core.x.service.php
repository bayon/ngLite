<?php

////////////////////////////////////
	unset($core_x_service_final_path);
	
	$directory = "./" . strtolower($objectName) . "/";
	
	if($appropriateDirectory){
	  //$directory = "app/core/".$objectName."/";
	  $directory = $directory_app_core;
	}
	
	$core_x_service_final_path = $OS_FILE_PATH . $directory .= $objectName."-core.service.js";
	
	echo("\n\$core_x_service_final_path: ".$core_x_service_final_path);
	//---WRITE
	$fp = fopen($core_x_service_final_path, "w") or die("Couldn't open $core_x_service_final_path");
	
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	
      fwrite($fp,"'use strict'; \n");
      fputs($fp,"\n");
      fputs($fp,"angular.\n");
      fputs($fp,"  module('core.".$objectName."').\n");
      fputs($fp,"  factory('".ucFirst($objectName)."', ['\$resource',\n");
      fputs($fp,"    function(\$resource) {\n");
      fputs($fp,"    \n");
      fputs($fp,"      return \$resource('https://www.sprite-pilot.com/app_root/API/".$objectName."/".$objectName."-api.php?dataId=:dataId', {}, {\n");
      fputs($fp,"        query: {\n");
      fputs($fp,"          method: 'GET',\n");
      fputs($fp,"          params: {dataId: '".$objectName."'},\n");
      fputs($fp,"          isArray: true\n");
      fputs($fp,"        }\n");
      fputs($fp,"      });\n");
      fputs($fp,"    }\n");
      fputs($fp,"  ]);\n");

	fclose($fp);

	echo("<h3>AngularJS ".$objectName."-core.service.js</h3>");
	showCode($core_x_service_final_path);
?>
