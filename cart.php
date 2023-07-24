
<?php include('header.php')  ?>

<div class="container">
<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>

                            <?php

                                error_reporting(0);
                                $total_bill = 0;

                                $cart = $_SESSION['cart'];

                                if($cart == null){

                                    echo "<h3 style='color:red'> your cart is empty </h3>";


                                }else{

                                    // $cart  = $_SESSION['cart'];
                                    foreach($cart as $c){

                             
                            ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="removecart.php?id=<?=$c['id']?>"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"> <img src="upload/<?=$c['image']?>" class="img" alt=""> </div></td>
						        
						        <td class="product-name">
						        	<h3><?=$c['name']?></h3>
						       
                                </td>
						        
						        <td class="price"><?=$c['price']?></td>
                                <td class="qty"><?=$c['qty']?></td>
						        
					          </td>
						        
						        <td class="total"><?=$c['total']?></td>
						      </tr><!-- END TR-->
                         <?php

                            $total_bill = $cart['total'] = $cart['total']+$c['total']; 

                           
                            }

                           
                             }

                             ?>
						        
						    </tbody>
                            <tr>
                             <td>Total Bill:<?php echo $total_bill ?></td>
                           </tr>
						  </table>
					  </div>

</div>

<?php include('footer.php')  ?>
    
</body>
</html>