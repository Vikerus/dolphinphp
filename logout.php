<pre class="showcase">
<?php
 ini_set("auto_detect_line_endings", true);
?><center><script type="text/javascript"><!--
google_ad_client = "ca-pub-5438246597621570";
/* archheady */
google_ad_slot = "4166381246";
google_ad_width = 320;
google_ad_height = 50;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script><link rel="stylesheet" href="style/maincase.css" type="text/css" /></center>
</pre>
<?php
include_once 'functions.php';

// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setcookie("UID",'xXLoggedOut%00x455',time() -42000,"/","archway.io");
		
setcookie(session_name(),
        '', time() -42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
// Destroy session 
session_destroy();
header('Location: ../index.php');
?>