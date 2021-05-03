<?php

session_start();

require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
      
    if(empty(trim($_POST["username"]))){
          $username_err = "Username can't be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST['username']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                  $username_err = "This username is already taken";
                }
                else {
                    $username = trim($_POST["username"]);
                }
            }
            else {
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);



if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
} 
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}


if(trim($_POST['password']) != trim($_POST['confirm_password'])){
    $password_err = "Passwords should match!";
}


if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_stmt_execute($stmt)) 
        {
            header("location: login.php");
        }
        else {
            echo "Something went wrong... cannot redirect";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);

}

?>







<!-- 
<!doctype html>
<html lang="en">
  <head>
=
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>PHP</title>
  </head>
  <body>


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

   

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">Log Out</a>
        </li>

      
      </ul>

    </div>
  </div>
</nav> -->




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














<div class="container my-8" style="align-content: center;">

 <div class="row">

   <div class="col-md-3" >
     
    
   </div> 
   <div class="col-md-6"  style="align-content: center; text-align: center;">
     <h3>Please Register Here!</h3>
<hr>


<form  action="" method="POST" class="">
<div class="form-group " style="align-content: center; text-align: center;">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username" required>
  </div>
<br>
  <!-- <div class="col-md-6">
    <label for="Surname" class="form-label">Surname</label>
    <input type="text" name="Surname" class="form-control" id="Surname">
  </div>

  <div class="col-md-6">
    <label for="Email" class="form-label">Email</label>
    <input type="email" name="Email"class="form-control" id="Email">
  </div>
  -->
  
  <div class="form-group" style="align-content: center; text-align: center;">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>
<br>
  <div class="form-group" style="align-content: center; text-align: center;">
    <label for="confirm_password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
  </div>
  
<!--  
  <div class="col-md-6">
    <label for="Country" class="form-label">Country</label>
    <select id="Country" class="form-select" name="Country">
      <option selected value="India">India</option>
      <option value="USA">USA</option>
    </select>
  </div> -->
  <hr>
  <div class="form-group" style="align-content: center; text-align: center;">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
  </div>
</form>



</div>


   <div class="col-md-3" ></div>    
 </div> 



</div>





  </body>
</html>