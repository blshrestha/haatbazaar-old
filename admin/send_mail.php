<?php

session_start();
include("package/connect_to_database.php");
include("package/display_heading.php");
if($_SESSION['login']!="admin")
{
die ("session has expired");
}

$number=$_SESSION['number'];
$count=0;


connect_to_database();
echo"
<html>
<head>
<title>Send mail</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<form name=\"form1\" method=\"post\" action=\"enable_cc_2.php\"> ";

displayheading("ADMINISTRATOR","SEND MAIL:");

echo $number;
 while($count<=$number)
 {
 $ccid=$_POST["ccid$count"];
 $email=$_POST["email$count"];
 $password=$_POST["password$count"];

$query1= "update ccinfo set email='".$email."' ,password='".$password."' where ccid='".$ccid."'";  //updating email and psd if any changes needed
 $result1=mysql_query($query1);
 
$count++;
 echo "<p><b>#</b>Mail is sent to $ccid at $email";

 }//end of while
?>