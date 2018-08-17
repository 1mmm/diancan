<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);
$a=$_REQUEST["id"];
$b=$_REQUEST["token"];
if ($b==base64_encode($a))
{
$sqld= mysql_query("SELECT * FROM info
WHERE id='$a'");
$i=1;
if ($row = mysql_fetch_array($sqld))
{
$data=array();
do
{
   Array_push($data,array('title'=>$row['title'],
   'txt'=>$row['txt'],'pid'=>$row['pid'],'time'=>$row['time']));
} while  ($row = mysql_fetch_array($sqld));
}
$d=array('errno'=>0,'data'=>$data);
}
else {
$d=array('errno' =>3);
}
echo json_encode($d);
mysql_close($con)
?>