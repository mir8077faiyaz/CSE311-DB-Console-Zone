<?php

require_once "connect.php";
session_start();
$id="";
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
}
else{
    header("Location: adminpd.php");
}
$sql= "delete from `products` where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: adminpd.php");}
?>