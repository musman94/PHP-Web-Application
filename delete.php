<?php

if (isset($_GET["w1"]))
{
	$aid = $_GET["w1"];
	echo $aid;
}

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

$sql = "DELETE FROM account WHERE aid = '$aid'";
$res = mysqli_query($link,$sql);
if(!$res)
	{
		die("SQL Error: " . mysqli_error($link));
	}
else
{
	echo "<script> location.href='welcome.php'; </script>";

   
}	


?>