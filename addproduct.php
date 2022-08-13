<?php

require_once "connect.php";
session_start();
$order=$logout="";
$brand=$name=$model=$picture=$description=$price="";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $logout=$_POST['logout'];
  if(isset($_POST['logout'])){
        header("location: logout.php");
    }
    else if(isset($_POST['add'])){
    $brand=$_POST['brand'];
    $name=$_POST['name'];
    $model=$_POST['model'];
    $picture=$_POST['picture'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $sql="INSERT INTO `products`(`brand`, `name`, `model`, `picture`, `description`,`price`) VALUES ('$brand','$name','$model','$picture','$description','$price')";
    }
  
  if($conn->query($sql)!=TRUE){
      echo '<script>alert("Fill all fields properly!")</script>';
  }else{
      header("Location: adminpd.php");
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
            background-image:linear-gradient(to bottom right, #F6F0EA, #F1DFD1);
            background-size:cover;
            height: 100vh;
        }
        .navbar-brand{
            font-family: "Sofia", sans-serif;
        }
        .jumbotron{
            position: relative;
            height: 935px;
            background-image: url('jumb1.jpg');
            background-size:contain;
            background-repeat: no-repeat;
            background-color:rgb(6, 0, 0);
        }
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admindashboard.php">Console Zone</a>
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
              <input type="submit" name="logout" class="btn btn-secondary" value="Logout" />
            </div>
          </form>
        </div>
    </nav>
    <form class="container" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Product Brand</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="brand" placeholder="Enter Brand">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Model</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="model" placeholder="Enter Model">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Picture</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="picture" placeholder="Enter Picture: Picture name should be name of picture without extension and must be in png format">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Product Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1"name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Price</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" placeholder="Enter Price:">
        </div>
        <button type="submit" name="add" class="btn btn-dark">ADD</button>
    </form>
</body>
</html>