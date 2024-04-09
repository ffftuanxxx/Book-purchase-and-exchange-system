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

        $sqldei = "SELECT * FROM bookwaiting WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
        $resultdei = mysqli_query($conn2,$sqldei);
        $rowdei = mysqli_fetch_array($resultdei);
        $amount2 = $rowdei['amount'];

        $sqlquerinv= "SELECT * FROM books WHERE Title='$booktitle'";
        $resultquerinv = mysqli_query($conn2,$sqlquerinv);
        $rowquerinv = mysqli_fetch_array($resultquerinv);
        $inventory = $rowquerinv['inventory'];
        
        $inventoryup = $inventory - $amount2;

        $sql3 = "SELECT * FROM bookshelf WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
        $resultq3 = mysqli_query($conn2,$sql3);
        $row3=mysqli_fetch_array($resultq3);

        $pendamount = $row3['amount'];

        if($row3 == NULL){
        $sqldei = "INSERT INTO bookshelf (username,password,email,address,booktitle,amount) VALUES ('$rowdei[1]','$rowdei[2]','$rowdei[3]','$rowdei[4]','$rowdei[5]','$rowdei[6]')";
        mysqli_query($conn2,$sqldei);}
        else{
            $pendamount = $amount2 + $pendamount;
            $sqlupdate2 = "UPDATE bookshelf SET amount = '$pendamount' WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
            mysqli_query($conn2,$sqlupdate2);
        }
        $sqldei = "DELETE FROM bookwaiting WHERE username='$user' AND password='$pass' AND booktitle='$booktitle'";
        mysqli_query($conn2,$sqldei);
        $sqldelinv = "UPDATE books SET inventory = '$inventoryup' WHERE Title='$booktitle'";
        mysqli_query($conn2,$sqldelinv);
        header("location:ad_wantedorder.php");
?>
<?php }else{
        header("location:ad_login.php");
}

?>