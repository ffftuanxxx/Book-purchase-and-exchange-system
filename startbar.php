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
                <form class="navbar-form navbar-left" role="search"  method="POST" action="search.php">
            <div class="form-group">
                <input type="text" class="form-control" name="keywords" placeholder="Search">
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
<br><br><br><br>