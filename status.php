<?php

require_once "connect.php";
session_start();
$id="";
if(isset($_GET['statusid'])){
    $id=$_GET['statusid'];
    $sql= "UPDATE orders SET status= 'delivered' WHERE orderid=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: adminod.php");}
}
else if($_GET['cancelid']){
    $id=$_GET['cancelid'];
    $sql= "UPDATE orders SET status= 'cancelled' WHERE orderid=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: adminod.php");}
}
?>