<?php
ini_set("auto_detect_line_endings", true);
include_once 'functions.php';
sec_session_start();
	//Turnicate the UID in DB
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
$firstname = $_POST["friendid"];


// Formulate Query
// This is the best way to perform an SQL query
// For more examples, see mysql_real_escape_string()
$query = sprintf("SELECT hashid FROM members 
    WHERE friendcode='%s'",
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
	$_POST["hashid"] = $row['hashid'];
    //echo $row['PID'] . "<br>";
}

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysql_free_result($result);
}
else
{
header('Location: ../logout.php');
}

?>