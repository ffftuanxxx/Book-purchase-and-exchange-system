<?php
session_start();
include "connect_bookdb.php";
$keywords=$_POST['keywords'];
$sqlse="SELECT * from books where Title like '%$keywords%' or Category like '%$keywords%' or ISBN like '%$keywords%' or Publisher like '%$keywords%' or Author like '%$keywords%'";
$resultse=mysqli_query($conn2,$sqlse);
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    include "connect_db.php";
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
                <li><a href="exmarket.php">Exchange</a></li>
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
                <input type="text" class="form-control" name="keywords" placeholder="Search something...">
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

<table width=100% class="text-center" align="center">
<?php
    $flag = 3;
    while ($rowse=mysqli_fetch_array($resultse)){
        if($flag % 3 == 0){ 
            echo "<tr>";
        }?>
    <div>
    <td class="td"><a href="homepage_detail.php?detitle=<?=$rowse['Title']?>"><img src="book_cover/<?php echo$rowse['imageb']; ?>" height="300px" width="200px"></a><br>
    <id="title">Title:<?php $title = $rowse[1]; echo "$rowse[1]";?><br>
    Price:<?php echo "$rowse[6]"; ?><br>
    <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
    <a href="homepage_action.php?btitle=<?=$title?>">Add</a>
    <?php }else{ ?>
              <a href="throw_not_login.php">Add</a>
          <?php } ?>
    </td>    
    </div>
    <!--show the book list-->

<?php
$flag++;}
?>
</table>
</div>


