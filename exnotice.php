<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameus = $_SESSION["username"];
    $passwordus = $_SESSION["password"];
    $sqlbepur ="SELECT * FROM exwaiting WHERE username='$usernameus' AND password='$passwordus' ";
    $resultbepur = mysqli_query($conn2,$sqlbepur);

        $sql = "SELECT * FROM bookuser WHERE username='$usernameus'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $head = $row['head'];
    
?>

<html>
<head>
<link rel="icon" href="images/logo.ico" type="images/x-ico" />
<link rel="stylesheet" type="text/css" href="homepage.css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.4.1/css/bootstrap.min.css"/>
<br><br><br><br>
<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone Exchange market-notice</p>

<body>
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

<table align="center" class="test" id="testing" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing: 0px 10px;border:#CCC 1px solid;font-size: 20px;">

<head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<tr style="border:#CCC 1px solid;">
    <td>image</td>
    <td>Price</td>
    <td>Title</td>
    <td>Author</td>
    <td>ISBN</td>
    <td>Publisher</td>
    <td>Category</td>
    <td>Purchaser</td>
    <td>Exchange</td>
</tr>
<?php
while ($rowbepur = mysqli_fetch_array($resultbepur)) {
?>
    <tr>
        <td><img src="exchange_cover/<?php echo $rowbepur['imageex']; ?>" height="100px" width="65px"></td>
        <td <?php $isbn=$rowbepur[5]; ?>><?php echo "$rowbepur[8]"; ?></td>
        <td><?php echo "$rowbepur[3]"; ?></td>
        <td><?php echo "$rowbepur[4]"; ?></td>
        <td id="<?php echo "$rowbepur[5]"; ?>"><?php echo "$rowbepur[5]"; ?></td>
        <td><?php echo "$rowbepur[6]"; ?></td>
        <td><?php echo "$rowbepur[7]"; ?></td>
        <td><?php echo "$rowbepur[10]"; ?></td>
        <td><a href="exmarket_exselect.php?myisbn=<?=$isbn?>&puruser=<?=$rowbepur[10]?>&purpass=<?=$rowbepur[11]?>">Exchange with...</a></td>

    </tr>
<?php } ?>
</table>
<br><br><br><br><br><br><br><hr>
<h1>Purchase is waiting for the owner to check!</h1>
<?php
    $sqlqpend = "SELECT * FROM exwaiting WHERE purusername='$usernameus' AND purpassword='$passwordus'";
    $resultpend = mysqli_query($conn2, $sqlqpend);
    ?>
    <table align="center" class="test" id="testing" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing: 0px 10px;border:#CCC 1px solid;font-size: 20px;">
        <head>
            <link rel="stylesheet" type="text/css" href="css/home.css">
        </head>
        <tr style="border:#CCC 1px solid;">
            <td>image</td>
            <td>uploader</td>
            <td>Price</td>
            <td>Title</td>
            <td>Author</td>
            <td>ISBN</td>
            <td>Status</td>
        </tr>
        <?php
        while ($rowpend = mysqli_fetch_array($resultpend)) {

        ?>
                <tr>
                    <td><img src="exchange_cover/<?php echo $rowpend['imageex']; ?>" height="100px" width="65px"></td>
                    <td><?php echo "$rowpend[1]"; ?></td>
                    <td><?php echo "$rowpend[8]"; ?></td>
                    <td><?php echo "$rowpend[3]"; ?></td>
                    <td><?php echo "$rowpend[4]"; ?></td>
                    <td><?php echo "$rowpend[5]"; ?></td>
                    <td>pending</td>
                </tr>
        <?php 
        } ?>
    </table>
<?php 
}else{
    header("location:throw_not_login.php");
}
?>