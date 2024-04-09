
<?php 
session_start();
include "connect_db.php";
include "connect_bookdb.php";
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameu = $_SESSION["username"];
    $passwordu = $_SESSION["password"];

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
<br><br><br><br>
<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone Exchange market-upload</p>

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

<br><br><br><br>
<form style="left: 550px; top:250px; position:absolute;" class="form-horizontal" role="form" action="exupload_action.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book title</label>
            <div class="col-sm-6">
                <input name="Title" type="text" class="form-control" id="inputPassword" placeholder="input the book title" aria-describedby="basic-addon3">
            </div><br><br><br>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book author</label>
            <div class="col-sm-6">
                <input name="Author" type="text" class="form-control" id="inputPassword" placeholder="input the book auther">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">

        <label for="inputPassword" class="col-sm-6 control-label">Please input the book ISBN</label>
            <div class="col-sm-6">
                <input name="ISBN" type="number" class="form-control" id="inputPassword" placeholder="input the book ISBN">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book publisher</label>
            <div class="col-sm-6">
                <input name="Publisher" type="text" class="form-control" id="inputPassword" placeholder="input the book publisher">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the category</label>
            <div class="col-sm-6">
                <input name="Category" type="text" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book price</label>
            <div class="col-sm-6">
                <input name="Price" type="number" step="0.01" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-6 control-label">Please input the book cover</label>
            <div class="col-sm-6">
                <input name="bookcover" type="file" class="form-control" id="inputPassword" placeholder="input the book price">
            </div><br><br><br><br>    
    </div>

            <br><br><br><br>    
    </div>

    
    <p style=" left: 275px; top:650px; position:absolute;">
    <button style="height: 50px; width: 100px" type="submit" onclick="blankerror()">Submit</button><br>
    </form>
</body>
<?php }else{
    header("location:throw_not_login.php");
} ?>