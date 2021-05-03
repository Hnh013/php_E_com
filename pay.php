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


$price = (int)$_POST['price'];
$customername = $_POST['customername'];
$email = $_POST['email'];
$contactno = $_POST['contactno'];
$address = $_POST['address'];
$description = $_POST['description'];

echo $description.substr(0,2);
echo $price;
echo $customername;
echo $email;
echo $contactno;
echo $address;
echo $description;

//INSERT INTO `orders` (`id`, `name`, `contactno`, `email`, `price`, `description`, `address`, `placed_at`) VALUES (NULL, 'eve hot', '3243345355', 'eve@hot.com', '1799', 'sample items', 'ssample address', current_timestamp());

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
 

       <style>
        .payment-form{
  padding-bottom: 50px;
  font-family: 'Montserrat', sans-serif;
}

.payment-form.dark{
  background-color: #f6f6f6;
}

.payment-form .content{
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  background-color: white;
}

.payment-form .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.payment-form .block-heading p{
  text-align: center;
  max-width: 420px;
  margin: auto;
  opacity:0.7;
}

.payment-form.dark .block-heading p{
  opacity:0.8;
}

.payment-form .block-heading h1,
.payment-form .block-heading h2,
.payment-form .block-heading h3 {
  margin-bottom:1.2rem;
  color: #3b99e0;
}

.payment-form form{
  border-top: 2px solid #5ea4f3;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  background-color: #ffffff;
  padding: 0;
  max-width: 600px;
  margin: auto;
}

.payment-form .title{
  font-size: 1em;
  border-bottom: 1px solid rgba(0,0,0,0.1);
  margin-bottom: 0.8em;
  font-weight: 600;
  padding-bottom: 8px;
}

.payment-form .products{
  background-color: #f7fbff;
    padding: 25px;
}

.payment-form .products .item{
  margin-bottom:1em;
}

.payment-form .products .item-name{
  font-weight:600;
  font-size: 0.9em;
}

.payment-form .products .item-description{
  font-size:0.8em;
  opacity:0.6;
}

.payment-form .products .item p{
  margin-bottom:0.2em;
}

.payment-form .products .price{
  float: right;
  font-weight: 600;
  font-size: 0.9em;
}

.payment-form .products .total{
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  margin-top: 10px;
  padding-top: 19px;
  font-weight: 600;
  line-height: 1;
}

.payment-form .card-details{
  padding: 25px 25px 15px;
}

.payment-form .card-details label{
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #79818a;
  text-transform: uppercase;
}

.payment-form .card-details button{
  margin-top: 0.6em;
  padding:12px 0;
  font-weight: 600;
}

.payment-form .date-separator{
  margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
}

@media (min-width: 576px) {
  .payment-form .title {
    font-size: 1.2em; 
  }

  .payment-form .products {
    padding: 40px; 
    }

  .payment-form .products .item-name {
    font-size: 1em; 
  }

  .payment-form .products .price {
      font-size: 1em; 
  }

    .payment-form .card-details {
      padding: 40px 40px 30px; 
    }

    .payment-form .card-details button {
      margin-top: 2em; 
    } 
}
       </style>



    <title>Hello, world!</title>
  </head>
  <body class="bg-light">
   
   <?php 
       require_once('./php/header.php');
   ?>




<!----------------------------------->


 <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
          <p>We Thank you for shopping with us and would try our best to provide you with the best service . Happy Shopping !</p>
        </div>
        <form method="POST" action='success.php'>
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              
              <p class="item-description"><h6><?php echo $description ;?></h6></p>
            </div>
            <div class="total">Total<span class="price"><?php echo $price ?></span></div>
          </div>
          <div class="card-details">

            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-primary btn-block" name="order_now">Proceed</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>

<!------------------------------------>





     <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>




<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {


  
  $sql = "INSERT INTO `orders` (`name`, `contactno`, `email`, `price`, `description`, `address`, `placed_at`) VALUES ('$customername', '$contactno', '$email', '$price', '$description', '$address', current_timestamp())";
  $result =  $result = mysqli_query($conn, $sql);

  unset($_SESSION['cart']);

}




?>