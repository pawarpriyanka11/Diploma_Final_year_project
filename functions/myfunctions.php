<?php
include('../config/dbcon.php');
function getAll($table){
    global $conn;
   $query = "SELECT * FROM $table";
  return $query_run = mysqli_query($conn,$query);
}

function getByID($table,$id){
    global $conn;
   $query = "SELECT * FROM $table where id='$id'";
  return $query_run = mysqli_query($conn,$query);
}


function redirect($url,$message){
    $_SESSION['msg']=$message;
    header('Location: '.$url);
    exit(0);
}
?>