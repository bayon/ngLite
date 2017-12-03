<?php

$HOST = "localhost";
$USER = "username";
$PASS = "password";
$DB="database";
$TABLE="data";
$DETAIL_TABLE = "data_details";
$con=mysqli_connect($HOST,$USER,$PASS,$DB);
   

  function exe_sql($con, $sql) {
       $res = mysqli_query($con, $sql);
       if (mysqli_connect_errno())  {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
       }
       if (gettype($res) == "boolean") {
         //INSERT creates a boolean for $res
         //return last id
         return mysqli_insert_id($con);
       }
     $data = "";
       while ($row = mysqli_fetch_assoc($res)) {
         $data[] = $row;
       }
       mysqli_free_result($res);
       mysqli_close($con);
       return json_encode($data);
     }   
    
?>