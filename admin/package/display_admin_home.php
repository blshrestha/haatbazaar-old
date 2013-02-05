<?php
function display_admin_home()
{
echo"   
<html>
<head>
<title>Admin Home Page</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<table width=\"100%\" border=\"0\" cellpadding=\"10\" cellspacing=\"10\">
 <tr> 
    <td height=\"143\" width=\"100%\"> 
      <table width=\"95%\" border=\"0\">
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"add_cc_1.php\"><font size=5 face=verdana>add personnel (सदस्य थप्नुहोस)</font></td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"disable_cc_1.php\"><font size=5 face=verdana>disable personnel (सदस्यता निस्क्रिय गर्नुहोस )</font></td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"enable_cc_1.php\"><font size=5 face=verdana>enable cc (सदस्यता सक्रिय गर्नुहोस)</font></td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"change_psd1.php\"><font size=5 face=verdana>change password (पासवर्ड बदल्नुहोस्)</font></td>
        </tr>
        <tr> 
          <td bgcolor=\"#CCCCCC\"><a href=\"change_others1.php\"><font size=5 face=verdana>change personnel setting (व्यक्तिगत बिबरण बदल्नुहोस्)</font></td>
        </tr>
      </table>
    </td>

  </tr>
</table>
</body>
</html>
";
}
?>