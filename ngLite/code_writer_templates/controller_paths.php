<?php
$directory = "./" . strtolower($objectName) . "/";

if ($appropriateDirectory) {
	$directory = "app/includes/controllers/";
}

$controller_final_filepath = $OS_FILE_PATH . $directory .= strtolower($objectName) . ".controller.php";

echo("\n\$controller_final_filepath: " . $controller_final_filepath);

$fp = fopen($controller_final_filepath, "w") or die("Couldn't open $controller_final_filepath");

?>