<?php
$blankfield='<div class="error" align="center"> Blank Field(s)<br><br>
			Username and(or) Password fields cannot be left blank. Please provide your Username & Password.</div>';

include('package/connect_to_database.php');
include("package/display_admin_home.php");
include("package/display_heading.php");

connect_to_database();
 
$name=$_POST["name"];
$password = $_POST["password"]; 
if(($name=="")||($password==""))
{
echo"$blankfield";			//to check if blank fields
header("Location:index.htm");
}
else
{
//session_start();
//$_SESSION['login']="non";		//Initially you are logged in as none

$query= "SELECT password FROM  ccinfo where ccid='$name' ";	//dot is not required ramesh

$result=mysql_query($query);

$row=mysql_fetch_row($result);
//$valid=1;
if(mysql_connect("localhost","root","nepalwireless2064"))
{
//echo"connected to data server";	//added by ramesh to check connection
}
else
{
echo"database server not connected";
}
if(mysql_select_db("haatbazar"))
{
//echo"connected to database haatbazar";//added by ramesh
}
else
{
echo"---"; //database not connected";
}
if((strcmp( $row[0],md5($password))==0))	//password saved is encrypted
{
//echo"setting valid"; 
$valid=1;

}
else
{
//echo"resetting valid";
//echo"$name";
//echo"$password";
//echo"$row[0]";
$valid=0;

}
if($valid==0)
{
//$_SESSION['login']="none";
//echo "retype password and user name.Make notice of caps lock";
header("Location:index.htm");
$_SESSION['login']="";
/*echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
</head>

<body >

<p><font size=\"6\"><b>LOGIN</b></font></p>
<form name=\"form1\" method=\"post\" action=\"users.php\">
  <p><font color=\"#FF0000\">REENTRY</font></p>
  <p>USER NAME 
    <input type=\"text\" name=\"name\">
    PASSWORD 
    <input type=\"password\" name=\"password\">
    <input type=\"submit\" name=\"Submit\" value=\"Submit\">
  </p>
</form>"; */
}


// TO DETECT ADMINISTRATOR

else if(($valid==1)&&(strcmp($name,"admin")==0)) 
{
session_start();
$_SESSION['login']=$name;
echo "
<html>
<head>
<title>Admin home</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; utf-8\">
</head>
<body >
";

displayheading("ADMINISTRATOR HOME","");
display_admin_home();
echo "</body></html>";
}
}
?>
