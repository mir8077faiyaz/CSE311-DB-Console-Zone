<?php
require_once "connect.php";

$username = $password = $email=$fullname="";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];

    $sql="Insert into `users`values(
        '$username','$fname','$email','$password')";
    
    if($conn->query($sql)!=TRUE){
        echo '<script>alert("Username Must Be Unique!")</script>';
    }else{
        header("Location: login.php");
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
        body {
    font-family: "Lato", sans-serif;
    }
    .main-head{
        height: 150px;
        background: rgb(98, 58, 88);
    
    }
    .sidenav {
        height: 100%;
        background-image:url('regimg.png');
        background-size: contain;
        background-repeat: no-repeat;
        overflow-x: hidden;
        padding-top: 20px;
    }
    .main {
        padding: 0px 10px;
    }
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }
    @media screen and (max-width: 450px) {
        .login-form{
            margin-top: 10%;
        }
        .register-form{
            margin-top: 10%;
        }
    }
    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%; 
        }
        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }
        .login-form{
            margin-top: 80%;
        }
        .register-form{
            margin-top: 20%;
        }
    }
    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }
    .login-main-text h2{
        font-weight: 300;
    }
    .btn-black{
        background-color: #000 !important;
        color: #fff;
    }
    body{
        background-color: rgb(122, 163, 159);
    }
    </style>
</head>
<body>
    <div class="sidenav">
        <div class="login-main-text">
           <h1 style="font-family:Sofia, sans-serif">Console Zone<br></h1>
           <form action="home.php">
                <button class="btn btn-dark shadow-lg">Return Home</button>
            </form>
        </div>
     </div>
     <div class="main">
        <div class="col-md-6 col-sm-12">
           <div class="login-form">
              <form  method="post">
                 <div class="form-group">
                    <label><strong>User Name</strong></label>
                    <input type="text" class="form-control" name="username" placeholder="User Name">
                 </div>
                 <div class="form-group">
                    <label><strong>Full Name</strong></label>
                    <input type="text" class="form-control" name="fname" placeholder="Full Name">
                 </div>
                 <div class="form-group">
                    <label><strong>Email</strong></label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                 </div>
                 <div class="form-group">
                    <label><strong>Password</strong></label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                 </div>
                 <button type="submit" class="btn btn-black">Register</button>
              </form>
              <hr>
                <form action="login.php">
                    <span> 
                        <strong>Already have an account?</strong>
                        <button class="btn btn-light">Login Here</button>
                    </span> 
                </form>
            </span>
           </div>
        </div>
    </div>
    
</body>
</html>