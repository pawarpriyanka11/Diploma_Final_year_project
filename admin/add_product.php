<?php
  session_start();
  include("includes/header.php");
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
          <div class="card">
            <div class="card-header">
                <h4>Add Product</h4>
            </div>
            <div class="card-body">
              <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Enter Product Name" class="form-control">
                </div>
                <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" name="slug" placeholder="Enter Slug" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Description</label>
                <input type="text" name="description" placeholder="Enter Description" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Upload Image</label>
                <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Meta Description</label>
                <input type="text" name="meta_description" placeholder="Enter Meta Description" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Meta Keyword</label>
                <input type="text" name="meta_keyword" placeholder="Enter Meta Keyword" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Meta Keyword</label>
                <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                </div>
              </div>
              </form>
            
                
            </div>
          </div>
       </div>
    </div>
</div>
<?php include("includes/footer.php");?>
