
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
    ?>
        
        <?php
        $title = $_GET["btitle"];
        $sqladd = "SELECT * FROM bookuser WHERE username='$username' AND password='$password' AND testing='$title'";
        $resultaddb = mysqli_query($conn,$sqladd);
        $fields = mysqli_num_fields($resultaddb);
        $rowaddb=mysqli_fetch_array($resultaddb);
        $amountx = $rowaddb['amount'];
        if($amountx > 0){
            $amountx = $amountx + 1;
            $sqlupdate = "UPDATE bookuser SET amount = '$amountx' WHERE username='$username' AND password='$password' AND testing='$title'";
        }else{
        // $userbook_array = explode("-",$rowaddb['testing']);//把database里的字符串调用出来转换成数组
        // array_push($userbook_array,$title);//把书名加进数组里
        // $userbook_updated = implode("-",$userbook_array);// 把数组重新变回字符串
        $sqlupdate = "INSERT INTO bookuser (username,password,email,address,favor,head,testing,amount) VALUES ('$username','$password','$email','$address','$favor','$head','$title',1)";
        }
        mysqli_query($conn,$sqlupdate);
        header("location:homepage.php");
        ?>
    }
<?php
        }
?>
