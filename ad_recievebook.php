<?php
session_start();
include "connect_bookdb.php";
include "connect_db.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
        $usernamead = $_SESSION["adname"];
        $passwordad = $_SESSION["adpassword"];
        $user = $_GET['user'];
        $pass = $_GET['pass'];
        $booktitle = $_GET['bookt'];

        $sqldei = "SELECT * FROM bookselling WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
        $resultdei = mysqli_query($conn2,$sqldei);
        $rowdei = mysqli_fetch_array($resultdei);
        $amount2 = $rowdei['amount'];

        $sqlquerinv= "SELECT * FROM books WHERE Title='$booktitle'";
        $resultquerinv = mysqli_query($conn2,$sqlquerinv);
        $rowquerinv = mysqli_fetch_array($resultquerinv);
        $inventory = $rowquerinv['inventory'];
        
        $inventoryup = $inventory + $amount2;

        $sqldelinv = "UPDATE books SET inventory = '$inventoryup' WHERE Title='$booktitle'";
        mysqli_query($conn2,$sqldelinv);

        $sqldelete = "DELETE FROM bookshelf WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
        mysqli_query($conn2,$sqldelete);

        $sqldei = "DELETE FROM bookselling WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
        mysqli_query($conn2,$sqldei);
        header("location:ad_sellingorder.php");

?>
<?php }else{
            header("location:ad_login.php");
} ?>