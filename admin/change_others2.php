<?php
session_start();
include("package/connect_to_database.php");
include("package/display_heading.php");



echo "
<html>
<head>
<title>Changing password</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>

<body >
<form name=\"form1\" method=\"post\" action=\"change_psd2.php\">

";


displayheading("ADMINISTRATOR","CHANGE PASSWORD");
if($_SESSION['login']!='admin')
{
die("session has expired");
}



$address=$_POST["address"];
$email=$_POST["email"];
$desc=$_POST["description"];

connect_to_database();

//checking if old password is correct
$query= "update ccinfo set address='".$address."',email='".$email."'  where ccid='admin' ";  //updating psd 
$result=mysql_query($query);
  if(!$result){ die("<p><b>Personnel information could not be updated</b></p><p>To try againg click <a href=\"change_others1.php\">here</p>"); }


echo "<p><b>Administrative Info is changed.</b></p><p>To go home click <a href=\"admin_home.php\"> here</p>";

?>
