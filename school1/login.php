<?php 
	session_start();
	$cookie_name="cook";
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	if (isset($_POST['login_btn'])) {
		$username = $_POST['username'];
		$password =$_POST['password'];
		if(isset($_POST['username'])){

		}
		//$password = md5($password); // remember we hashed password before storing last time
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1) {
			$cookie_value=$username;
			setcookie($cookie_name, $cookie_value,time()+(10),"/");
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: login_done.php"); //redirect to home page
		}
		else{
			$_SESSION['message'] = "Username/password combination incorrect";
		}
	}
?>
<DOCTYPE html>
	<html>
	<head>
		<title>navigation bar</title>
		<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(username,"Username must be filled out!")==false)
  {  username.focus(); return false;}
  if (validate_required(password,"Password must be filled out!")==false)
  {  password.focus(); return false;}
  }
}
</script>
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
		<li><a href="register.php"><button>REGISTER</button></a></li>
		</ul>
		
		<center>
		<div class="header"> 
		<h1>login as student</h1>
    	</div>
        </center>
     <?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
<form method="post" onSubmit="return validate_form(this)" action="login.php">
	<table>
		<tr>
			<td><b>Username:</b></td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>

		<tr>
			<td><b>Password:</b></td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" name="login_btn" value="Login"></td>
		</tr>
	</table>
</form>

	</div>
</body>

	</html>