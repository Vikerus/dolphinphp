<?php
require_once 'functions.php';


	//Create Cbit 
	$UIDbbit = $_SERVER['HTTP_REFERER'];
	$UIDebit = $_SERVER['HTTP_USER_AGENT'];
	$UIDgbit = $_SERVER['REQUEST_TIME_FLOAT'];
	$Cbitvalue = "$UIDbbit $UIDebit $UIDgbit";
	$CookieToEncrypt = $Cbitvalue;
	$encryptionMethodE = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
	$secretHashE = "25c6c7ff35b9979b151f2136cd13b0ee";

	$iv_sizeE = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$ivE = mcrypt_create_iv($iv_sizeE, MCRYPT_RAND);

	$encryptedMessageE = openssl_encrypt($CookieToEncrypt, $encryptionMethodE, $secretHashE, 0, $ivE);
	// Securedvalues
	$UIDsec = $encryptedMessageE;

//
//
	//Create First UID
	$UIDabit = $_SERVER['REMOTE_ADDR'];
	$UIDcbit = $UIDsec;
	$UIDdbit = date(DATE_RFC2822);
	$UIDfbit = $_SERVER['SERVER_PROTOCOL'];
	$UUID = "$UIDabit $UIDcbit $UIDdbit $UIDfbit";
	$CookieToEncrypt5 = $UUID;
	$encryptionMethod5 = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
	$secretHash5 = "25c6c7ff35b9979b151f2136cd13b0ee";

	$iv_size5 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$iv5 = mcrypt_create_iv($iv_size5, MCRYPT_RAND);

	$encryptedMessage5 = openssl_encrypt($CookieToEncrypt5, $encryptionMethod5, $secretHashE, 0, $ivE);
	// sent a simple cookie
	$expire = time() + 12600;
	setcookie("UID",$encryptedMessage5,$expire,"/","archway.io");
	$UID = $encryptedMessage5;
//
//
	//Turnicate the UID in DB
// Check connection 
$email = $_POST['email'];
        // Login success 
$con=mysqli_connect("xx","xx","xx","xx");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($con,"UPDATE members SET UID='$UID'
WHERE email='$email'");
}
mysqli_close($con)
    


//
//
//
?>