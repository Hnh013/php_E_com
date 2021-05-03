<?php


session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');

// Try db connection

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
    die('Sorry failed to connect: '. mysqli_connect_error());
}

if (isset($_POST['add'])){
  if(isset($_SESSION['cart'])){
     
      $item_array_id = array_column($_SESSION['cart'],"product_id");

      if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'all.php'</script>";
      }else{
       $count = count($_SESSION['cart']);
       $item_array = array( 
        'product_id' => $_POST['product_id']
      );

       $_SESSION['cart'][$count] = $item_array;
     }  
  }
  else {
    $item_array = array(
      'product_id' => $_POST['product_id']
    );


    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <title>Hello, world!</title>
</head>
<body class="bg-light">
   
<?php 
    require_once('./php/header.php');
?>

<br><br><br><br>


<div class="container my-8">
	



<table class="table table-striped" id="itemTable">
    <thead> 
      <tr class="table-dark">
      <th scope="col">Product Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>



    <?php
    
     $sql = "SELECT * FROM items" ; 
     $result = mysqli_query($conn, $sql);

     while($row = mysqli_fetch_assoc($result)){
        
       echo "
       <tr class='table-striped table-warning'><th scope='row'>".$row['id']."</th>".
            "<th>".$row['name']."</th>".
            "<th><img class='img-responsive' style='border-radius : 50%;' height='100' width='100' src='".$row['image']."'></th>".
            "<th>".$row['price']."</th>".
            "<th>"."
            <form action = 'all.php' method='POST' class='cart-items'>
                <button type='submit' class='btn btn-warning my-3' name='add'>Add To Cart <i class='fas fa-shopping-cart'></i></button>
                <input type='hidden' name='product_id' id='product_id' value='".$row['id']."' />
            "."</form></th>"."</tr>";
     }; 
    ?>

    </tbody>
</table>

</div>


 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


<script>
    

    $(document).ready( function () {
    $('#itemTable').DataTable();
} );
</script>
  


</body>
</html>