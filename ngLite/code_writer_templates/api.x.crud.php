<?php
// crud
	unset($api_crud_final_filepath);
	
	$directory = "./" . strtolower($objectName) . "/";
	
	if($appropriateDirectory){
	 $directory = "API/".$objectName."/";
	}
	
	$api_crud_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-crud.php";
	
	echo("\n\$api_crud_final_filepath: ".$api_crud_final_filepath);
	
	$fp = fopen($api_crud_final_filepath, "w") or die("Couldn't open $api_crud_final_filepath");
	
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	

  fwrite($fp,"<?php \n");
  fputs($fp,"    header('Content-Type: application/json');\n");
  fputs($fp,"   \n");
  fputs($fp,"    require_once('../db.php');\n");
  fputs($fp,"\n");
  
    fputs($fp,"\$TABLE='".$objectName."';\n");
    
  fputs($fp,"\n");
  fputs($fp,"      \$postdata = file_get_contents(\"php://input\");\n");
  fputs($fp,"      \$request = json_decode(\$postdata);\n");
  fputs($fp,"      \$sql_detail_orphans = \"\";\n");
  fputs($fp,"      //------------------------------------------------\n");
  fputs($fp,"      if(\$request->method ===\"add\"){\n");
    //new INSERT HERE
    fputs($fp, "\n      \$sql = \"INSERT INTO \".\$DB.\".\".\$TABLE.\"  (");
    $max = count($arrayOfProperties);
    for ($x = 0; $x < $max; $x++) {
      if ($x == 0) {
        fputs($fp, $arrayOfProperties[$x]);
      } else {
        fputs($fp, "," . $arrayOfProperties[$x]);
      }
    }
    fputs($fp, ")\n\t\tVALUES(");
    for ($x = 0; $x < $max; $x++) {
      if ($x == 0) {
        fputs($fp,"null");
      } else {
        fputs($fp,",'\".\$request->".$arrayOfProperties[$x].".\"'");
      }
    }
    fputs($fp, ");\"; ");

  fputs($fp,"      }\n");


      fputs($fp,"      if(\$request->method ===\"update\"){\n");
        // new UPDATE here
      fputs($fp, "\n      \$sql = \"UPDATE  \".\$DB.\". \".\$TABLE.\" set  ");
        $max = count($arrayOfProperties);
        for ($x = 0; $x < $max; $x++) {
          if ($x == 0) {
            fputs($fp,"`".$arrayOfProperties[$x]."` = '\$request->".$arrayOfProperties[$x]."'");
          } else {
              fputs($fp,", `".$arrayOfProperties[$x]."` = '\$request->".$arrayOfProperties[$x]."'");
          }
        }
        fputs($fp, " WHERE ");
        fputs($fp,"`id` = '\$request->id' ;\";\n");

      fputs($fp,"            exe_sql(\$con, \$sql);\n");
      fputs($fp,"\n");
      fputs($fp,"          //echo(\$sql);\n");
      fputs($fp,"          //die();\n");
      fputs($fp,"      }\n");
      fputs($fp,"      if(\$request->method ===\"delete\"){\n");
      fputs($fp,"          \$sql = \"DELETE FROM  \".\$DB.\". \".\$TABLE.\"  WHERE `id` = '\$request->id' ;\";\n");
      fputs($fp,"          //delete orphaned detail table entries\n");
      fputs($fp,"           \$sql_detail_orphans = \"DELETE FROM  \".\$DB.\". \".\$".$objectName."_DETAIL_TABLE.\"  WHERE `id` = '\$request->id' ;\";\n");
      fputs($fp,"      }\n");
      fputs($fp,"      /////////////////////////////////////////////////////////////////////////////\n");
      fputs($fp,"     \n");
  /////////////////////////////////////////////////////////////////////////////////////////////////
  	//SQL CREATE TABLE------------------------------------------------------------------------------varchar(20)
  
  fputs($fp, "\n\t\t\$sql = \" CREATE TABLE IF NOT EXISTS ");
  $create_script ="CREATE TABLE IF NOT EXISTS ";
  	fputs($fp, "`" . strtolower($objectName) . "`" . " (");
  	$create_script .="`" . strtolower($objectName) . "`" . " (";
  	for ($x = 0; $x < $max; $x++) {
  		if ($x == 0) {
  			fputs($fp, "`" . $arrayOfProperties[$x] . "`" . " bigint(20) NOT NULL AUTO_INCREMENT");
  			$create_script .="`" . $arrayOfProperties[$x] . "`" . " bigint(20) NOT NULL AUTO_INCREMENT";
  			fputs($fp, ", PRIMARY KEY" . "(`" . $arrayOfProperties[$x] . "`)");
  			$create_script .=", PRIMARY KEY" . "(`" . $arrayOfProperties[$x] . "`)";
  		} else {
  			fputs($fp, ", `" . $arrayOfProperties[$x] . "`  tinytext NOT NULL");
  			$create_script .=", `" . $arrayOfProperties[$x] . "`  tinytext NOT NULL";
  		}
  	}
  	fputs($fp, ")\n\t\t ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; \" ;\n");
  	$create_script .=") ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1  ; ";
  //////////////////////////////////////////////////////////////////////////////////////////////
  fputs($fp,"\n\n");
  fputs($fp,"      exe_sql(\$con, \$sql);\n");
  //fputs($fp,"      if(\$sql_detail_orphans != \"\"){\n");
  //fputs($fp,"           exe_sql(\$con, \$sql_detail_orphans);\n");
  //fputs($fp,"      }\n");
  //fputs($fp,"\n");
  fputs($fp,"\n");
  fputs($fp,"\n");
   fputs($fp," ?> \n");
  ////////////////////////////////////
	fclose($fp);

	echo("<h3>AngularJS ".$objectName."-crud.php</h3>");
	showCode($api_crud_final_filepath);
