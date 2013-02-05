<?php


session_start();





include('package\connect_to_database.php');

connect_to_database();
 
$name=$_POST["name"];
$password = $_POST["password"]; 

$_SESSION['login']="non";

$query= "SELECT password FROM  ccinfo where ccid='".$name."' ";

$result=mysql_query($query);

$row=mysql_fetch_row($result);

if((strcmp( $row[0],$password)==0))
{
 
$valid=1;

}
else
{
$valid=0;

}




if($valid==0)
{
$_SESSION['login']="non";
echo "retype password and user name.Make notice of caps lock";

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
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

echo"   <html>
<head>
<title>Untitled Document</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<table width=\"75%\" border=\"0\">
  <tr> 
    <td width=\"34%\" height=\"31\">&nbsp;</td>
    <td width=\"61%\" height=\"31\">&nbsp;</td>
    <td width=\"5%\" height=\"31\">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan=\"3\" bgcolor=\"#FFCCFF\" height=\"32\"> 
      <h3>ADMINISTRATOR LOGIN<img src=\"button/help.gif\" width=\"55\" height=\"20\" align=\"right\"></h3>
    </td>
  </tr>
  <tr> 
    <td width=\"34%\">&nbsp;</td>
    <td width=\"61%\">&nbsp;</td>
    <td width=\"5%\">&nbsp;</td>
  </tr>
  <tr> 
    <td height=\"143\" width=\"34%\"> 
      <table width=\"95%\" border=\"0\">
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"add_cc_1.php\">add personnel</td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"disable_cc_1.php\">delete personnel</td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"enable_cc_1.php\">enable cc</td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\">change password</td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\">change personnel setting</td>
        </tr>
      </table>
    </td>
    <td height=\"143\" width=\"61%\">&nbsp;</td>
    <td height=\"143\" width=\"5%\">&nbsp;</td>
  </tr>
  <tr> 
    <td height=\"151\" width=\"34%\">&nbsp;</td>
    <td height=\"151\" width=\"61%\">&nbsp;</td>
    <td height=\"151\" width=\"5%\">&nbsp;</td>
  </tr>
</table>
</body>
</html>

 ";
}


?>