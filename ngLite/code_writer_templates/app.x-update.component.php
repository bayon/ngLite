<?php
//Angular table-update.component.js ////////////////////////////////
	unset($component_update_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 //$directory = "app/".$objectName."-update/";
	 $directory = $directory_app_update;
	}
	$component_update_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-update.component.js";
	echo("\$component_update_final_filepath: ".$component_update_final_filepath);
	//---WRITE
	$fp = fopen($component_update_final_filepath, "w") or die("Couldn't open $component_update_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);

  fwrite($fp, "'use strict';\n");
  fputs($fp, "\n");
  fputs($fp,"");
  fputs($fp,"// Register component, along with its associated controller and template \n");
  fputs($fp,"\n");
  fputs($fp,"angular.\n");
  fputs($fp,"module('".$objectName."Update').\n");
  fputs($fp,"component('".$objectName."Update', {\n");
  fputs($fp,"    templateUrl: '".$objectName."-update/".$objectName."-update.template.html',\n");
  fputs($fp,"    controller: ['\$scope', '\$http', '\$routeParams', '".ucFirst($objectName)."', function(\$scope, \$http, \$routeParams, ".ucFirst($objectName).") {\n");
  fputs($fp,"        \$scope.method = 'na';\n");
  fputs($fp,"        \$scope.fields = [];\n");
  fputs($fp,"        \$scope.entity = {};\n");
  fputs($fp,"        \$scope.current_id = '';\n");
  fputs($fp,"        var self = this;\n");
  fputs($fp,"        self.".$objectName." = ".ucFirst($objectName).".get({\n");
  fputs($fp,"            dataId: \$routeParams.dataId\n");
  fputs($fp,"        }, function(".$objectName.") {\n");
  fputs($fp,"\n");

  //////////////////////////////////////////////////////////////////
    //PROPERTIES
   $max = count($arrayOfProperties);
   for ($x = 0; $x < $max; $x++) {
        fputs($fp,"            \$scope.fields.".$arrayOfProperties[$x]." = self.".$objectName.".".$arrayOfProperties[$x].";\n");
  }
  ///////////////////////////////////////////////////////////////

  fputs($fp,"\n");
  fputs($fp,"            \$scope.method = 'update';\n");
  fputs($fp,"\n");
  fputs($fp,"            \$scope.fields.push({\n");

  //////////////////////////////////////////////////////////////////
  //PROPERTIES
   $max = count($arrayOfProperties);
   for ($x = 0; $x < $max; $x++) {
         fputs($fp,"                ".$arrayOfProperties[$x].": \$scope.fields.".$arrayOfProperties[$x].",\n");
  }
  ///////////////////////////////////////////////////////////////

  fputs($fp,"                editable: true\n");
  fputs($fp,"            })\n");
  fputs($fp,"            console.log('  \$scope.fields', \$scope.fields);\n");
  fputs($fp,"            \$scope.entity = \$scope.fields[0];\n");
  fputs($fp,"            \$scope.entity.index = 0;\n");
  fputs($fp,"            \$scope.entity.editable = true;\n");
  fputs($fp,"        });\n");
  fputs($fp,"\n");
  fputs($fp,"\n");
  fputs($fp,"        \$scope.endpoint = 'https://www.sprite-pilot.com/APP_ROOT/API/".$objectName."/".$objectName."-crud.php';\n");
  fputs($fp,"\n");

  fputs($fp,"        \$scope.fields.name = self.".$objectName.".name;\n");
  fputs($fp,"        \$scope.fields.description = self.".$objectName.".description;\n");

  fputs($fp,"        \$scope.edit = function() {\n");
  fputs($fp,"            \$scope.method = 'update';\n");
  fputs($fp,"            console.log('".$objectName."-update-component:EDIT');\n");
  fputs($fp,"            \$scope.fields.push({\n");

  //////////////////////////////////////////////////////////////////
  //PROPERTIES
 $max = count($arrayOfProperties);
 for ($x = 0; $x < $max; $x++) {
       fputs($fp,"                   ".$arrayOfProperties[$x].": \$scope.".$arrayOfProperties[$x].",\n");
  }
    ///////////////////////////////////////////////////////////////
  // override id in this case.
  fputs($fp,"                    id: \$scope.current_id,\n");

  fputs($fp,"                    editable: true\n");
  fputs($fp,"                })\n");
  fputs($fp,"            \$scope.entity = \$scope.fields[0];\n");
  fputs($fp,"            \$scope.entity.index = 0;\n");
  fputs($fp,"            \$scope.entity.editable = true;\n");
  fputs($fp,"        }\n");
  fputs($fp,"\n");
  fputs($fp,"        \$scope.delete = function(index) {\n");
  fputs($fp,"            \$scope.method = 'delete';\n");
  fputs($fp,"            console.log('".$objectName."-update-component:DELETE');\n");
  fputs($fp,"            var obj = \$scope.fields[index];\n");
  fputs($fp,"            var data = {\n");
  fputs($fp,"                method: \$scope.method,\n");


  //////////////////////////////////////////////////////////////////
  //PROPERTIES
   $max = count($arrayOfProperties);
   for ($x = 0; $x < $max; $x++) {
      //no comma after last property.
      if ($x == $max-1) {
        fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x]."\n");
      } else {
         fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x].",\n");
      }
   }
  ///////////////////////////////////////////////////////////////

  fputs($fp,"            };\n");
  fputs($fp,"            var endpoint = \$scope.endpoint;\n");
  fputs($fp,"            \$http.post(endpoint, data).then(function(msg) {\n");
  fputs($fp,"                if (msg.loginSucceeded === 'true') {\n");
  fputs($fp,"                    console.log(msg)\n");
  fputs($fp,"                } else {\n");
  fputs($fp,"                    console.log(msg);\n");
  fputs($fp,"                }\n");
  fputs($fp,"            });\n");
  fputs($fp,"\n");
  fputs($fp,"            \$scope.fields.splice(index, 1);\n");
  fputs($fp,"            //go back to list\n");
  fputs($fp,"            window.location.href = '#!/".$objectName."/';\n");
  fputs($fp,"        }\n");
  fputs($fp,"\n");
  fputs($fp,"        \$scope.save = function(index) {\n");
  fputs($fp,"            \$scope.fields[index].editable = false;\n");
  fputs($fp,"            console.log('".$objectName."-update-component:SAVE');\n");
  fputs($fp,"            var obj = \$scope.fields[index];\n");
  fputs($fp,"            var data = {\n");
  fputs($fp,"                method: \$scope.method,\n");

  //////////////////////////////////////////////////////////////////
      //PROPERTIES
     $max = count($arrayOfProperties);
     for ($x = 0; $x < $max; $x++) {
        //no comma after last property.
        if ($x == $max-1) {
          fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x]."\n");
        } else {
           fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x].",\n");
        }
    }
    ///////////////////////////////////////////////////////////////

  fputs($fp,"            };\n");
  fputs($fp,"            var endpoint = \$scope.endpoint;\n");
  fputs($fp,"            \$http.post(endpoint, data).then(function(msg) {\n");
  fputs($fp,"                if (msg.loginSucceeded === 'true') {\n");
  fputs($fp,"                    console.log(msg)\n");
  fputs($fp,"                } else {\n");
  fputs($fp,"                    console.log(msg);\n");
  fputs($fp,"                }\n");
  fputs($fp,"            });\n");
  fputs($fp,"            // remove from UI after adding successfully\n");
  fputs($fp,"            \$scope.fields.splice(index, 1);\n");
  fputs($fp,"            //go back to list\n");
  fputs($fp,"            window.location.href = '#!/".$objectName."/';\n");
  fputs($fp,"        }\n");
  fputs($fp,"\n");
  fputs($fp,"        \$scope.add = function() {\n");
  fputs($fp,"\n");
  fputs($fp,"            \$scope.method = 'add_details';\n");
  fputs($fp,"            console.log('".$objectName."-update-component:ADD');\n");
  fputs($fp,"            \$scope.fields.push({\n");

  fputs($fp,"                id: \$scope.current_id,\n");

  //////////////////////////////////////////////////////////////////\n");
    //PROPERTIES\n");
   $max = count($arrayOfProperties);
   for ($x = 0; $x < $max; $x++) {
         fputs($fp,"                ".$arrayOfProperties[$x].": \$scope.".$arrayOfProperties[$x].",\n");
  }
    ///////////////////////////////////////////////////////////////

  fputs($fp,"\n");
  fputs($fp,"                editable: true\n");
  fputs($fp,"            })\n");
  fputs($fp,"        }\n");
  fputs($fp,"\n");
  fputs($fp,"        var init = function() {\n");
  fputs($fp,"            //purpose: to have the form open and ready to create a new record.\n");
  fputs($fp,"            console.log('".$objectName."-update-component:INIT');\n");
  fputs($fp,"            $(document).ready(function() {\n");
  fputs($fp,"                var field_DATA = null;\n");
  fputs($fp,"                var url = window.location.href;\n");
  fputs($fp,"                var url_str_array = url.split('/');\n");
  fputs($fp,"                var url_id = url_str_array[url_str_array.length - 1];\n");
  fputs($fp,"                \$scope.current_id = url_id;\n");
  fputs($fp,"            });\n");
  fputs($fp,"\n");
  fputs($fp,"        };\n");
  fputs($fp,"        init();\n");
  fputs($fp,"    }]\n");
  fputs($fp,"});\n");
  fputs($fp,"\n");

	///////////////////////////
	fclose($fp);

	echo("<h3>AngularJS ".$objectName."-update.component.js</h3>\n");
	showCode($component_update_final_filepath);
?>
