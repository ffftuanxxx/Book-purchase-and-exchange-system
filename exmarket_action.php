<?php 
session_start();
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameu = $_SESSION["username"];
    $passwordu = $_SESSION["password"];
    $ISBN = $_GET['deisbn'];
    $uploader = $_GET['uploader'];
    $sqlque = "SELECT * FROM exbooks WHERE ISBN='$ISBN'";
    $resultque = mysqli_query($conn2,$sqlque);
    $rowque=mysqli_fetch_array($resultque);
    $usernames=$rowque[1];
    $passwords=$rowque[2];
    $Title=$rowque[3];
    $Author=$rowque[4];
    $ISBN=$rowque[5];
    $Publisher=$rowque[6];
    $Category=$rowque[7];
    $Price=$rowque[8];
    $imageex=$rowque[9];
    if($uploader != $usernameu){
    $sqlupdate2 = "INSERT INTO exwaiting (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex,purusername,purpassword) VALUES ('$usernames','$passwords','$Title','$Author',$ISBN,'$Publisher','$Category',$Price,'$imageex','$usernameu','$passwordu')";
    mysqli_query($conn2,$sqlupdate2);
    $sqlupdate3 = "INSERT INTO adcheckex (username,password,Title,Author,ISBN,Publisher,Category,Price,imageex,purusername,purpassword) VALUES ('$usernames','$passwords','$Title','$Author',$ISBN,'$Publisher','$Category',$Price,'$imageex','$usernameu','$passwordu')";
    mysqli_query($conn2,$sqlupdate3);
    header("location:exmarket.php");
    }else{
        header("location:throw_error_yourbook.php");
    }
?>
<?php
}else{
    header("location:throw_not_login.php");
}
?>