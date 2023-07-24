<?php


       include('connect.php');

       session_start();

       $proid   = $_GET['proid'];
       $name    = $_GET['proname'];
       $image   = $_GET['pimage'];
       $price   = $_GET['price'];
       $qty     = $_GET['pqty'];
       $total   = $_GET['ptotal'];


      $cart =  $_SESSION['cart'];
      $_SESSION['cart'][$proid] = array("id"=>$proid, "name"=>$name, "price"=>$price, "qty"=>$qty, "image"=>$image,"total"=>$total); 
       
    //   print_r($_SESSION['cart']);


    if($cart!=null){

        foreach ($cart as $item) {
          if($proid == $item['id'] ){
              
            $tot_qty = $item['qty'] = $item['qty']+$qty;
            $total_bill = $item['total'] = $item['price']*$tot_qty;

            $cart['qty'] = $tot_qty;
            $cart['total'] = $total_bill;

            $_SESSION['cart'][$proid] = array("id"=>$proid, "name"=>$name, "price"=>$price, "qty"=>$tot_qty, "image"=>$image,"total"=>$total_bill); 
 

          }
        }
    }

      header('Location: index.php');
?>