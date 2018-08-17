<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
mysql_select_db("my_db", $con);
$sql = "CREATE TABLE Persons 
(
personID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";
mysql_query($sql,$con)
mysql_close($con);
?>