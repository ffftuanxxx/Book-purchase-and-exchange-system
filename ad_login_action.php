<?php
session_start();
include 'connect_admindb.php';
$adname = $_POST["adnamein"];
$passwd = $_POST["adpasswdin"];
$sqladl = "SELECT * FROM admin WHERE adminname='$adname' AND password='$passwd'";
$resultinlad = mysqli_query($connad,$sqladl);
$row = mysqli_fetch_assoc($resultinlad);
if($adname != '' && $passwd != '' && $row['password'] == $passwd){
$_SESSION["ID"] = $row["ID"];
$_SESSION["login"] = true;
$_SESSION["adname"] = $row["adminname"];
$_SESSION["adpassword"] = $row["password"];
header("location:ad_welcome.php");
}
else{
    header("location:throw_error_password.php");
}
?>