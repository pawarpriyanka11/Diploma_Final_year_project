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
                <p class="text-sm mb-0 text-capitalize">Add Products</p>
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
            <a href="add_product.php">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">click here to check</span></p>
              </a>
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
                <p class="text-sm mb-0 text-capitalize">Concept N Controls</p>
                <h4 class="mb-0">.</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">visit </span></p>
            </div>
          </div>
        </div>

        <!-- caleneder and chatbot -->
        <div class="row">
          <!-- calender -->
          <div class="col-md-12">
            <div class="row mt-4">
              <!DOCTYPE html>
              <html lang="en">

              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- <link rel="stylesheet" href="styles.css"> -->
                <title>Interactive Calendar</title>
              </head>

              <body style>
                <div id="calendar-container" style="width: 50%;">
                  <button id="prev-month">Previous Month</button><button id="next-month">Next Month</button>
                  <h2 id="current-month-year"></h2>
                  <div id="calendar"></div>
                </div>
      
              </body>

              </html>
 <!-- To-Do List -->
 <div class="col-md-6">
                <h2>To-Do List</h2>
                <div class="input-group mb-3">
                    <input type="text" id="task-input" class="form-control" placeholder="Add a new task" aria-label="Add a new task" aria-describedby="add-task-btn">
                    <button class="btn btn-success" type="button" id="add-task-btn">Add Task</button>
                </div>
                <ul id="todo-list" class="list-group">
                    <!-- To-Do items will be dynamically added here -->
                </ul>
             
            </div>
            </div>

  </div>
          </div>
          
 
        <script src="assets/js/livechat.js"></script>
        <link rel="stylesheet" href="assets/css/livechat.css">
        <script src="assets/js/calender.js"></script>
        <link rel="stylesheet" href="assets/css/calender.css">
        <script src="assets/js/todolist.js"></script>
        <link rel="stylesheet" href="assets/css/todolist.css">


        <?php include("includes/footer.php"); ?>