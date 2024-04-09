<?php
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		 ul{
		 	margin: 0px auto;
			width: 800px;
			height: 50px;
			padding: 0px;
			border:1px solid #000;
      position: sticky;
		}
		li{
			list-style-type: none;
			float: left;
		}
		#nacolor{
			display: block;
			width: 100px;
			height: 50px;
			font-family: Microsoft Yahei;
			line-height: 50px;
			background-color: #2f4f4f;
			margin: 0px 0px;
			color: #fff;
			text-align: center;
			text-decoration: none;
			font-size: 15px;
		}
		#nacolor:hover{
			background-color: #2f6f4f;
		}
	</style>
</head>
<body>
 	<div>
		<ul class=daohang>
			<li><a id="nacolor" href="homepage.php">Homepage</a></li>
			<li><a id="nacolor" href="exchange.php">Exchange</a></li>
			<li><a id="nacolor" href="cart.php">Cart</a></li>
			<li><a id="nacolor" href="bookshelf.php">Bookshelf</a></li>
			<li><a id="nacolor" href="setting.php">Settings</a></li>
			<li><a id="nacolor" href="logout.php">Logout</a></li>
      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><a id="nacolor" href="">head</a></li>
		</ul>
	</div>
 
 
	</table>
</body>
</html>
<?php
}
else{

?>
<html>
<head>
	<style type="text/css">
		 ul{
		 	margin: 0px auto;
			width: 800px;
			height: 50px;
			padding: 0px;
			border:1px solid #000;
      position: sticky;
		}
		li{
			list-style-type: none;
			float: left;
		}
		#nacolor{
			display: block;
			width: 100px;
			height: 50px;
			font-family: Microsoft Yahei;
			line-height: 50px;
			background-color: #2f4f4f;
			margin: 0px 0px;
			color: #fff;
			text-align: center;
			text-decoration: none;
			font-size: 15px;
		}
		#nacolor:hover{
			background-color: #2f6f4f;
		}
	</style>
</head>
<body>
 	<div>
		<ul class=daohang>
			<li><a id="nacolor" href="homepage.php">Homepage</a></li>
			<li><a id="nacolor" href="exchange.php">Exchange</a></li>
			<li><a id="nacolor" href="cart.php">Cart</a></li>
			<li><a id="nacolor" href="setting.php">Settings</a></li>
			<li><a id="nacolor" href="login.php">Login</a></li>
      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><a id="nacolor" href="">头像</a></li>
		</ul>
	</div>
 
 
	</table>
</body>
</html>
<?php
}
?>