<html>
<head><title>Search Result</title>
<link href="default.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
/* 
	PARAMETERS IT SHOULD GET[].
    $_GET["field"] $_GET["value"] $_GET["category"]
*/

include("./functions/database.php");
include("./functions/searchitem.php");	

//search box
include("forms/form_search.php");
session_start();
echo "<br>inside1 ";
echo"<br>count: ". $count=@$_GET["start"];


 if($count==0)
 { 	// If this is the first time of invoking this page (ie not by click Next Button)
	
	$value=@$_POST["value"];
		if($value=='') $value=@$_GET["value"];
	
	$categoryid=@$_POST["categoryid"];
		if($categoryid=='') $categoryid=@$_GET["categoryid"];
			if($categoryid=='') $categoryid='ALL';
		
 	$place=@$_POST["place"];
		if($place=='') $place=@$_GET["place"];
			if($place=='') $place='ALL';
echo "<br>inside3 ";
 	if($value=='')
 		{
 		die('<div class="warning">Provide String to search. ');
 		}
echo "<br>inside ";
  	$res=search($value,$categoryid,$place);
	echo "<br>out side inside ---->>".$res;
  	$result=$_SESSION["result"]=$res;
  	echo '--------'.$result.'--------';
 }

//$result=$_SESSION["result"];
echo '-----result now is ---'.$result.'--------';
echo"No of items";
echo $numrows= mysql_num_rows($result);
 
 
 //TODO : if no of results==0 show message 'provide a good string';	
 //When the $numrows=0 no item matches so print:	die('<div class="warning">Provide String to search. ');
 echo '<table border="0" >';
    for($i=0;$i<3;$i++)
	{  
		echo '<tr width=100 height =50>';
	    for($j=0;$j<3;$j++)
	   {   echo "<br>countis equal to:".$count;
		   // $row=mysql_fetch_array($result);
	         
	         if(!($row=mysql_result($result,$count)))
						
			{
			 die('<div class="warning"> End of items to be displayed count:.$count</div>');
			 }		
			else{
			
			echo '.........'.$row.'......';
			echo '<td width=150  valign="top">';
			echo '------- '.$row["id"].' --------';
			echo displayitem($row["id"]);
			echo '</td>';
		    $count++;
		    }
			if($count>=$numrows)
			{
			 $j=3;$i=3;
			}
	    }
		echo "</tr>";
	}
	
	//$count++;
 echo "</table>";
 
 echo '<br><a href="search.php?start='.$count.'"> next>> </a>  </br>';
?>
</body>
</html>