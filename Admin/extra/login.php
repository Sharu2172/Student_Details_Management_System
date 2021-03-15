<!-- To check login credentials and update login time. -->
<?php
include('../../dbcon.php');
include('../../Session.php');
//To get username.
$user = $_POST['user'];
//to get password in encrypted form.
$pass = encryptPass($_POST['passwd']);
//Empty the $_POST array.
$_POST=array();
//Query to check if username and password is present in database.
$qry = "SELECT * FROM Admin WHERE username='$user' and password='$pass'";
$query_run = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($query_run);
if ($row) {
    //Set user_id and username into $SESSION Array.
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['uname'] = $row['name'];
    //Query to call Procedure uptime with user_id as parameter.
    $update = "CALL uptime('$row[uid]');";
    $query_run = mysqli_query($conn, $update);
    echo location("../dashboard/");
} else {
    echo "<script type='text/javascript'>alert('username or passoword invalid');</script>";
    echo location("../../");
}
?>