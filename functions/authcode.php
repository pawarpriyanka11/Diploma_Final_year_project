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
      echo '<script>
      window.alert("Form Submitted Successfully..");
      window.location.replace("../equire/equiry_form.php");
</script>';
          $html="<table><tr><td>First Name</td><td>$_f_name</td></tr><tr><td>Last Name</td><td>$_l_name</td></tr><tr><td>Email</td><td>$_email</td></tr><tr><td>Phone</td><td>$_phone</td></tr><tr><td>Address</td><td>$_address</td></tr><tr><td>Company</td><td>$_c_name</td></tr><tr><td>Message</td><td>$_msg</td></tr></table>";
	
	include('../smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="yesitslight@gmail.com";
	$mail->Password="iwjf ryic wocb ukhk";
	$mail->SetFrom("yesitslight@gmail.com");
	$mail->addAddress("yesitslight@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="New Enquiry";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if ($mail->send()) {
   

} else {
    echo '<script>alert("Error: ' . $mail->ErrorInfo . '"); window.location.href = "../equire/equiry_form.php";</script>';
}

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