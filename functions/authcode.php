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

    //Verifying Phno

      $Ph_pattern = '/^\+\d{1,4}\d{10}$/';
      $email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

      if ((preg_match($Ph_pattern, $_phone)) &&(preg_match($email_pattern, $_email)) ) {

    $insert_query = "INSERT INTO enquiry (first_name,last_name,email,phone,address,company_name,msg) VALUES ('$_f_name','$_l_name','$_email','$_phone','$_address','$_c_name','$_msg')";
    $insert_run = mysqli_query($conn,$insert_query);

    if($insert_run){
      echo '<script>alert("Form Submitted Successfully..");
          window.location.href = "../equire/equiry_form.php";
          </script>';
    }
    else
    {
        echo"error";
    }

      } 
      else {
          echo '<script>alert("Invalid phone number or email!");
          window.location.href = "../equire/equiry_form.php";
          </script>';
      }

    /*  //Send data to email
    $to = "ayushirahane2021@gmail.com";
    $subject = "New Form Submission";
    $email_msg ="First Name: $_f_name \nLast Name: $_l_name \nEmail: $_email \nPhone no: $_phone \nAddress: $_address \nCompany Name: $_c_name \nMessage: $_msg";
    echo $email_msg;
    if(mail($to,$subject,$email_msg)){
      echo"Done";
    }
    else{
      echo"error";
    }*/
    

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
        echo"error";
        header('Location: ../admin/includes/login.php');
    }
  }


?>