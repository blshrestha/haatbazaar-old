<?php
session_start();
include("package/connect_to_database.php");
//include("package/remove_user.php");

connect_to_database();



if($_SESSION['login']!="admin")
{
die ("session has expired");
}


 $query= "SELECT * FROM  ccinfo";

$result=mysql_query($query);

$count=0;
while($row=mysql_fetch_row($result))
{   $ccid="";
   $ccid=@$_POST["checkbox$count"];
                 if($ccid!="")
             {
	               $query= "update ccinfo set password='' where ccid='".$ccid."'";

                 $result1=mysql_query($query);
				 echo "<br>Your account has been disabled";?>
				 <br><br><a href=../admin/admin_home1.php><font size=4 face=verdana color=red><< Go Back</font></a><?php
	           }
$count++;
}

?>
