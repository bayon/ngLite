<?php 
header('Content-Type: application/json');
require('../db.php');


$TABLE='finaltest';

if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

if(isset($_GET['dataId'])){
    
    if($_GET['dataId']=='finaltest'){
$sql = "SELECT * FROM ".$DB.".".$TABLE ; 
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_assoc($result)){
              $data[] = $row;
          }
          $json = json_encode($data);
          echo($json);
    }else{
$sql = "SELECT * FROM ".$DB.".".$TABLE."  WHERE id = '".$_GET['dataId']."' "; 
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        $json = json_encode($data[0]);
        echo($json);
    }
   
}


// Free result set
mysqli_free_result($result);
mysqli_close($con);

