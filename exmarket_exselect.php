<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameus = $_SESSION["username"];
    $passwordus = $_SESSION["password"];
    $mybookisbn = $_GET['myisbn'];
    $puruser = $_GET['puruser'];
    $purpass = $_GET['purpass'];
    $sqldis = "SELECT * FROM exbooks WHERE username='$puruser' AND password='$purpass'";
    $resultdis = mysqli_query($conn2,$sqldis);

    $sql = "SELECT * FROM bookuser WHERE username='$usernameus'";
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
<table align="center" class="test" id="testing" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing: 0px 10px;border:solid #378888;font-size: 20px;">

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
    <td>Exchange</td>
</tr>
<?php
while ($rowbepur = mysqli_fetch_array($resultdis)) {
?>
    <tr>
        <td><img src="exchange_cover/<?php echo $rowbepur['imageex']; ?>" height="100px" width="65px"></td>
        <td <?php $isbnduifang=$rowbepur[5]; ?>><?php echo "$rowbepur[8]"; ?></td>
        <td><?php echo "$rowbepur[3]"; ?></td>
        <td><?php echo "$rowbepur[4]"; ?></td>
        <td id="<?php echo "$rowbepur[5]"; ?>"><?php echo "$rowbepur[5]"; ?></td>
        <td><?php echo "$rowbepur[6]"; ?></td>
        <td><?php echo "$rowbepur[7]"; ?></td>
        <td><a href="exmarket_realchange.php?purisbn=<?=$isbnduifang?>&myisbn=<?=$mybookisbn?>&puruser=<?=$puruser?>&purpass=<?=$purpass?>">Exchange</a></td>

    </tr>
<?php } ?>
<?php }else{
    header("location:throw_not_login.php");
} ?>