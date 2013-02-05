<?php
include("display_heading.php");
function  display_enablecc()
{
echo"
<html>
<head>
<title>Enable cc</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<script type=\"text/javascript\">
<!--
function validate()
{
  if(document.form1.password.value == \"\")
 {
   alert(\"To enable CC some password should be assigned\");
  return false;
  }
  return true;
}
//-->
</script>
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<form name=\"form1\" method=\"post\" action=\"enable_cc_2.php\"  onsubmit=\"return validate();\"> ";
displayheading("ADMINISTRATOR","<b>ENABLE CC</b>");
echo "
  <p><u>To disable CC  click <a href=\"disable_cc_1.php\"> here.</a></u></p>
    
        <table width=\"100%\" border=\"1\">
          <tr bgcolor=\"#CCCCCC\"> 
            <td> 
              <h5>CCID</h5>
            </td>
            <td> 
              <h5>ADDRESS</h5>
            </td>
            <td> 
              <h5>MAIL</h5>
            </td>
         <td> 
              <h5>Assign password:<input type=\"text\" name=\"password\"size=\128\"> <input type=\"submit\" name=\"submit\" value=\"enable\"></h5>
            </td>
          </tr>  ";

 $query= "SELECT ccid,address,password,email FROM ccinfo";

$result=mysql_query($query);

$count=0;
while($row=mysql_fetch_row($result))
{
     if($row[0]=="admin")
    {
      echo "          <tr> 
            <td> 
             
              $row[0]</td>
            <td>$row[1]</td>
            <td>$row[3]</td>
          </tr>
         <tr> ";
  continue;
     }//end of if
if($row[2]=="") //if user is not disables( password)
{
	
        
echo "          <tr> 
            <td> 
              <input type=\"checkbox\" name=\"checkbox$count\" value=\"$row[0]\">
              $row[0]</td>
            <td>$row[1]</td>
            <td>$row[3]</td>
           
          </tr>
          ";
            
$count++;
}
if($row[2]!="") //if user is disables(no password)
{             
$count++;
}

}//end of while

echo "
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