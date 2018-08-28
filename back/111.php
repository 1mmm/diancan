<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM persons ");

while($row = mysql_fetch_array($result))
  {
  echo $row['nichen'] . " ".$row['FirstName'] . " " . $row['LastName']. " " .$row['Age']." ".$row['code']." ".$row['level'];
  echo "<br />";
  }

mysql_close($con);

?>
<html>
<body>
<input type="button" onclick="window.location.href='222.php'" value="back">
</body>
</html>