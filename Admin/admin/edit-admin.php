<!--
    This File is to edit current admin data Using Update Query.    
-->
<?php
include('../../dbcon.php');
include('../../Session.php');

//To allow only admin's to access this page
echo Access();

$log = 0; //To logout Admin if Password has been changed

//Store POST array to variables
$pass = encryptPass($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['ph_no'];
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$today = date("Y-m-d H:i:s");

$oldqry = "SELECT admin_image FROM Admin WHERE uid='$_SESSION[uid]'";
$qry_run121 = mysqli_query($conn, $oldqry);
$olddata = mysqli_fetch_assoc($qry_run121);

//To check if Admin Image is selected to update
if (empty($_FILES['admin_image']['tmp_name']) || !is_uploaded_file($_FILES['admin_image']['tmp_name'])) {
    //To check if password is set for update
    if (empty($_POST['password'])) {
        $query = "UPDATE Admin SET name='$name',email='$email',mobile='$mobile',login_time='$today' WHERE uid = '$_SESSION[uid]'";
    } else {
        $query = "UPDATE Admin SET password='$pass',name='$name',email='$email',mobile='$mobile',login_time='$today' WHERE uid = '$_SESSION[uid]'";
        $log = 1;
    }
} else {
    $temp = explode(".", $_FILES["admin_image"]["name"]);
    $admin_image = round(microtime(true)) . '.' . end($temp);

    if (empty($_POST['password'])) {
        $query = "UPDATE Admin SET name='$name',admin_image='$admin_image',email='$email',mobile='$mobile',login_time='$today' WHERE uid = '$_SESSION[uid]'";
    } else {
        $query = "UPDATE Admin SET password='$pass',name='$name',admin_image='$admin_image',email='$email',mobile='$mobile',login_time='$today' WHERE uid = '$_SESSION[uid]'";
        $log = 1;
    }
    move_uploaded_file($_FILES["admin_image"]["tmp_name"], "../upload/" . $admin_image);
    if(!empty($olddata['admin_image'])){unlink('../upload/'.$olddata['admin_image']);}
}

//to check if Query is Run sucessfully
if ($conn->query($query)) {
    echo "<script type='text/javascript'>alert('Admin data Edited Sucessfully.');</script>";
    if ($log == 1) {
        session_destroy();
    }
    echo location("../dashboard/");
} else {
    echo "<script type='text/javascript'>alert('Cannot Add Admin data.');</script>";
    echo location("../admin/");
}
?>