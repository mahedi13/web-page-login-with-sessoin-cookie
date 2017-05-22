<?php 
	session_start();
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	if (isset($_POST['register_btn'])&&isset($_POST['username'])) {
		//$username = mysql_real_escape_string($_POST['username']);
		//$email = mysql_real_escape_string($_POST['email']);
		//$password = mysql_real_escape_string($_POST['password']);
		//$password2 = mysql_real_escape_string($_POST['password2']);

		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		if ($password == $password2 && $password!="") {
			// create user
			//$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: reg_done.php"); //redirect to home page
		}else{ 
			$_SESSION['message'] = "The two passwords do not match";
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
  if (validate_required(username,"username must be filled out!")==false)
  {  username.focus(); return false;}
  if (validate_required(email,"email must be filled out!")==false)
  {  email.focus(); return false;}
  if (validate_required(password,"password must be filled out!")==false)
  {  password.focus(); return false;}
  if (validate_required(password2,"password2 must be filled out!")==false)
  {  password2.focus(); return false;}

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


	<center>
	<div class="header"> 
	<h1>Register as student</h1>
	</div>
	</center>
	<?php
	if (isset($_SESSION['message'])) {
		echo "<center><div id='error_msg'>".$_SESSION['message']."</div></center>";
		unset($_SESSION['message']);
	}
?>

	<form method="post" onSubmit="return validate_form(this)" action="register.php">
	<table>
		<tr>
			<td><b>Username:</b></td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Email:</b></td>
			<td><input type="email" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Password:</b></td>
			<td><input type="password"  name="password" class="textInput"></td>
		</tr>
		<tr>
			<td><b>Password again:</b></td>
			<td><input type="password" name="password2" class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
</form>



	</div>
</body>

	</html>