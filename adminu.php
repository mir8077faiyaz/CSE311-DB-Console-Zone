<?php

require_once "connect.php";
session_start();
$order=$logout="";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $logout=$_POST['logout'];
  if(isset($_POST['logout'])){
        header("location: logout.php");
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

    <div class="container">
            <table class="table my-4">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">User</th>
                    <th scope="col">User Full Name</th>
                    <th scope="col">Remove User</th>
                    
                  </tr>
                  <?php
                  $user=$_SESSION['username'];
                  //echo gettype($user);
                  $sql="SELECT o.orderid,o.uname,o.name
                  FROM  products as p, orders as o 
                  WHERE p.id=o.productid";

                  $result=mysqli_query($conn,$sql); 
                  if($result){
                    while($row = mysqli_fetch_assoc($result)){
                      $oid=$row['orderid'];
                      $fname=$row['name'];
                      $customer=$row['uname'];  
                      echo '<tr>
                      <td>'.$oid.'</td>
                      <td>'.$customer.'</td> 
                      <td>'.$fname.'</td>
                    <td>
                      <button class="btn btn-danger btn">
                      <a href="delu.php?deleteuser='.$oid.'" class="text-light">Delete This Order </a>
                    </button>
                  </td>
                      </tr>';
                    }
                  }
                  ?>
                </thead>
                <tbody>
     
                </tbody>
              </table>
                  
    </div>


</body>
</html>