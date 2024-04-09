<?php
if(isset($_SESSION["adname"]) && isset($_SESSION["adpassword"]) && $_SESSION["adname"] && $_SESSION["adpassword"]){
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
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">    
            <div>
            <ul class="nav nav-tabs">
			    <li><a href="ad_homepage.php">Homepage</a></li>        
                <li><a id="nacolor" href="ad_addbook.php">Add book</a></li>
			    <li><a id="nacolor" href="ad_wantedorder.php">Wantedorder</a></li>
			    <li><a id="nacolor" href="ad_sellingorder.php">Sellingorder</a></li>
                <li><a id="nacolor" href="ad_exchanginglist.php">Exchanginglist</a></li>
                <li><a id="nacolor" href="ad_setting.php">Settings</a></li>
			    <li><a id="nacolor" href="ad_logout.php">Logout</a></li>
                <li>
                <form class="navbar-form navbar-left" role="search"  method="POST" action="ad_search.php">
            <div class="form-group">
                <input type="text" class="form-control" name="ad_keywords" placeholder="Search">
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
</body>
<br>
<br><br>
<?php
}else{
    header("location:ad_login.php");
}
?>