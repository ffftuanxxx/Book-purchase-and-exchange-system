<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameu = $_SESSION["username"];
    $passwordu = $_SESSION["password"];
    $sqldis = "SELECT * FROM exbooks";
    $resultdis = mysqli_query($conn2,$sqldis);

        $sql = "SELECT * FROM bookuser WHERE username='$usernameu'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $head = $row['head'];
?>

<head>
<link rel="icon" href="images/logo.ico" type="images/x-ico" />
<link rel="stylesheet" type="text/css" href="homepage.css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.4.1/css/bootstrap.min.css"/>
<br><br><br><br>
<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone Exchange market</p>
<h3 align="center" style="color:red">Be care of!!!   Since you are in the exchange system, the menu bar has changed!</h3>
<h3 align="center" style="color:red">Please click homepage if you want to go back to our platform!</h3>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">    
            <div>
            <ul class="nav nav-tabs">
			    <li><a href="homepage.php">Homepage</a></li>
                <li><a href="exmarket.php">Exchange</a></li>
			    <li><a href="exupload.php">Upload</a></li>
			    <li><a href="exbookshelf.php">Smallshelf</a></li>
                <li><a href="exnotice.php">Notice</a></li>
			    <li><a href="logout.php">Logout</a></li>
			    <li><?php echo "<image src=./image/$head width='50px' height='50px'>";?></li>	
                </li>    
		    </ul>
            </div>
            <div>

        </div>
        </div>    
        
</nav> 

<br><br><br><br>

<table width=100% class="text-center" align="center">
<?php
    $flag = 3;
    while ($rowdis=mysqli_fetch_array($resultdis)){
        if($flag % 3 == 0){ 
            echo "<tr>";
        }?>
    <div>
    <td class="td"><a href="exchange_detail.php?deisbn=<?=$rowdis['ISBN']?>"><img src="exchange_cover/<?php echo $rowdis['imageex']; ?>" height="300px" width="200px"></a><br>
    <p style="">Title:<?php $isbn = $rowdis[5]; echo "$rowdis[3]";?></p>
    <p>Price:<?php echo "$rowdis[8]"; ?></p>
    <a href="exmarket_action.php?deisbn=<?=$isbn?>&uploader=<?=$rowdis[1]?>">Purchase</a>
    </td>    
    </div>
    <!--show the book list-->

<?php
$flag++;}
?>
</table>

<?php
}else{
    header("location:throw_not_login.php");
}
?>