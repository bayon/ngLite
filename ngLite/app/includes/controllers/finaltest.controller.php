<?php
	//CONTROLLER TEMPLATE
	
class finaltest_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'finaltest.view.php';
		$this -> view_dir = 'finaltest/';
	}
	public function home($_data) {
		$view=$this -> view_dir."finaltest.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		$view=$this -> view_dir."finaltest.view.php";
		 
 		 $finaltest = new finaltest();
 
		$data = $finaltest-> read();
		$this->buildView($view,$data);
	} public function read_ModelKV($_data) { 
  		$className = $_data['model']; 
   		$object = new $className;  
     		$data = $object-> read_ModelKV($_data['model'],$_data['k'],$_data['v'],'json');   
    		echo($data);   
    	 
 } 
	public function readToJSON() {
		 
 		 $finaltest = new finaltest();
 
		$data = $finaltest-> read('json');
		 echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=finaltest_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {

		include_once("../models/finaltest.model.php");
		$finaltest = new finaltest(); 
		$finaltest->init($_data['id'],$_data['fk'],$_data['name'],$_data['description'],$_data['type']);
			$finaltest->set_id($_data['id']);
		$finaltest ->update($finaltest);
		unset($finaltest);
		$view=$this -> view_dir."finaltest.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		$view=$this -> view_dir."finaltest.create.view.php";
 
		 // include main includes for ajax only:
		include("../models/finaltest.model.php");
		$finaltest = new Finaltest(); 
		$finaltest->init($_data['id'],$_data['fk'],$_data['name'],$_data['description'],$_data['type']);
		$finaltest ->create( $finaltest);
		unset($finaltest); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		$view=$this -> view_dir."finaltest.delete.view.php";
		include("../models/finaltest.model.php");
		$finaltest = new finaltest();
		$finaltest->set_id($_data['id']);
		$finaltest ->delete( $finaltest);
		unset($finaltest);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."finaltest.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
