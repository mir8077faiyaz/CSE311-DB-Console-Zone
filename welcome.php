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
            background-color: rgb(6,0,0);
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

    <! -- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" style="font-family:Sofia">Welcome to Console Zone</h1>
            <hr>
            <p class="lead">Many consoles under one roof!</p>
        </div>
    </div>
    <section class="brands">

        <div class="container">
            <div class="row py-5">
                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="xbox.png" alt="Microsoft XBox">
                        <div class="card-body text-center">
                            <p class="card-text">Browse MicroSoft Xbox Consoles</p>
                            <a href="xboxlg.php" class="btn btn-success stretched-link">Browse</a>
                        </div>
                      </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="sony.png" alt="Sony">
                        <div class="card-body text-center">
                            <p class="card-text">Browse Sony PlayStation Consoles</p>
                            <a href="sonylg.php" class="btn btn-primary stretched-link">Browse</a>
                        </div>
                      </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="nintendo.jpg" alt="Nintendo">
                        <div class="card-body text-center">
                            <p class="card-text">Browse Nintendo Consoles</p>
                            <a href="nintendolg.php" class="btn btn-danger stretched-link">Browse</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>


    </section>  
</body>
</html>