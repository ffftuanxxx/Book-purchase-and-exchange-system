<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameu = $_SESSION["username"];
    $passwordu = $_SESSION["password"];
    $isbn = $_GET['deisbn'];
    $sqldetail ="SELECT * FROM exbookshelf WHERE ISBN='$isbn'";
    $resultdetail = mysqli_query($conn2,$sqldetail);
    $rowdetail = mysqli_fetch_array($resultdetail);

    $sql = "SELECT * FROM bookuser WHERE username='$usernameu'";
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
<div class="container">
 <div class="row">
  <div class="col-sm-4">
          <div class="fakeimg">
          <img src="exchange_cover/<?php echo$rowdetail['imageex']; ?>" height="500px" width="350px">
          
          </div>
  </div>
  <div class="col-sm-8" >
          <h2>Title: <?php echo "$rowdetail[3]";?></h2>
          <h2>Price: <?php echo "$rowdetail[8]"; ?></h2>
          <h2>Auther: <?php echo "$rowdetail[4]"; ?></h2>
          <h2>ISBN: <?php echo "$rowdetail[5]"; ?></h2>
          <h2>Publisher: <?php echo "$rowdetail[6]"; ?></h2>
          <h2>Category: <?php echo "$rowdetail[7]"; ?></h2>
 </div>         
 </div>
</div><br><br><br><br><br><br><br><br><br><br>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p><a href="homepage.php"> Go back to the homepage </a></p>
</div>
</body>
</html>

<?php }else{
    header("location:throw_not_login.php");
} ?>