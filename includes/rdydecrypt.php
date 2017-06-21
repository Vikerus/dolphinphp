<?php
ini_set("auto_detect_line_endings", true);

require_once 'higu.inc.php';
require_once 'verifyme.php';

sec_session_start();
	//Turnicate the UID in DB
if(login_check($mysqli) == true) {
$senttohash = $_POST["hashid"];

$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
$secretHash = "$senttohash";


$encryptedMessage = $_POST["messagekey"];
$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash, 0, $iv);

$data = $iv.$encryptedMessage;

$iv = substr($data, 0, $iv_size);
$decryptedMessage = openssl_decrypt(substr($data, $iv_size), $encryptionMethod, $secretHash, 0, $iv);
//Result
$_SESSION["pubkey"] = "$decryptedMessage";
}
else
{
header('Location: ../logout.php');
}

?>
