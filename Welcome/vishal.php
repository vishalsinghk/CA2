<?php


$c_no = $_POST["c_no"];
$pin = $_POST["pin"];

// Connect to the database
$con = mysqli_connect("localhost","root","");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}

// Select the database to use
mysqli_select_db("onlinefood",$con);

$result = mysqli_query("SELECT c_no, pins FROM payment1 WHERE c_no = $c_no");

$row = mysqli_fetch_array($result);

if($row["c_no"]==$c_no && $row["pin"]==$pin)
    echo"Payment successfully";
else
    echo"Sorry, your credentials are not valid, Please try again.";
?>