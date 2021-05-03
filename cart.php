<?php 
session_start();

require_once('./php/component.php');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');

// Try db connection

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
    die('Sorry failed to connect: '. mysqli_connect_error());
}


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />
   
     <link rel="stylesheet" type="text/css" href="styles.css">

    <title>Hello, world!</title>
  </head>
  <body class="bg-light">
   
   <?php 
       require_once('./php/header.php');
   ?>

   <div class="container-fluid">
   	<div class="row px-5">
   		<div class="col-md-7">
   			<div class="shopping-cart">
   				<h6>My Cart</h6>
                 <hr>

                 <?php 

                 if(isset($_SESSION['cart'])){

                 	$product_id = array_column($_SESSION['cart'], "product_id");
                    //print_r($_SESSION['cart']);
                    $total = 0;
                    $items = '';
                    $ex = ",";
                    $sql = "SELECT * FROM items" ; 
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)){
                        
                        foreach($product_id as $id){
                           if($row['id'] == $id) {
                           	   cartElement($row['image'], $row['name'], $row['price'], $row['id']);
                           	   $items = $items."Product Name : - ".($row['name'])."\n Product Price : - ".$row['price'].",\n";
                           	   
                           	   $total = $total + (int)$row['price'];
                           }
                        }
                    }

                 }

                 else {
                 	echo "Cart is Empty";
                 }


                          
                 ?>

   			</div>
   		</div>	
   		<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <form action="pay.php" method="POST">   			

   			<div class="pt-4">
   				<h6>Price Details</h6>

   				<hr>
   				<div class="row price-details">
   					<div class="col-md-6">
   					   <?php
   					   if(isset($_SESSION['cart'])){
   					   	$count = count($_SESSION['cart']);
   					   	echo "<h6>Price ($count items)</h6>";
   					   }else {
   					   	echo "<h6>Price (0 items)</h6>";
   					   }
                       ?>
                       <h6>Delivery Charges</h6>
                       <hr>
                       <h6>Amount Payable</h6>
                       
                       



   					</div>
   					
   					<div class="col-md-6">
   						<h6><?php if($total) { echo "$".$total;  } ?></h6>
   						<h6 class="text-success"> FREE </h6>
   						<hr>
   					    <h6><input type="text" disabled value="<?php echo $total ;?>">
                           <input type="hidden" name="price"  value="<?php echo $total ;?>"></h6>
   					   
   					</div>
   				</div>

   				<div class="row price-details">
   					<div class="col-md-12">
   						<h6 align="center">Delivery Details</h6>
   						<div class="col-md-12">
                           <input placeholder="Name" type="text" name="customername" id="customername" class="col-md-5 form-control">
   						</div><br>
   					    <div class="col-md-12">
                        <input placeholder="Email" type="email" name="email" id="email" class="form-control">
                        </div><br>
                        <div class="col-md-12">
                        <input placeholder="Contact No." type="text" name="contactno" id="contactno" class="form-control"></div><br>
                        <div class="col-md-12">
                        <textarea name="address" placeholder="Address" id="address" rows="3" cols="50" class="form-control"></textarea>
                        </div><br>
                        <div class="col-md-12">
                        <input type="hidden" value="<?php echo $items ;?>" 
                        	name="description" id="description" rows="3" cols="50" class="form-control"></textarea>
                        </div><br>
                        <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="submit"> Proceed To Checkout &nbsp;<i class="fa fa-credit-card" aria-hidden="true"></i></i></button>
                        </div>
                   </div>
   				</div>
   			</form>

   				<!-- <div class="row-price-details">
   					
   				</div> -->
   			</div>	
   		</div>		

   	</div>	
   </div>







  	 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
