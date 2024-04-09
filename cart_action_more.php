<?php
session_start();
include "connect_db.php";
        if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
        $email = $_SESSION["email"];
        $address = $_SESSION["address"];
        $favor = $_SESSION["favor"];
        $head = $_SESSION["head"];
        $title = $_GET['mtitle'];
        $sqlq2 = "SELECT * FROM bookuser WHERE username='$username' AND password='$password' AND testing='$title'";
        $resultq2 = mysqli_query($conn,$sqlq2);
        $rowq2=mysqli_fetch_array($resultq2);
        $amount2 = $rowq2['amount'];
        $amount2++;
        $sqladd = "UPDATE bookuser SET amount = '$amount2' WHERE username='$username' AND password='$password' AND testing='$title'";
        mysqli_query($conn,$sqladd);
        header("location:cart.php");
}
?>