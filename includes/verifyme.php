<?php
 ini_set("auto_detect_line_endings", true);

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
// Include database connection and functions here.  See 3.1.  
if(login_check($mysqli) == true) {
$dbhost = 'xx';
$dbuser = 'xx';
$dbpass = 'xx';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('_datatrap');

// This could be supplied by a user, for example
$firstname = $_SESSION['username'];


// Formulate Query
// This is the best way to perform an SQL query
// For more examples, see mysql_real_escape_string()
$query = sprintf("SELECT UID FROM members 
    WHERE username='%s'",
    mysql_real_escape_string($firstname));

// Perform Query
$result = mysql_query($query, $conn);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

// Use result
// Attempting to print $result won't allow access to information in the resource
// One of the mysql result functions must be used
// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
while ($row = mysql_fetch_array($result)) {
	$UIDverify = $row['UID'];
    //echo $row['PID'] . "<br>";
}

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysql_free_result($result);


$UIDcookie = $_COOKIE["UID"];

	if(empty($_COOKIE["UID"])){
	echo "Login Session is not Bonded, Please Login" . "<br>";
	$sec = 2;
	$UIDcookie = "%20NULLIFIED%20";
	}
	if(empty($UIDverify)){
	echo "Mysql Session is not Bonded, Please Login" . "<br>";
	$sec = 2;
	$UIDcookie = "%20NULLIFIED%20";
	}
	if($sec == 2){
	$Sec2 = 2;
	}
	
$hashsec1 = hash('sha256', $UIDverify);
$hashsec2 = hash('sha256', $UIDcookie);

	if ($hashsec1 == $hashsec2){// false output when should be true.
	echo "Session is Verified" . "<br>";
	$sec = 1;
	echo "Fetched data successfully"."<br>";
	mysql_close($conn);
}	else{
	echo  "Session is Unverified." . "<br>";
	echo $_COOKIE["sec_session_id"] . "<br>";
	echo "Data fetch Halted"."<br>";
	mysql_close($conn);
}
	if($sec == 1){
	if(login_check($mysqli) == true) {
    $sec2 = 1;
	echo "Authentication Accepted." . "<br>";
	$_SESSION['active'] = true;
	sec_session_start();
} else {
	$sec2 = 2;
	echo "Authentication Rejected." . "<br>";
}
}
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//	session_start();   // Add your protected page content here!
} else { 
sec_session_start();
 
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setrawcookie("UID",'xXLoggedOut%00x455',time() -42000,"/","archway.io");
		
setcookie(session_name(),
        '', time() -42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
// Destroy session 
session_destroy();
}
?>