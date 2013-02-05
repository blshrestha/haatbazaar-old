<script language = "javascript">
function validated()
{	
	var name		= document.s.name.value;
	var password	= document.s.password.value;		
	//var coll_program	= document.s.coll_programs.value;		
	if(name=="")
	{	
		window.alert("Please enter user name!");
		document.s.name.focus();
		return false;			
	}
	if(password=="")
	{	
		window.alert("Please enter password!");
		document.s.password.focus();
		return false;			
	}
</script>

<?php
include("connect_to_database.php");
include("display_heading.php");
connect_to_database();

function display_adduser()

{
echo "
<head>
<title>adduser</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
</head>";
echo "
<body bgcolor=\"#FFFFFF\" text=\"#000000\">
<form name=\"s\" method=\"post\" action=\"add_cc.php\" enctype=\"multipart/form-data\" name=\"s\" onsubmit=\"return validated()\";>";

displayheading("ADMINISTRATOR","ADD USER");
echo"  
  <table width=\"85%\" border=\"0\">
    
        <tr> 
      
      <td height=\"224\" width=\"83%\" bgcolor=\"#CCCCCC\"> 
        <table width=\"100%\" border=\"0\" bgcolor=\"#CCCCCC\">
          <tr> 
            <td width=\"26%\">Username</td>
            <td width=\"74%\"> 
              <input type=\"text\" name=\"name\">
            </td>
          </tr>
          <tr> 
            <td width=\"26%\" height=\"22\">Password</td>
            <td width=\"74%\" height=\"22\"> 
              <input type=\"password\" name=\"password\">
            </td>
          </tr> 
              ";
          
echo "           
         <td width=\"26%\">Existing villages</td>
            <td width=\"26%\"> 
             <select name=\"select\" size=\"1\"> ";

//adding item to select 
$query= "SELECT * FROM  village";

$result=mysql_query($query);

$count=0;
while($row=mysql_fetch_row($result))
{
   echo "       <option>$row[0]</option>"; 
}
echo "              </select>
            </td>
			<tr> 
            <td width=\"26%\">Choose village</td>
             <td width=\"26%\"> 
             <input type=\"Textarea\" name=\"village\">(if not found above::add new here)
            </td>
          </tr> ";
echo "
          <tr> 
            <td width=\"26%\" height=\"46\">email</td>
            <td width=\"74%\" height=\"46\"> 
              <input type=\"text\" name=\"email\">
            </td>
          </tr>
        </table>
        <p>
          <input type=\"submit\" name=\"पेस गर\" value=\"पेस गर\">
        </p>
      </td>
    </tr>
    <tr> 
      <td height=\"82\" width=\"17%\">&nbsp;</td>
      <td height=\"82\" width=\"83%\">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
";
}
?>
