<?php
function displayheading($user,$contex)
{
echo"
<table width=\"100%\" border=\"0\">
  <tr>
    <td bgcolor=\"#FFCCFF\"> 
      <h4>$user  $contex</h4>
    </td>
  </tr>
  <tr>
    <td bgcolor=\"#CCCCEE\"><a href=../admin/logout.php><font size=4 face=verdana color=red>Logout</font></a>    
    <a href=../help/admin_home.htm><img border=\"0\" src=\"package/button/help.gif\" width=\"75\" height=\"20\" align=\"right\"></a></td>
    
  </tr>
  <tr><td><a href=../admin/admin_home1.php><font size=4 face=verdana color=red><< Go Back</font></a></td></tr>
</table>
";
}
?>