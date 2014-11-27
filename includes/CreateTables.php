<?php
$con=mysqli_connect("xx","xx","xx","xx");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create table
$sql="CREATE TABLE Members(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,UID VARCHAR(512) NOT NULL,points INT(11) NOT NULL,exp INT(11) NOT NULL,ip VARCHAR(48) NOT NULL,password VARCHAR(512) NOT NULL,salt VARCHAR(512) NOT NULL,email VARCHAR(128) NOT NULL,hashid CHAR(128) NOT NULL,httpref VARCHAR(80) NULL,timedate VARCHAR(30) NULL,browser VARCHAR(120) NULL,language VARCHAR(30) NULL,server VARCHAR(30))";

// Execute query
if (mysqli_query($con,$sql)) {
  echo "Tables created successfully";
} else {
  echo "Error creating tables: " . mysqli_error($con);
}
?>