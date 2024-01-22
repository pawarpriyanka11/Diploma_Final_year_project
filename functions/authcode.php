<?php
session_start();
include('../config/dbcon.php');

if(isset($_POST['enquiry_btn']))
  {
    $_f_name = mysqli_real_escape_string($conn,$_POST['First_Name']) ;
    $_l_name = $_POST['Last_Name'];
    $_email = $_POST['Email'];
    $_phone = $_POST['Phone_no'];
    $_address = $_POST['Address'];
    $_c_name = $_POST['Company_Name'];
    $_msg = $_POST['Message'];

    //insert data

    $insert_query = "INSERT INTO enquiry (first_name,last_name,email,phone,address,company_name,msg) VALUES ('$_f_name','$_l_name','$_email','$_phone','$_address','$_c_name','$_msg')";
    $insert_run = mysqli_query($conn,$insert_query);

    if($insert_run){
        echo"done";
    }
    else
    {
        echo"error";
    }



  }
  else if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);

    $login_query = "SELECT * FROM login_admin WHERE email='$email' AND pass='$pass'";
    $login_query_run = mysqli_query($conn,$login_query);

    if(mysqli_num_rows($login_query_run) > 0){
      $_SESSION['adminLogin']=true;
      $_SESSION['admin'] = $email;
      $_SESSION['alert'] = "Welcome to Admin Panel";
      //header('Location: ../admin/index.php');
      echo '<script>location.href="../admin/index.php"</script>';
    }
    else{
        $_SESSION['alert'] = "Invalid Credentials";
        header('Location: ../admin/includes/login.php');
    }
  }


?>