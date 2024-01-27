<?php
  session_start();
  include("includes/header.php");
  include("../config/dbcon.php");
  ?>

<?php


 if(isset($_SESSION['adminLogin']) && isset($_SESSION['admin']))
 {
    echo '';
 }
 else
 {
  echo '<script>location.href="./includes/login.php"</script>';
   // header("includes/login.php"); 
 }
 ?>


<div class="container">
<?php 
              if(isset($_SESSION['alert']))
               {
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
$query_run = mysqli_query($conn,$enqury_count_query);
if ($query_run) {
  // Fetch the result as an associative array
  $row = $query_run->fetch_assoc();
  if($row['total_rows']>0){
    ?>
    <h4 class="mb-0"><?= $row['total_rows'];?></h4>
    <?php
  }
  else{
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
<a href="enquires.php"><p class="mb-0"><span class="text-success text-sm font-weight-bolder">click here to check</span></p></a>
</div>
</div>
</div>
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
$query_run = mysqli_query($conn,$enqury_count_query);
if ($query_run) {
  // Fetch the result as an associative array
  $row = $query_run->fetch_assoc();
  if($row['total_rows']>0){
    ?>
    <h4 class="mb-0"><?= $row['total_rows'];?></h4>
    <?php
  }
  else{
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
<a href="product.php"><p class="mb-0"><span class="text-success text-sm font-weight-bolder">click here to check</span></p></a>
</div>
</div>
</div>
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
</div>
        </div>
    </div>
    </div>
</div>

<?php include("includes/footer.php");?>
