<?php 
//Getting the database credential
include("config.php");
//Using data from config.php to connect to database
$conn = mysqli_connect($host,$user,$pass,$name);//host_name,username,password,Database_name
//check connection
if (!$conn) {
    echo "connection failed: " . mysqli_connect_error()."<br>";
    echo "connection error no: " . mysqli_connect_errno();
}
?>