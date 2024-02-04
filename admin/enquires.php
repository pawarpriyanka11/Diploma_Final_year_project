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
                <h4>Enquires</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" >
                    <thead>
                        <tr style="color:black">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <!--th>Address</th-->
                            <th>Company Name</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $enquiry = getAll("enquiry");
                           if(mysqli_num_rows($enquiry)>0){
                            foreach( $enquiry as $item){
                                ?>
                                    <tr>
                                    <td><?= $item['id'] ?> </td>
                                    <td><?= $item['first_name'] ?> </td>
                                    <td><?= $item['last_name'] ?> </td>
                                    <td><?= $item['email'] ?> </td>
                                    <td><?= $item['phone'] ?> </td>
                                    <!--td><!?= $item['address'] ?> </td-->
                                    <td><?= $item['company_name'] ?> </td>
                                    <td><?= $item['msg'] ?> </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="enquiry_id" value="<?= $item['id'] ?>">
                                        <button class="btn btn-danger" type="submit"name="delete_enquiry_btn">Delete</button>
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
