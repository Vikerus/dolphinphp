<?php
ini_set("auto_detect_line_endings", true);

require_once 'hig.inc.php';
require_once 'higu.inc.php';
require_once 'verifyme.php';

sec_session_start();
	//Turnicate the UID in DB
if(login_check($mysqli) == true) {
$sendtohash = $_POST["hashyid"];
$messagekey = hash('sha256', uniqid(mt_rand(1, mt_getrandmax()), true));
$en_hashid = hash('sha256', $_POST["hashid"] . $messagekey);
$textToEncrypt = "$en_hashid";
$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
$secretHash = "$sendtohashid";

$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

$encryptedMessage = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash, 0, $iv);
$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash, 0, $iv);

$data = $iv.$encryptedMessage;

$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
$iv = substr($data, 0, $iv_size);
//$decryptedMessage = openssl_decrypt(substr($data, $iv_size), $encryptionMethod, $secretHash, 0, $iv);
//Result
$_SESSION["pubkey"] = $encryptedMessage;
}
else
{
header('Location: ../logout.php');
}

?>