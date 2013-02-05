<?php
session_start();
include("package/connect_to_database.php");
//include("package/remove_user.php");
$_SESSION['number']=0;

connect_to_database();
echo"
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>
<form name=\"form1\" method=\"post\" action=\"send_mail.php\">
<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<table width=\"75%\" border=\"0\">
  <tr>
    <td bgcolor=\"#FFCCFF\"> 
      <h4>ADMINISTRATOR</h4>
    </td>
  </tr>
  <tr>
    <td bgcolor=\"#CCCCEE\">SEND MAIL:<img src=\"help.gif\" width=\"75\" height=\"20\" align=\"right\"></td>
  </tr>

</table>
<table width=\"75%\" border=\"0\">
  <tr>
    
<img src=\"logos/reliable.gif\" width=\"100\" height=\"50\" align=\"right\"></td>
  </tr>
<tr>
<td><input type=\"submit\" name=\"Submit\" value=\"send\"></td>
</tr>
</table>


";

echo "</table>
<table width=\"85%\" border=\"0\" >
    ";
if($_SESSION['login']!="admin")
{
die ("session has expired");
}

$password=md5($_POST["password"]);
 $query= "SELECT * FROM  ccinfo";

$result=mysql_query($query);

$count=0;
$count1=0;
while($row=mysql_fetch_row($result))
{   $ccid="";
   $ccid=@$_POST["checkbox$count"];
                 if($ccid!="")
             {
	  $query1= "update ccinfo set password=md5('".$password."' ) where ccid='".$ccid."'";

                 $result1=mysql_query($query1);
        //send mail
            $query2= "select ccid,email from ccinfo where ccid ='".$ccid."' ";
            $result2=mysql_query($query2);
                $row1=mysql_fetch_row($result2);
               echo "<tr><td  height=\"35\" bgcolor=\"#CCCCCC\"><b>*</b>Send mail to <b>$row1[0]</b> <input type=\"hidden\" name=\"ccid$count1\" value=\"$row1[0]\"> at  <input type=\"text\" name=\"email$count1\" value=\"$row1[1]\">  telling him that his password is  <input type=\"text\" name=\"password$count1\" value=\"$password\" size=\"6\"></td><tr>";
                
                  $count1++;
	           }//end of if
$count++;
}//end of while
$_SESSION['number']=$count1-1;
echo "</table>";

echo "
</form>
</body>
</html>";
?>
