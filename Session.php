<!-- File to have multiple php functions. -->
<?php
//start session.
session_set_cookie_params(0);
session_start();

//Function to redirect user to another page with preset post variables.
function location($page,$name1 = "",$value1 = "",$name2 = "",$value2 = ""){
$out = '
<form method="POST" id="form_id" action="'.$page.'">
<input type="text" name="'.$name1.'" value="'.$value1.'" hidden>
<input type="text" name="'.$name2.'" value="'.$value2.'" hidden>
</form>
<script type="text/javascript">document.forms[\'form_id\'].submit();</script>
';
echo $out;
}

//Function to only allow user's to access specific files using session array.
function sAccess() {
    if (!isset($_SESSION['USN'])) {
      echo "<script type='text/javascript'>alert('Please Login With Usn to Access This Page.');</script>";
        echo location("../../");
      }
}

function Access() {
  if (!isset($_SESSION['uid'])) {
    echo "<script type='text/javascript'>alert('Please Login as Admin to Access This Page.');</script>";
      echo location("../../");
    }
}

//Function to encrypt data for password variable.
function encryptPass($password) {
    $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
    $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
    $method = 'aes-256-cbc';
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
    $encrypted = base64_encode(openssl_encrypt($password, $method, $sSalt, OPENSSL_RAW_DATA, $iv));
    return $encrypted;
}
?>