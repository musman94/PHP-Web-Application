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
    $to = $_GET['to'];
    $from = $_GET['from'];
    $amount = $_GET['amount'];
    
    $account = "SELECT * FROM owns WHERE cid = '$customer' AND aid = '$from'";
    $res = mysqli_query($link, $account);
    $balance = "SELECT * FROM account WHERE aid = '$from' AND balance >= '$amount'";
    $res2 = mysqli_query($link, $balance);
    $checkt0 = "SELECT * FROM account WHERE aid = '$to'";
    $res3 = mysqli_query($link, $checkt0);
    if (mysqli_num_rows($res) != 1)
    {
        echo "The account you entered is not yours";
        echo '<br>';
    }
    elseif (mysqli_num_rows($res2) != 1)
    {
            echo "You dont have enough balance";
            echo '<br>';    
    }
    elseif ((mysqli_num_rows($res) == 1) && (mysqli_num_rows($res2) == 1) && (mysqli_num_rows($res3) != 0))
        {
            $add = "UPDATE account SET balance = balance + '$amount' WHERE aid = '$to'";
            $rem = "UPDATE account SET balance = balance - '$amount' WHERE aid = '$from'";
            $run1 = mysqli_query($link, $add);
            $run2 = mysqli_query($link, $rem);
            echo "<script> location.href='success.php'; </script>";
        }
    else
    {
        echo "Error";
    }   
 
    
    
?>
    

