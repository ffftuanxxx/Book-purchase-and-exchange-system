<?php
session_start();
include "connect_db.php";
include "connect_bookdb.php";
$sqlhome = "SELECT * FROM books";
$resultinhome = mysqli_query($conn2,$sqlhome);
$fields = mysqli_num_fields($resultinhome);
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
<link rel="icon" href="images/logo.ico" type="images/x-ico" />
<link rel="stylesheet" type="text/css" href="homepage.css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.4.1/css/bootstrap.min.css"/>
    <style type="text/css">

            .carousel .item {
                height: 500px;
                background-color: #777;
            }

            .carousel-inner > .item > img {
                position: absolute;
                top: 0;
                left: 0;
                min-width: 100%;
                height: 500px;
            }

            .carousel-inner img {
                width : 100% ;
                height: 50%;
            }
		</style>
</head><!-- css and js -->

<br><br><br><br>

<p align="center" style="font-size: 50px; "><img src="images/Logo.jpg" style="width: 150px; height:150px;"></a>This is Kbone book store</p>
    
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
                    </ul><!--drop down menu-->
                </li>
                <li><a href="cart.php">Cart</a></li>
			    <li><a href="bookshelf.php">Bookshelf</a></li>
                <li><a href="exmarket.php">Exchange</a></li>
			    <li><a href="setting.php">Settings</a></li>
                <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
			    <li><a href="logout.php">Logout</a></li>
                <?php }else{ ?>
                <li><a href="login.php">Login</a></li>
                <?php } ?><!--check if it has login-->
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

<br>
<div class="focus">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
 
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="book_cover/1.jpg" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="book_cover/2.jpg" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="book_cover/3.jpg" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
 
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>
<br>
<br><br><br><br>

<table width=100% class="text-center" align="center">
<?php
    $flag = 3;
    while ($rowhome=mysqli_fetch_array($resultinhome)){
        if($flag % 3 == 0){ 
            echo "<tr>";
        }?>
    <div>
    <td class="td"><a href="homepage_detail.php?detitle=<?=$rowhome['Title']?>"><img src="book_cover/<?php echo$rowhome['imageb']; ?>" height="300px" width="200px"></a><br>
    <p style="">Title:<?php $title = $rowhome[1]; echo "$rowhome[1]";?></p>
    <p>Price:<?php echo "$rowhome[6]"; ?></p>
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

<br><br><br><br>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p style="font-size: 50px;"> Kbone book store </a></p><br>
    <footer>
        <p class="center"><a href="#">Back to top</a></p>
    </footer>
</div>



</body>
</html>
