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
        $title = $_GET["xtitle"];
        $sqlq = "SELECT * FROM bookuser WHERE username='$username' AND password='$password' AND testing='$title'";
        $resultq = mysqli_query($conn,$sqlq);
        $fields = mysqli_num_fields($resultq);
        $rowq=mysqli_fetch_array($resultq);
        $amount0 = $rowq['amount'];
        if($amount0 == 1){
            $sqldelete = "DELETE FROM bookuser WHERE username='$username' AND password='$password' AND testing='$title'";
        }else{
            $amount0 = $amount0 - 1;
            $sqldelete = "UPDATE bookuser SET amount = '$amount0' WHERE username='$username' AND password='$password' AND testing='$title'";
        }
        $resultdelb = mysqli_query($conn,$sqldelete);
        header("location:cart.php");
    ?>
    <?php 

    ?>
    <?php
        }
    ?>