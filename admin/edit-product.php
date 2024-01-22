<?php
  session_start();
  include("includes/header.php");
  include('../functions/myfunctions.php');
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
        <?php
          if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = getByID("add_product",$id);
            if(mysqli_num_rows($product)>0)
            {
                $data = mysqli_fetch_array($product);
            ?>
          <div class="card">
            <div class="card-header">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body">
              <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Product Name" class="form-control">
                </div>
                <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" name="slug" placeholder="Enter Slug" value="<?= $data['slug'] ?>" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Description</label>
                <textarea type="text" name="description" placeholder="Enter Description" class="form-control"><?= $data['description'] ?></textarea>
                </div>
                <div class="col-md-12">
                <label for="">Upload Image</label>
                <input type="file" name="image" class="form-control">
                <label for="">Current Image</label>
                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                <img src="../uploads/<?= $data['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                </div>
                <div class="col-md-12">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" placeholder="Enter Meta Title" class="form-control">
                </div>
                <div class="col-md-12">
                <label for="">Meta Description</label>
                <textarea type="text" name="meta_description" placeholder="Enter Meta Description" class="form-control"><?= $data['name'] ?></textarea>
                </div>
                <div class="col-md-12">
                <label for="">Meta Keyword</label>
                <input type="text" value="<?= $data['meta_keywords'] ?>" name="meta_keyword" placeholder="Enter Meta Title" class="form-control">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                </div>
              </div>
              </form>
            
                
            </div>
          </div>
          <?php
            }
            else{
                echo "product not found";
            }
          }
          else{
            echo"ID missing from UR";
          }
          ?>
       </div>
    </div>
</div>
<?php include("includes/footer.php");?>
