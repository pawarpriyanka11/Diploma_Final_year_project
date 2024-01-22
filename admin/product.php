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
    <div class="row">
        <div class="col-md-12">
           <div class="card">
            <div class="card-header">
                <h4>Categories</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $product = getAll("add_product");
                           if(mysqli_num_rows($product)>0){
                            foreach( $product as $item){
                                ?>
                                    <tr>
                                    <td><?= $item['id'] ?> </td>
                                    <td><?= $item['name'] ?> </td>
                                    
                                    <td>
                                        <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                    </td>
                                    <td>
                                        <a href="edit-product.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                        <button class="btn btn-danger" type="submit"name="delete_product_btn">Delete</button>
                                        </form>
                                    </td>
                                    
                                    </tr>
                                <?php
                            }
                            
                           }
                           else{
                            echo"No records found.";
                           }

                        ?>

                    </tbody>
                </table>
            </div>
           </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>
