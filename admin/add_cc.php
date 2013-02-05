<link rel = "stylesheet" href="../default.css" type = "text/css">
<a href=../admin/admin_home1.php><font size=4 face=verdana color=red><< Go Back</font></a>

<?php
include("package/connect_to_database.php");
//include("package/add_user.php");
connect_to_database();
$name=$_POST["name"];
$password = $_POST["password"]; 
$address1=$_POST["village"];//data from existing village field
$address2=$_POST["select"];//data from new village name
$email=$_POST["email"];

if($address1=="")
{
$village=$address2;
}
	elseif($address1==$address2){
		$village=$address1;
		$query= "INSERT INTO village address VALUES ('".$village."') ";
		$result= mysql_query($query);
			if(!$result){
                 //die ("<br>village entered by u already exist go back and see existing list of village");
            }
	}
	else{
		$village = $address1;
		$query= "INSERT INTO village address VALUES ('".$village."') ";
		$result= mysql_query($query);
			if(!$result){
                 //die ("<br>village entered by u already exist go back and see existing list of village");
            }
	}

$query= "INSERT INTO ccinfo (ccid,password,address,email) VALUES ('".$name."',md5('$password'),'".$village."','".$email."') ";	//Table data and entered //should match
$result= mysql_query($query);
if(!$result1=mysql_query("insert into village values ('".$village."',0,0)")){//added by shakeel on 9 Dec 2007
	echo "<br><div class ='error'>Error inserting village into village table</div>";
}
if(!$result)
{
die ("<br><div class = 'error'>Duplicate username. Click back and try again by using other name.</div>");
}
else
{?>
  alert('&#2346;&#2361;&#2367;&#2354;&#2375; &#2360;&#2366;&#2350;&#2366;&#2344;&#2325;&#2379; &#2344;&#2366;&#2350; &#2342;&#2367;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;  Give Item Name First'); 
<?php	
	header("Location:admin_home1.php");	
	//echo"A new control center has been added";
}

?>
