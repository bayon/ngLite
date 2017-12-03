<?php
//Angular table-update.template.js ////////////////////////////////
/* Example:


*/
///////////////////////////////////////////////////////////////////// ".$objectName."   ".ucfirst($objectName)."
	unset($template_update_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	 //$directory = "app/".$objectName."-update/";
	 $directory = $directory_app_update;
	}
	$template_update_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-update.template.html";
	echo("\n\$template_update_final_filepath: ".$template_update_final_filepath);
	//---WRITE
	$fp = fopen($template_update_final_filepath, "w") or die("Couldn't open $template_update_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	
	fwrite($fp,"'use strict';\n");
	//fputs($fp, "xxxxxxxxxxxxxxxxxxxx\n");
      
  fputs($fp, "<div class='container-fluid'>\n");
  fputs($fp, "<div class='col-md-2'>\n");
  fputs($fp, "\n");
  fputs($fp, "<p>\n");
  fputs($fp, "    <a href='#!/".$objectName."/'>\n");
  fputs($fp, "        <button>back</button>\n");
  fputs($fp, "    </a>\n");
  fputs($fp, "</p>\n");
  fputs($fp, "</div>\n");
  fputs($fp, "<div class='col-md-10'>\n");
  fputs($fp, "\n");
  fputs($fp, "    <div class='row' ng-repeat='field in fields track by \$index'>\n");
 
  //////////////////////////////////////////////////////////////////
                              //PROPERTIES
                              $max = count($arrayOfProperties);
                              for ($x = 0; $x < $max; $x++) {
                                //no comma after last property.
                                //if ($x == $max-1) {
                                  //fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x]);
                              //  } else {
                                   //fputs($fp,"                ".$arrayOfProperties[$x].": obj.".$arrayOfProperties[$x].",\n");
                              //  }
                              fputs($fp, "        <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 '>\n");
                              fputs($fp, "            <div>\n");
                              fputs($fp, "                <label>".$arrayOfProperties[$x]."</label>\n");
                              fputs($fp, "            </div>\n");
                              fputs($fp, "            <input type='text' ng-model='field.".$arrayOfProperties[$x]."' ng-show='field.editable' placeholder='".$arrayOfProperties[$x]."'>\n");
                              fputs($fp, "            <span ng-hide='field.editable'>{{ field.".$arrayOfProperties[$x]." }}</span>\n");
                              fputs($fp, "        </div>\n");
                              }
  ///////////////////////////////////////////////////////////////

  fputs($fp, "        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 '>\n");
  fputs($fp, "            <div>\n");
  fputs($fp, "                <label>Actions</label>\n");
  fputs($fp, "            </div>\n");
  fputs($fp, "            <span class='save-span' ng-click='save(\$index)' ng-show='field.editable'><button class='btn-save'>Save</button></span>\n");
  fputs($fp, "            <span class='delete-span' ng-click='delete(\$index)' ng-show='field.editable'><button class='btn-delete'>Delete</button></span>\n");

  fputs($fp, "        </div>\n");
  fputs($fp, "    </div>\n");
  fputs($fp, "</div>\n");
  fputs($fp, "</div>\n");

  	
	
	///////////////////////////
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-update.template.html</h3>");
	showCode($template_update_final_filepath);
	