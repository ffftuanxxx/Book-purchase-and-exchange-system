<?php
session_start();
include "connect_db.php";
include "connect_bookdb.php";
        $title = $_GET['detitle'];
        $sqldetail ="SELECT * FROM books WHERE Title='$title'";
        $resultdetail = mysqli_query($conn2,$sqldetail);
        $rowdetail = mysqli_fetch_array($resultdetail);
        if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
                include 'connect_db.php';
                $username = $_SESSION["username"];
                $sql = "SELECT * FROM bookuser WHERE username='$username'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $head = $row['head'];
            }        
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="homepage.css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.4.1/css/bootstrap.min.css"/>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">    
            <div>
            <ul class="nav nav-tabs">
			    <li><a href="homepage.php">Homepage</a></li>
                <li class="dropdown">
                    <a href="homepage.php" class="dropdown-toggle" data-toggle="dropdown">
                        Category
                        <b class="creat"></b>
                    </a>
                    <ul class="dropdown-menu"> 
                        <li><a href="life.php">Life</a></li>
                        <li><a href="fairy.php">Fairy</a></li>
                        <li><a href="history.php">History</a></li>
                        <li><a href="suspense.php">Suspense</a></li>
                        <li><a href="self_help.php">Self help</a></li>
                    </ul>
                </li>         
                <li><a href="cart.php">Cart</a></li>
			    <li><a href="bookshelf.php">Bookshelf</a></li>
			    <li><a href="setting.php">Settings</a></li>
                <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
			    <li><a href="logout.php">Logout</a></li>
                <?php }else{ ?>
                <li><a href="login.php">Login</a></li>
                <?php } ?>
                <?php
                if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
                ?>
			    <li><?php echo "<image src=./image/$head width='50px' height='50px'>";?></li>	
                <?php } ?>
                <li>
                <form class="navbar-form navbar-left" role="search" method="POST" action="search.php">
            <div class="form-group">
                <input type="text" name="keywords" class="form-control" placeholder="Search something...">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
                </li>    
		    </ul>
            </div>
            <div>

        </div>
        </div>    
        
    </nav>    

<br>
<br><br><br><br>

<div class="container">
 <div class="row">
  <div class="col-sm-4">
          <div class="fakeimg">
          <img src="book_cover/<?php echo$rowdetail['imageb']; ?>" height="500px" width="350px">
          
          </div>
  </div>
  <div class="col-sm-8" >
          <h2>Title: <?php echo "$rowdetail[1]";?></h2>
          <h2>Price: <?php echo "$rowdetail[6]"; ?></h2>
          <h2>Auther: <?php echo "$rowdetail[2]"; ?></h2>
          <h2>ISBN: <?php echo "$rowdetail[3]"; ?></h2>
          <h2>Publisher: <?php echo "$rowdetail[4]"; ?></h2>
          <h2>Category: <?php echo "$rowdetail[5]"; ?></h2>
          <h2>Inventory: <?php echo "$rowdetail[7]"; ?></h2>
          <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
          <p style="font-size:75px; font-family: Impact,  Haettenschweiler, 'Arial Narrow Bold', sans-serif;"><a href="homepage_action.php?btitle=<?=$title?>">Add</a></p>
          <?php }else{ ?>
              <p style="font-size:75px; font-family: Impact,  Haettenschweiler, 'Arial Narrow Bold', sans-serif;"><a href="throw_not_login.php">Add</a></p>
          <?php } ?>
 </div>         
 </div>
</div><br><br><br><br><br><br><br><br><br><br>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p><a href="homepage.php"> Go back to the homepage </a></p>
</div>
</body>
</html>

<?php  ?>