<?php
session_start();

   include('../config/dbcon.php');
   include('../functions/myfunctions.php');
  if(isset($_POST['add_product_btn'])){
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    //uploading image
    $image = $_FILES['image']['name'];
    $path="../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().".".$image_ext;
   
    //run query to insert data in db

    $product_query =  "INSERT INTO add_product (name,slug,description,meta_title,meta_description,meta_keywords,image) VALUES (' $name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$filename')";

    $product_query_run = mysqli_query($conn,$product_query);

    if($product_query_run)
    {
       move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
       redirect("add_product.php","Product Added Successfully");
    }
    else{
        redirect("add_product.php","Something Went Wrong");
    }


  }
  else if(isset($_POST['update_product_btn'])){

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    //uploading image
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image !=""){
      //$update_filename = $new_image;
      $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
      $update_filename= time().".".$image_ext;
    }
    else{
      $update_filename = $old_image;
    }
    $path="../uploads";

    $update_query = "UPDATE add_product SET name='$name', slug='$slug',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keyword',image='$update_filename' WHERE id='$product_id'";

    $update_query_run = mysqli_query($conn, $update_query);

    if($update_query_run)
    {
      if($_FILES['image']['name'] != "")
      {
          move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
          if(file_exists("../uploads/".$old_image))
          {
            unlink("../uploads/".$old_image);
          }
    }
        redirect("edit-product.php?id=$product_id","product updated Successfully");
  }
    else{
      redirect("edit-product.php?id=$product_id","Something went wrong");
      }
  }
  else if(isset($_POST['delete_product_btn'])){
    $product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
    $product_query = "SELECT * FROM add_product WHERE id='$product_id'";
    $product_query_run = mysqli_query($conn,$product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];
    $delete_query = "DELETE FROM add_product WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($conn,$delete_query);

    if($delete_query_run){
      if(file_exists("../uploads/".$image))
      {
        unlink("../uploads/".$image);
      }
      redirect("product.php","Product deleted Successfully..");
    }
    else{
      redirect("product.php","Something wnet wrong..");
    }
  }
?>