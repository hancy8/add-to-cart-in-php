
<?php include('header.php')  ?>

<div class="container">

    <div class="row mb-5">

<?php
include('connect.php');
$id = $_GET['id'];

$sql = "select products.proid,products.name,products.price,products.description,products.image, categories.name as 'cat'
from products
inner join categories on categories.catid = products.catid
where products.proid = '$id'";
$rs = mysqli_query($con,$sql);
$data = mysqli_fetch_array($rs);

?>
            <div class="col-lg-6">

            <img src="upload/<?=$data['image']?>" height="250px" alt="">

            </div>

            <div class="col-lg-6">
            <p><?=$data['name']?></p>
                <p><?=$data['description']?></p>
                <h3><?=$data['cat']?></h3>

                <form action="addtocart.php" method="get">
           
                <input type="hidden" name="proid" value="<?=$data['proid']?>">
                <input type="hidden" name="proname" value="<?=$data['name']?>">
                <input type="hidden" name="pimage" value="<?=$data['image']?>">

                <div class="form-group">
                        <label>Price :</label>
                        <input type="text" class="form-control" id="price" onkeyup="calc()" value="<?=$data['price']?>"  name="price"  >
                        </div>
                        
                    <div class="form-group">
                        <label>Qty :</label>
                        <input type="text" class="form-control" id="qty" onkeyup="calc(this)" name="pqty"  >
                        </div>

                        
                    

                        <div class="form-group">
                        <label>Total :</label>
                        <input type="text" class="form-control" id="total" name="ptotal"  >
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add to Cart" name="add">
                    
           </form>

           <script>
                  function calc(){
                      var qty = document.getElementById("qty").value;
                      var price = document.getElementById("price").value;
                      document.getElementById("total").value = parseInt(qty) * parseInt(price);

                  }

           </script>
          </div>
        </div>

     </div>

<?php include('footer.php')  ?>
    
</body>
</html>