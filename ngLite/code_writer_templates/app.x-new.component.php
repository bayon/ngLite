<?php
//Angular table-list.component.js ////////////////////////////////
/* Example:


*/
///////////////////////////////////////////////////////////////////// ".$objectName."   ".ucfirst($objectName)."
	unset($component_new_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 //$directory = "app/".$objectName."-new/";
	 $directory = $directory_app_new;
	}
	$component_new_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-new.component.js";
	echo("\$component_new_final_filepath: ".$component_new_final_filepath);
	//---WRITE
	$fp = fopen($component_new_final_filepath, "w") or die("Couldn't open $component_new_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);


    fwrite($fp, "'use strict';\n");
    fputs($fp, "\n");
    fputs($fp, "// Register  component, along with its associated controller and template\n");
    fputs($fp, "angular.\n");
    fputs($fp, "module('".$objectName."New').\n");
    fputs($fp, "component('".$objectName."New', {\n");
    fputs($fp, "    templateUrl: '".$objectName."-new/".$objectName."-new.template.html',\n");
    fputs($fp, "    controller: ['\$scope', '\$http', function(\$scope, \$http) {\n");
    fputs($fp, "        \$scope.method = 'na';\n");
    fputs($fp, "        \$scope.endpoint = 'https://www.sprite-pilot.com/APP_ROOT_DIR/API/".$objectName."/".$objectName."-crud.php';\n");
    fputs($fp, "        \$scope.fields = [];\n");
    fputs($fp, "        \$scope.entity = {}\n");
    fputs($fp, "       \n");
    fputs($fp, "        \$scope.save = function(index) {\n");
    fputs($fp, "            \$scope.fields[index].editable = false;\n");
    fputs($fp, "            console.log('\$scope.fields[index]:', \$scope.fields[index]);\n");
    fputs($fp, "            var obj = \$scope.fields[index];\n");
    fputs($fp, "            var data = {\n");
    fputs($fp, "                method: \$scope.method,\n");

    //////////////////////////////////////////////////////////////////
                                //PROPERTIES
                                $max = count($arrayOfProperties);
                                for ($x = 0; $x < $max; $x++) {
                                  //no comma after last property.
                                  if ($x == $max-1) {
                                    fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x]);
                                  } else {
                                     fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x].",\n");
                                  }
                                }
    ///////////////////////////////////////////////////////////////

    fputs($fp, "            };\n");
    fputs($fp, "            var endpoint = \$scope.endpoint;\n");
    fputs($fp, "            \$http.post(endpoint, data).then(function(msg) {\n");
    fputs($fp, "                if (msg.loginSucceeded === 'true') {\n");
    fputs($fp, "                    console.log(msg)\n");
    fputs($fp, "                } else {\n");
    fputs($fp, "                    console.log(msg);\n");
    fputs($fp, "                }\n");
    fputs($fp, "            });\n");
    fputs($fp, "            // remove from UI after adding successfully\n");
    fputs($fp, "            \$scope.fields.splice(index, 1);\n");
    fputs($fp, "\n");
    fputs($fp, "            //GO TO ADD Details\n");
    fputs($fp, "            window.location.href = '#!/".$objectName."';\n");
    fputs($fp, "        }\n");
    fputs($fp, "\n");
    fputs($fp, "        \$scope.add = function() {\n");
    fputs($fp, "            \$scope.method = 'add';\n");
    fputs($fp, "            \$scope.fields.push({\n");

 
    //////////////////////////////////////////////////////////////////
                                //PROPERTIES
                                $max = count($arrayOfProperties);
                                for ($x = 0; $x < $max; $x++) {
                                     fputs($fp,"                ".$arrayOfProperties[$x].": '',\n");
                                }
    ///////////////////////////////////////////////////////////////

    fputs($fp, "                editable: true\n");
    fputs($fp, "            })\n");
    fputs($fp, "        }\n");
    fputs($fp, "        var init = function() {\n");
    fputs($fp, "            //purpose: to have the form open and ready to create a new record.\n");
    fputs($fp, "            \$scope.add();\n");
    fputs($fp, "        };\n");
    fputs($fp, "        init();\n");
    fputs($fp, "    }]\n");
    fputs($fp, "});\n");


	///////////////////////////
	fclose($fp);

	echo("<h3>AngularJS ".$objectName."-new.component.js</h3>\n");
	showCode($component_new_final_filepath);
