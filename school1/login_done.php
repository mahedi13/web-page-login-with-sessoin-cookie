<?php 
	session_start();
?>
<DOCTYPE html>
	<html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>

	<div id="Maindiv">
		
	</ul>
		<div id="navdiv">

			<br><br><br><br><br><br>
	
			<ul>
				<h2>Brinsley School Academy</h2>
				<li><a href="home.php">Home</a></li>
				<li><a href="home.php">contact</a></li>
				<li><a href="home.php">about</a></li>
				<li><a href="home.php">List</a></li>
				<li><a href="home.php">Result</a></li>
				<li><a href="home.php">Notice</a></li>
			</ul>

		</div>
		<ul id="id1">
		<li><a href="logout.php"><button>LOGOUT</button></a></li>
		<li><a href="register.php"><button>REGISTER</button></a></li>
		</ul>
		
	<div>
	

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
</div>

<?php
if (isset($_SESSION['message'])) {
	echo "<h1>Welcome</h1>";
}
?>

	<div class="header1"> 
<?php 
	if(isset($_COOKIE["cook"])&& isset($_SESSION['username'])){
	 echo "<h1>LOGIN SUCCESSFUL </h1>".$_SESSION['username']; 
	}
	else include("login.php");
?>		
</div>
</div>
</body>

	</html>