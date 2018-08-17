<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("my_db", $con);
$c=$_REQUEST["status"];
if ($c==1)
{
	$a=$_REQUEST["uid"];
	$b=$_REQUEST["menu"];
	$e=$_REQUEST["tim"];
	$r=$_REQUEST["num"];
	$sqld="INSERT INTO data (uid,menu,time,num)
	VALUES ('$a','$b','$e','$r')";
}
if ($c==2)
{
	$a=$_REQUEST["uid"];
	$sqld= mysql_query("SELECT * FROM data");
	if ($row = mysql_fetch_array($sqld))
	{
		$data=array();
		do
		{
   			Array_push($data,array('id'=>$row['id'],
   			'uid'=>$row['uid'],'menu'=>$row['menu'],'time'=>$row['time'],'num'=>$row['num']));
		} while  ($row = mysql_fetch_array($sqld));
	}
	$d=array('errno'=>0,'data'=>$data);	
}
else if (mysql_query($sqld,$con))
{
	$d=array('errno' =>0);
}
else 
{
	echo mysql_error();
	$d=array('errno' =>1);
}
echo json_encode($d);
mysql_close($con);
?>