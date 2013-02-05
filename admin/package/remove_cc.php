<?php
include("connect_to_database.php");
function  display_remove_cc()
{
echo"
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<form name=\"form1\" method=\"post\" action=\"\">
  <p>&nbsp;</p>
  <table width=\"85%\" border=\"0\">
    <tr bgcolor=\"#FFCCFF\"> 
      <td colspan=\"2\" height=\"46\"> 
        <h3>ADMINISTRATOR</h3>
      </td>
    </tr>
    <tr bgcolor=\"#CCCCCC\"> 
      <td height=\"40\" colspan=\"2\">REMOVE USER<img src=\"button/help.gif\" width=\"55\" height=\"19\" align=\"right\"></td>
    </tr>
    <tr> 
      <td height=\"158\" width=\"17%\"> 
        <h3><img src=\"logos/reliable.gif\" width=\"100\" height=\"69\"></h3>
      </td>
      <td height=\"158\" width=\"83%\" bgcolor=\"#FFFFFF\"> 
        <table width=\"75%\" border=\"1\">
          <tr> 
            <td> 
              <h5>CCID</h5>
            </td>
            <td> 
              <h5>ADDRESS</h5>
            </td>
            <td> 
              <h5>MAIL</h5>
            </td>
          </tr>
          <tr> 
            <td> 
              <input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\">
              CCID </td>
            <td>ADDRESS</td>
            <td>MAIL</td>
          </tr>
        </table>
        <p>&nbsp; </p>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>

";
}
?>