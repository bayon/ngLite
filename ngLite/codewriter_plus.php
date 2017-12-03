<html>
	<?php include_once("constants.php"); ?>
	<head>
		<title>Code Writer</title>
		
		<style>
			body {
				margin:0;
				font-family:arial;
				margin:0;
				text-align:center;
			}
			#form_container {
				margin-top:25px;
				text-align:left;
				width:80%;
				margin-left:20%;
			}
			.list_input {
				width:400px;
			}
			input, select, textarea {
				margin-bottom:20px;
			}
			label {
				color:#333
			}
		</style>
	</head>
	<body>
		<h1>Code Writer</h1>
		<a href="app/index.php">back</a>
		<div id="form_container">
			<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> >
				 
				
				<label>host</label>
				<input type = "text" name="host" placeholder="host" value="<?php echo(HOST); ?>"> </input>
				<label>username</label>
				<input type = "text" name="username" placeholder="username" value="<?php echo(USERNAME); ?>"> </input>
				<label>password</label>
				<input type = "text" name="password" placeholder="password" value="<?php echo(PASSWORD); ?>"> </input>
				<label>db</label>
				<input type = "text" name="db" placeholder="database" value="<?php echo(DATABASE); ?>"> </input>
				<hr>
				<label>Name the object</label></br>
				<input type = "text" name="objectname" placeholder="Object Name" value="Foo">
				</input></br>
				<label>List of Properties(comma separated)</label></br>
				<input type = "text" class="list_input" name="arrayOfProperties" placeholder="comma separated Properties" value="id, fk, name, description, type">
				</input></br>
				
				<label>List of Methods(comma separated)</label></br>
				<input type = "text" class="list_input" name="arrayOfMethods" placeholder="comma separated  Methods" value="init" >
				</input></br>
				<label>Place in appropriate directory?</label>
				<input type="checkbox" class="" name="placeAppropriateDirectory" >
				</input></br>
				<input type="submit" value="write file" >
				</input>
				
			</form>
			<hr>
			<h3>DEV NOTES:</h3>
			</br>
				<hr>
		</div>
	</body>
</html>
<?php
define('BASE_PATH', realpath(dirname(__FILE__)));
define('OS_TYPE', 'mac');
 
// mac or pc
$props = explode(',', preg_replace('/\s+/', '', $_POST['arrayOfProperties']));
$meths = explode(',', preg_replace('/\s+/', '', $_POST['arrayOfMethods']));

if(isset($_POST)){
	define('CW_DB',$_POST['database']);
	define('CW_U',$_POST['username']);
	define('CW_P',$_POST['password']);
}

$filePath_mac = "file://" . BASE_PATH . "/";
$filePath_pc = "C:/" . BASE_PATH . "/";
$CODE_OBJECT = "anything for now";
$objectName = strtolower($_POST['objectname']);
$arrayOfProperties = $props;
$arrayOfMethodNames = $meths;

$appropriateDirectory = false;
if(isset($_POST['placeAppropriateDirectory'])){
	if($_POST['placeAppropriateDirectory'] == "on"){
		$appropriateDirectory = true;
	}
}
if (OS_TYPE == "mac") {
	$OS_FILE_PATH = $filePath_mac;
	$includes_filepath = $OS_FILE_PATH."/app/includes/main.php";
	$navigation_filepath = $OS_FILE_PATH."/app/includes/views/nav_includes.php";
} else {
	$OS_FILE_PATH = $filePath_pc;
	$includes_filepath = $OS_FILE_PATH."/app/includes/main.php";
	$navigation_filepath = $OS_FILE_PATH."/app/includes/views/nav_includes.php";
}
$directory = "./" . strtolower($objectName) . "/";
//AngularJS Directories
$directory_app_core = "./app/core/" . strtolower($objectName) . "/";
$directory_app = "./app/" . strtolower($objectName) . "/";
$directory_app_list = "./app/" . strtolower($objectName) . "-list/";
$directory_app_new = "./app/" . strtolower($objectName) . "-new/";
$directory_app_update = "./app/" . strtolower($objectName) . "-update/";
$directory_api = "./API/" . strtolower($objectName) . "/";

// only create directory if needed.
if(!$appropriateDirectory){
	if (!mkdir($directory, 0777, true)) {
		die('Failed to create folders...');
	}

	
}else{
	 
	/*THIS WOULD CREATE A SEPARATE DIR FOR CONTROLLERS, not necessary.
	 * if (!mkdir("includes/controllers/".$directory, 0777, true)) {
		die('Failed to create folders...');
	}*/
	if (!mkdir("app/includes/views/".$directory, 0777, true)) {
		die('Failed to create folders...');
	}
		//AngularJS Directories
	if (!mkdir($directory_app_core, 0777, true)) {
		die('Failed to create folders...');
	}
	if (!mkdir($directory_app_list, 0777, true)) {
		die('Failed to create folders...');
	}
	if (!mkdir($directory_app_new, 0777, true)) {
		die('Failed to create folders...');
	}
	if (!mkdir($directory_app_update, 0777, true)) {
		die('Failed to create folders...');
	}
	if (!mkdir($directory_api, 0777, true)) {
		die('Failed to create folders...');
	}
	if (!mkdir($directory_app, 0777, true)) {
		die('Failed to create folders...');
	}
}
//CONTROLLER---////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($CODE_OBJECT != "nonsense") {
	include_once('code_writer_templates/x.controller.php');
}
//MODEL---////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($CODE_OBJECT != "nonsense") {
	include_once('code_writer_templates/x.model.php');	
}
//VIEW---////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($CODE_OBJECT != "nonsense") {
	//include_once('code_writer_templates/x.pagination.view.php');
	include_once('code_writer_templates/x.view.php');
	//include_once('code_writer_templates/x.js.module.php');
}
if ($CODE_OBJECT != "nonsense") {
    //FRONTEND
    //3 Main Views List, New, and Update
    //List
	include_once('code_writer_templates/app.x-list.module.php');
	include_once('code_writer_templates/app.x-list.component.php');
	include_once('code_writer_templates/app.x-list.template.php');
	//New
	include_once('code_writer_templates/app.x-new.module.php');
	include_once('code_writer_templates/app.x-new.component.php');
	include_once('code_writer_templates/app.x-new.template.php');
	//Update
	include_once('code_writer_templates/app.x-update.module.php');
	include_once('code_writer_templates/app.x-update.component.php');
	include_once('code_writer_templates/app.x-update.template.php');
	
	//BACKEND
	//API
	include_once('code_writer_templates/api.x.php');
	include_once('code_writer_templates/api.x.crud.php');
	
	//CORE ngResource services
	include_once('code_writer_templates/app.core.module.php');
	include_once('code_writer_templates/app.core.x.module.php');
	include_once('code_writer_templates/app.core.x.service.php');
	
	//Routing
	include_once('code_writer_templates/app.x-config.php');
	
	//Includes
	include_once('code_writer_templates/app.x-index.php');
	
	
	
	 
}
 
function showCode($page) {
	$codeToHTML = new CodeToHtml;
	$codeToHTML -> viewCode($page);
}
class CodeToHtml {
	public function viewCode($page) {
		$code = htmlspecialchars(file_get_contents($page));
		echo("<style> .codeViewClass{
									background:#222;
									text-align:left;
									color:green;
									height:auto;
									max-height:500px;
									overflow-y:scroll;
									width:90%;
									padding:15px;
									margin-left:5%;
									margin-top:15px;
									border:solid 5px #000;
									border-radius:4px;
									} </style>");
		echo("<div class='codeViewClass'><pre>" . $code . "</pre></div>");
	}

}
?>
