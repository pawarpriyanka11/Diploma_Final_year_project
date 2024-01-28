<?php
session_start();
?>
<link rel="stylesheet" href="../assets/css/enquiry.css">
<link rel="stylesheet" href="../assets/css/login.css">
<div class="title-div">
   <h1 class="title-hidden" style="margin-top:22px; margin-bottom:0%;">ADMIN PANEL-LOGIN</h1>
</div>
<?php
if (isset($_SESSION['alert'])) {
?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Hey!</strong> <?= $_SESSION['alert']; ?>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
<?php
   unset($_SESSION['alert']);
}
?>
<div class="container-form-super-div">
   <div class="container-form">
      <div class="text">
         Login
      </div>
      <form action="..\..\functions/authcode.php" method="POST">
         <div class="login_img"><img src="../assets/img/login.png"></div>
         <div class="form-row">
            <div class="input-data">
               <input type="email" name="Email" required>
               <div class="underline"></div>
               <label for="">Email Address</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="password" name="password" required><br>
               <div class="underline"></div>
               <label for="">Password</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data textarea">
               <div class="form-row submit-btn">
                  <div class="input-data">
                     <div class="inner"></div>
                     <input type="submit" name="login_btn" value="login">
                  </div>
               </div>

      </form>
   </div>
</div>