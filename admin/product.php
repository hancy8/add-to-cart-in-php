<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Product </title>
  
</head>
<body>
<?php include('admin_header.php') ?>
<?php include('connect.php') ?>
    

<div class="container">

  <div class="row">
       
       <div class="col-lg-6">
           
           <form action="product.php" method="post" enctype="multipart/form-data">
           
           <div class="form-group">
            <label>Name :</label>
            <input type="text" class="form-control" name="name"  placeholder="Enter Name">
            </div>

            <div class="form-group">
            <label>Categories :</label>
            <select name="catid" class="form-control" >
               <option value="">Select Category</option>

               <?php
         
         $sql = "select * from categories";
         $rs  = mysqli_query($con,$sql);
         if(mysqli_num_rows($rs)>0){
             while($col = mysqli_fetch_array($rs)){
                 ?><option value="<?=$col['catid']?>"><?= $col['name']?></option><?php   
             }
         }else{
            ?><option>No Categories Found</option><?php   
           
         }

         ?>
            
            </select>
            </div>



            <div class="form-group">
            <label>Description :</label>
            <input type="text" class="form-control" name="desc"  placeholder="Enter Description">
            </div>



            <div class="form-group">
            <label>Price :</label>
            <input type="text" class="form-control" name="price"  placeholder="Enter Price">
            </div>

            <div class="form-group">
            <label>Image :</label>
            <input type="file" class="form-control" name="image"  >
            </div>


            <input type="submit" class="btn btn-primary" value="Add Products" name="add">
           
           </form>
       
       </div>
  
  </div>



  <table class="table">
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Price</th>
         <th>Description</th>
         <th>Image</th>
         <th>Action</th>
       
       </tr>

       <?php
       
       $sql = "select * from products";
       $rs  = mysqli_query($con,$sql);
       while($data=mysqli_fetch_array($rs)){

       
       
       ?>

        
         <tr>
              <td><?= $data['proid']  ?></td>
              <td><?= $data['name']  ?></td>
              <td><?= $data['price']  ?></td>
              <td><?= $data['description']  ?></td>
              <td><img src="../upload/<?= $data['image']  ?>" alt="" style="width:100px;height:100px;"></td>
              <td>
              <a href='product.php?id=<?=$data['proid']?>' class="btn btn-info">Edit</a>
              <a href='product.php?id=<?=$data['proid']?>' class="btn btn-danger">Delete</a>
              
              </td>
         </tr>



       <?php

       }

       ?>
  
  </table>



  </div>


<?php
   if(isset($_POST['add'])){

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $file = $_FILES['image']['name'];
    $tmp  = $_FILES['image']['tmp_name'];
    $status = 1;
    $catid = $_POST['catid'];


    move_uploaded_file($tmp, "../upload/$file");


    $sql = "INSERT INTO `products`( `name`, `price`, `description`, `image`, `catid`, `status`)
     VALUES ('$name','$price','$desc','$file','$catid','$status')";

    if(mysqli_query($con,$sql)){
        echo "<script>alert('Record Inserted')</script>";
    }else{
      echo "<script>alert('Not Inserted')</script>";
    }
  
 }

?>
</body>
</html>