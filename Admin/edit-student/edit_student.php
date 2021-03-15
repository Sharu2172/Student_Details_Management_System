<!-- File to update the data present in the database based on USN. -->
<?php
include('../../Session.php');
include('../../dbcon.php');
//Only to Allow Admin's to access this file.
echo Access();
//To check if session USN is present.
if (isset($_POST['edit']) && isset($_SESSION['uid'])) {
	//Store SESSION array data to variables for updation.
	$usn = $_SESSION['usn'];
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

	$oldqry = "SELECT * FROM images WHERE USN='$usn'";
	$qry_run121=mysqli_query($conn,$oldqry);
	$olddata = mysqli_fetch_assoc($qry_run121);

	//To check if student image is set for Update
	if (!empty($_FILES['stud_image']['tmp_name']) || is_uploaded_file($_FILES['stud_image']['tmp_name'])) {
		$temp = explode(".", $_FILES["stud_image"]["name"]);
		$stud_image = round(microtime(true)) . '.' . end($temp);

		$qry = "UPDATE images SET stud_image = '$stud_image' WHERE USN = '$usn'";
		if (!$conn->query($qry)) {
			echo "<script type='text/javascript'>alert('Cannot Edit Student Image.');</script>";
		}else{
			move_uploaded_file($_FILES["stud_image"]["tmp_name"], "../../Student/upload/" . $stud_image);
			if(!empty($olddata['stud_image'])){unlink('../../Student/upload/'.$olddata['stud_image']);}
		}
	}

	//To check if father image is set for Update
	if (!empty($_FILES['fimg']['tmp_name']) || is_uploaded_file($_FILES['fimg']['tmp_name'])) {
		$temp = explode(".", $_FILES["fimg"]["name"]);
		$fimg = round(microtime(true)) . '.' . end($temp);

		$qry = "UPDATE images SET fimg = '$fimg' WHERE USN = '$usn'";
		if (!$conn->query($qry)) {
			echo "<script type='text/javascript'> alert('Cannot Edit Father Image.');</script>";
		}else{
			move_uploaded_file($_FILES["fimg"]["tmp_name"], "../../Student/upload/" . $fimg);
			if(!empty($olddata['fimg'])){unlink('../../Student/upload/'.$olddata['fimg']);}
		}
	}

	//To check if mother image is set for Update
	if (!empty($_FILES['mimg']['tmp_name']) || is_uploaded_file($_FILES['mimg']['tmp_name'])) {
		$temp = explode(".", $_FILES["mimg"]["name"]);
		$mimg = round(microtime(true)) . '.' . end($temp);

		$qry = "UPDATE images SET mimg = '$mimg' WHERE USN = '$usn'";
		if (!$conn->query($qry)) {
			echo "<script type='text/javascript'> alert('Cannot Edit Mother Image.');</script>";
		}else{
			move_uploaded_file($_FILES["mimg"]["tmp_name"], "../../Student/upload/" . $mimg);
			if(!empty($olddata['mimg'])){unlink('../../Student/upload/'.$olddata['mimg']);}
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
			echo location("../search-student/index.php", "search", $_SESSION['usn']);
		} else {
			echo "<script type='text/javascript'> alert('Student Age is Less than 16.');</script>";
			echo location("../search-student/index.php", "search", $usn);
		}
	} else {
		echo "<script type='text/javascript'> alert('Cannot edit student detals.');</script>";
		echo location("../search-student/index.php", "search", $usn);
	}
} elseif (isset($_POST['cancel'])) {
	//To check if user has clicked cancel button
	echo location("../search-student/index.php", "search", $usn);
} else {
	//to redirect user if accessed by mistake
	echo location("../dashboard/");
}
?>