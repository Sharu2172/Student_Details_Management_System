<!-- To check login credentials and update login time. -->
<?php
include('../../dbcon.php');
include('../../Session.php');
//To get username.
$user = $_POST['user'];
//to get password in encrypted form.
$pass = encryptPass($_POST['pass']);
//Empty the $_POST array.
$_POST=array();
//Query to check if username and password is present in database.
$qry = "SELECT * FROM stud_details WHERE USN='$user' and pass='$pass'";
$query_run = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($query_run);
if ($row) {
    //Set user_id and username into $SESSION Array.
    $_SESSION['USN'] = $row['USN'];
    echo location("../sdashboard/");
} else {
    echo "<script type='text/javascript'>alert('username or passoword invalid');</script>";
    echo location("../../");
}
?>