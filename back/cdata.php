<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);
$b=$_REQUEST["status"];
if ($b==1)
{
	$q=$_REQUEST[name];
	$w=$_REQUEST[desc];
	$r=$_REQUEST[price];
	$e=$_REQUEST[img];
	$sql="INSERT INTO cdata (name,descr,img,price) VALUES ('$q','$w','$e','$r')";
}
if ($b==2)
{
	$c=$_REQUEST[id];
	$q=$_REQUEST[name];
	$w=$_REQUEST[desc];
	$r=$_REQUEST[price];
	$e=$_REQUEST[img];
	$sql="update cdata set name='$q',descr='$w',img='$e',price='$r' where id='$c'";
}
if ($b==3)
{
	$c=$_REQUEST[id];
	$sql="delete from cdata  where id='$c'";
}

if ($b==4)
{
	$sqld= mysql_query("SELECT * FROM cdata");
	if ($row = mysql_fetch_array($sqld))
	{
		$data=array();
		do
		{
   			Array_push($data,array('id'=>$row['id'],
   			'name'=>$row['name'],'desc'=>$row['descr'],'img'=>$row['img'],'price'=>$row['price']));
		} while  ($row = mysql_fetch_array($sqld));
		}
		$d=array('errno'=>0,'data'=>$data);
}
else if (mysql_query($sql,$con))
{
	$d=array('errno' =>0,'id'=>mysql_insert_id());
}
else 
{

	$d=array('errno' =>1);
}
echo json_encode($d);
mysql_close($con)
?>