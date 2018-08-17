<?php
$con = mysql_connect("localhost","root","csqpw001");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("my_db", $con);
$a=$_REQUEST["id"];
$b=$_REQUEST["token"];
$c=$_REQUEST["type"];
if ($b==base64_encode($a))
{
if ($c==1)
{  
    $e=$_REQUEST["pid"];
    $sqld= "delete from info where pid='$e'";
    if (mysql_query($sqld,$con)) {
        $d=array('errno'=>0);
    }
    else  {$d=array('errno'=>1);}

}elseif ($c==2)
{
    $e=$_REQUEST["title"];
    $f=$_REQUEST["txt"];
    $g=$_REQUEST["time"];
    $sqld="INSERT INTO info (id,title,txt,time)
VALUES
('$a','$e','$f','$g')";
    if (mysql_query($sqld, $con)) {$d=array('errno'=>0);}
    else  {$d=array('errno'=>1);
echo mysql_error();}
}elseif ($c==3)
{
    $e=$_REQUEST["title"];
    $f=$_REQUEST["txt"];
    $g=$_REQUEST["pid"];
   $sqld="update info set title='$e',txt='$f' where pid='$g'";
if (mysql_query($sqld, $con)) {$d=array('errno'=>0);}
    else  {$d=array('errno'=>1);}
}
}
else {$d=array('errno'=>2);}
echo json_encode($d);
mysql_close($con)
?>