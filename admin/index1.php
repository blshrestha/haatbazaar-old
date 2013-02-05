
<?php


session_start();
include('package/connect_to_database.php');
include("package/display_admin_home.php");
include("package/display_heading.php");
connect_to_database();
 
$name=$_POST["name"];
$password = $_POST["password"]; 

$_SESSION['login']="non";

$query= "SELECT password FROM  ccinfo where ccid='".$name."' ";

$result=mysql_query($query);

$row=mysql_fetch_row($result);

if((strcmp( $row["password"],$password)==0))
{
 
$valid=1;

}
else
{
$valid=0;

}




if($valid==0)
{
$_SESSION['login']="none";
echo "retype password and user name.Make notice of caps lock";

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
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
</form>";
}


// TO DETECT ADMINISTRATOR

else if(($valid==1)&&(strcmp($name,"admin")==0)) 
{
$_SESSION['login']=$name;
echo "
<html>
<head>
<title>Admin home</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; utf-8\">
</head>

<body >


";
displayheading("ADMINISTRATOR","HOME <a href=controlcenter/>Control Center</a>");
display_admin_home();
echo "</body></html>";
}


?>
