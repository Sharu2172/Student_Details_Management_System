<?php
include("config.php");
$conn = mysqli_connect($host,$user,$pass,$name);
if (!$conn) {
    echo "connection failed: " . mysqli_connect_error()."<br>";
    echo "connection error no: " . mysqli_connect_errno();
}
$usn = "12345";
$query = "SELECT * FROM stud_details s JOIN personal_details p on s.USN=p.USN WHERE s.USN = 12345";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

foreach ($row as $query) {
  echo $query;
}
?>