<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Categories </title>
  
</head>
<body>
<?php include('admin_header.php') ?>
<?php include('connect.php') ?>
    

<div class="container">

  <div class="row">
       
       <div class="col-lg-6">
           
           <form action="categories.php" method="post">
           
           <div class="form-group">
            <label>Name :</label>
            <input type="text" class="form-control" name="name"  placeholder="Enter Category Name">
            </div>

            <input type="submit" class="btn btn-primary" value="Add Category" name="add">
           
           </form>
       
       </div>
  
  </div>

  
  <table class="table">
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Action</th>
       
       </tr>

       <?php
       
       $sql = "select * from categories";
       $rs  = mysqli_query($con,$sql);
       while($data=mysqli_fetch_array($rs)){

       
       
       ?>

        
         <tr>
              <td><?= $data['catid']  ?></td>
              <td><?= $data['name']  ?></td>
              <td>
              <a href='categories.php?id=<?=$data['catid']?>' class="btn btn-info">Edit</a>
              <a href='categories.php?id=<?=$data['catid']?>' class="btn btn-danger">Delete</a>
              
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

      $sql = "INSERT INTO `categories`(`name`) VALUES ('$name')";

      if(mysqli_query($con,$sql)){
          echo "<script>alert('Record Inserted')</script>";
      }else{
        echo "<script>alert('Not Inserted')</script>";
      }
    
   }

?>

   
    
</body>
</html>