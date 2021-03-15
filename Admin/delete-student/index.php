<!-- This File is used for deleting student data from the Database -->
<?php
include('../../dbcon.php');
include('../../Session.php');

//To allow only admin to access this file.
echo Access();

//To check if this file was accessed by mistake.
if(isset($_POST['delete'])){
    //To insert value into variable usn fron Session.
    $usn=$_SESSION['usn'];

    $oldqry = "SELECT * FROM images WHERE USN='$usn'";
	$qry_run121=mysqli_query($conn,$oldqry);
    $olddata = mysqli_fetch_assoc($qry_run121);
    
    //Query to delete data where USN is in variable USN.
    $query = "DELETE FROM stud_details WHERE USN = '$usn'";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        if (!empty($olddata['stud_image'])){unlink('../../Student/upload/'.$olddata['stud_image']);}
        if (!empty($olddata['fimg'])){unlink('../../Student/upload/'.$olddata['fimg']);}
        if (!empty($olddata['mimg'])){unlink('../../Student/upload/'.$olddata['mimg']);}
        
        //Unset Variable SESSION USN.
        unset($_SESSION['usn']);
        echo "<script type='text/javascript'>alert('Student Data Deleted sucessfully');</script>";
        // PHP Function to change the webpage to dashboard after Sucessful Delete.
        echo location("../dashboard/");
    }else{
        echo "<script type='text/javascript'>alert('Unable to Delete Student Detail');</script>";
        // PHP Function to change the webpage to search page after Unsucessful Delete.
        echo location("../search-student/index.php","search",$_SESSION['usn']);
    }
}else{
    echo location("../dashboard/");
}
?>