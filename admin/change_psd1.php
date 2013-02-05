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

echo"
<table width=\"70%\" border=\"0\">
    <tr>
      <td><B>OLD PASSWORD <font size=4>(पुरानो पासवर्ड):</font></B></td><td><input type=\"password\" name=\"old\"></td>
    </tr>
<tr>
      <td><B>NEW PASSWORD <font size=4>(नयाँ पासवर्ड):</font></B></td><td><input type=\"password\" name=\"new\"></td>
    </tr>
<tr>   
<tr>
      <td><B>RE-ENTER NEW PASSWORD <font size=4>(फेरी नयाँ पासवर्ड):</font></B></td><td><input type=\"password\" name=\"new1\"></td>
    </tr>
<tr> 
<td><p>&nbsp;</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     <input type=\"submit\" name=\"Submit\" value=\"Submit (पेस गर)\"></td>
</tr>  
</table>";

echo "</form>
  </body>
</html>
";

?>
