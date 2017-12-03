<?php 
include_once('mySQLi.model.php');

class finaltest extends Model  { 

	private $id;
	private $fk;
	private $name;
	private $description;
	private $type;

	function __construct(){
		parent::__construct();
	} 
	public function model_connect() {
		return parent::connect();
	}
	function init($id,$fk,$name,$description,$type){
		$this -> id = $id;
		$this -> fk = $fk;
		$this -> name = $name;
		$this -> description = $description;
		$this -> type = $type;
	} 
	public function set_id($id){
		$this -> id = $id;
	}
	public function get_id(){
		return $this -> id; 
	}
	public function set_fk($fk){
		$this -> fk = $fk;
	}
	public function get_fk(){
		return $this -> fk; 
	}
	public function set_name($name){
		$this -> name = $name;
	}
	public function get_name(){
		return $this -> name; 
	}
	public function set_description($description){
		$this -> description = $description;
	}
	public function get_description(){
		return $this -> description; 
	}
	public function set_type($type){
		$this -> type = $type;
	}
	public function get_type(){
		return $this -> type; 
	}

//---USE CASE (instantiate via POST array)---------------
//$finaltest = new finaltest( $_POST['id'], $_POST['fk'], $_POST['name'], $_POST['description'], $_POST['type']); 

	 
	public function read($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".finaltest ;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	 
	public function read_id($id = "",$return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".finaltest WHERE id='.$_data;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} public function read_ModelKV($model='',$k = '',$v='',$return = '') { 
  		$con = $this -> model_connect(); 
    		$sql = ' SELECT * FROM ' . $this -> getDatabase() . '.' . $model . ' WHERE ' . $k . '=' . $v . '; ';  
   		$data = $this -> exe_sql($con, $sql, $return);  
   		return $data; 
    	} 
   
//---SQL INSERT -------------------------------

	 
	function create($finaltest,$return = "json") {
		$con = $this -> model_connect();
		$sql = "INSERT INTO ".$this -> getDatabase().".finaltest (id,fk,name,description,type)
		VALUES('".$finaltest->get_id()."' , '".$finaltest->get_fk()."' , '".$finaltest->get_name()."' , '".$finaltest->get_description()."' , '".$finaltest->get_type()."' );"; 
	$data = $this -> exe_sql($con,$sql, $return);
		 // in the case of an insert , the return data will be the "last id inserted".
		echo($data);
	 
	 } 
//---SQL UPDATE -------------------------------

	 function update($finaltest,$return = "json") {
		$con = $this -> model_connect();
		$sql = "UPDATE ".$this -> getDatabase().".finaltest set id = '".$finaltest->get_id()."' , fk = '".$finaltest->get_fk()."' , name = '".$finaltest->get_name()."' , description = '".$finaltest->get_description()."' , type = '".$finaltest->get_type()."'  WHERE id = ".$finaltest->get_id()."";	
		$data = $this -> exe_sql($con, $sql, $return);
 		echo($data);
	}
	 
//---SQL DELETE -------------------------------

 
	function delete($finaltest,$return = "json"){
		$con = $this -> model_connect();
		$sql = "DELETE FROM " . $this -> getDatabase() . ".finaltest WHERE id = " . $finaltest -> get_id() . "  ;";
		$data = $this -> exe_sql($con, $sql, $return);
		echo($data);
	}
	
//---SQL CREATE TABLE -------------------------------
function create_table_finaltest(){
		$con = $this -> model_connect();
		$sql = " CREATE TABLE IF NOT EXISTS `finaltest` (`id` bigint(20) NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `fk`  tinytext NOT NULL, `name`  tinytext NOT NULL, `description`  tinytext NOT NULL, `type`  tinytext NOT NULL)
		 ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; " ;

		$data = $this -> exe_sql($con, $sql, $return);
}
	 }
?>

