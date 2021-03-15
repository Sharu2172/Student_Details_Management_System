<!-- To Logout user and destroy SESSION array variables. -->
<?php 
include("../../Session.php");
if(isset($_POST["logout_confirm"])){
	session_destroy();
	echo location("../../");
}else{
	echo location("../sdashboard/");
}
?>