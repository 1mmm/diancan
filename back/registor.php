<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);
$b=$_REQUEST["nichen"];
$sqld= mysql_query("SELECT * FROM persons
WHERE nichen='$b'");

if (!($row = mysql_fetch_array($sqld,$con)))
{
$sql="INSERT INTO persons (FirstName,LastName,Age,nichen,code)
VALUES
('$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[age]','$_REQUEST[nichen]','$_REQUEST[code]')";
if (mysql_query($sql,$con))
{

$d=array('errno' =>0);
}
else 
{
echo mysql_error();
$d=array('errno' =>2);
}
}
else{
$d=array('errno' =>1);
}
echo json_encode($d);
mysql_close($con)
?>