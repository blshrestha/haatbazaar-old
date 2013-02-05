<?php
 include("display_heading.php");
function  display_disablecc()
{
  if($_SESSION["login"]!="admin")
{
die(" session expired");
}
echo"
<html>
<head>
<title>Diasable cc</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>

<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<form name=\"form1\" method=\"post\" action=\"disable_cc_2.php\"> ";

displayheading("ADMINISTRATOR","DISABLE CC");
echo "
    <table width=\"85%\" border=\"0\">
    
    
    <tr> 
      
      <td height=\"158\" width=\"100%\" bgcolor=\"#FFFFFF\"> 
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
              <h5> <input type=\"submit\" name=\"submit\" value=\"disable\"></h5>
            </td>
          </tr>  ";

 $query= "SELECT * FROM ccinfo where password!=''";

$result=mysql_query($query);

$count=0;
while($row=mysql_fetch_row($result))
{

     if($row[0]=="admin")
    {
      echo "          <tr> 
            <td> 
             
              $row[0]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
          </tr>
         <tr> ";
  continue;
     }//end of if
if($row[2]!="") //if user is not disables( password)
{
	
        
echo "          <tr> 
            <td> 
              <input type=\"checkbox\" name=\"checkbox$count\" value=\"$row[0]\">
              $row[0]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
           
          </tr>
          ";
            
$count++;
}
if($row[2]=="") //if user is disables(no password)
{
	
        
echo "          <tr> 
            <td> 
              
              $row[0](<a href=\"enable_cc_1.php\">enable?)</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
           
          </tr>
          ";
            
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