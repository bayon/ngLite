<?php

	unset($api_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 $directory = "API/".$objectName."/";
	}
	$api_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-api.php";
	
	echo("\n\$api_final_filepath: ".$api_final_filepath);
	
	$fp = fopen($api_final_filepath, "w") or die("Couldn't open $api_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
    fwrite($fp,"<?php \n");
    fputs($fp,"header('Content-Type: application/json');\n");
    fputs($fp,"require('../db.php');\n");
    fputs($fp,"\n");
    	fputs($fp,"\n");
    fputs($fp,"\$TABLE='".$objectName."';\n");
        fputs($fp,"\n");
    fputs($fp,"if (mysqli_connect_errno())\n");
    fputs($fp,"{\n");
    fputs($fp,"    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();\n");
    fputs($fp,"}\n");
    fputs($fp,"\n");
    fputs($fp,"if(isset(\$_GET['dataId'])){\n");
    fputs($fp,"    \n");
    fputs($fp,"    if(\$_GET['dataId']=='".$objectName."'){\n");
    
    //fputs($fp,"          \$sql = 'SELECT * FROM '.\$TABLE.'   ';\n");
     fputs($fp,"\$sql = \"SELECT * FROM \".\$DB.\".\".\$TABLE ; \n");
    
    fputs($fp,"          \$result=mysqli_query(\$con,\$sql);\n");
    fputs($fp,"          while(\$row=mysqli_fetch_assoc(\$result)){\n");
    fputs($fp,"              \$data[] = \$row;\n");
    fputs($fp,"          }\n");
    fputs($fp,"          \$json = json_encode(\$data);\n");
    fputs($fp,"          echo(\$json);\n");
    fputs($fp,"    }else{\n");

    
    
    //fputs($fp,"\$sql = \" SELECT * FROM \$DB.\$TABLE  WHERE id = '".$_GET['dataId']."' \" ");
     fputs($fp,"\$sql = \"SELECT * FROM \".\$DB.\".\".\$TABLE.\"  WHERE id = '\".\$_GET['dataId'].\"' \"; \n");
    
    fputs($fp,"        \$result=mysqli_query(\$con,\$sql);\n");
    fputs($fp,"        while(\$row=mysqli_fetch_assoc(\$result)){\n");
    fputs($fp,"            \$data[] = \$row;\n");
    fputs($fp,"        }\n");
    fputs($fp,"        \$json = json_encode(\$data[0]);\n");
    fputs($fp,"        echo(\$json);\n");
    fputs($fp,"    }\n");
    fputs($fp,"   \n");
    fputs($fp,"}\n");
    fputs($fp,"\n");
    
    fputs($fp,"\n");
    fputs($fp,"// Free result set\n");
    fputs($fp,"mysqli_free_result(\$result);\n");
    fputs($fp,"mysqli_close(\$con);\n");
    fputs($fp,"\n");
    	
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-api.php</h3>");
	showCode($api_final_filepath);
	