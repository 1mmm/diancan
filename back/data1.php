<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);
$a=$_REQUEST["id"];
$sqld= mysql_query("SELECT * FROM data
WHERE id='$a'");
echo 'action:'.$a.'<br>';
while ($row = mysql_fetch_array($sqld))
{
echo $row['da'].'<br>';
}
mysql_close($con)
?>