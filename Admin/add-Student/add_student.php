<!--
  This File is to insert data into database.
-->
<?php
include('../../dbcon.php');
include('../../Session.php');

// Allow Only Admin's To Access this Page 
echo Access();

//Store all the Post values into variables
$usn = $_POST['usn'];
$pass = encryptPass($_POST['usn']);
$name = $_POST['name'];
$course = $_POST['course'];
$sem = $_POST['sem'];
$batchyear = $_POST['batchyear'];
$dob = date('Y-m-d', strtotime($_POST['dob']));
$gender = $_POST['gender'];
$blood = $_POST['blood'];
$ph_no = $_POST['ph_no'];
$email = $_POST['email'];
$address = $_POST['address'];
$nat = $_POST['nat'];
$state = $_POST['state'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$fname = $_POST['fname'];
$foffice = $_POST['foffice'];
$fphone = $_POST['fphone'];
$fmail = $_POST['fmail'];
$finc = $_POST['finc'];
$mname = $_POST['mname'];
$moffice = $_POST['moffice'];
$mphone = $_POST['mphone'];
$mmail = $_POST['mmail'];
$minc = $_POST['minc'];

//To check if student image is set
if (!empty($_FILES["stud_image"]["tmp_name"])) {
	$temp = explode(".", $_FILES["stud_image"]["name"]);
	$stud_image = round(microtime(true)) . '.' . end($temp);
} else {
	$stud_image = "";
}

//To check if father image is set
if (!empty($_FILES["fimg"]["tmp_name"])) {
	$temp = explode(".", $_FILES["fimg"]["name"]);
	$fimg = round(microtime(true)) . '.' . end($temp);
} else {
	$fimg = "";
}

//To check if mother image is set
if (!empty($_FILES["mimg"]["tmp_name"])) {
	$temp = explode(".", $_FILES["mimg"]["name"]);
	$mimg = round(microtime(true)) . '.' . end($temp);
} else {
	$mimg = "";
}

//To insert Detail's Into student details table
$qry1 = "INSERT INTO stud_details VALUES ('$usn','$name','$course','$sem','$batchyear','$pass')";

//To insert Detail's Into personal details table
$qry2 = "INSERT INTO personal_details VALUES ('$usn','$dob','$gender', '$blood', '$ph_no', '$email', '$address', '$nat', '$state', '$city','$pin')";

//To insert Detail's Into parents details table
$qry3 = "INSERT INTO parents_details VALUES ('$usn', '$fname', '$foffice', '$fphone', '$fmail', '$finc', '$mname', '$moffice', '$mphone', '$mmail', '$minc')";

//To insert Detail's Into student details table
$qry4 = "INSERT INTO images VALUES ('$usn','$stud_image','$fimg','$mimg')";

//If any of the Queries fails then delete the main table details
$error = "DELETE FROM stud_details WHERE USN=$usn";

// To read data from student tables where USN is given by user
$sql = "SELECT * FROM stud_details WHERE usn='$usn'";
$result = $conn->query($sql);

// If USN is already Present in table then Abort Insertion
if ($result->num_rows > 0) {
	echo "<script type='text/javascript'>alert('USN already Present.');</script>";
	echo location("../search-student/", "search", $usn);
} elseif ($conn->query($qry1)) {
	// To check the trigger return's Error or Not
	if ($conn->query($qry2)) {
		// If no error is Returned then run Queries 3 and  4
		$conn->query($qry3);
		$conn->query($qry4);

		move_uploaded_file($_FILES["stud_image"]["tmp_name"], "../../Student/upload/" . $stud_image);
		move_uploaded_file($_FILES["fimg"]["tmp_name"], "../../Student/upload/" . $fimg);
		move_uploaded_file($_FILES["mimg"]["tmp_name"], "../../Student/upload/" . $mimg);

		echo "<script type='text/javascript'>alert('Student Data Added Sucessfully.');</script>";
		echo location("../search-student/", "search", $usn);
	} else {
		//If Query run Fails then delete the changes done by Query 1
		$conn->query($error);
		echo "<script type='text/javascript'>alert('Student Age is less than 16.');</script>";
		echo location("../dashboard/");
	}
} else {
	echo "<script type='text/javascript'>alert('Cannot upload data.');</script>";
    echo location("../dashboard/");
}
$conn->close();
?>