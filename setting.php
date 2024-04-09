<?php
session_start();
include "connect_db.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $sqlset = "SELECT * FROM bookuser WHERE username='$username' AND password='$password'";
    $resultset = mysqli_query($conn,$sqlset);
    $rowset=mysqli_fetch_array($resultset);
    
        $sql = "SELECT * FROM bookuser WHERE username='$username'";
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
</head>
<body>
<br><br><br><br>    
<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone book store-Setting</p>
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
                <li><a href="exmarket.php">Exchange</a></li>
			    <li><a href="setting.php">Settings</a></li>
			    <li><a href="logout.php">Logout</a></li>
			    <li><?php echo "<image src=./image/$head width='50px' height='50px'>";?></li>	
                <li>
                <form class="navbar-form navbar-left" role="search" method="POST" action="search.php">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search something...">
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

    
    <br><br><br><br><br><br>
    <form style="left: 350px; top:250px; position:absolute;" class="form-horizontal" role="form" action="setting_action.php" method="POST">
    <div class="form-group">
        <label class="col-sm-2 control-label">Your old username</label>
            <div class="col-sm-10">
                <p class="form-control-static" name="usernamere"><?php echo $username; ?></p>
            </div>
        <label for="inputPassword" class="col-sm-2 control-label">Please input a new username</label>
            <div class="col-sm-6 input-group input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input name="usernamere" type="text" class="form-control" id="inputPassword" placeholder="input a new username" aria-describedby="basic-addon3">
            </div><br>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Your old password</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo $password; ?></p>
            </div>
        <label for="inputPassword" class="col-sm-2 control-label">Please input a new password</label>
            <div class="col-sm-6">
                <input  name="password" type="password" class="form-control" id="inputPassword" placeholder="input a new password">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Your old Email</label>
            <div class="col-sm-10">
                <p class="form-control-static" ><?php echo $rowset[3]; ?></p>
            </div>
        <label for="inputPassword" class="col-sm-2 control-label">Please input a new Email</label>
            <div class="col-sm-6">
                <input name="Email" type="text" class="form-control" id="inputPassword" placeholder="input a new Email">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Your old Address</label>
            <div class="col-sm-10">
                <p class="form-control-static" ><?php echo $rowset[4]; ?></p>
            </div>
        <label for="inputPassword" class="col-sm-2 control-label">Please input a new Address</label>
            <div class="col-sm-6">
                <input name="Address" type="text" class="form-control" id="inputPassword" placeholder="input a new Address">
            </div><br><br><br><br>    
    </div>

    <p style=" left: 500px; top:500px; position:absolute;">
    <button style="height: 50px; width: 100px" type="submit">Submit</button><br>
    </form>


    

</body>
<br>
<br><br><br><br>
</html>
<?php
}else{
?>
<?php header("location:throw_not_login.php"); ?>
<?php } ?>