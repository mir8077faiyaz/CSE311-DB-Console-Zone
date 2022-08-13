<?php

require_once "connect.php";
session_start();
$order=$logout="";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $order=$_POST['order'];
  $logout=$_POST['logout'];
  if(isset($_POST['logout'])){
        header("location: logout.php");
    }
  else if($_POST['order']){
        header("location: orders.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="bootstrap.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Console Zone</title>
    <style>
        body{
            background-image:linear-gradient(to bottom right, #D99EC9, #F6F0C4);
            background-size:cover;
            height: 100vh; 
        }
        .navbar-brand{
            font-family: "Sofia", sans-serif;
        }
        .card-img-top {
            width: 100%;
            
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="welcome.php">Console Zone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline my-2 my-lg-0 text-white mx-2" method="post">
            <img src="weluser.png" alt="">
            <?php
                echo($_SESSION['username']);
            ?>
            <div class="btn-group mx-2" role="group" aria-label="Basic example">
              <input type="submit" name="order" class="btn btn-secondary" value="My Orders" />
              <input type="submit" name="logout" class="btn btn-secondary" value="Logout" />
            </div>
          </form>
        </div>
    </nav>
    <section class="brands">

<div class="container">
    <div class="row py-5">
    <?php
      $sql="Select * from products where brand='Nintendo'";
      $result=mysqli_query($conn,$sql); 
      if($result){
        while($row = mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $brand=$row['brand'];
          $name=$row['name'];
          $model=$row['model'];
          $picture=$row['picture'];
          $description=$row['description'];
          $price=$row['price'];
          echo' <section class="brands">

          <div class="container">
            <div class="col-md-4">
          <div class="card" style="width: 30rem;">
              <img class="card-img-top" src="'.$picture.'.png" alt="Product Pic">
              <div class="card-body text-center">
                  <p class="card-text"><strong>'.$name.'</strong></p>
                  <hr>
                  <p class="card-text">'.$model.'</p>
                  <hr>
                  <p class="card-text">'.$description.'</p>
                  <hr>
                  <p class="card-text">'.$price.'</p>
                          <hr>
                  <a href="confirmpurchase.php?purchaseid='.$id.'"  class="text-light btn btn-dark btn-lg">BUY</a>
              </div>
            </div>
      </div> 
      </div>
              </section>';
        }
      }
    ?>
</div>


</section>   
</body>
</html>