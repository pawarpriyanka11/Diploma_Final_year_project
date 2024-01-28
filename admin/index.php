<?php
session_start();
include("includes/header.php");
include("../config/dbcon.php");
?>

<?php

if (isset($_SESSION['adminLogin']) && isset($_SESSION['admin'])) {
  // Do nothing if the admin is logged in
} else {
  echo '<script>
          setTimeout(function(){
            location.href = "./includes/login.php";
          }, 1000); // Redirect after 1 second
        </script>';
  // Avoid redirecting immediately to allow the page to load
  exit; // Add this line to stop the script execution after the redirect
}
?>

<div class="container">
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
  <div class="row">
    <div class="col-md-12">
      <div class="row mt-4">
        <!-- card1 -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>

              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Enquires</p>
                <?php
                $enqury_count_query = "SELECT COUNT(*) AS total_rows FROM enquiry";
                $query_run = mysqli_query($conn, $enqury_count_query);
                if ($query_run) {
                  // Fetch the result as an associative array
                  $row = $query_run->fetch_assoc();
                  if ($row['total_rows'] > 0) {
                ?>
                    <h4 class="mb-0"><?= $row['total_rows']; ?></h4>
                  <?php
                  } else {
                  ?>
                    <h4 class="mb-0">No Enquiry</h4>
                  <?php
                  }
                  ?>

                <?php
                }
                ?>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">

              <a href="enquires.php">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">click here to check</span></p>
              </a>
            </div>
          </div>
        </div>
        <!-- card2 -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">All Products</p>
                <?php
                $enqury_count_query = "SELECT COUNT(*) AS total_rows FROM add_product";
                $query_run = mysqli_query($conn, $enqury_count_query);
                if ($query_run) {
                  // Fetch the result as an associative array
                  $row = $query_run->fetch_assoc();
                  if ($row['total_rows'] > 0) {
                ?>
                    <h4 class="mb-0"><?= $row['total_rows']; ?></h4>
                  <?php
                  } else {
                  ?>
                    <h4 class="mb-0">No Product</h4>
                  <?php
                  }
                  ?>

                <?php
                }
                ?>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <a href="product.php">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">click here to check</span></p>
              </a>
            </div>
          </div>
        </div>

        <!-- card3 -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                <h4 class="mb-0">3,462</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>

        <!-- card4 -->
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sales</p>
                <h4 class="mb-0">$103,430</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
        <!-- caleneder and chatbot -->
        <div class="row">
          <!-- calender -->
          <div class="col-md-12">
            <div class="row mt-4">
              
                <div id="calendar-container" style="width: 50%;">
                  <button id="prev-month" style="height: 30px;
                                                  font-size: 11px;
                                                  font-weight: bold;
                                                  padding: 0px 12px 0px 12px;
                                                  background-color:#ffbe68;
                                                  margin-top:12px;"
    >Previous Month</button><button id="next-month" style="height: 30px;
                                                  font-size: 11px;
                                                  font-weight: bold;
                                                  padding: 0px 12px 0px 12px;
                                                  background-color:#ffbe68;
                                                  margin-top:12px;"
    
    >Next Month</button>
                  <h2 id="current-month-year"></h2>
                  <div id="calendar"></div>
                </div>
                <script src="script.js"></script>

            </div>
          </div>
          <!-- chatbot -->
            <!--div class="chatbot" style="width:39%; height:58%">
              <header>
                <h2>Livechat</h2>
                <span class="close-btn material-symbols-outlined">close</span>
              </header>
              <ul class="chatbox">
                <li class="chat incoming">
                  <span class="material-symbols-outlined">Smart_toy</span>
                  <p id="myParagraph">Hi there &#x1F44B <br> How can I help you today?</p>

              </ul>
              <div class="chat-input">
                <textarea placeholder="Enter a message..." required></textarea>
                <span id="send-btn" class="material-symbols-outlined">send</span>
              </div>
            </div-->
    <div class="chatbot" style="width:39%; height:58%">
        <header>
            <h2>Chatbot</h2>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">Smart_toy</span>
                <p id="myParagraph">Hi there &#x1F44B <br> How can I help you today?</p>
            
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message..." required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
    </div>
        </div>
                
        <?php include("includes/footer.php"); ?>