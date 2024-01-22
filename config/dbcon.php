<?php
  $db_server = "localhost";
  $db_name = "root";
  $db_password ="";
  $db_database = "cnc_db";
  
  if(!$conn=mysqli_connect($db_server,$db_name,$db_password,$db_database)){
    echo"not Connected";
  }



?>