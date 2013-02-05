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

$old=$_POST["old"];
$new=$_POST["new"];
$new1=$_POST["new1"];

connect_to_database();

//checking if old password is correct
$query= "SELECT password FROM  ccinfo where ccid='admin' ";

$result=mysql_query($query);

$row=mysql_fetch_row($result);
if($row[0]==$old)
{
  if($new==$new1)
	{
	  $query1= "update ccinfo set password='".$new."' where ccid='admin' ";  //updating psd 
                    $result1=mysql_query($query1);
                 if(!$result) {  die("<p><b>Password could not be changed.</b></p><p>To try againg click <a href=\"change_psd1.php\">here</p>"); }
	   else { echo "<p><b> Password has been changed.</b></p><p>To go home click <a href=\"admin_home.php\">here</p>"; }
               }
  else
      {
        die("<p><b>Two newly entered password do not match.</b></p><p>To try againg click <a href=\"change_psd1.php\">here</p>");
      }
}

else
{
die ("<p><b>WRONG OLD PASSWORD ENTERED. </b></p><p>To try again click <a href=\"change_psd1.php\">here</p>");
}

?>
