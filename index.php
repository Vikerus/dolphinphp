<?php
 ini_set("auto_detect_line_endings", true);
// Here we have to call the required functions and ready the user creation with a secure session.
// Extended Use : This entire block of php is required. And must be at the top of your page.
include_once 'includes/functions.php';
sec_session_start();

require_once 'includes/verifyme.php';
if($_SESSION['active'] == true){
echo "Logged in";
}else{
echo "Restricted";
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

    <title>Dolphinphp - PHP Powered Database</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

        <!-- Custom styles for this template -->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<!-- These two javascripts' below are needed for the form to work!
		 Extended Use: These are Required. -->
		 

		
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
  
	<!-- The php snip-it below will show an error message if the variable $error_msg is set.
		 Extended Use: This is Required. -->
		 
		<?php
		
		
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
		

		
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6" style="margin-top:-4px;">
					
					<span class="form-inline" ><h2 class="subtitle" style="margin-top:-1px !important;"><h1 style="margin-top:10px !important; margin-bottom:-15px !important; ">Dolphinphp</h1>Powerful Mysql Db.</h2></span>
					
					<!-- This <form> reloads the page using entered values as the variables that make the script function.
						 Extended Use: The action="", method="". and name="" are Required as is shown below! -->
						 
					<form class="form-inline signup" action="register.php" method="post" name="registration_form">
					  <div class="form-group">
					  
					<!-- Here we have the <input> for email collection.
						 Extended Use: The type="". id="", and name="" are Required as is shown below! -->
						 
					    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email address" />
					  </div>
					  
					<!-- This is the <input> which allows Javascript to verify there is an email to submit.
						 Extended Use: The type="", value="", and onclick="" are Required as is shown below! -->
						 
				   <input class="btn btn-theme" type="submit" 
                   value="Register">
					</form>					
				</div>

					</div>		
				</div>				
				
			</div>

	
  <!--left--><div class="container" id="main">
   <div class="row">				

        <div class="well"> 		<h3 style="margin-top:5px !important;">
			<div class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="" class="img-rounded" alt="avatar">
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right" style="margin-top:-10px;">
										<span class="welcome" style="font-size:14px;">Welcome,</span>
										<span style="font-size:14px;" >User</span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li>
										<a href="ajax/page_messages.html" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li>
										<a href="ajax/gallery_simple.html" class="ajax-link">
											<i class="fa fa-picture-o"></i>
											<span>Albums</span>
										</a>
									</li>
									<li>
										<a href="ajax/calendar.html" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span>Tasks</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="includes/logout.php">
											<i class="fa fa-power-off"></i>
											<span>logout</span>
										</a>
									</li>
								</ul>
							</div>
			</h3></div>
         	<div class="panel-body">
             			<h3 style="margin-top:5px !important;">
			<div class="form-group">
			<form class="form-horizontal" method="post" enctype="multipart/form-data" action="users/saveconvo.php">

				<p>Enter a Friendcode to message:</p>
				<input class="form-control" type="text" name="friendid">
				<label><p>Send Message:</p></label>
				<textarea class="form-control" style="width:auto; padding-right:12px;" name="inboxmsg" rows="4" cols="30">1200 Character Limit</textarea>		
				<input class="btn btn-success pull-right" type="submit" name="submit9" value="Submit"></form>
				<ul class="list-inline"><li><a href="#"><i class="glyphicon glyphicon-align-left"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-center"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-right"></i></a></li></ul>
            			
								
							</div>
			</h3>
			

  </div></div></div><!--/left-->

	
<div class="container" id="main">
   <div class="row">				

        <div class="well"> 
			<h3>JustSearch: Image Uploader</h3>
			<h4>Supported File Types: ".gif" ".jpeg", ".jpg", ".png"</h4>
			<form action="upload_file.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit3" value="Submit">
			</form>
			
	</div>
</div>
</div>
	
	<div id="footer">
	<div class="container">
					<p class="copyright">Copyright &copy; 2014-2015 - Vikerus</p>
	</div>	
	</div>
    <script src="assets/js/bootstrap.min.js"></script>


<?php   
//Begin beta dolphinphp//      
 



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data; 

}



// @comments front page //
if(empty($_POST["bulletmsg"])){
	 if (isset($_POST["bulletmsg"])){
 unset($_POST["bulletmsg"]); }
}	else{
 echo "Comment written." . "<br>";
 $file = '@comments.txt';
 //The new person to add to the file
 $person = $_POST["bulletmsg"];
 $personstruc = "@data" . ": " . date("m-d") . " : " . "$person" . "<hr>" ;
 //Write the contents to the file, 
 // the FILE_APPEND flag to append the content to the end of the file
 //and the LOCK_EX flag to prevent anyone else writing to the file at the same time
 file_put_contents($file, $personstruc,FILE_APPEND | LOCK_EX);
 //

}
//
//

?>
  </body>
</html>
