<?php

	$directory = "./" . $objectName . "/";
	
	if($appropriateDirectory){
	 $directory = "app/includes/views/";
	}
	
	$view_list_final_filepath = $OS_FILE_PATH . $directory .= $objectName . ".view.php";
	
	echo($view_list_final_filepath);
	
	$fp = fopen($view_list_final_filepath, "w") or die("Couldn't open $view_list_final_filepath");
	
	
	?>