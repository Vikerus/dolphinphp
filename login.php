<?php
ini_set("auto_detect_line_endings", true);

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>DolphinPHP - PHP Powered Database</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

        <!-- Custom styles for this template -->
	
	<!-- These two javascripts' below are needed for the form to work!
		 Extended Use: These are Required. -->
	    <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
				<script src="assets/js/jquery.js"></script>
<script>
$(function () {
  var nua = navigator.userAgent
  var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
  if (isAndroid) {
    $('select.form-control').removeClass('form-control').css('width', '100%')
  }
})
</script>
		
  </head>

  <body>
      	 <div class="panel panel-default">
           <div class="panel-heading"><h4>Register a User Account</h4></div>
   			<div class="panel-body">
            <p> <div class="form-group">
<h2>Security Policy, Privacy Practices</h2>
<p>Please read and understand how your data is respected.</p>
- The practices and policies herein are under development. All items marked with an "*" are not yet
made a part of the -SP,PP- but are rather the planned implementations for this site. I the webmaster for this
site take the subject of security and privacy seriously. To the best of my own abilities all data stored or
transferred will be made as confidential as possible. If a data breach is made known this site will be removed
until such time as I can assure that it is secure. While in development I ask that users use extreme prejudice
in trusting this site with any personally identifiable information.
<br>
*- Disk, Database, Data-set Encryption. While this is not implemented yet I use a method of encryption to devise
the PID "COOKIE" which verifies a users authenticity while a session is active. Each login changes your PID and
does not update to track your habits. Rather it is used as a token of verification only. Proving that your session
is unique and that the user has not changed browsers or computers.
<br>
*- Data Anonymization, Minimization, and Fracturing. A practice of striping data or dumping bits randomly is used to
create safe verification. While this helps ensure that if an attacker gains information what they can decrypt is not useful.
To make sure that as little is truly known of the users identity as possible I only collect what information is needed for
authentication. Once this is done the data is then fractured to make it as secure as possible. The less we store as a
whole the less risk of intersection of cross reference there is. Don't submit your age, gender, location or personal preferences.
<br>
- Cookie encryption. All data stored in the PID cookie for this site is encrypted. The session is made secure using
a method of obfuscation so that session highjacking is made more difficult. Though it is entirely possible that this
can still happen. As always use caution with information submitted.
<br>
*- Open sourced site code, once the site features have been completed the site's source code shall be free to public
scrutiny so that all bugs, errors, and insecure practices can be fixed and then verified as corrected.
<br></div></p>
			  <hr>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
		<hr>
        <form style="width:100% !important;" class="form-group" action="includes/process_login.php" method="post" name="login_form">                      
            Email: <input class="form-control" type="text" name="email" />
            Password: <input class="form-control" type="password" 
                             name="password" 
                             id="password"/>
            <input class="btn btn-danger" type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <p>If you don't have a login, please <a href="register.php">register</a></p>
        <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p>
		</div></div>
	
	<div id="footer">
	<div class="container">
					<p class="copyright">This Source Code Form is subject to the terms of the Mozilla Public License, v. 2.0. If a copy of the MPL was not distributed with this file, You can obtain one at http://mozilla.org/MPL/2.0/.</p>
			</div>
		</div>		

    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
