
<?php

session_start();
$host = "dijkstra2.ug.bcc.bilkent.edu.tr";
$user = "muhammad.usman";
$password = "el0639xo3";
$db = "muhammad_usman";

$link = mysqli_connect($host,$user,$password,$db);

if (!$link) 
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if(isset($_POST['login_btn']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$_SESSION['customer'] = $password;
	$sql = "SELECT * FROM customer WHERE name = '$username' AND cid = '$password'";
	$res = mysqli_query($link,$sql);
	if(!$res)
	{
		die("SQL Error: " . mysqli_error($link));
	}
	else
	{
		$count = mysqli_num_rows($res);
		if($count == 1)
		{
			// echo "Success";
			echo "<script> location.href='welcome.php'; </script>";
			exit();
		}
		else
		{
			$message = "Wrong username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header"> 
	<h1>Please enter your information</h1>
</div>
<form method="post" action="login.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" id = "user" name="username" class="textInput"></td>
		</tr>

		<tr>
			<td>Password:</td>
			<td><input type="password" id = "pass" name="password" class="textInput"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="button" name="login_btn" onclick = "checkEmpty();" value="Login" </td>
		</tr>
	</table>
</form>
<script>
		function checkEmpty()
		{
				if (!document.getElementById("user").value || !document.getElementById("pass").value)
				{
					alert("One or more fields are empty!");
				}
			
		}
</script>
</body>
</html>