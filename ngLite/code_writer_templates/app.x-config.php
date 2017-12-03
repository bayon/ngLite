<?php

unset($app_config_final_path);
$directory = "./" . strtolower($objectName) . "/";
if($appropriateDirectory){
 $directory = "app/".$objectName."/";
}
$app_config_final_path = $OS_FILE_PATH . $directory .= $objectName.".config.js";
echo("\n\$app_config_final_path: ".$app_config_final_path);
//---WRITE
$fp = fopen($app_config_final_path, "w") or die("Couldn't open $app_config_final_path");
//array of properties to comma separated parameters
$arrayOfPropertiesToString = implode(',', $arrayOfProperties);


fwrite($fp," \n");
fputs($fp,"'use strict';\n");
fputs($fp,"\n");
fputs($fp,"angular.\n");
fputs($fp,"  module('App').\n");
fputs($fp,"  config(['\$locationProvider' ,'\$routeProvider',\n");
fputs($fp,"    function config(\$locationProvider, \$routeProvider) {\n");
fputs($fp,"      \$locationProvider.hashPrefix('!');\n");
fputs($fp,"\n");
fputs($fp,"      \$routeProvider.\n");
fputs($fp,"        when('/".$objectName."', {\n");
fputs($fp,"          template: '<".$objectName."-list></".$objectName."-list>'\n");
fputs($fp,"        }).\n");
fputs($fp,"         when('/".$objectName."-new', {\n");
fputs($fp,"          template: '<".$objectName."-new></".$objectName."-new>'\n");
fputs($fp,"        }).\n");
fputs($fp,"         when('/".$objectName."-update/:dataId', {\n");
fputs($fp,"          template: '<".$objectName."-update></".$objectName."-update>'\n");
fputs($fp,"        }).\n");
fputs($fp,"        otherwise({\n");
fputs($fp,"             template: '<".$objectName."-list></".$objectName."-list>'\n");
fputs($fp,"        });\n");
fputs($fp,"    }\n");
fputs($fp,"  ]);\n");



fclose($fp);

echo("<h3>AngularJS ".$objectName.".config.js</h3>");
showCode($app_config_final_path);




?>
