<?php
session_start();
include 'connect_admindb.php';
 $username = $_POST["namead"];
 $pwd = $_POST["passwad"];
 $pwd2 = $_POST["passwad2"];
 $key = $_POST["key"];
 if($username=='' || $pwd=='' || $pwd2=='' || $key==''){
    header("location:throw_error_adempty.php");
 }
 else if($pwd != $pwd2){
     $url = "throw_error_addiffertpass.php";
     header("location:".$url);
  }
  else if($key !='Kbone'){
      header("location:throw_error_key.php");
  }
else{
    $sqladadd = "INSERT INTO admin (adminname,password) VALUES ('$username','$pwd')";
    mysqli_query($connad, $sqladadd);

    $urlmain = "ad_login.php";
    header("location:".$urlmain);
}