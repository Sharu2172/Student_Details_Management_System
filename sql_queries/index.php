<?php
//Getting the database credential
include("../config.php");
include("../Student/extra/Session.php");
//Using data from config.php to connect to database
$conn = mysqli_connect($host,$user,$pass,$name);//host_name,username,password,Database_name
//check connection
if (!$conn) {
    echo "connection failed: " . mysqli_connect_error()."<br>";
    echo "connection error no: " . mysqli_connect_errno();
}
//check connection
if (!$conn) {
  echo "connection failed: " . mysqli_connect_error() . "<br>";
  echo "connection error no: " . mysqli_connect_errno();
}

$sql = array();

$location = str_replace('\\', '/', getcwd());
$file1 = 'admin_image.jfif';

copy($file1, '../Admin/upload/' . $file1);

$sql[0] = "CREATE TABLE IF NOT EXISTS `admin` (
    `uid` INT NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `password` text NOT NULL,
    `name` varchar(30) NOT NULL,
    `admin_image` VARCHAR(100) DEFAULT NULL,
    `email` varchar(30) NOT NULL,
    `mobile` varchar(30) NOT NULL,
    `login_time` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`username`),
    UNIQUE KEY `uid` (`uid`)
  )";

$sql[1] = "INSERT INTO admin VALUES ('1','admin','" . encryptpass('admin') . "','Admin','$file1','admin@mail.com','974012350',CURRENT_TIMESTAMP)";

$sql[2] = "CREATE TABLE `stud_details` (
    `USN` int(11) NOT NULL,
    `name` varchar(30) NOT NULL,
    `course` varchar(50) NOT NULL,
    `sem` int(11) NOT NULL,
    `batchyear` int(11) NOT NULL,
    `pass` text,
    PRIMARY KEY (`USN`)
  )";

$sql[3] = "CREATE TABLE IF NOT EXISTS `personal_details` (
    `USN` int(11) NOT NULL,
    `dob` date DEFAULT NULL,
    `gender` varchar(10) DEFAULT NULL,
    `blood` varchar(6) DEFAULT NULL,
    `ph_no` varchar(13) DEFAULT NULL,
    `email` varchar(40) DEFAULT NULL,
    `address` varchar(100) DEFAULT NULL,
    `nat` varchar(15) DEFAULT NULL,
    `state` varchar(20) DEFAULT NULL,
    `city` varchar(35) DEFAULT NULL,
    `pin` int(11) NOT NULL,
    PRIMARY KEY (`USN`),
    CONSTRAINT `personal_details_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `stud_details` (`USN`) ON DELETE CASCADE
  )";

$sql[4] = "CREATE TABLE IF NOT EXISTS `parents_details` (
    `USN` int(11) NOT NULL,
    `fname` varchar(30) DEFAULT NULL,
    `foffice` varchar(70) DEFAULT NULL,
    `fphone` varchar(11) DEFAULT NULL,
    `fmail` varchar(30) DEFAULT NULL,
    `finc` int(11) DEFAULT NULL,
    `mname` varchar(30) DEFAULT NULL,
    `moffice` varchar(70) DEFAULT NULL,
    `mphone` varchar(11) DEFAULT NULL,
    `mmail` varchar(30) DEFAULT NULL,
    `minc` int(11) DEFAULT NULL,
    PRIMARY KEY (`USN`),
    CONSTRAINT `parents_details_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `stud_details` (`USN`) ON DELETE CASCADE
  )";

$sql[5] = "CREATE TABLE `images` (
    `USN` int(10) NOT NULL,
    `stud_image` VARCHAR(100) NOT NULL,
    `fimg` VARCHAR(100) DEFAULT NULL,
    `mimg` VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (`USN`),
    CONSTRAINT `images_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `stud_details` (`USN`) ON DELETE CASCADE
  )";

$sql[7] = "CREATE OR REPLACE PROCEDURE uptime (IN upuid INT)
MODIFIES SQL DATA
BEGIN
  UPDATE Admin SET login_time=CURRENT_TIMESTAMP() WHERE uid = upuid;
END";

$sql[8] = "CREATE OR REPLACE TRIGGER Age_insert BEFORE INSERT ON personal_details FOR EACH ROW
BEGIN 
IF (YEAR(NOW()) - YEAR(new.dob) - (DATE_FORMAT(NOW(),'%m%d') < DATE_FORMAT(new.dob,'%m%d')) < 16) THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'hello world';
END IF;
END";

$sql[9] = "CREATE OR REPLACE TRIGGER Age_update BEFORE UPDATE ON personal_details FOR EACH ROW
BEGIN 
IF (YEAR(NOW()) - YEAR(new.dob) - (DATE_FORMAT(NOW(),'%m%d') < DATE_FORMAT(new.dob,'%m%d')) < 16) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'hello world';
END IF;
END";

foreach ($sql as $query) {
  $conn->multi_query($query);
}

$out = '
   <form method="POST" id="form_id" action="../index.php"></form>
   <script type="text/javascript">
	   document.forms[\'form_id\'].submit();
   </script>
   ';
echo $out;
