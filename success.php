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

echo "Transferred";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Done</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="post" action="success.php">
    <table>
        <tr>
            <td></td>
            <td><input type="button" name="done_btn" onclick = "goBack();" value="Go Back" </td>
        </tr>
    </table>
</form>
<script>
        function goBack()
        {
               window.location.href = "money.php";
        }
</script>
</body>
</html>