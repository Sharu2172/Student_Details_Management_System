<!--
    This File is to remove current Admin Data from Database using Delete Query.
-->
<?php
include('../../dbcon.php');
include('../../Session.php');

//To allow only admin's to access this page
echo Access();

//To remove admin data from Database.
if (isset($_POST['remove_confirm'])) {

    $oldqry = "SELECT admin_image FROM Admin WHERE uid='$_SESSION[uid]'";
    $qry_run121 = mysqli_query($conn, $oldqry);
    $olddata = mysqli_fetch_assoc($qry_run121);

    //Query to delete admin data.
    $query = "DELETE FROM Admin WHERE uid='$_SESSION[uid]'";

    if ($conn->query($query)) {
        echo "<script type='text/javascript'>alert('Admin data Deleted Sucessfully.');</script>";
        if(!empty($olddata['admin_image'])){unlink('../upload/'.$olddata['admin_image']);}
        session_destroy();
        echo location("../dashboard/");
    } else {
        echo "<script type='text/javascript'>alert('Cannot Delete Admin data.');</script>";
        echo location("../admin/");
    }
} else {
    //If this file is accessed by mistake redirect user to dashboard.
    echo location("../dashboard/");
}
