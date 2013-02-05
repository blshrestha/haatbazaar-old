<html>
<head><title>Search Result</title>
<link href="default.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="form1" method="post" action="search1.php">
<?php
/* 
	PARAMETERS IT SHOULD GET[].
    $_GET["field"] $_GET["value"] $_GET["category"]
*/

include("./functions/database.php");
include("./functions/searchitem.php");	

//search box
include("forms/form_search1.php");
session_start();
 $count=@$_GET["start"];

 if($count==0)
 {
 // If this is the first time of invoking this page (ie not by click Next Button)

	$value=@$_POST["value"];
		if(!$value=='') $value=@$_GET["value"];
	
	$categoryid=@$_POST["categoryid"];
		if(!$categoryid=='') $categoryid=@$_GET["categoryid"];
			//if($categoryid=='') $categoryid='ALL';
		
 	$place=@$_POST["place"];
		if(!$place=='') $place=@$_GET["place"];
			//if($place=='') $place='ALL';

// session_unregister('test');
 if($value=='')
 {
 	die('<div class="warning">Provide String to search. ');
 }

  $res=search($value,$categoryid,$place);
  $_SESSION["result"]=$res;
 }
$result=$_SESSION["result"];
echo $numrows= mysql_num_rows($result);
 //if no of results==0 show message 'provide a good string';
 if($numrows=0)
 {
 echo"Sorry,the item you searched for is not available";
 
 }
 /*echo '<table border="0" >';
    for($i=0;$i<3;$i++)
	{  
		echo '<tr width=100 height =50>';
	    for($j=0;$j<3;$j++)
	   {
		    $row=mysql_fetch_array($result);
	 		
			echo '<td width=150  valign="top">';
			echo displayitem($row["id"]);
			echo '</td>';
		    $count++;
			if($count>=$numrows)
			{
			 $j=3;$i=3;
			}
	    }
		echo "</tr>";
	}
 echo "</table>";
 echo '<br><a href="search1.php?start='.$count.'"> next>> </a>  </br>';
*/
?>
</form></body>
</html>