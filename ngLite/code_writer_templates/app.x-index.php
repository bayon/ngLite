<?php
 
///////////////////////////////////////////////////////////////////// ".$objectName."
	unset($app_index_final_path);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 $directory = "app/".$objectName."/";
	}
	$app_index_final_path = $OS_FILE_PATH . $directory .= $objectName.".index.html";
	echo("\n\$app_index_final_path: ".$app_index_final_path);
	//---WRITE
	$fp = fopen($app_index_final_path, "w") or die("Couldn't open $app_index_final_path");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);

  fputs($fp," \n");
  fputs($fp,"<script src='core/".$objectName."/".$objectName."-core.module.js'></script> \n");
  fputs($fp,"<script src='core/".$objectName."/".$objectName."-core.service.js'></script> \n");
  fputs($fp," \n");
  fputs($fp,"<script src='".$objectName."-list/".$objectName."-list.module.js'></script> \n");
  fputs($fp,"<script src='".$objectName."-list/".$objectName."-list.component.js'></script> \n");
  fputs($fp," \n");
  fputs($fp,"<script src='".$objectName."-new/".$objectName."-new.module.js'></script> \n");
  fputs($fp,"<script src='".$objectName."-new/".$objectName."-new.component.js'></script> \n");
  fputs($fp," \n");
  fputs($fp,"<script src='".$objectName."-update/".$objectName."-update.module.js'></script> \n");
  fputs($fp,"<script src='".$objectName."-update/".$objectName."-update.component.js'></script> \n");
  fputs($fp," Remember:  0) { check API : make sure CREATE TABLE is commented out. crud:INSERT NULL and id are reversed}, 1) {change root_dir in components update& new as well as core.} , 2) {...add to main module?} , 3) { insert data ?} , 4) { add to the core.module} ?,5) { add it to the menu },6) {redirect after creating a new record} \n");
   
	fclose($fp);

	echo("<h3>AngularJS ".$objectName.".index.html</h3>");
	showCode($app_index_final_path);
?>
