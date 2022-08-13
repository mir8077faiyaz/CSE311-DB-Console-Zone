<?php

require_once "connect.php";
session_start();
$id="";
if(isset($_GET['deleteuser'])){
    $user=$_GET['deleteuser'];
}
else{
    header("Location: adminu.php");
}
$sql= "delete from `orders` where uname='$user'";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: adminu.php");;}
?>