<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);
$b=$_REQUEST["id"];
$c=$_REQUEST["pwd"];
$sql= mysql_query("SELECT * FROM persons
WHERE nichen='$b'");

if($row = mysql_fetch_array($sql))
{
if ($row['code']==$c)
{
    $d=array('errno' =>0,"token" => base64_encode($b),"level" =>$row['level'],"lastname" =>$row['LastName'],"FirstName" =>$row['FirstName'],"Age" =>$row['Age']);
   

}else{
    $d=array('errno' =>2,"token" =>0,"level" =>0);
};
}
else{
$d=array('errno' =>1,"token" =>0,"level" =>0);
}
echo json_encode($d);
mysql_close($con)
?>
