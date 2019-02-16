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
	echo "Your Accounts <br>";
	$count = mysqli_num_rows($res);
	if ($count > 0) 
	{
    	while($row = mysqli_fetch_assoc($res))
    	{
    		$aid = $row["aid"];
        	echo "aid: " . $row["aid"]. " - Branch: " . $row["branch"]. " - Balance: " . $row["balance"]. " TL - Opendate: ". $row["openDate"]."";
			echo '<br>';
        }
    }
    $sql2 = "SELECT * FROM account WHERE account.aid NOT IN (SELECT aid FROM owns WHERE cid = '$customer')";
    $res2 = mysqli_query($link,$sql2);
    if(!$res2)
    {
        die("SQL Error: " . mysqli_error($link));
    }
    else
    {
    $count2 = mysqli_num_rows($res2);
    if ($count2 > 0) 
    {
        echo "Other Accounts <br>";
        while($row2 = mysqli_fetch_assoc($res2))
        {
            echo "aid: " . $row2["aid"]. " - Branch: " . $row2["branch"]. " - Balance: " . $row2["balance"]. " TL - Opendate: ". $row2["openDate"]."";
            echo '<br>';
        }
    }
    else
    {
        echo "No accounts found";
    }
}   
}	


?>


<!DOCTYPE html>
<html>
<head>
    <title>Transfer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header"> 
    <h1>Please enter the accounts information below</h1>
</div>

<form method="post" action="login.php">
    <table>
        <tr>
            <td>From Account(aid):</td>
            <td><input type="text" id = "from" name="acc_from" class="textInput"></td>
        </tr>

        <tr>
            <td>To Account(aid):</td>
            <td><input type="text" id = "to" name="acc_to" class="textInput"></td>
        </tr>

        <tr>
            <td>Amount:</td>
            <td><input type="text" id = "am" name="amount" class="textInput"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="button" id = "tran" name="transfer_btn" onclick = "checkEmpty();" value="Transfer"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" id = "out" name="logout_btn" onclick = "out();" value="Logout"></td>
        </tr>
    </table>
</form>
<script>
        function checkEmpty()
        {
                if (!document.getElementById("from").value || !document.getElementById("to").value || !document.getElementById("am").value) 
                {
                    alert("One or more fields are empty!");
                }
                else
                {
                    var from = document.getElementById("from").value;
                    var to = document.getElementById("to").value;
                    var amount = document.getElementById("am").value;
                    document.location.href = ('add.php?from='+from+'&to='+to+'&amount='+amount);

                }
            
        }
        function out()
        {
            window.location.href = "login.php";
        }
</script>
</body>
</html>