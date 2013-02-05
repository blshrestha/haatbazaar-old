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
	
	$value=@$_POST["value"];
		if($value=='') $value=@$_GET["value"];
	
	$categoryid=@$_POST["categoryid"];
		if($categoryid=='') $categoryid=@$_GET["categoryid"];
			if($categoryid=='') $categoryid='ALL';
		
 	$place=@$_POST["place"];
		if($place=='') $place=@$_GET["place"];
			if($place=='') $place='ALL';

//search box
include("forms/form_search.php");


 if($value=='')
 {
 	die('<div class="warning">Provide String to search. ');
 }

 $result=search($value,$categoryid,$place);

 //TODO : if no of results==0 show message 'provide a good string';
 while($row=mysql_fetch_array($result))
 {
 	echo "<br>".$row["id"].'<a href="">View</a>';
 }

?>
</body>
</html>