<?php
//Angular table-list.template.js ////////////////////////////////
/////////////////////////////////////////////////////////////////////
	unset($template_final_filepath);
	$directory = "./" . strtolower($objectName) . "/";
	if($appropriateDirectory){
	  // $directory = "app/".$objectName."-list/";
	        $directory = $directory_app_list;
	}
	$template_final_filepath = $OS_FILE_PATH . $directory .= $objectName."-list.template.html";
	echo("\n\$template_final_filepath: ".$template_final_filepath);
	//---WRITE
	$fp = fopen($template_final_filepath, "w") or die("Couldn't open $template_final_filepath");
	//array of properties to comma separated parameters
	$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	
    fwrite($fp, "<div class='container-fluid'>\n");
    fputs($fp, "   <div class='col-md-2 col-xs-12'>\n");
    fputs($fp, "    <!--Sidebar content-->\n");
    fputs($fp, "     <p>\n");
    fputs($fp, "         <a href='#!/".$objectName."-new/'><button>new</button></a>\n");
    fputs($fp, "    </p>\n");
    fputs($fp, "   <p>\n");
    fputs($fp, "      Search:\n");
    fputs($fp, "      <input ng-model='\$ctrl.query' />\n");
    fputs($fp, "    </p>\n");
    fputs($fp, "    <p>\n");
    fputs($fp, "      Sort by:\n");
    fputs($fp, "     <select ng-model='\$ctrl.orderProp'>\n");
    fputs($fp, "       <option value='name'>Alphabetical</option>\n");
    fputs($fp, "       <option value='ordering'>Newest</option>\n");
    fputs($fp, "     </select>\n");
    fputs($fp, "   </p>\n");
    fputs($fp, " </div>\n");
    fputs($fp, " <div class='col-md-10 col-xs-12'>\n");
    fputs($fp, "   <!--Body content-->\n");
    fputs($fp, "  <ul>\n");
    fputs($fp, "    <li ng-repeat='obj in \$ctrl.objects | filter:\$ctrl.query | orderBy:\$ctrl.orderProp'  class='thumbnail ".$objectName."-list-item'>\n");
    fputs($fp, "       <h3>{{obj.name}}</h3>\n");
    fputs($fp, "      <p>{{obj.snippet}}</p>\n");
    fputs($fp, "      <p>\n");
    fputs($fp, "           <a href='#!/".$objectName."-update/{{obj.id}}'><button>update</button></a>  \n");
    /*
    // To See Child Tables could do something like this...
     fputs($fp, "           <a href='#!/".$objectName."-update/{{obj.id}}'><button>update</button></a> <a href='#!/".$objectName."-detail-update/{{obj.id}}'><button class='btn-details'>Details</button></a>\n");
    */
    fputs($fp, "      </p>\n");
    fputs($fp, "    </li>\n");
    fputs($fp, "  </ul>\n");
    fputs($fp, "</div>\n");
    fputs($fp, "</div>\n");
	
	
	///////////////////////////
	fclose($fp);
	
	echo("<h3>AngularJS ".$objectName."-list.template.html</h3>");
	showCode($template_final_filepath);
	