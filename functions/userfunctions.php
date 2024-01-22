<?php 

session_start();
include('config/dbcon.php');

function getAllitem($table){
    global $conn;
   $query = "SELECT * FROM $table";
  return $query_run = mysqli_query($conn,$query);
}


function redirect($url,$message){
    $_SESSION['msg']=$message;
    header('Location: '.$url);
    exit(0);
}
?>