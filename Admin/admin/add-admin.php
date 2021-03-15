<!--
	This file is to add admin data to database. This file doesn't take any input from the user, it only writes data to the database.
-->
<?php
include('../../dbcon.php');
include('../../Session.php');
//Only allow admin to access this page
echo Access();

//Store Post values to variables
$user = $_POST['username'];
$pass = encryptPass($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['ph_no'];

if (!empty($_FILES["admin_image"]["tmp_name"])) {
	$temp = explode(".", $_FILES["admin_image"]["name"]);
    $admin_image = round(microtime(true)) . '.' . end($temp);
} else {
	$admin_image = "";
}

//To clear $_POST array
$_POST=array();

//To get current Date and time
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$today = date("Y-m-d H:i:s");

//Query to insert data into Admin Table
$query = "INSERT INTO Admin VALUES ('','$user','$pass','$name','$admin_image','$email','$mobile','$today')";

if ($conn->query($query)) {
	move_uploaded_file($_FILES["admin_image"]["tmp_name"], "../upload/" . $admin_image);
	echo "<script type='text/javascript'>alert('Admin data Added Sucessfully.');</script>";
	echo location("../admin/");
} else {
	echo "<script type='text/javascript'>alert('Cannot Add Admin data.');</script>";
	echo location("../admin/");
}
?>