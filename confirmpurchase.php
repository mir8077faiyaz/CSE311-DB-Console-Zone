<?php

require_once "connect.php";
session_start();
$order=$logout="";
$fname=$address=$contact=$confirm="";
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//   $order=$_POST['order'];
//   $logout=$_POST['logout'];
//   if(isset($_POST['logout'])){
//         header("location: logout.php");
//     }
//   else if($_POST['order']){
//         header("location: orders.php");
//   }
// }
if(isset($_SESSION['username'])){

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['logout'])){
              header("location: logout.php");
          }
        else if(isset($_POST['order'])){
              header("location: orders.php");
        }
        else if(isset($_POST['confirm'])){
              $fname=$_POST['fname'];
              $address=$_POST['address'];
              $contact=$_POST['phone'];
              $id=$_GET['purchaseid'];
              $uname=$_SESSION['username'];
              $status="shipped";
              if(empty($fname) or  empty($address) or empty($contact)){
                echo '<script>alert("Fill All fields correctly!")</script>';
              }else{
                $sql="INSERT INTO `orders`(`productid`, `uname`, `name`, `address`, `contact`, `status`) VALUES ('$id','$uname','$fname','$address','$contact','$status')";
                if($conn->query($sql)!=TRUE){
                  echo '<script>alert("Fill All fields correctly!")</script>';
              }else{
                  echo '<script>alert("Purchase Confirmed!")</script>';
                  header("Location: orders.php");
              }   
            }
          }
      }
}
else{
    echo '<script>alert("You Must Login First!")</script>';
    header("location: login.php");
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
            background-image:linear-gradient(to bottom right, #516b66, #00d4ff);
            background-size:cover;
            height: 100vh;  
        }
        .navbar-brand{
            font-family: "Sofia", sans-serif;
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
    <div class="container">
            <table class="table my-3" style="background-color:#e8d3b9">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Brand</th>
                    <th scope="col">Name</th>
                    <th scope="col">Model</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Description</th>
                  </tr>
                  <?php
                  $id=$_GET['purchaseid'];
                  $sql1="Select * from `products` where id=$id";
                  $result=mysqli_query($conn,$sql1); 
                  if($result){
                    while($row = mysqli_fetch_assoc($result)){
                      $brand=$row['brand'];
                      $name=$row['name'];
                      $model=$row['model'];
                      $picture=$row['picture'];
                      $description=$row['description'];
                      echo '<tr>
                      <td>'.$brand.'</td>
                      <td>'.$name.'</td>
                      <td>'.$model.'</td>
                      <td style="width=250px height=250px"><img src="'.$picture.'.png" alt="Product picture" width="100" height="50"></td>
                      <td>'.$description.'</td>    
                      </tr>';
                    }
                  }
                  ?>
                </thead>
                <tbody>
     
                </tbody>
              </table>
                  
    </div>
    <form class="container" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" placeholder="Please Enter Full name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Address</label>
          <textarea class="form-control" id="exampleFormControlTextarea1"name="address" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Contact</label>
          <input type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" placeholder="Enter phone number">
        </div>
        <button type="submit" name="confirm"class="btn btn-dark">Confirm Purchase</button>
    </form>

</body>
</html>