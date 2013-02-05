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
<form name=\"form1\" method=\"post\" action=\"change_others2.php\">

";






displayheading("ADMINISTRATOR","CHANGE PERSONNEL INFO");
if($_SESSION['login']!='admin')
{
die("session has expired");
}

echo"
<table width=\"70%\" border=\"0\">
    <tr>
      <td><B>New Address <font size=4>(नयाँ ठेगाना): </font></B></td><td><input type=\"text\" name=\"address\"></td>
    </tr>
<tr>
      <td><B>New Email <font size=4>(नयाँ ई-मेल): </font></B></td><td><input type=\"text\" name=\"email\"></td>
    </tr>
<tr>   
<tr>
      <td><B>Personnel description <br><font size=4>(व्यक्त्तिगत विवरण): </font></B></td><td><textarea name=\"description\"></textarea></td>
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
