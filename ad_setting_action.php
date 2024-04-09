<?php
session_start();
include 'connect_admindb.php';
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
    $usernamead = $_SESSION["adname"];
    $passwordad = $_SESSION["adpassword"];
    $name = $_POST['usernamead'];
    $password = $_POST['passwordad'];
    $sqlreset = "UPDATE admin SET `password` = '$password',`adminname` = '$name' WHERE adminname='$usernamead' AND password='$passwordad' ";
mysqli_query($connad,$sqlreset);
header("location:ad_logout.php");
header("location:ad_login.php");
}else{
    header("location:ad_login.php");
}
?>