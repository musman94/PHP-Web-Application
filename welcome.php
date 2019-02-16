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

$customer = $_SESSION['customer'];

$sql = "SELECT * FROM account WHERE aid IN (SELECT aid FROM owns WHERE cid = '$customer')";
$res = mysqli_query($link,$sql);
if(!$res)
	{
		die("SQL Error: " . mysqli_error($link));
	}
else
{
	echo "You have these accounts right now <br>";
	$count = mysqli_num_rows($res);
	if ($count > 0) 
	{
    	while($row = mysqli_fetch_assoc($res))
    	{
    		$aid = $row["aid"];
        	echo "aid: " . $row["aid"]. " - Branch: " . $row["branch"]. " - Balance: " . $row["balance"]. " TL - Opendate: ". $row["openDate"]."";
        	echo '<input type = button name = '.$row["aid"].' onClick="reply_click(name)" class="btn btn-primary" value="Close Account" ></input>';
			echo '<br>';
        }
    }
    else
    {
    	echo "No accounts found";
	}
}	

if(isset($_POST['logout_btn']))
{
echo "<script> location.href='login.php'; </script>";
}

if(isset($_POST['transfer_btn']))
{
echo "<script> location.href='money.php'; </script>";
}

?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	function reply_click(name)
	{
		var id = name;
		window.location.href = "delete.php?w1=" + id;
		
	}


</script>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form method="post" action="welcome.php">
	<table>
		<tr>
			<td></td>
			<td><input type="submit" name="transfer_btn" value="Money Transfer"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="logout_btn" value="Logout"></td>
		</tr>
	</table>
</form>
</body>
</html>