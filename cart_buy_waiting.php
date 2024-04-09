<?php
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $email = $_SESSION["email"];
    $address = $_SESSION["address"];
    $favor = $_SESSION["favor"];
    $head = $_SESSION["head"];
    $title = $_GET['btitle'];
    $sqlcheck = "SELECT * FROM books WHERE Title='$title'";
    $resultcheck = mysqli_query($conn2, $sqlcheck);
    $rowcheck = mysqli_fetch_array($resultcheck);

    $sqlq2 = "SELECT * FROM bookuser WHERE username='$username' AND password='$password' AND testing='$title'";
    $resultq2 = mysqli_query($conn, $sqlq2);
    $rowq2 = mysqli_fetch_array($resultq2);
    $amount2 = $rowq2['amount'];

    $sql3 = "SELECT * FROM bookwaiting WHERE username='$username' AND password='$password' AND booktitle='$title'";
    $resultq3 = mysqli_query($conn2, $sql3);
    $row3 = mysqli_fetch_array($resultq3);
    $pendamount = $row3['amount'];

    $check = $rowcheck['inventory'] - $amount2 - $pendamount;
    echo "-----------------====   " . $check;
    if ($check >= 0) {
        if ($row3 == NULL) {
            $sqlqin = "INSERT INTO bookwaiting (username,password,email,address,booktitle,amount) VALUES ('$username','$password','$email','$address','$title','$amount2')";
            mysqli_query($conn2, $sqlqin);
        } else {
            $pendamount = $amount2 + $pendamount;
            $sqlupdate2 = "UPDATE bookwaiting SET amount = '$pendamount' WHERE username='$username' AND password='$password' AND booktitle='$title'";
            mysqli_query($conn2, $sqlupdate2);
        }
        header("location:cart.php");
        $sqldelete = "DELETE FROM bookuser WHERE username='$username' AND password='$password' AND testing='$title'";
        mysqli_query($conn, $sqldelete);
    } else {
        header("location:throw_error_emptyinventory.php");
        echo "xxxxxxxxxxxxx";
    }
?>
<?php

}
?>