<!-- File to update the data present in the database based on USN. -->
<?php
include('../../Session.php');
include('../../dbcon.php');
//Only to Allow Admin's to access this file.
echo sAccess();
//To check if session USN is present.
if (isset($_POST['edit']) && isset($_SESSION['USN'])) {
	//Store SESSION array data to variables for updation.
	$usn = $_SESSION['USN'];
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

	if ($_POST['npass']) {
		if ($_POST['npass'] == $_POST['cnpass']) {
			$pass = encryptPass($_POST['npass']);
			$sql = "update stud_details set pass = '$pass' WHERE USN = $usn";
			if($conn->query($sql)){
				echo "<script type='text/javascript'>alert('Password Edited.');</script>";
			}else{
				echo "<script type='text/javascript'>alert('Cannot Edit Password 1.');</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('both passwords donot match.');</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Password cannot be edited.');</script>";
	}

	$oldqry = "SELECT * FROM images WHERE USN='$usn'";
	$qry_run121 = mysqli_query($conn, $oldqry);
	$olddata = mysqli_fetch_assoc($qry_run121);

	//To check if student image is set for Update
	if (!empty($_FILES['stud_image']['tmp_name']) || is_uploaded_file($_FILES['stud_image']['tmp_name'])) {
		$temp = explode(".", $_FILES["stud_image"]["name"]);
		$stud_image = round(microtime(true)) . '.' . end($temp);

		$qry = "UPDATE images SET stud_image = '$stud_image' WHERE USN = '$usn'";
		if (!$conn->query($qry)) {
			echo "<script type='text/javascript'>alert('Cannot Edit Student Image.');</script>";
		} else {
			move_uploaded_file($_FILES["stud_image"]["tmp_name"], "../upload/" . $stud_image);
			if (!empty($olddata['stud_image'])) {
				unlink('../upload/' . $olddata['stud_image']);
			}
		}
	}

	//To check if father image is set for Update
	if (!empty($_FILES['fimg']['tmp_name']) || is_uploaded_file($_FILES['fimg']['tmp_name'])) {
		$temp = explode(".", $_FILES["fimg"]["name"]);
		$fimg = round(microtime(true)) . '.' . end($temp);

		$qry = "UPDATE images SET fimg = '$fimg' WHERE USN = '$usn'";
		if (!$conn->query($qry)) {
			echo "<script type='text/javascript'> alert('Cannot Edit Father Image.');</script>";
		} else {
			move_uploaded_file($_FILES["fimg"]["tmp_name"], "../upload/" . $fimg);
			if (!empty($olddata['fimg'])) {
				unlink('../upload/' . $olddata['fimg']);
			}
		}
	}

	//To check if mother image is set for Update
	if (!empty($_FILES['mimg']['tmp_name']) || is_uploaded_file($_FILES['mimg']['tmp_name'])) {
		$temp = explode(".", $_FILES["mimg"]["name"]);
		$mimg = round(microtime(true)) . '.' . end($temp);

		$qry = "UPDATE images SET mimg = '$mimg' WHERE USN = '$usn'";
		if (!$conn->query($qry)) {
			echo "<script type='text/javascript'> alert('Cannot Edit Mother Image.');</script>";
		} else {
			move_uploaded_file($_FILES["mimg"]["tmp_name"], "../upload/" . $mimg);
			if (!empty($olddata['mimg'])) {
				unlink('../upload/' . $olddata['mimg']);
			}
		}
	}

	$qry1 = "update stud_details set name='$name',course='$course',sem='$sem',batchyear='$batchyear' where USN='$usn'";
	$qry2 = "update personal_details set dob='$dob',gender='$gender',blood='$blood', ph_no='$ph_no', email='$email', address='$address', nat='$nat', state='$state', city='$city',pin='$pin' where USN='$usn'";
	$qry3 = "update parents_details set fname='$fname', foffice='$foffice', fphone='$fphone', fmail='$fmail', finc='$finc', mname='$mname', moffice='$moffice', mphone='$mphone', mmail='$mmail', minc='$minc' where USN='$usn'";

	//To check if queries have run sucessfully or not.
	if ($conn->query($qry1)) {
		if ($conn->query($qry2)) {
			$conn->query($qry3);
			echo "<script type='text/javascript'> alert('Details edited Sucessfully.');</script>";
		} else {
			echo "<script type='text/javascript'> alert('Student Age is Less than 16.');</script>";
		}
	} else {
		echo "<script type='text/javascript'> alert('Cannot edit student detals.');</script>";
	}
} elseif (isset($_POST['cancel'])) {
	//To check if user has clicked cancel button
}

echo location("../sdashboard/");

?>