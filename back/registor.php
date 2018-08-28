<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);
$b=$_REQUEST["nichen"];
$c=$_REQUEST["type"];
if ($c==1)
{
$sqld= mysql_query("SELECT * FROM persons
WHERE nichen='$b'");
if (!($row = mysql_fetch_array($sqld)))
{
$sql="INSERT INTO persons (FirstName,LastName,Age,nichen,code,level)
VALUES
('$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[age]','$_REQUEST[nichen]','$_REQUEST[code]','$_REQUEST[level]')";
if (mysql_query($sql,$con))
{

$d=array('errno' =>0);
}
else 
{

$d=array('errno' =>2);
}
}
else{
$d=array('errno' =>1);
}
}
else if ($c==2)
{
	$e=$_REQUEST["lastname"];
   	$f=$_REQUEST["firstname"];
    	$g=$_REQUEST["age"];
   	$sqld="update persons set LastName='$e',FirstName='$f',Age='$g' where nichen='$b'";
if (mysql_query($sqld, $con)) {$d=array('errno'=>0);}
    else  {$d=array('errno'=>1);}
}
else if ($c==3)
{
	$sqld= mysql_query("SELECT * FROM persons");
	if ($row = mysql_fetch_array($sqld))
	{
		$data=array();
		do
		{
   			Array_push($data,array('id'=>$row['id'],
   			'lastname'=>$row['LastName'],'firstname'=>$row['FirstName'],'age'=>$row['Age'],'nichen'=>$row['nichen'],'code'=>$row['code'],'level'=>$row['level']));
		} while  ($row = mysql_fetch_array($sqld));
		}
		$d=array('errno'=>0,'data'=>$data);

}
else if ($c==4)
{
	$e=$_REQUEST["level"];
   	$sqld="update persons set level='$e' where nichen='$b'";
if (mysql_query($sqld, $con)) {$d=array('errno'=>0);}
    else  {$d=array('errno'=>1);}

}
else if ($c==5)
{
	$sqld="delete from persons where nichen='$b'";

if (mysql_query($sqld, $con)) {$d=array('errno'=>0);}
    else  {	$d=array('errno'=>1);}

}

echo json_encode($d);
mysql_close($con)
?>