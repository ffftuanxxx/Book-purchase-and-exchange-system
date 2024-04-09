<?php
session_start();
include "connect_bookdb.php";
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
    $username = $_SESSION["adname"];
    $password = $_SESSION["adpassword"];
    $title = $_GET["dtitle"];
    $sqldelb = "SELECT * FROM books WHERE Title='$title'";
    $resultdelb = mysqli_query($conn2,$sqldelb);
    $rowdelb=mysqli_fetch_array($resultdelb);
    $amountdel = $rowdelb['inventory'];
    if($amountdel == 1){
        $sqldelete = "DELETE FROM books WHERE Title='$title'";
    }else if ($amountdel > 1){
        $amountdel = $amountdel - 1;
        $sqldelete = "UPDATE books SET inventory='$amountdel' WHERE Title='$title'";
    }
    mysqli_query($conn2,$sqldelete);
    header("location:ad_homepage.php");
?>
<?php
}else{
    header("location:ad_login.php");
}
?>