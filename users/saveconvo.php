<?php
 ini_set("auto_detect_line_endings", true);

include_once '../includes/db_connect.php';
require_once '../includes/functions.php';
require_once '../includes/verifyme.php';
include_once '../includes/rdyencrypt.php';
sec_session_start();
	//Turnicate the UID in DB
if(login_check($mysqli) == true) {
//Result

        // Login success 
$con=mysqli_connect("localhost","phpmate","freeagent7","_datatrap");
// escape variables for security
$friendcode = mysqli_real_escape_string($con,$_POST["friendid"]);
$messaget = mysqli_real_escape_string($con,$_POST["inboxmsg"]);
$msgtime = mysqli_real_escape_string($con,$_SERVER['REQUEST_TIME_FLOAT']);
$pubkey = mysqli_real_escape_string($con,$_SESSION["pubkey"]);


$textToEncrypt = "$messaget";
$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
$secretHash = "$en_hashid";

$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

$encryptedMessage = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash, 0, $iv);
$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash, 0, $iv);

$data = $iv.$encryptedMessage;

$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = substr($data, 0, $iv_size);


$sql="INSERT INTO messages (friendcode,message,time,pubkey)
VALUES ('$friendcode','$encryptedMessage','$msgtime','$pubkey')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

unset($_SESSION["inboxmsg"]);
unset($_SESSION["readauth"]);
unset($_SESSION["friendid"]);
unset($_POST["inboxmsg"]);
unset($_POST["hashid"]);
unset($_SESSION["pubkey"]);
unset($messaget);

}
 else {
        // Login failed 
     header('Location: ../login.php');
    }
mysqli_close($con);
header('Location: ../index.php');
?> 
