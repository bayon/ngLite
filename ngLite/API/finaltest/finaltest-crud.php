<?php 
    header('Content-Type: application/json');
   
    require_once('../db.php');

$TABLE='finaltest';

      $postdata = file_get_contents("php://input");
      $request = json_decode($postdata);
      $sql_detail_orphans = "";
      //------------------------------------------------
      if($request->method ==="add"){

      $sql = "INSERT INTO ".$DB.".".$TABLE."  (id,fk,name,description,type)
		VALUES(null,'".$request->fk."','".$request->name."','".$request->description."','".$request->type."');";       }
      if($request->method ==="update"){

      $sql = "UPDATE  ".$DB.". ".$TABLE." set  `id` = '$request->id', `fk` = '$request->fk', `name` = '$request->name', `description` = '$request->description', `type` = '$request->type' WHERE `id` = '$request->id' ;";
            exe_sql($con, $sql);

          //echo($sql);
          //die();
      }
      if($request->method ==="delete"){
          $sql = "DELETE FROM  ".$DB.". ".$TABLE."  WHERE `id` = '$request->id' ;";
          //delete orphaned detail table entries
           $sql_detail_orphans = "DELETE FROM  ".$DB.". ".$finaltest_DETAIL_TABLE."  WHERE `id` = '$request->id' ;";
      }
      /////////////////////////////////////////////////////////////////////////////
     

	/*	$sql = " CREATE TABLE IF NOT EXISTS `finaltest` (`id` bigint(20) NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `fk`  tinytext NOT NULL, `name`  tinytext NOT NULL, `description`  tinytext NOT NULL, `type`  tinytext NOT NULL)
		 ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; " ;*/


      exe_sql($con, $sql);


 ?> 
