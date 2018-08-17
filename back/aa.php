<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$sql="INSERT INTO persons (FirstName, LastName, Age)
VALUES
('$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[age]')";
mysql_query($sql,$con);
$d=array('errno' =>0);
echo json_encode($d);
mysql_close($con)
?>
