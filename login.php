<?php

require_once "connect.php";
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
else{
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        //check for admin login
        $admin=0;
        if($username=="admin" && $password=="admin"){
            $admin=1;
        }
        if($admin==1){
            session_start();
            $_SESSION["username"] = $username;
            header("location: admindashboard.php");
            exit;
        }
    
        $sql="Select * from users where uname='$username' AND password='$password'";

        
        if($conn->query($sql)==TRUE){
            $count=mysqli_num_rows($conn->query($sql));
            //return number of rows matched only if my uname and pass match
            if($count>0){
                session_start();
                $_SESSION["username"] = $username;
                header("location: welcome.php");
            }else{
                echo '<script>alert("Incorrect username or password!")</script>';
            }

        }else{
            echo "ERROR: $sql <br> $conn->error";
        }
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
        background-image:url('logimg.jpg');
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
        background-color: blanchedalmond;
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
            <form method="post">
                 <div class="form-group">
                    <label><strong>User Name</strong></label>
                    <input type="text" class="form-control" name=username placeholder="User Name">
                 </div>
                 <div class="form-group">
                    <label><strong>Password</strong></label>
                    <input type="password" class="form-control" name=password placeholder="Password">
                 </div>
                 <button type="submit" class="btn btn-black">Login</button>
              </form>
              <hr>
                <form action="register.php">
                    <span><strong>Don't have an account?</strong>
                        <button class="btn btn-light">Register Here</button>
                    </span>
            </form>
            </span>
           </div>
        </div>
    </div>
    
</body>
</html>