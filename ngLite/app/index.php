<?php
session_start();
if(isset($_GET) && isset($_GET['c']) && isset($_GET['m']) && $_GET['c'] == 'private' && $_GET['m'] == 'logout' ){
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
}
?>
<!doctype html>
<html lang="en" ng-app="App">
  <head>
    <meta charset="utf-8">

    <title>ngLite</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="app.animations.css" />
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous">
		</script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-animate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.6.7/angular-resource.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-route.js"></script>



    <!-- AOS: Animate on Scroll -->
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

    <script src="app.module.js"></script>
    <script src="app.config.js"></script>
    <script src="app.animations.js"></script>

    <script src="core/core.module.js"></script>
    <script src="core/checkmark/checkmark.filter.js"></script>


    <script src='core/finaltest/finaltest-core.module.js'></script>
    <script src='core/finaltest/finaltest-core.service.js'></script>

    <script src='finaltest-list/finaltest-list.module.js'></script>
    <script src='finaltest-list/finaltest-list.component.js'></script>

    <script src='finaltest-new/finaltest-new.module.js'></script>
    <script src='finaltest-new/finaltest-new.component.js'></script>

    <script src='finaltest-update/finaltest-update.module.js'></script>
    <script src='finaltest-update/finaltest-update.component.js'></script>
 <!--
 Remember:
 0) { check API : make sure CREATE TABLE is commented out.  }
 1) { change root_dir in components update, new , and core

 4) { add to the core.module}
 5) { add it to the menu }
 6) { redirect after creating a new record in component}
 7) { fix back buttons in views}
 8) { add final slash to redirect in new or update...

 -->



<style>
		    .dev-fixed-footer{position:fixed;bottom:0px;left:0px;height:100px;overflow-y:scroll;border:solid 1px #ccc;
		</style>

  </head>

	<div class="dev-fixed-footer " style="width:100%;">
	    <?php
	        //Initial Properties
	        $is_logged_in = false;
	        $_SESSION['menu'] = array();
	        //Handle Requests
	        if(isset($_GET)){
	            if (isset($_GET['c'])) {
                	switch ($_GET['c']) {
                		case 'public' :
                			 if (isset($_GET['m'])) {
                            	switch ($_GET['m']) {
                            		case 'public1' :
                            		    print_r($_GET);
                            			break;

                                    case 'public2' :
                                        print_r($_GET);
                            			break;

                            		default :
                            		    echo('<br>Unexpected method request params');
                		                print_r($_GET);
                            			break;
                            	}
                            }

	                        break;
                        case 'private' :
                             if (isset($_GET['m'])) {
                            	switch ($_GET['m']) {
                            		case 'private1' :
                            		    print_r($_GET);
                            			break;

                                    case 'private2' :
                                        print_r($_GET);
                            			break;
                            		case 'login' :
                                        print_r($_GET);
                                        if($_GET['pwd'] == "yes"){
                                            $_SESSION['is_logged_in'] = true;
                                        }
                            			break;

                            		case 'logout' :
                                        print_r($_GET);
                                        //has to be handled before modified header info
                                        //session_start();

                            			break;







                            		 case 'makeMenuItem' :
                            		     if($_GET['section'] != "" && $_GET['display'] != "" && $_GET_['url'] != ""){


                            		     }
                                        print_r($_GET);

                            			break;
                            		default :
                            		    echo('<br>Unexpected method request params');
                		                print_r($_GET);
                            			break;
                            	}
                            }
                			break;

                		default :
                		    echo('<br>Unexpected controller request params');
                		    print_r($_GET);
                			break;
                	}
                }

	        }

	        //Define Dynamic Properties
	          if($_SESSION['is_logged_in'] == true){
	            $is_logged_in = true;
	        }else{
	             $is_logged_in = false;
	        }
	        echo("<br>is_logged_in:".$is_logged_in);
	    ?>
	</div>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>
					<div class="collapse navbar-collapse" id="myNavbar" >
						<div class="navbar visible-desktop">
							<div class="navbar-inner ">
								<div class="container-fluid" style="margin-left:50px !important;margin-right:50px !important;">
									<ul class="nav navbar-nav">
										<li>
											<a class="navbar-brand" href="dashboard.php?c=dashboard&m=home" style="color:#fff !important;">Dashboard</a>
										</li>
										<!-- menu section public -->
										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Public Section <span class="caret"></span></a>
    										<ul class="dropdown-menu">
        										<li> <a id='public1' href='?c=public&m=public1'> public1 </a></li>
        										<li> <a id='public2' href='?c=public&m=public2'> public2 </a></li>
        										<li> <a id='public3' href='#!/finaltest'> finaltest </a></li>

    										</ul>
										</li>
										<?php if($is_logged_in == true){ ?>
											<!-- menu section private -->
    										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Private Section <span class="caret"></span></a>
        										<ul class="dropdown-menu">
            										<li> <a id='private1' href='?c=private&m=private1'> private1 </a></li>
            										<li> <a id='private2' href='?c=private&m=private2'> private2 </a></li>
            										<li> <a id='private3' href='?c=private&m=private3'> private3 </a></li>
        										</ul>
    										</li>

    										<?php if($_GET['section'] == '1'){ ?>
    											<!-- menu section custon -->
        										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Custom Section <span class="caret"></span></a>
            										<ul class="dropdown-menu">
            										    <?php if($_GET['order'] == '0'){ ?>
                										    <li> <a class='xxx' href='http://<?php echo($_GET['url']); ?>'> <?php echo($_GET['display']); ?> </a></li>
                										<?php } ?>
                										 <?php if($_GET['order'] == '0'){ ?>
                										    <li> <a class='xxx' href='http://<?php echo($_GET['url']); ?>'> <?php echo($_GET['display']); ?> </a></li>
                										<?php } ?>
                										 <?php if($_GET['order'] == '0'){ ?>
                										    <li> <a class='xxx' href='http://<?php echo($_GET['url']); ?>'> <?php echo($_GET['display']); ?> </a></li>
                										<?php } ?>


            										</ul>
        										</li>

    										<?php } ?>

										<?php
										} //is_logged_in
										?>


									</ul>
									<ul class="nav navbar-nav navbar-right">



										<li>
											<a href=""><span class="glyphicon glyphicon-user"></span>Register</a>
										</li>
											<li>
											<a href="?c=private&m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
										</li>
	                                    <li>
											<a href="?c=private&m=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
										</li>
									</ul>

								</div>
							</div>
						</div>

					</div>
				</div>
			</nav>

		<!-- ==========================================================================  -->
		 <?php $heightOfNavigation = "65px"; ?>
    <div class="row" style="margin-top:<?php echo($heightOfNavigation); ?>;">
    <div class="view-container" >

      <div ng-view class="view-frame"></div>

    </div>
    <div style='display:none;' >
        <p>SOW created a CRUD app converted from the ANgularjs PhoneCat app.</p>
        <p>Everyfile is named phone...</p>
        <p>All Directories are named Phone...</p>
        <p>The data is being pulled from the core phone object like this...https://www.sprite-pilot.com/sow/API/phones/phones.php?phoneId=:phoneId</p>
        <p>The phones.php API file appears to just handle one scenario of data manipulation.</p>
        <p>The data is stored in a database named fortew6_phones or something like that...</p>
        <p>DB has been switched from ..._phones to .._sow as well as API files connection data...</p>
        <p>The API phones_crud.php does get used for CRUD however is not part of the 'core' angular section.</p>
        <p>changes needed to synce API:</p>
        <ul>
            <li>phones.service.js  URL  </li>
            <li>All CRUD components need to change their 'scope.endpoint' from /phones/phones_crud.php   to /sow/data_crud.php once API file names change</li>
            <li>then the API dir and files need to be renamed ...dir=sow and data.php and data_crud.php</li>
        </ul>
        <p>API changes are complete ...had to clear cache ...</p>
        <p>more API changes:</p>
        <ul>
            <li>data.php still listens for 'phones' and 'phoneID' looking for where $_GET['phoneId']=="phones"</li>
            <li>core > phone > phone.service.js ... is making a GET request with the above params...</li>
            <li>data_details.php still handles 'field-specific' data...</li>
            <li> the route config uses these .. /phones/:phoneId  for CRUD or id specific methods.</li>
            <li> HTML an example is the phone list uses ...href="#!/phone-update/{{phone.id}}"</li>
        </ul>
        <p>Core conversion:</p>
        <ul>
            <li>After changing all the core > phone file names to core > data ...</li>
            <li>Where is got injected from other modules had to change from core.phone to core.data as well.</li>
        </ul>
        <p>Next logical step: ? focus on one area, the default area of phone-list ...</p>
        <ul>
            <li>
            from index.htm the include statements
            </li>
            <li>to main module include name change</li>
            <li>route config not sure </li>
            <li>Change DIR and file names from phone-list to data-list etc....</li>
            <li>then all references inside the files</li>
            <li>but not sure about the Phone class object, wonder if it could be generic Object instead? NOPE. </li>
        </ul>
        <p>Now phone-list is sow-list HOWEVER, the Phone class in component and core service seems inflexible. Why?</p>
        <ul>
            <li>I tried swapping Phone with Sow in both but it didn't work?</li>
            <li>changing name of Phone to Data in both DID work....why? because it is named data.service.js instead of sow.service.js</li>
            <li>before any of this it was phone.service.js....</li>
            <li>left off with phone-update using Data as the ngResource successfully should change that for ALL before continuing....</li>
        </ul>
        <p>data service has now been switched from Phone to Data for all sections.</p>
        <p>Next...back to phone-list and check dir and file names...</p>
        <ul>
            <li>Change DIR and file names</li>
            <li>change index includes</li>
            <li>change main module include</li>
            <li>change DIRECTIVE in config routing as well as the event it is listening for...</li>
        </ul>
        <p>change the rest</p>
        <ul>
            <li>all includes from phone to sow</li>
            <li>all main module includes</li>
            <li>router listeners and DIRECTIVES </li>
        </ul>
        <p>All DIRs and  files and redirects have been renamed ...what's left ?</p>
        <ul>
            <li>the ngApp of phoneCat </li>
            <li>the phoneID mechanism....</li>
            <li>
            <ul>
                <li>phoneID is in both views and components especially 'detail' related</li>
                <li>also in core data and API files</li>
                <li>in the router config as well</li>
            </ul>
            </li>
        </ul>
        <p>net quick fix css class name disconnects...</p>
        <p>Then ... the property specific details models....</p>
        <ul>
            <li>
                API crud .php needs to ADAPT
            </li>
            <li>list page has an order by parameter...</li>
            <li>snippets should be renamed 'fields' becasue that is what they represent EXECEPT for the one thats really a description.</li>
            <li>snippets all switched over except for a few non data related bugs...</li>
            <li>The next challenge is converting from 'Pre-Defined' properties to 'Adaptable' properties....</li>
            <li>crud.php has 4 methods to adapt: add,update,add_details,update_details</li>
            <li>change both component and templates for both 'new/add' and 'update'  files.</li>
            <li>and of course the database has to change...</li>


        </ul>
        <p>After the 'fields' are updated in CRUD methods and their related templates and components...Refactor</p>
        <p>What code can be reduced or eliminated</p>
        <ul>
            <li>the db configs and mysqli engine code</li>
            <li>do the 'new' files need the other CRUD methods ? etc etc...</li>
        </ul>
    </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
